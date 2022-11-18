<html lang="en">
<?php include "non_logged_header.php" ?>

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Home Design</title>
</head>

<body>
<div class="container">
        <div class="content-container">
            
            <div class="game-list-container">
                <div class="game-list-wrapper">
                    <div class="game-list">
                        <div class="game-list-item">
                            <img class="game-list-item-img" src="images/w1.webp" alt="">
</a>
                        </div>
                        <div class="game-list-item">
                            <img class="game-list-item-img" src="images/w2.jpg" alt="">
</a>
                        </div>
                        <div class="game-list-item">
                            <img class="game-list-item-img" src="images/w3.jpg" alt="">
</a>
                        </div>
                        <div class="game-list-item">
                            <img class="game-list-item-img" src="images/w4.jpeg" alt="">
</a>
                        </div>
                    </div>
                    </div>
                    </div>

            <div class="game-list-container">
                <div class="game-list-wrapper">
                    <div class="game-list">                        
                        <div class="game-list-item">
                            <img class="game-list-item-img" src="images/w5.jpg" alt="">
</a>
                        </div>
                        <div class="game-list-item">
                            <img class="game-list-item-img" src="images/w6.jpg" alt="">
</a>
                        </div>
                        <div class="game-list-item">
                            <img class="game-list-item-img" src="images/w7.jpg" alt="">
</a>
                        </div>
                        <div class="game-list-item">
                            <img class="game-list-item-img" src="images/w8.jpg" alt="">
</a>
                        </div>

                    </div>
                </div>
            </div>
            <div class="game-list-container">
                <div class="game-list-wrapper">
                    <div class="game-list">                        
                        <div class="game-list-item">
                            <img class="game-list-item-img" src="images/w9.jpg" alt="">
</a>
                        </div>
                        <div class="game-list-item">
                            <img class="game-list-item-img" src="images/w10.webp" onclick= "expand" alt="">
</a>
                        </div>
                        <div class="game-list-item">
                            <img class="game-list-item-img" src="images/w11.jpeg" alt="">
</a>
                        </div>
                        <div class="game-list-item">
                            <img class="game-list-item-img" src="images/w12.webp" alt="">
</a>
                        </div>

                    </div>
                </div>
            </div>
</body>
</html>

<style>
     
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
    font-size:20px;
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
  font-size: 25px;
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