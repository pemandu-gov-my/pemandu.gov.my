<?php require_once "header.php"; ?>
<img src="temp/1.png">
<br/><br/>
<?php
?>
    <div style="font-size:40px;color:#FFC10E;font-weight: bold">Latest Essays</div>
    <table width="100%" cellpadding="0" cellspacing="0">

    <?php
    $query = "select * from `essays` order by created_at desc";
    $result = mysql_query($query);
    while($row = mysql_fetch_assoc($result))
    {
        ?>
        <a href="essays.php?id=<?php echo $row['id'] ?>">
        <div style="width:90px;float:left;margin:0 10px 10px 0">
            <div align="center" style="background:black;width:90px;height:68px;border:1px solid black;">
                <img src="<?php echo "img/writers/".$row['name'].".jpg" ?>" height="68"></div><span style="font-family:'century gothic',arial;font-size:10px"><?php echo $row['title'] ?> by <?php echo $row['name'] ?>
            </div>
        </div>
        </a>
        <?php
    }

    ?></table><?php
?>
<?php require_once "footer.php"; ?>