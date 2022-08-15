{{-- Exibe a informação que ocorreram erros na validação (nos campos as mensagens do erro também são exibidas) --}}
@if ($errors && !$errors->isEmpty())
<div class="alert alert-danger">
    <div class="d-flex align-items-center justify-content-start">
        <span class="alert-icon">
            <i class="anticon anticon-close-o"></i>
        </span>
        <span>@lang('messages.errorValidation')</span>
    </div>
</div>
@endif
      
<form method="POST" action="{{ $options['route'] }}" enctype="multipart/form-data">
    {{ $model->exists ? method_field('PUT') : method_field('POST') }}
    {{ csrf_field() }}

    <div class="form-row">
        <div class="form-group col-md-3">
            <label for="cod_cep">@lang('labels.cod_cep')</label>
            <input type="text"
                required
                class="form-control {{ $errors->has('cod_cep') ? ' is-invalid' : '' }}"
                id="cod_cep"
                name="cod_cep"
                onblur="pesquisacep(this.value)"
                size="8" maxlength="8"
                value="{{ old('cod_cep', $model->cod_cep) }}"
                placeholder="@lang('labels.cod_cep')">

            @if($errors->has('cod_cep'))
                <div class="invalid-feedback">
                    {{ $errors->first('cod_cep') }}
                </div>
            @endif
        </div>

        <div class="form-group col-md-3">
            <label for="des_rua">@lang('labels.des_rua')</label>
            <input type="text"
                required
                class="form-control {{ $errors->has('des_rua') ? ' is-invalid' : '' }}"
                id="des_rua"
                name="des_rua"
                value="{{ old('des_rua', $model->des_rua) }}"
                disabled
                placeholder="@lang('labels.des_rua')">

            @if($errors->has('des_rua'))
                <div class="invalid-feedback">
                    {{ $errors->first('des_rua') }}
                </div>
            @endif
        </div>

        <div class="form-group col-md-3">
            <label for="cod_numero">@lang('labels.cod_numero')</label>
            <input type="text"
                required
                class="form-control {{ $errors->has('cod_numero') ? ' is-invalid' : '' }}"
                id="cod_numero"
                name="cod_numero"
                value="{{ old('cod_numero', $model->cod_numero) }}"
                {{ $options['method'] === 'SHOW' ? 'disabled' : '' }}
                placeholder="@lang('labels.cod_numero')">

            @if($errors->has('cod_numero'))
                <div class="invalid-feedback">
                    {{ $errors->first('cod_numero') }}
                </div>
            @endif
        </div>

        <div class="form-group col-md-3">
            <label for="des_complemento">@lang('labels.des_complemento')</label>
            <input type="text"
                class="form-control celular {{ $errors->has('des_complemento') ? ' is-invalid' : '' }}"
                id="des_complemento"
                name="des_complemento"
                value="{{ old('des_complemento', $model->des_complemento) }}"
                placeholder="@lang('labels.des_complemento')">

            @if($errors->has('des_complemento'))
                <div class="invalid-feedback">
                    {{ $errors->first('des_complemento') }}
                </div>
            @endif
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="des_bairro">@lang('labels.des_bairro')</label>
            <input type="text"
                required
                class="form-control {{ $errors->has('des_bairro') ? ' is-invalid' : '' }}"
                id="des_bairro"
                name="des_bairro"
                value="{{ old('des_bairro', $model->des_bairro) }}"
                disabled
                placeholder="@lang('labels.des_bairro')">

            @if($errors->has('des_bairro'))
                <div class="invalid-feedback">
                    {{ $errors->first('des_bairro') }}
                </div>
            @endif
        </div>
        <div class="form-group col-md-6">
            <label for="des_cidade">@lang('labels.des_cidade')</label>
            <input type="text"
                class="form-control {{ $errors->has('des_cidade') ? ' is-invalid' : '' }}"
                id="des_cidade"
                name="des_cidade"
                value="{{ old('des_cidade', $model->des_cidade) }}"
                disabled
                placeholder="@lang('labels.des_cidade')">

            @if($errors->has('des_cidade'))
                <div class="invalid-feedback">
                    {{ $errors->first('des_cidade') }}
                </div>
            @endif
        </div>
    </div>


    {{-- Input oculto com o ID do usuário --}}
    @if($model->exists)
        <input type="hidden" name="cod_id" value="{{ $model->cod_id }}">
    @endif

    @if($options['method'] != 'SHOW')
        <button type="submit" class="btn btn-primary" onclick="pesquisaCep(return true)">@lang('labels.salvar')</button>
        <a class="ml-3 font-size-13 text-muted" href="{{ url()->previous() }}">
            <i class="anticon anticon-arrow-left"></i>
            @lang('labels.back')
        </a>
    @endif
</form>
