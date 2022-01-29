@extends('layouts.default')

@section('content')
    <style>
        .label {
            margin-bottom: 10px;
        }
        input {
            margin-bottom: 15px;
        }
        .form-field {
            width: 300px;
        }
    </style>

    <div class="page-header">Create a new contact</div>
    <form method="POST" action="{{ route('contacts.store') }}">
        <div>
            <div class="label"><label>First Name</label>:</div>
            <input type="text" id="first_name" class="form-field" name="first_name" placeholder="e.g. Paul" required>
        </div>
        <div>
            <div class="label"><label>Last Name</label>:</div>
            <input type="text" id="last_name" class="form-field" name="last_name" placeholder="e.g. McCartney" required>
        </div>
        <div>
            <div class="label"><label>Email</label>:</div>
            <input type="email" id="last_name" class="form-field" name="last_name" placeholder="e.g. paul.mccartney@gmail.com" required>
        </div>
        <div>
            <div class="label"><label>Telephone</label>:</div>
            <input type="text" id="telephone" class="form-field" name="telephone" placeholder="e.g. 077172395872" required>
        </div>
        <div>
            <input type="submit">
        </div>
    </form>
@endsection
