@extends('admin.layouts.app')

@section('page', 'Documentos')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-sm-12 table-responsive">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th scope="col"></th>
                        <th scope="col">Nombre</th>
                        <th scope="col">subido</th>
                        @if(Auth::user()->hasRole('Admin'))
                            <th scope="col">Usuario</th>
                        @endif
                        <th scope="col" class="justify-content-end" width="27%">Ver</th>
                        <th scope="col">Eliminar</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($documents as $document)
                        <tr>
                            <th scope="row">
                                @if($document->extension == 'doc' || $document->extension == 'DOC' || $document->extension == 'docx' || $document->extension == 'DOX' || $document->extension == 'odt' || $document->extension == 'ODT')
                                    <img src="{{ asset('img/files/word.svg') }}" class="img-responsive" width="50">
                                @elseif($document->extension == 'pdf' || $document->extension == 'PDF')
                                    <img src="{{ asset('img/files/pdf.svg') }}" class="img-responsive" width="50">
                                @elseif($document->extension == 'xlsx' || $document->extension == 'XLSX')
                                    <img src="{{ asset('img/files/excel.svg') }}" class="img-responsive" width="50">
                                @endif
                            </th>
                            <th scope="row">{{$document->name}}</th>
                            <th scope="row">{{$document->created_at->DiffForHumans()}}</th>
                            @if(Auth::user()->hasRole('Admin'))
                                <th scope="row">{{$document->user->name}}</th>
                            @endif
                            <th scope="row">
                                @if($document->extension == 'pdf' || $document->extension == 'PDF')
                                    <a class="btn btn-primary" style="width: 55%" target="_blank"
                                       href="{{ asset('storage') }}/{{ $document->folder }}/document/{{ $document->name }}">
                                        <i class="fas fa-eye"></i>
                                        Ver
                                    </a>
                                @else
                                    <a class="btn btn-success" style="width: 55%" target="_blank"
                                       href="{{ asset('storage') }}/{{ $document->folder }}/document/{{ $document->name }}">
                                        <i class="fas fa-download"></i>
                                        Descargar
                                    </a>
                                @endif
                            </th>
                            <th scope="row">
                                <button class="btn btn-danger"
                                        data-toggle="modal"
                                        data-target="#deleteModal"
                                        data-file-id="{{ $document->id }}"
                                        type="submit">
                                    <i class="fas fa-trash"></i>
                                    Eliminar
                                </button>
                            </th>
                        </tr>
                    </tbody>

                    @empty
                        <div class="container mb-4">
                            <div class="alert alert-warning" role="alert">
                                <span class="closebtn" onclick="this.parentElement.style.display='none';">
                                    x
                                </span>
                                <strong>Vaya</strong> Parece que aun no tienes documentos
                            </div>
                        </div>
                    @endforelse
                </table>
            </div>
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