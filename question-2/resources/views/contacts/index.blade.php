@extends('layouts.default')

@section('content')
    <style>
        .action {
            margin-bottom: 10px;
        }

        .data-table {
            clear: both;
        }

        .data-table th {
            text-align: left;
        }

        .data-table-footer {
            /* text-align: right; */
        }

        nav {
            float: right;
        }

        ul {
            margin: 0;
            padding: 0;
            list-style-type: none;
        }

        ul > li {
            float: left;
            padding: 5px;
        }

        ul > li > a {
            text-decoration: none;
            color: #7494c4;
        }
    </style>

    Index Page <button class="action">create a contact</button>

    <table class="data-table">
        <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Telephone</th>
        </tr>
        @foreach ($contacts as $contact)
            <tr>
                <td>{{ $contact->first_name }}</td>
                <td>{{ $contact->last_name }}</td>
                <td>{{ $contact->email }}</td>
                <td>{{ $contact->telephone }}</td>
            </tr>
        @endforeach
        <tr>
            <td colspan="4" class="data-table-footer">{{ $contacts->links() }}</td>
        </tr>
    </table>
@endsection