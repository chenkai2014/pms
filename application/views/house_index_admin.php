<?php ?>
<div>
    <form method="get" action="/index.php/house_admin/index">
        <table>
            <tr>
                <td>房间名：<input type="text" name="house_name"></td>
                <td>电话号码：<input type="text" name="telephone"></td>
                <td>单元号：<input type="text" name="unit_num"></td>
                <td><input type="submit" value="搜索"></td>
                <td><a href="/index.php/house_admin/add">添加</a></td>
            </tr>
        </table>
    </form>
    <table>
        <tr>
            <td>车位ID</td>
            <td>楼宇ID</td>
            <td>房间名</td>
            <td>电话号码</td>
            <td>房间单元号</td>
            <td>房间状态</td>
            <td>迁入时间</td>
            <td>迁出时间</td>
            <td>备注</td>
        </tr>
        <?php foreach($house_list as $value){ ?>
            <tr>
                <td><?php echo $value['carport_id']; ?></td>
                <td><?php echo $value['building_id']; ?></td>
                <td><?php echo $value['house_name']; ?></td>
                <td><?php echo $value['telephone']; ?></td>
                <td><?php echo $value['unit_num']; ?></td>
                <td><?php echo $value['status']; ?></td>
                <td><?php echo $value['move_in_time']; ?></td>
                <td><?php echo $value['move_out_time']; ?></td>
                <td><a href="/index.php/house_admin/showEdit?house_id=<?php echo $value['house_id']; ?>">编辑</a>丨<a href="/index.php/house_admin/delete?house_id=<?php echo $value['house_id']; ?>">删除</a></td>
            </tr>
        <?php } ?>

    </table>
</div>
