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

</style>
<?php
    $status = $order[0]["status"];
    $orderId = $order[0]["id"];
?>

<div class="row modal-spacing">
    <div class="col-md-6 col-xs-12 ">
        <div class="col-md-6 form-group"><b>Customer Name</b></div>
        <div class="col-md-6 form-group"><i class="fa fa-17 fa-user"></i> &nbsp; <?php echo $customer[0]["first_name"]." ".$customer[0]["last_name"] ?></div>
        <div class="col-md-6 form-group"><b>Address & Location</b></div>
        <div class="col-md-6 form-group"><p> <i class="fa fa-17 fa-map-marker"></i> &nbsp;<?php echo $address[0]["street_name1"] ?>, </p><p><?php echo $address[0]["street_name2"] ?>,</p><?php echo $address[0]["city"] ?>.</p></div>
        <div class="col-md-6 form-group"><b>Email Address </b></div>
        <div class="col-md-6 form-group"><i class="fa fa-17 fa-at"></i> &nbsp; <?php echo $customer[0]["email"]?></div>
        <div class="col-md-6 form-group"><b>Phone Number</b></div>
        <div class="col-md-6 form-group"><i class="fa fa-17 fa-phone"></i> &nbsp; <?php echo $customer[0]["phone_number"] ?></div>
    </div>
    <div class="col-md-6 col-xs-6">
        <div class="col-md-6 form-group"><b>Pick Up Date</b></div>
        <div class="col-md-6 form-group"><i class="fa fa-17 fa-calendar"></i> &nbsp; <?php echo $order[0]["pick_up_date"] ?></div>
        <div class="col-md-6 form-group"><b>Pick Up Time</b></div>
        <div class="col-md-6 form-group"><i class="fa fa-17 fa-clock-o"></i> &nbsp; <?php echo $order[0]["pick_up_time"] ?></div>

        <div class="col-md-6 form-group"><b>Delivery Date</b></div>
        <div class="col-md-6 form-group"><i class="fa fa-17 fa-calendar"></i> &nbsp; <?php echo $order[0]["delivery_date"] ?></div>
        <div class="col-md-6 form-group"><b>Delivery Time</b></div>
        <div class="col-md-6 form-group"><i class="fa fa-17 fa-clock-o"></i> &nbsp; <?php echo $order[0]["delivery_time"] ?></div>
        <div class="col-md-6 form-group"><b>Washing Type </b></div>
        <div class="col-md-6 form-group"><i class="fa fa-17 fa-gears"></i> &nbsp; <?php echo $order[0]["clean_type"] ?></div>
        <div class="col-md-6 form-group"><b>Amount to Pay</b></div>
        <div class="col-md-6 form-group">
            <span class="input-icon">
                <input type="text" id="payAmount" value='<?php echo $order[0]["amount"] ?>'class="form-control input-sm">
                <i class="fa fa-rupee warning  "></i>
            </span>
        </div>  
    </div>
    <div class="col-md-12 ">
        
        <div class="form-group col-md-4 col-md-offset-4 modal-spacing">
            <select ng-model="role" class="form-control ng-pristine ng-valid" id="assignEmployee">
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
        <div class="form-group col-md-4 col-md-offset-4 " >
            <center>
                <?php
                    if($status=="PLACED")
                    {
                ?>
                <a class="btn btn-warning  shiny" onclick='updateOrderStatus("<?php echo $orderId?>","PICKUP","Order is going for pick up")'>Pick Up <i class="fa fa-arrow-right right"></i></a>
                <?php
                    }
                    else if($status=="PICKUP")
                    {
                ?>
                <a class="btn btn-warning  shiny" onclick='updateOrderStatus("<?php echo $orderId?>","TESTING","Order is going for testing")'>Testing <i class="fa fa-arrow-right right"></i></a>
                <?php
                    }
                    else if($status=="TESTING")
                    {
                ?>
                <a class="btn btn-warning  shiny" onclick='updateOrderStatus("<?php echo $orderId?>","WINPROGRESS","Order is going for washing")'>Move to wash <i class="fa fa-arrow-right right"></i></a>
                <?php
                    }
                    else if($status=="WINPROGRESS")
                    {
                ?>
                <a class="btn btn-warning  shiny" onclick='updateOrderStatus("<?php echo $orderId?>","WCOMPLETED", "Washing has been done for the order")'>Wash Completed <i class="fa fa-arrow-right right"></i></a>
                <?php
                    }
                    else if($status=="WCOMPLETED")
                    {
                ?>
                <a class="btn btn-warning  shiny" onclick='updateOrderStatus("<?php echo $orderId?>","PRESSFOLD", "Press Fold has been done for the order")'>Fold It <i class="fa fa-arrow-right right"></i></a>
                <?php
                    }
                    else if($status=="PRESSFOLD")
                    {
                ?>
                <a class="btn btn-warning  shiny" onclick='updateOrderStatus("<?php echo $orderId?>","DELIVERY", "Order is ready to deliver")'>Start Deliver <i class="fa fa-arrow-right right"></i></a>
                <?php
                    }
                    else if($status=="DELIVERY")
                    {
                ?>
                <a class="btn btn-warning  shiny" onclick='updateOrderStatus("<?php echo $orderId?>","PROCESSED", "Order is going for delivery ")'>Deliver Processing <i class="fa fa-arrow-right right"></i></a>
                <?php
                    }
                    else if($status=="PROCESSED")
                    {
                ?>
                <a class="btn btn-warning  shiny" onclick='updateOrderStatus("<?php echo $orderId?>","CUSTOMERPENDING"," Order has been delivered to customer")'>Delivered & Payed <i class="fa fa-arrow-right right"></i></a>
                <?php
                    }
                ?>
            </center>
        </div>
    </div>
</div>


