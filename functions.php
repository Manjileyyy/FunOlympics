<?php include "db.php" ?>
<?php
session_start();

function redirect($location){
    return header("Location: " . $location);
    exit;
}

function escape($string) {
    global $connection;
    return mysqli_real_escape_string($connection, trim($string));
}

function register_user($fullname, $phone, $nationality, $email, $username, $password){
    global $connection;
    date_default_timezone_set("Asia/Kathmandu");
    $date=date('d-m-Y');
    $status='active';
    $is_admin=0;
    $profile_pic = 'profile.png';
    $password = password_hash($password, PASSWORD_BCRYPT, array('cost'=>12));
    $stmt = mysqli_prepare($connection, "INSERT INTO users(fullname, phone, nationality, email, profile_image, username, password, status, registered_date, is_admin) VALUES(?,?,?,?,?,?,?,?,?,?) ");
    mysqli_stmt_bind_param($stmt, 'ssssssssss', $fullname, $phone, $nationality, $email, $profile_pic, $username, $password, $status, $date, $is_admin);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    if($stmt == true){
      ?>
      <script>
          alert("Registration Successful !");
          window.location.replace("home.php");
      </script>
      <?php
      }
      else{
          redirect("register.php");
      }
    }


function login_user($username, $password){
    global $connection;

    $query = "SELECT * FROM users WHERE (email = '{$username}' OR username = '{$username}') AND status = 'active'";
    $select_user = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_array($select_user)) {
    $db_uid = $row ['uid'];
    $db_username = $row ['username'];
    $db_email = $row ['email'];
    $db_password = $row ['password'];
    $is_admin = $row['is_admin'];
        if (password_verify($password, $db_password)) {
        $_SESSION['uid'] = $db_uid;
        $_SESSION['username'] = $db_username;
        $_SESSION['email'] = $db_user_email;
        $_SESSION['logged_in'] = "logged_in";
        if($is_admin == 0){
            ?>
            <script>
                alert("Login Successful !");
                window.location.replace("home.php");
            </script>
        <?php
        }
        else{
            redirect("admin/index.php");
        }

        }
    }
}

function add_comment($uid, $vid, $content, $date, $time){
    global $connection;
    $stmt = mysqli_prepare($connection, "INSERT INTO comments(uid, vid, comment, date, time) VALUES(?,?,?,?,?) ");
    mysqli_stmt_bind_param($stmt, 'sssss', $uid, $vid, $content, $date, $time);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    if($stmt){
        return true;
    }
}

function update_view_count($views, $vid){
    global $connection;
    $query = "UPDATE videos SET views = $views+1 WHERE vid = '$vid'";
    $update_views = mysqli_query($connection, $query);
}

function fetch_highlights(){
    global $connection;
    $query = "SELECT * FROM videos";
        $select_videos = mysqli_query($connection, $query);
        $count = mysqli_num_rows($select_videos);
        while($row = mysqli_fetch_assoc($select_videos)) {
            $vid                = $row['vid'];
            $title     = $row['title'];
            $video_path     = $row['video_path'];
            $upload_date     = $row['upload_date'];
            echo "<div class='col-md-3'>
                    <div class='card-deck' style='margin-right:10px'>
                        <a href='play_video.php?vid=$vid&title=$title&type=highlight'>
                            <div class='card'>
                                <div class='card-body'>
                                    <video controls height=200 width=250>
                                        <source src='videos/$video_path' type='video/mp4'>
                                </div>
                                <div class='card-footer'>
                                    <h6 style='text-align:center'>$title</h6>
                                    <small class='text-muted'>Uploaded on:&nbsp; $upload_date</small>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>";
        }
}

