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

    #save {
        margin-top: 10px;
        width: 30%;
        border-radius: 10px;
    }


</style>
    <!DOCTYPE html>
    <html>

    <head>
        <title>Add Author & Post</title>
    </head>

    <body>
        <h1>Add Author and Their Post</h1>

        @if ($errors->any())
            <div style="color:red;">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('authors.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Author Name:</label>
                <input type="text" name="name" class="form-control" id="name" placeholder="Enter the author name" value="{{old('name')}}">
            </div>

            <div class="mb-3">
                <label for="title" class="form-label">Post Title:</label>
                <input type="text" name="title" class="form-control" id="title" placeholder="Enter the post title" value={{old('title')}}>
            </div>

            <div class="mb-3">
            <label class="form-label">Post Content:</label>
            <textarea name="content" required class="form-control" placeholder="Enter the post contents" value="{{old('content')}}"></textarea><br><br>
            </div>

            <button type="submit" class="btn btn-success" id="save">Save</button>
        </form>
    </body>

    </html>

@endsection
