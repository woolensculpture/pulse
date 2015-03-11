	<style>
        #bkgd {
            width: 909px;
            height: 171px;
            margin: 0 auto;
			background-image: url('<?php echo base_url();?>static/img/destler/bkgd.png');
			padding-top: 538px;
        }
		
		#form {
			width: 410px;
			height: 180px;
			border: 0px solid black;
			margin-top: -365px;
			margin-left: 401px;
			padding: 20px;
		}
		
		#input {
			width: 390px;
		}
		
		#submit {
			margin-left: 0px;
			margin-top: 10px;
		}
    </style>


	<div id="bkgd">
        <div id="form">
        	<?php echo form_open('askdestler/submit', array('id' => 'destler_form')); ?>
			<?php echo form_textarea(array('placeholder' => 'Type your question in here!', 'id' => 'input', 'name' => 'question')); ?>
			<?php echo form_submit('submit', 'Submit'); ?>
			<?php echo form_close(); ?>
        </div>
    </div>
    
