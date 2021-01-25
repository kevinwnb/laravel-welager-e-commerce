@extends('layouts/main-layout')
@section('body-content')
    <div id="app">
        <div style="background-color: #F0F0F0;">
            <div id="absoluter" onclick="closeNav()">
            </div>
            <nav-component></nav-component>
            <buy-now-component product-param="{{ $product }}"></buy-now-component>
        </div>
    </div>
    <script src="js/app.js"></script>
@endsection
