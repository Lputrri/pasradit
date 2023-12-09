@extends('layouts.app')
@section('title')
    Data Kategori
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('categories.index') }}">Kategori</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Data Kategori</li>
                    </ol>
                </nav>
                <div class="row justify-content-end">
                    <div class="col-md-4">
                        <form action="{{ route('categories.index') }}">
                            <div class="input-group">
                                <input value="{{ Request::get('keyword') }}" name="keyword" type="text"
                                    class="form-control" placeholder="Filter berdasarkan nama kategori" name="nama">
                                <div class="input-group-append">
                                    <input type="submit" value="Filter" class="btn btn-primary">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <hr class="my-3">
                @if (session('status-create'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('status-create') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                @if (session('status-edit'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('status-edit') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                @if (session('status-delete'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('status-delete') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <div class="card">
                    <div class="card-header">{{ __('Data Kategori') }}</div>
                    <div class="card-body">
                        <a href="{{ route('categories.create') }}" class="btn btn-primary">Tambah Kategori</a>
                        <p>
                        <table class="table table-stripped table-sm">
                            <thead class="thead-light">
                                <tr>
                                    <th><b>Name</b></th>
                                    <th><b>Slug</b></th>
                                    <th><b>Aksi</b></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $category)
                                    <tr>
                                        <td>{{ $category->name }}</td>
                                        <td>{{ $category->slug }}</td>
                                        <td>
                                            <a class="btn btn-info text-white btn-sm"
                                                href="{{ route('categories.edit', [$category->id]) }}">Ubah</a>
                                            <form onsubmit="return confirm('Anda yakin menghapus data ini?')"
                                                class="d-inline"
                                                action="{{ route('categories.destroy', [$category->id]) }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="_method" value="DELETE">
                                                <input type="submit" value="Hapus" class="btn btn-danger btn-sm">
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colSpan="10">
                                        {{ $categories->appends(Request::all())->links() }}
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
