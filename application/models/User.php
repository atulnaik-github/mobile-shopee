<?php
/**
 * 
 */
class User extends CI_model {
	
	public function __construct() {
        parent::__construct();
    }

    public function insertData($table,$data)
    {
        $this->db->insert($table,$data);
        return $this->db->insert_id();
    }



    public function getData($table,$condition='')
    {
        if (!empty($condition)) {
            $this->db->where($condition);
        }
        return $this->db->get($table)->result_array();
        return transaction_status();

    }

    public function get_students()
    {
        $this->db->from('user');                    
        // return $this->db->get()->result();
        return $this->db->get()->result_array();
    }

    public function get_user_by_id($user_id)
    {
        $query = $this->db->get_where('user', array('id' =>  $user_id));
        return $query;
    }

    public function get_user()
    {
        $query = $this->db->get('user');
        return $query;  
    }

    public function update_user($table,$data,$condition)
    {
        
        $this->db->trans_start();
        $this->db->where($condition);
        $this->db->update($table, $data);
        if ($this->db->trans_complete()) {
            return true;
        } else {
            return false;
        }

    }

     public function modify($table='', $para = array(), $data = array())
      {
        try {
            $this->db->trans_start();
            $columns = "";
            $fields = $this->db->list_fields($table);
            $columns = array_diff($fields, array('is_deleted', 'modified_on'));
            $fields = "";
            $fields = implode(',', $columns);
            
            foreach($para as $field => $value){
                $this->db->where($para);
            }        
            $this->db->update($table,$data);          
            if ($this->db->trans_complete()) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            log_message('error:',$e->getMessage());
            return false;
        }
    }

     public function deleteAll($table, $para = array()){        

        try {
            if (is_array($para)) {
                $this->db->where_in('id',$para['id']);
            }else{
                $this->db->where('id',$para['id']);
            }
            //DELETE FROM tbl_user WHERE id = $id 
            $query = $this->db->delete($table);
            return $query?true:false;
            
            $db_error = $this->db->error();
            if (!empty($db_error)) {
                throw new Exception('Database error!'.$db_error['code'].'Error'.$db_error['message']);
                return false;
            }

        } catch (Exception $e){            
            log_message('error:',$e->getMessage());
            return false;
        }    
    }


	
}


?>