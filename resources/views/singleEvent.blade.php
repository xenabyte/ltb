@include('includes.mainHeader')
<?php 
$speakers = $event->features->where('type','Speaker');
$team = $event->features->where('type','Team');
?>

<!-- Hero Start -->
<section class="bg-half-260 w-100 d-table jarallax" data-jarallax data-speed="0.5" style="background: url('{{asset($event->image)}}') center center;">
    <div class="bg-overlay bg-primary bg-gradient" style="opacity: 0.85;"></div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10 text-center">
                <div class="title-heading">
                    <h4 class="text-success mb-3">{{ date('F j, Y', strtotime($event->date)) }}</h4>
                    <h1 class="display-4 title-dark text-white fw-bold mb-3">{{ $event->title }}</h1>
                    <p class="para-desc title-dark mx-auto text-white-50">{{ strip_tags($event->description)}}</p>
                    
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <div id="eventdown">
                                <ul class="count-down list-unstyled">
                                    <li id="days" class="count-number list-inline-item px-4"></li>
                                    <li id="hours" class="count-number list-inline-item px-4"></li>
                                    <li id="mins" class="count-number list-inline-item px-4"></li>
                                    <li id="secs" class="count-number list-inline-item px-4"></li>
                                    <li id="end" class="h1"></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <a href="#schedules" class="btn btn-success mt-2 me-2"> Event Schedules</a>
                </div>
            </div><!--end col-->
        </div><!--end row-->
    </div><!--end container-->
</section><!--end section-->
<div class="position-relative">
    <div class="shape overflow-hidden">
        <div class="text-center p-4">
            <h5 class="mb-0 text-white title-dark">To be communicated</h5>
        </div>
    </div>
</div>
<!-- Hero End -->

<!-- About START -->
<section class="section border-top">
    <div class="container">
        <div class="card rounded shadow border-0 bg-light overflow-hidden">
            <div class="row g-0 align-items-center">
                <div class="col-lg-6">
                    <img src="{{asset($event->image)}}" class="img-fluid" alt="">
                </div><!--end col-->
                <div class="col-lg-6">
                    <div class="card-body section-title p-md-5">
                        <h4 class="title mb-4">{{$event->title}}</h4>
                        <p class="text-muted para-desc mb-0">{!! $event->about !!}</p>
                        
                    </div>
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end card-->
    </div><!--end container-->
</section><!--end section-->
<!-- About End -->

<!-- Shape Start -->
<div class="position-relative">
    <div class="shape overflow-hidden text-light">
        <svg viewBox="0 0 2880 48" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M0 48H1437.5H2880V0H2160C1442.5 52 720 0 720 0H0V48Z" fill="currentColor"></path>
        </svg>
    </div>
</div>
<!--Shape End-->

