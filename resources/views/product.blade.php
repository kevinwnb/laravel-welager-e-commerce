@extends('layouts/main-layout')
@section('body-content')
    <div id="app">
        <div id="absoluter" onclick="closeNav()">
        </div>
        <nav-component search_string="{{ $search_string ?? '' }}" category_id="{{ $category_id ?? null }}"></nav-component>
        <product-component ship_to="{{ $ship_to }}" productparam="{{ $product }}"></product-component>
    </div>
    <script src="../js/app.js"></script>
@endsection
