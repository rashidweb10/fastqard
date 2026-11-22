@php
    use Illuminate\Support\Facades\DB;

    // Queries
    $supportPage = DB::table('pages')->where('page_name', 'footer')->orWhere('page_name', 'contact')->get();
@endphp

<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @php
        $seo = DB::table('config')->whereIn('config_key', [
            'seo_meta_description', 'seo_meta_keywords', 'seo_author', 'seo_copyright',
            'seo_robots', 'seo_googlebot', 'seo_geo_region', 'seo_theme_color',
            'seo_canonical', 'seo_og_type', 'seo_og_url', 'seo_og_title',
            'seo_og_description', 'seo_og_image', 'seo_og_locale', 'seo_og_site_name',
            'seo_twitter_card', 'seo_twitter_url', 'seo_twitter_title',
            'seo_twitter_description', 'seo_twitter_image', 'seo_application_name',
            'seo_apple_title', 'seo_format_detection', 'seo_distribution',
            'seo_rating', 'seo_revisit_after', 'seo_language',
        ])->pluck('config_value', 'config_key');
    @endphp
    @if($seo->get('seo_meta_description')) <meta name="description" content="{{ $seo->get('seo_meta_description') }}"> @endif
    @if($seo->get('seo_meta_keywords')) <meta name="keywords" content="{{ $seo->get('seo_meta_keywords') }}"> @endif
    @if($seo->get('seo_author')) <meta name="author" content="{{ $seo->get('seo_author') }}"> @endif
    @if($seo->get('seo_copyright')) <meta name="copyright" content="{{ $seo->get('seo_copyright') }}"> @endif
    @if($seo->get('seo_robots')) <meta name="robots" content="{{ $seo->get('seo_robots') }}"> @endif
    @if($seo->get('seo_googlebot')) <meta name="googlebot" content="{{ $seo->get('seo_googlebot') }}"> @endif
    @if($seo->get('seo_geo_region')) <meta name="geo.region" content="{{ $seo->get('seo_geo_region') }}"> @endif
    @if($seo->get('seo_theme_color')) <meta name="theme-color" content="{{ $seo->get('seo_theme_color') }}"> @endif
    @if($seo->get('seo_canonical')) <link rel="canonical" href="{{ $seo->get('seo_canonical') }}"> @endif
    @if($seo->get('seo_og_type')) <meta property="og:type" content="{{ $seo->get('seo_og_type') }}"> @endif
    @if($seo->get('seo_og_url')) <meta property="og:url" content="{{ $seo->get('seo_og_url') }}"> @endif
    @if($seo->get('seo_og_title')) <meta property="og:title" content="{{ $seo->get('seo_og_title') }}"> @endif
    @if($seo->get('seo_og_description')) <meta property="og:description" content="{{ $seo->get('seo_og_description') }}"> @endif
    @if($seo->get('seo_og_image')) <meta property="og:image" content="{{ $seo->get('seo_og_image') }}"> @endif
    @if($seo->get('seo_og_locale')) <meta property="og:locale" content="{{ $seo->get('seo_og_locale') }}"> @endif
    @if($seo->get('seo_og_site_name')) <meta property="og:site_name" content="{{ $seo->get('seo_og_site_name') }}"> @endif
    @if($seo->get('seo_twitter_card')) <meta name="twitter:card" content="{{ $seo->get('seo_twitter_card') }}"> @endif
    @if($seo->get('seo_twitter_url')) <meta name="twitter:url" content="{{ $seo->get('seo_twitter_url') }}"> @endif
    @if($seo->get('seo_twitter_title')) <meta name="twitter:title" content="{{ $seo->get('seo_twitter_title') }}"> @endif
    @if($seo->get('seo_twitter_description')) <meta name="twitter:description" content="{{ $seo->get('seo_twitter_description') }}"> @endif
    @if($seo->get('seo_twitter_image')) <meta name="twitter:image" content="{{ $seo->get('seo_twitter_image') }}"> @endif
    @if($seo->get('seo_application_name')) <meta name="application-name" content="{{ $seo->get('seo_application_name') }}"> @endif
    @if($seo->get('seo_apple_title')) <meta name="apple-mobile-web-app-title" content="{{ $seo->get('seo_apple_title') }}"> @endif
    @if($seo->get('seo_format_detection')) <meta name="format-detection" content="{{ $seo->get('seo_format_detection') }}"> @endif
    @if($seo->get('seo_distribution')) <meta name="distribution" content="{{ $seo->get('seo_distribution') }}"> @endif
    @if($seo->get('seo_rating')) <meta name="rating" content="{{ $seo->get('seo_rating') }}"> @endif
    @if($seo->get('seo_revisit_after')) <meta name="revisit-after" content="{{ $seo->get('seo_revisit_after') }}"> @endif
    @if($seo->get('seo_language')) <meta name="language" content="{{ $seo->get('seo_language') }}"> @endif

    {{-- SEO --}}
    @if (isset($setting) && $setting)
        {!! SEOMeta::generate() !!}
        {!! OpenGraph::generate() !!}
        {!! Twitter::generate() !!}
        {!! JsonLd::generate() !!}
    @endif

    {{-- Title --}}
    @if (isset($title) && $title)
        <title>{{ $title }}</title>
    @endif

    {{-- Google verification --}}
    @if (isset($setting) && $setting)
        <meta name="google-site-verification" content="{{ $settings->google_key }}">
        <link rel="icon" href="{{ asset($settings->favicon) }}" sizes="96x96" type="image/png" />
    @endif

    {{-- Check Recaptcha --}}
    @if (env('RECAPTCHA_ENABLE') == 'on')
        {!! htmlScriptTagJsApi() !!}
    @endif

    <!-- CSS files -->
    <link rel="stylesheet" href="{{ asset('gobiz_original_assets/css/tailwind.min.css') }}">
    <link rel="stylesheet" href="{{ asset('gobiz_original_assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('gobiz_original_assets/css/sweetalert.min.css') }}">
    <link rel="stylesheet" href="{{ asset('gobiz_original_assets/css/fontawesome.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('gobiz_original_assets/css/tabler-icons.min.css') }}">
    <script type="text/javascript" src="{{ asset('gobiz_original_assets/js/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('gobiz_original_assets/js/theme.bundle.js') }}"></script>
    <script type="text/javascript" src="{{ asset('gobiz_original_assets/js/main.js') }}"></script>
    <script type="text/javascript" src="{{ asset('gobiz_original_assets/js/alpine.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('gobiz_original_assets/js/sweetalert.min.js') }}"></script>

    @if (isset($setting) && $setting)
        {{-- Check Google Analytics is "enabled" --}}
        @if (!empty($settings->google_analytics_id) && (Cookie::get('laravel_cookie_consent') === '1' || env('COOKIE_CONSENT_ENABLED') == ""))
            <!-- Global site tag (gtag.js) - Google Analytics -->
            <script async src="https://www.googletagmanager.com/gtag/js?id={{ $settings->google_analytics_id }}"></script>
            <script>
                window.dataLayer = window.dataLayer || [];

                function gtag() {
                    dataLayer.push(arguments);
                }
                gtag('js', new Date());

                gtag('config', '{{ $settings->google_analytics_id }}');
            </script>
        @endif

        @if ($settings->google_adsense_code != 'DISABLE_ADSENSE_ONLY' && (Cookie::get('laravel_cookie_consent') === '1' || env('COOKIE_CONSENT_ENABLED') == ""))
            {{-- AdSense code --}}
            <script async
                src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client={{ $settings->google_adsense_code }}"
                crossorigin="anonymous"></script>
        @endif
    @endif

    {{-- Pusher --}}
    @if (env('PUSHER_BEAMS_ENABLED') == '1' && (Cookie::get('laravel_cookie_consent') === '1' || env('COOKIE_CONSENT_ENABLED') == ""))
        <script src="{{ asset('gobiz_original_assets/js/pusher.js') }}"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const beamsClient = new PusherPushNotifications.Client({
                    instanceId: "{{ env('PUSHER_BEAMS_INSTANCE_ID') }}", // Replace with your Pusher Beams instance ID
                    serviceWorkerPath: '/service-worker.js', // Correctly specify the service worker path
                });

                // Start the Beams client for guest users
                beamsClient
                    .start()
                    .then(() => beamsClient.addDeviceInterest('global')) // Register guest users under 'global' interest
                    .then(() => console.log('Successfully registered for global notifications'))
                    .catch(console.error);

                // For logged-in users, optionally set their unique user ID
                @auth
                beamsClient.setUserId('{{ auth()->id() }}', {
                        headers: {
                            Authorization: 'Bearer {{ csrf_token() }}', // Or another token mechanism
                        },
                    })
                    .then(() => console.log('User ID set for logged-in user'))
                    .catch(console.error);
            @endauth
            });
        </script>
    @endif

    {{-- Custom CSS / JS --}}
    @yield('custom-script')

    {{-- CSS/JS from admin settings --}}
    @if (isset($template_config) && $template_config)
        @php
            $custom_css = $template_config->custom_css;

            // Ensure <style> tags for custom CSS
            if (strpos($custom_css, '<style>') === false && strpos($custom_css, '</style>') === false) {
                $custom_css = "<style>" . $custom_css . "</style>";
            }
        @endphp

        {!! $custom_css !!}
    @endif
