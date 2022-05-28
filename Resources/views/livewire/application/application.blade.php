
<div class="card card-outline">
    <div class="card-header">
        <h3 class="card-title text-bold">
            Applicant information
        </h3>
        <div class="float-right">
            <div class="mb-3 mb-md-0">
                <div class="dropdown d-block d-md-inline">
                    <button class="btn dropdown-toggle d-block w-100 d-md-inline" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Actions
                    </button>

                    <div class="dropdown-menu dropdown-menu-right w-100" aria-labelledby="actions">                       
                        <a href="{{route('application.print', $application)}}" class="dropdown-item" target="_blank">
                            <i class="fas fa-print"></i> Print
                        </a> 
                        @if(!$application->isShortlisted())                 
                            <a href="#" wire:click.prevent="shortlist()" class="dropdown-item">
                                <i class="fas fa-check-circle"></i> Shortlist
                            </a>
                        @endif

                        @if($application->isShortlisted())
                            <a href="#" wire:click.prevent="discard()" class="dropdown-item">
                                <i class="fas fa-times-circle"></i> Discard
                            </a> 
                        @endif
                                                    
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card-body">
        <div class="row">
            
            <div class="col-lg-9 col-md-6 col-sm-12">

                <div id="accordion">

                    <div class="card card-outline card-primary">                   
                        <div class="card-header">
                            <h3 class="card-title text-bold">
                                <a class="d-block w-100 collapsed" data-toggle="collapse" href="#personalinfo" aria-expanded="true">
                                    Personal Information
                                </a>
                            </h3>               
                        </div>

                        <div id="personalinfo" data-parent="#accordion">
                            <div class="card-body">
                                
                            </div>
                        </div>
                    </div>

                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h3 class="card-title text-bold">
                                <a class="d-block w-100 collapsed" data-toggle="collapse" href="#experience" aria-expanded="false">
                                    Work Experience
                                </a>
                            </h3>
                        </div>
                        
                        <div id="experience" data-parent="#accordion">
                            <div class="card-body">
                                
                            </div>
                        </div>
                    </div>

                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h3 class="card-title text-bold">
                                <a class="d-block w-100 collapsed" data-toggle="collapse" href="#qualification" aria-expanded="false">
                                Qualifications
                                </a>
                            </h3>
                        </div>
                        
                        <div id="qualification" data-parent="#accordion">
                            <div class="card-body">
                                
                            </div>
                        </div>
                    </div>
                    
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h3 class="card-title text-bold">
                                <a class="d-block w-100 collapsed" data-toggle="collapse" href="#training" aria-expanded="false">
                                    Training Attended
                                </a>
                            </h3>
                        </div>
                        
                        <div id="training" data-parent="#accordion">
                            <div class="card-body">
                                
                            </div>
                        </div>
                    </div>

                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h3 class="card-title text-bold">
                                <a class="d-block w-100 collapsed" data-toggle="collapse" href="#reference" aria-expanded="false">
                                    References
                                </a>
                            </h3>
                        </div>
                        
                        <div id="reference" data-parent="#accordion">
                            <div class="card-body">
                                
                            </div>
                        </div>
                    </div>

                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h3 class="card-title text-bold">
                                <a class="d-block w-100 collapsed" data-toggle="collapse" href="#skill" aria-expanded="false">
                                    Skills Acquired
                                </a>
                            </h3>
                        </div>
                        
                        <div id="skill" data-parent="#accordion">
                            <div class="card-body">
                                
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">
                
                <div class="card card-outline card-primary">                   
                    <div class="card-header">
                        <h3 class="card-title text-bold">
                            Supporting Documents
                        </h3>               
                    </div>
                    
                    <div class="card-body">
                        
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>

  