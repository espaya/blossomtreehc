   
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
                        @if($listOfService && $listOfService->isNotEmpty())
                            @forelse($listOfService as $services)
                            <div class="w-full">
                                <div id="print-area">
                                    <p style="text-align: center;">
                                        <b>BLOSSOM TREE HOME HEALTHCARE SERVICES LLC</b>
                                    </p>
                                    <p class="mt-5" style="text-align: center;">
                                        <b>LIST OF SERVICES PROVIDED</b>
                                    </p>

                                    <p class="mt-5">The team at Blossom Tree Home Healthcare Services LLC understands that in today’s tight economic times, saving money and using resources wisely is more important than ever. However, the client should carefully read through our list of services in accordance with his/her Physician Care plan.
                                    </p>

                                    <P class="mt-5">Full List of Services</P>
                                    <p class="mt-5">Your personal care assistant can provide you or a loved one with assistance, including but not limited to the following areas:</p>
                                    <p class="mt-5"><b>Select services applicable to you.</b></p>
                                    <ul>
                                        <li>•	Accompany on Walks</li>
                                        <li>•	Safety/Fall Protection</li>
                                        <li>•	Limited Transportation</li>
                                        <li>•	Accompany to Doctor Appointments</li>
                                        <li>•	Bathing</li>
                                        <li>•	Bed Making</li>
                                        <li>•	Companionship</li>
                                        <li>•	Dressing</li>
                                        <li>•	Dusting</li>
                                        <li>•	Eating</li>
                                        <li>•	Errands</li>
                                        <li>•	Grocery Shopping</li>
                                        <li>•	Grooming</li>
                                        <li>•	Hobbies</li>
                                        <li>•	Incontinence Care</li>
                                        <li>•	Laundry</li>
                                        <li>•	Meal Preparation</li>
                                        <li>•	Medication Reminders</li>
                                        <li>•	Mopping</li>
                                        <li>•	Oral Hygiene</li>
                                        <li>•	Organizing Incoming Mail</li>
                                        <li>•	Pet Care and Feeding</li>
                                        <li>•	Picking up Prescriptions</li>
                                        <li>•	Post Office Visits</li>
                                        <li>•	Recreational Activities</li>
                                        <li>•	Respite/Relief for Families</li>
                                        <li>•	Sweeping</li>
                                        <li>•	Taking out the Trash</li>
                                        <li>•	Toileting</li>
                                        <li>•	Transferring and Positioning</li>
                                        <li>•	Vacuuming</li>
                                        <li>•	Washing Dishes</li>
                                        <li>•	Walking and Mobility</li>
                                    </ul>
                                    <p class="mt-5">I <i><b> {{ ucfirst($user->firstname) . ' ' . ucfirst($user->lastname) }}</b></i> have had full opportunity to read and consider the list of services and content of this form and your privacy practices. I understand that by signing this consent form, I am giving Blossom Tree Home Healthcare Services LLC my consent to provide the services that I have selected to carry out the services and I will provide payments for the services and care operations agreed upon from the date of my signature.</p>
                                    <p class="mt-5">Signature of Client or legal representative: </p>
                                    <img src="{{ asset('signatures/' . Crypt::decryptString($services->client_legal_signature)) }}" alt="Signature">
                                    <p class="mt-5">Date: <i> {{ Crypt::decryptString($services->client_legal_date) }} </i></p>

                                    <p>Representative’s Name: <i> {{ $services->clients_rep_name ? Crypt::decryptString($services->clients_rep_name) : '' }} </i> </p>
                                    <p>Relation to Client: <i> {{ $services->relation_to_client ? Crypt::decryptString($services->relation_to_client) : '' }} </i> </p>
                                    
                                    <div class="mt-7">
                                    Blossom Tree Home Healthcare Services LLC representative: <br><br>
                                    Name ____________________________________________<br><br>
                                    Signature _________________________________________<br><br>
                                    Date ___________________________<br>

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


