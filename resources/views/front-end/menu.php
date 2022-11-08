<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>@include("$prefix.inc_header")
</head>
<body>
@include("$prefix.inc_topmenu")

<div class="container-fluid">
    <div class="form-menu">
      <div class="row">
        <div class="col-xl-4">
        <div class="showmenu">
          <div class="btn-No-Ok">
              <button class="no" onclick="window.location.href='{{url('/')}}';">Esc = cancel</button>
              <button class="ok"><img src="images/icon menu/Check_ring1.svg">F12 ok</button>
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
              <button class="A-drop"><img class="a-drop img-fluid" src="images/icon menu/Add_2.svg"><br>Qty +1</button>
              <div class="remove-btn">
                <button class="A-drop2"><img class="a-drop img-fluid" src="images/icon menu/Remove_3.svg"></button>
              </div>
              <button class="A-drop"><img class="a-drop img-fluid" src="images/icon menu/Dell_4.svg"><br>Qty -1</button>
              <button class="A-drop"><img class="a-drop img-fluid" src="images/icon menu/123_5.svg"><br>Qty +1</button>
              <button class="A-drop"><img class="a-drop img-fluid" src="images/icon menu/Cancel_6.svg"><br>Qty -1</button>
          </div>
          <div class="Move-Up">
            <button class="move"><img class="a-drop img-fluid" src="images/icon menu/move_up1.png"></button>
          </div>
          <div class="showmenu-table">
              <table class="table">
                  <tbody>
                      <tr>
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
                      </tr>
                  </tbody>
              </table>
          </div>
            <div class="show-price">
                <p>0.00</p>
            </div>
            <div class="move-btn">
              <div class="move-UD">
                <button><img class="a-drop img-fluid" src="images/icon menu/Arrow_drop_up_1.svg"><br>MOVE</button>
                <button><img class="a-drop img-fluid" src="images/icon menu/Arrow_drop_up_2.svg"><br>MOVE</button>
              </div>
              <div class="move-D">
                <button><img class="a-drop img-fluid" src="images/icon menu/move_down2.svg"></button>
              </div>
            </div>
        </div>
        </div>
        <div class="col-xl-8 pr-0">
        <div class="choosemenu">
            <div class="btn-choosemenu">
          <div class="btn-food">
            <div class="menu-with-LR">
              <div class="row">
                <div class="col-xl-10">
                  <div class="allmemuBtnContainer">
                  <div id="memuBtnContainer">
                    <button class="btn active"> POTAGE</button>
                    <button class="btn-yl" > ENTREE</button>
                    <button class="btn-y" > POULET</button>
                    <button class="btn-rl" > PORC</button>
                    <button class="btn-r" > BOEUF</button>
                    <button class="btn-p" >CREVETTE</button>
                    <button class="btn-p" > COMPOSAN</button>
                    <button class="btn" > CANARD</button>
                    <button class="btn" > RIZ SAUTE</button>
                    <button class="btn-c" > NOUUILLES</button>
                    <button class="btn-g" > VEGETARIE</button>
                    <button class="btn-b" > BOISSONS</button>
                    <button class="btn-p" > DESSERTS</button>
                    <button class="btn" > LIVRAISON</button>
                    <button class="btn" > INGREDIENT</button>
                    <button class="btn" > DIVERS</button>
                    <button class="btn" > SUPLMT</button>
                  </div>
                  </div>
                </div>
                <div class="col-xl-2 p-0">
                  <div class="allbtn-service">
                  <div class="btn-service">
                    <button class="service"><img class="img-fluid" src="images/icon menu/move_up1.png"></button>
                    <button class="c">close</button>
                    <button class="service"><img class="img-fluid" src="images/icon menu/Down_move.svg"></button>
                    <button class="service">service</button>
                    <button class="service"><img class="img-fluid" src="images/icon menu/with.svg">with</button>
                    <button class="c">Mode Normal</button>
                  </div>
                  </div>
                </div>
              </div>
            </div>
              <div class="all-move-menu">
                <div class="menu-L">
                    <button class="btn" >CHAUDE</button>
                    <button class="btn" >SOFT</button>
                    <button class="btn" >VINS</button>
                    <button class="btn" >DIGESTIFS</button>
                    <button class="btn" >APEROS</button>
                </div>
                <div class="move-R">
                    <button><img class="img-fluid" src="images/icon menu/left_move.svg"></button>
                    <button><img class="img-fluid" src="images/icon menu/Right_move.svg"></button>
                    <button><img class="img-fluid" src="images/icon menu/move_up1.png"></button>
                    <button><img class="img-fluid" src="images/icon menu/Down_move.svg"></button>
                </div>
              </div>
              <div class="allmenu">
              <div id="menucontainer">
                  <div class="menu active">
                      <div class="card-menu">
                        <img class="img-fluid" src="images/icon index/food1.png">
                        <p>POTAGEPOULET<br>COCO</p>
                      </div>
                      <div class="price"><p>Price:8.00</p></div>
                  </div>
                  <div class="menu2">
                    <div class="card-menu">
                        <img class="img-fluid" src="images/icon index/food1.png">
                        <p>POTAGE<br>CREVETTES<br>ITRONNELL</p>
                    </div>
                    <div class="price"><p>Price:8.00</p></div>
                  </div>
                  <div class="menu">
                    <div class="card-menu">
                        <img class="img-fluid" src="images/icon index/food1.png">
                        <p>POTAGE<br>RAVIOLIS</p>
                    </div>
                    <div class="price"><p>Price:8.00</p></div>
                  </div>
                  <div class="menu3">
                    <div class="card-menu">
                      <div class="bg-cr-menu">
                        <img class="img-fluid" src="images/icon menu/Drink1.png">
                      </div>
                        <p>BOISSONS</p>
                    </div>
                    <div class="price"><p>Price:3.00</p></div>
                  </div>
                  <div class="menu3">
                    <div class="card-menu">
                      <div class="bg-cr-menu">
                        <img class="img-fluid" src="images/icon menu/Drink1.png">
                      </div>
                        <p>BOISSONS</p>
                    </div>
                    <div class="price"><p>Price:3.00</p></div>
                  </div>
                  <div class="menu3">
                    <div class="card-menu">
                      <div class="bg-cr-menu">
                        <img class="img-fluid" src="images/icon menu/Drink1.png">
                      </div>
                        <p>BOISSONS</p>
                    </div>
                    <div class="price"><p>Price:3.00</p></div>
                  </div>
                  <div class="menu3">
                    <div class="card-menu">
                      <div class="bg-cr-menu">
                        <img class="img-fluid" src="images/icon menu/Drink1.png">
                      </div>
                        <p>BOISSONS</p>
                    </div>
                    <div class="price"><p>Price:3.00</p></div>
                  </div>
                  <div class="menu3">
                    <div class="card-menu">
                      <div class="bg-cr-menu">
                        <img class="img-fluid" src="images/icon menu/Drink1.png">
                      </div>
                        <p>BOISSONS</p>
                    </div>
                    <div class="price"><p>Price:3.00</p></div>
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
?>
<script type="text/javascript">
  var old_btn = '';
  var old_menu = '';
  var cate = '';
  var get_food ;
  function btn_click(id,cid,name){
    cate = name;
    get_food = food.filter(x=>x.cat_id == cid);
    if(old_btn != ''){
      $("#"+old_btn).removeClass("active");
    }
    var data = '';
      for(x =0 ; x < get_food.length ; x++) {
        data = data+"<div class='menu' id='m_act"+get_food[x].id+"' onclick='menu_click("+get_food[x].id+")' style='background-color:"+get_food[x].color+";'><div class='card-menu' ><img class='img-fluid' src='"+get_food[x].img+"'><p>"+get_food[x].name+"</p></div><div class='price'><p>Price:"+get_food[x].price+"</p></div></div>" ;
      }
    document.getElementById("menucontainer").innerHTML = data;
    document.getElementById("btn_"+id).classList.add('active');
    old_btn = 'btn_'+id;
    old_menu = ''; 
  }
  function menu_click(fid){
    var food_list = get_food.find(x=>x.id == fid);
    if(old_menu != ''){
      $("#"+old_menu).removeClass("active");
    }
    var list = "<tr><th scope='row' id='num"+fid+"'>1.00</th><td colspan='1' class='table-active' id='num_name"+fid+"' style='background-color:"+food_list.color+";'>"+cate+" "+food_list.name+"</td><td class='price' id='num_price"+fid+"'>"+food_list.price+"</td></tr>";
    document.getElementById("m_act"+fid).classList.add('active');
    $('#show_list').append(list);
    old_menu = 'm_act'+fid;
  }
</script>
<!-- Active Menu -->
<script>
var btnContainer = document.getElementById("menucontainer");
var btns = menuContainer.getElementsByClassName("menu");
for (var i = 0; i < btns.length; i++) {
  btns[i].addEventListener("click", function(){
    var current = document.getElementsByClassName("active");
    current[0].className = current[0].className.replace(" active", "");
    this.className += " active";
  });
}
</script>



@include("$prefix.inc_footer")
</body>
</html>