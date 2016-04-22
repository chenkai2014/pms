<?php ?>
<div>
    <form method="get" action="/index.php/Carport_admin/index">
        <table>
            <tr>
                <td>车牌号：<input type="text" name="license"></td>
                <td>车位名：<input type="text" name="carport_name"></td>
                <td><input type="submit" value="搜索"></td>
                <td><a href="/index.php/Carport_admin/add">增加车位</a></td>
            </tr>
        </table>
    </form>
    <table>
        <tr>
            <td>车位名</td>
            <td>车位面积</td>
            <td>车牌号</td>
            <td>备注</td>
            <td>操作</td>
        </tr>
        <?php foreach($carport_list as $value){ ?>
            <tr>
                <td><?php echo $value['carport_name']; ?></td>
                <td><?php echo $value['area']; ?></td>
                <td><?php echo $value['license']; ?></td>
                <td><?php echo $value['remark']; ?></td>
                <td><a href="/index.php/Carport_admin/showEdit?carport_id=<?php echo $value['carport_id']; ?>">编辑</a>丨<a href="/index.php/Carport_admin/delete?carport_id=<?php echo $value['carport_id']; ?>">删除</a></td>
            </tr>
        <?php } ?>

    </table>
</div>
