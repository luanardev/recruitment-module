<?php

namespace Luanardev\Modules\Recruitment\Http\Livewire\Shortlist;

use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Filter;
use Luanardev\Modules\Recruitment\Entities\Vacancy;
use Luanardev\Modules\Recruitment\Entities\Application;
use Luanardev\Modules\Recruitment\Entities\ApplicationView;
use Luanardev\LivewireAlert\WithLivewireAlert;

class ShortlistTable extends DataTableComponent
{
	use WithLivewireAlert;

	public array $perPageAccepted = [10, 20, 50, 100, 200, 500];

	public Vacancy $vacancy;

	public function mount(Vacancy $vacancy)
	{
		$this->vacancy = $vacancy;
	}

	public function getTableRowUrl($row): string
	{
		return route('application.show', $row);
	}

	public function getListeners()
    {
        return [
            'refresh' => '$refresh',
        ];
    }

	public function discardAction()
	{
		if(count($this->selectedKeys)){
			foreach($this->selectedKeys as $key){
				$application = Application::find($key);
				$application->discard();
			}
			$this->emit('refresh');
			$this->toastr('Applicant discarded');
		}else{
			return $this->toastrError('No record selected');
		}
	}

	public function bulkActions(): array
	{
		return [
			'discardAction' => 'Discard',
		];
	}

	public function columns(): array
	{
		return [
			Column::make('Title'),
			Column::make('Name'),
			Column::make('Gender'),
			Column::make('Age'),				
			Column::make('Primary Phone', 'phone1'),				
			Column::make('Secondary Phone', 'phone2'),				
			Column::make('Address', 'physical_address'),	
		];
	}

	public function query(): Builder
	{
		return ApplicationView::getShortlist($this->vacancy)
            ->when($this->getFilter('search'), fn ($query, $term) => $query->search($term) );
	}

}
