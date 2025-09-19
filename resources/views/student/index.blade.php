<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Students</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB"
        crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('/css/app.css') }}">

    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body class="bg-light">

    <div class="container py-4">
        <h1 class="mb-4">Students and Their Courses</h1>
        <a href="{{ route('student.create') }}" class="btn btn-success mt-3">
            + Add New Student
        </a><br><br>

        <div class="mb-3" style="width: 300px; border: 1px solid black; border-radius: 5px;">
            <input type="text" id="search" class="form-control" placeholder="Search student...">
        </div>

        <table class="table table-striped table-bordered align-middle">
            <thead class="table-dark">
                <tr>
                    <th>User Name</th>
                    <th>Age</th>
                    <th>Phone Number</th>
                    <th>Courses</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody id="student-table-body">
                @forelse($students as $student)
                <tr>
                    <td>{{ $student->fullname }}</td>
                    <td>{{ $student->age }}</td>
                    <td>{{ $student->phone }}</td>
                    <td>
                        <ul class="mb-0">
                            @forelse($student->course as $course)
                            <li><strong>{{ $course->title }}</strong></li>
                            @empty
                            <li>No Courses</li>
                            @endforelse
                        </ul>
                    </td>

                    <td class="text-center">
                        <a href="{{ route('student.edit', $student) }}"
                            class="btn btn-sm btn-primary me-1">
                            <i class="bi bi-pencil"></i> Edit
                        </a>

                        <a href="{{route('student.view', $student) }}" class="btn btn-sm btn-primary me-1">View</a>

                        <a href="#" class="btn btn-danger btn-sm delete-user" data-id="{{$student->id}}" data-bs-toggle="modal" data-bs-target="#userDeleteModal">
                            <i class="bi bi-trash"></i> Delete
                        </a>


                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center">No students found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>


    </div>

    <div class="modal fade" id="userDeleteModal" tabindex="-1" aria-labelledby="userDeleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="userDeleteModalLabel">User Delete</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Do you want to delete?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-danger" id="confirm-delete">Delete</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>



    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        let destroyUrl = "{{route('student.destroy', ':id')}}";

        $(function() {
            let studentId = null;
            let studentrow = null;

            $('.delete-user').on('click', function() {
                studentId = $(this).data('id');
                studentrow = $(this).closest('tr');
            });

            $('#confirm-delete').on("click", function() {
                $.ajax({
                    url: destroyUrl.replace(':id', studentId),
                    type: 'Delete',
                    data: {
                        _token: $('meta[name="csrf-token"]').attr("content")
                    },
                    success: function(response) {
                        if (response.success) {
                            studentrow.remove();
                            $('#userDeleteModal').modal('hide');
                        }
                    },
                    error: function() {
                        alert("Error deleting students");
                    }
                });
            });

        });


       
    </script>

    <!-- search -->
    <script> 
    $(function() {
            $('#search').on('keyup', function() {
                let query = $(this).val();

                $.ajax({
                    url: "{{route('student.search')}}",
                    type: 'Get',
                    data: {
                        query: query
                    },
                    success: function(student) {
                        let rows = "";
                        if (student.length > 0) {
                            student.forEach(function(student) {
                                
                                let courses = "";
                                student.course.forEach(function(course){
                                    courses += course.title;
                                })  
                                rows += `

                            <tr>
                                <td>${student.fullname}</td>
                                <td>${student.age}</td>
                                <td>${student.phone}</td>

                                <td>
                                
                                ${courses}</td>
                                <td>
                                    <a href="{{ route('student.edit', $student) }}"
                                        class="btn btn-sm btn-primary me-1">Edit
                                    </a>

                                    <a href="{{route('student.view', $student) }}" class="btn btn-sm btn-primary me-1">View</a>

                                    <a href="#" class="btn btn-danger btn-sm delete-user" data-id="{{$student->id}}" data-bs-toggle="modal" data-bs-target="#userDeleteModal">
                                     Delete
                                    </a>
                                </td>
                            </tr>

                        `;
                        
                            });
                        } else {
                            rows = `<tr><td colspan="5" class="text-center">No students found.</td></tr>`;
                        }
                        $("#student-table-body").html(rows);
                    }
                })
            });


        });</script>

</body>

</html>