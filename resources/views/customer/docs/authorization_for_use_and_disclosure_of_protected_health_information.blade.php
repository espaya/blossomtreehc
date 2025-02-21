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

      #signature-pad, #eesignature-pad {
         max-width: 100%;
         width: 100%;
         height: auto;
      }   
   </style>

   <body>
      @include('templates/header') 
      <div style="margin-top: -50px !important;" class="my-account-block ass">
      <div class="my-account-block md:py-20 py-10;" style=" width: 100%; height: 100%; background-color: rgba(255, 255, 255, 0.9); ">
      <div style="margin-top: -50px !important;" class="my-account-block md:py-20 py-10">
         <div class="container">
            <div class="content-main lg:px-[60px] md:px-4 flex gap-y-8 max-md:flex-col w-full">
               @include('customer/menu/menu')
               <div class="right xl:w-2/3 md:w-7/12 w-full xl:pl-[40px] lg:pl-[28px] md:pl-[16px] flex items-start justify-center">
                  @if($authorization && $authorization->isNotEmpty())
                     @forelse($authorization as $authorization)
                     <div class="w-full">
                        <p style="text-align: center;"><b>BLOSSOM TREE HOME HEALTHCARE SERVICES LLC</b></p>
                        <p style="text-align: center;"><b>AUTHORIZATION FOR USE AND DISCLOSURE OF PROTECTED HEALTH INFORMATION</b></p>

                        @if(session('success'))
                           <p class="mt-5" style="color: green; text-align: center;"> {{ session('success') }} </p>
                        @endif

                        @if(session('error'))
                        <p class="mt-5" style="color: red; text-align: center;"> {{ session('error') }} </p>
                        @endif

                        <p class="mt-5">You may decline to sign this Authorization</p>
                        <p class="mt-5">I <i>{{ ucfirst($user->firstname . ' ' . $user->lastname) }}</i>
                           hereby authorize Blossom Tree Home Healthcare Services LLC (hereafter collectively referred to as (“Agency”) to use and disclose in any form or format, a copy of records concerning <i>{{ Crypt::decryptString($authorization->consent) }}</i>
                        </p>

                        <div class="pass mt-5">
                           <p class="mt-5">
                              (PRINT consumer name) but only as follows:
                              <u>
                           <li>A copy of this signed, dated authorization shall be as effective as the original.</li>
                           <li>Agency may use and disclose the following information to: <i> {{ Crypt::decryptString($authorization->disclose_to) }} </i></li>
                           </u>
                           </p>
                           
                        </div>
                        <p class="mt-5">For the purpose(s) of (be specific):</p>
                        <p>I specifically authorize the Agency to use and disclose the following types of confidential information. (Check where appropriate): </p>

                        @if($authorization->hiv && !empty($authorization->hiv))
                        <input disabled {{ Crypt::decryptString($authorization->hiv) == 'hiv' ? 'checked' : '' }} name="hiv" value="hiv" class="border-line px-4 pt-3 pb-3 w-1 rounded-lg" type="checkbox" autocomplete="off"> HIV records (including HIV test results) and sexually transmissible diseases.<br>
                        @endif

                        @if($authorization->alcohol_substance && !empty($authorization->alcohol_substance))
                        <input disabled {{ Crypt::decryptString($authorization->alcohol_substance) == 'alcohol_substance' ? 'checked' : '' }} name="alcohol_substance" value="alcohol_substance" class="border-line px-4 pt-3 pb-3 w-1 rounded-lg" type="checkbox" autocomplete="off"> Alcohol and substance abuse diagnosis and treatment records<br>
                        @endif

                        @if($authorization->psychotherapy && !empty($authorization->psychotherapy))
                        <input disabled {{ Crypt::decryptString($authorization->psychotherapy) == 'psychotherapy' ? 'checked' : '' }} name="psychotherapy" value="psychotherapy" class="border-line px-4 pt-3 pb-3 w-1 rounded-lg" type="checkbox" autocomplete="off"> Psychotherapy records<br>
                        @endif

                        @if($authorization->other && !empty($authorization->other) && Crypt::decryptString($authorization->other) == 'other')
                        <input disabled {{ Crypt::decryptString('other') == 'other' ? 'checked' : '' }} name="other" value="other" class="border-line px-4 pt-3 pb-3 w-1 rounded-lg" type="checkbox" autocomplete="off"> Other: Specify: 
                        <p> {{ Crypt::decryptString($authorization->specify) }} </p>
                        @endif
                        <p class="mt-5">
                           The undersigned does hereby release, holds harmless and agrees to indemnify the Agency, its employees, and agents for all liability (including but not limited to negligence) arising out of or occurring under this authorization. I understand that my records may be subject to re-disclosure by recipient(s) and unprotected by federal or state law; that this authorization remains effective until the Agency is in actual receipt of a signed revocation or until the records retention period required under federal and state law has expired and the records have been destroyed; that I have the right to revoke this authorization at any time, provided I do so in writing; that I have been given an opportunity to ask questions: 
                        </p>
                        <p class="mt-5">
                        <ul>
                           <li>•	that I have received a copy of the signed authorization.</li>
                           <li>•	that I may inspect a copy of my protected health information to be used or disclosed under this authorization. </li>
                           <li>•	that the Agency has not conditioned provision of services to or treatment of me upon receipt of this signed authorization, and </li>
                           <li>•	that I may refuse to sign this authorization.</li>
                        </ul>
                        </p>

                        @if($authorization && !empty($authorization->consumer_signature))
                        <label class="mr-2 block mt-10">Consumer Signature:</label>
                        <div class="flex items-center justify-between mt-5 w-full">
                           <div class="w-1/2 pl-4">
                              <div class="flex-row">
                                    <img src="{{ asset('signatures/' . Crypt::decryptString($authorization->consumer_signature)) }}">
                              </div>
                           </div>
                           <div class="w-1/2 pr-4 pl-4">
                              <!-- Add padding-left for spacing -->
                               <label for="">Date Signed</label>
                               <p><i> {{ Crypt::decryptString($authorization->consumer_date_signed) }}</i> </p>
                               
                           </div>
                        </div>
                        @endif

                        <br><br>

                        @if($authorization->consumer_rep_signature && !empty($authorization->consumer_rep_signature))
                        <label class="mr-2 block mt-10">OR Consumer's Representative Signature:</label>
                        <div class="flex items-center justify-between mt-5 w-full">
                           <div class="w-1/2 pl-4">
                              <div class="flex-row">
                                 <img src="{{ asset('signatures/' . Crypt::decryptString($authorization->consumer_rep_signature)) }}">
                              </div>
                           </div>
                           <div class="w-1/2 pr-4 pl-4">
                              <!-- Add padding-left for spacing -->
                               <label for="">Date Signed</label>
                               <p><i> {{ Crypt::decryptString($authorization->consumer_rep_date_signed) }} </i></p>
                           </div>
                        </div>
                        <div class="pass mt-5">(Print name and describe authority):
                           <p> {{ Crypt::decryptString($authorization->consumer_name_authority) }} </p> 
                        </div>
                        @endif
                        <br>
                        <br>
                     </div>
                     @empty 
                     @endforelse
                  @else
                  <form action="{{ route('account.authorization.for.use') }}"  method="post" enctype="multipart/form-data">
                     @csrf
                     <div class="w-full">
                        <p style="text-align: center;"><b>BLOSSOM TREE HOME HEALTHCARE SERVICES LLC</b></p>
                        <p style="text-align: center;"><b>AUTHORIZATION FOR USE AND DISCLOSURE OF PROTECTED HEALTH INFORMATION</b></p>

                        @if(session('success'))
                           <p class="mt-5" style="color: green; text-align: center;"> {{ session('success') }} </p>
                        @endif

                        @if(session('error'))
                        <p class="mt-5" style="color: red; text-align: center; height: 30px"> {{ session('error') }} </p>
                        @endif

                        <p class="mt-5">You may decline to sign this Authorization</p>
                        <p class="mt-5">I <i>{{ ucfirst($user->firstname . ' ' . $user->lastname) }}</i>
                           hereby authorize Blossom Tree Home Healthcare Services LLC (hereafter collectively referred to as (“Agency”) to use and disclose in any form or format, a copy of records concerning
                        </p>
                        <div class="pass mt-5">
                           <input name="consent" value="{{ old('consent') }}" class="border-line px-4 pt-3 pb-3 w-full rounded-lg" type="text" autocomplete="off">
                           @error('consent')
                           <p style="color: red"> {{ $message }} </p>
                           @enderror
                        </div>
                        <div class="pass mt-5">
                           <p class="mt-5">
                              (PRINT consumer name) but only as follows:
                              <u>
                           <li>A copy of this signed, dated authorization shall be as effective as the original.</li>
                           <li>Agency may use and disclose the following information to:</li>
                           </u>
                           </p>
                           <input name="disclose_to" value="{{ old('disclose_to') }}" class="border-line px-4 pt-3 pb-3 w-full rounded-lg" type="text" autocomplete="off">
                           @error('disclose_to')
                           <p style="color: red;"> {{ $message }}</p>
                           @enderror
                        </div>
                        <p class="mt-5">For the purpose(s) of (be specific):</p>
                        <p>I specifically authorize the Agency to use and disclose the following types of confidential information. (Check where appropriate): </p>
                        <input {{ old('hiv') == 'hiv' ? 'checked' : '' }} name="hiv" value="hiv" class="border-line px-4 pt-3 pb-3 w-1 rounded-lg" type="checkbox" autocomplete="off"> HIV records (including HIV test results) and sexually transmissible diseases.<br>
                        <input {{ old('alcohol_substance') == 'alcohol_substance' ? 'checked' : '' }} name="alcohol_substance" value="alcohol_substance" class="border-line px-4 pt-3 pb-3 w-1 rounded-lg" type="checkbox" autocomplete="off"> Alcohol and substance abuse diagnosis and treatment records<br>
                        <input {{ old('psychotherapy') == 'psychotherapy' ? 'checked' : '' }} name="psychotherapy" value="psychotherapy" class="border-line px-4 pt-3 pb-3 w-1 rounded-lg" type="checkbox" autocomplete="off"> Psychotherapy records<br>
                        <input {{ old('other') == 'other' ? 'checked' : '' }} name="other" value="other" class="border-line px-4 pt-3 pb-3 w-1 rounded-lg" type="checkbox" autocomplete="off"> Other: Specify: 
                        <input name="specify" value="{{ old('specify') }}" class="border-line px-4 pt-3 pb-3 w-1/2 rounded-lg" type="text" autocomplete="off"><br>
                        @error('specify')
                        <p class="mt-5"> {{ $message }} </p>
                        @enderror
                        </p>
                        <p class="mt-5">
                           The undersigned does hereby release, holds harmless and agrees to indemnify the Agency, its employees, and agents for all liability (including but not limited to negligence) arising out of or occurring under this authorization. I understand that my records may be subject to re-disclosure by recipient(s) and unprotected by federal or state law; that this authorization remains effective until the Agency is in actual receipt of a signed revocation or until the records retention period required under federal and state law has expired and the records have been destroyed; that I have the right to revoke this authorization at any time, provided I do so in writing; that I have been given an opportunity to ask questions: 
                        </p>
                        <p class="mt-5">
                        <ul>
                           <li>•	that I have received a copy of the signed authorization.</li>
                           <li>•	that I may inspect a copy of my protected health information to be used or disclosed under this authorization. </li>
                           <li>•	that the Agency has not conditioned provision of services to or treatment of me upon receipt of this signed authorization, and </li>
                           <li>•	that I may refuse to sign this authorization.</li>
                        </ul>
                        </p>

                        <label class="mr-2 block mt-10">Consumer Signature:</label>
                        <input class="mt-5" {{ old('e_signature') == '1' ? 'checked' : '' }} value="1" type="checkbox" name="e_signature" id="e-signature-checkbox"> 
                              <label for="e-signature-checkbox">
                              By checking/ticking this box, I agree to adopt this as my electronic signature.
                              </label>
                        <div class="flex items-center justify-between mt-5 w-full">
                           <div class="w-1/2 pl-4">
                              <div class="flex-row">
                                 <div class="wrapper">
                                    <!-- Signature Canvas -->
                                    <canvas id="signature-pad" width="400" height="200" style="display: none; border:1px solid #000;"></canvas>
                                    <!-- Hidden Signature Input -->
                                    <textarea required style="display: none;" name="consumer_signature" id="signature-input"></textarea>
                                 </div>
                              </div>
                              @error('consumer_signature')
                              <p style="color: red;">{{ $message }}</p>
                              @enderror
                              @error('e_signature')
                              <p style="color: red;"> Please agree to adopt signature </p>
                              @enderror
                           </div>
                           <div class="w-1/2 pr-4 pl-4">
                              <!-- Add padding-left for spacing -->
                              <input name="consumer_date_signed" value="{{ old('consumer_date_signed') }}" 
                                 class="border border-gray-300 px-4 py-3 rounded-lg w-full" type="date" autocomplete="off">
                                 @error('consumer_date_signed')
                                 <p style="color: red;">This fields is required</p>
                                 @enderror
                           </div>
                        </div>
                        <br><br>
                        <label class="mr-2 block mt-10">OR Consumer's Representative Signature:</label>

                        <input class="mt-5" {{ old('ee_signature') == '1' ? 'checked' : '' }} value="1" type="checkbox" name="ee_signature" id="ee-signature-checkbox"> 
                              <label for="ee-signature-checkbox">
                              By checking/ticking this box, I agree to adopt this as my electronic signature.
                              </label>
                        <div class="flex items-center justify-between mt-5 w-full">
                           <div class="w-1/2 pl-4">
                              
                              <div class="flex-row">
                                 <div class="wrapper">
                                    <!-- Signature Canvas -->
                                    <canvas id="eesignature-pad" width="400" height="200" style="display: none; border:1px solid #000;"></canvas>
                                    <!-- Hidden Signature Input -->
                                    <textarea required style="display: none;" name="consumer_rep_signature" id="eesignature-input"></textarea>
                                 </div>
                              </div>
                              @error('consumer_rep_signature')
                              <p style="color: red;">{{ $message }}</p>
                              @enderror
                              @error('ee_signature')
                              <p style="color: red;"> Please agree to adopt signature </p>
                              @enderror
                           </div>
                           <div class="w-1/2 pr-4 pl-4">
                              <!-- Add padding-left for spacing -->
                              <input name="consumer_rep_date_signed" value="{{ old('consumer_rep_date_signed') }}" class="border border-gray-300 px-4 py-3 rounded-lg w-full" type="date" autocomplete="off">
                              @error('consumer_rep_date_signed')
                           <p style="color: red;">This field is required</p>
                           @enderror
                           </div>
                        </div>
                        <div class="pass mt-5">(Print name and describe authority): 
                           <input name="consumer_name_authority" value="{{ old('consumer_name_authority') }}" class="border-line px-4 pt-3 pb-3 w-full rounded-lg" type="text" autocomplete="off">
                           @error('consumer_name_authority')
                           <p style="color: red;">This field is required</p>
                           @enderror
                        </div>
                        <br>
                        <br>
                     </div>
                     <div class="block-button md:mt-7 mt-4">
                        <button class="button-main">Accept</button>
                        <a href="#" onclick="window.history.back();" class="button-main">Back</a>
                     </div>
                  </form>
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
      <script>
         document.addEventListener("DOMContentLoaded", function () {
             const canvas = document.getElementById("signature-pad");
             const ctx = canvas.getContext("2d");
             const checkbox = document.getElementById("e-signature-checkbox");
             const signatureInput = document.getElementById("signature-input");
         
             function drawSignature() {
                 ctx.clearRect(0, 0, canvas.width, canvas.height); // Clear previous signature
         
                 // Wait for font to load before drawing
                 document.fonts.ready.then(() => {
                     ctx.font = "40px 'Great Vibes', cursive"; // Apply font only inside canvas
                     ctx.fillStyle = "#000"; // Set text color
                     ctx.textBaseline = "middle";
         
                     // Get user's name from backend
                     const userName = "{{ ucfirst($user->firstname) . ' ' . ucfirst($user->lastname) }}";
         
                     // Position dynamically
                     const x = canvas.width / 10; // Start at 10% of canvas width
                     const y = canvas.height / 2; // Center vertically
         
                     // Draw the signature on canvas
                     ctx.fillText(userName, x, y);
         
                     // Convert canvas content to base64 image and store it
                     signatureInput.value = canvas.toDataURL("image/png");
                 }).catch(error => {
                     console.error("Font loading failed:", error);
                 });
             }
         
             function handleCheckboxState() {
                 if (checkbox.checked) {
                     canvas.style.display = "block"; // Show canvas
                     // signatureInput.style.display = "block"; // Show input
                     drawSignature(); // Draw signature
                 } else {
                     canvas.style.display = "none"; // Hide canvas
                     signatureInput.style.display = "none"; // Hide input
                     ctx.clearRect(0, 0, canvas.width, canvas.height); // Clear canvas
                     signatureInput.value = ""; // Clear stored signature
                 }
             }
         
             // Listen for checkbox changes
             checkbox.addEventListener("change", handleCheckboxState);
         
             // Check initial state
             handleCheckboxState();
         });
         
      </script>
      <script>
         document.addEventListener("DOMContentLoaded", function () {
             const canvas = document.getElementById("eesignature-pad");
             const ctx = canvas.getContext("2d");
             const checkbox = document.getElementById("ee-signature-checkbox");
             const signatureInput = document.getElementById("eesignature-input");
         
             function drawSignature() {
                 ctx.clearRect(0, 0, canvas.width, canvas.height); // Clear previous signature
         
                 // Wait for font to load before drawing
                 document.fonts.ready.then(() => {
                     ctx.font = "40px 'Great Vibes', cursive"; // Apply font only inside canvas
                     ctx.fillStyle = "#000"; // Set text color
                     ctx.textBaseline = "middle";
         
                     // Get user's name from backend
                     const userName = "{{ ucfirst($user->firstname) . ' ' . ucfirst($user->lastname) }}";
         
                     // Position dynamically
                     const x = canvas.width / 10; // Start at 10% of canvas width
                     const y = canvas.height / 2; // Center vertically
         
                     // Draw the signature on canvas
                     ctx.fillText(userName, x, y);
         
                     // Convert canvas content to base64 image and store it
                     signatureInput.value = canvas.toDataURL("image/png");
                 }).catch(error => {
                     console.error("Font loading failed:", error);
                 });
             }
         
             function handleCheckboxState() {
                 if (checkbox.checked) {
                     canvas.style.display = "block"; // Show canvas
                     // signatureInput.style.display = "block"; // Show input
                     drawSignature(); // Draw signature
                 } else {
                     canvas.style.display = "none"; // Hide canvas
                     signatureInput.style.display = "none"; // Hide input
                     ctx.clearRect(0, 0, canvas.width, canvas.height); // Clear canvas
                     signatureInput.value = ""; // Clear stored signature
                 }
             }
         
             // Listen for checkbox changes
             checkbox.addEventListener("change", handleCheckboxState);
         
             // Check initial state
             handleCheckboxState();
         });
         
      </script>
   </body>
</html>
<style>
   .ass{
   background: url('{{ asset("assets/images/caregiver.jpg") }}') no-repeat center center; background-size: cover; position: relative;
   }
</style>