@extends('layout.admin')
@section('body')
<h1>Edit {{$edit->skill_name}}'s data</h1>
    <form action="" enctype="multipart/form-data" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="" class="form-label">Skill Name</label>
            <input type="text" name="skill_name" id="" class="form-control" value="{{old('skill_name',$edit->skill_name)}}">
        </div>

        <div class="mb-3">
            <label for="level" class="form-label">Skill Level:</label>
            <select name="level" id="level" class="form-control">
                <option value="">{{ old('level', $edit->skill_level) }}</option>
                @foreach (\App\Models\Skills::levels as $level)
                    <option value="{{ $level }}" {{ old('level', $edit->skill_level) == $level ? 'selected' : '' }}>
                        {{ ucfirst($level) }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="category" class="form-label">Skill category:</label>
            <select name="category" id="category" class="form-control">
                <option value="">{{ old('category', $edit->skill_category) }}</option>
                @foreach (\App\Models\Skills::categories as $category)
                    <option value="{{ $category }}" {{ old('category', $edit->skill_category) == $category ? 'selected' : '' }}>
                        {{ ucfirst($category) }}
                    </option>
                @endforeach
            </select>
        </div>

    </form>
@endsection
