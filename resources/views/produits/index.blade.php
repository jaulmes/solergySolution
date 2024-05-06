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
                    <th>titre</th>
                    <th>categorie</th>
                    <th>Stock</th>
                    <th>Prix d'achat</th>
                    <th>Prix de vente</th>
                    <th>Prix minimum</th>
                    <th>Prix technicien</th>
                    <th>Description</th>
                    <th>Images</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($produits as $produit)
                <tr>
                    <td>{{$produit->name}}</td>
                    <td>{{$produit->categori->titre}}</td>
                    <td>{{$produit->stock}}</td>
                    <td> {{$produit->prix_achat}}</td>
                    <td>{{$produit->price}}</td>
                    <td>{{$produit->prix_minimum}}</td>
                    <td>{{$produit->prix_technicien}}</td>
                    <td>{{$produit->description}} </td>
                    <td> </td>
                    <td> </td>
                </tr>
                @endforeach
                
            </tbody>
            <tfoot>
                <tr>
                    <th>titre</th>
                    <th>categorie</th>
                    <th>Stock</th>
                    <th>Prix d'achat</th>
                    <th>Prix de vente</th>
                    <th>Prix minimum</th>
                    <th>Prix technicien</th>
                    <th>Description</th>
                    <th>Images</th>
                    <th>Actions</th>
                </tr>
            </tfoot>
        </table>
    </div>

    
    <!-- /.card-body -->
</div>
<!-- /.card -->
</div>
<!-- /.col -->
</div>
<!-- /.row -->
</div>
<!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>

@endsection