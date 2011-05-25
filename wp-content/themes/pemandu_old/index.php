<?php include_once 'template/header.php';?>
<?php include_once 'template/gtp.php';?>
			<div id="slider_area">
				<div id="slide-text">
					<span id="focus"> IN FOCUS </span>
					<div id="slide-caption">
						<div class="current">
						<h3>1,000 more preschools to open  this year</h3>
						<p> The Rural and Regional Development Ministry is allocating RM140 million to open 1,000 new preschools under the Social Development Department (Kemas) this year.</p>
						<span class="readmore" id="article1"> + Read More</span>
						</div>
						<div>
						<h3>IGP: Integrity key to success of police force</h3>
						<p> KUALA LUMPUR: The Royal Malaysian Police will step up efforts to fight crime by further improving the integrity, professionalism ...</p>
						<span class="readmore" id="article2"> + Read More</span>
						</div>
						<div>
						<h3>Sprucing up bus stops</h3>
						<p>PETALING JAYA: Commuters in the Klang Valley can now benefit from more comfortable waiting areas as 634 bus stops have been refurbished...</p>
						<span class="readmore" id="article3"> + Read More</span>
						</div>
						<div>
						<h3>Subsidy Rationalisation</h3>
						<p> To help Malaysia maintain the strong growth it has achieved, the Government has taken the second step in a gradual subsidy rationalisation effort.</p>
						<span class="readmore" id="article4"> + Read More</span>
						</div>
					</div>
				</div>
				<div id="slide-picture">
					<div id="slide-buttons">
						<ul>
							<li> 1</li>
							<li> 2</li>
							<li> 3</li>
							<li> 4</li>
						</ul>
					</div>
			<div id="photoShow">
					<div class="current">
           				<img src="<?php bloginfo('template_directory'); ?>/images/slider/Home_Education.jpg" alt="Photo Gallery" class="gallery" /> 
       				</div>
			        <div>
			             <img src="<?php bloginfo('template_directory'); ?>/images/slider/Home_crime.jpg" alt="Photo Gallery" class="gallery" />
			        </div>
			        <div>
			            <img src="<?php bloginfo('template_directory'); ?>/images/slider/Home_transport.jpg"  alt="Photo Gallery"  class="gallery" />
			        </div>
			        <div>
			             <img src="<?php bloginfo('template_directory'); ?>/images/slider/Home_subsidy.jpg" alt="Photo Gallery" class="gallery" />
			        </div>
				</div>
	 		</div>	
</div>
    <script type="text/javascript">
    $(function(){
    	$("#slide-caption").children(':not(div.current)').hide();
        });
        $(window).load(function() {
            
            // create the image rotator
            setInterval("rotateImages()", 5000);
        });
		
        function rotateImages() {
            var oCurPhoto = $('#photoShow div.current');
            var oCurText = $('#slide-caption div.current');
            var oNxtPhoto = oCurPhoto.next();
            var oNxtText = oCurText.next();
            if (oNxtPhoto.length == 0)
                oNxtPhoto = $('#photoShow div:first');
            if (oNxtText.length == 0)
                oNxtText = $('#slide-caption div:first');

            oCurText.removeClass('current').hide().addClass('previous');
            oNxtText.show().addClass('current',
                function() {
                    oCurText.removeClass('previous');
                });

            oCurPhoto.removeClass('current').addClass('previous');
            oNxtPhoto.css({ opacity: 0.0 }).addClass('current').animate({ opacity: 1.0 }, 1000,
                function() {
                    oCurPhoto.removeClass('previous');
                });
            
        }
    </script>
<?php include_once 'template/footer.php';?>