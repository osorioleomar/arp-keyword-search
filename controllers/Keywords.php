<?php

class Keywords extends CI_Controller{

    public function __construct(){

                parent::__construct();
                $this->load->model('keywords_model');
    }

// VIEWS -----------------

	public function index(){

		$this->load->view('header');
		$this->load->view('search');
	}

	public function search(){

		$this->load->view('header');
		$this->load->view('search');
	}

// FORMS

	public function search_keyword(){

		$searchText = $this->input->post('searchTerm');

		$data['keywords'] = $this->keywords_model->get_keywords($searchText);

		if(empty($data['keywords'])){

			$term = $searchText;

			$this->add_keyword($term);

		}else{

			$data['title'] = 'All keywords';

			$this->load->view('header');
			$this->load->view('search');
			$this->load->view('results', $data);

		}

	}


	public function add_keyword($term = NULL){

		if($term == NULL){
			$data['term'] = "";
			$data['message'] = "";
		}else{
			$data['term'] = $term;
			$data['message'] = $term . " was not found in the database. Please add it as new term below.";
		}

		$this->load->helper('form');
		$this->load->library('form_validation');

		$this->form_validation->set_rules('parent','Parent Type','required');
		$this->form_validation->set_rules('language','Language','required');
		$this->form_validation->set_rules('report_type','Report Type','required');
		$this->form_validation->set_rules('keyword','Keyword','required');

		if($this->form_validation->run() == FALSE){
			$data['languages'] = $this->keywords_model->get_language();
			$data['parents'] = $this->keywords_model->get_parent();
			$data['report_types'] = $this->keywords_model->get_report_type();

			$this->load->view('header');
			$this->load->view('new-keyword',$data);

		}else{

			$this->keywords_model->add_keyword();

			$data['keywords'] = $this->keywords_model->get_keywords($this->input->post('keyword'));
			$data['title'] = 'All keywords';

			$this->load->view('header');
			$this->load->view('search');
			$this->load->view('results', $data);
		}

	}

}