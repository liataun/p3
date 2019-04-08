<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;

class CitationController extends Controller
{
    /**
     * Display our primary page, with form to collect inputs
     */
    public function index(Request $request)
    {
        return view('form');
    }

    /**
     * Validate user input, return view to display completed citation
     */
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

    /**
     * Permit the user to view citation page on their own. Future development would allow user
     * to collect a list of citations and view the full list by viewing this page.
     */
    public function show(Request $request)
    {
        return view('citation');
    }
}
