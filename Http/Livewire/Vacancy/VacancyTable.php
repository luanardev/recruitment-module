<?php

namespace Luanardev\Modules\Recruitment\Http\Livewire\Vacancy;

use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Filter;
use Luanardev\Modules\Recruitment\Entities\VacancyView;
use Luanardev\LivewireAlert\WithLivewireAlert;
use Illuminate\Support\Facades\Http;

class VacancyTable extends DataTableComponent
{
	use WithLivewireAlert;

	public array $perPageAccepted = [10, 20, 50, 100, 200, 500];

	public function getTableRowUrl($row): string
	{
		return route('vacancy.show', $row);
	}

	public function rowView(): string
	{
		return 'recruitment::livewire.vacancy.table-row';
	}

	public function getListeners()
    {
        return [
            'refresh' => '$refresh',
        ];
    }

	public function columns(): array
	{
		return [
			Column::make('Post'),
			Column::make('Type'),
			Column::make('Positions'),
			Column::make('Posting'),			
			Column::make('Audience'),
			Column::make('Closing Date'),
			Column::make('Published'),
			Column::make('Status'),			
		];
	}

	public function query(): Builder
	{
		return VacancyView::getByCampus()->whereStatus('Open')
            ->when($this->getFilter('search'), fn ($query, $term) => $query->search($term) );
	}

}
