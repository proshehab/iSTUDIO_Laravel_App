@extends('admin.layouts.master')
@section('title', 'Admin- Dashboard')
@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <!-- end row -->
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Hero Home Section</h4>
                            <form class="custom-validation" action="#">

                                <div class="mb-3">
                                    <label class="form-label">Title :</label>
                                    <input type="text" class="form-control" required placeholder="Type something" />
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Highlighted Word :</label>
                                    <div>
                                        <input type="text" class="form-control" required
                                            placeholder="Enter a valid highlighted_word" />
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Subheading :</label>
                                    <div>
                                        <input type="text" class="form-control" required
                                            placeholder="Enter a valid subheading" />
                                    </div>
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
                </div> <!-- end col -->
            </div> <!-- end row -->
        </div>
    </div>
@endsection
