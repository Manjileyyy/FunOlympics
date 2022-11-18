<title> Fun Olympic Game</title>
<?php include_once "admin_header.php" ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
<div class="col-md-3">
    <?php include_once "sidebar.php"?>
</div>
<title>Admin: View All Users</title>

<div class="col-md-8" id="main-container">
    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table table-bordered table-sm">
                    <h4>Users</h4>
                    <hr>
                    <thead>
                        <tr>
                            <th>Fullname</th>
                            <th>Email</th>
                            <th>Username</th>
                            <th>Status</th>
                            <th colspan="2">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    changeStatusToInactive();
                    changeStatusToAactive();
                    $query = "SELECT * FROM users WHERE is_admin=0";
                    $select_users = mysqli_query($connection, $query);
                    while($row = mysqli_fetch_assoc($select_users)) {
                        $uid                = $row['id'];
                        $fullname     = $row['fullname'];
                        $email     = $row['email'];
                        $username     = $row['username'];
                        $profile_image     = $row['profile_image'];
                        $status     = $row['status'];
                        echo "<tr>";
                    echo "<td>$fullname</td>";
                    echo "<td>$email</td>";
                    echo "<td>$username</td>";
                    echo "<td>$status</td>";
                    if($status==0){
                        echo "<td><a href='view_users.php?inactive=$uid' class='btn btn-warning btn-sm'>Inactive</a></td>";
                    }
                    else{
                        echo "<td><a href='view_users.php?active=$uid' class='btn btn-success btn-sm'>Active</a></td>";
                    }

                    echo "<td><a href='comments.php?delete=$uid' class='btn btn-danger btn-sm'>Reset Password</a></td>";
                    echo "</tr>";
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>



    <h4>Fixtures</h4>
    <p class="text-right" style="padding-top: 0px"><a href="view_fixtures.php" data-toggle="modal" data-target="#loginModal">view
                all <i class="fa-solid fa-arrow-right"></i></a></p>
    <?php
        if(recordCount('fixtures')==0){
            echo"<h5 class='text-danger'>No fixtures</h5>";
        }
        else{
        echo "<div class='row'>
                <div class='col'>
                    <div class='table-responsive'>
                        <table class='table table-bordered table-sm'>
                            <hr>
                            <thead>
                                <tr>
                                    <th>Fixture</th>
                                    <th>Date</th>
                                    <th>Time</th>
                                    <th>Category</th>
                                    <th>Countries</th>
                                    <th colspan='3'>Actions</th>
                                </tr>
                            </thead>
                            <tbody>";
                            deleteFixtures();
                            $query = "SELECT * FROM fixtures";
                            $select_fixtures = mysqli_query($connection, $query);
                            while($row = mysqli_fetch_assoc($select_fixtures)) {
                                $fid                = $row['fid'];
                                $fixture_title     = $row['fixture_title'];
                                $fixture_date     = $row['fixture_date'];
                                $fixture_time     = $row['fixture_time'];
                                $fixture_category     = $row['fixture_category'];
                                $fixture_countries     = $row['fixture_countries'];
                                echo "<tr>
                                        <td>$fixture_title</td>
                                        <td>$fixture_date </td>
                                        <td>$fixture_time</td>
                                        <td>$fixture_category </td>
                                        <td>$fixture_countries</td>
                                        <td><a href='edit_fixtures.php?edit=$fid&title=$fixture_title' style='color:blue' data-toggle='tooltip' data-placement='bottom' title='edit'><i class='fa-solid fa-pen-to-square'></i></a></td>
                                        <td><a href='view_fixtures.php?delete=$fid'  style='color:Red' onClick=\"javascript: return confirm('Are you sure you want to delete?'); \" data-toggle='tooltip' data-placement='bottom' title='delete'><i class='fa-solid fa-trash'></i></a></td>
                                    </tr>";
                            }

                            echo "</tbody>
                        </table>

                    </div>
                </div>
            </div>";
        } ?>
</div>


<?php include "admin_footer.php" ?>
