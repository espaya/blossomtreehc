   
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
                        @if($reportingPatientAbuse && $reportingPatientAbuse->isNotEmpty())
                            @forelse($reportingPatientAbuse as $report)
                            <div class="w-full">
                                <p style="text-align: center;">
                                    <b>BLOSSOM TREE HOME HEALTHCARE SERVICES LLC</b>
                                </p>
                                <p class="mt-5" style="text-align: center;">
                                    <b>Reporting Patient Abuse and Neglect</b>
                                </p>

                                    @if(session('success'))
                                        <p class="mt-5" style="color: green; text-align:center">{{ session('success') }}</p>
                                    @endif

                                    @if(session('error'))
                                        <p class="mt-5" style="color: red; text-align:center">{{ session('error') }}</p>
                                    @endif
                                
                                <p class="mt-5">Report instances of abuse to the Attorney General's toll-free Patient Abuse Tip Line at 1-877-228-7384 or by filing an online Medicaid Fraud and Abuse Complaint Form. 
                                </p>

                                <p class="mt-5">Additionally, for reporting abuse, regardless of whether facility is Medicaid funded, or for protective services, guardianship and counseling contact the Cabinet for Health and Family Services Adult Protection Branch at 1-800-752-6200 or 1-877-597-2331. </p>

                                <p class="mt-5">
                                    <b>To report child/Adult/Adult abuse, neglect, or dependency: 1-877-KYSAFE1 (1-877-597-2331) For emergencies, please call 911!
                                    </b>
                                </p>

                                <p class="mt-5">If you suspect abuse or neglect, you can call the Child/Adult help National Child/Adult Abuse Hotline at 1-800-4-A-CHILD/ADULT (1-800-422-4453). This line is open 24 hours a day, 7 days a week and can help you find emergency resources. Follow all procedures required at your place of employment. Listen as Pam shares a second experience.</p>

                                <p class="mt-5">Cyber Tipline external link (opens in new window) National Center for Missing and Exploited Child/Adult (2022)</p>

                                <p class="mt-5">Provides information about how to report online sexual exploitation of a child/Adult or if you suspect that a child/Adult has been inappropriately contacted online. Information will be made available to law enforcement to investigate.</p>

                                <p class="mt-5"><b>Who can report child/Adult abuse or neglect? </b></p>
                                <p class="mt-5">Anyone can report suspected child/Adult abuse or neglect. Reporting abuse or neglect can protect a child/Adult and get help for a family.</p>

                                <p class="mt-5"><b>Mandatory Reporters of Child/Adult Abuse and Neglect </b></p>
                                <p class="mt-5">All U.S. States and territories have laws identifying persons who are required to report suspected child/Adult abuse or neglect. Mandatory reporters may include social workers, teachers and other school personnel, child/Adult care providers, physicians and other health-care workers, mental health professionals, and law enforcement officers. Some States require any person who suspects child/Adult abuse or neglect to report.</p>

                                <p class="mt-5">
                                    <b>What do I report when I suspect child/Adult abuse or neglect?</b>
                                </p>
                                <p class="mt-5">Blossom Tree Home Healthcare Services LLC will provide a complete, honest account of what you observed that led you to suspect the occurrence of child/Adult abuse or neglect. Any reasonable suspicion is sufficient.</p>
                                
                                <p class="mt-5">What Is Child/Adult/Adult Abuse and Neglect? Recognizing the Signs and Symptoms</p>
                                <p class="mt-5">Learn how to identify and report child/Adult abuse or neglect and refer child/Adult who may have been maltreated. This factsheet provides information on the legal definitions, different types, and signs and symptoms of abuse and neglect.</p>

                                <p class="mt-5">What will happen after I make a report of child/Adult abuse or neglect?</p>
                                <p class="mt-5">After you make a report, it will be sent to child/Adult protective services (CPS). When CPS receives a report, the CPS worker reviews the information and determines if an investigation is needed. The CPS worker may talk with the family, the child/Adult, or others to help determine what is making the child/Adult unsafe. The CPS worker can help parents or other caregivers get services, education, or other assistance.</p>

                                <p class="mt-5">Client’s Name (Print): <i> {{ ucfirst($user->firstname . ' ' . $user->lastname) }} </i></p>

                                <p class="mt-5">Client’s Signature</p>
                                <img src="{{ asset('signatures/' . Crypt::decryptString($report->clients_signature)) }}" alt="Signature">

                                <p class="mt-5"> {{  Crypt::decryptString($report->clients_date_signed) }} </p>
                                </p>
                            </div> 
                            @empty 
                            @endforelse
                        @else 
                        <form action="{{ route('account.reporting.patient') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="w-full">
                                <p style="text-align: center;">
                                    <b>BLOSSOM TREE HOME HEALTHCARE SERVICES LLC</b>
                                </p>
                                <p class="mt-5" style="text-align: center;">
                                    <b>Reporting Patient Abuse and Neglect</b>
                                </p>

                                    @if(session('success'))
                                        <p class="mt-5" style="color: green; text-align:center">{{ session('success') }}</p>
                                    @endif

                                    @if(session('error'))
                                        <p class="mt-5" style="color: red; text-align:center">{{ session('error') }}</p>
                                    @endif
                                
                                <p class="mt-5">Report instances of abuse to the Attorney General's toll-free Patient Abuse Tip Line at 1-877-228-7384 or by filing an online Medicaid Fraud and Abuse Complaint Form. 
                                </p>

                                <p class="mt-5">Additionally, for reporting abuse, regardless of whether facility is Medicaid funded, or for protective services, guardianship and counseling contact the Cabinet for Health and Family Services Adult Protection Branch at 1-800-752-6200 or 1-877-597-2331. </p>

                                <p class="mt-5">
                                    <b>To report child/Adult/Adult abuse, neglect, or dependency: 1-877-KYSAFE1 (1-877-597-2331) For emergencies, please call 911!
                                    </b>
                                </p>

                                <p class="mt-5">If you suspect abuse or neglect, you can call the Child/Adult help National Child/Adult Abuse Hotline at 1-800-4-A-CHILD/ADULT (1-800-422-4453). This line is open 24 hours a day, 7 days a week and can help you find emergency resources. Follow all procedures required at your place of employment. Listen as Pam shares a second experience.</p>

                                <p class="mt-5">Cyber Tipline external link (opens in new window) National Center for Missing and Exploited Child/Adult (2022)</p>

                                <p class="mt-5">Provides information about how to report online sexual exploitation of a child/Adult or if you suspect that a child/Adult has been inappropriately contacted online. Information will be made available to law enforcement to investigate.</p>

                                <p class="mt-5"><b>Who can report child/Adult abuse or neglect? </b></p>
                                <p class="mt-5">Anyone can report suspected child/Adult abuse or neglect. Reporting abuse or neglect can protect a child/Adult and get help for a family.</p>

                                <p class="mt-5"><b>Mandatory Reporters of Child/Adult Abuse and Neglect </b></p>
                                <p class="mt-5">All U.S. States and territories have laws identifying persons who are required to report suspected child/Adult abuse or neglect. Mandatory reporters may include social workers, teachers and other school personnel, child/Adult care providers, physicians and other health-care workers, mental health professionals, and law enforcement officers. Some States require any person who suspects child/Adult abuse or neglect to report.</p>

                                <p class="mt-5">
                                    <b>What do I report when I suspect child/Adult abuse or neglect?</b>
                                </p>
                                <p class="mt-5">Blossom Tree Home Healthcare Services LLC will provide a complete, honest account of what you observed that led you to suspect the occurrence of child/Adult abuse or neglect. Any reasonable suspicion is sufficient.</p>
                                
                                <p class="mt-5">What Is Child/Adult/Adult Abuse and Neglect? Recognizing the Signs and Symptoms</p>
                                <p class="mt-5">Learn how to identify and report child/Adult abuse or neglect and refer child/Adult who may have been maltreated. This factsheet provides information on the legal definitions, different types, and signs and symptoms of abuse and neglect.</p>

                                <p class="mt-5">What will happen after I make a report of child/Adult abuse or neglect?</p>
                                <p class="mt-5">After you make a report, it will be sent to child/Adult protective services (CPS). When CPS receives a report, the CPS worker reviews the information and determines if an investigation is needed. The CPS worker may talk with the family, the child/Adult, or others to help determine what is making the child/Adult unsafe. The CPS worker can help parents or other caregivers get services, education, or other assistance.</p>

                                <p class="mt-5">
                                    Client’s Name (Print): 
                                   
                                        <i> {{ ucfirst($user->firstname . ' ' . $user->lastname) }} </i>
                                </p>
                                <p class="mt-5">
                                    Client’s Signature
                                </p>

                                <div class="flex items-center justify-between mt-5 w-full">
                                    <div class="w-1/2 pl-4">
                                        <div class="flex-row">
                                            <div class="wrapper">
                                                <!-- Signature Canvas -->
                                                <canvas id="signature-pad" width="400" height="200" style="display: block; border:1px solid #000;"></canvas>
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
                                    <label for="signature-text">Please enter your signature here *</label>
                                    <input value="{{ old('signature_text') }}" name="signature_text" class="border-line px-4 pt-3 pb-3 w-full rounded-lg" id="signature-text" type="text" autocomplete="off">
                                    @error('signature_text')
                                        <p style="color: red;"> {{ $message }} </p>
                                    @enderror
                                </div>


                                <div class="mt-5">
                                    <label for="signature-text">Date *</label>
                                    <input value="{{ old('clients_date_signed') }}" name="clients_date_signed" class="border-line px-4 pt-3 pb-3 w-full rounded-lg" id="clients_date_signed" type="date" autocomplete="off">
                                    @error('clients_date_signed')
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


