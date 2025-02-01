
<!DOCTYPE html>
<html lang="en">
    @include('templates/head') 

    <body>
        @include('templates/header') 
        <div style="margin-top: -50px !important;" class="my-account-block ass">
            <div class="my-account-block md:py-20 py-10;" style=" width: 100%; height: 100%; background-color: rgba(255, 255, 255, 0.9); ">
            <div class="container">
                <div class="content-main lg:px-[60px] md:px-4 flex gap-y-8 max-md:flex-col w-full">
                    @include('admin/menu/admin_menu')
                    <div class="right xl:w-2/3 md:w-7/12 w-full xl:pl-[40px] lg:pl-[28px] md:pl-[16px] flex items-top">
                    <div class="text-content w-full">
                        @if(session('success'))
                        <p style="color: green; margin-bottom: 20px"> {{ session('success') }} </p>
                        @endif
                            <form action="{{ route('admin.update.service', ['id' => $service->id]) }}" method="post" enctype="multipart/form-data" class="">
                                @csrf
                                @method('POST')
                                <div class="heading5 pb-4">Service</div>
                                <div class="grid sm:grid-cols-2 gap-4 gap-y-5">
                                    <div class="first-name">
                                        <input name="title" value="{{ $service->title }}" class="border-line px-4 pt-3 pb-3 w-full rounded-lg" id="title" type="text" autocomplete="off" placeholder="Service title">
                                        @error('title')
                                        <p style="color:red"> {{ $message }} </p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="block-button lg:mt-10 mt-6">
                                    <button style="text-transform: capitalize;" class="button-main">Add Service</button>
                                </div>
                            </form>
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

