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
      <div class="my-account-block md:py-20 py-10;" style=" width: 100%; height: 100%; background-color: rgba(255, 255, 255, 0.9); ">
      <div style="margin-top: -50px !important;" class="my-account-block md:py-20 py-10">
         <div class="container">
            <div class="content-main lg:px-[60px] md:px-4 flex gap-y-8 max-md:flex-col w-full">
               <div class="right xl:w-2/3 md:w-7/12 w-full xl:pl-[40px] lg:pl-[28px] md:pl-[16px] flex items-start justify-center">
                  @if($charges && $charges->isNotEmpty())
                  @forelse($charges as $charge)
                  <div class="w-full">
                     <div id="print-area">
                        <p style="text-align: center;">BLOSSOM TREE HOME HEALTHCARE SERVICES LLC</p>
                        <p style="text-align: center;">CHARGES FOR SERVICES</p>
                        <p class="mt-5">
                            The Agency will charge the following rates for services ("Fees"):
                        </p>
                        <P>
                            Hourly Rate for Weekend Services: $ 30:00 <br>
                            Hourly Rate for Weekday Services: $ 30:00 <br>
                            Live-In Services Rate: $ 390:00 per day <br>
                            Travel Charges: $ N/A <br>
                            Nurse Assessments: $ N/A <br>
                            Mutual Case: $ N/A per case (assuming two patients)
                        </P>
                        <br>
                        @if(!empty($charge->clients_signature))
                        <p> Client’s signature</p>
                        <img src="{{ asset('signatures/' . Crypt::decryptString($charge->clients_signature)) }}" alt="Signature">
                        <p>Client’s name (Print) First Name: <i>{{ ucfirst($user->firstname) }}</i></p>
                        <p>Last Name: <i>{{ ucfirst($user->lastname) }}</i> </p>
                        <p>Date: <i> {{ Crypt::decryptString($charge->clients_signed_date) }} </i> </p>
                        @endif

                        @if(!empty($charge->clients_rep_firstname))
                        <p>Client’s representative Signature:  </p>
                        <img src="{{ asset('signatures/' . Crypt::decryptString($charge->clients_rep_signature)) }}" alt="Signature">
                        <p>Client’s representative Name (Print) First Name: <i>{{ Crypt::decryptString($charge->clients_rep_firstname) }}</i> </p>
                        <p>Last Name:<i>{{ Crypt::decryptString($charge->clients_rep_firstname) }}</i></p>
                        Date:  <i> {{ Crypt::decryptString($charge->clients_rep_date_signed) }} </i>
                        @endif

                        Agency representative Signature: _________________________<br><br>

                        Agency representative Name (Print):___________________________<br><br>

                        Date: ____________________________<br><br>

                     </div>
                     <button id="print-button" class="button-main mt-10">Print / Export PDF</button><br><br>
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

      <style>
         .ass{
         background: url('{{ asset("assets/images/caregiver.jpg") }}') no-repeat center center; background-size: cover; position: relative;
         }
      </style>
   </body>
</html>