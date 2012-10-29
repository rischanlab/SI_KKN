<?php
class Custom_model extends grocery_CRUD_Model 
{
	
	
	function get_list()
		{
			$this->db->query("SELECT * FROM KKN_MHS where NIM='09650007'");
		}


}
?>
