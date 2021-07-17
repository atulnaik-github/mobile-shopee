<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Adminarea extends MY_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('User', 'um');
	}

	public function index()
	{
		$this->adminBackend('adminarea/dashboard');
	}

	public function dashboard()
	{
		$this->adminBackend('adminarea/dashboard');
	}

	public function change_password()
	{
		$this->adminBackend('adminarea/change-password');
	}


	public function products()
	{
		$data['brand_list'] = $this->Md_database->getData(TBLBRAND, '*');
		$this->db->join(TBLBRAND . ' B', 'B.id = P.brand_name', 'left');
		$data['products'] = $this->Md_database->getData(TBLPRODUCT . ' P', '*,P.id as product_id,B.brand_name as brand');
		$this->adminBackend('adminarea/add-product', $data, true);
	}
	public function product_list()
	{
		$data['brand_list'] = $this->Md_database->getData(TBLBRAND, '*');
		$data['products_list'] = $this->Md_database->getData(TBLPRODUCT, '*');
		$this->adminBackend('adminarea/product-list', $data, true);
	}
	public function staff()
	{
		$data['staff'] = $this->Md_database->getData(TBL_USERADMIN, '*');
		$this->adminBackend('adminarea/add-staff', $data, true);
	}
	public function staff_list()
	{

		//$this->adminBackend('adminarea/repair');
		$data['staffli'] = $this->um->getData(TBL_USERADMIN);
		$this->adminBackend('adminarea/staff-list', $data, true);
	}
	public function repairs()
	{
		$this->db->join(TBLBRAND . ' B', 'B.id = R.brand_name', 'left');
		$data['repairs'] = $this->Md_database->getData(TBLREPAIR . ' R', '*,R.id as repair_id,B.brand_name as brand');
		$data['brand_list'] = $this->Md_database->getData(TBLBRAND, 'id,brand_name');
		$this->adminBackend('adminarea/repair', $data, true);
	}


	public function repairing_list()
	{
		//$this->adminBackend('adminarea/repair');
		$data['repairing'] = $this->um->getData(TBLREPAIR);
		$this->adminBackend('adminarea/repairing-list', $data, true);
	}
	public function sale()
	{
		$data['brands'] = $this->Md_database->getData(TBLBRAND, '*');
		$data['product'] = $this->Md_database->getData(TBLPRODUCT, '*');
		$data['sale'] = $this->Md_database->getData(TBLSALE, '*');
		$this->adminBackend('adminarea/add-sale', $data, true);
	}
	public function sale_list()
	{
		//$this->adminBackend('adminarea/repair');
		$data['saleli'] = $this->um->getData(TBLSALE);
		$this->adminBackend('adminarea/sale-list', $data, true);
	}
	public function supplier()
	{
		//$this->adminBackend('adminarea/add-staff');
		$data['supplier'] = $this->Md_database->getData(TBLSUPPLIER, '*');
		$this->adminBackend('adminarea/add-supplier', $data, true);
	}
	public function supplier_list()
	{

		//$this->adminBackend('adminarea/repair');
		$data['supplierli'] = $this->um->getData(TBLSUPPLIER);
		$this->adminBackend('adminarea/supplier-list', $data, true);
	}
	public function purchase()
	{
		//$this->adminBackend('adminarea/add-staff');
		$data['purchase'] = $this->um->getData(TBLPURCHASE);
		$this->adminBackend('adminarea/add-purchase', $data, true);
	}
	public function reports()
	{
		$this->adminBackend('adminarea/reports');
	}
	public function purchase_list()
	{

		//$this->adminBackend('adminarea/repair');
		$data['purchaseli'] = $this->um->getData(TBLPURCHASE);
		$this->adminBackend('adminarea/purchase-list', $data, true);
	}


	public function brands()
	{
		$data['brands'] = $this->Md_database->getData(TBLBRAND, '*');
		$this->adminBackend('adminarea/add-brands', $data, true);
	}

	public function add_brands()
	{
		$data = $this->input->post();
		$txt_id = $this->input->post('txt_id');
		unset($data['submit']);
		unset($data['txt_id']);
		unset($data['old_img']);
		$file_location = '';

		if (!empty($_FILES['brand_image']['name'])) {
			$folder = 'uploads/brand_image/';
			if (!file_exists($folder)) {
				mkdir($folder, 0777, true);
			}
			$temp_name = $_FILES['brand_image']['tmp_name'];
			$file_name = $_FILES['brand_image']['name'];
			$file_location = $folder . $file_name;
			move_uploaded_file($temp_name, $file_location);
		} else {
			$file_location = $this->input->post('old_img');
		}

		$check = '';
		if (!empty($txt_id)) {
			$data['brand_image'] = $file_location;
			$data['updated_by'] = $this->session->userdata('UID');
			$check = $this->Md_database->updateData(TBLBRAND, $data, array('id' => $txt_id));
		} else {
			$data['brand_image'] = $file_location;
			$data['created_by'] = $this->session->userdata('UID');
			$check = $this->Md_database->insertData(TBLBRAND, $data);
		}
		if (!empty($check)) {
			$this->session->set_flashdata('success', 'Brand added successfully');
		} else {
			$this->session->set_flashdata('error', 'Unable to add brand');
		}
		redirect($this->agent->referrer(), 'refresh', '301');
	}

	public function edit_brands($id)
	{
		if (!empty($id)) {
			$data['brands'] = $this->Md_database->getData(TBLBRAND, '*');
			$data['edit_brand'] = $this->Md_database->getData(TBLBRAND, 'id,brand_name,brand_image', array('id' => $id));
			if (!empty($data['edit_brand'])) {
				$this->adminBackend('adminarea/add-brands', $data, true);
			} else {
				redirect($this->agent->referrer(), '301', 'refresh');
			}
		}
	}

	public function delete_brands($id)
	{
		if (!empty($id)) {
			$check = $this->Md_database->deleteData(TBLBRAND, array('id' => $id));
			if (!empty($check)) {
				$this->session->set_flashdata('success', 'Brand deleted successfully');
				redirect($this->agent->referrer(), 'refresh', 301);
			} else {
				$this->session->set_flashdata('error', 'Unable to delete');
				redirect($this->agent->referrer(), 'refresh', 301);
			}
		}
	}
	// public function brands_list()
	// {
	// 	$data['brands'] = $this->um->getData(TBLBRAND);
	// 	$this->adminBackend('adminarea/add-brands',$data,true);
	// }

	public function add_product()
	{
		$data = $this->input->post();
		$txt_id = $data['txt_id'];
		unset($data['submit']);
		unset($data['txt_id']);
		if (!empty($txt_id)) {
			$data['updated_by'] = $this->session->userdata('UID');
			$check = $this->Md_database->updateData(TBLPRODUCT, $data, array('id' => $txt_id));
			$msg = 'updated';
		} else {
			$data['created_by'] = $this->session->userdata('UID');
			$check = $this->Md_database->insertData(TBLPRODUCT, $data);
			$msg = 'added';
		}
		if (!empty($check)) {
			$this->session->set_flashdata('success', "Product $msg successfully");
		} else {
			$this->session->set_flashdata('error', 'Unable to add product');
		}
		redirect($this->agent->referrer(), 'refresh', 301);
	}

	public function edit_product($id)
	{
		if (!empty($id)) {
			$data['brand_list'] = $this->Md_database->getData(TBLBRAND, '*');
			$this->db->join(TBLBRAND . ' B', 'B.id = P.brand_name', 'left');
			$data['products'] = $this->Md_database->getData(TBLPRODUCT . ' P', '*,P.id as product_id,B.brand_name as brand');
			$data['edit_data'] = $this->Md_database->getData(TBLPRODUCT, '*', array('id' => $id));
			if (!empty($data['edit_data'])) {
				$this->adminBackend('adminarea/add-product', $data, true);
			} else {
				$this->session->set_flashdata('error', 'Something went wrong');
				redirect($this->agent->referrer(), 'refresh', 301);
			}
		}
	}

	public function delete_product($id)
	{
		if (!empty($id)) {
			$check = $this->Md_database->deleteData(TBLPRODUCT, array('id' => $id));
			if (!empty($check)) {
				$this->session->set_flashdata('success', 'Product deleted successfully');
				redirect($this->agent->referrer(), 'refresh', 301);
			} else {
				$this->session->set_flashdata('error', 'Unable to delete');
				redirect($this->agent->referrer(), 'refresh', 301);
			}
		}
	}

	public function add_staff()
	{
		$data = $this->input->post();
		$txt_id = $data['txt_id'];
		unset($data['submit']);
		unset($data['txt_id']);
		unset($data['old_img']);

		$file_location = '';
		if (!empty($_FILES['profile']['name'])) {
			$folder = 'uploads/staff-profile/';
			if (!file_exists($folder)) {
				mkdir($folder, 0777, true);
			}
			$temp_name = $_FILES['profile']['tmp_name'];
			$file_name = $_FILES['profile']['name'];
			$file_location = $folder . $file_name;
			move_uploaded_file($temp_name, $file_location);
		} else {
			$file_location = $this->input->post('old_img');
		}
		$data['profile'] = $file_location;

		if (!empty($txt_id)) {
			$data['updated_by'] = $this->session->userdata('UID');
			$check = $this->Md_database->updateData(TBL_USERADMIN, $data, array('id' => $txt_id));
			$msg = 'updated';
		} else {
			$data['password'] = md5($this->input->post('password'));
			$data['created_by'] = $this->session->userdata('UID');
			$check = $this->Md_database->insertData(TBL_USERADMIN, $data);
			$msg = 'added';
		}
		if (!empty($check)) {
			$this->session->set_flashdata('success', "Staff $msg successfully");
		} else {
			$this->session->set_flashdata('error', 'Unable to add staff');
		}
		redirect($this->agent->referrer(), 'refresh', '301');
	}

	public function edit_staff($id)
	{
		if (!empty($id)) {
			$data['edit_data'] = $this->Md_database->getData(TBL_USERADMIN, '*', array('id' => $id));
			if (!empty($data['edit_data'])) {
				$this->adminBackend('adminarea/add-staff', $data, true);
			} else {
				$this->session->set_flashdata('error', 'Something went wrong');
				redirect($this->agent->referrer(), 'refresh', '301');
			}
		}
	}

	public function delete_staff($id)
	{
		if (!empty($id)) {
			$check = $this->Md_database->deleteData(TBL_USERADMIN, array('id' => $id));
			if (!empty($check)) {
				$this->session->set_flashdata('success', 'Staff details deleted successfully');
			} else {
				$this->session->set_flashdata('error', 'Unable to delete');
			}
			redirect($this->agent->referrer(), 'refresh', 301);
		}
	}

	public function repair_action()
	{
		$data = $this->input->post();
		$txt_id = $data['txt_id'];
		unset($data['submit']);
		unset($data['txt_id']);
		if (!empty($txt_id)) {
			$data['created_by'] = $this->session->userdata('UID');
			$check = $this->Md_database->updateData(TBLREPAIR, $data, array('id' => $txt_id));
			$msg = 'updated';
		} else {
			$data['updated_by'] = $this->session->userdata('UID');
			$check = $this->Md_database->insertData(TBLREPAIR, $data);
			$msg = 'added';
		}
		if (!empty($check)) {
			$this->session->set_flashdata('success', "Repair details $msg successfully");
		} else {
			$this->session->set_flashdata('error', 'Unable to add repair data');
		}
		redirect('Adminarea/repairs', 'refresh', 301);
	}

	public function edit_repair($id)
	{
		if (!empty($id)) {
			$data['brand_list'] = $this->Md_database->getData(TBLBRAND, 'id,brand_name');
			$data['edit_data'] = $this->Md_database->getData(TBLREPAIR, '*', array('id' => $id));
			$this->db->join(TBLBRAND . ' B', 'B.id = R.brand_name', 'left');
			$data['repairs'] = $this->Md_database->getData(TBLREPAIR . ' R', '*,R.id as repair_id,B.brand_name as brand');
			if (!empty($data['edit_data'])) {
				$this->adminBackend('adminarea/repair', $data, true);
			} else {
				$this->session->set_flashdata('error', 'Something went wrong');
				redirect($this->agent->referrer(), 'refresh', 301);
			}
		}
	}

	public function delete_repair($id)
	{
		if (!empty($id)) {
			$check = $this->Md_database->deleteData(TBLREPAIR, array('id' => $id));
			if (!empty($check)) {
				$this->session->set_flashdata('success', 'Repair details deleted successfully');
			} else {
				$this->session->set_flashdata('error', 'Unable to delete');
			}
			redirect($this->agent->referrer(), 'refresh', 301);
		}
	}

	public function add_sale()
	{
		$data = $this->input->post();
		$txt_id = $data['txt_id'];
		unset($data['submit']);
		unset($data['txt_id']);

		if (!empty($txt_id)) {
			$data['updated_by'] = $this->session->userdata('UID');
			$check = $this->Md_database->updateData(TBLSALE, $data, array('id' => $txt_id));
			$msg = 'updated';
		} else {
			$data['created_by'] = $this->session->userdata('UID');
			$check = $this->Md_database->insertData(TBLSALE, $data);
			$msg = 'added';
		}
		if (!empty($check)) {
			$this->session->set_flashdata('success', "Sales details $msg successfully");
		} else {
			$this->session->set_flashdata('error', 'Unable to save details');
		}
		redirect($this->agent->referrer(), 'refresh', 301);
	}

	public function edit_sale($id)
	{
		$data['brands'] = $this->Md_database->getData(TBLBRAND, '*');
		$data['product'] = $this->Md_database->getData(TBLPRODUCT, '*');
		$data['sale'] = $this->Md_database->getData(TBLSALE, '*');
		$data['edit_data'] = $this->Md_database->getData(TBLSALE, '*', array('id' => $id));
		if (!empty($data['edit_data'])) {
			$this->adminBackend('adminarea/add-sale', $data, true);
		} else {
			$this->session->set_flashdata('error', 'Something went wrong');
			redirect($this->agent->referrer(), 'refresh', 301);
		}
	}

	public function delete_sale($id)
	{
		if (!empty($id)) {
			$check = $this->Md_database->deleteData(TBLSALE, array('id' => $id));
			if (!empty($check)) {
				$this->session->set_flashdata('success', 'Sale details deleted successfully');
			} else {
				$this->session->set_flashdata('error', 'Unable to delete');
			}
			redirect($this->agent->referrer(), 'refresh', 301);
		}
	}

	public function add_supplier()
	{
		$data = $this->input->post();
		$txt_id = $data['txt_id'];
		unset($data['submit']);
		unset($data['txt_id']);
		$check = '';
		if (!empty($txt_id)) {
			$data['updated_by'] = $this->session->userdata('UID');
			$check = $this->Md_database->updateData(TBLSUPPLIER, $data, array('id' => $txt_id));
			$msg = 'updated';
		} else {
			$data['created_by'] = $this->session->userdata('UID');
			$check = $this->Md_database->insertData(TBLSUPPLIER, $data);
			$msg = 'added';
		}
		if (!empty($check)) {
			$this->session->set_flashdata('success', "Supplier $msg successfully");
		} else {
			$this->session->set_flashdata('success', 'Unable to save supplier');
		}
		redirect('Adminarea/supplier', 'refresh', 301);
	}

	public function edit_supplier($id)
	{
		if (!empty($id)) {
			$data['supplier'] = $this->Md_database->getData(TBLSUPPLIER, '*');
			$data['edit_data'] = $this->Md_database->getData(TBLSUPPLIER, '*', array('id' => $id));
			if (!empty($data['edit_data'])) {
				$this->adminBackend('adminarea/add-supplier', $data, true);
			} else {
				$this->session->set_flashdata('error', 'Something went wrong');
				redirect($this->agent->referrer(), 'refresh', 301);
			}
		}
	}

	public function delete_supplier($id)
	{
		if (!empty($id)) {
			$check = $this->Md_database->deleteData(TBLSUPPLIER, array('id' => $id));
			if (!empty($check)) {
				$this->session->set_flashdata('success', 'Supplier deleted successfully');
				redirect($this->agent->referrer(), 'refresh', 301);
			} else {
				$this->session->set_flashdata('error', 'Unable to delete');
				redirect($this->agent->referrer(), 'refresh', 301);
			}
		}
	}
	public function add_purchase()
	{
		$data = $this->input->post();
		unset($data['submit']);
		$check = $this->um->insertData(TBLPURCHASE, $data);
		if (!empty($check)) {
			redirect('Adminarea/purchase', 'refresh', 301);
		} else {
			redirect('Adminarea/purchase', 'refresh', 301);
		}
	}
}
