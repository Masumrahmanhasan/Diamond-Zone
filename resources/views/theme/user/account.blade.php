@extends('layouts.app')

@section('content')
<div class="section_gaps"></div>


<section id="user_dashboard">

    <div class="container">

        <div class="row">

            {{-- Tab Parts --}}
            @include('theme.user.sidebar')

            {{-- Tabs Details --}}

            <div class="col-lg-9">

                <div class="user_dashboard_details">

                    <div class="dashboard">
                        <h3>Update Profile</h3>
                    </div>

                    <div class="orders_list">

                        <div class="col-md-8 mb-4">
                            <form action="{{ route('user.update_info') }}" method="POST">
                                @csrf
                                <div class="card px-5 py-5" id="form1">
                                    <div class="form-data">
                                        <div class="forms-inputs mb-4"> <span>User Name</span>
                                            <input autocomplete="off" class="form-control @error('name')
                                                is-invalid
                                            @enderror" type="text" name="name" value="{{ auth()->user()->name }}">
                                            @error('name')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="forms-inputs mb-4"> <span>Email</span>
                                            <input autocomplete="off" class="form-control @error('nam')
                                                is-invalid
                                            @enderror" type="text" name="email" disabled value="{{ auth()->user()->email }}">
                                            @error('email')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>


                                        <div class="mb-3">
                                            <button type="submit" class="btn btn-dark w-100">Update Info</button>
                                        </div>
                                    </div>

                                </div>

                            </form>
                        </div>

                        <div class="col-md-8">
                            <form action="{{ route('user.update_password') }}" method="POST">
                                @csrf
                                <div class="card px-5 py-5" id="form1">
                                    <div class="form-data">
                                        <div class="forms-inputs mb-4"> <span>Current Password</span>
                                            <input autocomplete="off" class="form-control @error('current_password')
                                                is-invalid
                                            @enderror" type="text" name="current_password">
                                            @error('current_password')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="forms-inputs mb-4"> <span>New Password</span>
                                            <input autocomplete="off" class="form-control @error('password')
                                                is-invalid
                                            @enderror" type="password" name="password">
                                            @error('password')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="forms-inputs mb-4"> <span>Confirm Password</span>
                                            <input autocomplete="off" class="form-control" type="password" name="password-confirmation">

                                        </div>


                                        <div class="mb-3">
                                            <button type="submit" class="btn btn-dark w-100">Update Password</button>
                                        </div>
                                    </div>

                                </div>

                            </form>
                        </div>
                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

<div class="section_height"></div>
@endsection
