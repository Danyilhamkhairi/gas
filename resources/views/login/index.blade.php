<!doctype html>
<html lang="en">
<head>
    <title>Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('dist/css/style.min.css') }}">
    <style>
        .field-icon {
            float: right;
            margin-left: -30px;
            margin-top: -26px;
            position: relative;
            z-index: 2;
            cursor: pointer;
        }
        .form-group {
            position: relative;
        }
        .form-control-placeholder {
            position: absolute;
            top: 0;
            padding: 10px 10px 0;
            pointer-events: none;
            transition: all 0.2s;
        }
        .form-control:focus ~ .form-control-placeholder,
        .form-control:not(:placeholder-shown) ~ .form-control-placeholder {
            top: -20px;
            font-size: 12px;
            color: #999;
        }
        .img {
            max-width: 40%; /* Ensure the image doesn't exceed its container width */
            height: auto;
        }
    </style>
</head>
<body>
<section class="ftco-section">
    <div class="container">
<br>
<br>
<br>
        <div class="row justify-content-center">
            <div class="col-md-7 col-lg-5">
                <div class="wrap">
                  <center>
                    <img src="{{ asset('assets/images/ad.png') }}" class="img" alt="Background Image">
                  </center>
                  
                    <div class="login-wrap p-4 p-md-5">
                        <div class="d-flex">
                            <div class="w-100">
                                <h3 class="mb-4">Sign In</h3>
                            </div>
                            <div class="w-100">
                                <p class="social-media d-flex justify-content-end">
                                    <a href="#" class="social-icon d-flex align-items-center justify-content-center"><span class="fa fa-facebook"></span></a>
                                    <a href="#" class="social-icon d-flex align-items-center justify-content-center"><span class="fa fa-twitter"></span></a>
                                </p>
                            </div>
                        </div>

                        @if(session()->has('message'))
                            <div class="alert alert-success">
                                {{ session()->get('message') }}
                            </div>
                        @endif
                        @if(session()->has('error'))
                            <div class="alert alert-danger">
                                {{ session()->get('error') }}
                            </div>
                        @endif

                        <form action="{{ url('login-proses') }}" class="signin-form" method="post">
                            {{ csrf_field() }}
                            <div class="form-group mt-3">
                                <input type="text" name="username" class="form-control" required>
                                <label class="form-control-placeholder" for="username">Username</label>
                            </div>
                            <div class="form-group">
                                <input id="password-field" type="password" name="password" class="form-control" required>
                                <label class="form-control-placeholder" for="password">Password</label>
                                <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="form-control btn btn-primary rounded submit px-3">Sign In</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="{{ asset('assets/libs/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $(".toggle-password").click(function() {
            $(this).toggleClass("fa-eye fa-eye-slash");
            var input = $($(this).attr("toggle"));
            if (input.attr("type") == "password") {
                input.attr("type", "text");
            } else {
                input.attr("type", "password");
            }
        });
    });
</script>

</body>
</html>
