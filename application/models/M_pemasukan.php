<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_pemasukan extends CI_Model {

   // Get DataTable data
   function getUsers($postData=null){

     $response = array();

     ## Read value
     $draw = $postData['draw'];
     $start = $postData['start'];
     $rowperpage = $postData['length']; // Rows display per page
     $columnIndex = $postData['order'][0]['column']; // Column index
     $columnName = $postData['columns'][$columnIndex]['data']; // Column name
     $columnSortOrder = $postData['order'][0]['dir']; // asc or desc
     $searchValue = $postData['search']['value']; // Search value

     // Custom search filter 
     $searchJenis = $postData['searchJenis'];
   

     ## Search 
     $search_arr = array();
     $searchQuery = "";
     if($searchValue != ''){
        $search_arr[] = " (pemasukan_jenis like '%".$searchValue."%' or 
         pemasukan_user like '%".$searchValue."%' or 
         pemasukan_tanggal like'%".$searchValue."%' ) ";
     }
     if($searchJenis != ''){
        $search_arr[] = " pemasukan_jenis='".$searchJenis."' ";
     }
     
     if(count($search_arr) > 0){
        $searchQuery = implode(" and ",$search_arr);
     }

     ## Total number of records without filtering
     $this->db->select('count(*) as allcount');
     $records = $this->db->get('users')->result();
     $totalRecords = $records[0]->allcount;

     ## Total number of record with filtering
     $this->db->select('count(*) as allcount');
     if($searchQuery != '')
     $this->db->where($searchQuery);
     $records = $this->db->get('users')->result();
     $totalRecordwithFilter = $records[0]->allcount;

     ## Fetch records
     $this->db->select('*');
     if($searchQuery != '')
     $this->db->where($searchQuery);
     $this->db->order_by($columnName, $columnSortOrder);
     $this->db->limit($rowperpage, $start);
     $records = $this->db->get('users')->result();

     $data = array();

     foreach($records as $record ){

       $data[] = array( 
         "username"=>$record->username,
         "name"=>$record->name,
         "email"=>$record->email,
         "gender"=>$record->gender,
         "city"=>$record->city
       ); 
     }

     ## Response
     $response = array(
       "draw" => intval($draw),
       "iTotalRecords" => $totalRecords,
       "iTotalDisplayRecords" => $totalRecordwithFilter,
       "aaData" => $data
     );

     return $response; 
   }

  

}