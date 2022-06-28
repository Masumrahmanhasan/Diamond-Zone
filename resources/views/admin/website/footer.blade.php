@extends('layouts.admin')

@section('content')

<div class="row mt-4">

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4">
            <div class="d-block mb-4 mb-md-0">

                    <h2 class="h4">Website Footer</h2>

            </div>

    </div>
</div>
<div>


    <div class="card">
    	<div class="card-header">
    		<h6 class="fw-600 mb-0"></h6>
    	</div>
    	<div class="card-body">
    		<div class="row gutters-10">
    			<div class="col-lg-6 mb-3">
    				<div class="card shadow-none bg-light">
    					<div class="card-header">
    						<h6 class="mb-0">About Widget</h6>
    					</div>
    					<div class="card-body">
    						<form action="{{ route('update.business_setting') }}" method="POST" enctype="multipart/form-data">
    							@csrf

    			                <div class="form-group mb-3">
    								<label>About Description</label>
    								<input type="hidden" name="types[]" value="about_us_description">
    								<textarea class=" form-control" name="about_us_description">{{ get_setting('about_us_description') }}</textarea>
    							</div>

    							<div class="text-end">
    								<button type="submit" class="btn btn-primary">Update</button>
    							</div>
    						</form>
    					</div>
    				</div>
    			</div>

                <div class="col-lg-12">
                    <div class="card shadow-none bg-light">
    					<div class="card-header">
    						<h6 class="mb-0">Link widget 1</h6>
    					</div>
    					<div class="card-body">
                            <form action="{{ route('update.business_setting') }}" method="POST" enctype="multipart/form-data">
                                @csrf
    							<div class="form-group">
    								<label>{{ __('Title') }}</label>
    								<input type="hidden" name="types[][]" value="widget_one">
    								<input type="text" class="form-control" placeholder="Widget title" name="widget_one" value="{{ get_setting('widget_one') }}">
    							</div>
    			                <div class="form-group mt-3">
    								<label>Links</label>
    								<div class="w3-links-target">
                                        <input type="hidden" name="types[]" value="widget_one_labels">
    									<input type="hidden" name="types[]" value="widget_one_links">
    									@if (get_setting('widget_one_labels') != null)
    										@foreach (json_decode(get_setting('widget_one_labels'), true) as $key => $value)
    											<div class="row gutters-5">
    												<div class="col-4">
    													<div class="form-group">
    														<input type="text" class="form-control" placeholder="label" name="widget_one_labels[]" value="">
    													</div>
    												</div>
    												<div class="col">
    													<div class="form-group">
    														<input type="text" class="form-control" placeholder="http://" name="widget_one_links[]" value="{{ json_decode(get_setting('widget_one_links'), true)[$key] }}">
    													</div>
    												</div>
    												<div class="col-auto">
    													<button type="button" class="mt-1 btn btn-icon btn-circle btn-sm btn-soft-danger" data-toggle="remove-parent" data-parent=".row">
    														<i class="las la-times"></i>
    													</button>
    												</div>
    											</div>
    										@endforeach
    									@endif
    								</div>
    								<button
    									type="button"
    									class="btn btn-primary btn-sm mb-3 mt-3"
    									data-toggle="add-more"
    									data-content='<div class="row gutters-5">
    										<div class="col-4 mt-3">
    											<div class="form-group">
    												<input type="text" class="form-control" placeholder="Label" name="widget_one_labels[]">
    											</div>
    										</div>
    										<div class="col mt-3">
    											<div class="form-group">
    												<input type="text" class="form-control" placeholder="http://" name="widget_one_links[]">
    											</div>
    										</div>
    										<div class="col-auto mt-3">
    											<button type="button" class="mt-1 btn btn-icon btn-sm" data-toggle="remove-parent" data-parent=".row">
    												<svg class="icon icon-xs ms-1" title="" data-bs-toggle="tooltip" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" data-bs-original-title="Delete" aria-label="Delete">
                                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd">
                                                        </path>
                                                </svg>
    											</button>
    										</div>
    									</div>'
    									data-target=".w3-links-target">
    									Add New
    								</button>
    							</div>
    							<div class="text-end">
    								<button type="submit" class="btn btn-primary">Update</button>
    							</div>
    						</form>
    					</div>
    				</div>
    			</div>

                <div class="col-lg-12 mt-3">
                    <div class="card shadow-none bg-light">
    					<div class="card-header">
    						<h6 class="mb-0">Link widget 2</h6>
    					</div>
    					<div class="card-body">
                            <form action="{{ route('update.business_setting') }}" method="POST" enctype="multipart/form-data">
                                @csrf
    							<div class="form-group">
    								<label>{{ __('Title') }}</label>
    								<input type="hidden" name="types[][]" value="widget_two">
    								<input type="text" class="form-control" placeholder="Widget title" name="widget_two" value="{{ get_setting('widget_two') }}">
    							</div>
    			                <div class="form-group mt-3">
    								<label>Links</label>
    								<div class="w3-links-target">
                                        <input type="hidden" name="types[]" value="widget_two_labels">
    									<input type="hidden" name="types[]" value="widget_two_links">
    									@if (get_setting('widget_two_labels') != null)
    										@foreach (json_decode(get_setting('widget_two_labels'), true) as $key => $value)
    											<div class="row gutters-5">
    												<div class="col-4">
    													<div class="form-group">
    														<input type="text" class="form-control" placeholder="label" name="widget_two_labels[]" value="">
    													</div>
    												</div>
    												<div class="col">
    													<div class="form-group">
    														<input type="text" class="form-control" placeholder="http://" name="widget_two_links[]" value="{{ json_decode(get_setting('widget_two_links'), true)[$key] }}">
    													</div>
    												</div>
    												<div class="col-auto">
    													<button type="button" class="mt-1 btn btn-icon btn-circle btn-sm btn-soft-danger" data-toggle="remove-parent" data-parent=".row">
    														<i class="las la-times"></i>
    													</button>
    												</div>
    											</div>
    										@endforeach
    									@endif
    								</div>
    								<button
    									type="button"
    									class="btn btn-primary btn-sm mb-3 mt-3"
    									data-toggle="add-more"
    									data-content='<div class="row gutters-5">
    										<div class="col-4 mt-3">
    											<div class="form-group">
    												<input type="text" class="form-control" placeholder="Label" name="widget_two_labels[]">
    											</div>
    										</div>
    										<div class="col mt-3">
    											<div class="form-group">
    												<input type="text" class="form-control" placeholder="http://" name="widget_two_links[]">
    											</div>
    										</div>
    										<div class="col-auto mt-3">
    											<button type="button" class="mt-1 btn btn-icon btn-sm" data-toggle="remove-parent" data-parent=".row">
    												<svg class="icon icon-xs ms-1" title="" data-bs-toggle="tooltip" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" data-bs-original-title="Delete" aria-label="Delete">
                                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd">
                                                        </path>
                                                </svg>
    											</button>
    										</div>
    									</div>'
    									data-target=".w3-links-target">
    									Add New
    								</button>
    							</div>
    							<div class="text-end">
    								<button type="submit" class="btn btn-primary">Update</button>
    							</div>
    						</form>
    					</div>
    				</div>
    			</div>

    	</div>
    </div>

    <div class="card">
    	<div class="card-header">
    		<h6 class="fw-600 mb-0">Footer Bottom</h6>
    	</div>
        <form action="{{ route('update.business_setting') }}" method="POST" enctype="multipart/form-data">
            @csrf
           <div class="card-body">

                <div class="card shadow-none bg-light">
                  <div class="card-header">
						<h6 class="mb-0">Social Link Widget</h6>
					</div>
                  <div class="card-body">

                    <div class="form-group">
                        <label>Social Links</label>
                        <div class="input-group form-group mt-3 mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"/><path d="M12 2C6.477 2 2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.879V14.89h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.989C18.343 21.129 22 16.99 22 12c0-5.523-4.477-10-10-10z"/></svg>
                                </span>
                            </div>
                            <input type="hidden" name="types[]" value="facebook_link">
                            <input type="text" class="form-control" placeholder="http://" name="facebook_link" value="{{ get_setting('facebook_link')}}">
                        </div>
                        <div class="input-group form-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"/><path d="M22.162 5.656a8.384 8.384 0 0 1-2.402.658A4.196 4.196 0 0 0 21.6 4c-.82.488-1.719.83-2.656 1.015a4.182 4.182 0 0 0-7.126 3.814 11.874 11.874 0 0 1-8.62-4.37 4.168 4.168 0 0 0-.566 2.103c0 1.45.738 2.731 1.86 3.481a4.168 4.168 0 0 1-1.894-.523v.052a4.185 4.185 0 0 0 3.355 4.101 4.21 4.21 0 0 1-1.89.072A4.185 4.185 0 0 0 7.97 16.65a8.394 8.394 0 0 1-6.191 1.732 11.83 11.83 0 0 0 6.41 1.88c7.693 0 11.9-6.373 11.9-11.9 0-.18-.005-.362-.013-.54a8.496 8.496 0 0 0 2.087-2.165z"/></svg></span>
                            </div>
                            <input type="hidden" name="types[]" value="twitter_link">
                            <input type="text" class="form-control" placeholder="http://" name="twitter_link" value="{{ get_setting('twitter_link')}}">
                        </div>
                        <div class="input-group form-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"/><path d="M12 2c2.717 0 3.056.01 4.122.06 1.065.05 1.79.217 2.428.465.66.254 1.216.598 1.772 1.153a4.908 4.908 0 0 1 1.153 1.772c.247.637.415 1.363.465 2.428.047 1.066.06 1.405.06 4.122 0 2.717-.01 3.056-.06 4.122-.05 1.065-.218 1.79-.465 2.428a4.883 4.883 0 0 1-1.153 1.772 4.915 4.915 0 0 1-1.772 1.153c-.637.247-1.363.415-2.428.465-1.066.047-1.405.06-4.122.06-2.717 0-3.056-.01-4.122-.06-1.065-.05-1.79-.218-2.428-.465a4.89 4.89 0 0 1-1.772-1.153 4.904 4.904 0 0 1-1.153-1.772c-.248-.637-.415-1.363-.465-2.428C2.013 15.056 2 14.717 2 12c0-2.717.01-3.056.06-4.122.05-1.066.217-1.79.465-2.428a4.88 4.88 0 0 1 1.153-1.772A4.897 4.897 0 0 1 5.45 2.525c.638-.248 1.362-.415 2.428-.465C8.944 2.013 9.283 2 12 2zm0 5a5 5 0 1 0 0 10 5 5 0 0 0 0-10zm6.5-.25a1.25 1.25 0 0 0-2.5 0 1.25 1.25 0 0 0 2.5 0zM12 9a3 3 0 1 1 0 6 3 3 0 0 1 0-6z"/></svg></span>
                            </div>
                            <input type="hidden" name="types[]" value="instagram_link">
                            <input type="text" class="form-control" placeholder="http://" name="instagram_link" value="{{ get_setting('instagram_link')}}">
                        </div>
                        <div class="input-group form-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"/><path d="M21.543 6.498C22 8.28 22 12 22 12s0 3.72-.457 5.502c-.254.985-.997 1.76-1.938 2.022C17.896 20 12 20 12 20s-5.893 0-7.605-.476c-.945-.266-1.687-1.04-1.938-2.022C2 15.72 2 12 2 12s0-3.72.457-5.502c.254-.985.997-1.76 1.938-2.022C6.107 4 12 4 12 4s5.896 0 7.605.476c.945.266 1.687 1.04 1.938 2.022zM10 15.5l6-3.5-6-3.5v7z"/></svg></span>
                            </div>
                            <input type="hidden" name="types[]" value="youtube_link">
                            <input type="text" class="form-control" placeholder="http://" name="youtube_link" value="{{ get_setting('youtube_link')}}">
                        </div>
                        <div class="input-group form-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"/><path d="M18.335 18.339H15.67v-4.177c0-.996-.02-2.278-1.39-2.278-1.389 0-1.601 1.084-1.601 2.205v4.25h-2.666V9.75h2.56v1.17h.035c.358-.674 1.228-1.387 2.528-1.387 2.7 0 3.2 1.778 3.2 4.091v4.715zM7.003 8.575a1.546 1.546 0 0 1-1.548-1.549 1.548 1.548 0 1 1 1.547 1.549zm1.336 9.764H5.666V9.75H8.34v8.589zM19.67 3H4.329C3.593 3 3 3.58 3 4.297v15.406C3 20.42 3.594 21 4.328 21h15.338C20.4 21 21 20.42 21 19.703V4.297C21 3.58 20.4 3 19.666 3h.003z"/></svg></span>
                            </div>
                            <input type="hidden" name="types[]" value="linkedin_link">
                            <input type="text" class="form-control" placeholder="http://" name="linkedin_link" value="{{ get_setting('linkedin_link')}}">
                        </div>
                    </div>
                  </div>
                </div>


                <div class="text-end mt-3">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </div>
        </form>
	</div>
</div>

@endsection
