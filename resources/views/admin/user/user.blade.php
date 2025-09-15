@extends('admin')

@section('content')
<h1>Users</h1>
<table class="table table-striped table-bordered align-middle" id="user_table">
    
    <thead class="table-dark">
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th style="width: 190px;">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
            <tr>
                <input type="text" name="ids" value="id " hidden>
                <td>{{ $user->fullname }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    <a href="./index.php?page=edit-user&id=" class="btn btn-primary btn-sm me-1">
                        <i class="bi bi-pencil"></i> Edit
                    </a>
                    <a href="./index.php?page=view-user&id=" class="btn btn-info btn-sm me-1">
                        <i class="bi bi-eye"></i> View
                    </a>
                    {{--<?php if (in_array("Admin", $user_roles)): ?>--}}
                        <a href="#" class="btn btn-danger btn-sm delete-user" data-id=userid data-bs-toggle="modal" data-bs-target="#userDeleteModal">
                            <i class="bi bi-trash"></i> Delete
                        </a>
                   {{-- <?php endif; ?>--}}
                </td>
            </tr>
            @endforeach
    </tbody>
</table>


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
@endsection