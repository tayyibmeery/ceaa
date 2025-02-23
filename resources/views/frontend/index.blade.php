@extends('frontend.layout.main')

@section('title', 'Page Title')

@section('content')


<div id="slider" class="inspiro-slider slider-halfscreen dots-creative" data-height-xs="360" data-autoplay="2600" data-animate-in="fadeIn" data-animate-out="fadeOut" data-items="1" data-loop="true" data-autoplay="true">
    @foreach ($slider as $sliders )
    <div class="slide background-image" style="background-image: url('{{ asset($sliders->slider_image) }}');overflow:hidden">
        <div class="bg-overlay"></div>
        <div class="container">
            <div class="slide-captions text-center">
                @if(!empty($sliders->welcome_text))
                <h6 class="text-light">{{ $sliders->welcome_text }}</h6>
                @endif
                @if(!empty($sliders->heading))
                <h2 class="text-uppercase text-medium text-light">{{ $sliders->heading }}</h2>
                @endif
                @if(!empty($sliders->button_name))
                <a class="btn btn-red" href="#">{{$sliders->button_name}}</a>
                @endif
                <!-- end: Captions -->
            </div>
        </div>
    </div>
    @endforeach
</div>
<!--end: Inspiro Slider -->
<!-- WHAT WE DO -->
<div class="container d-m-t">
    <div class="heading-text heading-section text-center">
        <h2>Short Links</h2>
    </div>
    <div class="row py-4">
      <div class="col-6 col-md-3 mb-4 mb-md-0">
    <div class="CardBox">
        <a target="_blank" href="{{ route('projects.index', ['type' => 'new']) }}">
            <div class="boxColorN">
                <img src="{{ asset('frontend/icons/project.png') }}" width="90px" height="90px" alt="New Projects">
            </div>
            <div class="para-text">New Projects</div>
        </a>
    </div>
</div>
<div class="col-6 col-md-3 mb-4 mb-md-0">
    <div class="CardBox">
        <a target="_blank" href="{{ route('projects.index', ['type' => 'ongoing']) }}">
            <div class="boxColorN">
                <img src="{{ asset('frontend/icons/ongoing.png') }}" width="90px" height="90px" alt="Ongoing Projects">
            </div>
            <div class="para-text">OnGoing Projects</div>
        </a>
    </div>
</div>
<div class="col-6 col-md-3 mb-4 mb-md-0">
    <div class="CardBox">
        <a target="_blank" href="{{ route('projects.index', ['type' => 'completed']) }}">
            <div class="boxColorN">
                <img src="{{ asset('frontend/icons/completed.png') }}" width="90px" height="90px" alt="Completed Projects">
            </div>
            <div class="para-text">Completed Projects</div>
        </a>
    </div>
</div>
        {{-- <div class="col-6 col-md-3 mb-4 mb-md-0">
            <div class="CardBox">
                <a target="_blank" href="status/application-status.html">
                    <div class="boxColorN">
                        <img src="{{ asset('frontend/icons/status.png')}}" width="90px" height="90px" alt="Application Status">
                    </div>
                    <div class="para-text">Application Status</div>
                </a>
            </div>
        </div> --}}
        <div class="col-6 col-md-3 mb-4 mb-md-0">
            <div class="CardBox">
                <a target="_blank" href="{{route('roll-number-slip.index')}}">
                    <div class="boxColorN">
                        <img src="{{ asset('frontend/icons/roll.png')}}" width="90px" height="90px" alt="Roll Numbers">
                    </div>
                    <div class="para-text">Roll Numbers</div>
                </a>
            </div>
        </div>
        <div class="col-6 col-md-3 mb-4 mb-md-0">
            <div class="CardBox">
                <a target="_blank" href="{{route('candidate_result.result')}}">
                    <div class="boxColorN">
                        <img src="{{ asset('frontend/icons/result.png')}}" width="90px" height="90px" alt="Results">
                    </div>
                    <div class="para-text">Results</div>
                </a>
            </div>
        </div>

    </div>
</div>



<section class="d-m-t">
    <div class="container">
        <div class="heading-text heading-section text-center">
            <h2>Our Main Highlights</h2>
        </div>

        <div class="row pb-5">
            @foreach ($lights as $light)
            @if (!empty($light->title) && !empty($light->icon_image))
            <div class="col-md-4 col-lg-3 p-2">
                <div class="boxColor">
                    <a target="_blank" href="#">
                        <img src="{{ asset($light->icon_image) }}" width="90px" height="90px" alt="{{ $light->icon_name }}">
                        <div class="para-textN">{{ $light->title }}</div>
                    </a>
                </div>
            </div>
            @endif
            @endforeach
        </div>

    </div>
