<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>@include("$prefix.inc_header")
</head>

<body>
    @include("$prefix.inc_topmenu")

    <div class="container-fluid">
        <div class="wrap-pad">
            <div class="form-menu">
                <div class="row">
                    <div class="col-xl-4 col-lg-4 col-md-4 pr-0">
                        <div class="showmenu">
                            <div class="btn-No-Ok">
                                <button class="no" onclick="window.location.href='{{url('/')}}';">Esc = cancel</button>
                                <button class="ok" onclick="submit_menu()"><img src="frontend/images/icon menu/Check_ring1.svg">F12 ok</button>
                            </div>
                            <div class="All-Price">
                                <div class="price-btn">
                                    <button class="p-btn">2nd<br>Half</button>
                                    <button class="p-btn" onclick="del_list()">Delete<br>Line</button>
                                    <button class="static">Static</button>
                                </div>
                                <div class="price-btn">
                                    <button class="p-btn" id="price_up" onclick="update_price()">Update<br>Price</button>
                                    <button class="p-btn">Half price<br>O/N</button>
                                    <button class="p-btn" onclick="free_price()">Free<br>Yes/No</button>
                                    <button class="p-btn">Half price<br>O/N</button>
                                    <button class="p-btn" data-toggle="modal" data-target="#keyboardModal" id="btn_note" disabled>Add<br>Note</button>
                                </div>
                            </div>
                            <div class="add-drop">
                                <button class="A-drop" onclick="add_qty()"><img class="a-drop img-fluid"
                                        src="frontend/images/icon menu/Add_2.svg" ><br>Qty +1</button>
                                <div class="remove-btn">
                                    <button class="A-drop2" onclick="del_qty()"><img class="a-drop img-fluid"
                                            src="frontend/images/icon menu/Remove_3.svg" ><br>Qty -1</button>
                                </div>
                                <button class="A-drop" onclick="del_list()"><img class="a-drop img-fluid"
                                        src="frontend/images/icon menu/Dell_4.svg" ></button>
                                <button class="A-drop" data-toggle="modal" data-target="#exampleModal" id="btn_cal" disabled><img class="a-drop img-fluid"
                                        src="frontend/images/icon menu/123_5.svg" ><br>Qty +</button>
                                <button class="A-drop" data-toggle="modal" data-target="#DeleteAll"><img class="a-drop img-fluid"
                                        src="frontend/images/icon menu/Cancel_6.svg"><br>Delete</button>
                            </div>
                            <div class="Move-Up">
                                <button class="move" onclick="moveup_active()"><img class="a-drop img-fluid"
                                        src="frontend/images/icon menu/move_up1.png"></button>
                            </div>
                            <form action="{{url('menu-list')}}" method="POST" id="confirm_menu" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="ran_num" value="{{random_int(100000,999999)}}" >
                            <div class="showmenu-table" id="show_list"></div>
                            </form>
                            <div class="show-price">
                                <p id="show_total">0.00</p>
                            </div>
                            <div class="move-btn">
                                <div class="move-UD">
                                    <button onclick="move_up()"><img class="a-drop img-fluid"
                                            src="frontend/images/icon menu/Arrow_drop_up_1.svg"><br>MOVE</button>
                                    <button onclick="move_down()"><img class="a-drop img-fluid"
                                            src="frontend/images/icon menu/Arrow_drop_up_2.svg"><br>MOVE</button>
                                </div>
                                <div class="move-D">
                                    <button onclick="movedown_active()"><img class="a-drop img-fluid"
                                            src="frontend/images/icon menu/move_down2.svg"></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-8 col-lg-8 col-md-8 pr-0">
                        <div class="choosemenu">
                            <div class="btn-choosemenu">
                                <div class="btn-food">
                                    <div class="menu-with-LR">
                                        <div class="row">
                                            <div class="col-xl-10 col-lg-9 col-md-8 pr-0">
                                                <div class="allmemuBtnContainer">
                                                    <div id="memuBtnContainer">
                                                      @foreach ($catagory as $c => $cat)
                                                        <button class="btn" id="btn_{{$c}}" style="background-color:{{$cat->color}};" onclick="btn_click({{$c}},{{$cat->id}},'{{$cat->name}}')">{{strtoupper($cat->name)}}</button>
                                                      @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-2 col-lg-3 col-md-4">
                                                <div class="allbtn-service">
                                                    <div class="btn-service">
                                                        <button class="service"><img class="img-fluid" src="frontend/images/icon menu/move_up1.png"></button> <br>
                                                        {{-- <button class="c" data-toggle="modal" data-target="#ClosePage" >close</button> --}}
                                                        <button class="service"><img class="img-fluid" src="frontend/images/icon menu/Down_move.svg"></button>
                                                        {{-- <button class="service">service</button> --}}
                                                        {{-- <button class="service"><img class="img-fluid" src="frontend/images/icon menu/with.svg">with</button> --}}
                                                        {{-- <button class="c" onclick="window.location.href='{{url('webpanel/login')}}';">Mode Normal</button> --}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="all-move-menu">
                                                <div class="menu-L" id="show_submenu">
                                                </div>
                                                <div class="move-R">
                                                    <button><img class="img-fluid"
                                                            src="frontend/images/icon menu/left_move.svg"></button>
                                                    <button><img class="img-fluid"
                                                            src="frontend/images/icon menu/Right_move.svg"></button>
                                                    <button><img class="img-fluid"
                                                            src="frontend/images/icon menu/move_up1.png"></button>
                                                    <button><img class="img-fluid"
                                                            src="frontend/images/icon menu/Down_move.svg"></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="allmenu">
                                        <div id="menucontainer">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
  
  <!-- Modal Calculate -->
  <div class="modal fade bd-example-modal-sm" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
      <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: red;">
                <span aria-hidden="true">&times;</span>
              </button>
        </div>
        <div class="modal-body">
         <div class="row">
            <div class="col-lg-12 text-center">
                <input type="text" class="form-control m-1" id="calculate" value="0" style="width: 97%;" readonly>
                <button class="btn btn-primary m-1" onclick="CalCulate(1)" style="width:29%;color:black;">1</button>
                <button class="btn btn-primary m-1" onclick="CalCulate(2)" style="width:29%;color:black;">2</button>
                <button class="btn btn-primary m-1" onclick="CalCulate(3)" style="width:29%;color:black;">3</button>
                <button class="btn btn-primary m-1" onclick="CalCulate(4)" style="width:29%;color:black;">4</button>
                <button class="btn btn-primary m-1" onclick="CalCulate(5)" style="width:29%;color:black;">5</button>
                <button class="btn btn-primary m-1" onclick="CalCulate(6)" style="width:29%;color:black;">6</button>
                <button class="btn btn-primary m-1" onclick="CalCulate(7)" style="width:29%;color:black;">7</button>
                <button class="btn btn-primary m-1" onclick="CalCulate(8)" style="width:29%;color:black;">8</button>
                <button class="btn btn-primary m-1" onclick="CalCulate(9)" style="width:29%;color:black;">9</button>
                <button class="btn btn-primary m-1" onclick="CalCulate('C')" style="width:29%;color:black;">C</button>
                <button class="btn btn-primary m-1" onclick="CalCulate(0)" style="width:29%;color:black;">0</button>
                <button class="btn btn-primary m-1" onclick="CalCulate('e')" data-dismiss="modal" style="width:29%;color:black;">OK</button>
            </div>
         </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Modal delete all -->
  <div class="modal fade" id="DeleteAll" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
      <div class="modal-content">
        <div class="modal-body">
         <div class="row">
            <div class="col-lg-12 text-center">
                <h4 style="color: white;">Do you want to delete data?</h4>
                <button type="button" class="btn btn-secondary m-1" style="background-color: red;color:white;" onclick="del_all()" data-dismiss="modal">OK</button>
                <button type="button" class="btn btn-secondary m-1" aria-label="Close" data-dismiss="modal" style="background-color:#6c757d;">Cancel</button>
            </div>
         </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Modal close -->
  <div class="modal fade" id="ClosePage" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
      <div class="modal-content">
        <div class="modal-body">
         <div class="row">
            <div class="col-lg-12 text-center">
                <h4 style="color: white;">Do you want to exit this page?</h4>
                <button type="button" class="btn btn-secondary m-1" style="background-color: red;color:white;" data-dismiss="modal" onclick="window.location.href='{{url('/')}}';">OK</button>
                <button type="button" class="btn btn-secondary m-1" aria-label="Close" data-dismiss="modal" style="background-color:#6c757d;">Cancel</button>
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
  

  

    <!-- Menu -->
    <!-- <script>
// Add active class to the current button (highlight it)
var btnContainer = document.getElementById("memuBtnContainer");
var btns = btnContainer.getElementsByClassName("btn");
for (var i = 0; i < btns.length; i++) {
  btns[i].addEventListener("click", function(){
    var current = document.getElementsByClassName("active");
    current[0].className = current[0].className.replace(" active", "");
    this.className += " active";
  });
}
</script> -->
<?php  
    echo "<script>";
    echo "var food = $food";
    echo "</script>";
    echo "<script>";
    echo "var row = $row";
    echo "</script>";
?>
<script type="text/javascript">
    var old_btn = '';
    var old_menu = '';
    var old_sub = '';
    var old_list = '';
    var cate = '';
    var get_food ;
    var get_sub ;
    var get_sub_food ;
    var count_list = 0;
    var color_list = new Array();
    var number_active = '';
    var type_active = '';
    var move_list = new Array();
    var positionT = new Array();

    function btn_click(id,cid,name){
      cate = name;
      get_food = food.filter(x=>x.cat_id == cid);
      get_sub = row.filter(x=>x.cate_id == cid);
      old_sub = '';
      if(old_btn != ''){
        $("#"+old_btn).removeClass("active");
       
      }
      if(get_sub.length > 0){
        get_food = get_food.filter(x=>x.sub_id == get_sub[0].id)
        old_sub = 's_act'+get_sub[0].id;
      }
      var data = '';
      for(x =0 ; x < get_food.length ; x++) {
        data = data+"<div class='menu' id='m_act"+get_food[x].id+"' onclick='menu_click("+get_food[x].id+","+x+")' style='background-color:"+get_food[x].color+";'><div class='card-menu' ><img class='img-fluid' src='"+get_food[x].img+"'><p>"+get_food[x].name+"</p></div><div class='price'><p>Price:"+get_food[x].price+"</p></div></div>" ;
      }
      var sub = '';
      for(x =0 ; x < get_sub.length ; x++) {
        if(x == 0){
          var cls = 'active';
        }else{
          var cls = '';
        }
        sub = sub+"<button class='btn "+cls+" mr-1' id='s_act"+get_sub[x].id+"' style='background-color:"+get_sub[x].color+";' onclick='sub_click("+get_sub[x].id+")'>"+get_sub[x].name.toUpperCase()+"</button>" ;
      }
      document.getElementById("menucontainer").innerHTML = data;
      document.getElementById("show_submenu").innerHTML = sub;
      document.getElementById("btn_"+id).classList.add('active');
      old_btn = 'btn_'+id;
      old_menu = ''; 
      
    }
    function sub_click(sid){
      get_sub_food = food.filter(x=>x.sub_id == sid);
      get_food = food.filter(x=>x.sub_id == sid);
      if(old_sub != ''){
        $("#"+old_sub).removeClass("active");
      }
      var datas = '';
      for(x =0 ; x < get_sub_food.length ; x++) {
        datas = datas+"<div class='menu' id='s_act"+get_sub_food[x].id+"' onclick='menu_click("+get_sub_food[x].id+")' style='background-color:"+get_sub_food[x].color+";'><div class='card-menu' ><img class='img-fluid' src='"+get_sub_food[x].img+"'><p>"+get_sub_food[x].name+"</p></div><div class='price'><p>Price:"+get_sub_food[x].price+"</p></div></div>" ;
      }
      document.getElementById("menucontainer").innerHTML = datas;
      old_sub = 's_act'+sid;
      $("#"+old_sub).addClass("active");
    }
    function menu_click(fid){
      var food_list = get_food.find(x=>x.id == fid);

      if(old_menu != ''){
        $("#"+old_menu).removeClass("active");
      }   
      if(number_active != ''){
        if(type_active == 1){
          $("#note_ac"+number_active).removeClass("table-active btn-dark");
        }
      }                 
      // var list = "<tr><th scope='row' class='btn-dark' id='num"+fid+"'>1.00</th><td colspan='1' class='table-active btn-dark' id='num_name"+fid+"' style='background-color:#ff0000;'>"+cate+" "+food_list.name+"</td><td class='price btn-dark' id='num_price"+fid+"'>"+food_list.price+"</td></tr>";
      var list = "<table id='table_list"+count_list+"'><tr onclick='list_active("+count_list+",0)' id='list_tr"+count_list+"'><td width='10%' scope='row' class='btn-dark' id='num"+count_list+"'>1.00</td><td colspan='1' class='table-active btn-dark' id='num_name"+count_list+"' width='70%'><b id='name_list"+count_list+"'>"+cate+" "+food_list.name+" </b><input type='hidden' name='qty_num[]' value='1' id='sum_qty"+count_list+"'><input type='hidden' name='qty_id[]' value='"+food_list.id+"'><input type='hidden' name='pointer[]' value='"+count_list+"'><input type='hidden' name=food_name[]  value='"+cate+' '+food_list.name+"' id='get_name"+count_list+"'></td><td width='20%' class='price btn-dark' id='num_price"+count_list+"'><b id='show_price"+count_list+"'>"+food_list.price+"</b><input type='hidden'  name='qty_price[]' value='"+food_list.price+"' id='sum_price"+count_list+"'></td></tr></table>";
    //   document.getElementById("m_act"+fid).classList.add('active');
      $('#show_list').append(list);
      old_menu = 'm_act'+fid;
      number_active = count_list;
     $('#btn_cal').removeAttr('disabled');
     $('#btn_note').removeAttr('disabled');
     positionT.push(count_list);
      count_list++;
      color_list.push(food_list.color);
      recalass_list();
      total_sumPrice();
     
    }
    function recalass_list(){
      for(x=0;x<count_list;x++)
      {
        if(x < count_list-1){
          $("#num"+x).removeClass("btn-dark");
          $("#num_price"+x).removeClass("btn-dark");
          $("#num_name"+x).removeClass("table-active btn-dark");
          $("#num_name"+x).css("background-color",color_list[x]);
        }
      }
    }
    
    function list_active(reid,t){
      number_active = reid;
      type_active = t ;
      if(t == 0){
        $('#btn_cal').removeAttr('disabled');
        $('#btn_note').removeAttr('disabled');
          for(x=0;x<count_list;x++)
          {
            if(x == reid){
              $("#num"+x).addClass("btn-dark");
              $("#num_price"+x).addClass("btn-dark");
              $("#num_name"+x).addClass("table-active btn-dark");
              $("#num_name"+x).css("background-color",'');
            }else{
              $("#num"+x).removeClass("btn-dark");
              $("#num_price"+x).removeClass("btn-dark");
              $("#num_name"+x).removeClass("table-active btn-dark");
              $("#num_name"+x).css("background-color",color_list[x]);
            }
          }
          for(x=0;x<note_c;x++)
          {
            $("#note_ac"+x).removeClass("table-active btn-dark");
          }
      }else{
        for(x=0;x<note_c;x++)
          {
            if(x == reid){
              $("#note_ac"+x).addClass("table-active btn-dark");
            }else{
              $("#note_ac"+x).removeClass("table-active btn-dark");
            }
          }
          for(x=0;x<count_list;x++)
          {
              $("#num"+x).removeClass("btn-dark");
              $("#num_price"+x).removeClass("btn-dark");
              $("#num_name"+x).removeClass("table-active btn-dark");
              $("#num_name"+x).css("background-color",color_list[x]);
          }
      }
    }
    function add_qty(){
        let qty = document.getElementById('sum_qty'+number_active).value*1;
        let total = document.getElementById('sum_price'+number_active).value*1;
        document.getElementById('sum_qty'+number_active).value = qty+1;
        document.getElementById('num'+number_active).innerHTML = (qty+1).toFixed(2) ;
        // document.getElementById('sum_price'+number_active).value = (qty+1)*total;
        document.getElementById('show_price'+number_active).innerHTML = ((qty+1)*total).toFixed(2) ;
        total_sumPrice();
    }
    function del_qty(){
        let qty = document.getElementById('sum_qty'+number_active).value*1;
        let total = document.getElementById('sum_price'+number_active).value*1;
        if(qty-1 > 0){
            document.getElementById('sum_qty'+number_active).value = qty-1;
            document.getElementById('num'+number_active).innerHTML = (qty-1).toFixed(2) ;
            // document.getElementById('sum_price'+number_active).value = (qty-1)*total;
            document.getElementById('show_price'+number_active).innerHTML = ((qty-1)*total).toFixed(2) ;
        }
        total_sumPrice();
    }
    function del_list(){
      if(type_active == 0){
        var de = document.getElementById('table_list'+number_active);
        de.parentNode.removeChild(de);
        $('#btn_cal').prop('disabled', true);
        $('#btn_note').prop('disabled', true);
        total_sumPrice();
        let del_move = positionT.indexOf(number_active);
        positionT.splice(del_move,1);
        console.log(del_move)
        console.log(positionT)
        number_active = '';
      }else{
        var de = document.getElementById('list_note'+number_active);
        de.parentNode.removeChild(de);
        number_active = '';
      }
     
    //  old_list = number_active-1;
    //  if(old_list != ''){
    //     $("#num"+old_list).addClass("btn-dark");
    //     $("#num_price"+old_list).addClass("btn-dark");
    //     $("#num_name"+old_list).addClass("table-active btn-dark");
    //     $("#num_name"+old_list).css("background-color",'');
    //   }
    }
    function CalCulate(num){
        var btn_num1 = (document.getElementById('calculate').value*1)+(document.getElementById('sum_qty'+number_active).value*1);
        var btn_num = document.getElementById('calculate').value;
        var total_sum = document.getElementById('sum_price'+number_active).value;
        if(num == 'C'){
            document.getElementById('calculate').value = 0;
        }else if(num == 'e'){
            document.getElementById('num'+number_active).innerHTML = (Number(btn_num1)).toFixed(2);
            document.getElementById('sum_qty'+number_active).value = Number(btn_num1);
            document.getElementById('show_price'+number_active).innerHTML = (Number(btn_num1)*total_sum).toFixed(2);
            document.getElementById('calculate').value = 0;
        }else{
            if(btn_num == 0){
                document.getElementById('calculate').value = num;
            }else{
                document.getElementById('calculate').value = btn_num + num;
            }
        }
        total_sumPrice();
    }
    function del_all(){
        document.getElementById('show_list').innerHTML = null;
        count_list = 0;
        color_list = new Array();
        number_active = '';
        total_sumPrice();
    }
    function total_sumPrice(){
        var total_price = 0;
        for(x=0;x<count_list;x++)
      {
        let sum = document.getElementById('sum_price'+x);
        if(sum){
            total_price += (document.getElementById('sum_qty'+x).value*1)*(document.getElementById('sum_price'+x).value*1);
        }
      }
      document.getElementById('show_total').innerHTML = total_price.toFixed(2);
    }
    var btn_update = false;
    function update_price(){
      if(btn_update){
        $("#price_up").addClass("p-btn");
        $("#price_up").removeClass("btn-success");
        $('#sum_price'+number_active).attr("type", "hidden");
        $('#show_price'+number_active).show();
        btn_update = false;
        let qty = document.getElementById('sum_qty'+number_active).value*1;
        let total = document.getElementById('sum_price'+number_active).value*1;
        document.getElementById('sum_qty'+number_active).value = qty;
        document.getElementById('num'+number_active).innerHTML = (qty).toFixed(2) ;
        document.getElementById('show_price'+number_active).innerHTML = ((qty)*total).toFixed(2) ;
        total_sumPrice();
      }else{
        $("#price_up").removeClass("p-btn");
        $("#price_up").addClass(" btn-success");
        $('#sum_price'+number_active).attr("type", "text");
        $('#show_price'+number_active).hide();
        btn_update = true;
      }
    }
    function free_price(){
      document.getElementById('sum_price'+number_active).value = 0;
      let qty = document.getElementById('sum_qty'+number_active).value*1;
      let total = document.getElementById('sum_price'+number_active).value*1;
      if((qty)*total > 0){
        document.getElementById('show_price'+number_active).innerHTML = ((qty)*total).toFixed(2) ;
      }else{
        document.getElementById('show_price'+number_active).innerHTML = 'free' ;
      }
      total_sumPrice();
    }
    function add_note(n){
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
    var note_c = 0;
    function save_note(){
      let note = document.getElementById('note').value;
      let fn = document.getElementById('get_name'+number_active).value;
      if(note.length > 0){
        var note_text = '<tr id="list_note'+note_c+'" onclick="list_active('+note_c+',1)"><td></td><td id="note_ac'+note_c+'">'+note+'<input type="hidden" name="note['+number_active+'][]" value="'+note+'"></td><td></td></tr>';
        $('#table_list'+number_active).append(note_text);
        note_c++;
      }
      document.getElementById('note').value = '';
    }
    function moveup_active(){
      for(x=number_active-1;x>=0;x--){
       var m_up = document.getElementById('table_list'+x);
        if(m_up){
            $("#num"+number_active).removeClass("btn-dark");
            $("#num_price"+number_active).removeClass("btn-dark");
            $("#num_name"+number_active).removeClass("table-active btn-dark");
            $("#num_name"+number_active).css("background-color",color_list[number_active]);

            $("#num"+x).addClass("btn-dark");
            $("#num_price"+x).addClass("btn-dark");
            $("#num_name"+x).addClass("table-active btn-dark");
            $("#num_name"+x).css("background-color",'');
            number_active = x;
            break;
        }
      }
    }
    function movedown_active(){
      for(x=number_active+1;x<=count_list;x++){
       var m_up = document.getElementById('table_list'+x);
        if(m_up){
            $("#num"+number_active).removeClass("btn-dark");
            $("#num_price"+number_active).removeClass("btn-dark");
            $("#num_name"+number_active).removeClass("table-active btn-dark");
            $("#num_name"+number_active).css("background-color",color_list[number_active]);

            $("#num"+x).addClass("btn-dark");
            $("#num_price"+x).addClass("btn-dark");
            $("#num_name"+x).addClass("table-active btn-dark");
            $("#num_name"+x).css("background-color",'');
            number_active = x;
            break;
        }
      }
    }
    function move_up(){
      var next = -1;
      var now = positionT.indexOf(number_active);
      if(now > 0){
        next = now-1;
        // for(x=now-1;x>=0;x--){
        //   if(positionT[x]){
        //     next = x;
        //     break;
        //   }else{
        //     if(x == 0){
        //       next = x;
        //     }
        //   }
        // }
      }
      var info = new Array();
      if(next >= 0){
        let pm = positionT[now];
        let pn = positionT[next];
        positionT[next] = pm; 
        positionT[now] = pn; 
        for(i=0;i<positionT.length;i++){
          let tl = document.getElementById('table_list'+positionT[i]);
          info.push(tl);
        }
        document.getElementById('show_list').innerHTML = null;
        for(z=0;z<info.length;z++){
          $('#show_list').append(info[z]);
        }
      }

      // var all_table = '';
      // for(x=0;x<=count_list;x++){
      //   let get_table = document.getElementById('table_list'+x);
      //     all_table = all_table+get_table;
      //     console.log(get_table)
      // }
      // console.log(all_table)
    }
    function move_down(){
      var now = positionT.indexOf(number_active);
      var next = now+1;
      var info = new Array();
      if(next >= 0){
        let pm = positionT[now];
        let pn = positionT[next];
        positionT[next] = pm; 
        positionT[now] = pn; 
        for(i=0;i<positionT.length;i++){
          let tl = document.getElementById('table_list'+positionT[i]);
          info.push(tl);
        }
        document.getElementById('show_list').innerHTML = null;
        for(z=0;z<info.length;z++){
          $('#show_list').append(info[z]);
        }
      }

      // var all_table = '';
      // for(x=0;x<=count_list;x++){
      //   let get_table = document.getElementById('table_list'+x);
      //     all_table = all_table+get_table;
      //     console.log(get_table)
      // }
      // console.log(all_table)
    }
    function submit_menu(){
      if(positionT.length > 0){
        document.getElementById("confirm_menu").submit();
      }
    }
</script>
    <!-- Active Menu -->
    <script>
        var btnContainer = document.getElementById("menucontainer");
        var btns = btnContainer.getElementsByClassName("menu");
        for (var i = 0; i < btns.length; i++) {
            btns[i].addEventListener("click", function () {
                var current = document.getElementsByClassName("active");
                current[0].className = current[0].className.replace(" active", "");
                this.className += " active";
            });
        }

    </script>
    @include("$prefix.inc_footer")
</body>

</html>
