@extends('layouts.appadmin')

@section('content')

<div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('home')}}">Home</a>
        </li>
        <li class="breadcrumb-item active">Pacotes</li>
    </ol>
    <div class="row">
        @if(Auth::user()->tipo==1)
            <div class="col-lg-12">
                <h1>Blank</h1>
                <p>This is an example of a blank page that you can use as a starting point for creating new ones.</p>
            </div>
        @endif
        <div class="col-lg-12">
            <h1>Blank</h1>
            <p>This is an example of a blank page that you can use as a starting point for creating new ones.</p>
        </div>
    </div>
</div>
@endsection
