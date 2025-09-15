@extends('layout.admin')
@section('body')
    <h1>Authors</h1>
    <div>
        <a class="btn btn-success" href="{{ route('authors.create') }}">Insert New Author</a>
    </div>
    <br>
    <br>

    <table class="table table-hover table-striped">
        <thead class="table-dark ">
            <tr>
                <th>Author Name</th>
                <th>Title</th>
                <th>Content</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $datas)
                @foreach ($datas->posts as $post)
                    <tr>
                        <td>{{ $datas->name }}</td>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->content }}</td>
                        <td>
                            <a href="" type="button" class="btn btn-info">View</a>
                            <a href="" class="btn btn-success">Edit</a>
                            <a href="" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                @endforeach
            @endforeach
        </tbody>
    </table>
@endsection
