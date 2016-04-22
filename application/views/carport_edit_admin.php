<?php ?>
<div>
    <form method="get" action="/index.php/carport_admin/edit">
        <input type="hidden" name="carport_id" value="<?php echo $carport_info['carport_id']; ?>">
        停车位名：<input type="text" name="carport_name" value="<?php echo $carport_info['carport_name']; ?>">
        面积：<input type="text" name="area" value="<?php echo $carport_info['area']; ?>">
        车牌：<input type="text" name="license" value="<?php echo $carport_info['license']; ?>">
        备注：<input type="text" name="remark" value="<?php echo $carport_info['remark']; ?>">
        <input type="submit" value="更新">
    </form>
</div>
