@extends('layouts.app')
@section('content')
<!-- <div class="bg-belakang" style="background-color: #ffcccc;"> -->
<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-8 ftco-animate">
                <form action="register" method="POST" class="billing-form bg-login p-3 p-md-5">
                    @csrf
                    <h3 class="mb-4 billing-heading">Form Register</h3>
                    <div class="row align-items-end">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="email">Nama Depan</label>
                                <input type="text" name='first_name' required class="form-control" placeholder="Masukkan Nama Depan Anda">
                            </div>

                            <div class="form-group">
                                <label for="email">Nama Belakang</label>
                                <input type="text" name='last_name' required class="form-control" placeholder="Masukkan Nama Belakang Anda">
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" name='email' required class="form-control" placeholder="Masukkan Email Anda">
                            </div>

                            <div class="form-group">
                                <label for="kata_sandi">Password</label>
                                <input type="password" name='password' required class="form-control" placeholder="Masukkan Password Anda">
                            </div>

                            <div class="form-group">
                                <label for="kata_sandi">Confirm Password</label>
                                <input type="password" name='password_confirmation' required class="form-control" placeholder="Masukkan Password Anda">
                            </div>

                        </div>

                    </div>
                    <p><button type="submit" class="btn btn-primary py-3 px-4">Registrasi</button></p>
                </form>
                <a href="/login">Sudah punya akun ?</a>
            </div>
            <!-- .col-md-8 -->
        </div>
    </div>
</section>
<!-- </div> -->
@endsection