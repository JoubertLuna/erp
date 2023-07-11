@include('erp.painel.includes.alerts')
@csrf
<div class="form-group">
    <h4><b>Cadastro de Produto</b></h4>
    <hr>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label>Nome do Produto:</label>
                <input type="text" name="produto" id="produto" class="form-control" placeholder="Nome do Produto"
                    value="{{ $produto->produto ?? old('produto') }}">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>Categoria:</label>
                <select class="form-control" name="categoria_id" id="categoria_id" style="width: 100%;">
                    @foreach ($categorias as $categoria)
                        @if ($categoria->id === @$produto->categoria_id)
                            <option value="{{ $categoria->id }}" selected>{{ $categoria->categoria }}</option>
                        @else
                            <option value="{{ $categoria->id }}">{{ $categoria->categoria }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Unidade:</label>
                <select class="form-control" name="unidade_id" id="unidade_id" style="width: 100%;">
                    @foreach ($unidades as $unidade)
                        @if ($unidade->id === @$produto->unidade_id)
                            <option value="{{ $unidade->id }}" selected>{{ $unidade->unidade }}</option>
                        @else
                            <option value="{{ $unidade->id }}">{{ $unidade->unidade }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-3">
            <div class="form-group">
                <label>Preço:</label>
                <input type="text" name="preco" id="preco" class="form-control mascara-dinheiro"
                    placeholder="EX: 1000" value="{{ $produto->preco ?? old('preco') }}" required>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label>É Produto:</label>
                <select class="form-control select2" name="eh_produto" id="eh_produto" style="width: 100%;">
                    <option value="1"
                        {{ old('eh_produto', $produto->eh_produto ?? '') === '1' ? 'selected' : '' }}>
                        Sim</option>
                    <option value="0"
                        {{ old('eh_produto', $produto->eh_produto ?? '') === '0' ? 'selected' : '' }}>
                        Não</option>
                </select>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label>É Insumo:</label>
                <select class="form-control" name="eh_insumo" id="eh_insumo" style="width: 100%;">
                    <option value="1" {{ old('eh_insumo', $produto->eh_insumo ?? '') === '1' ? 'selected' : '' }}>
                        Sim</option>
                    <option value="0" {{ old('eh_insumo', $produto->eh_insumo ?? '') === '0' ? 'selected' : '' }}>
                        Não</option>
                </select>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label>Ativo:</label>
                <select class="form-control" name="ativo" id="ativo" style="width: 100%;">
                    <option value="1" {{ old('ativo', $produto->ativo ?? '') === '1' ? 'selected' : '' }}>
                        Sim</option>
                    <option value="0" {{ old('ativo', $produto->ativo ?? '') === '0' ? 'selected' : '' }}>
                        Não</option>
                </select>
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-lg-7">
            <div class="btn-group w-100">
                <span class="btn btn-success col fileinput-button">
                    <span>
                        <input type="file" name="image" id="image" class="form-control-file"
                            onchange="pegaArquivo(this.files)" value="{{ $produto->image ?? old('image') }}">
                    </span>
                </span>
            </div>
        </div>
        <div class="col-lg-5">
            <div class="form-group">
                @if (@$produto->image)
                    <img src="{{ asset('storage/Produto/' . @$produto->image) }}" width="200px"
                        alt="{{ @$produto->produto }}" id="imgup">
                @else
                    <img src="{{ asset('storage/Produto/default.png') }}" width="200px" id="imgup">
                @endif
            </div>
        </div>
    </div>
</div>

<div class="form-group">
    <button type="submit" class="btn btn-dark"><i class="fas fa-save"></i> Cadastrar Produto</button>
</div>

@section('js')

    <script src="{{ asset('az/painel/jquery.js') }}"></script>
    <script src="{{ asset('az/painel/js.js') }}"></script>
    <script src="{{ asset('az/painel/jquery.mask.js') }}"></script>
    <script src="{{ asset('az/painel/componentes/js_mascara.js') }}"></script>

    <script>
        function pegaArquivo(files) {
            var file = files[0];
            const fileReader = new FileReader();
            fileReader.onloadend = function() {
                $("#imgup").attr("src", fileReader.result);
            }
            fileReader.readAsDataURL(file);
        }
    </script>
@stop
