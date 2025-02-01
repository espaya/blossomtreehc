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
                        <div class="text-content w-full">
                            @if(session('success'))
                            <p style="color: green; margin-bottom:50ox"> {{ session('success') }} </p>
                            @endif
                            @if(session('error'))
                            <p style="color: red; margin-bottom:50ox"> {{ session('error') }} </p>
                            @endif
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Full Name</th>
                                            <th scope="col">Phone</th>
                                            <th scope="col">Position</th>
                                            <th scope="col">Resume</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($career as $job)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>
                                                <a title="View {{ $job->firstname . ' ' . $job->lastname }}" href="{{ route('career.single', ['id' => $job->id]) }}">{{ $job->firstname . ' ' . $job->lastname }}</a>
                                            </td>
                                            <td>{{ $job->phone }}</td>
                                            <td>{{ $job->position }}</td>
                                            <td><a title="Download resume" href="{{ asset('storage/resumes/' . $job->resume) }}" download="">{{ $job->resume }}</a></td>
                                            <td>
                                                <form action="{{ route('career.delete', ['id' => $job->id]) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button title="Delete" type="submit" class="btn btn-danger"> 
                                                        <i class="ph ph-trash text-sm"></i>
                                                    </button>
                                                </form>
                                                <form action="{{ route('career.restore') }}" method="post">
                                                    @csrf
                                                    <input name="restore" value="{{ $job->id }}" type="text" hidden>
                                                    @method('PATCH')
                                                    <button title="Move to career" type="submit" class="btn btn-info"> 
                                                        <i class="ph ph-recycle text-sm"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="9" class="text-center" style="color: red;">No Archives Available</td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                            <div class="list-pagination w-full flex items-center justify-center gap-4 md:mt-10 mt-6">
                                {{ $career->links() }} <!-- This generates the pagination links -->
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
