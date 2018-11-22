<footer class="footer-section footer">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">

                <ul class="footer-menu">
                    {{--<li> <a href="{{ route('accounts', ['tab' => 'profile']) }}">Your account</a>  </li>--}}
                    <li> <a href="">{{ __('home.Contact us') }}</a>  </li>
                    <li> <a href="">{{ __('home.Terms of service') }}</a>  </li>
                </ul>

                <ul class="footer-social">
                    <li> <a href=""> <i class="fa fa-facebook" aria-hidden="true"></i>  </a> </li>
                    <li> <a href=""> <i class="fa fa-twitter" aria-hidden="true"></i>   </a> </li>
                    <li> <a href=""> <i class="fa fa-instagram" aria-hidden="true"></i>  </a> </li>
                    <li> <a href=""> <i class="fa fa-pinterest-p" aria-hidden="true"></i>  </a> </li>
                </ul>

                <p>&copy; <a href="{{ config('app.url') }}">{{ config('app.name') }}</a> | {{ __('home.All Rights Reserved') }}</p>

            </div>
        </div>
    </div>
</footer>
