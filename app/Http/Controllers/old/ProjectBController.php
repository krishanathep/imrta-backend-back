<?php

namespace App\Http\Controllers\old;

use App\Http\Controllers\Controller;
use App\Models\old\ProjectBudget;
use Illuminate\Http\Request;

class ProjectBController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projectbudget = ProjectBudget::all();

        return view('admin.old.projectbudget.index', compact('projectbudget'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\old\ProjectBudget  $projectBudget
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $projectbudget = ProjectBudget::findOrFail($id); 

        return view('admin.old.projectbudget.show', compact('projectbudget'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\old\ProjectBudget  $projectBudget
     * @return \Illuminate\Http\Response
     */
    public function edit(ProjectBudget $projectBudget)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\old\ProjectBudget  $projectBudget
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProjectBudget $projectBudget)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\old\ProjectBudget  $projectBudget
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProjectBudget $projectBudget)
    {
        //
    }
}
