<html lang="en">
<?php include_once "non_logged_header.php" ?>

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/index.css">
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&family=Sen:wght@400;700;800&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
    <title>Home Design</title>
</head>

<body>



    <div class="container">
        <div class="content-container">

            <div class="game-list-container">
            <p class="section-heading"> CURRENTLY SHOWING LIVE GAMES</p>
                <div class="game-list-wrapper">
                    <div class="game-list">
                        <div class="game-list-item">
                            <img class="game-list-item-img" src="images/footballs.jpg" alt="">
                            <span class="game-list-item-title">Football</span>
                            <button class="game-list-item-button" onclick="location.href='register.php'">Watch</button>

                        </div>

                        <div class="game-list-item">
                            <img class="game-list-item-img" src="images/iceskating.jpg" alt="">
                            <span class="game-list-item-title">Ice skating</span>
                            <button class="game-list-item-button" onclick="location.href='register.php'">Watch</button>

                        </div>


                    </div>
                </div>
            </div>


<div class="container">
    <div class="content-container">

            <p class="section-heading"> HIGHLIGHTS OF FUN OLYMPICS GAMES 2022</p>

          </div>
           &nbsp;

        <div class="row">
            <div class="col-md-4 card-deck">
                <?php
             $query = "SELECT * FROM videos ORDER BY upload_date DESC LIMIT 3";
             $select_videos = mysqli_query($connection, $query);
             while($row = mysqli_fetch_assoc($select_videos)) {
                 $vid = $row['vid'];
                 $title = $row['title'];
                 $video_path = $row['video_path'];
                 $upload_date = $row['upload_date'];
                ?>

                <div class="card">
                    <!-- <a href="video_streaming.php?vid=<?php echo $vid ?>"> -->
                    <video width="30%" controls>
                        <source src="videos/<?php echo $video_path ?>" type="video/mp4">
                    </video>
                    <div class="card-footer">
                    <a href="play_video.php?vid=<?php echo $vid ?>&title=<?php echo $title ?>&type=highlight">
                            <h5 class="card-title"
                                style="overflow: hidden; display: -webkit-box; -moz-box-orient: vertical;
                                    -webkit-box-orient: vertical; box-orient: vertical; -webkit-line-clamp: 2; ine-clamp: 2; ">
                                <?php echo $title ?></h5>
                        </a>
                        <small class="text-muted">Uploaded: <?php echo $upload_date  ?> </small>
                    </div>
                </div>

                <?php } ?>
            </div>
        </div>
            </div>
        </div>
    </div>

</body>

</html>
<script src="app.js"></script>

     <style>
        /* .navbar {
  width: 100%;
  height: 50px;
  background-color: rgb(99, 141, 109);
  position: sticky;
  top: 0;
} */
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
  transform: translateX(0);
  transition: all 1s ease-in-out;
}

.game-list-item {
  margin-right: 30px;
  position: relative;
}

.game-list-item:hover .game-list-item-img {
  transform: scale(1.2);
  margin: 0 30px;
  opacity: 0.5;
}

.game-list-item:hover .game-list-item-title,
.game-list-item:hover .game-list-item-desc,
.game-list-item:hover .game-list-item-button {
  opacity: 1;
}

.game-list-item-img {
  transition: all 1s ease-in-out;
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
  transition: 1s all ease-in-out;
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
  transition: 1s all ease-in-out;
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
  transition: 1s all ease-in-out;
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
