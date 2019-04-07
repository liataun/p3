<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;

class CitationController extends Controller
{
    public function index(Request $request)
    {
        return view('form')->with([
            'authorType' => $request->session()->get('authorType', 'single'),
            'authorLast' => $request->session()->get('authorLast', 'Snow'),
            'authorInitials' => $request->session()->get('authorInitials', 'M.'),
            'year' => $request->session()->get('year', '2020'),
            'title' => $request->session()->get('title', 'A day in the life'),
            'city' => $request->session()->get('city', 'Boston'),
            'publisher' => $request->session()->get('publisher', 'The Wall'),
            'intext' => $request->session()->get('intext', 'No'),
            'userEmail' => $request->session()->get('userEmail', 'You@Education.me'),
            'citation' => $request->session()->get('citation', null),
        ]);
    }

    public function buildCitation(Request $request)
    {
        $request->validate([
            'authorType' => 'required',
            'authorLast' => 'required',
            'authorInitials' => 'required',
            'year' => 'required|digits:4',
            'title' => 'required',
            'city' => 'required',
            'publisher' => 'required',
            'userEmail' => 'nullable|email'
        ]);

        return redirect('/citation')->withInput();
    }

    public function show(Request $request)
    {
        return view('citation');
    }
}
