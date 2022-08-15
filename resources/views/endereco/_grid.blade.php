
<div>
    <a href="{{ route('endereco.create') }}" class="btn btn-primary m-r-5">Criar novo registro</a>
</div>
<div class="m-t-25">
    <table id="tabela" class="table table-striped table-hover">
        <thead>
            <tr>
                <th scope="col">@lang('labels.cod_id')</th>
                <th scope="col">@lang('labels.cod_cep')</th>
                <th scope="col">@lang('labels.des_rua')</th>
                <th scope="col">@lang('labels.des_bairro')</th>
                <th scope="col">@lang('labels.des_cidade')</th>
                <th scope="col">@lang('labels.des_acoes')</th>

            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>


<script>
$(document).ready(function() {
    $('#tabela').DataTable(
    {
        serverSide: true,
        ajax: "{{ route('endereco.ajaxDataTable') }}",
        columns: [
            {data: 'cod_id'},
            { data: 'cod_cep'},
            { data: 'des_rua'},
            { data: 'des_bairro'},     
            { data: 'des_cidade'},     
            { data: 'actions' }

        ],
        searching: true,
        paging: false,
        sort: true,
        info: false,
        scrollX: true,
        autoWidth: false,
        pageLength: 30,
        language: {
            url: "https://cdn.datatables.net/plug-ins/1.10.24/i18n/Portuguese-Brasil.json"
        },
    });
} );

</script>

