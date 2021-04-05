<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();
        $currentRoute = Route::currentRouteName();
        return view('users.index')->with(['user' => $user, 'currentRoute' => $currentRoute]);
        // echo json_encode($user);
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'gender' => ['required', 'in:male,female'],
            'phone' => ['required', 'regex:/^0[1-9][0-9]{8}$/'],
            'address' => ['required', 'string', 'max:255'],
        ]);

        // get current user
        $user = User::find(auth()->user()->id);

        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->gender = $request->gender;
        $user->phone = $request->phone;
        $user->address = $request->address;

        $user->save();

        return back()->with(['flash' => 'Your profile is updated.']);
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

    public function changePassword(Request $request)
    {
        $currentRoute = Route::currentRouteName();
        return view('users.changepassword')->with(['currentRoute' => $currentRoute]);
    }

    public function updatePassword(Request $request)
    {
        $currentPassword = auth()->user()->getAuthPassword();

        $request->validate([
            'new_password' => 'required|confirmed|min:8',
            'current_password' => ['required', function ($attribute, $value, $fail) use ($currentPassword) {
                if (!Hash::check($value, $currentPassword)) {
                    return $fail(__('The current password is incorrect.'));
                }
            }],
        ]);

        $user = User::find(auth()->user()->id);

        $user->password = Hash::make($request->current_password);

        $user->save();

        return redirect('/user/changepassword')->with(['flash' => 'Your password is changed.']);
    }
}
