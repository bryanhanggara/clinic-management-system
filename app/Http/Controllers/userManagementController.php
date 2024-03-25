<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class userManagementController extends Controller
{
 
    public function index(Request $request)
    {
        $users = DB::table('users')
        ->when($request->input('name'), function ($query, $name)  {
            return $query->where('name','like','%'. $name .'%');
        })
        ->orderBy('id','desc')
        ->paginate(1);

        return view('pages.user.userManagement', compact('users'));
    }

    
    public function create()
    {
        return view('pages.user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'role' => 'required',
            'phone_num' => 'required'
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role = $request->role;
        $user->phone_num = $request->phone_num;
        $user->save();

        return redirect()->route('user-management.index')->with([
            'message' => 'Berhasil menambah pengguna baru'
        ]);
    }

    
    public function show(string $id)
    {
        //
    }

  
    public function edit(string $id)
    {
        $user = User::find($id);
        return view('pages.user.edit', compact('user'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
        'name'=> 'required',
        'email'=> 'required',
        'password'=> 'required',
        'role' => 'required',
        'phone_num' => 'required'
        ]);
            $user = User::findOrFail($id);
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->role = $request->role;
            $user->phone_num = $request->phone_num;
            $user->save();
            return redirect()->route('user-management.index')->with([
                'message'=> 'Berhasil di update'
            ]);
        }

    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('user-management.index')->with([
            'message'=> 'Berhasil dihapus'
            ]);
    }
}
