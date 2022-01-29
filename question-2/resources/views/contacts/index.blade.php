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
            text-align: right;
        }

        nav {
            float: right;
        }

        ul {
            margin: 0;
            padding: 0;
            list-style-type: none;
            display: inline-block;
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

    <div>Search by name: <input type="text" id="search" size="20"> <button onclick="search()">Go</button>

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
        var searchQuery = '';

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
                    'page_links' +
                    '<li>next_page</li>' +
                '</ul>' +
            '</td>' +
        '</tr>';

        function search() {
            var target = $('#search').val().trim();
            if (target != '') {
                searchQuery = 'search=' + target;
                fetchContact('?' + searchQuery);
            } else {
                fetchContact('?page=1');
            }
        }

        function generatePagination(res) {
            // pagination
            var current_page = res.current_page;
            var last_page = res.last_page;

            // determine prev_page html code
            var prev_page = current_page - 1;
            prev_page = prev_page == 0 ? 1 : prev_page;
            var prev_page = prev_page == current_page ? '<' : '<a href="#" onclick="fetchContact(\'?page=' + prev_page + '&' + searchQuery + '\')"><</a>'

            // determine next_page html code
            var next_page = current_page + 1;
            next_page = next_page > last_page ? last_page : next_page;
            var next_page = next_page == current_page ? '>' : '<a href="#" onclick="fetchContact(\'?page=' + next_page + '&' + searchQuery + '\')">></a>'

            // generate page links
            var page_links = '';
            for(var i=1; i<=last_page; i++) {
                var link = i == current_page ? i : '<a href="#" onclick="fetchContact(\'?page=' + i + '&' + searchQuery + '\')">' + i + '</a>';
                page_links += '<li>' + link + '</li>';
            }

            // generate prev and next page html code
            var tmpPaginate = dataTablePaginateTemplate;
            tmpPaginate = tmpPaginate.replace('prev_page', prev_page);
            tmpPaginate = tmpPaginate.replace('next_page', next_page);
            tmpPaginate = tmpPaginate.replace('page_links', page_links);

            return tmpPaginate;
        }

        // retrieve contact records via api
        function fetchContact(query) {
            $("#overlay").show(); // display loading message

            $(".contact-data").remove(); // remove table data
            $(".contact-pagination").remove(); // remove table pagination

            // get request for contacts data
            $.ajax( "{{ url('/api/contacts') }}" + query )
                .done(function(res) {

                    if (res.data.length == 0) { // no record found
                        $('.data-table').remove();
                        $('.main').append('<div>No record found!</div>');
                    } else {
                        // generate contacts and append to the table
                        res.data.forEach(contact => {
                            var tmpData = dataTableDataTemplate;
                            tmpData = tmpData.replace('first_name', contact.first_name);
                            tmpData = tmpData.replace('last_name', contact.last_name);
                            tmpData = tmpData.replace('email', contact.email);
                            tmpData = tmpData.replace('telephone', contact.telephone);
                            $('.data-table').append(tmpData);
                        });

                        if (res.last_page > 1)
                            $('.data-table').append(generatePagination(res)); // append generated pagination code to the table

                    }

                    // remove overlay
                    $("#overlay")
                        .delay(500)
                        .queue(function (next) {
                            $(this).css('display', 'none');
                            next();
                        });
                });
        }

        $( document ).ready(function() {
            fetchContact('?page=1');
        });
    </script>
@endsection
