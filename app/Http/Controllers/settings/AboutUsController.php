<?php

namespace App\Http\Controllers\settings;

use App\Models\Aboutus;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $aboutus = Aboutus::all();
        return view('admin.settings.aboutus.index', compact('aboutus'));
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $aboutus = Aboutus::findOrFail($id);
        return view('admin.settings.aboutus.show', compact('aboutus'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $aboutus = Aboutus::findOrFail($id);
        return view('admin.settings.aboutus.edit', compact('aboutus'));
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
            'body' => 'required',
        ]);

        Aboutus::findOrFail($id)->update($request->all());

        return redirect()->route('admin-setting-aboutus.index')
            ->with('success','About us updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Aboutus::findOrFail($id)->delete();

        return redirect()->route('admin-setting-aboutus.index')
            ->with('success','About us Deleted successfully');
    }
}
