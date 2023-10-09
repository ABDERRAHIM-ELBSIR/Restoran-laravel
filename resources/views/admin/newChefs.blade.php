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
                        <form  action="{{url('/new-chefs/store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            
                            <div class="user-details">
                              <div class="input-box">
                                <span class="details">chef Name</span>
                                <input type="text"   name="name">
                              </div>
                              <div class="input-box">
                                <span class="details">discription</span>
                                <input type="text"   name="discription">
                              </div>
                              <div class="input-box">
                                <span class="details">facebook_url</span>
                                <input type="text"   name="facebook_url">
                              </div>
                              <div class="input-box">
                                <span class="details">instagram_url</span>
                                <input type="text"   name="instagram_url">
                              </div>
                              <div class="input-box">
                                <span class="details">twiter_url</span>
                                <input type="text"   name="twiter_url">
                              </div>
                              <div class="input-box">
                                <span class="details">profile</span>
                                <input type="file" name="file">
                              </div>
                            </div>
                            <div class="button">
                              <input type="submit" value="Add new">
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
