   <style>
    .well{
        box-shadow:none;
    }
    .profile-badge i {
    background-clip: padding-box;
    background-image: linear-gradient(to bottom, #eee 0px, #fbfbfb 100%);
    border-radius: 50%;
    box-shadow: 0 1px 6px rgba(0, 0, 0, 0.176);
    color: #444;
    font-size: 23px;
    height: 30px;
    line-height: 30px;
    text-align: center;
    width: 30px;
    z-index: 100;
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
                                  Name
                                </th>
                                <th>
                                  User Type
                                </th>
                                <th>
                                   Email
                                </th>
                                <th>
                                   Phone Number
                                </th>
                                <th>
                                   Credit
                                </th>

                                <th>
                                    Order Status
                                </th>

                                
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($customers as $row){?>
                                <tr class="">
                                   
                                    <td><?php echo  $row['first_name']." ".$row['last_name']; ?></td>
                                    <td>
                                     <?php if($row['registered_type']=="DIRECT") { ?>
                                     <div class="profile-badge orange"><center><i class="fa fa-at palegreen"></i></center></div>
                                     <?php } else if($row['registered_type']=="FB") { ?>
                                     <div class="profile-badge orange"><center><i class="fa fa-facebook  blueberry" ></i></center></div>
                                     <?php } else if($row['registered_type']=="GOOGLE") { ?>
                                     <div class="profile-badge "><center><i class="fa fa-google red"></i></center></div>
                                     <?php } ?>
                                    </td>
                                    <td><?php echo $row['email']; ?></td>
                                    <td><?php echo $row['phone_number'] ; ?></td>
                                    <td class="orange"><i class="fa fa-rupee"></i> <?php echo $row['payment']; ?></td>
                                    <td>                                    
                                     <a class="btn btn-sm btn-info shiny" href="javascript:void(0);">Placed (<?php echo $row['placed']; ?>)</a>
                                     <a class="btn btn-sm btn-success shiny" href="javascript:void(0);">Completed (<?php echo $row['completed']; ?>)</a>
                                     <a class="btn btn-sm btn-danger shiny" href="javascript:void(0);">Cancelled (<?php echo $row['cancelled']; ?>)</a>
                                    </td>
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
        
        $("#dataRespTable").DataTable({responsive: true});
        $("#dataRespTable_filter").find("input").addClass("form-control");
    });
</script>
 