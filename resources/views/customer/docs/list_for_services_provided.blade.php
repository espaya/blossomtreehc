   
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

                                <p class="mt-5">I <u><b> {{ ucfirst($user->firstname . ' ' . $user->lastname) }}</b></u> have had full opportunity to read and consider the list of services and content of this form and your privacy practices. I understand that by signing this consent form, I am giving Blossom Tree Home Healthcare Services LLC my consent to provide the services that I have selected to carry out the services and I will provide payments for the services and care operations agreed upon from the date of my signature.</p>

                                
                                <p class="mt-5">
                                    Signature of Client or legal representative: _________________________________________ <br>
                                    Date: <u> {{ date('F j, Y') }} </u><br>
                                    Representative’s Name _____________________________     <br>
                                    Relation to Client _________________________________ <br>

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


