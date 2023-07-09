@include('includes.mainHeader')
<?php 
$eventSection = $sections->where('type', 'event')->first();

?>

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

<section class="section">
    <div class="container mt-100 mt-60">
        <div class="row align-items-end mb-4 pb-4">
            <div class="col-md-8">
                <div class="section-title text-center text-md-start">
                    <h6 class="text-primary">Our Events</h6>
                    <h4 class="title mb-4">What we do ?</h4>
                    <p class="text-muted mb-0 para-desc">Bringing Creatives Together</p>
                </div>
            </div><!--end col-->
        </div><!--end row-->

        <div class="row">
            <div class="col-md-4 mt-4 pt-2">
                <ul class="nav nav-pills nav-justified flex-column rounded shadow p-3 mb-0 sticky-bar" id="pills-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link rounded active" id="webdeveloping" data-bs-toggle="pill" href="#developing" role="tab" aria-controls="developing" aria-selected="false">
                            <div class="text-center py-1">
                                <h6 class="mb-0">Web Developing</h6>
                            </div>
                        </a><!--end nav link-->
                    </li><!--end nav item-->
                    
                    <li class="nav-item mt-2">
                        <a class="nav-link rounded" id="database" data-bs-toggle="pill" href="#data-analise" role="tab" aria-controls="data-analise" aria-selected="false">
                            <div class="text-center py-1">
                                <h6 class="mb-0">Database Analysis</h6>
                            </div>
                        </a><!--end nav link-->
                    </li><!--end nav item-->
                    
                    <li class="nav-item mt-2">
                        <a class="nav-link rounded" id="server" data-bs-toggle="pill" href="#security" role="tab" aria-controls="security" aria-selected="false">
                            <div class="text-center py-1">
                                <h6 class="mb-0">Server Security</h6>
                            </div>
                        </a><!--end nav link-->
                    </li><!--end nav item-->
                    
                    <li class="nav-item mt-2">
                        <a class="nav-link rounded" id="webdesigning" data-bs-toggle="pill" href="#designing" role="tab" aria-controls="designing" aria-selected="false">
                            <div class="text-center py-1">
                                <h6 class="mb-0">Web Designing</h6>
                            </div>
                        </a><!--end nav link-->
                    </li><!--end nav item-->
                </ul><!--end nav pills-->
            </div><!--end col-->

            <div class="col-md-8 col-12 mt-4 pt-2">
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active p-4 rounded shadow" id="developing" role="tabpanel" aria-labelledby="webdeveloping">
                        <img src="landing_assets/images/work/7.jpg" class="img-fluid rounded shadow" alt="">
                        <div class="mt-4">
                            <p class="text-muted">This is required when, for example, the final text is not yet available. Dummy text is also known as 'fill text'. It is said that song composers of the past used dummy texts as lyrics.</p>
                            <a href="javascript:void(0)" class="text-primary">See More <i class="uil uil-angle-right-b align-middle"></i></a>
                        </div>
                    </div><!--end teb pane-->
                    
                    <div class="tab-pane fade p-4 rounded shadow" id="data-analise" role="tabpanel" aria-labelledby="database">
                        <img src="landing_assets/images/work/8.jpg" class="img-fluid rounded shadow" alt="">
                        <div class="mt-4">
                            <p class="text-muted">This is required when, for example, the final text is not yet available. Dummy text is also known as 'fill text'. It is said that song composers of the past used dummy texts as lyrics.</p>
                            <a href="javascript:void(0)" class="text-primary">See More <i class="uil uil-angle-right-b align-middle"></i></a>
                        </div>
                    </div><!--end teb pane-->

                    <div class="tab-pane fade p-4 rounded shadow" id="security" role="tabpanel" aria-labelledby="server">
                        <img src="landing_assets/images/work/9.jpg" class="img-fluid rounded shadow" alt="">
                        <div class="mt-4">
                            <p class="text-muted">This is required when, for example, the final text is not yet available. Dummy text is also known as 'fill text'. It is said that song composers of the past used dummy texts as lyrics.</p>
                            <a href="javascript:void(0)" class="text-primary">See More <i class="uil uil-angle-right-b align-middle"></i></a>
                        </div>
                    </div><!--end teb pane-->
                    
                    <div class="tab-pane fade p-4 rounded shadow" id="designing" role="tabpanel" aria-labelledby="webdesigning">
                        <img src="landing_assets/images/work/12.jpg" class="img-fluid rounded shadow" alt="">
                        <div class="mt-4">
                            <p class="text-muted">This is required when, for example, the final text is not yet available. Dummy text is also known as 'fill text'. It is said that song composers of the past used dummy texts as lyrics.</p>
                            <a href="javascript:void(0)" class="text-primary">See More <i class="uil uil-angle-right-b align-middle"></i></a>
                        </div>
                    </div><!--end teb pane-->
                </div><!--end tab content-->
            </div><!--end col-->
        </div><!--end row-->
    </div><!--end container-->

    <div class="container-fluid mt-100 mt-60">
        <div class="bg-cta shadow rounded card overflow-hidden" style="background: url('landing_assets/images/2.jpg') center center;" id="cta">
            <div class="bg-overlay"></div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 text-center">
                        <div class="section-title">
                            <h4 class="title title-dark text-white mb-4">We Are Creative Dreamers and Innovators</h4>
                            <p class="text-white-50 para-dark para-desc mx-auto">Start working with Landrick that can provide everything you need to generate awareness, drive traffic, connect.</p>
                            <a href="#!" data-type="youtube" data-id="yba7hPeTSjk" class="play-btn  mt-4 lightbox">
                                <i data-feather="play" class="fea icon-ex-md text-white title-dark"></i>
                            </a>
                        </div>
                    </div><!--end col-->
                </div><!--end row-->
            </div><!--end container-->
        </div>
    </div><!--end container-->
</section><!--end section-->
<!-- End -->




@include('includes.mainFooter')