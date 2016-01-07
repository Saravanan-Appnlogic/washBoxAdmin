   <style>
    .well{
        box-shadow:none;
    }
   </style>
   
<?php
    $status = $order[0]["status"];
    $orderId = $order[0]["id"];
?>
<div class="page-body" >
  <div class="col-lg-12">
        <div class="widget">
            <div class="widget-header bg-blue">
                <span class="widget-caption">Testing Order - #<?php echo $order[0]["id"] ?></span>
            </div>
            <div class="widget-body col-lg-12">
             <div class="col-md-6 col-xs-12 ">
                 <div class="col-md-5 form-group"><b>Customer Name</b></div>
                 <div class="col-md-7 form-group"><i class="fa fa-17 fa-user"></i> &nbsp; <?php echo $customer[0]["first_name"]." ".$customer[0]["last_name"] ?></div>
                 <div class="col-md-5 form-group"><b>Address & Location</b></div>
                 <div class="col-md-7 form-group"><p> <i class="fa fa-17 fa-map-marker"></i> &nbsp;<?php echo $address[0]["street_name1"] ?>, </p><p><?php echo $address[0]["street_name2"] ?>,</p><?php echo $address[0]["city"] ?>.</p></div>
                 <div class="col-md-5 form-group"><b>Email Address </b></div>
                 <div class="col-md-7 form-group"><?php echo $customer[0]["email"]?></div>
                 <div class="col-md-5 form-group"><b>Phone Number</b></div>
                 <div class="col-md-7 form-group"><i class="fa fa-17 fa-phone"></i> &nbsp; <?php echo $customer[0]["phone_number"] ?></div>
             </div>
             <div class="col-md-6 col-xs-6">
                 <div class="col-md-5 form-group"><b>Pick Up Date</b></div>
                 <div class="col-md-7 form-group"><i class="fa fa-17 fa-calendar"></i> &nbsp; <?php echo $order[0]["pick_up_date"] ?></div>
                 <div class="col-md-5 form-group"><b>Pick Up Time</b></div>
                 <div class="col-md-7 form-group"><i class="fa fa-17 fa-clock-o"></i> &nbsp; <?php echo $order[0]["pick_up_time"] ?></div>
         
                 <div class="col-md-5 form-group"><b>Delivery Date</b></div>
                 <div class="col-md-7 form-group"><i class="fa fa-17 fa-calendar"></i> &nbsp; <?php echo $order[0]["delivery_date"] ?></div>
                 <div class="col-md-5 form-group"><b>Delivery Time</b></div>
                 <div class="col-md-7 form-group"><i class="fa fa-17 fa-clock-o"></i> &nbsp; <?php echo $order[0]["delivery_time"] ?></div>
                 <div class="col-md-5 form-group"><b>Washing Type </b></div>
                 <div class="col-md-7 form-group"><i class="fa fa-17 fa-gears"></i> &nbsp; <?php echo $order[0]["clean_type"] ?></div>
                 <div class="col-md-5 form-group"><b>Employee</b></div>
                 <div class="col-md-7 form-group">
                  <select  class="form-control ng-pristine ng-valid" id="assignEmployee">
                      <option disabled="" selected value="Select a Role">Select a employee</option>
                      <?php
                          foreach($admin as $user)
                          {
                      ?>
                          <option value="<?php echo $user['id']?>"><?php echo $user['name'];?></option>
                      <?php
                          }
                      ?>
                  </select>
                 </div>  
             </div>
            <div class="col-md-12 form-group">
             <h5 class="row-title before-sky" onclick="addItem()"><i class="fa fa-plus sky"></i>Add Items</h5>
            <table class="table table-hover table-striped table-bordered">
                 <thead class="bordered-blue">
                     <tr>
                         <th>
                             SNO
                         </th>
                         <th>
                             Category
                         </th>
                         <th>
                             Item
                         </th>
                         <th>
                             Service
                         </th>
                         <th>
                             Price
                         </th>
                         <th>
                             Quantity
                         </th>
                         <th>
                             Amount
                         </th>
                     </tr>
                 </thead>
                 <tbody>
                     <tr class="TABLE-DATA">
                         <td class="SNO">
                          1
                         </td>
                         <td>
                          <select name="category_id[]" class="form-control CATEGORY_ID"  onchange="itemSelect(this)">
                           <option disabled selected value="">Select a Category</option>
                           <?php foreach($categories as $category){?>
                           <option value="<?php echo $category['id']; ?>"><?php echo $category['category']; ?></option>
                           <?php } ?>
                           
                          </select>
                         </td>
                         <td class="ITEM">
                         </td>
                         <td class="TYPE">
                         </td>
                         <td class="SERVICE-PRICE">
                             
                         </td>
                         <td class="QUANTITY">
                             
                          </td>
                         <td class="AMOUNT">
                         </td>
                     </tr>
                     <tr class="TOTAL">
                      <td colspan="5"></td>
                      <td>Original Total </td>
                      <td id="TOTAL-AMOUNT"> 0</td>
                     </tr>
                     <tr class="DISCOUNT">
                      <td colspan="5"></td>
                      <td>Discounted Amount </td>
                      <td id="TOTAL-DISCOUNT"><input type="text" onkeyup="$('#TOTAL-FINAL-AMOUNT').text(parseFloat($('#TOTAL-AMOUNT').text())-parseFloat(this.value))"class="form-control  DISCOUNT-FIELD" id="" placeholder="Enter Qunatity"></td>
                     </tr>
                     <tr class="FINAL-TOTAL">
                      <td colspan="5"></td>
                      <td>Total Amount </td>
                      <td id="TOTAL-FINAL-AMOUNT"> 0</td>
                     </tr>
           </tbody>
             </table>
        
            </div>
           <div class=""><center><a class="btn btn-warning shiny" onclick="sendData()"href="#">Confirm Billing</a></center></div> 
         </div>
    </div>
  </div>
  
