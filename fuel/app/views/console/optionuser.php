<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"><?php echo $title; ?></h1>
        </div>
    </div><!-- /.row -->
    
    <?php if (Auth::has_access('access.level3')) { ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    ユーザー一覧
                </div><!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="table-responsive">
                        <form role="form" method="post">
                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>ユーザー名</th>
                                        <th>メールアドレス</th>
                                        <th>グループ</th>
                                        <th>操作</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $users = Model_Users::find_all();
                                    foreach ($users as $user)
                                    {
                                        $groupName = Auth::group('Simplegroup')->get_name($user['group']);
                                        echo '<tr>';
                                        echo '<td>'.$user['id'].'</td>';
                                        echo '<td>'.$user['username'].'</td>';
                                        echo '<td>'.$user['email'].'</td>';
                                        echo '<td>'.$groupName.'</td>';
                                        if ($user['username'] == Auth::get('username'))
                                        {
                                            //自分自身は削除できないようにする
                                            echo '<td> </td>';
                                        }
                                        else
                                        {
                                            echo '<td><button type="submit" name="delete['.$user['id'].']" class="btn btn-default">削除</button></td>';
                                        }
                                        echo '</tr>';
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </form>
                    </div><!-- /.table-responsive -->
                </div><!-- /.panel-body -->
            </div><!-- /.panel -->
        </div><!-- /.col-lg-12 -->
    </div><!-- /.row -->
    <?php } ?>

</div><!-- /#page-wrapper -->
