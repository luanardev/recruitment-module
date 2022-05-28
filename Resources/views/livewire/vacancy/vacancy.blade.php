
<div class="card card-outline">
    <div class="card-header">
        <h3 class="card-title text-bold">{{$vacancy->getPosition()}}</h3>  
        <div class="float-right">
            
            <div class="mb-3 mb-md-0">
                <div class="dropdown d-block d-md-inline">
                    <button class="btn dropdown-toggle d-block w-100 d-md-inline" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Actions
                    </button>

                    <div class="dropdown-menu dropdown-menu-right w-100" aria-labelledby="actions">
                        
                        <a href="{{route('vacancy.print', $vacancy)}}"  class="dropdown-item" target="__blank">
                            <i class="fas fa-print"></i> Print
                        </a>
                        
                        @can('update_vacancy')
                            
                            @if($vacancy->isNotPublished())
                            <a href="#" wire:click.prevent="publish()" class="dropdown-item">
                                <i class="fas fa-regular fa-eye"></i> Publish
                            </a>
                            @endif

                            @if($vacancy->isPublished())
                            <a href="#" wire:click.prevent="unpublish()" class="dropdown-item">
                                <i class="fas fa-regular fa-eye-slash"></i> Unpublish
                            </a>
                            @endif

                            @if($vacancy->isNotApplicable())
                            <a href="#" wire:click.prevent="open()" class="dropdown-item">
                                <i class="fas fa-regular fa-lock-open"></i> Open 
                            </a>
                            @endif

                            @if($vacancy->isApplicable())
                            <a href="#" wire:click.prevent="close()" class="dropdown-item">
                                <i class="fas fa-regular fa-lock"></i> Close
                            </a>
                            @endif
                        @endcan

                        @can('delete_vacancy')
                            <a href="#" onclick="confirm('Are you sure?') || event.stopImmediatePropagation()" wire:click.prevent="delete()" class="dropdown-item">
                                <i class="fas fa-trash"></i> Delete
                            </a> 
                        @endcan
                                                
                    </div>
                </div>
            </div>
        </div>    
    </div>
    
    <div class="card-body">
        <form wire:submit.prevent="save">
            <div class="card-header">
                <div class="float-left">
                    <a href="{{route('applications.index', $vacancy)}}" class="btn btn-sm btn-primary" >
                        <i class="fas fa-users"></i> Applications 
                        <span class="text-bold">({{$vacancy->totalApplications()}})</span>
                    </a>
                    <a href="{{route('shortlist.show', $vacancy)}}" class="btn btn-sm btn-success" >
                        <i class="fas fa-users"></i> Shortlist 
                        <span class="text-bold">({{$vacancy->totalShortlisted()}}) </span>                            
                    </a>
                </div>
    
                <div class="float-right">
                    <button type="submit" class="btn btn-sm btn-primary"> 
                        <i class="fas fa-check-circle"></i> Save 
                    </button>
                    <a href="{{route('vacancy.index')}}" class="btn btn-sm btn-secondary"> 
                        <i class="fas fa-times-circle"></i> Cancel
                    </a>
                </div>   
            </div>
            <div class="card-body">
    
                <x-adminlte-validation />
    
                <div class="row">
                    
                    <div class="col-lg-12">
    
                        <div class="row">
    
                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label class="control-label">Position * </label>
                                    <select wire:model="vacancy.position_id" class="form-control select2" >
                                        <option value="">--select--</option>
                                        @foreach ($viewBag->get('positions') as $id => $name)
                                            <option value="{{$id}}" >{{$name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
        
                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label class="control-label">Grade * </label>
                                    <select wire:model="vacancy.scale" class="form-control select2" >
                                        <option value="">--select--</option>
                                        @foreach ($viewBag->get('scales') as $name)
                                            <option value="{{$name}}" >{{$name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
    
                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label class="control-label"> Campus * </label>
                                    <select wire:model.lazy="vacancy.campus_id" class="form-control select2" >
                                        <option value="">--select--</option>
                                        @foreach ($viewBag->get('campuses') as $id => $name)
                                            <option value="{{$id}}" >{{$name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
    
                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="form-group ">
                                    <label class="control-label">Department *</label>
                                    <select wire:model.lazy="vacancy.department_id" class="form-control select2" >
                                        <option value="">--select--</option>
                                        @foreach ($viewBag->get('departments') as $id => $name)
                                            <option value="{{$id}}" >{{$name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
    
                            <div class="col-lg-4 col-md-6 col-sm-12">              
                                <div class="form-group">
                                    <label class="control-label">Section *</label>
                                    <select wire:model.lazy="vacancy.section_id" class="form-control select2" >
                                        <option value="">--select--</option>
                                        @foreach ($viewBag->get('sections') as $id => $name)
                                            <option value="{{$id}}" >{{$name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
    
                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label class="control-label">Job Type *</label>
                                    <select wire:model.lazy="vacancy.job_type_id" class="form-control select2" >
                                        <option value="">--select--</option>
                                        @foreach ($viewBag->get('jobtypes') as $id =>  $name)
                                            <option value="{{$id}}" >{{$name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
        
                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label class="control-label ">Number of Posts *</label>
                                    <input type="numeric" wire:model="vacancy.positions"  class="form-control " />
                                </div>
                            </div>
    
                            @if($vacancy->job_type && $vacancy->isNotPermanent())
                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label class="control-label ">Job Duration</label>
                                    <input type="text" wire:model="vacancy.duration"  class="form-control " />
                                </div>
                            </div>
                            @endif
                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label class="control-label">Vacancy Type *</label>
                                    <select wire:model.lazy="vacancy.audience" class="form-control select2" >
                                        <option value="">--select--</option>
                                        @foreach (['Internal','External']  as $name)
                                            <option value="{{$name}}" >{{$name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label class="control-label ">Closing Date *</label>
                                    <input type="date" wire:model="vacancy.close_date"  class="form-control datepicker datemask " />
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-12"  wire:ignore>
                        <div class="form-group">
                            <label>Job Description *</label>
                            <textarea id="description" wire:model="description" class="form-control" >{{$description}}</textarea>
                        </div>
    
                        <div class="form-group">
                            <label>Job Requirements *</label>
                            <textarea id="requirements" wire:model="requirements"  class="form-control" >{{$requirements}}</textarea>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

@push('js')
    <script>
        
        $('#description').summernote({
            height: 300,
            callbacks: {
                onChange: function(contents, $editable) {           
                    window.livewire.emit('setDescription', contents);
                }
            }
        }); 

        $('#requirements').summernote({
            height: 300,
            callbacks: {
                onChange: function(contents, $editable) {           
                    window.livewire.emit('setRequirements', contents);
                }
            }
        });                 
    </script>
@endpush