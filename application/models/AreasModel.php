<?php
class AreasModel extends CI_Model
{  

	public function saveAreas()
{
    $date = strtotime(date("Y-m-d h:i:s"));
    $array = $this->input->post('itemListAdd');
    foreach($array as $arr){
        $data=array(
                
    'city_id'=>$arr[1],
    'area_code'=>$arr[2],
    'area_name'=>$arr[3],
     'is_deleted'=> 0,
     'created_on'=>$date
    );
    
     $this->db->insert('area',$data);
    }
    
    if($this->db->affected_rows()>0)
    {
        return true;
    }
    else
    {
        return false;
    }
}
    
    public function showArea()
    {  
      $qry=$this->db->query("SELECT ar.id as id, c.name as city_name,ar.area_name as area_name,ar.area_code as area_code from city c,area ar WHERE ar.city_id=c.id and ar.is_deleted=0 ORDER BY ar.id DESC ");
      return $qry->result();
    }

    // public function editAreas($id)
    // {  
    //     $id = $id;
    //   $qry=$this->db->query("SELECT ar.id as id, c.name as city_name,c.id as c_id,ar.area_name as area_name,ar.area_code as area_code from city c,area ar WHERE ar.city_id=c.id and ar.id=$id ");
    //   return $qry->result();
    // }

    public function editAreas()
    {
        $id = $this->input->get('id');
        $this->db->where('id', $id);
        $query = $this->db->get('area');
        if($query->num_rows() > 0){
            return $query->row();
        }else{
            return false;
    }
    }
    
    
    public function deleteArea()
    {
        $id =$this->input->get('id');
        $is_deleted = 1;

        $data = array(
            'is_deleted' => $is_deleted
        );
		$this->db->set($data);
        $this->db->where("id",$id);
        $this->db->update("area",$data);

		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
    }
    
    
    
    
    public function editArea()
    {
        $id = $this->input->get('id');
        $this->db->where('id', $id);
        $query = $this->db->get('aims_area');
        if($query->num_rows() > 0)
        {
            return $query->row();
        }
        else{
            return false;
            }
    }
    public function updateAreas()
    {
           $id =$this->input->post('txtId');
        $field = array(
            'area_code'=>$this->input->post('a_code'),
            'city_id'=>$this->input->post('city_code'),
            'area_name'=>$this->input->post('a_name'),
        );
        $this->db->where('id', $id);
        $this->db->update('area', $field);
        if($this->db->affected_rows() > 0){
            return true;
        }else{
            return false;
        }
    }
}
?>