<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Members;
use App\Models\Department;
use App\Models\Prefix;
use App\Models\Position;
use App\Models\Groupuser;
use Illuminate\Support\Facades\Schema;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $members = Members::with('department', 'prefix', 'position', 'groupuser')->orderBy('id', 'desc')->get();
        return view('admin.members.index', compact('members'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.members.create');
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
        $members = Members::findOrFail($id);

        return view('admin.members.show', compact('members'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $department = Department::all();
        $prefix = Prefix::all();
        $position = Position::all();
        $members = Members::findOrFail($id);
        $groupuser = Groupuser::all();
        
        return view('admin.members.edit', compact('members','prefix', 'position', 'department', 'groupuser'));
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
            'User_prefix_id' => 'required',
            'name' => 'required',
            'User_LName' => 'required',
            'User_DepartmentID' => 'required',
            'user_position' => 'required',
            'User_GroupID' => 'required',
            'email' => 'required',
            'User_Mobile' => 'required',
            'User_Status' => 'required'
        ]);

        Members::findOrFail($id)->update($request->all());

        return redirect()->route('admin-members.index')
            ->with('success','Member updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Members::findOrFail($id)->delete();

        return redirect()->route('admin-members.index')
        ->with('success','Member Deleted successfully');
    }
}
