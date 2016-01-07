<style>
    .widget-boddy {
    background-color: #fbfbfb;
    box-shadow: 1px 0 10px 1px rgba(0, 0, 0, 0.3);
    height: 100%;
    padding: 50px;
}
</style>
<!--
WASHBOX ADMIN PANEL
-->

                <div class="page-body" ng-app="myApp" ng-controller="FormController">
                    <div class="well with-header  with-footer">
                                <div class="header bg-blue">
                                    Simple Table With Hover
                                </div>
                                <table id="dataRespTable" class="table table-hover">
                                    <thead class="bordered-darkorange">
                                        <tr>
                                                            <th>Pick Up Date</th>
                                                            <th>Delivery Date</th>
                                                            <th>Pick Up Time </th>
                                                            <th>Delivery Time</th>
                                                            <th>Delivery Notes</th>
                                                            
                                                            <th>Current Time</th>
                                                           
                                                        </tr>
                                    </thead>
                                    <tbody>
                                                         <?php foreach($tableDetails as $row){?>
                                                        <tr class="">
                                                           
                                                           <td><?php echo $row['pick_up_date']; ?></td>					    
                                                           <td><?php echo $row['delivery_date']; ?></td>
                                                           <td><?php echo $row['pick_up_time']; ?></td>
                                                           <td><?php echo $row['delivery_time']; ?></td>				    
                                                           <td><?php echo $row['delivery_notes']; ?></td>
                                                           <td><?php echo $row['current_time']; ?></td>
                                                       </tr>
                                                        <?php } ?>
                                                    </tbody>
                                </table>

                            </div>

                </div>
                <!-- /Page Body -->

    

    
    
</body>
</html>
<script>
	$(document).ready(function() {
    $("#dataRespTable").DataTable();
     });
	
</script>
