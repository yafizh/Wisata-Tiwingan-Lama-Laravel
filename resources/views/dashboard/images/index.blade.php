@extends('dashboard.layouts.main')

@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Galery Gambar</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
                <div class="btn-group ms-2">
                    <a href="/admin/gallery/images/create" class="btn btn-sm btn-primary">Tambah</a>
                </div>
            </div>
        </div>
        @if (session()->has('success'))
            <div class="alert alert-success d-flex align-items-center alert-dismissible fade show" role="alert">
                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:">
                    <use xlink:href="#check-circle-fill" />
                </svg>
                <div>
                    {{ session('success')['message'] }}
                    @if (isset(session('success')['slug']))
                        <a href="/{{ Route::getCurrentRoute()->uri() }}/{{ session('success')['slug'] }}" class="alert-link">
                            Lihat Gambar
                        </a>
                    @endif
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th class="fit" scope="col">#</th>
                        <th scope="col">Judul</th>
                        <th class="fit" scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($images as $i => $image)
                        <tr>
                            <td class="fit">{{ $images->firstItem() + $i }}</td>
                            <td>{{ $image->title }}</td>
                            <td class="fit">
                                <a href="/admin/gallery/images/{{ $image->slug }}" class="badge bg-info"><span
                                        data-feather="eye"></span></a>

                                <a href="/admin/gallery/images/{{ $image->slug }}/edit" class="badge bg-warning"><span
                                        data-feather="edit"></span></a>

                                <form action="/admin/gallery/images/{{ $image->slug }}" method="post"
                                    class="d-inline">
                                    @method('delete')
                                    @csrf
                                    <button class="badge bg-danger border-0" onclick="return confirm('Are you sure?')"><span
                                            data-feather="x-circle"></span></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-end">
            {{ $images->links() }}
        </div>
    </main>
@endsection
