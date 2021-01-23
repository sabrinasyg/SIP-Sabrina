<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Role;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Middlewares\PermissionMiddleware;
use App\Exports\UsersExport;
use App\Imports\UsersImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    protected $user;
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = DB::table('users')->get();
        $user = User::all();

        return view('user/index', ['user' => $user]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(User $user)
    {
        return view('/user/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'username' => 'required',
            'password' => 'required',
            'address' => 'required',
            'img' => 'required',
            'grade' => 'required',
            'department' => 'required',
            'role_id' => 'required',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->username = $request->username;
        $user->password = $request->password;
        $user->address = $request->address;
        $user->grade = $request->grade;
        $user->department = $request->department;
        $user->img = $request->img;
        $user->role_id = $request->role_id;
        $user->save();

        if ($request->hasFile('img')) {
            $request->file('img')->move('img/', $request->file('img')->getClientOriginalName());
            $user->img = $request->file('img')->getClientOriginalName();
            $user->save();
        }
        return redirect('/admin/user')->with('status', 'Data has been successfully added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('/user/detail', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\User
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('/user/edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //dd($request->all());
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'username' => 'required',
            'password' => 'required',
            'address' => 'required',
            'grade' => 'required',
            'department' => 'required',
            'img' => 'required',
            'role_id' => 'required',
        ]);

        User::where('id', $user->id)
            ->update([
                'name' => $request->name,
                'email' => $request->email,
                'username' => $request->username,
                'password' => $request->password,
                'address' => $request->address,
                'grade' => $request->grade,
                'department' => $request->department,
                'img' => $request->img,
                'role_id' => $request->role_id,
            ]);
        if ($request->hasFile('img')) {
            $request->file('img')->move('img/', $request->file('img')->getClientOriginalName());
            $user->img = $request->file('img')->getClientOriginalName();
            $user->save();
        }
        return redirect('/admin/user')->with('status', 'Data has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->route('user')
            ->with('success', 'User deleted successfully');
    }

    public function deleteAll(Request $request)
    {
        $ids = $request->ids;
        DB::table("users")->whereIn('id', explode(",", $ids))->delete();
        return redirect()->route('user');
        return response()->json(['success' => "Users Deleted successfully."]);
    }

    public function search(Request $request)
    {
        $grade = DB::table('users')->select('grade')->distinct()->get()->pluck('grade');

        $user = User::query();

        if ($request->filled('grade')) {
            $user->where('grade', $request->grade);
        }

        return view('user.index', [
            'grade' => $grade
        ]);
    }

    public function export()
    {
        return Excel::download(new UsersExport, 'user.xlsx');
    }

    public function import(Request $request)
    {
        $this->validate($request, [
            'file' => 'required|mimes:csv,xls,xlsx'
        ]);

        $file = $request->file('file');

        // membuat nama file unik
        $nama_file = $file->hashName();

        //temporary file
        $path = $file->storeAs('public/excel/', $nama_file);

        // import data
        $import = Excel::import(new UsersImport(), storage_path('app/public/excel/' . $nama_file));

        //remove from server
        Storage::delete($path);

        if ($import) {
            //redirect
            return redirect()->route('admin/user')->with(['success' => 'Data Berhasil Diimport!']);
        } else {
            //redirect
            return redirect()->route('admin/user')->with(['error' => 'Data Gagal Diimport!']);
        }
    }
}
