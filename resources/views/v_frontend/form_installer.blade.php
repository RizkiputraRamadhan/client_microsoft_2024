@extends('v_layouts.app_frondend')
@section('title', 'Login')
@section('content')
<div class="hero min-h-screen bg-base-200">
    <div class="hero-content flex-col lg:flex-row-reverse">
      <div class="text-center lg:text-left">
        <h1 class="text-5xl font-bold">Installer Aplikasi!</h1>
        <p class="py-6">Provident cupiditate voluptatem et in. Quaerat fugiat ut assumenda excepturi exercitationem quasi. In deleniti eaque aut repudiandae et a id nisi.</p>
      </div>
      <div class="card shrink-0 w-full max-w-sm shadow-2xl bg-base-100">
        <form class="card-body" action="/login" method="post">
            @csrf
            <div class="form-control">
                <label class="label">
                    <span class="label-text">Aplikasi</span>
                </label>
                <input name="aplikasi" type="aplikasi" placeholder="aplikasi" class="input input-bordered" value="{{ old('aplikasi') }}" required />
                @error('aplikasi')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-control">
                <label class="label">
                    <span class="label-text">Username</span>
                </label>
                <input name="username" type="username" placeholder="username" class="input input-bordered" value="{{ old('username') }}" required />
                @error('username')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-control">
                <label class="label">
                    <span class="label-text">Database</span>
                </label>
                <input name="database" type="database" placeholder="database" class="input input-bordered" value="{{ old('database') }}" required />
                @error('database')
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
                <button class="btn btn-primary">Install</button>
            </div>
        </form>        
      </div>
    </div>
  </div>
@endsection