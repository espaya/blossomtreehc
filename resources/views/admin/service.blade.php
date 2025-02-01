
<!DOCTYPE html>
<html lang="en">
    @include('templates/head')

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>


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

                        @if(session('error'))
                        <p style="color: red; margin-bottom: 20px"> {{ session('error') }} </p>
                        @endif

                        <div class="left xl:w-3/4 md:w-2/3 pr-2">
                        <div class="list-blog flex flex-col md:gap-10 gap-8" data-item="3">
                            <!-- Blog Items -->
                            <div class="table-responsive mt-6">
                                <table class="table table-bordered table-hover">
                                    <thead class="thead-light">
                                        <tr>
                                            <th scope="col" class="align-middle">Service Title</th>
                                            <th scope="col" class="align-middle">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($services as $service)
                                            <tr>
                                                <td class="align-middle">
                                                    <span class="fw-medium">{{ ucfirst($service->title) }}</span>
                                                </td>
                                                <td class="align-middle">
                                                    <a
                                                        href="{{ route('admin.edit.service', ['id' => $service->id]) }}"
                                                        class="btn btn-sm btn-primary me-2"
                                                        title="Edit {{ $service->title }}"
                                                    >
                                                        Edit
                                                    </a>
                                                    <form action="{{ route('admin.delete.service', ['id' => $service->id]) }}" method="POST" class="d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger" title="Delete {{ $service->title }}">
                                                            Delete
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="3" class="text-center text-muted">
                                                    No Services Found
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>

                            <div class="list-pagination w-full flex items-center justify-center gap-4 md:mt-10 mt-6">
                                {{ $services->links() }} <!-- This generates the pagination links -->
                            </div>
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

