<?php

namespace Luanardev\Modules\Recruitment\Http\Livewire\Application;

use Luanardev\LivewireUI\LivewireUI;
use Luanardev\Modules\Recruitment\Entities\Vacancy;

class Applications extends LivewireUI
{
	public Vacancy $vacancy;

	public function mount(Vacancy $vacancy)
	{
		$this->vacancy = $vacancy;
	}

	public function render()
    {
        return view('recruitment::livewire.application.applications');
    }


}
