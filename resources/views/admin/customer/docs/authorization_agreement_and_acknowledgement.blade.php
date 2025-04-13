 
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
        <div style="margin-top: -50px !important;" class="my-account-block ass">
        <div class="my-account-block md:py-20 py-10;" style=" width: 100%; height: 100%; background-color: rgba(255, 255, 255, 0.9); "><div style="margin-top: -50px !important;" class="my-account-block md:py-20 py-10">
            <div class="container">
                <div class="content-main lg:px-[60px] md:px-4 flex gap-y-8 max-md:flex-col w-full">
                    <div class="right xl:w-2/3 md:w-7/12 w-full xl:pl-[40px] lg:pl-[28px] md:pl-[16px] flex items-start justify-center">
                        @if($authorizationAgreement && $authorizationAgreement->isNotEmpty())
                            @forelse($authorizationAgreement as $authorize)
                            <div class="w-full">
                                <div id="print-area">
                                    <p style="text-align: center;"><b>BLOSSOM TREE HOME HEALTHCARE SERVICES LLC</b></p>
                                    <p style="text-align: center;"><b>AUTHORIZATION, AGREEMENT, AND ACKNOWLEDGEMENTS</b></p>
                                
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
                                    

                                    <p>Consumer Name: {{ ucfirst($user->firstname . ' ' . $user->lastname) }}</p><br>
                                    Consumer Signature: <img width="50%" src="{{ asset('signatures/' . Crypt::decryptString($authorize->consumer_signature)) }}">
                                    <p>Date: {{ Crypt::decryptString($authorize->consumer_signed_date) }}</p>


                                    <div class="pass mt-5"> 
                                    Agency Representative Name: _____________________________________________<br><br>
                                    Agency Representative Signature: _________________________________<br><br>
                                    Date: ______________________________
                                    </div>
                                    
                                </div>
                                <button id="print-button" class="button-main mt-10">Print / Export PDF</button>
                            </div>
                            @empty
                            @endforelse
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <a class="scroll-to-top-btn" href="#top-nav"><i class="ph-bold ph-caret-up"></i></a>

        <script src="{{asset('assets/js/phosphor-icons.js')}}"></script>
        <script src="{{asset('assets/js/swiper-bundle.min.js')}}"></script>
        <script src="{{asset('assets/js/main.js')}}"></script>
        <!-- Include Signature Pad library -->
        <script>
            document.getElementById("print-button").addEventListener("click", function () {
                const printArea = document.getElementById("print-area");
                
                if (!printArea) {
                    console.error("Printable area not found!");
                    return;
                }

                const printWindow = window.open("", "", "width=800,height=600");
                
                printWindow.document.write(`
                    <html>
                        <head>
                            <title>Print Preview</title>
                            <style>
                                body { font-family: Arial, sans-serif; margin: 20px; }
                                @media print { body { margin: 0; } }
                            </style>
                        </head>
                        <body>
                            ${printArea.innerHTML}
                        </body>
                    </html>
                `);

                printWindow.document.close();

                // Wait until content is loaded
                printWindow.onload = function () {
                    const images = printWindow.document.images;
                    let loaded = 0;

                    if (images.length === 0) {
                        printWindow.focus();
                        printWindow.print();
                        printWindow.close();
                        return;
                    }

                    for (let img of images) {
                        img.onload = img.onerror = function () {
                            loaded++;
                            if (loaded === images.length) {
                                printWindow.focus();
                                printWindow.print();
                                printWindow.close();
                            }
                        };
                    }
                };
            });
        </script>


    </body>
</html>
<style>
    .ass{
        background: url('{{ asset("assets/images/caregiver.jpg") }}') no-repeat center center; background-size: cover; position: relative;
    }
</style>


