	<style>
        #bkgd {
            width: 909px;
            height: 538px;
            margin: 0 auto;
			background-image: url('<?php echo base_url();?>static/img/alec/bkgd2.png');
			padding-top: 538px;
        }
		
		#form {
			width: 454px;
			height: 285px;
			border: 0px solid black;
			margin-left: 212px;
			padding: 20px;
		}
		
		#input {
			width: 432px;
		}
		
		#submit {
			margin-left: 0px;
			margin-top: 10px;
		}
    </style>


	<div id="bkgd">
        <div id="form">
        	<?php echo form_open('askalec/submit', array('id' => 'alec_form')); ?>
			<?php echo form_textarea(array('value' => 'Type it in here!', 'id' => 'input', 'name' => 'question')); ?>
			<?php echo form_submit('submit', 'Submit'); ?>
			<?php echo form_close(); ?>
        </div>
    </div>
    
