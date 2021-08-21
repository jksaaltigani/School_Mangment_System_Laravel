</div>
<div class="social_link">
    <ul>
        <li>
            <img src="{{ asset('public_img/new_img/face.svg') }}" alt="">
        </li>
        <li>
            <img src="{{ asset('public_img/new_img/whats.svg') }}" alt="">
        </li>
        <li>
            <img src="{{ asset('public_img/new_img/twitter.svg') }}" alt="">
        </li>
    </ul>
</div>
<div class="margin_top"></div>
<footer class="footer ">
    <div class="container">
        <div class="subscribe_email">
            <div class="subscribe_descrption">
                <p> Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quibusdam quaerat consectetur ad, vero
                    quisquam dolor a. Minus quos cupiditate</p>
            </div>
            <div class="subscribe_input">
                <form action="{{ route('mail.subscribe') }}" method="POST">
                    @csrf
                    <div class="input_container">
                        <input type="email" class="subscribe_input_filed" name='email'
                            placeholder="{{ __('layout.write your email') }}">
                        <button class="subscribe_button">{{ __('layout.subscribe') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="grid_footer">
            <div>
                <h3 class='white-text'>
                    {{ __('layout.project name') }}
                </h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum amet nesciunt nam quos cumque, ad
                    vitae quis temporibus possimus, culpa hic consequatur quia commodi reiciendis tempore, voluptate
                    aperiam veritatis facere.</p>
            </div>
            <div>{{ __('layout.links') }}
                <ul>
                    @if (GetCategory()->count() > 0)
                        @foreach (GetCategory() as $category)
                            <li class="" data-menu="">
                                <a class="awesome_color" href="{{ route('categories', $category->id) }}">
                                    <span>{{ $category->name }}</span>
                                </a>
                            </li>
                        @endforeach
                    @endif
                </ul>
            </div>
            <div>
                <h3 class='white-text'>{{ __('layout.prvicy') }}</h3>
                <ul>
                    <li><a href="#" class="awesome_color"> {{ __('layout.mail us') }}</a></li>
                    <li><a href="#" class="awesome_color">{{ __('layout.prvicy') }}</a></li>
                    <li><a href="#" class="awesome_color">{{ __('layout.how us') }}</a></li>
                    <li><a href="#" class="awesome_color">{{ __('layout.contant us') }}</a></li>
                </ul>
            </div>
        </div>

        <div>
            <p class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2">
                <span class="float-md-left d-block d-md-inline-block">Copyright &copy; 2018 <a
                        class="text-bold-800 grey darken-2"
                        href="https://themeforest.net/user/pixinvent/portfolio?ref=pixinvent" target="_blank">PIXINVENT
                    </a>, All rights reserved. </span>
                <span class="float-md-right d-block d-md-inline-blockd-none d-lg-block">Hand-crafted & Made with <i
                        class="ft-heart pink"></i></span>
            </p>
        </div>
    </div>
</footer>
