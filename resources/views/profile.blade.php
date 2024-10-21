@extends('layouts.template')
@section('content')
<style>
    .profile-container {
        background-color: #f8f9fa;
        border-radius: 15px;
        box-shadow: 0 0 20px rgba(0,0,0,0.1);
        overflow: hidden;
        margin-top: 30px;
    }
    .profile-header {
        background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);
        color: white;
        padding: 30px 0;
        text-align: center;
    }
    .profile-image-container {
        margin-bottom: 20px;
    }
    .profile-user-img {
        width: 150px;
        height: 150px;
        object-fit: cover;
        border: 5px solid white;
        box-shadow: 0 0 20px rgba(0,0,0,0.2);
        transition: transform 0.3s ease;
    }
    .profile-user-img:hover {
        transform: scale(1.05);
    }
    .profile-username {
        font-size: 24px;
        font-weight: bold;
        margin-top: 10px;
    }
    .profile-role {
        font-size: 16px;
        opacity: 0.8;
    }
    .profile-body {
        padding: 30px;
    }
    .list-group-item {
        border: none;
        padding: 15px 0;
        border-bottom: 1px solid #e9ecef;
    }
    .list-group-item:last-child {
        border-bottom: none;
    }
    .list-group-item b {
        color: #6a11cb;
    }
    .btn-primary {
        background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);
        border: none;
        padding: 10px 20px;
        transition: all 0.3s ease;
    }
    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(0,0,0,0.2);
    }
    .ubah-foto-btn {
        background-color: white;
        color: #6a11cb;
        border: 2px solid #6a11cb;
        padding: 5px 15px;
        transition: all 0.3s ease;
    }
    .ubah-foto-btn:hover {
        background-color: #6a11cb;
        color: white;
    }
</style>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="profile-container">
                <div class="profile-header">
                    <div class="profile-image-container">
                        <img class="profile-user-img img-fluid img-circle" 
                            src="{{ asset('storage/uploads/profile_pictures/'. auth()->user()->username .'/'.auth()->user()->username.'_profile.'.['png', 'jpg', 'jpeg'][array_search(true, [
                                file_exists(public_path('storage/uploads/profile_pictures/'.auth()->user()->username.'/'.auth()->user()->username.'_profile.png')),
                                file_exists(public_path('storage/uploads/profile_pictures/'.auth()->user()->username.'/'.auth()->user()->username.'_profile.jpg')),
                                file_exists(public_path('storage/uploads/profile_pictures/'.auth()->user()->username.'/'.auth()->user()->username.'_profile.jpeg'))
                            ])]) }}"
                        alt="User profile picture">
                    </div>
                    <h3 class="profile-username">{{ auth()->user()->nama }}</h3>
                    <p class="profile-role">{{ auth()->user()->level->level_nama }}</p>
                </div>
                
                <div class="profile-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <b>Username</b> <span class="float-right">{{ auth()->user()->username }}</span>
                        </li>
                        <li class="list-group-item">
                            <b>Nama</b> <span class="float-right">{{ auth()->user()->nama }}</span>
                        </li>
                        <li class="list-group-item">
                            <b>Tingkat Level</b> <span class="float-right">{{ auth()->user()->level->level_nama }}</span>
                        </li>
                    </ul>
                    
                    <form action="{{ route('upload.foto') }}" method="POST" enctype="multipart/form-data" class="mt-4">
                        @csrf
                        <div class="custom-file mb-3">
                            <input type="file" class="custom-file-input" id="upload_foto" name="foto" accept="image/*">
                            <label class="custom-file-label" for="upload_foto">Choose file</label>
                        </div>
                        <button type="submit" class="btn ubah-foto-btn">Ubah Foto</button>
                    </form>

                    <a href="{{ url('/') }}" class="btn btn-primary btn-block mt-4"><b>Kembali</b></a>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Update label on file selection
    document.querySelector('.custom-file-input').addEventListener('change', function (e) {
        var fileName = e.target.files[0].name;
        var nextSibling = e.target.nextElementSibling;
        nextSibling.innerText = fileName;
    });
</script>
@endsection
