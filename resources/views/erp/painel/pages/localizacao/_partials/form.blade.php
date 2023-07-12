@include('erp.painel.includes.alerts')
@csrf
<div class="form-group">
    <h4><b>Cadastro de Localização</b></h4>
    <hr>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>Localização:</label>
                <input type="text" name="localizacao" id="localizacao" class="form-control"
                    placeholder="Nome da Localização" value="{{ $localizacao->localizacao ?? old('localizacao') }}">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Rua:</label>
                <input type="text" name="rua" id="rua" class="form-control" placeholder="Nome da Rua"
                    value="{{ $localizacao->rua ?? old('rua') }}">
            </div>
        </div>
    </div>
</div>

<div class="form-group">
    <button type="submit" class="btn btn-dark"><i class="fas fa-save"></i> Cadastrar Localização</button>
</div>
