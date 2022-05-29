@extends('dashboard.layouts.main')

@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Ganti Password</h1>
        </div>

        <form action="/admin/change-password" method="post">
            @csrf
            <div class="mb-3 col-lg-6">
                <label for="old_password" class="form-label">Password Lama</label>
                <input type="password" class="form-control" name="old_password" id="old_password" required autofocus>
            </div>
            <div class="mb-3 col-lg-6">
                <label for="new_password" class="form-label">Password Baru</label>
                <input type="password" class="form-control" name="new_password" id="new_password" required>
            </div>
            <div class="mb-3 col-lg-6">
                <label for="confirm_new_password" class="form-label">Konfirmasi Password Baru</label>
                <input type="password" class="form-control" name="confirm_new_password" id="confirm_new_password" required>
            </div>
            <div class="mb-3">
                <button class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </main>
@endsection
