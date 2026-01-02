<x-guest-layout for="landing" :page="__('Login')" :sticky="false">
    <div id="wrapper" class="wrap overflow-x-hidden">
        <div id="sign-in" class="sign-in section panel overflow-hidden bg-secondary dark:bg-gray-900">
            <div class="section-outer panel">
                <div class="section-inner panel">
                    <div class="panel overflow-hidden">
                        <div class="panel row child-cols-12 md:child-cols-6 g-0">
                            <div>
                                <div class="panel overflow-hidden min-h-300px h-100 lg:h-screen"
                                    data-anime="translateX: [-24, 0]; opacity: [0, 1]; easing: easeInOutExpo; duration: 750;">
                                    <figure class="panel h-100 m-0 rounded ">
                                        <canvas class="h-100 w-100"></canvas>
                                        <img class="media-cover image"
                                            src="{{ asset('assets/landing/images/template/login.webp') }}"
                                            alt="Hero login image">
                                    </figure>
                                    <div class="position-cover text-white vstack justify-end p-4 lg:p-6 xl:py-8">
                                        <div
                                            class="position-cover bg-gradient-to-t from-black to-transparent opacity-50">
                                        </div>
                                        <div class="panel z-1">
                                            <div class="vstack gap-3"
                                                data-anime="targets: >*; translateY: [-24, 0]; opacity: [0, 1]; easing: easeInOutExpo; duration: 750; delay: anime.stagger(100, {start: 250});">
                                                <p class="fs-5 xl:fs-4 fw-medium">“This software simplifies the
                                                    website building process, making it a breeze to manage our
                                                    online presence.”</p>
                                                <div class="vstack gap-0">
                                                    <p class="fs-6 lg:fs-5 fw-medium">David Handerson</p>
                                                    <span class="fs-7 opacity-80">Founder & CEO</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="{{ route('c.home') }}"
                                        class="position-absolute top-0 ltr:start-0 rtl:end-0 text-none m-4 lg:m-6"
                                        data-anime="scale: [0.5, 1]; opacity: [0, 1]; easing: easeInOutExpo; duration: 750; delay: anime.stagger(100, {start: 150});">
                                        <img class="w-32px lg:w-40px"
                                            src="{{ asset('assets/landing/images/common/logo-mark.svg') }}"
                                            alt="">
                                    </a>
                                </div>
                            </div>
                            <div>
                                <div class="panel vstack justify-center h-100 overflow-hidden">
                                    <div class="d-none lg:d-block"
                                        data-anime="onview: -100; targets: img; scale: [0.8, 1]; opacity: [0, 1]; easing: spring(1, 80, 10, 0); duration: 450; delay: 350;">
                                        <div class="position-absolute bottom-0 start-0 rotate-45"
                                            style="bottom: 15% !important; left: 18% !important;">
                                            <img class="w-32px text-gray-900 dark:text-white"
                                                src="{{ asset('assets/landing/images/template/star-1.svg') }}"
                                                alt="star-1" data-uc-svg>
                                        </div>
                                        <div class="position-absolute top-0 end-0 rotate-45"
                                            style="top: 15% !important; right: 18% !important;">
                                            <img class="w-24px text-gray-900 dark:text-white"
                                                src="{{ asset('assets/landing/images/template/star-2.svg') }}"
                                                alt="star-2" data-uc-svg>
                                        </div>
                                        <div class="position-absolute top-0 start-0 translate-middle-y -rotate-12"
                                            style="top: 15% !important; left: 10% !important;">
                                            <img class="w-64px d-block dark:d-none"
                                                src="{{ asset('assets/landing/images/template/icon-internet.svg') }}"
                                                alt="icon-internet">
                                            <img class="w-64px d-none dark:d-block"
                                                src="{{ asset('assets/landing/images/template/icon-internet-dark.svg') }}"
                                                alt="icon-internet-dark">
                                        </div>
                                        <div class="position-absolute top-0 start-0 translate-middle-y ms-n3"
                                            style="top: 65% !important; left: 0% !important;">
                                            <img class="w-64px d-block dark:d-none"
                                                src="{{ asset('assets/landing/images/template/icon-globe.svg') }}"
                                                alt="icon-globe">
                                            <img class="w-64px d-none dark:d-block"
                                                src="{{ asset('assets/landing/images/template/icon-globe-dark.svg') }}"
                                                alt="icon-globe-dark">
                                        </div>
                                        <div class="position-absolute top-0 end-0 translate-middle-y rotate-12"
                                            style="top: 80% !important; right: 12% !important;">
                                            <img class="w-64px d-block dark:d-none"
                                                src="{{ asset('assets/landing/images/template/icon-diamond.svg') }}"
                                                alt="icon-diamond">
                                            <img class="w-64px d-none dark:d-block"
                                                src="{{ asset('assets/landing/images/template/icon-diamond-dark.svg') }}"
                                                alt="icon-diamond-dark">
                                        </div>
                                        <div class="position-absolute top-0 end-0 translate-middle-y -rotate-12 me-n2"
                                            style="top: 35% !important;">
                                            <img class="w-64px d-block dark:d-none"
                                                src="{{ asset('assets/landing/images/template/icon-community.svg') }}"
                                                alt="icon-community">
                                            <img class="w-64px d-none dark:d-block"
                                                src="{{ asset('assets/landing/images/template/icon-community-dark.svg') }}"
                                                alt="icon-community-dark">
                                        </div>
                                    </div>
                                    <div class="panel py-4 px-2">
                                        <div class="panel vstack gap-3 w-100 sm:w-350px mx-auto text-center"
                                            data-anime="targets: >*; translateY: [24, 0]; opacity: [0, 1]; easing: easeInOutExpo; duration: 750; delay: anime.stagger(100);">
                                            <h1 class="h4 sm:h2">{{ __('Login') }}</h1>
                                            <form class="vstack gap-2" method="POST"
                                                action="{{ route('c.login', absolute: false) }}">
                                                @csrf
                                                <div class="text-start">
                                                    <input
                                                        class="form-control h-48px w-full bg-white dark:bg-opacity-0 dark:text-white dark:border-gray-300 dark:border-opacity-30"
                                                        type="email" placeholder="{{ __('Company ID') }}"
                                                        name="company_id" value="{{ old('company_id') }}">
                                                    @error('company_id')
                                                        <div class="text-danger">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                                <div class="text-start">
                                                    <input
                                                        class="form-control h-48px w-full bg-white dark:bg-opacity-0 dark:text-white dark:border-gray-300 dark:border-opacity-30"
                                                        type="email" placeholder="{{ __('Your email') }}"
                                                        name="email" value="{{ old('email') }}">
                                                    @error('email')
                                                        <div class="text-danger">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                                <button class="btn btn-primary btn-md text-white mt-2"
                                                    type="submit">{{ __('Continue') }}</button>
                                            </form>
                                            <p>
                                                {{ __('Don\'t have an account yet?') }}
                                                <a class="uc-link" href="{{ route('c.register') }}">
                                                    {{ __('Register') }}
                                                </a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
