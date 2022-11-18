<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <?php include "header.php"?>
    <title>Homepage</title>
</head>

<body>

<title>HomePage: Enjoy every sports</title>

<!-------------------------------------------------- Search -------------------------------------------------->
<div class="row" style="margin:100px 0 10px 0">
    <div class="col-md-4"></div>
    <div class="col-md-6">
        <form action="search.php" method="post">
            <div class="input-group">
                <input type="search" required name="search" id="" class="form-control" placeholder="Search"
                    autocomplete="on">
                <button type="submit" name="btn-search" class="btn btn-primary">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </form>
    </div>
</div>


<!-------------------------------------------------- Extra Buttons -------------------------------------------------->


 
        <!-------------------------------------------------- Live Videos -------------------------------------------------->

       
<div class="row">
    <div class="col-md-12">
                     <p class="section-heading ">Live Videos</p>
                         <div class="game-list-wrapper">
                            <div class="game-list">
                                 <div class="game-list-item">
                                    <img class="game-list-item-img" src="images/footballs.jpg" alt="">
                                    <button class="game-list-item-button" onclick="location.href='view_live_videos.php'">Watch</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

      
        
        <!-------------------------------------------------- Videos -------------------------------------------------->
        <div class="row">
            <div class="col-md-12">
                <p class="section-heading"> HIGHLIGHTS OF GAMES</p>

            </div>
            <div class="col-md-6">
                <p class="text-right" style="padding-top: 20px"></p>
            </div>
        </div>
        <div class="row" style="margin-bottom:20px">
            <div class="card-deck">
            <?php  
             $query = "SELECT * FROM videos ORDER BY upload_date DESC LIMIT 3";
             $select_videos = mysqli_query($connection, $query);
             while($row = mysqli_fetch_assoc($select_videos)) {
                 $vid                = $row['vid'];
                 $title     = $row['title'];
                 $video_path     = $row['video_path'];
                 $upload_date     = $row['upload_date'];
                ?>

                <div class="card">
                    <!-- <a href="video_streaming.php?vid=<?php echo $vid ?>"> -->
                    <video width="100%" controls>
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
</body>
</html>
<?php include "footer.php"?>
<style>
     .container {
    background-color: 	#a39193;
    min-height: calc(100vh - 50px);
    width: 2000px;
    color: white;
  }
</style>

