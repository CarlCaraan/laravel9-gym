@extends('admin.admin_master')

@section('title') Edit About | Respond Fitness @endsection

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Bread crumb and right sidebar toggle -->
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">Edit About</h4>
            <div class="ml-auto text-right">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit About</li>
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
                        <form class="form-horizontal" method="POST" action="{{ route('user.about.update', $editData->id) }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label for="" class="col-sm-3 text-right control-label col-form-label">About Image</label>
                                <div class="col-md-9 text-left">
                                    <img class="img-thumbnail mb-3" style="width: 400px; height: 400px;" src="{{ (!empty($editData->image)) ? url('upload/user_siteinfo/about/'.$editData->image) : url('upload/user_siteinfo/about/default_photo.png') }}" id="show_image" alt="image">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="image" class="col-sm-3 text-right control-label col-form-label"></label>
                                <div class="col-md-9">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="image" id="image">
                                        <label class="custom-file-label" for="image">Choose file...</label>
                                    </div>
                                    @error('image')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <!-- Remove Image -->
                            <div class="form-group row">
                                <label for="image" class="col-sm-3 text-right control-label col-form-label"></label>
                                <div class="col-md-9">
                                    <a href="{{ route('user.about.remove_image') }}" class="btn btn-secondary">Remove</a>
                                </div>
                            </div>
                            <hr />
                            <br />

                            <div class="form-group row">
                                <label for="" class="col-sm-3 text-right control-label col-form-label">About Background</label>
                                <div class="col-md-9 text-left">
                                    <img class="img-thumbnail mb-3" style="width: 400px; height: 400px;" src="{{ (!empty($editData->background)) ? url('upload/user_siteinfo/about/'.$editData->background) : url('upload/user_siteinfo/about/default_photo.png') }}" id="show_image2" alt="background">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="image" class="col-sm-3 text-right control-label col-form-label"></label>
                                <div class="col-md-9">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="background" id="image2">
                                        <label class="custom-file-label" for="background">Choose file...</label>
                                    </div>
                                    @error('background')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <!-- Remove Image -->
                            <div class="form-group row">
                                <label for="image" class="col-sm-3 text-right control-label col-form-label"></label>
                                <div class="col-md-9">
                                    <a href="{{ route('user.about.remove_background') }}" class="btn btn-secondary">Remove</a>
                                </div>
                            </div>
                            <hr />
                            <br />

                            <div class="form-group row">
                                <label for="title" class="col-sm-3 text-right control-label col-form-label">About Title</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="title" id="title" placeholder="Title" value="{{ $editData->title }}">
                                    @error('title')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="body" class="col-sm-3 text-right control-label col-form-label">About Body</label>
                                <div class="col-sm-9">
                                    <input id="terms" type="hidden" class="form-control" name="body" id="body" placeholder="Short description" value="{{ $editData->body }}">
                                    <trix-editor input="terms"></trix-editor>
                                    @error('body')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="border-top">
                                <div class="card-body">
                                    <button type="submit" class="btn btn-primary">Update About</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div> <!-- End Card -->
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