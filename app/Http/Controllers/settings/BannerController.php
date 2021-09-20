<?php

namespace App\Http\Controllers\settings;

use App\Models\Banner;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banner = Banner::paginate(5);
        return view('admin.settings.banner.index', compact('banner'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.settings.banner.create');
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
            'banner_target_url' => 'required',
            'banner_status' => 'required',
            'user_admin_id' => 'required',
            'banner_url' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'start_date' => 'required',
            'stop_date' => 'required',
        ]);

        $input = $request->all();

        if ($image = $request->file('banner_url')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['banner_url'] = "image/$profileImage";
        }
        Banner::create($input);

        return redirect()->route('admin-setting-banner.index')
            ->with('success', 'Banner created successfully.');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $banner = Banner::findOrFail($id);
        return view('admin.settings.banner.show', compact('banner'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $banner = Banner::findOrFail($id);
        return view('admin.settings.banner.edit', compact('banner'));
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
            'banner_target_url' => 'required',
            'banner_status' => 'required',
            'user_admin_id' => 'required',
        ]);
  
        $input = $request->all();

        if ($image = $request->file('banner_url')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['banner_url'] = "image/$profileImage";
        }else{
            unset($input['banner_url']);
        }

        Banner::findOrFail($id)->update($input);;  
    
        return redirect()->route('admin-setting-banner.index')
                        ->with('success','Banner updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $banner = Banner::findOrFail($id);
        
        //unlink(public_path().$banner->banner_url);

        $banner->delete();

        return redirect()->route('admin-setting-banner.index')
                        ->with('success','Banner deleted successfully');
    }
}
