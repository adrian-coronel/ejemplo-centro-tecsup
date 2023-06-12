<?php

namespace App\Http\Controllers\user;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserTrashedController extends Controller
{
    public function index()
    {
        $users = User::onlyTrashed()->get();
        return view('user.trashed',compact('users'));
    }

    public function restore(string $id)
    {
        User::onlyTrashed()->where('id','=',$id)->restore();
        return redirect()->route('userstrashed.index');
    }

    public function delete($id)
    {
        // Eliminar permanentemente un usuario
    }
}
