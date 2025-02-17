   <div class="row w3-animate-fading w3-animate-top" id="buttona">
   @php
    use App\Models\SocialIcon;

    $socialIcons = SocialIcon::all();
@endphp
   @foreach ($socialIcons as $social)
    <h6>
        <span class="social-icons social-icons-colored float-right">
            <li class="social-{{ $social->social_icon_name }}">
                <a target="_blank" href="{{ $social->social_icon_url }}" class="bg-success">
                    <i class="fab fa-{{ $social->social_icon_name }}"></i>
                </a>
            </li>
        </span>
    </h6>
@endforeach
                {{-- <h6><span class="social-icons social-icons-colored float-right">
                        <li class="dynamic"><a target="_blank"
                                href="https://api.whatsapp.com/send?phone=923378901478&amp;text=Welcome%20To%20ETA"
                                class="bg-success"><i class="fab fa-whatsapp"></i></a></li>
                    </span></h6>

                <h6><span class="social-icons social-icons-colored float-right">
                        <li class="social-facebook"><a target="_blank" href="https://www.facebook.com/etestingagency"><i
                                    class="fab fa-facebook-f"></i></a></li>
                    </span></h6> --}}

            </div>
