<?php if( ! defined('BASEPATH')) exit('No direct script access allowed');

class Wash_Model extends CI_Model
{

	function __construct()
	{
		parent::__construct();
	}
        function gettable()
	{
		$query = $this->db->post('loctab');
		return $query->result();
	}
	public function AddUser($location)
	{
		$data = array('location' =>$location);
		$this->db->insert('loctab',$data);
		$insert_id = $this->db->insert_id();
	 
	 return $insert_id;
	}
	public function getAll() {
		$loct=$this->db->get('loctab')->result_array();
		return $loct;
	}
	function del_locat($location)
	{
		$val = $this->db->delete('loctab', array('location' => $location));
	}
	//Order Page
	// function getTableDetails()
	//{
	//    
	//   $sql="SELECT * FROM placeOrder";
	//   return $this->db->query($sql, $return_object = TRUE)->result_array();
	//}
	function getAdmin()
	{
	    
	   $sql="SELECT * FROM admin_users";
	   return $this->db->query($sql, $return_object = TRUE)->result_array();
	}
	function getAdminUser($id)
	{
	    
	   $sql="SELECT * FROM admin_users where id=$id";
	   return $this->db->query($sql, $return_object = TRUE)->result_array();
	}
	
	
	function adminUser() 
	{
		
		$data=array(
			
			'name'=>$_POST["name"],
			'password'=>$_POST["password"],
			'role'=>$_POST["role"],
			
		);
		
		$this->db->insert('admin_users',$data);
		
	}
	function getUsers($id){
	  $sql="SELECT * FROM admin_users where id=$id";
	   return $result=$this->db->query($sql, $return_object = TRUE)->result_array();
	}
	function getUserAddress($id){
		$sql="SELECT * FROM user_address where user_id=$id";
		return $result=$this->db->query($sql, $return_object = TRUE)->result_array();
	}
    
	 function update(){  
		$id   = $this->input->post('id');  
		$name = $this->input->post('name');  
		$password = $this->input->post('password');  
		$role=$this->input->post('role');
		$data = array(  
		  'name'=>$name,  
		  'password'=>$password,  
		  'role'=>$role  
		);
		
		$this->db->where('id', $this->input->post('id'));
		$this->db->update('admin_users',$data);
	       
	      }
	function delete($id){
            $id =  $this->input->POST('id');
            $this->db->where('id', $id);
            $this->db->delete('admin_users');
             
        }
	function getOrders($id)
	{
		
		$sql="SELECT * from placeorder WHERE id ='$id'";
		return $this->db->query($sql, $return_object = TRUE)->result_array();
	}

	function placedOrder(){
		
		$this->db->where('status', "PLACED");
		$query = $this->db->get('placeorder');
		return $query->result();
	}
	function pickUpOrder(){
		
		$this->db->where('status', "PICKUP");
		$query = $this->db->get('placeorder');
		return $query->result();
	}
	function testingOrder(){
		
		$this->db->where('status', "TESTING");
		$query = $this->db->get('placeorder');
		return $query->result();
	}
	function billingOrder(){
		
		$this->db->where('status', "BILLING");
		$query = $this->db->get('placeorder');
		return $query->result_array();
	}
	function getBill($id)
	{
		$this->db->where('order_id', $id);
		$query = $this->db->get('billing');
		return $query->result_array();
	}
	function testingAnOrder($id){
		
		$where=array(
			     "id"=>$id,
			     "status"=>'TESTING'			     
			     );
		$this->db->where($where);
		$query = $this->db->get('placeorder');
		return $query->result();
	}
	
	function washInProgressOrder(){
		
		$this->db->where('status', "WINPROGRESS");
		$query = $this->db->get('placeorder');
		return $query->result();
	}
	function washCompletedOrder(){
		
		$this->db->where('status', "WCOMPLETED");
		$query = $this->db->get('placeorder');
		return $query->result();
	}

	function pressFoldOrder(){
		
		$this->db->where('status', "PRESSFOLD");
		$query = $this->db->get('placeorder');
		return $query->result();
	}
	function deliveryOrder(){
		
		$this->db->where('status', "DELIVERY");
		$query = $this->db->get('placeorder');
		return $query->result();
	}
	function processedOrder(){
		
		$this->db->where('status', "PROCESSED");
		$query = $this->db->get('placeorder');
		return $query->result();
	}
	function customerPendingOrder(){
		
		$this->db->where('status', "CUSTOMERPENDING");
		$query = $this->db->get('placeorder');
		return $query->result();
	}
	function closedOrder()
	{
		$this->db->where('status', "CLOSED");
		$query = $this->db->get('placeorder');
		return $query->result();
	}
	function cancelledOrder()
	{
		$this->db->where('status', "CANCELLED");
		$query = $this->db->get('placeorder');
		return $query->result();
	}
	    
	function updateOrderStatus()
	{  
		$data = array(  
		  'status'=>$this->input->post('status'),
		  'amount'=>$this->input->post('payAmount'),  
		  'assigned_to'=>$this->input->post('employeeId'),  
		);
		
		$this->db->where('id', $this->input->post('id'));
		$this->db->update('placeorder',$data);
	       
	}
	function moveToWash($id)
	{  
		$data = array(  
		  'status'=>'WINPROGRESS'
		);
		$this->db->where('id', $id);
		$this->db->update('placeorder',$data);
	       
	}
	function getCustomer($id)
	{
		$sql="SELECT * FROM user where id=$id";
		return $result=$this->db->query($sql, $return_object = TRUE)->result_array();
	}
	
