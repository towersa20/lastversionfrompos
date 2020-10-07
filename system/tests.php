<script src="jquery-3.3.1.min.js"></script>
<script src="TimeCircles/TimeCircles.js"></script>
<link rel="stylesheet" type="text/css" href="TimeCircles/TimeCircles.css">

<?php
    $connection = mysqli_connect("localhost", "root", "", "rpx");
    $sql = "SELECT * FROM newmazad WHERE new_id=1";
    $result = mysqli_query($connection, $sql);
    $row = mysqli_fetch_object($result);
?>

<div data-date="<?php echo $row->dend; ?>" id="count-down"></div>

<script>
    $(function () {
        $("#count-down").TimeCircles();
    });
</script>