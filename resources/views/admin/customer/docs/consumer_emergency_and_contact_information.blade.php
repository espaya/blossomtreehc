  
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
                        @if($isAddress && $isAddress->isNotEmpty())
                        @if($consumer_emergency && $consumer_emergency->isNotEmpty())
                            @forelse($consumer_emergency as $consumer)
                            <div class="w-full">
                                <div id="print-area">
                                    <p style="text-align: center;">BLOSSOM TREE HOME HEALTHCARE SERVICES LLC</p>
                                    <p style="text-align: center;">CONSUMER EMERGENCY AND CONTACT INFORMATION</p>
                                    <br>
                                    <div>
                                        <p>Consumer Name: {{ ucfirst($user->firstname . ' ' . $user->lastname ) }}</p>
                                        <p>SOC: {{ Crypt::decryptString($consumer->soc) }}</p>

                                        @if($isAddress && $isAddress->isNotEmpty())
                                            @forelse($isAddress as $address)
                                                <P>Address: {{ $address->address }}</P>
                                                <P>City: {{ $address->city }}</P>
                                                <P>State: {{ $address->state }}</P>
                                                <P>Zip: {{ $address->zip }}</P>
                                            @empty 
                                            @endforelse
                                        @endif
                                        <p>Telephone Number: {{ Crypt::decryptString($consumer->telephone) }}</p>
                                        <p>Cell Phone: {{ Crypt::decryptString($consumer->cell_phone) }}</p>
                                        <p>Responsible Person's Name: {{ Crypt::decryptString($consumer->responsible_persons_name) }}</p>
                                        <p>Relationship: {{ Crypt::decryptString($consumer->relationship) }}</p>
                                        <p>Responsible Person's Home Phone: {{ Crypt::decryptString($consumer->responsible_person_home_telephone) }}</p>
                                        <p>Responsible Person's Work Phone: {{ Crypt::decryptString($consumer->responsible_person_work_phone) }}</p>
                                        <p>Responsible Person's Cell Phone: {{ Crypt::decryptString($consumer->responsible_person_cell_phone) }}</p>
                                    </div>

                                    <div class="mt-5">
                                        <p><b>Relative/Friend Not Living With You</b></p>
                                        <p>Name: {{ Crypt::decryptString($consumer->friend_relative_name) }}</p>
                                        <p>Relationship: {{ Crypt::decryptString($consumer->friend_relative_relationship) }}</p>
                                        <p>Home Telephone: {{ Crypt::decryptString($consumer->friend_relative_home_telephone) }}</p>
                                        <p>Work Phone: {{ Crypt::decryptString($consumer->friend_relative_work_phone) }}</p>
                                        <p>Cell Phone: {{ Crypt::decryptString($consumer->friend_relative_cell_phone) }}</p>
                                        <p>Primary Physician: {{ Crypt::decryptString($consumer->primary_physician) }}</p>
                                        <p>Telephone Number: {{ Crypt::decryptString($consumer->physician_telephone) }}</p>
                                    </div>

                                    <div class="mt-5">
                                        <p><b>NATURAL DISASTER EMERGENCY PLAN</b></p>
                                        <p>Class I – Consumers with life threatening conditions that require ongoing medical treatment or a medical device to sustain life.</p><br>
                                        <p>Class II – Consumers with the greatest need for care will be as soon as possible. Consumers requiring daily insulin injections, IV medications, sterile wound care for a wound with a large amount of drainage.</p><br>
                                        <p>Class III – Services could be postponed 24-48hours without adverse effects. Diabetic consumers can self-inject, sterile wound care to a wound with minimal amount or not drainage.</p><br>
                                        <p>Class IV – Service could be postponed 72-96 hours without adverse effects. Postoperative with no wound, routine catheter changes or discharge within 10-14 days.</p>
                                    </div>                                    
                                </div>
                                <button id="print-button" class="button-main mt-10">Print / Export PDF</button>
                            </div> 
                            @empty 
                            @endforelse
                        @endif
                        @else 
                            <h5>Please fill your <a href="{{ route('my.address') }}"><u>address</u></a> before you can complete this form</h5>
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


