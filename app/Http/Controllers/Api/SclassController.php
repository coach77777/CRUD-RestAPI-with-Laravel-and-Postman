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
}
