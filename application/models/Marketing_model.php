<?php

class Marketing_model extends CI_Model
{

    var $customer_column_order = array(null,'id_blog','header','content','create_date'); //set column field database for datatable orderable
    var $customer_column_search = array('id_blog','header','content','create_date'); //set column field database for datatable searchable



    private function _getdatatables_Marketing()
    {
        $this->db->select('*');
        $this->db->from('blog');
        // $this->db->order_by('Marketing','ASC');
        



        $i = 0;

        if (@$_POST['search']['value']) {
            foreach ($this->customer_column_search as $item) {
                if ($i === 0) {
                    $this->db->group_start()
                        ->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }
                if (count($this->customer_column_search) - 1 == $i) {
                    $this->db->group_end();
                }
                $i++;
            }
        }

        if (isset($_POST['order'])) {
            $this->db->order_by($this->customer_column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } elseif (isset($this->order)) {
            $customer_order = $this->order;
            $this->db->order_by(key($customer_order), $customer_order[key($customer_order)]);
        }
    }

    function getdatatables_Marketing()
    {
        $this->_getdatatables_Marketing();
        if (@$_POST['length'] != -1)
            $this->db->limit(@$_POST['length'], @$_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function count_filtered_Marketing()
    {
        $this->_getdatatables_Marketing();
        $query = $this->db->get();
        return $query->num_rows();
    }
  
    function count_all_Marketing()
    {
    
        $this->db->select('*');
        $this->db->from('products');
        return $this->db->count_all_results();
    }

  

    function _delete_Marketing($id_product){
        try{            
            $this->db->where('id_product', $id_product);
            $this->db->delete('products');
            return TRUE;
        }catch (Exception $e) {
        echo 'Error' . $e->getMessage();
        return FALSE;
        }
        
    }
    function _edit_Marketing($id_product,$user_data){
        try{            
            $this->db->where('id_product', $id_product);
            $this->db->update('products', $user_data);
            return TRUE;
        }catch (Exception $e) {
        echo 'Error' . $e->getMessage();
        return FALSE;
        }        
    }
    
    function _add_content($content){
        try{                        
            $this->db->insert('blog', $content);
            
            return TRUE;
        }catch (Exception $e) {
        echo 'Error' . $e->getMessage();
        return FALSE;
        }
        
    }
    

}

?>