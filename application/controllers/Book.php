<?php
require APPPATH . '/libraries/REST_Controller.php';

class Book Extends REST_Controller{

	function __construct ($config = 'rest'){
		parent::__construct($config);
		//$this->load->library('database');
	}

	//methode : Get Book


	//untuk menampilkan data
	function index_get(){
		//untuk menampilkan database
		$data=$this->db->get('book')->result();
		//$data= array('response'=>'ok'); untuk mengecek status
		return $this->response($data,200);
	}

	//untuk mengirim data
	function index_post(){
		$isbn = $this->post('isbn');
		$title = $this->post('title');
		$writer = $this->post('writer');
		$description = $this->post('description');


		$book = array(
			'isbn' => $isbn,
			'title' => $title,
			'writer' => $writer,
			'description' => $description);

			$insert = $this->db->insert('book' ,$book);

		
			if($insert){
				$this->response($book,200);
			}
			else{
					$data = array('status'=>'gagal insert');
					$this->response($data,500);
				
			}
		}
	
}
?>