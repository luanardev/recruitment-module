<?php

namespace Luanardev\Modules\Recruitment\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Haruncpi\LaravelUserActivity\Traits\Loggable;

class JobInterview extends Model
{
    use HasFactory, 
        Loggable;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'hrm_job_interviews';

	/**
     * The primary key associated with the model.
     *
     * @var string
     */
	protected $primaryKey = 'id';

    /**
     * Fillable attributes
     *
     * @var array
     */
    protected $fillable = [
        
    ];
}
