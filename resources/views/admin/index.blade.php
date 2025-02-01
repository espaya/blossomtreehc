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
                    <div class="right xl:w-2/3 md:w-7/12 w-full xl:pl-[40px] lg:pl-[28px] md:pl-[16px] flex items-center">
                        <!-- Dashboard widgets -->

                        <div class="dashboard-widgets grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 w-full">
                        
                        <!-- Widget 1: User Statistics -->
                        <div class="widget bg-white p-4 rounded-lg shadow-md">
                            <h3 class="text-xl font-semibold mb-2">User Statistics</h3>
                            <p class="text-gray-600 mb-4">Total Users: <span class="text-green-500 font-bold">1,250</span></p>
                            <p class="text-gray-600 mb-4">New Signups: <span class="text-blue-500 font-bold">75</span></p>
                        </div>
                        
                        <!-- Widget 2: Sales Summary -->
                        <div class="widget bg-white p-4 rounded-lg shadow-md">
                            <h3 class="text-xl font-semibold mb-2">Career Summary</h3>
                            <p class="text-gray-600 mb-4">Total: <span class="text-green-500 font-bold">$12,300</span></p>
                            <p class="text-gray-600 mb-4">New: <span class="text-yellow-500 font-bold">18</span></p>
                            <p class="text-gray-600">Archived: <span class="text-blue-500 font-bold">102</span></p>
                        </div>
                        
                        <!-- Widget 3: Traffic Source -->
                        <div class="widget bg-white p-4 rounded-lg shadow-md">
                            <h3 class="text-xl font-semibold mb-2">Service Summary</h3>
                            <ul class="list-disc ml-5">
                                <li class="text-gray-600 mb-2">Subscribed: <span class="text-purple-500 font-bold">45%</span></li>
                                <li class="text-gray-600 mb-2">Custom: <span class="text-blue-500 font-bold">30%</span></li>
                            </ul>
                        </div>

                        <!-- Widget 4: Recent Activities -->
                        <div class="widget bg-white p-4 rounded-lg shadow-md col-span-1 md:col-span-2">
                            <h3 class="text-xl font-semibold mb-2">Recent Activities</h3>
                            <ul class="list-none">
                                <li class="text-gray-600 mb-2">
                                    <span class="font-semibold">John Doe</span> registered as a new user. <span class="text-sm text-gray-400">2 mins ago</span>
                                </li>
                                <li class="text-gray-600 mb-2">
                                    <span class="font-semibold">Order #1234</span> was completed. <span class="text-sm text-gray-400">10 mins ago</span>
                                </li>
                                <li class="text-gray-600">
                                    <span class="font-semibold">Jane Smith</span> updated her profile. <span class="text-sm text-gray-400">15 mins ago</span>
                                </li>
                            </ul>
                        </div>

                        <!-- Widget 5: Revenue Chart -->
                        <div class="widget bg-white p-4 rounded-lg shadow-md col-span-1 md:col-span-2 lg:col-span-3">
                            <h3 class="text-xl font-semibold mb-2">Forms</h3>
                            <ul class="list-disc ml-5">
                                <li class="text-gray-600 mb-2">Forms Signed: <span class="text-purple-500 font-bold">45%</span></li>
                                <li class="text-gray-600 mb-2">Users Signed: <span class="text-blue-500 font-bold">30%</span></li>
                            </ul>
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

        <!-- Include Chart.js for rendering the charts -->
        <!-- <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> -->
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Example data for the revenue chart
                const revenueData = {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                    datasets: [{
                        label: 'Revenue',
                        data: [1200, 1500, 900, 1700, 2000, 1300],
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1
                    }]
                };

                const ctx = document.getElementById('revenueChart').getContext('2d');
                new Chart(ctx, {
                    type: 'line', // or 'bar', 'pie', 'doughnut', etc.
                    data: revenueData,
                    options: {
                        responsive: true,
                        maintainAspectRatio: false
                    }
                });
            });
        </script>

    </body>
</html>
<style>
    .ass{
        background: url('{{ asset("assets/images/caregiver.jpg") }}') no-repeat center center; background-size: cover; position: relative;
    }
</style>

