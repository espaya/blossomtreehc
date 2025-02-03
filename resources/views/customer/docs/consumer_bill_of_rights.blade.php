 
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
                                <p style="text-align: center;">CONSUMER BILL OF RIGHTS</p>
                                <br>
                                <p>It is anticipated that observance of these rights and responsibilities will contribute to more effective care and greater satisfaction for the consumer as well as the staff. The rights will be respected by all personnel and integrated into all Home Care program. A copy of these rights will be given to consumers and their families or designated representative. The consumer or his/her designated representative has the right to exercise these rights. In the case of a consumer adjudged incompetent, the rights of the consumer are exercised by the person appointed by law to act on the consumer’s behalf. In the case of a consumer who has not been judged incompetent. Any legal representative may exercise the consumer’s rights to the extent permitted by law.</p><br>

                                <p>The Consumer has the right:</p>
                                <p>
                                    1.	The client has the right to have the client’s property treated with respect, <br><br>
                                    2.	The client has the right to request a change in his or her service plan, including the temporary suspension, permanent termination, temporary addition, or permanent addition of any service,<br><br>
                                    3.	The client has the right to file a grievance as services, employee conduct, or the lack of respect for property and not be subject to discrimination or reprisal for filing the grievance,<br><br>
                                    4.	The client has the right to be free from verbal, physical, and psychological abuse and to be treated with dignity,<br>
                                    5.	To be fully informed and knowledgeable of all rights and responsibilities before providing preplanned care and to understand that these rights can be exercised at any time.<br><br>
                                    6.	To appropriate and professional care relating to physician orders.<br><br>
                                    7.	To choose a health care provider.<br><br>
                                    8.	To request services from the Home Care Agency of their choice and to request full information from their agency before care is given concerning services provided, alternatives available licensure and accreditation requirements, organization ownership and control.<br><br>
                                    9.	To be informed in advance about the care to be furnished and of any changes in the care to be furnished before the change is made.<br><br>
                                    10.	To be informed of the disciplines that will furnish care, and the frequency of visits proposed to be furnished and to know that they are cared for by individuals who are properly trained and to perform their duties completely.<br><br>
                                    11.	To give information necessary to give informed consent prior to the start of any procedure or treatment and any changes to be made.<br><br>
                                    12.	To participate in the development and periodic revision of the plan of care/service.<br><br>
                                    13.	To access their consumer record and confidentiality and privacy of all information contained in the consumer record and of Protected Health Information according to HIPAA, Federal and State requirements.<br><br>
                                    14.	To information necessary to refuse treatment within the confines of the law and to be informed. of the consequences.<br><br>
                                    15.	To have his/her property and person treated with respect, consideration, and recognition of consumer dignity and individually.<br><br>
                                    16.	To receive and access services consistently and in a timely manner from the agency to his/her request for service.<br><br>
                                    17.	To be admitted to service only if the agency can provide safe professional care at the level of intensity needed and to be informed of the agency's limitations.<br><br>
                                    18.	To reasonable continuity of care.<br><br>
                                    19.	To an individualized plan of care and teaching plan developed by the entire health team including the consumer and/or family.<br><br>
                                    20.	To be informed of consumer rights under state law to formulate advanced care directives.<br><br>
                                    21.	To be informed of anticipated outcomes of service/care and of any barriers in outcome achievement.<br><br>
                                    22.	To be informed of consumer rights regarding the collection of information.<br><br>
                                    23.	To expect confidentiality of the access to medical records according to HIPAA, Federal and<br><br>
                                    24.	To receive at least 10 calendar days, advance written notice of the intent of the home care agency to terminate services. Less than 10 days advance written notice may be provided in the event the consumer has failed to pay for services, despite notice, and the consumer is more than 14 days in arrears, or if the health and welfare of the direct care worker is at risk. Written notice must include the reason for termination/transfer.<br><br>
                                    25.	To be informed that no individual, because of the individual’s affiliation with the home care agency, may assume power of attorney or guardianship over a consumer utilizing the services of the home care agency. The home care agency may not require the consumer to endorse checks over to the home care agency.<br><br>
                                        <ul>
                                            <li>•	To be informed verbally and in writing and before care is initiated of the organization's billing. policies and payment procedures and the extent to which:</li>
                                            <li>•	Payment may be expected from any federally funded or aided program known to the organization.</li>
                                            <li>•	Charges for services that will not be covered by payers.</li>
                                            <li>•	Charges that the individual may have to pay.</li>
                                            <li>•	To be able to identify visiting staff members through proper identification.</li>

                                        </ul>
                                </p>
                                <br>

                                <p>
                                    26.	To be informed orally and in writing of any changes in payment information as soon as possible, but no later than 30 days from the date that the organization becomes aware of the change.<br><br>
                                    27.	To be honest, accurate, forthright information, regarding the home care industry in general and his/her chosen agency, including cost per visit, employee qualifications, names, and titles of personnel, etc.<br><br>
                                    28.	To access necessary professional services 24 hours a day, 7 days a week.<br><br>
                                    29.	To be referred to another agency if he/she is dissatisfied with the agency, or the agency cannot meet the consumer's needs.<br><br>
                                    30.	To receive disclosure information regarding any beneficial relationship the organization has that may result in profit for the referring organization.<br><br>
                                    31.	To education, instruction, and a list of requirements for continuity of care when the services of the agency are terminated.<br><br>
                                    32.	To be free of physical and mental abuse, neglect and exploitation of any kind including employees, volunteers, and contractors.<br><br>
                                    33.	To privacy to maintain his/her personal dignity and respect.<br><br>
                                    34.	To know that the agency has liability insurance sufficient for the needs of the agency.<br><br>
                                    35.	To be advised that the agency complies with Subpart 1 of 42 CFR 489 and receives a copy of the organization's written policies and procedures regarding advance directives, including a description of an individual's right under applicable state law and to know that the Agency will honor the advance directives in providing care.<br><br>
                                    36.	To receive advance directives information prior to or at the time of the first home visit, if the information is furnished before care is provided and to know that be used to lodge complaints regarding the implementation of the Advance. Directive requirement.<br><br>
                                    37.	To voice grievances regarding treatment or care that is (or fails to be) furnished or regarding the lack of respect of property or recommend changes in policy, staff, or service/care without restraint, interference, coercion, discrimination, or reprisal and to know that grievances will be resolved, and the consumer notified of the resolution within 10 days.<br><br>
                                    38.	To be advised of the names, addresses and telephone numbers of the Ombudsman program and <br><br>
                                    39. To not be denied equal opportunity because they or their family are from another country, because they have a name or accent associated with a national origin group because they participate in certain customs associated with a nation origin group or because they are married to or associate with people of a certain national group to contact the Cabinet by phone, call the Office of the Ombudsman toll free at (800) 372-2973, TTY for hearing impaired (800) 627-4702.
                                </p><br>

                                <p>Client’s signature ___________________________     </p>                     
                                <p>Client’s name (Print) First: <u> {{ ucfirst($user->firstname) }} </u> </p>  
                                <p>Last: <u> {{ ucfirst($user->lastname) }} </u> </p>
                                <p>Date: <u>{{ date('F j, Y') }}</u> </p>

                                <br>
                                <b>OR</b>
                                <br>

                                <p>Client’s representative Signature ___________________________ </p>                      
                                <p>Client’s representative Name (Print) First Name: ___________________________   </p>        
                                <p>Last Name: _________________________ </p>
                                <p>Date: {{ date('F j, Y') }}</p>
                                

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


