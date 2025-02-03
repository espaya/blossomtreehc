
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
                                <p style="text-align: center;">AUTHORIZATION, AGREEMENT, AND ACKNOWLEDGEMENTS</p>
                                <br>
                                
                                <p>
                                I ACKNOWLEDGE that the Agency has notified, informed, and explained to me the CONSUMER BILL OF RIGHTS. I have received information on Advance Directives, Directives to Physician, Durable Power of Attorney for Home Healthcare Services, and Out of Hospital DNR orders, the services to be provided, the supervision of the services, and charges for services rendered will be the responsibility of the consumer/family to pay.
                                </p>
                                <br>
                                <p>
                                I AUTHORIZE the Agency to release any medical information requested by representatives of local, state, or federal agencies, insurance companies, or other organizations or entities as may be required by said representatives for payment of claims out of this home care agency which are due. The agency has notified me of the Policies and Procedures regarding Disclosure of Clinical Records.
                                </p>
                                <br>
                                <p>I REALIZE that Agency staff may not be present in my house at all time and I, my caregiver or legal guardian. will assume responsibility for my care when agency staffs are not present.</p>
                                <br>

                                <p>I UNDERSTAND that the Agency does not routinely perform drug testing on its employees but may do so at our discretion using urine samples.</p>
                                <br>

                                <p>I UNDERSTAND that the Agency will notify me in writing and orally, no later than 30 days from the date they become aware of charges not covered by third party payers.
                                </p>
                                <br>

                                <p>
                                I UNDERSTAND that in the event of an emergency during which the Agency cannot meet my needs, the Agency can transfer me to another Agency that can provide the service I require.
                                </p>
                                <br>

                                <p>
                                I FURTHER UNDERSTAND that Agency employees may not be employed by me without first compensating the Agency $15,000.00 or employee’s annual wages, which is even greater. 
                                </p><br>

                                <p>I HAVE BEEN INFORMED of the Agency’s policies for resuscitation, medical emergencies and accessing 911 services. (EMS)</p><br>

                                <p>I AM AWARE that the Agency will be supervising my care and if I have complaints regarding services rendered, I am to contact the Agency Manager.</p><br>

                                <p>I AM AWARE that the Agency is responsible for payment of all wages and taxes to the home service staff that will be providing services in my home.</p><br>

                                <p>I HAVE BEEN INFORMED of my rights and that I may file complaints about the Agency with the Kentucky Home Health Hotline at 1-800-635-6290, during regular business hours.</p><br>

                                <p>I HAVE BEEN INFORMED of my rights and that I may file complaints about the Agency with the Kentucky Home Health Hotline at 1-800-635-6290, during regular business hours.</p><br>

                                <br>
                                <br><br>
                                
                                <label for="agency_rep_signed_name" class="mr-2 block">Consumer Name And Signature:</label>
                                <div class="flex items-center justify-between mt-5 w-full">
                                    <div class="w-1/2 pr-4"> <!-- Add padding-right for spacing -->
                                        <u><u>{{ ucfirst($user->firstname . ' ' . $user->lastname) }}</u></u>
                                    </div>

                                    <div class="w-1/2 pl-4">
                                        <div class="flex-row">
                                            <div class="wrapper">
                                                <canvas id="signature-pad" width="400" height="200"></canvas>
                                                <textarea require style="display:none" name="signature" id="signature-input"></textarea>
                                            </div>
                                            <div class="clear-btn">
                                                <button id="clear"><span>Clear</span></button>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <br> <div class="pass mt-5"> Date:
                                    <input disabled name="agency_rep_signed_date" value="{{ date('F j, Y') }}" class="border-line px-4 pt-3 pb-3 w-full rounded-lg @error('date') is-invalid @enderror" id="mr_no" type="text" autocomplete="off">
                                </div>
                                <br>
                                <br>
                            </div>
                            <div class="block-button md:mt-7 mt-4">
                                <button class="button-main">Submit</button>
                                <a href="#" onclick="window.history.back();" class="button-main">Back</a>
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


