<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Section;

class SectionController extends Controller
{
    public function Index()
    {
        $section = Section::latest()->get();
        return response()->json($section);
    } // End method

    public function Store(Request $request)
    {
        $validateData = $request->validate([
            'class_id' => 'required',
            'section_name' => 'required|unique:sections|max:255',
        ]);

        Section::create([
            'class_id' => $request->class_id,
            'section_name' => $request->section_name,
        ]);

        return response('Section Inserted successfully');
    } // End method

    public function Edit($id)
    {
        $section = Section::findorFail($id);
        return response()->json($section);
    } // End method

    public function Update(Request $request, $id)
    {
        $section = Section::findorFail($id);

        $validateData = $request->validate([
            'class_id' => 'required',
            'section_name' => 'required|max:255',
        ]);

        $section->update([
            'class_id' => $request->class_id,
            'section_name' => $request->section_name,
        ]);

        return response('Section Updated successfully');
    } // End method
    public function Delete($id)
    {
        $section = Section::findorFail($id);
        $section->delete();
        return response('Section Deleted successfully');
    } // end method
}
