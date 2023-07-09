@include('includes.mainHeader')
<?php
if(!empty($sections)){
$aboutSection = $sections->where('type', 'about')->first();
$youtubeSection = $sections->where('type', 'youtube')->first();
$teamSection = $sections->where('type', 'team')->first();
}
?>
<section class="swiper-slider-hero position-relative d-block vh-100" id="home">
    <div class="swiper-container">
        <div class="swiper-wrapper">
            @foreach($sliders as $slider)
            <div class="swiper-slide d-flex align-items-center overflow-hidden">
                <div class="slide-inner slide-bg-image d-flex align-items-center" style="background: center center;" data-background="{{asset($slider->image)}}">
                    <div class="bg-overlay"></div>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-12">
                                <div class="title-heading text-center">
                                    <h1 class="display-5 text-white title-dark fw-bold mb-4">{{ $slider->title }}</h1>
                                    <p class="para-desc mx-auto text-white-50">{{ strip_tags($slider->description) }}</p>
                                    
                                    <div class="mt-4 pt-2">
                                        <a href="{{ $slider->button_link }}" class="btn btn-primary">
                                            {{ $slider->button_text }}
                                        </a>
                                    </div>
                                </div>
                            </div><!--end col-->
                        </div><!--end row-->
                    </div><!--end container-->
                </div><!-- end slide-inner --> 
            </div> <!-- end swiper-slide -->
            @endforeach
        </div>
        <!-- end swiper-wrapper -->
        <!-- swipper controls -->
        <!-- <div class="swiper-pagination"></div> -->
        <div class="swiper-button-next rounded-circle text-center"></div>
        <div class="swiper-button-prev rounded-circle text-center"></div>
    </div><!--end container-->
</section><!--end section-->
<!-- Hero End -->

@if(!empty($aboutSection))
<!-- FEATURES START -->
<section class="section bg-light">

    <div class="container mt-100 mt-60">
        <div class="row align-items-center">
            <div class="col-lg-5 col-md-5 mt-4 pt-2 mt-sm-0 pt-sm-0">
                <div class="position-relative">
                    <img src="{{asset($aboutSection->image)}}" class="img-fluid mx-auto" alt="">
                </div>
            </div><!--end col-->

            <div class="col-lg-7 col-md-7 mt-4 pt-2 mt-sm-0 pt-sm-0">
                <div class="section-title ms-lg-4">
                    <h4 class="title mb-4">{{ $aboutSection->title }}</h4>
                    <p class="text-muted">{!! Illuminate\Support\Str::limit($aboutSection->description, 500) !!}</p>
                    <a href="{{ url('about-us') }}" class="btn btn-primary mt-3">Read More <i class="mdi mdi-chevron-right align-middle"></i></a>
                </div>
            </div><!--end col-->
        </div><!--end row-->
    </div><!--end container-->
</section><!--end section-->
@endif

@if(!empty($teamSection))
<section class="section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 text-center">
                <div class="section-title mb-4 pb-2">
                    <h4 class="title mb-4">{{ $teamSection->title }}</h4>
                    <p class="text-muted para-desc mx-auto mb-0"></p>
                </div>
            </div><!--end col-->
        </div><!--end row-->

    </div><!--end container-->
</section><!--end section-->
<!-- Start -->
<section class="section pt-0">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 text-center">
                <div class="video-solution-cta position-relative" style="z-index: 1;">
                    <div class="position-relative">
                        <img src="{{asset($teamSection->image)}}" class="img-fluid rounded-md shadow-lg" alt="">
                        @if(!empty($teamSection->link))
                        <div class="play-icon">
                            <a href="{{ $teamSection->link }}" data-type="youtube" data-id="yba7hPeTSjk" class="play-btn lightbox border-0">
                                <i class="mdi mdi-play text-primary rounded-circle shadow-lg"></i>
                            </a>
                        </div>
                        @endif
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
                                            <p class="text-white-50 para-desc">{!! $teamSection->description !!}</p>
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
@endif

@if(!empty($youtubeSection))
<div class="container-fluid mt-100 mt-60">
    <div class="bg-cta shadow rounded card overflow-hidden" style="background: url({{asset($youtubeSection->image)}}) center center;" id="cta">
        <div class="bg-overlay"></div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 text-center">
                    <div class="section-title">
                        <br>
                        <h4 class="title title-dark text-white mb-4">{{$youtubeSection->title}}</h4>
                        <p class="text-white-50 para-dark para-desc mx-auto">{!! $youtubeSection->description !!}</p>
                        <br>
                        @if(!empty($youtubeSection->link))
                        <a href="{{$youtubeSection->link}}" data-type="youtube" data-id="yba7hPeTSjk" class="play-btn  mt-4 lightbox">
                            <i data-feather="play" class="fea icon-ex-md text-white title-dark"></i>
                        </a>
                        @endif
                    </div>
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end container-->
    </div>
