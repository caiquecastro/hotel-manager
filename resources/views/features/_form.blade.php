<div class="form-group row">
    <label class="col-sm-2 form-control-label" for="name">Nome</label>
    <div class="col-sm-5">
        <input type="text" name="name" id="name" class="form-control" value="{{ isset($feature) ? $feature->name : '' }}" />
    </div>
</div>
<div class="form-group row">
    <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-primary">Salvar</button>
    </div>
</div>
