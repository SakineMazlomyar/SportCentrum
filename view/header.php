<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-bar-block w3-white w3-collapse w3-top" style="z-index:3;width:250px;" id="mySidebar">
  <div class="w3-container w3-display-container w3-padding-16">
    <i onclick="w3_close()" class="fa fa-remove w3-hide-large w3-button w3-display-topright"></i>
    <h3 class="w3-wide" style="color: solid black; font-size: 26px;">SportCentrum</h3>
    <h3 class="w3-wide" style="color: solid black; font-size: 26px;" id="userView"> 
    
    </h3>
    <i class="fa fa-shopping-cart" style="font-size:40px;" onclick="redirectTheShoppingCart()" id="shoppingCart">
    <?php
    if(isset($_SESSION['choosen'])) {
      echo json_encode(count($_SESSION['choosen']));
    }else {
      echo json_encode(0);
    }
    ?>
    </i>

  </div>
  <div class="w3-padding-32 w3-large w3-text-grey">
    <form id="productPage" style="margin-left: 0.5em; margin-bottom: 0.1em;">
        <select name='categoryName' style="background-color: white;" id="linksOption">
          <option value='men'>Men</option>
          <option value='women'>Women</option>
            <option value='children'>Children</option>
            <option value='accessories'>Accessories</option>
            <option value='allProducts'>All Products</option>
        </select>
        <input type='submit' value='Search' name='submit' onclick="redirectForm()" style="border-radius: 0.5em; font-family: Montserrat, sans-serif; outline: none; font-size: 12px; background-color: #4CAF50;
color: white;" >
    </form>
  <a class="w3-bar-item w3-button w3-padding" href="#footer">Contact</a> 
  <a href="javascript:void(0)" class="w3-bar-item w3-button w3-padding" onclick="document.getElementById('newsletter').style.display='block'">Newsletter</a> 
</nav>

<!-- Top menu on small screens -->
<header class="w3-bar w3-top w3-hide-large w3-black w3-xlarge">
  <a id="sportcentrum-title" class="w3-bar-item w3-padding-24 w3-wide" href="index.php">SportCentrum</a>
  <a href="javascript:void(0)" class="w3-bar-item w3-button w3-padding-24 w3-right" onclick="w3_open()"><i class="fa fa-bars"></i></a>
</header>

<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:250px">

  <!-- Push down content on small screens -->
  <div class="w3-hide-large" style="margin-top:83px"></div>
  

  <header class="w3-container w3-xlarge">
    <p class="w3-right">
      <button onclick="showLoginModal()" style="width:auto;" id="LoginPop">Login</button><br>
      <button style="width:auto; opacity: 0;" id="LogOut" onclick="makeEmptySession()">LogOut</button>
      
      
    <div id="id01" class="modal" style="background-color: white;">
  
  <form class="modal-content animate" id="info">

    <div class="container" id="loginShow">
    <h3>Sign In</h3>

      <label for="username"><b>Username</b></label>
      <input type="text" placeholder="Enter Username" name="username" required>

      <label for="password"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="password" required>
      
      <input type="submit"  name="clickedButton" onclick="return test()" value="Sign In" style="background-color: lightgreen; border-radius: 0.5em;">
    </div>
    
  </form>

  <form id="registering">
    <div class="container" id="registerAccount">
      <h3 style="background-color: white;">Register OBS (If there is one admin then you can not sign up for admin)</h3>
      <label for="mail"><b>Enter Firstname</b></label>
      <input type="text" placeholder="Enter firstname" name="firstname" required>
      <label for="mail"><b>Enter Lastname</b></label>
      <input type="text" placeholder="Enter lastname" name="lastname" required>
      <label for="mail"><b>Enter adress</b></label>
      <input type="text" placeholder="Enter adress" name="adress" required>
      <label for="mail"><b>Enter country</b></label>
      <input type="text" placeholder="Enter country" name="country" required>
      <label for="mail"><b>Enter city</b></label>
      <input type="text" placeholder="Enter city" name="city" required>
      <label for="mail"><b>Enter phoneNo</b></label>
      <input type="text" placeholder="Enter phoneNo" name="phoneNo" required>

      <label for="mail"><b>Enter email</b></label>
      <input type="text" placeholder="Enter Username" name="mail" required>

      <label for="passwordRegister"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="passwordRegister" required>
      <label for="rol"><b>Role</b></label>
      <select name="rol">
      <option value="user">User</option>
      <option value="admin">Admin</option>
      </select>
      <label  style="background-color: white;">
        <input type="checkbox" checked="checked" name="nyhetsbrev"> Newsletter
      </label>

      
      <input type="submit"  name="isRegistered" onclick="return registerNewUser()" value="Register" style="background-color: lightgreen; border-radius: 0.5em;">
      </div>
    </form>

    <div class="container" style="background-color: white; text-align: center;">
      <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
      <span class="registerHere">No account? <a href="#" onclick="switchToRegisterForm()">Register here!</a></span>
      <span class="signInHere" style="margin-bottom: 3em;">Already have an Account? <a href="#" onclick="switchToLoginForm()">Sign In!</a></span>

    </div>
</div>


    </p>
  </header>



