<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class RoleController extends Controller
{

    public function __construct()
    {
        $this->authorizeResource(Role::class, 'role');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::withCount('users')->get();
        return view('role.show', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('role.createform');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:roles|max:255',
        ]);
        $newRole = new Role();
        $newRole->name = $validated['name'];
        $newRole->save();
        return redirect()->route('roles.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        $role->load('users');
        return view('role.showone', ['role' => $role]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        return view('role.editform', ['role' => $role]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        $validated = $request->validate([
            'name' => 'required|unique:roles|max:255',
        ]);
        $role->name = $validated['name'];
        $role->save();
        return redirect()->route('roles.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        $role->delete();
        return redirect()->route('roles.index');
    }

    public function addUserToRole(Role $role) {
        $users = User::all();
        return view('role.adduserform', ['role' => $role, 'users' => $users]);
    }

    public function joinUser(Request $request, Role $role) {
        $validated = $request->validate([
            'user' => 'required',
        ]);
        $user = User::find($validated['user']);
        $role->users()->syncWithoutDetaching([$user->id]);
        return redirect()->route('roles.index');
    }

    public function selectUserAndRole(){
        $users = User::all();
        $roles = Role::all();
        return view('role.jointwoform', ['roles' => $roles, 'users' => $users]);
    }

    public function joinUserAndRole(Request $request)
    {
        $validated = $request->validate([
            'user' => 'required',
            'role' => 'required',
        ]);
        $user = User::find($validated['user']);
        $user->roles()->syncWithoutDetaching([$validated['role']]);
        return redirect()->route('roles.index');
    }

    public function selectAndRemove(){
        $users = User::all();
        $roles = Role::all();
        return view('role.splittwoform', ['roles' => $roles, 'users' => $users]);
    }

    public function splitUserAndRole(Request $request)
    {
        $validated = $request->validate([
            'user' => 'required',
            'role' => 'required',
        ]);
        $user = User::find($validated['user']);
        $user->roles()->detach([$validated['role']]);
        return redirect()->route('roles.index');

    }

    public function managePrivlidges() {
        $users = User::all();
        $roles = Role::all();
        return view('role.manageprivlidges', ['roles' => $roles, 'users' => $users]);
    }

    public function setPrivlidges(Request $request) {
        return "not implemented";
    }

}
