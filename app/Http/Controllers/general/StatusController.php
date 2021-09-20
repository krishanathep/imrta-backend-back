<?php

namespace App\Http\Controllers\general;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Typestatus;
use App\Models\Typemain;
use App\Models\Typesub;

class StatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $status = Typestatus::with('typemain', 'typesub')->orderBy('type_status_id', 'desc')->get();
        return view('admin.general.status.index', compact('status'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $main = Typemain::all();
        $sub = Typesub::all();

        return view('admin.general.status.create', compact('main', 'sub'));
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
            'type_main_id' => 'required',
            'type_sub_id' => 'required',
            'type_status_text' => 'required',
            'type_status_action' => 'required',
            'status' => 'required',
        ]);

        Typestatus::create($request->all());

        return redirect()->route('admin-general-status.index')
            ->with('success','Type Status created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $status = Typestatus::findOrFail($id);
        return view('admin.general.status.show', compact('status'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $main = Typemain::all();
        $sub = Typesub::all();

        $status = Typestatus::findOrFail($id);
        return view('admin.general.status.edit', compact('status','main', 'sub'));
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
            'type_main_id' => 'required',
            'type_sub_id' => 'required',
            'type_status_text' => 'required',
            'type_status_action' => 'required',
            'status' => 'required',
        ]);

        Typestatus::findOrFail($id)->update($request->all());

        return redirect()->route('admin-general-status.index')
            ->with('success','Type Status updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Typestatus::findOrFail($id)->delete();

        return redirect()->route('admin-general-status.index')
            ->with('success','Shoppinglist Deleted successfully');
    }
}
