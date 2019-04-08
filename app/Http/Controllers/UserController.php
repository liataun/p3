<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    /**
     * Stub playing with the idea of having users
     */
    public function user()
    {
        Log::info('User page stub was accessed on: ' . date('Ymd'));

        return view('user');
    }
}
