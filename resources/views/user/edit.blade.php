@extends('layouts.apps')

@section('title', 'Edit Data')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="display-group">
                <h1 class="display-5">User</h1>
            </div>
            <div class="card text">
                <h5 class="card-header">Edit</h5>
                <div class="card-body">
                    <form method="POST" action="/admin/user/{{ $user->id }}">
                        @method('patch')
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Your Name" name="name" value="{{ $user->name }}">
                                    @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" placeholder="Your username" name="username" value="{{ $user->username }}">
                                    @error('username')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Your email" name="email" value="{{ $user->email }}">
                                    @error('email')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="text" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Your password" name="password" value="{{ $user->password }}">
                                    @error('password')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="role_id">Role_id</label>
                                    <input type="text" class="form-control @error('role_id') is-invalid @enderror" id="role_id" placeholder="Your role_id" name="role_id" value="{{ $user->role_id }}">
                                    @error('role_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <input type="submit" class="btn btn-primary" value="Submit"></button>
                            <a href="/admin/user" type="button" class="btn btn-danger">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection