<div class="page-body">
    <div ng-app="myApp" ng-controller="adminController">
  <div class="col-lg-6 col-sm-12 col-xs-12" id="categoryDisplay" >
        
    </div>
    <div class="col-lg-6 col-sm-12 col-xs-12" >
        <div class="widget">
            <div class="widget-header bordered-bottom bordered-blue">
                <span class="widget-caption"><b>Add A Category</b></span>
            </div>
            <div class="widget-body">
                <div>
                    <form role="form" ng-submit="adminUserForm()" >
                        <div class="row">
                        <div class="form-group col-md-7">
                            <label for="exampleInputEmail1">Category Name</label>
                            <input type="text" placeholder="Enter Category Name" id="" ng-model="name" class="form-control">
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
  
</div>

</div>
<script>
    function  getAdminUser(){
        $.ajax({
            url: "<?php echo site_url();?>WashControl/getCategory",
            type: "post",
            success:function(result){
                $("#categoryDisplay").html(result);
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
                url: "<?php echo site_url();?>WashControl/addCategory",
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
      url: "<?php echo site_url();?>WashControl/editCategory",
      
      type: "post",
      data: {id:id},
      dataType: "json",
      success: function(result) {
       $("#id").val(result[0].id);
       $("#Name").val(result[0].category);

      }
     });
    }
  function updateForm(){
   var id=$("#id").val();
   var name=$("#Name").val();

   $.ajax({  
    type: "POST",  
    url: "<?php echo site_url();?>WashControl/updateCategory",  
    data: {id:id,name:name},
    success: function(response)
    {
     $("#categoryEditModel").modal('hide');
     $(".modal-backdrop").remove();

      Notify('Data has been updated.', 'top-left', '10000', 'danger', 'fa-desktop', true);
        getAdminUser();
    }
   });
  } 

 function delFrom(id){
    $.ajax({
    url: "<?php echo site_url();?>WashControl/deleteCategory",
    
    type: "post",
    data: {id:id},
    success: function(result) {
    Notify('Data has been Deleted.', 'top-left', '10000', 'danger', 'fa-desktop', true);
    getAdminUser();
    }
    });
  }

  
  
</script>

