<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function index()
	{
		$this->load->view('welcome_message');
	}

	public function image()
	{ 
    //    $image=array();
       //  $count = count($_FILES['userImage']['name']);
		// print_r($count);die;
    //     for($i=0; $i<$count; $i++)
    //     {
    //         $filename = $_FILES['userImage']['name'][$i];
    //         // $file_tmp_name = $_FILES['userImage']['tmp_name'][$i];
    //         $ext = pathinfo($filename, PATHINFO_EXTENSION);
    //        $uniquename = md5(date('ymdHis')) . rand(11111,99999);
    //        $image['image']= "uploads/users/$uniquename._$i.$ext";
    //        //$data['image']= $image;
	// 	}
		$this->load->view('image');
	}
}
