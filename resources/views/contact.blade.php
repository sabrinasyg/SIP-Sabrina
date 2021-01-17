@extends('layouts.app')

@section('title', 'Contact Page')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1 style="text-align: center;">Contact Us</h1><br>
            @csrf
            <form>
                <div class="form-group row">
                    <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nama" placeholder="Masukkan Nama Anda...">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="mail" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="mail" placeholder="Masukkan Email Anda...">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="pesan" class="col-sm-2 col-form-label">Message</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" id="pesan" rows="3"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10" style="align-items: center;">
                        <button type="submit" class="btn btn-primary" style="margin-left: 55%;">Submit</button>
                    </div>
                </div>
                <footer class="blockquote-footer">2021 SMA N 59 Jakarta</footer>
            </form>
        </div>
    </div>
</div>

@endsection