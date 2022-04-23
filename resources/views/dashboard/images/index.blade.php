@extends('dashboard.layouts.main')

@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Galery Gambar</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
                <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
                    <span data-feather="calendar"></span>
                    This week
                </button>
                <div class="btn-group ms-2">
                    <a href="/admin/images/create" class="btn btn-sm btn-primary">Tambah</a>
                </div>
            </div>
        </div>

        <style>
            .table th.fit {
                text-align: center;
            }
            .table th.fit,
            .table td.fit {
                width: 1%;
                white-space: nowrap;
            }

        </style>

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
                    @foreach ($images as $image)
                        <tr>
                            <td class="fit">{{ $loop->iteration }}</td>
                            <td>{{ $image->title }}</td>
                            <td class="fit">
                                <a href="/dashboard/images/{{ $image->slug }}" class="badge bg-info"><span
                                        data-feather="eye"></span></a>

                                <a href="/dashboard/images/{{ $image->slug }}/edit" class="badge bg-warning"><span
                                        data-feather="edit"></span></a>

                                <form action="/dashboard/images/{{ $image->slug }}" method="post" class="d-inline">
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
    </main>
@endsection
