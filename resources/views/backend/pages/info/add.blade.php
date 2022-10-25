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

                <form id="menuForm" method="post" action="" enctype="multipart/form-data">
                @csrf
                    <div class="grid grid-cols-12 gap-6 mt-5">
                        <div class="intro-y col-span-12 lg:col-span-10">
                            <!-- BEGIN: Form Layout -->
                            <div class="intro-y box p-5">
                                <div class="grid grid-cols-12 gap-6 mt-5 mb-3">
                                    <div class="col-span-4 lg:col-span-6">
                                        <label for="validation-form-1" class="form-label w-full flex flex-col sm:flex-row text-primary"> Employee ID 
                                            <span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-slate-500">Required, please input employee ID</span> 
                                        </label>
                                        <input type="text" id="emp_code" name="emp_code" class="form-control w-full" placeholder="" required>
                                    </div>
                                    <div class="col-span-4 lg:col-span-6">
                                        <label for="validation-form-1" class="form-label w-full flex flex-col sm:flex-row text-primary"> Department 
                                            <span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-slate-500">Required, please select department</span> 
                                        </label>
                                        <select name="de_id" id="de_id" required class="form-control w-full">
                                            <option value="" selected hidden>Please select</option>
                                            @foreach ($depart as $de)
                                            <option value="{{$de->id}}">{{$de->department}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="grid grid-cols-12 gap-6 mt-5 mb-3">
                                    <div class="col-span-8 lg:col-span-4">
                                        <label for="validation-form-1" class="form-label w-full flex flex-col sm:flex-row text-primary">First Name 
                                            <span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-slate-500">Required, please input first name</span> 
                                        </label>
                                        <input type="text" id="first_name" name="first_name" class="form-control w-full" placeholder="" required>
                                    </div>
                                    <div class="col-span-4 lg:col-span-4">
                                        <label for="validation-form-1" class="form-label w-full flex flex-col sm:flex-row text-primary">Last Name 
                                            <span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-slate-500">Required, please input last name</span> 
                                        </label>
                                        <input type="text" id="last_name" name="last_name" class="form-control w-full" placeholder="" required>
                                    </div>
                                    <div class="col-span-4 lg:col-span-4">
                                        <label for="validation-form-1" class="form-label w-full flex flex-col sm:flex-row text-primary"> Nickname </label>
                                        <input type="text" name="nickname" class="form-control w-full" placeholder="">
                                    </div>
                                </div>
                                <div class="grid grid-cols-12 gap-6 mt-5 mb-3">
                                    <div class="col-span-4 lg:col-span-4">
                                        <label for="validation-form-1" class="form-label w-full flex flex-col sm:flex-row text-primary"> Sex </label>
                                        <input type="radio" id="male" name="sex" value="male">
                                        <label for="male">Male</label>&nbsp;
                                        <input type="radio" id="female" name="sex" value="female">
                                        <label for="male">Female</label>&nbsp;
                                        <input type="radio" id="other" name="sex" value="other">
                                        <label for="other">Other</label>
                                    </div>
                                    <div class="col-span-4 lg:col-span-4">
                                        <label for="validation-form-1" class="form-label w-full flex flex-col sm:flex-row text-primary"> Age </label>
                                        <input type="text" name="age" class="form-control w-full" placeholder="">
                                    </div>
                                    <div class="col-span-4 lg:col-span-4">
                                        <label for="validation-form-1" class="form-label w-full flex flex-col sm:flex-row text-primary"> ID Card </label>
                                        <input type="text" name="card_id" class="form-control w-full" placeholder="" maxlength="13">
                                    </div>
                                </div>
                                <div class="grid grid-cols-12 gap-6 mt-5 mb-3">
                                    <div class="col-span-4 lg:col-span-4">
                                        <label for="validation-form-1" class="form-label w-full flex flex-col sm:flex-row text-primary"> Birth Day </label>
                                        <input type="date"  name="birthday" class="form-control w-full" placeholder="">
                                    </div>
                                    <div class="col-span-4 lg:col-span-4">
                                        <label for="validation-form-1" class="form-label w-full flex flex-col sm:flex-row text-primary"> Address </label>
                                        <textarea name="address" rows="3" class="form-control w-full"></textarea>
                                    </div>
                                    <div class="col-span-4 lg:col-span-4">
                                        <label for="validation-form-1" class="form-label w-full flex flex-col sm:flex-row text-primary"> Phone Number </label>
                                        <input type="text"  name="phone" class="form-control w-full" placeholder="" maxlength="10">
                                    </div>
                                </div>
                                <div class="grid grid-cols-12 gap-6 mt-5 mb-3">
                                    <div class="col-span-4 lg:col-span-4">
                                        <label for="validation-form-1" class="form-label w-full flex flex-col sm:flex-row text-primary">Start Time </label>
                                        <input type="time" min="09:00" max="18:00"  name="time_in" class="form-control w-full" >
                                    </div>
                                    <div class="col-span-4 lg:col-span-4">
                                        <label for="validation-form-1" class="form-label w-full flex flex-col sm:flex-row text-primary">Off Time </label>
                                        <input type="time" min="09:00" max="18:00"  name="time_out" class="form-control w-full" >
                                    </div>
                                    <div class="col-span-4 lg:col-span-4">
                                        <label for="validation-form-1" class="form-label w-full flex flex-col sm:flex-row text-primary"> Email</label>
                                        <input type="email"  name="email" class="form-control w-full" placeholder="">
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
        function check_add(){
            var name = $('#first_name').val();
            var last_name = $('#last_name').val();
            var emp_id = $('#emp_id').val();
            var de = $('#de_id').val();
            if (name == "" || emp_id == "" || last_name == "" || de == "") {
                toastr.error('Please fill out the information completely.');
                return false;
            }
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