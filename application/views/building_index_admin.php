<?php ?>
<div>
    <form method="get" action="/index.php/Building_admin/index">
        <table>
            <tr>
                <td>楼宇号：<input type="text" name="building_num"></td>
                <td><input type="submit" value="搜索"></td>
                <td><a href="/index.php/Building_admin/add">添加</a></td>
            </tr>
        </table>
    </form>
    <table>
        <tr>
            <td>楼宇号</td>
            <td>楼宇层数</td>
            <td>朝向</td>
            <td>备注</td>
            <td>操作</td>
        </tr>
        <?php foreach($building_list as $value){ ?>
            <tr>
                <td><?php echo $value['building_num']; ?></td>
                <td><?php echo $value['building_floor']; ?></td>
                <td><?php echo $value['orientation']; ?></td>
                <td><?php echo $value['remark']; ?></td>
                <td><a href="/index.php/Building_admin/showEdit?building_id=<?php echo $value['building_id']; ?>">编辑</a>丨<a href="/index.php/Building_admin/delete?building_id=<?php echo $value['building_id']; ?>">删除</a></td>
            </tr>
        <?php } ?>

    </table>
</div>
