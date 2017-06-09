<?php

namespace App\Http\Controllers;

use App\Group;
use Illuminate\Http\Request;

class GroupsController extends Controller
{
    public function store(Request $request)
    {
        $group = Group::create([
            'name'=>$request->name
        ]);

        return redirect()->back();
    }
}
