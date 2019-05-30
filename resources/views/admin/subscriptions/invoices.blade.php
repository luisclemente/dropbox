@extends('admin.layouts.app')

@section('page', 'Mis facturas')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-sm-12 table-responsive">
                <table class="table table-hover">
                    <thead>
                    <tr>

                        <th scope="col">ID</th>
                        <th scope="col">Monto</th>
                        <th scope="col">Facturación</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Moneda</th>
                        <th scope="col">Soporte</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($invoices as $invoice)
                        <tr>
                            <th scope="row">{{$invoice->id}}</th>
                            <th scope="row">{{ $invoice->total}}</th>
                            <th scope="row">Automática</th>
                            <th scope="row">{{ date('d-m-Y', $invoice->created)}}</th>
                            <th scope="row">{{ $invoice->currency }}</th>
                            <th scope="row">
                                <a href="{{ $invoice->hosted_invoice_url }}" class="btn btn-success" target="_blank">
                                    Ver
                                </a>
                            </th>
                           {{-- <th scope="row">
                                @if ($invoice->ends_at)
                                    <form action="{{ route('subscription.resume') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="plan_name" value="{{ $invoice->name }}">
                                        <button class="btn btn-success" type="submit">
                                            <i class="fas fa-trash"></i>
                                            Subscribirme
                                        </button>
                                    </form>
                                @else
                                    <form action="{{ route('subscription.cancel') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="plan_name" value="{{ $invoice->name }}">
                                        <button class="btn btn-danger" type="submit">
                                            Cancelar
                                        </button>
                                    </form>
                                @endif
                            </th>--}}
                        </tr>
                    </tbody>
                    @endforeach
                </table>
            </div>
        </div>
    </div>

@endsection


@section('internalscript')
    <link rel="stylesheet" href="../css/admin.css">

    <script src="../js/app.js"></script>
@endsection