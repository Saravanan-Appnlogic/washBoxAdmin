<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class WashControl extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model("wash_model");
		$this->load->helper('barcode');
	}
	function index()
	{
		$result["customers"]= $this->wash_model->customers();
		$this->load->view('header');
		$this->load->view('customers',$result);
	}
	function adminUsers()
	{
		$this->load->view('header');
		$this->load->view('admin');
	}
	function Location()
	{
		$this->load->view('header');
		$this->load->view('Location');
	}
	function placedOrder()
	{
		$result["order"]= $this->wash_model->placedOrder();
		$this->load->view('header');
		$this->load->view('placeOrder',$result);
	}
	function pickUpOrder()
	{
		$result["order"]= $this->wash_model->pickUpOrder();
		$this->load->view('header');
		$this->load->view('pickUpOrder',$result);
	}

	function testingOrder()
	{
		$result["order"]= $this->wash_model->testingOrder();
		$this->load->view('header');
		$this->load->view('testingOrder',$result);
	}
	function billingOrder()
	{
		$result["data"]= $this->wash_model->billingOrder();
		$this->load->view('header');
		$this->load->view('billingOrder',$result);
		
	}
	function generateBarcode($id)
	{
		$data["data"]= $this->wash_model->getBill($id);
		$data["categories"]=$this->wash_model->getCategory();
		$data["order"]=$this->wash_model->getOrders($id);
		$data["customer"]=$this->wash_model->getCustomer($data["order"][0]['user_id']);
		$data["address"]=$this->wash_model->getUserAddress($data["customer"][0]['id']);
		$data["admin"]=$this->wash_model->getAdmin();
		$this->load->view('header');
		$this->load->view('generateBarcode',$data);
		
	}
	function testingAnOrder($id)
	{
		$this->load->view('header');
		$data["categories"]=$this->wash_model->getCategory();
		$data["order"]=$this->wash_model->getOrders($id);
		$data["customer"]=$this->wash_model->getCustomer($data["order"][0]['user_id']);
		$data["address"]=$this->wash_model->getUserAddress($data["customer"][0]['id']);
		$data["admin"]=$this->wash_model->getAdmin();
		$this->load->view('testingAnOrder',$data);
	}
	function getItemData()
	{
		$id = $this->input->post('Category');
		$result["item"]=$this->wash_model->getItems($id);
		$this->load->view('getItemData',$result);

	}
	function getService()
	{
		$id = $this->input->post('item');
		$result["item"]=$this->wash_model->getItemSingle($id);
		$this->load->view('getService',$result);

	}
	function moveToWash($id)
	{
		$this->wash_model->moveToWash($id);
		redirect('WashControl/washInProgressOrder');
	}
	function washInProgressOrder()
	{
		$result["order"]= $this->wash_model->washInProgressOrder();
		$this->load->view('header');
		$this->load->view('washInProgressOrder',$result);
	}
	function washCompletedOrder()
	{
		$result["order"]= $this->wash_model->washCompletedOrder();
		$this->load->view('header');
		$this->load->view('washCompletedOrder',$result);
	}

	function pressFoldOrder()
	{
		$result["order"]= $this->wash_model->pressFoldOrder();
		$this->load->view('header');
		$this->load->view('pressFoldOrder',$result);
	}
	function deliveryOrder()
	{
		$result["order"]= $this->wash_model->deliveryOrder();
		$this->load->view('header');
		$this->load->view('deliveryOrder',$result);
	}

	function processedOrder()
	{
		$result["order"]= $this->wash_model->processedOrder();
		$this->load->view('header');
		$this->load->view('processedOrder',$result);
	}
	function customerPendingOrder()
	{
		$result["order"]= $this->wash_model->customerPendingOrder();
		$this->load->view('header');
		$this->load->view('customerPendingOrder',$result);
	}
	function closedOrder()
	{
		$result["order"]= $this->wash_model->closedOrder();
		$this->load->view('header');
		$this->load->view('closedOrder',$result);
	}
	function cancelledOrder()
	{
		$result["order"]= $this->wash_model->cancelledOrder();
		$this->load->view('header');
		$this->load->view('cancelledOrder',$result);
	}
	function customers()
	{
		$result["customers"]= $this->wash_model->customers();
		$this->load->view('header');
		$this->load->view('customers',$result);
	}
	function selectOrder()
	{
		$id=$_POST["id"];
		$data["order"]=$this->wash_model->getOrders($id);

		$data["customer"]=$this->wash_model->getCustomer($data["order"][0]['user_id']);

		$data["address"]=$this->wash_model->getUserAddress($data["customer"][0]['id']);
		$data["admin"]=$this->wash_model->getAdmin();
		$this->load->view('selectOrder',$data);
	}
	function updateOrderStatus(){
		$this->wash_model->updateOrderStatus();
	}
	function add()
	{
		$postdata = file_get_contents("php://input");
		$request = json_decode($postdata);
		$location = $request->location;
		$id = $this->wash_model->AddUser($location);
		if($id)
		{
		   echo $result = '{"status" : "'.$location.'"}';
		}else{
		   echo $result = '{"status" : "failure"}';
		}
	}
	function get_list() {
		$this->load->model(array('wash_model'));
		$data= $this->wash_model->getAll();
		echo json_encode($data);
	}
	function del_location()
	{
		$postdata = file_get_contents("php://input");
		$request = json_decode($postdata);
		$location = $request->location;
		$data = $this->wash_model->del_locat($location);
	}
	function order()
	{
		$result['tableDetails']=$this->wash_model->getTableDetails();
		$this->load->view('header');
		$this->load->view('order',$result);
	}
	function getAdmin()
	{
		$result["admin"]=$this->wash_model->getAdmin();
		$this->load->view('getadmin',$result);
	
	}

	function getAdminUser($id)
	{
		$result=$this->wash_model->getAdminUser($id);
		echo json_encode($result);
	}
	function adminUser(){
		$this->wash_model->adminUser();
	}
	function datatables(){
		$this->load->view('datatables');
	}
	function editUser()
	{
		$id = $this->input->post('id');
		$result=$this->wash_model->getUsers($id);
		echo json_encode($result);
	}
	
	function update()
	{
		$this->wash_model->update();

	}
	function delete()
	{
		$this->wash_model->delete();
	}
	function getCategory()
	{
		$result["category"]=$this->wash_model->getCategory();
		$this->load->view('getCategory',$result);
	
	}
	function addCategory(){
		$this->wash_model->addCategory();
	}
	function editCategory()
	{
		$id = $this->input->post('id');
		$result=$this->wash_model->getCategorySingle($id);
		echo json_encode($result);
	}
	function updateCategory()
	{
		$this->wash_model->updateCategory();

	}
	function deleteCategory()
	{
		$this->wash_model->deleteCategory();
	}
	function category()
	{
		$this->load->view('header');
		$this->load->view('category');
	}
	function getItem()
	{
		$result["item"]=$this->wash_model->getItem();
		$this->load->view('getItem',$result);
	
	}
	function addItem(){
		$this->wash_model->addItem();
	}
	function editItem()
	{
		$id = $this->input->post('id');
		$result=$this->wash_model->getItemSingle($id);
		echo json_encode($result);
	}
	function updateItem()
	{
		$this->wash_model->updateItem();

	}
	function deleteItem()
	{
		$this->wash_model->deleteItem();
	}
	function item()
	{
		$result["categories"]=$this->wash_model->getCategory();
		$this->load->view('header');
		$this->load->view('item',$result);
	}
	function partners(){
		$result["partners"]=$this->wash_model->getPartners();
		$this->load->view('header');
		$this->load->view('partners',$result);
	}
	function searchOrder()
	{
		$this->load->view('header');
		$this->load->view('searchOrder');
	}
	function searchPlaceOrder()
	{
		$id=$_POST["id"];
		$data["data"]= $this->wash_model->getBill($id);
		$data["categories"]=$this->wash_model->getCategory();
		$data["order"]=$this->wash_model->getOrders($id);
		$data["customer"]=$this->wash_model->getCustomer($data["order"][0]['user_id']);
		$data["address"]=$this->wash_model->getUserAddress($data["customer"][0]['id']);
		$data["admin"]=$this->wash_model->getAdmin();
		$this->load->view('searchOrderAjax',$data);
	}
	function addBilling()
	{
		$this->wash_model->addBilling();
	}

}