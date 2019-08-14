<?php
class Keywords_model extends CI_Model {

        public function __construct()
        {
                $this->load->database();
        }

        public function get_keywords($keyword = NULL){

        	if($keyword == NULL){
        		// JOIN query to get all the keyword information
        		$this->db->select('*');
        		$this->db->from('keywords');
        		$this->db->join('language','keywords.language_id = language.id');
        		$this->db->join('parent_name','keywords.parent_id = parent_name.id');
        		$this->db->join('report_type', 'keywords.report_type_id = report_type.id');
        		$query = $this->db->get();

        	}else{

        		$this->db->select('*');
        		$this->db->from('keywords');
        		$this->db->join('language','keywords.language_id = language.id');
        		$this->db->join('parent_name','keywords.parent_id = parent_name.id');
        		$this->db->join('report_type', 'keywords.report_type_id = report_type.id');
        		$this->db->like('keyword_one', $keyword);
        		$this->db->or_like('keyword_two', $keyword);
        		$query = $this->db->get();
        	}

        	return $query->result_array();

        }

        public function add_keyword(){

                $data = array(
                        'report_type_id' => $this->input->post('report_type'),
                        'parent_id' => $this->input->post('parent'),
                        'language_id' => $this->input->post('language'),
                        'keyword_one' => $this->input->post('keyword'), 
                );

                return $this->db->insert('keywords', $data);
        }

        public function get_language(){
                $query = $this->db->get('language');
                return $query->result_array();
        }

        public function get_parent(){
                
                $query = $this->db->get('parent_name');
                return $query->result_array();
        }

        public function get_report_type(){
                
                $query = $this->db->get('report_type');
                return $query->result_array();
        }
}