@extends('layouts.master')

@section('title')
    APA Citation Creation
@endsection

@section('content')
    <p class='text-info'>
        This site uses the information you provide to create an APA style reference entry.
        Features are limited to single authors and organizations with all information available. Books
        published before 1000 A.D. will not be accepted. All inputs are required except as indicated.
    </p>
    <h4 class='text-secondary'>Book Citation Form</h4>

    <form class='text-dark' method='get' action='/citation/build'>

        <div class='form-group'>
            <label for='authorType'>Select Author Type</label>
            <select class='form-control' id='authorType' name='authorType'>
                <!-- Any changes to code must ensure that one and only one option is selected -->
                <option value='single' <?= (old('authorType') == 'single') ? ('selected') : null; ?>>Single Author</option>
                <option value='organization' <?= (old('authorType') == 'organization') ? ('selected') : null; ?>>Organization As Author</option>
            </select>
            @if($errors->get('authorType'))
                <div class='alert alert-danger'>{{ $errors->first('authorType') }}</div>
            @endif
        </div>

        <div class='form-group'>
            <label for='authorLast'>Enter author last name or organization name</label>
            <input type='text' class='form-control' id='authorLast' name='authorLast'
                   value='{{old('authorLast') ?? 'Snow'}}'>
            @if($errors->get('authorLast'))
                <div class='alert alert-danger'>{{ $errors->first('authorLast') }}</div>
            @endif
        </div>

        <div class='form-group'>
            <label for='authorInitials' id='authorInitialsLabel'>Enter author initials</label>
            <input type='text' class='form-control' id='authorInitials' name='authorInitials'
                   value='{{old('authorInitials')}}'
                   aria-describedby='authorInitialsLabel authorInitialsInfo'>
            <small class='form-text text-muted' id='authorInitialsInfo'>
                Required if Author Type is 'Single Author'; include appropriate periods. Do not use if Author Type is 'Organization As Author'.
            </small>
            @if($errors->get('authorInitials'))
                <div class='alert alert-danger'>{{ $errors->first('authorInitials') }}</div>
            @endif
        </div>

        <div class='form-group'>
            <label for='year' id='yearLabel'>Enter year of publication</label>
            <input type='number' class='form-control' id='year' name='year'
                   value='{{old('year') ?? 1010}}' aria-describedby='yearLabel yearInfo'>
            <small class='form-text text-muted' id='yearInfo'>Four digit year only.</small>
            @if($errors->get('year'))
                <div class='alert alert-danger'>{{ $errors->first('year') }}</div>
            @endif
        </div>

        <div class='form-group'>
            <label for='title'>Enter book title</label>
            <input type='text' class='form-control' id='title' name='title'
                   value='{{old('title') ?? 'A Day in the Life'}}'>
            @if($errors->get('title'))
                <div class='alert alert-danger'>{{ $errors->first('title') }}</div>
            @endif
        </div>

        <div class='form-group'>
            <label for='city'>Enter publication city</label>
            <input type='text' class='form-control' id='city' name='city'
                   value='{{old('city') ?? 'Boston'}}'>
            @if($errors->get('city'))
                <div class='alert alert-danger'>{{ $errors->first('city') }}</div>
            @endif
        </div>

        <div class='form-group'>
            <label for='publisher'>Enter publisher name</label>
            <input type='text' class='form-control' id='publisher' name='publisher'
                   value='{{old('publisher') ?? 'The Wall'}}'>
            @if($errors->get('publisher'))
                <div class='alert alert-danger'>{{ $errors->first('publisher') }}</div>
            @endif
        </div>

        <div class='form-group'>
            <label for='publisher'>Include in-text citation?</label>
            <input type='checkbox'
                   class='form-check'
                   id='intext'
                   name='intext' @if(old('intext') == 'on') {{'checked'}}@endif>
            @if($errors->get('intext'))
                <div class='alert alert-danger'>{{ $errors->first('intext') }}</div>
            @endif
            {{old('intext')}}
        </div>

        <div class='form-group'>
            <label for='userEmail' id='userEmailLabel'>What email do you wish we could send this to?</label>
            <input type='email'
                   class='form-control'
                   id='userEmail'
                   name='userEmail'
                   aria-describedby='userEmailLabel userEmailInfo'
                   value='{{old('userEmail')}}'>
            <small class='form-text text-muted'
                   id='userEmailInfo'>Optional. Must be a valid email. Email will NOT be sent.
            </small>
            @if($errors->get('userEmail'))
                <div class='alert alert-danger'>{{ $errors->first('userEmail') }}</div>
            @endif
        </div>

        <input type='submit' class='mb-3 btn btn-primary' name='cite' value='Generate Citation'>
    </form>
@endsection