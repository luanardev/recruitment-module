@extends('recruitment::layouts.app')

@section('content')

<div class="container-fluid">

	<div class="content-header">	
	
		<div class="row mb-2">
			<div class="col-sm-6">
				<h4 class="m-0">
					Application Details for <span class="text-blue text-bold">{{$application->getApplicantName()}}</span> 
				</h4>

				<h5 class="py-3 m-0">
					for the Post of <span class="text-blue text-bold">{{$application->getPosition()}} </span>
				</h5>
			</div>
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="{{ url('recruitment') }}">Home</a></li>
					<li class="breadcrumb-item"><a href="{{ route('vacancy.show', $application->vacancy) }}">Vacancy</a></li>
					<li class="breadcrumb-item active">Applicant</li>
				</ol>
			</div>
		</div>     
	</div>
	
	<div class="content"> 
		<x-adminlte-flash />	
		<livewire:recruitment::application.show-application :application=$application />	                                      
	</div>
</div>

@endsection

