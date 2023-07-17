@include('includes.mainHeader')
<?php
if(!empty($sections)){
$aboutSection = $sections->where('type', 'about')->first();
$youtubeSection = $sections->where('type', 'youtube')->first();
}
?>

<!-- Hero Start -->
<section class="bg-half-170 d-table w-100" style="background: url({{asset($pageGlobalData->setting->banner)}}) top;">
    <div class="bg-overlay"></div>
    <div class="container">
        <div class="row mt-5 justify-content-center">
            <div class="col-lg-12 text-center">
                <div class="pages-heading title-heading">
                    <h2 class="text-white title-dark"> About us </h2>
                    <p class="text-white-50 para-desc mb-0 mx-auto">Leave The Box Africa</p>
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

@if(!empty($aboutSection))
<!-- Start -->
<section class="section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-5 col-md-5 mt-4 pt-2 mt-sm-0 pt-sm-0">
                <div class="position-relative">
                    <img src="{{asset($aboutSection->image)}}" class="img-fluid mx-auto" alt="">
                </div>
            </div><!--end col-->

            <div class="col-lg-7 col-md-6 mt-4 mt-lg-0 pt-2 pt-lg-0">
                <div class="ms-lg-4">
                    <div class="section-title">
                        <span class="badge bg-soft-primary rounded-pill fw-bold">About us</span>
                        <h4 class="title mb-4">{{ $aboutSection->title }}</h4>
                    <p class="text-muted">{!! $aboutSection->description !!}</p>
                    </div>

                </div>
            </div>
        </div><!--end row-->
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
                        <a href="#" data-type="youtube" data-id="{{$youtubeSection->link}}" class="play-btn  mt-4 lightbox">
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

@include('includes.mainFooter')