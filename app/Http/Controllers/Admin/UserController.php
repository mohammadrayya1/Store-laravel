<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Profile;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //


    public function show($id)
    {
        $user=User::find($id);

        return $user->profile->first_name;

    }
}
