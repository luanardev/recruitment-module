<?php

namespace Luanardev\Modules\Recruitment\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Luanardev\Modules\Recruitment\Entities\Interview;

class InterviewController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('recruitment::interview.index');
    }


    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {     
        return view('recruitment::interview.create');
    }

    /**
     * Show the specified resource.
     * @param Interview $interview
     * @return Renderable
     */
    public function show(Interview $interview)
    {
        return view('recruitment::interview.index')
            ->with('interview', $interview);
    }

    
}
