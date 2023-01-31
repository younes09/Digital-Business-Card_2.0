@extends('layouts.master')
@section('css')
@endsection
@section('page-header')
				<!-- breadcrumb -->
				{{-- <div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">Pages</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ Empty</span>
						</div>
					</div>
					<div class="d-flex my-xl-auto right-content">
						<div class="pr-1 mb-3 mb-xl-0">
							<button type="button" class="btn btn-info btn-icon ml-2"><i class="mdi mdi-filter-variant"></i></button>
						</div>
						<div class="pr-1 mb-3 mb-xl-0">
							<button type="button" class="btn btn-danger btn-icon ml-2"><i class="mdi mdi-star"></i></button>
						</div>
						<div class="pr-1 mb-3 mb-xl-0">
							<button type="button" class="btn btn-warning  btn-icon ml-2"><i class="mdi mdi-refresh"></i></button>
						</div>
						<div class="mb-3 mb-xl-0">
							<div class="btn-group dropdown">
								<button type="button" class="btn btn-primary">14 Aug 2019</button>
								<button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" id="dropdownMenuDate" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<span class="sr-only">Toggle Dropdown</span>
								</button>
								<div class="dropdown-menu dropdown-menu-left" aria-labelledby="dropdownMenuDate" data-x-placement="bottom-end">
									<a class="dropdown-item" href="#">2015</a>
									<a class="dropdown-item" href="#">2016</a>
									<a class="dropdown-item" href="#">2017</a>
									<a class="dropdown-item" href="#">2018</a>
								</div>
							</div>
						</div>
					</div>
				</div> --}}
				<!-- breadcrumb -->
@endsection
@section('content')
                @if (session('error'))
				<div class="row" id="danger-alert">
					<div class="col-xl-6 col-md-12">
						<div class="alert alert-danger" role="alert">
							<h5><strong>{{ session('error') }}.</strong></h5>                        
						</div>
					</div>
				</div>
				@endif
                @if (session('success'))
				<div class="row" id="success-alert">
					<div class="col-xl-4 col-md-12">
						<div class="alert alert-success" role="alert">
							<h5><strong>{{ session('success') }} <i class="fas fa-check    "></i></strong></h5>                        
						</div>
					</div>
				</div>
				@endif
				<!-- row -->
				<div class="row">
                    <div class="col-lg-8">
						<div class="card">
							<div class="card-body">
								<div class="mb-4 main-content-label">Personal Information</div>
								<form action="{{ route('user.update',$user->id) }}" method="POST" class="form-horizontal">
                                    @csrf
									<div class="form-group ">
										<div class="row">
											<div class="col-md-3">
												<label class="form-label">User Name</label>
											</div>
											<div class="col-md-9">
												<input name="name" type="text" class="form-control"  placeholder="User Name" value="{{ $user->name }}" disabled style="cursor: not-allowed;">
											</div>
										</div>
									</div>
                                    <div class="form-group ">
										<div class="row">
											<div class="col-md-3">
												<label class="form-label">User Email</label>
											</div>
											<div class="col-md-9">
												<input name="" type="text" class="form-control"  placeholder="First Name" value="{{ $user->email }}" disabled style="cursor: not-allowed;">
                                                @error('email')
                                                    <span class="text-danger">{{$message}}</span>
                                                @enderror
											</div>
										</div>
									</div>
                                    <div class="form-group ">
										<div class="row">
											<div class="col-md-3">
												<label class="form-label">User Plan</label>
											</div>
											<div class="col-md-9">
												{{-- <input name="" type="text" class="form-control"  placeholder="First Name" value="{{ $user->email }}"> --}}
                                                <select class="form-control" name="plan" id="" style="cursor: pointer;">
                                                    <option value="free" @if ($user->plan == "free") selected @endif>Free</option>
                                                    <option value="pro" @if ($user->plan == "pro") selected @endif>Pro</option>
                                                </select>                                                
											</div>
										</div>
									</div>
                                    <div class="form-group ">
										<div class="row">
											<div class="col-md-3">
												<label class="form-label">User Role</label>
											</div>
											<div class="col-md-9">
												{{-- <input name="" type="text" class="form-control"  placeholder="First Name" value="{{ $user->email }}"> --}}
                                                <select class="form-control" name="role" id="" style="cursor: pointer;">
                                                    <option value="user" @if ($user->role == "user") selected @endif>User</option>
                                                    <option value="admin" @if ($user->role == "admin") selected @endif>Admin</option>
                                                </select>
											</div>
										</div>
									</div>
                                    <div class="card-footer text-left">
                                        <button type="submit" class="btn btn-primary waves-effect waves-light">Update User</button>
                                    </div>
								</form>
							</div>
						</div>
					</div>
				</div>
				<!-- row closed -->
                <div class="row m-2">
                    <div class="col-xs-12">
                        <form action="{{ url('destroyUser/'.$user->id) }}" method="post">
                            @csrf
                            <button class="btn btn-danger" type="submit" onclick="return confirm('Are you sure you want to delete this account?');"><i class="fas fa-trash"></i> Delet this user account ?</button>                        
                        </form>
                    </div>
                </div>
			</div>
			<!-- Container closed -->
		</div>
		<!-- main-content closed -->
@endsection
@section('js')
@endsection