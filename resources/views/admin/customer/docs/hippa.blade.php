    
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
                        @if($hipaa && $hipaa->isNotEmpty())
                            @forelse($hipaa as $hipaa)
                            <div class="w-full">
                                <div id="print-area">
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


                                    <p class="mt-5">Client’s (Print) First Name: <i> {{ ucfirst($user->firstname) }} </i></p>
                                    <p class="mt-5">Last Name: <i> {{ ucfirst($user->lastname) }} </i></p>
                                    @if(!empty($hipaa->clients_signature))
                                    <p class="mt-5">Client’s Signature: <br></p>
                                    <img src="{{ asset('signatures/' . Crypt::decryptString($hipaa->clients_signature)) }}" alt="Signature"> 
                                    <p class="mt-5">Date: {{ Crypt::decryptString($hipaa->clients_signed_date) }} </p>
                                    @endif 

                                    @if(!empty($hipaa->clients_rep_signature))
                                    <p class="mt-5">Client's Representative Signature: <br></p>
                                    <img src="{{ asset('signatures/' . Crypt::decryptString($hipaa->clients_rep_signature)) }}" alt="Signature">
                                    <p class="mt-5">Client's Representative First Name: {{ Crypt::decryptString($hipaa->clients_rep_firstname) }} </p>
                                    <p class="mt-5">Client's Representative Last Name: {{ Crypt::decryptString($hipaa->clients_rep_lastname) }} </p>
                                    <p class="mt-5">Date {{ Crypt::decryptString($hipaa->clients_rep_date_signed) }} </p>
                                    @endif 

                                    <div class="mt-7">
                                        Blossom Tree Home Healthcare Services LLC<br><br>

                                        Name ________________________________________________________<br><br>
                                        Signature _____________________________________________________<br><br>
                                        Date _____________________________________________<br><br>

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


