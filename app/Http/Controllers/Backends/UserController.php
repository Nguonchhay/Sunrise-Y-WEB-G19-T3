<?php

namespace App\Http\Controllers\Backends;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = User::get();
        return view('backends.users.index', [
            'users' => $users
        ]);
    }

    public function create()
    {
        return view('backends.users.create');
    }

    public function store(Request $request)
    {
        $userData = $request->all();

        $file = $request->file('image');
        if ($file) {
            $filename = time() . '_' . $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $filenameAndPath =  'users/' . $filename . '.' . $extension;

            $file->storeAs('public/' . $filenameAndPath);
            $userData['profile'] = 'storage/' . $filenameAndPath;
        }

        User::create($userData);
        return redirect(route('backends.users.index'));
    }
}
