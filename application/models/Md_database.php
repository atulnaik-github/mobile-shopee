<?php

class Md_database extends CI_Model {

    function __construct() {
        parent::__construct();
        //date_default_timezone_set('Asia/kabul');
        date_default_timezone_set('Asia/Kolkata');
    }

    //function for inserting data into database
    public function insertData($table, $data) {
        $this->db->insert($table, $data);
        $this->db->trans_complete();
        return $this->db->insert_id();
    }

    //function for inserting batch data into database
    public function insertDataBatch($table, $data) {
        $this->db->insert_batch($table, $data);
        $this->db->trans_complete();
        return $this->db->trans_status();
    }

    //function for delete data into database
    public function deleteData($table, $condition) {
        $this->db->where($condition);
        $this->db->delete($table);
        $this->db->trans_complete();
        return $this->db->trans_status();
    }

    //function for  data fetching data from database
    public function getData($table, $fields = '', $condition = '', $order_by = '', $limit = '') {
        $str_sql = '';
        if (is_array($fields)) {
            #$fields passed as array
            $str_sql .= implode(",", $fields);
        } elseif ($fields != "") {
            #$fields passed as string
            $str_sql .= $fields;
        } else {
            #$fields passed blank
            $str_sql .= '*';  
        }
        $this->db->select($str_sql);
        #$condition passed as array
        if (is_array($condition)) {  
            if (count($condition) > 0) {
                foreach ($condition as $field_name => $field_value) {
                    if ($field_name != '' && $field_value != '') {
                        $this->db->where($field_name, $field_value);
                    }
                }
            }
        } else if ($condition != "") { #$condition passed as string
            $this->db->where($condition);
        }
        if ($limit != "")
            $this->db->limit($limit);#limit is not blank

        if (is_array($order_by)) {
            $this->db->order_by($order_by[0], $order_by[1]);  #$order_by is not blank
        } else if ($order_by != "") {
            $this->db->order_by($order_by);  #$order_by is not blank
        }
        $this->db->from($table);  #getting record from table name passed
        $query = $this->db->get();

        return $query->result_array();
    }

    //code to get data useing common function in object form
    public function getDataObject($table, $fields = '', $condition = '', $order_by = '', $limit = '') {
        $str_sql = '';
        if (is_array($fields)) {
            #$fields passed as array
            $str_sql .= implode(",", $fields);
        } elseif ($fields != "") {
            #$fields passed as string
            $str_sql .= $fields;
        } else {
            $str_sql .= '*';  #$fields passed blank
        }
        $this->db->select($str_sql);
        if (is_array($condition)) {  #$condition passed as array
            if (count($condition) > 0) {
                foreach ($condition as $field_name => $field_value) {
                    if ($field_name != '' && $field_value != '') {
                        $this->db->where($field_name, $field_value);
                    }
                }
            }
        } else if ($condition != "") { #$condition passed as string
            $this->db->where($condition);
        }
        if ($limit != "")
            $this->db->limit($limit);#limit is not blank

        if (is_array($order_by)) {
            $this->db->order_by($order_by[0], $order_by[1]);  #$order_by is not blank
        } else if ($order_by != "") {
            $this->db->order_by($order_by);  #$order_by is not blank
        }
        $this->db->from($table);  #getting record from table name passed
        $query = $this->db->get();

        return $query->num_rows() ? $query->result() : false;
    }

    //end of getDataObject()
    //function for updating data into database
    public function updateData($table, $data, $condition) {
        $this->db->where($condition);
        $this->db->update($table, $data);
        $this->db->trans_complete();
        return $this->db->trans_status();
    }

    public function sendEmail($recipeinets, $from, $subject, $message) {
        $config['protocol'] = 'mail';
        $config['wordwrap'] = FALSE;
        $config['mailtype'] = 'html';
        $config['charset'] = 'utf-8';
        $config['crlf'] = "\r\n";
        $config['newline'] = "\r\n";
        $this->load->library('email', $config);
        $this->email->initialize($config);

        // set the from address
        $this->email->from(stripslashes($from['email']), $from['name']);
        // set the subject
        $this->email->subject($subject);
        // set recipeinets
        $this->email->to($recipeinets);

        // set mail message
        $this->email->message($message);

        // return boolean value for email send

        // if($this->email->send()){
        //     echo 'sent';
        // }else{
        //     echo $this->email->print_debugger();
        // }
        
        return $this->email->send();
    }

