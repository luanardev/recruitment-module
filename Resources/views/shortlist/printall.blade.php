@extends('recruitment::layouts.app')

@section('content')

<div class="container-fluid">

	<div class="content-header">	
	
		<div class="row mb-2">
			<div class="col-sm-6">
				<h4 class="m-0">Shortlisted Applicants</h4>
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
        @foreach($vacancies as $vacancy)

        <div class="card">
            <div class="card-header">
                <h4>{{$vacancy->post}}</h4>
            </div>
            <div class="card-body">
                <table class="table table-sm">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Name</th>
                            <th>Gender</th>
                            <th>Phone 1</th>
                            <th>Phone 2</th>
                            <th>Location</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($vacancy->applicants as $key => $applicant)
                        <tr>
                            <td>{{++$key}}</td>
                            <td>{{$applicant->title}}</td>
                            <td>{{$applicant->name}}</td>
                            <td>{{$applicant->gender}}</td>    
                            <td>{{$applicant->phone1}}</td>
                            <td>{{$applicant->phone2}}</td>
                            <td>{{$applicant->physical_address}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>


        @endforeach
	</div>
</div>

@endsection


