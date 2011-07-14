<style>
body
{
    margin:0;
    font-family: arial;
    color: #666666;
    background: #dadbdb;
}

h2
{
    margin:0;
    padding:0;
}

a
{
    text-decoration: none;
    color: #666666;
}

.bubble
{
    background:#efefef;
    border-radius: 20px;
    padding:20px;
    margin:0 0 20 0;
}


#header
{
    position:relative;
    width:80%;

    background-image: -webkit-gradient(
    linear,
    left bottom,
    left top,
    color-stop(0.13, rgb(76,78,114)),
    color-stop(0.57, rgb(144,151,194))
    );
    background-image: -moz-linear-gradient(
    center bottom,
    rgb(76,78,114) 13%,
    rgb(144,151,194) 57%
    );
}

#footer
{
    background-image: -webkit-gradient(
    linear,
    left bottom,
    left top,
    color-stop(0.13, rgb(76,78,114)),
    color-stop(0.57, rgb(144,151,194))
    );
    background-image: -moz-linear-gradient(
    center bottom,
    rgb(76,78,114) 13%,
    rgb(144,151,194) 57%
    );
    height:50px;
    width:988;
}

.tabs
{
    float:right;
    background:#efefef;
    padding:10px;
    width:80px;
    border-top-left-radius: 10px;
    border-top-right-radius: 10px;
    text-align: center;
    bottom:0;
    right:0;
    position:absolute;
    font-size:12px;

    background-image: -webkit-gradient(
    linear,
    left bottom,
    left top,
    color-stop(0.13, rgb(160,160,163)),
    color-stop(0.57, rgb(235,232,235))
    );
    background-image: -moz-linear-gradient(
    center bottom,
    rgb(160,160,163) 13%,
    rgb(235,232,235) 57%
    );
    
}

.tabs_on
{
    font-size:12px;
    float:right;
    background:#efefef;
    padding:10px;
    width:80px;
    border-top-left-radius: 10px;
    border-top-right-radius: 10px;
    text-align: center;
    color:white;
    bottom:0;
    right:0;
    position:absolute;

    background-image: -webkit-gradient(
    linear,
    left bottom,
    left top,
    color-stop(0.18, rgb(15,15,15)),
    color-stop(0.59, rgb(168,168,168))
    );
    background-image: -moz-linear-gradient(
    center bottom,
    rgb(15,15,15) 18%,
    rgb(168,168,168) 59%
    );
}

.tabs_on a
{
    color:white;
}
</style>

<div style="height:25"></div>
<table width="1000" cellpadding="0" cellspacing="0" align="center">
    <tr>
        <td height="58" width="1000" background="img/header-perspectives2.png">
        <div style="position:relative;height:58;width:1000;">
            <div class="tabs<?php if($tab_on == "wuffl") echo "_on" ?>" style="right:230"><a href="wuffl.php">W.U.F.F.L.</a></div>
            <div class="tabs<?php if($tab_on == "videos") echo "_on" ?>" style="right:340"><a href="videos.php">Videos</a></div>
            <div class="tabs<?php if($tab_on == "essays") echo "_on" ?>" style="right:450"><a href="essays.php">Essays</a></div>
            <div class="tabs<?php if($tab_on == "home") echo "_on" ?>" style="right:560"><a href="index.php">Home</a></div>
        </div>
        </td>
    </tr>
    <tr>
        <td>

<table width="1000" cellpadding="0" cellspacing="0">
    <td width="8" background="img/left-shadow.png">&nbsp;</td>
    <td bgcolor="white">
