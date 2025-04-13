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

      #signature-pad, #eesignature-pad {
         max-width: 100%;
         width: 100%;
         height: auto;
      }   
   </style>

   <body>
      
      <div style="margin-top: -50px !important;" class="my-account-block ass">
      <div class="my-account-block md:py-20 py-10;" style=" width: 100%; height: 100%; background-color: rgba(255, 255, 255, 0.9); ">
      <div style="margin-top: -50px !important;" class="my-account-block md:py-20 py-10">
         <div class="container">
            <div class="content-main lg:px-[60px] md:px-4 flex gap-y-8 max-md:flex-col w-full">
        
               <div class="right xl:w-2/3 md:w-7/12 w-full xl:pl-[40px] lg:pl-[28px] md:pl-[16px] flex items-start justify-center">
                  @if($authorization && $authorization->isNotEmpty())
                     @forelse($authorization as $authorization)
                     <div class="w-full">
                        <div id="print-area">
                        <p style="text-align: center;"><b>BLOSSOM TREE HOME HEALTHCARE SERVICES LLC</b></p>
                        <p style="text-align: center;"><b>AUTHORIZATION FOR USE AND DISCLOSURE OF PROTECTED HEALTH INFORMATION</b></p>
                        <p class="mt-5">You may decline to sign this Authorization</p>
                        <p class="mt-5">I <i>{{ ucfirst($user->firstname . ' ' . $user->lastname) }}</i>
                           hereby authorize Blossom Tree Home Healthcare Services LLC (hereafter collectively referred to as (“Agency”) to use and disclose in any form or format, a copy of records concerning <i>{{ Crypt::decryptString($authorization->consent) }}</i>
                        </p>

                        <div class="pass mt-5">
                           <p class="mt-5">
                              (PRINT consumer name) but only as follows:
                              <u>
                           <li>A copy of this signed, dated authorization shall be as effective as the original.</li>
                           <li>Agency may use and disclose the following information to: <i> {{ Crypt::decryptString($authorization->disclose_to) }} </i></li>
                           </u>
                           </p>
                           
                        </div>
                        <p class="mt-5">For the purpose(s) of (be specific):</p>
                        <p>I specifically authorize the Agency to use and disclose the following types of confidential information. (Check where appropriate): </p>

                        @if($authorization->hiv && !empty($authorization->hiv))
                        <input disabled {{ Crypt::decryptString($authorization->hiv) == 'hiv' ? 'checked' : '' }} name="hiv" value="hiv" class="border-line px-4 pt-3 pb-3 w-1 rounded-lg" type="checkbox" autocomplete="off"> HIV records (including HIV test results) and sexually transmissible diseases.<br>
                        @endif

                        @if($authorization->alcohol_substance && !empty($authorization->alcohol_substance))
                        <input disabled {{ Crypt::decryptString($authorization->alcohol_substance) == 'alcohol_substance' ? 'checked' : '' }} name="alcohol_substance" value="alcohol_substance" class="border-line px-4 pt-3 pb-3 w-1 rounded-lg" type="checkbox" autocomplete="off"> Alcohol and substance abuse diagnosis and treatment records<br>
                        @endif

                        @if($authorization->psychotherapy && !empty($authorization->psychotherapy))
                        <input disabled {{ Crypt::decryptString($authorization->psychotherapy) == 'psychotherapy' ? 'checked' : '' }} name="psychotherapy" value="psychotherapy" class="border-line px-4 pt-3 pb-3 w-1 rounded-lg" type="checkbox" autocomplete="off"> Psychotherapy records<br>
                        @endif

                        @if($authorization->other && !empty($authorization->other) && Crypt::decryptString($authorization->other) == 'other')
                        <input disabled {{ Crypt::decryptString('other') == 'other' ? 'checked' : '' }} name="other" value="other" class="border-line px-4 pt-3 pb-3 w-1 rounded-lg" type="checkbox" autocomplete="off"> Other: Specify: 
                        <p> {{ Crypt::decryptString($authorization->specify) }} </p>
                        @endif
                        <p class="mt-5">
                           The undersigned does hereby release, holds harmless and agrees to indemnify the Agency, its employees, and agents for all liability (including but not limited to negligence) arising out of or occurring under this authorization. I understand that my records may be subject to re-disclosure by recipient(s) and unprotected by federal or state law; that this authorization remains effective until the Agency is in actual receipt of a signed revocation or until the records retention period required under federal and state law has expired and the records have been destroyed; that I have the right to revoke this authorization at any time, provided I do so in writing; that I have been given an opportunity to ask questions: 
                        </p>
                        <p class="mt-5">
                        <ul>
                           <li>•	that I have received a copy of the signed authorization.</li>
                           <li>•	that I may inspect a copy of my protected health information to be used or disclosed under this authorization. </li>
                           <li>•	that the Agency has not conditioned provision of services to or treatment of me upon receipt of this signed authorization, and </li>
                           <li>•	that I may refuse to sign this authorization.</li>
                        </ul>
                        </p>

                        @if($authorization && !empty($authorization->consumer_signature))
                            Consumer Signature: 
                            <img src="{{ asset('signatures/' . Crypt::decryptString($authorization->consumer_signature)) }}"><br>
                            Date: {{ Crypt::decryptString($authorization->consumer_date_signed) }}
                        @endif

                        <br><br>

                        @if($authorization->consumer_rep_signature && !empty($authorization->consumer_rep_signature))
                            Consumer’s Representative Signature: 
                            <img src="{{ asset('signatures/' . Crypt::decryptString($authorization->consumer_rep_signature)) }}"><br>
                            Date: {{ $authorization->consumer_rep_date_signed ? Crypt::decryptString($authorization->consumer_rep_date_signed) : '' }}<br>
                            (Print name and describe authority): {{ $authorization->consumer_name_authority ? Crypt::decryptString($authorization->consumer_name_authority) : '' }}
                        
                        @endif
                            <br><br>
                        <div class="mt-50">
                        Agency Representative Signature & Title: _________________________________________________________ <br><br>
                        Date: _____________________________

                        </div>
                        <br><br>
                        </div>
                        <button id="print-button" class="button-main mt-10">Print / Export PDF</button><br><br>
                    </div>
                        @empty 
                     @endforelse
                  @endif
               
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