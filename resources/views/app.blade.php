@extends('wrapper')
@section('stylesheet')
    <link rel="stylesheet" href="{{ asset('extjs/classic/theme-classic/resources/theme-classic-all.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
@endsection
@section('javascript')
    @if(env('APP_DEBUG'))
        <script src="{{ asset('extjs/ext-all-debug.js') }}" type="text/javascript"></script>
    @else
        <script src="{{ asset('extjs/ext-all.js') }}" type="text/javascript"></script>
    @endif
    <script src="{{ asset('extjs/classic/locale/locale-es.js') }}" type="text/javascript"></script>
    <script src="{{ asset('app/app.js')}}" type="text/javascript"></script>
@endsection