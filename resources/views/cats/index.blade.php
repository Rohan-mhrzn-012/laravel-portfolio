@extends('layout.admin')
@section('body')
<h1>Biralo</h1>
<img src="{{$url}}" alt="cat" style="max-height:400px;">
<br><br>
<a href="{{url('/cats')}}" class="btn btn-secondary">Arko Biralo</a>
@endsection
