<div style="clear:both;"></div>
<div id="player_popup" class="border">
	<a href="#" onclick="popitup('<?php echo base_url(); ?>home/listen')">
	    <img src="<?php echo base_url(); ?>static/img/header/browser.gif" alt="" style="margin-right: 10px"/>
	</a>
	<a href="<?php echo base_url(); ?>static/live.m3u">
	    <img src="<?php echo base_url(); ?>static/img/header/computer.gif" alt="" style="margin-right: 10px" />
	</a>
	<a href="<?php echo base_url(); ?>static/2nd.m3u">
		<img src="<?php echo base_url(); ?>static/img/header/womens.png" alt="" />
	</a>
</div>
<div id="copyright">&copy; 2011 -  <?php echo date('Y'); ?> WITR 89.7 | Rochester Institute of Technology</div>
</div>

<script language="javascript" type="text/javascript">
<!--

function popitup(url) {
	newwindow = window.open(url,'name','height=265,width=560');
	if (window.focus) {
		newwindow.focus();
	}
	return false;
}

// -->
</script>

</body>
</html>
