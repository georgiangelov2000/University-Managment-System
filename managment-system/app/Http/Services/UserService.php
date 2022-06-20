<?php

namespace App\Http\Services;

use App\Models\User;


class UserService
{

    public function createUser($validated)
    {
        $file = $validated['picture'];
        if (!$file) {
            return response()->json(['status' => 'error', 'message' => 'The file is invalid!']);
        }
        $imageName =  $file->getClientOriginalName();

        $file->storeAs('public/users', $imageName);

        $validated['picture'] = $imageName;

        User::create($validated);
    }

    public function updateUser($validated,$user)
    {
        $file = $validated['picture'];
        if (!$file) {
            return response()->json(['status' => 'error', 'message' => 'The file is invalid!']);
        }
        $imageName =  $file->getClientOriginalName();

        $file->storeAs('public/users', $imageName);

        $validated['picture'] = $imageName;

        $user->update($validated);
    }
}
