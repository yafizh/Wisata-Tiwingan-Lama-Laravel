@extends('dashboard.layouts.main')

@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Ganti Password</h1>
        </div>
        <div class="col-md-6">
            @if (session()->has('success'))
                <div class="alert alert-success d-flex align-items-center alert-dismissible fade show" role="alert">
                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:">
                        <use xlink:href="#check-circle-fill" />
                    </svg>
                    <div>{{ session('success') }}</div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @elseif (session()->has('failed'))
                <div class="alert alert-danger d-flex align-items-center alert-dismissible fade show" role="alert">
                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Warning:">
                        <use xlink:href="#exclamation-triangle-fill" />
                    </svg>
                    <div>{{ session('failed') }}</div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
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
                <input type="password" class="form-control" name="confirm_new_password" id="confirm_new_password"
                    required>
            </div>
            <div class="mb-3">
                <button class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </main>
@endsection
