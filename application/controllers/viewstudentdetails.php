<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Viewstudentdetails extends Main_Controller {	

	public function __construct() {
		parent::__construct(true);
		$this->load->model('Viewstudentdetails_Model', 'Model');
	}
	
   public function index()
	{
		$this->loadstudentinfo();
	}
	
	public function loadstudentinfo() {
		$studentid = $this->input->post('studentid');
		$studentid = 1;
		$studentinfo = $this->Model->getstudentinfo($studentid);
		//print_r($studentinfo);
		//die();
		$this->load_view('viewstudentdetails_view', compact('studentinfo', 'studentid'));
	}
	
	public function downloadfile() {
	$filename = $this->input->post('filename');
	$filepath =  $this->input->post('filepath');
	//download.php
	//content type
	header('Content-type: application/pdf');
	//open/save dialog box
	header('Content-Disposition: attachment; filename=iskolarship.pdf');
	//read from server and write to buffer
	readfile($filepath);
	}
	
	public function fundeducation() {
		$amount = $this->input->post('amount');
		$studentid = $this->input->post('studentid');
		$this->Model->saveinstantdonation($amount, $studentid);
		$studentinfo = $this->Model->getstudentinfo($studentid);
		$this->load_view('viewstudentdetails_view', compact('studentinfo', 'studentid'));
	}
	
<<<<<<< HEAD
}
=======
}
>>>>>>> 239fffe683f3817b7c708a5790851a014d7ec81f
