<?php

namespace Luanardev\Modules\Recruitment\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Luanardev\Modules\Recruitment\Entities\Vacancy;
use Luanardev\Modules\Recruitment\Entities\Application;
use PDF;

class VacancyController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('recruitment::vacancy.index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('recruitment::vacancy.create');
    }

    /**
     * Show the specified resource.
     * @param Vacancy $vacancy
     * @return Renderable
     */
    public function show(Vacancy $vacancy)
    {
        return view('recruitment::vacancy.show')->with([
            'vacancy' => $vacancy
        ]);
    }

    /**
     * Show the specified resource.
     * @param Vacancy $vacancy
     * @return Renderable
     */
    public function print(Vacancy $vacancy)
    {
        $name = Str::kebab($vacancy->getPosition());

        $pdf = PDF::loadView('recruitment::vacancy.print', [
            'vacancy' => $vacancy
        ]);

        return $pdf->stream('vacancy_'.$name.'.pdf');
       
    }


}
