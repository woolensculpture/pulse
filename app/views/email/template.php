<!DOCTYPE html>

<!--
This document and all those relating to it are property of WITR 89.7, Rochester Institute of Technology
Developer: John Phillip Betley
© 2011 WITR 89.7 | Rochester Institute of Technology
-->



<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="author" content="John Betley">

 	<meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">

	<link href="http://test.witr.rit.edu/static/img/favicon.ico" rel="shortcut icon">

	<title>WITR 89.7</title>

</head>
<body>

<div style="background-color: #cccccc; width: 700px; clear: both; overflow: hidden; padding-bottom: 15px;">
	
	<img src="<?php echo base_url(); ?>static/img/header.png"/>
	<div style="-webkit-border-radius: 5px; margin: 5px 0px 5px 20px; border-bottom-left-radius: 5px; background-color: black; color: white; padding: 20px; border-bottom-right-radius: 5px; -moz-border-radius: 5px; border-top-left-radius: 5px; width: 620px; border-top-right-radius: 5px; -o-border-radius: 5px; border-radius: 5px;">
	<?php
		if (!isset($data)) $data = '';
		$this->load->view($content, $data);
	?>
	</div>
<div style="clear: both;"></div>
<div align="center" style="text-align: center;">&copy; 2011 WITR 89.7 | Rochester Institute of Technology</div>
</div>

</body>
</html>