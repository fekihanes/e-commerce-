<?php 
 session_start() ;
 
 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>signup</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <style>
      a {
        text-decoration: none; 
        color: inherit;
        display: block; 
      }
      li{
        margin-left: 20px;
      }
      select{
        background-color: #343a40;
        color: #ffffff;
      }
      </style>
      
</head>
<body>
<?php include "navbar.php"?>



<div class="container">
  <br>
  <div class="row">
      <div class="col mt-5 nb-5">
          <div class="col-md-8 mx-auto">
          
              <div class="col-8">
                  <div class ="card">
                      <div class="card-header">
                          Signup here
                      </div>
                      <div class="card-body">
                          <form  action="add_user.php" method="POST">
                              <div >
                                  <label >user name</label>
                                  <input type="text" name="login" class="test form-control" id="login" onblur="myFunctionsignup()" placeholder="user name">
                                </div>
                              <div >
                                  <label >email</label>
                                  <input type="email" name="email"class="test form-control" id="email" onblur="myFunctionsignup()" placeholder="email">
                                </div>
                              <div >
                                  <label >phone number</label>
                                  <input type="text" name="phone"class="test form-control" id="phone" onblur="myFunctionsignup()" placeholder="phone number">
                                </div>
                              <div >
                                  <label >adresse</label>
                                  <input type="text" name="adresse"class="test form-control" id="adresse" onblur="myFunctionsignup()" placeholder="adresse">
                                </div>
                              <div >
                                  <label >password</label>
                                  <input type="text" name="password"class="test form-control" id="password" onblur="myFunctionsignup()" placeholder="password">
                                </div>
                                <br>
                  
                                <button type="submit" class="btn btn-dark" style="float:left ;"value="disabled" disabled  id="submit">submit</button>
                            </form>
                            <button type="submit" class="btn btn-dark" style="float:left ;margin-left: 20px;"><a href="login.php">back</a></button>
                      </div>
                  </div>
              </div>
            </div>
            </div>
          </div>
      </div>
      <script src="sc.js"></script>
</body>
</html>