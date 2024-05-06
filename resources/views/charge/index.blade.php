@extends('dashboard.main')

@section('content')
            <div class="card">
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

                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>titre</th>
                                <th>montant</th>
                                <th>date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($charges as $charge)
                            <tr>
                                <td>{{ $charge->titre }}</td>
                                <td>{{ $charge->montant }}</td>
                                <td>{{ $charge->date }}</td>
                                <td>
                                    <div class="d-flex">
                                        <a href="{{ route('charges.add', $charge->id) }}" class="btn btn-outline-primary btn-sm mx-1"><i class="fas fa-edit"></i></a>
                                        <a href="{{ route('charges.showChargeDetail', $charge->id) }}" class="btn btn-outline-primary btn-sm mx-1"><i class="fa-solid fa-eye"></i></a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>titre</th>
                                <th>montant</th>
                                <th>date</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>

<!-- END: Main Page Content -->
@endsection