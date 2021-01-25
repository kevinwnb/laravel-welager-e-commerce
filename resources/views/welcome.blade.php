@extends('layouts/main-layout')

@section('body-content')

    <div id="app">
        <div id="absoluter" onclick="closeNav()">
        </div>
        <nav-component></nav-component>
        <welcome-products-component></welcome-products-component>
    </div>
    <script src="js/app.js"></script>
@endsection
