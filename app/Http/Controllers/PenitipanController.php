<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PenitipanController extends Controller
{
    public function index()
    {
        return view('pages.penitipan.index');
    }
}
