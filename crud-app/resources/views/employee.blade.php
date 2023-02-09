<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Employee Dashboard</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style type="text/css">
        body {
            color: #566787;
            background: #f7f5f2;
            font-family: 'Roboto', sans-serif;
        }

        .table-wrapper {
            background: #fff;
            padding: 20px 25px;
            margin: 30px auto;
            border-radius: 3px;
            box-shadow: 0 1px 1px rgba(0, 0, 0, .05);
        }

        .table-title {
            color: #fff;
            background: #40b2cd;
            padding: 16px 25px;
            margin: -20px -25px 10px;
            border-radius: 3px 3px 0 0;
        }

        .table-title h2 {
            margin: 5px 0 0;
            font-size: 24px;
        }

        .search-box {
            position: relative;
            float: right;
        }

        .search-box .input-group {
            min-width: 300px;
            position: absolute;
            right: 0;
        }

        .search-box .input-group-addon,
        .search-box input {
            border-color: #ddd;
            border-radius: 0;
        }

        .search-box input {
            height: 34px;
            padding-right: 35px;
            background: #f4fcfd;
            border: none;
            border-radius: 2px !important;
        }

        .search-box input:focus {
            background: #fff;
        }

        .search-box input::placeholder {
            font-style: italic;
        }

        .search-box .input-group-addon {
            min-width: 35px;
            border: none;
            background: transparent;
            position: absolute;
            right: 0;
            z-index: 9;
            padding: 6px 0;
        }

        .search-box i {
            color: #a0a5b1;
            font-size: 19px;
            position: relative;
            top: 2px;
        }

        table.table {
            table-layout: fixed;
            margin-top: 15px;
        }

        table.table tr th,
        table.table tr td {
            border-color: #e9e9e9;
        }

        table.table th i {
            font-size: 13px;
            margin: 0 5px;
            cursor: pointer;
        }

        table.table th:first-child {
            width: 60px;
        }

        table.table th:last-child {
            width: 120px;
        }

        table.table td a {
            color: #a0a5b1;
            display: inline-block;
            margin: 0 5px;
        }

        table.table td a.view {
            color: #03A9F4;
        }

        table.table td a.edit {
            color: #FFC107;
        }

        table.table td a.delete {
            color: #E34724;
        }

        table.table td i {
            font-size: 19px;
        }
    </style>
    <script type="text/javascript">
        $(document).ready(function() {
            // Activate tooltips
            $('[data-toggle="tooltip"]').tooltip();

            // Filter table rows based on searched term
            $("#search").on("keyup", function() {
                var term = $(this).val().toLowerCase();
                $("table tbody tr").each(function() {
                    $row = $(this);
                    var name = $row.find("td:nth-child(2)").text().toLowerCase();
                    console.log(name);
                    if (name.search(term) < 0) {
                        $row.hide();
                    } else {
                        $row.show();
                    }
                });
            });
        });
    </script>
</head>

<body>
    <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h2>Employee <b>Details</b></h2>
                    </div>
                    <div class="col-sm-2">
                        <a type="button" href="/employee-add">Add</a>
                    </div>
                    <div class="col-sm-4">
                        <div class="search-box">
                            <div class="input-group">
                                <input type="text" id="search" class="form-control" placeholder="Search">
                                <span class="input-group-addon"><i class="material-icons">&#xE8B6;</i></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th style="width: 10%;">Emp No</th>
                        <th style="width: 19%;">First Name</th>
                        <th style="width: 19%;">Last Name</th>
                        <th>Gender</th>
                        <th>Hire Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($employee as $row)
                    <tr>
                        <td>{{$row->emp_no}}</td>
                        <td>{{$row->first_name}}</td>
                        <td>{{$row->last_name}}</td>
                        <td>{{$row->gender}}</td>
                        <td>{{$row->hire_date}}</td>
                        <td>
                            <a href="employee-view/{id}" class="view" title="View" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                            <a href="employee-edit/{id}" class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                            <a href="employee-delete/{id}" id="{{$row->id}}" class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>
                        </td>
                    </tr>
                    @endforeach

                    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
                    <script>
                        $(document).ready(function() {

                            $('.deletebtn').on('click', function(event) {
                                event.preventDefault();
                                var id = $(this).attr('id');
                                $('#filterModal').modal('show');

                                $('.deletepop').on('click', function(event) {
                                    event.preventDefault();

                                    $('#filterModal').modal('hide');
                                    console.log("INSIDE REQ " + id);
                                    $.ajax({
                                        method: "get",
                                        url: '/employee-delete' + id,
                                        data: {
                                            id: id,
                                        },
                                        success: function(result) {

                                            location.reload();
                                        }
                                    });
                                });
                            });
                        });
                    </script>

                </tbody>
            </table>
        </div>
    </div>
</body>

</html>