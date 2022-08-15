/** **************** DELETE BUTTONS *******************
 * Atribuímos diretamente na tag html o onclick chamando a função
 * apenas os botões da grid gerados com DataTable.
 *
 * Para os demais botoões de deletar, pegamos todos da página pela classe
 * e criamos o eventListener click para chamar a função e deletar o registro
 */
const deleteButtons = document.querySelectorAll('.delete-button')
for(const [key, button] of Object.entries(deleteButtons)) {
    button.addEventListener('click', function() {
        deleteRegister(this)
    });
}

function deleteRegister(button) {
    const codigo = button.getAttribute('data-id');
    const url = button.getAttribute('data-href');
    const _method = button.getAttribute('data-method');
    const item = button.getAttribute('data-item');
    const name = button.getAttribute('data-name');

    /**
     * No caso dos modelos de grid que excluímos pelo botão no modal,
     * ao clicar no botão de delete, retiramos o modal
    */
    if(item === 'Modelo da grid') $('#modeloGridExcel').modal('hide');

    bootbox.confirm({
        title: `Excluir ?`,
        message: "Deseja realmente excluir este item ?",
        className: 'fadeIn',
        buttons: {
            confirm: {
                label: '<i class="fa fa-check"></i> Sim',
            },
            cancel: {
                label: '<i class="fa fa-times"></i> Não',
                className: 'btn-default'
            }
        },
        callback: function (result) {
            if(result)
            {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    url: url,
                    type: 'POST',
                    data: { data: codigo, _method: _method},
                    success: function(data){
                        bootbox.alert({
                            message: data.message,
                            className: 'fadeIn',
                            callback: function(){
                                if(data.urlRedirect) window.location.href = data.urlRedirect;
                                else location.reload();
                            }
                        });
                    },
                    error:function(error){
                        console.log(error);
                    },
                });
            }
        }
    });

    return false;
}

    
function limpa_formulário_cep() {
        //Limpa valores do formulário de cep.
        document.getElementById('des_rua').value=("");
        document.getElementById('des_bairro').value=("");
        document.getElementById('des_cidade').value=("");
        document.getElementById('des_estado').value=("");

}

function meu_callback(conteudo) {
    if (!("erro" in conteudo)) {
        //Atualiza os campos com os valores.
        document.getElementById('des_rua').value=(conteudo.logradouro);
        document.getElementById('des_bairro').value=(conteudo.bairro);
        document.getElementById('des_cidade').value=(conteudo.localidade);
        return true;
    } //end if.
    else {
        //CEP não Encontrado.
        limpa_formulário_cep();
        windows.alert("CEP não encontrado.");
        return false;
    }
}
    
function pesquisacep(valor) {

    //Nova variável "cep" somente com dígitos.
    var cep = valor.replace(/\D/g, '');

    //Verifica se campo cep possui valor informado.
    if (cep != "") {

        //Expressão regular para validar o CEP.
        var validacep = /^[0-9]{8}$/;

        //Valida o formato do CEP.
        if(validacep.test(cep)) {

            //Preenche os campos com "..." enquanto consulta webservice.

            document.getElementById('des_rua').value="...";
            document.getElementById('des_bairro').value="...";
            document.getElementById('des_cidade').value="...";

            //Cria um elemento javascript.
            var script = document.createElement('script');

            //Sincroniza com o callback.
            script.src = 'https://viacep.com.br/ws/'+ cep + '/json/?callback=meu_callback';

            //Insere script no documento e carrega o conteúdo.
            document.body.appendChild(script);

        } //end if.
        else {
            //cep é inválido.
            limpa_formulário_cep();
            alert("Formato de CEP inválido.");
            return false;
        }
    } //end if.
    else {
        //cep sem valor, limpa formulário.
        limpa_formulário_cep();
    }
}