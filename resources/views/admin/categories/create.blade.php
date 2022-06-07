@extends('layouts.admin')

@section('content')

<div class="row mt-4">
    <div class="col-6 mb-4">
            <div class="card border-0 shadow components-section">
                    <div class="card-body">
                            <div class="row mb-4">
                                    <div class="col-lg-8 col-sm-6">
                                            <div class="mb-4"><label for="email">Email address</label> <input type="email"
                                                            class="form-control" id="email" aria-describedby="emailHelp">
                                                            <small id="emailHelp"
                                                            class="form-text text-muted">We'll never share your email with anyone else.</small></div>
                                            <div class="mb-3"><label for="exampleInputIconLeft">Icon Left</label>
                                                    <div class="input-group"><span class="input-group-text" id="basic-addon1"><svg
                                                                            class="icon icon-xs text-gray-600" fill="currentColor" viewBox="0 0 20 20"
                                                                            xmlns="http://www.w3.org/2000/svg">
                                                                            <path fill-rule="evenodd"
                                                                                    d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                                                                    clip-rule="evenodd"></path>
                                                                    </svg> </span><input type="text" class="form-control" id="exampleInputIconLeft" placeholder="Search"
                                                                    aria-label="Search"></div>
                                            </div>
                                            <div class="mb-3"><label for="exampleInputIconRight">Icon Right</label>
                                                    <div class="input-group"><input type="text" class="form-control" id="exampleInputIconRight"
                                                                    placeholder="Search" aria-label="Search"> <span class="input-group-text" id="basic-addon2"><svg
                                                                            class="icon icon-xs text-gray-600" fill="currentColor" viewBox="0 0 20 20"
                                                                            xmlns="http://www.w3.org/2000/svg">
                                                                            <path fill-rule="evenodd"
                                                                                    d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                                                                    clip-rule="evenodd"></path>
                                                                    </svg></span></div>
                                            </div>
                                            <div class="mb-3"><label for="exampleInputIconPassword">Password</label>
                                                    <div class="input-group"><input type="password" class="form-control" id="exampleInputIconPassword"
                                                                    placeholder="Password" aria-label="Password"> <span class="input-group-text" id="basic-addon3"><svg
                                                                            class="icon icon-xs text-gray-600" fill="currentColor" viewBox="0 0 20 20"
                                                                            xmlns="http://www.w3.org/2000/svg">
                                                                            <path fill-rule="evenodd"
                                                                                    d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z"
                                                                                    clip-rule="evenodd"></path>
                                                                    </svg></span></div>
                                            </div>
                                            <div class="mb-3"><label for="firstName">First name</label> <input type="text"
                                                            class="form-control is-valid" id="firstName" value="Mark" required="">
                                                    <div class="valid-feedback">Looks good!</div>
                                            </div>
                                    </div>


                            </div>

                    </div>
            </div>
    </div>
</div>


@endsection
