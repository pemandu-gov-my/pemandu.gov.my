<style>
body
{
    margin:0;
    font-family: arial;
    color: #666666;
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
}

.tabs
{
    float:right;
    background:#efefef;
    padding:10px;
    width:100px;
    border-top-left-radius: 10px;
    border-top-right-radius: 10px;
    text-align: center;
    bottom:0;
    right:0;
    position:absolute;

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
    float:right;
    background:#efefef;
    padding:10px;
    width:100px;
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

<div id="header" style="position:relative">
    <img src="img/header_perspective.png">
    <div class="tabs<?php if($tab_on == "videos") echo "_on" ?>" style="right:20"><a href="videos.php">Videos</a></div>
    <div class="tabs<?php if($tab_on == "twitter") echo "_on" ?>" style="right:160"><a href="twitter.php">Twitter</a></div>
    <div class="tabs<?php if($tab_on == "essays") echo "_on" ?>" style="right:300"><a href="index.php">Essays</a></div>
</div>