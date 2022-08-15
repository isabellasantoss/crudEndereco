<div class="card">

        <div class="row align-items-center">
            <div class="col-md-7">
                <div class="d-md-flex align-items-center">
                    <div class="text-center text-sm-left m-v-15 p-l-30">
                        <h2 class="mb-0"></h2>
                        <p class="text-opacity font-size-13">
                            <b>@lang('labels.created_at'):</b>  {{ $model->created_at }}
                        </p>
                        <div class="mt-4">
                            <a href="{{ route('endereco.edit', $model->cod_id) }}" class="m-r-5 button-edit p-v-10 p-h-20" title="@lang('labels.edit')" data-toggle="tooltip" data-placement="top">
                                <i class="anticon anticon-edit"></i>
                                <span class="m-l-3">@lang('labels.edit')</span>
                            </a>
                            <a class="ml-3 font-size-13 text-muted" href="{{ url()->previous() }}">
                                <i class="anticon anticon-arrow-left"></i>
                                @lang('labels.back')
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="row">
                    <div class="d-md-block d-none border-left col-1"></div>
                    <div class="col">
                        <ul class="list-unstyled m-t-10">
                            <li class="row">
                                <p class="col-sm-4 col-5 font-weight-semibold text-dark m-b-5">
                                    <span>@lang('labels.cod_cep'): </span>
                                </p>
                                <p class="col font-weight-semibold"> {{ $model->cod_cep }}</p>
                            </li>
                            <li class="row">
                                <p class="col-sm-4 col-5 font-weight-semibold text-dark m-b-5">
                                    <span>@lang('labels.des_rua'): </span>
                                </p>
                                <p class="col font-weight-semibold"> {{ $model->des_rua }}</p>
                            </li>
                            <li class="row">
                                <p class="col-sm-4 col-4 font-weight-semibold text-dark m-b-5">
                                    <span>@lang('labels.cod_numero') </span>
                                </p>
                                <p class="col font-weight-semibold"> {{ $model->cod_numero }}</p>
                            </li>
                            @isset($model->des_complemento)
                                <li class="row">
                                    <p class="col-sm-4 col-4 font-weight-semibold text-dark m-b-5">
                                        <span>@lang('labels.des_complemento') </span>
                                    </p>
                                    <p class="col font-weight-semibold"> {{ $model->des_complemento }}</p>
                                </li>
                            @endisset
                            <li class="row">
                                <p class="col-sm-4 col-4 font-weight-semibold text-dark m-b-5">
                                    <span>@lang('labels.des_bairro') </span>
                                </p>
                                <p class="col font-weight-semibold"> {{ $model->des_bairro }}</p>
                            </li>
                            <li class="row">
                                <p class="col-sm-4 col-4 font-weight-semibold text-dark m-b-5">
                                    <span>@lang('labels.des_cidade') </span>
                                </p>
                                <p class="col font-weight-semibold"> {{ $model->des_cidade }}</p>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
