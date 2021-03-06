@extends('admin.layouts.app')

@section('page', 'Videos')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 table-responsive">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th scope="col"></th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Subido</th>
                        <th scope="col">Ver</th>
                        <th scope="col">Eliminar</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($videos as $video)
                        <tr>
                            <th scope="row">

                                @if($video->extension == 'mp4' || $video->extension == 'MP4' ||
                                 $video->extension == 'vid' || $video->extension == 'VID')
                                    <img src="{{ asset('img/files/mp4.svg') }}" class="img-responsive" width="50">
                                @elseif($video->extension == 'avi' || $video->extension == 'AVI')
                                    <img src="{{ asset('img/files/avi.svg') }}" class="img-responsive" width="50">
                                @endif


                            </th>
                            <th scope="row">{{ $video->name }}</th>
                            <th scope="row">{{ $video->created_at->DiffForHumans() }}</th>
                            <th scope="row">
                                <a class="btn btn-primary" target="_blank"
                                   href="{{asset('storage')}}/{{ $folder }}/video/{{$video->name}}">
                                    <i class="fas fa-eye"></i>Ver
                                </a>
                            </th>
                            <th scope="row">
                                <form action="{{ route('file.destroy', $video->id) }}" method="POST">
                                    @csrf
                                    @method ('PATCH')
                                    <button class="btn btn-danger" type="submit"><i class="fas fa-trash"></i>
                                        Eliminar
                                    </button>
                                </form>
                            </th>
                        </tr>
                    </tbody>

                    @empty
                        <div class="container mb-5">
                            <div class="alert alert-warning" role="alert">
                                    {{--role="<div class=" alert alert-{{ session('info')[0]}}"--}}
                                <span class="closebtn" onclick="this.parentElement.style.display='none';">
                                    x
                                </span>
                                <strong>¡Atención!</strong> No tienes ningún video.
                            </div>
                        </div>
                    @endforelse
                </table>
            </div>
        </div>
    </div>
@endsection