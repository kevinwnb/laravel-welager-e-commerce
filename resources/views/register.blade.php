@extends('layouts/main-layout')
@section('body-content')
<div id="app">
    <div id="absoluter" onclick="closeNav()">
    </div>
    <nav-component></nav-component>
    <register-component></register-component>
</div>
<script src="js/app.js"></script>
@endsection
