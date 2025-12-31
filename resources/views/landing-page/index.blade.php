<x-guest-layout for="landing" :page="__('Landing Page')">
    <div id="wrapper" class="wrap">

        <!-- Section start -->
        <div id="hero_header" class="hero-header section panel overflow-hidden">
            <div class="position-absolute top-0 start-0 end-0 h-600px lg:h-screen bg-secondary dark:bg-gray-800 z-0">
            </div>
            <div class="position-absolute top-0 start-0 end-0 min-h-screen overflow-hidden d-none lg:d-block"
                data-anime="onview: -100; targets: img; scale: [0.8, 1]; opacity: [0, 1]; easing: spring(1, 80, 10, 0); duration: 450; delay: 350;">
                <div class="position-absolute top-0 start-0 rotate-45" style="top: 45% !important; left: 18% !important;">
                    <img class="w-32px text-gray-900 dark:text-white"
                        src="{{ asset('assets/landing/images/template/star-1.svg') }}" alt="star-1" data-uc-svg>
                </div>
                <div class="position-absolute top-0 end-0 rotate-45"
                    style="top: 20% !important; right: 18% !important;">
                    <img class="w-24px text-gray-900 dark:text-white"
                        src="{{ asset('assets/landing/images/template/star-2.svg') }}" alt="star-2" data-uc-svg>
                </div>
                <div class="position-absolute top-0 start-0 translate-middle-y -rotate-12"
                    style="top: 20% !important; left: 15% !important;">
                    <img class="w-56px xl:w-64px d-block dark:d-none"
                        src="{{ asset('assets/landing/images/template/icon-trophy.svg') }}" alt="icon-trophy">
                    <img class="w-56px xl:w-64px d-none dark:d-block"
                        src="{{ asset('assets/landing/images/template/icon-trophy-dark.svg') }}" alt="icon-trophy-dark">
                </div>
                <div class="position-absolute top-0 start-0 translate-middle-y rotate-45 ms-n3"
                    style="top: 35% !important;">
                    <img class="w-56px xl:w-64px d-block dark:d-none"
                        src="{{ asset('assets/landing/images/template/icon-location.svg') }}" alt="icon-location">
                    <img class="w-56px xl:w-64px d-none dark:d-block"
                        src="{{ asset('assets/landing/images/template/icon-location-dark.svg') }}"
                        alt="icon-location-dark">
                </div>
                <div class="position-absolute top-0 start-0 translate-middle-y"
                    style="top: 80% !important; left: 8% !important;">
                    <img class="w-56px xl:w-64px d-block dark:d-none"
                        src="{{ asset('assets/landing/images/template/icon-globe.svg') }}" alt="icon-globe">
                    <img class="w-56px xl:w-64px d-none dark:d-block"
                        src="{{ asset('assets/landing/images/template/icon-globe-dark.svg') }}" alt="icon-globe-dark">
                </div>
                <div class="position-absolute top-0 end-0 translate-middle-y rotate-45"
                    style="top: 50% !important; right: 18% !important;">
                    <img class="w-56px xl:w-64px d-block dark:d-none"
                        src="{{ asset('assets/landing/images/template/icon-crown.svg') }}" alt="icon-crown">
                    <img class="w-56px xl:w-64px d-none dark:d-block"
                        src="{{ asset('assets/landing/images/template/icon-crown-dark.svg') }}" alt="icon-crown-dark">
                </div>
                <div class="position-absolute top-0 end-0 translate-middle-y -rotate-45"
                    style="top: 80% !important; right: 8% !important;">
                    <img class="w-56px xl:w-64px d-block dark:d-none"
                        src="{{ asset('assets/landing/images/template/icon-diamond.svg') }}" alt="icon-diamond">
                    <img class="w-56px xl:w-64px d-none dark:d-block"
                        src="{{ asset('assets/landing/images/template/icon-diamond-dark.svg') }}"
                        alt="icon-diamond-dark">
                </div>
                <div class="position-absolute top-0 end-0 translate-middle-y -rotate-12 me-n3"
                    style="top: 35% !important;">
                    <img class="w-56px xl:w-64px d-block dark:d-none"
                        src="{{ asset('assets/landing/images/template/icon-chat.svg') }}" alt="icon-chat">
                    <img class="w-56px xl:w-64px d-none dark:d-block"
                        src="{{ asset('assets/landing/images/template/icon-chat-dark.svg') }}" alt="icon-chat-dark">
                </div>
            </div>
            <div class="section-outer panel pb-10 pt-9 lg:py-10">
                <div class="container max-w-xl">
                    <div class="section-inner panel">
                        <div class="vstack items-center gap-2 lg:gap-4 mt-2 sm:mt-4 lg:mt-0 mb-6 lg:mb-8 max-w-750px mx-auto text-center"
                            data-anime="targets: >*; translateY: [48, 0]; opacity: [0, 1]; easing: spring(1, 80, 10, 0); duration: 450; delay: anime.stagger(100, {start: 200});">
                            <h1 class="h2 sm:h1 lg:display-6 xl:display-4 m-0">
                                The #1 Choice for
                                <br class="d-none lg:d-block">
                                Class Management Software
                            </h1>
                            <p class="fs-6 sm:fs-5 text-dark dark:text-white text-opacity-70">
                                Effortlessly manage classes, customers, and instructors
                                <br class="d-none sm:d-block">
                                while growing your swim school, gym, dance studio, or music
                                <br class="d-none sm:d-block">
                                program with the industry's top class management software.
                            </p>
                            <div class="vstack sm:hstack justify-center gap-1 lg:gap-2 mt-1 sm:mt-2">
                                <a href="{{ route('c.register') }}" class="btn btn-md lg:btn-lg btn-primary text-white">
                                    {{ __('Start free trial') }}
                                </a>
                                <a href="{{ route('c.register') }}"
                                    class="btn btn-md lg:btn-lg dark:text-white border-gray-900 dark:border-white border-opacity-20 hover:border-opacity-40"
                                    data-uc-toggle>
                                    {{ __('Request a demo') }}
                                </a>
                            </div>
                            <p class="text-dark dark:text-white text-opacity-70 sm:mt-1 lg:mt-0">
                                {{ __('No credit card required.') }}
                            </p>
                        </div>
                        <div class="hero-scene panel max-w-950px mx-auto"
                            data-anime="targets: > *; scale: [0.9, 1]; opacity: [0, 1]; easing: spring(1, 80, 10, 0); duration: 450; delay: anime.stagger(100, {start: 750});">
                            <div
                                class="panel text-center overflow-hidden rounded-3 border border-5 border-dark dark:border-white dark:border-opacity-20">
                                <img src="{{ asset('assets/landing/images/template/dashboard.jpg') }}"
                                    alt="Main hero image">
                            </div>
                            <div class="position-absolute bottom-0 ltr:end-0 rtl:start-0 ltr:me-n8 rtl:ms-n8 mb-n8">
                                <img class="w-200px d-block dark:d-none"
                                    src="{{ asset('assets/landing/images/template/sitting.svg') }}" alt="sitting">
                                <img class="w-200px d-none dark:d-block"
                                    src="{{ asset('assets/landing/images/template/sitting-dark.svg') }}"
                                    alt="sitting-dark">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="trusted_brands" class="trusted-brands section panel">
            <div class="section-outer panel pb-4 lg:pb-6">
                <div class="container max-w-xl">
                    <div class="section-inner panel">
                        <div class="review-brands panel vstack justify-center gap-2 px-3 py-4 sm:px-4 sm:py-6 lg:p-6 text-center rounded-3 bg-secondary dark:bg-gray-800 overflow-hidden"
                            data-anime="onview: -100; translateY: [48, 0]; opacity: [0, 1]; easing: spring(1, 80, 10, 0); duration: 450; delay: 250;">
                            <h3 class="title h4 sm:h3 lg:h2 m-0">Trusted for overall simplicity</h3>
                            <div class="vstack sm:hstack justify-center gap-1 fs-6 text-gray-900 dark:text-white">
                                <div class="rating panel">
                                    <div class="hstack justify-center gap-0">
                                        <i class="icon unicon-star-filled"></i>
                                        <i class="icon unicon-star-filled"></i>
                                        <i class="icon unicon-star-filled"></i>
                                        <i class="icon unicon-star-filled"></i>
                                        <i class="icon unicon-star-filled"></i>
                                    </div>
                                </div>
                                <span class="desc rtl:order-first">Based on 4,000+ reviews with customer satisfaction
                                    on</span>
                            </div>
                            <div class="panel mt-3 sm:mt-4">
                                <div class="brands hstack gap-4 justify-between max-w-950px mx-auto">
                                    <img src="{{ asset('assets/landing/images/review-logo/01.svg') }}"
                                        alt="Trustpilot" class="dark:d-none">
                                    <img src="{{ asset('assets/landing/images/review-logo/dark-01.svg') }}"
                                        alt="Trustpilot" class="d-none dark:d-block">
                                    <img src="{{ asset('assets/landing/images/review-logo/02.svg') }}"
                                        alt="Trustpilot" class="dark:d-none">
                                    <img src="{{ asset('assets/landing/images/review-logo/dark-02.svg') }}"
                                        alt="Trustpilot" class="d-none dark:d-block">
                                    <img src="{{ asset('assets/landing/images/review-logo/03.svg') }}"
                                        alt="Trustpilot" class="dark:d-none">
                                    <img src="{{ asset('assets/landing/images/review-logo/dark-03.svg') }}"
                                        alt="Trustpilot" class="d-none dark:d-block">
                                    <img src="{{ asset('assets/landing/images/review-logo/04.svg') }}"
                                        alt="Trustpilot" class="dark:d-none">
                                    <img src="{{ asset('assets/landing/images/review-logo/dark-04.svg') }}"
                                        alt="Trustpilot" class="d-none dark:d-block">
                                    <img src="{{ asset('assets/landing/images/review-logo/05.svg') }}"
                                        alt="Trustpilot" class="dark:d-none">
                                    <img src="{{ asset('assets/landing/images/review-logo/dark-05.svg') }}"
                                        alt="Trustpilot" class="d-none dark:d-block">
                                    <img src="{{ asset('assets/landing/images/review-logo/06.svg') }}"
                                        alt="Trustpilot" class="dark:d-none">
                                    <img src="{{ asset('assets/landing/images/review-logo/dark-06.svg') }}"
                                        alt="Trustpilot" class="d-none dark:d-block">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Section end -->

        <!-- Section start -->
        <div id="main_features" class="main-features section panel">
            <div class="section-outer panel py-6 xl:py-9">
                <div class="container sm:max-w-md lg:max-w-lg xl:max-w-xl">
                    <div class="section-inner panel">
                        <div class="panel vstack gap-4 sm:gap-6 lg:gap-8">
                            <div class="feature-item panel"
                                data-anime="onview: -200; translateY: [48, 0]; opacity: [0, 1]; easing: spring(1, 80, 10, 0); duration: 450; delay: 100;">
                                <div class="row child-cols col-match justify-between g-4 lg:g-8 xl:g-10">
                                    <div class="col-12 sm:col-6 order-0 lg:order-1">
                                        <div class="panel w-100">
                                            <img src="{{ asset('assets/landing/images/template/feature-01.svg') }}"
                                                alt="Share tools quickly and confidently in minutes"
                                                class="rounded-2">
                                        </div>
                                    </div>
                                    <div class="col-12 sm:col-6 order-1 lg:order-0">
                                        <div class="panel vstack justify-between gap-4 sm:gap-6 h-100">
                                            <div>
                                                <div class="panel vstack gap-2">
                                                    <span class="fs-6 fw-bold m-0 text-primary">01.</span>
                                                    <h3 class="h4 lg:h3 xl:h2 m-0">Share tools quickly and confidently
                                                        in minutes</h3>
                                                    <p class="fs-6 xl:fs-5 opacity-70 dark:opacity-80">This powerfull
                                                        tool eliminates the need to leave Salesforce to get things done
                                                        as I can create a custom proposal with dynamic pricing tables.
                                                        You can also customize your own dynamic versions.</p>
                                                </div>
                                            </div>
                                            <div>
                                                <div class="p-3 panel vstack gap-3 rounded border">
                                                    <p class="fs-6 dark:text-white">“Most of our time used to be taken
                                                        up by administrative work whereas now we can focus on building
                                                        out programs to help our employees.”</p>
                                                    <div class="panel hstack gap-1">
                                                        <img class="w-40px rounded-circle"
                                                            src="{{ asset('assets/landing/images/avatars/01.png') }}"
                                                            alt="Mark Zellers">
                                                        <div class="panel vstack items-start gap-0">
                                                            <h6 class="h6 m-0">Mark Zellers</h6>
                                                            <span class="fs-7 opacity-70">Director of Human
                                                                Resources.</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr class="border-gray-100 dark:border-opacity-15 m-0 opacity-100"
                                data-anime="onview: -200; width: [0, '100%']; easing: easeInOutExpo; duration: 750; delay: 100;">
                            <div class="feature-item panel"
                                data-anime="onview: -200; translateY: [48, 0]; opacity: [0, 1]; easing: spring(1, 80, 10, 0); duration: 450; delay: 100;">
                                <div class="row child-cols col-match justify-between g-4 lg:g-8 xl:g-10">
                                    <div class="col-12 sm:col-6 order-0 lg:order-1">
                                        <div class="panel w-100">
                                            <img src="{{ asset('assets/landing/images/template/feature-02.svg') }}"
                                                alt="Connect every part of your entire business" class="rounded-2">
                                        </div>
                                    </div>
                                    <div class="col-12 sm:col-6 order-1 lg:order-0">
                                        <div class="panel vstack justify-between gap-4 sm:gap-6 h-100">
                                            <div>
                                                <div class="panel vstack gap-2">
                                                    <span class="fs-6 fw-bold m-0 text-primary">02.</span>
                                                    <h3 class="h4 lg:h3 xl:h2 m-0">Connect every part of your entire
                                                        business</h3>
                                                    <p class="fs-6 xl:fs-5 opacity-70 dark:opacity-80">Keep data
                                                        consistent, with native CRM integrations that streamline your
                                                        entire Tool workflow.</p>
                                                    <a href="#" class="uc-link fw-bold hstack gap-narrow">
                                                        <span>See all integrations</span>
                                                        <i
                                                            class="position-relative icon icon-1 unicon-arrow-right rtl:rotate-180 translate-y-px"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <div>
                                                <div class="p-3 panel vstack gap-3 rounded border">
                                                    <p class="fs-6 dark:text-white">“I can create a custom proposal
                                                        with dynamic pricing tables, and get approval from my boss all
                                                        within 36 minutes.”</p>
                                                    <div class="panel hstack gap-1">
                                                        <img class="w-40px rounded-circle"
                                                            src="{{ asset('assets/landing/images/avatars/02.png') }}"
                                                            alt="Matt Henderson">
                                                        <div class="panel vstack items-start gap-0">
                                                            <h6 class="h6 m-0">Matt Henderson</h6>
                                                            <span class="fs-7 opacity-70">Client Success Manager</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr class="border-gray-100 dark:border-opacity-15 m-0 opacity-100"
                                data-anime="onview: -200; width: [0, '100%']; easing: easeInOutExpo; duration: 750; delay: 100;">
                            <div class="feature-item panel"
                                data-anime="onview: -200; translateY: [48, 0]; opacity: [0, 1]; easing: spring(1, 80, 10, 0); duration: 450; delay: 100;">
                                <div class="row child-cols col-match justify-between g-4 lg:g-8 xl:g-10">
                                    <div class="col-12 sm:col-6 order-0 lg:order-1">
                                        <div class="panel w-100">
                                            <img src="{{ asset('assets/landing/images/template/feature-03.svg') }}"
                                                alt="Maintain compliance and control your apps" class="rounded-2">
                                        </div>
                                    </div>
                                    <div class="col-12 sm:col-6 order-1 lg:order-0">
                                        <div class="panel vstack justify-between gap-4 sm:gap-6 h-100">
                                            <div>
                                                <div class="panel vstack gap-2">
                                                    <span class="fs-6 fw-bold m-0 text-primary">03.</span>
                                                    <h3 class="h4 lg:h3 xl:h2 m-0">Maintain compliance and control your
                                                        apps</h3>
                                                    <p class="fs-6 xl:fs-5 opacity-70 dark:opacity-80">Improve security
                                                        and trust with built-in legally binding e-Signatures. Create
                                                        pre-approved templates, content blocks and lock all legal
                                                        information to prevent costly mistakes.</p>
                                                </div>
                                            </div>
                                            <div>
                                                <div class="p-3 panel vstack gap-3 rounded border">
                                                    <p class="fs-6 dark:text-white">“This powerfull tool eliminates the
                                                        need to leave Salesforce to get things done.”</p>
                                                    <div class="panel hstack gap-1">
                                                        <img class="w-40px rounded-circle"
                                                            src="{{ asset('assets/landing/images/avatars/04.png') }}"
                                                            alt="Natalia Larsson">
                                                        <div class="panel vstack items-start gap-0">
                                                            <h6 class="h6 m-0">Natalia Larsson</h6>
                                                            <span class="fs-7 opacity-70">Director of Sales
                                                                Operations</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr class="border-gray-100 dark:border-opacity-15 m-0 opacity-100"
                                data-anime="onview: -200; width: [0, '100%']; easing: easeInOutExpo; duration: 750; delay: 100;">
                            <div class="feature-item panel"
                                data-anime="onview: -200; translateY: [48, 0]; opacity: [0, 1]; easing: spring(1, 80, 10, 0); duration: 450; delay: 100;">
                                <div class="row child-cols col-match justify-between g-4 lg:g-8 xl:g-10">
                                    <div class="col-12 sm:col-6 order-0 lg:order-1">
                                        <div class="panel w-100">
                                            <img src="{{ asset('assets/landing/images/template/feature-04.svg') }}"
                                                alt="Review quickly and confidently" class="rounded-2">
                                        </div>
                                    </div>
                                    <div class="col-12 sm:col-6 order-1 lg:order-0">
                                        <div class="panel vstack justify-between gap-4 sm:gap-6 h-100">
                                            <div>
                                                <div class="panel vstack gap-2">
                                                    <span class="fs-6 fw-bold m-0 text-primary">04.</span>
                                                    <h3 class="h4 lg:h3 xl:h2 m-0">Review quickly and confidently</h3>
                                                    <p class="fs-6 xl:fs-5 opacity-70 dark:opacity-80">Get real-time
                                                        access to approvals, comments and version tracking. Smart
                                                        features like variables and conditional logic help you eliminate
                                                        Tool errors.</p>
                                                </div>
                                            </div>
                                            <div>
                                                <div class="p-3 panel vstack gap-3 rounded border">
                                                    <p class="fs-6 dark:text-white">“We are based in Europe and the
                                                        latest Data Protection Regulation forces us to look for service
                                                        suppliers than comply with this regulation.”</p>
                                                    <div class="panel hstack gap-1">
                                                        <img class="w-40px rounded-circle"
                                                            src="{{ asset('assets/landing/images/avatars/03.png') }}"
                                                            alt="Sarah Edrissi">
                                                        <div class="panel vstack items-start gap-0">
                                                            <h6 class="h6 m-0">Sarah Edrissi</h6>
                                                            <span class="fs-7 opacity-70">Lead Marketing</span>
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
                </div>
            </div>
        </div>

        <!-- Section end -->

        <!-- Section start -->
        <div id="key_features" class="key-features section panel overflow-hidden bg-gray-900 uc-dark">
            <div class="section-outer panel py-6 xl:py-9 dark:bg-gray-800">
                <div class="container sm:max-w-md lg:max-w-lg">
                    <div class="section-inner panel">
                        <div class="panel vstack gap-4 sm:gap-6 xl:gap-8">
                            <h2 class="title h3 lg:h2 xl:h1 m-0 text-center max-w-550px mx-auto"
                                data-anime="onview: -100; translateY: [48, 0]; opacity: [0, 1]; easing: spring(1, 80, 10, 0); duration: 450; delay: 250;">
                                Review quickly and confidently using <span class="text-primary">Lexend.</span></h2>
                            <div class="panel">
                                <div class="row child-cols-12 sm:child-cols-6 lg:child-cols-4 col-match g-3"
                                    data-anime="onview: -100; targets: >*; translateY: [48, 0]; opacity: [0, 1]; easing: spring(1, 80, 10, 0); duration: 450; delay: anime.stagger(100, {start: 200});">
                                    <div>
                                        <div
                                            class="feature-item panel p-4 border rounded-2 hover:bg-white dark:hover:bg-secondary dark:text-white dark:hover:text-gray-900 hover:scale-105 duration-150 transition-all">
                                            <div class="vstack panel min-h-250px">
                                                <i
                                                    class="position-absolute top-0 ltr:end-0 rtl:start-0 icon-2 unicon-arrow-up-right rtl:-rotate-90"></i>
                                                <div class="vstack justify-between gap-2 h-100">
                                                    <i class="icon icon-4 unicon-document"></i>
                                                    <div class="panel">
                                                        <div class="vstack gap-1">
                                                            <h3 class="title h5 m-0 text-inherit">Proposals</h3>
                                                            <p class="desc fs-6 opacity-70">Share Tools in minutes with
                                                                pre-built, customizable templates.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <a href="page-features.html" class="position-cover"></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <div
                                            class="feature-item panel p-4 border rounded-2 hover:bg-white dark:hover:bg-secondary dark:text-white dark:hover:text-gray-900 hover:scale-105 duration-150 transition-all">
                                            <div class="vstack panel min-h-250px">
                                                <i
                                                    class="position-absolute top-0 ltr:end-0 rtl:start-0 icon-2 unicon-arrow-up-right rtl:-rotate-90"></i>
                                                <div class="vstack justify-between gap-2 h-100">
                                                    <i class="icon icon-4 unicon-model"></i>
                                                    <div class="panel">
                                                        <div class="vstack gap-1">
                                                            <h3 class="title h5 m-0 text-inherit">Quotes</h3>
                                                            <p class="desc fs-6 opacity-70">Find out in real time when
                                                                they’re opened, viewed and signed.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <a href="page-features.html" class="position-cover"></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <div
                                            class="feature-item panel p-4 border rounded-2 hover:bg-white dark:hover:bg-secondary dark:text-white dark:hover:text-gray-900 hover:scale-105 duration-150 transition-all">
                                            <div class="vstack panel min-h-250px">
                                                <i
                                                    class="position-absolute top-0 ltr:end-0 rtl:start-0 icon-2 unicon-arrow-up-right rtl:-rotate-90"></i>
                                                <div class="vstack justify-between gap-2 h-100">
                                                    <i class="icon icon-4 unicon-task-approved"></i>
                                                    <div class="panel">
                                                        <div class="vstack gap-1">
                                                            <h3 class="title h5 m-0 text-inherit">Contracts</h3>
                                                            <p class="desc fs-6 opacity-70">Use our native CRM
                                                                integrations to pull customer data into your Tools fast.
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <a href="page-features.html" class="position-cover"></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <div
                                            class="feature-item panel p-4 border rounded-2 hover:bg-white dark:hover:bg-secondary dark:text-white dark:hover:text-gray-900 hover:scale-105 duration-150 transition-all">
                                            <div class="vstack panel min-h-250px">
                                                <i
                                                    class="position-absolute top-0 ltr:end-0 rtl:start-0 icon-2 unicon-arrow-up-right rtl:-rotate-90"></i>
                                                <div class="vstack justify-between gap-2 h-100">
                                                    <i class="icon icon-4 unicon-touch-interaction"></i>
                                                    <div class="panel">
                                                        <div class="vstack gap-1">
                                                            <h3 class="title h5 m-0 text-inherit">eSignatures</h3>
                                                            <p class="desc fs-6 opacity-70">Keep your data secure with
                                                                our legally-binding e-Signature software.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <a href="page-features.html" class="position-cover"></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <div
                                            class="feature-item panel p-4 border rounded-2 hover:bg-white dark:hover:bg-secondary dark:text-white dark:hover:text-gray-900 hover:scale-105 duration-150 transition-all">
                                            <div class="vstack panel min-h-250px">
                                                <i
                                                    class="position-absolute top-0 ltr:end-0 rtl:start-0 icon-2 unicon-arrow-up-right rtl:-rotate-90"></i>
                                                <div class="vstack justify-between gap-2 h-100">
                                                    <i class="icon icon-4 unicon-sub-volume"></i>
                                                    <div class="panel">
                                                        <div class="vstack gap-1">
                                                            <h3 class="title h5 m-0 text-inherit">Forms</h3>
                                                            <p class="desc fs-6 opacity-70">Share via direct link or
                                                                by embedding them on your website, no coding necessary.
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <a href="page-features.html" class="position-cover"></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <div
                                            class="feature-item panel p-4 border rounded-2 hover:bg-white dark:hover:bg-secondary dark:text-white dark:hover:text-gray-900 hover:scale-105 duration-150 transition-all">
                                            <div class="vstack panel min-h-250px">
                                                <i
                                                    class="position-absolute top-0 ltr:end-0 rtl:start-0 icon-2 unicon-arrow-up-right rtl:-rotate-90"></i>
                                                <div class="vstack justify-between gap-2 h-100">
                                                    <i class="icon icon-4 unicon-currency"></i>
                                                    <div class="panel">
                                                        <div class="vstack gap-1">
                                                            <h3 class="title h5 m-0 text-inherit">Payments</h3>
                                                            <p class="desc fs-6 opacity-70">Collect them instantly
                                                                right from your contract, while increasing your close
                                                                rate by 36%.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <a href="page-features.html" class="position-cover"></a>
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

        <!-- Section end -->

        <!-- Section start -->
        <div id="pricing_tiers" class="pricing-tiers section panel overflow-hidden">
            <div class="section-outer panel py-6 xl:py-9">
                <div class="container sm:max-w-lg xl:max-w-xl">
                    <div class="section-inner panel">
                        <div class="panel vstack gap-4 sm:gap-6 xl:gap-8">
                            <div class="heading panel max-w-550px mx-auto text-center"
                                data-anime="onview: -100; targets: >*; translateY: [48, 0]; opacity: [0, 1]; easing: spring(1, 80, 10, 0); duration: 450; delay: anime.stagger(100, {start: 200});">
                                <h2 class="title h3 lg:h2 xl:h1">Simple, scalable pricing.</h2>
                                <p class="fs-6 xl:fs-5 text-dark dark:text-white text-opacity-70">No extra charges. No
                                    hidden fees.</p>
                            </div>
                            <div class="content panel">
                                <div class="row child-cols-12 sm:child-cols-6 xl:child-cols-4 col-match justify-center g-2 lg:g-4"
                                    data-anime="onview: -100; targets: >*; translateY: [48, 0]; opacity: [0, 1]; easing: spring(1, 80, 10, 0); duration: 450; delay: anime.stagger(100, {start: 400});">
                                    <div>
                                        <div
                                            class="tier panel vstack gap-2 xl:gap-4 px-3 py-4 sm:p-4 lg:p-6 rounded lg:rounded-2 bg-secondary dark:bg-gray-800">
                                            <div class="panel">
                                                <h3 class="title h5 sm:h4 dark:text-white">Essentials</h3>
                                                <p class="desc dark:text-whiteopacity-70 dark:opacity-80">For creating
                                                    impressive tools that generate results.</p>
                                            </div>
                                            <div class="panel">
                                                <div class="panel vstack gap-narrow">
                                                    <h5 class="title h3 sm:h2 m-0 dark:text-white">$19 USD</h5>
                                                    <span class="fs-7 opacity-70">Seat per month, 2 seats max</span>
                                                    <div class="vstack gap-1 justify-center text-center mt-3">
                                                        <a href="sign-up.html"
                                                            class="btn btn-md sm:btn-sm lg:btn-md btn-primary text-white">Start
                                                            a free trial</a>
                                                        <span class="fs-7 opacity-70 min-h-24px">No credit card
                                                            required</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="panel">
                                                <div class="panel vstack gap-2">
                                                    <span class="fs-6 fw-bold dark:text-white">Key features:</span>
                                                    <div class="hstack gap-1 fs-7">
                                                        <i
                                                            class="cstack w-16px h-16px bg-primary text-white rounded-circle unicon-checkmark fw-bold"></i>
                                                        <span>Real-time tracking and notifications</span>
                                                    </div>
                                                    <div class="hstack gap-1 fs-7">
                                                        <i
                                                            class="cstack w-16px h-16px bg-primary text-white rounded-circle unicon-checkmark fw-bold"></i>
                                                        <span>Real-time analytics</span>
                                                    </div>
                                                    <div class="hstack gap-1 fs-7">
                                                        <i
                                                            class="cstack w-16px h-16px bg-primary text-white rounded-circle unicon-checkmark fw-bold"></i>
                                                        <span>Drag and drop templates</span>
                                                    </div>
                                                    <div class="hstack gap-1 fs-7">
                                                        <i
                                                            class="cstack w-16px h-16px bg-primary text-white rounded-circle unicon-checkmark fw-bold"></i>
                                                        <span>Project Management</span>
                                                    </div>
                                                    <div class="hstack gap-1 fs-7">
                                                        <i
                                                            class="cstack w-16px h-16px bg-primary text-white rounded-circle unicon-checkmark fw-bold"></i>
                                                        <span>24/7 email and chat support</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <div
                                            class="tier panel vstack gap-2 xl:gap-4 px-3 py-4 sm:p-4 lg:p-6 rounded lg:rounded-2 bg-secondary dark:bg-gray-800">
                                            <span
                                                class="position-absolute top-0 ltr:end-0 rtl:start-0 m-2 d-inline-flex py-narrow px-1 bg-primary rounded-1 text-white fs-7 fw-medium">Popular</span>
                                            <div class="panel">
                                                <h3 class="title h5 sm:h4 dark:text-white">Business</h3>
                                                <p class="desc dark:text-whiteopacity-70 dark:opacity-80">For seamless
                                                    integrations and sending tools in bulk.</p>
                                            </div>
                                            <div class="panel">
                                                <div class="panel vstack gap-narrow">
                                                    <h5 class="title h3 sm:h2 m-0 dark:text-white">$49 USD</h5>
                                                    <span class="fs-7 opacity-70">Seat cost per month</span>
                                                    <div class="vstack gap-1 justify-center text-center mt-3">
                                                        <a href="sign-up.html"
                                                            class="btn btn-md sm:btn-sm lg:btn-md btn-primary text-white">Start
                                                            a free trial</a>
                                                        <span class="fs-7 opacity-70 min-h-24px">No credit card
                                                            required</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="panel">
                                                <div class="panel vstack gap-2">
                                                    <span class="fs-6 fw-bold dark:text-white">Everything in
                                                        Essentials, plus:</span>
                                                    <div class="hstack gap-1 fs-7">
                                                        <i
                                                            class="cstack w-16px h-16px bg-primary text-white rounded-circle unicon-checkmark fw-bold"></i>
                                                        <span>CRM and Zapier integrations</span>
                                                    </div>
                                                    <div class="hstack gap-1 fs-7">
                                                        <i
                                                            class="cstack w-16px h-16px bg-primary text-white rounded-circle unicon-checkmark fw-bold"></i>
                                                        <span>CContent reporting</span>
                                                    </div>
                                                    <div class="hstack gap-1 fs-7">
                                                        <i
                                                            class="cstack w-16px h-16px bg-primary text-white rounded-circle unicon-checkmark fw-bold"></i>
                                                        <span>Unlimited team workspaces</span>
                                                    </div>
                                                    <div class="hstack gap-1 fs-7">
                                                        <i
                                                            class="cstack w-16px h-16px bg-primary text-white rounded-circle unicon-checkmark fw-bold"></i>
                                                        <span>Approval workflows</span>
                                                    </div>
                                                    <div class="hstack gap-1 fs-7">
                                                        <i
                                                            class="cstack w-16px h-16px bg-primary text-white rounded-circle unicon-checkmark fw-bold"></i>
                                                        <span>Salesforce integration*</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div
                                                class="position-absolute bottom-0 ltr:end-0 rtl:start-0 m-2 d-none md:d-block">
                                                <img class="w-100px lg:w-128px d-block dark:d-none"
                                                    src="{{ asset('assets/landing/images/template/money.svg') }}"
                                                    alt="money">
                                                <img class="w-100px lg:w-128px d-none dark:d-block"
                                                    src="{{ asset('assets/landing/images/template/money-dark.svg') }}"
                                                    alt="money-dark">
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <div
                                            class="tier panel vstack gap-2 xl:gap-4 px-3 py-4 sm:p-4 lg:p-6 rounded lg:rounded-2 bg-secondary dark:bg-gray-800">
                                            <div class="panel">
                                                <h3 class="title h5 sm:h4 dark:text-white">Enterprise</h3>
                                                <p class="desc dark:text-whiteopacity-70 dark:opacity-80">For large
                                                    companies with complex Tool workflows.</p>
                                            </div>
                                            <div class="panel">
                                                <div class="panel vstack gap-narrow">
                                                    <h5 class="title h3 sm:h2 m-0 dark:text-white">Let’s talk</h5>
                                                    <span class="fs-7 opacity-70">Per‑seat or per‑tool pricing</span>
                                                    <div class="vstack gap-1 justify-center text-center mt-3">
                                                        <a href="page-contact.html"
                                                            class="btn btn-md sm:btn-sm lg:btn-md btn-dark text-white dark:bg-white dark:text-dark dark:hover:bg-secondary">Contact
                                                            sales</a>
                                                        <span class="fs-7 opacity-70 min-h-24px">Respond within 24 hrs
                                                            max</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="panel">
                                                <div class="panel vstack gap-2">
                                                    <span class="fs-6 fw-bold dark:text-white">Everything in Business,
                                                        plus:</span>
                                                    <div class="hstack gap-1 fs-7">
                                                        <i
                                                            class="cstack w-16px h-16px bg-primary text-white rounded-circle unicon-checkmark fw-bold"></i>
                                                        <span>Unlimited files uploads</span>
                                                    </div>
                                                    <div class="hstack gap-1 fs-7">
                                                        <i
                                                            class="cstack w-16px h-16px bg-primary text-white rounded-circle unicon-checkmark fw-bold"></i>
                                                        <span>Real-time tracking and notifications</span>
                                                    </div>
                                                    <div class="hstack gap-1 fs-7">
                                                        <i
                                                            class="cstack w-16px h-16px bg-primary text-white rounded-circle unicon-checkmark fw-bold"></i>
                                                        <span>User performance</span>
                                                    </div>
                                                    <div class="hstack gap-1 fs-7">
                                                        <i
                                                            class="cstack w-16px h-16px bg-primary text-white rounded-circle unicon-checkmark fw-bold"></i>
                                                        <span>SSO support and custom user roles</span>
                                                    </div>
                                                    <div class="hstack gap-1 fs-7">
                                                        <i
                                                            class="cstack w-16px h-16px bg-primary text-white rounded-circle unicon-checkmark fw-bold"></i>
                                                        <span>Bulk send & Forms*</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <p class="text-center text-gray-900 dark:text-white text-opacity-70"
                                data-anime="onview: -100; translateY: [48, 0]; opacity: [0, 1]; easing: spring(1, 80, 10, 0); duration: 450; delay: 200;">
                                Prices exclude any applicable taxes.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Section end -->

        <!-- Section start -->
        <div id="clients_feedback" class="clients-feedback section panel overflow-hidden">
            <div class="section-outer panel">
                <div class="container max-w-lg">
                    <div class="section-inner panel swiper-parent"
                        data-anime="onview: -100; targets: >*; translateY: [48, 0]; opacity: [0, 1]; easing: spring(1, 80, 10, 0); duration: 450; delay: anime.stagger(100, {start: 200});">
                        <h2 class="h4 sm:h3 lg:h2 m-0 text-center">What clients said:</h2>
                        <div class="panel p-3 lg:p-6 bg-secondary dark:bg-gray-800 rounded-3 mt-4 sm:mt-6">
                            <div class="row child-cols-12 sm:child-cols-6 col-match g-3 lg:g-8">
                                <div>
                                    <div class="panel rounded-2 overflow-hidden">
                                        <div class="swiper connect-image"
                                            data-uc-swiper="items: 1; autoplay: 5000; dots: .swiper-pagination; effect: fade; fade: true; allowTouchMove: false; disableOnInteraction: true;">
                                            <div class="swiper-wrapper">
                                                <div class="swiper-slide">
                                                    <figure
                                                        class="featured-image m-0 rounded ratio ratio-3x4  uc-transition-toggle overflow-hidden">
                                                        <img class="media-cover image uc-transition-scale-up uc-transition-opaque"
                                                            src="{{ asset('assets/landing/images/portrait/01.jpg') }}"
                                                            alt="Mark Zellers">
                                                    </figure>
                                                </div>
                                                <div class="swiper-slide">
                                                    <figure
                                                        class="featured-image m-0 rounded ratio ratio-3x4  uc-transition-toggle overflow-hidden">
                                                        <img class="media-cover image uc-transition-scale-up uc-transition-opaque"
                                                            src="{{ asset('assets/landing/images/portrait/02.jpg') }}"
                                                            alt="André Garcia">
                                                    </figure>
                                                </div>
                                                <div class="swiper-slide">
                                                    <figure
                                                        class="featured-image m-0 rounded ratio ratio-3x4  uc-transition-toggle overflow-hidden">
                                                        <img class="media-cover image uc-transition-scale-up uc-transition-opaque"
                                                            src="{{ asset('assets/landing/images/portrait/03.jpg') }}"
                                                            alt="Matt Henderson">
                                                    </figure>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div class="panel">
                                        <div class="swiper h-100"
                                            data-uc-swiper="connect: .connect-image; items: 1; autoplay: 5000; dots: .swiper-pagination; effect: fade; fade: true;">
                                            <div class="swiper-wrapper">
                                                <div class="swiper-slide h-100">
                                                    <div
                                                        class="panel vstack justify-between items-center gap-2 lg:gap-4 h-100 text-center">
                                                        <div class="panel">
                                                            <i class="icon icon-4 unicon-quotes text-primary"></i>
                                                            <p
                                                                class="fs-6 sm:fs-5 lg:fs-4 fw-bold mt-1 sm:mt-4 dark:text-white">
                                                                “Most of our time used to be taken up by administrative
                                                                work whereas now we can focus on building out programs
                                                                to help our employees. <br> Lorem ipsum dolor sit amet
                                                                consectetur adipisicing elit. Quas nisi consectetur
                                                                adipisci eaque. Porro, atque.”</p>
                                                        </div>
                                                        <div class="panel pt-3">
                                                            <div class="panel vstack items-center gap-narrow">
                                                                <h6 class="h5 m-0">Mark Zellers</h6>
                                                                <span class="fs-6 opacity-70">Director of Human
                                                                    Resources.</span>
                                                            </div>
                                                            <div class="panel mt-6">
                                                                <div
                                                                    class="swiper-pagination text-primary m-0 justify-center">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="swiper-slide h-100">
                                                    <div
                                                        class="panel vstack justify-between items-center gap-2 lg:gap-4 h-100 text-center">
                                                        <div class="panel">
                                                            <i class="icon icon-4 unicon-quotes text-primary"></i>
                                                            <p
                                                                class="fs-6 sm:fs-5 lg:fs-4 fw-bold mt-1 sm:mt-4 dark:text-white">
                                                                “I can create a custom proposal with dynamic pricing
                                                                tables, and get approval from my boss all within 36
                                                                minutes and looks fantastic. <br> Dolor sit amet
                                                                consectetur adipisicing elit. Quas nisi consectetur
                                                                adipisci eaque. Porro, atque.”</p>
                                                        </div>
                                                        <div class="panel pt-3">
                                                            <div class="panel vstack items-center gap-narrow">
                                                                <h6 class="h5 m-0">André Garcia</h6>
                                                                <span class="fs-6 opacity-70">Client Success
                                                                    Manager</span>
                                                            </div>
                                                            <div class="panel mt-6">
                                                                <div
                                                                    class="swiper-pagination text-primary m-0 justify-center">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="swiper-slide h-100">
                                                    <div
                                                        class="panel vstack justify-between items-center gap-2 lg:gap-4 h-100 text-center">
                                                        <div class="panel">
                                                            <i class="icon icon-4 unicon-quotes text-primary"></i>
                                                            <p
                                                                class="fs-6 sm:fs-5 lg:fs-4 fw-bold mt-1 sm:mt-4 dark:text-white">
                                                                “This powerfull tool eliminates the need to leave
                                                                Salesforce to get things done, <br> quas libero placeat
                                                                voluptates sed sequi? Corporis, earum vitae. <br>
                                                                Tempore pariatur dignissimos coming for great tool of
                                                                repellat quae a eaque culpa iusto fugit.”</p>
                                                        </div>
                                                        <div class="panel pt-3">
                                                            <div class="panel vstack items-center gap-narrow">
                                                                <h6 class="h5 m-0">Matt Henderson</h6>
                                                                <span class="fs-6 opacity-70">Director of Sales
                                                                    Operations</span>
                                                            </div>
                                                            <div class="panel mt-6">
                                                                <div
                                                                    class="swiper-pagination text-primary m-0 justify-center">
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
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Section end -->

        <!-- Section start -->
        <div id="clients_brands" class="clients-brands section panel overflow-hidden">
            <div class="section-outer panel pt-6 pb-8 sm:pt-8 sm:pb-9 xl:py-9">
                <h5 class="h6 sm:h5 text-center mb-4 sm:mb-6 xl:mb-8"
                    data-anime="onview: -100; translateY: [48, 0]; opacity: [0, 1]; easing: spring(1, 80, 10, 0); duration: 450; delay: 200;">
                    Trusted by well-known brands.</h5>
                <div class="block-panel panel"
                    data-anime="onview: -100; translateY: [48, 0]; opacity: [0, 1]; easing: spring(1, 80, 10, 0); duration: 450; delay: 250;">
                    <div class="element-brands max-w-950px m-auto text-gray-900 dark:text-white ">
                        <div class="swiper" data-uc-swiper="items: 2; center: true; center-bounds: true;"
                            data-uc-swiper-s="items: 4; center: false; center-bounds: false;"
                            data-uc-swiper-m="items: 5; gap: 80;">
                            <div class="swiper-wrapper items-center ease-linear">
                                <div class="brand-item swiper-slide text-center">
                                    <img class="brand-item-image h-40px"
                                        src="{{ asset('assets/landing/images/brands/brand-01.svg') }}" alt="Proline"
                                        data-uc-svg>
                                </div>
                                <div class="brand-item swiper-slide text-center">
                                    <img class="brand-item-image h-40px"
                                        src="{{ asset('assets/landing/images/brands/brand-02.svg') }}" alt="Iceberg"
                                        data-uc-svg>
                                </div>
                                <div class="brand-item swiper-slide text-center">
                                    <img class="brand-item-image h-40px"
                                        src="{{ asset('assets/landing/images/brands/brand-03.svg') }}" alt="PinPoint"
                                        data-uc-svg>
                                </div>
                                <div class="brand-item swiper-slide text-center">
                                    <img class="brand-item-image h-40px"
                                        src="{{ asset('assets/landing/images/brands/brand-04.svg') }}" alt="Clues"
                                        data-uc-svg>
                                </div>
                                <div class="brand-item swiper-slide text-center">
                                    <img class="brand-item-image h-40px"
                                        src="{{ asset('assets/landing/images/brands/brand-05.svg') }}"
                                        alt="Snowflake" data-uc-svg>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Section end -->

        <!-- Section start -->
        <div id="blog_posts" class="section panel overflow-hidden">
            <div class="section-outer panel pb-6 xl:pb-9">
                <div class="container max-w-xl">
                    <div class="section-inner panel">
                        <div class="panel vstack items-center gap-4 sm:gap-6 xl:gap-8"
                            data-anime="onview: -100; targets: >*; translateY: [48, 0]; opacity: [0, 1]; easing: spring(1, 80, 10, 0); duration: 450; delay: anime.stagger(100, {start: 200});">
                            <h2 class="h3 lg:h2 xl:h1 max-w-400px lg:max-w-750px m-auto text-center">Gain valuable
                                insights</h2>
                            <div class="panel">
                                <div
                                    class="row child-cols-12 sm:child-cols-6 lg:child-cols-4 justify-center g-2 xl:g-4">
                                    <div>
                                        <article
                                            class="post type-post panel vstack gap-3 rounded-3 p-2 pb-3 bg-secondary dark:bg-gray-800">
                                            <a class="position-absolute top-0 ltr:start-0 rtl:end-0 m-3 fs-7 fw-bold text-none z-1 bg-primary text-white py-narrow px-1"
                                                href="blog.html" style="border-radius: 8px;">Strategy</a>
                                            <figure
                                                class="featured-image m-0 rounded ratio ratio-3x2 rounded-2 uc-transition-toggle overflow-hidden">
                                                <img class="media-cover image uc-transition-scale-up uc-transition-opaque"
                                                    src="{{ asset('assets/landing/images/blog/img-11.jpg') }}"
                                                    alt="Top 5 reasons to invest in marketing">
                                                <a href="blog-details.html" class="position-cover"
                                                    data-caption="Top 5 reasons to invest in marketing"></a>
                                            </figure>
                                            <header class="panel vstack items-center gap-1 lg:gap-2 px-2">
                                                <h3 class="h5 xl:h4 m-0 text-center m-0">
                                                    <a class="text-none" href="blog-details.html">Top 5 reasons to
                                                        invest in marketing</a>
                                                </h3>
                                                <ul
                                                    class="post-meta nav-x ft-tertiary justify-center gap-1 fs-7 text-gray-400 dark:text-gray-300 d-none lg:d-flex">
                                                    <li>
                                                        <div class="hstack gap-narrow ft-tertiary ">
                                                            <img src="{{ asset('assets/landing/images/avatars/02.png') }}"
                                                                alt="David"
                                                                class="w-24px h-24px rounded-circle me-narrow">
                                                            <a href="page-author.html"
                                                                class="text-none fw-bold text-dark dark:text-white">David</a>
                                                        </div>
                                                    </li>
                                                    <li class="opacity-50">•</li>
                                                    <li>
                                                        <div class="post-date hstack gap-narrow ">
                                                            <span>Apr 3, 2025</span>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </header>
                                        </article>
                                    </div>
                                    <div>
                                        <article
                                            class="post type-post panel vstack gap-3 rounded-3 p-2 pb-3 bg-secondary dark:bg-gray-800">
                                            <a class="position-absolute top-0 ltr:start-0 rtl:end-0 m-3 fs-7 fw-bold text-none z-1 bg-primary text-white py-narrow px-1"
                                                href="blog.html" style="border-radius: 8px;">Marketing</a>
                                            <figure
                                                class="featured-image m-0 rounded ratio ratio-3x2 rounded-2 uc-transition-toggle overflow-hidden">
                                                <img class="media-cover image uc-transition-scale-up uc-transition-opaque"
                                                    src="{{ asset('assets/landing/images/blog/img-12.jpg') }}"
                                                    alt="How can marketing help your business?">
                                                <a href="blog-details.html" class="position-cover"
                                                    data-caption="How can marketing help your business?"></a>
                                            </figure>
                                            <header class="panel vstack items-center gap-1 lg:gap-2 px-2">
                                                <h3 class="h5 xl:h4 m-0 text-center m-0">
                                                    <a class="text-none" href="blog-details.html">How can marketing
                                                        help your business?</a>
                                                </h3>
                                                <ul
                                                    class="post-meta nav-x ft-tertiary justify-center gap-1 fs-7 text-gray-400 dark:text-gray-300 d-none lg:d-flex">
                                                    <li>
                                                        <div class="hstack gap-narrow ft-tertiary ">
                                                            <img src="{{ asset('assets/landing/images/avatars/06.png') }}"
                                                                alt="Allen"
                                                                class="w-24px h-24px rounded-circle me-narrow">
                                                            <a href="page-author.html"
                                                                class="text-none fw-bold text-dark dark:text-white">Allen</a>
                                                        </div>
                                                    </li>
                                                    <li class="opacity-50">•</li>
                                                    <li>
                                                        <div class="post-date hstack gap-narrow ">
                                                            <span>Apr 3, 2025</span>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </header>
                                        </article>
                                    </div>
                                    <div>
                                        <article
                                            class="post type-post panel vstack gap-3 rounded-3 p-2 pb-3 bg-secondary dark:bg-gray-800">
                                            <a class="position-absolute top-0 ltr:start-0 rtl:end-0 m-3 fs-7 fw-bold text-none z-1 bg-primary text-white py-narrow px-1"
                                                href="blog.html" style="border-radius: 8px;">Business</a>
                                            <figure
                                                class="featured-image m-0 rounded ratio ratio-3x2 rounded-2 uc-transition-toggle overflow-hidden">
                                                <img class="media-cover image uc-transition-scale-up uc-transition-opaque"
                                                    src="{{ asset('assets/landing/images/blog/img-13.jpg') }}"
                                                    alt="The ultimate guide to marketing success">
                                                <a href="blog-details.html" class="position-cover"
                                                    data-caption="The ultimate guide to marketing success"></a>
                                            </figure>
                                            <header class="panel vstack items-center gap-1 lg:gap-2 px-2">
                                                <h3 class="h5 xl:h4 m-0 text-center m-0">
                                                    <a class="text-none" href="blog-details.html">The ultimate guide
                                                        to marketing success</a>
                                                </h3>
                                                <ul
                                                    class="post-meta nav-x ft-tertiary justify-center gap-1 fs-7 text-gray-400 dark:text-gray-300 d-none lg:d-flex">
                                                    <li>
                                                        <div class="hstack gap-narrow ft-tertiary ">
                                                            <img src="{{ asset('assets/landing/images/avatars/01.png') }}"
                                                                alt="Kevin"
                                                                class="w-24px h-24px rounded-circle me-narrow">
                                                            <a href="page-author.html"
                                                                class="text-none fw-bold text-dark dark:text-white">Kevin</a>
                                                        </div>
                                                    </li>
                                                    <li class="opacity-50">•</li>
                                                    <li>
                                                        <div class="post-date hstack gap-narrow ">
                                                            <span>Apr 1, 2025</span>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </header>
                                        </article>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Section end -->

        <!-- Section start -->
        <div id="cta" class="cta section panel overflow-hidden">
            <div class="section-outer panel py-4 sm:py-6 xl:py-9 bg-secondary dark:bg-gray-800">
                <div class="d-none lg:d-block"
                    data-anime="onview: -100; targets: img; scale: [0.8, 1]; opacity: [0, 1]; easing: spring(1, 80, 10, 0); duration: 450; delay: 350;">
                    <div class="position-absolute top-50 start-0 translate-middle-y ms-n6">
                        <img class="w-200px xl:w-250px d-block dark:d-none"
                            src="{{ asset('assets/landing/images/template/talking.svg') }}" alt="talking">
                        <img class="w-200px xl:w-250px d-none dark:d-block"
                            src="{{ asset('assets/landing/images/template/talking-dark.svg') }}" alt="talking-dark">
                    </div>
                    <div class="position-absolute top-50 end-0 translate-middle-y me-n6">
                        <img class="w-200px xl:w-250px d-block dark:d-none"
                            src="{{ asset('assets/landing/images/template/chatting.svg') }}" alt="chatting">
                        <img class="w-200px xl:w-250px d-none dark:d-block"
                            src="{{ asset('assets/landing/images/template/chatting-dark.svg') }}"
                            alt="chatting-dark">
                    </div>
                </div>
                <div class="d-none lg:d-block"
                    data-anime="targets: >*; scale: [0, 1]; opacity: [0, 1]; easing: spring(1, 80, 10, 0); duration: 450; delay: anime.stagger(100, {start: 750});">
                    <div class="position-absolute top-0 start-0 rotate-45"
                        style="top: 40% !important; left: 24% !important;">
                        <img class="w-32px text-gray-900 dark:text-white"
                            src="{{ asset('assets/landing/images/template/star-1.svg') }}" alt="star-1"
                            data-uc-svg>
                    </div>
                    <div class="position-absolute bottom-0 ltr:end-0 rtl:start-0 rotate-45"
                        style="bottom: 40% !important; right: 24% !important;">
                        <img class="w-32px text-gray-900 dark:text-white"
                            src="{{ asset('assets/landing/images/template/star-2.svg') }}" alt="star-2"
                            data-uc-svg>
                    </div>
                    <div class="position-absolute bottom-0 start-0"
                        style="bottom: -4% !important; left: 28% !important;">
                        <img class="w-100px xl:w-150px text-gray-900 dark:text-white text-opacity-20"
                            src="{{ asset('assets/landing/images/template/arrow-3.svg') }}" alt="arrow-1"
                            data-uc-svg>
                    </div>
                </div>
                <div class="container max-w-xl">
                    <div class="section-inner panel">
                        <div class="vstack items-center gap-2 sm:max-w-600px lg:max-w-650px mx-auto text-center"
                            data-anime="onview:-100; targets: >*; translateY: [48, 0]; opacity: [0, 1]; easing: spring(1, 80, 10, 0); duration: 450; delay: anime.stagger(100, {start: 200});">
                            <h2 class="h3 sm:h1 xl:display-6 m-0">Create stunning websites that fits <span
                                    class="text-primary">your needs.</span></h2>
                            <p class="fs-6 sm:fs-5 text-dark dark:text-white text-opacity-70 mt-1 lg:mt-2">Try Lexend
                                today.</p>
                            <div class="vstack sm:hstack justify-center gap-1 lg:gap-2 mt-1 lg:mt-2">
                                <a href="page-pricing.html" class="btn btn-md lg:btn-lg btn-primary text-white">Try
                                    Lexend today</a>
                                <a href="#uc-contact-modal"
                                    class="btn btn-md lg:btn-lg dark:text-white border-gray-900 dark:border-white border-opacity-20 hover:border-opacity-40"
                                    data-uc-toggle>Contact sales</a>
                            </div>
                            <p class="fs-7 text-dark dark:text-white text-opacity-70">14-day trial, no credit card
                                required.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