<!-- Speakers Start -->
<section class="section bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 text-center">
                <div class="section-title mb-4 pb-2">
                    <h4 class="title mb-4">Our Speakers</h4>
                    <p class="text-muted para-desc mx-auto mb-0">{{ $event->title }}'s Exceptional Speaker</p>
                </div>
            </div><!--end col-->
        </div><!--end row-->

        <div class="row">
            @foreach($speakers as $speaker)
            <div class="col-lg-3 col-md-6 mt-4 pt-2">
                <div class="card team team-primary text-center rounded border-0">
                    <div class="card-body">
                        <div class="position-relative">
                            <img src="{{ asset($speaker->image) }}" class="img-fluid avatar avatar-ex-large rounded-circle shadow" alt="">
                            <ul class="list-unstyled mb-0 team-icon">
                                <li class="list-inline-item"><a href="{{ $speaker->facebook }}" class="btn btn-primary btn-pills btn-sm btn-icon"><i data-feather="facebook" class="icons"></i></a></li>
                                <li class="list-inline-item"><a href="{{ $speaker->instagram }}" class="btn btn-primary btn-pills btn-sm btn-icon"><i data-feather="instagram" class="icons"></i></a></li>
                                <li class="list-inline-item"><a href="{{ $speaker->linkedin }}" class="btn btn-primary btn-pills btn-sm btn-icon"><i data-feather="linkedin" class="icons"></i></a></li>
                            </ul><!--end icon-->
                        </div>
                        <div class="content pt-3">
                            <h5 class="mb-0"><a href="{{ $speaker->linkedin }}" class="name text-dark">{{$speaker->name}}</a></h5>
                            <small class="designation text-muted">{{ $speaker->position }}</small>
                        </div>
                    </div>
                </div>
            </div><!--end col-->
            @endforeach
        </div><!--end row-->
    </div><!--end container-->

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 text-center">
                <div class="section-title mb-4 pb-2">
                    <h4 class="title mb-4">Our Organizers</h4>
                    <p class="text-muted para-desc mx-auto mb-0">{{ $event->title }}'s Excellent Organizing Team</p>
                </div>
            </div><!--end col-->
        </div><!--end row-->

        <div class="row">
            @foreach($team as $organizer)
            <div class="col-lg-3 col-md-6 mt-4 pt-2">
                <div class="card team team-primary text-center rounded border-0">
                    <div class="card-body">
                        <div class="position-relative">
                            <img src="{{ asset($organizer->image) }}" class="img-fluid avatar avatar-ex-large rounded-circle shadow" alt="">
                            <ul class="list-unstyled mb-0 team-icon">
                                <li class="list-inline-item"><a href="{{ $organizer->facebook }}" class="btn btn-primary btn-pills btn-sm btn-icon"><i data-feather="facebook" class="icons"></i></a></li>
                                <li class="list-inline-item"><a href="{{ $organizer->instagram }}" class="btn btn-primary btn-pills btn-sm btn-icon"><i data-feather="instagram" class="icons"></i></a></li>
                                <li class="list-inline-item"><a href="{{ $organizer->linkedin }}" class="btn btn-primary btn-pills btn-sm btn-icon"><i data-feather="linkedin" class="icons"></i></a></li>
                            </ul><!--end icon-->
                        </div>
                        <div class="content pt-3">
                            <h5 class="mb-0"><a href="{{ $organizer->linkedin }}" class="name text-dark">{{$organizer->name}}</a></h5>
                            <small class="designation text-muted">{{ $organizer->position }}</small>
                        </div>
                    </div>
                </div>
            </div><!--end col-->
            @endforeach
        </div><!--end row-->
    </div><!--end container-->

    <div class="container mt-100 mt-50">
        <div class="row justify-content-center">
            <div class="col-12 text-center">
                <div class="section-title mb-4 pb-2">
                    <h4 class="title mb-4">Event Sponsors</h4>
                    <p class="text-muted para-desc mx-auto mb-0">{{ $event->title }}'s Esteemed Sponsors</p>
                </div>
            </div><!--end col-->
        </div><!--end row-->

        <div class="row justify-content-center">
            @foreach($event->sponsors as $sponsor)
            <div class="col-lg-2 col-md-2 col-6 text-center mt-4 pt-2">
                <a href="{{ $sponsor->link }}"> <img src="{{ asset($sponsor->image) }}" class="avatar avatar-ex-md" style='max-height:50px' alt=""></a>
            </div><!--end col-->
            @endforeach
        </div><!--end row-->
    </div><!--end container-->
</section><!--end section-->
<!-- Speakers End -->

<!-- Shape Start -->
<div class="position-relative">
    <div class="shape overflow-hidden text-color-white">
        <svg viewBox="0 0 2880 48" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M0 48H1437.5H2880V0H2160C1442.5 52 720 0 720 0H0V48Z" fill="currentColor"></path>
        </svg>
    </div>
</div>
<!--Shape End-->

<!-- Schedule Start -->
<section class="section" id="schedules">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 text-center">
                <div class="section-title mb-4 pb-2">
                    <h4 class="title mb-4">Event Schedules</h4>
                    <p class="text-muted para-desc mx-auto mb-0">{{ $event->title }}'s Schedule and Order of Programme</p>
                </div>
            </div><!--end col-->
        </div><!--end row-->

        <div class="row mt-4 pt-2 justify-content-center">
            <div class="col-lg-8 col-md-12 text-center">
                <ul class="nav nav-pills bg-light rounded nav-justified flex-column flex-sm-row shadow" id="pills-tab" role="tablist">
                    @for ($day = 1; $day <= $event->days; $day++)
                    @php
                        $word = convertNumberToWord($day);
                    @endphp
                    <li class="nav-item">
                        <a class="nav-link rounded {{ $day == 1?'active' : ''  }}" id="pills-day{{$word}}-tab" data-bs-toggle="pill" href="#pills-day{{$word}}" role="tab" aria-controls="pills-day{{$word}}" aria-selected="false">
                            <div class="text-center py-2">
                                <h6 class="mb-0">{{$word}} Day</h6>
                            </div>
                        </a><!--end nav link-->
                    </li><!--end nav item-->
                    @endfor
                </ul><!--end nav pills-->
            </div>
        </div>
        
        <div class="row">
            <div class="col-12">
                <div class="tab-content" id="pills-tabContent">
                    @for ($day = 1; $day <= $event->days; $day++)
                        @php
                            $word = convertNumberToWord($day);
                        @endphp
                        <div class="tab-pane fade show {{ $day == 1?'active' : ''  }}" id="pills-day{{$word}}" role="tabpanel" aria-labelledby="pills-day{{$word}}-tab">
                            <div class="row">
                                @foreach($event->schedules->where('day', $day) as $schedule)
                                <div class="col-lg-6 mt-4 pt-2">
                                    <div class="card event-schedule event-primary rounded border">
                                        <div class="card-body">
                                            <div class="d-flex">
                                                <ul class="date text-center me-3 mb-0 list-unstyled">
                                                    <li class="day fw-bold mb-2">{{ date('F', strtotime($schedule->date)) }}</li>
                                                    <li class="month fw-bold">{{ date('j', strtotime($schedule->date)) }}</li>
                                                </ul>
                                                <div class="flex-1 content">
                                                    <h4><a href="javascript:void(0)" class="text-dark title">{{ $schedule->title }}</a></h4>
                                                    <p class="text-muted location-time"><span class="text-dark h6">{{ $schedule->location }}</span> 
                                                        <br> 
                                                        <span class="text-dark h6">Time:</span> 10:30AM to 11:15AM</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div><!--end col-->
                                @endforeach
                            </div>
                        </div>
                    @endfor   
                </div><!--end tab content-->
            </div><!--end col-->
        </div><!--end row-->
    </div><!--end container-->
