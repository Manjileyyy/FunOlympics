<?php include "functions.php" ?>

<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/index.css">
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&family=Sen:wght@400;700;800&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">

    <title>Home Design</title>
</head>



<body>
   

        <div class="navbar">
        <div class="navbar-container">
            <div class="logo-container">
                <h1 class="logo">Fun Olympics Games 2022</h1>
            </div>
            <img src="images/ol.png" height="50" width="50" alt=""></a>
            <div class="menu-container">
                <ul class="menu-list">
                    <li class="menu-list-item active"><a href='./guest.php'>Home</a></li>
                    <li class="menu-list-item"><a href='./game.php'>Games</a></li>
                    <li class="menu-list-item"><a href='./gallery1.php'>Gallery</a></li>
                    <li class="menu-list-item"><a href="./fix.php">Fixtures</a></li>              

                </ul>
            </div>
            <div class="profile-container align-end">
                <a href="register.php">
                    <button class="btn">Signup</button>
                </a>
                &nbsp;
                <a href="login.php">
                    <button class="btn">Login</button>
                </a>
            </div>
        </div>
    </div>
</body>
</html>
    <div class="container-fluid">

<body>

<div class="row">
    <div class="col-md-3" id="left-fixed">
        <h6 class="text-center" style="color:#ea540a;">Fixtures</h6>
        <div class="row fixtures">
            <div class="table-responsive">
                <table class="table table-bordered table-sm table-hover">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Match</th>
                            <th>Time</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                    $current_date = date("Y-m-d") ;   
                    $query = "SELECT * FROM fixtures ORDER BY fixture_date DESC LIMIT 4";
                    $select_fixtures = mysqli_query($connection, $query);
                    while($row = mysqli_fetch_assoc($select_fixtures)) {
                        $fixture_date                = $row['fixture_date'];
                        $fixture_title     = $row['fixture_title'];  
                        $fixture_time     = $row['fixture_time'];       
                        echo "<tr>";
                    echo "<td><small>$fixture_date</small></td>";
                    echo "<td><small>$fixture_title</small></td>";
                    echo "<td><small>$fixture_time</small></td>";
                    echo "</tr>";
                    }
                    ?>
                    </tbody>

                </table>
            </div>
        </div>
    </div>
</div>
</body>
</html>
<style>
     <>
    .logo{
    padding: 20px 10px;
}
.mr-auto .nav-item{
    margin:0 8px !important;
}

.navbar{
    background: #606b64;
    width:100%;
    font-size: 15px;
    font-weight: bold;
    height: max-content;
}

.nav-link{
    color:aliceblue !important;
}
.btn-submit{
    color:white;
    background-color: #606b64;
}
.btn-submit:hover{
    color:#606b64;
    background-color: white;
}
.section-heading{
    color:#606b64;
    font-weight: bold;
    font-size: 20px;
    border-bottom-style:solid; border-color:#606b64;
    padding-top: 20px;
    margin:0 !important;
}

.navbar-nav{
    align-items:center !important;
}

.navbar-container {
  display: flex;
  align-items: center;
  padding: 0 50px;
  height: 100%;
  color: rgb(249, 246, 238);
  font-family: "Sen", sans-serif;
}
.container {
  background-color:rgb(249, 246, 238);
  min-height: calc(100vh - 50px);
  color: white;
}
.btn{
 
  cursor: pointer;
                    outline: 0;
                    display: inline-block;
                    font-weight: 400;
                    line-height: 1.5;
                    text-align: center;
                    background-color: transparent;
                    border: 1px solid transparent;
                    padding: 6px 12px;
                    font-size: 1rem;
                    border-radius: .25rem;
                    transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out;
                    color: white;
                    border-color: white;
                   
                
}
.btn:hover {
                        color: black;
                        background-color: white;
                        border-color: black;
                    }
.container {
  background-color:#f5f5f5;
  min-height: calc(100vh - 50px);
  color: white;
}
h1{
    color:black;
    font-size:15px;
    padding-top:10px;
}

* {
  margin: 0;
}

body {
  font-family: "Roboto", sans-serif;
}



.logo-container {
  flex: 3;
}

.logo {
  font-size: 20px;
  color:white;
  
}

                
.menu-container {
  flex: 6;
}

.menu-list {
  display: flex;
  list-style: none;
}

.menu-list-item {
  margin-right: 30px;
}

.menu-list-item.active {
  font-weight: bold;
}


.container {
  background-color: rgb(255, 255, 255);
  min-height: calc(100vh - 50px);
  color: white;
}

.content-container {
  margin-left: 50px;

}


.game-list-container {
  padding: 0 20px;
}

.game-list-wrapper {
  position: relative;
  overflow: hidden;
}

.game-list {
  display: flex;
  align-items: center;
  height: 300px;
}

.game-list-item {
  margin-right: 30px;
  position: relative;
}

/* .game-list-item:hover .game-list-item-img {
  transform: scale(1.2);
  margin: 0 30px;
  opacity: 0.5;
}

.game-list-item:hover .game-list-item-title,
.game-list-item:hover .game-list-item-desc,
.game-list-item:hover .game-list-item-button {
  opacity: 1;
} */

.game-list-item-img {
  width: 270px;
  height: 200px;
  object-fit: cover;
  border-radius: 20px;
}

.game-list-item-title {
  background-color: 	#000000;
  padding: 0 10px;
  font-size: 32px;
  font-weight: bold;
  position: absolute;
  top: 10%;
  left: 50px;
  opacity: 0;
}

.game-list-item-desc {
  background-color: rgb(255, 255, 255);
  padding: 10px;
  font-size: 14px;
  position: absolute;
  top: 30%;
  left: 50px;
  width: 230px;
  opacity: 0;
}

.game-list-item-button {
  padding: 10px;
  background-color: #8ba27b;
  color: white;
  border-radius: 10px;
  outline: none;
  border: none;
  cursor: pointer;
  position: absolute;
  bottom: 20px;
  left: 50px;
  opacity: 0;
}
.profile-container {
  flex: 2;
  display: flex;
  align-items: center;
  justify-content: flex-end;
}

.profile-text-container {
  margin: 0 20px;
}

.profile-picture {
  width: 45px;
  height: 45px;
  border-radius: 20%;
  object-fit: cover;
  padding-right: 10px;
}
.video{
  margin-bottom: 1%;
  margin-top: 1%;
  height: 600;

}
.arrow {
  font-size: 120px;
  position: absolute;
  top: 90px;
  right: 0;
  color: lightgray;
  opacity: 0.5;
  cursor: pointer;
}
.game-list-title{
  font-size: 20px;
}

     </style>  
