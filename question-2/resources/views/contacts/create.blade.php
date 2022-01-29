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
            <input type="email" id="email" class="form-field" name="email" placeholder="e.g. paul.mccartney@gmail.com" required>
        </div>
        <div>
            <div class="label"><label>Telephone</label>:</div>
            <input type="text" id="telephone" class="form-field" name="telephone" placeholder="e.g. 077172395872" required>
        </div>
        <div>
            <input type="submit">
        </div>
    </form>

    <script>
        // validate form submission
        $('form').submit(function() {
            var $first_name = $('#first_name').val();
            var $last_name = $('#last_name').val();
            var $email = $('#email').val();
            var $telephone = $('#telephone').val();

            var error_message = "";

            // validate first name
            if ($first_name.length > 30) {
                error_message += "Invalid first name.\n";
            }

            // validate last name
            if ($last_name.length > 30) {
                error_message += "Invalid last name.\n";
            }

            // validate email address
            if ($email.length > 100) {
                error_message += "Invalid email address.\n";
            }

            // validate telephone number
            if (!$.isNumeric($telephone) || $telephone.length != 11) { // check if it's numeric number and contains 11 digits
                error_message += "Invalid telephone number.\n";
            }

            // show error message
            if (error_message != "") {
                alert(error_message);
                return false;
            }

            return false;
        });
    </script>
@endsection
