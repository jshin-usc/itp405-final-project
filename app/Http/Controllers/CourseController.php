<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class CourseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
}
