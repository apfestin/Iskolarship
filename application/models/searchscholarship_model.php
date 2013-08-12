<?php
require_once('base_model.php');
class searchscholarship_model extends Base_Model {
   public function __construct()
   {
      parent::__construct();
   }
   
   function get_programs()
	{
		$results = $this->db->query('SELECT programid, name FROM programs;');
		$results = $results->result_array();
		return $results;
	}
	
	function get_yearlevels()
	{
		$results = $this->db->query('SELECT yearlevelid, description FROM yearlevels;');
		$results = $results->result_array();
		return $results;
	}
	
	public function conductsearch($xprogram, $xgender, $xyearlv, $xmaxincome) {
		$whereclause = "";
		if($xprogram) {
			//$programid ---> GET VALUE NG GUSTO
			if($whereclause != "") {
				$whereclause =$whereclause." and ";
			}
			$whereclause = $whereclause."scholarshipid in (select scholarshipid from scholarshiprequirements where requirementtypeid = 1 and requirement = '".$programid."')";
		}
		
		if($xgender) {
			//$gender --- get also.
			if($whereclause != "") {
				$whereclause =$whereclause." and ";
			}
			$whereclause = $whereclause."scholarshipid in (select scholarshipid from scholarshiprequirements where requirementtypeid = 2 and requirement = '".$gender."')";
		}
		
		if($xyearlv) {
			//$yearlevel --- get also.
			if($whereclause != "") {
				$whereclause =$whereclause." and ";
			}
			$whereclause = $whereclause."scholarshipid in (select scholarshipid from scholarshiprequirements where requirementtypeid = 4 and requirement = '".$yearlevel."')";
		}
		if($xmaxincome) {
			//$maxincome --- get also.
			if($whereclause != "") {
				$whereclause =$whereclause." and ";
			}
			$whereclause = $whereclause."scholarshipid in (select scholarshipid from scholarshiprequirements where requirementtypeid = 3 and requirement = '".$maxincome."')";
		}
		$whereclause = $whereclause." and true";
		echo 'SELECT scholarshipid, title from scholarships where '.$whereclause;
		die();
		#query to get all scholarships
		$query = 'SELECT scholarshipid, title from scholarships where '.$whereclause;
		$results = $this->db->query($query);
		$results = $results->result_array();
		return $results;
	}
}
?>