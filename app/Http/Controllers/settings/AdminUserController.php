<?php

namespace App\Http\Controllers\settings;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admin = User::paginate(5);
        return view('admin.settings.admin.index', compact('admin'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.settings.admin.create');
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
            'admin_name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'unique:admin_user'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        User::create([
            'admin_name' => $request['admin_name'],
            'username' => $request['username'],
            'password' => Hash::make($request['password']),
        ]);

        return redirect()->route('admin-setting-admin.index')
            ->with('success','Admin user created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $admin = User::findOrFail($id);

        return view('admin.settings.admin.show', compact('admin'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $admin = User::findOrFail($id);

        return view('admin.settings.admin.edit', compact('admin'));
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
            'admin_name' => ['required', 'string', 'max:255'],
            'username' => ['required'],
            'status' => ['required'],
        ]);

        User::findOrFail($id)->update($request->all());

        return redirect()->route('admin-setting-admin.index')
            ->with('success','Admin user Upsate successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::findOrFail($id)->delete();

        return redirect()->route('admin-setting-admin.index')
            ->with('success','Admin User Deleted successfully');
    }
}
