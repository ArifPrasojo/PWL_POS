<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Level Pengguna</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f4f4f4;
        }
        h1 {
            color: #2c3e50;
            text-align: center;
            margin-bottom: 30px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            background-color: white;
            box-shadow: 0 1px 3px rgba(0,0,0,0.2);
        }
        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #3498db;
            color: white;
            font-weight: bold;
            text-transform: uppercase;
        }
        tr:hover {
            background-color: #f5f5f5;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Data Pengguna</h1>
    <table>
        <thead>
            <tr>
                <th>Jumlah Pengguna</th>
                {{-- <th>ID</th>
                <th>Username</th>
                <th>Nama</th>
                <th>ID Level Pengguna</th> --}}
            </tr>
        </thead>
        <tbody>
                <tr>
                    <td>{{$data}}</td>
                    {{-- <td>{{ $data->user_id }}</td>
                    <td>{{ $data->username }}</td>
                    <td>{{ $data->nama }}</td>
                    <td>{{ $data->level_id }}</td> --}}
                </tr>
        </tbody>
    </table>
</body>
</html>