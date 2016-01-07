   <style>
    .well{
        box-shadow:none;
    }
   </style>
   
    <div class="widget">
        <div class="widget-header bordered-bottom bordered-blue">
            <span class="widget-caption">Admin Users</span>
        </div>
        <div class="widget-body">
            <div class="well ">
                
                <table id="dataRespTable" class="table table-hover table-bordered" >
                    <thead class="bordered-darkorange">
                        <tr>
                            <th><h3>Name</h3></th>
                            <th><h3>Role</h3></th>
                            <th><h3>Action</h3> </th>

                           
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($admin as $row){?>
                       <tr class="">
                          
                          <td><?php echo $row['name']; ?></td>					    
                          <td><?php echo $row['role']; ?></td>
                          <td><button onclick="editAdminUser(<?php echo $row['id']; ?>)"  data-toggle="modal" data-target=".bs-example-modal-sm" class="btn btn-info btn-xs edit"><i class="fa fa-edit"></i>Edit</button>
                          <button onclick="delFrom(<?php echo $row['id']; ?>)" class="btn btn-danger btn-xs delete"><i class="fa fa-trash-o"></i> Delete</button></td>
                        </tr>
                        <?php } ?>
                    </tbody>
               </table>
            </div>
        </div>
    </div>
   <div class="modal fade bs-example-modal-sm" id="adminEditModel"tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="mySmallModalLabel">Small modal</h4>
                </div>
                <div class="modal-body">
                         
                          <div class="widget-body">
                            <div id="fromUpdate">
                                <form role="form" >
                                     <div class="form-group">
                                        <label for="exampleInputEmail1">Name</label>
                                        <input type="text" placeholder="Enter your Name" id="Name"  class="form-control" value="">
                                         
                                    </div>
                                     <div class="form-group">
                                      <label for="exampleInputPassword1">Password</label>
                                       <input type="text" placeholder="Password"  id="Password" class="form-control" value="">
                                   </div>
                                       <div class="form-group">
                                         <label for="exampleInputEmail1">Role</label>
                                         <select name="country" id="role"class="form-control" ng-model="role">
                                <option disabled selected>Select a Role</option>
                                <option value="Employee">Employee</option>
                                <option value="Manager">Manager</option>
                                <option value="Admin">Admin</option>
                                
                            </select>
                                         <div class="form-group">
                                     
                                      <input type="hidden" name="id" id="id"/>
                                   </div>
                                     </div>
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
