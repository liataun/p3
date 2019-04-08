@extends('layouts.master')

@section('title')
    APA Result
@endsection

@section('content')

    @if(isset($fields['authorType']) and isset($citation))
        <h4 class='text-secondary'>Your References citation is:</h4>
        <p class='text-success'>{{$fields['authorLast']}}<?= ($fields['authorType'] == 'single') ? ', ' . $fields['authorInitials'] : '.' ?>
            ({{$fields['year']}}).
            <span id='italics'>{{$fields['title']}}.</span>
            {{$fields['city']}}: {{$fields['publisher']}}.
        </p>

        @if(isset($fields['intext']))
            <h4 class='text-secondary'>Your inline citation is:</h4>
            <p class='text-info'>{{$fields['authorLast']}} ({{$fields['year']}})</p>
        @endif
    @endif

    @if(!isset($citation))
        <h3 class='text-secondary'>Coming Soon:</h3>
        <p class='text-info'>Ability to save each result for later viewing.</p>
        <p class='alert alert-warning'>Data not available! Please go
            <a href='/home'>Home</a> to enter your data.
        </p>
    @endif
@endsection