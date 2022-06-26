@extends('layouts.app')

@section('content')

<div class="container mt-5">
    <div class="row d-flex justify-content-center">
        <div class="col-md-6">
            <form action="{{ route('register') }}" method="POST">
                @csrf
                <div class="card px-5 py-5" id="form1">
                    <div class="form-data">
                        <div class="forms-inputs mb-4"> <span>Name</span>
                            <input type="text" name="name" autocomplete="off" class="form-control @error('name')
                                is-invalid
                            @enderror" >
                            @error('name')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="forms-inputs mb-4"> <span>Email</span>
                            <input autocomplete="off" class="form-control @error('email')
                                is-invalid
                            @enderror" type="text" name="email">
                            @error('email')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="forms-inputs mb-4"> <span>Password</span>
                            <input autocomplete="off" class="form-control @error('password')
                                is-invalid
                            @enderror" type="password" name="password">
                            @error('password')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="forms-inputs mb-1"> <span>Confirm Password</span>
                            <input autocomplete="off" class="form-control" type="password" id="password-confirm" name="password_confirmation">

                        </div>

                        <div class="d-flex justify-content-end mb-4">
                            <a class="text-black-50" href="{{ route('login') }}">Already have an account? login</a>

                        </div>


                        <div class="mb-3">
                            <button type="submit" class="btn btn-dark w-100">Register</button>
                        </div>
                    </div>

                </div>

            </form>
        </div>
    </div>
</div>
@endsection
