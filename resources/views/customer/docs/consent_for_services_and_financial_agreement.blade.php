
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
                                <p style="text-align: center;">CONSENT FOR SERVICES AND FINANCIAL AGREEMENT</p>
                                <br>
                                
                                <p>CONSUMER NAME (Last, First, MI): <u>{{ ucfirst($user->lastname . ' ' . $user->firstname) }}</u></p>
                                <p>MR #________</p>

                                <p>CONSENT TO RECEIVE SERVICES: I, <u> {{ ucfirst($user->firstname . ' ' . $user->lastname) }} </u> hereby authorize the Agency to render appropriate home services to me. I understand the Agency will do an evaluation of my home service needs. I accept the proposed Service Plan and authorize services to be provided by the Agency with supervision to be done by agency personnel. I recognize that I have the right to refuse treatment or terminate services at any time by notifying the agency office. Also, the Agency may terminate service by notifying me of termination and reason. I believe my service needs to be:
________________________________________________________________________________________
                                </p><br>

                                <p>AUTHORIZATION FOR PAYMENT TO PROVIDER: </p>

                                <P>
                                I authorize any holder of medical or other information about me to release to any third-party payers, any information needed for this or related claims. I request that payment as authorized be made on my behalf to the Agency if covered. This authorization and request shall apply starting the date of this agreement, until discontinued.
                                </P><br>

                                <p>CHARGE FOR SERVICES: Your initial services from the Agency will include the following services and initial frequency of visits and charge per visit.</p>
                            
                                <br>

                                <p>
                                    Services<br> 	
                                    Frequency of visits	Charge per visit	<br>
                                    Amount consumer is responsible.<br>
                                    Companion 			<br>
                                    Direct worker	
                                </p>
                                <br>

                                <p>CONSUMER LIABILITY FOR PAYMENT: You have the right to be advised, before service is initiated, of the extent to which payment for services may be expected from other sources and the extent to which payment may be required from you, the consumer. We are advising you, orally and in writing, about the cost of items and services to be provided. You will receive a bill monthly for charges incurred. As the consumer, you will be notified of any change in the charges for services provided as soon as possible, but no later than 30 days from the date the home services agency becomes aware of a change. You will be responsible for charges related to the services provided to you by this agency.</p>
                                <br>

                                <p>CONSUMER’S RIGHT/EMERGENCY PLAN/COMPLAINT PROCEDURE: </p>
                                <p>I have been informed of my rights and received a copy of the Consumer’s Bill of Rights prior to the start of service procedure, “Advanced Directives, Emergency Plan, Out-of-Hospital, Do-Not-Resuscitate, Consumer’s Conduct & Responsibilities, Abuse/Neglect/Exploitation”. I have been allowed to participate in planning my services and have received a contact Cabinet by phone, call the Office of the Ombudsman toll free at (800) 372-2973, TTY for hearing impaired (800) 627-4702 State of Kentucky</p><br>

                                <p>CONFIDENTIALITY: It is our policy to protect all clinical records against loss, defacement, tampering and use by unauthorized person(s). The consumer’s written consent shall be required for the release of medical information to persons not otherwise authorized by law (federal and state) to receive this information. Authorized persons who may review the clinical record include surveyors, physicians, third party payers and external and internal auditing personnel.</p><br>

                                <p>RELEASE OF RECORDS: I understand the agency policy regarding confidentiality and release of records prohibits access to my records by persons other than personnel involved in the service. I therefore give written. consent for release of medical records to service providers involved in my service delivery.</p><br>

                                <p>The consumer has received written information regarding their right to make healthcare decisions.</p><br>


                                <p>CLIENT OR AUTHORIZED AGENT SIGNATURE____________________________ </p>
                                <p>CLIENT OR AUTHORIZED AGENT NAME _________________________________________</p>
                                <p>RELATIONSHIP TO CONSUMER__________________________________________</p>
                                <p>DATE: <u> {{ date('F j, Y') }} </u> </p>

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


