@extends('admin.admin_master')

@section('title') Add Trainer | Respond Fitness @endsection

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Bread crumb and right sidebar toggle -->
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">Add Trainer</h4>
            <div class="ml-auto text-right">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Add Trainer</li>
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
                    <div class="col-6">
                        <form class="form-horizontal" method="POST" action="{{ route('user.trainers.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label for="" class="col-sm-3 text-right control-label col-form-label">Trainer Image</label>
                                <div class="col-md-9 text-left">
                                    <img class="img-thumbnail mb-3" style="width: 400px; height: 400px;" src="{{ url('upload/user_siteinfo/services/default_photo.png')}}" id="show_image" alt="User Avatar">
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
                            <hr />
                            <br />

                            <div class="form-group row">
                                <label for="name" class="col-sm-3 text-right control-label col-form-label">Trainer Name</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="name" id="name" placeholder="Name">
                                    @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="position" class="col-sm-3 text-right control-label col-form-label">Trainer Specialization</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="position" id="position" placeholder="Specialization">
                                    @error('position')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="facebook_link" class="col-sm-3 text-right control-label col-form-label">Facebook Link <i class="mdi mdi-facebook-box"></i></label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="facebook_link" id="facebook_link" placeholder="Facebook Link">
                                    @error('facebook_link')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="twitter_link" class="col-sm-3 text-right control-label col-form-label">Twitter Link <i class="mdi mdi-twitter-box"></i></label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="twitter_link" id="twitter_link" placeholder="Twitter Link">
                                    @error('twitter_link')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="instagram_link" class="col-sm-3 text-right control-label col-form-label">Instagram Link <i class="mdi mdi-linkedin-box"></i></label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="instagram_link" id="instagram_link" placeholder="Instagram Link">
                                    @error('instagram_link')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="border-top">
                                <div class="card-body">
                                    <button type="submit" class="btn btn-primary">Add Trainer</button>
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
</script>
@endsection