</div><!--end container-->
@endif

<section class="section">
    @if(!empty($testimonialSection))
    <div class="container mt-100 mt-60">
        <div class="row justify-content-center">
            <div class="col-12 text-center">
                <div class="section-title mb-4 pb-2">
                    <h4 class="title mb-4">Our Clients Said</h4>
                    <p class="text-muted para-desc mx-auto mb-0">Start working with <span class="text-primary fw-bold">Landrick</span> that can provide everything you need to generate awareness, drive traffic, connect.</p>
                </div>
            </div><!--end col-->
        </div><!--end row-->
        

        <div class="row justify-content-center">
            <div class="col-lg-12 mt-4">
                <div class="tiny-three-item">
                    <div class="tiny-slide">
                        <div class="d-flex client-testi m-2">
                        <img src="landing_assets/images/client/01.jpg" class="avatar avatar-small client-image rounded shadow" alt="">
                            <div class="card flex-1 content p-3 shadow rounded position-relative">
                                <ul class="list-unstyled mb-0">
                                    <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                    <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                    <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                    <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                    <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                </ul>
                                <p class="text-muted mt-2">" It seems that only fragments of the original text remain in the Lorem Ipsum texts used today. "</p>
                                <h6 class="text-primary">- Thomas Israel <small class="text-muted">C.E.O</small></h6>
                            </div>
                        </div>
                    </div>
                    
                    <div class="tiny-slide">
                        <div class="d-flex client-testi m-2">
                        <img src="landing_assets/images/client/02.jpg" class="avatar avatar-small client-image rounded shadow" alt="">
                            <div class="card flex-1 content p-3 shadow rounded position-relative">
                                <ul class="list-unstyled mb-0">
                                    <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                    <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                    <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                    <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                    <li class="list-inline-item"><i class="mdi mdi-star-half text-warning"></i></li>
                                </ul>
                                <p class="text-muted mt-2">" One disadvantage of Lorum Ipsum is that in Latin certain letters appear more frequently than others. "</p>
                                <h6 class="text-primary">- Barbara McIntosh <small class="text-muted">M.D</small></h6>
                            </div>
                        </div>
                    </div>

                    <div class="tiny-slide">
                        <div class="d-flex client-testi m-2">
                        <img src="landing_assets/images/client/03.jpg" class="avatar avatar-small client-image rounded shadow" alt="">
                            <div class="card flex-1 content p-3 shadow rounded position-relative">
                                <ul class="list-unstyled mb-0">
                                    <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                    <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                    <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                    <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                    <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                </ul>
                                <p class="text-muted mt-2">" The most well-known dummy text is the 'Lorem Ipsum', which is said to have originated in the 16th century. "</p>
                                <h6 class="text-primary">- Carl Oliver <small class="text-muted">P.A</small></h6>
                            </div>
                        </div>
                    </div>

                    <div class="tiny-slide">
                        <div class="d-flex client-testi m-2">
                        <img src="landing_assets/images/client/04.jpg" class="avatar avatar-small client-image rounded shadow" alt="">
                            <div class="card flex-1 content p-3 shadow rounded position-relative">
                                <ul class="list-unstyled mb-0">
                                    <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                    <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                    <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                    <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                    <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                </ul>
                                <p class="text-muted mt-2">" According to most sources, Lorum Ipsum can be traced back to a text composed by Cicero. "</p>
                                <h6 class="text-primary">- Christa Smith <small class="text-muted">Manager</small></h6>
                            </div>
                        </div>
                    </div>

                    <div class="tiny-slide">
                        <div class="d-flex client-testi m-2">
                        <img src="landing_assets/images/client/05.jpg" class="avatar avatar-small client-image rounded shadow" alt="">
                            <div class="card flex-1 content p-3 shadow rounded position-relative">
                                <ul class="list-unstyled mb-0">
                                    <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                    <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                    <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                    <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                    <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                </ul>
                                <p class="text-muted mt-2">" There is now an abundance of readable dummy texts. These are usually used when a text is required. "</p>
                                <h6 class="text-primary">- Dean Tolle <small class="text-muted">Developer</small></h6>
                            </div>
                        </div>
                    </div>

                    <div class="tiny-slide">
                        <div class="d-flex client-testi m-2">
                        <img src="landing_assets/images/client/06.jpg" class="avatar avatar-small client-image rounded shadow" alt="">
                            <div class="card flex-1 content p-3 shadow rounded position-relative">
                                <ul class="list-unstyled mb-0">
                                    <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                    <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                    <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                    <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                    <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                </ul>
                                <p class="text-muted mt-2">" Thus, Lorem Ipsum has only limited suitability as a visual filler for German texts. "</p>
                                <h6 class="text-primary">- Jill Webb <small class="text-muted">Designer</small></h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--end col-->
        </div><!--end row-->
    </div><!--end container-->
    @endif

    <div class="container mt-100 mt-60">
        <div class="row align-items-center mb-4 pb-2">
            <div class="col-lg-6">
                <div class="section-title text-center text-lg-start">
                    <h6 class="text-primary">Blog</h6>
                    <h4 class="title mb-4 mb-lg-0">Reads Our Latest <br> News & Blog</h4>
                </div>
            </div><!--end col-->

            <div class="col-lg-6">
                <div class="section-title text-center text-lg-start">
                    <p class="text-muted mb-0 mx-auto para-desc">Start working with <span class="text-primary fw-bold">Landrick</span> that can provide everything you need to generate awareness, drive traffic, connect.</p>
                </div>
            </div><!--end col-->
        </div><!--end row-->

        <div class="row">
            <div class="col-lg-4 col-md-6 mt-4 pt-2">
                <div class="card blog blog-primary rounded border-0 shadow">
                    <div class="position-relative">
                        <img src="landing_assets/images/blog/01.jpg" class="card-img-top rounded-top" alt="...">
                        <div class="overlay rounded-top"></div>
                    </div>
                    <div class="card-body content">
                        <h5><a href="javascript:void(0)" class="card-title title text-dark">Design your apps in your own way</a></h5>
                        <div class="post-meta d-flex justify-content-between mt-3">
                            <ul class="list-unstyled mb-0">
                                <li class="list-inline-item me-2 mb-0"><a href="javascript:void(0)" class="text-muted like"><i class="uil uil-heart me-1"></i>33</a></li>
                                <li class="list-inline-item"><a href="javascript:void(0)" class="text-muted comments"><i class="uil uil-comment me-1"></i>08</a></li>
                            </ul>
                            <a href="blog-detail.html" class="text-muted readmore">Read More <i class="uil uil-angle-right-b align-middle"></i></a>
                        </div>
                    </div>
                    <div class="author">
                        <small class="user d-block"><i class="uil uil-user"></i> Calvin Carlo</small>
                        <small class="date"><i class="uil uil-calendar-alt"></i> 25th June 2021</small>
                    </div>
                </div>
            </div><!--end col-->
            
            <div class="col-lg-4 col-md-6 mt-4 pt-2">
                <div class="card blog blog-primary rounded border-0 shadow">
                    <div class="position-relative">
                        <img src="landing_assets/images/blog/02.jpg" class="card-img-top rounded-top" alt="...">
                        <div class="overlay rounded-top"></div>
                    </div>
                    <div class="card-body content">
                        <h5><a href="javascript:void(0)" class="card-title title text-dark">How apps is changing the IT world</a></h5>
                        <div class="post-meta d-flex justify-content-between mt-3">
                            <ul class="list-unstyled mb-0">
                                <li class="list-inline-item me-2 mb-0"><a href="javascript:void(0)" class="text-muted like"><i class="uil uil-heart me-1"></i>33</a></li>
                                <li class="list-inline-item"><a href="javascript:void(0)" class="text-muted comments"><i class="uil uil-comment me-1"></i>08</a></li>
                            </ul>
                            <a href="blog-detail.html" class="text-muted readmore">Read More <i class="uil uil-angle-right-b align-middle"></i></a>
                        </div>
                    </div>
                    <div class="author">
                        <small class="user d-block"><i class="uil uil-user"></i> Calvin Carlo</small>
                        <small class="date"><i class="uil uil-calendar-alt"></i> 25th June 2021</small>
                    </div>
                </div>
            </div><!--end col-->
            
            <div class="col-lg-4 col-md-6 mt-4 pt-2">
                <div class="card blog blog-primary rounded border-0 shadow">
                    <div class="position-relative">
                        <img src="landing_assets/images/blog/03.jpg" class="card-img-top rounded-top" alt="...">
                        <div class="overlay rounded-top"></div>
                    </div>
                    <div class="card-body content">
                        <h5><a href="javascript:void(0)" class="card-title title text-dark">Smartest Applications for Business</a></h5>
                        <div class="post-meta d-flex justify-content-between mt-3">
                            <ul class="list-unstyled mb-0">
                                <li class="list-inline-item me-2 mb-0"><a href="javascript:void(0)" class="text-muted like"><i class="uil uil-heart me-1"></i>33</a></li>
                                <li class="list-inline-item"><a href="javascript:void(0)" class="text-muted comments"><i class="uil uil-comment me-1"></i>08</a></li>
                            </ul>
                            <a href="blog-detail.html" class="text-muted readmore">Read More <i class="uil uil-angle-right-b align-middle"></i></a>
                        </div>
                    </div>
                    <div class="author">
                        <small class="user d-block"><i class="uil uil-user"></i> Calvin Carlo</small>
                        <small class="date"><i class="uil uil-calendar-alt"></i> 25th June 2021</small>
                    </div>
                </div>
            </div><!--end col-->
        </div><!--end row-->
    </div><!--end container-->
</section><!--end section-->

@include('includes.mainFooter')