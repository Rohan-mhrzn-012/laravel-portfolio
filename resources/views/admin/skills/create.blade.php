
@extends('layout.admin')
@section('body')
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
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
<h2>Add new Skill</h2>
<form action="#" method="POST">
    @csrf
    @if($errors->any())
    <div style="color:red">
        <ul>
            @foreach($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>

    @endif
    <div class="mb-3">
    <label for="username">Username:</label>
    <select name="username" id="username" class="form-select" aria-label="Default select example" value="{{old('username')}}">
        <option value="">Select a username</option>

    </select>
    </div>

    <div class="mb-3">
        <label for="skill_name" class="form-label">Skill Name:</label>
        <input type="text" class="form-control" name="skill_name" id="skill_name" value="{{old('skill_name')}}" placeholder="Enter the skill name">
    </div>

    <div class="mb-3">
        <label for="skill_category" class="form-label">Skill Category:</label>
        <select name="skill_category" id="skill_category" class="form-select" aria-label="Default select example" value="{{old('skill_category')}}">
            <option value="">Select the skill category:</option>
            @foreach(\App\Models\Skills::categories as $category)
                <option value="{{$category}}">{{ucfirst($category)}}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="skill_level">Skill Level:</label>
        <select name="skill_level" id="skill_level" class="form-select" aria-label="Default select example" value="{{old('skill_level')}}" >
            <option value="">Select the skill level:</option>
            @foreach(\App\Models\Skills::levels as $level)
                <option value="{{$level}}">{{ucfirst($level)}}</option>
            @endforeach

        </select>
    </div>

    <label for="created_at">Created At:</label>
    <input type="date" id="created_at" name="created_at" value="" class="form-control">

    <label for="updated_at">Updated At:</label>
    <input type="date" id="updated_at" name="updated_at" value="" class="form-control">

    <button type="submit" id="update_btn" class="btn btn-success">Add new Skill details</button>

</form>
@endsection
