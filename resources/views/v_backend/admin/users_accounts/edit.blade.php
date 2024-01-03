@extends('v_layouts.app')
@section('roles', 'Admin')
@section('title', 'Users Account | Edit | '. $data->name)
@section('content')
<div class="row">

    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
              <h5 class="card-title">User Account Update</h5>
              <form class="row g-3" action="/users_accounts/update/{{ $data->id }}" method="post">
                @csrf
                @method('PUT')
                <div class="col-md-12">
                  <label for="inputName5" class="form-label">Name</label>
                  <input name="name" value="{{ old('name', $data->name) }}" type="text" class="form-control" id="inputName5">
                </div>
                <div class="col-md-6">
                  <label for="inputEmail5" class="form-label">Email</label>
                  <input name="email" value="{{ old('email', $data->email) }}" type="email" class="form-control" id="inputEmail5">
                </div>
                <div class="col-md-6">
                  <label for="inputPassword5" class="form-label">Password</label>
                  <input name="password" type="password" class="form-control" id="inputPassword5">
                </div>
                <div class="col-md-4">
                  <label for="inputState" class="form-label">Roles</label>
                  <select name="roles" id="inputState" class="form-select">
                    <option value="1" {{ old('roles', $data->roles) == 1 ? 'selected' : '' }}>ADMIN</option>
                    <option value="2" {{ old('roles', $data->roles) == 2 ? 'selected' : '' }}>USER</option>
                  </select>
                </div>
                <div class="text-end">
                  <button type="submit" class="btn btn-primary"> <i class="ri-user-shared-2-fill"></i> Update</button>
                  <a href="{{ url('/users_accounts') }}" class="btn btn-secondary">Back</a>
                </div>
              </form>
            </div>
          </div>
        </div>
    </div>
</div>
@endsection
