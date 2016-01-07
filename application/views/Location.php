
                <div class="page-body" ng-app="myApp" ng-controller="FormController">
                    <div class="row">
                        <div class="col-lg-12 col-sm-12 col-xs-12">
                            <div class="widget">
                            <div class="widget-header bg-blue">
                                <i class="widget-icon fa fa-arrow-left"></i>
                                <span class="widget-caption">Colored Header</span>
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
                                    <a data-toggle="dispose" href="#">
                                        <i class="fa fa-times"></i>
                                    </a>
                                </div><!--Widget Buttons-->
                            </div><!--Widget Header-->
                            <div class="widget-body">
                                  <form class="form-inline" ng-submit="submitForm()" role="form" method="post">
                                    <div class="form-group">
                                        <input id="definput" class="form-control" type="text" ng-model="location" name="location" placeholder="location">
                                    </div>
                                    <button type="submit" class="btn btn-primary">Save</button><hr>
                                </form>
                                <div class="form-group"  >
                                    <button type="button" class="btn btn-info shiny" ng-repeat="data in names" ng-click="deleteloc(data.location,$index)">{{data.location}}<i class="fa fa-times" style="color: #B82525;margin-left: 10px;"></i></button>                                                    
                                </div>
                            </div><!--Widget Body-->
                        </div>
                    </div>
                </div>
                <!-- /Page Body -->
            </div>
            <!-- /Page Content -->
        </div>
        <!-- /Page Container -->
        <!-- Main Container -->
    </div>

</body>
</html>
<script>
    var App = angular.module('myApp', []);
    function FormController($scope, $http) {
        $scope.names=[];
        $http.post('<?php echo site_url('WashControl/get_list'); ?>').success(function($data)
        {
        console.log( $data);
        $scope.names=$data; });
        //get end
        //save data to database
        $scope.location = undefined;
        $scope.submitForm = function ()
        {
        console.log("posting data....");
        $http({
        method: 'POST',
        url: '<?php echo base_url(); ?>WashControl/add',
        headers: {'Content-Type': 'application/json'},
        data: JSON.stringify({location: $scope.location})
        }).success(function(data, status, headers, config){
        $scope.names.push({location: data.status});
        console.log( $scope.names);
        //$scope.message = data.status;
        });
        }
        //detele option
        $scope.deleteloc = function (location,index) { 
        //alert(location);
        $http({ method: 'post',
                url: "<?php echo base_url('WashControl/del_location'); ?>",
                headers: {'Content-Type': 'application/json'},
                data: JSON.stringify({location: location})
        }).success(function(location){
                    $scope.names.splice(index, 1);
        });
        }
    }
</script>
