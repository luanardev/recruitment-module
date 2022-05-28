

<div class="card card-outline">

    <form wire:submit.prevent="save">
        <div class="card-header">
            <h3 class="card-title text-bold"> 
				Interview Information
			</h3>
            <div class="float-right">
                <button type="submit" class="btn btn-sm btn-primary"> 
                    <i class="fas fa-check-circle"></i> Save 
                </button>
        
                <a href="{{route('interview.index')}}" class="btn btn-sm btn-secondary"> 
                    <i class="fas fa-times-circle"></i> Cancel
                </a>
            </div>   
        </div>
        
        <div class="card-body">

            <x-adminlte-validation />

            <div class="row">
                
                <div class="col-lg-8">

                    <div class="form-group row">
                        <label class="text-lg-right col-sm-3 col-form-label col-form-label-sm ">
                            Date *
                        </label>
                        <div class="col-sm-6">
                            <input type="date" wire:model="interview.date"  class="form-control" />
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="text-lg-right col-sm-3 col-form-label col-form-label-sm ">
                            Time *
                        </label>
                        <div class="col-sm-6">
                            <input type="time" wire:model="interview.time"  class="form-control" />
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="text-lg-right col-sm-3 col-form-label col-form-label-sm ">
                            Venue *
                        </label>
                        <div class="col-sm-6">
                            <input type="text" wire:model="interview.venue"  class="form-control" />
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="text-lg-right col-sm-3 col-form-label col-form-label-sm ">
                           Campus *
                        </label>
                        <div class="col-sm-6">
                            <select wire:model="interview.campus_id" class="form-control">
                                <option value="">Select</option>							
                                @foreach ($viewBag->get('campus') as $id => $name)
                                    <option value="{{$id}}" >{{$name}}</option>
                                @endforeach
                            </select>	
                        </div>
                    </div>

                    <div class="form-group row" >
                        <label class="text-lg-right col-sm-3 col-form-label col-form-label-sm ">
                           Vacancies *
                        </label>
                        <div class="col-sm-6">
                            <select wire:model="vacancy" class="form-control" multiple="multiple">							
                                @foreach ($viewBag->get('vacancy') as $id => $post)
                                    <option value="{{$id}}" >{{$post}}</option>
                                @endforeach
                            </select>	
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="text-lg-right col-sm-3 col-form-label col-form-label-sm ">
                            Panelists *
                        </label>
                        <div class="col-sm-6">
                            <select wire:model="panelist" class="form-control" multiple="multiple">							
                                @foreach ($viewBag->get('staff') as $id => $fullname)
                                    <option value="{{$id}}" >{{$fullname}}</option>
                                @endforeach
                            </select>	
                        </div>
                    </div>

                    
                </div>
            </div>
        </div>
    </form>

</div>
