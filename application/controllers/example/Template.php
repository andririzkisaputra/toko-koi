<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Template extends CI_Controller {

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
	public function album()
	{
		$this->load->view('example-template/album/index.html');
	}

	public function blog()
	{
		$this->load->view('example-template/blog/index.html');
	}

	public function carousel()
	{
		$this->load->view('example-template/carousel/index.html');
	}

	public function cheatsheet()
	{
		$this->load->view('example-template/cheatsheet/index.html');
	}

	public function checkout()
	{
		$this->load->view('example-template/checkout/index.html');
	}

	public function cover()
	{
		$this->load->view('example-template/cover/index.html');
	}

	public function dashboard()
	{
		$this->load->view('example-template/dashboard/index.html');
	}

	public function dropdowns()
	{
		$this->load->view('example-template/dropdowns/index.html');
	}

	public function features()
	{
		$this->load->view('example-template/features/index.html');
	}

	public function footers()
	{
		$this->load->view('example-template/footers/index.html');
	}

	public function grid()
	{
		$this->load->view('example-template/grid/index.html');
	}

	public function headers()
	{
		$this->load->view('example-template/headers/index.html');
	}
}
