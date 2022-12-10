<?php  
defined('BASEPATH') OR exit('No direct script access allowed');  
  
class ImageController extends CI_Controller { 
    public $Signup;
 
 
    /**
     * Get All Data from this method.
     *
     * @return Response
    */
    public function __construct() {
       parent::__construct(); 
 
 
       $this->load->library('form_validation');
       $this->load->library('session');
       $this->load->model('ImageModel');

       $this->load->helper('form', 'url');

    }
 
    public function index()  
    {  
        
        $this->load->view('upload_form');
        
    } 


    public function do_upload()
    {
        // imageUploadApi

        //print_r($_FILES);die;

        $data= array(
            'userName' => $this->input->post('username'),
        );
        $this->ImageModel->insert_item('user_table',$data);

        $insert_id = $this->db->insert_id();
       $image=array();
       
        $count = count($_FILES['userImage']['name']);
        //print_r($_FILES);
        for($i=0; $i<$count; $i++)
        {
            $filename = $_FILES['userImage']['name'][$i];
            $file_tmp_name = $_FILES['userImage']['tmp_name'][$i];
            $ext = pathinfo($filename, PATHINFO_EXTENSION);
            //print_r($filename);die;
           // $uniquename = md5(date('ymdHis')) . '.' . $ext;. rand(11111,99999)
           $uniquename = md5(date('ymdHis')) . rand(11111,99999);
           move_uploaded_file($file_tmp_name,"uploads/users/$uniquename._$i.$ext");
        
           $image= "uploads/users/$uniquename._$i.$ext";
        
           //print_r($image);
           $data= array(
               'user_image_id' => $insert_id,
               'userImage' =>$image,
            );
            $this->ImageModel->insert_image('user_image',$data);
        }
        $message="success";
        $status= 200;
 
        $data['message']=$message;
        $data['status']=$status;
        
        echo json_encode($data);

    }

    public function getData()
    {
        
        $result = $this->ImageModel->getData();
   
        $response['userData']=$result;
        //print_r($response);
       echo json_encode($response); 
    }

  }



?>   