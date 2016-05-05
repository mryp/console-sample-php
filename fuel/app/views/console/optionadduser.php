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
                                echo '<div class="form-group">';
                                echo Form::label('ユーザー名');
                                echo Form::input('username', $username, array('class' => 'form-control', 'placeholder' => 'ユーザー名'));
                                echo '</div>';
                                
                                echo '<div class="form-group">';
                                echo Form::label('メールアドレス');
                                echo Form::input('email', $email, array('class' => 'form-control', 'placeholder' => 'メールアドレス'));
                                echo '</div>';
                                
                                echo '<div class="form-group">';
                                echo Form::label('権限グループ');
                                $groupList = array();
                                foreach (Config::get('simpleauth.groups') as $id => $group)
                                {
                                    $groupList[$id] = $group['name'];
                                }
                                echo Form::select('groupid', $groupid, $groupList, array('class' => 'form-control'));
                                echo '</div>';
                                
                                echo '<div class="form-group">';
                                echo Form::label('パスワード');
                                echo Form::password('password', "", array('class' => 'form-control', 'placeholder' => 'パスワード'));
                                echo '</div>';
                                
                                echo '<div class="form-group">';
                                echo Form::label('パスワード（確認用）');
                                echo Form::password('passwordcnf', "", array('class' => 'form-control', 'placeholder' => 'パスワード'));
                                echo '</div>';
                                
                                echo Form::submit('submit', "追加する", array('class' => 'btn btn-default'));
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
