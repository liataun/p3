<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CitationController extends Controller
{
    public function index()
    {
        return view('form')->with(['selected' => 'single',
            'authorLast' => 'a',
            'authorInitials' => 'a',
            'year' => '2020',
            'title' => 'a',
            'city' => 'a',
            'publisher' => 'a',
            'intext' => 'a',
            'userEmail' => 'a',
            'hasErrors' => 'a',
            'errors' => ['b','c'],
            'citation' => 'a',
        ]);
    }

    public function buildCitation()
    {
        return 'Completed Citation based on user input';
    }
}
