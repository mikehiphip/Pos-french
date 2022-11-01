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
                    <div class="grid grid-cols-12 gap-6 mt-5">
                        <div class="intro-y col-span-12 lg:col-span-10">
                            <!-- BEGIN: Form Layout -->
                            <div class="intro-y box p-5">
                                <label class="form-label w-full flex flex-col sm:flex-row"><b>Order Number : </b> {{$row[0]->prefix}} </label>
                                 <label class="form-label w-full flex flex-col sm:flex-row"> <b>Customer Name : </b> {{$row[0]->cus_name}}</label>
                                 <label class="form-label w-full flex flex-col sm:flex-row"><b>Date : </b> {{date('d-m-Y H:i:s', strtotime($row[0]->o_created))}}</label> 
                                 <hr>
                                 <div class="table-responsive">
                                    <table class="table table-striped table-light" width="100%" >
                                        <thead>
                                            <tr role="row">
                                                <th class="text-center sorting_disabled" width="5%" >No.</th>
                                                <th class="text-center sorting_disabled" width="25%" >Image</th>
                                                <th class="text-center sorting_disabled" width="30%" >Detail</th>
                                                <th class="text-center sorting_disabled"width="15%">Quantity</th>
                                                <th class="text-center sorting_disabled"width="15%">Price</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($row as $o => $order)
                                            <tr>
                                                <td class="text-center">{{$o+1}}</td>
                                                <td class="text-center"><center><img src="{{$order->img}}" style="width:50%;"></center></td>
                                                <td>
                                                    Category : {{$order->cat_name}} <br>
                                                    Food : {{$order->fname}}
                                                </td>
                                                <td class="text-center">{{number_format($order->qty,0)}}</td>
                                                <td class="text-center">{{number_format($order->price,2)}}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                        <tr>
                                            <td colspan="3" class="text-right"> <b>Total</b></td>
                                            <td class="text-center"><b>{{number_format($order->total_qty,0)}}</b></td>
                                            <td class="text-center"><b>{{number_format($order->total_price,2)}}</b></td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="text-left mt-5">
                                    <a class="btn btn-sm btn-primary w-24 mr-1" href="{{url("$segment/$folder")}}">Back</a>
                                </div>
                                <input type="hidden" id="oid" value="{{$id}}">
                            </div>
                            <!-- END: Form Layout -->
                        </div>
                    </div>
                <!-- END: Content -->


            </div>
            
        </div>
       
        <!-- BEGIN: JS Assets-->
        @include("backend.layout.script")

        <script>
        var id = $('#oid').val();
        var fullUrl = ('webpanel/order/'+id);
        console.log(fullUrl)
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
                    url: fullUrl + "/datatable-view",
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
                    {data: 'img',    title :'Food', formatter:"html", vertAlign:"middle", hozAlign: "center", width:'20%',responsive:2}, // 1
                    {data: 'descript',    title :'Detail', formatter:"html", vertAlign:"middle", hozAlign: "center", width:'20%',responsive:2}, // 2
                    {data: 'qty',    title :'Quantity', formatter:"html", vertAlign:"middle", hozAlign: "center", width:'10%',responsive:2}, // 3
                    {data: 'price',    title :'Price', formatter:"html", vertAlign:"middle", hozAlign: "center", width:'10%',responsive:2}, // 4
                    ],
            });
            $('#search_button,#search_reset').on('click', function(e) {
                oTable.draw();
            });
            
        });
        </script>
        <!-- END: JS Assets-->
    </body>
</html>