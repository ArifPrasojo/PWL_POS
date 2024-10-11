<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registrasi Pengguna</title>
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
                <p class="login-box-msg">Registrasi Pengguna Baru</p>
                <form method="POST" action="{{ url('register') }}" id="form-register">
                    @csrf
                    <div class="input-group">
                        <select class="form-control" id="level_id" name="level_id" required>
                            <option value="">- Pilih Level -</option>
                            @foreach ($level as $item)
                                <option value="{{ $item->level_id }}">{{ $item->level_nama }}</option>
                            @endforeach
                        </select>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-layer-group"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group">
                        <input type="text" id="username" name="username" class="form-control" placeholder="Username" value="{{ old('username') }}" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group">
                        <input type="text" id="nama" name="nama" class="form-control" placeholder="Nama" value="{{ old('nama') }}" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-id-card"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group">
                        <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="icheck-primary">
                        <input type="checkbox" id="agreeTerms" name="terms" value="agree">
                        <label for="agreeTerms">
                            Saya setuju dengan <a href="#">syarat dan ketentuan</a>
                        </label>
                    </div>
                    <button type="submit" class="btn btn-primary">Register</button>
                    <div class="text-center mt-3">
                        <p>Sudah punya akun? <a href="{{ url('login') }}">Login</a></p>
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
            $("#form-register").validate({
                rules: {
                    level_id: {
                        required: true,
                    },
                    username: {
                        required: true,
                        minlength: 4,
                        maxlength: 20
                    },
                    password: {
                        required: true,
                        minlength: 5,
                    }
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