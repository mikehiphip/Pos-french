<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>@include("$prefix.inc_header")</head>

<script src="{{asset('frontend/js/bootstrap.min.js')}}"></script>

<body>

    @include("$prefix.inc_topmenu")

<div class="container-fluid">
    <div class="order-info">
        <div class="info-leftbar">
            <div class="input-top">
                <img src="frontend/images/icon index/flat-color-icons_businessman.svg">
                <div class="allinput-top">
                    <input type="text" class="input1"></input>
                    <input type="text" class="input2"></input>
                    <input type="time" class="input3"></input>
                    <button class="chang-item">A Employer</button>
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
            <div class="allinput-middle">
                <div class="input-middle2">
                    <div class="middle-form">
                        <input type="text" class="form1"></input><br>
                        <input type="text" class="form2"></input><br>
                        <input type="text" class="form3"></input><br>
                    </div>
                    <div class="middle-btn">
                        <button class="add-btn">Add</button>
                        <button class="add-btn" type="reset" value="Reset">Reset</button>
                        <button class="add-btn">Tel Principle</button>
                    </div>
                </div>
                <div class="input-middle2">
                    <div class="status">
                        <h4>Deliveryman</h4>
                    </div>
                    <div class="name-btn">
                        <div class="name-info">
                            <label for="name">Name</label>
                            <input type="text" class="name1"></input><br>
                            <label for="Company">Company</label>
                            <input type="text" class="name2"></input>
                        </div>
                        <div class="btn-name">
                            <div class="static">
                                <label for="text">Static</label><br>
                                <input type="text" class="Static" placeholder="0"></input>
                            </div>
                            <button class="f">F10</button>
                            <button class="f">Save<br>Custome</button>
                        </div>
                    </div>
                    <div class="N-Street">
                        <label for="text" class="Same-t">N???</label>
                        <input type="text" class="Same"></input>
                        <label for="text">Street</label>
                        <input type="text" class="Street"></input>
                    </div>
                    <div class="pc-city-maps">
                        <label for="text" class="Same-t">PC</label>
                        <input type="text" class="Same"></input>
                        <label for="text">City</label>
                        <input type="text" class="City"></input>
                        <label for="text">Maps</label>
                        <input type="text" class="Same-M"></input>
                    </div>
                    <div class="row-5">
                        <label for="text">Build</label>
                        <input type="text" class="Same"></input>
                        <label for="text">Stairs</label>
                        <input type="text" class="Same-r"></input>
                        <label for="text" class="Floor">Floor</label>
                        <input type="text" class="Same-r"></input>
                        <label for="text"  class="Door">Door</label>
                        <input type="text" class="Door"></input>
                    </div>
                    <div class="row-6">
                        <label for="text" class="Code1">Code1</label>
                        <input type="text" class="Same"></input>
                        <label for="text" class="Code2">Code2</label>
                        <input type="text" class="Same-r"></input>
                        <label for="text" class="INTVW">Intvw</label>
                        <input type="text" class="Same-r"></input>
                        <label for="text" class="Time">Time</label>
                        <input type="text" class="Same-r"></input>
                    </div>
                    <div class="row-7">
                        <label for="text" class="Note">Note</label>
                        <input type="text" class="Same-N"></input><br>
                        <label for="text" class="Ordernote">Order note2</label>
                        <input type="text" class="Same-r7"></input><br>
                        <label for="text" class="Customerinfo">Customer info</label>
                        <input type="text" class="Same-r7"></input><br>
                        <label for="text" class="Customer-E">Customer email address</label>
                        <input type="text" class="Cus-E"></input>
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
                <div class="input-middle3">
                    <select name="zone" id="zone">
                        <option value="Zone1">Zone1</option>
                        <option value="#">#</option>
                        <option value="#">#</option>
                        <option value="#">#</option>
                    </select>
                    <select name="zone" id="zone">
                        <option value="#">CHQ</option>
                        <option value="#">#</option>
                        <option value="#">#</option>
                        <option value="#">#</option>
                    </select>
                    <input type="text" class="Retrieve1" placeholder="Retrieve 0"></input>
                    <button class="info1">+ / -</button>
                    <button class="info">History</button>
                </div>
            </div>

            <!-- button to menu -->
            <div class="input-info">
                <div class="menu-btn">
                    <div class="all-menu-btn">
                        <div class="To-menu">
                            <a class="tomenu" href="{{url('menu')}}"><img src="frontend/images/icon index/bxs_food-menu.svg">MENU</a>
                        </div>
                        <button class="choosemenu-btn">F4 Choose<br>component</button>
                        <button class="choosemenu-btn">F3 Choose<br>component </button>
                        <button class="choosemenu-btn">Cancel Free</button>
                        <button class="choosemenu-btn">Delete<br>Line</button>
                        <button class="choosemenu-btn">Free ok</button>
                    </div>
                    <div class="all-choosemenu">
                        <button class="choosemenu-btn">Note<br>Line</button>
                        <button class="choosemenu-btn">Delete<br>Line</button>
                        <button class="choosemenu-btn">Delete<br>Line</button>
                        <button class="choosemenu-btn">Delete<br>All</button>
                    </div>
                </div>
            </div>
            <!-- scroll Table -->
            <div class="table-info">
                <div class="table-scroll">
                    <table class="table">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col" class="code"><button>Code</button>
                                    
                                <th scope="col">Description
                                    <input type="search" id="menusearch" name="search" class="Msearch">
                                    <button><img class="serachimg" width="14px" src="frontend/images/icon index/search.png"></button></th> 
                                </th>
                                <th scope="col" class="pq"><button>Price</button></th>
                                <th scope="col" class="pq"><button>Qty</button></th>
                                <th scope="col" class="pq"><button>Price</button></th>
                                <th scope="col" class="note"><button>Note: type + to add Type - to remove Type / to Haif Haif</button></th>
                                <th scope="col" class="sm"><button>S</button></th>
                                <th scope="col" class="sm"><button>M</button></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>#</td>
                                <td>#</td>
                                <td>#</td>
                                <td>#</td>
                                <td>#</td>
                                <td>#</td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>#</td>
                                <td>#</td>
                                <td>#</td>
                                <td>#</td>
                                <td>#</td>
                                <td>#</td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>#</td>
                            </tr>
                            <tr>
                                <th scope="row">4</th>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>#</td>
                            </tr>
                            <tr>
                                <th scope="row">5</th>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>#</td>
                            </tr>
                            <tr>
                                <th scope="row">6</th>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>#</td>
                            </tr>
                            <tr>
                                <th scope="row">7</th>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>#</td>
                            </tr>
                            <tr>
                                <th scope="row">8</th>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>#</td>
                            </tr>
                            <tr>
                                <th scope="row">9</th>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>#</td>
                            </tr>
                            <tr>
                                <th scope="row">10</th>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>#</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="Allinfo-bottom">
                <div class="info-bottom-l">
                    <div class="show-info1">
                        <div class="S-Checkbox">
                            <p>Static</p>
                            <input type="checkbox" class="check"></input>
                        </div>
                        <div class="show-number">info</div>
                    </div>
                    <div class="show-info2">
                        <div class="S-Checkbox2">
                            <p>Pt-cde</p>
                            <p>0</p>
                            <p>Reduc%</p>
                            <p>0</p>
                            <p>Already dec</p>
                            <p>0.00</p>
                        </div>
                    </div>
                    <div class="show-info3">
                        <div class="S-Checkbox3">
                            <button>Apply<br>reduce</button>
                            <button>Cancel<br>Discount</button>
                        </div>
                    </div>
                </div>
                <div class="info-bottom-r">
                    <p class="paynum">0.00</p>
                    <div class="pay">
                        <p>Pay</p>
                        <p>0.00</p>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- button rightbar -->
        <div class="info-rightbar">
            <div class="btn-order">
                <button class="btn1"><img src="frontend/images/icon index/EditMOTO 1.svg"><br> F9 New OrdDeliv
                </button>
                <button class="btn2"><img src="frontend/images/icon index/new ord.svg"><br>New<br>Ord Take</button>
                <button class="btn3"><img src="frontend/images/icon index/ic_baseline-table-restaurant.svg"><br>New<br>Ord On</button>
                <div class="btn-noactive"><img src="frontend/images/icon index/fa6-solid_map-location-dot.svg"><br>Locate address</div>
                <button class="btn5">Exit <img src="frontend/images/icon index/exit.svg"> </button>
                <button class="btn6"><img src="frontend/images/icon index/zondicons_save-disk.svg"><br>F12Save</button>
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
                                    <button class="N-st-b">F6:basculer entre<br>le pass?? et le badge</button>
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
                <button class="blue-btn">Inprogress</button>
                <button class="blue-btn">Completed</button>
                <button class="blue-btn">Service</button>
                <button class="blue-btn">Daytime</button>
            </div>
            <div class="table-info">
                <div class="table-scroll-2">
                    <table class="table">
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
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>#</td>
                                <td>#</td>
                                <td>#</td>
                                <td>#</td>
                                <td>#</td>
                                <td>#</td>
                                <td>#</td>
                                <td>#</td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <th scope="row">4</th>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <th scope="row">5</th>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <th scope="row">6</th>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <th scope="row">7</th>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <th scope="row">8</th>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <th scope="row">9</th>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <th scope="row">10</th>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@include("$prefix.inc_footer")

</body>
</html>