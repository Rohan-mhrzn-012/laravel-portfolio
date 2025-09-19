<!DOCTYPE html>
<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('/css/app.css') }}">
</head>
<body>
<h1 class="mb-4">Courses and their Students</h1>

<table class="table table-striped table-bordered align-middle">
    <thead class="table-dark">
        <tr>
            <th>Course Title</th>
            <th>Name</th>
            <th>Age</th>
            <th>Phone</th>
        </tr>
    </thead>
    <tbody>
        @foreach($courses as $course)
            @forelse($course->students as $student)
                <tr>
                    <td>{{ $course->title }}</td>
                    <td>{{ $student->fullname }}</td>
                    <td>{{ $student->age }}</td>
                    <td>{{ $student->phone }}</td>
                </tr>
            @empty
                <tr>
                    <td>{{ $course->title }}</td>
                    <td colspan="3">No Student</td>
                </tr>
            @endforelse
        @endforeach
    </tbody>
</table>

<!-- <a href="{{ url('/student_create') }}" class="{{ request()->is('student_create') ? 'active' : '' }}">
    Create Student
</a> -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>
