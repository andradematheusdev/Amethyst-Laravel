@extends('layouts.main')

@section('css')
    <link rel="stylesheet" href="css/home.css">
@endsection

@section('title' , 'Início')

@section('content')


    <div class="container">
        <div class="row mb-1">
            <div class="col-md-4 col-sm-12 home-card">
                <div class="card text-white bg-primary mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Disputas Hoje:</h5>
                        <p class="card-text text-center">
                            <b> {{ $pregs_today }} </b>
                        </p>
                        <p class="card-text">
                        <div class="d-grid">
                            <button class="btn btn-outline-light btn-block rounded">VER DISPUTAS</button>
                        </div>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-12 home-card">
                <div class="card text-white bg-success mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Disputas Futuras:</h5>
                        <p class="card-text text-center">
                            <b>{{ $pregs_next}}</b>
                        </p>
                        <p class="card-text">
                        <div class="d-grid">
                            <button class="btn btn-outline-light btn-block rounded">VER DISPUTAS</button>
                        </div>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-12 home-card">
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Novas Licitações:</h5>
                        <p class="card-text text-center">
                            <b>76</b>
                        </p>
                        <p class="card-text">
                        <div class="d-grid">
                            <button class="btn btn-outline-primary btn-block rounded">VER NOVAS</button>
                        </div>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
