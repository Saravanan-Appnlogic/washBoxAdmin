<select onchange="washType(this)" name="item_id" class="form-control ITEM_ID" >
    <option disabled selected value="">Select An Item</option>
    <?php foreach($item as $row){?>
    <option value="<?php echo $row['id']; ?>"><?php echo $row['item_name']; ?></option>
    <?php } ?>

</select>
