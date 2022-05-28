
<div class="card card-outline" id="test">

    <form wire:submit.prevent="save">
        <div class="card-header">
            <h3 class="card-title text-bold"> 
				Vacancy Information
			</h3>
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
                        <textarea id="description" wire:model="description" class="form-control" ></textarea>
                    </div>

                    <div class="form-group">
                        <label>Job Requirements *</label>
                        <textarea id="requirements" wire:model="requirements"  class="form-control" ></textarea>
                    </div>
                </div>
            </div>
        </div>
    </form>

</div>

@push('js')
    <script> 
    
        @this.set('description', 'Testing 1234');

        /**$('#description').summernote({
            height: 300,
            callbacks: {
                onChange: function(contents, $editable) {           
                    @this.set('description', contents);
                }
            }
        });

        $('#requirements').summernote({
            height: 300,
            callbacks: {
                onChange: function(contents, $editable) {           
                    @this.set('requirements', contents);
                }
            }
        });**/                        
    </script>
@endpush