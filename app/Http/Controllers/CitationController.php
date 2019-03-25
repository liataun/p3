<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CitationController extends Controller
{
    public function index()
    {
        return view('form')->with(['selected' => 'single',
            'authorLast' => 'Snow',
            'authorInitials' => 'a',
            'year' => '2020',
            'title' => 'A day in the life',
            'city' => 'Boston',
            'publisher' => 'a',
            'intext' => 'No',
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
