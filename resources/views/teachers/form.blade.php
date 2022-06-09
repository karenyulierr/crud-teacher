<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
<div class="row justify-content-md-center">


    <div class="mb-3 row justify-content-md-center">
        <label class="col-sm-2 col-form-label" for="name">Nombre</label>
        <div class="col-sm-6">
            <input class="form-control" type="text" name="name" id="name" value="{{ isset($teachers->name)? $teachers->name : "" }}" required>
        </div>
    </div>

    <div class="mb-3 row  justify-content-md-center">
        <label class="col-sm-2 col-form-label" for="last_name">Apellido</label>
        <div class="col-sm-6">
            <input class="form-control" type="text" name="last_name" id="last_name" value="{{ isset($teachers->last_name) ? $teachers->last_name : '' }}" required>
        </div>
    </div>

    <div class="mb-3 row justify-content-md-center">
        <label class="col-sm-2 col-form-label" class="form-label" for="identification">Identificación</label>
        <div class="col-sm-6">
            <input class="form-control" type="number" name="identification" id="identification" value="{{ isset($teachers->identification) ? $teachers->identification :'' }}" required>
        </div>
    </div>
    <div class="mb-3 row justify-content-md-center">
        <label class="col-sm-2 col-form-label" for="email">Email</label>
        <div class="col-sm-6">
            <input class="form-control" type="email" name="email" id="email" value="{{ isset($teachers->email) ?$teachers->email : '' }}" required>
        </div>
    </div>
    <div class="mb-3 row justify-content-md-center">
        <label class="col-sm-2 col-form-label" class="form-label" for="phone">Télefono</label>
        <div class="col-sm-6">
            <input class="form-control" type="number" name="phone" id="phone" value="{{ isset($teachers->phone) ?$teachers->phone : '' }}" required>
        </div>
    </div>

    <div class="mb-3 row justify-content-md-center">
        <label class="col-sm-2 col-form-label" for="image">
            Foto
        </label>
        <div class="col-sm-6">
            @if(isset($teachers->image))
            <img src="{{ asset('storage').'/'.$teachers->image }}" width="100" height="50" alt="">
            @endif
            <input class="form-control" type="file" name="image" id="image" value=" " required>
        </div>
    </div>
    <br>
    <div class="text-center  justify-content-md-center">
        <input class="btn btn-success" type="submit" value="{{$modo}} profesor">

        <a class="btn btn-primary" href="{{ url('teachers/') }}">Regresar</a>
    </div>
</div>
