@extends('layout.admin')
@section('body')
<style>
    form {
        display: grid;
        margin: 30px;
    }

    input {
        margin: 10px 0px 10px 0;
    }

    #update_btn {
        margin-top: 10px;
        width: 30%;
        border-radius: 10px;
    }

    button:hover {
        background-color: #4c4f4cff;
        color: white;
    }
</style>

<h1>Create new Project</h1>

<form action="/projects/create" method="POST" enctype="multipart/form-data">
    @csrf
    @if ($errors->any())
    <div style="color: red">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach ()
        </ul>
    </div>
    @endif
    <div class="mb-3">
        <label for="name" class="form-label">Project Name:</label>
        <input type="text" class="form-control" name="name" id="name" placeholder="Enter project name" value="{{old("name")}}">
    </div>

    <div class="mb-3">
        <label for="description" class="form-label">Project Description:</label>
        <input type="text" class="form-control" name="description" id="description" placeholder="Enter project details" value="{{old("description")}}">
    </div>

    <label for="start date">Start Date:</label>
    <input type="date" id="start_date" name="start_date" value="{{old("start_date")}}" class="form-control">

    <label for="end date">End Date:</label>
    <input type="date" id="end_date" name="end_date" value="{{old('end_date')}}" class="form-control">

     <label for="status">Project Status:</label>
    <select name="status" id="status" class="form-select">
        <option value="{{old('status')}}">Select the project status</option>
        @foreach(\App\Models\Project::statuses as $status)
                <option value="{{$status}}">{{ucfirst($status)}}</option>
            @endforeach
    </select>

    <label for="Username">User:</label>
    <select name="username" id="username" class="form-select">
        <option value=""> Select a username </option>

    </select>

    <div class="mb-3">
        <label for="project_image" class="form-label"></label>
        <input class="form-control" type="file" id="formFile" accept="image/*" name="project_image" id="project_image">
    </div>

    <button type="submit" id="update_btn" class="btn btn-success">Add new Project details</button>
</form>
@endsection
