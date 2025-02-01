
<!DOCTYPE html>
<html lang="en">
    @include('templates/head')

    <body> 
        @include('templates/header') 
        <div style="margin-top: -50px !important;" class="my-account-block ass">
            <div class="my-account-block md:py-20 py-10;" style=" width: 100%; height: 100%; background-color: rgba(255, 255, 255, 0.9); ">
            <div class="container">
                <div class="content-main lg:px-[60px] md:px-4 flex gap-y-8 max-md:flex-col w-full">
                    @include('admin/menu/admin_menu')
                    <div class="right xl:w-2/3 md:w-7/12 w-full xl:pl-[40px] lg:pl-[28px] md:pl-[16px] flex items-top">
                    <div class="text-content w-full">
                        @if(session('success'))
                        <p style="color: green; margin-bottom: 20px"> {{ session('success') }} </p>
                        @endif
                        @if(session('error'))
                        <p style="color: red; margin-bottom: 20px"> {{ session('error') }} </p>
                        @endif
                            <form action="{{ route('admin.profile.update') }}" method="post" enctype="multipart/form-data" class="">
                                @csrf
                                @method('POST')
                                <div class="heading5 pb-4">Information</div>
                                <div class="grid sm:grid-cols-2 gap-4 gap-y-5">
                                    <div class="first-name">
                                        <input name="firstname" value="{{ ucfirst($user->firstname ) }}" class="border-line px-4 pt-3 pb-3 w-full rounded-lg" id="firstName" type="text" autocomplete="off">
                                        @error('firstname')
                                        <p style="color:red"> {{ $message }} </p>
                                        @enderror
                                    </div>
                                    <div class="last-name">
                                        <input name="lastname" value="{{ ucfirst($user->lastname ) }}" class="border-line px-4 pt-3 pb-3 w-full rounded-lg" id="lastName" type="text" autocomplete="off">
                                        @error('lastname')
                                        <p style="color:red"> {{ $message }} </p>
                                        @enderror
                                    </div>
                                    <div class="email">
                                        <input name="email" value="{{ $user->email }}" class="border-line px-4 pt-3 pb-3 w-full rounded-lg" id="email" type="email" autocomplete="off">
                                        @error('email')
                                        <p style="color:red"> {{ $message }} </p>
                                        @enderror
                                    </div>
                                    <div class="phone-number">
                                        <input autocomplete="off" name="phone" value="{{ $user->phone }}" class="border-line px-4 pt-3 pb-3 w-full rounded-lg" id="phoneNumber" type="text">
                                        @error('phone')
                                        <p style="color:red"> {{ $message }} </p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="heading5 pb-4 lg:mt-10 mt-6">Change Profile Image</div>
                                <div class="pass">
                                    <input name="img" class="border-line px-4 pt-3 pb-3 w-full rounded-lg" type="file">
                                    @error('img')
                                        <p style="color:red"> {{ $message }} </p>
                                        @enderror
                                </div>
                                <div class="heading5 pb-4 lg:mt-10 mt-6">Change Password</div>
                                <div class="pass">
                                    <input autocomplete="off" name="password" class="border-line px-4 pt-3 pb-3 w-full rounded-lg" id="password" type="password" placeholder="Old Password (leave blank to remain unchange)">
                                    @error('password')
                                        <p style="color:red"> {{ $message }} </p>
                                        @enderror
                                </div>
                                <div class="new-pass mt-5">
                                    <input autocomplete="off" name="new_password" class="border-line px-4 pt-3 pb-3 w-full rounded-lg" id="newPassword" type="password" placeholder="New Password (leave blank to remain unchange)">
                                    @error('new_password')
                                        <p style="color:red"> {{ $message }} </p>
                                        @enderror
                                </div>
                                <div class="confirm-pass mt-5">
                                    <input autocomplete="off" name="password_confirmation" class="border-line px-4 pt-3 pb-3 w-full rounded-lg" id="confirmPassword" type="password" placeholder="Confirm Password (leave blank to remain unchange)">
                                    @error('confirmation_password')
                                        <p style="color:red"> {{ $message }} </p>
                                        @enderror
                                </div>
                                <div class="block-button lg:mt-10 mt-6">
                                    <button style="text-transform: capitalize;" class="button-main">Update Account</button>
                                </div>
                            </form>
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
<style>
    .ass{
        background: url('{{ asset("assets/images/caregiver.jpg") }}') no-repeat center center; background-size: cover; position: relative;
    }
</style>

