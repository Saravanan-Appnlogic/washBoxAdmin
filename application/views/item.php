<style>
    h4 b{
    font-weight:600;
    }
</style>
<div class="page-body">
    <div ng-app="myApp" ng-controller="adminController">
    <div class="col-lg-12 "><h5 class="row-title" id="row-title" onclick="$('#addItem').removeClass('hide');$(this).addClass('hide');"><i class="typcn typcn-th-small"></i>Add Item</h5></div>
    <div class="col-lg-12 col-sm-12 col-xs-12 hide"  id="addItem">
        <div class="widget">

            <div class="widget-header bg-blue">
                <i class="widget-icon fa fa-check"></i>
                <span class="widget-caption">Add An Item</span>
                <div class="widget-buttons">
                    <a data-toggle="config" href="#">
                        <i class="fa fa-cog"></i>
                    </a>
                    <a data-toggle="maximize" href="#">
                        <i class="fa fa-expand"></i>
                    </a>
                    <a data-toggle="collapse" href="#">
                        <i class="fa fa-minus"></i>
                    </a>
                    <a onclick="$('#addItem').addClass('hide');$('#row-title').removeClass('hide');" href="#">
                        <i class="fa fa-times"></i>
                    </a>
                </div><!--Widget Buttons-->
            </div>
            <div class="widget-body">
                <div>
                    <form role="form" ng-submit="adminUserForm()" >
                        <div class="row">
                        <div class="form-group col-md-6">
                            <label for="exampleInputEmail1">Item Name</label>
                            <input type="text" placeholder="Enter Item Name" id="" ng-model="name" class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="exampleInputEmail1">Category </label>
                            <select name="category_id" class="form-control" ng-model="category_id">
                                <option disabled selected value="">Select a Category</option>
                                <?php foreach($categories as $category){?>
                                <option value="<?php echo $category['id']; ?>"><?php echo $category['category']; ?></option>
                                <?php } ?>
                                
                            </select>
                                
                        </div>
                        </div>
                        <div class="row">
                        <div class="form-group col-md-6">
                            <label for="exampleInputEmail1">Washing Price</label>
                            <input type="text" placeholder="Enter Washing Price" id="" ng-model="wash" class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="exampleInputEmail1">Iron Price</label>
                            <input type="text" placeholder="Enter Iron Price" id="" ng-model="iron" class="form-control">
                        </div>
                        </div>
                        <div class="row">
                        <div class="form-group col-md-6">
                            <label for="exampleInputEmail1">Dry Cleaning Price</label>
                            <input type="text" placeholder="Enter Dry Cleaning Price" id="" ng-model="dry" class="form-control">
                        </div>

                        </div>
                        <div class="row">
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
  

  <div class="col-lg-12 col-sm-12 col-xs-12" id="ItemDisplay" >
        
    </div>


</div>

</div>

   <div class="modal fade bs-example-modal-sm" id="itemEditModel"tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="mySmallModalLabel">Edit Item</h4>
                </div>
                <div class="modal-body">
                         
                          <div class="widget-body">
                            <div id="fromUpdate">
                                <form role="form" >
                                     <div class="form-group">
                                        <label for="exampleInputEmail1">Item name</label>
                                        <input type="text" placeholder="Enter your Name" id="Name"  class="form-control" value="">
                                         
                                    </div>
                                     <div class="form-group">
                                        <label for="exampleInputEmail1">Category </label>
                                <select id="category_id"  class="form-control" >
                                <option disabled selected value="">Select a Category</option>
                                <?php foreach($categories as $category){?>
                                <option value="<?php echo $category['id']; ?>"><?php echo $category['category']; ?></option>
                                <?php } ?>
                                
                                </select>
                                    </div>
                                     <div class="form-group">
                                        <label for="exampleInputEmail1">Washing Price</label>
                                        <input type="text" placeholder="Enter Washing Price" id="wash"  class="form-control" value="">
                                         
                                    </div>
                                     <div class="form-group">
                                        <label for="exampleInputEmail1">Iron Price</label>
                                        <input type="text" placeholder="Enter Iron Price" id="iron"  class="form-control" value="">
                                         
                                    </div>
                                     <div class="form-group">
                                        <label for="exampleInputEmail1">Dry Cleaning Price</label>
                                        <input type="text" placeholder="Enter Dry Cleaning Price" id="dry"  class="form-control" value="">
                                         
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
    function  getAdminUser(){
        $.ajax({
            url: "<?php echo site_url();?>WashControl/getItem",
            type: "post",
            success:function(result){
                $("#ItemDisplay").html(result);
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
            var category_id=$scope.category_id;
            var wash=$scope.wash;
            var dry=$scope.dry;
            var iron=$scope.iron
            $.ajax({
                url: "<?php echo site_url();?>WashControl/addItem",
                type: "post",
                data:{name:name,category_id:category_id,wash:wash,iron:iron,dry:dry},
                success:function(result){
                        getAdminUser();
                    $("#dataRespTable_filter").find("input").addClass("form-control");
                }
            });
        }
    }


    function editAdminUser(id){
     $.ajax({
      url: "<?php echo site_url();?>WashControl/editItem",
      
      type: "post",
      data: {id:id},
      dataType: "json",
      success: function(result) {
       $("#id").val(result[0].id);
       $("#Name").val(result[0].item_name);
       $("#wash").val(result[0].item_price_wash);
       $("#dry").val(result[0].item_price_dry);
       $("#iron").val(result[0].item_price_iron);
       $("#category_id").val(result[0].category_id);

      }
     });
    }
  function updateForm(){
   var id=$("#id").val();
   var name=$("#Name").val();
   var wash=$("#wash").val();
    var dry=$("#dry").val();
   var iron=$("#iron").val();
   var category_id=$("#category_id").val();
     
   $.ajax({  
    type: "POST",  
    url: "<?php echo site_url();?>WashControl/updateItem",  
    data: {id:id,name:name,category_id:category_id,wash:wash,iron:iron,dry:dry},
    success: function(response)
    {
     $("#itemEditModel").modal('hide');
     $(".modal-backdrop").remove();

      Notify('Data has been updated.', 'top-left', '10000', 'danger', 'fa-desktop', true);
        getAdminUser();
    }
   });
  } 

 function delFrom(id){
    $.ajax({
    url: "<?php echo site_url();?>WashControl/deleteItem",
    
    type: "post",
    data: {id:id},
    success: function(result) {
    Notify('Data has been Deleted.', 'top-left', '10000', 'danger', 'fa-desktop', true);
    getAdminUser();
    }
    });
  }

  
  
</script>

