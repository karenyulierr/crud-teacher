<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
<style>
    .boton_nuevo {
        padding: 10px;
        background-color: #A760FF;
        color: #fff;
        border-radius: 10px;
        text-decoration: none;
    }

    .boton_nuevo:hover {
        padding: 15px;
        background-color: #A760FF;
        color: #fff;
        border-radius: 15px;
        text-decoration: none;
    }

    .boton_editar {
        padding: 10px;
        background-color: #FFCC8F;
        color: #fff;
        border-radius: 5px;
        text-decoration: none;
    }

    .boton_editar:hover {
        padding: 10px;
        background-color: #FFCC8F;
        color: #fff;
        border-radius: 5px;
        text-decoration: none;
    }

    .boton_borrar {
        padding: 10px;
        background-color: #A760FF;
        color: #fff;
        border-radius: 5px;
        text-decoration: none;
        border: 0px;
    }

    .boton_borrar:hover {
        padding: 10px;
        background-color: #CA82FF;
        color: #fff;
        border-radius: 5px;
        text-decoration: none;
    }

</style>

<div class="container">
    @if(Session::has('mensaje'))
    <br><br>
    <div class="alert alert-success" role="alert">
        {{ Session::get('mensaje')}}
    </div>
    @endif
    <br><br>
    <a class="boton_nuevo mt-5 mb-5" href="{{ url('teachers/create') }}">Nuevo profesor</a>
    <br><br><br>
    <table class="table table-hover">
        <thead class="thead-light">
            <tr>
                <th>#</th>
                <th>Imagen</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>N° Identificación</th>
                <th>Télefono</th>
                <th>Correo</th>
                <th>Acciones</th>
            </tr>
        </thead>

        <tbody>
            @foreach($teachers as $key => $teacher)
            <tr>
                <td>{{ $teacher->id }}</td>
                <td>
                    <img src="{{ asset('storage').'/'.$teacher->image }}" width="100" height="50" alt="">
                </td>
                <td>{{ $teacher->name }}</td>
                <td>{{ $teacher->last_name }}</td>
                <td>{{ $teacher->identification }}</td>
                <td>{{ $teacher->phone }}</td>
                <td>{{ $teacher->email}}</td>
                <td> <a class="boton_editar" href="{{ url('/teachers/'.$teacher->id.'/edit') }}">Editar</a> <br><br>
                    <form action="{{ url('/teachers/'.$teacher->id) }}" method="post">
                        @csrf
                        {{ method_field('DELETE') }}
                        <input class="boton_borrar" type="submit" onclick="return confirm('¿Quieres borrar?')" value="Borrar">
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>
