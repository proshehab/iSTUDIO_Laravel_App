@extends('admin.layouts.master')
@section('title', 'Admin - Dashboard')

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

            <!-- Form -->
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">
                            <h1>Hero Home Section</h1>

                            <form class="custom-validation" action="{{ route('heroSection.update') }}" method="POST">

                                @csrf

                                {{-- Title --}}
                                <div class="mb-3">
                                    <label class="form-label">Title :</label>
                                    <input type="text" name="title" value="{{ old('title', $heroes->title ?? '') }}"
                                        class="form-control @error('title') is-invalid @enderror"
                                        placeholder="Type something" />
                                    @error('title')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- Highlighted Word --}}
                                <div class="mb-3">
                                    <label class="form-label">Highlighted Word :</label>
                                    <input type="text" name="highlighted_word"
                                        value="{{ old('highlighted_word', $heroes->highlighted_word ?? '') }}"
                                        class="form-control @error('highlighted_word') is-invalid @enderror"
                                        placeholder="Type something" />
                                    @error('highlighted_word')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- Subheading --}}
                                <div class="mb-3">
                                    <label class="form-label">Subheading :</label>
                                    <input type="text" name="subheading"
                                        value="{{ old('subheading', $heroes->subheading ?? '') }}"
                                        class="form-control @error('subheading') is-invalid @enderror"
                                        placeholder="Enter a valid subheading" />
                                    @error('subheading')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="d-flex flex-wrap gap-2">
                                    <button type="submit" class="btn btn-primary waves-effect waves-light">
                                        Submit
                                    </button>
                                    <button type="reset" class="btn btn-secondary waves-effect">
                                        Cancel
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
