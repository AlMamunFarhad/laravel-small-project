<?php

namespace App\Http\Controllers;
use App\Http\Requests\UserUpdateRequest;
use App\Http\Requests\UsersStoreRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = DB::table('users')->get();
        return view('users/index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UsersStoreRequest $request)
    {
        //        dd($request->input());
        $inputs = $request->all();
        $allData = $request->safe()->merge($inputs)->merge([
            'created_at' => Carbon::now()
        ])
            ->except(['_token','_method', 'password_confirmation']);

        DB::table('users')->insert($allData);

        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = DB::table('users')->find($id);

        return view('users/show', compact('user'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserUpdateRequest $request, string $id)
    {
        //        dd($request->input());

        $inputs = $request->all();
        $allData = $request->safe()->merge($inputs)->except(['_token','_method', 'password_confirmation']);

        DB::table('users')->where('id', $id)->update($allData);



        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table('users')->where('id', $id)->delete();

        return redirect()->back();
    }
}
