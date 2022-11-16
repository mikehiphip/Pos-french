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
                                <button class="ok"><img src="frontend/images/icon menu/Check_ring1.svg">F12 ok</button>
                            </div>
                            <div class="All-Price">
                                <div class="price-btn">
                                    <button class="p-btn">2nd<br>Half</button>
                                    <button class="p-btn">Delete<br>Line</button>
                                    <button class="static">Static</button>
                                </div>
                                <div class="price-btn">
                                    <button class="p-btn">Update<br>Price</button>
                                    <button class="p-btn">Half price<br>O/N</button>
                                    <button class="p-btn">Free<br>Yes/No</button>
                                    <button class="p-btn">Half price<br>O/N</button>
                                    <button class="p-btn">Add<br>Note</button>
                                </div>
                            </div>
                            <div class="add-drop">
                                <button class="A-drop"><img class="a-drop img-fluid"
                                        src="frontend/images/icon menu/Add_2.svg" onclick="add_qty()"><br>Qty +1</button>
                                <div class="remove-btn">
                                    <button class="A-drop2"><img class="a-drop img-fluid"
                                            src="frontend/images/icon menu/Remove_3.svg" onclick="del_qty()"><br>Qty -1</button>
                                </div>
                                <button class="A-drop"><img class="a-drop img-fluid"
                                        src="frontend/images/icon menu/Dell_4.svg"></button>
                                <button class="A-drop"><img class="a-drop img-fluid"
                                        src="frontend/images/icon menu/123_5.svg"><br>Qty +1</button>
                                <button class="A-drop"><img class="a-drop img-fluid"
                                        src="frontend/images/icon menu/Cancel_6.svg"><br>Qty -1</button>
                            </div>
                            <div class="Move-Up">
                                <button class="move"><img class="a-drop img-fluid"
                                        src="frontend/images/icon menu/move_up1.png"></button>
                            </div>
                            <div class="showmenu-table">
                                <table class="table" id="show_list">
                                    <tbody>
                                        {{-- <tr>
                                            <th scope="row">1.0</th>
                                            <td colspan="1" class="table-active">Potage Poulet coco
                                            </td>
                                            <td class="price">8.00</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">4.0</th>
                                            <td colspan="1" class="table-color">Boissons</td>
                                            <td class="price">12.00</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">1.0</th>
                                            <td colspan="1" class="table-ord">potage Crevettes Itronnell</td>
                                            <td class="price">8.00</td>
                                        </tr> --}}
                                    </tbody>
                                </table>
                            </div>
                            <div class="show-price">
                                <p>0.00</p>
                            </div>
                            <div class="move-btn">
                                <div class="move-UD">
                                    <button><img class="a-drop img-fluid"
                                            src="frontend/images/icon menu/Arrow_drop_up_1.svg"><br>MOVE</button>
                                    <button><img class="a-drop img-fluid"
                                            src="frontend/images/icon menu/Arrow_drop_up_2.svg"><br>MOVE</button>
                                </div>
                                <div class="move-D">
                                    <button><img class="a-drop img-fluid"
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
                                                        {{-- <button class="btn active"> POTAGE</button>
                                                        <button class="btn-yl"> ENTREE</button>
                                                        <button class="btn-y"> POULET</button>
                                                        <button class="btn-rl"> PORC</button>
                                                        <button class="btn-r"> BOEUF</button>
                                                        <button class="btn-p">CREVETTE</button>
                                                        <button class="btn-p"> COMPOSAN</button>
                                                        <button class="btn"> CANARD</button>
                                                        <button class="btn"> RIZ SAUTE</button>
                                                        <button class="btn-c"> NOUUILLES</button>
                                                        <button class="btn-g"> VEGETARIE</button>
                                                        <button class="btn-b"> BOISSONS</button>
                                                        <button class="btn-p"> DESSERTS</button>
                                                        <button class="btn"> LIVRAISON</button>
                                                        <button class="btn"> INGREDIENT</button>
                                                        <button class="btn"> DIVERS</button>
                                                        <button class="btn"> SUPLMT</button> --}}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-2 col-lg-3 col-md-4">
                                                <div class="allbtn-service">
                                                    <div class="btn-service">
                                                        <button class="service"><img class="img-fluid"
                                                                src="frontend/images/icon menu/move_up1.png"></button>
                                                        <button class="c">close</button>
                                                        <button class="service"><img class="img-fluid"
                                                                src="frontend/images/icon menu/Down_move.svg"></button>
                                                        <button class="service">service</button>
                                                        <button class="service"><img class="img-fluid"
                                                                src="frontend/images/icon menu/with.svg">with</button>
                                                        <button class="c">Mode Normal</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="all-move-menu">
                                                <div class="menu-L" id="show_submenu">
                                                    {{-- <button class="btn ">CHAUDE</button>
                                                    <button class="btn ">SOFT</button>
                                                    <button class="btn ">VINS</button>
                                                    <button class="btn ">DIGESTIFS</button>
                                                    <button class="btn ">APEROS</button> --}}
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
                                            {{-- <div class="menu active">
                                                <div class="card-menu">
                                                    <img class="img-fluid" src="frontend/images/icon index/food1.png">
                                                    <p>POTAGEPOULET<br>COCO</p>
                                                </div>
                                                <div class="price">
                                                    <p>Price:8.00</p>
                                                </div>
                                            </div>
                                            <div class="menu2">
                                                <div class="card-menu">
                                                    <img class="img-fluid" src="frontend/images/icon index/food1.png">
                                                    <p>POTAGE<br>CREVETTES<br>ITRONNELL</p>
                                                </div>
                                                <div class="price">
                                                    <p>Price:8.00</p>
                                                </div>
                                            </div>
                                            <div class="menu">
                                                <div class="card-menu">
                                                    <img class="img-fluid" src="frontend/images/icon index/food1.png">
                                                    <p>POTAGE<br>RAVIOLIS</p>
                                                </div>
                                                <div class="price">
                                                    <p>Price:8.00</p>
                                                </div>
                                            </div>
                                            <div class="menu3">
                                                <div class="card-menu">
                                                    <div class="bg-cr-menu">
                                                        <img class="img-fluid"
                                                            src="frontend/images/icon menu/Drink1.png">
                                                    </div>
                                                    <p>BOISSONS</p>
                                                </div>
                                                <div class="price">
                                                    <p>Price:3.00</p>
                                                </div>
                                            </div>
                                            <div class="menu3">
                                                <div class="card-menu">
                                                    <div class="bg-cr-menu">
                                                        <img class="img-fluid"
                                                            src="frontend/images/icon menu/Drink1.png">
                                                    </div>
                                                    <p>BOISSONS</p>
                                                </div>
                                                <div class="price">
                                                    <p>Price:3.00</p>
                                                </div>
                                            </div>
                                            <div class="menu3">
                                                <div class="card-menu">
                                                    <div class="bg-cr-menu">
                                                        <img class="img-fluid"
                                                            src="frontend/images/icon menu/Drink1.png">
                                                    </div>
                                                    <p>BOISSONS</p>
                                                </div>
                                                <div class="price">
                                                    <p>Price:3.00</p>
                                                </div>
                                            </div>
                                            <div class="menu3">
                                                <div class="card-menu">
                                                    <div class="bg-cr-menu">
                                                        <img class="img-fluid"
                                                            src="frontend/images/icon menu/Drink1.png">
                                                    </div>
                                                    <p>BOISSONS</p>
                                                </div>
                                                <div class="price">
                                                    <p>Price:3.00</p>
                                                </div>
                                            </div>
                                            <div class="menu3">
                                                <div class="card-menu">
                                                    <div class="bg-cr-menu">
                                                        <img class="img-fluid"
                                                            src="frontend/images/icon menu/Drink1.png">
                                                    </div>
                                                    <p>BOISSONS</p>
                                                </div>
                                                <div class="price">
                                                    <p>Price:3.00</p>
                                                </div>
                                            </div> --}}
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
    var cate = '';
    var get_food ;
    var get_sub ;
    var get_sub_food ;
    var count_list = 0;
    var color_list = new Array();
    var number_active = '';
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
    function menu_click(fid){
      var food_list = get_food.find(x=>x.id == fid);
      if(old_menu != ''){
        $("#"+old_menu).removeClass("active");
      }
      // var list = "<tr><th scope='row' class='btn-dark' id='num"+fid+"'>1.00</th><td colspan='1' class='table-active btn-dark' id='num_name"+fid+"' style='background-color:#ff0000;'>"+cate+" "+food_list.name+"</td><td class='price btn-dark' id='num_price"+fid+"'>"+food_list.price+"</td></tr>";
      var list = "<tr onclick='list_active("+count_list+")'><th scope='row' class='btn-dark' id='num"+count_list+"'>1.00</th><td colspan='1' class='table-active btn-dark' id='num_name"+count_list+"'>"+cate+" "+food_list.name+" <input type='hidden' name='qty_num[]' value='1' id='sum_qty"+count_list+"'><input type='hidden' name='qty_id[]' value='"+food_list.id+"'></td><td class='price btn-dark' id='num_price"+count_list+"'><b id='show_price"+count_list+"'>"+food_list.price+"</b><input type='hidden' name='qty_price[]' value='"+food_list.price+"' id='sum_price"+count_list+"'></td></tr>";
      document.getElementById("m_act"+fid).classList.add('active');
      $('#show_list').append(list);
      old_menu = 'm_act'+fid;
      number_active = count_list;
      count_list++;
      color_list.push(food_list.color);
      recalass_list();
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
    function sub_click(sid){
      get_sub_food = food.filter(x=>x.sub_id == sid);
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
    function list_active(reid){
      number_active = reid;
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
    }
    function add_qty(){
        let qty = document.getElementById('sum_qty'+number_active).value*1;
        let total = document.getElementById('sum_price'+number_active).value*1;
        document.getElementById('sum_qty'+number_active).value = qty+1;
        document.getElementById('num'+number_active).innerHTML = (qty+1).toFixed(2) ;
        // document.getElementById('sum_price'+number_active).value = (qty+1)*total;
        document.getElementById('show_price'+number_active).innerHTML = ((qty+1)*total).toFixed(2) ;
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
