   
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
                                <p class="mt-5" style="text-align: center;">Health Insurance Portability and Accountability Act (HIPAA) Compliance Information</p>
                                
                                <p class="mt-5">
                                HIPAA is the acronym for the Health Insurance Portability and Accountability Act that was passed by Congress in 1996. The HIPAA Privacy regulations require health care providers and organizations, as well as their business associates, to develop and follow procedures that ensure the confidentiality and security of protected health information (PHI) when it is transferred, received, handled, or shared. This applies to all forms of PHI, including paper, oral, electronic, etc. HIPAA requires the protection and confidential handling of protected health information including patient health information, demographic information, physical or mental health, health care payment provisions, and client identity. At the same time, the Privacy Rule is balanced so that it permits the disclosure of health information needed for patient care and other important purposes. Failure to comply with HIPAA can result in civil and criminal penalties (42 USC § 1320d-5)
                                </p>

                                <p class="mt-5" style="color: red;">Examples of HIPAA violations:</p>
                                <p class="mt-5">
                                    •	Improper disposal of patient records; shredding is necessary before disposing of patient’s records.<br>
                                    •	Insider snooping, which refers to family members or coworkers looking into a person’s medical records without authorization. This can be avoided with password protection, tracking systems, and clearance levels.<br>
                                    •	Releasing information to an undesignated party; only the exact person listed on the authorization form may receive patient information.<br>
                                    •	Releasing the wrong patient’s information; through a careless mistake, someone releases information to the wrong patient. This sometimes happens when two patients have the same or similar name.<br>
                                    •	Unprotected storage of private health information, such as a laptop that is stolen. Private information stored electronically needs to be stored on a secure device. This applies to a laptop, thumbnail drive, or any other mobile device.<br>
                                </p>

                                <p class="mt-5" style="color: red;">Scenarios of HIPAA violations:</p>
                                <p class="mt-5">
                                    •	Telling friends or relatives about clients that are under your care<br>
                                    •	Discussing private health information in public areas<br>
                                    •	Discussing private health information over the phone in a public xarea<br>
                                    •	Not logging off your computer or a computer system that contains private health information.<br>
                                    •	Including private health information in an unsecured text or email
                                </p>

                                <p class="mt-5" style="color: red;">Confidentiality of client medical information</p>
                                <p class="mt-5">Individuals in our care expect us to maintain the confidentiality and security of all their Protected Health Information (PHI). Blossom Tree Home Healthcare Services LLC does not use, disclose, or discuss client-specific information with others unless the client authorizes the release of his or her information, or we are required or authorized by law to release the information. Blossom Tree Home Healthcare Services LLC maintains confidentiality of client medical information and uses appropriate security measures to protect this information, including information contained in client’s charts. Blossom Tree Home Healthcare Services LLC also uses appropriate security measures of PHI in all communications.</p>


                                <p class="mt-5">
                                    Client’s (Print) First Name: <u> {{ ucfirst($user->firstname) }} </u> <br>
                                    Last Name: <u> {{ ucfirst($user->lastname) }} </u> <br>
                                    Client’s Signature: _________________________________________ <br>
                                    Date: <u> {{ date('F j, Y') }} </u>
                                </p>

                                <p class="mt-5"><b>OR</b></p>

                                <p class="mt-5">  
                                    Client’s Representative (Print) First Name: _____________________________ <br>
                                    Last Name: ______________________________ <br>
                                    Client's Representative Signature: ___________________________ <br>
                                    Date: <u> {{ date('F j, Y') }} </u>
                                </p>

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


