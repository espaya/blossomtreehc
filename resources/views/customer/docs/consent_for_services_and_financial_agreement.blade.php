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
      <div class="my-account-block md:py-20 py-10;" style=" width: 100%; height: 100%; background-color: rgba(255, 255, 255, 0.9); ">
      <div style="margin-top: -50px !important;" class="my-account-block md:py-20 py-10">
         <div class="container">
            <div class="content-main lg:px-[60px] md:px-4 flex gap-y-8 max-md:flex-col w-full">
               @include('customer/menu/menu')
               <div class="right xl:w-2/3 md:w-7/12 w-full xl:pl-[40px] lg:pl-[28px] md:pl-[16px] flex items-start justify-center">
                  @if($consent && $consent->isNotEmpty())
                  @forelse($consent as $consent)
                  <div class="w-full">
                     <p style="text-align: center;">BLOSSOM TREE HOME HEALTHCARE SERVICES LLC</p>
                     <p style="text-align: center;">CONSENT FOR SERVICES AND FINANCIAL AGREEMENT</p>
                     <div class="mt-5">
                        @if(session('success'))
                        <p style="color: green; text-align: center;"> {{ session('success') }} </p>
                        @endif
                        @if(session('error'))
                        <p style="color: red; text-align: center;"> {{ session('error') }} </p>
                        @endif
                     </div>
                     <br>
                     <p>CONSUMER NAME (Last, First, MI): <u>{{ ucfirst($user->lastname . ' ' . $user->firstname) }}</u></p>
                     <p>MR # <i>{{ Crypt::decryptString($consent->medical_record_number) }}</i></p>
                     <p>CONSENT TO RECEIVE SERVICES: I, <u> {{ ucfirst($user->firstname . ' ' . $user->lastname) }} </u> hereby authorize the Agency to render appropriate home services to me. I understand the Agency will do an evaluation of my home service needs. I accept the proposed Service Plan and authorize services to be provided by the Agency with supervision to be done by agency personnel. I recognize that I have the right to refuse treatment or terminate services at any time by notifying the agency office. Also, the Agency may terminate service by notifying me of termination and reason. I believe my service needs to be: <i>{{ Crypt::decryptString($consent->consent) }}</i>
                     </p>
                     <br>
                     <p>AUTHORIZATION FOR PAYMENT TO PROVIDER: </p>
                     <P>
                        I authorize any holder of medical or other information about me to release to any third-party payers, any information needed for this or related claims. I request that payment as authorized be made on my behalf to the Agency if covered. This authorization and request shall apply starting the date of this agreement, until discontinued.
                     </P>
                     <br>
                     <p>CHARGE FOR SERVICES: Your initial services from the Agency will include the following services and initial frequency of visits and charge per visit.</p>
                     <br>
                     <p>
                        Services<br> 	
                        Frequency of visits	Charge per visit	<br>
                        Amount consumer is responsible.<br>
                        Companion 			<br>
                        Direct worker	
                     </p>
                     <br>
                     <p>CONSUMER LIABILITY FOR PAYMENT: You have the right to be advised, before service is initiated, of the extent to which payment for services may be expected from other sources and the extent to which payment may be required from you, the consumer. We are advising you, orally and in writing, about the cost of items and services to be provided. You will receive a bill monthly for charges incurred. As the consumer, you will be notified of any change in the charges for services provided as soon as possible, but no later than 30 days from the date the home services agency becomes aware of a change. You will be responsible for charges related to the services provided to you by this agency.</p>
                     <br>
                     <p>CONSUMER’S RIGHT/EMERGENCY PLAN/COMPLAINT PROCEDURE: </p>
                     <p>I have been informed of my rights and received a copy of the Consumer’s Bill of Rights prior to the start of service procedure, “Advanced Directives, Emergency Plan, Out-of-Hospital, Do-Not-Resuscitate, Consumer’s Conduct & Responsibilities, Abuse/Neglect/Exploitation”. I have been allowed to participate in planning my services and have received a contact Cabinet by phone, call the Office of the Ombudsman toll free at (800) 372-2973, TTY for hearing impaired (800) 627-4702 State of Kentucky</p>
                     <br>
                     <p>CONFIDENTIALITY: It is our policy to protect all clinical records against loss, defacement, tampering and use by unauthorized person(s). The consumer’s written consent shall be required for the release of medical information to persons not otherwise authorized by law (federal and state) to receive this information. Authorized persons who may review the clinical record include surveyors, physicians, third party payers and external and internal auditing personnel.</p>
                     <br>
                     <p>RELEASE OF RECORDS: I understand the agency policy regarding confidentiality and release of records prohibits access to my records by persons other than personnel involved in the service. I therefore give written. consent for release of medical records to service providers involved in my service delivery.</p>
                     <br>
                     <p>The consumer has received written information regarding their right to make healthcare decisions.</p>
                     <br>
                     <p>CLIENT OR AUTHORIZED AGENT SIGNATURE </p>
                     <div class="pass mt-5">
                        <img src="{{ asset('signatures/' . Crypt::decryptString($consent->client_agent_signature)) }}" alt="Signature">
                     </div>
                     <p>CLIENT OR AUTHORIZED AGENT NAME: {{ Crypt::decryptString($consent->client_agent_name) }}</p>
                     <p>RELATIONSHIP TO CONSUMER: {{ Crypt::decryptString($consent->relationship) }}</p>
                     <p>DATE: <i> {{ Crypt::decryptString($consent->client_date_signed) }} </i> </p>
                  </div>
                  @empty
                  @endforelse
                  @else 
                  <form action="{{ route('account.consent.for.services') }}" method="post" enctype="multipart/form-data">
                     @csrf
                     <div class="w-full">
                        <p style="text-align: center;">BLOSSOM TREE HOME HEALTHCARE SERVICES LLC</p>
                        <p style="text-align: center;">CONSENT FOR SERVICES AND FINANCIAL AGREEMENT</p>
                        <div class="mt-5">
                           @if(session('success'))
                           <p style="color: green; text-align: center;"> {{ session('success') }} </p>
                           @endif
                           @if(session('error'))
                           <p style="color: red; text-align: center;"> {{ session('error') }} </p>
                           @endif
                           @if ($errors->any())
                                <div style="color: red; text-align: center;" class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                        </div>
                        <br>
                        <p>CONSUMER NAME (Last, First, MI): <i>{{ ucfirst($user->lastname) . ' ' . ucfirst($user->firstname) }}</i></p>
                        <div class="pass mt-5">
                           <label for="">Medical Records</label>
                           <input name="medical_record_number" value="{{ old('medical_record_number') }}" class="border-line px-4 pt-3 pb-3 w-full rounded-lg" type="text" autocomplete="off">
                           @error('medical_record_number')
                           <p style="color: red"> {{ $message }} </p>
                           @enderror
                        </div>
                        <p class="mt-5">CONSENT TO RECEIVE SERVICES: I, <u> {{ ucfirst($user->firstname . ' ' . $user->lastname) }} </u> hereby authorize the Agency to render appropriate home services to me. I understand the Agency will do an evaluation of my home service needs. I accept the proposed Service Plan and authorize services to be provided by the Agency with supervision to be done by agency personnel. I recognize that I have the right to refuse treatment or terminate services at any time by notifying the agency office. Also, the Agency may terminate service by notifying me of termination and reason. I believe my service needs to be:
                        </p>
                        <div class="pass mt-5">
                           <input name="consent" value="{{ old('consent') }}" class="border-line px-4 pt-3 pb-3 w-full rounded-lg" type="text" autocomplete="off">
                           @error('consent')
                           <p style="color: red"> {{ $message }} </p>
                           @enderror
                        </div>
                        <p class="mt-5">AUTHORIZATION FOR PAYMENT TO PROVIDER: </p>
                        <P>
                           I authorize any holder of medical or other information about me to release to any third-party payers, any information needed for this or related claims. I request that payment as authorized be made on my behalf to the Agency if covered. This authorization and request shall apply starting the date of this agreement, until discontinued.
                        </P>
                        <br>
                        <p>CHARGE FOR SERVICES: Your initial services from the Agency will include the following services and initial frequency of visits and charge per visit.</p>
                        <br>
                        <p>
                           Services<br> 	
                           Frequency of visits	Charge per visit	<br>
                           Amount consumer is responsible.<br>
                           Companion 			<br>
                           Direct worker	
                        </p>
                        <br>
                        <p>CONSUMER LIABILITY FOR PAYMENT: You have the right to be advised, before service is initiated, of the extent to which payment for services may be expected from other sources and the extent to which payment may be required from you, the consumer. We are advising you, orally and in writing, about the cost of items and services to be provided. You will receive a bill monthly for charges incurred. As the consumer, you will be notified of any change in the charges for services provided as soon as possible, but no later than 30 days from the date the home services agency becomes aware of a change. You will be responsible for charges related to the services provided to you by this agency.</p>
                        <br>
                        <p>CONSUMER’S RIGHT/EMERGENCY PLAN/COMPLAINT PROCEDURE: </p>
                        <p>I have been informed of my rights and received a copy of the Consumer’s Bill of Rights prior to the start of service procedure, “Advanced Directives, Emergency Plan, Out-of-Hospital, Do-Not-Resuscitate, Consumer’s Conduct & Responsibilities, Abuse/Neglect/Exploitation”. I have been allowed to participate in planning my services and have received a contact Cabinet by phone, call the Office of the Ombudsman toll free at (800) 372-2973, TTY for hearing impaired (800) 627-4702 State of Kentucky</p>
                        <br>
                        <p>CONFIDENTIALITY: It is our policy to protect all clinical records against loss, defacement, tampering and use by unauthorized person(s). The consumer’s written consent shall be required for the release of medical information to persons not otherwise authorized by law (federal and state) to receive this information. Authorized persons who may review the clinical record include surveyors, physicians, third party payers and external and internal auditing personnel.</p>
                        <br>
                        <p>RELEASE OF RECORDS: I understand the agency policy regarding confidentiality and release of records prohibits access to my records by persons other than personnel involved in the service. I therefore give written. consent for release of medical records to service providers involved in my service delivery.</p>
                        <br>
                        <p>The consumer has received written information regarding their right to make healthcare decisions.</p>
                        <br>
                        <p>CLIENT OR AUTHORIZED AGENT SIGNATURE </p>
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
                                    <textarea style="display: none;" name="client_agent_signature" id="signature-input"></textarea>
                                 </div>
                              </div>
                           </div>
                        </div>
                        @error('client_agent_signature')
                        <p style="color: red;">{{ $message }}</p>
                        @enderror
                        @error('e_signature')
                        <p style="color: red;">{{ $message }}</p>
                        @enderror
                        <div class="pass mt-5">
                           <label for="">CLIENT OR AUTHORIZED AGENT NAME</label>
                           <input name="client_agent_name" value="{{ old('client_agent_name') }}" class="border-line px-4 pt-3 pb-3 w-full rounded-lg" type="text" autocomplete="off">
                           @error('client_agent_name')
                           <p style="color: red"> {{ $message }} </p>
                           @enderror
                        </div>
                        <div class="pass mt-5">
                           <label for="">RELATIONSHIP TO CONSUMER</label>
                           <input name="relationship" value="{{ old('relationship') }}" class="border-line px-4 pt-3 pb-3 w-full rounded-lg" type="text" autocomplete="off">
                           @error('relationship')
                           <p style="color: red"> {{ $message }} </p>
                           @enderror
                        </div>
                        <div class="pass mt-5">
                           <label for="">DATE</label>
                           <input name="client_date_signed" value="{{ old('client_date_signed') }}" class="border-line px-4 pt-3 pb-3 w-full rounded-lg" type="date" autocomplete="off">
                           @error('client_date_signed')
                           <p style="color: red"> {{ $message }} </p>
                           @enderror
                        </div>
                        <div class="block-button md:mt-7 mt-4">
                           <button class="button-main">Submit</button>
                           <a href="#" onclick="window.history.back();" class="button-main">Back</a>
                        </div>
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
      <!-- Include Signature Pad library -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/signature_pad/1.5.3/signature_pad.min.js"></script>
      <script>
         document.addEventListener("DOMContentLoaded", function () {
             const canvas = document.getElementById("signature-pad");
             const ctx = canvas.getContext("2d");
             const checkbox = document.getElementById("e-signature-checkbox");
             const signatureInput = document.getElementById("signature-input");
             const clientAgentName = document.querySelector("input[name='client_agent_name']");
         
             // Ensure the canvas starts hidden
             canvas.style.display = "none";
         
             // Restore checkbox state from localStorage or old('e_signature')
             if (localStorage.getItem("e-signature-checked") === "true" || "{{ old('e_signature') }}" === "1") {
                 checkbox.checked = true;
             }
         
             function drawSignature(name) {
                 ctx.clearRect(0, 0, canvas.width, canvas.height); // Clear previous signature
         
                 if (name.trim() === "") {
                     signatureInput.value = ""; // Clear stored signature if empty
                     return;
                 }
         
                 document.fonts.ready.then(() => {
                     ctx.font = "40px 'Great Vibes', cursive"; // Apply font inside canvas
                     ctx.fillStyle = "#000"; // Set text color
                     ctx.textBaseline = "middle";
         
                     // Position dynamically
                     const x = canvas.width / 10; // Start at 10% of canvas width
                     const y = canvas.height / 2; // Center vertically
         
                     // Draw the signature on canvas
                     ctx.fillText(name, x, y);
         
                     // Convert canvas content to base64 image and store it
                     signatureInput.value = canvas.toDataURL("image/png");
         
                     // Store the signature in localStorage
                     localStorage.setItem("e-signature", signatureInput.value);
                 }).catch(error => {
                     console.error("Font loading failed:", error);
                 });
             }
         
             function handleCheckboxState() {
                 if (checkbox.checked) {
                     canvas.style.display = "block"; // Show canvas
                     drawSignature(clientAgentName.value); // Draw signature using input name
         
                     // Store checkbox state
                     localStorage.setItem("e-signature-checked", "true");
                 } else {
                     canvas.style.display = "none"; // Hide canvas
         
                     signatureInput.value = ""; // Clear stored signature
                     ctx.clearRect(0, 0, canvas.width, canvas.height); // Clear canvas
         
                     // Remove stored data from localStorage
                     localStorage.removeItem("e-signature-checked");
                     localStorage.removeItem("e-signature");
                 }
             }
         
             // Restore signature if available
             if (checkbox.checked && localStorage.getItem("e-signature")) {
                 const storedSignature = localStorage.getItem("e-signature");
                 const img = new Image();
                 img.src = storedSignature;
                 img.onload = function () {
                     ctx.drawImage(img, 0, 0);
                 };
                 signatureInput.value = storedSignature;
                 canvas.style.display = "block";
             }
         
             // Listen for checkbox changes
             checkbox.addEventListener("change", handleCheckboxState);
         
             // Listen for input changes in the client/agent name field
             clientAgentName.addEventListener("input", function () {
                 if (checkbox.checked) {
                     drawSignature(this.value);
                 }
             });
         
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