
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
                        @if($authorization && $authorization->isNotEmpty())
                            @forelse($authorization as $authorize)
                            <div class="w-full">
                                <p style="text-align: center;"><b>BLOSSOM TREE HOME HEALTHCARE SERVICES LLC</b></p>
                                <p style="text-align: center;"><b>AUTHORIZATION, AGREEMENT, AND ACKNOWLEDGEMENTS</b></p>
                                
                                @if(session('success'))
                                    <p class="mt-5" style="color: green; text-align: center;"> {{ session('success') }} </p>
                                @endif

                                @if(session('error'))
                                    <p class="mt-5" style="color: red; text-align: center;"> {{ session('error') }} </p>
                                @endif
                                
                                <p class="mt-5">
                                I ACKNOWLEDGE that the Agency has notified, informed, and explained to me the CONSUMER BILL OF RIGHTS. I have received information on Advance Directives, Directives to Physician, Durable Power of Attorney for Home Healthcare Services, and Out of Hospital DNR orders, the services to be provided, the supervision of the services, and charges for services rendered will be the responsibility of the consumer/family to pay.
                                </p>
                                
                                <p class="mt-5">
                                I AUTHORIZE the Agency to release any medical information requested by representatives of local, state, or federal agencies, insurance companies, or other organizations or entities as may be required by said representatives for payment of claims out of this home care agency which are due. The agency has notified me of the Policies and Procedures regarding Disclosure of Clinical Records.
                                </p>
                                
                                <p class="mt-5">I REALIZE that Agency staff may not be present in my house at all time and I, my caregiver or legal guardian. will assume responsibility for my care when agency staffs are not present.</p>
                            

                                <p class="mt-5">I UNDERSTAND that the Agency does not routinely perform drug testing on its employees but may do so at our discretion using urine samples.</p>

                                <p class="mt-5">I UNDERSTAND that the Agency will notify me in writing and orally, no later than 30 days from the date they become aware of charges not covered by third party payers.
                                </p>

                                <p class="mt-5">
                                I UNDERSTAND that in the event of an emergency during which the Agency cannot meet my needs, the Agency can transfer me to another Agency that can provide the service I require.
                                </p>

                                <p class="mt-5">
                                I FURTHER UNDERSTAND that Agency employees may not be employed by me without first compensating the Agency $15,000.00 or employee’s annual wages, which is even greater. 
                                </p>

                                <p class="mt-5">I HAVE BEEN INFORMED of the Agency’s policies for resuscitation, medical emergencies and accessing 911 services. (EMS)</p>

                                <p class="mt-5">I AM AWARE that the Agency will be supervising my care and if I have complaints regarding services rendered, I am to contact the Agency Manager.</p>

                                <p class="mt-5">I AM AWARE that the Agency is responsible for payment of all wages and taxes to the home service staff that will be providing services in my home.</p>

                                <p class="mt-5">I HAVE BEEN INFORMED of my rights and that I may file complaints about the Agency with the Kentucky Home Health Hotline at 1-800-635-6290, during regular business hours.</p>

                                <p class="mt-5">I HAVE BEEN INFORMED of my rights and that I may file complaints about the Agency with the Kentucky Home Health Hotline at 1-800-635-6290, during regular business hours.</p>

                                <br>
                                <br><br>
                                
                                <label for="agency_rep_signed_name" class="mr-2 block">Consumer Name And Signature:</label>
                                <div class="flex items-center justify-between mt-5 w-full">
                                    <div class="w-1/2 pr-4"> <!-- Add padding-right for spacing -->
                                        <u><i>{{ ucfirst($user->firstname . ' ' . $user->lastname) }}</i></u>
                                    </div>

                                    <!-- Checkbox for e-signature agreement -->
                                    <div class="w-1/2 pl-4">
                                        <img src="{{ asset('signatures/' . Crypt::decryptString($authorize->consumer_signature)) }}">
                                    </div>

                                </div>

                                <div class="pass mt-5"> Date:
                                    <span> {{ Crypt::decryptString($authorize->consumer_signed_date) }} </span>
                                </div>
                                <br>
                                <br>
                            </div>
                            @empty
                            @endforelse
                        @else 
                        <form action="{{ route('account.authorization.agreement') }}" enctype="multipart/form-data" method="post">
                            @csrf
                            <div class="w-full">
                                <p style="text-align: center;"><b>BLOSSOM TREE HOME HEALTHCARE SERVICES LLC</b></p>
                                <p style="text-align: center;"><b>AUTHORIZATION, AGREEMENT, AND ACKNOWLEDGEMENTS</b></p>
                                
                                @if(session('success'))
                                    <p class="mt-5" style="color: green; text-align: center;"> {{ session('success') }} </p>
                                @endif

                                @if(session('error'))
                                    <p class="mt-5" style="color: red; text-align: center;"> {{ session('error') }} </p>
                                @endif
                                
                                <p class="mt-5">
                                I ACKNOWLEDGE that the Agency has notified, informed, and explained to me the CONSUMER BILL OF RIGHTS. I have received information on Advance Directives, Directives to Physician, Durable Power of Attorney for Home Healthcare Services, and Out of Hospital DNR orders, the services to be provided, the supervision of the services, and charges for services rendered will be the responsibility of the consumer/family to pay.
                                </p>
                                
                                <p class="mt-5">
                                I AUTHORIZE the Agency to release any medical information requested by representatives of local, state, or federal agencies, insurance companies, or other organizations or entities as may be required by said representatives for payment of claims out of this home care agency which are due. The agency has notified me of the Policies and Procedures regarding Disclosure of Clinical Records.
                                </p>
                                
                                <p class="mt-5">I REALIZE that Agency staff may not be present in my house at all time and I, my caregiver or legal guardian. will assume responsibility for my care when agency staffs are not present.</p>
                            

                                <p class="mt-5">I UNDERSTAND that the Agency does not routinely perform drug testing on its employees but may do so at our discretion using urine samples.</p>

                                <p class="mt-5">I UNDERSTAND that the Agency will notify me in writing and orally, no later than 30 days from the date they become aware of charges not covered by third party payers.
                                </p>

                                <p class="mt-5">
                                I UNDERSTAND that in the event of an emergency during which the Agency cannot meet my needs, the Agency can transfer me to another Agency that can provide the service I require.
                                </p>

                                <p class="mt-5">
                                I FURTHER UNDERSTAND that Agency employees may not be employed by me without first compensating the Agency $15,000.00 or employee’s annual wages, which is even greater. 
                                </p>

                                <p class="mt-5">I HAVE BEEN INFORMED of the Agency’s policies for resuscitation, medical emergencies and accessing 911 services. (EMS)</p>

                                <p class="mt-5">I AM AWARE that the Agency will be supervising my care and if I have complaints regarding services rendered, I am to contact the Agency Manager.</p>

                                <p class="mt-5">I AM AWARE that the Agency is responsible for payment of all wages and taxes to the home service staff that will be providing services in my home.</p>

                                <p class="mt-5">I HAVE BEEN INFORMED of my rights and that I may file complaints about the Agency with the Kentucky Home Health Hotline at 1-800-635-6290, during regular business hours.</p>

                                <p class="mt-5">I HAVE BEEN INFORMED of my rights and that I may file complaints about the Agency with the Kentucky Home Health Hotline at 1-800-635-6290, during regular business hours.</p>

                                <br>
                                <br><br>
                                
                                <label for="agency_rep_signed_name" class="mr-2 block">Consumer Name And Signature:</label>

                                
                                <p class="mt-5"> <i>{{ ucfirst($user->firstname . ' ' . $user->lastname) }}</i></p>

                                <div class="mt-5">
                                    <input {{ old('e_signature') == '1' ? 'checked' : '' }} value="1" type="checkbox" name="e_signature" id="e-signature-checkbox"> 
                                        <label for="e-signature-checkbox">
                                        By checking/ticking this box, I agree to adopt this as my electronic signature.
                                        </label>
                                        @error('e_signature')
                                        <p style="color: red;"> Please agree to adopt signature </p>
                                        @enderror
                                </div>
                                        
                                <div class="flex items-center justify-between mt-5 w-full">
                                
                                        
                                        <div class="flex-row">
                                            <div class="wrapper">
                                                <!-- Signature Canvas -->
                                                <canvas id="signature-pad" width="400" height="200" style="display: none; border:1px solid #000;"></canvas>
                                                <!-- Hidden Signature Input -->
                                                <textarea style="display: none;" name="consumer_signature" id="signature-input"></textarea>
                                            </div>
                                        </div>
                                        @error('clients_signature')
                                        <p style="color: red;">{{ $message }}</p>
                                        @enderror
                                        
                                </div>

                                <div style="display: none" id="signature-text-div" class="pass mt-5"> 
                                    Please type your signature here:
                                    <input id="signature-text" name="signatureText" value="{{ old('signatureText') }}" class="border-line px-4 pt-3 pb-3 w-full rounded-lg" type="text" autocomplete="off">
                                    @error('signatureText')
                                        <p style="color: red;"> {{ $message }} </p>
                                    @enderror
                                </div>

                                <div class="pass mt-5"> Date:
                                    <input name="consumer_signed_date" value="{{ old('consumer_signed_date') }}" class="border-line px-4 pt-3 pb-3 w-full rounded-lg" type="date" autocomplete="off">
                                    @error('consumer_signed_date')
                                        <p style="color: red;"> {{ $message }} </p>
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
        <!-- Include Signature Pad library -->

        
        <script>
    document.addEventListener("DOMContentLoaded", function () {
        const canvas = document.getElementById("signature-pad");
        const ctx = canvas.getContext("2d");
        const checkbox = document.getElementById("e-signature-checkbox");
        const signatureInput = document.getElementById("signature-input");
        const signatureText = document.getElementById("signature-text");
        const signatureTextDiv = document.getElementById("signature-text-div");

        function drawSignature(text) {
            ctx.clearRect(0, 0, canvas.width, canvas.height); // Clear previous signature

            if (text.trim() !== "") {
                ctx.font = "40px 'Great Vibes', cursive"; // Apply font only inside canvas
                ctx.fillStyle = "#000"; // Set text color
                ctx.textBaseline = "middle";

                // Position dynamically
                const x = canvas.width / 10; // Start at 10% of canvas width
                const y = canvas.height / 2; // Center vertically

                // Draw the signature on canvas
                ctx.fillText(text, x, y);

                // Convert canvas content to base64 image and store it
                signatureInput.value = canvas.toDataURL("image/png");
            }
        }

        function handleCheckboxState() {
            if (checkbox.checked) {
                canvas.style.display = "block"; // Show canvas
                signatureTextDiv.style.display = "block"; // Show input field

                // Draw the existing signature if present
                drawSignature(signatureText.value);
            } else {
                canvas.style.display = "none"; // Hide canvas
                signatureTextDiv.style.display = "none"; // Hide input field
                ctx.clearRect(0, 0, canvas.width, canvas.height); // Clear canvas
                signatureInput.value = ""; // Clear stored signature
            }
        }

        // Listen for checkbox changes
        checkbox.addEventListener("change", handleCheckboxState);

        // Update the canvas when the user types in the signature input
        signatureText.addEventListener("input", function () {
            drawSignature(signatureText.value);
        });

        // Maintain signature on page reload
        if (signatureText.value.trim() !== "") {
            checkbox.checked = true;
            handleCheckboxState();
        }
    });
</script>

    </body>
</html>
<style>
    .ass{
        background: url('{{ asset("assets/images/caregiver.jpg") }}') no-repeat center center; background-size: cover; position: relative;
    }
</style>


