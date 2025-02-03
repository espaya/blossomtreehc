   
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
                                <p class="mt-5" style="text-align: center;">DISCRIMINATION BYE LAWS</p>
                                <p class="mt-5" style="text-align: center;">
                                    <b>Notice Informing Individuals About Nondiscrimination and Accessibility Requirements and Non-discrimination Statement</b>
                                </p>
                                <p class="mt-5" style="text-align: center; color: red; font-size:large">
                                    <b>Discrimination is Against the Law</b>
                                </p>

                                <p class="mt-5">Blossom Tree Home Healthcare Services LLC complies with applicable Federal civil rights laws and does not discriminate based on race, color, national origin, age, disability, or sex.  Blossom Tree Home Healthcare Services LLC does not exclude people or treat them differently because of race, color, national origin, age, disability, or sex.</p>

                                <p class="mt-5">Blossom Tree Home Healthcare Services LLC</p>
                                <ul>
                                    <li>• Provides free aids and services to people with disabilities to communicate effectively with us, such as:
                                        <ul>
                                            <li>i.	Qualified sign language interpreters</li>
                                            <li>ii.	Written information in other formats (large print, audio, accessible electronic formats, other formats)</li>

                                        </ul>
                                    </li>
                                    <li>• Provides free language services to people whose primary language is not English, such as:
                                        <ul>
                                            <li>i.	Qualified interpreters</li>
                                            <li>ii.	Information written in other languages.</li>
                                        </ul>
                                    </li>
                                </ul>
                                <p class="mt-5">If you need these services, contact: Stephen Asamoah If you believe that Blossom Tree Home Healthcare Services LLC has failed to provide these services or discriminated in another way based on race, color, national origin, age, disability, or sex, you can file a grievance with:</p>
                                <p style="font-style:italic" class="mt-5">
                                    Stephen Asamoah<br>
                                    Chief Operating Officer-Civil Rights Coordinator<br>
                                    3908 Bardstown Road <br>
                                    Louisville KY 40218 <br>
                                    502-418-4629<br>
                                </p>

                                <p class="mt-5">You can file a grievance in person or by mail, fax, or email. If you need help filing a grievance, <b>Stephen Asamoah, The Civil Rights Coordinator is available to help you. </b></p>

                                <p class="mt-5">You can also file a civil rights complaint with the U.S. Department of Health and Human Services, Office for Civil Rights, electronically through the Office for Civil Rights Complaint Portal, available at <a href="https://ocrportal.hhs.gov/ocr/portal/lobby.jsf" target="_blank" style="text-decoration: underline;">https://ocrportal.hhs.gov/ocr/portal/lobby.jsf</a>, or by mail or phone at:</p>

                                <p style="font-style: italic;" class="mt-5">
                                    U.S. Department of Health and Human Services<br>
                                    200 Independence Avenue, SW<br>
                                    Room 509F, HHH Building<br>
                                    Washington, D.C. 20201 <br>
                                    1-800-368-1019, 800-537-7697 (TDD)
                                </p>

                                <p class="mt-5">Complaint forms are available at <a href="https://www.hhs.gov/ocr/office/file/index.html" target="_blank" style="text-decoration: underline;">http://www.hhs.gov/ocr/office/file/index.html</a> </p>


                                <div class="block-button md:mt-7 mt-4">
                                    <!-- <button class="button-main">Submit</button> -->
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


