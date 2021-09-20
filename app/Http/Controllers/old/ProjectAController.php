<?php

namespace App\Http\Controllers\old;

use App\Http\Controllers\Controller;
use App\Models\old\ProjectApprove;
use Illuminate\Http\Request;

class ProjectAController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projectapprove = ProjectApprove::all();

        return view('admin.old.projectapprove.index', compact('projectapprove'));
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
     * @param  \App\Models\old\ProjectApprove  $projectApprove
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $projectapprove = ProjectApprove::findOrfail($id);

        return view('admin.old.projectapprove.show', compact('projectapprove'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\old\ProjectApprove  $projectApprove
     * @return \Illuminate\Http\Response
     */
    public function edit(ProjectApprove $projectApprove)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\old\ProjectApprove  $projectApprove
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProjectApprove $projectApprove)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\old\ProjectApprove  $projectApprove
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProjectApprove $projectApprove)
    {
        //
    }
}
