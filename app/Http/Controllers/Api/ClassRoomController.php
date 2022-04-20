<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ClassRoom;
use Illuminate\Http\Request;

class ClassRoomController extends Controller
{
    public function index()
    {
        return ClassRoom::all();
    }
}
