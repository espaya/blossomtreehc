
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
                                <p style="text-align: center;">AUTHORIZATION FOR USE AND DISCLOSURE OF PROTECTED HEALTH INFORMATION</p>
                                <br>
                                
                                <p>
                                You may decline to sign this Authorization
                                </p>
                                <br>
                                
                                <p>I <u>{{ ucfirst($user->firstname . ' ' . $user->lastname) }}</u>
                                hereby authorize Blossom Tree Home Healthcare Services LLC (hereafter collectively referred to as (“Agency”) to use and disclose in any form or format, a copy of records concerning
                                </p>
        
                                <div class="pass mt-5">
                                    <input name="concerning" value="{{ old('concerning') }}" class="border-line px-4 pt-3 pb-3 w-full rounded-lg @error('concerning') is-invalid @enderror" id="concerning" type="text" autocomplete="off"><br><br>
                                    <p>(PRINT consumer name) but only as follows:
                                        <u>
                                            <li>A copy of this signed, dated authorization shall be as effective as the original.</li>
                                            <li>Agency may use and disclose the following information to:</li>

                                        </u>
                                    </p>
                                    <input name="concerning" value="{{ old('concerning') }}" class="border-line px-4 pt-3 pb-3 w-full rounded-lg @error('concerning') is-invalid @enderror" id="concerning" type="text" autocomplete="off">
                                    @error('concerning')
                                        <p style="color: red;"> {{ $message }}</p>
                                    @enderror
                                </div>
                                <br>

                                <p>For the purpose(s) of (be specific):</p>
                                <p>I specifically authorize the Agency to use and disclose the following types of confidential information. (Check where appropriate): </p>
                                <input name="xx" value="{{ old('xx') }}" class="border-line px-4 pt-3 pb-3 w-1 rounded-lg @error('xx') is-invalid @enderror" id="xx" type="checkbox" autocomplete="off"> HIV records (including HIV test results) and sexually transmissible diseases.<br>
                                <input name="yy" value="{{ old('yy') }}" class="border-line px-4 pt-3 pb-3 w-1 rounded-lg @error('yy') is-invalid @enderror" id="yy" type="checkbox" autocomplete="off"> Alcohol and substance abuse diagnosis and treatment records<br>
                                <input name="zz" value="{{ old('zz') }}" class="border-line px-4 pt-3 pb-3 w-1 rounded-lg @error('zz') is-invalid @enderror" id="zz" type="checkbox" autocomplete="off"> Psychotherapy records<br>
                                <input name="jj" value="{{ old('jj') }}" class="border-line px-4 pt-3 pb-3 w-1 rounded-lg @error('jj') is-invalid @enderror" id="jj" type="checkbox" autocomplete="off"> Other: Specify: 
                                    <input name="jj" value="{{ old('jj') }}" class="border-line px-4 pt-3 pb-3 w-1/2 rounded-lg @error('jj') is-invalid @enderror" id="jj" type="text" autocomplete="off"><br>
                                 </p>
                                <br>

                                <p>
                                The undersigned does hereby release, holds harmless and agrees to indemnify the Agency, its employees, and agents for all liability (including but not limited to negligence) arising out of or occurring under this authorization. I understand that my records may be subject to re-disclosure by recipient(s) and unprotected by federal or state law; that this authorization remains effective until the Agency is in actual receipt of a signed revocation or until the records retention period required under federal and state law has expired and the records have been destroyed; that I have the right to revoke this authorization at any time, provided I do so in writing; that I have been given an opportunity to ask questions: 
                                </p>
                                <br>

                                <p>
                                    <ul>
                                        <li>•	that I have received a copy of the signed authorization.</li> 
                                        <li>•	that I may inspect a copy of my protected health information to be used or disclosed under this authorization. </li>
                                        <li>•	that the Agency has not conditioned provision of services to or treatment of me upon receipt of this signed authorization, and </li>
                                        <li>•	that I may refuse to sign this authorization.</li>

                                    </ul>
                                </p>
                                <br>
                                <br>

                                
                                <label for="agency_rep_signed_name" class="mr-2 block">Consumer Signature:</label>
                                <div class="flex items-center justify-between mt-5 w-full">
                                <div class="w-1/2 pl-4 pr-4"> <!-- Added padding-right for spacing -->
                                    <div class="flex-row">
                                        <div class="wrapper">
                                            <canvas id="signature-pad" width="400" height="200"></canvas>
                                            <textarea required style="display:none" name="signature" id="signature-input"></textarea>
                                        </div>
                                        <div class="clear-btn">
                                            <button id="clear"><span>Clear</span></button>
                                        </div>
                                    </div>
                                </div>

                                <div class="w-1/2 pr-4 pl-4"> <!-- Add padding-left for spacing -->
                                    <input disabled name="agency_rep_signed_name" value="{{ date('F j, Y') }}" 
                                        class="border border-gray-300 px-4 py-3 rounded-lg w-full" type="text" autocomplete="off">
                                </div>
                            </div>


                                <br><br>

                                <label for="agency_rep_signed_name" class="mr-2 block">OR Consumer's Representative Signature:</label>
                                <div class="flex items-center justify-between mt-5 w-full">
                                <div class="w-1/2 pl-4 pr-4"> <!-- Added padding-right for spacing -->
                                    <div class="flex-row">
                                        <div class="wrapper">
                                            <canvas id="signature-pad" width="400" height="200"></canvas>
                                            <textarea required style="display:none" name="signature" id="signature-input"></textarea>
                                        </div>
                                        <div class="clear-btn">
                                            <button id="clear"><span>Clear</span></button>
                                        </div>
                                    </div>
                                </div>

                                <div class="w-1/2 pr-4 pl-4"> <!-- Add padding-left for spacing -->
                                    <input disabled name="agency_rep_signed_name" value="{{ date('F j, Y') }}" class="border border-gray-300 px-4 py-3 rounded-lg w-full" type="text" autocomplete="off">
                                </div>
                            </div>
                            <div class="pass mt-5">(Print name and describe authority): 
                                    <input name="agency_rep_signed_date" value="{{ old('agency_rep_signed_date') }}" class="border-line px-4 pt-3 pb-3 w-full rounded-lg @error('date') is-invalid @enderror" id="mr_no" type="text" autocomplete="off">
                                </div>
                                <br>
                                <br>
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


