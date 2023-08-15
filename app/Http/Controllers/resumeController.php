<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Requests;
use App\Models\Resume;
use Illuminate\Support\Facades\DB;

class resumeController extends Controller
{
    public function create()
    {
        return view('resume');
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:8',
            'dob' => 'required|date',
            'gender' => 'required|in:male,female',
            'email' => 'required|email|unique:resumes,email',
            'phone' => 'required|numeric',
            'city' => 'required',
            'address' => 'required',
            'experience' => 'required',
            'education' => 'required',
            'skills' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $resume = new resume();
        $resume->name = $request->input('name');
        $resume->dob = $request->input('dob');
        $resume->gender = $request->input('gender');
        $resume->email = $request->input('email');
        $resume->phone = $request->input('phone');
        $resume->city = $request->input('city');
        $resume->address = $request->input('address');
        $resume->experience = $request->input('experience');
        $resume->education = implode(',', $request->input('education'));
        $resume->skills = implode(' | ', $request->input('skills'));

        if (isset($request['image'])) {
            $filename = time() . rand(111, 699) . '.' . $request['image']->getClientOriginalExtension();
            $request['image']->move("upload/", $filename);
            $resume->img = $filename;
        }

        $resume->save();

        return redirect('table')->with('success', 'Resume submitted successfully!');
    }
    public function checkEmail(request $req)
    {
        $value = $req->token;
        $users = DB::table('resumes')->where('email', $value)->first();
        if ($users) {
            return 1;
        } else {
            return 0;
        }
    }
    public function Table()
    {
        $resumes = resume::all();

        return view('table', ['resumes' => $resumes]);
    }
    public function view($id)
    {
        $resumes = resume::find($id);
        $view = resume::where('id','=',$resumes->id)->get();
        return view('view', ['resumes' => $view]);
    }
    public function delete($id)
	{
		resume::where('id',$id)->delete();

		return redirect('table')->with('delete','Record Deleted Successfully.');
	}


}