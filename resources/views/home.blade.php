@extends('layouts.main')

@extends('layouts.header')

@section('content')
<div  id="app">
    <home-component :district="{{$district}}" :mode_payment="{{$mode_payment}}"></home-component>
</div>
@stop

@extends('layouts.footers')