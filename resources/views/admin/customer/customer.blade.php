<!DOCTYPE html>
<html lang="en">
   @include('templates/head')
   <!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">

   <body>
      @include('templates/header')  
      <div style="margin-top: -50px !important;" class="my-account-block ass">
         <div class="my-account-block md:py-20 py-10;" style=" width: 100%; height: 100%; background-color: rgba(255, 255, 255, 0.9); ">
            <div class="container">
               <div class="content-main lg:px-[60px] md:px-4 flex gap-y-8 max-md:flex-col w-full">
                  @include('admin/menu/admin_menu')
                  <div class="right xl:w-2/3 md:w-7/12 w-full xl:pl-[40px] lg:pl-[28px] md:pl-[16px] flex items-top">
                     <!-- Add information here -->
                     <div class="left xl:w-3/4 md:w-2/3 pr-2">
                        <div class="list-blog flex flex-col md:gap-10 gap-8" data-item="6">
                           <!-- Search  -->
                           <form action="{{ route('search') }}" method="post">
                              @csrf 
                              <div class="search">
                                 <input value="" name="search" class="border-line px-4 pt-3 pb-3 w-full rounded-lg" id="search" type="text" placeholder="search..." autocomplete="off">
                                 @error('search')
                                 <p style="color: red;"> {{ $message }}</p>
                                 @enderror
                                 @if(session('error'))
                                 <p style="color: red;"> {{ session('error') }}</p>
                                 @endif
                                 @if(session('success'))
                                 <p style="color: green;"> {{ session('success') }}</p>
                                 @endif
                              </div>
                              <div>
                                 <button hidden type="submit">Search</button>
                              </div>
                           </form>
                           <!-- Blog Items -->
                           @if(session('search') && session('search')->count())
                           <div class="list-img grid sm:grid-cols-3 gap-[30px] md:pt-10 pt-10">
                              @forelse(session('search') as $customer)
                                 <div class="bg-img text-center">
                                    @if(!empty($customer->img))
                                    <img style="width: 120px; height: 120px" src="{{ asset('storage/profiles/' . $customer->img) }}" alt="bg-img" class="w-full rounded-[30px] mx-auto">
                                    @else
                                    <img style="width: 120px; height: 120px" src="{{ asset('assets/images/my-user.png') }}" alt="bg-img" class="w-full rounded-[30px] mx-auto">
                                    @endif
                                    <div class="flex flex-col items-center justify-center mt-2">
                                       <div class="product-name heading8">
                                          <a href="{{ route('view.admin.customer', ['id' => $customer->id]) }}">
                                          {{ ucfirst($customer->firstname) . ' ' . ucfirst($customer->lastname) }}
                                          </a>
                                       </div>
                                       <form method="post" action="{{ route('delete.customer', ['id' => $customer->id]) }}" id="deleteForm">
                                          @csrf
                                          @method('delete')
                                          <button type="button" class="btn btn-danger btn-sm mt-2" onclick="confirmDelete()">Delete</button>
                                       </form>
                                    </div>
                                 </div>
                              @empty
                              <p class="heading4">No Customers Found!</p>
                              @endforelse
                           </div>
                           <!-- Pagination -->
                           <div class="list-pagination w-full flex items-center justify-center gap-4 md:mt-10 mt-6">
                              {{ session('search')->links() }} <!-- This generates the pagination links -->
                           </div>
                           @else
                           <div class="list-img grid sm:grid-cols-3 gap-[30px] md:pt-10 pt-10">
                              @forelse($customers as $customer)
                              <div class="bg-img text-center">
                                 @if(!empty($customer->img))
                                 <img style="width: 120px; height: 120px" src="{{ asset('storage/profiles/' . $customer->img) }}" alt="bg-img" class="w-full rounded-[30px] mx-auto">
                                 @else
                                 <img style="width: 120px; height: 120px" src="{{ asset('assets/images/my-user.png') }}" alt="bg-img" class="w-full rounded-[30px] mx-auto">
                                 @endif
                                 <div class="flex flex-col items-center justify-center mt-2">
                                    <div class="product-name heading8">
                                       <a href="{{ route('view.admin.customer', ['id' => $customer->id]) }}">
                                       {{ ucfirst($customer->firstname) . ' ' . ucfirst($customer->lastname) }}
                                       </a>
                                    </div>
                                    <form method="post" action="{{ route('delete.customer', ['id' => $customer->id]) }}" id="deleteForm">
                                        @csrf
                                        @method('delete')
                                        <button type="button" class="btn btn-danger btn-sm mt-2" onclick="confirmDelete()">Delete</button>
                                    </form>
                                 </div>
                              </div>
                              @empty
                              <p class="heading4">No Customers Found!</p>
                              @endforelse
                           </div>
                           <!-- Pagination -->
                           <div class="list-pagination w-full flex items-center justify-center gap-4 md:mt-10 mt-6">
                              {{ $customers->links() }} <!-- This generates the pagination links -->
                           </div>
                           @endif
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
      <!-- Bootstrap JS (optional, for interactive components) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
      function confirmDelete() {
         if (confirm("Are you sure you want to delete this customer?")) {
            document.getElementById('deleteForm').submit(); // Submit the form if confirmed
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