
<!DOCTYPE html>
<html lang="en">
    @include('templates/head')

    <body>
        @include('templates/header') 
        <div style="margin-top: -50px !important;" class="my-account-block ass">
        <div class="my-account-block md:py-20 py-10;" style=" width: 100%; height: 100%; background-color: rgba(255, 255, 255, 0.9); "><div style="margin-top: -50px !important;" class="my-account-block md:py-20 py-10">
            <div class="container">
                <div class="content-main lg:px-[60px] md:px-4 flex gap-y-8 max-md:flex-col w-full">
                    @include('admin/menu/admin_menu')
                    <div class="right xl:w-2/3 md:w-7/12 w-full xl:pl-[40px] lg:pl-[28px] md:pl-[16px] flex items-start justify-center">
                        <div class="w-full">
                            <ul class="pl-5 text-left space-y-2">

                            @if($advance_directive && $advance_directive->isNotEmpty())
                                <li>☛ <a target="_blank" href="{{ route('admin.customer.advance.directive', ['id' => $customer->id, 'docID' => $advance_directive[0]['id']]) }}" class="text-blue-600 hover:underline">Advanced Directive Acknowledgment - HIPAA Home Care Privacy Rights</a></li>
                            @endif

                            @if($authorization_agreement && $authorization_agreement->isNotEmpty())
                                <li>☛ <a target="_blank" href="{{ route('admin.customer.authorization.agreement', ['id' => $customer->id, 'docID' => $authorization_agreement[0]['id'] ]) }}" class="text-blue-600 hover:underline">Authorization Agreement And Acknowledgment</a></li>
                            @endif 

                            @if($authorization_for_use && $authorization_for_use->isNotEmpty())
                                <li>☛ <a target="_blank" href="{{ route('admin.customer.authorization.for.use', ['id' => $customer->id, 'docID' => $authorization_for_use[0]['id'] ]) }}" class="text-blue-600 hover:underline">Authorization For Use And Disclosure of Protected Health Information</a></li>
                            @endif

                            @if($charges_for_services && $charges_for_services->isNotEmpty())                            
                                <li>☛ <a target="_blank" href="{{ route('admin.customer.charges.for.services', ['id' => $customer->id, 'docID' => $charges_for_services[0]->id]) }}" class="text-blue-600 hover:underline">Charges For Services</a></li>
                            @endif

                            @if($consent_for_services && $consent_for_services->isNotEmpty())
                                <li>☛ <a target="_blank" href="{{ route('admin.customer.consent.for.services', ['id' => $customer->id, 'docID' => $consent_for_services[0]['id'] ]) }}" class="text-blue-600 hover:underline">Consent For Services And Financial Agreement</a></li>
                            @endif

                            @if($consumer_bill_of_right && $consumer_bill_of_right->isNotEmpty())
                                <li>☛ <a target="_blank" href="{{ route('admin.customer.consumer.bill', ['id' => $customer->id, 'docID' => $consumer_bill_of_right[0]['id'] ]) }}" class="text-blue-600 hover:underline">Consumer Bill of Rights</a></li>
                            @endif

                            @if($consumer_emergency && $consumer_emergency->isNotEmpty())
                                <li>☛ <a target="_blank" href="{{ route('admin.customer.consumer.emergency', ['id' => $customer->id, 'docID' => $consumer_emergency[0]['id'] ]) }}" class="text-blue-600 hover:underline">Consumer Emergency And Contact Information</a></li>
                            @endif

                                <!-- <li>☛ <a target="_blank" href="#" class="text-blue-600 hover:underline">Discrimination Bye Laws</a></li> -->
                            @if($hippa && $hippa->isNotEmpty())
                                <li>☛ <a target="_blank" href="{{ route('admin.customer.hipaa', ['id' => $customer->id, 'docID' => $hippa[0]['id'] ]) }}" class="text-blue-600 hover:underline">HIPAA</a></li>
                            @endif

                            @if($list_of_services && $list_of_services->isNotEmpty())
                                <li>☛ <a target="_blank" href="{{ route('admin.customer.list.of.service', ['id' => $customer->id, 'docID' => $list_of_services[0]['id'] ]) }}" class="text-blue-600 hover:underline">List of Services Provided</a></li>
                            @endif

                            @if($policy_for_investigating && $policy_for_investigating->isNotEmpty())
                                <li>☛ <a target="_blank" href="{{ route('admin.customer.policy.for.investigating', ['id' => $customer->id, 'docID' => $policy_for_investigating[0]['id'] ]) }}" class="text-blue-600 hover:underline">Policy For Investigating Any Grievances By a Client or Designated Representative</a></li>
                            @endif 

                            @if($reporting_patient_abuse && $reporting_patient_abuse->isNotEmpty())
                                <li>☛ <a target="_blank" href="{{ route('admin.customer.reporting.patient.abuse', ['id' => $customer->id, 'docID' => $reporting_patient_abuse[0]['id'] ]) }}" class="text-blue-600 hover:underline">Reporting Patient Abuse And Neglect</a></li>
                            @endif
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


