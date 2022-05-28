<?php

namespace Luanardev\Modules\Recruitment\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Luanardev\Modules\Recruitment\Entities\Vacancy;

class ShortlistController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $vacancies = Vacancy::getShortlisted();
        return view('recruitment::shortlist.index')->with([
            'vacancies' => $vacancies
        ]);
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function printall(Request $request)
    {
        $selected = $request->vacancy;
        if(empty($selected)){
            $vacancies = Vacancy::getShortlisted();
        }else{
            $vacancies = Vacancy::getShortlisted($selected);
        }
        if(!$vacancies->count()){
            return back()->with('error', 'No shortlisted vacancies found');
        }

        return view('recruitment::shortlist.printall')->with('vacancies', $vacancies);
    }

    /**
     * Show the specified resource.
     * @param Vacancy $vacancy
     * @return Renderable
     */
    public function show(Vacancy $vacancy)
    {
        return view('recruitment::shortlist.show')->with([
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
        return view('recruitment::shortlist.print')->with([
            'vacancy' => $vacancy
        ]);
    }

}
