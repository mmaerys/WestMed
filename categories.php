<?php
$query = "SELECT * FROM category";
$result = mysqli_query($con, $query);

if ($result) {
    echo "<div class='shop'>";

    while ($row = mysqli_fetch_assoc($result)) {
        $categoryName = mysqli_real_escape_string($con, $row['ItemCategory']);
        $categoryImg = mysqli_real_escape_string($con, $row['img']);

        $countQuery = "SELECT COUNT(*) FROM items WHERE category = '$categoryName'";
        $countResult = mysqli_query($con, $countQuery);

        if ($countResult) {
            $totalRecords = mysqli_fetch_row($countResult)[0];
                echo "  <a href='category.php?category=$categoryName'><div class='itemcard'>
               <img src='$categoryImg' width='200'>
                <p>$totalRecords Items/s available</p>
                <p><strong>$categoryName</strong></p>
            </div></a>";
        } else {
            echo "Error fetching book count for $categoryName: " . mysqli_error($con);
        }
    }

    echo "</div></div>";
} else {
    echo "Error fetching genres from the database: " . mysqli_error($con);
}
?>