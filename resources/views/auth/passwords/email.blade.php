
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Blossom Tree Healthcare - Forgot Password</title>
        <link rel="shortcut icon" href="{{asset('assets/images/fav.png')}}" type="image/x-icon">
        <link rel="stylesheet" href="{{asset('assets/css/swiper-bundle.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
        <link rel="stylesheet" href="{{asset('dist/output-scss.css')}}">
        <link rel="stylesheet" href="{{asset('dist/output-tailwind.css')}}">
    </head>

    <body> 

        @include('templates/header')

        <div class="forgot-pass md:py-20 py-10">
            <div class="container">
                <div class="content-main flex gap-y-8 max-md:flex-col">
                    <div class="left md:w-1/2 w-full lg:pr-[60px] md:pr-[40px] md:border-r border-line">
                        <div class="heading5">Reset your password</div>
                        <div class="body1 mt-2">We will send you an email to reset your password</div>
                        @if(session('status'))
                            <div style="color: green;" class="body1 mt-2"> {{ session('status') }} </div>
                        @endif
                        <form method="post" action="{{ route('password.email') }}" class="md:mt-7 mt-4">
                            @csrf
                            <div class="email">
                                <input name="email" value="{{ old('email') }}" class="border-line px-4 pt-3 pb-3 w-full rounded-lg" id="email" autocomplete="off" type="text" placeholder="email address *">
                                @error('email')
                                <p style="color: red;"> {{ $message }} </p>
                                @enderror
                            </div>
                            <div class="block-button md:mt-7 mt-4">
                                <button class="button-main" style="text-transform: capitalize;">Send</button>
                                <a onclick="window.history.back();" href="#" class="button-main" style="text-transform: capitalize;">Back</a>
                            </div>
                        </form>
                    </div>
                    <div class="right md:w-1/2 w-full lg:pl-[60px] md:pl-[40px] flex items-center">
                        <div class="text-content">
                            <div class="heading5">New Customer</div>
                            <div class="mt-2 text-secondary">Be part of our growing family of new customers! Join us today and unlock a world of exclusive benefits, offers, and personalized experiences.</div>
                            <div class="block-button md:mt-7 mt-4">
                                <a href="{{route('register')}}" class="button-main" style="text-transform:capitalize">Create <span style="text-transform: lowercase;">an</span> Account</a>
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
