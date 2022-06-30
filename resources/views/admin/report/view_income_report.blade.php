@extends('admin.admin_master')

@section('title') View Income Report | Respond Fitness @endsection

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/handlebars.js/4.7.7/handlebars.min.js"></script>
<!-- Bread crumb and right sidebar toggle -->
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">View Income Report</h4>
            <div class="ml-auto text-right">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">View Income Report</li>
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
                    <div class="col-12">
                        <h4>Monthly / Yearly / Custom Income</h4>

                        <div class="form-group row">
                            <div class="form-group col-4">
                                <label for="start_date" class="control-label">Start Date</label>
                                <input type="date" class="form-control" name="start_date" id="start_date" placeholder="mm/dd/yyyy" required>
                            </div>
                            <div class="form-group col-4">
                                <label for="end_date" class="control-label">End Date</label>
                                <input type="date" class="form-control" name="end_date" id="end_date" placeholder="mm/dd/yyyy" required>
                            </div>
                            <div class="form-group col-4">
                                <button class="btn btn-primary" style="margin-top: 29px;" name="search" id="search">Search</button>
                            </div>
                        </div>


                        <!-- Start Roll Generate Table -->
                        <div class="row">
                            <div class="col-md-12">
                                <div id="DocumentResults">
                                    <!-- Start HandlebarsJS -->
                                    <script id="document-template" type="text/x-handlebars-template">
                                        <table class="table table-bordered table-stripped" style="width: 100%;">
                                                    <thead>
                                                        <tr>
                                                            @{{{thsource}}}
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            @{{{tdsource}}}
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </script>
                                    <!-- End HandlebarsJS -->
                                </div>
                            </div>
                        </div>
                        <!-- End Roll Generate Table -->

                    </div>
                </div>
            </div> <!-- End Card -->
        </div>
    </div>
</div>
<br />

<!-- Start Handlebars Get Data  -->
<script type="text/javascript">
    $(document).on('click', '#search', function() {
        var start_date = $('#start_date').val();
        var end_date = $('#end_date').val();
        $.ajax({
            url: "{{ route('income.report.datawise.get')}}",
            type: "get",
            data: {
                'start_date': start_date,
                'end_date': end_date
            },
            beforeSend: function() {},
            success: function(data) {
                var source = $("#document-template").html();
                var template = Handlebars.compile(source);
                var html = template(data);
                $('#DocumentResults').html(html);
                $('[data-toggle="tooltip"]').tooltip();
            }
        });
    });
</script>
<!-- End Handlebars Get Data  -->
@endsection