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
                    <form method="POST" action="/admin/user/{{ $user->id }}" enctype="multipart/form-data">
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
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Your password" name="password" value="{{ $user->password }}">
                                    @error('password')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="address">Address</label>
                                    <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" id="address" placeholder="Your address" name="address" value="{{ $user->address }}">
                                    @error('address')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="grade">Grade</label>
                                    <select class="form-control @error('grade') is-invalid @enderror" id="grade" name="grade" value="{{ $user->grade }}">
                                        <option value="-">-Select-
                                        <option value="Kelas 10">Kelas 10</option>
                                        <option value="Kelas 11">Kelas 11</option>
                                        <option value="Kelas 12">Kelas 12</option>
                                    </select>
                                    @error('grade')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="department">Department</label>
                                    <select class="form-control @error('department') is-invalid @enderror" id="department" name="department" value="{{ $user->department }}">
                                        <option value="-">-Select-
                                        <option value="IPA">IPA</option>
                                        <option value="IPS">IPS</option>
                                    </select>
                                    @error('department')
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
                                <div class="form-group">
                                    <label for="img">Photo</label>
                                    <input type="file" class="form-control" name="img" value="{{ $user->img }}">
                                    @error('img')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <input type="submit" class="btn btn-primary" value="Submit" style="margin-left: 40%"></button>
                            <a href="/admin/user" type="button" class="btn btn-danger">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection