<style>
body
{
    margin:0;
    font-family: 'century gothic';
    
    background: #dadbdb;
}

table td tr
{
    font-size:12px;
}
h2
{
    margin:0;
    padding:0;
}

a
{
    text-decoration: none;
    color: black;
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
    background:#343153;
    height:50px;
    width:984;
}

.tabs
{


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

 float:right;
    height:50px;
    padding:5px;
    width:80px;
    border-top-left-radius: 10px;
    border-top-right-radius: 10px;
    text-align: center;
    bottom:0;
    right:0;
    position:absolute;
    font-size:13px;
    font-weight:bold;
    color:black;
}

.tabs_on
{
    height:50px;
    font-size:13px;
    font-weight:bold;
    float:right;
    background:#efefef;
    padding:5px;
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

.gradient_grey
{
background: rgb(254,252,234); /* Old browsers */
background: -moz-linear-gradient(top, rgba(254,252,234,1) 0%, rgba(241,218,54,1) 100%); /* FF3.6+ */
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(254,252,234,1)), color-stop(100%,rgba(241,218,54,1))); /* Chrome,Safari4+ */
background: -webkit-linear-gradient(top, rgba(254,252,234,1) 0%,rgba(241,218,54,1) 100%); /* Chrome10+,Safari5.1+ */
background: -o-linear-gradient(top, rgba(254,252,234,1) 0%,rgba(241,218,54,1) 100%); /* Opera11.10+ */
background: -ms-linear-gradient(top, rgba(254,252,234,1) 0%,rgba(241,218,54,1) 100%); /* IE10+ */
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#fefcea', endColorstr='#f1da36',GradientType=0 ); /* IE6-9 */
background: linear-gradient(top, rgba(254,252,234,1) 0%,rgba(241,218,54,1) 100%); /* W3C */
}

.yellow
{
    background: url('img/yellowpaper.png')
}

.gradient_blue
{
background: rgb(207,231,250); /* Old browsers */
background: -moz-linear-gradient(top, rgba(207,231,250,1) 0%, rgba(128,182,247,1) 100%); /* FF3.6+ */
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(207,231,250,1)), color-stop(100%,rgba(128,182,247,1))); /* Chrome,Safari4+ */
background: -webkit-linear-gradient(top, rgba(207,231,250,1) 0%,rgba(128,182,247,1) 100%); /* Chrome10+,Safari5.1+ */
background: -o-linear-gradient(top, rgba(207,231,250,1) 0%,rgba(128,182,247,1) 100%); /* Opera11.10+ */
background: -ms-linear-gradient(top, rgba(207,231,250,1) 0%,rgba(128,182,247,1) 100%); /* IE10+ */
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#cfe7fa', endColorstr='#80b6f7',GradientType=0 ); /* IE6-9 */
background: linear-gradient(top, rgba(207,231,250,1) 0%,rgba(128,182,247,1) 100%); /* W3C */
}

.tabs_on a
{
    color:white;
}
</style>


<table width="1000" cellpadding="0" cellspacing="0" align="center">
    <tr>
        <td height="58" width="1000" background="img/header-perspectives4.png">
        <div style="position:relative;height:116;width:1000;">
            <div class="tabs<?php if($tab_on == "wuffl") echo "_on" ?>" style="right:230"><a href="wuffl.php">Wat U<br>Fighting 4 Lah</a></div>
            <div class="tabs<?php if($tab_on == "videos") echo "_on" ?>" style="right:340"><a href="videos.php">Videos</a></div>
            <div class="tabs<?php if($tab_on == "essays") echo "_on" ?>" style="right:450"><a href="essays.php">Essays</a></div>
            <div class="tabs<?php if($tab_on == "home") echo "_on" ?>" style="right:560"><a href="index.php">Home</a></div>
        </div>
        </td>
    </tr>
    <tr>
        <td>
<table width="1000" cellpadding="0" cellspacing="0">
    <td width="8" background="img/left-shadow.png" valign="top">
        &nbsp;<div style="position:relative;left:-14;top:-22"><div style="position:absolute;"><img src="img/wing.png"></div></div>
    </td>
    <td bgcolor="white">