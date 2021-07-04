<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adminarea extends MY_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('User','um');
	}

	public function index()
	{
	$this->adminBackend('adminarea/landing-page');
	}

	public function dashboard()
	{
		$this->adminBackend('adminarea/dashboard');
	}

	public function change_password()
	{
		$this->adminBackend('adminarea/change-password');
	}
	public function brands()
	{
		//$this->adminBackend('adminarea/add-brands');
		$data['brands'] = $this->um->getData(TBLBRAND);
		$this->adminBackend('adminarea/add-brands',$data,true);
		
	}
	public function brand_list()
	{
	
		//$this->adminBackend('adminarea/repair');
		$data['brandli'] = $this->um->getData(TBLBRAND);
		$this->adminBackend('adminarea/brand-list',$data,true);
	}
	public function products()
	{
		//$this->adminBackend('adminarea/add-product');
		$data['products'] = $this->um->getData(TBLPRODUCT);
		$this->adminBackend('adminarea/add-product',$data,true);
	}
	public function product_list()
	{
	
		//$this->adminBackend('adminarea/repair');
		$data['productli'] = $this->um->getData(TBLPRODUCT);
		$this->adminBackend('adminarea/product-list',$data,true);
	}
	public function staff()
	{
		//$this->adminBackend('adminarea/add-staff');
		$data['staff'] = $this->um->getData(TBLSTAFF);
		$this->adminBackend('adminarea/add-staff',$data,true);
	}
	public function staff_list()
	{
	
		//$this->adminBackend('adminarea/repair');
		$data['staffli'] = $this->um->getData(TBLSTAFF);
		$this->adminBackend('adminarea/staff-list',$data,true);
	}
	public function repairs()
	{
		//$this->adminBackend('adminarea/repair');
		$data['repairs'] = $this->um->getData(TBLREPAIR);
		$this->adminBackend('adminarea/repair',$data,true);
	}
	public function repairing_list()
	{
	
		//$this->adminBackend('adminarea/repair');
		$data['repairing'] = $this->um->getData(TBLREPAIR);
		$this->adminBackend('adminarea/repairing-list',$data,true);
	}
	public function sale()
	{
		//$this->adminBackend('adminarea/add-sale');
		$data['sale'] = $this->um->getData(TBLSALE);
		$this->adminBackend('adminarea/add-sale',$data,true);
	}
	public function sale_list()
	{
	
		//$this->adminBackend('adminarea/repair');
		$data['saleli'] = $this->um->getData(TBLSALE);
		$this->adminBackend('adminarea/sale-list',$data,true);
	}
	public function supplier()
	{
		//$this->adminBackend('adminarea/add-staff');
		$data['supplier'] = $this->um->getData(TBLSUPPLIER);
		$this->adminBackend('adminarea/add-supplier',$data,true);
	}
	public function supplier_list()
	{
	
		//$this->adminBackend('adminarea/repair');
		$data['supplierli'] = $this->um->getData(TBLSUPPLIER);
		$this->adminBackend('adminarea/supplier-list',$data,true);
	}
	public function purchase()
	{
		//$this->adminBackend('adminarea/add-staff');
		$data['purchase'] = $this->um->getData(TBLPURCHASE);
		$this->adminBackend('adminarea/add-purchase',$data,true);
	}
	public function reports()
	{
		$this->adminBackend('adminarea/reports');
		
	}
	public function purchase_list()
	{
	
		//$this->adminBackend('adminarea/repair');
		$data['purchaseli'] = $this->um->getData(TBLPURCHASE);
		$this->adminBackend('adminarea/purchase-list',$data,true);
	}
	public function add_brands()
	{
		$data = $this->input->post(); 
		unset($data['submit']);
		$check = $this->um->insertData(TBLBRAND,$data);
		if (!empty($check)) {
			redirect('Adminarea/brands','refresh',301);
		} else {
			redirect('Adminarea/brands','refresh',301);
		}
		
		//$this->brands_list();
		//print_r($data);
	}

	// public function brands_list()
	// {
	// 	$data['brands'] = $this->um->getData(TBLBRAND);
	// 	$this->adminBackend('adminarea/add-brands',$data,true);
	// }
	
	public function add_product()
	{
		$data = $this->input->post(); 
		unset($data['submit']);
		$check = $this->um->insertData(TBLPRODUCT,$data);
		if (!empty($check)) {
			redirect('Adminarea/products','refresh',301);
		} else {
			redirect('Adminarea/products','refresh',301);
		}
	}
    public function add_staff()
	{
		$data = $this->input->post(); 
		unset($data['submit']);
		$check = $this->um->insertData(TBLSTAFF,$data);
		if (!empty($check)) {
			redirect('Adminarea/staff','refresh',301);
		} else {
			redirect('Adminarea/staff','refresh',301);
		}
		}
		public function repair()
	   {
		$data = $this->input->post(); 
		unset($data['submit']);
		$check = $this->um->insertData(TBLREPAIR,$data);
		if (!empty($check)) {
			redirect('Adminarea/repairs','refresh',301);
		} else {
			redirect('Adminarea/repairs','refresh',301);
		}
		}
		public function add_sale()
	   {
		$data = $this->input->post(); 
		unset($data['submit']);
		$check = $this->um->insertData(TBLSALE,$data);
		if (!empty($check)) {
			redirect('Adminarea/sale','refresh',301);
		} else {
			redirect('Adminarea/sale','refresh',301);
		}
		}
		
     public function add_supplier()
	  {
		$data = $this->input->post(); 
		unset($data['submit']);
		$check = $this->um->insertData(TBLSUPPLIER,$data);
		if (!empty($check)) {
			redirect('Adminarea/supplier','refresh',301);
		} else {
			redirect('Adminarea/supplier','refresh',301);
		}
		}
		 public function add_purchase()
	  {
		$data = $this->input->post(); 
		unset($data['submit']);
		$check = $this->um->insertData(TBLPURCHASE,$data);
		if (!empty($check)) {
			redirect('Adminarea/purchase','refresh',301);
		} else {
			redirect('Adminarea/purchase','refresh',301);
		}
		}


		
	
}
