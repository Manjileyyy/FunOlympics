<?php
$display_icon_minus = "fa-plus";
if(isset($_POST['add_category'])){
    $category_title = $_POST['category_title'];
    if(empty($category_title)){
        $category_title_message = "*Category title cannot be empty.";
        $display_true ="block";
        $display_icon_minus = "fa-minus";
        $category_title_message_color = "text-danger";
    }
    else{
        add_category($category_title);
        $category_title_message = "New category added successfully.";
        $category_title_message_color = "text-success";
        $display_icon_minus = "fa-minus";
        $display_true ="block";
    }
}
?>
<link rel="stylesheet" href="../sidebar.css">
<div class="sidenav">
    <div class="row">
        <ul>
        <hr>
            <li class="sidenav-list"><a href="../admin/"><i class="fa-solid fa-gauge"></i>Dashboard</a></li>
            <hr>
            <li class="sidenav-list" id="category"><i class="fa-solid fa-list"></i>Sports Category
                <ul>
                    <li class="sidenav-sublist" style="cursor:pointer;" onclick="showAddCategoryForm()"><i
                            class="fa-solid <?php echo isset($display_icon_minus)?$display_icon_minus:'' ?>"
                            id="add-category-icon"></i>Add Category</li>
                    <li id="add-category-form" style="display:<?php echo isset ($display_true)?$display_true:''?>">
                        <small
                            class="<?php echo isset($category_title_message_color)?$category_title_message_color:'' ?>"><?php echo  isset($category_title_message)?$category_title_message:''?></small>
                        <form action="" method="post">
                            <div class="form-group">
                                <input type="text" name="category_title" id="" class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="submit" value="Add" name="add_category" class="btn btn-success">
                            </div>
                        </form>
                    </li>
                    <li class="sidenav-sublist"><a href="view_categories.php"><i
                                class="fa-solid fa-dice-d6"></i>View Category</a></li>
                </ul>
            </li>
            <hr>
            <li class="sidenav-list" id="videos"><i class="fa-solid fa-film"></i>Videos
                <ul>
                    <li class="sidenav-sublist"><a href="add_video.php"><i class="fa-solid fa-plus"></i>&nbsp;Add New
                            Video</a></li>
                    <li class="sidenav-sublist"><a href="view_videos.php"><i class="fa-solid fa-video"></i>&nbsp;View
                            All Videos</a></li>
                </ul>
            </li>
            <hr>
            <li class="sidenav-list" id="videos"><i class="fa-solid fa-images"></i>&nbsp;Gallery
                <ul>
                    <li class="sidenav-sublist"><a href="add_photo.php"><i class="fa-solid fa-plus"></i>&nbsp;Add New
                            Photo</a></li>
                    <li class="sidenav-sublist"><a href="view_photos.php"><i class="fa-solid fa-layer-group"></i>&nbsp;View
                            All Photos</a></li>
                </ul>
            </li>
           
            <hr>
            <li class="sidenav-list"><a href="add_fixtures_modal.php"><i class="fa-solid fa-plus"></i>&nbsp;Add Fixtures</a></li>

            
    </div>
</div>

<script src="js/sidebar.js"></script>
<style>
.sidenav{
    position: fixed;
    height: 100%;
    width: 240px;
    background: gray;
    transition: all 0.5s ease;
}
ul li {
    list-style: none;
    color:	#FFFFFF;
}
ul li a{
    color: 	#FFFFFF
}
ul li a:hover{
    text-decoration: none;
}
/* .sidenav-list{
    padding-top: 10px
} */
.sidenav-sublist{
    padding-top: 8px;
    
}
#add-category-form{
    display: none;
}
.fa-gauge, .fa-minus{
    color:	#FFFFFF;
}
.fa-plus, .fa-square-plus{
    color: 	#FFFFFF;
}
.fa-dice-d6, .fa-list, .fa-film, .fa-video, .fa-circle-dot, .fa-images, .fa-users, .fa-newspaper, .fa-comment-dots{
    color: 	#FFFFFF;
}

.fa-upload{
    color: 	#FFFFFF;
}

.fa-layer-group{
    color: 	#FFFFFF;
}
</style>

