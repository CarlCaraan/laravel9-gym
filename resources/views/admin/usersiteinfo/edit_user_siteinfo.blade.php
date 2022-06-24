@extends('admin.admin_master')

@section('title') Edit User Site Info | Profile @endsection

@section('content')
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
        <div class="col-8">
            <div class="card">
                <div class="card-body">
                    <form class="form-horizontal" method="POST" action="{{ route('user.siteinfo.update', $editData->id) }}" enctype="multipart/form-data">
                        @csrf
                        <h4 class="card-title">Navbar Mini</h4>
                        <div class="form-group row">
                            <label for="mobile" class="col-sm-3 text-right control-label col-form-label">Mobile</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="mobile" id="mobile" placeholder="Mobile" value="{{ $editData->mobile }}">
                                @error('mobile')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-sm-3 text-right control-label col-form-label">Email Address</label>
                            <div class="col-sm-9">
                                <input type="email" class="form-control" name="email" id="email" placeholder="Email Address" value="{{ $editData->email }}">
                                @error('email')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="facebook_link" class="col-sm-3 text-right control-label col-form-label">Facebook Link <i class="mdi mdi-facebook-box"></i></label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="facebook_link" id="facebook_link" placeholder="Facebook Link" value="{{ $editData->facebook_link }}">
                                @error('facebook_link')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="twitter_link" class="col-sm-3 text-right control-label col-form-label">Twitter Link <i class="mdi mdi-twitter-box"></i></label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="twitter_link" id="twitter_link" placeholder="Twitter Link" value="{{ $editData->twitter_link }}">
                                @error('twitter_link')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="linkedin_link" class="col-sm-3 text-right control-label col-form-label">Linkedin Link <i class="mdi mdi-linkedin-box"></i></label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="linkedin_link" id="linkedin_link" placeholder="Linkedin Link" value="{{ $editData->linkedin_link }}">
                                @error('linkedin_link')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="instagram_link" class="col-sm-3 text-right control-label col-form-label">Instagram Link <i class="mdi mdi-instagram"></i></label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="instagram_link" id="instagram_link" placeholder="Instagram Link" value="{{ $editData->instagram_link }}">
                                @error('instagram_link')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="terms" class="col-sm-3 text-right control-label col-form-label">Terms</label>
                            <div class="col-sm-9">
                                <input id="terms" type="hidden" class="form-control" name="terms" id="terms" placeholder="Terms" value="{{ $editData->terms }}">
                                <trix-editor input="terms"></trix-editor>
                                @error('terms')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="privacy" class="col-sm-3 text-right control-label col-form-label">Privacy</label>
                            <div class="col-sm-9">
                                <input id="privacy" type="hidden" class="form-control" name="privacy" id="privacy" placeholder="Privacy" value="{{ $editData->privacy }}">
                                <trix-editor input="privacy"></trix-editor>
                                @error('privacy')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <br />
                        <hr />
                        <h4 class="card-title">Footer Information</h4>
                        <div class="form-group row">
                            <label for="address" class="col-sm-3 text-right control-label col-form-label">Address</label>
                            <div class="col-sm-9">
                                <input id="address" type="hidden" class="form-control" name="address" id="address" placeholder="address" value="{{ $editData->address }}">
                                <trix-editor input="address"></trix-editor>
                                @error('address')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="footer" class="col-sm-3 text-right control-label col-form-label">Footer Text</label>
                            <div class="col-sm-9">
                                <input id="footer" type="hidden" class="form-control" name="footer" id="footer" placeholder="Footer Text" value="{{ $editData->footer }}">
                                <trix-editor input="footer"></trix-editor>
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
<br />
@endsection