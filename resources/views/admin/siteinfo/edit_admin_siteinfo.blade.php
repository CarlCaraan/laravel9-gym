@extends('admin.admin_master')

@section('title') Edit Admin Site Info | Profile @endsection

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Bread crumb and right sidebar toggle -->
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">Edit Admin Site Info</h4>
            <div class="ml-auto text-right">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Admin Site Info</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- End Bread crumb and right sidebar toggle -->

<!-- Container fluid  -->
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="col-8">
                        <form class="form-horizontal" method="POST" action="{{ route('admin.siteinfo.update', $editData->id) }}" enctype="multipart/form-data">
                            @csrf
                            <!-- Header Brand -->
                            <div class="form-group row">
                                <label for="image" class="col-sm-3 text-right control-label col-form-label">Header Brand</label>
                                <div class="col-md-9 text-left">
                                    <img class="mb-3 img-fluid img-thumbnail" id="show_image" src="{{ (!empty($editData->admin_brand)) ? url('upload/admin_siteinfo/'.$editData->admin_brand) : url('upload/admin_siteinfo/default_photo.png') }}" alt="Admin Brand">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="image" class="col-sm-3 text-right control-label col-form-label"></label>
                                <div class="col-md-9">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="admin_brand" id="image">
                                        <label class="custom-file-label" for="image">Choose file...</label>
                                    </div>
                                    @error('admin_brand')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <!-- Remove Image -->
                            <div class="form-group row">
                                <label for="image" class="col-sm-3 text-right control-label col-form-label"></label>
                                <div class="col-md-9">
                                    <a href="{{ route('remove.admin_brand') }}" class="btn btn-secondary">Remove</a>
                                </div>
                            </div>
                            <hr />

                            <!-- Header Brand Mini -->
                            <div class="form-group row">
                                <label for="image" class="col-sm-3 text-right control-label col-form-label">Header Brand Mini</label>
                                <div class="col-md-9 text-left">
                                    <img class="mb-3 img-fluid img-thumbnail" id="show_image2" src="{{ (!empty($editData->admin_brand_mini)) ? url('upload/admin_siteinfo/'.$editData->admin_brand_mini) : url('upload/admin_siteinfo/default_photo2.png') }}" alt="Admin Brand">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="image" class="col-sm-3 text-right control-label col-form-label"></label>
                                <div class="col-md-9">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="admin_brand_mini" id="image2">
                                        <label class="custom-file-label" for="image">Choose file...</label>
                                    </div>
                                    @error('admin_brand_mini')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <!-- Remove Image -->
                            <div class="form-group row">
                                <label for="image" class="col-sm-3 text-right control-label col-form-label"></label>
                                <div class="col-md-9">
                                    <a href="{{ route('remove.admin_brand_mini') }}" class="btn btn-secondary">Remove</a>
                                </div>
                            </div>
                            <hr />

                            <div class="form-group row">
                                <label for="footer" class="col-sm-3 text-right control-label col-form-label">Footer Text</label>
                                <div class="col-sm-9">
                                    <input id="content" type="hidden" class="form-control" name="footer" id="footer" placeholder="Footer Text" value="{{ $editData->footer }}">
                                    <trix-editor input="content"></trix-editor>
                                    @error('footer')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="border-top">
                                <div class="card-body">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<br />

<script>
    // Show Chosen Image Ajax
    $(document).ready(function() {
        $('#image').change(function(e) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#show_image').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
    $(document).ready(function() {
        $('#image2').change(function(e) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#show_image2').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>
@endsection