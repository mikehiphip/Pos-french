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
                                <div class="col-span-8 lg:col-span-4">
                                    <label for="validation-form-1" class="form-label w-full flex flex-col sm:flex-row text-primary"> Name 
                                        <span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-slate-500">Required, please input name customer</span> 
                                    </label>
                                    <input type="text" id="name" name="name" class="form-control w-full" placeholder="" required value="{{$cus->name}}">
                                </div>
                                <div class="col-span-4 lg:col-span-4">
                                    <label for="validation-form-1" class="form-label w-full flex flex-col sm:flex-row text-primary"> Company </label>
                                    <input type="text"  name="company" class="form-control w-full"  value="{{$cus->company}}">
                                </div>
                                <div class="col-span-12 lg:col-span-4">
                                    <label for="validation-form-1" class="form-label w-full flex flex-col sm:flex-row text-primary">Static 
                                    </label>
                                    <input type="number" name="static" class="form-control w-full" minlength="0"  value="{{$cus->static}}" >
                                </div>
                            </div>
                            <div class="grid grid-cols-12 gap-6 mt-5 mb-3">
                                <div class="col-span-4 lg:col-span-4">
                                    <label for="validation-form-1" class="form-label w-full flex flex-col sm:flex-row text-primary"> N </label>
                                    <input type="text" name="n" class="form-control w-full"  value="{{$cus->n}}">
                                </div>
                                <div class="col-span-4 lg:col-span-4">
                                    <label for="validation-form-1" class="form-label w-full flex flex-col sm:flex-row text-primary"> Street </label>
                                    <input type="text" name="street" class="form-control w-full"  value="{{$cus->street}}">
                                </div>
                                <div class="col-span-4 lg:col-span-4">
                                    <label for="validation-form-1" class="form-label w-full flex flex-col sm:flex-row text-primary"> PC </label>
                                    <input type="text" name="pc" class="form-control w-full"  value="{{$cus->pc}}">
                                </div>
                            </div>
                            <div class="grid grid-cols-12 gap-6 mt-5 mb-3">
                                <div class="col-span-4 lg:col-span-4">
                                    <label for="validation-form-1" class="form-label w-full flex flex-col sm:flex-row text-primary"> City </label>
                                    <input type="text" name="city" class="form-control w-full"  value="{{$cus->city}}">
                                </div>
                                <div class="col-span-4 lg:col-span-4">
                                    <label for="validation-form-1" class="form-label w-full flex flex-col sm:flex-row text-primary"> Maps </label>
                                    <input type="text" name="maps" class="form-control w-full"  value="{{$cus->maps}}">
                                </div>
                                <div class="col-span-4 lg:col-span-4">
                                    <label for="validation-form-1" class="form-label w-full flex flex-col sm:flex-row text-primary"> Build </label>
                                    <input type="text" name="build" class="form-control w-full"  value="{{$cus->build}}">
                                </div>
                            </div>
                            <div class="grid grid-cols-12 gap-6 mt-5 mb-3">
                                <div class="col-span-4 lg:col-span-4">
                                    <label for="validation-form-1" class="form-label w-full flex flex-col sm:flex-row text-primary"> Stairs </label>
                                    <input type="text"  name="stairs" class="form-control w-full"  value="{{$cus->stairs}}">
                                </div>
                                <div class="col-span-4 lg:col-span-4">
                                    <label for="validation-form-1" class="form-label w-full flex flex-col sm:flex-row text-primary"> Floor </label>
                                    <input type="text"  name="floor" class="form-control w-full"  value="{{$cus->floor}}">
                                </div>
                                <div class="col-span-4 lg:col-span-4">
                                    <label for="validation-form-1" class="form-label w-full flex flex-col sm:flex-row text-primary"> Door </label>
                                    <input type="text"  name="door" class="form-control w-full"  value="{{$cus->door}}">
                                </div>
                            </div>
                            <div class="grid grid-cols-12 gap-6 mt-5 mb-3">
                                <div class="col-span-4 lg:col-span-4">
                                    <label for="validation-form-1" class="form-label w-full flex flex-col sm:flex-row text-primary"> Code1 </label>
                                    <input type="text"  name="code1" class="form-control w-full"  value="{{$cus->code1}}">
                                </div>
                                <div class="col-span-4 lg:col-span-4">
                                    <label for="validation-form-1" class="form-label w-full flex flex-col sm:flex-row text-primary"> Code2 </label>
                                    <input type="text"  name="code2" class="form-control w-full"  value="{{$cus->code2}}">
                                </div>
                                <div class="col-span-4 lg:col-span-4">
                                    <label for="validation-form-1" class="form-label w-full flex flex-col sm:flex-row text-primary"> Intvw </label>
                                    <input type="text"  name="intvw" class="form-control w-full"  value="{{$cus->intvw}}">
                                </div>
                            </div>
                            <div class="grid grid-cols-12 gap-6 mt-5 mb-3">
                                <div class="col-span-4 lg:col-span-4">
                                    <label for="validation-form-1" class="form-label w-full flex flex-col sm:flex-row text-primary"> Time </label>
                                    <input type="time" min="09:00" max="18:00" name="time" class="form-control w-full"  value="{{$cus->time}}">
                                </div>
                                <div class="col-span-4 lg:col-span-4">
                                    <label for="validation-form-1" class="form-label w-full flex flex-col sm:flex-row text-primary"> Note </label>
                                    <input type="text"  name="note" class="form-control w-full"  value="{{$cus->note}}">
                                </div>
                                <div class="col-span-4 lg:col-span-4">
                                    <label for="validation-form-1" class="form-label w-full flex flex-col sm:flex-row text-primary"> Order Note2 </label>
                                    <input type="text"  name="order_note" class="form-control w-full"  value="{{$cus->order_note}}">
                                </div>
                            </div>
                            <div class="grid grid-cols-12 gap-6 mt-5 mb-3">
                                <div class="col-span-4 lg:col-span-8">
                                    <label for="validation-form-1" class="form-label w-full flex flex-col sm:flex-row text-primary"> Customer Info </label>
                                    <input type="text"  name="info" class="form-control w-full"  value="{{$cus->info}}">
                                </div>
                                <div class="col-span-4 lg:col-span-4">
                                    <label for="validation-form-1" class="form-label w-full flex flex-col sm:flex-row text-primary"> Email Address </label>
                                    <input type="email"  name="email" class="form-control w-full"  value="{{$cus->email}}">
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
            var name = $('#name').val();
            var status = $('#status').val();
            var category = $('#category').val();
            if (name == "" || status == "" || category == "" ) {
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
        $("#image").on('change', function() {
            var $this = $(this)
            const input = $this[0];
            const fileName = $this.val().split("\\").pop();
            $this.siblings(".custom-file-label").addClass("selected").html(fileName)
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#preview').attr('src', e.target.result).fadeIn('fast');
                }
                reader.readAsDataURL(input.files[0]);
            }
        });
        </script>
        <!-- END: JS Assets-->
    </body>
</html>