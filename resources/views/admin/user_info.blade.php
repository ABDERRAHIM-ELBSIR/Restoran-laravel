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
                @isset($user_info)
                    <div class="content">
                        <form method="POST" action="{{ url('delete-users/' . $user_info->id) }}">
                            @csrf
                            @method('DELETE')
                            <div class="user-details">
                                <div class="input-box">
                                    <span class="details">Full Name</span>
                                    <input type="text" placeholder="Enter your name" name="name"
                                        value="{{ $user_info->name }}">
                                </div>
                                <div class="input-box">
                                    <span class="details">address</span>
                                    <input type="text" placeholder="Enter your address" name="address"
                                        value="{{ $user_info->address }}">
                                </div>
                                <div class="input-box">
                                    <span class="details">Email</span>
                                    <input type="email" placeholder="Enter your email" name="email"
                                        value="{{ $user_info->email }}">
                                </div>
                                <div class="input-box">
                                    <span class="details">Phone Number</span>
                                    <input type="text" placeholder="Enter your number" name="phone"
                                        value="{{ $user_info->phone }}">
                                </div>
                                <div class="input-box">
                                    <span class="details">Password</span>
                                    <input type="password" placeholder="Enter your password" name="password">
                                </div>
                                <div class="input-box">
                                    <span class="details">Age</span>
                                    <input type="text" placeholder="your age" name="age"
                                        value="{{ $user_info->age }}">
                                </div>
                                <div class="input-box">
                                    <span class="details">profile</span>
                                    <input type="file" name="img">
                                </div>
                                <div class="input-box">
                                    <span class="details">is_admin</span>
                                    <input type="text" name="is_admin" value="{{ $user_info->is_admin }}">
                                </div>
                            </div>
                            <div class="gender-details">
                                <span class="gender-title">Gender</span>
                                <div class="category">
                                    <label for="dot-1">
                                        <span class="gender">{{ $user_info->gender }}</span>
                                    </label>
                                </div>
                            </div>
                            <div class="button">
                                <input type="submit" value="delete user">
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
