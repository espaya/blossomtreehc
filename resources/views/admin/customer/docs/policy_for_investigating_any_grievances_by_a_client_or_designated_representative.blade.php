    
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
                        @if($policy && $policy->isNotEmpty())
                            @forelse($policy as $policy)
                            <div class="w-full">
                                <p style="text-align: center;">
                                    <b>BLOSSOM TREE HOME HEALTHCARE SERVICES LLC</b>
                                </p>
                                <p class="mt-5" style="text-align: center;">
                                    <b>POLICY FOR INVESTIGATING ANY GRIEVENCES BY A CLIENT OR DESIGNATED REPRESENTITIVE</b>
                                </p>

                                <p class="mt-5">Your complaints or problems are important to the Agency. We will consider a problem or complaint and try to resolve the issue in an agreeable manner. We assure you that you will have the opportunity to voice grievances and recommend changes in services and/or policies without discrimination, coercion, reprisal, or unreasonable interruption of services or in any manner from the Agency. If you have a complaint, please submit the complaint either verbally or in writing to the Agency Manager or Supervisor or designee. If you call after normal business hours, you will be contacted by the Agency manager on the next business day. The Agency Manager or Supervisor designee will contact you or your representative and will make every effort to resolve the complaint to your satisfaction. They will document all activities Involved with the grievance/complaint/concern, investigation, analysis, and resolution. You will be notified of the Agency Manager’s decision within ten (10) days. If the complaint cannot be resolved to your satisfaction, you may request that the Agency managers submit your complaint to the Agency’s Governing Body.
                                </p>

                                <p class="mt-5"><b>Client Grievance Plan and Procedure</b></p>

                                <p class="mt-5">Blossom Tree Home Healthcare Services LLC shall develop and implement a written client grievance mechanism plan that shall include, but not be limited to the following:</p>

                                <p class="mt-5">
                                (1)	Shall employ a client care advocate that serves as a liaison between the client and Blossom Tree Home Healthcare Services LLC. The plan shall describe:<br>
                                    •	The qualifications, job description, and level of decision-making authority of the client care advocate.<br>
                                    •	How each client will be made aware of the client grievance mechanism and how the client care advocate may be contacted.<br>
                                    •	The process of receiving and investigating a client’s grievance in situations when the client care advocate is not available or is the subject of grievance.<br>
                                </p>

                                <p class="mt-5">
                                    (2) The facility or agency shall implement a grievance procedure with, at minimum, the following components:<br>

                                    •	The ability for clients to submit grievances, either orally or in writing, to a facility or agency staff member. If the grievance is submitted to a staff member other than the client care advocate, the staff member shall submit grievance to the client care advocate by the next working day.<br>
                                    •	Prior to initiating an investigation, the client care advocate shall contact the client within three (3) working days of receipt of the grievance to acknowledge receipt of such grievance.<br>
                                    •	The client care advocate shall investigate the grievance and respond to the client in writing within fifteen (15) business days of submission of grievance.<br>
                                    •	The client care advocate shall provide the client with a final, written outcome of the investigation within a reasonable time, not to exceed thirty (30) calendar days following the client care advocate receipt of the grievance.
                                </p>

                                <p class="mt-5">
                                    (3) A means to inform the client regarding how to lodge a grievance and that the facility or agency encourages clients to speak out and to present grievances without fear of retribution.<br>
                                    (4) A requirement that new employees be trained regarding the grievance mechanism plan and that all staff with direct client contact be briefed at least annually regarding the plan.<br>
                                    (5) How clients will be informed that interpretation and translation services are available regarding the grievance procedure for clients unable to understand or read English and how language assistance services will be provided. Please be advised that you may lodge complaints with the State of Kentucky Department of Health hotline number (877) 597-2331.</p>

                                <p class="mt-5">
                                    Client or Clients’ Representative Name: <i>{{ Crypt::decryptString($policy->clients_rep_name) }}</i> <br>
                                    Date: <i> {{ Crypt::decryptString($policy->clients_rep_date) }} </i> </p>

                                
                                <p class="mt-5">
                                    Hotlines to Report any Abuse in the State of Kentucky<br>
                                    General Info<br>
                                    (800) 372-2973<br>
                                    Child/Adult Abuse<br>
                                    1-877-KYSAFE1/ (877) 597-2331<br><br>

                                    kynect<br>
                                    (855) 306-8959<br>
                                    Adoption/Foster Care<br>
                                    (800) 232-KIDS<br>
                                    Child Support<br>
                                    (800) 248-1163<br>
                                    Drug/Alcohol Use<br>
                                    (800) 221-0446<br><br>
                                    QUIT NOW (Tobacco Products)<br>
                                    (800) 784-8669<br>
                                    Vital Statistics<br>
                                    (502) 564-4212<br>
                                    National Domestic Violence Hotline<br>
                                    (800) 799-7233<br><br>
                                    If you are unable to speak safely, visit the hotline online.
                                    or text LOVEIS to (866) 331-9475
                                    Nations Sexual Assault Hotline
                                    RAINN (Rape, Abuse, and Incest National Network)
                                    (800) 656-HOPE (4673). Calls are routed to local providers 24/7.
                                    You also can access RAINN services online
                                </p>
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
    </body>
</html>
<style>
    .ass{
        background: url('{{ asset("assets/images/caregiver.jpg") }}') no-repeat center center; background-size: cover; position: relative;
    }
</style>


