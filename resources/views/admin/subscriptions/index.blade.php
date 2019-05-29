@extends('admin.layouts.app')

@section('page', 'Mis suscripciones')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-sm-12 table-responsive">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th scope="row">ID</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">ID Stripe</th>
                        <th scope="col">Creada</th>
                        <th scope="col">Finalizará</th>
                        <th scope="col">Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($subscriptions as $subscription)
                        <tr>
                            <th scope="row">{{$subscription->plan_name}}</th>
                            <th scope="row">{{ $subscription->stripe_id }}</th>
                            <th scope="row">{{ $subscription->created_at->DiffForHumans() }}</th>
                            <th scope="row">
                                {{ $subscription->ends_at
                                ? $subscription->ends_at->DiffForHumans()
                                : 'La suscripción está activa'}}
                            </th>
                            <th scope="row">
                                @if ($subscription->ends_at)
                                    <form action="{{ route('plans', $subscription->id) }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="plan_name" value="{{ $subscription->name }}">
                                        <button class="btn btn-success" type="submit">
                                            <i class="fas fa-trash"></i>
                                            Subscribirme
                                        </button>
                                    </form>
                                @else
                                    <form action="{{ route('subscriptions.cancel') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="plan_name" value="{{ $subscription->name }}">
                                        <button class="btn btn-danger" type="submit">
                                            Cancelar
                                        </button>
                                    </form>
                                @endif
                            </th>
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