<!doctype html>
<html>
<head>
<!----------------------------------------------------------------------------->
<!--
Versatile Interactive Map (custom-made HTML5 version)

Author: Shaun A. Noordin
Date:   20110720 (start)
        20110826 (update)
Info:   This is an experiment in creating a versatile interactive map system,
        one which can be viewed on computers as well as mobile devices.
  -->
<!----------------------------------------------------------------------------->

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<!--<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<meta name="apple-mobile-web-app-capable" content="yes">-->

<script src="common/jquery-1.6.2.min.js"></script>
<!--[if lt IE 9]><script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
<!--[if IE]><script type="text/javascript" src="common/excanvas.js"></script><![endif]-->

<!----------------------------------------------------------------------------->
<!--Maps                                                                     -->
<!----------------------------------------------------------------------------->
<script>
var starmap_useCanvas = true;  //Sets whether or not to use the advanced <canvas> feature.
var starmap_items = Array();   //The items in the map.
var starmap_mapWidth   = 100;  //Width of the map (the HTML element). Set in init().
var starmap_mapHeight  = 100;  //Height of the map (the HTML element). Set in init().
var starmap_baseID     = "";   //Mostly irrelevant except for identifying the data file.
var starmap_baseDisplayname = "";
var starmap_baseImage  = "";   //The base/background image of the map.
var starmap_baseX      = 0;    //The x-translation of the base/background image of the map.
var starmap_baseY      = 0;    //The y-translation of the base/background image of the map.
var starmap_baseWidth  = 0;    //TODO: Description
var starmap_baseHeight = 0;
var starmap_baseScale = 1;
var starmap_scrollSpeed = 50;  //The speed at which we can scroll through the map using the built in map controls.
var starmap_scrollDirection = "";  //The direction in which to scroll; this value is evaluated in the main cycle.
var starmap_cycleMain;         //The main cycle of the app.
var starmap_debugMode = false;  //Enables/disables debug mode. For fun!

