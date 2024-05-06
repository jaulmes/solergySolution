@extends('dashboard.main')

@section('content')
<section class="content">
    <div class="container-fluid mr-5 " style="margin-left: 300px; position: relative;">
        <div class="row">
            <!-- left column -->
            <div class="col-md-6">
                <!-- general form elements -->
                <div class="card card-primary">


                @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


                    <div class="card-header">
                        <h3 class="card-title">Quick Example</h3>
                    </div>
                    <form method="post" action="{{route('produit.store')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group mx-4" >
                                    <label for="titre">titre </label>
                                    <input name="name" type="text" class="form-control" id="titre" placeholder="entrer le titre">
                                    @error('titre')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group ">
                                    <label for="categori_id">Categorie</label>
                                    <select name="categori_id" class="form-control col-md-6 select2" id="categori_id"  style="width: 100%;">
                                            <option selected="" disabled>choisir la categorie</option>
                                        @foreach($categories as $categorie)
                                            <option value="{{$categorie->id}}">{{$categorie->titre}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                    <div class="form-group mx-4">
                                        <label for="prix_achat">Prix d'achat </label>
                                        <input name="prix_achat" type="number" class="form-control" id="prix_achat" placeholder="entrer le prix d'achat">
                                        @error('prix_achat')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="prix_vente">Prix de catalogue </label>
                                        <input name="price" type="number" class="form-control" id="prix_vente" placeholder="entrer le prix de vente">
                                    </div>
                            </div>
                            <div class="row">
                                <div class="form-group mx-4">
                                    <label for="prix_technicien">Prix technicien </label>
                                    <input name="prix_technicien" type="number" class="form-control" id="prix_technicien" placeholder="entrer le prix des technicients">
                                </div>
                                <div class="form-group ">
                                    <label for="prix_minimum">Prix minimum </label>
                                    <input name="prix_minimum" type="number" class="form-control" id="prix_minimum" placeholder="entrer le prix minimum">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group mx-4">
                                    <label for="stock">stock </label>
                                    <input name="stock" type="number" class="form-control" id="stock" placeholder="entrer le stock">
                                </div>
                                <div class="form-group ">
                                    <label for="fabricant">fabricant </label>
                                    <input type="text" name="fabricant" id="fabricant" class="form-control" placeholder="entrer le fabricant">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="input-group">
                                    <div class="form-group mx-4">
                                        <label for="description">description </label>
                                        <textarea name="description" id="description" class="form-control" ></textarea>
                                    </div>
                                    <div class="custom-file">
                                        <label class="custom-file-label" for="image_produit">image</label>
                                        <input type="file" name="image_produit" class="custom-file-input" id="image_produit"  />

                                    </div>

                                </div>
                            </div>

                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection