@extends('layouts.apps')

@section('title', 'Detail')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="btn-toolbar justify-content-between" role="toolbar" aria-label="Toolbar with button groups">
                <div class="display-group">
                    <h2 class="display-5">User</h2>
                </div>
                <div class="btn-group-sm" role="group" aria-label="btn-mixed-outline">
                    <a href="/admin/user" class="btn btn-primary">Kembali ke list user</a>
                </div>
            </div>
            <div class="card text">
                <h5 class="card-header">Detail</h5>
                <fieldset disabled>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Your Name" name="name" value="{{ $user->name }}">
                                </div>
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" placeholder="Your username" name="username" value="{{ $user->username }}">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Your email" name="email" value="{{ $user->email }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="text" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Your password" name="password" value="{{ $user->password }}">
                                </div>
                                <div class="form-group">
                                    <label for="role_id">Role_id</label>
                                    <input type="text" class="form-control @error('role_id') is-invalid @enderror" id="role_id" placeholder="Your role_id" name="role_id" value="{{ $user->role_id }}">
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <input type="submit" class="btn btn-primary" value="Submit"></button>
                            <a href="/admin/user" type="button" class="btn btn-danger">Cancel</a>
                        </div>
                        </form>
                    </div>
                </fieldset>
            </div>
        </div>
    </div>
</div>
@endsection