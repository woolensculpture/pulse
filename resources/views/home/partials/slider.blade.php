<div id="news" class="scrollable">
    <ul class="items">
    	<?php foreach($slider as $show) :?>
        <li id="<?php $print = $show->type !== 'SLIDER' ? $show->type : 'fourth'; 
        		echo $print;?>">
            <?php if ($show->type !== 'SLIDER') : ?>
            <!--<a href="#">-->
		        <div class="message" style="<?php echo $show->show->style; ?>"><?php echo $show->message; ?></span></div>
		        <div style="position: absolute;"><img class="newsimg border" src="<?php echo base_url(); ?>static/img/slider/<?php echo $show->show->slider_picture ?>"></div>
		    <!--</a>-->
		    <?php endif; ?>
		    <?php if ($show->type === 'SLIDER') : ?>
		    	<div style="position: absolute;">
		    		<?php if ($show->url !== null) : ?>
		    		<a href='<?php echo $show->url; ?>'>
		    		<img class="newsimg border" src="<?php echo base_url(); ?>static/img/events/<?php echo $show->picture ?>">
		    		</a> 
		    		<?php else: ?> <img class="newsimg border" src="<?php echo base_url(); ?>static/img/events/<?php echo $show->picture ?>"> <?php endif; ?>
		    	</div>
		    <?php endif; ?>
        </li>
        <?php endforeach; ?>
    </ul>
    <div style="clear:both;"></div>
    <div class="navi">
    	<div href="#first" class="border white"></div>
    	<div href="#second" class="border white"></div>
    	<div href="#third" class="border white"></div>
    	<div href="#fourth" class="border white"></div>
    </div>
</div>