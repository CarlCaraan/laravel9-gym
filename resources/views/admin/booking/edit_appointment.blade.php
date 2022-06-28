@extends('admin.admin_master')

@section('title') Edit Appointment | Respond Fitness @endsection

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Bread crumb and right sidebar toggle -->
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">Edit Appointment</h4>
            <div class="ml-auto text-right">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Appointment</li>
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
                        <form class="form-horizontal" method="POST" action="{{ route('all.appointment.update',$editData->id) }}">
                            @csrf
                            <div class="form-group row">
                                <label for="status" class="col-sm-3 text-right control-label col-form-label pt-4">Customer Info</label>
                                <div class="form-group col-9">
                                    <div class="border py-2 px-2 shadow-sm">
                                        <img src="{{ (!empty($editData['user']['profile_photo_path'])) ? url('upload/user_images/'.$editData['user']['profile_photo_path']) : asset('admin/assets/images/users/default_photo.jpg') }}" alt="user" class="img-fluid img-thumbnail shadow-sm" width="50px" height="50px">
                                        <span class="ml-2">
                                            <strong>Full Name:</strong> {{ $editData['user']['first_name'] }}
                                            {{ $editData['user']['last_name'] }}
                                            / <strong>Email:</strong> {{ $editData['user']['email'] }}
                                            / <strong>Gender:</strong> {{ $editData['user']['gender'] }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="status" class="col-sm-3 text-right control-label col-form-label">Paid Status</label>
                                <div class="col-sm-9">
                                    <select class="select2 form-control custom-select" style="width: 100%; height:36px;" name="status">
                                        <option disabled value="" selected>Select Status</option>
                                        <optgroup label="Choose status">
                                            <option value="Paid" {{ ($editData->status == "Paid") ? "selected" : ""}}>Paid</option>
                                            <option value="Not Paid" {{ ($editData->status == "Not Paid") ? "selected" : ""}}>Not Paid</option>
                                        </optgroup>
                                    </select>
                                    @error('status')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="start_date" class="col-sm-3 text-right control-label col-form-label">Start Time</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="start_date" id="flatpickr" placeholder="YYYY-mm-dd H:m:s" value="{{ $editData->start_date }}">
                                    @error('start_date')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="status" class="col-sm-3 text-right control-label col-form-label">Pricing</label>
                                <div class="col-sm-9">
                                    <select class="select2 form-control custom-select" style="width: 100%; height:36px;" name="price">
                                        <option disabled value="" selected>Select No. Hours</option>
                                        <optgroup label="Choose price">
                                            <option value="2hrs - ₱40" {{ ($editData->price == "2hrs - ₱40") ? "selected" : ""}}>2 hrs (₱40)</option>
                                            <option value="3hrs - ₱50" {{ ($editData->price == "3hrs - ₱50") ? "selected" : ""}}>3 hrs (₱50)</option>
                                            <option value="4hrs - ₱60" {{ ($editData->price == "4hrs - ₱60") ? "selected" : ""}}>4 hrs (₱60)</option>
                                        </optgroup>
                                    </select>
                                    @error('price')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                            </div>

                            <div class="border-top">
                                <div class="card-body">
                                    <button type="submit" class="btn btn-primary">Update Appointment</button>
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
    flatpickr('#flatpickr', {
        enableTime: true,
        enableSeconds: true
    })
</script>
@endsection