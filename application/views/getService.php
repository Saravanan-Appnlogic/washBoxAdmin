<?php

?>
<select onchange="Quantity(this)" name="service_type" class="form-control SERVICE_ID" >
    <option disabled selected value="">Select An Service</option>
    <option value="<?php echo $item[0]["item_price_wash"]?>">Washing</option>
    <option value="<?php echo $item[0]["item_price_iron"]?>">Iron</option>
    <option value="<?php echo $item[0]["item_price_dry"]?>">Dry</option>
</select>