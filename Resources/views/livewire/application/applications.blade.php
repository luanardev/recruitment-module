
<div class="row">
    
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="card card-outline">
            <div class="card-header">
                <h3 class="card-title text-bold">
                    <a class="d-inline w-100">
                        Applications ({{$vacancy->totalApplications()}})
                    </a>
                </h3>
               
                <div class="float-right">
                    <a href="{{route('shortlist.show', $vacancy)}}" class="btn btn-sm btn-success" >
                        <i class="fas fa-users"></i> Shortlist                           
                    </a>
                    <a href="{{route('applications.print', $vacancy)}}"   class="btn btn-sm btn-primary" target="__blank">
                        <i class="fas fa-print"></i> Print
                    </a>

                    <a href="{{route('vacancy.show', $vacancy)}}"  class="btn btn-sm btn-primary">
                        <i class="fas fa-arrow-left"></i> Back
                    </a>
                </div>
            </div>

            <div class="card-body">
                @if($vacancy->totalApplications())
                    <livewire:recruitment::application.application-table :vacancy=$vacancy />
                @else
                <div class="offset-lg-5 pt-lg-4">
                    <h5>Applicants Not found</h5>
                </div> 
                @endif
            </div>
        </div>
    </div>
</div>

