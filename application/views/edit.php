 <html>
 <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="mySmallModalLabel">Small modal</h4>
                </div>
                <div class="modal-body">
                         
                          <div class="widget-body">
                                            <div>
                                              <form role="form" ng-submit="adminUserForm()" action="<?php echo base_url() ?>WashControl/update">
                                                   <div class="form-group">
                                                      <label for="exampleInputEmail1">Name</label>
                                                      <input type="text" placeholder="Enter your Name" id="" ng-model="name" class="form-control" value="<?php echo $row->name?>">
                                                  </div>
                                                   <div class="form-group">
                                                    <label for="exampleInputPassword1">Password</label>
                                                     <input type="text" placeholder="Password" ng-model="password" id="exampleInputPassword1" ng-model="name"class="form-control" value="<?php echo $row->password?>">
                                                 </div>
                                                     <div class="form-group">
                                                       <label for="exampleInputEmail1">Role</label>
                                                       <input type="text" name="country" class="form-control" ng-model="role" value="<?php echo $row->role?>">
                                                   </div>
                                                    <button type="submit" class="btn btn-blue">Submit</button>
                                                </form>
                                            </div>
                </div>
                                      
                </div>
            </div>
        </div>
    </div>
    </html>