<?php

namespace Luanardev\Modules\Recruitment\Http\Livewire\Interview;

use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Filter;
use Luanardev\Modules\Recruitment\Entities\Interview;
use Luanardev\LivewireAlert\WithLivewireAlert;
use Illuminate\Support\Facades\Http;

class InterviewTable extends DataTableComponent
{
	use WithLivewireAlert;

	public array $perPageAccepted = [10, 20, 50, 100, 200, 500];

	public bool $showSearch = false;

	public function getTableRowUrl($row): string
	{
		return route('interview.show', $row);
	}

	/***
	public function rowView(): string
	{
		return 'recruitment::livewire.interview.table-row';
	}**/

	public function getListeners()
    {
        return [
            'refresh' => '$refresh',
        ];
    }

	public function columns(): array
	{
		return [
			Column::make('Date'),
			Column::make('Time'),
			Column::make('Venue'),
			Column::make('Description'),			
			Column::make('Status'),			
		];
	}

	public function query(): Builder
	{
		return Interview::getByCampus()->whereStatus('Open');
	}

}
