<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Pengguna</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-image: url('{{ asset('images/background.jpg') }}');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0;
            padding: 0;
        }
        .login-box {
            width: 100%;
            max-width: 420px;
            margin: auto;
            padding: 20px;
        }
        .card {
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(10px);
            background-color: rgba(255, 255, 255, 0.9);
            overflow: hidden;
        }
        .card-header {
            background-color: transparent;
            border-bottom: none;
            padding: 30px 30px 0;
            text-align: center;
        }
        .card-header a {
            color: #007bff;
            font-weight: 700;
            font-size: 28px;
            text-decoration: none;
        }
        .card-body {
            padding: 30px;
        }
        .login-box-msg {
            font-weight: 600;
            color: #333;
            font-size: 18px;
            margin-bottom: 25px;
            text-align: center;
        }
        .form-control {
            width: 100%;
            padding: 12px 20px;
            font-size: 16px;
            border: 1px solid #ddd;
            border-radius: 25px;
            box-sizing: border-box;
            transition: all 0.3s ease;
        }
        .form-control:focus {
            outline: none;
            box-shadow: 0 0 0 2px rgba(0, 123, 255, 0.25);
            border-color: #80bdff;
        }
        .input-group {
            position: relative;
            margin-bottom: 20px;
        }
        .input-group-append {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
        }
        .input-group-text {
            background-color: transparent;
            border: none;
            color: #007bff;
        }
        .btn-primary {
            width: 100%;
            background-color: #007bff;
            border: none;
            border-radius: 25px;
            padding: 12px 20px;
            font-weight: 600;
            color: white;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            box-shadow: 0 5px 15px rgba(0, 86, 179, 0.4);
        }
        .icheck-primary {
            margin-bottom: 15px;
        }
        .icheck-primary label {
            font-size: 14px;
            color: #555;
        }
        .login-box a {
            color: #007bff;
            transition: all 0.3s ease;
        }
        .login-box a:hover {
            color: #0056b3;
            text-decoration: none;
        }
        .error-text {
            color: #dc3545;
            font-size: 12px;
            margin-top: 5px;
        }
        @media (max-width: 576px) {
            .login-box {
                padding: 10px;
            }
            .card-body {
                padding: 20px;
            }
        }
    </style>
</head>
<body>
    <div class="login-box">
        <div class="card">
            <div class="card-header">
                <a href="{{ url('/') }}" class="h1"><b>Admin</b>LTE</a>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Sign in to start your session</p>
                <form action="{{ url('login') }}" method="POST" id="form-login">
                    @csrf
                    <div class="input-group">
                        <input type="text" id="username" name="username" class="form-control" placeholder="Username">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <small id="error-username" class="error-text"></small>
                    <div class="input-group">
                        <input type="password" id="password" name="password" class="form-control" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <small id="error-password" class="error-text"></small>
                    <div class="row mt-3">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" id="remember">
                                <label for="remember">Remember Me</label>
                            </div>
                        </div>
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Login</button>
                        </div>
                    </div>
                    <div class="text-center mt-3">
                        <p>Belum punya akun? <a href="{{ url('register') }}">Registrasi</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/additional-methods.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function() {
            $("#form-login").validate({
                rules: {
                    username: {
                        required: true,
                        minlength: 4,
                        maxlength: 20
                    },
                    password: {
                        required: true,
                        minlength: 6,
                        maxlength: 20
                    }
                },
                messages: {
                    username: {
                        required: "Username is required",
                        minlength: "Username must be at least 4 characters",
                        maxlength: "Username cannot exceed 20 characters"
                    },
                    password: {
                        required: "Password is required",
                        minlength: "Password must be at least 6 characters",
                        maxlength: "Password cannot exceed 20 characters"
                    }
                },
                errorElement: 'small',
                errorPlacement: function(error, element) {
                    error.addClass('error-text');
                    error.insertAfter(element.closest('.input-group'));
                },
                highlight: function(element) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function(element) {
                    $(element).removeClass('is-invalid');
                },
                submitHandler: function(form) {
                    $.ajax({
                        url: form.action,
                        type: form.method,
                        data: $(form).serialize(),
                        success: function(response) {
                            if (response.status) {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Berhasil',
                                    text: response.message,
                                }).then(function() {
                                    window.location = response.redirect;
                                });
                            } else {
                                $('.error-text').text('');
                                $.each(response.msgField, function(prefix, val) {
                                    $('#error-' + prefix).text(val[0]);
                                });
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Terjadi Kesalahan',
                                    text: response.message
                                });
                            }
                        }
                    });
                    return false;
                }
            });
        });
    </script>
</body>
</html>