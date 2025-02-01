
<!DOCTYPE html>
<html lang="en">
    @include('templates/head')

    <body>
        @include('templates/header') 
        <div style="margin-top: -50px !important;" class="my-account-block ass">
        <div class="my-account-block md:py-20 py-10;" style=" width: 100%; height: 100%; background-color: rgba(255, 255, 255, 0.9); "><div style="margin-top: -50px !important;" class="my-account-block md:py-20 py-10">
            <div class="container">
                <div class="content-main lg:px-[60px] md:px-4 flex gap-y-8 max-md:flex-col w-full">
                    @include('customer/menu/menu')
                    <div class="right xl:w-2/3 md:w-7/12 w-full xl:pl-[40px] lg:pl-[28px] md:pl-[16px] flex items-start justify-center">
                        <div class="w-full">
                            <ul class="pl-5 text-left space-y-2">
                                <li>☛ <a href="#" class="text-blue-600 hover:underline">Advanced Directive Acknowledgment - HIPAA Home Care Privacy Rights</a></li>
                                <li>☛ <a href="#" class="text-blue-600 hover:underline">Authorization Agreement And Acknowledgment</a></li>
                                <li>☛ <a href="#" class="text-blue-600 hover:underline">Authorization For Use And Disclosure of Protected Health Information</a></li>
                                <li>☛ <a href="#" class="text-blue-600 hover:underline">Charges For Services</a></li>
                                <li>☛ <a href="#" class="text-blue-600 hover:underline">Confidentiality Policy</a></li>
                                <li>☛ <a href="#" class="text-blue-600 hover:underline">Consent For Services And Financial Agreement</a></li>
                                <li>☛ <a href="#" class="text-blue-600 hover:underline">Consumer Bill of Rights</a></li>
                                <li>☛ <a href="#" class="text-blue-600 hover:underline">Consumer Emergency And Contact Information</a></li>
                                <li>☛ <a href="#" class="text-blue-600 hover:underline">Contract Form Amended 2024</a></li>
                                <li>☛ <a href="#" class="text-blue-600 hover:underline">Contractor Bio Review</a></li>
                                <li>☛ <a href="#" class="text-blue-600 hover:underline">Discrimination Bye Laws</a></li>
                                <li>☛ <a href="#" class="text-blue-600 hover:underline">HIPAA</a></li>
                                <li>☛ <a href="#" class="text-blue-600 hover:underline">List of Services Provided</a></li>
                                <li>☛ <a href="#" class="text-blue-600 hover:underline">Policy For Investigating Any Grievances By a Client or Designated Representative</a></li>
                                <li>☛ <a href="#" class="text-blue-600 hover:underline">Reporting Patient Abuse And Neglect</a></li>
                            </ul>
                        </div>
                    </div>


                </div>
            </div>
        </div>

        @include('templates/footer')

        <a class="scroll-to-top-btn" href="#top-nav"><i class="ph-bold ph-caret-up"></i></a>

        <script src="{{asset('assets/js/phosphor-icons.js')}}"></script>
        <script src="{{asset('assets/js/swiper-bundle.min.js')}}"></script>
        <script src="{{asset('assets/js/main.js')}}"></script>
    </body>
</html>
<style>
    .ass{
        background: url('{{ asset("assets/images/caregiver.jpg") }}') no-repeat center center; background-size: cover; position: relative;
    }
</style>


