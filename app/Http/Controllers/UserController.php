<?php

namespace App\Http\Controllers;

use App\Models\subject;
use App\Models\user_images;
use App\Models\user_record;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Request;

class UserController extends Controller
{

    function index()
    {
        $subjects = subject::all();
        return view('form', compact('subjects'));
    }


    function userData(Request $request)
    {
        //temporary user id because no user
        $id = $request['user_id'];
        $subj = $request['subjects'];

        $request->validate(
            [

                'fname' => 'required|string|max:20',
                'email' => 'required|email|max:255',
                'phoneNo' => 'required|string|max:20',
                'age' => 'required|integer|max:110',
                'gander' => 'in:male,female,other',
                'subjects.*' => 'required',
                'desc' => 'required|string|max:255',
                'images.*' => 'image|mimes:jpg,jpeg,png,webp|max:4048',
                'hobbies.*' => 'required|string|max:100'

            ]
        );

        //Image file check
        if ($request->hasFile('images')) {
            $images = $request->file('images');
            $imageData = [];
            foreach ($images as $image) {
                $extension = $image->getClientOriginalExtension();
                $image_name = time() . '.' . $extension;
                $path = 'uploads/images';
                $image->move($path, $image_name);
                $imageData[] = [
                    'user_id' => $id,
                    'image_name' => $image_name
                ];
            }
        // send images in model
        user_images::insert($imageData);
        }
        //user Hobby
        $hobbies = $request['hobbies'];
        $hobbies = implode(',', $hobbies);

        //Get Record and Store into the Table
        $m_user_record = new user_record;
        $m_user_record->user_id = $id;
        $m_user_record->fname = $request['fname'];
        $m_user_record->email = $request['email'];
        $m_user_record->phoneNo = $request['phoneNo'];
        $m_user_record->age = $request['age'];
        $m_user_record->gander = $request['gander'];
        $m_user_record->desc = $request['desc'];
        $m_user_record->hobbies = $hobbies;
        $m_user_record->save();
        
        $m_user_record->subject()->attach($subj);

        return redirect('/user_records')->with('status', 'Record Created');
    }

    //User Data 
    public function view_user()
    {

        $user_records = user_record::all();
        $data = compact('user_records');
        return view('datatable')->with($data);
    }
}
