<?php
if(isset($_GET['category'])){
    $category_name = $_GET['category'];
}
if(isset($_GET['nationality'])){
    $country_name = $_GET['nationality'];
}
?>
<?php include "header.php" ?>


<div class="row jumbotron justify-content-center" style="margin-top:80px; color:#ea540a; padding:40px 0">
    <h2>Fixtures</h2>
</div>
<?php include "category_filter.php" ?>
<?php

echo"<div class='row'>
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
                        </tr>
                    </thead>
                    <tbody>";
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
                            </tr>";
                    }

                    echo "</tbody>
                    </table>

                </div>
            </div>
        </div>";
     ?>
<style>
.card:hover {
    box-shadow: .75em .75em 1em rgb(186, 185, 185);
}
</style>
<?php include "footer.php" ?>