</script><%
dim starmap_state : starmap_state = Request("state")
starmap_state = CStr(starmap_state)
starmap_state = Replace(starmap_state, """", "\""")
'starmap_state = Replace(starmap_state, """", "\""")
starmap_state = Replace(starmap_state, "'", "\'")
starmap_state = Replace(starmap_state, vbCRLF, "\n")
%><script>
var starmap_state = "<%=starmap_state%>";

/*  This represents an item in the map.
 */
function starmap_Item(id, x, y, img, displayName)
{
  this.id = starmap_getString(id);
  this.x = starmap_getNumber(x);
  this.y = starmap_getNumber(y);
  this.img = starmap_getString(img);
  this.shapes = Array();
  this.displayName = starmap_getString(displayName);
}

/*  An item in the map can be made of multiple shapes.
 */
function starmap_Shape(type, coords)
{
  this.type = type;
  this.coords = coords;
}

/*  This is the main cycle of the app.
 */
function starmap_runMain()
{
  if      (starmap_scrollDirection == "north") { starmap_scrollMap(0, starmap_scrollSpeed); }
  else if (starmap_scrollDirection == "east")  { starmap_scrollMap(-starmap_scrollSpeed, 0); }
  else if (starmap_scrollDirection == "south") { starmap_scrollMap(0, -starmap_scrollSpeed); }
  else if (starmap_scrollDirection == "west")  { starmap_scrollMap(starmap_scrollSpeed, 0); }
}

/*  Initialise the map!
 */
function starmap_init(mapID, mapWidth, mapHeight)
{
  //Set up the map.
  //----------------------------------------------------------------
  //starmap_items = Array();
  $("#starmap-map").css("width", mapWidth + "px");
  $("#starmap-map").css("height", mapHeight + "px");
  $("#starmap-images").css("left", "0px");  //Important to set a baseline for scrollMap() later.
  $("#starmap-images").css("top", "0px");   //Ditto.
  $("#starmap-canvas").attr("width", mapWidth);    //This has been moved to the buildMapFromXML() function.
  $("#starmap-canvas").attr("height", mapHeight);  //Ditto.
  
  starmap_mapWidth = mapWidth;    //Width of the map (the HTML element).
  starmap_mapHeight = mapHeight;   //Height of the map (the HTML element).
  //TODO: Make this look nicer?
  //--------
  if (starmap_state == "")
  { $.ajax({ type: "GET", url: "data/malaysia.xml", dataType: "xml", success: starmap_buildMapFromXML }); }
  else
  { $.ajax({ type: "GET", url: "data/" + starmap_state + ".xml", dataType: "xml", success: starmap_buildMapFromXML }); }
  //--------
  //----------------------------------------------------------------
  
  //Enable the UI controls.
  //----------------------------------------------------------------
  $("#starmap-controls-back").click(function() { window.location = "?"; });
  $("#starmap-controls-summary").click(starmap_loadStateSummaryData);
  
  if (starmap_state == "") { $("#starmap-controls-back").css("display", "none"); $("#starmap-controls-summary").css("display", "none"); }
  //if (starmap_state == "") { $("#starmap-controls-back").css("display", "none"); $("#starmap-details").css("display", "none"); }
  //$("#starmap-popup-closeButton").click(starmap_onMapPopupCloseButtonClick);
  
  //$("#starmap-controls-up").disableSelection();
  //$("#starmap-controls-right").disableSelection();
  //$("#starmap-controls-down").disableSelection();
  //$("#starmap-controls-left").disableSelection();
  //$("#starmap-controls-centre").disableSelection();
  
  /*$("#starmap-controls-up").mousedown(function()    { starmap_scrollDirection = "north"; } );
  $("#starmap-controls-right").mousedown(function() { starmap_scrollDirection = "east"; } );
  $("#starmap-controls-down").mousedown(function()  { starmap_scrollDirection = "south"; } );
  $("#starmap-controls-left").mousedown(function()  { starmap_scrollDirection = "west"; } );
  
  $("#starmap-controls-up").mouseup(function()    { starmap_scrollDirection = ""; } );
  $("#starmap-controls-right").mouseup(function() { starmap_scrollDirection = ""; } );
  $("#starmap-controls-down").mouseup(function()  { starmap_scrollDirection = ""; } );
  $("#starmap-controls-left").mouseup(function()  { starmap_scrollDirection = ""; } );*/
  
  starmap_disableSelection(".starmap-button");
  
  $("#starmap-controls-up").click(function(e)    { starmap_scrollMap(0, starmap_scrollSpeed * 3); } );
  $("#starmap-controls-right").click(function(e) { starmap_scrollMap(-starmap_scrollSpeed * 3, 0); } );
  $("#starmap-controls-down").click(function(e)  { starmap_scrollMap(0, -starmap_scrollSpeed * 3); } );
  $("#starmap-controls-left").click(function(e)  { starmap_scrollMap(starmap_scrollSpeed * 3, 0); } );
  
  /*$("#starmap-controls-up").mouseout(function()    { starmap_scrollDirection = ""; } );
  $("#starmap-controls-right").mouseout(function() { starmap_scrollDirection = ""; } );
  $("#starmap-controls-down").mouseout(function()  { starmap_scrollDirection = ""; } );
  $("#starmap-controls-left").mouseout(function()  { starmap_scrollDirection = ""; } );*/
  
  $("#starmap-controls-centre").click(starmap_scrollMapToOrigin);
  //----------------------------------------------------------------
  
  
  //Go go main cycle.
  //----------------------------------------------------------------
  starmap_cycleMain = setInterval(starmap_runMain, 50);
  //----------------------------------------------------------------
  
  
  //DEBUGMODE
  //A simple combination of determining where the user clicked on a div and
  //outputting the coordinates helps us create polygons for the <item>s'
  //<shape>s.
  //----------------------------------------------------------------
  if (starmap_debugMode)
  {
    //The following bit tracks the coordinates of clicks on the map; this way,
    //we can manually trace the shape coordinates of a region by hand.
    //--------------------------------
    $("#starmap-panel").click(
      function(clickEvent)
      {
        //var offsetX = 0; var offsetY = 0; var curElement = this;
        //while (curElement != null)  //Find the X/Y offset of this element relative to the entire page.
        //{
        //  if (curElement.offsetLeft != undefined && curElement.offsetTop != undefined)  //It's only undefined once the curElement is the document itself. (The parent of <html>).
        //  { offsetX += curElement.offsetLeft; offsetY += curElement.offsetTop; }
        //  curElement = curElement.parentNode;
        //}
        var offsetX = Math.round($("#starmap-map").offset().left);
        var offsetY = Math.round($("#starmap-map").offset().top);
        var posX = clickEvent.pageX - offsetX;  //This is why we need the relative offsets of the element;
        var posY = clickEvent.pageY - offsetY;  //we want the position of the click relative to the origin of the element.
        $("#starmap-debug").append("<span>" + posX + "," + posY + ", </span>");
        
        //$("#starmap-debug").append("<span>" + offsetX + "," + offsetY + ", </span>");
      }
    );
    //--------------------------------
    
    $("#starmap-debug").css("display", "block");
  }
  //----------------------------------------------------------------
}

/*  Once we have the XML describing the map, we can build it as a series of HTML elements.
 */
function starmap_buildMapFromXML(xmlMap)
{
  //Step 1: Clean up everything and get the general map data.
  //----------------------------------------------------------------
  $("#starmap-images").empty();
  $("#starmap-areas").empty();
  //TODO: Clear canvas.
  //if (starmap_useCanvas) {}  //Use canvas.clearRect(0,0,widthOfCanvas,heightOfCanvas)
  
  starmap_baseID     = starmap_getString($(xmlMap).find("starmap").attr("id"));
  starmap_baseDisplayname = starmap_getString($(xmlMap).find("starmap").attr("displayName"));
  starmap_baseImage  = starmap_getString($(xmlMap).find("starmap").attr("img"));
  starmap_baseX      = starmap_getNumber($(xmlMap).find("starmap").attr("x"));
  starmap_baseY      = starmap_getNumber($(xmlMap).find("starmap").attr("y"));
  if (starmap_getNumber($(xmlMap).find("starmap").attr("scale")) > 0)
  { starmap_baseScale = starmap_getNumber($(xmlMap).find("starmap").attr("scale")); }
  
  
  $("#starmap-title").append(starmap_baseDisplayname);
  
  if (starmap_baseImage != "")
  {
    var imgMap = new Image();
    imgMap.src = starmap_baseImage;
    imgMap.onload = function()
    {
      var scaledWidth  = starmap_getNumber(imgMap.width  * starmap_baseScale);
      var scaledHeight = starmap_getNumber(imgMap.height * starmap_baseScale);
      $("#starmap-images").append("<img id=\"starmap-baseImage\" style=\"left: " + starmap_baseX + "px; top: " + starmap_baseY + "px; width: " + scaledWidth + "px; height: " + scaledHeight + "px;\" src=\"" + starmap_baseImage + "\" />");
    }
    
    //WARNING: Can be affected by loading times.
    //$("#starmap-baseImage").css("width",  starmap_getNumber($("#starmap-baseImage").width() * starmap_baseScaleX) + "px");
    //$("#starmap-baseImage").css("height",  starmap_getNumber($("#starmap-baseImage").height() * starmap_baseScaleY) + "px");
  }
  //----------------------------------------------------------------

  //Step 2: Read the map data file.  
  //Each <item> in <starmap> is an interactive object on the map.
  //----------------------------------------------------------------
  $(xmlMap).find("item").each(
    function ()
    {
      var inID = $(this).attr("id");
      var inX = $(this).attr("x");
      var inY = $(this).attr("y");
      var inImg = $(this).attr("img");
      var inDisplayName = $(this).attr("displayName");
      var newItem = new starmap_Item(inID, inX, inY, inImg, inDisplayName);  //Don't worry about the data types; this is handled in the object constructor.

      //More things to try: $(this).find("attribute").text();
			
			//Each <item> can consist of multiple <shape>s. Let's add those to the item.
			$(this).find("shape").each(
			  function()
			  {
			    var newShape = new starmap_Shape($(this).attr("type"), $(this).attr("coords"));
			    newItem.shapes.push(newShape);
			  }
			);
			
			starmap_items.push(newItem);
    }
  );
  //----------------------------------------------------------------
  
  
  //Step 3: Build the map
  //We now have a bunch of items (and shapes). Now let's make it something
  //visual and something that can be interacted with in the HTML.
  //----------------------------------------------------------------
  
  //What're these variables for? Well, we want to know what's the maximum x/y coords that's effectively used in the map.
  var largestX = 0;  
  var largestY = 0;
  
  for (var i = 0; i < starmap_items.length; i ++)
  {
    //Get the base <item> data.
    //--------------------------------
    var itemID =  starmap_items[i].id;
    var itemX =   starmap_items[i].x + starmap_baseX;
    var itemY =   starmap_items[i].y + starmap_baseY;
    var itemImg = starmap_items[i].img;
    //--------------------------------
    
    //If the <item> has a respective image, add it.
    //--------------------------------
    if (itemImg != "")
    {
      //TODO: Load as an Image()  to determine size.
      //TODO: Apply scaleX, scaleY.
      $("#starmap-images").append("<img id=\"starmap-image-" + itemID + "\" style=\"left: " + itemX + "px; top: " + itemY + "px;\" src=\"" + itemImg + "\" />");
    }
    //--------------------------------
    
    //Go through each <shape> the item possesses and process it. That is,
    //add them as HTML elements.
    //--------------------------------
    for (var j = 0; j < starmap_items[i].shapes.length; j ++)
    {
      //Now we sort each <shape> by its shape type.
      //................................
      if (starmap_items[i].shapes[j].type == "poly")
      {
        var arrCoords = starmap_items[i].shapes[j].coords.split(","); 
        var modifiedCoords = "";
        
        //The coordinates provided aren't enough; we need to offset them by the the item's X and Y.
        for (var k = 0; k < arrCoords.length; k ++)
        {
          var curC = $.trim(arrCoords[k]);
          if (curC == "") { break; }  //This accounts for a trailing "," at the end of coords.
          else
          {
            curC = curC * starmap_baseScale;  //Modify by scale.
            if (modifiedCoords != "") { modifiedCoords = modifiedCoords + ", "; }
            if (k % 2 == 0) { modifiedCoords += String(Number(curC) + Number(itemX)); }  //Remember that poly coords are alternating X, Y, X, Y. etc.
            else            { modifiedCoords += String(Number(curC) + Number(itemY)); }  //Remember that poly coords are alternating X, Y, X, Y. etc.
            
            //Determine the largest x/y coordinates used. Eh, let's put it in a separate if/else for cleanliness' sake.
            if (k % 2 == 0) { largestX = Math.max(largestX, Number(curC) + Number(itemX)); }
            else            { largestY = Math.max(largestY, Number(curC) + Number(itemY)); }
          }
        }
        
        //----------------
        //href="#" removed because it kept repositioning the goddamn viewport.
        //var newAreaElement = "<area id=\"starmap-area-" + itemID + "-" + j+"\" href=\"#\" shape=\"" + starmap_items[i].shapes[j].type + "\" coords=\"" + modifiedCoords + "\" />"
        //var newAreaElement = "<area id=\"starmap-area-" + itemID + "-" + j+"\" shape=\"" + starmap_items[i].shapes[j].type + "\" coords=\"" + modifiedCoords + "\" />"
        var newAreaElement = "<area href=\"javascript:;\" id=\"starmap-area-" + itemID + "-" + j+"\" shape=\"" + starmap_items[i].shapes[j].type + "\" coords=\"" + modifiedCoords + "\" />"
        $("#starmap-areas").append(newAreaElement);
        //----------------
        
        //Add functionality; let the HTML elements react to events.
        //TODO: React to more events.
        //----------------
        $("#starmap-area-" + itemID + "-" + j).click(starmap_onMapItemClick);
        //----------------
      }
      //................................
      else {}  //Uh, we don't cater for non-polys at the time being. So sorry!
    
    }
    //--------------------------------
  }
  //----------------------------------------------------------------
  
  //Step 4: Misc Cleanup
  //--------------------------------
  //Why did we need to know the largest x/y coordinates used in the map? Why, to resize the elements accordingly, of course!
  $("#starmap-panel").css("width", largestX);
  $("#starmap-panel").css("height", largestY);
  $("#starmap-images").css("width", largestX);
  $("#starmap-images").css("height", largestY);
  //$("#starmap-canvas").attr("width", largestX);   //Remember, with <canvas>, the width/height attribute sets its true size, while the width/height CSS property sets its scaled size.
  //$("#starmap-canvas").attr("height", largestY);
  $("#starmap-canvas").attr("width", parseInt(largestX));   //Remember, with <canvas>, the width/height attribute sets its true size, while the width/height CSS property sets its scaled size.
  $("#starmap-canvas").attr("height", parseInt(largestY));
  //--------------------------------
  
  //Step 5: Load Initial Data
  //--------------------------------
  if (starmap_state != "")
  { starmap_loadStateSummaryData(); }
  else
  { starmap_loadNationSummaryData(); }
  
  //--------------------------------
  
  //Step 6: Paint the shapes on the canvas.
  //OPTIONAL BONUS!
  //DEBUGMODE
  //--------------------------------
  for (var i = 0; i < starmap_items.length; i ++)
  {
    if (starmap_useCanvas && starmap_debugMode)
    { starmap_canvasDrawItem(starmap_items[i]); }
  }
  //--------------------------------
}

/*  This moves the map around.
 */
function starmap_scrollMap(x, y)
{
  var startX = starmap_getNumber($("#starmap-images").css("left").replace(/px/ig, ""));
  var startY = starmap_getNumber($("#starmap-images").css("top").replace(/px/ig, ""));
  
  var targetX = startX + x;
  var targetY = startY + y;
  
  //Observe the border limits
  //--------
  //TODO
  //--------
  
  $("#starmap-images").css("left", (targetX) + "px");
  $("#starmap-images").css("top",  (targetY) + "px");
  $("#starmap-canvas").css("left", (targetX) + "px");
  $("#starmap-canvas").css("top",  (targetY) + "px");
  $("#starmap-panel").css("left",  (targetX) + "px");
  $("#starmap-panel").css("top",   (targetY) + "px");
}

function starmap_scrollMapToOrigin()
{
  var targetX = 0; var targetY = 0;

  $("#starmap-images").css("left", (targetX) + "px");
  $("#starmap-images").css("top",  (targetY) + "px");
  $("#starmap-canvas").css("left", (targetX) + "px");
  $("#starmap-canvas").css("top",  (targetY) + "px");
  $("#starmap-panel").css("left",  (targetX) + "px");
  $("#starmap-panel").css("top",   (targetY) + "px");
}

/*  Clears the canvas!
 */
function starmap_canvasClear()
{
  var canvas = document.getElementById("starmap-canvas").getContext("2d");  //Canvas context. $("starmap-canvas").getContext("2d") doesn't work.
  canvas.clearRect(0, 0, starmap_getNumber($("#starmap-canvas").attr("width")), starmap_getNumber($("#starmap-canvas").attr("height")));
}

/*  This draws a single map item - with all its shapes - on the canvas.
 */
function starmap_canvasDrawItem(mapItem)
{
  var canvas = document.getElementById("starmap-canvas").getContext("2d");  //Canvas context. $("starmap-canvas").getContext("2d") doesn't work.
  canvas.lineWidth = 1;
  canvas.strokeStyle = "rgba(0, 0, 0, 0.5)";
  //canvas.fillStyle   = "rgba(0, 160, 255, 0.2)";
  //canvas.fillStyle   = "rgba(255, 192, 0, 0.4)";
  //canvas.fillStyle     = "rgba(110, 168, 58, 0.4)";
  canvas.fillStyle     = "rgba(110, 168, 58, 0.8)";
  
  var itemX = mapItem.x + starmap_baseX;  //We're super sure that itemX and itemY are Numbers,
  var itemY = mapItem.y + starmap_baseY;  //thanks to the starmap_Item constructor.
  
  for (var j = 0; j < mapItem.shapes.length; j ++)
  {
    //Now we sort each <shape> by its shape type.
    //................................
    if (mapItem.shapes[j].type == "poly")
    {
      var arrCoords = mapItem.shapes[j].coords.split(",");
      
      //Set a starting point.
      if (arrCoords.length >= 2)
      { canvas.moveTo(Number(arrCoords[0]) * starmap_baseScale + itemX, Number(arrCoords[1])  * starmap_baseScale + itemY); }
      canvas.beginPath();  //This is for the region fill.
      
      //Go to each point.
      for (var k = 2; k < (arrCoords.length - 1); k = k + 2)
      { canvas.lineTo(Number(arrCoords[k]) * starmap_baseScale + itemX, Number(arrCoords[k+1]) * starmap_baseScale + itemY); }
      
      //Return to the starting point.
      if (arrCoords.length >= 2)
      { canvas.lineTo(Number(arrCoords[0]) * starmap_baseScale + itemX, Number(arrCoords[1]) * starmap_baseScale + itemY); } 
      canvas.fill();  //This is for the region fill.
      
      //CHEAT: This is a bit weird. If .beginPath() and .closePath() are used,
      //.stroke() doesn't actually draw a line on the last point; it doesn't
      //"close" the outline. Therefore, we add the extra step (below) as a cheat
      //that works around the problem. .stroke() DOES work as expected if
      //.beginPath() and .closePath() aren't used,  though.
      if (arrCoords.length >= 4)
      { canvas.lineTo(Number(arrCoords[2]) * starmap_baseScale + itemX, Number(arrCoords[3]) * starmap_baseScale + itemY); } 
      canvas.stroke();
      
      canvas.closePath();  //This is for the region fill, but see above for its unintended effects on .stroke().
    }
    //................................
    else {}  //Uh, we don't cater for non-polys at the time being. So sorry!
  }
  
  //canvas.stroke();  //NOTE: Using stroke() has funny results when combined with .beginPath() and .closePath(); 
}

/*  Responds when a user clicks on an <area> in #starmap-areas. Remember, the
    ID of the <area> will be in the form of...
    #starmap-area-IDOFSTARMAPITEM-ANUMBER
 */
function starmap_onMapItemClick(clickEvent)
{
  //Determine the ID of the starmap_Item that was clicked.
  //--------
  var mapItemId = String(this.id);  //First get the id of the <area> that was clicked.
  mapItemId = mapItemId.replace(/starmap-area-/ig, "");
  mapItemId = mapItemId.substring(0, mapItemId.lastIndexOf("-"));  //Note the difference between .substr() and .substring().
  //--------
  
  //Not necessary for the time being.
  
  //Get a handle on the object itself.
  //--------
  var mapItem = null;
  for (var i = 0; i < starmap_items.length; i ++)
  { if (starmap_items[i].id == mapItemId) { mapItem = starmap_items[i]; } }
  //What if it's null? Uh, we don't worry about that too much.
  //--------
  
  //Determine where the click happened on the map
  //--------  
  //var offsetX = 0; var offsetY = 0; var curElement = this;
  //while (curElement != null)  //Find the X/Y offset of this element relative to the entire page.
  //{
  //  if (curElement.offsetLeft != undefined && curElement.offsetTop != undefined)  //It's only undefined once the curElement is the document itself. (The parent of <html>).
  //  { offsetX += curElement.offsetLeft; offsetY += curElement.offsetTop; }
  //  curElement = curElement.parentNode;
  //}
  var offsetX = Math.round($("#starmap-map").offset().left);
  var offsetY = Math.round($("#starmap-map").offset().top);
  var posX = clickEvent.pageX - offsetX;  //This is why we need the relative offsets of the element;
  var posY = clickEvent.pageY - offsetY;  //we want the position of the click relative to the origin of the element.
  //--------
  
  //Optional: Highlight the click area on the canvas.
  //--------
  if (starmap_useCanvas)
  { starmap_canvasClear(); starmap_canvasDrawItem(mapItem); }
  //--------
  
  //If it's the Malaysia map, open the state map, otherwise 
  //----------------
  if (starmap_state == "")
  { window.location = "?state=" + mapItemId; }
  else
  { starmap_loadMapItemData(mapItem); }
  //----------------
  
  //$("#starmap-debug").append("<span>" + offsetX + "," + offsetY + ", </span>");
}

/*  Loads the data associated with the particular map item.
 */
function starmap_loadMapItemData(mapItem)
{
  $("#starmap-details-title").empty();
  $("#starmap-details-footnote").empty();
  $("#starmap-details-text").empty();
  $("#starmap-details-data-edu").empty();
  $("#starmap-details-data-lih").empty();
  $("#starmap-details-data-rbi").empty();
  
  $("#starmap-details-title").append(mapItem.id.toUpperCase() + ": " + mapItem.displayName);
  $("#starmap-details-text").css("display", "none");  //This doesn't apply to this function.
  $("#starmap-details table").css("display", "none");  //This is displayed again once the JSON is loaded.
  
  //Get the data!
  //----------------
  var stateName = starmap_getStateName(mapItem.id);
  //$.getJSON("http://star-micro.knorex.asia/gtp-map/api/detail_info.json?state=" + stateName + "&pno=" + mapItem.id + "&callback=?", starmap_displayJSONData);
  $.getJSON("http://star-micro.knorex.asia/gtp-map/api/detail_info.json?state=" + stateName + "&pno=" + mapItem.id + "&callback=?",
    function(jsonData)
    {
      var items = [];
      
      $.each(jsonData, function(key, val)
      {
        var dataLIH = "";
        var dataEDU = "";
        var dataRBI = "";
        
        var curVal;

        //LIH Section
        //--------
        curVal = starmap_getNumber(val[0]["gtp_lih"]["1azam_pelaburan"]);
        if (curVal > 0) { dataLIH += "<div>" + curVal + " participants eligible of Amanah Saham Sarawak(ASSAR) registered in eKasih.</div>"; }

        curVal = starmap_getNumber(val[0]["gtp_lih"]["elaun_bulanan_1azam"]);
        if (curVal > 0) { dataLIH += "<div>" + curVal + " participants received monthly cash assistance registered in eKasih.</div>"; }

        curVal = starmap_getNumber(val[0]["gtp_lih"]["program_1azam"]);
        if (curVal > 0) { dataLIH += "<div>" + curVal + " participants of Income generating activities for Low Income Households (LIH) registered under eKasih.</div>"; }

        curVal = starmap_getNumber(val[0]["gtp_lih"]["azam_kerja"]);
        if (curVal > 0) { dataLIH += "<div>" + curVal + " participants of Train and Place / Income generating activities provided under MOHR.</div>"; }

        curVal = starmap_getNumber(val[0]["gtp_lih"]["azam_tani"]);
        if (curVal > 0) { dataLIH += "<div>" + curVal + " participants of Agriculture and agro-based  activities provided under MOA.</div>"; }

        curVal = starmap_getNumber(val[0]["gtp_lih"]["azam_khidmat"]);
        if (curVal > 0) { dataLIH += "<div>" + curVal + " participants of Services initiatives (self employment) provided under AIM.</div>"; }

        curVal = starmap_getNumber(val[0]["gtp_lih"]["azam_niaga"]);
        if (curVal > 0) { dataLIH += "<div>" + curVal + " participants of Small business / entrepreneurship provided under AIM.</div>"; }

        $("#starmap-details-data-lih").append(dataLIH);
        //--------

        //EDU Section
        //--------
        curVal = starmap_getNumber(val[0]["gtp_edu"]["fee"]);
        if (curVal > 0) { dataEDU += "<div>" + curVal + " students received fee assistance for private pre-school enrolment.</div>"; }

        curVal = starmap_getNumber(val[0]["gtp_edu"]["hps"]);
        if (curVal > 0) { dataEDU += "<div>" + curVal + " schools awarded High Performing School status.</div>"; }

        curVal = starmap_getNumber(val[0]["gtp_edu"]["rank_primary"]);
        if (curVal > 0) { dataEDU += "<div>" + curVal + " primary schools ranked in Band 1 and Band 2 under the NKRA school rankings.</div>"; }

        curVal = starmap_getNumber(val[0]["gtp_edu"]["rank_secondary"]);
        if (curVal > 0) { dataEDU += "<div>" + curVal + " secondary schools ranked in Band 1 and Band 2 under the NKRA school rankings.</div>"; }

        //curVal = starmap_getNumber(val[0]["gtp_edu"]["rank"]);
        //if (curVal > 0) { dataEDU += "<div>" + curVal + " schools ranked in Band 1 and Band 2 under the NKRA school rankings.</div>"; }

        curVal = starmap_getNumber(val[0]["gtp_edu"]["preschool"]);
        if (curVal > 0) { dataEDU += "<div>" + curVal + " new pre-school classes built.</div>"; }

        curVal = starmap_getNumber(val[0]["gtp_edu"]["linus_lit"]);
        if (curVal > 0) { dataEDU += "<div>" + curVal + " students undergone Literacy screening.</div>"; }

        curVal = starmap_getNumber(val[0]["gtp_edu"]["linus_num"]);
        if (curVal > 0) { dataEDU += "<div>" + curVal + " students undergone Numeracy Screening.</div>"; }

        $("#starmap-details-data-edu").append(dataEDU);
        //--------

        //RBI Section
        //--------
        curVal = starmap_getNumber(val[0]["gtp_rbi"]["balb"]);
        if (curVal > 0) { dataRBI += "<div>" + curVal + " households connected with clean water supply.</div>"; }

        curVal = starmap_getNumber(val[0]["gtp_rbi"]["belb"]);
        if (curVal > 0) { dataRBI += "<div>" + curVal + " households connected with 24-hour electricity supply.</div>"; }

        curVal = starmap_getNumber(val[0]["gtp_rbi"]["pbr"]);
        if (curVal > 0) { dataRBI += "<div>" + curVal + " new PBR houses built or restored.</div>"; }

        curVal = starmap_getNumber(val[0]["gtp_rbi"]["jalb"]);
        if (curVal > 0) { dataRBI += "<div>" + curVal + "km rural roads constructed.</div>"; }

        $("#starmap-details-data-rbi").append(dataRBI);
        //--------

        $("#starmap-details table").css("display", "block");  //This weird hide-and-seek with the data table is necessary to hide the data from "blinking" in the short milisecond between loads.
      });
    }
  );
  
  //----------------
}

/*  Loads the data associated with the particular state.
 */
function starmap_loadStateSummaryData()
{
  $("#starmap-details-title").empty();
  $("#starmap-details-footnote").empty();
  $("#starmap-details-text").empty();
  $("#starmap-details-data-edu").empty();
  $("#starmap-details-data-lih").empty();
  $("#starmap-details-data-rbi").empty();

  $("#starmap-details-title").append(starmap_baseDisplayname);
  $("#starmap-details-text").css("display", "none");  //This is displayed again once the JSON is loaded.
  $("#starmap-details table").css("display", "none");  //This doesn't apply to this function.
  
  //Get the data!
  //----------------
  var stateName = starmap_getStateName("");
  $.getJSON("http://star-micro.knorex.asia/gtp-map/api/state_info.json?state=" + stateName + "&callback=?",
  function(jsonData)
  {
    //Corruption
    //--------
    if (jsonData["gtp_cor"] != undefined)
    {
      $("#starmap-details-text").append("<div class=\"starmap-details-text-subheader\"><img src=\"images/starmap-details-cor-logo.png\"> Corruption</div>");
    
      if (jsonData["gtp_cor"]["num_courts"] != undefined)
      { $("#starmap-details-text").append("<p><b>Number of Special Corruption Courts</b> " + jsonData["gtp_cor"]["num_courts"]); }
    }
    //--------
    
    //Crime
    //--------
    if (jsonData["gtp_cri"] != undefined)
    {
      $("#starmap-details-text").append("<div class=\"starmap-details-text-subheader\"><img src=\"images/starmap-details-cri-logo.png\"> Crime</div>");

      //This is some inefficient traversing. I'll need to improve the functional but resource-heavy process.      
      
      var indexCrimePercent = "";
      var streetCrimePercent = "";
      
      $.each(jsonData["gtp_cri"], function(key, val)
      {
        if (val["type"] == "index_crime_percent") { indexCrimePercent =  val["num_entities"]; }
        if (val["type"] == "street_crime_percent") { streetCrimePercent =  val["num_entities"]; }
      });
      
      $.each(jsonData["gtp_cri"], function(key, val) { if (val["type"] == "index_crime") {
        $("#starmap-details-text").append("<p><b>Reduction in Index Crime</b> <span class=\"subnote\">(Jan-Sept 2011 vs Jan-Sept 2010)</span> " + val["num_entities"] + " cases (equivalent to " + indexCrimePercent + ")");
      }});
      
      $.each(jsonData["gtp_cri"], function(key, val) { if (val["type"] == "street_crime") {
        { $("#starmap-details-text").append("<p><b>Reduction in Street Crime</b> <span class=\"subnote\">(Jan-Sept 2011 vs Jan-Sept 2010)</span> " + val["num_entities"] + " cases (equivalent to " + streetCrimePercent +")"); }
      }});
      
      $.each(jsonData["gtp_cri"], function(key, val) { if (val["type"] == "pdrm_officer") {
        $("#starmap-details-text").append("<p><b>Omnipresence Personnel</b> " + val["num_entities"]);
      }});
      
      $.each(jsonData["gtp_cri"], function(key, val) { if (val["type"] == "cctv") {
        $("#starmap-details-text").append("<p><b>No. of CCTVs</b> " + val["num_entities"]);
      }});
      
      
      /*$.each(jsonData["gtp_cri"], function(key, val)
      {
        if (val["type"] == "index_crime")
        { $("#starmap-details-text").append("<p><b>Reduction in Index Crime</b> <span class=\"subnote\">(Jan-Sept 2011 vs Jan-Sept 2010)</span> " + val["num_entities"] + " cases "); }
        
        if (val["type"] == "street_crime")
        { $("#starmap-details-text").append("<p><b>Reduction in Street Crime</b> <span class=\"subnote\">(Jan-Sept 2011 vs Jan-Sept 2010)</span> " + val["num_entities"] + " cases "); }

        if (val["type"] == "pdrm_officer")
        { $("#starmap-details-text").append("<p><b>Omnipresence Personnel</b> " + val["num_entities"] + " (as of " + starmap_getMonthName(val["month"]) + ")"); }
        
        if (val["type"] == "cctv")
        { $("#starmap-details-text").append("<p><b>No. of CCTVs</b> " + val["num_entities"] + " (as of " + starmap_getMonthName(val["month"]) + ")"); }
      });*/
    }
    //--------
    
    $("#starmap-details-text").css("display", "block");
    
    $("#starmap-details-footnote").append("* Index Crimes are classified as: Property Crimes (i.e. Theft, Snatch Theft, Vehicle Theft, Machinery Theft, House Break-In), Violent Crimes (i.e. Robbery, Assault, Rape, Murder)<br/><br/>** Street Crimes are classified as: Snatch Thefts Robberies without Firearms, Gang Robberies without Firearms");
  });
  //----------------
}

/*  Loads the data associated with the nation.
 */
function starmap_loadNationSummaryData()
{
  $("#starmap-details-title").empty();
  $("#starmap-details-footnote").empty();
  $("#starmap-details-text").empty();
  $("#starmap-details-data-edu").empty();
  $("#starmap-details-data-lih").empty();
  $("#starmap-details-data-rbi").empty();

  $("#starmap-details-title").append(starmap_baseDisplayname);
  $("#starmap-details-text").css("display", "none");  //This is displayed again once the JSON is loaded.
  $("#starmap-details table").css("display", "none");  //This doesn't apply to this function.
  
  //Get the data!
  //----------------
  $.getJSON("http://star-micro.knorex.asia/gtp-map/api/nation_info.json?state=&callback=?",
  function(jsonData)
  {
    //Corruption!
    //--------
    $("#starmap-details-text").append("<div class=\"starmap-details-text-subheader\"><img src=\"images/starmap-details-cor-logo.png\"> Corruption</div>");
    
    var dataGCB = "";
    var dataNameShame = "";
    var dataContractsIntegrityPact = "";
    var dataIntegrityPact = "";
    $.each(jsonData["gtp_cor"], function(key, val)
    {
      if (val["description"] == "global corruption barometer") { dataGCB = dataGCB + val["value"] + "<br/>"; }
      if (val["description"] == "name and shame database") { dataNameShame = val["value"] + " corruption offenders<br/>"; }
      if (val["description"] == "total number of contracts with integrity pacts signed") { dataContractsIntegrityPact = val["value"] + "<br/>"; }
      if (val["description"] == "total number of integrity pacts signed") { dataIntegrityPact = val["value"] + "<br/>"; }
    });

    $("#starmap-details-text").append("<p><b>Global Corruption Barometer</b> <span class=\"subnote\">Percentage of respondents that perceive the Government's fight against corruption to be effective</span> " + dataGCB + "</p>");
    $("#starmap-details-text").append("<p><b>Name and Shame Database</b> " + dataNameShame + "</p>");
    $("#starmap-details-text").append("<p><b>Total number of contracts with Integrity Pacts signed</b> " + dataContractsIntegrityPact + "</p>");
    $("#starmap-details-text").append("<p><b>Total number of Integrity Pacts signed</b> " + dataIntegrityPact + "</p>");
    //--------
    
    //Transport! (UPT)
    //--------
    $("#starmap-details-text").append("<div class=\"starmap-details-text-subheader\"><img src=\"images/starmap-details-upt-logo.png\"> Urban Public Transport (UPT)</div><span class=\"subnote\">Cummulative Rail Ridership from Jan - Aug 2011</span>");
    
    $.each(jsonData["gtp_upt"], function(key, val)
    {
      var dataUTPItem = "";

      if (val["name"] != undefined) { dataUTPItem += "<b>" + starmap_getUPTTypeName(val["type"], 0) + ": " + val["name"] + "</b>"; }
      else if (val["bet"] != undefined) { dataUTPItem += "<b>" + starmap_getUPTTypeName(val["type"], val["bet_index"]) + ": " + val["bet"] + "</b>"; }
      
      if (val["type"] == "rail")
      {
          dataUTPItem += "Ridership: " + val["commuter"] + "<br/>" +
                       "Peak Hours: " + val["peak_hour"] + "<br/>" +
                       "Frequency: " + val["frequency"] + "" +
                       "<!-- ( " + val["period"] + ") -->";
      }
      else if (val["type"] == "bus")
      {
        dataUTPItem += "Normal Route: " + val["normal_duration"] + "<br/>" +
                       "BET Route: " + val["bet_duration"] + "<br/>" +
                       "Time Saved: " + val["time_saved"] + "";
      }
    
      $("#starmap-details-text").append("<p>" + dataUTPItem + "</p>");
    });
    //--------
    
    $("#starmap-details-text").css("display", "block");
        
    $("#starmap-details-footnote").append("BET: Bus Expressway Transit");
  });
  //----------------
}

/*  Responds when a user clicks on the popup's close button.
 */
/*function starmap_onMapPopupCloseButtonClick() { starmap_closePopup(); }*/

/*  Opens/closes the popup item.
 */
/*function starmap_closePopup()
{
  if (starmap_useCanvas) { starmap_canvasClear(); }
  $("#starmap-popup").css("display", "none");
}*/
/*function starmap_openPopup(mapItemId, position)
{
  //$("#starmap-popup-closeButton").css("display", "block");

  //Set the position of the popup.
  //----------------
  var popBufferX = 10; var popBufferY = 50;
  var popW = Math.round(starmap_mapWidth / 2) - 2 * popBufferX;
  var popH = Math.round(starmap_mapHeight / 2) - 2 * popBufferY; //starmap_mapHeight - 2 * popBufferY;  
  var posX = 0; var posY = popBufferY;
  if (position == "left")
  { posX = popBufferX; }
  else if (position == "right")
  { posX = popW + 3 * popBufferX; }
  $("#starmap-popup").css("display", "block");
  $("#starmap-popup").css("width", popW + "px");
  $("#starmap-popup").css("height", popH + "px");
  $("#starmap-popup").css("left", posX);
  $("#starmap-popup").css("top", posY);
  //----------------
}*/

/*  Translates month identifiers to something sexier to read.
 */
function starmap_getMonthName(monthIdentifier)
{
  if      (monthIdentifier == "jan") { return "January"; }
  else if (monthIdentifier == "feb") { return "February"; }
  else if (monthIdentifier == "mar") { return "March"; }
  else if (monthIdentifier == "apr") { return "April"; }
  else if (monthIdentifier == "may") { return "May"; }
  else if (monthIdentifier == "jun") { return "June"; }
  else if (monthIdentifier == "jul") { return "July"; }
  else if (monthIdentifier == "aug") { return "August"; }
  else if (monthIdentifier == "sep") { return "September"; }
  else if (monthIdentifier == "oct") { return "October"; }
  else if (monthIdentifier == "nov") { return "November"; }
  else if (monthIdentifier == "dec") { return "December"; }
  
  return monthIdentifier;
}

/*  Translates the "type" of a UPT item into something sexier to display.
 */
function starmap_getUPTTypeName(typeIdentifier, betIndex)
{
  if      (typeIdentifier == "rail") { return "Rail"; }
  else if (typeIdentifier == "bus") { return "BET " + betIndex; }

  return typeIdentifier;
}

/*  This special filter is required to bridge the gap between the names used in the map and those used by Knorex.
 */
function starmap_getStateName(mapItemID)
{
  var stateName = starmap_state;
  if (stateName == "penang") { stateName = "Pulau Pinang"; }
  if (stateName == "malacca") { stateName = "Melaka"; }
  if (stateName == "negeri") { stateName = "Negeri Sembilan"; }
  if (stateName == "federalterritories")
  {
    stateName = "WP Kuala Lumpur";
    if (mapItemID == "p125") { stateName = "WP Putrajaya"; }
    if (mapItemID == "p166") { stateName = "WP Labuan"; }
    if (mapItemID == "")     { stateName = "federal_territories" }  //Only applies when we're getting the data from http://star-micro.knorex.asia/gtp-map/api/state_info.json?state=federal_territories
  }
  return stateName;
}

/*  Gets data values in certain data types, falling back to defaults when not
    possible to do so.
 */
function starmap_getNumber(val)
{
  if (val == undefined) { return 0; }
  if (isNaN(val)) { return 0; }
  try { return Number(val); }
  catch (err) { return 0; }
}
function starmap_getString(val)
{
  if (val == undefined) { return ""; }
  try { return String(val); }
  catch (err) { return ""; }
}

function starmap_disableSelection(selector)
{
  $(selector).attr('unselectable', 'on')
  $(selector).css({
                   '-moz-user-select':'none',
                   '-webkit-user-select':'none',
                   'user-select':'none'
                 });
  $(selector).each(function()
  { this.onselectstart = function() { return false; }; });

}
</script>
<script>
//JUNK PILE

//Canvas test
//----------------
/*
try
{
  //var canvas = $("#starmap-canvas").getContext("2d");  //Canvas context  //DOESN'T WORK!
  var canvas = document.getElementById("starmap-canvas").getContext("2d");  //Canvas context
  
  //TEST 1
  //canvas.fillStyle="#00ffff";
  //canvas.fillRect(0,0,150,75);
  
  //TEST 2
  canvas.lineWidth = 1;
  canvas.strokeStyle = "rgba(255, 255, 255, 1)";
  canvas.moveTo(50, 0);
  canvas.lineTo(50, 50);
  canvas.stroke();
}
catch (err) { $("#debug").append("<p>ERROR: "+err+"</p>"); }*/
//----------------
</script>
<!----------------------------------------------------------------------------->
<!--end Maps                                                                 -->
<!----------------------------------------------------------------------------->


<style>

/*  Page styles
--------------------------------------------------------------------------------
 */
  html { text-align: center; }
  body { width: 1200px; margin: 0px auto; background: #ccc; }
  #all { background: #fff; }
  
  header { display: block; background: url("images/gtp_masthead.jpg") top left no-repeat; height: 122px; }
  header h1, header h2 { display: none; }
  footer { display: block; padding: 10px 160px; text-align: left;
           font-family: Arial, Sans-Serif; color: #676767; font-size: 10px;
           background: #fff url("images/logo-footer-gtp.png") 0px 10px no-repeat; border-top: 1px solid #d7d7d7; margin: 0 50px; }
  footer a { color: #676767; text-decoration: none; }
  footer a:hover { color: #676767; }
  
  #description { text-align: left; font-family: Georgia, Arial, Sans-Serif; color: #505050; overflow: hidden; border-top: 3px solid #ccc; }
  #description-left { font-size:15px; line-height: 22px; float: left; width: 520px; margin-left: 50px; padding: 20px 10px;
                      background: url("images/bg-description-left.png") left top no-repeat; }
  #description b { color: #14367b; }
  #description-right { font-size:14px; line-height: 18px; float: right; width: 540px; margin-right: 50px; padding: 20px 0; }
  #description-right li { color: #14367b; font-weight: bold; }
/*  
--------------------------------------------------------------------------------
 *  end Page styles
 */


/*  Map styles
--------------------------------------------------------------------------------
 */

  #starmap-all { font-family: Tahoma, Arial, Sans-Serif; font-size: 14px; position: relative; }
  #starmap-map { width: 100px; height: 100px;  /*NOTE: width and height will be set on the init() call.*/
                 display: block; position: relative; overflow: hidden; background: #142434; }
  #starmap-images { display: block; position: absolute; top: 0px; left: 0px;
                    width: 100%; height: 100%; }  /*NOTE: width and height will be set dynamically in the code.*/
  #starmap-images img { position: absolute; }
  #starmap-areas { cursor: pointer; }
  #starmap-areas area { cursor: pointer; }
  #starmap-canvas { display: block; position: absolute; top: 0px; left: 0px; }  /*NOTE: width and height will be set on the init() call. Width and height of a canvas needs to be hardcoded; CSS width/height only scales it.*/
  #starmap-panel { display: block; position: absolute; top: 0px; left: 0px;
                   width: 100%; height: 100%; border: none; }  /*NOTE: width and height will be set dynamically in the code.*/
  #starmap-debug { border: 1px solid #f96; padding: 10px; margin: 20px 0; display: none; }
  
  .starmap-button { color: #ccc; border: 1px solid #666; background: #999;
                    -webkit-border-radius: 10px; -moz-border-radius: 10px; border-radius: 10px;
                    cursor: pointer;
                    background: -webkit-gradient(linear, 0 0, 0 bottom, from(#999), to(#666));
                    background: -webkit-linear-gradient(#999, #666); background: -moz-linear-gradient(#999, #666); background: -ms-linear-gradient(#999, #666); background: -o-linear-gradient(#999, #666);
                    background: linear-gradient(#999, #666); -pie-background: linear-gradient(#999, #666);
                    behavior: url("common/CSS3PIE.htc");  
                  }
  .starmap-button:hover
                  { color: #fff; border: 1px solid #069; background: #eee;
                    -webkit-border-radius: 10px; -moz-border-radius: 10px; border-radius: 10px;
                    -webkit-box-shadow: #099 0px 0px 12px; -moz-box-shadow: #099 0px 0px 12px; box-shadow: #099 0px 0px 12px;
                    background: -webkit-gradient(linear, 0 0, 0 bottom, from(#ccc), to(#999));
                    background: -webkit-linear-gradient(#ccc, #999); background: -moz-linear-gradient(#ccc, #999); background: -ms-linear-gradient(#ccc, #999); background: -o-linear-gradient(#ccc, #999);
                    background: linear-gradient(#ccc, #999); -pie-background: linear-gradient(#ccc, #999);
                    behavior: url("common/CSS3PIE.htc");
                  }
  #starmap-title
  {
    position: absolute; top: 0px; left: 0px; padding: 10px 20px;
    font-size: 20px; color: #fff; font-weight: bold;
  }

  #starmap-controls
  {
    position: absolute; width: 110px; height: 145px; 
    bottom: 0px; left: 0px;
  }
  #starmap-controls-up, #starmap-controls-right, #starmap-controls-down, #starmap-controls-left, #starmap-controls-centre
  { position: absolute; width: 30px; height: 30px; text-align: center; font-size: 20px; line-height: 24px; font-weight: bold; }
  #starmap-controls-up     { left: 40px; top: 5px; }
  #starmap-controls-right  { left: 75px; top: 40px; }
  #starmap-controls-down   { left: 40px; top: 75px; }
  #starmap-controls-left   { left: 5px; top: 40px; }
  #starmap-controls-centre { left: 40px; top: 40px; }
  #starmap-controls-back { position: absolute; left: 5px; top: 110px; width: 100px; height: 30px;
                           text-align: center; font-size: 16px; line-height: 30px; font-weight: bold; }
  #starmap-controls-summary { position: absolute; left: 120px; top: 110px; width: 100px; height: 30px;
                           text-align: center; font-size: 16px; line-height: 30px; font-weight: bold; }
                           
  #starmap-details
  {
    position: absolute; width: 380px; height: 100%; top: 0; right: 0; overflow: auto;
    background: #e0f0ff; color: #434343; font-family: Arial, Sans-Serif; font-size: 11px; line-height: 13px;
  }
  #starmap-details #starmap-details-text { text-align: left; padding: 10px; font-size: 13px; line-height: 20px; }
  #starmap-details #starmap-details-text b { font-weight: bold; display: block; }
  #starmap-details #starmap-details-text span.subnote { color: #999; display: block; font-size: 10px; line-height: 12px; margin-bottom: 4px; }
  #starmap-details #starmap-details-text p { margin: 0 0 10px 0; padding: 0 0 10px 0; border-bottom: 1px solid #a5d5ff; }
  #starmap-details #starmap-details-text .starmap-details-text-subheader { font-size: 15px; font-weight: bold; padding-top: 10px; color: #14367b; margin-bottom: 10px; }
  #starmap-details #starmap-details-text .starmap-details-text-subheader img { vertical-align: middle; }
  #starmap-details table { padding: 0; margin: 0; border-collapse: collapse; display: none; }
  #starmap-details table td { width: 120px; border-right: 1px solid #fff; margin: 0; padding: 10px; text-align: left; vertical-align: top; overflow: hidden; }
  #starmap-details table #starmap-details-data-header td { border-bottom: 1px solid #fff; background: #ededed; padding: 5px; }
  #starmap-details table td div { border-bottom: 1px solid #a5d5ff; padding-bottom: 10px; margin-bottom: 10px; }
  
  #starmap-details #starmap-details-title { text-align: left; padding: 5px 10px;
                                            line-height: 30px; font-size: 15px; font-weight: bold; color: #fff;
                                            background: #30bcfd url("images/starmap-bg-details-title.png") left top repeat-x; }
  #starmap-details #starmap-details-footnote { padding: 5px 10px; text-align: left; color: #999; }
/*  
--------------------------------------------------------------------------------
 *  end Page styles
 */
</style>
<title>Touching Lives Of All Malaysians</title>
</head>
<body>
<div id="all">
  <header>
    <h1>Touching Lives Of All Malaysians</h1><h2>as of September 2011</h2>
  </header>
  <div id="starmap-all">
    <div id="starmap-map">
      <div id="starmap-images">
      </div>
      <canvas id="starmap-canvas" width="100" height="100"></canvas><!--NOTE: width and height will be set on the init() call.-->
      <img id="starmap-panel" src="images/starmap-pane.png" usemap="#starmap-areas" />
      <map name="starmap-areas" id="starmap-areas">
      </map>
    </div>
    <div id="starmap-title"></div>
    <div id="starmap-controls">
      <div id="starmap-controls-up" class="starmap-button">&uarr;</div>
      <div id="starmap-controls-right" class="starmap-button">&rarr;</div>
      <div id="starmap-controls-down" class="starmap-button">&darr;</div>
      <div id="starmap-controls-left" class="starmap-button">&larr;</div>
      <div id="starmap-controls-centre" class="starmap-button">&bull;</div>
      <div id="starmap-controls-back" class="starmap-button">&laquo; BACK</div>
      <div id="starmap-controls-summary" class="starmap-button">SUMMARY</div>
    </div>
    <div id="starmap-details">
      <div id="starmap-details-title"></div>
      <div id="starmap-details-text"></div>
      <table>
        <tr id="starmap-details-data-header">
          <td><img src="images/starmap-details-lih.png"></td>
          <td><img src="images/starmap-details-edu.png"></td>
          <td><img src="images/starmap-details-rbi.png"></td>
        </tr>
        <tr>
          <td id="starmap-details-data-lih"></td>
          <td id="starmap-details-data-edu"></td>
          <td id="starmap-details-data-rbi"></td>
        </tr>
      </table>
      <div id="starmap-details-footnote"></div>
    </div>
  </div>
  <div id="starmap-debug"></div>
  <script>
    if (starmap_debugMode) { starmap_init("mapMalaysia", 2000, 1500); }
    else                   { starmap_init("mapMalaysia", 1200, 600); }
  </script>
  
  <div id="description">
    <div id="description-left">
      <p><b>The Government Transformation Programme (GTP)</b> was launched in January 2010 with the aim of providing all Malaysians access to improved public services irrespective of race, religion and region. After its first year of implementation, the various GTP initiatives have shown results that have affected the lives of many across the country and this is reflected in the GTP Annual Report.  </p>
    </div>
    <div id="description-right">
      <p>As part of delivering Big Results Fast under the GTP, the map above will show that the National Key Results Area (NKRA) initiatives have delivered the intended outcomes and given assistance to the rakyat in the whole country. The NKRAs are:</p>
      <ul>
        <li>Crime</li>
        <li>Corruption</li>
        <li>Rural Basic Infrastructure (RBI)</li>
        <li>Urban Public Transport (UPT)</li>
        <li>Low-Income Households (LIH)</li>
        <li>Education (EDU)</li>
      </ul> 
      <p>The map has 3 viewing levels that is broken down by <b>country, state, and parliamentary areas</b>.</p>
    </div>
  </div>
  
  <footer>
    Copyright &copy; 2011 Performance Management &amp; Delivery Unit (PEMANDU)<br />
    <a href="#">Terms and Conditions</a> | <a href="#">Privacy Policy</a> | <a href="#">Copyright Notice</a>
  </footer>
</div>
</body>
</html>
