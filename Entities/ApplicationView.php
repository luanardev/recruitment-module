<?php

namespace Luanardev\Modules\Recruitment\Entities;

use Illuminate\Database\Eloquent\Model;
use Luanardev\Modules\Recruitment\Concerns\ApplicationHelper;

class ApplicationView extends Model
{

    use ApplicationHelper;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'hrm_recruit_application_view';

    /**
     * The primary key associated with the model.
     *
     * @var string
     */
	protected $primaryKey = 'id';

    /**
     * Search Scope for Laravel Livewire DataTable
     * @var Illuminate\Database\Eloquent\Builder $query
     * @var string $term
     * @return Illuminate\Database\Eloquent\Builder
     */
    public function scopeSearch($query, $term)
    {
        return $query->where(
            fn ($query) => $query->where('id', 'like', "%{$term}%")
                ->orWhere('name', 'like', "%{$term}%")
                ->orWhere('gender', 'like', "%{$term}%")
                ->orWhere('status', 'like', "%{$term}%")
                ->orWhere('position', 'like', "%{$term}%")

        );
    }

    /**
     * Search Scope for Laravel Livewire DataTable
     * @var string $term
     */
    public static function search($term)
    {
        return static::where('id', 'like', "%{$term}%")
            ->orWhere('name', 'like', "%{$term}%")
            ->orWhere('gender', 'like', "%{$term}%")
            ->orWhere('status', 'like', "%{$term}%")
            ->orWhere('position', 'like', "%{$term}%");
    }

    /**
     * Get By Vacancy
     * @return Illuminate\Database\Eloquent\Builder
     */
    public static function getByVacancy($vacancy)
    {
        if($vacancy instanceof Vacancy){
            $vacancy = $vacancy->id;
        }
        return static::where('vacancy_id', $vacancy);
    }

    /**
     * Get By Vacancy
     * @return Illuminate\Database\Eloquent\Builder
     */
    public static function getShortlist($vacancy)
    {
        if($vacancy instanceof Vacancy){
            $vacancy = $vacancy->id;
        }
        return static::where('vacancy_id', $vacancy)->where('status', 'Shortlisted');
    }

}
