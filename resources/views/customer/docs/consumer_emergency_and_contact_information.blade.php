  
<!DOCTYPE html>
<html lang="en">
    @include('templates/head')
    <style>
   .flex-row {
   display: flex;
   }
   .wrapper {
   border: 1px solid #4b00ff;
   border-right: 0;
   }
   canvas#signature-pad {
   background: #fff;
   width: 100%;
   height: 100%;
   cursor: crosshair;
   }
   button#clear {
   height: 100%;
   background: #4b00ff;
   border: 1px solid transparent;
   color: #fff;
   font-weight: 600;
   cursor: pointer;
   }
   button#clear span {
   transform: rotate(90deg);
   display: block;
   }
</style>

    <body>
        @include('templates/header') 
        <div style="margin-top: -50px !important;" class="my-account-block ass">
        <div class="my-account-block md:py-20 py-10;" style=" width: 100%; height: 100%; background-color: rgba(255, 255, 255, 0.9); "><div style="margin-top: -50px !important;" class="my-account-block md:py-20 py-10">
            <div class="container">
                <div class="content-main lg:px-[60px] md:px-4 flex gap-y-8 max-md:flex-col w-full">
                    @include('customer/menu/menu')
                    <div class="right xl:w-2/3 md:w-7/12 w-full xl:pl-[40px] lg:pl-[28px] md:pl-[16px] flex items-start justify-center">
                        @if($isAddress && $isAddress->isNotEmpty())
                        @if($consumer_emergency && $consumer_emergency->isNotEmpty())
                            @forelse($consumer_emergency as $consumer)
                            <div class="w-full">
                                <p style="text-align: center;">BLOSSOM TREE HOME HEALTHCARE SERVICES LLC</p>
                                <p style="text-align: center;">CONSUMER EMERGENCY AND CONTACT INFORMATION</p>
                                <br>

                                @if(session('success'))
                                <p style="color: green; text-align: center;"> {{ session('success') }} </p>
                                @endif
                                @if(session('error'))
                                <p style="color: red; text-align: center;"> {{ session('error') }} </p>
                                @endif
                                <br>

                                <div class="fistname">
                                    <label for="">Consumer Name</label>
                                    <input disabled value="{{ ucfirst($user->firstname . ' ' . $user->lastname ) }}" name="consumer_name" class="border-line px-4 pt-3 pb-3 w-full rounded-lg" type="text">
                                </div>

                                                                
                                <div class="mt-5">
                                    <label for="">SOC</label>
                                    <input disabled value="{{ Crypt::decryptString($consumer->soc) }}" name="soc" class="border-line px-4 pt-3 pb-3 w-full rounded-lg" type="text">
                                </div>

                                @if($isAddress && $isAddress->isNotEmpty())
                                @forelse($isAddress as $address)
                                <div class="mt-5">
                                <label for="">Address</label>
                                    <input disabled value="{{ $address->address }}" name="address" class="border-line px-4 pt-3 pb-3 w-full rounded-lg" id="address" type="text">
                                </div>

                                <div class="mt-5">
                                <label for="">City</label>
                                    <input disabled value="{{ $address->city }}" name="city" class="border-line px-4 pt-3 pb-3 w-full rounded-lg" id="city" type="text">
                                </div>
                                <div class="mt-5">
                                <label for="">State</label>
                                    <input disabled value="{{ $address->state }}" name="state" class="border-line px-4 pt-3 pb-3 w-full rounded-lg" id="state" type="text">
                                </div>
                                <div class="mt-5">
                                <label for="">Zip</label>
                                    <input disabled value="{{ $address->zip }}" name="zip" class="border-line px-4 pt-3 pb-3 w-full rounded-lg" id="zip" type="text">
                                </div>
                                @empty 
                                @endforelse
                                @endif

                                <div class="mt-5">
                                <label for="">Telephone Number</label>
                                    <input disabled value="{{ Crypt::decryptString($consumer->telephone) }}" name="telephone" class="border-line px-4 pt-3 pb-3 w-full rounded-lg" type="text">
                                </div>

                                <div class="mt-5">
                                <label for="">Cell Phone</label>
                                    <input disabled value="{{ Crypt::decryptString($consumer->cell_phone) }}" name="cell_phone" class="border-line px-4 pt-3 pb-3 w-full rounded-lg" type="text">
                                </div>

                                <div class="mt-5">
                                <label for="">Responsible Person's Name</label>
                                    <input disabled value="{{ Crypt::decryptString($consumer->responsible_persons_name) }}" name="responsible_persons_name" class="border-line px-4 pt-3 pb-3 w-full rounded-lg" type="text">
                                </div>

                                <div class="mt-5">
                                <label for="">Relationship</label>
                                    <input disabled value="{{ Crypt::decryptString($consumer->relationship) }}" name="relationship" class="border-line px-4 pt-3 pb-3 w-full rounded-lg" type="text">
                                </div>

                                <div class="mt-5">
                                    <label for="">Responsible Person's Home Phone</label>
                                    <input disabled value="{{ Crypt::decryptString($consumer->responsible_person_home_telephone) }}" name="responsible_person_home_telephone" class="border-line px-4 pt-3 pb-3 w-full rounded-lg" type="text">
                                </div>

                                <div class="mt-5">
                                    <label for="">Responsible Person's Work Phone</label>   
                                    <input disabled value="{{ Crypt::decryptString($consumer->responsible_person_work_phone) }}" name="responsible_person_work_phone" class="border-line px-4 pt-3 pb-3 w-full rounded-lg" type="text" >
                                </div>

                                <div class="mt-5">
                                <label for="">Responsible Person's Cell Phone</label>
                                    <input disabled value="{{ Crypt::decryptString($consumer->responsible_person_cell_phone) }}" name="responsible_person_cell_phone" class="border-line px-4 pt-3 pb-3 w-full rounded-lg" type="text">
                                </div>
                                <br>
                                <br>
                                <p>Relative/Friend Not Living With You</p>
                                
                                <div class="mt-5">
                                <label for="">Name</label>
                                    <input disabled value="{{ Crypt::decryptString($consumer->friend_relative_name) }}" name="friend_relative_name" class="border-line px-4 pt-3 pb-3 w-full rounded-lg" id="friend_relative_name" type="text">
                                </div>

                                <div class="mt-5">
                                <label for="">Relationship</label>
                                    <input disabled value="{{ Crypt::decryptString($consumer->friend_relative_relationship) }}" name="friend_relative_relationship" class="border-line px-4 pt-3 pb-3 w-full rounded-lg" id="friend_relative_relationship" type="text">
                                </div>

                                <div class="mt-5">
                                <label for="">Home Telephone</label>
                                    <input disabled value="{{ Crypt::decryptString($consumer->friend_relative_home_telephone) }}" name="friend_relative_home_telephone" class="border-line px-4 pt-3 pb-3 w-full rounded-lg" id="friend_relative_home_telephone" type="text">
                                </div>

                                <div class="mt-5">
                                <label for="">Work Phone</label>
                                    <input disabled value="{{ Crypt::decryptString($consumer->friend_relative_work_phone) }}" name="friend_relative_work_phone" class="border-line px-4 pt-3 pb-3 w-full rounded-lg" id="friend_relative_work_phone" type="text">
                                </div>

                                <div class="mt-5">
                                <label for="">Cell Phone</label>
                                    <input disabled value="{{ Crypt::decryptString($consumer->friend_relative_cell_phone) }}" name="friend_relative_cell_phone" class="border-line px-4 pt-3 pb-3 w-full rounded-lg" id="friend_relative_cell_phone" type="text">
                                </div>

                                <div class="mt-5">
                                <label for="">Primary Physician</label>
                                    <input disabled value="{{ Crypt::decryptString($consumer->primary_physician) }}" name="primary_physician" class="border-line px-4 pt-3 pb-3 w-full rounded-lg" id="primary_physician" type="text">
                                </div>

                                <div class="mt-5">
                                <label for="">Telephone Number</label>
                                    <input disabled value="{{ Crypt::decryptString($consumer->physician_telephone) }}" name="physician_telephone" class="border-line px-4 pt-3 pb-3 w-full rounded-lg" id="physician_telephone" type="text">
                                </div>

                                <br>
                                <p><b>NATURAL DISASTER EMERGENCY PLAN</b></p>

                                <p>Class I – Consumers with life threatening conditions that require ongoing medical treatment or a medical device to sustain life.</p><br>
                                <p>Class II – Consumers with the greatest need for care will be as soon as possible. Consumers requiring daily insulin injections, IV medications, sterile wound care for a wound with a large amount of drainage.</p><br>
                                <p>Class III – Services could be postponed 24-48hours without adverse effects. Diabetic consumers can self-inject, sterile wound care to a wound with minimal amount or not drainage.</p><br>
                                <p>Class IV – Service could be postponed 72-96 hours without adverse effects. Postoperative with no wound, routine catheter changes or discharge within 10-14 days.</p>
                            </div> 
                            @empty 
                            @endforelse
                        @else 
                        <form action="{{ route('account.consumer.emergency') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="w-full">
                                <p style="text-align: center;">BLOSSOM TREE HOME HEALTHCARE SERVICES LLC</p>
                                <p style="text-align: center;">CONSUMER EMERGENCY AND CONTACT INFORMATION</p>
                                <br>

                                @if(session('success'))
                                <p style="color: green; text-align: center;"> {{ session('success') }} </p>
                                @endif
                                @if(session('error'))
                                <p style="color: red; text-align: center;"> {{ session('error') }} </p>
                                @endif
                                <br>

                                <div class="fistname">
                                    <label for="">Consumer Name</label>
                                    <input disabled value="{{ ucfirst($user->firstname . ' ' . $user->lastname ) }}" name="consumer_name" class="border-line px-4 pt-3 pb-3 w-full rounded-lg" id="consumer_name" type="text" autocomplete="off" placeholder="Consumer Name *">
                                    @error('consumer_name')
                                    <p style="color: red;"> {{ $message }} </p>
                                    @enderror
                                </div>

                                
                                <div class="mt-5">
                                    <label for="">SOC</label>
                                    <input value="{{ old('soc') }}" name="soc" class="border-line px-4 pt-3 pb-3 w-full rounded-lg" id="soc" type="text" autocomplete="off" placeholder="SOC *">
                                    @error('soc')
                                    <p style="color: red;"> {{ $message }} </p>
                                    @enderror
                                </div>

                                <div class="mt-5">
                                <label for="">Telephone Number</label>
                                    <input value="{{ old('telephone') }}" name="telephone" class="border-line px-4 pt-3 pb-3 w-full rounded-lg" id="telephone" type="text" autocomplete="off" placeholder="Telephone Number *">
                                    @error('telephone')
                                    <p style="color: red;"> {{ $message }} </p>
                                    @enderror
                                </div>

                                <div class="mt-5">
                                <label for="">Cell Phone</label>
                                    <input value="{{ old('cell_phone') }}" name="cell_phone" class="border-line px-4 pt-3 pb-3 w-full rounded-lg" id="cell_phone" type="text" autocomplete="off" placeholder="Cell Phone *">
                                    @error('cell_phone')
                                    <p style="color: red;"> {{ $message }} </p>
                                    @enderror
                                </div>

                                <div class="mt-5">
                                <label for="">Responsible Person's Name</label>
                                    <input value="{{ old('responsible_persons_name') }}" name="responsible_persons_name" class="border-line px-4 pt-3 pb-3 w-full rounded-lg" id="responsible_persons_name" type="text" autocomplete="off" placeholder="Responsible Person Name *">
                                    @error('responsible_persons_name')
                                    <p style="color: red;"> {{ $message }} </p>
                                    @enderror
                                </div>

                                <div class="mt-5">
                                <label for="">Relationship</label>
                                    <input value="{{ old('relationship') }}" name="relationship" class="border-line px-4 pt-3 pb-3 w-full rounded-lg" id="relationship" type="text" autocomplete="off" placeholder="Relationship *">
                                    @error('relationship')
                                    <p style="color: red;"> {{ $message }} </p>
                                    @enderror
                                </div>

                                <div class="mt-5">
                                    <label for="">Responsible Person's Home Phone</label>
                                    <input value="{{ old('responsible_person_home_telephone') }}" name="responsible_person_home_telephone" class="border-line px-4 pt-3 pb-3 w-full rounded-lg" id="responsible_person_home_telephone" type="text" autocomplete="off" placeholder="Responsible Person Home Phone *">
                                    @error('responsible_person_home_telephone')
                                    <p style="color: red;"> {{ $message }} </p>
                                    @enderror
                                </div>

                                <div class="mt-5">
                                    <label for="">Responsible Person's Work Phone</label>   
                                    <input value="{{ old('responsible_person_work_phone') }}" name="responsible_person_work_phone" class="border-line px-4 pt-3 pb-3 w-full rounded-lg" id="responsible_person_work_phone" type="text" autocomplete="off" placeholder="Responsible Person Work Phone *">
                                    @error('responsible_person_work_phone')
                                    <p style="color: red;"> {{ $message }} </p>
                                    @enderror
                                </div>

                                <div class="mt-5">
                                <label for="">Responsible Person's Cell Phone</label>
                                    <input value="{{ old('responsible_person_cell_phone') }}" name="responsible_person_cell_phone" class="border-line px-4 pt-3 pb-3 w-full rounded-lg" id="responsible_person_cell_phone" type="text" autocomplete="off" placeholder="Responsible Person Cell Phone *">
                                    @error('responsible_person_cell_phone')
                                    <p style="color: red;"> {{ $message }} </p>
                                    @enderror
                                </div>
                                <br>
                                <br>
                                <p>Relative/Friend Not Living With You</p>
                                
                                <div class="mt-5">
                                <label for="">Name</label>
                                    <input value="{{ old('friend_relative_name') }}" name="friend_relative_name" class="border-line px-4 pt-3 pb-3 w-full rounded-lg" id="relative_friend_name" type="text" autocomplete="off" placeholder="Relative/Friend Not Living With You Name *">
                                    @error('friend_relative_name')
                                    <p style="color: red;"> {{ $message }} </p>
                                    @enderror
                                </div>

                                <div class="mt-5">
                                <label for="">Relationship</label>
                                    <input value="{{ old('friend_relative_relationship') }}" name="friend_relative_relationship" class="border-line px-4 pt-3 pb-3 w-full rounded-lg" id="friend_relative_relationship" type="text" autocomplete="off" placeholder="Relative/Friend Not Living With You Relationship *">
                                    @error('friend_relative_relationship')
                                    <p style="color: red;"> {{ $message }} </p>
                                    @enderror
                                </div>

                                <div class="mt-5">
                                <label for="">Home Telephone</label>
                                    <input value="{{ old('friend_relative_home_telephone') }}" name="friend_relative_home_telephone" class="border-line px-4 pt-3 pb-3 w-full rounded-lg" id="friend_relative_home_telephone" type="text" autocomplete="off" placeholder="Relative/Friend Not Living With You Home Telephone *">
                                    @error('friend_relative_home_telephone')
                                    <p style="color: red;"> {{ $message }} </p>
                                    @enderror
                                </div>

                                <div class="mt-5">
                                <label for="">Work Phone</label>
                                    <input value="{{ old('friend_relative_work_phone') }}" name="friend_relative_work_phone" class="border-line px-4 pt-3 pb-3 w-full rounded-lg" id="relative_friend_work_phone" type="text" autocomplete="off" placeholder="Relative/Friend Not Living With You Work Phone *">
                                    @error('friend_relative_work_phone')
                                    <p style="color: red;"> {{ $message }} </p>
                                    @enderror
                                </div>

                                <div class="mt-5">
                                <label for="">Cell Phone</label>
                                    <input value="{{ old('friend_relative_cell_phone') }}" name="friend_relative_cell_phone" class="border-line px-4 pt-3 pb-3 w-full rounded-lg" id="friend_relative_cell_phone" type="text" autocomplete="off" placeholder="Relative/Friend Not Living With You Cell Phone *">
                                    @error('friend_relative_cell_phone')
                                    <p style="color: red;"> {{ $message }} </p>
                                    @enderror
                                </div>

                                <div class="mt-5">
                                <label for="">Primary Physician</label>
                                    <input value="{{ old('primary_physician') }}" name="primary_physician" class="border-line px-4 pt-3 pb-3 w-full rounded-lg" id="primary_physician" type="text" autocomplete="off" placeholder="Primary Physician *">
                                    @error('primary_physician')
                                    <p style="color: red;"> {{ $message }} </p>
                                    @enderror
                                </div>

                                <div class="mt-5">
                                <label for="">Telephone Number</label>
                                    <input value="{{ old('physician_telephone') }}" name="physician_telephone" class="border-line px-4 pt-3 pb-3 w-full rounded-lg" id="physician_telephone_number" type="text" autocomplete="off" placeholder="Telephone Number *">
                                    @error('physician_telephone')
                                    <p style="color: red;"> {{ $message }} </p>
                                    @enderror
                                </div>

                                <br>
                                <p><b>NATURAL DISASTER EMERGENCY PLAN</b></p>

                                <p>Class I – Consumers with life threatening conditions that require ongoing medical treatment or a medical device to sustain life.</p><br>
                                <p>Class II – Consumers with the greatest need for care will be as soon as possible. Consumers requiring daily insulin injections, IV medications, sterile wound care for a wound with a large amount of drainage.</p><br>
                                <p>Class III – Services could be postponed 24-48hours without adverse effects. Diabetic consumers can self-inject, sterile wound care to a wound with minimal amount or not drainage.</p><br>
                                <p>Class IV – Service could be postponed 72-96 hours without adverse effects. Postoperative with no wound, routine catheter changes or discharge within 10-14 days.</p>

                                <div class="block-button md:mt-7 mt-4">
                                    <button class="button-main">Submit</button>
                                    <a href="#" onclick="window.history.back();" class="button-main">Back</a>
                                </div>
                               
                            </div> 
                        </form>
                        @endif
                        @else 
                            <h5>Please fill your <a href="{{ route('my.address') }}"><u>address</u></a> before you can complete this form</h5>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        @include('templates/footer')

        <a class="scroll-to-top-btn" href="#top-nav"><i class="ph-bold ph-caret-up"></i></a>

        <script src="{{asset('assets/js/phosphor-icons.js')}}"></script>
        <script src="{{asset('assets/js/swiper-bundle.min.js')}}"></script>
        <script src="{{asset('assets/js/main.js')}}"></script>
        <!-- Include Signature Pad library -->>
    </body>
</html>
<style>
    .ass{
        background: url('{{ asset("assets/images/caregiver.jpg") }}') no-repeat center center; background-size: cover; position: relative;
    }
</style>


