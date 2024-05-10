<?php

namespace App\Http\Controllers;

use App\Models\subject;
use App\Models\User;
use App\Models\user_images;
use App\Models\user_record;
use Illuminate\Contracts\Session\Session;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Session\Session as SessionSession;
use Spatie\Permission\Middlewares\PermissionMiddleware;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{


    public function test()
    {

        // if (Auth::check()) {
        //     $userId = Auth::id();
        //     echo $userId;
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
        //         // $path->image_name;
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
    }


    function index()
    {
        $subjects = subject::all();
        return view('form', compact('subjects'));
    }

    //User Data 
    public function view_user()
    {
        if (Auth::check()) {
            $user = Auth::User();
            Session(['user_name' => $user->name]);
            Session(['user_email' => $user->email]);
            $user_records = user_record::all();
            $data = compact('user_records');
            return view('dashboard')->with($data);
        }
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
            // $imageData = [];
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
