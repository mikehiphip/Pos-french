<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>@include("$prefix.inc_header")</head>

<script src="{{asset('frontend/js/bootstrap.min.js')}}"></script>

<body>
    @include("$prefix.inc_topmenu")

<div class="container-fluid">
    <div class="wrap-pad">
    <div class="order-info">
        <div class="row">
            <div class="col-xxl-9 col-xl-8 col-lg-8 col-md-9 p-0">
                <div class="allinfo-leftbar">
                <div class="info-leftbar">
                    <div class="input-top">
                        <img src="frontend/images/icon index/flat-color-icons_businessman.svg">
                        <div class="allinput-top">
                            <input type="text" class="input1"></input>
                            <input type="text" class="input2"></input>
                            <input type="time" class="input3"></input>
                            <button class="chang-item" id="employer">A Employer</button>
                            <input type="text" class="input4"></input>
                            <input type="time" class="input5"></input>
                        </div>
                        <div class="allinput-top2">
                            <button class="date"><img src="frontend/images/icon index/calendar.svg"></button>
                            <button class="date"><img src="frontend/images/icon index/time.svg"></button>
                        </div>
                        <div class="allinput-top3">
                            <input type="text" class="input8"></input>
                            <input type="text" class="input9"></input>
                            <button class="date">F2: Reprendre<br>this call</button>
                        </div>
                    </div>
                    <div class="tel-serve">
                        <p class="tel">Tel.</p>
                        <div class="check-s"><input type="checkbox" class="serve">serve</input></div>
                    </div>
                    <form action="javascript:void(0)" method="POST" id="Menu_form" onSubmit="JavaScript:return fncSubmit();">
                    @csrf
                    <div class="allinput-middle">
                        <div class="row">
                            <div class="col-xxl-3 col-xl-3 col-lg-3">
                            <div class="input-middle2">
                            <div class="middle-form">
                                <input type="text" class="form1" id="main_phone" readonly name="main_p" required></input><br>
                                {{-- <input type="text" class="form2"></input><br> --}}
                                {{-- <input type="text" class="form3"></input><br> --}}
                            </div>
                            <div class="middle-form" style="height:200px;overflow-y: scroll;background:white;width:82.5%;margin-top: 5px;margin-bottom:5px;">
                                <table class="table table-borderless" id="show_phone"></table>
                                {{-- <input type="text" class="form1"></input><br> --}}
                                {{-- <input type="text" class="form2"></input><br> --}}
                                {{-- <input type="text" class="form3"></input><br> --}}
                            </div>
                            <div class="middle-form">
                                {{-- <input type="text" class="form1"></input><br> --}}
                                {{-- <input type="text" class="form2"></input><br> --}}
                                <input type="text" class="form3" id="phone"></input><br>
                            </div>
                            <div class="middle-btn">
                                <button class="add-btn" onclick="add_phone()" type="button">Add</button>
                                <button class="add-btn" type="reset" value="Reset" type="button" onclick="reset_phone()">Reset</button>
                                <button class="add-btn" type="button" onclick="select_phone()">Tel Principle</button>
                            </div>
                        </div>
                            </div>
                            <div class="col-xxl-7 col-xl-7 col-lg-7 p-0">
                            <div class="input-middle2">
                            <div class="status">
                                <h4>Deliveryman</h4>
                            </div>
                            <div class="name-btn">
                                <div class="name-info">
                                    <label for="name">Name</label>
                                    <input type="text" class="name1" name="name" id="name_data"></input><br>
                                    <label for="Company">Company</label>
                                    <input type="text" class="name2" name="company" id="company_data"></input>
                                </div>
                                <div class="btn-name">
                                    <div class="static">
                                        <label for="text">Static</label><br>
                                        <input type="text" class="Static" placeholder="0" name="static" id="static_data"></input>
                                    </div>
                                    <button class="f" type="button" data-toggle="modal" data-target="#customerModal" >Customer</button>
                                    <button class="f" type="submit">Save<br>Custome</button>
                                </div>
                            </div>
                            <div class="N-Street">
                                <label for="text">Street</label>
                                <input type="text" class="Street" name="street"></input>
                                <label for="text" >N”</label>
                                <input type="text" class="Same" name="nn" ></input>
                            </div>
                            <div class="pc-city-maps">
                                <label for="text" class="Same-t">PC</label>
                                <input type="text" class="Same" name="pc" id="code_zone" onkeyup="select_zone()"></input>
                                <label for="text">City</label>
                                <input type="text" class="City text-center" name="city_select" id="city"></input>
                                <label for="text">Zone</label>
                                <input type="text" class="Same-M text-center" name="zone_select" id="zone"></input>
                            </div>
                            <div class="row-5">
                                <label for="text">Build</label>
                                <input type="text" class="Same" name="build"></input>
                                <label for="text">Stairs</label>
                                <input type="text" class="Same-r" name="stairs"></input>
                                <label for="text" class="Floor">Floor</label>
                                <input type="text" class="Same-r" name="floor"></input>
                                <label for="text"  class="Door">Door</label>
                                <input type="text" class="Door" name="door"></input>
                            </div>
                            <div class="row-6">
                                <label for="text" class="Code1">Code1</label>
                                <input type="text" class="Same" name="code1"></input>
                                <label for="text" class="Code2">Code2</label>
                                <input type="text" class="Same-r" name="code2"></input>
                                <label for="text" class="INTVW">Intvw</label>
                                <input type="text" class="Same-r" name="intvw"></input>
                                <label for="text" class="Time">Time</label>
                                <input type="text" class="Same-r" name="time"></input>
                            </div>
                            <div class="row-7">
                                <label for="text" class="Note">Note</label>
                                <input type="text" class="Same-N" name="note"></input><br>
                                <label for="text" class="Ordernote">Order note2</label>
                                <input type="text" class="Same-r7" name="order_note"></input><br>
                                <label for="text" class="Customerinfo">Customer info</label>
                                <input type="text" class="Same-r7" name="info"></input><br>
                                <label for="text" class="Customer-E">Customer email address</label>
                                <input type="text" class="Cus-E" name="email"></input>
                            </div>
                            <div class="num-id">
                                <div class="n0">
                                    <p>Number</p>
                                    <p>0</p>
                                </div>
                                <div class="n0">
                                    <p>ID</p>
                                    <p>0</p>
                                </div>
                                <div class="n0">
                                    <p>Cart</p>
                                    <p>0</p>
                                </div>
                                <div class="n0">
                                    <p>Points</p>
                                    <p>0</p>
                                </div>
                                <button class="f">Last time</button>
                            </div>
                        </div>
                            </div>
                            <div class="col-xxl-2 col-xl-2 col-lg-2">
                            <div class="input-middle3">
                            {{-- <select name="zone" id="zone">
                                <option value="Zone1">Zone1</option>
                                <option value="#">#</option>
                                <option value="#">#</option>
                                <option value="#">#</option>
                            </select> --}}
                            <select name="pay">
                                <option value="" hidden>Payment</option>
                                @foreach($payment as $pay)
                                <option class="text-center" value="{{$pay->id}}">{{$pay->pay}}</option>
                                @endforeach
                            </select>
                            <input type="text" class="Retrieve1 text-center" placeholder="0" id="delivery" name="charge"></input>
                            {{-- <button class="info1">+ / -</button> --}}
                            <button class="info" type="button">History</button>
                        </div>
                            </div>
                        </div>
                    </div>
                    </form>

                    <!-- button to menu -->
                    <div class="input-info">
                        <div class="menu-btn">
                            <div class="all-menu-btn">
                                <div class="To-menu">
                                    <a class="tomenu" href="{{url('menu')}}"><img src="frontend/images/icon index/bxs_food-menu.svg">MENU</a>
                                </div>
                                {{-- <button class="choosemenu-btn">F4 Choose<br>component</button> --}}
                                {{-- <button class="choosemenu-btn">F3 Choose<br>component </button> --}}
                                <button class="choosemenu-btn" onclick="CancelFree()">Cancel Free</button>
                                {{-- <button class="choosemenu-btn">Delete<br>Line</button> --}}
                                <button class="choosemenu-btn" onclick="FreePirce()">Free ok</button>
                            </div>
                            <div class="all-choosemenu">
                                <button class="choosemenu-btn" data-toggle="modal" onclick="get_note()" data-target="#keyboardModal" id="btn_note" disabled>Note<br>Line</button>
                                <button class="choosemenu-btn" onclick="DelLine()">Delete<br>Line</button>
                                {{-- <button class="choosemenu-btn">Delete<br>Line</button> --}}
                                <button class="choosemenu-btn" onclick="DelAll()">Delete<br>All</button>
                            </div>
                        </div>
                    </div>
                    <!-- scroll Table -->
                    <form action="javascript:void(0)" method="POST" id="Form_test" onSubmit="JavaScript:return OrderSubmit({{count($pointer)}});">
                    @csrf
                        <div class="table-info">
                            <div class="table-scroll">
                                <table class="table">
                                    <thead class="thead-light">
                                        <tr>
                                            <th scope="col" class="code"><button>Code</button></th>
                                            <th scope="col" class="search">
                                                Description
                                            </th>
                                            <th scope="col" class="pq"><button>Price</button></th>
                                            <th scope="col" class="pq"><button>Qty</button></th>
                                            <th scope="col" class="pq"><button>Price</button></th>
                                            <th scope="col" class="note"><button>Note: type + to add Type - to remove Type / to Haif Haif</button></th>
                                            {{-- <th scope="col" class="sm"><button>S</button></th> --}}
                                            {{-- <th scope="col" class="sm"><button>M</button></th> --}}
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $count_r = 1; 
                                            $total = 0;
                                            $ready = 0;
                                        ?>
                                         <input id="disc" type="hidden" value="0" name="disscount">
                                         <input type="hidden" id="cus_id" name="cusid">
                                         <input type="hidden" id="type" name="type">
                                        @foreach($pointer as $r => $data)
                                            @foreach($data as $d => $dat)
                                            <?php $total +=  $qty_num[$r][$d] * ($qty_price[$r][$d]*$discount); 
                                                $ready += $qty_price[$r][$d]-($qty_price[$r][$d]*$discount);
                                            ?>
                                            <tr onclick="check_active({{$count_r}},{{$r}},{{$d}})">
                                                <th scope="row"><input type="radio" name="click" id="ch{{$count_r}}" value="{{$count_r}}"> {{$count_r}}</th>
                                                <td>{{$food_name[$r][$d]}}</td>
                                                <input type="hidden" name="food_id[]" value="{{$row[$r][$d]}}">
                                                <td id="price{{$count_r}}">{{number_format(($qty_price[$r][$d]*$discount),2)}}</td>
                                                <input type="hidden" id="v_price{{$count_r}}" value="{{$qty_price[$r][$d]}}" name="p_qty[]">
                                                <input type="hidden" id="free_p{{$count_r}}" value="{{$qty_price[$r][$d]}}" name="free_product[]">
                                                <td class="text-center" >{{$qty_num[$r][$d]}} </td>
                                                <input type="hidden" name="qty_nump[]" value="{{$qty_num[$r][$d]}}">
                                                <td id="sum_qty{{$count_r}}">{{number_format(($qty_num[$r][$d] *($qty_price[$r][$d]*$discount)),2)}}</td>
                                                <input type="hidden" id="price_qty{{$count_r}}" value="{{$qty_num[$r][$d] * $qty_price[$r][$d]}}" name="total_qty[]">
                                                <td ><?php $note_text = ''; $m = 0?>
                                                    @if(isset($note[$r][$pointer[$r][$d]])) 
                                                    @foreach($note[$r][$pointer[$r][$d]] as $n)
                                                    @if($m <= count($note[$r][$pointer[$r][$d]])-2) {{$n.' '}} @else <?php $note_text = $n; ?>@endif
                                                    <?php $m++; ?>
                                                    @endforeach
                                                    @endif
                                                    <input type="hidden" id="hideNote{{$count_r}}" value="{{$note_text}}" name="note_text[]" readonly>
                                                    <label id="adNote{{$count_r}}">{{$note_text}}</label></td>
                                            </tr>
                                            <?php $count_r++ ?>
                                            @endforeach
                                        @endforeach
                                        {{-- <tr>
                                            <th scope="row">2</th>
                                            <td>#</td>
                                            <td>#</td>
                                            <td>#</td>
                                            <td>#</td>
                                            <td>#</td>
                                            <td>#</td>
                                        </tr>--}}
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="Allinfo-bottom">
                            <div class="row">
                                <div class="col-xxl-9 col-xl-9 col-lg-9">
                                    <div class="info-bottom-l">
                                        <div class="show-info1">
                                            {{-- <div class="S-Checkbox">
                                                <p>Static</p>
                                                <input type="checkbox" class="check"></input>
                                            </div>
                                            <div class="show-number">
                                                <input type="text" readonly placeholder="info">
                                            </div> --}}
                                        </div>
                                        <div class="show-info2" >
                                            <div class="S-Checkbox2" >
                                                <div class="row">
                                                    <div class="col-lg-8">
                                                        <div class="row">
                                                            {{-- <div class="col-lg-5 mt-1">
                                                                Pt-cde
                                                            </div>
                                                            <div class="col-lg-6 mt-1">
                                                                0
                                                            </div> --}}
                                                            <div class="col-lg-5 mt-1">
                                                                Reduc%
                                                            </div>
                                                            <div class="col-lg-6 mt-1">
                                                                <input type="number" min="0" id="discount"  class="form-control" style="height: 70%;width:65%;" max="100" onkeyup="check_discount()" value="{{$dis_value}}">
                                                            </div>
                                                            <div class="col-lg-5 mt-1">
                                                                Already dec
                                                            </div>
                                                            <div class="col-lg-6 mt-1" id="per_dis">
                                                                {{number_format($ready,2)}}
                                                            </div>
                                                            <div class="col-lg-5 mt-1"></div>
                                                            <div class="col-lg-6 mt-1"></div>
                                                            <div class="col-lg-5 mt-1"></div>
                                                            <div class="col-lg-6 mt-1"></div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="S-Checkbox3">
                                                            <button onclick="CalDis()">Apply<br>reduce</button>
                                                            <button onclick="CancelDis()">Cancel<br>Discount</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="show-info3">
                                            {{-- <div class="S-Checkbox3">
                                                <button>Apply<br>reduce</button>
                                                <button>Cancel<br>Discount</button>
                                            </div> --}}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xxl-3 col-xl-3 col-lg-3">
                                    <div class="info-bottom-r">
                                        <p class="paynum" id="sum_pay">{{number_format($total,2)}}</p>
                                        <input type="hidden" id="payment" value="{{$total}}" name="total_paid">
                                        <div class="pay">
                                            <p>Pay</p>
                                            <p id="sum_pay2">{{number_format($total,2)}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                </div>
            </div>

        <!-- button rightbar -->
        <div class="col-xxl-3 col-xl-4 col-lg-4 col-md-3 pr-0">
        <div class="info-rightbar">
            <div class="btn-order">
                <button class="btn1" onclick="change_modeButton(0)"><img src="frontend/images/icon index/EditMOTO 1.svg"><br> F9 New OrdDeliv
                </button>
                <button class="btn2" onclick="change_modeButton(1)"><img src="frontend/images/icon index/new ord.svg"><br>New<br>Ord Take</button>
                <button class="btn3" onclick="change_modeButton(2)"><img src="frontend/images/icon index/ic_baseline-table-restaurant.svg"><br>New<br>Ord On</button>
                <div class="btn-noactive"><img src="frontend/images/icon index/fa6-solid_map-location-dot.svg"><br>Locate address</div>
                <button class="btn5">Exit <img src="frontend/images/icon index/exit.svg"> </button>
                <button class="btn6" type="button" onclick="SaveOrder()"><img src="frontend/images/icon index/zondicons_save-disk.svg"><br>F12Save</button>
                <button class="btn7"><img src="frontend/images/icon index/Print.svg"><br>F6  Ticket</button>
                <div class="btn-noactive"><img src="frontend/images/icon index/treat.svg"><br>F7 Treat</div>
                <button class="btn9"><img src="frontend/images/icon index/Frame clash.svg"><br>F8 Cash</button>
                <!-- Button trigger modal -->
                <button type="button" class="btn10 btn-primary" data-toggle="modal" data-target="#OPmodal"><img src="frontend/images/icon index/flat-color-icons_settings.svg"><br>Option</button>
                <!-- Modal -->
                <div class="modal fade" id="OPmodal" tabindex="-1" aria-labelledby="OPmodal" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <p class="modal-title" id="ModalLabel">Screen movable</p>
                                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">Exit <img src="frontend/images/icon menu/exit_white.svg"></button>
                            </div>
                            <div class="modal-body">
                                <div class="op-btn-1">
                                    <button class="op-w"><img src="frontend/images/icon modal/r1-1.svg"><br>Label boxes</button>
                                    <button class="op-w"><img src="frontend/images/icon modal/r1-2.svg"><br>reduced the bill</button>
                                    <button class="op-w"><img src="frontend/images/icon modal/r1-3.svg"><br>Check Stock</button>
                                    <button class="op-w"><img src="frontend/images/icon modal/r1-4.svg"><br>Cancel the order</button>
                                </div>
                                <div class="op-btn-2">
                                    <button class="op-w"><img src="frontend/images/icon modal/r2-1.svg"><br>Message Kitchen</button>
                                    <button class="op-w"><img src="frontend/images/icon modal/r2-2.svg"><br>Ticket Pdf</button>
                                    <button class="op-w2"><img src="frontend/images/icon modal/r2-3.svg"><br>F2 : Sales listings</button>
                                </div>
                                <div class="op-btn-3">
                                    <button class="op-w3" onclick="window.location.href='{{url('webpanel/login')}}';">Mode Normal</button>
                                    <button class="op-w"><img src="frontend/images/icon modal/r3-1.svg"><br>Customer Ticket</button>
                                    <button class="op-w3"><img src="frontend/images/icon modal/r1-3.svg"><br>F8 : Product</button>
                                    <button class="op-w3"><img src="frontend/images/icon modal/r3-2.svg"><br>Help</button>
                                </div>
                                <div class="op-btn-4">
                                    <button class="op-w"><img src="frontend/images/icon modal/r4-1.svg"><br>Customer SMS</button>
                                    <button class="op-w"><img src="frontend/images/icon modal/r4-2.svg"><br>Customer Mail</button>
                                    <button class="op-w3">Display Screen</button>
                                    <button class="op-w3"><img src="frontend/images/icon modal/r4-3.svg"><br>Manuel</button>
                                </div>
                                <div class="op-btn-5">
                                    <button class="op-w"><img src="frontend/images/icon modal/r5-1.svg"><br>Deliveryman<br>SMS</button>
                                    <button class="op-w"><img src="frontend/images/icon modal/r5-2.svg"><br>Deliveryman<br>Mail</button>
                                    <button class="op-w2"><img src="frontend/images/icon modal/r5-3.svg"><br>Settings</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <button class="btn11"><img src="frontend/images/icon index/Frame clash.svg"><br>Cash drawer</button>
                <button class="btn12"><img src="frontend/images/icon index/ticket kitchen.svg"><br>Ticket Kitchen</button>
                <div class="btn13"></div>
                <a class="btn14" href="summary.php"><img src="frontend/images/icon index/stoplesssion.svg"><br>Summary</a>
                <!-- Button trigger modal2 -->
                <button  type="button" class="btn15 btn-primary" data-toggle="modal" data-target="#STmodal"><img src="frontend/images/icon index/stop session.svg"><br>STOP SESSION</button>
                <!-- Modal2 -->
                <div class="modal fade" id="STmodal" tabindex="-1" aria-labelledby="STmodal" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-body-ST">
                                <div class="head-st">
                                    <div class="box-st1">
                                        <p class="modal-title-ST" id="ModalLabel-ST">Static</p>
                                        <p class="box-st1-p">name static</p>
                                    </div>
                                    <div class="box-st2">
                                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">Exit <img src="frontend/images/icon menu/exit_white.svg"></button>
                                    </div>
                                </div>
                                <div class="nb-btn-st">
                                    <div class="number-st">
                                        <div class="number1">
                                            <div class="show-passe">
                                            <p>PASSE</p>
                                            </div>
                                            <div class="numberLR">
                                                <div class="n-lr-p">
                                                    <p>0.00</p>
                                                </div>
                                                <div class="n-lr-p">
                                                    <p>0.00</p>
                                                </div>
                                            </div>
                                            <div class="all-numberST">
                                                <button class="N-st">7</button>
                                                <button class="N-st">8</button>
                                                <button class="N-st">9</button>
                                                <button class="N-st">C</button>
                                                <button class="N-st">4</button>
                                                <button class="N-st">5</button>
                                                <button class="N-st">6</button>
                                                <button class="N-st"><img src="frontend/images/icon modal/icon-st1.svg"></button>
                                                <button class="N-st">1</button>
                                                <button class="N-st">2</button>
                                                <button class="N-st">3</button>
                                                <button class="N-st-cl">Majus</button>
                                            </div>
                                        </div>
                                        <div class="number2">
                                            <button class="btn-st"><img src="frontend/images/icon modal/icon-st2.svg"><br>Ticket Kitchen</button>
                                            <button class="btn-st"><img src="frontend/images/icon modal/icon-st3.svg"><br>Ticket Kitchen</button>
                                            <button class="btn-st"><img src="frontend/images/icon modal/icon-st4.svg"><br>Ticket Kitchen</button>
                                            <button class="btn-st"><img src="frontend/images/icon modal/icon-st5.svg"><br>Ticket Kitchen</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="btn-st2">
                                    <button class="N-st">0</button>
                                    <button class="N-st-b">F6:basculer entre<br>le passé et le badge</button>
                                </div>
                                <div class="modal-footer">
                                    <input type="checkbox" class="btn-checkbox"> Save login and pass</input>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="service-Jour-btn">
                <p>Service<br>Jour</p>
                <button class="blue-btn" type="button" onclick="Service_data(1)">Inprogress</button>
                <button class="blue-btn" type="button" onclick="Service_data(2)">Completed</button>
                <button class="blue-btn" type="button" onclick="Service_data(3)">Service</button>
                <button class="blue-btn" type="button" onclick="Service_data(4)">Daytime</button>
            </div>
            <div class="table-info">
                <div class="table-scroll-2">
                    <table class="table" style="overflow-y: scroll;" >
                        <thead class="thead-light">
                            <tr>
                                <th scope="col"><button>Co</button></th>
                                <th scope="col"><button>Cmd</button></th>
                                <th scope="col"><button>Time</button></th>
                                <th scope="col"><button>Qty</button></th>
                                <th scope="col"><button>Customer</button></th>
                                <th scope="col"><button>Staff</button></th>
                                <th scope="col" class="zone">
                                <input type="number" id="quantity" name="quantity" min="1" max="100" placeholder="Zone"></th>
                                <th scope="col"><button>Size</button></th>
                                <th scope="col"><button>Ok</button></th>
                            </tr>
                        </thead>
                        <tbody id="show_service">
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        </div>
        </div>
    </div>
    </div>
</div>
  <!-- Modal Keyboard -->
  <div class="modal fade bd-example-modal-lg" id="keyboardModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-body">
         <div class="row">
            <div class="col-lg-12">
              <input type="text" class="form-control m-1" id="note" value=""  readonly>
            </div>
            <div class="col-lg-9 text-center">
                <button class="btn btn-primary m-1" onclick="add_note('Q')" style="width:7%;color:black;">Q</button>
                <button class="btn btn-primary m-1" onclick="add_note('W')" style="width:7%;color:black;">W</button>
                <button class="btn btn-primary m-1" onclick="add_note('E')" style="width:7%;color:black;">E</button>
                <button class="btn btn-primary m-1" onclick="add_note('R')" style="width:7%;color:black;">R</button>
                <button class="btn btn-primary m-1" onclick="add_note('T')" style="width:7%;color:black;">T</button>
                <button class="btn btn-primary m-1" onclick="add_note('Y')" style="width:7%;color:black;">Y</button>
                <button class="btn btn-primary m-1" onclick="add_note('U')" style="width:7%;color:black;">U</button>
                <button class="btn btn-primary m-1" onclick="add_note('I')" style="width:7%;color:black;">I</button>
                <button class="btn btn-primary m-1" onclick="add_note('O')" style="width:7%;color:black;">O</button>
                <button class="btn btn-primary m-1" onclick="add_note('P')" style="width:7%;color:black;">P</button><br>
                <button class="btn btn-primary m-1" onclick="add_note('A')" style="width:7%;color:black;">A</button>
                <button class="btn btn-primary m-1" onclick="add_note('S')" style="width:7%;color:black;">S</button>
                <button class="btn btn-primary m-1" onclick="add_note('D')" style="width:7%;color:black;">D</button>
                <button class="btn btn-primary m-1" onclick="add_note('F')" style="width:7%;color:black;">F</button>
                <button class="btn btn-primary m-1" onclick="add_note('G')" style="width:7%;color:black;">G</button>
                <button class="btn btn-primary m-1" onclick="add_note('H')" style="width:7%;color:black;">H</button>
                <button class="btn btn-primary m-1" onclick="add_note('J')" style="width:7%;color:black;">J</button>
                <button class="btn btn-primary m-1" onclick="add_note('K')" style="width:7%;color:black;">K</button>
                <button class="btn btn-primary m-1" onclick="add_note('L')" style="width:7%;color:black;">L</button>
                <button class="btn btn-primary m-1" onclick="add_note('@')" style="width:7%;color:black;">@</button><br>
                <button class="btn btn-primary m-1" onclick="add_note('Z')" style="width:7%;color:black;">Z</button>
                <button class="btn btn-primary m-1" onclick="add_note('X')" style="width:7%;color:black;">X</button>
                <button class="btn btn-primary m-1" onclick="add_note('C')" style="width:7%;color:black;">C</button>
                <button class="btn btn-primary m-1" onclick="add_note('V')" style="width:7%;color:black;">V</button>
                <button class="btn btn-primary m-1" onclick="add_note('B')" style="width:7%;color:black;">B</button>
                <button class="btn btn-primary m-1" onclick="add_note('N')" style="width:7%;color:black;">N</button>
                <button class="btn btn-primary m-1" onclick="add_note('M')" style="width:7%;color:black;">M</button>
                <button class="btn btn-primary m-1" onclick="add_note('del')" style="width:7%;color:black;"><=</button>
                <button class="btn btn-primary m-1" onclick="add_note('Clear')" style="width:16%;color:black;">Clear</button><br>
                <button class="btn btn-primary m-1" data-dismiss="modal" style="color:red;">Cancel</button>
                <button class="btn btn-primary m-1" onclick="add_note('(')" style="width:5%;color:black;">(</button>
                <button class="btn btn-primary m-1" onclick="add_note(')')" style="width:5%;color:black;">)</button>
                <button class="btn btn-primary m-1" onclick="add_note('space')" style="width:22%;color:black;">Space</button>
                <button class="btn btn-primary m-1" onclick="add_note('-')" style="width:7%;color:black;">-</button>
                <button class="btn btn-primary m-1" onclick="add_note(':')" style="width:7%;color:black;">:</button>
                <button class="btn btn-primary m-1" onclick="add_note('/')" style="width:7%;color:black;">/</button>
                <button class="btn btn-primary m-1" onclick="save_note()" data-dismiss="modal" style="color:green;">OK</button>
            </div>
            <div class="col-lg-3 text-center">
                <button class="btn btn-primary m-1" onclick="add_note(7)" style="width:20%;color:black;">7</button>
                <button class="btn btn-primary m-1" onclick="add_note(8)" style="width:20%;color:black;">8</button>
                <button class="btn btn-primary m-1" onclick="add_note(9)" style="width:20%;color:black;">9</button><br>
                <button class="btn btn-primary m-1" onclick="add_note(4)" style="width:20%;color:black;">4</button>
                <button class="btn btn-primary m-1" onclick="add_note(5)" style="width:20%;color:black;">5</button>
                <button class="btn btn-primary m-1" onclick="add_note(6)" style="width:20%;color:black;">6</button><br>
                <button class="btn btn-primary m-1" onclick="add_note(1)" style="width:20%;color:black;">1</button>
                <button class="btn btn-primary m-1" onclick="add_note(2)" style="width:20%;color:black;">2</button>
                <button class="btn btn-primary m-1" onclick="add_note(3)" style="width:20%;color:black;">3</button><br>
                <button class="btn btn-primary m-1" onclick="add_note(0)" style="width:46%;color:black;">0</button>
                <button class="btn btn-primary m-1" onclick="add_note('.')" style="width:20%;color:black;">.</button>
            </div>
         </div>
        </div>
      </div>
    </div>
  </div>
  <!--Customer Modal -->
<div class="modal fade" id="customerModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-body">
          <table class="table table-border">
            <tr style="background-color: #ffc107">
                <th class="text-center">No.</th>
                <th class="text-center">Tel</th>
                <th class="text-center">Name</th>
                <th class="text-center">Company</th>
            </tr>
            @foreach($customer as $c =>$cus)
            <tr id="cus_tr{{$c}}" onclick="cus_active({{$cus->id}})" data-dismiss="modal">
                <td class="text-center">{{$c+1}}</td>
                <td class="text-center">{{$cus->main_phone}}</td>
                <td class="text-center">{{$cus->name}}</td>
                <td class="text-center">{{$cus->company}}</td>
            </tr>
            @endforeach
          </table>
        <center><button type="button" class="btn btn-secondary" data-dismiss="modal" style="background-color:red;">Close</button></center>
        </div>
        {{-- <div class="col-lg-12 text-center">
          <button type="button" class="btn btn-primary" style="background-color: red;color:white;" >Open</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal" style="background-color:#6c757d;">Close</button>
        </div> --}}
      </div>
    </div>
  </div>


@include("$prefix.inc_footer")
<?php
echo "<script>";
echo "var zone_data = $zone_data";
echo "</script>";
echo "<script>";
echo "var cus_data = $cus_data";
echo "</script>";
?>
<script>
    var active = '';
    var po_ar = '';
    var po_ad = '';
   function check_discount(){
    // var pay = Number(document.getElementById('payment').value);
    var pay = 0;
    var get_v = '{{$count_r}}';
    get_v = get_v*1;
    var dis = document.getElementById('discount').value;
    document.getElementById('disc').value = dis ;
    for(x=1;x<get_v;x++){
        var qty_p = document.getElementById('price_qty'+x).value*1;
        var free_p = document.getElementById('free_p'+x).value*1;
        var price = document.getElementById('v_price'+x).value*1;
        if(price == free_p){
            var cal_qty = (qty_p * (100-dis))/100;
            var cal_price = (price * (100-dis))/100;
            pay+=qty_p;

        }
    }
    if (dis < 0 || dis > 100){
        document.getElementById('discount').value = 0;
    }

    var sum_dis = (dis/100)*pay;
    document.getElementById('per_dis').innerHTML = sum_dis.toLocaleString("en-US", {minimumFractionDigits: 2});
   }
   function CalDis(c){
    var get_v = '{{$count_r}}';
    get_v = get_v*1;
    var pay = Number(document.getElementById('payment').value);
    var dis = document.getElementById('discount').value;
    // var sum = (pay * (100-dis))/100;
    var sum = 0;
    for(x=1;x<get_v;x++){
        var qty_p = document.getElementById('price_qty'+x).value*1;
        var free_p = document.getElementById('free_p'+x).value*1;
        var price = document.getElementById('v_price'+x).value*1;
        if(price == free_p){
            var cal_qty = (qty_p * (100-dis))/100;
            var cal_price = (price * (100-dis))/100;
            if(c){
                sum+=qty_p;
            }else{
                sum+=cal_qty;

            }
            
            document.getElementById('sum_qty'+x).innerHTML = cal_qty.toLocaleString("en-US", {minimumFractionDigits: 2}); 
            document.getElementById('price'+x).innerHTML = cal_price.toLocaleString("en-US", {minimumFractionDigits: 2}); 
        }
    }
    document.getElementById('sum_pay').innerHTML = sum.toLocaleString("en-US", {minimumFractionDigits: 2}) ; 
    document.getElementById('sum_pay2').innerHTML = sum.toLocaleString("en-US", {minimumFractionDigits: 2}); 
    document.getElementById('payment').value = sum;
    if(c){}else{$('#discount').prop('disabled', true);}
   }
   function CancelDis(){
    var get_v = '{{$count_r}}';
    get_v = get_v*1;
    var pay = '{{$total+$ready}}';
    pay = pay*1;
    var sum = 0;
    // var pay = Number(document.getElementById('payment').value);
    // var dis = document.getElementById('discount').value;
    document.getElementById('discount').value = 0;
    document.getElementById('per_dis').innerHTML = '0.00';
    for(x=1;x<get_v;x++){
        var qty_p = document.getElementById('price_qty'+x).value*1;
        var free_p = document.getElementById('free_p'+x).value*1;
        var price = document.getElementById('v_price'+x).value*1;
        if(price == free_p){
        sum+=qty_p;
        document.getElementById('sum_qty'+x).innerHTML = qty_p.toLocaleString("en-US", {minimumFractionDigits: 2}); 
        document.getElementById('price'+x).innerHTML = price.toLocaleString("en-US", {minimumFractionDigits: 2}); 
        }
    }
    document.getElementById('sum_pay').innerHTML = sum.toLocaleString("en-US", {minimumFractionDigits: 2}) ; 
    document.getElementById('sum_pay2').innerHTML = sum.toLocaleString("en-US", {minimumFractionDigits: 2}); 
    document.getElementById('payment').value = sum;
    $('#discount').removeAttr('disabled');
   }
   function check_active(id,r,d){
    document.getElementById('ch'+id).checked = true;
    active = id;
    po_ar = r;
    po_ad = d;
    $('#btn_note').removeAttr('disabled');
   }
   function FreePirce(){
    document.getElementById('free_p'+active).value = 0;
    document.getElementById('sum_qty'+active).innerHTML = 'free'; 
    document.getElementById('price'+active).innerHTML = 'free'; 
    CalDis(1);
   }
   function CancelFree(){
    document.getElementById('free_p'+active).value = document.getElementById('v_price'+active).value*1;
    CalDis(1);
   }
   function DelLine(){
        Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: 'GET',
                    url:'{{url("/list")}}',
                    data: {
                        _token: "{{ csrf_token() }}",
                        ar:po_ar,
                        ad:po_ad,
                        discount:document.getElementById('discount').value,
                    },
                    success: function(data) {
                        window.location.reload();
                    }
                });
            }
        })
   }
   function DelAll(){
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: 'GET',
                    url:'{{url("/del-list")}}',
                    data: {
                        _token: "{{ csrf_token() }}",
                        ar:po_ar,
                        ad:po_ad,
                        discount:document.getElementById('discount').value,
                    },
                    success: function(data) {
                        Swal.fire(
                        'Deleted!',
                        'Your list has been deleted.',
                        'success'
                        ).then((result2)=>{
                            if(result2.isConfirmed){
                                window.location.replace('{{url("/menu-list")}}');
                            }
                        })
                    }
                });
            }
        })
   }
   function add_note(n){
    //
      var text = document.getElementById('note').value;
      if(n == 'Clear'){
          document.getElementById('note').value = '';
      }else if(n == 'space'){
          document.getElementById('note').value = text+' ';
      }else if(n == 'del'){
          let count_text = text.length-1;
          document.getElementById('note').value = text.substring(0, count_text);
      }else{
          if(text == 0){
            document.getElementById('note').value = n;
          }else{
            document.getElementById('note').value = text + n;
          }
      }
    }
    function get_note(){
        document.getElementById('note').value = document.getElementById('hideNote'+active).value;
        // console.log(document.getElementById('note').value);
    }
   function save_note(){
    $.ajax({
        type: 'GET',
        url:'{{url("/note")}}',
        data: {
            ar:po_ar,
            ad:po_ad,
            note:document.getElementById('note').value,
            },
            success: function(data) {
                // alert(data)
                document.getElementById('adNote'+active).innerHTML = data;
                document.getElementById('hideNote'+active).value = data;
                // $('#adNote'+active).append(' '+document.getElementById('note').value);
            }
        });
   }
   function fncSubmit()
{
    var form = $('#Menu_form')[0];
    var data = new FormData(form);
    // console.log(data)
    $.ajax({
                    type: 'POST',
                    url:'{{url("/save-menu")}}',
                    enctype: 'multipart/form-data',
                    data: data,
                    processData: false,
                    contentType: false,
                    cache: false,
                    success: function(data) {
                        if(data){
                            Swal.fire({
                            icon: 'success',
                            title: 'Data saved',
                            showConfirmButton: false,
                            timer: 1500
                            })
                        document.getElementById('show_phone').innerHTML = null;
                        document.getElementById('main_phone').innerHTML = null;
                        $('#main_phone').css("background-color",'white');
                        }else{
                            Swal.fire({
                            icon: 'error',
                            title: 'Something is empty',
                            showConfirmButton: false,
                            timer: 1500
                            })
                        }
                    }
                });
    document.getElementById("Menu_form").reset();
    return false;
}
var color_but = ['#FF33FF','#99FFFF','#FFFACD'];
function change_modeButton(num){
    $("#employer").css("background-color",color_but[num]);
    document.getElementById('type').value = num;
}
var count_tr = 0;
var re_act = '';
var cls_active = '';
var cls_actived = '';
function add_phone(){
  var phone = document.getElementById('phone').value;
  if(phone.length >= 10){
    var data = '<tr id="phone_list'+count_tr+'" onclick="list_active('+count_tr+')"><td>'+phone+'<input type="hidden" value="'+phone+'" id="inp_p'+count_tr+'" name="tel_list[]"></td></tr>'
    $('#show_phone').append(data);
    document.getElementById('phone').value = null;
    count_tr++;
  }
}
function list_active(c){
    re_act = c;
    if(cls_actived != '' || cls_actived == 0){
        $('#phone_list'+cls_actived).css("background-color",'white');
    }
    cls_actived = c;
    $('#phone_list'+c).css("background-color",'#ffc107');  
}
function reset_phone(){
    var de = document.getElementById('phone_list'+re_act);
    de.parentNode.removeChild(de);
    $('#main_phone').css("background-color",'white');
    re_act = null;
    cls_actived = null;
}
function select_phone(){
    document.getElementById('main_phone').value = document.getElementById('inp_p'+re_act).value;
    $('#main_phone').css("background-color",'#ffc107');
}
function select_zone(){
 let code = document.getElementById('code_zone').value;
 if(code.length == 4){
  let data =  zone_data.find(x=>x.code==code);
  document.getElementById('city').value = data.city;
  document.getElementById('zone').value = data.zone;
  document.getElementById('delivery').value = data.charge;
 }else{
    document.getElementById('city').value =  null ;
    document.getElementById('zone').value =  null ;
    document.getElementById('delivery').value =  null ;
 }
}
var cus_act = '';
function cus_active(cus){
    cus_act = cus;
        let data =  cus_data.find(x=>x.id==cus_act);
        document.getElementById('name_data').value = data.name;
        document.getElementById('company_data').value = data.company;
        document.getElementById('main_phone').value = data.main_phone;
        document.getElementById('city').value = data.city;
        document.getElementById('zone').value = data.zone;
        document.getElementById('delivery').value = data.charge;
        document.getElementById('code_zone').value = data.n;
        document.getElementById('cus_id').value = data.id;
        $('#main_phone').css("background-color",'#ffc107');
        // $('#cus_tr'+cus_actived).css("background-color",'white');
        let phone = JSON.parse(data.phone);
        for(x=0;x<phone.length;x++){
            var tel = '<tr id="phone_list'+x+'" onclick="list_active('+x+')"><td>'+phone[x]+'<input type="hidden" value="'+phone[x]+'" id="inp_p'+x+'" name="tel_list[]"></td></tr>'
            $('#show_phone').append(tel);
            count_tr++;
        }
        // console.log(phone)
}
function SaveOrder(){
    var form = $('#Form_test')[0];
    var data = new FormData(form);
    // console.log(data)
    if(document.getElementById('type').value){
        $.ajax({
                    type: 'POST',
                    url:'{{url("/order-save")}}',
                    enctype: 'multipart/form-data',
                    data: data,
                    processData: false,
                    contentType: false,
                    cache: false,
                    success: function(data) {
                        if(data){
                            Swal.fire({
                            icon: 'success',
                            title: 'Data saved',
                            showConfirmButton: true,
                            }).then((result) => {
                                    if (result.isConfirmed) {
                                        window.location.replace('{{url("/menu-list")}}');
                                    } 
                                })
                        }else{
                            Swal.fire({
                            icon: 'error',
                            title: 'Something is empty',
                            showConfirmButton: false,
                            timer: 1500
                            })
                        }
                    }
                });
        document.getElementById("Form_test").reset();
    }else{
        Swal.fire({
            icon: 'error',
            title: 'Please choose Delivery Take away or On table ',
            showConfirmButton: false,
            timer: 5000
        })
    }
    return false;
}
function OrderSubmit(po){
    if(po == 0){
        return false;
    }
}
function Service_data(t){
    $.ajax({
                    type: 'GET',
                    url:'{{url("/service-data")}}/'+t,
                    success: function(data) {
                       document.getElementById('show_service').innerHTML = data;
                    }
                });
}

</script>
</body>
</html>