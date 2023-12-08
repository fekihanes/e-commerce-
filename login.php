<?php 
 session_start() ;
 
 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
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
      }select{
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
                            login here
                        </div>
                        <div class="card-body">
                            <form action="valide_admin.php" method="POST">
                                <div class="mb-3">
                                <label for="email" class="form-label">user name</label>
                                <input type="text" class="form-control"  name="login"  id="login" onblur="myFunctionlogin()" placeholder="user name or your email">
                                </div>
                                <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" name="password" id="password" onblur="myFunctionlogin()" placeholder="password">
                                </div>
                                <button type="submit" class="btn btn-dark" value="disabled" disabled  style="float:left ;" id="submit">Submit</button>
                                
                              </form>
                              <button type="submit" class="btn btn-dark" style="float:left ;margin-left: 20px;"><a href="signup.php">Signup</a></button>
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
