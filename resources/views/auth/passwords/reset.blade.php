<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Sign In - Blossom Tree Healthcare LLC</title>
        <link rel="shortcut icon" href="{{asset('assets/images/fav.png')}}" type="image/x-icon">
        <link rel="stylesheet" href="{{asset('assets/css/swiper-bundle.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
        <link rel="stylesheet" href="{{asset('dist/output-scss.css')}}">
        <link rel="stylesheet" href="{{asset('dist/output-tailwind.css')}}">
    </head>

    <body>
        @include('templates/header')
        <div class="login-block md:py-20 py-10">
            <div class="container">
                <div class="content-main flex gap-y-8 max-md:flex-col">
                    <div class="left md:w-1/2 w-full lg:pr-[60px] md:pr-[40px] md:border-r border-line">
                        <div class="heading5">Reset Password</div>
                        <form action="{{ route('password.update') }}" method="post" class="md:mt-7 mt-4">
                            @csrf
                            <input type="hidden" name="token" value="{{ $token }}">
                            <div class="email">
                                <input value="{{ $email ?? old('email') }}" name="email" class="border-line px-4 pt-3 pb-3 w-full rounded-lg @error('email') is-invalid @enderror" id="email" type="text" autocomplete="off">
                                @error('email')
                                <p style="color: red;"> {{ $message }}</p>
                                @enderror
                            </div>
                            <div class="pass mt-5">
                                <input name="password" class="border-line px-4 pt-3 pb-3 w-full rounded-lg @error('password') is-invalid @enderror" id="password" type="password" placeholder="Password *" autocomplete="off">
                                @error('password')
                                <p style="color: red;"> {{ $message }}</p>
                                @enderror
                            </div>
                            <div class="pass mt-5">
                                <input name="password_confirmation" class="border-line px-4 pt-3 pb-3 w-full rounded-lg @error('password_confirmation') is-invalid @enderror" id="password_confirmation" type="password" placeholder="Confirm Password *" autocomplete="off">
                                @error('password_confirmation')
                                <p style="color: red;"> {{ $message }}</p>
                                @enderror
                            </div>
                            
                            <div class="block-button md:mt-7 mt-4">
                                <button class="button-main" style="text-transform: capitalize;" >Reset Password</button>
                            </div>
                        </form>
                    </div>
                    <div class="right md:w-1/2 w-full lg:pl-[60px] md:pl-[40px] flex items-center">
                        <div class="text-content">
                            <div class="heading4">New Customer</div>
                            <div class="mt-2 text-secondary">Be part of our growing family of new customers! Join us today and unlock a world of exclusive benefits, offers, and personalized experiences.</div>
                            <div class="block-button md:mt-7 mt-4">
                                <a href="{{ route('register') }}" style="text-transform: capitalize;" class="button-main">Create Account</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('templates/footer')

        <a class="scroll-to-top-btn" href="#top-nav"><i class="ph-bold ph-caret-up"></i></a>

        <script src="{{asset('assets/js/phosphor-icons.js')}}"></script>
        <script src="{{asset('assets/js/swiper-bundle.min.js')}}"></script>
        <script src="{{asset('assets/js/main.js')}}"></script>
    </body>
</html>
