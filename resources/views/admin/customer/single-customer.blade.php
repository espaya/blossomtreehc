
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
                        <!-- Add information here -->
                         @include('admin/customer/customerTpl')
                    </div>
                </div>
            </div>
        </div>

        @include('templates/footer')

        <a class="scroll-to-top-btn" href="#top-nav"><i class="ph-bold ph-caret-up"></i></a>

        <script src="{{asset('assets/js/phosphor-icons.js')}}"></script>
        <script src="{{asset('assets/js/swiper-bundle.min.js')}}"></script>
        <script src="{{asset('assets/js/main.js')}}"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const tabItems = document.querySelectorAll('.tab-item');
                const tabContents = document.querySelectorAll('.tab-question');

                // Function to switch tabs
                tabItems.forEach(tab => {
                    tab.addEventListener('click', function() {
                        const target = this.getAttribute('data-item');
                        console.log(`Tab clicked: ${target}`);

                        // Remove active class from all tabs
                        tabItems.forEach(item => item.classList.remove('active'));
                        // Add active class to the clicked tab
                        this.classList.add('active');

                        // Hide all tab contents
                        tabContents.forEach(content => content.classList.remove('active'));
                        // Show the content related to the clicked tab
                        document.querySelector(`.tab-question[data-item="${target}"]`).classList.add('active');
                    });
                });

                // Function to expand/collapse question items
                const questionItems = document.querySelectorAll('.question-item');

                questionItems.forEach(item => {
                    item.addEventListener('click', function() {
                        const content = this.querySelector('.content');
                        const icon = this.querySelector('.ph-caret-right');
                        console.log('Question item clicked');

                        if (content.style.display === 'none' || content.style.display === '') {
                            content.style.display = 'block';
                            icon.classList.add('ph-caret-down');
                            icon.classList.remove('ph-caret-right');
                        } else {
                            content.style.display = 'none';
                            icon.classList.add('ph-caret-right');
                            icon.classList.remove('ph-caret-down');
                        }
                    });
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

