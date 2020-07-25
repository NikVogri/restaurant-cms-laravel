<?php

namespace App\Http\Controllers;

use App\PaymentType;
use Spatie\Permission\Models\Role;
use Auth;
use Illuminate\Http\Request;
use App\User;

class UsersController extends Controller
{

    public function __construct()
    {
        $this->middleware(['role:admin'])->except(['profile', 'updateProfile']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('users.index', [
            'users' => User::orderBy('created_at')->get()
        ]);
    }

    public function profile()
    {
        return view('users.profile', [
            'user' => Auth::user(),
            'paymentTypes' => PaymentType::get()
        ]);
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('users.edit', ['user' => $user, 'roles' => Role::all()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateRole(User $user)
    {
        $role = request('role');
        $user->syncRoles([$role]);
        return redirect(route('users.index'))->with('message', 'User role updated');
    }

    public function updateProfile()
    {
        $attributes = request()->validate([
            'name' => ['string', 'required', 'max:255'],
            'email' => ['email', 'required'],
            'phone_number' => ['nullable', 'string', 'max:9'],
        ]);

        $user = Auth::user();
        $user->updatePayment(request('paymentType_id'));
        $user->update($attributes);

        return back()->with('message', 'User role updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}