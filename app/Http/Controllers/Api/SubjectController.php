<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subject;

class SubjectController extends Controller
{

public function Index()
    {
        $subject = Subject::latest()->get();
        return response()->json($subject);
    } // End method


    public function Store(Request $request)
    {
        $validateData = $request->validate([
            'class_id' => 'required',
            'subject_name' => 'required|unique:subjects|max:255',
            'subject_code' => 'required|unique:subjects|max:255',
        ]);

        Subject::create([
            'class_id' => $request->class_id,
            'subject_name' => $request->subject_name,
            'subject_code' => $request->subject_code,
        ]);

        return response('Subject Inserted successfully');
    } // End method

    public function Edit($id)
    {
        $subject = Subject::findorFail($id);
        return response()->json($subject);
    } // End method

    public function Update(Request $request, $id)
    {
        $subject = Subject::findorFail($id);

        $validateData = $request->validate([
            'class_id' => 'required',
            'subject_name' => 'required|max:25',
            'subject_code' => 'required|max:255',
        ]);

        $subject->update([
            'class_id' => $request->class_id,
            'subject_name' => $request->subject_name,
            'subject_code' => $request->subject_code,
        ]);

        return response('Subject Updated successfully');
    } // End method

    public function Delete($id)
    {
        $subject = Subject::findorFail($id);
        $subject->delete();
        return response('Subject Deleted successfully');
    } // End method

}
