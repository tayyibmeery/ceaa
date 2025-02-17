 <div id="backgroundDiv" class="modal-backdrop fade "></div>

 <footer id="footer">
        <div class="footer-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4  col-lg-2 col-md-4">
                        <!-- Footer widget area 1 -->
                        <div class="widget  widget-contact-us"
                             style="background-image: url('images/world-map-dark.png'); background-position: 50% 20px; background-repeat: no-repeat">
                            <h4>About CEAA</h4>
                            <ul class="list-icon list-icon-bold">

                                   @php
    use App\Models\AboutIcon;

    $socialIcons = AboutIcon::all();
@endphp
   @foreach ($socialIcons as $social)

   <li>
    <i class="text-danger fa fa-{{$social->about_icon_name}}" style="display: inline-block; vertical-align: middle; margin-right: 10px;"></i>
    <span style="display: inline-block; vertical-align: middle;">{!! $social->about_icon_detail !!}</span>
</li>

                                {{-- <li><i class="text-danger fa fa-{{$social->about_icon_name}}">
                                    </i>{!!$social->about_icon_detail !!} --}}

                                    {{-- Office No 25, 2nd floor, Mall-09, <br>&nbsp;&nbsp;G-9 Markaz, Islamabad --}}
                                {{-- </li> --}}
    @endforeach
                                {{-- <li><i class="text-success fab fa-whatsapp"></i> <a
                                        href="https://api.whatsapp.com/send?phone=923344133382&amp;text=Welcome%20To%20ETA">+923344133382</a></li>
                                <li><i class="text-primary fa fa-phone"></i> 051-8898883</li>
                                <li><i class="text-info far fa-envelope"></i> <a
                                        href="mailto:Info@CEAApk.com">Info@CEAApk.com
                                    </a>
                                </li>
                                <li><i class="text-info far fa-envelope"></i> <a
                                        href="mailto:queries@etapk.com">queries@CEAApk.com</a>
                                </li>
                                <li> --}}
                            </ul>

                        </div>
                        <!-- end: Footer widget area 1 -->
                    </div>

                    <div class="col-xl-2 col-lg-2 col-md-4">
                        <!-- Footer widget area 1 -->
                        <div class="widget">
                            <h4>About Us</h4>
                            <ul class="list">
                                <li><a href="#">Our Story</a></li>
                                <li><a href="#">FAQ</a></li>
                                <li><a href="#">Sponsors</a></li>
                            </ul>

                        </div>
                        <!-- end: Footer widget area 1 -->
                    </div>
                    <div class="col-xl-2 col-lg-2 col-md-4">
                        <!-- Footer widget area 2 -->
                        <div class="widget">
                            <h4>Our Terms</h4>
                            <ul class="list">
                                <li><a href="#">Terms and Conditions</a></li>
                                <li><a href="#">Privacy and Policy</a></li>
                                <li><a href="#">Policy and Returns</a></li>
                                <li><a href="#">Fee Charges</a></li>
                            </ul>
                        </div>
                        <!-- end: Footer widget area 2 -->
                    </div>


                    <div class="col-lg-4">
                        <form class="widget-contact-form" novalidate="" action="https://etapk.com/include/contact-form.php"
                              role="form" method="post">
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i
                                                class="fa fa-user"></i></span>
                                </div>
                                <input type="text" aria-required="true" name="widget-contact-form-name"
                                       class="form-control required name" placeholder="Enter your Name">
                            </div>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i
                                                class="fa fa-envelope"></i></span>
                                </div>
                                <input type="email" aria-required="true" required=""
                                       name="widget-contact-form-email" class="form-control required email"
                                       placeholder="Enter your Email">
                            </div>
                            <div class="form-group mb-2">
                                    <textarea type="text" name="widget-contact-form-message" rows="5"
                                              class="form-control required"
                                              placeholder="Enter your Message"></textarea>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary" type="submit" id="form-submit"><i
                                        class="fa fa-paper-plane"></i>&nbsp;Send message
                                </button>
                            </div>
                        </form>

                    </div>


                </div>
                {{-- <div class="row flex-wrap">
                    <div class="col-12 col-sm-6 col-md-3 mb-3 mb-sm-0">
                        <a href="#">
                            <img src="{{ asset('frontend/images/logo/appstore.png')}}" style="height:50px"
                                 alt="Download From Apple Store">
                        </a>
                    </div>
                    <div class="col-12 col-sm-6 col-md-3 text-sm-end text-md-start">
                        <a href="https://play.google.com/store/apps/details?id=com.suleman.ntssalman">
                            <img src="{{ asset('frontend/images/logo/playstore.png')}}" style="height:50px"
                                 alt="Download From Play Store">
                        </a>
                    </div>
                </div> --}}
            </div>
        </div>
        <div class="copyright-content">
            <div class="container">

                <div class="row">
                    {{-- <div class="col-lg-6">
                        <!-- Social icons -->
                        <div class="social-icons social-icons-colored float-left">
                            <ul>
                                <li class="social-facebook"><a target="_blank"
                                                               href="https://www.facebook.com/etestingagency"><i
                                            class="fab fa-facebook-f"></i></a></li>
                                <li class="social-youtube"><a target="_blank"
                                                              href="https://www.youtube.com/channel/UCHZJt5aa5NxLtYpqeIWxVZA"><i
                                            class="fab fa-youtube"></i></a></li>
                                <li class="social-whatsapp"><a target="_blank"
                                                               href="https://api.whatsapp.com/send?phone=923378901478&amp;text=Welcome%20To%20ETA"
                                                               class="bg-success"><i class="fab fa-whatsapp"></i></a>
                                </li>
                            </ul>
                        </div>
                        <!-- end: Social icons -->
                    </div> --}}
                    <div class="col-lg-12">
                        <div class="copyright-text text-center">© 2021 Elegant Testing Agency. All Rights Reserved.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
