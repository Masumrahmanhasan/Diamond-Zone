@extends('layouts.admin')

@section('content')
@section('styles')
  <style media="screen">
  .badge_custom {
    color: #fff;
    display: inline-block;
    padding: 5px;
    border-radius: 5px;
    margin-top: 5px;
  }
  </style>
@endsection
<div>
    <div>
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4">
            <div class="d-block mb-4 mb-md-0">
                <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
                    <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
                        <li class="breadcrumb-item">
                            <a href="Javascript:;">
                                <svg class="icon icon-xxs" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                                    </path>
                                </svg>
                            </a>
                        </li>
                        <li class="breadcrumb-item"><a href="javascript:;">Products Rivew</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Items List</li>
                    </ol>
                </nav>
                <h2 class="h4">Products Review</h2>
            </div>
        </div>
        <div class="card card-body shadow-sm table-wrapper table-responsive">
            <div class="table-settings mb-4">
                <div class="row justify-content-between align-items-center">
                    <div class="col-9 col-lg-8 d-md-flex">
                        <div class="input-group me-2 me-lg-3 fmxw-300">
                            <span class="input-group-text"><svg class="icon icon-xs" x-description="Heroicon name: solid/search" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
                                </svg></span>
                            <input wire:model="search" type="text" class="form-control" placeholder="Search items">
                        </div>
                        <div class="col-3 d-flex">
                            <select wire:model="entries" class="form-select fmxw-100 d-none d-md-inline" id="entries" aria-label="Entries per page">
                                <option value="10">10</option>
                                <option value="25">25</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <table class="table user-table table-hover align-items-center overflow-hidden">
                <thead>
                    <tr>
                        <th class="border-bottom">SL No</th>
                        <th class="border-bottom">Name</th>
                        <th class="border-bottom">Product</th>
                        <th class="border-bottom">Image</th>
                        <th class="border-bottom">Comment</th>
                        <th class="border-bottom">Action</th>
                    </tr>
                </thead>
                <tbody>
                  @foreach ($getAll as $value)
                    <tr>
                      <td>
                        {{ $loop->iteration }}
                        <br>

                        @if ($value->status == 1)
                          <span class="badge_custom" style="background:#0D6EFD">Approve</span>
                        @else
                          <span class="badge_custom" style="background:#DC3545">Pending</span>
                        @endif




                      </td>
                      <td>{{ $value->user->name }}</td>
                      <td>{{ $value->product->name }}</td>
                      <td>
                        <img src="{{ asset($value->attachment) }}" alt="" width="100">
                      </td>
                      <td>
                        <textarea class="form-control" rows="4" cols="20">
                          {{ $value->body }}
                        </textarea>
                      </td>
                      <td>
                        {{-- button --}}
                        <span>
                          <div class="btn-group">
                              <button class="btn btn-link text-dark dropdown-toggle dropdown-toggle-split m-0 p-0" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  <svg class="icon icon-xs" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                      <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z">
                                      </path>
                                  </svg>
                                  <span class="visually-hidden">Toggle Dropdown</span>
                              </button>
                              <div class="dropdown-menu dashboard-dropdown dropdown-menu-start mt-2 py-1" style="margin: 0px;">
                                  <a class="dropdown-item d-flex align-items-center" href="{{ route('review-approve',$value->id) }}"> <i class="fas fa-pencil me-2"></i>Approve</a>
                                  <a class="dropdown-item d-flex align-items-center" href="{{ route('review-delete',$value->id) }}"> <i class="fas fa-pencil me-2"></i>Delete</a>
                              </div>
                          </div>
                      </span>
                        {{-- button --}}
                      </td>
                    </tr>
                  @endforeach
                </tbody>
            </table>
            <div class="mt-3">
                <div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection