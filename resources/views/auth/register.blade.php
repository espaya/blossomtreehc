
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Register - Blossom Tree Healthcare LLC</title>
        <link rel="shortcut icon" href="{{asset('assets/images/fav.png')}}" type="image/x-icon">
        <link rel="stylesheet" href="{{asset('assets/css/swiper-bundle.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
        <link rel="stylesheet" href="{{asset('dist/output-scss.css')}}">
        <link rel="stylesheet" href="{{asset('dist/output-tailwind.css')}}">
    </head>

    <body>
        @include('templates/header')

        <div class="register-block md:py-20 py-10">
            <div class="container">
                <div class="content-main flex gap-y-8 max-md:flex-col">
                    <div class="left md:w-1/2 w-full lg:pr-[60px] md:pr-[40px] md:border-r border-line">
                    <div class="heading5">Create <span style="text-transform: lowercase !important;">an</span> Account</div>
                
                            <form action="{{ route('register') }}" method="post" class="md:mt-7 mt-4">
                                @csrf
                            <div class="fistname">
                                <input value="{{ old('firstname') }}" name="firstname" class="border-line px-4 pt-3 pb-3 w-full rounded-lg" id="firstname" type="text" autocomplete="off" placeholder="First name *">
                                @error('firstname')
                                <p style="color: red;"> {{ $message }} </p>
                                @enderror
                            </div>
                            <div class="lastname mt-5">
                                <input value="{{ old('lastname') }}" name="lastname" class="border-line px-4 pt-3 pb-3 w-full rounded-lg" id="lastname" type="text" autocomplete="off" placeholder="Last name *">
                                @error('lastname')
                                <p style="color: red;"> {{ $message }} </p>
                                @enderror
                            </div>
                            <div class="email mt-5">
                                <input value="{{ old('email') }}" name="email" class="border-line px-4 pt-3 pb-3 w-full rounded-lg" id="email" type="text" autocomplete="off" placeholder="Email address *">
                                @error('email')
                                <p style="color: red;"> {{ $message }} </p>
                                @enderror
                            </div>
                            <div class="pass mt-5">
                                <input name="password" class="border-line px-4 pt-3 pb-3 w-full rounded-lg" id="password" type="password" autocomplete="off" placeholder="Password *" >
                                @error('password')
                                <p style="color: red;"> {{ $message }} </p>
                                @enderror
                            </div>
                            <div class="confirm-pass mt-5">
                                <input name="password_confirmation" class="border-line px-4 pt-3 pb-3 w-full rounded-lg" id="confirmPassword" autocomplete="off" type="password" placeholder="Confirm Password *">
                                @error('password_confirmation')
                                <p style="color: red;"> {{ $message }} </p>
                                @enderror
                            </div>
                            <div class="confirm-pass mt-5">
                                <input name="phone" value="{{ old('phone') }}" class="border-line px-4 pt-3 pb-3 w-full rounded-lg" id="confirmPassword" autocomplete="off" type="text" placeholder="Mobile phone number *">
                                @error('phone')
                                <p style="color: red;"> {{ $message }} </p>
                                @enderror
                            </div>
                            <div class="flex items-center mt-5">
                                <div class="block-input">
                                    <input type="checkbox" name="termsCondition" id="termsCondition" checked>
                                    <i class="ph-fill ph-check-square icon-checkbox text-xl"></i>
                                </div>
                                <label for="remember" class="pl-2 cursor-pointer text-secondary2">By continuing you agree to our
                                    <a href="#!" class="text-black hover:underline pl-1">Terms and Conditions</a> and our <a href="#!" class="text-black hover:underline pl-1">Privacy Policy</a>
                                </label>
                                
                            </div>
                            @error('termsCondition')
                                <p style="color: red;"> {{ $message }} </p>
                            @enderror

                            <div class="form-group">
                                {!! NoCaptcha::display() !!}
                            </div>

                            @error('g-recaptcha-response')
                                <p style="color: red;">Please confirm that you're not a robot</p>
                            @endif
                            <div class="block-button md:mt-7 mt-4">
                                <a onclick="window.history.back();" href="#" style="text-transform: capitalize;" class="button-main">Back</a>
                                <button style="text-transform: capitalize;" class="button-main">Create Account</button>
                            </div>
                        </form>
                    </div>
                    <div class="right md:w-1/2 w-full lg:pl-[60px] md:pl-[40px] flex items-center">
                        <div class="text-content">
                            <div class="heading5">Already have an account?</div>
                            <div class="mt-2 text-secondary">Welcome back. Sign in to access your personalized experience, saved preferences, and more. We're thrilled to have you with us again!</div>
                            <div class="block-button md:mt-7 mt-4">
                                <a href="{{route('login')}}" style="text-transform: capitalize;" class="button-main">Sign In</a>
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
        <script src="https://www.google.com/recaptcha/api.js" async defer></script>

    </body>
</html>
