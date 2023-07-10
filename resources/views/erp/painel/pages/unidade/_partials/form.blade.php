@include('erp.painel.includes.alerts')
@csrf
<div class="form-group">
    <h4><b><i class="fas fa-list"></i> Cadastro de Unidades</b></h4>
    <hr>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label>Nome da Unidade:</label>
                <input type="text" name="unidade" id="unidade" class="form-control" placeholder="Nome da Unidade"
                    value="{{ $unidade->unidade ?? old('unidade') }}">
            </div>
        </div>
    </div>
</div>
<hr>
<div class="form-group">
    <button type="submit" class="btn btn-dark"><i class="fas fa-save"></i> Cadastrar Unidade</button>
</div>