</section>

<!-- COUNTERS -->
<section class="text-light" data-bg-parallax="assets/images/parallax/12.jpg" style="padding: 50px 0px !important;">
    <div class="bg-overlay"></div>
    <div class="container text-center">
        <div class="row">
            <div class="col-md-4 mb-4 mb-md-0">
                <div class="text-center">
                    <div class="icon"><i class="fa fa-3x fa-smile-o"></i></div>
                    <div class="counter" style="display: inline-flex !important;"><span data-speed="4550" data-refresh-interval="20" data-to="50" data-from="0" data-seperator="true"></span>
                        <h3>%</h3>
                    </div>
                    <div class="seperator seperator-small"></div>
                    <p>Tests</p>
                </div>
            </div>

            <div class="col-md-4 mb-4 mb-md-0">
                <div class="text-center">
                    <div class="icon"><i class="fa fa-3x fa-smile-o"></i></div>
                    <div class="counter" style="display: inline-flex !important;"><span data-speed="4550" data-refresh-interval="25" data-to="66" data-from="0" data-seperator="true"></span>
                        <h3>%</h3>
                    </div>
                    <div class="seperator seperator-small"></div>
                    <p>Candidates</p>
                </div>
            </div>

            <div class="col-md-4 mb-4 mb-md-0">
                <div class="text-center">
                    <div class="icon"><i class="fa fa-3x fa-smile-o"></i></div>
                    <div class="counter" style="display: inline-flex !important;"><span data-speed="4550" data-refresh-interval="30" data-to="99" data-from="0" data-seperator="true"></span>
                        <h3>%</h3>
                    </div>
                    <div class="seperator seperator-small"></div>
                    <p>Test Centers</p>
                </div>
            </div>

        </div>
    </div>

