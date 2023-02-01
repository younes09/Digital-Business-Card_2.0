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
				@if ($message = Session::get('success'))
				<div class="alert alert-success mt-4">
					<p>{{ $message }}</p>
				</div>
				@endif
				@if ($message = Session::get('error'))
				<div class="alert alert-danger mt-4">
					<p>{{ $message }}</p>
				</div>
				@endif
					{{-- search area --}}
					<div class="row mt-4">
						<div class="col-md-4 col-sm-12">
							<div class="card custom-card">
								<form action="{{ route('contacts.index') }}" method="GET">
									@csrf
									<div class="card-body">
										<div class="input-group mb-2">
											<input class="form-control"  name="search" type="search" value="{{ $search }}" placeholder="Type (ex): Name, Phone, Id, Email.....">
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
					@forelse ($contactCards as $contactCard)
					<div class="card col-xl-2 col-md-4 col-xs-12 m-3">
						@if ($contactCard->photo == null)
						<img class="card-img-top mt-2" src="{{ url('assets/img/placeholder-image.jpg') }}" alt="Card image cap">														
						@else
						<img class="card-img-top mt-2" src="{{ url('storage/'.$contactCard->photo) }}" alt="Card image cap">							
						@endif
						<div class="card-body">
							<h4 class="card-title">Mr.{{ $contactCard->name }} {{ $contactCard->famly_name }}</h4>
							<h6 class="card-subtitle text-muted">{{ $contactCard->poste }}</h6>
							{{-- <img src="{{ url('assets/img/ecommerce/01.jpg') }}" style="height: 150px;width: 150px;" alt="LOGO"> --}}
						</div>
						<div class="card-body">
							<p class="card-text">Action</p>
							<form class="row d-flex align-items-center justify-content-center text-center" action="{{ route('contacts.destroy',$contactCard->id) }}" method="POST">
								 <div class="col-4">
									<a href="{{ route('cards.show',$contactCard->id) }}" data-toggle="tooltip" data-placement="top" title="Show Contact" class="card-link text-info"><i class="fa fa-eye fa-1x" aria-hidden="true"></i></a>
								</div>
								{{-- <div class="col-4">
									<a href="{{ route('cards.edit',$contactCard->id) }}" class="card-link text-primary"><i class="fa fa-pen fa-1x" aria-hidden="true"></i></a>
								</div> --}}
			 
								@csrf
								@method('DELETE')
								<div class="col-4">
									<button type="submit" class="btn text-danger" data-toggle="tooltip" data-placement="top" title="Delet Contact" onclick="return confirm('هل أنت متأكد أنك تريد حذف هذه البطاقة؟');"><i class="fa fa-trash fa-1x" aria-hidden="true"></i></button>
								</div>		
							</form>
						</div>
					</div>					
					@empty
					<div class="card mg-b-20 text-center col-xl-2 col-md-4 col-xs-12 m-3">
						<div class="card-body">
							<img src="{{URL::asset('assets/img/svgicons/no-data.svg')}}" alt="" class="wd-35p">
							<h5 class="mg-b-10 mg-t-15 tx-18">Éléments non trouvés</h5>
							<a href="#" class="text-muted">Ajoutez des contacts pour les voir ici</a>
						</div>
					</div>
					@endforelse
				</div>
				<!-- row closed -->
				@if ($contactCards->hasPages())
					<div class="row">
						<div class="col-12">							
						{{ $contactCards->links() }}
						</div>
					</div>					
				@endif
			</div>
			<!-- Container closed -->
		</div>
		<!-- main-content closed -->
@endsection
@section('js')
@endsection