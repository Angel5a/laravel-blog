<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostUserRequest;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->authorizeResource(User::class, 'user');
    }

    /**
     * Display a listing of users.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::latest()->paginate(10);
        return view('users.index')->with('users', $users);
    }

    /**
     * Show the form for creating a new user.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("users.create");
    }

    /**
     * Store a newly created user in storage.
     *
     * @param  \App\Http\Requests\PostUserRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostUserRequest $request)
    {
        $user = User::create($request->all());
        return redirect()->route('users.show', $user->id);
    }

    /**
     * Display the specified user.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('users.show')->with('user', $user);
    }

    /**
     * Show the form for editing the specified user.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('users.edit')->with('user', $user);
    }

    /**
     * Update the specified user in storage.
     *
     * @param  \App\Http\Requests\PostUserRequest  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(PostUserRequest $request, User $user)
    {
        $user->update($request->all());
        return redirect()->route('users.show', $user->id);
    }

    /**
     * Remove the specified user from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index');
    }
}
