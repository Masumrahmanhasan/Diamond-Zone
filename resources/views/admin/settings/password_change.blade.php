@extends('layouts.admin')

@section('content')
<div class="row mt-4">

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4">
            <div class="d-block mb-4 mb-md-0">

                    <h2 class="h4">Profile Settings</h2>

            </div>

    </div>
        <div class="col-8 mb-4 mx-auto">
            <div class="card border-0 shadow components-section">
                    <div class="card-header">
                        Save & Change Your Password
                    </div>
                    <div class="card-body">

                            <form action="{{ route('profile.update_settings') }}" method="POST">
                                @csrf


                                <div class="form-group row mb-3">
                                    <label class="col-md-3 col-from-label">Name</label>
                                    <div class="col-md-8">
                                        <div class="form-group">

                                            <input type="text" class="form-control" placeholder="name" name="name" value="{{ auth()->user()->name }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row mb-3">
                                    <label class="col-md-3 col-from-label">Email</label>
                                    <div class="col-md-8">
                                        <div class="form-group">

                                            <input type="text" class="form-control" placeholder="email" name="email" value="{{ auth()->user()->email }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row mb-3">
                                    <label class="col-md-3 col-from-label">Phone Number</label>
                                    <div class="col-md-8">
                                        <div class="form-group">

                                            <input type="text" class="form-control" placeholder="phone number" name="phone" value="{{ auth()->user()->phone }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="text-end">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>

                            </form>

                    </div>
            </div>
        </div>
        <div class="col-8 mb-4 mx-auto">
                <div class="card border-0 shadow components-section">
                        <div class="card-header">
                            Save & Change Your Password
                        </div>
                        <div class="card-body">

                                <form action="{{ route('profile.update_password') }}" method="POST">
                                    @csrf


                                    <div class="form-group row mb-3">
                                        <label class="col-md-3 col-from-label">Old Password</label>
                                        <div class="col-md-8">
                                            <div class="form-group">

                                                <input type="password" class="form-control @error('old_password')
                                                    is-invalid
                                                @enderror" placeholder="Current Password" name="old_password" value="">
                                            </div>
                                            @error('old_password')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror

                                            @if (Session::has('error'))
                                            <span class="text-danger">{{ Session::get('error') }}</span>
                                            @endif

                                        </div>
                                    </div>

                                    <div class="form-group row mb-3">
                                        <label class="col-md-3 col-from-label">New Password</label>
                                        <div class="col-md-8">
                                            <div class="form-group">

                                                <input type="password" class="form-control @error('password')
                                                is-invalid
                                            @enderror" placeholder="New Password" name="password" id="password" value="">
                                            </div>

                                            @error('password')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror

                                        </div>
                                    </div>

                                    <div class="form-group row mb-3">
                                        <label class="col-md-3 col-from-label">Confirm Password</label>
                                        <div class="col-md-8">
                                            <div class="form-group">

                                                <input type="password" class="form-control" placeholder="Confirm Password" id="password_confirmation" name="password_confirmation" value="">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="text-end">
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </div>

                                </form>

                        </div>
                </div>
        </div>
</div>
@endsection
