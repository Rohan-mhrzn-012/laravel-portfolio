@extends('layout.admin')
@section('body')

    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    </head>
    <style>
        .btn-warning {
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
    <h1>Experience</h1>
    <a href="{{route('experience.create')}}" class="btn btn-warning">Insert New Experience</a>

    <table class="table table-striped table-bordered align-middle">
        <thead class="table-dark">
            <tr>
                <th>User Name</th>
                <th>Title</th>
                <th>Organization</th>
                <th>Location</th>
                <th>Description</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $datas)
                <tr>
                    <td>Pradeep</td>
                    <td>{{ $datas->title }}</td>
                    <td>{{ $datas->organization }}</td>
                    <td>{{ $datas->location }}</td>
                    <td>{{ $datas->description }}</td>
                    <td>{{ $datas->start_date }}</td>
                    <td>{{ $datas->end_date }}</td>
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
                    title: "Are you sure you want to delete this experience?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, delete it!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: "/core_php/collab-training/routes.php?route=experience&action=delete",
                            type: "POST",
                            data: {
                                exp_id: id
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
