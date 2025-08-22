@extends('admin.layouts.master')
@section('title', 'Admin - Feature')

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


            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Edit Hero Feature</h4>

                    <form action="{{ route('heroSection.feature.update', $feature->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <input type="hidden" name="hero_id" value="{{ $hero->id }}">

                        <div class="mb-3">
                            <label>Title:</label>
                            <input type="text" name="title" class="form-control" value="{{ $feature->title }}"
                                required>
                        </div>

                        <div class="mb-3">
                            <label>Icon:</label>
                            <input type="text" name="icon" class="form-control" value="{{ $feature->icon }}" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="{{ route('heroSection.image') }}" class="btn btn-secondary">Cancel</a>
                    </form>
                </div>
            </div>

        </div>
    </div>

@endsection
