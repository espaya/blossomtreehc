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
                  @if($contractForm && $contractForm->isNotEmpty())
                    @forelse($contractForm as $contractForm)
                        <div class="w-full">
                            <p style="text-align: center;">BLOSSOM TREE HOME HEALTHCARE SERVICES LLC</p>
                            <p style="text-align: center;">CONTRACT FORM AMENDED {{ $date }}</p>
                            <br>
                            <br>
                            @if(session('success'))
                            <p style="color: green; text-align: center;"> {{ session('success') }} </p>
                            @endif
                            @if(session('error'))
                            <p style="color: red; text-align: center;"> {{ session('error') }} </p>
                            @endif
                            <p><u>PARTIES</u></p>
                            <br>
                            @forelse($address as $address)
                            <p>This Independent Contract Agreement (hereinafter referred to as the “Agreement”) is entered into on <i> {{ Crypt::decryptString($contractForm->client_signed_date) }}</i> (the “Effective Date”), by and between BLOSSOM TREE HOME HEALTHCARE SERVICES LLC with an address of 3908 BARDSTOWN RD LOUISVILLE KY 40218 (hereinafter referred to as the “Client”) and <i> {{ ucfirst($user->firstname . ' ' . $user->lastname) }} </i> with an address of <i> {{$address->address . ', ' . $address->city . ' ' . $address->state . ' ' . $address->zip }} </i> , (hereinafter referred to as the “Contractor”) (collectively referred to as the “Parties”).
                            </p>
                            @empty 
                            @endforelse
                            <br>
                            <p><u>GENERAL</u></p>
                            <br>
                            <P>The Client agrees that the Contractor possesses the relevant experience, necessary qualifications and abilities to provide services to the Client. </P>
                            <br>
                            <p><u>SERVICES</u></p>
                            <br>
                            <p>The duties of the Contractor towards the client are listed below:</p>
                            <ul>
                                <li>•	Help with personal hygiene. </li>
                                <li>•	Assisting with meals and nutrition</li>
                                <li>•	Help with mobility.</li>
                                <li>•	Home maintenance and basic housekeeping</li>
                                <li>•	Keeping them company/ companionship</li>
                                <li>•	Reporting and monitoring</li>
                                <li>•	Financial accountability</li>
                                <li>•	Prescription medication management</li>
                                <li>•	Home management and care planning</li>
                                <li>•	Medical advocacy</li>
                            </ul>
                            <br>
                            <p><u>COMPENSATION</u></p>
                            <br>
                            <P>The Parties Agree that the Client will compensate the Contractor through the following means: $15.00 per hour (Benefits included).</P>
                            <br>
                            <p><u>TERMS</u></p>
                            <br>
                            <P>-	This Agreement shall be effective on the date of signing this Agreement (the “Effective Date”) <u> {{ Crypt::decryptString($contractForm->client_signed_date) }} </u> and will terminate upon the completion of the provision of the services set forth in this Agreement.</P>
                            <br>
                            <P>-	This Agreement may be prolonged only on written confirmation provided by both Parties.</P>
                            <br>
                            <p><u>RELATIONSHIP BETWEEN THE PARTIES</u></p>
                            <br>
                            <p>-	The Parties agree that this Agreement is an independent contractor Agreement where the Contractor provides the specified services and acts as an independent contractor. </p>
                            <br>
                            <p>-	Under no circumstances shall the independent contractor be considered an employee. </p>
                            <br>
                            <p>-	This Agreement does not create any other partnership between the Parties.</p>
                            <br>
                            <p class="mt-5">RELATIONSHIP BETWEEN BLOSSOM TREE HOME HEALTHCARE SERVICES AND EMPLOYEES/ CONTRACTORS.</p>
                            <p>-	Contractors and employees cannot have a relationship with the company clients to the extent they accept direct hire from the company clients. That will be against the company rules and regulations. The contractor or employee will be sued for such unauthorized negotiation(s) between a contractor/employee and the company client where the contractor/employee is assigned to work. A fee of up to fifty thousand dollars ($50,000) will be charged. Both the contractor/employee and the client will be sued for such an unauthorized Agreement. The company must approve such negotiation and the contractor/employee paying an amount equal to fifty thousand dollars (50,000 dollars), and the Client will pay an amount of twenty thousand dollars (20,000 dollars) to the company.
                                -	Initial: 
                            <p>{{ Crypt::decryptString($contractForm->initial) }}</p>
                            </p>
                            <p class="mt-5">CONFIDENTIALITY</p>
                            <p>-	All terms and conditions of this Agreement and any materials provided during the term of the Agreement must be kept confidential by the Contractor, unless the disclosure is required pursuant to process of law. 
                                -	Disclosing or using this information for any purpose beyond the scope of this Agreement, or beyond the exceptions set forth above, is expressly forbidden without the prior consent of the Client.
                            </p>
                            <p><u>TERMINATION</u></p>
                            <br>
                            <p>This Agreement may be terminated if any of the following occurs:	</p>
                            <p>1.	Immediately if one of the Parties breaches this Agreement at any given time by providing written notice to the other party.</p>
                            <br>
                            <p>2.	“AT WILL” days prior to terminating the Agreement.</p>
                            <br>
                            <p>Upon terminating this Agreement, the Client will be responsible for paying for all the services provided by the Contractor until the day of termination, unless it is the Contractor who breaches this Agreement, where he/she fails to rectify such breach upon reasonable notice.</p>
                            <br>
                            <p><u>INTELLECTUAL PROPERTY</u></p>
                            <br>
                            <p>The Contractor agrees that any intellectual property provided to him/her by the Client will remain the sole property of the Client, including, but not limited to, copyrights, patents, trade secret rights, and other intellectual property rights associated with any ideas, concepts, techniques, inventions, processes, works of authorship, confidential information or trade secrets. </p>
                            <br>
                            <p><u>AMENDMENTS</u></p>
                            <br>
                            <p>The Parties agree that any amendments made to this Agreement must be in writing, where they must be signed by both Parties to this Agreement.</p>
                            <br> 
                            <p>Accordingly, any amendments made by the Parties will be applied to this Agreement.</p>
                            <br>
                            <p><u>SEVERABILITY</u></p>
                            <br>
                            <p>If any provision of this Agreement is found to be void and unenforceable by a court of competent jurisdiction, then the remaining provisions will remain in force in accordance with the Parties’ intention.</p>
                            <br> 
                            <p><u>GOVERNING LAW</u></p>
                            <br>
                            <p>This Agreement shall be governed by and construed in accordance with the laws of the STATE OF KENTUCKY.
                            </p>
                            <br> 
                            <p><u>LIMITATION OF LIABILITY</u></p>
                            <br>
                            <p>Under no circumstances will either party be liable for any indirect, special, consequential, or punitive damages (including loss of profits) arising out of or relating to this Agreement or the transactions it contemplates (whether for breach of contract, tort, negligence, or other form of action) in the event that such is not related to the direct result of one of the Parties’ negligence or breach.
                            </p>
                            <br> 
                            <p><u>LEGAL FEES</u></p>
                            <br>
                            <p>In the event of a dispute that results in legal action, the successful party will be entitled to legal fees, such as attorney’s fees or other.
                            </p>
                            <br> 
                            <p><u>SIGNATURE AND DATE</u></p>
                            <br>
                            <p>The Parties hereby agree to the terms and conditions set forth in this Agreement and such is demonstrated by their signatures below:
                            </p>
                            <br>
                            <p><u>CONTRACTOR</u></p>
                            <br>
                            <p>Name: <u>{{ ucfirst($user->firstname . ' ' . $user->lastname) }}</u> </p>
                            <p class="mt-5">Signature:</p>
                            <img src="{{ asset('signatures/' . Crypt::decryptString($contractForm->clients_signature)) }}" alt="Signature">  
                            <p>Date: {{ Crypt::decryptString($contractForm->client_signed_date) }}</p>
                            <br>
                            <p><u>SPECIAL CLAUSE</u></p>
                            <P>INDEPENDENT CONTRACTOR RELATIONSHIP</P>
                            <br>
                            <p>The Independent Contractor’s relationship with the Company is that of an independent contractor, and nothing in this Agreement is intended to, or should be construed to, create a partnership, agency, joint venture or employment relationship. </p>
                            <p>The Independent Contractor shall not be entitled to any of the benefits that the Company may make available to its employees, including, but not limited to, group health or life insurance, profit sharing, or retirement benefits, except as expressly stated in this Agreement. </p>
                            <br>
                            <p>The Independent Contractor is not authorized to make any representation, contract, or commitment on behalf of the Company unless specifically requested or authorized in writing to do so by an executive officer of the Company. </p>
                            <br>
                            <p>The Independent Contractor is solely responsible for, and will file, on a timely basis, all tax returns and payments required to be filed with, or made to, any federal, state, or local tax authority with respect to the performance of services and receipt of fees under this Agreement. </p>
                            <br>
                            <p>The Independent Contractor is solely responsible for, and must maintain adequate records of, expenses incurred while performing services under this Agreement. The Company will not withhold the payment of any social security, federal, state, or any other employee payroll taxes payable with respect to the Independent Contractor. The Company will, as applicable, regularly report amounts paid to the Independent Contractor by filing Form 1099-MISC with the Internal Revenue Service as required by law.</p>
                            <br>
                            <p>The Independent Contractor who terminates the contract will not be eligible to work with the client they work with for three or six periods. Breach of the clause will result in a lawsuit or a fine of fifty thousand dollars ($50.000).</p>
                        </div>
                    @empty 
                    @endforelse
                  @else 
                  <form action="{{ route('account.contract.form-amended', ['date' => date('Y')]) }}" method="post" enctype="multipart/form-data">
                     @csrf
                     <div class="w-full">
                        <p style="text-align: center;">BLOSSOM TREE HOME HEALTHCARE SERVICES LLC</p>
                        <p style="text-align: center;">CONTRACT FORM AMENDED {{ $date }}</p>
                        <br>
                        <br>
                        @if(session('success'))
                        <p style="color: green; text-align: center;"> {{ session('success') }} </p>
                        @endif
                        @if(session('error'))
                        <p style="color: red; text-align: center;"> {{ session('error') }} </p>
                        @endif
                        @forelse($address as $address)
                        <p><u>PARTIES</u></p>
                        <br>
                        <p>This Independent Contract Agreement (hereinafter referred to as the “Agreement”) is entered into on <i> {{ date('F j, Y') }}</i> (the “Effective Date”), by and between BLOSSOM TREE HOME HEALTHCARE SERVICES LLC with an address of 3908 BARDSTOWN RD LOUISVILLE KY 40218 (hereinafter referred to as the “Client”) and <i> {{ ucfirst($user->firstname . ' ' . $user->lastname) }} </i> with an address of <i> {{$address->address . ', ' . $address->city . ' ' . $address->state . ' ' . $address->zip }} </i> , (hereinafter referred to as the “Contractor”) (collectively referred to as the “Parties”).
                        </p>
                        <br>
                        <p><u>GENERAL</u></p>
                        <br>
                        <P>The Client agrees that the Contractor possesses the relevant experience, necessary qualifications and abilities to provide services to the Client. </P>
                        <br>
                        <p><u>SERVICES</u></p>
                        <br>
                        <p>The duties of the Contractor towards the client are listed below:</p>
                        <ul>
                           <li>•	Help with personal hygiene. </li>
                           <li>•	Assisting with meals and nutrition</li>
                           <li>•	Help with mobility.</li>
                           <li>•	Home maintenance and basic housekeeping</li>
                           <li>•	Keeping them company/ companionship</li>
                           <li>•	Reporting and monitoring</li>
                           <li>•	Financial accountability</li>
                           <li>•	Prescription medication management</li>
                           <li>•	Home management and care planning</li>
                           <li>•	Medical advocacy</li>
                        </ul>
                        <br>
                        <p><u>COMPENSATION</u></p>
                        <br>
                        <P>The Parties Agree that the Client will compensate the Contractor through the following means: $15.00 per hour (Benefits included).</P>
                        <br>
                        <p><u>TERMS</u></p>
                        <br>
                        <P>-	This Agreement shall be effective on the date of signing this Agreement (the “Effective Date”) <u> {{ date('F j, Y') }} </u> and will terminate upon the completion of the provision of the services set forth in this Agreement.</P>
                        <br>
                        <P>-	This Agreement may be prolonged only on written confirmation provided by both Parties.</P>
                        <br>
                        <p><u>RELATIONSHIP BETWEEN THE PARTIES</u></p>
                        <br>
                        <p>-	The Parties agree that this Agreement is an independent contractor Agreement where the Contractor provides the specified services and acts as an independent contractor. </p>
                        <br>
                        <p>-	Under no circumstances shall the independent contractor be considered an employee. </p>
                        <br>
                        <p>-	This Agreement does not create any other partnership between the Parties.</p>
                        <br>
                        <p class="mt-5">RELATIONSHIP BETWEEN BLOSSOM TREE HOME HEALTHCARE SERVICES AND EMPLOYEES/ CONTRACTORS.</p>
                        <p>-	Contractors and employees cannot have a relationship with the company clients to the extent they accept direct hire from the company clients. That will be against the company rules and regulations. The contractor or employee will be sued for such unauthorized negotiation(s) between a contractor/employee and the company client where the contractor/employee is assigned to work. A fee of up to fifty thousand dollars ($50,000) will be charged. Both the contractor/employee and the client will be sued for such an unauthorized Agreement. The company must approve such negotiation and the contractor/employee paying an amount equal to fifty thousand dollars (50,000 dollars), and the Client will pay an amount of twenty thousand dollars (20,000 dollars) to the company.
                           -	Initial
                        </p>
                        <div class="mt-5">
                           <input name="initial" value="{{ old('initial') }}" class="border-line px-4 pt-3 pb-3 w-full rounded-lg" type="text" autocomplete="off">
                        </div>
                        @error('initial')
                        <p style="color: red;">{{ $message }}</p>
                        @enderror
                        <p class="mt-5">CONFIDENTIALITY</p>
                        <p>-	All terms and conditions of this Agreement and any materials provided during the term of the Agreement must be kept confidential by the Contractor, unless the disclosure is required pursuant to process of law. 
                           -	Disclosing or using this information for any purpose beyond the scope of this Agreement, or beyond the exceptions set forth above, is expressly forbidden without the prior consent of the Client.
                        </p>
                        <p><u>TERMINATION</u></p>
                        <br>
                        <p>This Agreement may be terminated if any of the following occurs:	</p>
                        <p>1.	Immediately if one of the Parties breaches this Agreement at any given time by providing written notice to the other party.</p>
                        <br>
                        <p>2.	“AT WILL” days prior to terminating the Agreement.</p>
                        <br>
                        <p>Upon terminating this Agreement, the Client will be responsible for paying for all the services provided by the Contractor until the day of termination, unless it is the Contractor who breaches this Agreement, where he/she fails to rectify such breach upon reasonable notice.</p>
                        <br>
                        <p><u>INTELLECTUAL PROPERTY</u></p>
                        <br>
                        <p>The Contractor agrees that any intellectual property provided to him/her by the Client will remain the sole property of the Client, including, but not limited to, copyrights, patents, trade secret rights, and other intellectual property rights associated with any ideas, concepts, techniques, inventions, processes, works of authorship, confidential information or trade secrets. </p>
                        <br>
                        <p><u>AMENDMENTS</u></p>
                        <br>
                        <p>The Parties agree that any amendments made to this Agreement must be in writing, where they must be signed by both Parties to this Agreement.</p>
                        <br> 
                        <p>Accordingly, any amendments made by the Parties will be applied to this Agreement.</p>
                        <br>
                        <p><u>SEVERABILITY</u></p>
                        <br>
                        <p>If any provision of this Agreement is found to be void and unenforceable by a court of competent jurisdiction, then the remaining provisions will remain in force in accordance with the Parties’ intention.</p>
                        <br> 
                        <p><u>GOVERNING LAW</u></p>
                        <br>
                        <p>This Agreement shall be governed by and construed in accordance with the laws of the STATE OF KENTUCKY.
                        </p>
                        <br> 
                        <p><u>LIMITATION OF LIABILITY</u></p>
                        <br>
                        <p>Under no circumstances will either party be liable for any indirect, special, consequential, or punitive damages (including loss of profits) arising out of or relating to this Agreement or the transactions it contemplates (whether for breach of contract, tort, negligence, or other form of action) in the event that such is not related to the direct result of one of the Parties’ negligence or breach.
                        </p>
                        <br> 
                        <p><u>LEGAL FEES</u></p>
                        <br>
                        <p>In the event of a dispute that results in legal action, the successful party will be entitled to legal fees, such as attorney’s fees or other.
                        </p>
                        <br> 
                        <p><u>SIGNATURE AND DATE</u></p>
                        <br>
                        <p>The Parties hereby agree to the terms and conditions set forth in this Agreement and such is demonstrated by their signatures below:
                        </p>
                        <br>
                        <p><u>CONTRACTOR</u></p>
                        <br>
                        <p>Name: <u>{{ ucfirst($user->firstname . ' ' . $user->lastname) }}</u> </p>
                        <p class="mt-5">Signature:</p>
                        <input class="mt-5" {{ old('e_signature') == '1' ? 'checked' : '' }} value="1" type="checkbox" name="e_signature" id="e-signature-checkbox"> 
                        <label for="e-signature-checkbox">
                        By checking/ticking this box, I agree to adopt this as my electronic signature.
                        </label>
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
                                    <textarea style="display: none;" name="clients_signature" id="signature-input"></textarea>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="pass mt-5">
                           <label for="">Date </label>
                           <input name="client_signed_date" value="{{ old('client_signed_date') }}" class="border-line px-4 pt-3 pb-3 w-full rounded-lg" type="date" autocomplete="off">
                           @error('client_signed_date')
                           <p style="color: red"> {{ $message }} </p>
                           @enderror
                        </div>
                        <br>
                        <p><u>SPECIAL CLAUSE</u></p>
                        <P>INDEPENDENT CONTRACTOR RELATIONSHIP</P>
                        <br>
                        <p>The Independent Contractor’s relationship with the Company is that of an independent contractor, and nothing in this Agreement is intended to, or should be construed to, create a partnership, agency, joint venture or employment relationship. </p>
                        <p>The Independent Contractor shall not be entitled to any of the benefits that the Company may make available to its employees, including, but not limited to, group health or life insurance, profit sharing, or retirement benefits, except as expressly stated in this Agreement. </p>
                        <br>
                        <p>The Independent Contractor is not authorized to make any representation, contract, or commitment on behalf of the Company unless specifically requested or authorized in writing to do so by an executive officer of the Company. </p>
                        <br>
                        <p>The Independent Contractor is solely responsible for, and will file, on a timely basis, all tax returns and payments required to be filed with, or made to, any federal, state, or local tax authority with respect to the performance of services and receipt of fees under this Agreement. </p>
                        <br>
                        <p>The Independent Contractor is solely responsible for, and must maintain adequate records of, expenses incurred while performing services under this Agreement. The Company will not withhold the payment of any social security, federal, state, or any other employee payroll taxes payable with respect to the Independent Contractor. The Company will, as applicable, regularly report amounts paid to the Independent Contractor by filing Form 1099-MISC with the Internal Revenue Service as required by law.</p>
                        <br>
                        <p>The Independent Contractor who terminates the contract will not be eligible to work with the client they work with for three or six periods. Breach of the clause will result in a lawsuit or a fine of fifty thousand dollars ($50.000).</p>
                        <div class="block-button md:mt-7 mt-4">
                           <button class="button-main">Submit</button>
                           <a href="#" onclick="window.history.back();" class="button-main">Back</a>
                        </div>
                        @empty 
                        <b>Please Fill Your <a style="text-decoration: underline;" href="{{ route('my.address') }}">Address</a> Before Filling This Form</b>
                        @endforelse
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
                     drawSignature(); // Draw signature
                 } else {
                     canvas.style.display = "none"; // Hide canvas
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