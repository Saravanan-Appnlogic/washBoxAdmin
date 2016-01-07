<style>
    .input-icon i{
        font-size: 17px !important;
    }
    .modal-spacing
    {
        padding-top: 20px;
    }
    .modal-header
    {
        background-color: #2dc3e8 !important;
        background-image: none !important;
        color: white;
    }
    .modal-header h4{
        font-weight:600 !important;
        
    }
    .fa-17{
        font-size: 17px !important;
    }
    #barcode{
 width: 100%;height: 100px;margin-left:-8px;
}

</style>
<?php
    $status = $order[0]["status"];
    $orderId = $order[0]["id"];
?>

    <div class="col-md-12 col-xs-12 ">
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
        <div class="col-md-5 form-group paddingTop" id="printContent"><img id="barcode" style="" > <?php barcode( "order-".$order[0]["id"],"#barcode");?>  </div>

    </div>
    <div class="col-md-12 form-group">
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
   

