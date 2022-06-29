<div class="container-fluid bg-dark text-body footer pt-5 px-0 wow fadeIn" data-wow-delay="0.1s">
    <div class="container py-5">
        <div class="row g-5">
            <div class="col-lg-4 col-md-6">
                <h3 class="text-light mb-4">Address</h3>
                <p class="mb-2">{!! $userSiteInfos->address !!}</p>
                <p class="mb-2"><i class="fa fa-phone-alt text-primary me-3"></i>{{ $userSiteInfos->mobile }}</p>
                <p class="mb-2"><i class="fa fa-envelope text-primary me-3"></i>{{ $userSiteInfos->email }}</p>
                <div class="d-flex pt-2">
                    <a class="btn btn-square btn-outline-body me-1" href="{{ $userSiteInfos->facebook_link }}"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-square btn-outline-body me-1" href="{{ $userSiteInfos->twitter_link }}"><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-square btn-outline-body me-1" href="{{ $userSiteInfos->linkedin_link }}"><i class="fab fa-linkedin-in"></i></a>
                    <a class="btn btn-square btn-outline-body me-0" href="{{ $userSiteInfos->instagram_link }}"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <h3 class="text-light mb-4">Services</h3>
                @foreach ($userServices as $key => $userService)
                <a class="btn btn-link" href="#services">{{ $userService->title }}</a>
                @endforeach
            </div>
            <div class="col-lg-4 col-md-6">
                <h3 class="text-light mb-4">Quick Links</h3>
                <a class="btn btn-link" href="#services">Services</a>
                <a class="btn btn-link" href="#facilities">Facilities & Equipments</a>
                <a class="btn btn-link" href="#trainers">Trainers & Experts</a>
                <a class="btn btn-link" href="#about">About</a>
                <a class="btn btn-link" href="{{ route('login') }}">Join Us</a>
            </div>
        </div>
    </div>
    <div class="container-fluid copyright">
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                    {!! $userSiteInfos->footer !!}
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                    Designed By <a href="#">AW01-A</a>
                    <br> Created By: <a class="border-bottom" href="#" target="_blank">HamogSquads</a>
                </div>
            </div>
        </div>
    </div>
</div>