<?php include_once "header.php"; ?>
<style>
    /* CSS styles */
</style>
<?php
include_once("config.php");
if (isset($_SESSION["username"])) {
    $us = $_SESSION["username"];
    $sqlString = "SELECT * from tbl_account where email= '$us'";
    $result = mysqli_query($conn, $sqlString);
    $row2 = mysqli_fetch_array($result);
}
if (isset($_GET["function"]) == "del") {
    if (isset($_GET["id"])) {
        $id = $_GET["id"];
        $sql = "SELECT * FROM tbl_feedback";
        mysqli_query($conn, "DELETE FROM tbl_feedback WHERE feedback_Id='$id'");
        echo '<meta http-equiv="refresh" content="0; ' . $_SERVER['HTTP_REFERER'] . '">';
    }
}
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sqlString = "SELECT tbl_post.title, tbl_feedback.*
                FROM tbl_post
                JOIN tbl_feedback ON tbl_feedback.post_Id = tbl_post.post_Id
                WHERE tbl_post.post_Id = '$id'
                ORDER BY tbl_feedback.likes DESC";
    $result = mysqli_query($conn, $sqlString);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result)) {
?>
            <div class="container">
                <?php if ($row2["role"] == 1) { ?>
                    <a class="a" href="?&&function=del&&id=<?php echo $row["feedback_Id"]; ?>"><span style="color: red;" class="fas fa-trash"></span></a>
                <?php } ?>
                <h1><strong>Post title: <?php echo $row['title']; ?></strong></h1>
                <form method="POST" enctype="multipart/form-data">
                    <div class="half left cf">
                        <input type="text" name="" id="input-name" readonly value="<?php echo $row['anonymous']; ?>" />
                    </div>
                    <textarea name="feedback" type="text" id="input-message" placeholder="Message" readonly><?php echo $row['feedback']; ?></textarea>
                    <?php if ($row2["role"] == 1) { ?>
                        <button class="button-download">
                            <a href="<?php echo $row['file_path']; ?>" download="<?php echo $row['file_name']; ?>" style="color: #fff;">Download file</a>
                        </button>
                    <?php } ?>
                </form>
                <br>
                <div class="actions">
                    <button id="view-more" class="button" onclick="window.location='comment.php?id=<?php echo $row['feedback_Id']; ?>'">Comment</button>
                    <button class="button"><i class='fas fa-solid fa-thumbs-up'></i>: <?php echo $row['likes']; ?></button>
                </div>
            </div>
<?php
        }
    } else {
?>
        <div class="container">
            <h1 style="text-align:center; color: red">No response</h1>
        </div>
<?php
    }
}
include_once "footer.php";
?>
<script>
    // JavaScript code
</script>
