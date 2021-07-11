<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Datatable extends MY_Controller
{

    public function index()
    {
        $this->session->set_flashdata('error', 'Opps..! Something went wrong');
        redirect($this->agent->referrer());
    }

    public function get_supplier_table()
    {
        if (!$this->input->is_ajax_request()) {
            exit('No direct script access allowed');
        } else {
            $draw       = intval($this->input->post("draw"));
            $questions  = $this->getSupplierDataTableData($is_get_total_record = FALSE);
            $data       = array();
            $start = intval($this->input->post("start"));
            foreach ($questions as $index => $rows) {

                $data[] = array(
                    ($start + 1),
                    $rows->name,
                    $rows->address,
                    $rows->email,
                    $rows->mobile,
                    '<a href="' . base_url('edit-supplier/' . $rows->id) . '"><button type="button" class="btn btn-xs btn-warning" data-toggle="tootltip" title="Edit"><i class="fa fa-pencil"></i></button></a>
                    <a onclick="return delete_record()" href="' . base_url('delete-supplier' . $rows->id) . '"><button type="button" class="btn btn-xs btn-danger" data-toggle="tootltip" title="Delete"><i class="fa fa-trash"></i></button></a>',
                );
                $start++;
            }
            $total_employees = $this->getSupplierDataTableData(TRUE);
            $output = array(
                "draw" => $draw,
                "recordsTotal" => $total_employees,
                "recordsFiltered" => $total_employees,
                "data" => $data
            );
            echo json_encode($output);
            exit();
        }
    }

    public function getSupplierDataTableData($is_get_total_record = FALSE)
    {
        $start = intval($this->input->post("start"));
        $length = intval($this->input->post("length"));
        $order = $this->input->post("order");
        $search = $this->input->post("search");
        $search = $search['value'];
        $col = 0;
        $dir = "";
        if (!empty($order)) {
            foreach ($order as $o) {
                $col = $o['column'];
                $dir = $o['dir'];
            }
        }

        if ($dir != "asc" && $dir != "desc") {
            $dir = "asc";
        }

        $valid_columns = array(
            0 => 'S.id',
            1 => 'S.name',
            2 => 'S.address',
            3 => 'S.email',
            4 => 'S.mobile',
        );

        if (!isset($valid_columns[$col])) {
            $order = null;
        } else {
            $order = $valid_columns[$col];
        }

        if ($order != null) {
            // $this->db->order_by($order, $dir);
            $this->db->order_by('id', 'asc');
        }

        if (!empty($search)) {
            $this->db->group_start();
            $this->db->where("S.name LIKE '%$search%'");
            $this->db->or_where("S.address LIKE '%$search%'");
            $this->db->or_where("S.email LIKE '%$search%'");
            $this->db->or_where("S.mobile LIKE '%$search%'");
            $this->db->group_end();
        }

        if ($this->input->get("from_date") && !empty($this->input->get("from_date"))) {
            $this->db->where('DATE(S.created_at)>=', date("Y-m-d", strtotime($this->input->get("from_date"))));
        }

        if ($this->input->get("to_date") && !empty($this->input->get("to_date"))) {
            $this->db->where('DATE(S.created_at)<=', date("Y-m-d", strtotime($this->input->get("to_date"))));
        }

        $this->db->select('S.id,S.name,S.address,S.email,S.mobile,S.created_at');
        $this->db->from(TBLSUPPLIER . ' S');
        if ($is_get_total_record == TRUE) {
            return $this->db->get()->num_rows();
        } else {
            $this->db->limit($length, $start);
            return $this->db->get()->result();
        }
    }

    public function get_product_list_data()
    {
        if (!$this->input->is_ajax_request()) {
            exit('No direct script access allowed');
        } else {
            $draw       = intval($this->input->post("draw"));
            $questions  = $this->getProductDataTableData($is_get_total_record = FALSE);
            $data       = array();
            $start = intval($this->input->post("start"));
            foreach ($questions as $index => $rows) {
                $onclick = 'onclick="return delete_record()"';
                $data[] = array(
                    ($start + 1),
                    date('d M, Y', strtotime($rows->created_at)),
                    $rows->brand,
                    $rows->product_name,
                    $rows->ram,
                    $rows->internal_storage,
                    $rows->battery_capacity,
                    $rows->os,
                    $rows->network_type,
                    $rows->screen_size,
                    $rows->primary_camera,
                    $rows->secondary_camera,
                    $rows->mrp,
                    $rows->sale_price,
                    '<a href="' . base_url('edit-product/' . $rows->id) . '"><button type="button" class="btn btn-xs btn-warning" data-toggle="tootltip" title="Edit"><i class="fa fa-pencil"></i></button></a>
                    <a href="' . base_url('delete-product/' . $rows->id) . '" "' . $onclick . '"><button type="button" class="btn btn-xs btn-danger" data-toggle="tootltip" title="Delete"><i class="fa fa-trash"></i></button></a>',
                );
                $start++;
            }
            $total_employees = $this->getProductDataTableData(TRUE);
            $output = array(
                "draw" => $draw,
                "recordsTotal" => $total_employees,
                "recordsFiltered" => $total_employees,
                "data" => $data
            );
            echo json_encode($output);
            exit();
        }
    }

    public function getProductDataTableData($is_get_total_record = FALSE)
    {
        $start = intval($this->input->post("start"));
        $length = intval($this->input->post("length"));
        $order = $this->input->post("order");
        $search = $this->input->post("search");
        $search = $search['value'];
        $col = 0;
        $dir = "";
        if (!empty($order)) {
            foreach ($order as $o) {
                $col = $o['column'];
                $dir = $o['dir'];
            }
        }

        if ($dir != "asc" && $dir != "desc") {
            $dir = "asc";
        }

        $valid_columns = array(
            0 => 'S.id',
            1 => 'S.created_at',
            2 => 'S.brand_name',
            3 => 'S.product_name',
            4 => 'S.ram',
            5 => 'S.internal_storage',
            6 => 'S.battery_capacity',
            7 => 'S.os',
            8 => 'S.network_type',
            9 => 'S.screen_size',
            10 => 'S.primary_camera',
            11 => 'S.secondary_camera',
            12 => 'S.primary_camera',
            13 => 'S.mrp',
            14 => 'S.sale_price',

        );

        if (!isset($valid_columns[$col])) {
            $order = null;
        } else {
            $order = $valid_columns[$col];
        }

        if ($order != null) {
            // $this->db->order_by($order, $dir);
            $this->db->order_by('id', 'asc');
        }

        if (!empty($search)) {
            $this->db->group_start();
            $this->db->where("B.brand_name LIKE '%$search%'");
            $this->db->or_where("P.product_name LIKE '%$search%'");
            $this->db->group_end();
        }

        if ($this->input->get("brand_name") && !empty($this->input->get("brand_name"))) {
            $this->db->where('P.brand_name', $this->input->get("brand_name"));
        }

        if ($this->input->get("product_name") && !empty($this->input->get("product_name"))) {
            $this->db->where('P.id', $this->input->get("product_name"));
        }

        if ($this->input->get("from_date") && !empty($this->input->get("from_date"))) {
            $this->db->where('DATE(P.created_at)>=', date("Y-m-d", strtotime($this->input->get("from_date"))));
        }

        if ($this->input->get("to_date") && !empty($this->input->get("to_date"))) {
            $this->db->where('DATE(P.created_at)<=', date("Y-m-d", strtotime($this->input->get("to_date"))));
        }

        $this->db->select('P.id,B.brand_name as brand,P.created_at,P.product_name,P.ram,P.internal_storage,P.battery_capacity,P.os,P.network_type,P.screen_size,P.primary_camera,P.secondary_camera,P.mrp,P.sale_price');
        $this->db->from(TBLPRODUCT . ' P');
        $this->db->join(TBLBRAND . ' B', 'B.id = P.brand_name', 'left');
        if ($is_get_total_record == TRUE) {
            return $this->db->get()->num_rows();
        } else {
            $this->db->limit($length, $start);
            return $this->db->get()->result();
        }
    }

    public function get_staff_table()
    {
        if (!$this->input->is_ajax_request()) {
            exit('No direct script access allowed');
        } else {
            $draw       = intval($this->input->post("draw"));
            $questions  = $this->getStaffDataTableData($is_get_total_record = FALSE);
            $data       = array();
            $start = intval($this->input->post("start"));
            foreach ($questions as $index => $rows) {

                $data[] = array(
                    ($start + 1),
                    $rows->staff_name,
                    $rows->user_name,
                    $rows->address,
                    $rows->mobile_number,
                    $rows->email,
                    '<a href="' . base_url('edit-staff/' . $rows->id) . '"><button type="button" class="btn btn-xs btn-warning" data-toggle="tootltip" title="Edit"><i class="fa fa-pencil"></i></button></a>
                    <a href="' . base_url('delete-staff/' . $rows->id) . '"><button type="button" class="btn btn-xs btn-danger" data-toggle="tootltip" title="Delete"><i class="fa fa-trash"></i></button></a>',
                );
                $start++;
            }
            $total_employees = $this->getStaffDataTableData(TRUE);
            $output = array(
                "draw" => $draw,
                "recordsTotal" => $total_employees,
                "recordsFiltered" => $total_employees,
                "data" => $data
            );
            echo json_encode($output);
            exit();
        }
    }

    public function getStaffDataTableData($is_get_total_record = FALSE)
    {
        $start = intval($this->input->post("start"));
        $length = intval($this->input->post("length"));
        $order = $this->input->post("order");
        $search = $this->input->post("search");
        $search = $search['value'];
        $col = 0;
        $dir = "";
        if (!empty($order)) {
            foreach ($order as $o) {
                $col = $o['column'];
                $dir = $o['dir'];
            }
        }

        if ($dir != "asc" && $dir != "desc") {
            $dir = "asc";
        }

        $valid_columns = array(
            0 => 'UA.id',
            1 => 'UA.staff_name',
            2 => 'UA.user_name',
            3 => 'UA.address',
            4 => 'UA.mobile_number',
            5 => 'UA.email',
        );

        if (!isset($valid_columns[$col])) {
            $order = null;
        } else {
            $order = $valid_columns[$col];
        }

        if ($order != null) {
            // $this->db->order_by($order, $dir);
            $this->db->order_by('id', 'asc');
        }

        if (!empty($search)) {
            $this->db->group_start();
            $this->db->where("UA.staff_name LIKE '%$search%'");
            $this->db->or_where("UA.user_name LIKE '%$search%'");
            $this->db->or_where("UA.address LIKE '%$search%'");
            $this->db->or_where("UA.mobile_number LIKE '%$search%'");
            $this->db->or_where("UA.email LIKE '%$search%'");
            $this->db->group_end();
        }

        if ($this->input->get("from_date") && !empty($this->input->get("from_date"))) {
            $this->db->where('DATE(UA.created_at)>=', date("Y-m-d", strtotime($this->input->get("from_date"))));
        }

        if ($this->input->get("to_date") && !empty($this->input->get("to_date"))) {
            $this->db->where('DATE(UA.created_at)<=', date("Y-m-d", strtotime($this->input->get("to_date"))));
        }

        $this->db->select('UA.id,UA.staff_name,UA.user_name,UA.address,UA.mobile_number,UA.email,UA.created_at');
        $this->db->from(TBL_USERADMIN . ' UA');
        $this->db->where('UA.user_type', 'staff');
        if ($is_get_total_record == TRUE) {
            return $this->db->get()->num_rows();
        } else {
            $this->db->limit($length, $start);
            return $this->db->get()->result();
        }
    }
}
