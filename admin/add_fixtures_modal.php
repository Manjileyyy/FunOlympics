<?php include_once "admin_header.php" ?>

<title>Admin: Add Fixtures</title>
<?php
 $upload_date = date('d-m-Y');
 $upload_time = date("h:i:sa");
if(isset($_POST['add_fixture'])){
  $fixture_title = escape($_POST['fixture_title']);
  $fixture_date = escape($_POST['fixture_date']);
  $fixture_time = escape($_POST['fixture_time']);
  $fixture_category = escape($_POST['category_title']);
  $fixture_countries = escape($_POST['fixture_countries']);

  $fixture_error = [
    'title_error'=> '',
    'date_error'=> '',
    'time_error'=> '',
    'countries_error'=> '',
    'category_error'=>'',
  ];

  if(empty($fixture_title)){
    $fixture_error['title_error'] = 'Title cannot be empty.';
  }
  if(empty($fixture_date)){
    $fixture_error['date_error'] = 'Please select date';
  }
  if(empty($fixture_category)){
    $fixture_error['category_error'] = 'Select one category.';
  }
  if(empty($fixture_time)){
    $fixture_error['time_error'] = 'Please select time.';
  }
  if(empty($fixture_countries)){
    $fixture_error['countries_error'] = 'Please select countries';
  }

  foreach ($fixture_error as $key => $value){
    if(empty($value)){
        unset($fixture_error[$key]);
    }
}
if(empty($fixture_error)){
    if(add_fixture($fixture_title, $fixture_date, $fixture_time, $fixture_category, $fixture_countries)){

        $fixture_upload_message = "Fixture has been added successfully";
        $fixture_upload_message_color ="text-success";
    }
    else{
        $fixture_upload_message = "Fixture could not be added";
        $fixture_upload_message_color ="text-danger";
    }
}
}
?>
<div class="col-md-3">
    <?php include "sidebar.php"?>
</div>
<div class="col-md-12" id="main-container">
    <div class="row">
        <div class="col-md-6">
            <h4>Add Fixtures</h4>
            <hr>
            <p class="<?php echo isset($fixture_upload_message_color) ? $fixture_upload_message_color : ''?>">
                <?php echo isset($fixture_upload_message) ? $fixture_upload_message : ''?></p>
            <form action="" method="post" enctype="multipart/form-data">
              <div class="form-group">
                <label>Title</label>
                <input type="text" name="fixture_title" class="form-control">
              </div>
              <div class="form-group">
                <label for="fixture_date">Date</label>
                  <input type="date" name="fixture_date" id="" class="form-control">
                </div>
                <div class="form-group">
                  <label for="fixture_time">Time</label>
                      <input type="time" name="fixture_time" id="" class="form-control">
                    </div>
                    <div class="form-group">
                      <label for="category">Category</label>
                      <select name="category_title" id="" class="form-control">
                        <option value="">Select</option>
                      <?php
                        $select_query = "SELECT * FROM categories";
                        $select_categories = mysqli_query($connection, $select_query);
                        while($row = mysqli_fetch_assoc($select_categories)) {
                        $category_title     = $row['category_title'];
                        echo "<option value='$category_title'>$category_title</option>";
                        }?>
                    </select>
                  </div>
                <?php include "country_list.php" ?>
          <input type="submit" value="Add" name="add_fixture" class="btn btn-primary">
        </form>
    </div>
</div>

<?php include_once "admin_footer.php" ?>

<!-- <style>
    @import url('https://fonts.googleapis.com/css?family=Montserrat:400,700&display=swap');

*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Montserrat', sans-serif;
}
body{
  background:	white;
  padding: 0 10px;
}
.wrapper{
  max-width: 500px;
  width: 100%;
  background: #fff;
  margin: 50px auto;
  box-shadow: 2px 2px 4px rgba(0,0,0,0.125);
  padding: 30px;
}

.wrapper .title{
  font-size: 24px;
  font-weight: 700;
  margin-bottom: 25px;
  color: 		#a39193;
  text-transform: uppercase;
  text-align: center;
}

.wrapper .form{
  width: 100%;
}

.wrapper .form .inputfield{
  margin-bottom: 15px;
  display: flex;
  align-items: center;
}

.wrapper .form .inputfield label{
   width: 200px;
   color: 	#7393B3;
   margin-right: 10px;
  font-size: 14px;
}

.wrapper .form .inputfield .input,
.wrapper .form .inputfield .textarea{
  width: 100%;
  outline: none;
  border: 1px solid 	#7393B3;
  font-size: 15px;
  padding: 8px 10px;
  border-radius: 3px;
  transition: all 0.3s ease;
}

.wrapper .form .inputfield .textarea{
  width: 100%;
  height: 125px;
  resize: none;
}

.wrapper .form .inputfield .custom_select{
  position: relative;
  width: 100%;
  height: 37px;
}

.wrapper .form .inputfield .custom_select:before{
  content: "";
  position: absolute;
  top: 12px;
  right: 10px;
  border: 8px solid;
  border-color: 	#7393B3 transparent transparent transparent;
  pointer-events: none;
}

.wrapper .form .inputfield .custom_select select{
  -webkit-appearance: none;
  -moz-appearance:   none;
  appearance:        none;
  outline: none;
  width: 100%;
  height: 100%;
  border: 0px;
  padding: 8px 10px;
  font-size: 15px;
  border: 1px solid 	#7393B3;
  border-radius: 3px;
}


.wrapper .form .inputfield .input:focus,
.wrapper .form .inputfield .textarea:focus,
.wrapper .form .inputfield .custom_select select:focus{
  border: 1px solid 	#7393B3;
}

.wrapper .form .inputfield p{
   font-size: 14px;
   color: 	#7393B3;
}
.wrapper .form .inputfield .check{
  width: 15px;
  height: 15px;
  position: relative;
  display: block;
  cursor: pointer;
}
.wrapper .form .inputfield .check input[type="checkbox"]{
  position: absolute;
  top: 0;
  left: 0;
  opacity: 0;
}
.wrapper .form .inputfield .check .checkmark{
  width: 15px;
  height: 15px;
  border: 1px solid 	#7393B3;
  display: block;
  position: relative;
}
.wrapper .form .inputfield .check .checkmark:before{
  content: "";
  position: absolute;
  top: 1px;
  left: 2px;
  width: 5px;
  height: 2px;
  border: 2px solid;
  border-color: transparent transparent 	#7393B3;
  transform: rotate(-45deg);
  display: none;
}
.wrapper .form .inputfield .check input[type="checkbox"]:checked ~ .checkmark{
  background: 	#7393B3;
}

.wrapper .form .inputfield .check input[type="checkbox"]:checked ~ .checkmark:before{
  display: block;
}

.wrapper .form .inputfield .btn{
  width: 100%;
   padding: 8px 10px;
  font-size: 15px;
  border: 0px;
  background:  		#a39193;
  color: #fff;
  cursor: pointer;
  border-radius: 3px;
  outline: none;
}

.wrapper .form .inputfield .btn:hover{
  background: 	#5F9EA0;
}

.wrapper .form .inputfield:last-child{
  margin-bottom: 0;
}

@media (max-width:420px) {
  .wrapper .form .inputfield{
    flex-direction: column;
    align-items: flex-start;
  }
  .wrapper .form .inputfield label{
    margin-bottom: 5px;
  }
  .wrapper .form .inputfield.terms{
    flex-direction: row;
  }
}
</style> -->
