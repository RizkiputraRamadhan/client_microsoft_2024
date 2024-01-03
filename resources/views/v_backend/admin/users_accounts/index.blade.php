@extends('v_layouts.app')
@section('roles', 'Admin')
@section('title', 'Users Account')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <!-- modal add user -->
                    <div class="modal fade" id="disablebackdrop" tabindex="-1" data-bs-backdrop="false">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Add User Accounts</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form method="post" class="row g-3" action="/users_accounts/store">
                                        @csrf
                                        <div class="col-md-12">
                                            <label for="inputName5" class="form-label">Name</label>
                                            <input type="text" name="name" class="form-control" id="inputName5"
                                                value="{{ old('name') }}">
                                            @error('name')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <label for="inputEmail5" class="form-label">Email</label>
                                            <input type="email" name="email" class="form-control" id="inputEmail5"
                                                value="{{ old('email') }}">
                                            @error('email')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <label for="inputPassword5" class="form-label">Password</label>
                                            <input type="password" name="password" class="form-control" id="inputPassword5">
                                            @error('password')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-md-4">
                                            <label for="inputState" class="form-label">Roles</label>
                                            <select name="roles" id="inputState" class="form-select">
                                                <option selected>Choose...</option>
                                                <option value="1" {{ old('roles') == '1' ? 'selected' : '' }}>Admin
                                                </option>
                                                <option value="2" {{ old('roles') == '2' ? 'selected' : '' }}>User
                                                </option>
                                            </select>
                                            @error('roles')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <h5 class="card-title">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#disablebackdrop">
                            Add Users <i class="bi bi-person-plus-fill"></i>
                        </button>
                    </h5>
                    <!-- Table with stripped rows -->
                    <table class="datatable table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Roles</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($datas as $data)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $data->name }}</td>
                                    <td>{{ $data->email }}</td>
                                    <td>
                                        @if ($data->roles == 1)
                                            <span class="badge bg-success">Admin</span>
                                        @else
                                            <span class="badge bg-danger">User</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="/users_accounts/edit/{{$data->id}}" class="btn btn-sm btn-warning">Edit</a>
                                        <form action="/users_accounts/delete/{{$data->id}}" method="post" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger"
                                                onclick="return confirm('Are you sure?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
