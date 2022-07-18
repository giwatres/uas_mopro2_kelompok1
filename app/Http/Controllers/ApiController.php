<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mobil;
class ApiController extends Controller
{
    //
    public function listdata()
    {
    	$mobil = Mobil::all();
    	return $mobil;
    }
}
