@extends('dashboard.main')

@section('content')

<div class="card">
    <div class="card-header">
        <h3 class="card-title">DataTable with default features</h3>
        <a href="{{route('produit.import')}}"><button type="button" class="btn btn-primary">Importer</button></a>
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
                    <th>Quantitée</th>
                    <th>Montant total</th>
                    <th>Date</th>
                    <th>Statut</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($ventes as $vente)
                <tr>
                    <td>{{$vente->nomClient}}</td>
                    <td>{{$vente->numeroClient}}</td>
                    <td>{{$vente->qteTotal}}</td>
                    <td> {{$vente->montantTotal}}</td>
                    <td>{{$vente->date}}</td>
                    <td>{{$vente->statut}}</td>
                    <td></td>
                </tr>
                @endforeach
                
            </tbody>
            <tfoot>
                <tr>
                    <th>Nom du client</th>
                    <th>Numero du client</th>
                    <th>Quantitée</th>
                    <th>Montant total</th>
                    <th>Date</th>
                    <th>Statut</th>
                    <th>Actions</th>
                </tr>
            </tfoot>
        </table>
    </div>

    
    <!-- /.card-body -->
</div>



@endsection

@section('javascript')

@endsection