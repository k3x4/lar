<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Role;
use DB;
use Hash;
use Yajra\Datatables\Datatables;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('admin.users.index');
    }

    public function data()
    {
        $query = User::query()
            ->select('users.*')
            ->addSelect(
                DB::raw('(SELECT COUNT(*) FROM listings WHERE author_id IS NOT NULL AND users.id = listings.author_id) AS li_count')
            );
        return Datatables::of($query)
            ->editColumn('email', 'datatables.user.edit')
            ->addColumn('listings', 'datatables.user.listings')
            ->addColumn('roles', 'datatables.user.roles')
            ->addColumn('action', 'datatables.user.action')
            ->editColumn('created_at', 'datatables.created_at')
            ->orderColumn('listings','li_count $1')
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::pluck('display_name','id');
        return view('admin.users.create',compact('roles'));
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
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm-password',
            //'roles' => 'required'
            'role' => 'required'
        ]);

        $input = $request->all();
        $input['password'] = Hash::make($input['password']);

        $user = User::create($input);
        // foreach ($request->input('roles') as $key => $value) {
        //     $user->attachRole($value);
        // }
        $user->attachRole($request->input('role'));

        return redirect()->route('admin.users.index')
                        ->with('success','User created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('admin.users.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::pluck('display_name','id');
        $userRole = $user->roles->pluck('id','id')->toArray();

        return view('admin.users.edit',compact('user','roles','userRole'));
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
            'email' => 'required|email|unique:users,email,'.$id,
            'password' => 'same:confirm-password',
            //'roles' => 'required'
            'role' => 'required'
        ]);

        $input = $request->all();
        if (!empty($input['password'])) {
            $input['password'] = Hash::make($input['password']);
        } else {
            $input = array_except($input, array('password'));
        }

        $user = User::find($id);
        $user->update($input);
        DB::table('role_user')->where('user_id',$id)->delete();
        
        // foreach ($request->input('roles') as $key => $value) {
        //     $user->attachRole($value);
        // }
        $user->attachRole($request->input('role'));

        return redirect()->route('admin.users.index')
                         ->with('success','User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $ids = explode(',', $request->input('ids'));
        User::destroy($ids);
        return redirect()->route('admin.users.index')
                        ->with('success','Users deleted successfully');
    }

}
