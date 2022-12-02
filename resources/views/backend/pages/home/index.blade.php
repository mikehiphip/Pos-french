<!DOCTYPE html>
<html lang="en" class="light">
    <!-- BEGIN: Head -->
    <head>

        <!-- BEGIN: CSS Assets-->
        @include("backend.layout.css")
        <!-- END: CSS Assets-->
    </head>
    <!-- END: Head -->
    <body class="py-5">
        <!-- BEGIN: Mobile Menu -->
        @include("backend.layout.mobile-menu")
        <!-- END: Mobile Menu -->
        <div class="flex">
            <!-- BEGIN: Side Menu -->
            @include("backend.layout.side-menu")
            <!-- END: Side Menu -->


            <!-- BEGIN: Content -->
            <div class="content">
                <!-- BEGIN: Top Bar -->
                @include("backend.layout.topbar")
                <!-- END: Top Bar -->


                <div class="grid grid-cols-12 gap-6">
                    <div class="col-span-12 mt-8">
                        <div class="intro-y flex items-center h-10">
                            <h2 class="text-lg font-medium truncate mr-5">
                                
                            </h2>
                        </div>
                    </div>
                </div>




            </div>
            <!-- END: Content -->
        </div>
       
        <!-- BEGIN: JS Assets-->
        @include("backend.layout.script")
        <!-- END: JS Assets-->
    </body>
</html>