	function customers()
	{
		$query = $this->db->get('user');
		$result= $query->result_array();
		$limit=count($result);

		if($limit>0){
			for ($x = 0; $x <$limit; $x++)
			{
				$placed=0;
				$completed=0;
				$cancelled=0;
				$payment=0;
				$id=$result[$x]["id"];
				$sql="SELECT * FROM placeorder where user_id='$id' AND status='PLACED'";
				$result_placed=$this->db->query($sql, $return_object = TRUE)->result_array();
				$placed=count($result_placed);
				$sql="SELECT * FROM placeorder where user_id='$id' AND  status='CLOSED'";
				$result_completed=$this->db->query($sql, $return_object = TRUE)->result_array();
				$completed=count($result_completed);
				$sql="SELECT * FROM placeorder where user_id='$id' AND  status='CANCELLED'";
				$result_cancelled=$this->db->query($sql, $return_object = TRUE)->result_array();
				$cancelled=count($result_cancelled);
				$sql="SELECT SUM( amount ) AS amount FROM placeorder WHERE user_id ='$id'";
				$result_amount=$this->db->query($sql, $return_object = TRUE)->result_array();
				$payment=$result_amount[0]["amount"];
				$result[$x]["placed"]=$placed;
				$result[$x]["completed"]=$completed;
				$result[$x]["cancelled"]=$cancelled;
				if($payment>0)
				{
				$result[$x]["payment"]=$payment;
				}
				else
				{
				$result[$x]["payment"]=0;
				}
			} 
		}
		return $result;
	}
	function addCategory() 
	{
		
		$data=array(
			'category'=>$_POST["name"],
		);
		
		$this->db->insert('category',$data);
		
	}
	 function updateCategory(){  
		$id   = $this->input->post('id');  
		$name = $this->input->post('name');  

		$data = array(  
		  'category'=>$name,  
		);
		
		$this->db->where('id', $this->input->post('id'));
		$this->db->update('category',$data);
	       
	      }
	      
	function deleteCategory($id){
            $id =  $this->input->POST('id');
            $this->db->where('id', $id);
            $this->db->delete('category');
             
        }
	function getCategorySingle($id){
		$sql="SELECT * FROM category where id=$id";
		return $result=$this->db->query($sql, $return_object = TRUE)->result_array();
	}
	function getCategory()
	{
	    
	   $sql="SELECT * FROM category";
	   return $this->db->query($sql, $return_object = TRUE)->result_array();
	}
	//Item
	function addItem() 
	{
		$name = $this->input->post('name');  
		$wash = $this->input->post('wash');  
		$iron = $this->input->post('iron');  
		$dry = $this->input->post('dry');  
		$category_id = $this->input->post('category_id');
		$data=array(
		  'item_name'=>$name,
		  'item_price_wash'=>$wash,  
		  'item_price_iron'=>$iron,  
		  'item_price_dry'=>$dry,  
		  'category_id'=>$category_id,  
		);
		
		$this->db->insert('item',$data);
		
	}
	 function updateItem(){  
		$id   = $this->input->post('id');  
		$name = $this->input->post('name');  
		$wash = $this->input->post('wash');  
		$iron = $this->input->post('iron');  
		$dry = $this->input->post('dry');  
		$category_id = $this->input->post('category_id');
		$data = array(  
		  'item_name'=>$name,
		  'item_price_wash'=>$wash,  
		  'item_price_iron'=>$iron,  
		  'item_price_dry'=>$dry,  
		  'category_id'=>$category_id,  
		);
		
		$this->db->where('id', $this->input->post('id'));
		$this->db->update('item',$data);
	       
	}
	      
	function deleteItem($id){
            $id =  $this->input->POST('id');
            $this->db->where('id', $id);
            $this->db->delete('item');
             
        }
	function getItemSingle($id){
		$sql="SELECT * FROM item where id=$id";
		return $result=$this->db->query($sql, $return_object = TRUE)->result_array();
	}
	function getItems($id){
		$sql="SELECT * FROM item where category_id=$id";
		return $result=$this->db->query($sql, $return_object = TRUE)->result_array();
	}
	function getItem()
	{
	    
	   $sql="SELECT item.id, category_id , item_name , item_price_iron , item_price_wash , item_price_dry , category FROM item LEFT JOIN category ON item.category_id = category.id";
	   return $this->db->query($sql, $return_object = TRUE)->result_array();
	}
	function getPartners()
	{
		$sql="SELECT * from partner";
		return $this->db->query($sql, $return_object = TRUE)->result_array();
	}
	function addBilling()
	{
		$orderId  = $this->input->post('orderId');  
		$originalAmount = $this->input->post('originalAmount');  
		$finalAmount = $this->input->post('finalAmount');  
		$discountedAmount=$this->input->post('discountedAmount');
		$dataBilling=$this->input->post('orderData');
		
		$data = array(  
		  'amount'=>$originalAmount,  
		  'total_amount'=>$finalAmount,
		  'discount'=>$discountedAmount,
		  'status'=>'BILLING'
		);
		
		$this->db->where('id', $orderId);
		$this->db->update('placeorder',$data);
		
		foreach ($dataBilling as $row)
		{
			$bill = array(  
			  'order_id'=>$row["order"],  
			  'category_id'=>$row["category"],
			  'item_id'=>$row["item"],  
			  'service'=>$row["service"],
			  'price'=>$row["price"],  
			  'quantity'=>$row["qty"],
			  'amount'=>$row["amount"]
			);
			
			$this->db->insert('billing',$bill);
		}

	}
	
}