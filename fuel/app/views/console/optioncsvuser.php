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
                    CSVファイルアップロード
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
                                
                                echo Form::open(array('role' => 'form', 'enctype' => 'multipart/form-data'));
                                echo '<div class="form-group">';
                                echo Form::label('CSVファイル');
                                echo Form::file('csvfile');
                                echo '</div>';
                                
                                echo Form::label('注意事項');
                                echo '<p>';
                                echo 'CSVファイルは下記の書式で入力してください。<br />';
                                echo '<pre>ユーザー名,メールアドレス,グループ権限,パスワード</pre>';
                                echo '書式エラーが発生した場合でも中断せず続けて登録処理を行います。<br />';
                                echo 'すでに登録済みのユーザーが存在する場合はエラーとして扱い、更新処理等は行いません。<br />';
                                echo '</p>';
                                
                                echo Form::submit('submit', "登録する", array('class' => 'btn btn-default'));
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
