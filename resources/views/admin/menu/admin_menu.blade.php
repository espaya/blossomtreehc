<div class="left xl:w-1/3 md:w-5/12 w-full xl:pr-[40px] lg:pr-[28px] md:pr-[16px]">
                        <div class="user-infor bg-surface md:px-8 px-5 md:py-10 py-6 md:rounded-[20px] rounded-xl">
                            <div class="heading flex flex-col items-center justify-center">
                                <div class="avatar">
                                    @if(!empty($user->img))
                                        <img src="{{asset('storage/profiles/' . $user->img)}}" alt="avatar" class="md:w-[140px] w-[120px] md:h-[140px] h-[120px] rounded-full">
                                    @else 
                                        <img src="{{asset('assets/images/my-user.png')}}" alt="avatar" class="md:w-[140px] w-[120px] md:h-[140px] h-[120px] rounded-full">
                                    @endif
                                </div>
                                <div class="name heading6 mt-4 text-center"> {{ ucfirst($user->firstname) . ' ' . ucfirst($user->lastname) }} </div>
                                <div class="mail heading6 font-normal normal-case text-center mt-1"> {{ $user->email }} </div>
                            </div>
                            <div class="menu-tab lg:mt-10 mt-6">
                            <div class="item px-5 py-2 flex items-center gap-3 cursor-pointer">
                                    <i class="ph-bold ph-house text-xl"></i>
                                    <form action="{{ route('admin') }}" class="heading8" method="get">
                                        <button class="heading8">Dashboard</button>
                                    </form>
                                </div>
                                <div class="item px-5 py-2 flex items-center gap-3 cursor-pointer">
                                    <i class="ph-bold ph-user text-xl"></i>
                                    <form action="{{ route('admin.customer') }}" class="heading8" method="get">
                                        <button class="heading8">Customers</button>
                                    </form>
                                </div>
                                <div class="item px-5 py-2 flex items-center gap-3 cursor-pointer mt-2">
                                    <i class="ph-bold ph-bag text-xl"></i>
                                    <form action="{{ route('admin.service') }}" class="heading8" method="get">
                                        <button class="heading8">Services</button>
                                    </form>
                                </div>
                                <div class="item px-5 py-2 flex items-center gap-3 cursor-pointer mt-2">
                                    <i class="ph ph-package text-xl"></i>
                                    <form action="{{ route('admin.add.service') }}" class="heading8" method="get">
                                        <button class="heading8">Add  Service</button>
                                    </form>
                                </div>
                                <div class="item px-5 py-2 flex items-center gap-3 cursor-pointer mt-2">
                                    <i class="ph ph-suitcase text-xl"></i>
                                    <form action="{{ route('admin.career') }}" class="heading8" method="get">
                                        <button class="heading8">Career</button>
                                    </form>
                                </div>
                                <div class="item px-5 py-2 flex items-center gap-3 cursor-pointer mt-2">
                                    <i class="ph ph-archive text-xl"></i>
                                    <form action="{{ route('admin.archive') }}" class="heading8" method="get">
                                        <button class="heading8">Archive</button>
                                    </form>
                                </div>
                                <div class="item px-5 py-2 flex items-center gap-3 cursor-pointer">
                                    <i class="ph-bold ph-user text-xl"></i>
                                    <form action="{{ route('admin.profile') }}" class="heading8" method="get">
                                        <button class="heading8">Profile</button>
                                    </form>
                                </div>
                                <div class="item px-5 py-2 flex items-center gap-3 cursor-pointer mt-2">
                                    <i class="ph-bold ph-sign-out text-xl"></i>
                                    <form action="{{ route('logout') }}" method="post">
                                        @csrf
                                        <button class="heading8">Logout</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>