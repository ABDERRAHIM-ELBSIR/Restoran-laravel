<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>users</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('admin/css/styles.css') }}">


    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <style>
        .images form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 400px;
        }

        .images label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
        }

        .images input[type="file"] {
            display: block;
            width: 100%;
            padding: 8px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .images button {
            background-color: #007bff;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        .images button:hover {
            background-color: #0056b3;
        }

        .images .success-message {
            color: #28a745;
            font-weight: bold;
        }

        .images .error-message {
            color: #dc3545;
            font-weight: bold;
            margin-top: 10px;
        }
        .images .success{
            text-align: center;
            align-items: center;
            align-content: center;
            font-size: 20px;
            color: #28a745;
            font-family: sans-serif;
        }
    </style>
</head>

<body class="sb-nav-fixed">
    @extends('admin.nav')
    <div id="layoutSidenav">
        @extends('admin.layoutsidenav')

        <div id="layoutSidenav_content">
            <div class="images">
                <form action="{{ url('/upload-images') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div>
                        <label for="images">Select Images:</label>
                        <input type="file" name="images[]" multiple required>
                    </div>

                    <div>
                        <button type="submit">Upload Images</button>
                    </div>
                </form>

                @if (session('success'))
                    <div class="success">{{ session('success') }}</div>
                @endif

                @if ($errors->any())
                    <div>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>

        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="admin/js/scripts.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js"
        crossorigin="anonymous"></script>
    <script src="admin/js/datatables-simple-demo.js"></script>
</body>

</html>
