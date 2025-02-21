
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
                        @if($confidentiality_policy && $confidentiality_policy->isNotEmpty())
                        @forelse($confidentiality_policy as $policy)
                            <div class="w-full">
                                <p style="text-align: center;">BLOSSOM TREE HOME HEALTHCARE SERVICES LLC</p>
                                <p style="text-align: center;">CONFIDENTIALITY POLICY</p>
                                <br>
                                
                                <p>
                                It is the policy of BLOSSOM TREE HOME HEALTHCARE SERVICES LLC, and its subsidiaries, divisions, and sister companies (the “Company”), to protect the internal business affairs of the organization, particularly confidential information defined herein, which extends to each employee.  
                                </p>
                                <br>
                                <P>
                                The Company employees are responsible for protecting the Company’s confidential information and using that information only for the Company’s purposes. All information developed within the Company with respect to its business is confidential and should not be disclosed to any unauthorized person. Confidential Information that we have access to may include personal information or data about our fellow employees specifically including payroll and other compensation related information, the Company’s officers, directors, or our Customers/Clients. Such information must be protected because unauthorized disclosure could destroy its value to the Company and give an unfair advantage to others. Examples of Company confidential information include, without limitation, bids, business proposals and contracts, budgets, computer software, codes, data files and security information, trade secrets, non-public revenue or earnings results and any other non-public information concerning the Company’s financial, legal, or other business activities, information not known outside the Company (collectively, the “Confidential Information”). The Company’s Customers/Clients properly expect that this information will be kept confidential. This information is also considered Confidential Information.  Employees should not discuss confidential Company information with each other (except with their supervisor) or anyone outside the Company, even with their families. Furthermore, misusing Confidential Information for personal gain is also unacceptable. Any violation of the Confidentiality Agreement is grounds for discipline, up to and including termination.
                                </P>
                                <br>
                                <p>Additionally, employees/contractors cannot discuss owners and their affiliates with our clients or their family members. If a family member of a client wants to know about the owners of the company, direct the family members to call us.   
                                </p>
                                <br>
                                <p>
                                The Company takes any violation of this Confidentiality Agreement very seriously and will not tolerate such conduct. Employee always agrees during Employee’s employment and thereafter, to hold in strict confidence all Confidential Information, and to not directly or indirectly use, disclose, or make accessible to any person any Confidential Information, except with the Company’s express written authorization.  
                                </p><br>
                                <p>
                                EMPLOYEE/CONTRACTOR ACKNOWLEDGES THAT HE/SHE HAS CAREFULLY READ AND UNDERSTANDS THE MEANING OF THIS AGREEMENT AND HAS GIVEN CAREFUL CONSIDERATION TO ALL ITS TERMS, AND THEIR NECESSITY FOR THE REASONABLE AND PROPER PROTECTION OF THE COMPANY’S CONFIDENTIAL AND PROPRIETARY INFORMATION AND CUSTOMER GOODWILL AND RELATIONSHIPS.  
                                </p><br>
                                <p>Calling your friends, former employees, client’s family members, and any other individual to discuss company confidential matter about our clients is a violation of company policy and will lead to termination of contract and face legal action.</p>

                                <br>

                                <p>EMPLOYEE/CONTRACTOR</p>
                                <p>Signature</p>
                                <div class="pass mt-5">
                                    <img src="{{ asset('signatures/' . Crypt::decryptString($policy->signature)) }}" alt="Signature">
                                </div>
                                <p>Printed Full Name: <i>{{ ucfirst($user->firstname . ' ' . $user->lastname) }}</i> </p>

                                <p>Date: <i> {{ Crypt::decryptString($policy->date_signed) }} </i> </p>
        
                            </div> 
                        @empty
                        @endforelse
                        @else 
                        <form action="{{ route('account.confidentiality.policy') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="w-full">
                                <p style="text-align: center;">BLOSSOM TREE HOME HEALTHCARE SERVICES LLC</p>
                                <p style="text-align: center;">CONFIDENTIALITY POLICY</p>
                                <br>
                                
                                <p>
                                It is the policy of BLOSSOM TREE HOME HEALTHCARE SERVICES LLC, and its subsidiaries, divisions, and sister companies (the “Company”), to protect the internal business affairs of the organization, particularly confidential information defined herein, which extends to each employee.  
                                </p>
                                <br>
                                <P>
                                The Company employees are responsible for protecting the Company’s confidential information and using that information only for the Company’s purposes. All information developed within the Company with respect to its business is confidential and should not be disclosed to any unauthorized person. Confidential Information that we have access to may include personal information or data about our fellow employees specifically including payroll and other compensation related information, the Company’s officers, directors, or our Customers/Clients. Such information must be protected because unauthorized disclosure could destroy its value to the Company and give an unfair advantage to others. Examples of Company confidential information include, without limitation, bids, business proposals and contracts, budgets, computer software, codes, data files and security information, trade secrets, non-public revenue or earnings results and any other non-public information concerning the Company’s financial, legal, or other business activities, information not known outside the Company (collectively, the “Confidential Information”). The Company’s Customers/Clients properly expect that this information will be kept confidential. This information is also considered Confidential Information.  Employees should not discuss confidential Company information with each other (except with their supervisor) or anyone outside the Company, even with their families. Furthermore, misusing Confidential Information for personal gain is also unacceptable. Any violation of the Confidentiality Agreement is grounds for discipline, up to and including termination.
                                </P>
                                <br>
                                <p>Additionally, employees/contractors cannot discuss owners and their affiliates with our clients or their family members. If a family member of a client wants to know about the owners of the company, direct the family members to call us.   
                                </p>
                                <br>
                                <p>
                                The Company takes any violation of this Confidentiality Agreement very seriously and will not tolerate such conduct. Employee always agrees during Employee’s employment and thereafter, to hold in strict confidence all Confidential Information, and to not directly or indirectly use, disclose, or make accessible to any person any Confidential Information, except with the Company’s express written authorization.  
                                </p><br>
                                <p>
                                EMPLOYEE/CONTRACTOR ACKNOWLEDGES THAT HE/SHE HAS CAREFULLY READ AND UNDERSTANDS THE MEANING OF THIS AGREEMENT AND HAS GIVEN CAREFUL CONSIDERATION TO ALL ITS TERMS, AND THEIR NECESSITY FOR THE REASONABLE AND PROPER PROTECTION OF THE COMPANY’S CONFIDENTIAL AND PROPRIETARY INFORMATION AND CUSTOMER GOODWILL AND RELATIONSHIPS.  
                                </p><br>
                                <p>Calling your friends, former employees, client’s family members, and any other individual to discuss company confidential matter about our clients is a violation of company policy and will lead to termination of contract and face legal action.</p>

                                <br>

                                <p>EMPLOYEE/CONTRACTOR</p>

                                <input class="mt-5" {{ old('e_signature') == '1' ? 'checked' : '' }} value="1" type="checkbox" name="e_signature" id="e-signature-checkbox"> 
                                <label for="e-signature-checkbox">
                                By checking/ticking this box, I agree to adopt this as my electronic signature.
                                </label>
                                
                                <div style="display: none;" id="sig_n_date">
                                    <div class="flex items-center justify-between mt-5 w-full">
                                        <div class="w-1/2 pl-4">
                                            <div class="flex-row">
                                                <div class="wrapper">
                                                    <!-- Signature Canvas -->
                                                    <canvas id="signature-pad" width="400" height="200" style="display: none; border:1px solid #000;"></canvas>
                                                    <!-- Hidden Signature Input -->
                                                    <textarea style="display: none;" name="signature" id="signature-input"></textarea>
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

                                    <p class="mt-5">Printed Full Name: <i>{{ ucfirst($user->firstname . ' ' . $user->lastname) }}</i> </p>

                                    <div class="pass mt-5">
                                        <label for="">Date</label>
                                        <input name="date_signed" value="{{ old('date_signed') }}" class="border-line px-4 pt-3 pb-3 w-full rounded-lg" type="date" autocomplete="off">
                                        @error('date_signed')
                                        <p style="color: red"> {{ $message }} </p>
                                        @enderror
                                        
                                    </div>

                                    <div class="block-button md:mt-7 mt-4">
                                        <button class="button-main">Submit</button>
                                        <a href="#" onclick="window.history.back();" class="button-main">Back</a>
                                    </div>
                                    
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
                const sig_n_date = document.getElementById("sig_n_date");

                // Check localStorage for checkbox state
                if (localStorage.getItem("e-signature-checked") === "true") {
                    checkbox.checked = true;
                }

                function drawSignature() {
                    ctx.clearRect(0, 0, canvas.width, canvas.height); // Clear previous signature

                    document.fonts.ready.then(() => {
                        ctx.font = "40px 'Great Vibes', cursive"; // Apply font inside canvas
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

                        // Store the signature in localStorage
                        localStorage.setItem("e-signature", signatureInput.value);
                    }).catch(error => {
                        console.error("Font loading failed:", error);
                    });
                }

                function handleCheckboxState() {
                    if (checkbox.checked) {
                        canvas.style.display = "block"; // Show canvas
                        sig_n_date.style.display = "block";
                        drawSignature(); // Draw signature

                        // Store checkbox state
                        localStorage.setItem("e-signature-checked", "true");
                    } else {
                        canvas.style.display = "none"; // Hide canvas
                        sig_n_date.style.display = "none";

                        signatureInput.value = ""; // Clear stored signature
                        ctx.clearRect(0, 0, canvas.width, canvas.height); // Clear canvas

                        // Remove stored data from localStorage
                        localStorage.removeItem("e-signature-checked");
                        localStorage.removeItem("e-signature");
                    }
                }

                // Restore signature if available
                if (localStorage.getItem("e-signature-checked") === "true" && localStorage.getItem("e-signature")) {
                    const storedSignature = localStorage.getItem("e-signature");
                    const img = new Image();
                    img.src = storedSignature;
                    img.onload = function () {
                        ctx.drawImage(img, 0, 0);
                    };
                    signatureInput.value = storedSignature;
                    canvas.style.display = "block";
                    sig_n_date.style.display = "block";
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


