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
<h2>Add new experience</h2>
<form action="/experience/create" method="POST">
    @csrf
    <div style="color:red">
        @if($errors->any())
        <ul>
        @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
        </ul>
        @endif
    </div>
    <div class="mb-3">
        <label for="username">Username:</label>
        <select name="username" id="username" class="form-select" aria-label="Default select example" value="{{old('username')}}">
            <option value="">Select the username:</option>
        </select>
    </div>

    <div class="mb-3">
        <label for="title" class="form-label">Title:</label>
        <input type="text" class="form-control" name="title" id="title" value="{{old('title')}}" placeholder="Enter the title of the experience">
    </div>

    <div class="mb-3">
        <label for="organization" class="form-label">Organization:</label>
        <input type="text" class="form-control" name="organization" id="organization" value="{{old('organization')}}" placeholder="Enter the name of the organization">
    </div>

    <div class="mb-3">
        <label for="location" class="form-label">Location:</label>
        <input type="text" class="form-control" name="location" id="location" value="{{old('location')}}" placeholder="Enter the location of the organization">
    </div>

    <div class="mb-3">
        <label for="description" class="form-label">Description:</label>
        <input type="text" class="form-control" name="description" id="description" value="{{old('description')}}" placeholder="Enter the description">
    </div>

    <label for="start_date">Start Date:</label>
    <input type="date" id="start_date" name="start_date" value="{{old('start_date')}}" class="form-control">

    <label for="end_date">End Date:</label>
    <input type="date" id="end_date" name="end_date" value="{{old('end_date')}}" class="form-control">

    <button type="submit" id="update_btn" class="btn btn-success" >Add new experience details</button>

</form>
@endsection
