@extends('admin.layouts.app')

@section('page', 'Agregar archivo')

@section('content')

    <form action="{{ route('file.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row d-flex flex-row justify-content-center aling-items-center pt-5">
            <div class="form-group">
                <label for="file">
                    Selecciona un archivo para subirlo
                </label>
                <input type="text" name="name" placeholder="Ingresa un nombre">
                <input type="file" class="form-control-file" name="file">
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary file">Subir archivo</button>
            </div>
        </div>

    </form>


@endsection