<?php

namespace App\Http\Controllers;

use App\Models\subject;
use App\Models\user_images;
use Illuminate\Http\Request;
use App\Models\user_record;

class CrudController extends Controller
{

    // function __construct()
    // {
    //     $this->middleware(['permission:student-list|student-create|student-edit|student-delete'], ['only' => ['index', 'show']]);
    //     $this->middleware(['permission:student-create'], ['only' => ['create', 'store']]);
    //     $this->middleware(['permission:student-edit'], ['only' => ['edit', 'update']]);
    //     $this->middleware(['permission:student-delete'], ['only' => ['destroy']]);
    // }

    function edit($id){
        
        $user_record = user_record::findOrFail($id);
        $subjects = subject::all();
        return view('edit', compact('user_record', 'subjects'));
    }

    function update(Request $request, $id){
        $user = user_record::findOrFail($id);
        $request->validate([
            'fname' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'phoneNo' => 'required|numeric|digits_between:10,15',
            'age' => 'required|integer|max:110',
            'gander' => 'in:male,female,other',
            'subjects' => 'required',
            'subjects.*' => 'string',
            'desc' => 'required|string|max:255',
        ]);
        
       $user->update([
            'fname'=> $request->fname,
            'phoneNO'=> $request->phoneNo,
            'gander' => $request->gander,
            'desc' => $request->desc
        ]);
        
        $user->subject()->sync($request->subjects);
        return redirect('/user_records')->with('status', 'Record Updated');

    }

    function delete($id){
        user_record::findOrFail($id)->hobbies()->delete($id);
        user_record::findOrFail($id)->userImage()->delete($id);
        user_record::findOrFail($id)->findOrFail($id)->subject()->detach();
        user_record::findOrFail($id)->delete();

        return redirect('/user_records')->with('status', 'Record Deleted');

    }

    function deleteImage($id){
        
        

    }

   
}
