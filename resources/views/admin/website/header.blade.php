@extends('layouts.admin')

@section('content')
		<div class="row mt-4">

				<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4">
						<div class="d-block mb-4 mb-md-0">

								<h2 class="h4">Website Header</h2>

						</div>

				</div>
				<div class="col-8 mb-4 mx-auto">
						<div class="card border-0 shadow components-section">
                                <div class="card-header">
                                    Header Setting
                                </div>
								<div class="card-body">
                                        <form action="{{ route('update.business_setting') }}" method="POST">
                                            @csrf
                                            <div class="form-group row mb-3">
                                                <label class="col-md-3 col-from-label">Header Logo</label>
                                                <div class="col-md-8">
                                                    <div class=" input-group " data-toggle="aizuploader" data-type="all">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text bg-soft-secondary font-weight-medium">Browse</div>
                                                        </div>
                                                        <div class="form-control file-amount">1 File selected</div>
                                                        <input type="hidden" name="types[]" value="header_logo">
                                                        <input type="hidden" name="header_logo" class="selected-files" value="{{ get_setting('header_logo') }}">
                                                    </div>
                                                    <div class="file-preview">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group row mb-3">
                                                <label class="col-md-3 col-from-label">Help line number</label>
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <input type="hidden" name="types[]" value="helpline_number">
                                                        <input type="text" class="form-control" placeholder="Help line number" name="helpline_number" value="{{ get_setting('helpline_number') }}">
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


