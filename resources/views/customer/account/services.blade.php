
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
                    <div class="right xl:w-2/3 md:w-7/12 w-full xl:pl-[40px] lg:pl-[28px] md:pl-[16px] flex items-">
                    <div class="text-content w-full">
                        @if(session('success'))
                        <p style="color: green; margin-bottom: 20px"> {{ session('success') }} </p>
                        @endif
                        @if(session('error'))
                        <p style="color: red; margin-bottom: 20px"> {{ session('error') }} </p>
                        @endif
                        <div class="left xl:w-3/4 md:w-2/3 pr-2">

                            <div class="list-blog flex flex-col md:gap-10 gap-8" data-item="3">
                                <div class="list-img grid grid-cols-1 gap-[10px] md:pt-20 pt-10">
                                    <form action="{{ route('myCustomService.save') }}" method="post">
                                        @csrf
                                        <label class="pl-2 cursor-pointer" for="">Add your own service here</label><br><br>
                                        <div class="flex items-center gap-4">
                                            <div class="email flex-grow">
                                                <input value="{{ old('myCustomService') }}" name="myCustomService" class="border-line px-4 pt-3 pb-3 w-full rounded-lg" id="myCustomService" type="text" autocomplete="off">
                                                @error('myCustomService')
                                                <p style="color: red;"> {{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="block-button">
                                                <button class="button-main">Add</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>


                        <div class="list-blog flex flex-col md:gap-10 gap-8" data-item="3">
                            <!-- Blog Items -->
                            <div class="list-img grid grid-cols-1 gap-[10px] md:pt-20 pt-10">
                                @forelse($services as $service)
                                    <form action="{{ route('subscribe') }}" method="post">
                                        @csrf
                                        <input name="serviceID" value="{{ $service->id }}" hidden type="text">
                                        <button type="submit" title="Add to my services">
                                            <div class="bg-img">
                                                <div class="flex justify-between">
                                                    <div class="flex items-center">
                                                        <input name="{{ $service->title }}" value="{{ $service->title }}" class="border-line px-4 pt-3 pb-3 rounded-lg" id="title" type="checkbox">
                                                        <div class="product-name heading8 mt-1 ml-2"> {{ $service->title }} </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </button>
                                    </form>
                                @empty 
                                    <p class="heading4">No Services Found</p>
                                @endforelse
                            </div>

                            <div class="list-pagination w-full flex items-center justify-center gap-4 md:mt-10 mt-6">
                            {{ $services->links() }}
                            </div>
                        
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

