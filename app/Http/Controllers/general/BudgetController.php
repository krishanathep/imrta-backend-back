<?php

namespace App\Http\Controllers\general;

use App\Models\Budget;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BudgetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $budget = Budget::all();
        return view('admin/general/budget.index', compact('budget'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/general/budget.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'budget_prefix' => 'required',
            'budget_name_TH' => 'required',
            'budget_name_EN' => 'required',
            'budget_type' => 'required',
        ]);

        Budget::create($request->all());

        return redirect()->route('admin-general-budget.index')
            ->with('success','Budget Soource created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $budget = Budget::findOrFail($id);
        return view('admin/general/budget.show', compact('budget'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $budget = Budget::findOrFail($id);
        return view('admin/general/budget.edit', compact('budget'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'budget_prefix' => 'required',
            'budget_name_TH' => 'required',
            'budget_name_EN' => 'required',
            'budget_type' => 'required',
        ]);

        Budget::findOrFail($id)->update($request->all());

        return redirect()->route('admin-general-budget.index')
            ->with('success','Budget Soource updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Budget::findOrFail($id)->delete();

        return redirect()->route('admin-general-budget.index')
            ->with('success','Budget Source Deleted successfully');
    }
}
