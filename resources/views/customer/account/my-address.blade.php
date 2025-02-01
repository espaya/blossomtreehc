
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
                    <div class="right xl:w-2/3 md:w-7/12 w-full xl:pl-[40px] lg:pl-[28px] md:pl-[16px] flex ">
                    <div class="text-content w-full">
                        @if(session('success'))
                        <p style="color: green; margin-bottom:50ox"> {{ session('success') }} </p>
                        @endif
                        @if(session('error'))
                        <p style="color: red; margin-bottom:50ox"> {{ session('error') }} </p>
                        @endif
                            @if($address->isNotEmpty())
                            <form method="post" action="{{ route('update.my.address') }}" class="">
                                @csrf
                                @method('POST')
                                <div class="heading5 pb-4">Address</div>
                                    <div class="grid sm:grid-cols-2 gap-4 gap-y-5">
                                       
                                        <div class="address">
                                            <input placeholder="Address" name="address" value="{{ $address->isNotEmpty() ? $address->first()->address : '' }}" autocomplete="off" class="border-line px-4 pt-3 pb-3 w-full rounded-lg" id="address" type="text">
                                            @error('address')
                                            <p style="color: red;"> {{ $message }} </p>
                                            @enderror
                                        </div>
                                        <div class="addressLine2">
                                            <input name="addressLine2" value="{{ $address->isNotEmpty() ? $address->first()->addressLine2 : '' }}" autocomplete="off" class="border-line px-4 pt-3 pb-3 w-full rounded-lg" id="addressLine2" type="text" placeholder="Address Line 2 (optional)">
                                            @error('addressLine2')
                                            <p style="color: red;"> {{ $message }} </p>
                                            @enderror
                                        </div>
                                        <div class="city">
                                            <input name="city" value="{{ $address->isNotEmpty() ? $address->first()->city : '' }}" autocomplete="off" class="border-line px-4 pt-3 pb-3 w-full rounded-lg" id="city" type="text" placeholder="City *">
                                            @error('city')
                                            <p style="color: red;"> {{ $message }} </p>
                                            @enderror
                                        </div>
                                        @php
                                            $states = [
                                                'AL' => 'Alabama',
                                                'AK' => 'Alaska',
                                                'AZ' => 'Arizona',
                                                'AR' => 'Arkansas',
                                                'CA' => 'California',
                                                'CO' => 'Colorado',
                                                'CT' => 'Connecticut',
                                                'DE' => 'Delaware',
                                                'FL' => 'Florida',
                                                'GA' => 'Georgia',
                                                'HI' => 'Hawaii',
                                                'ID' => 'Idaho',
                                                'IL' => 'Illinois',
                                                'IN' => 'Indiana',
                                                'IA' => 'Iowa',
                                                'KS' => 'Kansas',
                                                'KY' => 'Kentucky',
                                                'LA' => 'Louisiana',
                                                'ME' => 'Maine',
                                                'MD' => 'Maryland',
                                                'MA' => 'Massachusetts',
                                                'MI' => 'Michigan',
                                                'MN' => 'Minnesota',
                                                'MS' => 'Mississippi',
                                                'MO' => 'Missouri',
                                                'MT' => 'Montana',
                                                'NE' => 'Nebraska',
                                                'NV' => 'Nevada',
                                                'NH' => 'New Hampshire',
                                                'NJ' => 'New Jersey',
                                                'NM' => 'New Mexico',
                                                'NY' => 'New York',
                                                'NC' => 'North Carolina',
                                                'ND' => 'North Dakota',
                                                'OH' => 'Ohio',
                                                'OK' => 'Oklahoma',
                                                'OR' => 'Oregon',
                                                'PA' => 'Pennsylvania',
                                                'RI' => 'Rhode Island',
                                                'SC' => 'South Carolina',
                                                'SD' => 'South Dakota',
                                                'TN' => 'Tennessee',
                                                'TX' => 'Texas',
                                                'UT' => 'Utah',
                                                'VT' => 'Vermont',
                                                'VA' => 'Virginia',
                                                'WA' => 'Washington',
                                                'WV' => 'West Virginia',
                                                'WI' => 'Wisconsin',
                                                'WY' => 'Wyoming'
                                            ];
                                            $selectedState = $address->isNotEmpty() ? $address->first()->state : '';
                                        @endphp

                                        <div class="select-block">
                                            <select class="border border-line px-4 py-3 w-full rounded-lg" id="region" name="state">
                                                <option value="">Select State *</option>
                                                @foreach($states as $abbr => $name)
                                                    <option value="{{ $abbr }}" {{ $abbr == $selectedState ? 'selected' : '' }}>{{ $name }}</option>
                                                @endforeach
                                            </select>
                                            <i class="ph-bold ph-caret-down arrow-down text-xl"></i>
                                            @error('state')
                                                <p style="color: red;"> {{ $message }} </p>
                                            @enderror
                                        </div>

                                        <div class="zip">
                                            <input name="zip" value="{{ $address->isNotEmpty() ? $address->first()->zip : '' }}" autocomplete="off" class="border-line px-4 pt-3 pb-3 w-full rounded-lg" id="zip" type="text" placeholder="zip Code*">
                                            @error('zip')
                                            <p style="color: red;"> {{ $message }} </p>
                                            @enderror
                                        </div>
                                        @php
                                            $selectedCountry = $address->isNotEmpty() ? $address->first()->country : '';
                                        @endphp

                                        <div class="select-block">
                                            <select class="border border-line px-4 py-3 w-full rounded-lg" id="region" name="country">
                                                <option value="">Select Country</option>
                                                <option value="USA" {{ $address->isNotEmpty() && $address->first()->country == 'United States' ? 'selected' : '' }}>USA</option>
                                            </select>
                                            <i class="ph-bold ph-caret-down arrow-down text-xl"></i>
                                            @error('country')
                                                <p style="color: red;"> {{ $message }} </p>
                                            @enderror
                                        </div>

                                        
                                    </div>
                                <div class="block-button lg:mt-10 mt-6">
                                    <button class="button-main" style="text-transform: capitalize;">Update Address</button>
                                </div>
                            </form>
                            @else 
                            <form method="post" action="{{ route('save.my.address') }}" enctype="multipart/form-data" class="">
                                @csrf
                                @method('POST')
                                <div class="heading5 pb-4">Address</div>
                                    <div class="grid sm:grid-cols-2 gap-4 gap-y-5">
                                        <div class="address">
                                            <input name="address" value="{{ old('address') }}" autocomplete="off" class="border-line px-4 pt-3 pb-3 w-full rounded-lg" id="address" type="text" placeholder="Address *">
                                            @error('address')
                                            <p style="color: red;"> {{ $message }} </p>
                                            @enderror
                                        </div>
                                        <div class="addressLine2">
                                            <input name="addressLine2" value="{{ old('addressLine2') }}" autocomplete="off" class="border-line px-4 pt-3 pb-3 w-full rounded-lg" id="addressLine2" type="text" placeholder="Address Line 2 (optional)">
                                            @error('addressLine2')
                                            <p style="color: red;"> {{ $message }} </p>
                                            @enderror
                                        </div>
                                        <div class="city">
                                            <input name="city" value="{{ old('city') }}" autocomplete="off" class="border-line px-4 pt-3 pb-3 w-full rounded-lg" id="city" type="text" placeholder="City *">
                                            @error('city')
                                            <p style="color: red;"> {{ $message }} </p>
                                            @enderror
                                        </div>
                                        <div class="select-block">
                                            <select class="border border-line px-4 py-3 w-full rounded-lg" id="region" name="state">
                                                <option value="" {{ old('state', $selectedState ?? '') == '' ? 'selected' : '' }}>Select State *</option>
                                                <option value="AL" {{ old('state', $selectedState ?? '') == 'AL' ? 'selected' : '' }}>Alabama</option>
                                                <option value="AK" {{ old('state', $selectedState ?? '') == 'AK' ? 'selected' : '' }}>Alaska</option>
                                                <option value="AZ" {{ old('state', $selectedState ?? '') == 'AZ' ? 'selected' : '' }}>Arizona</option>
                                                <option value="AR" {{ old('state', $selectedState ?? '') == 'AR' ? 'selected' : '' }}>Arkansas</option>
                                                <option value="CA" {{ old('state', $selectedState ?? '') == 'CA' ? 'selected' : '' }}>California</option>
                                                <option value="CO" {{ old('state', $selectedState ?? '') == 'CO' ? 'selected' : '' }}>Colorado</option>
                                                <option value="CT" {{ old('state', $selectedState ?? '') == 'CT' ? 'selected' : '' }}>Connecticut</option>
                                                <option value="DE" {{ old('state', $selectedState ?? '') == 'DE' ? 'selected' : '' }}>Delaware</option>
                                                <option value="FL" {{ old('state', $selectedState ?? '') == 'FL' ? 'selected' : '' }}>Florida</option>
                                                <option value="GA" {{ old('state', $selectedState ?? '') == 'GA' ? 'selected' : '' }}>Georgia</option>
                                                <option value="HI" {{ old('state', $selectedState ?? '') == 'HI' ? 'selected' : '' }}>Hawaii</option>
                                                <option value="ID" {{ old('state', $selectedState ?? '') == 'ID' ? 'selected' : '' }}>Idaho</option>
                                                <option value="IL" {{ old('state', $selectedState ?? '') == 'IL' ? 'selected' : '' }}>Illinois</option>
                                                <option value="IN" {{ old('state', $selectedState ?? '') == 'IN' ? 'selected' : '' }}>Indiana</option>
                                                <option value="IA" {{ old('state', $selectedState ?? '') == 'IA' ? 'selected' : '' }}>Iowa</option>
                                                <option value="KS" {{ old('state', $selectedState ?? '') == 'KS' ? 'selected' : '' }}>Kansas</option>
                                                <option value="KY" {{ old('state', $selectedState ?? '') == 'KY' ? 'selected' : '' }}>Kentucky</option>
                                                <option value="LA" {{ old('state', $selectedState ?? '') == 'LA' ? 'selected' : '' }}>Louisiana</option>
                                                <option value="ME" {{ old('state', $selectedState ?? '') == 'ME' ? 'selected' : '' }}>Maine</option>
                                                <option value="MD" {{ old('state', $selectedState ?? '') == 'MD' ? 'selected' : '' }}>Maryland</option>
                                                <option value="MA" {{ old('state', $selectedState ?? '') == 'MA' ? 'selected' : '' }}>Massachusetts</option>
                                                <option value="MI" {{ old('state', $selectedState ?? '') == 'MI' ? 'selected' : '' }}>Michigan</option>
                                                <option value="MN" {{ old('state', $selectedState ?? '') == 'MN' ? 'selected' : '' }}>Minnesota</option>
                                                <option value="MS" {{ old('state', $selectedState ?? '') == 'MS' ? 'selected' : '' }}>Mississippi</option>
                                                <option value="MO" {{ old('state', $selectedState ?? '') == 'MO' ? 'selected' : '' }}>Missouri</option>
                                                <option value="MT" {{ old('state', $selectedState ?? '') == 'MT' ? 'selected' : '' }}>Montana</option>
                                                <option value="NE" {{ old('state', $selectedState ?? '') == 'NE' ? 'selected' : '' }}>Nebraska</option>
                                                <option value="NV" {{ old('state', $selectedState ?? '') == 'NV' ? 'selected' : '' }}>Nevada</option>
                                                <option value="NH" {{ old('state', $selectedState ?? '') == 'NH' ? 'selected' : '' }}>New Hampshire</option>
                                                <option value="NJ" {{ old('state', $selectedState ?? '') == 'NJ' ? 'selected' : '' }}>New Jersey</option>
                                                <option value="NM" {{ old('state', $selectedState ?? '') == 'NM' ? 'selected' : '' }}>New Mexico</option>
                                                <option value="NY" {{ old('state', $selectedState ?? '') == 'NY' ? 'selected' : '' }}>New York</option>
                                                <option value="NC" {{ old('state', $selectedState ?? '') == 'NC' ? 'selected' : '' }}>North Carolina</option>
                                                <option value="ND" {{ old('state', $selectedState ?? '') == 'ND' ? 'selected' : '' }}>North Dakota</option>
                                                <option value="OH" {{ old('state', $selectedState ?? '') == 'OH' ? 'selected' : '' }}>Ohio</option>
                                                <option value="OK" {{ old('state', $selectedState ?? '') == 'OK' ? 'selected' : '' }}>Oklahoma</option>
                                                <option value="OR" {{ old('state', $selectedState ?? '') == 'OR' ? 'selected' : '' }}>Oregon</option>
                                                <option value="PA" {{ old('state', $selectedState ?? '') == 'PA' ? 'selected' : '' }}>Pennsylvania</option>
                                                <option value="RI" {{ old('state', $selectedState ?? '') == 'RI' ? 'selected' : '' }}>Rhode Island</option>
                                                <option value="SC" {{ old('state', $selectedState ?? '') == 'SC' ? 'selected' : '' }}>South Carolina</option>
                                                <option value="SD" {{ old('state', $selectedState ?? '') == 'SD' ? 'selected' : '' }}>South Dakota</option>
                                                <option value="TN" {{ old('state', $selectedState ?? '') == 'TN' ? 'selected' : '' }}>Tennessee</option>
                                                <option value="TX" {{ old('state', $selectedState ?? '') == 'TX' ? 'selected' : '' }}>Texas</option>
                                                <option value="UT" {{ old('state', $selectedState ?? '') == 'UT' ? 'selected' : '' }}>Utah</option>
                                                <option value="VT" {{ old('state', $selectedState ?? '') == 'VT' ? 'selected' : '' }}>Vermont</option>
                                                <option value="VA" {{ old('state', $selectedState ?? '') == 'VA' ? 'selected' : '' }}>Virginia</option>
                                                <option value="WA" {{ old('state', $selectedState ?? '') == 'WA' ? 'selected' : '' }}>Washington</option>
                                                <option value="WV" {{ old('state', $selectedState ?? '') == 'WV' ? 'selected' : '' }}>West Virginia</option>
                                                <option value="WI" {{ old('state', $selectedState ?? '') == 'WI' ? 'selected' : '' }}>Wisconsin</option>
                                                <option value="WY" {{ old('state', $selectedState ?? '') == 'WY' ? 'selected' : '' }}>Wyoming</option>
                                                <!-- US Territories -->
                                                <option value="AS" {{ old('state', $selectedState ?? '') == 'AS' ? 'selected' : '' }}>American Samoa</option>
                                                <option value="DC" {{ old('state', $selectedState ?? '') == 'DC' ? 'selected' : '' }}>District of Columbia</option>
                                                <option value="FM" {{ old('state', $selectedState ?? '') == 'FM' ? 'selected' : '' }}>Federated States of Micronesia</option>
                                                <option value="GU" {{ old('state', $selectedState ?? '') == 'GU' ? 'selected' : '' }}>Guam</option>
                                                <option value="MH" {{ old('state', $selectedState ?? '') == 'MH' ? 'selected' : '' }}>Marshall Islands</option>
                                                <option value="MP" {{ old('state', $selectedState ?? '') == 'MP' ? 'selected' : '' }}>Northern Mariana Islands</option>
                                                <option value="PW" {{ old('state', $selectedState ?? '') == 'PW' ? 'selected' : '' }}>Palau</option>
                                                <option value="PR" {{ old('state', $selectedState ?? '') == 'PR' ? 'selected' : '' }}>Puerto Rico</option>
                                                <option value="VI" {{ old('state', $selectedState ?? '') == 'VI' ? 'selected' : '' }}>Virgin Islands</option>
                                            </select>
                                            <i class="ph-bold ph-caret-down arrow-down text-xl"></i>
                                            @error('state')
                                            <p style="color: red;">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="zip">
                                            <input name="zip" value="{{ old('zip') }}" autocomplete="off" class="border-line px-4 pt-3 pb-3 w-full rounded-lg" id="zip" type="text" placeholder="zip Code*">
                                            @error('zip')
                                            <p style="color: red;"> {{ $message }} </p>
                                            @enderror
                                        </div>
                                        <div class="select-block">
                                            <select class="border border-line px-4 py-3 w-full rounded-lg" id="region" name="country">
                                                <option value="United States" selected>United States</option>
                                            </select>
                                            <i class="ph-bold ph-caret-down arrow-down text-xl"></i>
                                            @error('country')
                                            <p style="color: red;"> {{ $message }} </p>
                                            @enderror
                                        </div>
                                    </div>
                                <div class="block-button lg:mt-10 mt-6">
                                    <button class="button-main" style="text-transform: capitalize;">Save Address</button>
                                </div>
                            </form>
                            @endif
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
