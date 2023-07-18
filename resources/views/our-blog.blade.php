@include('includes.mainHeader')

<!-- Hero Start -->
<section class="bg-half-170 d-table w-100" style="background: url({{asset($pageGlobalData->setting->banner)}}) top;">
    <div class="bg-overlay"></div>
    <div class="container">
        <div class="row mt-5 justify-content-center">
            <div class="col-lg-12 text-center">
                <div class="pages-heading title-heading">
                    <h2 class="text-white title-dark"> News </h2>
                    <p class="text-white-50 para-desc mb-0 mx-auto">Be up-to-date with exiting news and happenings</p>
                </div>
            </div><!--end col-->
        </div><!--end row--> 

        <div class="position-breadcrumb">
            <nav aria-label="breadcrumb" class="d-inline-block">
                <ul class="breadcrumb rounded shadow mb-0 px-4 py-2">
                    <li class="breadcrumb-item"><a href="{{('/')}}">Leave the Box</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Blog</li>
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
        <div class="row">
            @foreach($news as $singleNews)
            <div class="col-lg-4 col-md-6 col-12 mb-4 pb-2">
                <div class="card border-0 blog blog-primary shadow overflow-hidden">
                    <img src="{{asset($singleNews->image)}}" class="img-fluid" alt="">

                    <div class="content card-body">
                        <ul class="list-unstyled d-flex justify-content-between">
                            <li class="text-muted">{{date('F j, Y', strtotime($singleNews->created_at))}}</li>
                            <li class="text-muted"><a href="javascript:void(0)" class="badge bg-soft-primary"></a></li>
                        </ul>

                        <h5><a href="{{url('blog-details/'.$singleNews->slug)}}" class="card-title title text-dark">{{ $singleNews->title }}</a></h5>

                        <div class="post-meta d-flex justify-content-between mt-3">
                            <a href="{{url('blog-details/'.$singleNews->slug)}}" class="text-muted readmore">Read More <i class="uil uil-angle-right-b align-middle"></i></a>
                        </div>
                    </div>
                </div>
            </div><!--end col-->
            @endforeach

            {{-- <!-- PAGINATION START -->
            <div class="col-12">
                <ul class="pagination justify-content-center mb-0">
                    <li class="page-item"><a class="page-link" href="javascript:void(0)" aria-label="Previous">Prev</a></li>
                    <li class="page-item active"><a class="page-link" href="javascript:void(0)">1</a></li>
                    <li class="page-item"><a class="page-link" href="javascript:void(0)">2</a></li>
                    <li class="page-item"><a class="page-link" href="javascript:void(0)">3</a></li>
                    <li class="page-item"><a class="page-link" href="javascript:void(0)" aria-label="Next">Next</a></li>
                </ul>
            </div><!--end col-->
            <!-- PAGINATION END --> --}}
        </div><!--end row-->
    </div><!--end container-->
</section><!--end section-->
<!-- End -->

@include('includes.mainFooter')