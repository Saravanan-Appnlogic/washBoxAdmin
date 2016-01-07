<style>
    h4 b
    {
        font-weight:600;
    }
</style>
<div class="page-body">
    <div class="row" ng-app="myApp" ng-controller="adminController">    
        <div class="col-md-4 col-sm-6 col-xs-12" >
            <div class="widget">
                <div class="widget-header bg-blue">
                    <i class="widget-icon fa fa-check"></i>
                    <span class="widget-caption">Search order here</span>
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
                        <a >
                            <i class="fa fa-times"></i>
                        </a>
                    </div><!--Widget Buttons-->
                </div>
                <div class="widget-body">
                    <div class="row">
                        <div class="col-md-12">
                        <form role="form" ng-submit="searchOrderForm()" > 
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Enter order id" id="" ng-model="id">
                                <span class="input-group-btn">
                                    <button type="submit" class="btn btn-warning shiny fa fa-search"></button>
                                </span>
                            </div>                    
                        </form>
                        </div>
                    </div>
                    <div class="row">
                      <div class="hidden-xs horizantalHrDiv"><center><img class="horizantalHr img-responsive" style="width:80%"src="<?php echo site_url();?>application/assets/img/shadow2.png"></center></div>
                    </div>
                    <div class="row">                    
                        <div class="col-md-12">
                            <div id="QR-Code" class="container" style="width:100%">
                                <div class="panel panel-primary">
                                    <div class="panel-heading" style="display: inline-block;width: 100%;">
                                        <div style="width:50%;float:right;margin-top: 5px;margin-bottom: 5px;text-align: right;">
                                            <!--<select id="cameraId" class="form-control" style="display: inline-block;width: auto;"></select>-->
                                            <button id="play" data-toggle="tooltip" title="Play" type="button" class="btn btn-success shiny"><span class="glyphicon glyphicon-play"></span></button>
                                        </div>
                                    </div>
                                    <div class="panel-body">
                                        <div >
                                            <div class="embed-responsive embed-responsive-4by3" >
                                                <canvas id="qr-canvas" class="qr-canvas embed-responsive-item"></canvas>
                                                <input type="text" class="form-control" id="scanned-QR" class="scanned-QR" disabled="disabled">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>  
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8 col-sm-6 col-xs-12" >
            <div class="widget">
                <div class="widget-header bg-blue">
                    <i class="widget-icon fa fa-check"></i>
                    <span class="widget-caption">Your order</span>
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
                        <a >
                            <i class="fa fa-times"></i>
                        </a>
                    </div><!--Widget Buttons-->
                </div>
                <div class="widget-body">
                    <div class="row" id="orderResult">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    var App = angular.module('myApp', []);
    function adminController($scope, $http) {
        $scope.searchOrderForm = function ()
        {
            var id=$scope.id;
            id=id.split("-");
            id=id[1];
            $.ajax({
                url: "<?php echo site_url();?>WashControl/searchPlaceOrder",
                type: "post",
                data:{id:id},
                success:function(result){
                    $("#orderResult").html(result);
                }
            });
        }
    }
  
    $('#scanned-QR').change(function(){
        var id = $('#scanned-QR').val();
        id=id.split("-");
        id=id[1];
        $.ajax({
            url: "<?php echo site_url();?>WashControl/searchPlaceOrder",
            type: "post",
            data:{id:id},
            success:function(result){
                $("#orderResult").html(result);
            }
        });
    });
</script>
<script type="text/javascript" src="<?php echo base_url(); ?>application/assets/plugins/js/qrcodelib.js"></script>	
<script type="text/javascript" src="<?php echo base_url(); ?>application/assets/plugins/js/WebCodeCam.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>application/assets/plugins/js/main.js"></script>
