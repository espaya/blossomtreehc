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
   <!-- Load Google Font -->
   <body>
      @include('templates/header') 
      <div style="margin-top: -50px !important;" class="my-account-block ass">
      <div class="my-account-block md:py-20 py-10;" style=" width: 100%; height: 100%; background-color: rgba(255, 255, 255, 0.9); ">
      <div style="margin-top: -50px !important;" class="my-account-block md:py-20 py-10">
         <div class="container">
            <div class="content-main lg:px-[60px] md:px-4 flex gap-y-8 max-md:flex-col w-full">
               @include('customer/menu/menu')
               <div class="right xl:w-2/3 md:w-7/12 w-full xl:pl-[40px] lg:pl-[28px] md:pl-[16px] flex items-start justify-center">
                  @if($advance && $advance->isNotEmpty())
                  @forelse($advance as $advance)
                  <div class="w-full">
                     <p style="text-align: center; font-weight:bold">BLOSSOM TREE HOME HEALTHCARE SERVICES LLC</p>
                     <p style="text-align: center; font-weight:bold">ADVANCED DIRECTIVE ACKNOWLEDGEMENT/HIPPA/HOME CARE PRIVACY RIGHTS ACKNOWLEDGEMENT</p>
                     @if(session('success'))
                     <p class="mt-5" style="color: green; text-align: center;"> {{ session('success') }} </p>
                     @endif
                     @if(session('error'))
                     <p class="mt-5" style="color: red; text-align: center;"> {{ session('error') }} </p>
                     @endif
                     <p class="mt-5">
                        Client’s name: {{ ucfirst($user->firstname) . ' ' . ucfirst($user->lastname) }}
                     </p>
                     <div class="pass mt-5 flex items-center space-x-2">
                        <span>Medical Record#: </span>
                        <p>{{ Crypt::decryptString($advance->medical_record_number) }}</p>
                     </div>
                     <p class="mt-5">
                        I {{ ucfirst($user->firstname) . ' ' . ucfirst($user->lastname) }}
                        acknowledge that the Agency has provided me with information which indicates that I may accept or reject any medical treatment, including any service specified:
                     </p>
                     <p class="mt-5">
                     <ul>
                        <li>• Living Will, Out of Hospital, and Do Not Resuscitate (DNR)</li>
                        <li>• Statutory Power of Attorney for Health Care decisions</li>
                        <li>• Advance Directives in Kentucky – A Health Care Directive</li>
                        <li>• HIPPA/Home Care Privacy Rights</li>
                     </ul>
                     </p>
                     <p class="mt-5">I also understand that it is my responsibility to ask questions about the information provided by the Agency. They have offered to provide a copy of the state’s illustrative forms under state law if I request. I have also been advised to consult with my physician, lawyer, family, clergy, social worker, or other qualified personnel for additional or contact with a lawyer should I need assistance in changing the forms to reflect my information, treatment wishes or in executing a living will or statutory Power of Attorney for health care decisions.</p>
                     <p class="mt-5">I understand that this Agency will honor the advance directives and is willing and able to provide any procedure. Specified in the advanced directives.</p>
                     <p class="mt-5">I understand that the fact that I have or have not signed a living will or Statutory Power of Attorney for Home Care decisions do not affect the medical treatment and services/care to be provided by the Agency. I understand that it is the Agency’s written policy to fully comply through its healthcare providers with the terms of a consumer’s Living Will or Statutory Power of Attorney for Healthcare decisions to fullest extent permitted by state statutory Power of Attorney for Healthcare decisions to fullest extent permitted by state law.
                        I have been given an explanation and acknowledged receipt of the HIPAA PRIVACY RIGHTS. I understand that I may contact the Agency at any time regarding questions or concerns.
                     </p>
                     <p class="mt-5">
                        PLEASE CHECK THE FOLLOWING:<br>
                     </p>
                     <div class="flex items-center">
                        @if($advance->living_will && Crypt::decryptString($advance->living_will))
                        <div class="block-input">
                           <input disabled type="radio" value="1" {{ !empty($advance->living_will) && Crypt::decryptString($advance->living_will) == '1' ? 'checked' : '' }} >
                           <i class="ph-fill ph-check-square icon-checkbox"></i>
                           <input type="radio" name="living_will" id="living_will" value="1" {{ old('living_will' ) == '1' ? 'checked' : '' }} >
                           <i class="ph-fill ph-check-square icon-checkbox"></i> 
                        </div>
                        <label for="remember" class="pl-2 cursor-pointer">I Have a Living Will</label>
                        @else
                        <div style="margin-left: 10px;" class="block-input">
                           <input disabled type="radio" value="{{ Crypt::decryptString($advance->living_will) }}" {{ !empty($advance->living_will) && Crypt::decryptString($advance->living_will) == '2' ? 'checked' : '' }} >
                           <i class="ph-fill ph-check-square icon-checkbox"></i>
                           <input type="radio" name="living_will" id="living_will" value="2" {{ old('living_will') == '2' ? 'checked' : '' }} >
                           <i class="ph-fill ph-check-square icon-checkbox"></i>
                        </div>
                        <label for="remember" class="pl-2 cursor-pointer"> I Have not signed a Living Will.</label>
                        @endif
                     </div>
                     @error('living_will')
                     <p style="color: red"> {{ $message }} </p>
                     @enderror
                     <div class="flex items-center">
                        @if($advance->statutory_power && Crypt::decryptString($advance->statutory_power) == '1')
                        <div class="block-input">
                           <input type="radio" value="1" disabled {{ Crypt::decryptString($advance->statutory_power) == '1' ? 'checked' : '' }} >
                           <i class="ph-fill ph-check-square icon-checkbox"></i>
                        </div>
                        <label for="remember" class="pl-2 cursor-pointer">I Have signed a Statutory Power of Attorney for Health Care</label>
                        @else 
                        <div style="margin-left: 10px;" class="block-input">
                           <input disabled type="radio" value="2" {{ Crypt::decryptString($advance->statutory_power) == '2' ? 'checked' : '' }} >
                           <i class="ph-fill ph-check-square icon-checkbox"></i>
                        </div>
                        <label for="remember" class="pl-2 cursor-pointer"> I Have not signed a Statutory Power of Attorney for Health Care</label>
                        @endif
                     </div>
                     @error('statutory_power')
                     <p style="color: red;"> {{ $message }} </p>
                     @enderror
                     <div class="flex items-center">
                        <div class="block-input">
                           <input type="radio" disabled value="1" {{ Crypt::decryptString($advance->confirm) == '1' ? 'checked' : '' }} >
                           <i class="ph-fill ph-check-square icon-checkbox"></i>
                           <input type="radio" name="confirm" value="1" {{ old('confirm') == '1' ? 'checked' : '' }} >
                           <i class="ph-fill ph-check-square icon-checkbox"></i>
                        </div>
                        <label for="remember" class="pl-2 cursor-pointer"> If I have the above documents, I will provide the Agency with copies for its records.</label>
                     </div>
                     @error('confirm')
                     <p style="color: red;"> {{ $message }} </p>
                     @enderror
                     <p class="mt-5">HIPPA PRIVACY RIGHTS</p>
                     <p>Consumers have the right to give adequate notice concerning the use/disclosure of their PHI on the first date of service delivery, or as soon as possible after an emergency.
                        The Privacy Rule grants consumers new rights over their PHI, including the following:<br>
                        1. Receive a Privacy Notice at the time of the first delivery of service.<br>
                        2. Restrict use and disclosure, although the covered entity is not required to agree.<br>
                        3. Have PHI communicated to them by alternate means and at alternate locations to protect confidentiality.<br>
                        4. Inspect, correct, and amend PHI and obtain copies, with some exceptions.<br>
                        5. Request a history of non-routine disclosures for six years prior to the request, and<br>
                        6. Contact designated people regarding any privacy concerns or breach of privacy within the facility or at HHS.
                     </p>
                     <p class="mt-5">
                        Signature of Consumer or Representative (Signed on behalf of consumer when authorized to the extent permitted by state law):
                     </p>
                     <p class="mt-5"></p>
                     <label for="agency_rep_signed_name" class="mr-2 block">Name And Signature:</label>
                     <div class="flex items-center justify-between mt-5 w-full">
                        <div class="w-1/2 pr-4">
                           <!-- Add padding-right for spacing -->
                           {{ ucfirst($user->firstname) . ' ' . ucfirst($user->lastname) }}
                        </div>
                        <!-- Checkbox for e-signature agreement -->
                        <div class="w-1/2 pl-4">
                           <img src="{{ asset('signatures/' . Crypt::decryptString($advance->clients_signature)) }}">
                        </div>
                     </div>
                     <div class="pass mt-10"> Date:
                        <span>{{ Crypt::decryptString($advance->clients_signed_date) }}</span>
                     </div>
                     <br>
                     <br>
                     <p>Federal law requires that this agency provide the above information.
                     </p>
                  </div>
                  @empty 
                  @endforelse
                  @else
                  <form action="{{ route('account.advanced.directive') }}" method="post" enctype="multipart/form-data">
                     @csrf
                     <div class="w-full">
                        <p style="text-align: center; font-weight:bold">BLOSSOM TREE HOME HEALTHCARE SERVICES LLC</p>
                        <p style="text-align: center; font-weight:bold">ADVANCED DIRECTIVE ACKNOWLEDGEMENT/HIPPA/HOME CARE PRIVACY RIGHTS ACKNOWLEDGEMENT</p>
                        @if(session('success'))
                        <p class="mt-5" style="color: green; text-align: center;"> {{ session('success') }} </p>
                        @endif
                        @if(session('error'))
                        <p class="mt-5" style="color: red; text-align: center;"> {{ session('error') }} </p>
                        @endif
                        <p class="mt-5">
                           Client’s name: {{ ucfirst($user->firstname) . ' ' . ucfirst($user->lastname) }}
                        </p>
                        <div class="pass mt-5 flex items-center space-x-2">
                           <span>Medical Record#: </span>
                           <input name="medical_record_number" value="{{ old('medical_record_number') }}" class="border-line px-4 py-2 rounded-lg w-auto" id="medical_record_number" type="text" autocomplete="off">
                           @error('medical_record_number')
                           <p style="color: red;">{{ $message }}</p>
                           @enderror
                        </div>
                        <p class="mt-5">
                           I {{ ucfirst($user->firstname) . ' ' . ucfirst($user->lastname) }}
                           acknowledge that the Agency has provided me with information which indicates that I may accept or reject any medical treatment, including any service specified:
                        </p>
                        <p class="mt-5">
                        <ul>
                           <li>• Living Will, Out of Hospital, and Do Not Resuscitate (DNR)</li>
                           <li>• Statutory Power of Attorney for Health Care decisions</li>
                           <li>• Advance Directives in Kentucky – A Health Care Directive</li>
                           <li>• HIPPA/Home Care Privacy Rights</li>
                        </ul>
                        </p>
                        <p class="mt-5">I also understand that it is my responsibility to ask questions about the information provided by the Agency. They have offered to provide a copy of the state’s illustrative forms under state law if I request. I have also been advised to consult with my physician, lawyer, family, clergy, social worker, or other qualified personnel for additional or contact with a lawyer should I need assistance in changing the forms to reflect my information, treatment wishes or in executing a living will or statutory Power of Attorney for health care decisions.</p>
                        <p class="mt-5">I understand that this Agency will honor the advance directives and is willing and able to provide any procedure. Specified in the advanced directives.</p>
                        <p class="mt-5">I understand that the fact that I have or have not signed a living will or Statutory Power of Attorney for Home Care decisions do not affect the medical treatment and services/care to be provided by the Agency. I understand that it is the Agency’s written policy to fully comply through its healthcare providers with the terms of a consumer’s Living Will or Statutory Power of Attorney for Healthcare decisions to fullest extent permitted by state statutory Power of Attorney for Healthcare decisions to fullest extent permitted by state law.
                           I have been given an explanation and acknowledged receipt of the HIPAA PRIVACY RIGHTS. I understand that I may contact the Agency at any time regarding questions or concerns.
                        </p>
                        <p class="mt-5">
                           PLEASE CHECK THE FOLLOWING:<br>
                        </p>
                        <div class="flex items-center">
                           <div class="block-input">
                              <input type="radio" name="living_will" id="living_will" value="1" {{ old('living_will' ) == '1' ? 'checked' : '' }} >
                              <i class="ph-fill ph-check-square icon-checkbox"></i> 
                           </div>
                           <label for="remember" class="pl-2 cursor-pointer">I Have </label>
                           <div style="margin-left: 10px;" class="block-input">
                              <input type="radio" name="living_will" id="living_will" value="2" {{ old('living_will') == '2' ? 'checked' : '' }} >
                              <i class="ph-fill ph-check-square icon-checkbox"></i>
                           </div>
                           <label for="remember" class="pl-2 cursor-pointer"> I Have not signed a Living Will.</label>
                        </div>
                        @error('living_will')
                        <p style="color: red"> {{ $message }} </p>
                        @enderror
                        <div class="flex items-center">
                           <div class="block-input">
                              <input  type="radio" value="1" name="statutory_power" id="statutory_power" {{ old('statutory_power') == '1' ? 'checked' : '' }} >
                              <i class="ph-fill ph-check-square icon-checkbox"></i>
                           </div>
                           <label for="remember" class="pl-2 cursor-pointer">I Have </label>
                           <div style="margin-left: 10px;" class="block-input">
                              <input type="radio" value="2" name="statutory_power" id="statutory_power" {{ old('statutory_power') == '2' ? 'checked' : '' }} >
                              <i class="ph-fill ph-check-square icon-checkbox"></i>
                           </div>
                           <label for="remember" class="pl-2 cursor-pointer"> I Have not signed a Statutory Power of Attorney for Health Care</label>
                        </div>
                        @error('statutory_power')
                        <p style="color: red;"> {{ $message }} </p>
                        @enderror
                        <div class="flex items-center">
                           <div class="block-input">
                              <input type="radio" name="confirm" value="1" {{ old('confirm') == '1' ? 'checked' : '' }} >
                              <i class="ph-fill ph-check-square icon-checkbox"></i>
                           </div>
                           <label for="remember" class="pl-2 cursor-pointer"> If I have the above documents, I will provide the Agency with copies for its records.</label>
                        </div>
                        @error('confirm')
                        <p style="color: red;"> {{ $message }} </p>
                        @enderror
                        <p class="mt-5">HIPPA PRIVACY RIGHTS</p>
                        <p>Consumers have the right to give adequate notice concerning the use/disclosure of their PHI on the first date of service delivery, or as soon as possible after an emergency.
                           The Privacy Rule grants consumers new rights over their PHI, including the following:<br>
                           1. Receive a Privacy Notice at the time of the first delivery of service.<br>
                           2. Restrict use and disclosure, although the covered entity is not required to agree.<br>
                           3. Have PHI communicated to them by alternate means and at alternate locations to protect confidentiality.<br>
                           4. Inspect, correct, and amend PHI and obtain copies, with some exceptions.<br>
                           5. Request a history of non-routine disclosures for six years prior to the request, and<br>
                           6. Contact designated people regarding any privacy concerns or breach of privacy within the facility or at HHS.
                        </p>
                        <p class="mt-5">
                           Signature of Consumer or Representative (Signed on behalf of consumer when authorized to the extent permitted by state law):
                        </p>
                        <p class="mt-5"></p>
                        <label for="agency_rep_signed_name" class="mr-2 block">Name And Signature:</label>
                        <div class="flex items-center justify-between mt-5 w-full">
                           <div class="w-1/2 pr-4">
                              <!-- Add padding-right for spacing -->
                              {{ ucfirst($user->firstname) . ' ' . ucfirst($user->lastname) }}
                           </div>
                           <!-- Checkbox for e-signature agreement -->
                           <div class="w-1/2 pl-4">
                              <input {{ old('e_signature') == '1' ? 'checked' : '' }} value="1" type="checkbox" name="e_signature" id="e-signature-checkbox"> 
                              <label for="e-signature-checkbox">
                              By checking/ticking this box, I agree to adopt this as my electronic signature.
                              </label>
                              <div class="flex-row">
                                 <div class="wrapper">
                                    <!-- Signature Canvas -->
                                    <canvas id="signature-pad" width="400" height="200" style="display: none; border:1px solid #000;"></canvas>
                                    <!-- Hidden Signature Input -->
                                    <textarea required style="display: none;" name="clients_signature" id="signature-input"></textarea>
                                 </div>
                              </div>
                              @error('clients_signature')
                              <p style="color: red;">{{ $message }}</p>
                              @enderror
                              @error('e_signature')
                              <p style="color: red;"> Please agree to adopt signature </p>
                              @enderror
                           </div>
                        </div>
                        <div class="pass mt-10">
                           Date:
                           <input name="clients_signed_date" value="{{ old('clients_signed_date') }}" class="border-line px-4 pt-3 pb-3 w-full rounded-lg " type="date" autocomplete="off">
                           @error('clients_signed_date')
                           <p style="color: red;"> {{ $message }} </p>
                           @enderror
                        </div>
                        <br>
                        <br>
                        <p>Federal law requires that this agency provide the above information.
                        </p>
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
   </body>
</html>
<style>
   .ass{
   background: url('{{ asset("assets/images/caregiver.jpg") }}') no-repeat center center; background-size: cover; position: relative;
   }
</style>