<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
<style>
    .title_form {
        text-align: center;
        color: #A760FF;
        font-size: 30px;
        margin-top: 50px;
    }

</style>
<div class="container">
    <p class="title_form">Editar profesor</p>
    <form action="{{ url('/teachers/'.$teachers->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        {{ method_field('PATCH') }}
        @include('teachers.form',['modo'=>'Editar'])
    </form>
</div>
