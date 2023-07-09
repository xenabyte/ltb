@include('includes.mainHeader')
<?php
if(!empty($sections)){
$youtubeSection = $sections->where('type', 'youtube')->first();
$eventSection = $sections->where('type', 'event')->first();
}
?>
<!-- Hero Start -->
<section class="bg-half-170 d-table w-100" style="background: url({{asset($pageGlobalData->setting->banner)}}) top;">
    <div class="bg-overlay"></div>
    <div class="container">
        <div class="row mt-5 justify-content-center">
            <div class="col-lg-12 text-center">
                <div class="pages-heading title-heading">
                    <h2 class="text-white title-dark"> Our Events </h2>
                    <p class="text-white-50 para-desc mb-0 mx-auto"></p>
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
                    <h4 class="title mb-4">{{ $eventSection->title }}</h4>
                </div>
            </div><!--end col-->
        </div><!--end row-->

        <div class="row">
            <div class="col-md-4 mt-4 pt-2">
                <ul class="nav nav-pills nav-justified flex-column rounded shadow p-3 mb-0 sticky-bar" id="pills-tab" role="tablist">
                    @foreach($events as $event)
                    <li class="nav-item">
                        <a class="nav-link rounded {{$loop->iteration == 1 ?'active':'' }}" id="{{$event->slug.$loop->iteration}}" data-bs-toggle="pill" href="#{{$event->slug}}" role="tab" aria-controls="{{$event->slug}}" aria-selected="false">
                            <div class="text-center py-1">
                                <h6 class="mb-0">{{ $event->title }}</h6>
                            </div>
                        </a><!--end nav link-->
                    </li><!--end nav item-->
                    @endforeach
                </ul><!--end nav pills-->
            </div><!--end col-->

            <div class="col-md-8 col-12 mt-4 pt-2">
                <div class="tab-content" id="pills-tabContent">
                    @foreach($events as $event)
                    <div class="tab-pane fade show {{$loop->iteration == 1 ?'active':'' }} p-4 rounded shadow" id="{{$event->slug}}" role="tabpanel" aria-labelledby="{{$event->slug}}">
                        <img src="{{asset($event->image)}}" class="img-fluid rounded shadow" alt="">
                        <div class="mt-4">
                            <p class="text-muted">{{ $event->description }}</p>
                            <a href="{{ url('/event-details/'.$event->slug)  }}" class="text-primary">See More <i class="uil uil-angle-right-b align-middle"></i></a>
                        </div>
                    </div><!--end teb pane-->
                    @endforeach
                </div><!--end tab content-->
            </div><!--end col-->
        </div><!--end row-->
    </div><!--end container-->

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
</section><!--end section-->
<!-- End -->




@include('includes.mainFooter')