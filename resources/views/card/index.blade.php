@extends('layouts.master')
@section('css')
<style>
	ul{
		list-style: none;
	}
	
	ul li{
		display: inline;
		/* margin: 1rem; */
	}
</style>
@endsection
@section('page-header')
				<!-- breadcrumb -->
				{{-- <div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">Pages</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ Cards</span>
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
				{{-- notification handller --}}
				@if ($message = Session::get('success'))
				<div class="alert alert-success">
					<p>{{ $message }}</p>
				</div>
				@endif
				@if ($message = Session::get('free'))
				<div class="alert alert-warning alert-dismissible fade show" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						<span class="sr-only">Close</span>
					</button>
					<p>{{ $message }} <a href="#"><strong>Here</strong></a></p>
				</div>
				@endif
				{{-- search area --}}
				<div class="row">
					<div class="col-md-4 col-sm-12">
						<div class="card custom-card">
							<form action="{{ route('cards.index') }}" method="GET">
								@csrf
								<div class="card-body">
									<div class="input-group mb-2">
										<input class="form-control"  name="search" type="search" value="{{ $search }}" placeholder="Type (ex): Name, Phone, Id, Email .....">
										<span class="input-group-append">
											<button type="submit" class="btn append btn-primary" type="button"><i class="fas fa-search d-md-block"></i></button>
										</span>
									</div>
								</div>
							</form>									
						</div>
					</div>
				</div>

				<!-- row -->
				<div class="row">
					<a href="{{ route('cards.create') }}" data-toggle="tooltip" data-placement="top" title="Add new Card" class="card col-xl-2 col-md-4 col-xs-12 border d-flex align-items-center justify-content-center m-3">
						<i class="fa fa-plus fa-5x" aria-hidden="true"></i>
					</a>
					@forelse ($cards as $card)
						@if ($card->user_id == $user->id)
						<div class="card col-xl-2 col-md-4 col-xs-12 m-3">
							@if ($card->photo == null)
							<img class="card-img-top mt-2" src="{{ url('assets/img/placeholder-image.jpg') }}" alt="Card image cap">														
							@else
							<img class="card-img-top mt-2" src="{{ url('storage/'.$card->photo) }}" alt="Card image cap">							
							@endif
							<div class="card-body">
								<h4 class="card-title">Mr.{{ $card->name }} {{ $card->famly_name }}</h4>
								<h6 class="card-subtitle text-muted">{{ $card->poste }}</h6>
								{{-- <img src="{{ url('assets/img/ecommerce/01.jpg') }}" style="height: 150px;width: 150px;" alt="LOGO"> --}}
							</div>
							<div class="card-body">
								<p class="card-text">Action</p>
								<form class="row d-flex align-items-center justify-content-center text-center" action="{{ route('cards.destroy',$card->id) }}" method="POST">
									<div class="col-4">
										<a href="{{ route('cards.show',$card->id) }}" data-toggle="tooltip" data-placement="top" title="Show Card" class="card-link text-info"><i class="fa fa-eye fa-1x" aria-hidden="true"></i></a>
									</div>
									<div class="col-4">
										<a href="{{ route('cards.edit',$card->id) }}" data-toggle="tooltip" data-placement="top" title="Edit Card" class="card-link text-primary"><i class="fa fa-pen fa-1x" aria-hidden="true"></i></a>
									</div>
				
									@csrf
									@method('DELETE')
									<div class="col-4">
										<button type="submit" class="btn text-danger" data-toggle="tooltip" data-placement="top" title="Delet Card" onclick="return confirm('Are you sure you want to delete this card?');"><i class="fa fa-trash fa-1x" aria-hidden="true"></i></button>
									</div>		
								</form>
							</div>
						</div>
						@endif
					@empty
						<div class="card mg-b-20 text-center col-xl-2 col-md-4 col-xs-12 m-3">
							<div class="card-body">
								<img src="{{URL::asset('assets/img/svgicons/no-data.svg')}}" alt="" class="wd-35p">
								<h5 class="mg-b-10 mg-t-15 tx-18">Items Not Found</h5>
								<a href="#" class="text-muted">Check The Settings</a>
							</div>
						</div>
					@endforelse
					{{-- @forelse ( $cards as $card)
						{{ $card->id }}
						{{ $card->photo }}
						{{ $card->logo }}
						{{ $card->name }}
						{{ $card->famly_name }}
						{{ $card->email }}
						{{ $card->phone }}
						{{ $card->fix }}
						{{ $card->address }}
						{{ $card->position }}
						{{ $card->poste }}
						{{ $card->socite }}
						{{ $card->website }}
						{{ $card->description }}
						{{ $card->fb }}
						{{ $card->insta }}
						{{ $card->youtube }}
						{{ $card->tiktok }}
						{{ $card->name }}
						{{ $card->email }}
						<br>
					@empty
						No data
					@endforelse --}}
				</div>
				<!-- row closed -->
			</div>
			<!-- Container closed -->
		</div>
		<!-- main-content closed -->
@endsection
@section('js')
@endsection