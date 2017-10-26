<!DOCTYPE html>
<html>
    <link rel="stylesheet" href="../css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="../css/jquery-confirm.min.css" />

    <script src="../js/jquery-3.2.1.min.js"></script>
    <script src="../js/vue.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/jquery-confirm.min.js"></script>
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

            <table class="table table-bordered list-table text-center">
              <tr>
                <th><input type="checkbox"></th>
                <th>ID</th>
                <th>鸽主名称</th>
                <th>性别</th>
                <th>联系电话</th>
                <th>地区</th>
                <th>操作</th>
              </tr>

              <tr>
                <td><input type="checkbox"></td>
                <td>1</td>
                <td>张三</td>
                <td>男</td>
                <td>15158954852</td>
                <td>福建龙岩</td>
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
            <nav aria-label="Page navigation" class="list-page">
              <ul class="pagination">
                <li>
                  <a href="#" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                  </a>
                </li>

                <li class="active"><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">5</a></li>

                <li>
                  <a href="#" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                  </a>
                </li>
              </ul>
            </nav>
            <!-- 分页结束 -->

            <?php include "member-add.html"; ?>
            <?php include "member-input.html"; ?>
        </div>
    </body>
</html>