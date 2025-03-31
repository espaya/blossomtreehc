<div class="faqs-block md:py-20 py-10">
    <div class="container">
        <div class="flex max-md:flex-wrap justify-between gap-y-8">
            <div class="left md:w-1/4">
                <div class="menu-tab flex flex-col gap-5">
                <div class="tab-item inline-block w-fit heading6 has-line-before text-secondary2 hover:text-black duration-300 ">
                    @if(!empty($profile[0]->img))
                        <img style="width: 100px; height: 100px" src="{{asset('storage/profiles/' . $profile[0]->img )}}" alt="avatar" class="md:w-[140px] w-[120px] md:h-[140px] h-[120px] rounded-full">
                    @else 
                        <img src="{{asset('assets/images/my-user.png')}}" alt="avatar" class="md:w-[140px] w-[120px] md:h-[140px] h-[120px] rounded-full">
                    @endif
                </div>
                    <div class="tab-item inline-block w-fit heading6 has-line-before text-secondary2 hover:text-black duration-300 active" data-item="how-to-buy">Profile</div>
                    <div class="tab-item inline-block w-fit heading6 has-line-before text-secondary2 hover:text-black duration-300" data-item="payment-methods">Address</div>
                    <div class="tab-item inline-block w-fit heading6 has-line-before text-secondary2 hover:text-black duration-300" data-item="delivery">Services</div>
                    <a class="inline-block w-fit heading6 has-line-before text-secondary2 hover:text-black duration-300" href="{{ route('view.admin.customer.docs', ['id' => $profile[0]->id]) }}">Docs</a>
                </div>
            </div>

            <div class="right list-question md:w-2/3">
                <div class="tab-question flex flex-col gap-5 active" data-item="how-to-buy">
                    <div class="question-item px-7 py-5 rounded-[20px] overflow-hidden border border-line cursor-pointer">
                        <div class="heading flex items-center justify-between gap-6">
                                <div class="grid sm:grid-cols-2 gap-4 gap-y-5"> 
                                    <div class="first-name">
                                        <input disabled value="{{ ucfirst($profile[0]->firstname) }}" class="border-line px-4 pt-3 pb-3 w-full rounded-lg" type="text">
                                    </div>
                                    <div class="last-name">
                                        <input disabled value="{{ ucfirst($profile[0]->lastname) }}" class="border-line px-4 pt-3 pb-3 w-full rounded-lg" type="text">
                                    </div>
                                    <div class="email">
                                        <input disabled value="{{ $profile[0]->email }}" class="border-line px-4 pt-3 pb-3 w-full rounded-lg" type="email">
                                    </div>
                                    <div class="phone-number">
                                        <input disabled value="{{ $profile[0]->phone }}" class="border-line px-4 pt-3 pb-3 w-full rounded-lg" type="text">
                                    </div>
                                </div>
                        </div>
                    </div>
                    <!-- Add more question-items here -->
                </div>
                <div class="tab-question flex flex-col gap-5" data-item="payment-methods">
                    <!-- Question Items for "payment-methods" tab -->
                    <div class="question-item px-7 py-5 rounded-[20px] overflow-hidden border border-line cursor-pointer">
                        <div class="heading flex items-center justify-between gap-6">
                            <div class="grid sm:grid-cols-2 gap-4 gap-y-5">
                                    <div class="first-name">
                                        <input placeholder="Address" disabled value="{{ $address && $address->isNotEmpty() ? $address->first()->address : '' }}" class="border-line px-4 pt-3 pb-3 w-full rounded-lg" type="text">
                                    </div>
                                    <div class="last-name">
                                        <input placeholder="Address line 2" disabled value="{{ $address && $address->isNotEmpty() ? $address->first()->addressLine2 : '' }}" class="border-line px-4 pt-3 pb-3 w-full rounded-lg" type="text">
                                    </div>
                                    <div class="email">
                                        <input placeholder="City" disabled value="{{ $address && $address->isNotEmpty() ? $address->first()->city : '' }}" class="border-line px-4 pt-3 pb-3 w-full rounded-lg" type="email">
                                    </div>
                                    <div class="phone-number">
                                        <input placeholder="State" disabled value="{{ $address && $address->isNotEmpty() ? $address->first()->state : '' }}" class="border-line px-4 pt-3 pb-3 w-full rounded-lg" type="text">
                                    </div>
                                    <div class="phone-number">
                                        <input placeholder="Zip" disabled value="{{ $address && $address->isNotEmpty() ? $address->first()->zip : '' }}" class="border-line px-4 pt-3 pb-3 w-full rounded-lg" type="text">
                                    </div>
                                    <div class="phone-number">
                                        <input placeholder="Country" disabled value="{{ $address && $address->isNotEmpty() ? $address->first()->country : '' }}" class="border-line px-4 pt-3 pb-3 w-full rounded-lg" type="text">
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>


                <div class="tab-question flex flex-col gap-5" data-item="delivery">
                    <!-- Question Items for "payment-methods" tab -->
                    <div class="question-item px-7 py-5 rounded-[20px] overflow-hidden border border-line cursor-pointer">
                    <div class="heading flex items-center justify-between gap-6">
                        <div class="grid grid-cols-1 gap-4">
                            @forelse($customService as $service)
                                <div>
                                    <a title="{{ $service->myCustomService }}" href="#">
                                        <div class="bg-img">
                                            <div class="flex justify-between">
                                                <div class="flex items-center">
                                                    <input disabled checked name="{{ $service->myCustomService }}" value="{{ $service->myCustomService }}" class="border-line px-4 pt-3 pb-3 rounded-lg" id="title" type="checkbox">
                                                    <div class="product-name heading8 mt-1 ml-2">{{ $service->myCustomService }}</div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @empty
                                <p>No custom service(s) available</p>
                            @endforelse
                            
                            @forelse($services as $service)
                                <div>
                                    <a title="{{ $service->title }}" href="#">
                                        <div class="bg-img">
                                            <div class="flex justify-between">
                                                <div class="flex items-center">
                                                    <input disabled checked name="{{ $service->title }}" value="{{ $service->title }}" class="border-line px-4 pt-3 pb-3 rounded-lg" id="title" type="checkbox">
                                                    <div class="product-name heading8 mt-1 ml-2">{{ $service->title }}</div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @empty
                                <p>No service(s) available</p>
                            @endforelse
                        </div>
                    </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
