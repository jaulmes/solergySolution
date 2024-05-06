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
                    <th>Montant Deja Versé</th>
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
                    <td> {{$vente->montantVerse}}</td>
                    <td>{{$vente->date}}</td>
                    <td>{{$vente->statut}}</td>
                    <td>
                          <!-- Button trigger modal -->
                        <button type="button" style="margin-left: 25em; width: 9em" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                            Ajouter un paiement
                        </button>

                        <!-- Modal -->
                        <form action="{{ route('ventes.modifier', $vente->id)}}" method="post">
                        @csrf
                        @method('patch')
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">ajouter un versement</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>

                                        <div class="modal-body">

                                            <div class="row">
                                                <div class="form-group">
                                                    <label for="montantVerse">montant versé</label>
                                                    <input class="form-control" type="number" name="montantVerse" id="montantVerse">
                                                </div>
                                                <div class="form-group form-select">
                                                    <label for="montantVerse">Mode de Paiement</label>
                                                    <select name="modePaiement" id="" class="form-select">
                                                        <option value="cash">Cash</option>
                                                        <option value="OM">Orange Money</option>
                                                        <option value="MOMO">MTN Mobile Money</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </td>
                </tr>
                @endforeach
                
            </tbody>
            <tfoot>
                <tr>
                    <th>Nom du client</th>
                    <th>Numero du client</th>
                    <th>Quantitée</th>
                    <th>Montant total</th>
                    <th>Montant deja Versé</th>
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