@extends('layouts.app')
@section('title') UbahKategori @endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('categories.index') }}">Data Kategori</a></li>
                    <li class="breadcrumb-item active" aria-current="page">UbahKategori</li>
                </ol>
            </nav>
            <div class="card">
                <div class="card-header">{{ __('UbahKategori') }}</div>
                <form enctype="multipart/form-data" class="bg-white shadow-sm p-3" action="{{ route('categories.update',$category->id) }}"
                    method="POST">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="name">Nama Kategori</label>
                        <input value="{{$category->name}}"class="form-control" placeholder="Nama Kategori" type="text" name="name" id="name" />
                        @if ($errors->has('name'))
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="slug">Slug</label>
                        <input value="{{$category->slug}}" class="form-control" placeholder="Slug" type="text" name="slug" id="slug" />
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