@extends('admin.layouts.master')
@section('title', 'Admin - Hero Image')

@section('content')
    <div class="page-content">
        <div class="container-fluid">

            {{-- Alerts --}}
            @if (session('success'))
                <div class="alert alert-primary alert-dismissible fade show" role="alert">
                    <i class="mdi mdi-bullseye-arrow me-2"></i>
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <i class="mdi mdi-alert-circle-outline me-2"></i>
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            {{-- End Alerts --}}

            {{-- Validation Errors --}}
            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>There were some errors:</strong>
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            {{-- End Validation Errors --}}

            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">
                            <h1>Hero Image Section</h1>
                            <form action="{{ route('heroSection.image.create') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="hero_id" value="{{ $hero->id }}">

                                <div class="mb-3">
                                    <label for="image_path" class="form-label">Hero Image</label>
                                    <input type="file" class="form-control" id="image_path" name="image_path">

                                    @error('image_path')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary">Upload</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card mt-2">
                <div class="card-body">
                    <h4 class="card-title">Uploaded Hero Images</h4>

                    @if ($hero_images->isEmpty())
                        <p>No hero images uploaded yet.</p>
                    @else
                        <div class="table-responsive">
                            <table class="table table-bordered align-middle">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Image</th>
                                        <th>Filename</th>
                                        <th>Uploaded At</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($hero_images as $index => $image)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>
                                                <img src="{{ asset('uploads/hero_images/' . $image->image_path) }}"
                                                    alt="Hero Image" width="100">
                                            </td>
                                            <td>{{ $image->image_path }}</td>
                                            <td>{{ $image->created_at->format('Y-m-d H:i') }}</td>
                                            <td>
                                                <form action="{{ route('heroSection.image.delete', $image->id) }}"
                                                    method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"
                                                        onclick="return confirm('Are you sure you want to delete this image?');">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
            </div>

        </div>
    </div>

@endsection
