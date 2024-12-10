<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Day1Controller extends Controller
{
    public function solve()
    {
        error_log('controller day1 works');
        $test = 'lol';
        return view('day1.day1', compact('test'));

    }
}
