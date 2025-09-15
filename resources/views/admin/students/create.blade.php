@extends('layout.admin')
@section('body')
    <!DOCTYPE html>
    <html>

    <head>
        <title>Add Student</title>
    </head>

    <body>
        <h1>Add Student with Phone</h1>

        @if ($errors->any())
            <div>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('students.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label">Name:</label>
                <input type="text" name="name" required placeholder="Enter your name"class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label">Email:</label>
                <input type="email" name="email" required placeholder="Enter your email"class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label">Phone Number:</label>
                <input type="text" name="phone_number" placeholder="enter your phone number"class="form-control">
            </div>

            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </body>

    </html>

@endsection
