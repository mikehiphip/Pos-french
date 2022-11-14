<!DOCTYPE html>
<html lang="en" class="light">
<!-- BEGIN: Head -->

<head>
    <!-- BEGIN: CSS Assets-->
    @include('backend.layout.css')
    <!-- END: CSS Assets-->
</head>
<!-- END: Head -->

<body class="py-5">
    <!-- BEGIN: Mobile Menu -->
    @include('backend.layout.mobile-menu')
    <!-- END: Mobile Menu -->
    <div class="flex">
        <!-- BEGIN: Side Menu -->
        @include('backend.layout.side-menu')
        <!-- END: Side Menu -->



        <div class="content">
            <!-- BEGIN: Top Bar -->
            @include('backend.layout.topbar')
            <!-- END: Top Bar -->


            <!-- BEGIN: Content -->
            <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
                <h2 class="text-lg font-medium mr-auto">
                    Food List
                </h2>
                <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
                    <a href="{{ url("$segment/$folder/add") }}"><button type="button"
                            class="btn btn-primary shadow-md mr-2">Add new food</button></a>
                </div>
            </div>

            <div class="intro-y box p-5 mt-5">
                <div class="flex flex-col sm:flex-row sm:items-end xl:items-start">
                    {{-- <div class="sm:flex items-center sm:mr-4">
                        <label class="w-12 flex-none xl:w-auto xl:flex-initial mr-2">Search</label>
                        <select id="search_choice" name="search_choice" class="myLike form-select w-full sm:w-32 2xl:w-full mt-2 sm:mt-0 sm:w-auto">
                            <option value="" selected>All</option>
                            <option value="name">Name</option>
                            <option value="sort">Sort</option>
                        </select>
                    </div>
                    <div class="sm:flex items-center sm:mr-4 mt-2 xl:mt-0">
                        <label class="w-12 flex-none xl:w-auto xl:flex-initial mr-2">Type</label>
                        <select id="search_type" name="search_type" class="myLike form-select w-full mt-2 sm:mt-0 sm:w-auto">
                            <option value="like" selected>like</option>
                            <option value="=">=</option>
                            <option value="<">&lt;</option>
                            <option value="<=">&lt;=</option>
                            <option value=">">></option>
                            <option value=">=">>=</option>
                            <option value="!=">!=</option>
                        </select>
                    </div> --}}
                    <div class="sm:flex items-center sm:mr-4 mt-2 xl:mt-0">
                        <label class="w-12 flex-none xl:w-auto xl:flex-initial mr-2">Search</label>
                        <input id="search_keyword" name="name" type="text" class="myLike form-control sm:w-40 2xl:w-full mt-2 sm:mt-0" placeholder="Name">
                    </div>
                    <div class="mt-2 xl:mt-0">
                        <button id="search_button" name="search_button" onclick="search_datatable()" type="button" class="btn btn-primary w-full sm:w-16">Search</button>
                        <button id="search_reset" name="search_reset" onclick="reset_datatable()" type="button" class="btn btn-secondary w-full sm:w-16 mt-2 sm:mt-0 sm:ml-1">Reset</button>
                    </div>
                </div>
                <table id="data-table" class="table nowrap " style=" width: 100%;"></table>
            </div>
            <!-- END: Content -->
            
        </div>

    </div>

    <div id="show_modal" class="modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-body p-10 text-center"> This is totally awesome superlarge modal! </div>
            </div>
        </div>
    </div>
    <!-- End Modal -->
    
    <!-- BEGIN: JS Assets-->
    
    @include('backend.layout.script')
    <script>
        var fullUrl = window.location.origin + window.location.pathname;
        $(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            oTable = $('#data-table').DataTable({
                "sDom": "<'row'<'col-sm-12' tr>><'row'<'col-sm-5'i><'col-sm-7'p>>",
                processing: true,
                serverSide: true,
                stateSave: true,
                scroller: true,
                scrollCollapse: true,
                scrollX: true,
                ordering: true,
                bInfo: true,

                // scrollY: '' + ($(window).height() - 370) + 'px',
                iDisplayLength: 25,
                ajax: {
                    url: fullUrl + "/datatable",
                 
                    data: function(d) {
                        d.Like = {};
                        $('.myLike').each(function() {
                            if ($.trim($(this).val()) && $.trim($(this).val()) != '0') {
                                d.Like[$(this).attr('name')] = $.trim($(this)
                                    .val());
                            }
                        });
                        oData = d
                    },
                    method: 'POST'
                },
                
                columns:[
                    {data: 'DT_RowIndex',    title :'<center>No.</center>',   width:'5%', hozAlign: "center", vertAlign:"middle"}, // 0
                    {data: 'img',   title :'<center>Image</center>', minWidth: 100, vertAlign:"middle" , formatter:"html",  width:'15%',responsive:1}, // 1
                    {data: 'name',    title :'Name', formatter:"html", vertAlign:"middle", hozAlign: "center", width:'15%',responsive:2}, // 2
                    {data: 'price',    title :'Price', formatter:"html", vertAlign:"middle", hozAlign: "center", width:'15%',responsive:2}, // 3
                    {data: 'category',    title :'Category', formatter:"html", vertAlign:"middle", hozAlign: "center", width:'15%',responsive:2}, // 2
                    {data: 'subcategory',    title :'Subcategory', formatter:"html", vertAlign:"middle", hozAlign: "center", width:'15%',responsive:2}, // 2
                    {data: 'status',    title :'Status', formatter:"html", vertAlign:"middle",  hozAlign: "center",    width:'5%'}, // 4
                    {data: 'action',    title :'Action', formatter:"html", vertAlign:"middle",  hozAlign: "center",    width:'20%'}, // 5
                    ],
            });
            $('#search_button,#search_reset').on('click', function(e) {
                oTable.draw();
            });
            
        });
        function search_datatable()
        {
            getdatatable();
        }
        function reset_datatable()
        {
            $('#search_choice').val(null),
            $('#search_type').val("like"),
            $('#search_keyword').val(null),
            getdatatable();
        }
        function deleteItem(ids) {
            const id = [ids];
            if (id.length > 0) {
                destroy(id)
            }
        }

        function destroy(id) {
            Swal.fire({
                title: "Delete Data",
                text: "Do you want to delete data?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                showLoaderOnConfirm: true,
                preConfirm: () => {
                    return fetch(fullUrl + '/destroy/'+id)
                        .then(response => response.json())
                        .then(data => location.reload())
                        .catch(error => {
                            Swal.showValidationMessage(`Request failed: ${error}`)
                        })
                }
            });
        }
    </script>
    <!-- END: JS Assets-->
</body>

</html>

