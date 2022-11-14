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


            
            <div class="content">
                <!-- BEGIN: Top Bar -->
                @include("backend.layout.topbar")
                <!-- END: Top Bar -->


                <!-- BEGIN: Content -->
                <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
                    <h2 class="text-lg font-medium mr-auto">
                        Form Data
                    </h2>
                </div>

                <form id="menuForm" method="post" action="">
                @csrf
                    <div class="grid grid-cols-12 gap-6 mt-5">
                        <div class="intro-y col-span-12 lg:col-span-8">
                            <!-- BEGIN: Form Layout -->
                            <div class="intro-y box p-5">

                                {{-- <div class="grid grid-cols-12 gap-6 mt-5 mb-3">
                                    <div class="col-span-12 lg:col-span-6">
                                        <label for="validation-form-1" class="form-label w-full flex flex-col sm:flex-row text-primary"> Position 
                                            <span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-slate-500">Required, please select value</span> 
                                        </label>
                                        <select class="form-control w-full" name="position" id="position" onchange="Scate()">
                                            <option value="" hidden>Please select</option>
                                            <option value="main">Main Category</option>
                                            <option value="sub">Sub Category</option>
                                        </select>
                                    </div>
                                    <div class="col-span-12 lg:col-span-6">
                                        <label for="validation-form-1" class="form-label w-full flex flex-col sm:flex-row text-primary"> It a sub-cate of the category: 
                                            <span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-slate-500">Required, please select value</span> 
                                        </label>
                                        <select class="form-control w-full" name="cate_id" id="cate_id" disabled>
                                            <option value="" hidden>Please select</option>
                                            @foreach ($category as $cate)
                                            <option value="{{$cate->id}}">{{$cate->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div> --}}
                                <div class="grid grid-cols-12 gap-6 mt-5 mb-3">
                                    <div class="col-span-8 lg:col-span-6">
                                        <label for="validation-form-1" class="form-label w-full flex flex-col sm:flex-row text-primary"> Name 
                                            <span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-slate-500">Required, please input name category</span> 
                                        </label>
                                        <input type="text" id="name" name="name" class="form-control w-full" placeholder="">
                                        <span id="name_check" hidden class="text-danger" style="font-size:12px;">* Required, please input value</span>
                                    </div>
                                    <div class="col-span-4 lg:col-span-6">
                                        <label for="validation-form-1" class="form-label w-full flex flex-col sm:flex-row text-primary"> Color button 
                                        </label>
                                        <input type="text" id="color" name="color" class="form-control w-full" placeholder="">
                                    </div>
                                </div>

                                <div class="grid grid-cols-12 gap-6 mt-5 mb-3">
                                    <div class="col-span-12 lg:col-span-6">
                                        <label for="validation-form-1" class="form-label w-full flex flex-col sm:flex-row text-primary"> Status speical 
                                            <span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-slate-500">Show in menu homepage bottom menu</span> 
                                        </label>
                                        <select class="form-control w-full" name="status_speical" id="status_speical">
                                            <option value="" hidden>Please select</option>
                                            <option value="on">on</option>
                                            <option value="off">off</option>
                                        </select>
                                        <span id="status_speical_check" hidden class="text-danger" style="font-size:12px;">* Required, please input value</span>
                                    </div>
                                    <div class="col-span-12 lg:col-span-6">
                                        <label for="validation-form-1" class="form-label w-full flex flex-col sm:flex-row text-primary"> Status 
                                            <span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-slate-500">Show in menu homepage</span> 
                                        </label>
                                        <select class="form-control w-full" name="status" id="status">
                                            <option value="" hidden>Please select</option>
                                            <option value="on">on</option>
                                            <option value="off">off</option>
                                        </select>
                                        <span id="status_check" hidden class="text-danger" style="font-size:12px;">* Required, please input value</span>
                                    </div>
                                </div>
                                <div class="text-right mt-5">
                                    <button type="button" onclick="check_add();" class="btn btn-sm btn-primary w-24">Save</button>
                                    <a class="btn btn-sm btn-outline-secondary w-24 mr-1" href="{{url("$segment/$folder")}}">Cancel</a>
                                </div>
                            </div>
                            <!-- END: Form Layout -->
                        </div>
                    </div>
                </form>
                <!-- END: Content -->


            </div>
            
        </div>
       
        <!-- BEGIN: JS Assets-->
        @include("backend.layout.script")

        <script>
            var name = $('#name').val();
            var status_speical = $('#status_speical').val();
            var status = $('#status').val();
            function check_add(){
             name = $('#name').val();
             status_speical = $('#status_speical').val();
             status = $('#status').val();
            if (name == "" || status_speical == "" || status == "" ) {
                toastr.error('Please fill out the information completely.');
                return false;
            }
            // if(name == "" || status_speical == "" || status == "")
            // {
            //     if (name == "") { $('#name_check').attr('hidden',false); } else { $('#name_check').attr('hidden',true); }
            //     if (status_speical == "") { $('#status_speical_check').attr('hidden',false); } else { $('#status_speical_check').attr('hidden',true); }
            //     if (status == "") { $('#status_check').attr('hidden',false); } else { $('#status_check').attr('hidden',true); }
            //     return false;
            // }
            // else{
            //     $('#name_check').attr('hidden',true);
            //     $('#status_speical_check').attr('hidden',true);
            //     $('#status_check').attr('hidden',true);
            // }
            Swal.fire({
                title: 'Verify the information',
                text: "Please check the information completely. before saving",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Save',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        icon : 'warning',
                        title: 'Please waiting. . .',
                        html: 'The system is recording data.',
                        timer: 1000,
                        timerProgressBar: true,
                        didOpen: () => {
                            Swal.showLoading()
                        },
                        }).then((result) => {
                        if (result.dismiss === Swal.DismissReason.timer) 
                        {
                            $('#menuForm').submit();
                        }
                    })
                }
            })
        }
        </script>
        <!-- END: JS Assets-->
    </body>
</html>