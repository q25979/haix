<!DOCTYPE html>
<html>
    <link rel="stylesheet" href="../css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="../css/jquery-confirm.min.css" />
    <link rel="stylesheet" href="../lib/layui/css/layui.css" />

    <script src="../js/jquery-3.2.1.min.js"></script>
    <script src="../js/vue.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/jquery-confirm.min.js"></script>
    <script src="../lib/layui/layui.js"></script>
    <script src="../lib/layui/layui.all.js"></script>
    <script src="../js/xadmin.js"></script>
    <script src="../js/config.js"></script>
    <script src="js/menber-list.js"></script>

    <body>
        <div class="x-body">
            <blockquote class="layui-elem-quote">欢迎使用 广东海翔赛鸽后台后台管理</blockquote>

            <nav class="navbar navbar-default">
              <button class="btn btn-danger list-btn" id="selectDel">批量删除</button>

              <button
                class="btn btn-success list-btn"
                data-toggle="modal"
                data-target=".bs-example-modal-sm">
                添加
              </button>

              <span class="pull-right" id="sumData"></span>
            </nav>

            <table class="table table-bordered list-table text-center" id="userTable">
              <tr>
                <th><input type="checkbox" id="allSelect"></th>
                <th>序号</th>
                <th>鸽主名称</th>
                <th>联系电话</th>
                <th>地区</th>
                <th>参赛鸽足环号</th>
                <th>羽色</th>
                <th>大团体</th>
                <th>小团体</th>
                <th>备注</th>
                <th>操作</th>
              </tr>

              <tr v-for="(item, index) in listTable">
                <td><input type="checkbox" class="select_box"></td>
                <td>{{ (index+1) + (curr * 10) }}</td>
                <td>{{ item.name }}</td>
                <td>{{ item.tel }}</td>
                <td>{{ item.addr }}</td>
                <td>{{ item.number }}</td>
                <td>{{ item.color }}</td>
                <td>{{ item.big_group }}</td>
                <td>{{ item.small_group }}</td>
                <td>{{ item.remarks }}</td>
                <td class="list-td">
                    <a v-on:click="openWindow(item.id)" title="编辑">
                        <span
                            class="glyphicon glyphicon-pencil"
                            data-toggle="modal"
                            data-target=".bs-example-modal-lg"
                        >
                        </span>
                    </a>
                    <a @click="delMember(item.id)" title="删除"><span class="glyphicon glyphicon-trash"></span></a>
                </td>
              </tr>
            </table>

            <!-- 分页 -->
            <div id="userPage"></div>
            <hr class="hr15">
            <!-- 分页结束 -->

            <?php include "member-add.html"; ?>
        </div>
    </body>
</html>