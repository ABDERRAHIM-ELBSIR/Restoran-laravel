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
</head>

<body class="sb-nav-fixed">
    @extends('admin.nav')
    <div id="layoutSidenav">
        @extends('admin.layoutsidenav')

        <div id="layoutSidenav_content">
            <div class="container">
                @isset($data)
                    <div class="content">
                        <form method="POST" action="{{ url('delete-booking/' . $data->id) }}">
                            @csrf
                            @method('DELETE')
                            <div class="user-details">
                                <div class="input-box">
                                    <span class="details">Full Name</span>
                                    <input type="text" placeholder="Enter your name" name="name"
                                        value="{{ $data->user_name }}">
                                </div>
                                <div class="input-box">
                                    <span class="details">coomande</span>
                                    <input type="text" placeholder="Enter your address" name="address"
                                        value="{{ $data->special_request }}">
                                </div>
                                <div class="input-box">
                                    <span class="details">Email</span>
                                    <input type="email" placeholder="Enter your email" name="email"
                                        value="{{ $data->user_email }}">
                                </div>
                                <div class="input-box">
                                    <span class="details"> Number person</span>
                                    <input type="text" placeholder="Enter your number" name="phone"
                                        value="{{ $data->numbre_person }}">
                                </div>
                               
                                <div class="input-box">
                                    <span class="details">datetime</span>
                                    <input type="text" name="is_admin" value="{{ $data->datetime }}">
                                </div>
                            </div>
                          
                            <div class="button">
                                <input type="submit" value="delete booking">
                            </div>
                        </form>
                    </div>
                @endisset
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src={{ asset('admin/js/scripts.js') }}></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js"
        crossorigin="anonymous"></script>
    <script src={{ asset('admin/js/datatables-simple-demo.js') }}></script>

</body>

</html>
