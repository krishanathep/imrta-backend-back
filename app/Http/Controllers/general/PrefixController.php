<?php

namespace App\Http\Controllers\general;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Prefix;

class PrefixController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prefix = Prefix::all();
        return view('admin.general.prefix.index', compact('prefix'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.general.prefix.create');
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
            'prefix_name_th' => 'required',
            'prefix_name_en' => 'required',
            'prefix_status' => 'required',
        ]);

        Prefix::create($request->all());

        return redirect()->route('admin-general-prefix.index')
            ->with('success','Prefix created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $prefix = Prefix::findOrFail($id);
        return view('admin.general.prefix.show', compact('prefix'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $prefix = Prefix::findOrFail($id);
        return view('admin.general.prefix.edit', compact('prefix'));
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
            'prefix_name_th' => 'required',
            'prefix_name_en' => 'required',
            'prefix_status' => 'required',
        ]);

        Prefix::findOrFail($id)->update($request->all());
        return redirect()->route('admin-general-prefix.index')
            ->with('success','Prefix updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Prefix::findOrFail($id)->delete();

        return redirect()->route('admin-general-prefix.index')
            ->with('success','Prefix Deleted successfully');
    }
}