function fetch_live_videos(){
global $connection;
$query = "SELECT * FROM live_videos";
$select_videos = mysqli_query($connection, $query);
$count = mysqli_num_rows($select_videos);
while($row = mysqli_fetch_assoc($select_videos)) {
$lvid = $row['lvid'];
$title = $row['video_title'];
$video_url = $row['video_url'];
$upload_date = $row['uploaded_date'];
echo "<div class='col-md-3'>
        <div class='card-deck' style='margin-right:10px'>
            <a href='play_video.php?vid=$lvid&title=$title&type=live'>
                <div class='card'>
                    <div class='card-body'>
                        <iframe width='' height='' src='$video_url' autoplay>
                        </iframe>
                    </div>
                    <div class='card-footer'>
                        <h6 style='text-align:center'>$title</h6>
                    </div>
                </div>
            </a>
        </div>
    </div>";
}
}
function fetch_videos_by_categories($category_name){
    global $connection;
    $query = "SELECT * FROM videos WHERE category_title ='$category_name'";
    $select_videos = mysqli_query($connection, $query);
    $count = mysqli_num_rows($select_videos);
    if($count<1){
        echo "<p class='text-danger'>No videos available</p>" ;
    }
    else{
        while($row=mysqli_fetch_assoc($select_videos)) {
            $vid=$row['vid'];
            $title=$row['title'];
            $video_path=$row['video_path'];
            $upload_date=$row['upload_date'];
            echo "<div class='col-md-3'>
                    <div class='card-deck' style='margin-right:10px'>
                        <a href='play_video.php?vid=$vid&title=$title'>
                            <div class='card'>
                                <div class='card-body'>
                                    <video controls height=200 width=250>
                                    <source src='videos/$video_path' type='video/mp4'>
                                </div>
                                <div class='card-footer'>
                                    <h6 style='text-align:center'>$title</h6>
                                    <small class='text-muted'>Uploaded on:&nbsp; $upload_date</small>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>" ;
        }
    }
}
function fetch_fixtures(){
    global $connection;
    $query = "SELECT * FROM fixtures";
    $select_fixtures = mysqli_query($connection, $query);
    while($row = mysqli_fetch_assoc($select_fixtures)) {

        $fid                = $row['fid'];
        $fixture_title     = $row['fixture_title'];
        $fixture_category     = $row['fixture_category'];
        $fixture_countries     = $row['fixture_countries'];
        $fixture_date     = $row['fixture_date'];
        $fixture_time     = $row['fixture_time'];
        echo "<div class='col-md-3' style='margin-bottom:50px'>
                <div class='card border-success'>
                    <div class='card-header'>
                        <small class='text-muted'>Date:$fixture_date
                            <br>Time:$fixture_time</small>
                    </div>
                    <div class='card-body'>
                        <h5 class='card-title' style='text-align:center'>$fixture_title</h5>
                        <small class='text-right'>$fixture_category</small>
                    </div>
                    <div class='card-footer'>
                        <small class='text-muted'>Countries:$fixture_countries</small>
                    </div>
                </div>
            </div>";
    }
}
function fixtures_by_category($category_name){
    global $connection;
    $query = "SELECT * FROM fixtures WHERE fixture_category = '$category_name'";
    $select_fixtures = mysqli_query($connection, $query);
    while($row = mysqli_fetch_assoc($select_fixtures)) {

        $fid                = $row['fid'];
        $fixture_title     = $row['fixture_title'];
        $fixture_category     = $row['fixture_category'];
        $fixture_countries     = $row['fixture_countries'];
        $fixture_date     = $row['fixture_date'];
        $fixture_time     = $row['fixture_time'];
        echo "<div class='col-md-3' style='margin-bottom:50px'>
                <div class='card border-success'>
                    <div class='card-header'>
                        <small class='text-muted'>Date:$fixture_date
                            <br>Time:$fixture_time</small>
                    </div>
                    <div class='card-body'>
                        <h5 class='card-title' style='text-align:center'>$fixture_title</h5>
                        <small class='text-right'>$fixture_category</small>
                    </div>
                    <div class='card-footer'>
                        <small class='text-muted'>Countries:$fixture_countries</small>
                    </div>
                </div>
            </div>";
    }
}
function fixtures_by_country($country_name){
    global $connection;
    $query = "SELECT * FROM fixtures WHERE fixture_countries LIKE '%$country_name%'";
    $select_fixtures = mysqli_query($connection, $query);
    while($row = mysqli_fetch_assoc($select_fixtures)) {

        $fid               = $row['fid'];
        $fixture_title     = $row['fixture_title'];
        $fixture_category  = $row['fixture_category'];
        $fixture_countries = $row['fixture_countries'];
        $fixture_date      = $row['fixture_date'];
        $fixture_time      = $row['fixture_time'];
        echo "<div class='col-md-3' style='margin-bottom:50px'>
                <div class='card border-success'>
                    <div class='card-header'>
                        <small class='text-muted'>Date:$fixture_date
                            <br>Time:$fixture_time</small>
                    </div>
                    <div class='card-body'>
                        <h5 class='card-title' style='text-align:center'>$fixture_title</h5>
                        <small class='text-right'>$fixture_category</small>
                    </div>
                    <div class='card-footer'>
                        <small class='text-muted'>Countries:$fixture_countries</small>
                    </div>
                </div>
            </div>";
    }
}
function fetch_photos(){
    global $connection;
    $sql = "SELECT * FROM photos";
    $rs_result = mysqli_query ($connection, $sql);
    while ($row = mysqli_fetch_assoc($rs_result)) {
        $pid            = $row['pid'];
        $caption        = $row['caption'];
        $category_title = $row['category_title'];
        $image_path     = $row['image_path'];
        $upload_date    = $row['upload_date'];
        $upload_time    = $row['upload_time'];

        echo "

            <div class='image-column'>
            <img src='images/$image_path' alt='$caption' data-toggle='modal' data-target='#imageModal'>
            </div>
        <div class='modal fade' id='imageModal' tabindex='-1' role='dialog' aria-labelledby='imageModalLabel'
            aria-hidden='true'>
            <div class='modal-dialog' role='document'>
                <div class='modal-content'>
                    <div class='modal-header'>
                        <h5 class='modal-title' id='imageModalLabel'>$caption</h5>
                        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                            <span aria-hidden='true'>&times;</span>
                        </button>

                    </div>
                    <div class='modal-body'>
                        <img src='images/$image_path' alt='' style='width:100%; height:400px; object-fit:contain'>
                    </div>
                </div>
            </div>
        </div>
        ";
    }
}
function fetch_photos_by_category($category_name){
    global $connection;
    $sql = "SELECT * FROM photos WHERE category_title='$category_name'";
    $rs_result = mysqli_query ($connection, $sql);
    while ($row = mysqli_fetch_assoc($rs_result)) {
        $pid            = $row['pid'];
        $caption        = $row['caption'];
        $category_title = $row['category_title'];
        $image_path     = $row['image_path'];
        $upload_date    = $row['upload_date'];
        $upload_time    = $row['upload_time'];

        echo "<div class='responsive' style='box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19)'>
                <div class='gallery'>
                    <a class='image' href='images/$image_path ' title='$caption'>
                        <img src='images/$image_path' alt='$caption'>
                    </a>
                </div>
            </div>
            <script>
                $('.row').magnificPopup({
                    delegate: '.image',
                    type: 'image',
                    gallery: {
                        enabled: true
                    }
                });
            </script>";
    }
}
function commentsCount($table, $id){
    global $connection;
    $query = "SELECT * FROM " . $table . " WHERE vid=" . $id;
    $select_from_table = mysqli_query($connection, $query);
    $result = mysqli_num_rows($select_from_table);
    return $result;
}
function add_to_favorite($uid, $vid){
    global $connection;
    $stmt = mysqli_prepare($connection, "INSERT INTO favorite_videos(uid, vid) VALUES(?,?) ");
    mysqli_stmt_bind_param($stmt, 'ss', $uid, $vid);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    if($stmt){
        return true;
    }
}
function remove_from_favorite($uid, $vid){
    global $connection;
    $query = "DELETE FROM favorite_videos WHERE uid = $uid AND vid = $vid";
    mysqli_query($connection, $query);
}
function is_favorite_video($uid, $vid){
    global $connection;
    $query = "SELECT * FROM favorite_videos WHERE uid = $uid AND vid = $vid";
    $select_query = mysqli_query($connection, $query);
    $result = mysqli_num_rows($select_query);
    return $result;
}
