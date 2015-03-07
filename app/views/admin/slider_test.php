<style>
	@font-face {
    font-family: 'AlternateGothic2BTRegular';
    src: url('/static/css/altgot2n-webfont.eot');
    src: url('/static/css/altgot2n-webfont.eot?#iefix') format('eot'),
         url('/static/css/altgot2n-webfont.woff') format('woff'),
         url('/static/css/altgot2n-webfont.ttf') format('truetype'),
         url('/static/css/altgot2n-webfont.svg#webfontXzUVEgJP') format('svg');
    font-weight: normal;
    font-style: normal;
}

* {
	font-family: AlternateGothic2BTRegular;
}
</style>

<ul style="list-style: none; position: relative">
	<?php foreach($slider as $show) :?>
    <li style="height: 400px;position: relative">
        <!--<a href="#">-->
	        <div style="<?php 
	        	if ($actual) {
	        		echo $show->style;
				} else {
					echo "position: absolute; z-index: 1000; left: 15px; top: 70px; font-size: 50px; color: white;";
				}
				echo '">';
				if  ($testText) {
					
					echo "Tomorrow " . $show->getTime();
				} else {
					echo $show->message;
				}?></div>
	        <div style="position: absolute;"><img src="<?php echo base_url(); ?>static/img/slider/<?php echo $show->slider_picture ?>"></div>
	    <!--</a>-->
    </li>
    <?php endforeach; ?>
</ul>