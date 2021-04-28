@extends('layouts.app')
@section('content')
<!-- <div class="bg-belakang" style="background-color: #ffcccc;"> -->
<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-8 ftco-animate">
                <form action="#" class="billing-form bg-login p-3 p-md-5">
                    <h3 class="mb-4 billing-heading">Form Register</h3>
                    <div class="row align-items-end">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" class="form-control" placeholder="Masukkan Email Anda">
                            </div>

                            <div class="form-group">
                                <label for="kata_sandi">Password</label>
                                <input type="password" class="form-control" placeholder="Masukkan Password Anda">
                            </div>

                            <div class="form-group">
                                <label for="kata_sandi">Confirm Password</label>
                                <input type="password" class="form-control" placeholder="Masukkan Password Anda">
                            </div>

                        </div>

                    </div>
                </form>
                <div class="form-group">
                    <div class="col-md-12">
                        <div class="checkbox">
                            <label><input type="checkbox" value="" class="mr-2"> I have read and accept
                                the terms and conditions</label>
                        </div>
                    </div>
                </div>
                <p><a href="#" class="btn btn-primary py-3 px-4">Login</a></p>
                <a href="/login">Have any account ?</a>
            </div>
            <!-- .col-md-8 -->
        </div>
    </div>
</section>
<!-- </div> -->
@endsection