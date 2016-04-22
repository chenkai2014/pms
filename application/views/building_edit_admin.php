<?php ?>
<div>
    <form method="get" action="/index.php/building_admin/edit">
        <input type="hidden" name="building_id" value="<?php echo $building_info['building_id']; ?>">
        楼宇号：<input type="text" name="building_num" value="<?php echo $building_info['building_num']; ?>">
        楼宇层数：<input type="text" name="building_floor" value="<?php echo $building_info['building_floor']; ?>">
        朝向：<input type="text" name="orientation" value="<?php echo $building_info['orientation']; ?>">
        备注：<input type="text" name="remark" value="<?php echo $building_info['remark']; ?>">
        <input type="submit" value="更新">
    </form>
</div>
