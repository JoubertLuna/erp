@include('erp.painel.includes.alerts')
@csrf
<div class="form-group">
    <h4><b>Cadastro de Contato</b></h4>
    <hr>
    <div class="card-content">
        <div class="col-sm-12">
            <ul class="nav nav-tabs nav-topline" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="base-tab21" data-toggle="tab" aria-controls="tab21" href="#tab21"
                        role="tab" aria-selected="true">DADOS GERAIS</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="base-tab22" data-toggle="tab" aria-controls="tab22" href="#tab22"
                        role="tab" aria-selected="false">ENDEREÇO</a>
                </li>
            </ul>
        </div>
        <div class="tab-content px-1 pt-1 border-grey border-lighten-2 border-0-top">
            <div class="tab-pane active" id="tab21" role="tabpanel" aria-labelledby="base-tab21">
                <br>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Cliente / Transportador / Fornecedor:</label>
                            <select class="form-control" name="eh_cliente" id="eh_cliente" style="width: 100%;">
                                <option value="1"
                                    {{ old('eh_cliente', $contato->eh_cliente ?? '') === '1' ? 'selected' : '' }}>
                                    Cliente</option>
                                <option value="2"
                                    {{ old('eh_cliente', $contato->eh_cliente ?? '') === '2' ? 'selected' : '' }}>
                                    Fornecedor</option>
                                <option value="3"
                                    {{ old('eh_cliente', $contato->eh_cliente ?? '') === '3' ? 'selected' : '' }}>
                                    Transportador</option>
                            </select>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Nome:</label>
                            <input type="text" name="nome" id="nome" class="form-control" placeholder="Nome"
                                value="{{ $contato->nome ?? old('nome') }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>RG:</label>
                            <input type="text" name="rg" id="rg" class="form-control mascara-rg"
                                placeholder="Digite um RG" value="{{ $contato->rg ?? old('rg') }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>CPF:</label>
                            <input type="text" name="cpf" id="cpf" class="form-control mascara-cpf"
                                placeholder="XXX.XXX.XXX-XX" value="{{ $contato->cpf ?? old('cpf') }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>CNPJ:</label>
                            <input type="text" name="cnpj" id="cnpj" class="form-control mascara-cnpj"
                                placeholder="XX.XXX.XXX/0001-XX" value="{{ $contato->cnpj ?? old('cnpj') }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Nome Fantasia:</label>
                            <input type="text" name="nome_fantasia" id="nome_fantasia" class="form-control"
                                placeholder="Nome Fantasia"
                                value="{{ $contato->nome_fantasia ?? old('nome_fantasia') }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>E-mail:</label>
                            <input type="email" name="email" id="email" class="form-control"
                                placeholder="Digite um E-mail" value="{{ $contato->email ?? old('email') }}" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Fone:</label>
                            <input type="text" name="fone" id="fone" class="form-control mascara-fone"
                                placeholder="(00) 0000-0000" value="{{ $contato->fone ?? old('fone') }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Celular:</label>
                            <input type="text" name="celular" id="celular" class="form-control mascara-celular"
                                placeholder="(00) 00000-0000" value="{{ $contato->celular ?? old('celular') }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Ativo:</label>
                            <select class="form-control" name="ativo" id="ativo" style="width: 100%;">
                                <option value="1"
                                    {{ old('ativo', $contato->ativo ?? '') === '1' ? 'selected' : '' }}>
                                    Sim</option>
                                <option value="0"
                                    {{ old('ativo', $contato->ativo ?? '') === '0' ? 'selected' : '' }}>
                                    Não</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane" id="tab22" role="tabpanel" aria-labelledby="base-tab22">
                <br>
                <div class="row">
                    <div class="col-md-2">
                        <div class="form-group">
                            <label>CEP:</label>
                            <input type="text" name="cep" id="cep"
                                class="form-control mascara-cep busca_cep" placeholder="00.000-000"
                                value="{{ $contato->cep ?? old('cep') }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Logradouro:</label>
                            <input type="text" name="logradouro" id="logradouro" class="form-control rua"
                                placeholder="Digite o Logradouro"
                                value="{{ $contato->logradouro ?? old('logradouro') }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Bairro:</label>
                            <input type="text" name="bairro" id="bairro" class="form-control bairro"
                                placeholder="Digite o Bairro" value="{{ $contato->bairro ?? old('bairro') }}">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label>Número:</label>
                            <input type="text" name="numero" id="numero" class="form-control"
                                placeholder="Digite o Número" value="{{ $contato->numero ?? old('numero') }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Cidade:</label>
                            <input type="text" name="cidade" id="cidade" class="form-control cidade"
                                placeholder="Digite a Cidade" value="{{ $contato->cidade ?? old('cidade') }}">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label>Estado:</label>
                            <input type="text" name="uf" id="uf" class="form-control estado"
                                placeholder="EX: PB" value="{{ $contato->uf ?? old('uf') }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Complemento:</label>
                            <input type="text" name="complemento" id="complemento"
                                class="form-control complemento" placeholder="Digite o Complemento"
                                value="{{ $contato->complemento ?? old('complemento') }}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="form-group">
    <button type="submit" class="btn btn-dark"><i class="fas fa-save"></i> Cadastrar Contato</button>
</div>

@section('js')
    <script src="{{ asset('az/painel/jquery.js') }}"></script>
    <script src="{{ asset('az/painel/js.js') }}"></script>
    <script src="{{ asset('az/painel/jquery.mask.js') }}"></script>
    <script src="{{ asset('az/painel/componentes/js_mascara.js') }}"></script>
@stop
