<x-guest-layout for="landing" :page="__('Complete Registration')" :sticky="false">
    <div id="wrapper" class="wrap">
        <div class="breadcrumbs panel z-1 py-2 bg-secondary dark:bg-gray-100 dark:bg-opacity-5 dark:text-white">
            <div class="container max-w-xl">
                <ul class="breadcrumb nav-x justify-center items-center gap-1 fs-7 m-0 fw-bold">
                    <li><img src="{{ asset('assets/landing/images/common/icons/home.svg') }}" alt="icon"
                            class="me-1"></li>
                    <li><a href="{{ route('c.home') }}">Home</a></li>
                    <li><i class="unicon-chevron-right fw-medium opacity-50 rtl:rotate-180"></i></li>
                    <li><span class="opacity-50">{{ __('Complete Registration') }}</span></li>
                </ul>
            </div>
        </div>

        <div class="section py-6 sm:py-9">
            <div class="container max-w-xl">
                <div class="panel vstack justify-center items-center gap-2 sm:gap-4 text-center">
                    <h1 class="h3 sm:h1 m-0">{{ __('Complete Registration') }}</h1>
                    <div class="panel w-100 sm:w-500px">
                        <form class="vstack gap-2" method="POST"
                            action="{{ route('c.register.token', ['token' => $token->token], absolute: false) }}">
                            @csrf
                            <input
                                class="form-control h-48px w-full bg-white dark:bg-opacity-0 dark:text-white dark:border-gray-300 dark:border-opacity-30"
                                type="text" name="name" placeholder="{{ __('Company/Studio name') }}"
                                value="{{ old('name') }}">
                            <input
                                class="form-control h-48px w-full bg-white dark:bg-opacity-0 dark:text-white dark:border-gray-300 dark:border-opacity-30"
                                type="email" name="email" placeholder="{{ __('Company/Studio email') }}"
                                value="{{ old('email') }}">
                            <input
                                class="form-control h-48px w-full bg-white dark:bg-opacity-0 dark:text-white dark:border-gray-300 dark:border-opacity-30"
                                type="text" name="phone" placeholder="{{ __('Company/Studio Phone') }}"
                                value="{{ old('phone') }}">
                            <select
                                class="form-control h-48px w-full bg-white dark:bg-opacity-0 dark:text-white dark:border-gray-300 dark:border-opacity-30"
                                name="state">
                                <option value="" selected>{{ __('Select State') }}</option>
                                @foreach (config('app.states', []) as $state)
                                    <option value="{{ $state }}"
                                        {{ old('state') == $state ? 'selected' : '' }}>{{ $state }}</option>
                                @endforeach
                            </select>
                            <input
                                class="form-control h-48px w-full bg-white dark:bg-opacity-0 dark:text-white dark:border-gray-300 dark:border-opacity-30"
                                type="text" name="city" placeholder="{{ __('City') }}"
                                value="{{ old('city') }}">
                            <input
                                class="form-control h-48px w-full bg-white dark:bg-opacity-0 dark:text-white dark:border-gray-300 dark:border-opacity-30"
                                type="text" name="zip" placeholder="{{ __('Zip') }}"
                                value="{{ old('zip') }}">
                            <div class="custom-input-group">
                                <span class="custom-input-text">https://</span>

                                <input type="text" name="subdomain" class="custom-input-field"
                                    placeholder="{{ __('Subdomain') }}" value="{{ old('subdomain') }}">

                                <span class="custom-input-text">
                                    .{{ config('app.central_domain') }}
                                </span>
                            </div>

                            <input
                                class="form-control h-48px w-full bg-white dark:bg-opacity-0 dark:text-white dark:border-gray-300 dark:border-opacity-30"
                                type="password" name="password" placeholder="{{ __('Password') }}">
                            <input
                                class="form-control h-48px w-full bg-white dark:bg-opacity-0 dark:text-white dark:border-gray-300 dark:border-opacity-30"
                                type="password" name="password_confirmation"
                                placeholder="{{ __('Re-enter Password') }}">
                            <div class="hstack text-start">
                                <div class="form-check text-start rtl:text-end">
                                    <input id="uc_form_check_terms"
                                        class="form-check-input rounded-0 bg-white dark:bg-opacity-0 dark:text-white dark:border-gray-300 dark:border-opacity-30"
                                        type="checkbox" name="terms">
                                    <label for="uc_form_check_terms"
                                        class="hstack justify-between form-check-label fs-6">
                                        {!! __('I read and accept the :link', [
                                            'link' =>
                                                '<a href="' . route('c.terms') . '" class="uc-link ltr:ms-narrow rtl:me-narrow">' . __('terms of use') . '</a>',
                                        ]) !!}
                                    </label>
                                </div>
                            </div>
                            <button class="btn btn-primary btn-md text-white mt-2" type="submit">
                                {{ __('Complete Registration') }}
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('styles')
        <style>
            .custom-input-group {
                display: flex;
                align-items: stretch;
                width: 100%;
            }

            .custom-input-text {
                padding: 10px 12px;
                background: #f3f4f6;
                border: 1px solid #d1d5db;
                font-size: 14px;
                display: flex;
                align-items: center;
                white-space: nowrap;
            }

            .custom-input-text:first-child {
                border-right: 0;
                border-radius: 6px 0 0 6px;
            }

            .custom-input-text:last-child {
                border-left: 0;
                border-radius: 0 6px 6px 0;
            }

            .custom-input-field {
                flex: 1;
                padding: 10px 12px;
                border: 1px solid #d1d5db;
                border-left: 0;
                border-right: 0;
                font-size: 14px;
                outline: none;
                background: #ffffff;
            }

            .custom-input-field:focus {
                border-color: #6366f1;
            }

            @media (min-width: 459px) {
                .sm\:w-500px {
                    width: 500px !important;
                }
            }
        </style>
    @endpush
</x-guest-layout>
