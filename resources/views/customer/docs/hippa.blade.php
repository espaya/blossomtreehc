   
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
                        @if($hippa && $hippa->isNotEmpty())
                            @forelse($hippa as $hippa)
                            <div class="w-full">
                                <p style="text-align: center;">BLOSSOM TREE HOME HEALTHCARE SERVICES LLC</p>
                                <p class="mt-5" style="text-align: center;">Health Insurance Portability and Accountability Act (HIPAA) Compliance Information</p>

                                @if(session('success'))
                                <p class="mt-5" style="text-align: center; color:green"> {{ session('success') }} </p>
                                @endif

                                @if(session('error'))
                                <p class="mt-5" style="text-align: center; color:red"> {{ session('error') }} </p>
                                @endif
                                
                                <p class="mt-5">
                                HIPAA is the acronym for the Health Insurance Portability and Accountability Act that was passed by Congress in 1996. The HIPAA Privacy regulations require health care providers and organizations, as well as their business associates, to develop and follow procedures that ensure the confidentiality and security of protected health information (PHI) when it is transferred, received, handled, or shared. This applies to all forms of PHI, including paper, oral, electronic, etc. HIPAA requires the protection and confidential handling of protected health information including patient health information, demographic information, physical or mental health, health care payment provisions, and client identity. At the same time, the Privacy Rule is balanced so that it permits the disclosure of health information needed for patient care and other important purposes. Failure to comply with HIPAA can result in civil and criminal penalties (42 USC § 1320d-5)
                                </p>

                                <p class="mt-5" style="color: red;">Examples of HIPAA violations:</p>
                                <p class="mt-5">
                                    •	Improper disposal of patient records; shredding is necessary before disposing of patient’s records.<br>
                                    •	Insider snooping, which refers to family members or coworkers looking into a person’s medical records without authorization. This can be avoided with password protection, tracking systems, and clearance levels.<br>
                                    •	Releasing information to an undesignated party; only the exact person listed on the authorization form may receive patient information.<br>
                                    •	Releasing the wrong patient’s information; through a careless mistake, someone releases information to the wrong patient. This sometimes happens when two patients have the same or similar name.<br>
                                    •	Unprotected storage of private health information, such as a laptop that is stolen. Private information stored electronically needs to be stored on a secure device. This applies to a laptop, thumbnail drive, or any other mobile device.<br>
                                </p>

                                <p class="mt-5" style="color: red;">Scenarios of HIPAA violations:</p>
                                <p class="mt-5">
                                    •	Telling friends or relatives about clients that are under your care<br>
                                    •	Discussing private health information in public areas<br>
                                    •	Discussing private health information over the phone in a public xarea<br>
                                    •	Not logging off your computer or a computer system that contains private health information.<br>
                                    •	Including private health information in an unsecured text or email
                                </p>

                                <p class="mt-5" style="color: red;">Confidentiality of client medical information</p>
                                <p class="mt-5">Individuals in our care expect us to maintain the confidentiality and security of all their Protected Health Information (PHI). Blossom Tree Home Healthcare Services LLC does not use, disclose, or discuss client-specific information with others unless the client authorizes the release of his or her information, or we are required or authorized by law to release the information. Blossom Tree Home Healthcare Services LLC maintains confidentiality of client medical information and uses appropriate security measures to protect this information, including information contained in client’s charts. Blossom Tree Home Healthcare Services LLC also uses appropriate security measures of PHI in all communications.</p>


                                <p class="mt-5">Client’s (Print) First Name: <i> {{ ucfirst($user->firstname) }} </i></p>
                                <p class="mt-5">Last Name: <i> {{ ucfirst($user->lastname) }} </i></p>
                                @if(!empty($hippa->clients_signature))
                                <p class="mt-5">Client’s Signature: <br></p>
                                <img src="{{ asset('signatures/' . Crypt::decryptString($hippa->clients_signature)) }}" alt="Signature"> 
                                <p class="mt-5">Date: {{ Crypt::decryptString($hippa->clients_signed_date) }} </p>
                                @endif 

                                @if(!empty($hippa->clients_rep_signature))
                                <p class="mt-5">Client's Representative Signature: <br></p>
                                <img src="{{ asset('signatures/' . Crypt::decryptString($hippa->clients_rep_signature)) }}" alt="Signature">
                                <p class="mt-5">Client's Representative First Name: {{ Crypt::decryptString($hippa->clients_rep_firstname) }} </p>
                                <p class="mt-5">Client's Representative Last Name: {{ Crypt::decryptString($hippa->clients_rep_lastname) }} </p>
                                <p class="mt-5">Date {{ Crypt::decryptString($hippa->clients_rep_date_signed) }} </p>
                                @endif 
                            </div> 
                            @empty 
                            @endforelse 
                        @else 
                        <form action="{{ route('account.hippa') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="w-full">
                                <p style="text-align: center;">BLOSSOM TREE HOME HEALTHCARE SERVICES LLC</p>
                                <p class="mt-5" style="text-align: center;">Health Insurance Portability and Accountability Act (HIPAA) Compliance Information</p>

                                @if(session('success'))
                                <p class="mt-5" style="text-align: center; color:green"> {{ session('success') }} </p>
                                @endif

                                @if(session('error'))
                                <p class="mt-5" style="text-align: center; color:red"> {{ session('error') }} </p>
                                @endif
                                
                                <p class="mt-5">
                                HIPAA is the acronym for the Health Insurance Portability and Accountability Act that was passed by Congress in 1996. The HIPAA Privacy regulations require health care providers and organizations, as well as their business associates, to develop and follow procedures that ensure the confidentiality and security of protected health information (PHI) when it is transferred, received, handled, or shared. This applies to all forms of PHI, including paper, oral, electronic, etc. HIPAA requires the protection and confidential handling of protected health information including patient health information, demographic information, physical or mental health, health care payment provisions, and client identity. At the same time, the Privacy Rule is balanced so that it permits the disclosure of health information needed for patient care and other important purposes. Failure to comply with HIPAA can result in civil and criminal penalties (42 USC § 1320d-5)
                                </p>

                                <p class="mt-5" style="color: red;">Examples of HIPAA violations:</p>
                                <p class="mt-5">
                                    •	Improper disposal of patient records; shredding is necessary before disposing of patient’s records.<br>
                                    •	Insider snooping, which refers to family members or coworkers looking into a person’s medical records without authorization. This can be avoided with password protection, tracking systems, and clearance levels.<br>
                                    •	Releasing information to an undesignated party; only the exact person listed on the authorization form may receive patient information.<br>
                                    •	Releasing the wrong patient’s information; through a careless mistake, someone releases information to the wrong patient. This sometimes happens when two patients have the same or similar name.<br>
                                    •	Unprotected storage of private health information, such as a laptop that is stolen. Private information stored electronically needs to be stored on a secure device. This applies to a laptop, thumbnail drive, or any other mobile device.<br>
                                </p>

                                <p class="mt-5" style="color: red;">Scenarios of HIPAA violations:</p>
                                <p class="mt-5">
                                    •	Telling friends or relatives about clients that are under your care<br>
                                    •	Discussing private health information in public areas<br>
                                    •	Discussing private health information over the phone in a public xarea<br>
                                    •	Not logging off your computer or a computer system that contains private health information.<br>
                                    •	Including private health information in an unsecured text or email
                                </p>

                                <p class="mt-5" style="color: red;">Confidentiality of client medical information</p>
                                <p class="mt-5">Individuals in our care expect us to maintain the confidentiality and security of all their Protected Health Information (PHI). Blossom Tree Home Healthcare Services LLC does not use, disclose, or discuss client-specific information with others unless the client authorizes the release of his or her information, or we are required or authorized by law to release the information. Blossom Tree Home Healthcare Services LLC maintains confidentiality of client medical information and uses appropriate security measures to protect this information, including information contained in client’s charts. Blossom Tree Home Healthcare Services LLC also uses appropriate security measures of PHI in all communications.</p>


                                <p class="mt-5">Client’s (Print) First Name: <i> {{ ucfirst($user->firstname) }} </i></p>
                                <p class="mt-5">Last Name: <i> {{ ucfirst($user->lastname) }} </i></p>

                                <input class="mt-5" {{ old('e_signature') == '1' ? 'checked' : '' }} value="1" type="checkbox" name="e_signature" id="e-signature-checkbox"> 
                                <label for="e-signature-checkbox">By checking/ticking this box, I agree to adopt this as my electronic signature. </label>
                                @error('e_signature')
                                    <p style="color: red;">{{ $message }}</p>
                                @enderror   

                                <div id="client-box" style="display: none;">    
                                <p class="mt-5">Client’s Signature: <br></p>
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

                                    <div class="mt-5">
                                        <label for="">Date *</label>
                                        <input value="{{ old('clients_signed_date') }}" name="clients_signed_date" class="border-line px-4 pt-3 pb-3 w-full rounded-lg" id="clients_signed_date" type="date" autocomplete="off">
                                        @error('clients_signed_date')
                                        <p style="color: red;"> {{ $message }} </p> 
                                        @enderror
                                    </div>
                                </div>


                                <p class="mt-5"><b>OR</b></p>

                                <input class="mt-5" {{ old('ee_signature') == '1' ? 'checked' : '' }} value="1" type="checkbox" name="ee_signature" id="ee-signature-checkbox"> 
                                <label for="ee-signature-checkbox">By checking/ticking this box, I agree to adopt this as my electronic signature. </label>
                                @error('ee_signature')
                                    <p style="color: red;">{{ $message }}</p>
                                @enderror 

                                <div id="client-rep-box" style="display: none;">
                                    <p class="mt-5"> Client's Representative Signature:</p>

                                    <div class="flex items-center justify-between mt-5 w-full">
                                            <div class="w-1/2 pl-4">
                                                <div class="flex-row">
                                                    <div class="wrapper">
                                                        <!-- Signature Canvas -->
                                                        <canvas id="ee-signature-pad" width="400" height="200" style="display: none; border:1px solid #000;"></canvas>
                                                        <!-- Hidden Signature Input -->
                                                        <textarea style="display: none;" name="clients_rep_signature" id="ee-signature-input"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @error('clients_rep_signature')
                                            <p style="color: red;">{{ $message }}</p>
                                        @enderror   

                                    <div class="mt-5">
                                        <label for="">Client’s Representative (Print) First Name *</label>
                                        <input value="{{ old('clients_rep_firstname') }}" name="clients_rep_firstname" class="border-line px-4 pt-3 pb-3 w-full rounded-lg" id="clients_rep_firstname" type="text" autocomplete="off">
                                        @error('clients_rep_firstname')
                                        <p style="color: red;"> {{ $message }} </p>
                                        @enderror
                                    </div>

                                    <div class="mt-5">
                                        <label for="">Last Name *</label>
                                        <input value="{{ old('clients_rep_lastname') }}" name="clients_rep_lastname" class="border-line px-4 pt-3 pb-3 w-full rounded-lg" id="clients_rep_lastname" type="text" autocomplete="off">
                                        @error('clients_rep_lastname')
                                        <p style="color: red;"> {{ $message }} </p>
                                        @enderror
                                    </div>

                                    <div class="mt-5">
                                        <label for="">Date *</label>
                                        <input value="{{ old('clients_rep_date_signed') }}" name="clients_rep_date_signed" class="border-line px-4 pt-3 pb-3 w-full rounded-lg" id="clients_rep_date_signed" type="date" autocomplete="off">
                                        @error('clients_rep_date_signed')
                                        <p style="color: red;"> {{ $message }} </p>
                                        @enderror
                                    </div>
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

             const client_box = document.getElementById('client-box');
         
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
                     client_box.style.display = "block";
                     // signatureInput.style.display = "block"; // Show input
                     drawSignature(); // Draw signature
                 } else {
                     canvas.style.display = "none"; // Hide canvas
                     client_box.style.display = "none";
                    //  signatureInput.style.display = "none"; // Hide input
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
            const canvas = document.getElementById("ee-signature-pad");
            const ctx = canvas.getContext("2d");
            const checkbox = document.getElementById("ee-signature-checkbox");
            const signatureInput = document.getElementById("ee-signature-input");
            const clientRepBox = document.getElementById("client-rep-box");

            // Ensure these input elements exist
            const clientsRepFirstname = document.getElementById("clients_rep_firstname");
            const clientsRepLastname = document.getElementById("clients_rep_lastname");

            function drawSignature() {
                if (!canvas || !ctx) return; // Ensure canvas exists

                ctx.clearRect(0, 0, canvas.width, canvas.height); // Clear previous signature

                ctx.font = "40px 'Great Vibes', cursive"; // Set font
                ctx.fillStyle = "#000"; // Set text color
                ctx.textBaseline = "middle";

                // Get user's input (Ensure these fields exist before accessing their values)
                const firstName = clientsRepFirstname?.value.trim() || "";
                const lastName = clientsRepLastname?.value.trim() || "";

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
                    clientRepBox.style.display = "block"; // Show input box
                    drawSignature(); // Draw signature initially
                } else {
                    canvas.style.display = "none"; // Hide canvas
                    clientRepBox.style.display = "none"; // Hide input box
                    signatureInput.style.display = "none"; // Hide input
                    ctx.clearRect(0, 0, canvas.width, canvas.height); // Clear canvas
                    signatureInput.value = ""; // Clear stored signature
                }
            }

            // Listen for checkbox changes
            checkbox.addEventListener("change", handleCheckboxState);

            // Ensure inputs exist before adding event listeners
            if (clientsRepFirstname) {
                clientsRepFirstname.addEventListener("input", function () {
                    if (checkbox.checked) drawSignature(); // Ensure canvas updates only when checkbox is checked
                });
            }

            if (clientsRepLastname) {
                clientsRepLastname.addEventListener("input", function () {
                    if (checkbox.checked) drawSignature(); // Ensure canvas updates only when checkbox is checked
                });
            }

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


