<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index() {
        $data = [
            'nama' => 'Pelanggan Pertama',
        ];
        UserModel::where('level_id', '2')->update($data); // Mengupdate data user

        $user = UserModel::all(); // Mengambil semua data dari tabel m_user
        return view('user', ['data' => $user]);

        // $data = [
        //     'username' => 'customer-1',
        //     'nama' => 'Pelanggan',
        //     'password' => Hash::make('12345'),
        //     'level_id' => 2
        // ];
        // UserModel::insert($data);
        
    }
}