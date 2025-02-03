  
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
                        <form action="#" enctype="multipart/form-data">
                            @csrf
                            <div class="w-full">
                                <p style="text-align: center;">BLOSSOM TREE HOME HEALTHCARE SERVICES LLC</p>
                                <p style="text-align: center;">CONTRACT FORM AMENDED {{ $date }}</p>
                                <br>

                                @forelse($address as $address)
                                    <p><u>PARTIES</u></p><br>
                                    <p>This Independent Contract Agreement (hereinafter referred to as the “Agreement”) is entered into on <u> {{ date('F j, Y') }}</u> (the “Effective Date”), by and between BLOSSOM TREE HOME HEALTHCARE SERVICES LLC with an address of 3908 BARDSTOWN RD LOUISVILLE KY 40218 (hereinafter referred to as the “Client”) and <u> {{ ucfirst($user->firstname . ' ' . $user->lastname) }} </u> with an address of <u> {{$address->address . ', ' . $address->city . ' ' . $address->state . ' ' . $address->zip }} </u> , (hereinafter referred to as the “Contractor”) (collectively referred to as the “Parties”).
                                    </p><br>
                                    <p><u>GENERAL</u></p><br>
                                    <P>The Client agrees that the Contractor possesses the relevant experience, necessary qualifications and abilities to provide services to the Client. </P><br>
                                    <p><u>SERVICES</u></p><br>
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
                                    <p><u>COMPENSATION</u></p><br>
                                    <P>The Parties Agree that the Client will compensate the Contractor through the following means: $15.00 per hour (Benefits included).</P><br>

                                    <p><u>TERMS</u></p><br>
                                    <P>-	This Agreement shall be effective on the date of signing this Agreement (the “Effective Date”) <u> {{ date('F j, Y') }} </u> and will terminate upon the completion of the provision of the services set forth in this Agreement.</P><br>
                                    <P>-	This Agreement may be prolonged only on written confirmation provided by both Parties.</P><br>

                                    <p><u>RELATIONSHIP BETWEEN THE PARTIES</u></p><br>

                                    <p>-	The Parties agree that this Agreement is an independent contractor Agreement where the Contractor provides the specified services and acts as an independent contractor. </p><br>
                                    <p>-	Under no circumstances shall the independent contractor be considered an employee. </p><br>
                                    <p>-	This Agreement does not create any other partnership between the Parties.</p><br>

                                    <p><u>TERMINATION</u></p><br>

                                    <p>This Agreement may be terminated if any of the following occurs:	</p>
                                        <p>1.	Immediately if one of the Parties breaches this Agreement at any given time by providing written notice to the other party.</p><br>
                                        <p>2.	“AT WILL” days prior to terminating the Agreement.</p><br>
                                        <p>Upon terminating this Agreement, the Client will be responsible for paying for all the services provided by the Contractor until the day of termination, unless it is the Contractor who breaches this Agreement, where he/she fails to rectify such breach upon reasonable notice.</p><br>

                                    <p><u>INTELLECTUAL PROPERTY</u></p><br>
                                    <p>The Contractor agrees that any intellectual property provided to him/her by the Client will remain the sole property of the Client, including, but not limited to, copyrights, patents, trade secret rights, and other intellectual property rights associated with any ideas, concepts, techniques, inventions, processes, works of authorship, confidential information or trade secrets. </p><br>

                                    <p><u>AMENDMENTS</u></p><br>
                                    <p>The Parties agree that any amendments made to this Agreement must be in writing, where they must be signed by both Parties to this Agreement.</p><br> 
                                    <p>Accordingly, any amendments made by the Parties will be applied to this Agreement.</p><br>

                                    <p><u>SEVERABILITY</u></p><br>
                                    <p>If any provision of this Agreement is found to be void and unenforceable by a court of competent jurisdiction, then the remaining provisions will remain in force in accordance with the Parties’ intention.</p><br> 

                                    <p><u>GOVERNING LAW</u></p><br>
                                    <p>This Agreement shall be governed by and construed in accordance with the laws of the STATE OF KENTUCKY.
                                    </p><br> 

                                    <p><u>LIMITATION OF LIABILITY</u></p><br>
                                    <p>Under no circumstances will either party be liable for any indirect, special, consequential, or punitive damages (including loss of profits) arising out of or relating to this Agreement or the transactions it contemplates (whether for breach of contract, tort, negligence, or other form of action) in the event that such is not related to the direct result of one of the Parties’ negligence or breach.
                                    </p><br> 

                                    <p><u>LEGAL FEES</u></p><br>
                                    <p>In the event of a dispute that results in legal action, the successful party will be entitled to legal fees, such as attorney’s fees or other.
                                    </p><br> 

                                    <p><u>SIGNATURE AND DATE</u></p><br>
                                    <p>The Parties hereby agree to the terms and conditions set forth in this Agreement and such is demonstrated by their signatures below:
                                    </p><br>
                                    
                                    <p><u>CONTRACTOR</u></p><br>
                                    <p>Name: <u>{{ ucfirst($user->firstname . ' ' . $user->lastname) }}</u> </p>
                                    <p>Signature: __________________________</p>
                                    <p>Date: <u>{{ date('F j, Y') }}</u></p>

                                    <br>
                                    <p><u>SPECIAL CLAUSE</u></p>
                                    <P>INDEPENDENT CONTRACTOR RELATIONSHIP</P><br>

                                    <p>The Independent Contractor’s relationship with the Company is that of an independent contractor, and nothing in this Agreement is intended to, or should be construed to, create a partnership, agency, joint venture or employment relationship. </p>

                                    <p>The Independent Contractor shall not be entitled to any of the benefits that the Company may make available to its employees, including, but not limited to, group health or life insurance, profit sharing, or retirement benefits, except as expressly stated in this Agreement. </p><br>

                                    <p>The Independent Contractor is not authorized to make any representation, contract, or commitment on behalf of the Company unless specifically requested or authorized in writing to do so by an executive officer of the Company. </p><br>

                                    <p>The Independent Contractor is solely responsible for, and will file, on a timely basis, all tax returns and payments required to be filed with, or made to, any federal, state, or local tax authority with respect to the performance of services and receipt of fees under this Agreement. </p><br>

                                    <p>The Independent Contractor is solely responsible for, and must maintain adequate records of, expenses incurred while performing services under this Agreement. The Company will not withhold the payment of any social security, federal, state, or any other employee payroll taxes payable with respect to the Independent Contractor. The Company will, as applicable, regularly report amounts paid to the Independent Contractor by filing Form 1099-MISC with the Internal Revenue Service as required by law.</p><br>

                                    <p>The Independent Contractor who terminates the contract will not be eligible to work with the client they work with for three or six periods. Breach of the clause will result in a lawsuit or a fine of fifty thousand dollars ($50.000).</p>


                                @empty 
                                    <b>Please Fill Your <a style="text-decoration: underline;" href="{{ route('my.address') }}">Address</a> Before Filling This Form</b>
                                @endforelse
                                
                                
                                <div class="block-button md:mt-7 mt-4">
                                    <button class="button-main">Submit</button>
                                    <a href="#" onclick="window.history.back();" class="button-main">Back</a>
                                </div>
                            </div> 
                        </form>
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
        
        <script type="text/javascript">
            var canvas = document.getElementById("signature-pad");
            var signaturePad = new SignaturePad(canvas);
            
            document.getElementById("clear").addEventListener('click', function(event) {
                event.preventDefault();
                signaturePad.clear();
            });
            
            
            function submitForm() {
                if(!signaturePad.isEmpty()){
                //Unterschrift in verstecktes Feld übernehmen
                document.getElementById('signature-input').value = signaturePad.toDataURL();
                }
            }
            
            </script>


    </body>
</html>
<style>
    .ass{
        background: url('{{ asset("assets/images/caregiver.jpg") }}') no-repeat center center; background-size: cover; position: relative;
    }
</style>