    public function uploadFile($path, $type, $file_name, $error_msg, $new_name) {

        if (!is_dir($path)) {
            mkdir($path, 0777, TRUE);            
        }
        
        $config['upload_path'] = $path; //'uploads/superadmin/';
        $config['allowed_types'] = $type; //'gif|jpg|png|jpeg';
        $config['max_width'] = 0;
        $config['max_height'] = 0;
        $config['max_size'] = 0;
        $config['encrypt_name'] = false;
        $config['file_name'] = $new_name;
        $config['overwrite'] = true;
        $this->load->library('upload');
        $this->upload->initialize($config);

        if (!$this->upload->do_upload($file_name)) {
            $error = $this->upload->display_errors();
                // $this->session->set_flashdata('error', $error_msg . " : " . $error);
                // redirect($_SERVER['HTTP_REFERER']);
        } else {
            $upload_data = $this->upload->data()['file_name'];
        }

        if (!empty($upload_data)) {
            // chmod($upload_data['full_path'], 0755);
            return $upload_data;
        } else {
            return 0;
        }
    }
   public function uploadImageFile($path, $type, $file_name, $error_msg, $new_name) {

        if (!is_dir($path)) {
            mkdir($path, 0777, TRUE);            
        }

        $config['upload_path'] = $path; //'uploads/superadmin/';
        $config['allowed_types'] = $type; //'gif|jpg|png|jpeg';
        $config['max_width'] = 0;
        $config['max_height'] = 0;
        $config['max_size'] = 0;
        $config['encrypt_name'] = false;
        $config['file_name'] = $new_name;
        $config['overwrite'] = true;

        $this->load->library('upload');
        $this->upload->initialize($config);
        if (!$this->upload->do_upload($file_name)) {

            $error = $this->upload->display_errors();
            $this->session->set_flashdata('error', $error_msg . " : " . $error);
            // redirect($_SERVER['HTTP_REFERER']);
        } else {

            $upload = $this->upload->data();
            $upload_data[] = $upload['file_name'];
        }
        if (!empty($upload_data)) {
            //   chmod($upload_data['full_path'], 0777);
            return $upload_data;
        } else {
            return 0;
        }
    }

    public function multiUploadFile($path, $type, $file_name, $error_msg, $new_name) {

        $upload_data = array();
        $new_name = uniqid();

        foreach ($_FILES[$file_name]['name'] as $key => $img) {

            $_FILES['userfile']['name'] = $_FILES[$file_name]['name'][$key];
            $_FILES['userfile']['type'] = $_FILES[$file_name]['type'][$key];
            $_FILES['userfile']['tmp_name'] = $_FILES[$file_name]['tmp_name'][$key];
            $_FILES['userfile']['error'] = $_FILES[$file_name]['error'][$key];
            $_FILES['userfile']['size'] = $_FILES[$file_name]['size'][$key];

            $config['upload_path'] = $path; //'uploads/superadmin/';
            $config['allowed_types'] = $type; //'gif|jpg|png|jpeg';
            $config['max_width'] = 0;
            $config['max_height'] = 0;
            $config['max_size'] = 0;
            $config['encrypt_name'] = false;
            $config['file_name'] = $new_name . '_' . $key;
            $config['overwrite'] = false;
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('userfile')) {
                $error = $this->upload->display_errors();
                // $this->session->set_flashdata('error', $error_msg . " : " . $error);
                // redirect($_SERVER['HTTP_REFERER']);
            } else {
                $upload = $this->upload->data();
                $upload_data[] = $upload['file_name'];
            }
        }

