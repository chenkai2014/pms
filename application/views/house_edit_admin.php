<?php ?>
<div>
    <form method="get" action="/index.php/house_admin/edit">
        <input type="hidden" name="house_id" value="<?php echo $house_info['house_id']; ?>">
        停车位ID：<input type="text" name="carport_id" value="<?php echo $house_info['carport_id']; ?>">
        楼宇ID：<input type="text" name="building_id" value="<?php echo $house_info['building_id']; ?>">
        房间名：<input type="text" name="house_name" value="<?php echo $house_info['house_name']; ?>">
        电话：<input type="text" name="telephone" value="<?php echo $house_info['telephone']; ?>">
        单元名：<input type="text" name="unit_num" value="<?php echo $house_info['unit_num']; ?>">
        房间状态：<input type="text" name="status" value="<?php echo $house_info['status']; ?>">
        迁入时间：<input type="text" name="move_in_time" value="<?php echo $house_info['move_in_time']; ?>">
        迁出时间：<input type="text" name="move_out_time" value="<?php echo $house_info['move_out_time']; ?>">
        备注：<input type="text" name="remark" value="<?php echo $house_info['remark']; ?>">
        <input type="submit" value="更新">
    </form>
</div>
