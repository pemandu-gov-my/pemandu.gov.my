<?php require_once "header.php"; ?>
<style>
    #figure
    {
        visibility: hidden;
    }
</style>

<?php
if($_GET)
{
    $id = $_GET['id'];
    $query = "select * from `essays` where id = $id";
    $result = mysql_query($query);
    $row = mysql_fetch_assoc($result);
    ?><img src="<?php echo "img/writers/".$row['name'].".jpg" ?>" align="left" style="margin: 5px 20px 10px 0">
    <span style="font-size:30px;color:#f4b33c;font-weight: bold"><?php echo $row['name'] ?></span>
    <br/>
    <span style="font-size:15px;"><?php echo $row['bio'] ?></span>
    <br/><br/>
    <span style="font-size:40px;color:#f4b33c;font-weight: bold"><?php echo $row['title'] ?></span>
    <br/><br/>
    <span style="font-size:15px;"><?php echo $row['essays'] ?></span>
    <p></p>
    <?php
}
else
{
    ?>
    <div style="font-size:40px;color:#f4b33c;font-weight: bold">Latest Essays</div>
    <table width="100%" cellpadding="0" cellspacing="0">

    <?php
    $query = "select * from `essays` order by created_at desc";
    $result = mysql_query($query);
    while($row = mysql_fetch_assoc($result))
    {
        $k++;
        ?>
        <a href="?id=<?php echo $row['id'] ?>">
        <div style="width:90px;float:left;margin:0 10px 10px 0;">
            <div align="center" style="background:black;width:90px;height:66px">
                <img src="<?php echo "img/writers/".$row['name'].".jpg" ?>" height="66"></div><span style="font-family:'century gothic',arial;font-size:10px"><?php echo $row['title'] ?> by <?php echo $row['name'] ?>
            </div>
        </div>
        </a>
        <?php
        if($k==5) echo '<div style="clear:both"></div>';
    }

    ?></table><?php
}
?>

<?php require_once "footer.php"; ?>