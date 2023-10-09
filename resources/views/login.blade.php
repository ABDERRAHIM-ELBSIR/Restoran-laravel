<!DOCTYPE html>
<!-- Created By CodingLab - www.codinglabweb.com -->
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <title> Responsive Registration Form | CodingLab </title>
    <link rel="stylesheet" href="css/register.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <div class="container">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="title">Login</div>
        <div class="content">


            <form action="{{ url('/login') }}" method="POST">
                @csrf
                <div class="user-details">
                    <div class="input-box">
                        <span class="details">Email</span>
                        <input type="email" placeholder="Enter your email" required name="email" value="{{ old('email') }}">
                    </div>
                    <div class="input-box">
                        <span class="details">Password</span>
                        <input type="password" placeholder="Enter your password" required name="password">
                    </div>
                </div>

                <div class="button">
                    <input type="submit" value="login">
                </div>
                <a href="{{ url('/register_page') }}" class='login-register'>Register</a>
            </form>


        </div>
    </div>

</body>

</html>
