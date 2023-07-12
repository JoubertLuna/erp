@csrf
<div class="form-group">
    <h4><b>Localização do Produto</b></h4>
    <hr>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>Produto:</label>
                <select class="form-control" name="produto_id" id="produto_id" style="width: 100%;">
                    @foreach ($produtos as $produto)
                        @if ($produto->id === @$produtoLocalizacao->produto_id)
                            <option value="{{ $produto->id }}" selected>{{ $produto->produto }}</option>
                        @else
                            <option value="{{ $produto->id }}">{{ $produto->produto }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Localização:</label>
                <select class="form-control" name="localizacao_id" id="localizacao_id" style="width: 100%;">
                    @foreach ($localizacaos as $localizacao)
                        @if ($localizacao->id === @$produtoLocalizacao->localizacao_id)
                            <option value="{{ $localizacao->id }}" selected>{{ $localizacao->localizacao }}</option>
                        @else
                            <option value="{{ $localizacao->id }}">{{ $localizacao->localizacao }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
        </div>
    </div>
</div>

<div class="form-group">
    <button type="submit" class="btn btn-dark"><i class="fas fa-save"></i> Inserir Localização e Produto</button>
</div>
