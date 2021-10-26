<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsersRequest;
use App\Http\Resources\Users as UsersResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class UsersController extends Controller
{
    public function save(UsersRequest $request)
    {
        $users = new User;
        $users->name = $request->input('name');
        $users->email = $request->input('email');
        $users->password = Hash::make($request->input('password'));

        if ($users->save()) {
            return new UsersResource($users);
        }
    }

    public function update(UsersRequest $request)
    {
        $users = User::findOrFail($request->id);
        $users->name = $request->input('name');
        $users->email = $request->input('email');
        $users->password = $request->input('password');

        if ($users->save()) {
            return new UsersResource($users);
        }
    }

    public function getAll()
    {
        $users = User::paginate(15);
        return UsersResource::collection($users);
    }

    public function getByID($id)
    {
        $users = User::findOrFail($id);
        return new UsersResource($users);
    }

    public function delete($id)
    {
        $users = User::findOrFail($id);
        if ($users->delete()) {
            return new UsersResource($users);
        }
    }

    public function search($name)
    {

        $users = User::where('name', 'like', '%' . $name . '%')->get();

        return User::collection($users);
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }

        return $user->createToken($request->email)->plainTextToken;
    }

    public function me()
    {
        $user_id = Auth::user()->id;
        $user = User::findOrFail($user_id);
        return new UsersResource($user);
    }
}
