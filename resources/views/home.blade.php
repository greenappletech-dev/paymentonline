@extends('layouts.main')

@extends('layouts.header')

@section('content')
<div  id="app">
    <home-component :district="{{$district}}"></home-component>
</div>




@stop

@extends('layouts.footers')