<style>
body
{
    margin:0;
    font-family: arial;
    color: #666666;
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
</style>

<div id="header" style="position:relative">
    <img src="img/header_perspective.png">
    <div class="tabs" style="right:20">Videos</div>
    <div class="tabs" style="right:160">Twitter</div>
    <div class="tabs_on" style="right:300">Essays</div>
</div>