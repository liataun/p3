<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;

class CitationController extends Controller
{
    public function index(Request $request)
    {
        return view('form');
    }

    public function validateCitation(Request $request)
    {
        $request->validate([
            'authorType' => 'required',
            'authorLast' => 'required',
            'authorInitials' => 'requiredIf:authorType,single',
            'year' => 'required|digits:4',
            'title' => 'required',
            'city' => 'required',
            'publisher' => 'required',
            'intext' => ['nullable', 'regex:/^on$/i'], //cannot use accepted
            'userEmail' => 'nullable|email'
        ]);

        return view('/citation')->with(['fields' => $request->all()])->with(['citation' => true]);
    }

    public function show(Request $request)
    {
        return view('citation');
    }
}
