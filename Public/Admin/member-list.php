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

              <span class="pull-right">共 30 条数据</span>
            </nav>

            <table class="table table-bordered list-table text-center" id="userTable">
              <tr>
                <th><input type="checkbox"></th>
                <th>ID</th>
                <th>鸽主名称</th>
                <th>联系电话</th>
                <th>地区</th>
                <th>操作</th>
              </tr>

              <tr v-for="(item, index) in listTable">
                <td><input type="checkbox"></td>
                <td>{{ index+1 }}</td>
                <td>{{ item.name }}</td>
                <td>{{ item.tel }}</td>
                <td>{{ item.addr }}</td>
                <td class="list-td">
                    <a href="#" title="录入参赛卡">
                        <span
                            class="glyphicon glyphicon-pencil"
                            data-toggle="modal"
                            data-target=".bs-example-modal-lg"
                        >
                        </span>
                    </a>
                    <a href="#" title="编辑">
                        <span
                            class="glyphicon glyphicon-wrench"
                            data-toggle="modal"
                            data-target=".bs-example-modal-sm"
                        >
                        </span>
                    </a>
                    <a href="#" title="删除"><span class="glyphicon glyphicon-trash"></span></a>
                </td>
              </tr>
            </table>

            <!-- 分页 -->
            <div id="userPage"></div>
            <!-- 分页结束 -->

            <?php include "member-add.html"; ?>
            <?php include "member-input.html"; ?>
        </div>

        <script>
            var listData = [];

            main();

            /**
             * 方法调用
             */
            function main() {
                getUserInfo();
                userPage();
            }

            /**
             * 请求用户数据
             */
            function getUserInfo() {
                $.ajax({
                    url: `${app.serverUrl}admin.php/Admin/User/get_user_info`,
                    data: {
                        "page": 3
                    },
                    success: function(data) {
                        console.log(data);
                        listRend(data);
                    }
                });
            }

            /**
             * vue 进行列表渲染
             */
            function listRend(data) {
                var userTable = new Vue({
                    el: "#userTable",
                    data: {
                        listTable: data
                    }
                });
            }

            /**
             * 用户分页
             */
            function userPage() {
                layui.use(['laypage', 'layer'], function() {
                    var laypage = layui.laypage,
                        layer = layui.layer;

                    laypage.render({
                        elem: 'userPage',
                        count: 70,
                        jump: function(obj){
                            console.log(obj)
                        }
                    });
                });
            }
        </script>
    </body>
</html>