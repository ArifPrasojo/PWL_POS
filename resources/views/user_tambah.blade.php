<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Tambah Data User</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            color: #333;
            line-height: 1.6;
            margin: 0;
            padding: 20px;
        }
        h1 {
            text-align: center;
            color: #2c3e50;
        }
        form {
            max-width: 500px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        label {
            font-weight: bold;
            margin-bottom: 5px;
            display: block;
        }
        input[type="text"], input[type="password"], input[type="number"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0 20px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            width: 100%;
            background-color: #3498db;
            color: white;
            padding: 14px 20px;
            margin-top: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            font-weight: bold;
        }
        input[type="submit"]:hover {
            background-color: #2980b9;
        }
        .form-group {
            margin-bottom: 15px;
        }
    </style>
</head>
<body>

    <h1>Form Tambah Data User</h1>

    <form method="post" action="{{url('user/tambah_simpan')}}">
        {{csrf_field()}}

        <div class="form-group">
            <label>Username</label>
            <input type="text" name="username" placeholder="Masukkan Username" required>
        </div>

        <div class="form-group">
            <label>Nama</label>
            <input type="text" name="nama" placeholder="Masukkan Nama" required>
        </div>

        <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" placeholder="Masukkan Password" required>
        </div>

        <div class="form-group">
            <label>Level ID</label>
            <input type="number" name="level_id" placeholder="Masukkan ID Level" required>
        </div>

        <input type="submit" value="Simpan">
    </form>

</body>
</html>
