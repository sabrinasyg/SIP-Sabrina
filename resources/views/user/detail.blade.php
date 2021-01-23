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
                        <div class="photo">
                            <img class="rounded-circle mx-auto d-block" src="{{ asset('img/'.$user->img) }}" alt="Card image cap" style="width: 20%; height: 20%; border-radius: 50%;">
                            <p class="text-center"><a href="{{ asset('img/'.$user->img) }}" download>Download Photo</a></p>
                        </div>
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
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Your password" name="password" value="{{ $user->password }}">
                                </div>
                                <div class="form-group">
                                    <label for="address">Address</label>
                                    <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" id="address" placeholder="Your address" name="address" value="{{ $user->address }}">
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
                                </div>
                                <div class="form-group">
                                    <label for="department">Department</label>
                                    <select class="form-control @error('department') is-invalid @enderror" id="department" name="department" value="{{ $user->department }}">
                                        <option value="-">-Select-
                                        <option value="IPA">IPA</option>
                                        <option value="IPS">IPS</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="role_id">Role_id</label>
                                    <input type="text" class="form-control @error('role_id') is-invalid @enderror" id="role_id" placeholder="Your role_id" name="role_id" value="{{ $user->role_id }}">
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>
                </fieldset>
                <div class="card-footer">
                    <a class="btn btn-warning" href="{{ route('user.edit',$user->id) }}" style="margin-left: 45%">Edit Data</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection