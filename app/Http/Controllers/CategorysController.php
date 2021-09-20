<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categorys;
use Illuminate\Support\Facades\Schema;

class CategorysController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorys = Categorys::all();
        return view('admin.shoppinglist.categorys.index', compact('categorys'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.shoppinglist.categorys.create');
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
            'shopping_category_name_th' => 'required',
            'shopping_category_name_en' => 'required',
            'shopping_category_details' => 'required',
            'shopping_category_status' => 'required',
        ]);

        Categorys::create($request->all());

        return redirect()->route('admin-shoppinglist-categorys.index')
            ->with('success','Categorys created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $categorys = Categorys::findOrFail($id);
        return view('admin.shoppinglist.categorys.show', compact('categorys'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categorys = Categorys::findOrFail($id);
        return view('admin.shoppinglist.categorys.edit', compact('categorys'));
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
            'shopping_category_name_th' => 'required',
            'shopping_category_name_en' => 'required',
            'shopping_category_details' => 'required',
            'shopping_category_status' => 'required',
        ]);

        $categorys = Categorys::findOrFail($id)->update($request->all());

        return redirect()->route('admin-shoppinglist-categorys.index')
            ->with('success','Categorys created successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Categorys::findOrFail($id)->delete();

        return redirect()->route('admin-shoppinglist-categorys.index')
            ->with('success','Categorys Deleted successfully');
    }
}