</section><!--end section-->
<!-- Schedule End -->

@if(!empty($event->highlight))
<!-- CTA Start -->
<section class="section bg-cta jarallax" data-jarallax data-speed="0.5" style="background: url({{ asset($event->highlight->image) }}) center center;" id="cta">
    <div class="bg-overlay bg-primary bg-gradient" style="opacity: 0.85;"></div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 text-center">
                <div class="section-title">
                    <h4 class="title title-dark text-white mb-4">{{$event->highlight->title}}</h4>
                    <p class="text-white-50 para-dark para-desc mx-auto">{!! $event->highlight->description !!}</p>
                    <br>
                    <a href="#" data-type="youtube" data-id="{{$event->highlight->link}}" class="play-btn  mt-4 lightbox">
                        <i data-feather="play" class="fea icon-ex-md text-white title-dark"></i>
                    </a>
                </div>
            </div><!--end col-->
        </div><!--end row-->
    </div><!--end container-->
</section><!--end section-->
<!-- CTA End -->
@endif

{{-- <!-- Price Start -->
<section class="section" id="tickets">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 text-center">
                <div class="section-title mb-4 pb-2">
                    <h4 class="title mb-4">Our Tickets Rates</h4>
                    <p class="text-muted para-desc mx-auto mb-0">Start working with <span class="text-primary fw-bold">Landrick</span> that can provide everything you need to generate awareness, drive traffic, connect.</p>
                </div>
            </div><!--end col-->
        </div><!--end row-->

        <div class="row align-items-center">
            <div class="col-md-4 col-12 mt-4 pt-2">
                <div class="card pricing pricing-primary best-plan bg-light text-center border-0 rounded">
                    <div class="card-body py-5">
                        <img src="landing_assets/images/icon/ticket1.svg" class="mb-4" height="50" alt="">
                        <h6 class="title text-uppercase fw-bold mb-4">1 Day Tickets</h6>
                        <div class="d-flex justify-content-center mb-4">
                            <span class="h4 mb-0 mt-2">$</span>
                            <span class="price h1 mb-0">09</span>
                            <span class="h4 align-self-end mb-1">/Day</span>
                        </div>

                        <p class="text-muted">Start working with Landrick that can provide everything you need to generate awareness, drive traffic, connect.</p>
                        <a href="javascript:void(0)" class="btn btn-primary btn-sm mt-4">Buy Tickets</a>
                    </div>
                </div>
            </div><!--end col-->

            <div class="col-md-4 col-12 mt-4 pt-2">
                <div class="card pricing pricing-primary best-plan text-center border-0 shadow rounded">
                    <div class="ribbon ribbon-right ribbon-warning overflow-hidden"><span class="text-center d-block shadow small h6">Best</span></div>
                    <div class="card-body py-5">
                        <img src="landing_assets/images/icon/ticket2.svg" class="mb-4" height="50" alt="">
                        <h6 class="title text-uppercase fw-bold mb-4">Full Tickets</h6>
                        <div class="d-flex justify-content-center mb-4">
                            <span class="h4 mb-0 mt-2">$</span>
                            <span class="price h1 mb-0">24</span>
                            <span class="h4 align-self-end mb-1">/Full</span>
                        </div>
                        
                        <p class="text-muted">Start working with Landrick that can provide everything you need to generate awareness, drive traffic, connect.</p>
                        <a href="javascript:void(0)" class="btn btn-primary btn-sm mt-4">Buy Tickets</a>
                    </div>
                </div>
            </div><!--end col-->

            <div class="col-md-4 col-12 mt-4 pt-2">
                <div class="card pricing pricing-primary best-plan bg-light text-center border-0 rounded">
                    <div class="card-body py-5">
                        <img src="landing_assets/images/icon/ticket3.svg" class="mb-4" height="50" alt="">
                        <h6 class="title text-uppercase fw-bold mb-4">Couple Tickets</h6>
                        <div class="d-flex justify-content-center mb-4">
                            <span class="h4 mb-0 mt-2">$</span>
                            <span class="price h1 mb-0">16</span>
                            <span class="h4 align-self-end mb-1">/Day</span>
                        </div>
                        
                        <p class="text-muted">Start working with Landrick that can provide everything you need to generate awareness, drive traffic, connect.</p>
                        <a href="javascript:void(0)" class="btn btn-primary btn-sm mt-4">Buy Tickets</a>
                    </div>
                </div>
            </div><!--end col-->
        </div><!--end row-->
    </div><!--end container-->

    <div class="container mt-100 mt-60">
        <div class="row justify-content-center">
            <div class="col-12 text-center">
                <div class="section-title mb-4 pb-2">
                    <h4 class="title mb-4">Events Review</h4>
                    <p class="text-muted para-desc mx-auto mb-0">Start working with <span class="text-primary fw-bold">Landrick</span> that can provide everything you need to generate awareness, drive traffic, connect.</p>
                </div>
            </div><!--end col-->
        </div><!--end row-->

        <div class="row justify-content-center">
            <div class="col-lg-9 mt-4 pt-2 text-center">
                <div class="tiny-single-item">
                    <div class="tiny-slide">
                        <div class="client-testi text-center">
                            <p class="text-muted h6 fst-italic">" It seems that only fragments of the original text remain in the Lorem Ipsum texts used today. The most well-known dummy text is the 'Lorem Ipsum', which is said to have originated in the 16th century. "</p>
                            <img src="landing_assets/images/client/01.jpg" class="img-fluid avatar avatar-small mt-3 rounded-circle mx-auto shadow" alt="">
                            <ul class="list-unstyled mb-0 mt-3">
                                <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                            </ul>
                            <h6 class="text-primary">- Thomas Israel <small class="text-muted">C.E.O</small></h6>
                        </div><!--end customer testi-->
                    </div>
                    
                    <div class="tiny-slide">
                        <div class="client-testi text-center">
                            <p class="text-muted h6 fst-italic">" The advantage of its Latin origin and the relative meaninglessness of Lorum Ipsum is that the text does not attract attention to itself or distract the viewer's attention from the layout. "</p>
                            <img src="landing_assets/images/client/02.jpg" class="img-fluid avatar avatar-small mt-3 rounded-circle mx-auto shadow" alt="">
                            <ul class="list-unstyled mb-0 mt-3">
                                <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                            </ul>
                            <h6 class="text-primary">- Carl Oliver <small class="text-muted">P.A</small></h6>
                        </div><!--end customer testi-->
                    </div>
                    
                    <div class="tiny-slide">
                        <div class="client-testi text-center">
                            <p class="text-muted h6 fst-italic">" There is now an abundance of readable dummy texts. These are usually used when a text is required purely to fill a space. These alternatives to the classic Lorem Ipsum texts are often amusing and tell short, funny or nonsensical stories. "</p>
                            <img src="landing_assets/images/client/03.jpg" class="img-fluid avatar avatar-small mt-3 rounded-circle mx-auto shadow" alt="">
                            <ul class="list-unstyled mb-0 mt-3">
                                <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                            </ul>
                            <h6 class="text-primary">- Barbara McIntosh <small class="text-muted">M.D</small></h6>
                        </div><!--end customer testi-->
                    </div>
                    
                    <div class="tiny-slide">
                        <div class="client-testi text-center">
                            <p class="text-muted h6 fst-italic">" According to most sources, Lorum Ipsum can be traced back to a text composed by Cicero in 45 BC. Allegedly, a Latin scholar established the origin of the text by compiling all the instances of the unusual word 'consectetur' he could find "</p>
                            <img src="landing_assets/images/client/04.jpg" class="img-fluid avatar avatar-small mt-3 rounded-circle mx-auto shadow" alt="">
                            <ul class="list-unstyled mb-0 mt-3">
                                <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                            </ul>
                            <h6 class="text-primary">- Christa Smith <small class="text-muted">Manager</small></h6>
                        </div><!--end customer testi-->
                    </div>
                    
                    <div class="tiny-slide">
                        <div class="client-testi text-center">
                            <p class="text-muted h6 fst-italic">" It seems that only fragments of the original text remain in the Lorem Ipsum texts used today. The most well-known dummy text is the 'Lorem Ipsum', which is said to have originated in the 16th century. "</p>
                            <img src="landing_assets/images/client/05.jpg" class="img-fluid avatar avatar-small mt-3 rounded-circle mx-auto shadow" alt="">
                            <ul class="list-unstyled mb-0 mt-3">
                                <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                            </ul>
                            <h6 class="text-primary">- Dean Tolle <small class="text-muted">Developer</small></h6>
                        </div><!--end customer testi-->
                    </div>
                    
                    <div class="tiny-slide">
                        <div class="client-testi text-center">
                            <p class="text-muted h6 fst-italic">" It seems that only fragments of the original text remain in the Lorem Ipsum texts used today. One may speculate that over the course of time certain letters were added or deleted at various positions within the text. "</p>
                            <img src="landing_assets/images/client/06.jpg" class="img-fluid avatar avatar-small mt-3 rounded-circle mx-auto shadow" alt="">
                            <ul class="list-unstyled mb-0 mt-3">
                                <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                                <li class="list-inline-item"><i class="mdi mdi-star text-warning"></i></li>
                            </ul>
                            <h6 class="text-primary">- Jill Webb <small class="text-muted">Designer</small></h6>
                        </div><!--end customer testi-->
                    </div>
                </div><!--end owl carousel-->
            </div><!--end col-->
        </div><!--end row-->
    </div><!--end container-->
</section><!--end section-->
<!-- Price End --> --}}

