
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
                    <div class="right xl:w-2/3 md:w-7/12 w-full xl:pl-[40px] lg:pl-[28px] md:pl-[16px] flex items-top">
                    <div class="text-content w-full">
                        @if(session('success'))
                        <p style="color: green; margin-bottom: 20px"> {{ session('success') }} </p>
                        @endif 
                        @if(session('error'))
                        <p style="color: green; margin-bottom: 20px"> {{ session('error') }} </p>
                        @endif 
                        <div class="left xl:w-3/4 md:w-2/3 pr-2">
                            <div class="list-blog flex flex-col md:gap-10 gap-8" data-item="3">

                            <!-- <div class="list-img flex flex-col gap-[10px] md:pt-20 pt-10"> -->
                                    
                                <!-- </div> -->

                                <!-- Blog Items -->
                                <div class="list-img flex flex-col gap-[10px] md:pt-20 pt-10">
                                @forelse($customServices as $customService)
                                        <form action="{{ route('customUnsubscribe') }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <input name="id" hidden value="{{ $customService->id }}" type="text">
                                            <button title="Unsubscribe to this custom service">
                                                <div class="bg-img">
                                                    <div class="flex justify-between">
                                                        <div class="flex items-center">
                                                            <input checked name="{{ $customService->myCustomService }}" value="{{ $customService->myCustomService }}" class="border-line px-4 pt-3 pb-3 rounded-lg" id="title" type="checkbox">
                                                            <div class="product-name heading8 mt-1 ml-2"> {{ $customService->myCustomService }} </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </button>
                                        </form>
                                    @empty 
                                    @endforelse
                                    <br>
                                    @forelse($myServices as $myService)
                                        <form action="{{ route('unsubscribe') }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <input name="id" hidden value="{{ $myService[0]->id }}" type="text">
                                            <button title="Unsubscribe to this service">
                                                <div class="bg-img">
                                                    <div class="flex justify-between">
                                                        <div class="flex items-center">
                                                            <input checked name="{{ $myService[0]->title }}" value="{{ $myService[0]->title }}" class="border-line px-4 pt-3 pb-3 rounded-lg" id="title" type="checkbox">
                                                            <div class="product-name heading8 mt-1 ml-2"> {{ $myService[0]->title }} </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </button>
                                        </form>
                                    @empty 
                                        
                                    @endforelse
                                </div>
                                @if(empty($customService) && empty($myService))
                                    <div class="heading8">No service(s) added. <a href="{{ route('view.service') }}"><u>Click here</u></a> to add a service.</div>
                                @endif
                                <div class="list-pagination w-full flex items-center justify-center gap-4 md:mt-10 mt-6"></div>
                            </div>
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
