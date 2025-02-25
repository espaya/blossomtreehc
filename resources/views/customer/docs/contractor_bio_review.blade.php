   
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
                        @if($contractor && $contractor->isNotEmpty())
                            @forelse($contractor as $contractor)
                            <div class="w-full">
                                <p class="mt-5" style="text-align: center;">BLOSSOM TREE HOME HEALTHCARE SERVICES LLC</p>
                                <p class="mt-5" style="text-align: center;">CONTRACTOR BIO REVIEW</p>

                                    @if(session('success'))
                                        <p class="mt-5" style="color: green;">{{ session('success') }}</p>
                                    @endif

                                    @if(session('error'))
                                        <p class="mt-5" style="color: red;">{{ session('error') }}</p>
                                    @endif

                                    @if ($errors->any())
                                        <div class="text-red-500 bg-red-100 p-3 rounded-lg">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li style="color: red;">{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif

                                <p class="mt-5">First Name: {{ ucfirst($user->firstname) }}</p>
                                <p class="mt-5">Last Name: {{ ucfirst($user->lastname) }}</p>

                                <p class="mt-5">Date of Birth: {{ Crypt::decryptString($contractor->date_of_birth) }}</p>
                                <p class="mt-5">Social Security Number: {{ Crypt::decryptString($contractor->social_security_number) }}</p>

                                <p class="mt-5">Driver License Number: {{ Crypt::decryptString($contractor->driver_license_number) }}</p>
                                <p class="mt-5">Email: {{ $user->email }}</p>
                                <p class="mt-5">Home Address: {{ Crypt::decryptString($contractor->home_address) }}</p>
                                <p class="mt-5">City: {{ Crypt::decryptString($contractor->city) }}</p>
                                <p class="mt-5">State: {{ Crypt::decryptString($contractor->state) }}</p>
                                <p class="mt-5">Zip Code: {{ Crypt::decryptString($contractor->zip_code) }}</p>
                                <p class="mt-5">Telephone: {{ Crypt::decryptString($contractor->telephone) }}</p>
                                <p class="mt-5">Date of Hire: {{ Crypt::decryptString($contractor->date_of_hire) }}</p>
                                <p class="mt-5">Level of Education: {{ Crypt::decryptString($contractor->level_of_education) }}</p>
                                <p class="mt-5">Date of Background Checks (<a title="www.courts.ky.gov" style="text-decoration: underline;" href="https://www.courts.ky.gov" target="_blank">www.courts.ky.gov</a>): {{ Crypt::decryptString($contractor->date_of_background_checks) }}</p>
                                <p class="mt-5">Date of Nurse Aide and Home Health Aide Abuse Registry Check ( <a title="www.kbn.ky.gov" target="_blank" style="text-decoration: underline;" href="https://www.kbn.ky.gov">www.kbn.ky.gov</a>): {{ Crypt::decryptString($contractor->date_of_abuse_registry_check) }}</p>
                                <p class="mt-5">Date of KY Adult Caregiver Misconduct Registry Check ( <a title="prd.webapps.chfs.ky.gov/kacmr/UserInformation.aspx" target="_blank" style="text-decoration: underline;" href="https://prd.webapps.chfs.ky.gov/kacmr/UserInformation.aspx">prd.webapps.chfs.ky.gov/kacmr/UserInformation.aspx</a>): {{ Crypt::decryptString($contractor->date_of_misconduct_registry_check) }}</p>
                                <p class="mt-5">Date of Substance Abuse Check: {{ Crypt::decryptString($contractor->date_of_substance_abuse_check) }}</p>
                                <p class="mt-5">Date of evaluation to determine employee competence training: {{ Crypt::decryptString($contractor->date_of_evaluation) }}</p>
                                <p class="mt-5">Date of Employee Training as well as the topics covered. Training must include the following:
                                    <ul>
                                        <ol>1.	Procedure for reporting adult abuse, Neglect or Exploitation.</ol>
                                        <ol>2.	Procedure for reporting Child Abuse or Neglect.</ol>
                                        <ol>3.	Procedure for facilitating the self-assessment of Administration of Medication</ol>
                                        <ol>4.	Effective communication techniques tailored to individual client’s needs.</ol>
                                    </ul>
                                </p>
                                
                                <p class="mt-10">Contractor Signature</p>

                                <img src="{{ asset('signatures/' . Crypt::decryptString($contractor->contractor_signature)) }}" alt="Signature">

                                <p class="mt-5">Date: {{ Crypt::decryptString($contractor->date) }}</p>
                            </div> 
                            @empty 
                            @endforelse
                        @else 
                        <form action="{{ route('account.contractor.bio-review') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="w-full">
                                <p style="text-align: center;">BLOSSOM TREE HOME HEALTHCARE SERVICES LLC</p>
                                <p class="mt-5" style="text-align: center;">CONTRACTOR BIO REVIEW</p>

                                    @if(session('success'))
                                        <p class="mt-5" style="color: green; text-align:center">{{ session('success') }}</p>
                                    @endif

                                    @if(session('error'))
                                        <p class="mt-5" style="color: red; text-align:center">{{ session('error') }}</p>
                                    @endif

                                    @if ($errors->any())
                                        <div class="text-red-500 bg-red-100 p-3 rounded-lg">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li style="color: red;">{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif

                                <p class="mt-5">First Name: {{ ucfirst($user->firstname) }} </p>
                                <p class="mt-5">Last Name: {{ ucfirst($user->lastname) }}</p>

                                <div class="dob mt-5">
                                    <label for="">Date of Birth *</label>
                                    <input value="{{ old('date_of_birth') }}" name="date_of_birth" class="border-line px-4 pt-3 pb-3 w-full rounded-lg" id="date_of_birth" type="date" autocomplete="off">
                                    @error('date_of_birth')
                                    <p style="color: red;"> {{ $message }} </p>
                                    @enderror
                                </div>

                                <div class="mt-5">
                                    <label for="">Social Security Number</label>
                                    <input value="{{ old('social_security_number') }}" name="social_security_number" class="border-line px-4 pt-3 pb-3 w-full rounded-lg" id="social_security_number" type="text" autocomplete="off" placeholder="Social Security Number *">
                                    @error('social_security_number')
                                    <p style="color: red;"> {{ $message }} </p>
                                    @enderror
                                </div>

                                <div class="mt-5">
                                    <label for="">Driver License Number</label>
                                    <input value="{{ old('driver_license_number') }}" name="driver_license_number" class="border-line px-4 pt-3 pb-3 w-full rounded-lg" id="driver_license_number" type="text" autocomplete="off" placeholder="Driver License Number *">
                                    @error('driver_license_number')
                                    <p style="color: red;"> {{ $message }} </p>
                                    @enderror
                                </div>

                                <p class="mt-5">Email: <u> {{ $user->email }} </u></p>

                                <div class="mt-5">
                                    <label for="">Home Address</label>
                                    <input value="{{ old('home_address') }}" name="home_address" class="border-line px-4 pt-3 pb-3 w-full rounded-lg" id="home_address" type="text" autocomplete="off" placeholder="Home Address *">
                                    @error('home_address')
                                    <p style="color: red;"> {{ $message }} </p>
                                    @enderror
                                </div>

                                <div class="mt-5">
                                    <label for="">City</label>
                                    <input value="{{ old('city') }}" name="city" class="border-line px-4 pt-3 pb-3 w-full rounded-lg" id="city" type="text" autocomplete="off" placeholder="City *">
                                    @error('city')
                                    <p style="color: red;"> {{ $message }} </p>
                                    @enderror
                                </div>

                                <div class="mt-5">
                                    <label for="">State</label>
                                    <input value="{{ old('state') }}" name="state" class="border-line px-4 pt-3 pb-3 w-full rounded-lg" id="state" type="text" autocomplete="off" placeholder="State *">
                                    @error('state')
                                    <p style="color: red;"> {{ $message }} </p>
                                    @enderror
                                </div>

                                <div class="mt-5">
                                    <label for="">Zip Code</label>
                                    <input value="{{ old('zip_code') }}" name="zip_code" class="border-line px-4 pt-3 pb-3 w-full rounded-lg" id="zip_code" type="text" autocomplete="off" placeholder="Zip Code *">
                                    @error('zip_code')
                                    <p style="color: red;"> {{ $message }} </p>
                                    @enderror
                                </div>

                                <div class="mt-5">
                                    <label for="">Telephone *</label>
                                    <input value="{{ old('telephone') }}" name="telephone" class="border-line px-4 pt-3 pb-3 w-full rounded-lg" id="telephone" type="text" autocomplete="off">
                                    @error('telephone')
                                    <p style="color: red;"> {{ $message }} </p>
                                    @enderror
                                </div>

                                <div class="mt-5">
                                    <label for="">Date of Hire *</label>
                                    <input value="{{ old('date_of_hire') }}" name="date_of_hire" class="border-line px-4 pt-3 pb-3 w-full rounded-lg" id="date_of_hire" type="date" autocomplete="off">
                                    @error('date_of_hire')
                                    <p style="color: red;"> {{ $message }} </p>
                                    @enderror
                                </div>

                                <div class="mt-5">
                                    <label for="">Level of Education </label>
                                    <select name="level_of_education" class="border-line px-4 pt-3 pb-3 w-full rounded-lg" id="level_of_education">
                                        <option value="">Select Level of Education *</option>
                                        <option value="High School" {{ old('level_of_education') == 'High School' ? 'selected' : '' }}>High School</option>
                                        <option value="Associate Degree" {{ old('level_of_education') == 'Associate Degree' ? 'selected' : '' }}>Associate Degree</option>
                                        <option value="Bachelor's Degree" {{ old('level_of_education') == "Bachelor's Degree" ? 'selected' : '' }}>Bachelor's Degree</option>
                                        <option value="Master's Degree" {{ old('level_of_education') == "Master's Degree" ? 'selected' : '' }}>Master's Degree</option>
                                        <option value="Doctorate" {{ old('level_of_education') == 'Doctorate' ? 'selected' : '' }}>Doctorate</option>
                                    </select>

                                    @error('level_of_education')
                                    <p style="color: red;"> {{ $message }} </p>
                                    @enderror
                                </div>

                                <div class="mt-5">
                                    <label for="">Date of Background Checks (<a title="www.courts.ky.gov" style="text-decoration: underline;" href="https://www.courts.ky.gov" target="_blank">www.courts.ky.gov</a>) *</label>
                                    <input value="{{ old('date_of_background_checks') }}" name="date_of_background_checks" class="border-line px-4 pt-3 pb-3 w-full rounded-lg" id="date_of_background_checks" type="date" autocomplete="off">
                                    @error('date_of_background_checks')
                                    <p style="color: red;"> {{ $message }} </p>
                                    @enderror
                                </div>

                                <div class="mt-5">
                                    <label for="">Date of Nurse Aide and Home Health Aide Abuse Registry Check ( <a title="www.kbn.ky.gov" target="_blank" style="text-decoration: underline;" href="https://www.kbn.ky.gov">www.kbn.ky.gov</a>) *</label>
                                    <input value="{{ old('date_of_abuse_registry_check') }}" name="date_of_abuse_registry_check" class="border-line px-4 pt-3 pb-3 w-full rounded-lg" id="date_of_abuse_registry_check" type="date" autocomplete="off">
                                    @error('date_of_abuse_registry_check')
                                    <p style="color: red;"> {{ $message }} </p>
                                    @enderror
                                </div>

                                <div class="mt-5">
                                    <label for="">Date of KY Adult Caregiver Misconduct Registry Check ( <a title="prd.webapps.chfs.ky.gov/kacmr/UserInformation.aspx" target="_blank" style="text-decoration: underline;" href="https://prd.webapps.chfs.ky.gov/kacmr/UserInformation.aspx">prd.webapps.chfs.ky.gov/kacmr/UserInformation.aspx</a>) *</label>
                                    <input value="{{ old('date_of_misconduct_registry_check') }}" name="date_of_misconduct_registry_check" class="border-line px-4 pt-3 pb-3 w-full rounded-lg" id="date_of_misconduct_registry_check" type="date" autocomplete="off">
                                    @error('date_of_misconduct_registry_check')
                                    <p style="color: red;"> {{ $message }} </p>
                                    @enderror
                                </div>

                                <div class="mt-5">
                                    <label for="">Date of Substance Abuse Check *</label>
                                    <input value="{{ old('date_of_substance_abuse_check') }}" name="date_of_substance_abuse_check" class="border-line px-4 pt-3 pb-3 w-full rounded-lg" id="date_of_substance_abuse_check" type="date" autocomplete="off">
                                    @error('date_of_substance_abuse_check')
                                    <p style="color: red;"> {{ $message }} </p>
                                    @enderror
                                </div>

                                <div class="mt-5">
                                    <label for="">Date of evaluation to determine employee competence training  *</label>
                                    <input value="{{ old('date_of_evaluation') }}" name="date_of_evaluation" class="border-line px-4 pt-3 pb-3 w-full rounded-lg" id="date_of_evaluation" type="date" autocomplete="off">
                                    @error('date_of_evaluation')
                                    <p style="color: red;"> {{ $message }} </p>
                                    @enderror
                                </div>

                                <p class="mt-5">
                                    Date of Employee Training as well as the topics covered. Training must include the following:
                                </p>
                                <ol class="mt-5 list-decimal pl-5">
                                    <li>Procedure for reporting adult abuse, neglect, or exploitation.</li>
                                    <li>Procedure for reporting child abuse or neglect.</li>
                                    <li>Procedure for facilitating the self-assessment of administration of medication.</li>
                                    <li>Effective communication techniques tailored to individual client’s needs.</li>
                                </ol>

                                <div class="mt-5 flex items-center">
                                    <input class="mr-2" {{ old('e_signature') == '1' ? 'checked' : '' }} value="1" type="checkbox" name="e_signature" id="e-signature-checkbox"> 
                                    <label for="e-signature-checkbox">
                                        By checking/ticking this box, I agree to adopt this as my electronic signature.
                                    </label>
                                </div>
                                @error('e_signature')
                                    <p style="color: red;">{{ $message }}</p>
                                @enderror  

                                <div class="flex items-center justify-between mt-5 w-full">
                                        <div class="w-1/2 pl-4">
                                            <div class="flex-row">
                                                <div class="wrapper">
                                                    <!-- Signature Canvas -->
                                                    <canvas id="signature-pad" width="400" height="200" style="display: none; border:1px solid #000;"></canvas>
                                                    <!-- Hidden Signature Input -->
                                                    <textarea style="display: none;" name="contractor_signature" id="signature-input"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @error('contractor_signature')
                                        <p style="color: red;">{{ $message }}</p>
                                    @enderror     

                                <p class="mt-5">Contractor first name: {{ ucfirst($user->firstname) }}</p>
                                <p class="mt-5">Last name: {{ ucfirst($user->lastname) }}</p>

                                <div class="mt-5">
                                    <label for="">Date *</label>
                                    <input value="{{ old('date') }}" name="date" class="border-line px-4 pt-3 pb-3 w-full rounded-lg" id="date" type="date" autocomplete="off">
                                    @error('date')
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
                const checkbox = document.getElementById("e-signature-checkbox");
                const signatureInput = document.getElementById("signature-input");

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
                        drawSignature(); // Draw signature

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
                if (localStorage.getItem("e-signature-checked") === "true" && localStorage.getItem("e-signature")) {
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


