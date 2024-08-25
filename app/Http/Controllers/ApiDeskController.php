<?php

namespace App\Http\Controllers;

use App\Models\testTi;
use Illuminate\Http\Request;

class ApiDeskController extends Controller
{
    public function index()
    {
        return testTi::all();
    }


}
