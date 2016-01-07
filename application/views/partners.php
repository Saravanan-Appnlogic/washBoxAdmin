<style>
    h4 b{
    font-weight:600;
    }
</style>
<div class="page-body">
    <div class="widget">
        <div class="widget-header bg-blue">
            <span class="widget-caption">Admin Users</span>
        </div>
        <div class="widget-body">
            <div class=" ">
                
    
        <table id="dataRespTable" class="table table-hover table-bordered" >
            <thead class="bordered-darkorange">
                <tr>
                    <th><h3>Name</h3></th>
                    <th><h3>Email</h3></th>
                    <th><h3>Telephone</h3></th>
                    <th><h3>Nature</h3></th>
                    <th><h3>Message</h3> </th>
        
                </tr>
            </thead>
            <tbody>
                <?php foreach($partners as $row){?>
               <tr class="">
                  <td><?php echo $row['name']; ?></td>					    
                  <td><?php echo $row['email']; ?></td>
                  <td><?php echo $row['telephone']; ?></td>					    
                  <td><?php echo $row['nature']; ?></td>
                  <td><?php echo $row['message']; ?></td>
        
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
    $("#dataRespTable").DataTable();
     });
	
</script>
