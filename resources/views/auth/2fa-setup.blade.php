<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Two-Factor Authentication - Blossom Tree Healthcare LLC</title>
        <link rel="shortcut icon" href="{{asset('assets/images/fav.png')}}" type="image/x-icon">
        <link rel="stylesheet" href="{{asset('assets/css/swiper-bundle.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
        <link rel="stylesheet" href="{{asset('dist/output-scss.css')}}">
        <link rel="stylesheet" href="{{asset('dist/output-tailwind.css')}}">

        <style>
            .centered-form {
                text-align: center;
            }

            .centered-button {
                color: green;
                display: inline-block; /* Ensures the button is treated as an inline element */
                margin-top: 10px;
            }

        </style>

    </head>

    <body>
        @include('templates/header')
        <div class="login-block md:py-20 py-10 flex justify-center items-center">
            <div class="container mx-auto">
                <div class="flex justify-center">
                    <div class="w-1/3"></div> <!-- Empty column -->
                    <div class="w-full max-w-sm"> <!-- Reduced width for the form -->
                        @if(session('success'))
                            <p style="text-align: center !important; color: green">
                                {{ session('success') }} 
                            </p>
                        @endif
                        @if(session('error'))
                            <p style="text-align: center !important; color: red">
                                {{ session('error') }} 
                            </p>
                        @endif
                        <p style="text-align: center !important;">
                            Two-factor authentication code has being sent your email. The code will expire with 5 minute. 
                        </p>
                        <form action="{{ route('2fa.regenerate') }}" method="post" class="centered-form">
                            @csrf
                            <button type="submit" class="centered-button">Click here to generate new code</button>
                        </form>
                        <form action="{{ route('2fa.verify') }}" method="post" class="mt-7">
                            @csrf
                            <div class="email mb-4">
                                <input value="" name="code" class="border-line px-4 pt-3 pb-3 w-full rounded-lg" id="code" type="text" autocomplete="off" placeholder="Enter your 2FA code">
                                @error('code')
                                <p style="color: red;">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="block-button mt-7">
                                <button class="button-main w-full py-3 bg-blue-500 text-white rounded-lg hover:bg-blue-600">Verify</button>
                            </div>
                        </form>
                    </div>
                    <div class="w-1/3"></div> <!-- Empty column -->
                </div>
            </div>
        </div>

        <a class="scroll-to-top-btn" href="#top-nav"><i class="ph-bold ph-caret-up"></i></a>

        <script src="{{asset('assets/js/phosphor-icons.js')}}"></script>
        <script src="{{asset('assets/js/swiper-bundle.min.js')}}"></script>
        <script src="{{asset('assets/js/main.js')}}"></script>
    </body>
</html>

