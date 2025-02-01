
<!DOCTYPE html>
<html lang="en">
    @include('templates/head')
    <body>
    <div id="header" class="relative w-full">
            <div class="breadcrumb-block style-shared">
                <div class="breadcrumb-main bg-linear overflow-hidden">
                    <div class="container lg:pt-[50px] pt-12 pb-10 relative">
                        <div class="main-content w-full h-full flex flex-col items-center justify-center relative z-[1]">
                            <div class="text-content">
                                <div style="font-size: 10 !important;" class="heading5 text-center">Blossom Tree Home Healthcare Services LLC</div>
                                <div class="link flex items-center justify-center gap-1 caption1 mt-3">
                                    <a href="#">Account</a>
                                    <i class="ph ph-caret-right text-sm text-secondary2"></i>
                                    <div class="text-secondary2 capitalize"> {{ ucfirst($pageTitle) }} </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div style="margin-top: -50px !important;" class="my-account-block md:py-20 py-10">
            <div class="container">
                <div class="content-main lg:px-[60px] md:px-4 flex gap-y-8 max-md:flex-col w-full">
                    <div class="right xl:w-2/3 md:w-7/12 w-full xl:pl-[40px] lg:pl-[28px] md:pl-[16px] flex ">
                    <div class="text-content w-full">
                        @if(session('success'))
                        <p style="color: green; margin-bottom:50ox"> {{ session('success') }} </p>
                        @endif
                        @if(session('error'))
                        <p style="color: red; margin-bottom:50ox"> {{ session('error') }} </p>
                        @endif
                            <form method="post" action="{{ route('career.save') }}" enctype="multipart/form-data" class="">
                                @csrf
                                @method('POST')
                                <div class="heading5 pb-4">Apply For Job</div>
                                    <div class="grid sm:grid-cols-2 gap-4 gap-y-5">
                                       
                                        <div class="firstname">
                                            <label for="lastname">First Name</label>
                                            <input placeholder="First name *" name="firstname" value="{{ old('firstname') }}" autocomplete="off" class="border-line px-4 pt-3 pb-3 w-full rounded-lg" id="address" type="text">
                                            @error('firstname')
                                            <p style="color: red;"> {{ $message }} </p>
                                            @enderror
                                        </div>
                                        <div class="lastname">
                                            <label for="lastname">Last Name</label>
                                            <input name="lastname"  value="{{ old('lastname') }}" autocomplete="off" class="border-line px-4 pt-3 pb-3 w-full rounded-lg" id="addressLine2" type="text" placeholder="Last name *">
                                            @error('lastname')
                                            <p style="color: red;"> {{ $message }} </p>
                                            @enderror
                                        </div>
                                        <div class="email">
                                            <label for="email">Email</label>
                                            <input name="email" value="{{ old('email') }}" autocomplete="off" class="border-line px-4 pt-3 pb-3 w-full rounded-lg" id="city" type="text" placeholder="Email *">
                                            @error('email')
                                            <p style="color: red;"> {{ $message }} </p>
                                            @enderror
                                        </div>

                                        <div class="phone">
                                            <label for="phone">Phone</label>
                                            <input name="phone" value="{{ old('phone') }}" autocomplete="off" class="border-line px-4 pt-3 pb-3 w-full rounded-lg" id="zip" type="text" placeholder="Phone *">
                                            @error('phone')
                                            <p style="color: red;"> {{ $message }} </p>
                                            @enderror
                                        </div>

                                        <div class="postion">
                                            <label for="position">Position</label>
                                            <input name="position" value="{{ old('position') }}" autocomplete="off" class="border-line px-4 pt-3 pb-3 w-full rounded-lg" id="zip" type="text" placeholder="Position *">
                                            @error('position')
                                            <p style="color: red;"> {{ $message }} </p>
                                            @enderror
                                        </div>

                                        <div class="resume">
                                            <label for="resume">Resume *</label>
                                            <input name="resume" autocomplete="off" class="border-line px-4 pt-3 pb-3 w-full rounded-lg" id="resume" type="file" >
                                            @error('resume')
                                            <p style="color: red;"> {{ $message }} </p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="message">
                                        <label for="message">Message</label>
                                        <textarea class="border-line px-4 pt-3 pb-3 w-full rounded-lg" name="message" id="" cols="30" rows="10">{{ old('message') }}</textarea>
                                        @error('message')
                                        <p style="color: red;"> {{ $message }} </p>
                                        @enderror
                                    </div>
                                <div class="block-button lg:mt-10 mt-6">
                                    <a href="#" onclick="window.history.back();" class="button-main" style="text-transform: capitalize;">Back</a>
                                    <button class="button-main" style="text-transform: capitalize;">Apply</button>
                                </div>
                            </form>
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