        if (!empty($upload_data)) {
            // chmod($upload_data['full_path'], 0755);
            return $upload_data;
        } else {
            return 0;
        }
    }
    // end of uploadFile()



    public function coreQuery($query) {
        $res = $this->db->query("$query");
        return $res->result_array();
    }

    public function do_resize($sorcePath, $photoDoc, $tarPath, $height, $width, $thumb_no) {
        $filename = $this->input->post('new_val');
        $source_path = FCPATH . $sorcePath . $photoDoc;
        $target_path = FCPATH . $tarPath;
        $config_manip = array('image_library' => 'gd2',
            'source_image' => $source_path,
            'new_image' => $target_path,
            'maintain_ratio' => FALSE,
            'create_thumb' => TRUE,
            'thumb_marker' => '_thumb'.$thumb_no.'',
            'width' => $width,
            'height' => $height);

        $newNAme = str_replace('.', '_thumb'.$thumb_no.'.', $photoDoc);
        //$this->load->library('image_lib', $config_manip);

        $this->load->library('image_lib');
        $this->image_lib->initialize($config_manip);

        if (!$this->image_lib->resize()) {
            echo $this->image_lib->display_errors();
        } else {
//            (file_exists($source_path)) ? unlink($source_path) : "";
            return $newNAme;
        }
        $this->image_lib->clear();
    }

    public function getEmailInfo($email_title, $reserved_words) {
// gather information for database table
        $email_data = $this->getData('temp_static_email_format', '', array("email_title" => $email_title));
        $content = !empty($email_data[0]['email_content']) ? $email_data[0]['email_content'] : "";
        $subject = !empty($email_data[0]['email_subject']) ? $email_data[0]['email_subject'] : "";

// replace reserved words if any
        foreach ($reserved_words as $k => $v) {
            $content = str_replace($k, $v, $content);
        }
        return array("subject" => $subject, "content" => $content);
    }

    public function sendSMTPEmail($recipeinets, $from, $subject, $message) {
        $config['protocol'] = 'ssmtp';
        $config['wordwrap'] = TRUE;
        $config['mailtype'] = 'html';
        $config['charset'] = 'utf-8';
        $config['crlf'] = "\r\n";
        $config['smtp_host'] = SMTP_SERVER_NAME;
        $config['smtp_user'] = SMTP_USERNAME;
        $config['smtp_pass'] = SMTP_PASSWORD;
        $config['smtp_port'] = SMTP_PORT;
        $config['newline'] = "\r\n";
        $config['smtp_crypto'] = 'ssl';
        $this->load->library('email', $config);
        $this->email->initialize($config);
        $this->email->from($from['email'], $from['name']);
        $this->email->subject($subject);
        $this->email->to($recipeinets);
        $this->email->message($message);
         if($this->email->send()){
            return $this->email->send();
         }else{
             echo $this->email->print_debugger();
         }

        
    }

    public function download_pdf($name = 'download', $html = '') {
            $this->load->library('M_pdf');
            $mpdf = new mPDF();
            $mpdf->AddPage('P', // L - landscape, P - portrait
                    '', '', '', '', 4, // margin_left
                    4, // margin right
                    4, // margin top
                    4, // margin bottom
                    4, // margin header
                    4); // margin footer
            //            die;
            ob_clean();
            $mpdf->allow_charset_conversion = true;
    //        $mpdf->charset_in = 'UTF-8';
    //        $mpdf->charset_in = 'ISO-8859-2';
            $mpdf->SetDisplayMode('fullpage');

    //        $mpdf->showWatermarkImage = true;
    //        $mpdf->SetWatermarkImage(base_url() . 'AdminMedia/images/water-mark.png', 0.15, 'F');
            $mpdf->WriteHTML($html);

            $mpdf->Output("$name", 'D'); //D-download,I=View
    }
    public function sendSMS($message, $mobile_no) {
        $message = urlencode($message);

        // $url='http://103.233.76.120/api/mt/SendSMS?user=MPLUSSOFT&password=mplus@123456&senderid=MPSOFT&channel=Trans&DCS=0&flashsms=0&number='.$mobile_no.'&text='.$message.'&route=6';

        // $url='http://www.msg247.in/api/mt/SendSMS?user=daulatram&password=rohit@12&senderid=WEBSMS&channel=Trans&DCS=0&flashsms=0&number='.$mobile_no.'&text='.$message.'&route=6';
        
        // $url='http://www.msg247.in/api/mt/SendSMS?user='.SMS_USER_NAME.'&password='.SMS_PASSWORD.'&senderid='.SMS_SENDER_ID.'&channel=Trans&DCS=0&flashsms=0&number='.$mobile_no.'&text='.$message.'&route=6';

        // $url='http://103.233.76.120/api/mt/SendSMS?user=daulatramotp&password=Daulatram@4321&senderid=DBASKT&channel=Trans&DCS=0&flashsms=0&number='.$mobile_no.'&text='.$message.'&route=6';
        
        //$url='http://103.233.76.120/api/mt/SendSMS?user=daulatramotp&password=Daulatram@4321&senderid=DBSKET&channel=Trans&DCS=0&flashsms=0&number='.$mobile_no.'&text='.$message.'&route=34';
        
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $contents = curl_exec($ch);
        $return_val = curl_close($ch);
        return $return_val;
    }
    public function sendPushNotification($messageData,$target){
        /*[start: push notification code]*/   
        //FCM API end-point
        $url = 'https://fcm.googleapis.com/fcm/send';
        //api_key available in Firebase Console -> Project Settings -> CLOUD MESSAGING -> Server key
        $server_key = FCM_SERVER_KEY;//PASTE_YOUR_SERVER_KEY_HERE

        $fields = array();
       // $data1=array('message' => 'Assigned delivery Boy to pickup courier','title'=>'Assigned delivery Boy to pickup','order_id'=>$order_id,'redirecttype'=>'pickup');
        $jdata=array('msg'=>json_encode($messageData));
        $fields['data'] = $jdata;
        //$target=$userData['0']['token'];
        if(is_array($target)){
        $fields['registration_ids'] = $target;
        }else{
        $fields['to'] = $target;
        }
        //header with content_type api key
        $headers = array(
        'Content-Type:application/json',
        'Authorization:key='.$server_key
        );
        //CURL request to route notification to FCM connection server (provided by Google)           
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
        $result = curl_exec($ch);
        // print_r($result);die;
        if ($result === FALSE) {
        //die('Oops! FCM Send Error: ' . curl_error($ch));
        }
        curl_close($ch);
        /*[End: push notification code]*/ 
    }

              public function sendPushNotificationDB($messageData,$target){
        /*[start: push notification code]*/   
        //FCM API end-point
        $url = 'https://fcm.googleapis.com/fcm/send';
        //api_key available in Firebase Console -> Project Settings -> CLOUD MESSAGING -> Server key
        $server_key = FCM_SERVER_KEY_DB;//PASTE_YOUR_SERVER_KEY_HERE

        $fields = array();
       // $data1=array('message' => 'Assigned delivery Boy to pickup courier','title'=>'Assigned delivery Boy to pickup','order_id'=>$order_id,'redirecttype'=>'pickup');
        $jdata=array('msg'=>json_encode($messageData));
        $fields['data'] = $jdata;
        //$target=$userData['0']['token'];
        if(is_array($target)){
        $fields['registration_ids'] = $target;
        }else{
        $fields['to'] = $target;
        }
        //header with content_type api key
        $headers = array(
        'Content-Type:application/json',
        'Authorization:key='.$server_key
        );
        //CURL request to route notification to FCM connection server (provided by Google)           
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
        $result = curl_exec($ch);
        // print_r($result);die;
        if ($result === FALSE) {
        //die('Oops! FCM Send Error: ' . curl_error($ch));
        }
        curl_close($ch);
        /*[End: push notification code]*/ 
    }

    public function getValById($id,$table,$colm){
        $this->db->select($colm);
        $this->db->where('pk_id', $id);
        $result=$this->db->get($table)->result_array();
        
        return $result[0][$colm];
    }

    public function getValByCol($val,$wcol,$table,$colm){
        $this->db->select($colm);
        $this->db->where($wcol, $val);
        $result=$this->db->get($table)->result_array();
        
        return $result[0][$colm];
    }

    // this will show the time of messeges
    function created_before($created_at){

        $date1 = !empty($created_at) ? date('Y-m-d',strtotime($created_at)) : '';
        $date2 = date('Y-m-d');

        $diff = abs(strtotime($date2) - strtotime($date1));
        $years = floor($diff / (365*60*60*24));
        $months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
        $days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));

        $prefix ="";
        if(!empty($years) || !empty($months) || !empty($days)){
            $prefix= " Ago";
        }else if($date1 == $date2){
            $prefix= "Today";
        }

        if(!empty($years) && !empty($months)){
            return $years." Years ".$months." Months ".$prefix;
        }else if(!empty($years)){

            return $years." Years ".$prefix;
        }else if(!empty($months) && !empty($days)){

            return $months." Months ".$days." Days ".$prefix;
        }else if(!empty($months)){

            return $months." Months ".$prefix;
        }else if(!empty($days)){
            return $days." Days ".$prefix;
        }else if($date1 == $date2){
            return "Today";
        }

    }

    // counting all
    public function countAllResult($table, $condition='', $like='')
    {
        if(!empty($like)){
            $this->db->like($like);
        }

        if(!empty($condition)){
            $this->db->where($condition);
        }

        $this->db->from($table);
        return $this->db->count_all_results();   
    }

}
