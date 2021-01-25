@extends('layouts/main-layout')
@section('body-content')
<div id="app">
    <div id="absoluter" onclick="closeNav()">
    </div>
    <nav-component search_string="" category_id="{{$category_id}}"></nav-component>
    <browse-component productsparam="{{$products}}"></browse-component>
</div>
<script src="../js/app.js"></script>
@endsection