</head>

<body class="antialiased bg-body text-body font-body"
    dir="{{ App::isLocale('ar') || App::isLocale('ur') || App::isLocale('he') ? 'rtl' : 'ltr' }}">

    {{-- Announcements --}}
    @if (\App\Announcement::where('status', 1)->count() > 0)
        @include('GoBizOriginal::Website.includes.announcements')
    @endif

    {{-- Web Popup --}}
    @if (\App\WebPopup::where('status', 1)->count() > 0)
        @include('GoBizOriginal::Website.includes.web-pop')
    @endif

    <!-- Maintenance Mode Alert (conditionally displayed) -->
    @if (app()->isDownForMaintenance())
        @include('GoBizOriginal::Website.includes.maintenance-mode')
    @endif

    <div class="{{ app()->isDownForMaintenance() ? 'mt-28 lg:mt-16' : '' }}">
        {{-- Registeration Closed Alert Message using Tailwind CSS --}}
        @include('GoBizOriginal::Website.includes.register-closed-alert')

        {{-- Header --}}
        @if (isset($nav) && $nav)
            @include('GoBizOriginal::Website.includes.header')
        @endif

        {{-- Page Content --}}
        @yield('content')

        <!-- HTML to display the notification -->
        <div id="notifications"></div>

        {{-- Cookie consent --}}
        @if (env('COOKIE_CONSENT_ENABLED') == true)
            @include('cookie-consent::index', ['theme_id' => 'GoBizOriginal', 'template_color' => $template_config->template_color])
        @endif
    </div>
 
    {{-- WhatsApp Chatbot --}}
    @if (isset($config) && $config)
        @if ($config[40]->config_value == '1')
            <a href="https://api.whatsapp.com/send?phone={{ $config[41]->config_value }}&text={{ urlencode($config[42]->config_value) }}"
                class="whatapp-chatbot" target="_blank">
                <i class="fab fa-whatsapp whatapp-chatbot-icon"></i>
            </a>
        @endif
    @endif

    {{-- Tawk.to Chat --}}
    @if (isset($settings) && $settings)
        @if (
            $settings->tawk_chat_bot_key != null &&
                $config[40]->config_value != '1' &&
                (Cookie::get('laravel_cookie_consent') === '1' || env('COOKIE_CONSENT_ENABLED') == ""))
            <!--Start of Tawk.to Script-->
            <script>
                (function($) {
                    "use strict";
                    var Tawk_API = Tawk_API || {},
                        Tawk_LoadStart = new Date();
                    var s1 = document.createElement("script"),
                        s0 = document.getElementsByTagName("script")[0];
                    s1.async = true;
                    s1.src = 'https://embed.tawk.to/{{ $settings->tawk_chat_bot_key }}';
                    s1.charset = 'UTF-8';
                    s1.setAttribute('crossorigin', '*');
                    s0.parentNode.insertBefore(s1, s0);
                })(jQuery);
            </script>
            <!--End of Tawk.to Script-->
        @endif
    @endif

    {{-- Footer --}}
    @if (isset($footer) && $footer)
        @include('GoBizOriginal::Website.includes.footer')
    @endif

    <!-- Smooth Scroll -->
    <script type="text/javascript" src="{{ asset('gobiz_original_assets/js/smooth-scroll.polyfills.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('gobiz_original_assets/js/footer.js') }}"></script>

    {{-- CSS/JS from admin settings --}}
    @if (isset($template_config) && $template_config)
        @php
            $custom_js = $template_config->custom_js;

            // Ensure <script> tags for custom JS
            if (strpos($custom_js, '<script>') === false && strpos($custom_js, '</script>') === false) {
                $custom_js = "<script>" . $custom_js . "</script>";
            }
        @endphp

        {!! $custom_js !!}
    @endif

    {{-- Custom JS --}}
    @yield('custom-js')
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            "use strict"; // Avoids conflicts with other scripts

            const alert = document.getElementById('failed-alert');
            if (alert) {
                setTimeout(() => {
                    alert.style.opacity = '0'; // Fades out
                    setTimeout(() => alert.remove(), 300); // Removes after fade-out
                }, 10000); // Auto close after 10 seconds
            }
        });

        function closeModal() {
            "use strict"; // Avoids conflicts with other scripts

            const alert = document.getElementById('failed-alert');
            if (alert) alert.remove(); // Removes the modal on close button click
        }
    </script>
</body>

</html>