<!-- Shape Start -->
<div class="position-relative">
    <div class="shape overflow-hidden text-light">
        <svg viewBox="0 0 2880 48" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M0 48H1437.5H2880V0H2160C1442.5 52 720 0 720 0H0V48Z" fill="currentColor"></path>
        </svg>
    </div>
</div>
<!--Shape End-->

<!-- News Start -->
<section class="section bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 text-center">
                <div class="section-title mb-4 pb-2">
                    <h4 class="title mb-4">Event Blog & Latest News</h4>
                    <p class="text-muted para-desc mx-auto mb-0">Start working with <span class="text-primary fw-bold">Landrick</span> that can provide everything you need to generate awareness, drive traffic, connect.</p>
                </div>
            </div><!--end col-->
        </div><!--end row-->

        <div class="row">
            <div class="col-lg-4 col-md-6 mt-4 pt-2">
                <div class="card blog blog-primary rounded border-0 shadow">
                    <div class="position-relative">
                        <img src="landing_assets/images/event/b01.jpg" class="card-img-top rounded-top" alt="...">
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
                        <img src="landing_assets/images/event/b02.jpg" class="card-img-top rounded-top" alt="...">
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
                        <img src="landing_assets/images/event/b03.jpg" class="card-img-top rounded-top" alt="...">
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

    {{-- <div class="container mt-100 mt-60">
        <div class="row justify-content-center">
            <div class="col-12 text-center">
                <div class="section-title mb-4 pb-2">
                    <h4 class="title mb-4">Sign up for our Newsletter</h4>
                    <p class="text-muted para-desc mx-auto mb-0">Start working with <span class="text-primary fw-bold">Landrick</span> that can provide everything you need to generate awareness, drive traffic, connect.</p>
                </div>
            </div><!--end col-->
        </div><!--end row-->

        <div class="row justify-content-center">
            <div class="col-lg-7 col-md-10">
                <div class="text-center subcribe-form mt-4 pt-2">
                    <form>
                        <input name="email" id="email" type="email" class="form-control rounded-pill" placeholder="Your email :" required aria-describedby="newssubscribebtn">
                        <button class="btn btn-pills btn-primary submitBnt" type="submit" id="newssubscribebtn">Subscribe</button>
                    </form><!--end form-->
                </div>
            </div>
        </div>
    </div><!--end container--> --}}
</section><!--end section-->
<!-- End News -->

<!-- Shape Start -->
<div class="position-relative">
    <div class="shape overflow-hidden text-footer">
        <svg viewBox="0 0 2880 48" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M0 48H1437.5H2880V0H2160C1442.5 52 720 0 720 0H0V48Z" fill="currentColor"></path>
        </svg>
    </div>
</div>
<!--Shape End-->


@include('includes.mainFooter')