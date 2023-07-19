<!-- Footer Start -->
        <!-- Footer Start -->
        <footer class="footer">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <div class="footer-py-60 text-center">
                            <div class="row py-5">
                                <div class="col-md-4">
                                    <div class="card border-0 text-center features feature-primary feature-clean bg-transparent">
                                        <div class="icons text-center mx-auto">
                                            <i class="uil uil-phone rounded h3 mb-0"></i>
                                        </div>
                                        <div class="content mt-4">
                                            <h5 class="footer-head">Phone</h5>
                                            <p class="text-muted">Call or Whatsapp</p>
                                            <a href="tel:{{ $pageGlobalData->setting->phone  }}" class="text-foot">{{ $pageGlobalData->setting->phone  }}</a>
                                        </div>
                                    </div>
                                </div><!--end col-->
                        
                                <div class="col-md-4 mt-4 mt-sm-0 pt-2 pt-sm-0">
                                    <div class="card border-0 text-center features feature-primary feature-clean bg-transparent">
                                        <div class="icons text-center mx-auto">
                                            <i class="uil uil-envelope rounded h3 mb-0"></i>
                                        </div>
                                        <div class="content mt-4">
                                            <h5 class="footer-head">Email</h5>
                                            <p class="text-muted">Feel free to send us an email</p>
                                            <a href="mailto:{{ $pageGlobalData->setting->email  }}" class="text-foot">{{ $pageGlobalData->setting->email  }}</a>
                                        </div>
                                    </div>
                                </div><!--end col-->
                        
                                <div class="col-md-4 mt-4 mt-sm-0 pt-2 pt-sm-0">
                                    <div class="card border-0 text-center features feature-primary feature-clean bg-transparent">
                                        <div class="icons text-center mx-auto">
                                            <i class="uil uil-map-marker rounded h3 mb-0"></i>
                                        </div>
                                        <div class="content mt-4">
                                            <h5 class="footer-head">Location</h5>
                                            <p class="text-muted">{{ Illuminate\Support\Str::limit(strip_tags($pageGlobalData->setting->address), 500) }}</p>
                                            <a href="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d39206.002432144705!2d-95.4973981212445!3d29.709510002925988!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8640c16de81f3ca5%3A0xf43e0b60ae539ac9!2sGerald+D.+Hines+Waterwall+Park!5e0!3m2!1sen!2sin!4v1566305861440!5m2!1sen!2sin"
                                                data-type="iframe" class="video-play-icon text-foot lightbox">View on Google map</a>
                                        </div>
                                    </div>
                                </div><!--end col-->
                            </div><!--end row-->
                        </div>
                    </div><!--end col-->
                </div><!--end row-->
            </div><!--end container-->

            <div class="footer-py-30 footer-bar bg-footer">
                <div class="container text-center">
                    <div class="row align-items-center justify-content-between">
                        <div class="col-lg-3 col-md-2 col-sm-3">
                            <div class="text-sm-start">
                                <a href="#" class="logo-footer">
                                    <img src="{{ asset($pageGlobalData->setting->footer_logo) }}" height="150" alt="">
                                </a>
                            </div>
                        </div><!--end col-->

                        <div class="col-lg-6 col-md-6 col-sm-6 mt-4 mt-sm-0 pt-2 pt-sm-0">
                            <ul class="list-unstyled footer-list terms-service mb-0">
                                <li class="list-inline-item mb-0"><a href="{{('/')}}" class="text-foot me-2">Home</a></li>
                                <li class="list-inline-item mb-0"><a href="{{('about-us')}}" class="text-foot me-2">About</a></li>
                                <li class="list-inline-item mb-0"><a href="{{('our-events')}}" class="text-foot me-2">Events</a></li>
                                <li class="list-inline-item mb-0"><a href="{{('contact-us')}}" class="text-foot">Contact</a></li>
                            </ul>
                        </div><!--end col-->

                        <div class="col-lg-3 col-md-4 col-sm-3 mt-4 mt-sm-0 pt-2 pt-sm-0">
                            <div class="text-sm-end">
                                <p class="mb-0 text-foot">© <script>document.write(new Date().getFullYear())</script> <a href="{{('/')}}" target="_blank" class="text-reset">Leave The Box Africa</a>.</p>
                            </div>
                        </div><!--end col-->
                    </div><!--end row-->
                </div><!--end container-->
            </div>
        </footer><!--end footer-->
        <!-- Footer End -->
        <!-- Footer End -->

        
        <!-- Cookies Start -->
        <div class="card cookie-popup shadow rounded py-3 px-4">
            <p class="text-muted mb-0">This website uses cookies to provide you with a great user experience. By using it, you accept our <a href="{{('/')}}" target="_blank" class="text-success h6">use of cookies</a></p>
            <div class="cookie-popup-actions text-end">
                <button><i class="uil uil-times text-dark fs-4"></i></button>
            </div>
        </div>
        <!--Note: Cookies Js including in plugins.init.js (path like; js/plugins.init.js) and Cookies css including in _helper.scss (path like; scss/_helper.scss)-->
        <!-- Cookies End -->
        


        <!-- Back to top -->
        <a href="#" onclick="topFunction()" id="back-to-top" class="back-to-top fs-5"><i data-feather="arrow-up" class="fea icon-sm icons align-middle"></i></a>
        <!-- Back to top -->

        <!-- javascript -->
        <!-- JAVASCRIPT -->
        <script src="{{asset('landingAssets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <!-- SLIDER -->
        <script src="{{asset('landingAssets/libs/tiny-slider/min/tiny-slider.js')}}"></script>
        <script src="{{asset('landingAssets/libs/swiper/js/swiper.min.js')}}"></script>
        <!-- Lightbox -->
        <script src="{{asset('landingAssets/libs/tobii/js/tobii.min.js')}}"></script>
        <!-- Main Js -->
        <script src="{{asset('landingAssets/libs/feather-icons/feather.min.js')}}"></script>
        <script src="{{asset('landingAssets/js/plugins.init.js')}}"></script><!--Note: All init js like tiny slider, counter, countdown, maintenance, lightbox, gallery, swiper slider, aos animation etc.-->
        <script src="{{asset('landingAssets/js/app.js')}}"></script><!--Note: All important javascript like page loader, menu, sticky menu, menu-toggler, one page menu etc. -->
    </body>
</html>