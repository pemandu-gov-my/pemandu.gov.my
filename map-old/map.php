<?php require_once "header.php" ?>

<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.4.3.min.js"></script>

<script type="text/javascript">
function initialize()
{
    var myLatlng = new google.maps.LatLng(<?php if($_GET['district'] == "Taman Tun Dr Ismail") echo "3.1516, 101.6253"; else if($_GET['state'] == "KL") echo "3.147, 101.687"; else if($_GET['district'] == "Bandar Utama") echo "3.1401, 101.6073"; else echo "4.31, 102.02"; ?>);
    var myOptions =
        {
        zoom: <?php if($_GET['district']) echo "14"; else if($_GET['state'] == "KL") echo "12"; else echo "7"; ?>,
        center: myLatlng,
        mapTypeId: google.maps.MapTypeId.ROADMAP
        }
    map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);

     var marker = new google.maps.Marker({
      position: myLatlng,
      map: map,
      title:"Hello World!"
    });

    var myLatlng2 = new google.maps.LatLng(3.1597, 101.6300);
    var marker2 = new google.maps.Marker({
      position: myLatlng2,
      map: map,
      title:"Hello World!"
    });

    var myLatlng3 = new google.maps.LatLng(3.1401, 101.6073);
    var marker3 = new google.maps.Marker({
      position: myLatlng3,
      map: map,
      title:"Hello World!"
    });

    var myLatlng4 = new google.maps.LatLng(3.2015, 101.7396);
    var marker4 = new google.maps.Marker({
      position: myLatlng4,
      map: map,
      title:"Hello World!"
    });

    var myLatlng5 = new google.maps.LatLng(3.1587, 101.7576);
    var marker5 = new google.maps.Marker({
      position: myLatlng5,
      map: map,
      title:"Hello World!"
    });




}

function moveTo(x,y)
{
    var loc = new google.maps.LatLng(x,y);
    map.setCenter(loc);
}
</script>

<body onload="initialize()">
<div id="nav" style="width:50%;background:#efefef;float:left;">
    <table width="100%" cellpadding="0" cellspacing="0">
        <td width="50%" valign="top">
            <div class="state"><a href="?state=KL">Kuala Lumpur</a></div>
            <div class="state">Selangor</div>
            <div class="state">Melaka</div>
            <div class="state">Perak</div>
            <div class="state">Johor</div>
            <div class="state">Kedah</div>
            <div class="state">Perlis</div>
            <div class="state">Pulau Pinang</div>
            <div class="state">Kelantan</div>
            <div class="state">Pahang</div>
            <div class="state">Terengganu</div>
            <div class="state">Negeri Sembilan</div>
        </td>
        <td width="50%" valign="top">
            <?php
            if($_GET['state'] == "KL")
            {
                ?>
                <div class="state"><a href="?district=Bandar Utama">Bandar Utama</a></div>
                <div class="state"><a href="?district=Taman Tun Dr Ismail">Taman Tun Dr Ismail</a></div>
                <div class="state">Damansara Perdana</div>
                <div class="state">Kota Damansara</div>
                <div class="state">Ampang</div>
                <div class="state">Keramat</div>
                <?php
            }
            if($_GET['district'] == "Taman Tun Dr Ismail" or $_GET['district'] == "Bandar Utama" )
            {
                ?>
                <div class="state"><?php echo $_GET['district'] ?></div>
                <div class="state">
                    1,000 recipients of 300 students per 150 households
                    cash top-up
                    school undergone benefited water
                    LINUS screening. program
                    Total of 5 schools.

                    500 1Azam
                    participants

                    200 women
                    trained under
                    entrepreneur
                    program

                    150 students
                    receiving fee-
                    assistance for
                    private pre-school

                    15 schools of band 100 households
                    6 and 7 undergone benefited
                    SIP
                    housing program

                    200 households
                    benefited
                    electricity
                    program

                    5 villages
                    benefited 25
                    km from road
                    program
                </div>
                <?php
            }
            ?>
        </td>
    </table>
</div>
<div id="map_canvas" style="float:right;width:50%;height:100%;"></div>

<?php require_once "footer.php" ?>