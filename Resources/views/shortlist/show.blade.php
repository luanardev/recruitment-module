@extends('recruitment::layouts.app')

@section('content')

<div class="container-fluid">

	<div class="content-header">	
	
		<div class="row mb-2">
			<div class="col-sm-6">
				<h4 class="m-0">Shortlisted Applicants for 
					<span class="text-blue text-bold">{{$vacancy->getPosition()}} </span> 
				</h4>
			</div>
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="{{ url('recruitment') }}">Home</a></li>
					<li class="breadcrumb-item"><a href="{{ route('vacancy.show', $vacancy) }}">Vacancy</a></li>
					<li class="breadcrumb-item active">Shortlist</li>
				</ol>
			</div>
		</div>     
	</div>
	
	<div class="content"> 
		<x-adminlte-flash />	
		<livewire:recruitment::shortlist.shortlist :vacancy=$vacancy />	                                      
	</div>
</div>

@endsection