</section>
<!-- end: COUNTERS -->
{{-- <style>
    @media (max-width: 991.98px) {

        button.btn:not(.btn-creative):not(.btn-slide).btn-sm,
        .btn:not(.close):not(.mfp-close):not(.btn-creative):not(.btn-slide).btn-sm,
        a.btn:not([href]):not([tabindex]):not(.btn-creative):not(.btn-slide).btn-sm {
            font-size: 7px;
        }
    }

    .dynamic {
        animation: blinker 8s linear infinite !important;
    }

    /* Default font size */
    .col-4 {
        font-size: 16px;
        /* Your default font size */
    }

    /* Adjust font size for small screens */
    @media (max-width: 576px) {

        /* This is the "sm" breakpoint in Bootstrap */
        .col-4 {
            font-size: 14px;
            /* Decrease font size for small screens */
        }
    }

    .row {
        margin-bottom: 20px;
    }

    h4,
    h6 {
        margin-bottom: 0;
    }

    .social-icons {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .social-icons a {
        text-decoration: none;
        color: #fff;
        padding: 8px 12px;
        border-radius: 5px;
        display: inline-block;
    }

    .social-icons a i {
        margin-right: 5px;
    }

    .social-icons-colored a.bg-success {
        background-color: #28a745;
    }

    .blink {
        animation: blink 1s infinite;
    }

    @keyframes blink {

        0%,
        100% {
            opacity: 1;
        }

        50% {
            opacity: 0;
        }
    }

</style> --}}
<div id="popupDiv" class="modal fade show" id="modal" tabindex="-1" role="modal" aria-labelledby="modal-label" style="display: block;" aria-modal="true">
    <div class="modal-dialog modal-dialog-centered" style="min-width: 50%; padding: 10px;">
        <div class="modal-content">
            <div class="project-description m-t-20" style="padding:10px">
                <h2 style="font-size: 24px; text-align:center"> Announcement <img src="{{ asset('frontend/images/new-gif.gif')}}" width="40px">
                </h2>
                @foreach ($posts as $post)
                <div class="row">
                    <div class="col-8 col-sm-8">
                        <span style="display: flex;">
                            <img src="{{ asset('frontend/images/new-gif-1.gif')}}" class="img-rotate" width="40px" height="40px">

                            &nbsp;
                            <h5 class="float-start" style="text-align: justify; line-height: 1;">{{$post->title}}
                            </h5>
                        </span>
                    </div>
                    <div class="col-4 col-sm-4">
                        <a href="{{ asset('storage/' . $post->advertisement_file) }}" class="btn btn-success btn-sm dynamic" style="float: right;  width: max-content; margin-right: 2px" target="_blank">{{ $post->title }} - {{ \Carbon\Carbon::parse($post->advertisement_date)->format('M/Y') }}</a>
                        <span class="tab"></span>
                         @if(\Carbon\Carbon::now()->lt($post->application_deadline))
                        <a href="{{ route('postsjob.show', $post->id) }}" class="btn btn-warning btn-sm dynamic" style="float: right;  width: max-content; margin-right: 2px">Apply Now </a>
                        @endif
                        <span class="tab"></span>
                        <a href="#" class="btn btn-primary btn-sm  dynamic" style="float: right; width: max-content; color: black; background: yellow">Application
                            Status</a>
                        <span class="tab"></span>
                    </div>
                </div>
                <hr>



                {{-- <div class="row">
                                                        <div class="col-8 col-sm-8">
                                                            <span style="display: flex;">
                                                                <img src="{{ asset('frontend/images/new-gif-1.gif')}}" class="img-rotate" width="40px" height="40px">

                &nbsp;
                <h5 class="float-start" style="text-align: justify; line-height: 1;">{{$post->title}}
                </h5>
                </span>
            </div>
            <div class="col-4 col-sm-4">
                <a href="{{ asset('storage/' . $post->advertisement_file) }}" class="btn btn-primary btn-sm dynamic" style="float: right;  width: max-content; margin-right: 2px" target="_blank">
                    Advertisements</a>
                <span class="tab"></span>
            </div>
        </div> --}}
        {{-- <hr> --}}
        @endforeach
        {{-- <div class="row">
                                                        <div class="col-8 col-sm-8 ">
                                                            <span style="display: flex; ">
                                                                <img src="{{ asset('frontend/images/new-gif-1.gif')}}" class="img-rotate" width="40px" height="30px">

        &nbsp
        <p class="float-start p-5" style="align-items: center; font-weight: bold; color: red; line-height: 15px">
            BlackListed Candidates
        </p>
        </span>
    </div>
    <div class="col-4 col-sm-4">
        <a style="width: max-content;float: right;font-size: 9px;" class="btn btn-danger btn-sm  dynamic" href="status/blacklisting.html" target="_blank">Check Status</a>

    </div>
</div> --}}
{{-- <hr> --}}
<button aria-hidden="true" type="button" style="color: black;" class="mfp-close" onclick="closePopup()" data-dismiss="modal" aria-label="Close">
    ×
</button>


{{-- <div class="row mb-2">
                                    <div class="col-12">
                                        <h4>ABOUT ETA</h4>
                                        <h6>ETA Official Social Media Platforms.</h6>
                                    </div>

                                    <div class="col-12">
                                        <h6>
                                            1- YouTube Channel
                                            <span class="social-icons social-icons-colored float-right">
                                                <a href="https://www.youtube.com/channel/UCHZJt5aa5NxLtYpqeIWxVZA" target="_blank" class="bg-success dynamic">
                                                    <i class="fab fa-youtube"></i> Subscribe
                                                </a>
                                            </span>
                                        </h6>
                                    </div>

                                    <div class="col-12 mt-2">
                                        <h6>
                                            2- WhatsApp 24/7
                                            <span class="social-icons social-icons-colored float-right">
                                                <a href="https://api.whatsapp.com/send?phone=923378901478&amp;text=Welcome%20To%20ETA" target="_blank" class="bg-success dynamic">
                                                    <i class="fab fa-whatsapp"></i> Chat Now
                                                </a>
                                            </span>
                                        </h6>
                                    </div>

                                    <div class="col-12 mt-2">
                                        <h6>
                                            3- WhatsApp Channel
                                            <span class="social-icons social-icons-colored float-right">
                                                <a href="https://www.whatsapp.com/channel/0029VaDKvXnAe5VmuQveC10s" target="_blank" class="bg-success dynamic">
                                                    <i class="fab fa-whatsapp"></i> Join Channel
                                                </a>
                                            </span>
                                        </h6>
                                    </div>

                                    <div class="col-12 mt-2">
                                        <h6> 4- Facebook Page

                                            <span class="social-icons social-icons-colored float-right">
                                                <a href="https://www.facebook.com/etestingagency" target="_blank" class="bg-success dynamic">
                                                    <i class="fab fa-facebook-f"></i> Follow
                                                </a>
                                            </span>
                                        </h6>
                                    </div>

                                    <div class="col-12 mt-2">
                                        <h6> 5-Instagram
                                            <span class="social-icons social-icons-colored float-right">
                                                <a href="https://www.instagram.com/etestingagency.eta/" target="_blank" class="bg-success dynamic">
                                                    <i class="fab fa-instagram"></i> Follow
                                                </a>
                                            </span>
                                        </h6>
                                    </div>
                                </div> --}}
</div>
</div>
</div>
</div>
{{-- <div id="backgroundDiv" class="modal-backdrop fade show"></div> --}}

@endsection
