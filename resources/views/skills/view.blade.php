@extends('layout.admin')
@section('body')

<h1>{{$view->skill_name}}'s data</h1>

<table class="table table-striped table-bordered align-middle">
    <tr>
        <th class="table-dark">Skill Name</th>
        <td>{{$view->skill_name}}</td>
    </tr>
     <tr>
        <th class="table-dark">Skill Category</th>
        <td>{{$view->skill_category}}</td>
    </tr>
     <tr>
        <th class="table-dark">Skill Level</th>
        <td>{{$view->skill_level}}</td>
    </tr>
</table>
@endsection
