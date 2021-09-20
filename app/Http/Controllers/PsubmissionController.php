<?php

namespace App\Http\Controllers;

use App\Models\Psubmission;
use App\Models\Research;
use App\Models\Pdevpaarove;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class PsubmissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $psubmission = Psubmission::with('research', 'pdevpaarove')->orderBy('proposal_sub_id', 'desc')->get();
        //dd($psubmission);
        return view('admin.psubmission.index', compact('psubmission'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.psubmission.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // drop foreingnkey
        Schema::disableForeignKeyConstraints();

        $this->validate($request, [     
            'proposal_dev_approve_id' => 'required',
            'proposalsub_ResearchType_id' => 'required',
            'proposal_sub_status' => 'required',
        ]);

        Psubmission::create($request->all());

        return redirect()->route('admin-psubmission.index')
            ->with('success','Proposal supmission created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Psubmision  $psubmision
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $psubmission = Psubmission::findOrFail($id);   
        return view('admin.psubmission.show', compact('psubmission'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Psubmision  $psubmision
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $research = Research::all();
        $pdevpaarove = Pdevpaarove::all();
        $psubmission = Psubmission::findOrFail($id);
        return view('admin.psubmission.edit', compact('psubmission', 'research', 'pdevpaarove'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Psubmision  $psubmision
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         // drop foreingnkey
         Schema::disableForeignKeyConstraints();

         $this->validate($request, [
            'proposal_dev_approve_id' => 'required',
            'proposalsub_ResearchType_id' => 'required',
            'proposal_sub_status' => 'required',
        ]);
 
        Psubmission::findOrFail($id)->update($request->all());
        return redirect()->route('admin-psubmission.index')
             ->with('success','Proposal submission updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Psubmision  $psubmision
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Psubmission::findOrFail($id)->delete();
        return redirect()->route('admin-psubmission.index')
            ->with('success','Proposal submission deleted successfully');
    }
}
