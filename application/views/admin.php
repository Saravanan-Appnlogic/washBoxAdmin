<div class="page-body">
<div ng-app="myApp" ng-controller="adminController">
    <div class="col-lg-12 col-sm-12 col-xs-12" >
        <div class="widget">
            <div class="widget-header bordered-bottom bordered-blue">
                <span class="widget-caption">Add an admin User</span>
            </div>
            <div class="widget-body">
                <div>
                    <form role="form" ng-submit="adminUserForm()" >
                        <div class="row">
                        <div class="form-group col-md-3">
                            <label for="exampleInputEmail1">Name</label>
                            <input type="text" placeholder="Enter your Name" id="" ng-model="name" class="form-control">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" placeholder="Password" ng-model="password" id="exampleInputPassword1" ng-model="name"class="form-control">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="exampleInputPassword1">Role</label>
                           <select name="country" class="form-control" ng-model="role">
                                <option disabled selected value="">Select a Role</option>
                                <option value="Employee">Employee</option>
                                <option value="Manager">Manager</option>
                                <option value="Admin">Admin</option>
                                
                            </select>
                        </div>
                      
                            <div class="form-group col-md-3">
                            <div class="checkbox"  style="padding-top: 15px;">
                                   
                                  
                                <button type="submit" class="btn btn-blue">Submit</button>
                                </div>
                            </div>
                        </div>
                    
                    </form>   
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-12 col-sm-12 col-xs-12" id="adminDisplay" >
        
    </div>
    
</div>

</div>
<script>
    function  getAdminUser(){
        $.ajax({
            url: "<?php echo site_url();?>WashControl/getadmin",
            type: "post",
            success:function(result){
                $("#adminDisplay").html(result);
                $("#dataRespTable_filter").find("input").addClass("form-control");
            }
        });
    }
    var App = angular.module('myApp', []);
    function adminController($scope, $http) {
        $scope.role="";
        getAdminUser();

        $scope.adminUserForm = function ()
        {
            var name=$scope.name;
            var role=$scope.role;
            var password=$scope.password;
            $.ajax({
                url: "<?php echo site_url();?>WashControl/adminUser",
                type: "post",
                data:{name:name,role:role,password:password},
                success:function(result){
                        getAdminUser();
                    $("#dataRespTable_filter").find("input").addClass("form-control");
                }
            });
        }
    }


    function editAdminUser(id){
     $.ajax({
      url: "<?php echo site_url();?>WashControl/editUser",
      
      type: "post",
      data: {id:id},
      dataType: "json",
      success: function(result) {
       $("#id").val(result[0].id);
       $("#Name").val(result[0].name);
       $("#Role").val(result[0].role);
       $("#Password").val(result[0].password);
      }
     });
    }
  function updateForm(){
   var id=$("#id").val();
   var name=$("#Name").val();
   var password=$("#Password").val();
   var role=$("#role").val();
   var dataString = "&id=" + id  +  "&name=" + name + "&password=" + password + "&role=" + role;
   $.ajax({  
    type: "POST",  
    url: "<?php echo site_url();?>WashControl/update",  
    data: dataString,
    success: function(response)
    {
     $("#adminEditModel").modal('hide');
      Notify('Data has been updated.', 'top-left', '10000', 'danger', 'fa-desktop', true);
        getAdminUser();
    }
   });
  } 

 function delFrom(id){
    $.ajax({
    url: "<?php echo site_url();?>WashControl/delete",
    
    type: "post",
    data: {id:id},
    success: function(result) {
    Notify('Data has been Deleted.', 'top-left', '10000', 'danger', 'fa-desktop', true);
    getAdminUser();
    }
    });
  }

  
  
</script>