</div>

<script>
  function totalAmountCal(){
  var fullAmount=0;
  var discount=0;
  var original=0;
  var temp;
  $(".AMOUNT").each(function(){
   temp=parseInt($(this).text());

   if(!isNaN(temp)){
   console.log("amount: "+temp);
   fullAmount=parseInt(fullAmount)+parseInt($(this).text());
   }
  });
 $("#TOTAL-AMOUNT").text(fullAmount);
 if (fullAmount>0) {
  discount=parseFloat(fullAmount)*parseFloat(0.125);
  original=parseFloat(fullAmount)-parseFloat(discount);
 }
 $(".DISCOUNT-FIELD").val(discount);
 $("#TOTAL-FINAL-AMOUNT").text(original);


 }
  totalAmountCal();
 
 function addItem()
 {
 $('.TOTAL').remove();
 $(".DISCOUNT").remove();
 $(".FINAL-TOTAL").remove();

  var sno=1;
  var myHTML='<tr class="TABLE-DATA"><td class="SNO"></td><td><select name="category_id[]" class="form-control CATEGORY_ID"  onchange="itemSelect(this)"><option disabled selected value="">Select a Category</option><?php foreach($categories as $category){?><option value="<?php echo $category['id']; ?>"><?php echo $category['category']; ?></option><?php } ?></select></td> <td class="ITEM"></td><td class="TYPE"></td><td class="SERVICE-PRICE"></td><td class="QUANTITY"></td><td class="AMOUNT"></td></tr>';
  $(myHTML).appendTo("tbody");
  $(".SNO").each(function(){
   $(this).text(sno);
   sno=sno+1;
  });
  $('<tr class="TOTAL"><td colspan="5"></td><td>Total </td><td id="TOTAL-AMOUNT"> </td></tr><tr class="DISCOUNT"><td colspan="5"></td><td>Discounted Amount </td><td id="TOTAL-DISCOUNT"><input type="text" onkeyup="Discount(this)"class="form-control  DISCOUNT-FIELD" id="" placeholder="Enter Qunatity"></td></tr><tr class="FINAL-TOTAL"><td colspan="5"></td><td>Total Amount =</td><td id="TOTAL-FINAL-AMOUNT"> 0</td></tr>').appendTo("tbody");
  totalAmountCal();
 }

 function itemSelect($data)
 {

  var Category=$($data).val();
  $.ajax({
   url: "<?php echo site_url();?>WashControl/getItemData",
   type: "post",
   data: {Category:Category},
   success: function(result) {
   $($data).parents('tr').find('.SERVICE-PRICE').empty();
   $($data).parents('tr').find('.QUANTITY').empty();
   $($data).parents('tr').find('.AMOUNT').empty();
   $($data).parents('tr').find('.TYPE').empty();
   $($data).parents('tr').find('.SERVICE-PRICE').removeData();
   $($data).parents('tr').find('.QUANTITY').removeData();
   $($data).parents('tr').find('.AMOUNT').removeData();
   $($data).parents('tr').find('.TYPE').removeData();
   $($data).parents('tr').find('.ITEM').html(result);
   }
  }).promise().done(function() {
  totalAmountCal();
  });
 }
 function washType($type)
 {
  var item=$($type).val();
  $.ajax({
   url: "<?php echo site_url();?>WashControl/getService",
   type: "post",
   data: {item:item},
   success: function(result) {
   $($type).parents('tr').find('.SERVICE-PRICE').empty();
   $($type).parents('tr').find('.QUANTITY').empty();
   $($type).parents('tr').find('.AMOUNT').empty();
   $($type).parents('tr').find('.SERVICE-PRICE').removeData();
   $($type).parents('tr').find('.QUANTITY').removeData();
   $($type).parents('tr').find('.AMOUNT').removeData();
   $($type).parents('tr').find('.TYPE').html(result);
   }
  }).promise().done(function(  ) {
  totalAmountCal();
  });

 }
 function  Amount($qty)
 {

  var qty=0;
  var price=0;
  if (qty!="" || qty!="undefined") {
  qty=$($qty).val();
  }
    if (price !="" || price!="undefined") {
  price=$($qty).parents('tr').find('.SERVICE-PRICE').text();
  }
  var totalAmount=parseInt(qty)*parseInt(price);
  $($qty).parents('tr').find('.AMOUNT').text(totalAmount);
  totalAmountCal();
 }
 function Quantity($this){
 $($this).parents('tr').find('.QUANTITY').empty();
 $($this).parents('tr').find('.AMOUNT').empty();
 $($this).parents('tr').find('.SERVICE-PRICE').text($this.value);
 $($this).parents('tr').find('.QUANTITY ').html('<input type="text" onkeyup="Amount(this)"class="form-control  QUANTITY-FIELD" id="" placeholder="Enter Qunatity">');
 totalAmountCal();
 }
 function sendData() {
 var orderId=<?php echo $order[0]["id"] ?>;
 var originalAmount=$("#TOTAL-AMOUNT").text();
 var discountedAmount=$(".DISCOUNT-FIELD").val();
 var finalAmount=$("#TOTAL-FINAL-AMOUNT").text();
 var orderData=[];
 var tempAmount;
 $(".TABLE-DATA").each(function(){
  tempAmount=$(this).find('.AMOUNT').text();
   if(tempAmount!=""){
    orderData.push({
     category: $(this).find('.CATEGORY_ID').val(), 
     item:  $(this).find('.ITEM_ID').val(),
     service: $(this).find('.SERVICE_ID').val(), 
     price:  $(this).find('.SERVICE-PRICE').text(),
     qty: $(this).find('.QUANTITY-FIELD').val(), 
     amount:  $(this).find('.AMOUNT').text(),
     order: orderId
    });    
   }
 });
 if (orderData.length>0) {
   $.ajax({
   url: "<?php echo site_url();?>WashControl/addBilling",
   type: "post",
   data: {orderId:orderId,originalAmount:originalAmount,discountedAmount:discountedAmount,finalAmount:finalAmount,orderData:orderData},
   success: function(result) {
    Notify("Billing Saved Successfully", 'top-left', '10000', 'success', 'fa-truck', true);

   }
  }).promise().done(function(  ) {
    window.location="<?php echo site_url();?>WashControl/testingOrder";
    });
 }


 }

</script>

 