<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function index()
    {
        // Mengatur breadcrumb dan active menu
        $breadcrumb = (object)[
            'title' => '',
            'list' => ['Home', 'Profile']
        ];
        $activeMenu = 'profile';
        
        // Menampilkan view profile dengan variabel breadcrumb dan activeMenu
        return view('profile', ['breadcrumb' => $breadcrumb, 'activeMenu' => $activeMenu]);
    }

    public function upload_foto(Request $request)
    {
        // Validasi file gambar yang diupload, hanya mengizinkan jpeg, jpg, png dengan ukuran maksimal 2MB
        $request->validate([
            'foto' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Ambil user yang sedang login
        $user = auth()->user();
        // Tentukan folder tempat penyimpanan gambar profil
        $folderPath = 'uploads/profile_pictures/' . $user->username . '/';

        // Hapus foto profil lama (jpg, jpeg, png) jika ada
        $extensions = ['jpg', 'jpeg', 'png'];
        foreach ($extensions as $ext) {
            $oldFile = $folderPath . $user->username . '_profile.' . $ext;
            if (Storage::disk('public')->exists($oldFile)) {
                Storage::disk('public')->delete($oldFile);
                break;  // Stop setelah menemukan dan menghapus file lama
            }
        }

        // Ambil file yang diupload dari request
        $file = $request->file('foto');
        // Buat nama file baru dengan ekstensi yang sesuai
        $filename = $user->username . '_profile.' . $file->getClientOriginalExtension();
        // Simpan file di storage public pada folder pengguna
        $file->storeAs($folderPath, $filename, 'public');

        // (Opsional) Update nama file di database jika diperlukan
        // $user->update(['profile_picture' => $filename]);

        // Kembalikan ke halaman sebelumnya dengan pesan sukses
        return back()->with('success', 'Foto berhasil diupload.');
    }
}
