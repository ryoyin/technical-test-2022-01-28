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

        .data-table td {
            padding-right: 18px;
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

    <div class="page-header">Index Page - <a class="action" href="{{ route('contacts.create') }}">create a contact</a></div>

    @if (\Session::has('success'))
        <div class="alert alert-success">
            <ul>
                <li>{!! \Session::get('success') !!}</li>
            </ul>
        </div>
    @endif

    <table class="data-table">
        <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Telephone</th>
        </tr>
        {{-- @foreach ($contacts as $contact)
            <tr>
                <td>{{ $contact->first_name }}</td>
                <td>{{ $contact->last_name }}</td>
                <td>{{ $contact->email }}</td>
                <td>{{ $contact->telephone }}</td>
            </tr>
        @endforeach
        <tr>
            <td colspan="4" class="data-table-footer">{{ $contacts->links() }}</td>
        </tr> --}}
    </table>

    <script>
        // create template for contact data
        var dataTableDataTemplate = '<tr class="contact-data">' +
            '<td>first_name</td>' +
            '<td>last_name</td>' +
            '<td>email</td>' +
            '<td>telephone</td>' +
        '</tr>';

        var dataTablePaginateTemplate = '<tr class="contact-pagination">' +
            '<td colspan="4" class="data-table-footer">' +
                '<ul>' +
                    '<li>prev_page</li>' +
                    'pagination' +
                    '<li>next_page</li>' +
                '</ul>' +
            '</td>' +
        '</tr>'

        // retrieve contact records via api
        function fetchContact(page) {
            $("#overlay").show();

            $(".contact-data").remove();
            $(".contact-pagination").remove();

            $.ajax( "{{ url('/api/contacts') }}?page=" + page )
                .done(function(res) {

                    console.log(res);

                    res.data.forEach(contact => {
                        var tmpData = dataTableDataTemplate;
                        tmpData = tmpData.replace('first_name', contact.first_name);
                        tmpData = tmpData.replace('last_name', contact.last_name);
                        tmpData = tmpData.replace('email', contact.email);
                        tmpData = tmpData.replace('telephone', contact.telephone);
                        $('.data-table').append(tmpData);
                    });

                    var current_page = res.current_page;
                    var last_page = res.last_page;
                    var prev_page = current_page - 1;
                    prev_page = prev_page == 0 ? 1 : prev_page;
                    var next_page = current_page + 1;
                    next_page = next_page > last_page ? last_page : next_page;

                    var prev_page = prev_page == current_page ? '<' : '<a href="#" onclick="fetchContact(' + prev_page + ')"><</a>'
                    var next_page = next_page == current_page ? '>' : '<a href="#" onclick="fetchContact(' + next_page + ')">></a>'

                    var tmpPaginate = dataTablePaginateTemplate;
                    tmpPaginate = tmpPaginate.replace('prev_page', prev_page);
                    tmpPaginate = tmpPaginate.replace('next_page', next_page);

                    $('.data-table').append(tmpPaginate);

                    $("#overlay")
                        .delay(1000)
                        .queue(function (next) {
                            $(this).css('display', 'none');
                            next();
                        });
                });
        }

        $( document ).ready(function() {
            fetchContact(1);
        });
    </script>
@endsection
