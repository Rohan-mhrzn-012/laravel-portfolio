@extends('layout.admin')
@section('body')
    <style>
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

    <h1>Projects</h1>
    <div id="insert">
        <a class="btn btn-dark" href="{{route('projects.create')}}">Insert New
            Project</a>
    </div>



    <table class="table table-hover table-striped">
        <thead class="table-dark ">
            <tr>
                <th>Project Name</th>
                <th>User Name</th>
                <th>Project Description</th>
                <th>Status</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($datas as $data)
                <tr>
                    <td>{{ $data->name }}</td>
                    <td>Pradeep</td>
                    <td>{{ $data->description }}</td>
                    <td>{{ $data->status }}</td>
                    <td>{{ $data->start_date }}</td>
                    <td>{{ $data->end_date }}</td>
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
                    title: "Are you sure you want to delete this project?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, delete it!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: "/core_php/collab-training/routes.php?route=project&action=delete",
                            type: "POST",
                            data: {
                                project_id: id
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
