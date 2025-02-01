
<!DOCTYPE html>
<html lang="en">
@include('templates/head')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <body>
        @include('templates/header') 
        <div style="margin-top: -50px !important;" class="my-account-block ass">
        <div class="my-account-block md:py-20 py-10;" style=" width: 100%; height: 100%; background-color: rgba(255, 255, 255, 0.9); ">
            <div class="container">
                <div class="content-main lg:px-[60px] md:px-4 flex gap-y-8 max-md:flex-col w-full">
                    @include('admin/menu/admin_menu')
                    <div class="right xl:w-2/3 md:w-7/12 w-full xl:pl-[40px] lg:pl-[28px] md:pl-[16px] flex items-top">
                        <!-- Add information here -->
                        <div class="tab-question flex flex-col gap-5 active" data-item="how-to-buy">
                            <!-- Add more question-items here -->
                            <div class="card" style="width: 100% !important">
                                <div class="card-header">
                                {{ ucfirst($applicant->firstname) . ' ' . ucfirst($applicant->lastname) }}
                                </div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">{{ $applicant->email}}</li>
                                    <li class="list-group-item">{{ $applicant->phone }}</li>
                                    <li class="list-group-item">{{ ucfirst($applicant->position) }}</li>
                                    <li class="list-group-item">
                                        <a href="{{ asset('storage/resumes/' . $applicant->resume) }}" title="Download resume" download>{{ $applicant->resume}}</a>
                                    </li>
                                    <li class="list-group-item">{{ $applicant->message}}</li>
                                </ul>
                            </div>
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

