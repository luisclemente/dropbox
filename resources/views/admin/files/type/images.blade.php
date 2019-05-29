@extends('admin.layouts.app')

@section('page', 'Imágenes')

@section('content')
    <div class="container">
        <div class="row">
            @forelse($images as $image)
                <div class="col-sm-6 col-md-4 mt-4">
                    <div class="card" style="width: 18rem;">
                        <img class="card-img-top"
                             src="{{asset('storage')}}/{{ $folder }}/image/{{$image->name}}"
                             alt="{{$image->name}}"
                        >

                        <div class="card-body">
                            <a href="{{ asset('storage') }}/{{ $folder }}/image/{{ $image->name }}"
                               target="_blank" class="btn btn-primary">
                                <i class="fas fa-eye"></i>
                                Ver
                            </a>
                            <button
                                    class="btn btn-danger"
                                    data-toggle="modal"
                                    data-target="#deleteModal"
                                    data-file-id="{{ $image->id }}"
                                    type="submit">
                                <i class="fas fa-trash"></i>
                                Eliminar
                            </button>
                        </div>
                    </div>
                </div>

            @empty
                <div class="container mb-5">
                    <div class="alert alert-warning" role="alert">
                        <span class="closebtn" onclick="this.parentElement.style.display='none';">
                            x
                        </span>
                        <strong>¡Atención!</strong> No tienes ninguna imagen.
                    </div>
                </div>
            @endforelse
        </div>
    </div>

    <!-- Modal -->
    @include('admin.partials.modals.files')

@endsection

@section('internalscript')
    <link rel="stylesheet" href="../css/admin.css">
    <script src="../js/app.js"></script>
@endsection

@section('scripts')
    @include('admin.partials.js.deleteModal')
@endsection