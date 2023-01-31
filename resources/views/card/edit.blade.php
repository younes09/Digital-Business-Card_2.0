@extends('layouts.master')
@section('css')
<!---Internal Fileupload css-->
<link href="{{URL::asset('assets/plugins/fileuploads/css/fileupload.css')}}" rel="stylesheet" type="text/css"/>
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
				<!-- row -->
				<div class="row d-flex align-items-center justify-content-center">
					<div class="col-lg-6 col-xl-6 col-md-12 col-sm-12">
						<div class="card  box-shadow-0 ">
							<div class="card-header">
								<h2 class="mb-1">إضافة معلومات البطاقة</h2>
								<h5 class="mb-2 bg-danger text-white">أي مجال من المجالات أدناه لا يتم إضهاره في البطاقة إن كان فارغ !</h5>
							</div>
							<div class="card-body pt-0">
								<form action="{{ route('cards.update',$card->id) }}" method="POST" enctype="multipart/form-data">
									@csrf
									@method('PUT')
									<div class="row">
										<div class="col-sm-12 col-md-6 form-group">
											<label for="photo">Photo</label>
											<div class="mg-t-10 mg-sm-t-0">
												<input type="file" name="photo" class="dropify" data-default-file="{{ url('storage/'.$card->photo) }}" data-height="200"  />
											</div>
										</div>
										<div class="col-sm-12 col-md-6 form-group">
											<label for="logo">Logo</label>
											<div class="mg-t-10 mg-sm-t-0">
												<input type="file" name="logo" class="dropify" data-default-file="{{ url('storage/'.$card->logo) }}" data-height="200"  />
											</div>
										</div>
										<div class="col-sm-12 col-md-6 form-group">
											<label for="name">Name</label>
											<input type="text"  name="name" class="form-control" value="{{ $card->name }}" placeholder="name">
										</div>
										<div class="col-sm-12 col-md-6 form-group">
											<label for="famly_name">Famly Name</label>
											<input type="text"  name="famly_name" class="form-control" value="{{ $card->famly_name }}" placeholder="famly name">
										</div>
										<div class="col-sm-12 col-md-6 form-group">
											<label for="email">Email</label>
											<input type="email"  name="email" class="form-control" value="{{ $card->email }}" placeholder="email">
										</div>
										<div class="col-sm-12 col-md-6 form-group">
											<label for="phone">Phone</label>
											<input type="tel" name="phone" class="form-control" maxlength="10" value="{{ $card->phone }}" placeholder="phone">										
										</div>
										<div class="col-sm-12 col-md-6 form-group">
											<label for="fix">Fix</label>
											<input type="tel" name="fix" class="form-control" value="{{ $card->fix }}" placeholder="fix">
										</div>
										<div class="col-sm-12 col-md-6 form-group">
											<label for="address">Address</label>
											<input type="text" name="address" class="form-control" value="{{ $card->address }}" placeholder="address">
										</div>
										<div class="col-sm-12 col-md-6 form-group">
											<label for="position">Position</label>
											<input type="text" name="position" class="form-control" value="{{ $card->position }}" placeholder="position">
										</div>
										<div class="col-sm-12 col-md-6 form-group">
											<label for="poste">Poste</label>
											<input type="text" name="poste" class="form-control" value="{{ $card->poste }}" placeholder="poste">
										</div>
										<div class="col-sm-12 col-md-6 form-group">
											<label for="socite">Company</label>
											<input type="text" name="socite" class="form-control" value="{{ $card->socite }}" placeholder="socite">
										</div>
										<div class="col-sm-12 col-md-6 form-group">
											<label for="website">Website</label>
											<input type="text" name="website" class="form-control" value="{{ $card->website }}" placeholder="website">
										</div>
										<div class="col-12 form-group">
											<label for="description">Description</label>
											<textarea name="description"  class="form-control" placeholder="description" id="" cols="30" rows="10">{{ $card->description }}</textarea>
										</div>
									</div>
									<div class="row">
										<h4 class="col-12 form-group mt-5">Social Media</h4>
										<div class="col-sm-12 col-md-6 form-group">
											<label for="fb">Facebook</label>
											<input type="text" name="fb" class="form-control" value="{{ $card->fb }}" placeholder="fb">
										</div>
										<div class="col-sm-12 col-md-6 form-group">
											<label for="insta">Instagram</label>
											<input type="text" name="insta" class="form-control" value="{{ $card->insta }}" placeholder="insta">
										</div>
										<div class="col-sm-12 col-md-6 form-group">
											<label for="youtube">YouTube</label>
											<input type="text" name="youtube" class="form-control" value="{{ $card->youtube }}" placeholder="youtube">
										</div>
										<div class="col-sm-12 col-md-6 form-group">
											<label for="tiktok">TikTok</label>
											<input type="text" name="tiktok" class="form-control" value="{{ $card->tiktok }}" placeholder="tiktok">
										</div>

										<div class="checkbox">
											<div class="custom-checkbox custom-control">
												<input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-1">
												<label for="checkbox-1" class="custom-control-label mt-1">I agree</label>
											</div>
										</div>
									</div>
									<button type="submit" class="btn btn-primary mt-3 mb-0">Update</button>
								</form>
							</div>
						</div>
					</div>					
				</div>
				<!-- row closed -->
				{{-- {{ $card->id }} --}}
						{{-- photo 
						logo 
						name 
						famly_name 
						email 
						phone 
						fix 
						address 
						position 
						poste 
						socite 
						website
						description
						fb
						insta
						youtube
						tiktok
						name
						email --}}
			</div>
			<!-- Container closed -->
		</div>
		<!-- main-content closed -->
@endsection
@section('js')
<!--Internal Fileuploads js-->
<script src="{{URL::asset('assets/plugins/fileuploads/js/fileupload.js')}}"></script>
<script src="{{URL::asset('assets/plugins/fileuploads/js/file-upload.js')}}"></script>
@endsection