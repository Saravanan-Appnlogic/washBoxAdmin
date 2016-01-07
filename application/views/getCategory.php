   <style>
    .well{
        box-shadow:none;
    }
   </style>
   
    <div class="widget">
        <div class="widget-header bg-blue">
            <span class="widget-caption">Categories</span>
        </div>
        <div class="widget-body">
            <div class="well ">
                
                <table id="dataRespTable" class="table table-hover table-bordered" >
                    <thead class="bordered-blue">
                        <tr>
                            <th><h4><b>Category</b></h4></th>

                            <th><h4><b>Action</b></h4></th>

                           
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($category as $row){?>
                       <tr class="">
                          
                          <td><?php echo $row['category']; ?></td>					    

                          <td><button onclick="editAdminUser(<?php echo $row['id']; ?>)"  data-toggle="modal" data-target=".bs-example-modal-sm" class="btn btn-info btn-xs edit"><i class="fa fa-edit"></i>Edit</button>
                          <button onclick="delFrom(<?php echo $row['id']; ?>)" class="btn btn-danger btn-xs delete"><i class="fa fa-trash-o"></i> Delete</button></td>
                        </tr>
                        <?php } ?>
                    </tbody>
               </table>
            </div>
        </div>
    </div>
   <div class="modal fade bs-example-modal-sm" id="categoryEditModel"tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="mySmallModalLabel">Edit Category</h4>
                </div>
                <div class="modal-body">
                         
                          <div class="widget-body">
                            <div id="fromUpdate">
                                <form role="form" >
                                     <div class="form-group">
                                        <label for="exampleInputEmail1">Category</label>
                                        <input type="text" placeholder="Enter your Name" id="Name"  class="form-control" value="">
                                         
                                    </div>
                                      <input type="hidden" name="id" id="id"/>
                                      <a  onclick="updateForm()" class="btn btn-blue" >Submit</a>
                                        
                                </form>
                                
                                
                              </div>
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
