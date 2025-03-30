<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SClass;

class SclassController extends Controller
{
   public function Index()
   {
        $sclass = SClass::latest()->get();
        return response()->json($sclass);
     }

    public function Store(Request $request){
        $validateData = $request->validate([
            'class_name' => 'required|unique:sclasses|max:255',
        ]);

         SClass::create([
            'class_name' => $request->class_name,
        ]);

        return response(' Student Class Inserted successfully');
    } // }end method

    public function Edit($id){
        $sclass = SClass::findorFail($id);
        return response()->json($sclass);
    } // end method

    public function Update(Request $request, $id){
        $sclass = SClass::findorFail($id);

        $validateData = $request->validate([
            'class_name' => 'required|max:255',
        ]);

        $sclass->update([
            'class_name' => $request->class_name,
        ]);

        return response(' Student Class Updated successfully');
    } // end method

    public function Delete($id){
        $sclass = SClass::findorFail($id);
        $sclass->delete();
        return response(' Student Class Deleted successfully');
    } // end method
}
