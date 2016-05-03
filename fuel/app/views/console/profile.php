<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"><?php echo $title; ?></h1>
        </div>
    </div><!-- /.row -->
    
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    ユーザー情報
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <?php 
                                if (isset($success_message))
                                {
                                    echo '<div class="alert alert-success">';
                                    echo $success_message;
                                    echo '</div>';   
                                }
                                if (isset($error_message))
                                {
                                    echo '<div class="alert alert-danger">';
                                    echo $error_message;
                                    echo '</div>';   
                                }
                            ?>
                            <form role="form" method="post">
                                <div class="form-group">
                                    <label>ユーザー名</label>
                                    <p class="form-control-static"><?php echo $username; ?></p>
                                </div>
                                <div class="form-group">
                                    <label>メールアドレス</label>
                                    <input name="email" value="<?php echo $email; ?>" type="text" class="form-control" placeholder="メールアドレス">
                                </div>
                                <div class="form-group">
                                    <label>グループ</label>
                                    <p class="form-control-static"><?php echo $groupname; ?></p>
                                </div>
                                <button type="submit" class="btn btn-default">設定を更新する</button>
                            </form>
                        </div><!-- /.col-lg-6 (nested) -->
                    </div><!-- /.row (nested) -->
                </div><!-- /.panel-body -->
            </div><!-- /.panel -->
        </div><!-- /.col-lg-12 -->
    </div><!-- /.row -->
</div><!-- /#page-wrapper -->
