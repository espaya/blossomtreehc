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
                  @if($charges && $charges->isNotEmpty())
                  @forelse($charges as $charge)
                  <div class="w-full">
                     <p style="text-align: center;">BLOSSOM TREE HOME HEALTHCARE SERVICES LLC</p>
                     <p style="text-align: center;">CHARGES FOR SERVICES</p>
                        <div class="mt-5">
                            @if(session('success'))
                            <p style="color: green; text-align: center;"> {{ session('success') }} </p>
                            @endif
                            @if(session('error'))
                            <p style="color: red; text-align: center;"> {{ session('error') }} </p>
                            @endif
                        </div>
                     <p class="mt-5">
                        The Agency will charge the following rates for services ("Fees"):
                     </p>
                     <P>
                        Hourly Rate for Weekend Services: $ 30:00 <br>
                        Hourly Rate for Weekday Services: $ 30:00 <br>
                        Live-In Services Rate: $ 390:00 per day <br>
                        Travel Charges: $ N/A <br>
                        Nurse Assessments: $ N/A <br>
                        Mutual Case: $ N/A per case (assuming two patients)
                     </P>
                     <br>
                     
                     @if(!empty($charge->clients_signature))
                     <p> Client’s signature</p>
                     <div class="pass mt-5">
                        <img src="{{ asset('signatures/' . Crypt::decryptString($charge->clients_signature)) }}" alt="Signature">
                     </div>
                     @endif

                     <p>Client’s name (Print) First Name: <i>{{ ucfirst($user->firstname) }}</i></p>
                     <p>Last Name: <i>{{ ucfirst($user->lastname) }}</i> </p
                     >
                     @if(!empty($charge->clients_signed_date))
                     <p>Date: <i> {{ Crypt::decryptString($charge->clients_signed_date) }} </i> </p>
                     @endif

                     @if(!empty($charge->clients_rep_firstname))
                     <p>Client’s representative Signature:  </p>
                     <div class="pass mt-5">
                        <img src="{{ asset('signatures/' . Crypt::decryptString($charge->clients_rep_signature)) }}" alt="Signature">
                     </div>
                     <p>Client’s representative Name (Print) First Name: <i>{{ Crypt::decryptString($charge->clients_rep_firstname) }}</i> </p>
                     <p>Last Name:<i>{{ Crypt::decryptString($charge->clients_rep_firstname) }}</i></p>
                     Date:  <i> {{ Crypt::decryptString($charge->clients_rep_date_signed) }} </i>
                     @endif
                  </div>
                  @empty
                  @endforelse
                  @else
                  <form action="{{ route('account.charges.for.services') }}" method="post" enctype="multipart/form-data">
                     @if(session('error'))
                     <p style="color:red"> {{ session('error') }} </p>
                     @endif
                     @csrf
                     <div class="w-full">
                        <p style="text-align: center;">BLOSSOM TREE HOME HEALTHCARE SERVICES LLC</p>
                        <p style="text-align: center;">CHARGES FOR SERVICES</p>
                        
                        <div class="mt-5">
                            @if(session('success'))
                            <p style="color: green; text-align: center;"> {{ session('success') }} </p>
                            @endif
                            @if(session('error'))
                            <p style="color: red; text-align: center;"> {{ session('error') }} </p>
                            @endif
                        </div>

                        <p class="mt-5">
                           The Agency will charge the following rates for services ("Fees"):
                        </p>
                        <P>
                           Hourly Rate for Weekend Services: $ 30:00 <br>
                           Hourly Rate for Weekday Services: $ 30:00 <br>
                           Live-In Services Rate: $ 390:00 per day <br>
                           Travel Charges: $ N/A <br>
                           Nurse Assessments: $ N/A <br>
                           Mutual Case: $ N/A per case (assuming two patients)
                        </P>
                        <br>
                        <p> Client’s signature </p>
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
                                    <textarea style="display: none;" name="clients_signature" id="signature-input"></textarea>
                                 </div>
                              </div>
                           </div>
                        </div>
                        @error('clients_signature')
                            <p style="color: red;">{{ $message }}</p>
                        @enderror
                        @error('e_signature')
                            <p style="color: red;">{{ $message }}</p>
                        @enderror
                        <p id="client_firstname" style="display: none;" class="mt-5">Client’s name (Print) First Name: <i>{{ ucfirst($user->firstname) }}</i></p>
                        <p id="client_lastname" style="display: none;" class="mt-5">Last Name: <i>{{ ucfirst($user->lastname) }}</i> </p>

                        <div class="pass mt-5">
                           <label for="">Please enter your signature here</label>
                           <input style="display: none;" id="client-signature-text" name="client_signature_text" value="{{ old('client_signature_text') }}" class="border-line px-4 pt-3 pb-3 w-full rounded-lg" type="text" autocomplete="off">
                           @error('client_signature_text')
                           <p style="color: red"> {{ $message }} </p>
                           @enderror
                        </div>

                        <div id="client_signed_date" style="display: none;" class="pass mt-5">
                           <label for="">Date</label>
                           <input name="clients_signed_date" value="{{ old('clients_signed_date') }}" class="border-line px-4 pt-3 pb-3 w-full rounded-lg" type="date" autocomplete="off">
                           @error('clients_signed_date')
                           <p style="color: red"> {{ $message }} </p>
                           @enderror
                        </div>
                        <br>
                        <p><b>OR</b></p>
                        <p>Client’s representative Signature: </p>
                        
                        <input class="mt-5" {{ old('ee_signature') == '1' ? 'checked' : '' }} value="1" type="checkbox" name="ee_signature" id="ee-signature-checkbox"> 
                        <label for="ee-signature-checkbox">
                        By checking/ticking this box, I agree to adopt this as my electronic signature.
                        </label>
                        <div class="flex items-left justify-between mt-5 w-full">
                           <div class="w-1/2 pl-4">
                              <div class="flex-row">
                                 <div class="wrapper">
                                    <!-- Signature Canvas -->
                                    <canvas id="eesignature-pad" width="400" height="200" style="display: none; border:1px solid #000;"></canvas>
                                    <!-- Hidden Signature Input -->
                                    <textarea style="display: none;" name="clients_rep_signature" id="eesignature-input"></textarea>
                                 </div>
                              </div>
                           </div>
                        </div>
                        @error('clients_rep_signature')
                            <p style="color: red; text-align: left !important">{{ $message }}</p>
                        @enderror
                        @error('ee_signature')
                            <p style="color: red; text-align: left !important"> {{ $message }} </p>
                        @enderror
                        <div style="display: none;" id="clients_rep_firstname" class="pass mt-5">
                           <label for="">Client’s representative Name (Print) First Name</label>
                           <input name="clients_rep_firstname" value="{{ old('clients_rep_firstname') }}" class="border-line px-4 pt-3 pb-3 w-full rounded-lg" type="text" autocomplete="off">
                           @error('clients_rep_firstname')
                           <p style="color: red"> {{ $message }} </p>
                           @enderror
                        </div>
                        <div style="display: none;" id="clients_rep_lastname" class="pass mt-5">
                           <label for="">Client's representative (Print) Last Name</label>
                           <input name="clients_rep_lastname" value="{{ old('clients_rep_lastname') }}" class="border-line px-4 pt-3 pb-3 w-full rounded-lg" type="text" autocomplete="off">
                           @error('clients_rep_lastname')
                           <p style="color: red"> {{ $message }} </p>
                           @enderror
                        </div>
                        <div style="display: none;" id="clients_rep_date_signed" class="pass mt-5">
                           <label for="">Date</label>
                           <input name="clients_rep_date_signed" value="{{ old('clients_rep_date_signed') }}" class="border-line px-4 pt-3 pb-3 w-full rounded-lg" type="date" autocomplete="off">
                           @error('clients_rep_date_signed')
                           <p style="color: red"> {{ $message }} </p>
                           @enderror
                        </div>
                        <div class="block-button md:mt-7 mt-4">
                           <button type="submit" class="button-main" style="background-color: blue;">Submit</button>
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
            const signatureTextInput = document.getElementById("client-signature-text");

            const client_firstname = document.getElementById("client_firstname");
            const client_lastname = document.getElementById("client_lastname");

            function drawSignature(text) {
               ctx.clearRect(0, 0, canvas.width, canvas.height); // Clear previous signature

               // Wait for font to load before drawing
               document.fonts.ready.then(() => {
                     ctx.font = "40px 'Great Vibes', cursive"; // Apply cursive font
                     ctx.fillStyle = "#000"; // Set text color
                     ctx.textBaseline = "middle";

                     // Position dynamically
                     const x = canvas.width / 10; // Start at 10% of canvas width
                     const y = canvas.height / 2; // Center vertically

                     // Draw the signature on canvas
                     ctx.fillText(text, x, y);

                     // Convert canvas content to base64 image and store it
                     signatureInput.value = canvas.toDataURL("image/png");
               }).catch(error => {
                     console.error("Font loading failed:", error);
               });
            }

            function handleCheckboxState() {
               if (checkbox.checked) {
                     canvas.style.display = "block"; // Show canvas
                     client_firstname.style.display = "block";
                     client_lastname.style.display = "block";
                     signatureTextInput.style.display = "block";
                     client_signed_date.style.display = "block";

                     // Use the value from input or fallback to user's name
                     const defaultSignature = signatureTextInput.value.trim() || 
                        "{{ ucfirst($user->firstname) . ' ' . ucfirst($user->lastname) }}";
                     drawSignature(defaultSignature); // Draw default signature
               } else {
                     canvas.style.display = "none"; // Hide canvas
                     client_firstname.style.display = "none";
                     client_lastname.style.display = "none";
                     ctx.clearRect(0, 0, canvas.width, canvas.height); // Clear canvas
                     signatureInput.value = ""; // Clear stored signature
                     signatureTextInput.style.display = "none";
               }
            }

            // Listen for checkbox changes
            checkbox.addEventListener("change", handleCheckboxState);

            // Update signature when user types
            signatureTextInput.addEventListener("input", function () {
               drawSignature(this.value.trim());
            });

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

            const clientsRepFirstname = document.getElementById("clients_rep_firstname").querySelector("input");
            const clientsRepLastname = document.getElementById("clients_rep_lastname").querySelector("input");
            const clientsRepDateSigned = document.getElementById("clients_rep_date_signed");

            function drawSignature() {
                ctx.clearRect(0, 0, canvas.width, canvas.height); // Clear previous signature
                
                ctx.font = "40px 'Great Vibes', cursive"; // Set font
                ctx.fillStyle = "#000"; // Set text color
                ctx.textBaseline = "middle";

                // Get user's input
                const firstName = clientsRepFirstname.value.trim();
                const lastName = clientsRepLastname.value.trim();

                // Combine names
                const fullName = firstName || lastName ? `${firstName} ${lastName}`.trim() : "Signature";

                // Position dynamically
                const x = canvas.width / 10; // Start at 10% of canvas width
                const y = canvas.height / 2; // Center vertically

                // Draw the signature on canvas
                ctx.fillText(fullName, x, y);

                // Convert canvas content to base64 image and store it
                signatureInput.value = canvas.toDataURL("image/png");
            }

            function handleCheckboxState() {
                if (checkbox.checked) {
                    canvas.style.display = "block"; // Show canvas
                    clientsRepFirstname.closest("div").style.display = "block";
                    clientsRepLastname.closest("div").style.display = "block";
                    clientsRepDateSigned.style.display = "block";
                    drawSignature(); // Draw signature initially
                } else {
                    canvas.style.display = "none"; // Hide canvas
                    clientsRepFirstname.closest("div").style.display = "none";
                    clientsRepLastname.closest("div").style.display = "none";
                    clientsRepDateSigned.style.display = "none";
                    
                    signatureInput.style.display = "none"; // Hide input
                    ctx.clearRect(0, 0, canvas.width, canvas.height); // Clear canvas
                    signatureInput.value = ""; // Clear stored signature
                }
            }

            // Listen for checkbox changes
            checkbox.addEventListener("change", handleCheckboxState);

            // Update signature as user types
            clientsRepFirstname.addEventListener("input", drawSignature);
            clientsRepLastname.addEventListener("input", drawSignature);

            // Check initial state
            handleCheckboxState();
        });
    </script>

      <style>
         .ass{
         background: url('{{ asset("assets/images/caregiver.jpg") }}') no-repeat center center; background-size: cover; position: relative;
         }
      </style>
   </body>
</html>