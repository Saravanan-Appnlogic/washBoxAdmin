   <style>
    .well{
        box-shadow:none;
    }
   </style>
   

<div class="page-body" >
    <div class="col-lg-12 col-sm-12 col-xs-12" >
        <div class="widget">
            <div class="widget-header bordered-bottom bordered-blue">
                <span class="widget-caption">Basic Form</span>
            </div>
            <div class="widget-body">
                <div class="well ">
                    
                    <table id="dataRespTable" class="table table-hover table-bordered" >
                        <thead class="bordered-darkorange">
                            <tr>
                                <th>
                                  Order Preview
                                </th>
                                <th>
                                   WashType
                                </th>
                                <th>
                                    PickupDate
                                </th>
                                <th>
                                    PickupTime
                                </th>
                                <th>
                                   DeliveryDate
                                </th>
                                <th>
                                    DeliveryTime
                                </th>
<!--                                 <th>
                                    Status
                                </th>-->
                                
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($order as $row){?>
                                <tr class="">
                                   
                                    <td><center><a href="<?php echo base_url('WashControl/testingAnOrder/'.$row->id);?>" class="btn btn-danger shiny btn-sm" >Click here Order - #<?php echo $row->id; ?> </a></center></td>
                                    <td><?php echo $row->clean_type; ?></td>
                                    <td><?php echo $row-> pick_up_date ; ?></td>
                                    <td><?php echo $row->pick_up_time ; ?></td>
                                    <td><?php echo $row->delivery_date; ?></td>
                                    <td><?php echo $row->delivery_time; ?></td>
<!--                                    <td><?php/* echo $row->status;*/ ?></td>	
-->                                 </tr>
                            <?php } ?>
                        </tbody>
                   </table>
                </div>
            </div>
        </div>


    </div>
</div>

<div class="modal fade bs-example-modal-lg" id="orderStatusModel"tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
     <div class="modal-dialog modal-lg">
         <div class="modal-content">
             <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                <h4 class="modal-title" id="mySmallModalLabel">Small modal</h4>
             </div>
             <div class="modal-body" id="displayOrder">
                
             </div>
         </div>
     </div>
 </div>

<script>
    $(document).ready(function() {
        $("#dataRespTable").DataTable({responsive: true});
        $("#dataRespTable_filter").find("input").addClass("form-control");
    });
</script>
<script>
    function  getOrderTable(){
        $.ajax({
            url: "<?php echo site_url();?>WashControl/getadmin",
            type: "post",
            success:function(result){
                $("#adminDisplay").html(result);
                $("#dataRespTable_filter").find("input").addClass("form-control");
            }
        });
    }

  
</script>

 