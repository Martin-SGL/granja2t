<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EstanqueController extends Controller
{
    public function index()
    {
        return view('admin.estanques.index');
    }
}
