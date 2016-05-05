<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"><?php echo $title; ?></h1>
        </div>
    </div><!-- /.row -->
    
    <?php if (Auth::has_access('access.level3')) { ?>
    <div class="row">
        <div class="col-lg-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    ユーザー追加
                </div><!-- /.panel-heading -->
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
                                
                                echo Form::open(array('role' => 'form'));
                                echo '<div class="form-group"><label>ユーザー名</label>';
                                echo Form::input('username', $username, array('class' => 'form-control', 'placeholder' => 'ユーザー名'));
                                echo '</div>';
                                
                                echo '<div class="form-group"><label>メールアドレス</label>';
                                echo Form::input('email', $email, array('class' => 'form-control', 'placeholder' => 'メールアドレス'));
                                echo '</div>';
                                
                                echo '<div class="form-group"><label>権限グループ</label>';
                                echo Form::select('group', $groupid, Config::get('simpleauth.groups'), array('class' => 'form-control'));
                                echo '</div>';
                                
                                echo '<div class="form-group"><label>パスワード</label>';
                                echo Form::password('passwrod', "", array('class' => 'form-control', 'placeholder' => 'パスワード'));
                                echo '</div>';
                                
                                echo '<div class="form-group"><label>パスワード（確認用）</label>';
                                echo Form::password('passwordcnf', "", array('class' => 'form-control', 'placeholder' => 'パスワード'));
                                echo '</div>';
                                
                                echo Form::submit('passwordcnf', "追加する", array('class' => 'btn btn-default'));
                                echo Form::close();
                            ?>
                        </div><!-- /.col-lg-6 (nested) -->
                    </div><!-- /.row (nested) -->
                </div><!-- /.panel-body -->
            </div><!-- /.panel -->
        </div><!-- /.col-lg-6 -->
    </div><!-- /.row -->
    <?php } ?>

</div><!-- /#page-wrapper -->
