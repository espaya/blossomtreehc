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
   <!-- Load Google Font -->
   <body>
      <div style="margin-top: -50px !important;" class="my-account-block ass">
      <div class="my-account-block md:py-20 py-10;" style=" width: 100%; height: 100%; background-color: rgba(255, 255, 255, 0.9); ">
      <div style="margin-top: -50px !important;" class="my-account-block md:py-20 py-10">
         <div class="container">
            <div class="content-main lg:px-[60px] md:px-4 flex gap-y-8 max-md:flex-col w-full">
               
               <div class="right xl:w-2/3 md:w-7/12 w-full xl:pl-[40px] lg:pl-[28px] md:pl-[16px] flex items-start justify-center">
                  @if($advance && $advance->isNotEmpty())
                  @forelse($advance as $advance)
                  <div class="w-full">
                     <div id="print-area">
                        <p style="text-align: center; font-weight:bold">BLOSSOM TREE HOME HEALTHCARE SERVICES LLC</p>
                        <p style="text-align: center; font-weight:bold">ADVANCED DIRECTIVE ACKNOWLEDGEMENT/HIPPA/HOME CARE PRIVACY RIGHTS ACKNOWLEDGEMENT</p>
                        <p class="mt-5">
                            Client’s name: {{ ucfirst($user->firstname) . ' ' . ucfirst($user->lastname) }}
                        </p>
                        <div class="pass mt-5 flex items-center space-x-2">
                            <span>Medical Record#: </span>
                            <p>{{ Crypt::decryptString($advance->medical_record_number) }}</p>
                        </div>
                        <p class="mt-5">
                            I {{ ucfirst($user->firstname) . ' ' . ucfirst($user->lastname) }}
                            acknowledge that the Agency has provided me with information which indicates that I may accept or reject any medical treatment, including any service specified:
                        </p>
                        <p class="mt-5">
                        <ul>
                            <li>Living Will, Out of Hospital, and Do Not Resuscitate (DNR)</li>
                            <li>Statutory Power of Attorney for Health Care decisions</li>
                            <li>Advance Directives in Kentucky – A Health Care Directive</li>
                            <li>HIPPA/Home Care Privacy Rights</li>
                        </ul>
                        </p>
                        <p class="mt-5">I also understand that it is my responsibility to ask questions about the information provided by the Agency. They have offered to provide a copy of the state’s illustrative forms under state law if I request. I have also been advised to consult with my physician, lawyer, family, clergy, social worker, or other qualified personnel for additional or contact with a lawyer should I need assistance in changing the forms to reflect my information, treatment wishes or in executing a living will or statutory Power of Attorney for health care decisions.</p>
                        <p class="mt-5">I understand that this Agency will honor the advance directives and is willing and able to provide any procedure. Specified in the advanced directives.</p>
                        <p class="mt-5">I understand that the fact that I have or have not signed a living will or Statutory Power of Attorney for Home Care decisions do not affect the medical treatment and services/care to be provided by the Agency. I understand that it is the Agency’s written policy to fully comply through its healthcare providers with the terms of a consumer’s Living Will or Statutory Power of Attorney for Healthcare decisions to fullest extent permitted by state statutory Power of Attorney for Healthcare decisions to fullest extent permitted by state law.
                            I have been given an explanation and acknowledged receipt of the HIPAA PRIVACY RIGHTS. I understand that I may contact the Agency at any time regarding questions or concerns.
                        </p>
                        <p class="mt-5">
                            PLEASE CHECK THE FOLLOWING:<br>
                        </p>
                        <div class="flex items-center">
                            @if($advance->living_will)
                                @if(Crypt::decryptString($advance->living_will) === '1')
                                    <p>I have a living will</p>
                                @elseif(Crypt::decryptString($advance->living_will) === '2')
                                    <p>I have not signed a living will</p>
                                @endif
                            @endif
                        </div>

                        <div class="flex items-center">
                            @if($advance->statutory_power)
                                @if(Crypt::decryptString($advance->statutory_power) == '1')
                                    <p>I Have signed a Statutory Power of Attorney for Health Care</p>
                                @elseif(Crypt::decryptString($advance->statutory_power) == '2')
                                    <p>I Have not signed a Statutory Power of Attorney for Health Care</p>
                                @endif
                               
                            @endif
                        </div>
                        
                        <div class="flex items-center">
                            @if(Crypt::decryptString($advance->confirm) == '1')
                                <p> If I have the above documents, I will provide the Agency with copies for its records.</p>
                            @endif
                        </div>
                        <p class="mt-5">HIPPA PRIVACY RIGHTS</p>
                        <p>Consumers have the right to give adequate notice concerning the use/disclosure of their PHI on the first date of service delivery, or as soon as possible after an emergency.
                            The Privacy Rule grants consumers new rights over their PHI, including the following:<br>
                            1. Receive a Privacy Notice at the time of the first delivery of service.<br>
                            2. Restrict use and disclosure, although the covered entity is not required to agree.<br>
                            3. Have PHI communicated to them by alternate means and at alternate locations to protect confidentiality.<br>
                            4. Inspect, correct, and amend PHI and obtain copies, with some exceptions.<br>
                            5. Request a history of non-routine disclosures for six years prior to the request, and<br>
                            6. Contact designated people regarding any privacy concerns or breach of privacy within the facility or at HHS.
                        </p>
                        <p class="mt-5">
                            Signature of Consumer or Representative (Signed on behalf of consumer when authorized to the extent permitted by state law):
                        </p>
                        <p class="mt-5"></p>
                        <label for="agency_rep_signed_name" class="mr-2 block">Name And Signature:</label>
                        <div class="flex items-center justify-between w-full">
                            <div class="w-1/2 pr-4">
                            <!-- Add padding-right for spacing -->
                            {{ ucfirst($user->firstname) . ' ' . ucfirst($user->lastname) }}
                            </div>
                            <!-- Checkbox for e-signature agreement -->
                            <div class="w-1/2 pl-4">
                            <img src="{{ asset('signatures/' . Crypt::decryptString($advance->clients_signature)) }}">
                            </div>
                        </div>
                        <div class="pass"> Date:
                            <span>{{ Crypt::decryptString($advance->clients_signed_date) }}</span>
                        </div>
                        <p class="mt-5"></p>
                        <label for="agency_rep_signed_name" class="mr-2 block">Agency Witness Name And Signature:</label>
                        <br>
                        <div class="flex items-center justify-between w-full">
                            <div class="w-1/2 pr-4">
                            <!-- Add padding-right for spacing -->
                            .............................................................................
                            </div>
                            <div class="w-1/2 pl-4">
                            ...............................................................................
                            </div>
                        </div>
                        <br>
                        <p>Federal law requires that this agency provide the above information.
                        </p>
                     </div>
                     <div class="block-button md:mt-7 mt-4">
                        <a href="#" id="print-button" class="button-main">Print / Export to PDF</a>
                    </div>
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