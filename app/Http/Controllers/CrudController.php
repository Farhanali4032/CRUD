<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\user_record;

class CrudController extends Controller
{
    function edit($user_id){
        
        $user_record = user_record::findOrFail($user_id);
        return view('edit', compact('user_record'));
    }

    function update(Request $request, $user_id){

        $request->validate([
            'fname' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'phoneNo' => 'required|string|max:20',
            'age' => 'required|integer|max:110',
            'gander' => 'in:male,female,other',
            'desc' => 'required|string|max:255',
        ]);
        
        user_record::findOrFail($user_id)->update([
            'fname'=> $request->fname,
            'phoneNO'=> $request->phoneNo,
            'gander' => $request->gander,
            'desc' => $request->desc
        ]);

        return redirect('/user_records')->with('status', 'Record Updated');
    }

    function delete($user_id){
        
        user_record::findOrFail($user_id)->delete();
        return redirect('/user_records')->with('status', 'Record Deleted');

    }

   
}
