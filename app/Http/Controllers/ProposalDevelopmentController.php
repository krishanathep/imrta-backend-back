<?php

namespace App\Http\Controllers;

use App\Models\Proposaldevelopment;
use App\Models\Concepapprove;
use App\Models\Research;
use App\Models\Shoppinglist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class ProposalDevelopmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $proposaldevelopment = Proposaldevelopment::with('concepapprove', 'research', 'shoppinglist')->orderBy('proposal_dev_id', 'desc')->get();
       //dd($proposaldevelopment);
        return view('admin.proposaldevelopment.index', compact('proposaldevelopment'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.proposaldevelopment.create');
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
           
            'concept_approve_id' => 'required',
            'shopping_id' => 'required',
            'proposal_dev_name' => 'required',
            'proposal_dev_details' => 'required',
            'research_type_id' => 'required',
            'proposal_dev_type' => 'required',
            'proposal_dev_status' => 'required',
        ]);

        Proposaldevelopment::create($request->all());

        return redirect()->route('admin-proposaldevelopment.index')
            ->with('success','Proposal developmemt created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Proposaldevelopment  $proposaldevelopment
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $proposaldevelopment = Proposaldevelopment::findOrFail($id);
        return view('admin.proposaldevelopment.show', compact('proposaldevelopment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Proposaldevelopment  $proposaldevelopment
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $concepapprove = Concepapprove::all();
        $research = Research::all();
        $shoppinglist = Shoppinglist::all();

        $proposaldevelopment = Proposaldevelopment::findOrFail($id);
        return view('admin.proposaldevelopment.edit', compact('proposaldevelopment', 'concepapprove', 'research', 'shoppinglist'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Proposaldevelopment  $proposaldevelopment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // drop foreingnkey
        Schema::disableForeignKeyConstraints();

        $this->validate($request, [
            
            'concept_approve_id' => 'required',
            'shopping_id' => 'required',
            'proposal_dev_name' => 'required',
            'proposal_dev_details' => 'required',
            'research_type_id' => 'required',
            'proposal_dev_type' => 'required',
            'proposal_dev_status' => 'required',
        ]);

        Proposaldevelopment::findOrFail($id)->update($request->all());
        return redirect()->route('admin-proposaldevelopment.index')
            ->with('success','Proposal developmemt updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Proposaldevelopment  $proposaldevelopment
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Proposaldevelopment::findOrFail($id)->delete();
        return redirect()->route('admin-proposaldevelopment.index')
            ->with('success','Proposal development deleted successfully');
    }
}
