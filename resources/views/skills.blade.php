@extends('layout.admin')

@section('body')
    <style>
        .btn-secondary {
            margin: 10px;
        }

        h1 {
            font-family: Verdana, Geneva, Tahoma, sans-serif;
        }

        table,
        th,
        td {
            border: 2px solid black;
        }

        tr:hover {
            background-color: #837f7fff;
        }

        th {
            background-color: #5a5e5aff;
            color: white;
        }

        table {
            width: 100%;
        }

        th,
        td {
            text-align: center;
        }

        tr:nth-child(even) {
            background-color: #b5adadff;
        }

        #insert {

            width: 20%;

            padding: 5px;
            margin: 5px;

        }

        a {
            text-decoration: none;
            color: #273043;

        }

        a:hover {
            color: #9197ae;
        }
    </style>
    <h1>Skills</h1>
    <a href="{{ route('skills.create') }}" class="btn btn-primary">Insert New Skill</a>

    <table class="table table-striped table-bordered align-middle">
        <thead class="table-dark">
            <tr>
                <th>User's Name</th>
                <th>Skill Name</th>
                <th>Skill Category</th>
                <th>Skill Level</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $value)
                <tr>
                    <td>Username</td>
                    <td>{{ $value->skill_name }}</td>
                    <td>{{ $value->skill_category }}</td>
                    <td>{{ $value->skill_level }}</td>
                    <td>now</td>
                    <td>now</td>
                    <td>
                        <a href="" type="button" class="btn btn-info">View</a>
                        <a href="" class="btn btn-success">Edit</a>
                        <a href="" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $(document).ready(function() {
            $(".btn-danger").click(function() {
                let id = $(this).data("id");
                const row = $(this).closest("tr");

                Swal.fire({
                    title: "Are you sure you want to delete this skill?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, delete it!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: "/core_php/collab-training/routes.php?route=skills&action=delete",
                            type: "POST",
                            data: {
                                skill_id: id
                            },
                            success: function(response) {
                                let res = JSON.parse(response);
                                if (res.status === "success") {
                                    Swal.fire(
                                        "Deleted!",
                                        "Deletion successful.",
                                        "success"
                                    );
                                    row.hide();
                                } else {
                                    Swal.fire(
                                        "Error!",
                                        "Deletion failed: " + res.message,
                                        "error"
                                    );
                                }
                            }
                        });
                    }
                });
            });
        });
    </script>
@endsection
