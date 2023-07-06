@include('includes.mainHeader')


<!-- Hero Start -->
<section class="bg-half-170 d-table w-100" style="background: url({{asset($pageGlobalData->setting->banner)}}) top;">
    <div class="bg-overlay"></div>
    <div class="container">
        <div class="row mt-5 justify-content-center">
            <div class="col-lg-12 text-center">
                <div class="pages-heading title-heading">
                    <h2 class="text-white title-dark"> Our Events </h2>
                    <p class="text-white-50 para-desc mb-0 mx-auto">Start working with Landrick that can provide everything you need to generate awareness, drive traffic, connect.</p>
                </div>
            </div><!--end col-->
        </div><!--end row--> 

        <div class="position-breadcrumb">
            <nav aria-label="breadcrumb" class="d-inline-block">
                <ul class="breadcrumb rounded shadow mb-0 px-4 py-2">
                    <li class="breadcrumb-item"><a href="{{('/')}}">Leave the Box</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Our Events</li>
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


<!-- Blog STart -->
<section class="section">
    <div class="container">
        <div class="row">
            <!-- BLog Start -->
            <div class="col-lg-8 col-md-6">
                <div class="me-lg-5">
                    
                    <img src="{{asset('landing_assets/images/blog/bg2.jpg')}}" class="img-fluid rounded-md shadow" alt="">
                    <ul class="list-unstyled d-flex justify-content-between mt-4">
                        <li class="list-inline-item user me-2"><a href="javascript:void(0)" class="text-muted"><i class="uil uil-user text-dark"></i> Calvin Carlo</a></li>
                        <li class="list-inline-item date text-muted"><i class="uil uil-calendar-alt text-dark"></i> 25th June 2021</li>
                    </ul>
                    <h5 class="mt-4">Mornings contain the secret to an extraordinarily successful life</h5>

                    <p class="text-muted">Due to its widespread use as filler text for layouts, non-readability is of great importance: human perception is tuned to recognize certain patterns and repetitions in texts. If the distribution of letters and 'words' is random, the reader will not be distracted from making a neutral judgement on the visual impact and readability of the typefaces (typography), or the distribution of text on the page (layout or type area).</p>

                </div>
            </div><!--end col-->
            <!-- BLog End -->

            <!-- START SIDEBAR -->
            <div class="col-lg-4 col-md-6 col-12 mt-4 mt-sm-0 pt-2 pt-sm-0">
                <div class="card border-0 sidebar sticky-bar rounded shadow">
                    <div class="card-body">

                        <!-- RECENT POST -->
                        <div class="widget mb-4 pb-2">
                            <h5 class="widget-title">Recent Post</h5>
                            <div class="mt-4">
                                <div class="d-flex align-items-center">
                                    <img src="{{asset('landing_assets/images/blog/01.jpg')}}" class="avatar avatar-small rounded" style="width: auto;" alt="">
                                    <div class="flex-1 ms-3">
                                        <a href="javascript:void(0)" class="d-block title text-dark">Consultant Business</a>
                                        <span class="text-muted">15th April 2021</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- RECENT POST -->
                        
                        <!-- SOCIAL -->
                        <div class="widget">
                            <h5 class="widget-title">Follow us</h5>
                            <ul class="list-unstyled social-icon social mb-0 mt-4">
                                <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i data-feather="facebook" class="fea icon-sm fea-social"></i></a></li>
                                <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i data-feather="instagram" class="fea icon-sm fea-social"></i></a></li>
                                <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i data-feather="twitter" class="fea icon-sm fea-social"></i></a></li>
                                <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i data-feather="linkedin" class="fea icon-sm fea-social"></i></a></li>
                                <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i data-feather="github" class="fea icon-sm fea-social"></i></a></li>
                                <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i data-feather="youtube" class="fea icon-sm fea-social"></i></a></li>
                                <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i data-feather="gitlab" class="fea icon-sm fea-social"></i></a></li>
                            </ul><!--end icon-->
                        </div>
                        <!-- SOCIAL -->
                    </div>
                </div>
            </div><!--end col-->
            <!-- END SIDEBAR -->
        </div><!--end row-->
    </div><!--end container-->
</section><!--end section-->

@include('includes.mainFooter')