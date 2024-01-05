@extends('v_layouts.app_frondend')
@section('title', 'Login')
@section('content')
<div class="hero min-h-screen bg-base-200">
    <div class="hero-content flex-col lg:flex-row-reverse">
      <div class="text-center lg:text-left">
        <h1 class="text-5xl font-bold">Login now!</h1>
        <p class="py-6">Provident cupiditate voluptatem et in. Quaerat fugiat ut assumenda excepturi exercitationem quasi. In deleniti eaque aut repudiandae et a id nisi.</p>
      </div>
      <div class="card shrink-0 w-full max-w-sm shadow-2xl bg-base-100">
        <form class="card-body" action="/login" method="post">
            @csrf
            <div class="form-control">
                <label class="label">
                    <span class="label-text">Email</span>
                </label>
                <input name="email" type="email" placeholder="email" class="input input-bordered" value="{{ old('email') }}" required />
                @error('email')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-control">
                <label class="label">
                    <span class="label-text">Password</span>
                </label>
                <input name="password" type="password" placeholder="password" class="input input-bordered" required />
                @error('password')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-control mt-6">
                <button class="btn btn-primary">Login</button>
            </div>
        </form>        
      </div>
    </div>
  </div>
@endsection