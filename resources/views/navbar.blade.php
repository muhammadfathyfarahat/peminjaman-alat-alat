@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <h3>Dashboard</h3>

    <div class="row">
        <div class="col-md-3">
            <div class="card bg-info">
                <div class="card-body">
                    <h5>Total Alat</h5>
                    <h3>{{ \App\Models\Alat::count() }}</h3>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection