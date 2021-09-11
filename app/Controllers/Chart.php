<?php 

namespace App\Controllers;
 
use CodeIgniter\Controller;
 
class Chart extends Controller
{
 
	public function __construct()
	{
		helper(['html','url']);
	}
		
	public function index() {
		$db = \Config\Database::connect();
		$builder = $db->table('products');

		$query = $builder->select("COUNT(id) as count, sales, MONTHNAME(created_at) as month");
		$query = $builder->orderBy("sales ASC, month ASC");
		$query = $builder->where("MONTH(created_at) GROUP BY MONTHNAME(created_at), sales")->get();
		$record = $query->getResult();

		$productData = [];

		foreach($record as $row) {
			$productData[] = array(
				'month'   => $row->month,
				'sales' => floatval($row->sales)
			);
		}

		$data['productData'] = ($productData);    
		return view('index', $data);     
	}
 
}

?>