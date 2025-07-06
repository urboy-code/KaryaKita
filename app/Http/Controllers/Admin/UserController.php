<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function index()
    {
        $users = User::latest()->paginate(10);

        return view('admin.users.index', compact('users'));
    }

    public function toggleStatus(User $user)
    {
        $newStatus = $user->status == 'active' ? 'blocked' : 'active';
        $user->update(['status' => $newStatus]);

        return back()->with('status', 'User status updated');
    }
}
