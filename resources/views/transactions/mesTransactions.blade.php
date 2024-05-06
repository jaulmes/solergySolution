@extends('dashboard.main')

@section('content')

<div class="card">
    <div class="card-header">
        <div>
            <form  method="get" action="{{ route('transaction.mesTransactions') }}">
                @csrf
                <label for="month">Month:</label>
                <select id="month" name="month" >
                    @for ($i = 01; $i <= 12; $i++)
                        <option value="{{ $i }}">{{ date('F', mktime(00, 00, 00, $i, 01, 2024)) }}</option>
                    @endfor
                </select>
                <input type="submit" value="valider">
            </form>
        </div>
    </div>

    <div class="container-xl px-4 mt-n4">
        @if (session()->has('message'))
        <div class="alert alert-success alert-icon" role="alert">
            <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
            <div class="alert-icon-aside">
                <i class="far fa-flag"></i>
            </div>
            <div class="alert-icon-content">
                {{ session('message') }}
            </div>
        </div>
        @endif
    </div>
    <!-- END: Alert -->
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Nom du client</th>
                    <th>Numero du client</th>
                    <th>Mode de paiement </th>
                    <th>Montant total versé</th>
                    <th>Type</th>
                    <th>Date</th>
                    <th>Heure</th>
                </tr>
            </thead>
            <tbody>
                @foreach($transactions as $transaction)
                <tr>
                    <td>{{$transaction->nomClient}}</td>
                    <td>{{$transaction->numeroClient}}</td>
                    <td>{{$transaction->modePaiement}}</td>
                    <td> {{$transaction->montantVerse}}</td>
                    <td>{{$transaction->type}}</td>
                    <td>{{$transaction->date}}</td>
                    <td>{{$transaction->heure}}</td>
                </tr>
                @endforeach
                
            </tbody>
            <tfoot>
                <tr>
                    <th>Nom du client</th>
                    <th>Numero du client</th>
                    <th>Mode de paiement </th>
                    <th>Montant total versé</th>
                    <th>Type</th>
                    <th>Date</th>
                    <th>Heure</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
@endsection

@section('javascript')



@endsection