
@extends('recruitment::layouts.app')

@section('content')

<div class="container-fluid">

	<div class="content-header">	
	
		<div class="row mb-2">
			<div class="col-sm-6">
				<h4 class="m-0">Shortlisted Vacancies </h4>
			</div>
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="{{ url('recruitment') }}">Home</a></li>
					<li class="breadcrumb-item active">Shortlist</li>
				</ol>
			</div>
		</div>     
	</div>
	
	<div class="content"> 
		<x-adminlte-flash />
        <div class="row">
			<div class="col-lg-6">
				<form action="{{route('shortlist.printall')}}" method="POST">
					@csrf
					<div class="form-group">
						<select class="form-control select2" name="vacancy[]" multiple="multiple" placeholder="Select">							
							@foreach ($vacancies as $vacancy)
								<option value="{{$vacancy->id}}" >{{$vacancy->post}} ({{$vacancy->shortlisted}})</option>
							@endforeach
						</select>	
					</div>   
					<div class="form-group">
						<button type="submit" class="btn btn-primary">Get Shortlist</button>
					</div>
				</form>
			</div>
		</div>
			                           
	</div>
</div>

@endsection


