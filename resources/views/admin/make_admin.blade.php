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

                <div class="content">
                  
                    <form method="POST" action="{{ url('make-admin/'.$user->id) }}" >
                        @csrf
                        <div class="user-details">
                           
                            <div class="input-box">
                                <span class="details">is admin</span>
                                <label for="">{{ $user->is_admin }}</label>
                            </div>
                            
                        </div>
                        <div class="gender-details">
                            <input type="radio" name="is_admin" id="dot-1" value="1">
                            <input type="radio" name="is_admin" id="dot-2" value="0">
                            <span class="gender-title">Gender</span>
                            <div class="category">
                                <label for="dot-1">
                                    <span class="dot one"></span>
                                    <span class="gender">make him admin</span>
                                </label>
                                <label for="dot-2">
                                    <span class="dot two"></span>
                                    <span class="gender">make him user </span>
                                </label>
                             
                            </div>
                        </div>
                        <div class="button">
                            <input type="submit" value="Save">
                        </div>
                    </form>
                </div>

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
