<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Report_m');		
	}
	
	public function monthly()
	{
		//load header and footer module
		$header = $this->loaded_module_admin(0);
		$footer = $this->loaded_module_admin(1);
		
		$data = $this->settings_admin();
				
		$income_monthly = $this->Report_m->get_income_monthly();
		$data["income_monthly"] = $income_monthly;
		
		$data["stat"] = $this->get_statistic();
		
		$header->header_view();
		$this->load->view('Income_monthly_v', $data);
		$footer->footer_view();
	}
	
	public function yearly()
	{
		//load header and footer module
		$header = $this->loaded_module_admin(0);
		$footer = $this->loaded_module_admin(1);
		
		$data = $this->settings_admin();
		
		$income_yearly = $this->Report_m->get_income_yearly();
		$data["income_yearly"] = $income_yearly;
		
		$data["stat"] = $this->get_statistic();
		
		$header->header_view();
		$this->load->view('Income_yearly_v', $data);
		$footer->footer_view();
	}
	
	public function detail_monthly_report($date_encoded)
	{
		$date = base64_decode($date_encoded);
		$month = explode("-", $date)[0];
		$year = explode("-", $date)[1];
		
		//load header and footer module
		$header = $this->loaded_module_admin(0);
		$footer = $this->loaded_module_admin(1);
		
		$data = $this->settings_admin();
				
		$income_monthly = $this->Report_m->get_detail_income_monthly($month, $year);
		$data["income_monthly"] = $income_monthly;
		
		$header->header_view();
		$this->load->view('Detail_income_monthly_v', $data);
		$footer->footer_view();
	}
	
	public function detail_yearly_report($date_encoded)
	{
		$year = base64_decode($date_encoded);
		
		//load header and footer module
		$header = $this->loaded_module_admin(0);
		$footer = $this->loaded_module_admin(1);
		
		$data = $this->settings_admin();
		
		$income_monthly = $this->Report_m->get_detail_income_yearly($year);
		$data["income_monthly"] = $income_monthly;
		
		$header->header_view();
		$this->load->view('Detail_income_yearly_v', $data);
		$footer->footer_view();
	}
	
	private function get_statistic()
	{
		$total_m = $this->proses_income($this->Report_m->get_income_monthly());
		$total_y = $this->proses_income($this->Report_m->get_income_yearly());
		$data["nincome_monthly"] = $total_m;
		$data["nincome_yearly"] = $total_y;
		
		return $data;
	}
	
	private function proses_income($raw_data)
	{
		$total = 0;
		foreach($raw_data as $m)
		{
			$total+=$m->total_price_netto;
		}
		return $total;
	}
}
