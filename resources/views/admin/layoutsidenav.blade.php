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

<body>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Core</div>
                        <a class="nav-link" href="{{ url('/dashboard') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>
                       
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                            data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                            <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                            Pages
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapsePages" aria-labelledby="headingTwo"
                            data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                                    data-bs-target="#pagesCollapseAuth" aria-expanded="false"
                                    aria-controls="pagesCollapseAuth">
                                    Authentication
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                </a>
                                <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne"
                                    data-bs-parent="#sidenavAccordionPages">
                                    <nav class="sb-sidenav-menu-nested nav">
                                        <a class="nav-link" href="{{ url('/dashboard-login-form') }}">Login</a>
                                        <a class="nav-link" href="{{ url('/dashboard-register-form') }}">Register</a>
                                        <a class="nav-link" href="{{ url('/dashboard-password') }}">Forgot Password</a>
                                    </nav>
                                </div>
                                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                                    data-bs-target="#pagesCollapseError" aria-expanded="false"
                                    aria-controls="pagesCollapseError">
                                    Website-Pages
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                </a>
                                <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne"
                                    data-bs-parent="#sidenavAccordionPages">
                                    <nav class="sb-sidenav-menu-nested nav">
                                        <a class="nav-link" href="{{url('/contact ') }}">contact</a>
                                        <a class="nav-link" href="{{url('/about ') }}">about</a>
                                        <a class="nav-link" href="{{url('/menu ') }}">menu</a>
                                        <a class="nav-link" href="{{url('/service ') }}">servive</a>
                                        <a class="nav-link" href="{{url('/team ') }}">team</a>
                                        <a class="nav-link" href="{{url('/testimonial ') }}">testimonial</a>
                                        <a class="nav-link" href="{{url('/booking ') }}">booking</a>
                                    </nav>
                                </div>
                            </nav>
                        </div>
                        <a class="nav-link" href="{{ url('/dashboard-users') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                            users
                        </a>
                        <a class="nav-link" href="{{ url('/dashboard-menu') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-pizza-slice"></i></div>
                            menu
                        </a>
                        <a class="nav-link" href="{{ url('/dashboard-chefs') }}">
                            <div class="sb-nav-link-icon ">
                                <span>
                                    <img src={{ asset("img/chef.png") }} alt="">
                                </span>
                            </div>
                            chefs
                        </a>
                        <a class="nav-link" href="{{ url('/dashboard-booking') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-book"></i></div>
                            bookign
                        </a>
                        <a class="nav-link" href="{{ url('/dashboard-images') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-camera"></i></div>
                            Upload imges 
                        </a>
                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Logged in as:</div>
                  restorant
                </div>
            </nav>
        </div>
    </div>
</body>

</html>
