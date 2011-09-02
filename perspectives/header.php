<?php require_once "db.php" ?>
<title>Perspectives</title>
<style>
body
{
    font-family: "courier new";arial;
    background: url('img/background.png');
}

.clear
{
clear:both;
}

#menu_item_container .menu_item
{
    background:#404a47;
    color:#ffc10e;
    width:140px;
    float:right;
    border-radius:10px;
    font-family: arial;
    font-size:12px;
    padding:5px;
    margin:10px 0 0 0;
}

.menu_item a
{
    color:#ffc10e;
    text-decoration: none;
}

#main
{
    padding:25px 0 0 25px;
}

#gtp
{
    background:red;
}

div a
{
    text-decoration: none;
    color:grey;
}

#figure
{
    position:relative;
    left:400px;
    top:-80px;
}

#klcity
{
    position:fixed;
    bottom:0;
    left:25px;
    
}

</style>

<div style="height:64"></div>
    
<table width="1000" cellpadding="0" cellspacing="0" align="center">
<td width="200" valign="top">
    <img src="img/logo.png">
    <div id="menu_item_container">
    <div class="menu_item">+ <a href="index.php">home</a></div>
    <div class="menu_item">+ <a href="criteria.php">criteria</div>
    <div class="menu_item">+ <a href="howtocontribute.php">how to contribute</div>
    <div class="menu_item">+ <a href="essays.php">essays</div>
    <div class="menu_item">+ <a href="wuffl.php">what u fighting 4 lah</div>
    </div>
    <div class="clear" align="right">
        <br/>
        <img src="img/gtplogo.png" width="150">
    </div>
</td>

<td width="800" valign="top">
<div id="main">
<div style="position:absolute;z-index: -10;">
    <div id="figure"><img src="img/figure.png"></div>
</div>


