<?php

namespace App\Http\Controllers;
use App\Http\Requests\UserUpdateRequest;
use App\Http\Requests\UsersStoreRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Faker\Factory;
use Illuminate\Support\Str;




class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $users = DB::table('users')->whereIn('id', [4,6])->get();

        // $users = DB::table('users')->groupBy('id')->having('id', '>', 5)->get();

                // $users = DB::table('users')->orderBy('email')->get();

        // $users = DB::table('users')->select('name')->orderBy('name', 'asc')->get();

        // $query = DB::table('users')->select('email');
        // $users = $query->addSelect('id')->get();

        // dd($users);

          // offset pagination  

         // $users = DB::select('select * from users order by id asc limit 10 offset 10');
         
       // Cursor pagination 

        // $users = DB::select('select * from users where id > 10 order by id asc limit 20');
        $users = DB::table('users')->paginate(10);

        // ->withPath('admin/users/index')->appends(['name'=> 'farhad']);
        
        // dd($users);
        // $users = DB::table('users')->get();
        return view('users/index', compact('users'));
        // return view('welcome');
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

//     public function create_dummy_data(){
//         //        $users = Storage::json('public/users.json');
// //
// //       dd($users);



//        $users = Storage::json('public/users.json');
//         $time = Carbon::now();
//         $readData = DB::table('users')->get();

//         foreach ($readData as $user){
//             echo "<br>";
//             echo Carbon::parse($user->created_at)->diffForHumans();

//            DB::table('users')->insert([
//                'name'=> $user['name'],
//                'email'=>  $user['email'],
//                'password'=> Hash::make($user['email']),
//                'created_at' => $time->addHour(),
//                'updated_at' => $time->addHour()
//            ]);
//         }



//     }


        public function create_dummy_data(Request $request){


         
           $faker = Factory::create();

        for ($i = 0; $i < 100; $i++) { 
            
           DB::table('users')->insert([

             'name'=> $faker->name,
             'email'=> $faker->email,
             'password'=> Hash::make($faker->password(8)),
             'email_verified_at'=> now(),
             'remember_token'=> Str::random(10),
             'created_at'=> now(),
             'updated_at'=> now()

           ]);
        
         }



     return redirect()->back();


            // dd($request);
        //        $users = Storage::json('public/users.json');
//
//       dd($users);
     //   $users = Storage::json('public/users.json');
     //    $time = Carbon::now();
     //    // $users = DB::table('users')->get();

     //    foreach ($users as $user){
     //        // echo "<br>";
     //        // echo Carbon::parse($user->created_at)->diffForHumans();

     //       DB::table('users')->insertOrIgnore([
     //           'name'=> $user['name'],
     //           'email'=>  $user['email'],
     //           'password'=> Hash::make($user['email']),
     //           'created_at' => $time->addHour(),
     //           'updated_at' => $time->addHour()
     //       ]);
     //    }

     // return redirect()->back();

    }

    public function delete_dummy_data(Request $request){

       DB::table('users')->truncate();

       return redirect()->back();
        
    }

}



