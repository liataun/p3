<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CitationController extends Controller
{
    public function index()
    {
        return 'Display instructions, form, and results';
    }

    public function buildCitation()
    {
        return 'Completed Citation based on user input';
    }
}
