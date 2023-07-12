@include('erp.painel.includes.alerts')
@csrf
<div class="form-group">
    <h4><b>Cadastro do Tipo do Movimento</b></h4>
    <hr>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label>Tipo do Movimento:</label>
                <input type="text" name="tipo_movimento" id="tipo_movimento" class="form-control"
                    placeholder="Tipo do Movimento" value="{{ $tipomovimento->tipo_movimento ?? old('tipo_movimento') }}">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>Entrada / Saída:</label>
                <select class="form-control" name="ent_sai" id="ent_sai" style="width: 100%;">
                    <option value="E"
                        {{ old('ent_sai', $tipomovimento->ent_sai ?? '') === 'E' ? 'selected' : '' }}>
                        Entrada</option>
                    <option value="S"
                        {{ old('ent_sai', $tipomovimento->ent_sai ?? '') === 'S' ? 'selected' : '' }}>
                        Saída</option>
                </select>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Movimenta Estoque:</label>
                <select class="form-control" name="movimenta_estoque" id="movimenta_estoque" style="width: 100%;">
                    <option value="S"
                        {{ old('movimenta_estoque', $tipomovimento->movimenta_estoque ?? '') === 'S' ? 'selected' : '' }}>
                        Sim</option>
                    <option value="N"
                        {{ old('movimenta_estoque', $tipomovimento->movimenta_estoque ?? '') === 'N' ? 'selected' : '' }}>
                        Não</option>
                </select>
            </div>
        </div>
    </div>
</div>

<div class="form-group">
    <button type="submit" class="btn btn-dark"><i class="fas fa-save"></i> Cadastrar Tipo do Movimento</button>
</div>
