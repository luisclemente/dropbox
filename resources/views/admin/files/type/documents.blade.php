@extends('admin.layouts.app')

@section('page', 'Documentos')

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
                        <th scope="col">Ver / Descargar</th>
                        <th scope="col">Eliminar</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($documents as $document)
                        <tr>
                            <th scope="row">

                                @if($document->extension == 'pdf' || $document->extension == 'PDF')
                                    <img src="{{ asset('img/files/pdf.svg') }}" class="img-responsive" width="50">
                                @elseif($document->extension == 'xlsx' || $document->extension == 'XLSX')
                                    <img src="{{ asset('img/files/xlsx.svg') }}" class="img-responsive" width="50">
                                @elseif($document->extension == 'docx' || $document->extension == 'DOCX')
                                    <img src="{{ asset('img/files/docx.svg') }}" class="img-responsive" width="50">
                                @endif

                            </th>
                            <th scope="row">{{ $document->name }}</th>
                            <th scope="row">{{ $document->created_at->DiffForHumans() }}</th>
                            <th scope="row">
                                @if($document->extension == 'pdf' || $document->extension == 'PDF')
                                    <a class="btn btn-primary"
                                       style="width: 55%"
                                       target="_blank"
                                       href="{{asset('storage')}}/{{ $folder }}/document/{{$document->name}}">
                                        <i class="fas fa-eye"></i>Ver
                                    </a>
                                @else
                                    <a class="btn btn-success"
                                       style="width: 55%"
                                       target="_blank"
                                       href="{{asset('storage')}}/{{ $folder }}/document/{{$document->name}}">
                                        <i class="fas fa-download"></i>Descargar
                                    </a>
                                @endif
                            </th>
                            <th scope="row">
                                <form action="{{ route('file.destroy', $document->id) }}" method="POST">
                                    @csrf
                                    @method ('PATCH')
                                    <button class="btn btn-danger pull-right" type="submit">
                                        <i class="fas fa-trash"></i>
                                        Eliminar
                                    </button>
                                </form>
                            </th>
                        </tr>
                    </tbody>
                    @empty
                        <div class="container mb-5">
                            <div class="alert alert-warning" role="alert">
                                {{--role="<div class="alert alert-{{ session('info')[0]}}" --}}
                                <span class="closebtn" onclick="this.parentElement.style.display='none';">
                                    x
                                </span>
                                <strong>¡Atención!</strong> No tienes ningún documento.
                            </div>
                        </div>
                    @endforelse
                </table>
            </div>
        </div>
    </div>
@endsection