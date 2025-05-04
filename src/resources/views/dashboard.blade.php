@extends('vendor.starter-kit.layouts.app')

@section('content')
    <div class="card">
        <div class="card-body">
            <h1>Bem-vindo ao Painel</h1>
            <p>Você está logado como {{ Auth::user()->name }}</p>
        </div>
    </div>
@endsection
