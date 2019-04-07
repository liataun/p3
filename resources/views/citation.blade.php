@extends('layouts.master')

@section('title')
    Complete
@endsection

@section('content')
    Completed Citation based on user input

    <!-- Display completed Reference -->
    <?php if (isset($citation)): ?>
    <p class='text-success'>{{$authorLast}}
        ({{$year}}).
        <span id='italics'>{{$title}}.</span>
        {{$city}}: {{$publisher}}.
    </p>
    <?php endif ?>

    <?php if (isset($intext) and isset($citation)): ?>
    <p>{{$authorLast}} ({{$year}})</p>
    <?php endif ?>

    <!-- Learning how to hide/show elements. Might be needed for a more complete citation generator. -->
    <?php if (!isset($citation)): ?>
    {{--    <p class='invisible'>Waiting for form submission!</p>--}}
    <p class='alert'>Waiting for form submission!</p>
    <?php endif ?>


@endsection