@extends('layouts.app')
@section('title') Tambah Kategori @endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('categories.index') }}">Data Kategori</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Tambah Kategori</li>
                </ol>
            </nav>
            <div class="card">
                <div class="card-header">{{ __('Tambah Kategori') }}</div>
                <form enctype="multipart/form-data" class="bg-white shadow-sm p-3" action="{{route('categories.store')}}"
                    method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="nama">Nama Kategori</label>
                        <input class="form-control" placeholder="Nama Kategori" type="text" name="name" id="name" />
                        @if ($errors->has('name'))
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="slug">Slug</label>
                        <input class="form-control" placeholder="Slug" type="text" name="slug" id="slug" />
                        @if ($errors->has('slug'))
                        <span class="text-danger">{{ $errors->first('slug') }}</span>
                        @endif
                    </div>
                    <input class="btn btn-primary" type="submit" value="Simpan" />
                    <a href="{{route('categories.index')}}" class="btn btn-dark">Kembali</a>
                </form>
            </div>
        </div>
        
    </div>
</div>
@endsection