@include('includes.mainHeader')

<!-- Hero Start -->
<section class="bg-half-170 d-table w-100" style="background: url({{asset($pageGlobalData->setting->banner)}}) top;">
    <div class="bg-overlay"></div>
    <div class="container">
        <div class="row mt-5 justify-content-center">
            <div class="col-lg-12 text-center">
                <div class="pages-heading title-heading">
                    <h2 class="text-white title-dark"> About us </h2>
                    <p class="text-white-50 para-desc mb-0 mx-auto">Start working with Landrick that can provide everything you need to generate awareness, drive traffic, connect.</p>
                </div>
            </div><!--end col-->
        </div><!--end row--> 

        <div class="position-breadcrumb">
            <nav aria-label="breadcrumb" class="d-inline-block">
                <ul class="breadcrumb rounded shadow mb-0 px-4 py-2">
                    <li class="breadcrumb-item"><a href="{{('/')}}">Leave the Box</a></li>
                    <li class="breadcrumb-item active" aria-current="page">About Us</li>
                </ul>
            </nav>
        </div>
    </div> <!--end container-->
</section><!--end section-->
<div class="position-relative">
    <div class="shape overflow-hidden text-color-white">
        <svg viewBox="0 0 2880 48" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M0 48H1437.5H2880V0H2160C1442.5 52 720 0 720 0H0V48Z" fill="currentColor"></path>
        </svg>
    </div>
</div>
<!-- Hero End -->

<!-- Start -->
<section class="section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-5 col-md-6">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-6 mt-4 mt-lg-0 pt-2 pt-lg-0">
                        <div class="card work-container work-primary work-modern overflow-hidden rounded border-0 shadow-md">
                            <div class="card-body p-0">
                                <img src="landing_assets/images/course/online/ab01.jpg" class="img-fluid" alt="work-image">
                                <div class="overlay-work"></div>
                               
                            </div>
                        </div>
                    </div><!--end col-->

                    <div class="col-lg-6 col-6">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 mt-4 mt-lg-0 pt-2 pt-lg-0">
                                <div class="card work-container work-primary work-modern overflow-hidden rounded border-0 shadow-md">
                                    <div class="card-body p-0">
                                        <img src="landing_assets/images/course/online/ab02.jpg" class="img-fluid" alt="work-image">
                                        <div class="overlay-work"></div>
                                       
                                    </div>
                                </div>
                            </div><!--end col-->

                            <div class="col-lg-12 col-md-12 mt-4 pt-2">
                                <div class="card work-container work-primary work-modern overflow-hidden rounded border-0 shadow-md">
                                    <div class="card-body p-0">
                                        <img src="landing_assets/images/course/online/ab03.jpg" class="img-fluid" alt="work-image">
                                        <div class="overlay-work"></div>
                                        
                                    </div>
                                </div>
                            </div><!--end col-->
                        </div><!--end row-->
                    </div><!--end col-->
                </div><!--end row-->
            </div><!--end col-->

            <div class="col-lg-7 col-md-6 mt-4 mt-lg-0 pt-2 pt-lg-0">
                <div class="ms-lg-4">
                    <div class="section-title">
                        <span class="badge bg-soft-primary rounded-pill fw-bold">About us</span>
                        <h4 class="title mb-4 mt-3">We design and develop <br> world-class web applications.</h4>
                        <p class="text-muted para-desc">Start working with <span class="text-primary fw-bold">Landrick</span> that can provide everything you need to generate awareness, drive traffic, connect. The most well-known dummy text is the 'Lorem Ipsum', which is said to have originated in the 16th century.</p>
                    </div>

                </div>
            </div>
        </div><!--end row-->
    </div><!--end container-->
</section><!--end section-->
<!-- End -->

<!-- Start -->
<section class="section pt-0">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 text-center">
                <div class="video-solution-cta position-relative" style="z-index: 1;">
                    <div class="position-relative">
                        <img src="landing_assets/images/cta-bg.jpg" class="img-fluid rounded-md shadow-lg" alt="">
                        <div class="play-icon">
                            <a href="#!" data-type="youtube" data-id="yba7hPeTSjk" class="play-btn lightbox border-0">
                                <i class="mdi mdi-play text-primary rounded-circle shadow-lg"></i>
                            </a>
                        </div>
                    </div>
                    <div class="content mt-md-4 pt-md-2">
                        <div class="row justify-content-center">
                            <div class="col-lg-10 text-center">
                                <div class="row align-items-center">
                                    <div class="col-md-6 mt-4 pt-2">
                                        <div class="section-title text-md-start">
                                            <h6 class="text-white-50">Team</h6>
                                            <h4 class="title text-white title-dark mb-0">Meet Experience <br> Team Member</h4>
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-12 mt-4 pt-md-2">
                                        <div class="section-title text-md-start">
                                            <p class="text-white-50 para-desc">Start working with Landrick that can provide everything you need to generate awareness, drive traffic, connect.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--end col-->
        </div><!--end row -->
        <div class="feature-posts-placeholder bg-primary bg-gradient"></div>
    </div><!--end container-->
</section><!--end section-->
<!-- End -->

@include('includes.mainFooter')