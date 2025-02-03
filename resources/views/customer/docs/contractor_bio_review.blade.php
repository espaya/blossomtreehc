   
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
                        <form action="#" enctype="multipart/form-data">
                            @csrf
                            <div class="w-full">
                                <p style="text-align: center;">BLOSSOM TREE HOME HEALTHCARE SERVICES LLC</p>
                                <p style="text-align: center;">CONTRACTOR BIO REVIEW</p><br>
                                <p>First Name: <u> {{ ucfirst($user->firstname) }} </u></p><br>
                                <p>Last Name: <u> {{ ucfirst($user->lastname) }} </u></p><br>

                                <div class="dob">
                                    <label for="">Date of Birth *</label>
                                    <input value="{{ old('dob') }}" name="dob" class="border-line px-4 pt-3 pb-3 w-full rounded-lg" id="dob" type="date" autocomplete="off">
                                    @error('dob')
                                    <p style="color: red;"> {{ $message }} </p>
                                    @enderror
                                </div>

                                <div class="mt-5">
                                    <label for="">Social Security Number</label>
                                    <input value="{{ old('ssn') }}" name="dob" class="border-line px-4 pt-3 pb-3 w-full rounded-lg" id="ssn" type="text" autocomplete="off" placeholder="Social Security Number *">
                                    @error('ssn')
                                    <p style="color: red;"> {{ $message }} </p>
                                    @enderror
                                </div>

                                <div class="mt-5">
                                    <label for="">Driver License Number</label>
                                    <input value="{{ old('dln') }}" name="dob" class="border-line px-4 pt-3 pb-3 w-full rounded-lg" id="dln" type="text" autocomplete="off" placeholder="Driver License Number *">
                                    @error('dln')
                                    <p style="color: red;"> {{ $message }} </p>
                                    @enderror
                                </div>

                                <p class="mt-5">Email: <u> {{ $user->email }} </u></p>

                                <div class="mt-5">
                                    <label for="">Home Address</label>
                                    <input value="{{ old('home_address') }}" name="home_address" class="border-line px-4 pt-3 pb-3 w-full rounded-lg" id="home_address" type="text" autocomplete="off" placeholder="Home Address *">
                                    @error('home_address')
                                    <p style="color: red;"> {{ $message }} </p>
                                    @enderror
                                </div>

                                <div class="mt-5">
                                    <label for="">City</label>
                                    <input value="{{ old('city') }}" name="city" class="border-line px-4 pt-3 pb-3 w-full rounded-lg" id="city" type="text" autocomplete="off" placeholder="City *">
                                    @error('city')
                                    <p style="color: red;"> {{ $message }} </p>
                                    @enderror
                                </div>

                                <div class="mt-5">
                                    <label for="">State</label>
                                    <input value="{{ old('state') }}" name="state" class="border-line px-4 pt-3 pb-3 w-full rounded-lg" id="state" type="text" autocomplete="off" placeholder="State *">
                                    @error('city')
                                    <p style="color: red;"> {{ $message }} </p>
                                    @enderror
                                </div>

                                <div class="mt-5">
                                    <label for="">Zip Code</label>
                                    <input value="{{ old('zip_code') }}" name="zip_code" class="border-line px-4 pt-3 pb-3 w-full rounded-lg" id="zip_code" type="text" autocomplete="off" placeholder="Zip Code *">
                                    @error('zip_code')
                                    <p style="color: red;"> {{ $message }} </p>
                                    @enderror
                                </div>

                                <div class="mt-5">
                                    <label for="">Date of Hire *</label>
                                    <input value="{{ old('date_of_hire') }}" name="date_of_hire" class="border-line px-4 pt-3 pb-3 w-full rounded-lg" id="date_of_hire" type="date" autocomplete="off">
                                    @error('date_of_hire')
                                    <p style="color: red;"> {{ $message }} </p>
                                    @enderror
                                </div>

                                <div class="mt-5">
                                    <label for="">Level of Education </label>
                                    <input value="{{ old('level_of_education') }}" name="level_of_education" class="border-line px-4 pt-3 pb-3 w-full rounded-lg" id="level_of_education" placeholder="Level of Education *" type="text" autocomplete="off">
                                    @error('level_of_education')
                                    <p style="color: red;"> {{ $message }} </p>
                                    @enderror
                                </div>

                                <div class="mt-5">
                                    <label for="">Date of Background Checks (<a title="www.courts.ky.gov" style="text-decoration: underline;" href="https://www.courts.ky.gov" target="_blank">www.courts.ky.gov</a>) *</label>
                                    <input value="{{ old('date_of_background_checks') }}" name="date_of_background_checks" class="border-line px-4 pt-3 pb-3 w-full rounded-lg" id="date_of_background_checks" type="date" autocomplete="off">
                                    @error('date_of_background_checks')
                                    <p style="color: red;"> {{ $message }} </p>
                                    @enderror
                                </div>

                                <div class="mt-5">
                                    <label for="">Date of Nurse Aide and Home Health Aide Abuse Registry Check ( <a title="www.kbn.ky.gov" target="_blank" style="text-decoration: underline;" href="https://www.kbn.ky.gov">www.kbn.ky.gov</a>) *</label>
                                    <input value="{{ old('abuse_registry_check') }}" name="abuse_registry_check" class="border-line px-4 pt-3 pb-3 w-full rounded-lg" id="abuse_registry_check" type="date" autocomplete="off">
                                    @error('abuse_registry_check')
                                    <p style="color: red;"> {{ $message }} </p>
                                    @enderror
                                </div>

                                <div class="mt-5">
                                    <label for="">Date of KY Adult Caregiver Misconduct Registry Check ( <a title="prd.webapps.chfs.ky.gov/kacmr/UserInformation.aspx" target="_blank" style="text-decoration: underline;" href="https://prd.webapps.chfs.ky.gov/kacmr/UserInformation.aspx">prd.webapps.chfs.ky.gov/kacmr/UserInformation.aspx</a>) *</label>
                                    <input value="{{ old('caregiver_registry_check') }}" name="caregiver_registry_check" class="border-line px-4 pt-3 pb-3 w-full rounded-lg" id="abuse_registry_check" type="date" autocomplete="off">
                                    @error('caregiver_registry_check')
                                    <p style="color: red;"> {{ $message }} </p>
                                    @enderror
                                </div>

                                <div class="mt-5">
                                    <label for="">Date of Substance Abuse Check *</label>
                                    <input value="{{ old('substance_abuse_check') }}" name="caregiver_registry_check" class="border-line px-4 pt-3 pb-3 w-full rounded-lg" id="substance_abuse_check" type="date" autocomplete="off">
                                    @error('substance_abuse_check')
                                    <p style="color: red;"> {{ $message }} </p>
                                    @enderror
                                </div>

                                <div class="mt-5">
                                    <label for="">Date of evaluation to determine employee competence training  *</label>
                                    <input value="{{ old('employee_competence_training') }}" name="employee_competence_training" class="border-line px-4 pt-3 pb-3 w-full rounded-lg" id="employee_competence_training" type="date" autocomplete="off">
                                    @error('employee_competence_training')
                                    <p style="color: red;"> {{ $message }} </p>
                                    @enderror
                                </div>

                                <p class="mt-5">
                                    Date of Employee Training as well as the topics covered. Training must include the following:
                                </p>

                                <p class="mt-5">1.	Procedure for reporting adult abuse, Neglect or Exploitation.</p>
                                <p class="mt-5">2.	Procedure for reporting Child Abuse or Neglect.</p>
                                <p class="mt-5">3.	Procedure for facilitating the self-assessment of Administration of Medication</p>
                                <p class="mt-5">4.	Effective communication techniques tailored to individual client’s needs.</p>

                                <p class="mt-10">Contractor Signature: _________________________________________________ </p>
                                <p class="mt-5">Contractor first name: <u> {{ ucfirst($user->firstname) }} </u></p>
                                <p class="mt-5">Last name: <u> {{ ucfirst($user->lastname) }} </u></p>
                                <p class="mt-5">Date: {{ date('F j, Y') }} </p>


                                
                                
                                <div class="block-button md:mt-7 mt-4">
                                    <button class="button-main">Submit</button>
                                    <a href="#" onclick="window.history.back();" class="button-main">Back</a>
                                </div>
                            </div> 
                        </form>
                    </div>
                </div>
            </div>
        </div>

        @include('templates/footer')

        <a class="scroll-to-top-btn" href="#top-nav"><i class="ph-bold ph-caret-up"></i></a>

        <script src="{{asset('assets/js/phosphor-icons.js')}}"></script>
        <script src="{{asset('assets/js/swiper-bundle.min.js')}}"></script>
        <script src="{{asset('assets/js/main.js')}}"></script>
        <!-- Include Signature Pad library -->

        <script src="https://cdnjs.cloudflare.com/ajax/libs/signature_pad/1.5.3/signature_pad.min.js"></script>
        
        <script type="text/javascript">
            var canvas = document.getElementById("signature-pad");
            var signaturePad = new SignaturePad(canvas);
            
            document.getElementById("clear").addEventListener('click', function(event) {
                event.preventDefault();
                signaturePad.clear();
            });
            
            
            function submitForm() {
                if(!signaturePad.isEmpty()){
                //Unterschrift in verstecktes Feld übernehmen
                document.getElementById('signature-input').value = signaturePad.toDataURL();
                }
            }
            
            </script>


    </body>
</html>
<style>
    .ass{
        background: url('{{ asset("assets/images/caregiver.jpg") }}') no-repeat center center; background-size: cover; position: relative;
    }
</style>


