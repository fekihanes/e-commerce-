<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<style>      
      
      .priceSlider
      {
      margin-left:30% ;
      width: 30%;
      background-color: #fff;
      border-radius: 5px;
      padding: 10px 20px;
      box-shadow: 0px 0px 3px 1px #888;    

      }
      
      .min-max label
      {
      font-size: 14px;
      float: left;
      margin-right: 5px;
      line-height: 1.6;    
      }
      .min
      {
      float: left;    
      }
      .max
      {
      float: right;    
      }
      .min-max
      {
      width: 90%;
      max-width: 200px;
      margin: 0 auto;
      padding: 25px 0px 15px 0px;    
      }
      .min-max span
      {
      font-size: 10px;
      text-align: center;
      display: inline-block;
      width: 30px;
      border: 1px solid #dedede;    
      }
      .min-max-range
      {
      padding: 30px 0px 20px 0px;    
      }
      .range
      {
      -webkit-appearance:none;
      appearance:none;
      width: 50%;
      height: 10px;
      max-width: 400px;
      background-color: #dedede;
      margin: 0;
      padding: 0;
      outline: none;
      float: left;    
      }
      .range::-webkit-slider-thumb
      {
      -webkit-appearance:none;
      appearance:none;
      background-color: #000;
      height: 10px;
      width: 10px;
      border-radius: 50%;
      cursor: pointer;
      }
      .range::moz-range-thumb
      {
      -webkit-appearance:none;
      appearance:none;
      background-color: #000;
      height: 10px;
      width: 10px;
      border-radius: 50%;
      cursor: pointer;
      }
      .imgpppl{
        height: 40px;
        width: 40px;
      }
      </style> 

<script>
  // jQuery is used here for simplicity, but you can use vanilla JavaScript if preferred
  $(document).ready(function(){
    $("#toggleNavbarBtn").click(function(){
      $("#myNavbar").toggle();
    });
  });
</script>
<style>
    .hidden-navbar {
      display: none;
    }
  </style>


<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  <a class="navbar-brand" href="#"><img src="icon/logoo.png"></a>
  
  <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item active">
        <a class="nav-link" href="home.php">Home </a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link" href="onlymanga.php">manga</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="onlymanhwa.php">manhwa</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="listprom.php">prommmmo</a>
      </li>
      <li class="nav-item"><?php
       if( isset($_SESSION['lastname'])) { 
        echo"<a class='nav-link' href='logout.php'>logout</a>";
      } else{
        echo"<a class='nav-link' href='login.php'>login</a>";        
      }
      ?>        
      </li>
      <li class="nav-item">
        <a href="panier.php" class="nav-link" >Panier<span ></span><?= isset($_SESSION['panier']) ? array_sum($_SESSION['panier']) : 0 ?></span></a>
      <li>   
      </li>
      <li class="nav-item">
        <a class="nav-link " href="my_orders.php"><?php
       if( isset($_SESSION['lastname'])) { 
          echo($_SESSION['lastname']);} 
          ?>
          </a>
      </li>
        </ul>
        <button id="toggleNavbarBtn" class="btn btn-outline-light"><img src="icon/menu-burger.png"class="imgpppl"></button>
        <form method="GET" action="filter.php?mode" style="float:left;margin-left: 4%;" id="filterForm">
        <select name="mode"  onchange="submitfilterForm()">
                    <option disabled selected >your filter mode ?</option>
                    <option value="nouvel_article" >nouvel article</option>
                    <option value="top_article" >best article</option>
                    <option value="to_popularity" >to popularity</option>
                    <option value="low_to_high" >prix (low to high)</option>
                    <option value="high_to _ow" > prix (high to low)</option>
                    <option value="a-z"> name (a-z)</option>
                    <option value="z-a"> name (z-a)</option>
                  </select>
                  <br>

        </form>
        <?php
          if( isset($_SESSION['niv']) &&$_SESSION['niv']>=2) { 
            echo"<form id='AhForm' action='#' method='GET 'style='float:right;margin-left: 4%;' >
                <select id='mySelect' onchange='redirectToPage()'>
                    <option value='' selected disabled>Choisissez une option</option>
                    <option value='add_article.php'>Ajouter un article</option> 
                    <option value='ordres.php'>Liste des commandes</option>                              
                    ";
          }if(isset($_SESSION['niv']) &&$_SESSION['niv']==3){
            echo"<option value='add_admin.php'>Ajouter un admin</option>";
            echo"<option value=supp_admin.php>delete user or admin</option>";
          }
          echo"</select></form>";
        ?>
          
        <form method="GET" action="find_cate.php?categories" style="float:right;margin-left: 4%;" id="navForm">
        <select name="categories"  onchange="submitnavForm()">
                    <option disabled selected >your categorie ?</option>
                    <option value="shonen" >shonen</option>
                    <option value="seinen" >seinen</option>
                    <option value="shojo" >shojo</option>
                    <option value="Horror" >Horror</option>
                    <option value="action" >action</option>
                    <option value="Sport" >Sport</option>
                    <option value="samourai" >samourai</option>
                    <option value="isekai" >isekai</option>
                    <option value="ecchi" >ecchi</option>
                    <option value="mika" >mika</option>
                  </select>
                  <br>

        </form>
      <form class="form-inline my-2 my-lg-0" action="find.php?name" method="GET" style="margin-left: 4%; float:right;">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="name">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
      </form>
      
    </div>
  </nav>
  <nav class="navbar navbar-light bg-light hidden-navbar" id="myNavbar" style="float:left;margin-left: 4%;">
    <form class="priceSlider" action="pricerange.php" method="GET" id="formprixrange">
      <div class="min-max">
        <div class="min">
          <label for="min">Min</label>
          <span id="min-value"></span>
        </div>
        <div class="max">
          <label for="max">Max</label>
          <span id="max-value"></span>
        </div>
      </div>
      
      <div class="min-max-range">
        <input type="range" min="0" max="250" value="100" class="range" id="min" name="min" oninput="updateMinValue()">
        <input type="range" min="251" max="500" value="300" class="range" id="max" name="max" oninput="updateMaxValue()">
      </div>

      <button class="btn btn-outline-success my-2 my-sm-0" type="submit" >Search</button>

  <div style="clear: both;"></div>
</form>

</nav>

<script src="sc.js"></script>
<script>
    function redirectToPage() {
        var selectedOption = document.getElementById("mySelect").value;
        var form = document.getElementById("AhForm");

        form.setAttribute('action', selectedOption);

        form.submit();
    }
    function submitfilterForm() {
    document.getElementById("filterForm").submit();
}
      var minSlider = document.getElementById('min');
      var maxSlider = document.getElementById('max');
      
      var outputMin = document.getElementById('min-value');
      var outputMax = document.getElementById('max-value');
      
      outputMin.innerHTML = minSlider.value;
      outputMax.innerHTML = maxSlider.value;
      
      minSlider.oninput = function(){
       outputMin.innerHTML=this.value;    
      }
      
      maxSlider.oninput = function(){
       outputMax.innerHTML=this.value;    
      }
</script>
