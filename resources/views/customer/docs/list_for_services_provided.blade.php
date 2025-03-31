   
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
                        @if($listOfService && $listOfService->isNotEmpty())
                            @forelse($listOfService as $services)
                            <div class="w-full">
                                <p style="text-align: center;">
                                    <b>BLOSSOM TREE HOME HEALTHCARE SERVICES LLC</b>
                                </p>
                                <p class="mt-5" style="text-align: center;">
                                    <b>LIST OF SERVICES PROVIDED</b>
                                </p>

                                @if(session('success'))
                                        <p class="mt-5" style="color: green; text-align:center">{{ session('success') }}</p>
                                    @endif

                                    @if(session('error'))
                                        <p class="mt-5" style="color: red; text-align:center">{{ session('error') }}</p>
                                    @endif
                                
                                <p class="mt-5">The team at Blossom Tree Home Healthcare Services LLC understands that in today’s tight economic times, saving money and using resources wisely is more important than ever. However, the client should carefully read through our list of services in accordance with his/her Physician Care plan.
                                </p>

                                <P class="mt-5">Full List of Services</P>
                                <p class="mt-5">Your personal care assistant can provide you or a loved one with assistance, including but not limited to the following areas:</p>
                                <p class="mt-5"><b>Select services applicable to you.</b></p>
                                <ul>
                                    <li>•	Accompany on Walks</li>
                                    <li>•	Safety/Fall Protection</li>
                                    <li>•	Limited Transportation</li>
                                    <li>•	Accompany to Doctor Appointments</li>
                                    <li>•	Bathing</li>
                                    <li>•	Bed Making</li>
                                    <li>•	Companionship</li>
                                    <li>•	Dressing</li>
                                    <li>•	Dusting</li>
                                    <li>•	Eating</li>
                                    <li>•	Errands</li>
                                    <li>•	Grocery Shopping</li>
                                    <li>•	Grooming</li>
                                    <li>•	Hobbies</li>
                                    <li>•	Incontinence Care</li>
                                    <li>•	Laundry</li>
                                    <li>•	Meal Preparation</li>
                                    <li>•	Medication Reminders</li>
                                    <li>•	Mopping</li>
                                    <li>•	Oral Hygiene</li>
                                    <li>•	Organizing Incoming Mail</li>
                                    <li>•	Pet Care and Feeding</li>
                                    <li>•	Picking up Prescriptions</li>
                                    <li>•	Post Office Visits</li>
                                    <li>•	Recreational Activities</li>
                                    <li>•	Respite/Relief for Families</li>
                                    <li>•	Sweeping</li>
                                    <li>•	Taking out the Trash</li>
                                    <li>•	Toileting</li>
                                    <li>•	Transferring and Positioning</li>
                                    <li>•	Vacuuming</li>
                                    <li>•	Washing Dishes</li>
                                    <li>•	Walking and Mobility</li>
                                </ul>
                                <p class="mt-5">I <i><b> {{ ucfirst($user->firstname) . ' ' . ucfirst($user->lastname) }}</b></i> have had full opportunity to read and consider the list of services and content of this form and your privacy practices. I understand that by signing this consent form, I am giving Blossom Tree Home Healthcare Services LLC my consent to provide the services that I have selected to carry out the services and I will provide payments for the services and care operations agreed upon from the date of my signature.</p>
                                <p class="mt-5">Signature of Client or legal representative: </p>
                                <img src="{{ asset('signatures/' . Crypt::decryptString($services->client_legal_signature)) }}" alt="Signature">
                                <p class="mt-5">Date: <i> {{ Crypt::decryptString($services->client_legal_date) }} </i></p>

                                <p>Representative’s Name: <i> {{ $services->clients_rep_name ? Crypt::decryptString($services->clients_rep_name) : '' }} </i> </p>
                                <p>Relation to Client: <i> {{ $services->relation_to_client ? Crypt::decryptString($services->relation_to_client) : '' }} </i> </p>
                                
                               
                            </div> 
                            @empty 
                            @endforelse 
                        @else
                        <form action="{{ route('account.list.of.services') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="w-full">
                                <p style="text-align: center;">
                                    <b>BLOSSOM TREE HOME HEALTHCARE SERVICES LLC</b>
                                </p>
                                <p class="mt-5" style="text-align: center;">
                                    <b>LIST OF SERVICES PROVIDED</b>
                                </p>

                                    @if(session('success'))
                                        <p class="mt-5" style="color: green; text-align:center">{{ session('success') }}</p>
                                    @endif

                                    @if(session('error'))
                                        <p class="mt-5" style="color: red; text-align:center">{{ session('error') }}</p>
                                    @endif
                                
                                <p class="mt-5">The team at Blossom Tree Home Healthcare Services LLC understands that in today’s tight economic times, saving money and using resources wisely is more important than ever. However, the client should carefully read through our list of services in accordance with his/her Physician Care plan.
                                </p>

                                <P class="mt-5">Full List of Services</P>
                                <p class="mt-5">Your personal care assistant can provide you or a loved one with assistance, including but not limited to the following areas:</p>
                                <p class="mt-5"><b>Select services applicable to you.</b></p>
                                <ul>
                                    <li>•	Accompany on Walks</li>
                                    <li>•	Safety/Fall Protection</li>
                                    <li>•	Limited Transportation</li>
                                    <li>•	Accompany to Doctor Appointments</li>
                                    <li>•	Bathing</li>
                                    <li>•	Bed Making</li>
                                    <li>•	Companionship</li>
                                    <li>•	Dressing</li>
                                    <li>•	Dusting</li>
                                    <li>•	Eating</li>
                                    <li>•	Errands</li>
                                    <li>•	Grocery Shopping</li>
                                    <li>•	Grooming</li>
                                    <li>•	Hobbies</li>
                                    <li>•	Incontinence Care</li>
                                    <li>•	Laundry</li>
                                    <li>•	Meal Preparation</li>
                                    <li>•	Medication Reminders</li>
                                    <li>•	Mopping</li>
                                    <li>•	Oral Hygiene</li>
                                    <li>•	Organizing Incoming Mail</li>
                                    <li>•	Pet Care and Feeding</li>
                                    <li>•	Picking up Prescriptions</li>
                                    <li>•	Post Office Visits</li>
                                    <li>•	Recreational Activities</li>
                                    <li>•	Respite/Relief for Families</li>
                                    <li>•	Sweeping</li>
                                    <li>•	Taking out the Trash</li>
                                    <li>•	Toileting</li>
                                    <li>•	Transferring and Positioning</li>
                                    <li>•	Vacuuming</li>
                                    <li>•	Washing Dishes</li>
                                    <li>•	Walking and Mobility</li>
                                </ul>
                                <p class="mt-5">I <i><b> {{ ucfirst($user->firstname) . ' ' . ucfirst($user->lastname) }}</b></i> have had full opportunity to read and consider the list of services and content of this form and your privacy practices. I understand that by signing this consent form, I am giving Blossom Tree Home Healthcare Services LLC my consent to provide the services that I have selected to carry out the services and I will provide payments for the services and care operations agreed upon from the date of my signature.</p>
                                <p class="mt-5"> Signature of Client or legal representative:</p>

                                <div class="flex items-center justify-between mt-5 w-full">
                                    <div class="w-1/2 pl-4">
                                        <div class="flex-row">
                                            <div class="wrapper">
                                                <!-- Signature Canvas -->
                                                <canvas id="signature-pad" width="400" height="200" style="display: block; border:1px solid #000;"></canvas>
                                                <!-- Hidden Signature Input -->
                                                <textarea style="display: none;" name="client_legal_signature" id="signature-input"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @error('client_legal_signature')
                                    <p style="color: red;">{{ $message }}</p>
                                @enderror 

                                <div class="mt-5">
                                    <label for="signature-text">Please enter your signature here *</label>
                                    <input value="{{ old('signature_text') }}" name="signature_text" class="border-line px-4 pt-3 pb-3 w-full rounded-lg" id="signature-text" type="text" autocomplete="off">
                                    @error('signature_text')
                                        <p style="color: red;"> {{ $message }} </p>
                                    @enderror
                                </div>

                                <div class="mt-5">
                                    <label for="">Date *</label>
                                    <input value="{{ old('client_legal_date') }}" name="client_legal_date" class="border-line px-4 pt-3 pb-3 w-full rounded-lg" id="client_legal_date" type="date" autocomplete="off">
                                    @error('client_legal_date')
                                    <p style="color: red;"> {{ $message }} </p>
                                    @enderror
                                </div>

                                <p class="mt-5">If this consent is signed by a representative of a client complete the following </p>

                                <div class="mt-5">
                                    <label for="">Representative’s Name</label>
                                    <input value="{{ old('clients_rep_name') }}" name="clients_rep_name" class="border-line px-4 pt-3 pb-3 w-full rounded-lg" id="clients_rep_name" type="text" autocomplete="off">
                                    @error('clients_rep_name')
                                    <p style="color: red;"> {{ $message }} </p>
                                    @enderror
                                </div>

                                <div class="mt-5">
                                    <label for="">Relation to Client</label>
                                    <input value="{{ old('relation_to_client') }}" name="relation_to_client" class="border-line px-4 pt-3 pb-3 w-full rounded-lg" id="relation_to_client" type="text" autocomplete="off">
                                    @error('relation_to_client')
                                    <p style="color: red;"> {{ $message }} </p>
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

        <!-- Signature Pad Library -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/signature_pad/1.5.3/signature_pad.min.js"></script>

        <script>
            document.addEventListener("DOMContentLoaded", function () {
                const canvas = document.getElementById("signature-pad");
                const ctx = canvas.getContext("2d");
                const signatureInput = document.getElementById("signature-input");
                const signatureText = document.getElementById("signature-text");

                function drawSignature(text) {
                    ctx.clearRect(0, 0, canvas.width, canvas.height); // Clear previous signature

                    ctx.font = "40px 'Great Vibes', cursive"; // Apply cursive font
                    ctx.fillStyle = "#000"; // Set text color
                    ctx.textBaseline = "middle";

                    const x = canvas.width / 10; // Start at 10% of canvas width
                    const y = canvas.height / 2; // Center vertically

                    ctx.fillText(text, x, y); // Draw signature text

                    // Convert canvas content to base64 image and store it
                    const signatureData = canvas.toDataURL("image/png");
                    signatureInput.value = signatureData;

                    // Save to localStorage
                    localStorage.setItem("savedSignature", signatureData);
                    localStorage.setItem("signatureText", text);
                }

                // Restore signature if available
                function restoreSignature() {
                    const savedSignature = localStorage.getItem("savedSignature");
                    const savedText = localStorage.getItem("signatureText");

                    if (savedSignature) {
                        const img = new Image();
                        img.src = savedSignature;
                        img.onload = function () {
                            ctx.drawImage(img, 0, 0);
                        };
                        signatureInput.value = savedSignature;
                    }

                    if (savedText) {
                        signatureText.value = savedText; // Restore text in input field
                    }
                }

                // Listen for input changes in the text field
                signatureText.addEventListener("input", function () {
                    drawSignature(signatureText.value);
                });

                // Restore signature on page load
                restoreSignature();
            });
        </script>

        
        
    </body>
</html>
<style>
    .ass{
        background: url('{{ asset("assets/images/caregiver.jpg") }}') no-repeat center center; background-size: cover; position: relative;
    }
</style>


