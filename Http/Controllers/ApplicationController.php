<?php

namespace Luanardev\Modules\Recruitment\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Luanardev\Modules\Recruitment\Entities\Vacancy;
use Luanardev\Modules\Recruitment\Entities\Application;
use PDF;

class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Vacancy $vacancy)
    {
        return view('recruitment::application.index')->with([
            'vacancy' => $vacancy
        ]);
    }

    /**
     * Show the specified resource.
     * @param Vacancy $vacancy
     * @return Renderable
     */
    public function show(Application $application)
    { 
        if($application->isReceived() ){
            $application->review();
        }      
        return view('recruitment::application.show')->with([
            'application' => $application
        ]);
    }

    /**
     * Show the specified resource.
     * @param Vacancy $vacancy
     * @return Renderable
     */
    public function print(Application $application)
    {
        return view('recruitment::application.print')->with([
            'application' => $application
        ]);
    }

    /**
     * Show the specified resource.
     * @param Vacancy $vacancy
     * @return Renderable
     */
    public function printAll(Vacancy $vacancy)
    {
        $name = Str::kebab($vacancy->getPosition());

        $pdf = PDF::loadView('recruitment::application.printall', [
            'vacancy' => $vacancy
        ]);

        return $pdf->stream('vacancy_'.$name.'_applications.pdf');
    }

}
