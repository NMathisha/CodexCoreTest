@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Login</div>

                <div class="card-body">


                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>


                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">


                            </div>
                        </div>



                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">

                                <button type="button" class="btn btn-primary" onclick="login.login()" >Log In</button>


                            </div>
                        </div>

                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="{{ URL::asset('assets/js/jquery-3.3.1.min.js')}}"></script>


    {{-- <script type="text/javascript" src="{{ URL::asset('assets/js/popper.min.js')}}"></script> --}}

    <script type="text/javascript" src="{{ URL::asset('assets/js/main.js')}}"></script>
    <script type="text/javascript" src="{{ URL::asset('assets/js/login/login.js')}}"></script>

@endsection
