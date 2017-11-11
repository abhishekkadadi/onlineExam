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
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('header'); 
		$this->load->view('index');
		 $this->load->view('footer');  
	}
	
	 public function about() {
    	
        	 $this->load->view('header');   
             $this->load->view('about');  
              $this->load->view('footer');          
    }
     public function mpsc() {
    	
        	 $this->load->view('header');   
             $this->load->view('mpsc'); 
             $this->load->view('footer');         
    }
    
     public function gate() {
    	
        	 $this->load->view('header');   
             $this->load->view('gate'); 
             $this->load->view('footer');         
    }
     public function ies() {
    	
        	 $this->load->view('header');   
             $this->load->view('ies'); 
             $this->load->view('footer');         
    }
     public function psus() {
    	
        	 $this->load->view('header');   
             $this->load->view('psus'); 
             $this->load->view('footer');         
    }
     public function mhregional() {
    	
        	 $this->load->view('header');   
             $this->load->view('mhregional'); 
             $this->load->view('footer');         
    }
     public function courses() {
    	
        	 $this->load->view('header');   
             $this->load->view('courses'); 
             $this->load->view('footer');         
    }
}
