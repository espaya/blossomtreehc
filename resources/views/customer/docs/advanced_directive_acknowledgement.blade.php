
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
                                <p style="text-align: center;">ADVANCED DIRECTIVE ACKNOWLEDGEMENT/HIPPA/HOME CARE PRIVACY RIGHTS ACKNOWLEDGEMENT</p>
                                <br>
                                <p>
                                    Client’s name: <u>{{ ucfirst($user->firstname . ' ' . $user->lastname) }}</u>
                                </p>
                                <p> 
                                <div class="pass mt-5">
                                    MR #<input name="mr_no" value="{{ old('mr_no') }}" class="border-line px-4 pt-3 pb-3 w-1/3 rounded-lg @error('mr_no') is-invalid @enderror" id="mr_no" type="text" autocomplete="off">
                                </div>
                                </p>
                                <br>
                                <p>
                                I <u>{{ ucfirst($user->firstname . ' ' . $user->lastname) }}</u>
                                acknowledge that the Agency has provided me with information which indicates that I may accept or reject any medical treatment, including any service specified:
                                </p>
                                <br>
                                <p>
                                    <ul>
                                        <li>• Living Will, Out of Hospital, and Do Not Resuscitate (DNR)</li>
                                        <li>• Statutory Power of Attorney for Health Care decisions</li>
                                        <li>• Advance Directives in Kentucky – A Health Care Directive</li>
                                        <li>• HIPPA/Home Care Privacy Rights</li>
                                    </ul>
                                </p>
                                <br>
                                <p>I also understand that it is my responsibility to ask questions about the information provided by the Agency. They have offered to provide a copy of the state’s illustrative forms under state law if I request. I have also been advised to consult with my physician, lawyer, family, clergy, social worker, or other qualified personnel for additional or contact with a lawyer should I need assistance in changing the forms to reflect my information, treatment wishes or in executing a living will or statutory Power of Attorney for health care decisions.</p>
                                <br>

                                <p>I understand that this Agency will honor the advance directives and is willing and able to provide any procedure. Specified in the advanced directives.</p>
                                <br>

                                <p>I understand that the fact that I have or have not signed a living will or Statutory Power of Attorney for Home Care decisions do not affect the medical treatment and services/care to be provided by the Agency. I understand that it is the Agency’s written policy to fully comply through its healthcare providers with the terms of a consumer’s Living Will or Statutory Power of Attorney for Healthcare decisions to fullest extent permitted by state statutory Power of Attorney for Healthcare decisions to fullest extent permitted by state law.
                                I have been given an explanation and acknowledged receipt of the HIPAA PRIVACY RIGHTS. I understand that I may contact the Agency at any time regarding questions or concerns.
                                </p>
                                <br>

                                <p>
                                PLEASE CHECK THE FOLLOWING:<br>
                                </p>
                                <div class="flex items-center">
                                    <div class="block-input">
                                        <input type="radio" name="living_will" id="i_have_1" value="I Have signed a Living Will.">
                                        <i class="ph-fill ph-check-square icon-checkbox"></i>
                                    </div>
                                    <label for="remember" class="pl-2 cursor-pointer">I Have </label>
                                    <div style="margin-left: 10px;" class="block-input">
                                        <input type="radio" name="living_will" id="i_have_not_2" value="I Have not signed a Living Will.">
                                        <i class="ph-fill ph-check-square icon-checkbox"></i>
                                    </div>
                                    <label for="remember" class="pl-2 cursor-pointer"> I Have not signed a Living Will.</label>
                                </div>

                                <div class="flex items-center">
                                    <div class="block-input">
                                        <input type="radio" name="statutory_power" id="i_have_3">
                                        <i class="ph-fill ph-check-square icon-checkbox"></i>
                                    </div>
                                    <label for="remember" class="pl-2 cursor-pointer">I Have </label>
                                    <div style="margin-left: 10px;" class="block-input">
                                        <input type="radio" name="statutory_power" id="i_have_not_4">
                                        <i class="ph-fill ph-check-square icon-checkbox"></i>
                                    </div>
                                    <label for="remember" class="pl-2 cursor-pointer"> I Have not signed a Statutory Power of Attorney for Health Care</label>
                                </div>

                                <div class="flex items-center">
                                    <div class="block-input">
                                        <input type="radio" name="confirm" id="i_have_not">
                                        <i class="ph-fill ph-check-square icon-checkbox"></i>
                                    </div>
                                    <label for="remember" class="pl-2 cursor-pointer"> If I have the above documents, I will provide the Agency with copies for its records.</label>
                                </div>
                                
                                <br>

                                <p>HIPPA PRIVACY RIGHTS</p>
                                <p>Consumers have the right to give adequate notice concerning the use/disclosure of their PHI on the first date of service delivery, or as soon as possible after an emergency.
                                The Privacy Rule grants consumers new rights over their PHI, including the following:<br>
                                1. Receive a Privacy Notice at the time of the first delivery of service.<br>
                                2. Restrict use and disclosure, although the covered entity is not required to agree.<br>
                                3. Have PHI communicated to them by alternate means and at alternate locations to protect confidentiality.<br>
                                4. Inspect, correct, and amend PHI and obtain copies, with some exceptions.<br>
                                5. Request a history of non-routine disclosures for six years prior to the request, and<br>
                                6. Contact designated people regarding any privacy concerns or breach of privacy within the facility or at HHS.<br>
                                </p>
                                <br>
                                <p>
                                Signature of Consumer or Representative (Signed on behalf of consumer when authorized to the extent permitted by state law):
                                </p>
                                <br>
                                <br><br>
                                
                                <label for="agency_rep_signed_name" class="mr-2 block">Name And Signature:</label>
                                <div class="flex items-center justify-between mt-5 w-full">
                                    <div class="w-1/2 pr-4"> <!-- Add padding-right for spacing -->
                                        <u><u>{{ ucfirst($user->firstname . ' ' . $user->lastname) }}</u></u>
                                    </div>

                                    <div class="w-1/2 pl-4">
                                        <div class="flex-row">
                                            <div class="wrapper">
                                                <canvas id="signature-pad" width="400" height="200"></canvas>
                                                <textarea require style="display:none" name="signature" id="signature-input"></textarea>
                                            </div>
                                            <div class="clear-btn">
                                                <button id="clear"><span>Clear</span></button>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <br> <div class="pass mt-5"> Date:
                                    <input disabled name="agency_rep_signed_date" value="{{ date('F j, Y') }}" class="border-line px-4 pt-3 pb-3 w-full rounded-lg @error('date') is-invalid @enderror" id="mr_no" type="text" autocomplete="off">
                                </div>
                                <br>
                                <br>
                                <p>Federal law requires that this agency provide the above information.
                                </p>
                            </div>
                            <div class="block-button md:mt-7 mt-4">
                                <button class="button-main">Submit</button>
                                <a href="#" onclick="window.history.back();" class="button-main">Back</a>
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


