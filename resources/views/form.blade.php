@extends('layouts.master')

@section('title')
APA Citation Creation
@endsection

@section('content')
    <p class='text-info'>
        This site attempts to use the information you provide to create an APA style reference entry.
        Features are limited to single authors and organizations with all information available. Books
        published before 1000 A.D. will not be accepted. All inputs are required except as indicated.
    </p>
    <h4 class='text-secondary'>Book Citation Form</h4>

    <!-- Form to collect values for our book citation. Send to citation.php to compose. Use logic.php variables to display. -->
    <form class='text-dark' method='get' action='citation.php'>

        <div class="form-group">
            <label for='authorType'>Select Author Type</label>
            <select class='form-control' id='authorType' name='authorType'>
                <!-- Any changes to logic.php must ensure that one and only one option is selected -->
                <option value='single' <?= ($selected == 'single') ? ('selected') : null; ?>>Single Author</option>
                <option value='organization' <?= ($selected == 'organization') ? ('selected') : null; ?>>Organization As Author</option>
            </select>
        </div>

        <div class="form-group">
            <label for='authorLast'>Enter author last name or organization name</label>
            <input type='text' class='form-control' id='authorLast' name='authorLast'
                   value='{{$authorLast ?? 'Snow'}}'>
        </div>

        <div class="form-group">
            <label for='authorInitials' id='authorInitialsLabel'>Enter author initials</label>
            <input type='text' class='form-control' id='authorInitials' name='authorInitials'
                   value='{{$authorInitials ?? 'J.'}}'
                   aria-describedby='authorInitialsLabel authorInitialsInfo'>
            <small class='form-text text-muted' id='authorInitialsInfo'>
                Required if Author Type is 'Single Author'; include appropriate periods. Do not use if Author Type is 'Organization As Author'.
            </small>
        </div>

        <div class="form-group">
            <label for='year' id='yearLabel'>Enter year of publication</label>
            <input type='number' class='form-control' id='year' name='year'
                   value='{{$year ?? 2018}}' aria-describedby='yearLabel yearInfo'>
            <small class='form-text text-muted' id='yearInfo'>Four digit year only.</small>
        </div>

        <div class="form-group">
            <label for='title'>Enter book title</label>
            <input type='text' class='form-control' id='title' name='title'
                   value='{{$title ?? 'The Icy Bite of Life'}}'>
        </div>

        <div class="form-group">
            <label for='city'>Enter publication city</label>
            <input type='text' class='form-control' id='city' name='city'
                   value='{{$city ?? 'Winterfell'}}'>
        </div>

        <div class="form-group">
            <label for='publisher'>Enter publisher name</label>
            <input type='text' class='form-control' id='publisher' name='publisher'
                   value='{{$publisher ?? 'The Wall'}}'>
        </div>

        {{--<div class="form-group">--}}
            {{--<label for='publisher'>Include in-text citation?</label>--}}
            {{--<input type='checkbox' class='form-check' id='intext' name='intext'--}}
            {{--<?php if (isset($intext) and $intext) echo 'checked' ?>>--}}
        {{--</div>--}}

        <div class="form-group">
            <label for='userEmail' id='userEmailLabel'>What email do you wish we could send this to?</label>
            <input type='email'
                   class='form-control'
                   id='userEmail'
                   name='userEmail'
                   aria-describedby='userEmailLabel userEmailInfo'
                   value='{{$userEmail ?? 'You@Education.me'}}'>
            <small class='form-text text-muted' id='userEmailInfo'>Must be a valid email. Email will NOT be sent.</small>
        </div>

        <input type='submit' class='mb-3 btn btn-primary' name='cite' value='Generate Citation'>
    </form>

    <!-- Display errors -->
    <?php if ($hasErrors): ?>
    <div class='alert alert-danger' id='errors'>
        <ul>
            <?php foreach ($errors as $error): ?>
            <li><?= $error ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
    <?php endif ?>

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
    <?php if (!isset($citation) and !$hasErrors): ?>
    <p class='invisible'>Waiting for form submission!</p>
    <?php endif ?>
@endsection