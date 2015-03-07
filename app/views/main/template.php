<?php
	
	if (!isset($data)) $data = '';


	$this->load->view('main/header', get_button_container());


	$this->load->view($content, $data);
	
	
	$this->load->view('main/footer');
	
	