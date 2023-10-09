<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="admin/css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
    @extends('admin.nav')
    <div id="layoutSidenav">
        @extends('admin.layoutsidenav')
        <div id="layoutSidenav_content">
            <div class="card-index">
                <a href="{{ url('/dashboard-users') }}">
                    <div class="card-content  user-card">
                        <p>users</p>
                        <span><i class="fa fa-user"></i></span>
                        <span>{{ $users }}</span>
                    </div>
                </a>
                <a href="{{ url('/dashboard-menu') }}">
                    <div class="card-content  menu-card">
                        <p>menu</p>
                        <span><i class="fas fa-pizza-slice"></i></span>
                        <span>{{ $menu }}</span>
                    </div>
                </a>
                <a href="{{ url('/dashboard-chefs') }}">
                    <div class="card-content  chefs-card">
                        <p>chefs</p>
                        <span>
                            <img src="img/chef.png" alt="">
                        </span>
                        <span>{{ $chefs }}</span>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="admin/js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="admin/assets/demo/chart-area-demo.js"></script>
    <script src="admin/assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js"
        crossorigin="anonymous"></script>
    <script src="admin/js/datatables-simple-demo.js"></script>
</body>

</html>
