<?php

namespace Luanardev\Modules\Recruitment\Http\Livewire\Application;

use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Filter;
use Luanardev\Modules\Recruitment\Entities\Vacancy;
use Luanardev\Modules\Recruitment\Entities\Application;
use Luanardev\Modules\Recruitment\Entities\ApplicationView;
use Luanardev\LivewireAlert\WithLivewireAlert;

class ApplicationTable extends DataTableComponent
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

	public function rowView(): string
	{
		return 'recruitment::livewire.application.table-row';
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
			Column::make('Title'),
			Column::make('Name'),
			Column::make('Gender'),
			Column::make('Age'),				
			Column::make('Address'),	
			Column::make('Status'),	
		];
	}

	public function shortlistAction()
	{
		if(count($this->selectedKeys)){
			foreach($this->selectedKeys as $key){
				$application = Application::find($key);
				$application->shortlist();
			}
			$this->emit('refresh');
			$this->toastr('Applicant shortlisted');
		}else{
			return $this->toastrError('No record selected');
		}
	}

	public function bulkActions(): array
	{
		return [
			'shortlistAction' => 'Shortlist',
		];
	}

	public function query(): Builder
	{
		return ApplicationView::getByVacancy($this->vacancy)
            ->when($this->getFilter('search'), 
				fn ($query, $term) => $query->search($term) 
			)
			->when($this->getFilter('status'),
                fn ($query, $value) => $query->where('status', $value)
            );
	}

}
