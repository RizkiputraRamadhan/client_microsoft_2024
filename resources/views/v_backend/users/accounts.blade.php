@extends('v_layouts.app')
@section('roles', 'Users')
@section('title', 'Account | '. $data->name)
@section('content')
<div class="row">

    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
              <h5 class="card-title">Account Update</h5>
              <form class="row g-3" action="/accounts/update/{{ $data->id }}" method="post">
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
                
                <div class="text-end">
                  <button type="submit" class="btn btn-primary"> <i class="ri-user-shared-2-fill"></i> Update</button>
                </div>
              </form>
            </div>
          </div>
        </div>
    </div>
</div>
@endsection
