<?php

namespace Nitseditor\Plugins\Excel\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Nitseditor\Plugins\Excel\Models\Category;
use Nitseditor\Plugins\Excel\Models\Registration;
use Nitseditor\Plugins\Excel\Models\Status;

class HomeController extends Controller
{
    public function index()
    {
        return 'Working';
    }
    public function categories(){
        return response()->json(['categories'=> Category::all()], 200);

    }
    public function statuses(){
        return response()->json(['statuses'=> Status::all()], 200);
    }
  public function registrations(){
        return response()->json(['registrations'=> Registration::all()], 200);

    }
}
