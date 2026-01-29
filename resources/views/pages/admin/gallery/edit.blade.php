@extends('layouts.admin')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Gallery</h1>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach 
            </ul>
            <button type="button" class="close" data-dismiss="alert">
                <span>&times;</span>
            </button>
        </div>
    @endif 

    <div class="card shadow">
        <div class="card-body">
            <form action="{{ route('gallery.update', $item->id) }}" method="post" enctype="multipart/form-data">
                @method('PUT')
                @csrf 
                <div class="form-group">
                    <label for="travel_packages_id">Paket Travel</label>
                    <select name="travel_packages_id" required class="form-control">
                        @foreach ($travel_packages as $travel_package)
                            <option 
                                value="{{ $travel_package->id }}" 
                                {{ $travel_package->id == $item->travel_packages_id ? 'selected' : '' }}>
                                {{ $travel_package->title }}
                            </option>
                        @endforeach 
                    </select>
                </div>
                <div class="form-group">
                    <label for="image">Gambar Saat Ini</label>
                    <br>
                    <img src="{{ Storage::url($item->image) }}" class="img-thumbnail mb-2" width="200">
                </div>
                <div class="form-group">
                    <label for="image">Ganti Image (opsional)</label>
                    <input type="file" class="form-control" name="image" id="image" placeholder="Image" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary btn-block">
                    Ubah
                </button>
            </form>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
@endsection 