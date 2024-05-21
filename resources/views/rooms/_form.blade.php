<div class="form-group row">
    <label class="col-sm-2 form-control-label" for="number">Número</label>
    <div class="col-sm-5">
        <input type="text" name="number" id="number" class="form-control" value="{{ isset($room) ? $room->number : '' }}" />
    </div>
</div>
<div class="form-group row">
    <label class="col-sm-2 form-control-label" for="type_id">Tipo</label>
    <div class="col-sm-5">
        <select name="type_id" id="type_id" class="c-select form-control">
            <option value="">Selecione</option>
            @foreach ($types as $type)
                <option value="{{ $type->id }}">{{ $type->name }}</option>
            @endforeach
        </select>
    </div>
</div>
<div class="form-group row">
    <label class="col-sm-2 form-control-label" for="floor">Andar</label>
    <div class="col-sm-5">
        <select name="floor" id="floor" class="c-select form-control">
            <option value="">Selecione</option>
            <option value="ground">Térreo</option>
            <option value="first">1º Andar</option>
            <option value="second">2º Andar</option>
        </select>
    </div>
</div>

<div class="form-group row">
    <label class="col-sm-2">Características</label>
    <div class="col-sm-10">
        @foreach($features as $feature)
        <div class="checkbox">
            <label class="c-input c-checkbox">
                <input type="checkbox" name="features[]" value="{{ $feature->id }}"
                        @if (isset($room) and $room->features->contains($feature))
                            checked
                        @endif
                >
                <span class="c-indicator"></span>
                {{ $feature->name }}
            </label>
        </div>
        @endforeach
    </div>
</div>
<div class="form-group row">
    <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-primary">Salvar</button>
    </div>
</div>
