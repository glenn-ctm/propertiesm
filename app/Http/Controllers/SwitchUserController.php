<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class SwitchUserController extends Controller
{

    public function index(Request $request)
    {
        if( config('app.env') === 'production' ) return [];

        $users = collect();

        $users->push(User::superAdmins()->first());
        $users->push(User::admins()->first());
        $users->push(User::propertyOwners()->first());
        $users->push(User::tenants()->first());
        $users->push(User::regular()->first());

        $users = $users->filter(function ($user) {
            return !is_null($user);
        });

        $users = $users->map(function ($user) {
            return [
                'id' => $user->id,
                'type_name' => $user->type_name
            ];
        });

        return $users->values();
    }

    public function update(User $switchUser){
        if( config('app.env') === 'production' ) return;

        auth()->login($switchUser);
        return [
            'id' => $switchUser->id,
            'type_name' => $switchUser->type_name
        ];
    }

}
