<?php

namespace App\Http\Controllers;

use App\Models\Shoppinglist;
use App\Models\Categorys;
use App\Models\Branch;
use App\Models\Members;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class ShoppingListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shoppinglist = Shoppinglist::with('categorys', 'branch', 'members')->orderBy('shopping_list_id', 'desc')->get();
        return view('admin.shoppinglist.group.index', compact('shoppinglist'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorys = Categorys::all();
        $branch = Branch::all();
        $members = Members::all();

        return view('admin.shoppinglist.group.create', compact('categorys', 'branch', 'members'));
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
            'category_id' => 'required',
            'category_branch_id' => 'required',
            'user_id' => 'required',
        ]);

        Shoppinglist::create($request->all());

        return redirect()->route('admin-shoppinglist.index')
            ->with('success','Shoppoinglist created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Shoppinglist  $shoppinglist
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $shoppinglist = Shoppinglist::findOrFail($id);
        return view('admin.shoppinglist.group.show', compact('shoppinglist'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Shoppinglist  $shoppinglist
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categorys = Categorys::all();
        $branch = Branch::all();
        $members = Members::all();
        $shoppinglist = Shoppinglist::findOrFail($id);

        return view('admin.shoppinglist.group.edit', compact('shoppinglist', 'categorys', 'branch', 'members'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Shoppinglist  $shoppinglist
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // drop foreingnkey
        Schema::disableForeignKeyConstraints();

        $this->validate($request, [
            'category_id' => 'required',
            'category_branch_id' => 'required',
            'user_id' => 'required',
        ]);

        Shoppinglist::findOrFail($id)->update($request->all());

        return redirect()->route('admin-shoppinglist.index')
            ->with('success','Shoppoinglist updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Shoppinglist  $shoppinglist
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Shoppinglist::findOrFail($id)->delete();

        return redirect()->route('admin-shoppinglist.index')
            ->with('success','Shoppinglist Deleted successfully');
    }
}
