<style>
    h4 b{
    font-weight:600;
    }
</style>

<div class="page-body">
    <div class="widget">
        <div class="widget-header bg-blue">
            <span class="widget-caption">Admin Users</span>
        </div>
        <div class="widget-body col-lg-12">
            <div class="">
                <table id="dataRespTable" class="table table-hover">
                    <thead class="bordered-darkorange">
                        <tr>
                            <th>Order</th>
                            <th>Pick Up Date</th>
                            <th>Delivery Date</th>
                            <th>Pick Up Time </th>
                            <th>Delivery Time</th>
                            <th>Delivery Notes</th>
                            <th>Current Time</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach($data as $row){?>
                       <tr class="">
                        <td><center><a  class="btn btn-danger shiny btn-sm" href="<?php echo base_url('WashControl/generateBarcode/'.$row["id"]);?>" >Click here Order - #<?php echo $row['id']; ?> </a></center></td>
                        <td><?php echo $row['pick_up_date']; ?></td>					    
                        <td><?php echo $row['delivery_date']; ?></td>
                        <td><?php echo $row['pick_up_time']; ?></td>
                        <td><?php echo $row['delivery_time']; ?></td>				    
                        <td><?php echo $row['delivery_notes']; ?></td>
                        <td><?php echo $row['current_time']; ?></td>
                      </tr>
                    <?php } ?>
                   </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

</div>
<script>
	$(document).ready(function() {
    $("#dataRespTable").DataTable();
     });
	
</script>
