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
                                    <div class="col-span-8 lg:col-span-6">
                                        <label for="validation-form-1" class="form-label w-full flex flex-col sm:flex-row text-primary">Image</label>
                                        <img src="@if($row->img == null){{url("noimage.jpg")}} @else {{url($row->img)}} @endif" class="img-thumbnail" id="preview">
                                    </div><br>
                                    <div class="col-span-12 lg:col-span-12">
                                        <div class="col-span-6 lg:col-span-6">
                                            <input type="file" name="image" id="image">
                                        </div>
                                    </div>
                                </div><br>
                                <div class="grid grid-cols-12 gap-6 mt-5 mb-3">
                                    <div class="col-span-4 lg:col-span-4">
                                        <label for="validation-form-1" class="form-label w-full flex flex-col sm:flex-row text-primary"> Category 
                                            <span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-slate-500">Required, please select category</span> 
                                        </label>
                                        <select class="form-control w-full" name="cat_id" id="category" required>
                                            @foreach ($category as $cat)
                                            <option value="{{$cat->id}}" @if($row->cat_id == $cat->id ) selected @endif>{{$cat->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-span-8 lg:col-span-4">
                                        <label for="validation-form-1" class="form-label w-full flex flex-col sm:flex-row text-primary"> Name 
                                            <span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-slate-500">Required, please input name food</span> 
                                        </label>
                                        <input type="text" id="name" name="name" class="form-control w-full" value="{{$row->name}}" required>
                                    </div>
                                    <div class="col-span-4 lg:col-span-4">
                                        <label for="validation-form-1" class="form-label w-full flex flex-col sm:flex-row text-primary"> Color </label>
                                        <input type="text" id="color" name="color" class="form-control w-full" value="{{$row->f_color}}">
                                    </div>
                                </div>
                                <div class="grid grid-cols-12 gap-6 mt-5 mb-3">
                                    <div class="col-span-12 lg:col-span-6">
                                        <label for="validation-form-1" class="form-label w-full flex flex-col sm:flex-row text-primary"> Price 
                                            <span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-slate-500">Required, please input price</span> 
                                        </label>
                                        <input type="text" id="price" name="price" class="form-control w-full" value="{{$row->price}}" required>
                                    </div>
                                    <div class="col-span-12 lg:col-span-6">
                                        <label for="validation-form-1" class="form-label w-full flex flex-col sm:flex-row text-primary"> Status 
                                            <span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-slate-500">Show in menu homepage</span> 
                                        </label>
                                        <select class="form-control w-full" name="status" id="status" required>
                                            <option value="on" @if($row->status == "on" ) selected @endif>on</option>
                                            <option value="off" @if($row->status == "off" ) selected @endif>off</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="text-right mt-5">
                                    <a class="btn btn-sm btn-outline-secondary w-24 mr-1" href="{{url("$segment/$folder")}}">Cancel</a>
                                    <button type="button" onclick="check_add();" class="btn btn-sm btn-primary w-24">Save</button>
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