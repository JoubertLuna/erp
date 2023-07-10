@include('erp.painel.includes.alerts')
@csrf
<div class="form-group">
    <h4><b><i class="fas fa-list"></i> Cadastro de Categoria</b></h4>
    <hr>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label>Nome da Categoria:</label>
                <input type="text" name="categoria" id="categoria" class="form-control" placeholder="Nome da Categoria"
                    value="{{ $categoria->categoria ?? old('categoria') }}">
            </div>
        </div>
    </div>
</div>
<hr>
<div class="form-group">
    <button type="submit" class="btn btn-dark"><i class="fas fa-save"></i> Cadastrar Categoria</button>
</div>
