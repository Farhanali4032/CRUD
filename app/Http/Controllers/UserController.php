<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Helpers\Func;
use App\Models\Product;
use App\Models\subject;
use App\Models\Category;
use App\Models\user_images;
use App\Models\user_record;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Session\Session;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Query\JoinClause;
use Spatie\Permission\Middlewares\PermissionMiddleware;
use Symfony\Component\HttpFoundation\Session\Session as SessionSession;

class UserController extends Controller
{




    public function test()
    {
        // $user = DB::table('user_record')
        // ->join('hobbies','user_record.id', '=', 'hobbies.user_record_id')
        // ->select('user_record.*','hobbies.hobbies')
        // ->where('hobbies.hobbies','=', 'asdf')
        // ->get();

        // $user = DB::table('users')
        // ->join('hobbies', function(JoinClause $hobby){
        //     $hobby->on('users.id', '=', 'hobbies.hobbies');
        //     $hobby->where('hobbies.hobbies', '=', 'asdf');
        // })
        // ->get();

        // $student = DB::table('students')
        // ->join('cities', 'students.city','=','cities.id')
        // ->select('students.*', 'cities.city_name')
        // ->where('')
        // ->get();

        // $student = DB::table('students')
        // ->join('cities', 'students.city', '=', 'cities.id')
        // ->select('students.*', 'cities.city_name')
        // ->get();

        // $student = DB::table('students')
        // ->join('cities', function (JoinClause $city){
        //     $city->on('students.city','=','cities.id');
        //     // $city->where('cities.city_name', '=', 'lahore');
        // })
        // ->get();


        // $city ='cities';
        // $student = DB::table('students')
        // ->join( $city, 'students.city', '=', 'cities.id')
        // ->join('student_department', 'students.department_id', '=', 'student_department.id')
        // ->where('student_department.department', 'like', 'BSCE%')
        // ->update(['student_department.department' => 'BSSE']);




        // three method of pagination in laravel
        // 1 paginate
        // 2 simplePaginate
        // 3 cursorPaginate ->this pagination is faster

        // $students = DB::table('students')
        //             ->orderBy('id')
        //             ->cursorPaginate(5);

        // // return $student;
        // return view('test', compact('students'));

        // session()->put('check', [
        //     'name' => 'farhan',
        //     'email' => 'farhanrazzaq4032@gmail.com'
        // ]);
        //     // session()->put('check');
        // if (session()->has('check')){
        //     echo "farhan";
        // }
        // else{
        //     echo 'not';
        // }


        // Query Builder
        // $user = DB::table('users')->where('id','1')->value('name');
        // $user = DB::table('users')->pluck('email','name');
        // $data = [];
        // DB::table('users')->orderBy('id')->chunk(1, function (Collection $users){
        //     foreach($users as $user){
        //         $data[] = $user;
        //     }
        //     dd($data);
        // });

        // $user = DB::table('users')->pluck('email','name');



        // $cate = Product::all();


        //    $cate = allCate();

        //    foreach(allCate() as $category){
        //     echo $category->id;
        //    }
        //    dd($cate);

        // if (Auth::check()) {
        //     $userId = Auth::User();

        //     // $user = User::findOrFail($userId);

        //     // $role = $user->getRoleNames();
        //     $role = User::findOrFail($userId->id)->getRoleNames();

        //     dd($role);

        // }
        // dd($userId);
        //     $user_record = user_record::find(10);
        //     compact('user_record');
        //     // return $user_recordl
        //     // echo $user_record->fname;
        //     // foreach ($user_record->subject as $subj) {
        //     //     echo $subj->subject;
        //     // }

        //     $findImage = user_images::findOrFail();
        //         print_r($findImage);
        //     foreach($findImage as $path){
        // $path->image_name;
        //         dd($path);
        //     }

        //   $roles = Role::pluck('name','name')->all();  ////Find Role
        // $user = User::find(1);
        // $roleName = 'Manger';
        // $role = Role::where('name', $roleName)->first();
        // if (!$role) {
        //     $role = Role::create(['name' => $roleName]);
        // }
        // $user->roles()->detach();
        // $user->assignRole($role);


        // $userId = auth()->id(); \\get current id
        //     echo $userId;
        //     dd($userId);



        // $user = user_record::find(1);
        // $name = 'Farhan';
        // $subjects = subject::find(6);
        // $subjects = $subjects->user_record()->where('fname', $name)->first();
        // // $user = $user->subject;
        // dd($subjects);

            $user = User::Where("id",1)->first();
            
            return $user;

    }


    function index()
    {
        $user_id = session('user_id');
        $subjects = subject::all();
        return view('form', compact('subjects', 'user_id'));
    }

    //User Data
    public function view_user()
    {
        if (Auth::check()) {
            $user = Auth::User();
            $role = User::findOrFail($user->id)->getRoleNames();
            // dd($role);
            Session(['user_id' => $user->id]);
            Session(['user_name' => $user->name]);
            Session(['user_email' => $user->email]);
            Session(['user_role' => $role]);
            $roles = Role::findByName($role[0]);
            if ($roles->hasPermissionTo('student-list')) {
                $user_records = user_record::all();
            } else {
                $user_records = user_record::where('user_id', $user->id)->get();
            }
            return view('dashboard', ['user_records' => $user_records]);
        }
    }

    public function viewRecord($id){
        $user_records = user_record::where('user_id', $id)->get();
        return view('dashboard', ['user_records' => $user_records]);
    }


    function userData(Request $request)
    {
        //temporary user id because no user
        $id = $request['user_id'];
        $hobbies = $request['hobbies'];
        $m_user_record = new user_record;

        $request->validate(
            [

                'fname' => 'required|string|max:20',
                'email' => 'required|email|max:255',
                'phoneNo' => 'required|numeric|digits_between:10,15',
                'age' => 'required|integer|max:110',
                'gander' => 'required|in:male,female,other',
                'subjects' => 'required',
                'subjects.*' => 'string',
                'desc' => 'required|string|max:255',
                'images.*' => 'image|mimes:jpg,jpeg,png,webp|max:4048',


            ]
        );

        //Get Record and Store into the Table

        $m_user_record->user_id = $id;
        $m_user_record->fname = $request['fname'];
        $m_user_record->email = $request['email'];
        $m_user_record->phoneNo = $request['phoneNo'];
        $m_user_record->age = $request['age'];
        $m_user_record->gander = $request['gander'];
        $m_user_record->desc = $request['desc'];
        $m_user_record->save();

        // Hobbies

        foreach ($hobbies as $hobby) {
            $m_user_record->hobbies()->create([
                'hobbies' => $hobby
            ]);
        }
        //Image file check
        if ($request->hasFile('images')) {
            $images = $request->file('images');
            foreach ($images as $image) {
                $extension = $image->getClientOriginalExtension();
                $image_name = time() . '.' . $extension;
                $path = 'uploads/images';
                $image->move($path, $image_name);
                // send images in model
                $m_user_record->userImage()->create([
                    'image_name' => $image_name
                ]);
            }
        }
        $m_user_record->subject()->attach($request['subjects']);




        return redirect('/user_records')->with('status', 'Record Created');
    }
}
