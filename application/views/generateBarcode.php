<style>
 .well{
  box-shadow:none;
 }
.removeBorder{
 border: none !important;
}
#barcode{
 width: 100%;height: 100px;margin-left:-8px;
}
#printButton{
 border: 2px solid #f89d33;
 border-radius: 0 3px 3px 0 !important;
}
.paddingTop
{
 margin-top: 15px;
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
    <span class="widget-caption">Generate Sticker for Order - #<?php echo $order[0]["id"] ?></span>
   </div>
   <div class="widget-body col-lg-12 " style="padding:44px 0 ">
    <div class="col-md-6 col-xs-12 ">
     <div class="col-md-5 form-group"><b >Customer Name</b></div>
     <div class="col-md-7 form-group"><i class="fa fa-17 fa-user"></i> &nbsp; <?php echo $customer[0]["first_name"]." ".$customer[0]["last_name"] ?></div>
     <div class="col-md-5 form-group"><b>Address & Location</b></div>
     <div class="col-md-7 form-group"><p> <i class="fa fa-17 fa-map-marker"></i> &nbsp;<?php echo $address[0]["street_name1"] ?>, </p><p><?php echo $address[0]["street_name2"] ?>,</p><p><?php echo $address[0]["city"] ?>.</p></div>
     <div class="col-md-5 form-group"><b>Email Address </b></div>
     <div class="col-md-7 form-group"><?php echo $customer[0]["email"]?></div>
     <div class="col-md-5 form-group"><b>Phone Number</b></div>
     <div class="col-md-7 form-group"><i class="fa fa-17 fa-phone"></i> &nbsp; <?php echo $customer[0]["phone_number"] ?></div>
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
     <div>
      <div class="col-md-5 paddingTop">
       <div class=" form-group "><b>Number of stickers to be printed :</b></div>
       <div class=" form-group "><input type="number" class="form-control " style="width:70px;float:left;" value="<?php echo count($data) ?>" min="<?php echo count($data) ?>" id="printNumbers"><a class="btn btn-warning shiny" id="printButton" onclick="printBarcode()">Print Stickers</a></div>
      </div>
     </div>
     <div class="col-md-7 form-group paddingTop" id="printContent"><img id="barcode" style="" > <?php barcode( "order-".$order[0]["id"],"#barcode");?>  </div>
    </div>
    <div class="col-md-6 form-group">
     <table class="table table-hover table-striped table-bordered">
      <thead class="bordered-blue">
       <tr>
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
       <?php foreach($data as $row){ ?>
       <tr class="">
         <td><?php echo $row['category_id']; ?></td>					    
         <td><?php echo $row['item_id']; ?></td>
         <td><?php echo $row['service']; ?></td>
         <td><?php echo $row['price']; ?></td>				    
         <td><?php echo $row['quantity']; ?></td>
         <td><?php echo $row['amount']; ?></td>
       </tr>
        <?php } ?>
       <tr class="TOTAL" >
        <td class="removeBorder"colspan="4"></td>
        <td>Original Total </td>
        <td id="TOTAL-AMOUNT"><?php echo $order[0]["amount"] ?></td>
       </tr>
       <tr class="DISCOUNT">
        <td class="removeBorder" colspan="4"></td>
        <td>Discounted Amount </td>
        <td id="TOTAL-DISCOUNT"><?php echo $order[0]["discount"] ?></td>
       </tr>
       <tr class="FINAL-TOTAL">
        <td class="removeBorder" colspan="4"></td>
        <td>Total Amount </td>
        <td id="TOTAL-FINAL-AMOUNT"><b>Rs. <?php echo $order[0]["total_amount"] ?></b></td>
       </tr>
      </tbody>
     </table>
    </div>
    <div class="col-md-12 form-group"><center><a class="btn btn-danger shiny" href="<?php echo base_url('WashControl/moveToWash/'.$order[0]['id']);?>">Move to Wash</a></center></div>
   </div>
  </div>
 </div>
</div>
<script>
function printBarcode()
{
 var divContents = $("#printContent").html();
 var printWindow = window.open('', '', 'height=400,width=800');
 printWindow.document.write('<html><head><title></title>');
 printWindow.document.write('</head><body >');
 var limit=$("#printNumbers").val();
 var i;
 for(i=0;i<limit;i++)
 {
  printWindow.document.write(divContents);
 }
 printWindow.document.write('</body></html>');
 printWindow.document.close();
 printWindow.print();
}

</script>