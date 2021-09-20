<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Branch;

class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $branch = Branch::all();
        return view('admin.shoppinglist.branch.index', compact('branch'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.shoppinglist.branch.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'shopping_category_id' => 'required',
            'shopping_branch_id' => 'required',
            'branch_name_en' => 'required',
            'branch_full_name' => 'required',
            'branch_status' => 'required',
            'branch_details_file_name' => 'required|mimes:pdf|max:2048',
        ]);

        $input = $request->all();

        if ($image = $request->file('branch_details_file_name')) {
            $destinationPath = 'assets/pdf/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['branch_details_file_name'] = "$profileImage";
            $input['branch_part'] = "assets/pdf/$profileImage";
        }
        Branch::create($input);

        return redirect()->route('admin-shoppinglist-branch.index')
            ->with('success', 'Branch created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $branch = Branch::findOrFail($id);
        return view('admin.shoppinglist.branch.show', compact('branch'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $branch = Branch::findOrFail($id);
        return view('admin.shoppinglist.branch.edit', compact('branch'));
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
        $request->validate([
            'shopping_category_id' => 'required',
            'shopping_branch_id' => 'required',
            'branch_name_en' => 'required',
            'branch_full_name' => 'required',
            'branch_status' => 'required',
        ]);

        $input = $request->all();

        if ($image = $request->file('branch_details_file_name')) {
            $destinationPath = 'assets/pdf/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['branch_details_file_name'] = "$profileImage";
            $input['branch_part'] = "assets/pdf/$profileImage";
        }else{
            unset($input['branch_details_file_name']);
            unset($input['branch_part']);
        }

        Branch::findOrFail($id)->update($input);;  
    
        return redirect()->route('admin-shoppinglist-branch.index')
                        ->with('success','Branch updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $branch = Branch::findOrFail($id);
        
        unlink($branch->branch_part);

        $branch->delete();

        return redirect()->route('admin-shoppinglist-branch.index')
                        ->with('success','Branch deleted successfully');
    }
}
