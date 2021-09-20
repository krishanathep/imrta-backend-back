<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Additional;
use App\Models\Categorys;
use App\Models\Members;

use Illuminate\Support\Facades\Schema;

class AdditionalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $additional = Additional::with('categorys', 'members')->orderBy('shopping_add_id', 'desc')->get();
        return view('admin.shoppinglist.additional.index', compact('additional' ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorys = Categorys::all();
        $members = Members::all();

        return view('admin.shoppinglist.additional.create', compact('categorys', 'members'));
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
            'user_id' => 'required',
            'shopping_category_id' => 'required',
            'shopping_add_name' => 'required',
            'shopping_add_details' => 'required',
            'shopping_list_status' => 'required',
        ]);

        Additional::create($request->all());

        return redirect()->route('admin-shoppinglist-additional.index')
            ->with('success','Additional created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $additional = Additional::findOrFail($id);
        return view('admin.shoppinglist.additional.show', compact('additional'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categorys = Categorys::all();
        $members = Members::all();
        $additional = Additional::findOrFail($id);
        return view('admin.shoppinglist.additional.edit', compact('additional','categorys','members'));
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
        // drop foreingnkey
        Schema::disableForeignKeyConstraints();

        $this->validate($request, [
            'user_id' => 'required',
            'shopping_category_id' => 'required',
            'shopping_add_name' => 'required',
            'shopping_add_details' => 'required',
            'shopping_list_status' => 'required',
        ]);

        Additional::findOrFail($id)->update($request->all());

        return redirect()->route('admin-shoppinglist-additional.index')
            ->with('success','Additional updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Additional::findOrFail($id)->delete();

        return redirect()->route('admin-shoppinglist-additional.index')
            ->with('success','Additional Deleted successfully');
    }
}
