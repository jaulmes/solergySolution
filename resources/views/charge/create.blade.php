@extends('dashboard.main')


@section('content')
<!-- BEGIN: Header -->
<header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
    <div class="container-xl px-4">
        <div class="page-header-content pt-4">
            <div class="row align-items-center justify-content-between">
                <div class="col-auto mt-4">
                    <h1 class="page-header-title">
                        <div class="page-header-icon"><i class="fa-solid fa-boxes-stacked"></i></div>
                        Add Product
                    </h1>
                </div>
            </div>


        </div>
    </div>
</header>
<!-- END: Header -->

<!-- BEGIN: Main Page Content -->
<div class="container-xl px-2 mt-n10">
    <form action="{{ route('charges.store') }}" method="POST" >
        @csrf
        <div class="row">


            <div class="col-xl-8">
                <!-- BEGIN: Product Details -->
                <div class="card mb-4">
                    <div class="card-header">
                        Product Details
                    </div>
                    <div class="card-body">
                        <!-- Form Group (product name) -->
                        <div class="mb-3">
                            <label class="small mb-1" for="titre">titre <span class="text-danger">*</span></label>
                            <input class="form-control form-control-solid @error('titre') is-invalid @enderror" id="titre" name="titre" type="text" placeholder="" value="{{ old('titre') }}" autocomplete="off"/>
                            @error('titre')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <!-- Form Row -->

                        <!-- Form Row -->
                        <div class="row gx-3 mb-3">
                            <!-- Form Group (buying price) -->
                            <div class="col-md-6">
                                <label class="small mb-1" for="montant">montant <span class="text-danger">*</span></label>
                                <input class="form-control form-control-solid @error('montant') is-invalid @enderror" id="montant" name="montant" type="text" placeholder="" value="{{ old('montant') }}" autocomplete="off" />
                                @error('montant')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <!-- Form Group (selling price) -->
                            <div class="col-md-6">
                                <label class="small mb-1" for="date">date <span class="text-danger">*</span></label>
                                <input class="form-control form-control-solid @error('date') is-invalid @enderror" id="date" name="date" type="date" placeholder="" value="{{ old('date') }}" autocomplete="off" />
                                @error('date')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>


                        <!-- Submit button -->
                        <button class="btn btn-primary" type="submit">Save</button>
                        <a class="btn btn-danger" href="{{ route('charges.index') }}">Cancel</a>
                    </div>
                </div>
                <!-- END: Product Details -->
            </div>
        </div>
    </form>
</div>
<!-- END: Main Page Content -->
@endsection
