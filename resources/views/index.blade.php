<!DOCTYPE html>
<html>

<head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css">
    <style>
        body {
            font-family: 'ubuntu', sans-serif;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        .table {
            width: 100%;
            font-size: 16px;
        }

        .table th {
            font-weight: bold;
            font-size: 20px;
        }

        .table td,
        .table th {
            padding: 10px;
        }
    </style>
</head>

<body>
    <div class="container d-flex justify-content-center align-items-center pt-5">
        <div class="col-md-9" style="width: 80%;">
            <h2 class="text-center pb-3 text-danger">Add or Remove fields</h2>
            <form action="/post" method="POST">
                @csrf
                <!-- Form content -->
                @if ($errors->has('inputs.*.name'))
                    <div class="alert alert-danger">
                        {{ $errors->first('inputs.*.name') }}
                    </div>
                @endif
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <table class="table-bordered table">
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Mark</th>
                        <th>Action</th>
                    </tr>
                    <tr>
                        <td><input type="text" name="inputs[0][name]" placeholder="Enter your name"
                                class="form-control"></td>
                        <td><input type="text" email="inputs[0][email]" placeholder="Enter your name"
                                class="form-control"></td>
                        <td><input type="text" number="inputs[0][mark]" placeholder="Enter your name"
                                class="form-control"></td>

                        <td><button type="button" name="add" id="add" class="btn btn-success">Add
                                more</button></td>
                    </tr>
                </table>
                <button type="submit" class="btn btn-primary col-md-2">Save</button>



            </form>
        </div>
    </div>
    <script>
        var i = 0;
        $('#add').click(function() {
            ++i;
            $('.table').append(
                '<tr>' +
                '<td><input type="text" name="inputs[` + i +`][name]" placeholder="Enter your name" class="form-control"></td>' +
                '<td><input type="text" email="inputs[` + i +`][email]" placeholder="Enter your email" class="form-control"></td>' +
                '<td><input type="text" number="inputs[` + i +`][mark]" placeholder="Enter your mark" class="form-control"></td>' +
                '<td><button type="button" class="btn btn-danger remove-table-row">Remove</button></td>' +
                '</tr>'
            );
        });
        $(document).on('click', '.remove-table-row', function() {
            $(this).parents('tr').remove();
        });
    </script>
</body>

</html>
