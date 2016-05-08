<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"><?php echo $title; ?></h1>
        </div>
    </div><!-- /.row -->
    
    <div class="row">
        <div class="col-lg-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    aip/test.json
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <?php 
                                echo Form::open(array('role' => 'form', 'action' => 'api/test.json'));
                                echo '<div class="form-group">';
                                echo Form::label('パラメータ1');
                                echo Form::input('param1', '', array('class' => 'form-control'));
                                echo '</div>';
                                                                
                                echo Form::submit('submit', "送信", array('class' => 'btn btn-primary'));
                                echo Form::close();
                            ?>
                        </div><!-- /.col-lg-12 (nested) -->
                    </div><!-- /.row (nested) -->
                </div><!-- /.panel-body -->
            </div><!-- /.panel -->
        </div><!-- /.col-lg-6 -->
    
        <div class="col-lg-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    aip/ping.json
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <?php 
                                echo Form::open(array('role' => 'form', 'action' => 'api/ping.json'));
                                echo '<div class="form-group">';
                                echo Form::label('端末番号');
                                echo Form::input('termid', '1', array('class' => 'form-control'));
                                echo '</div>';
                                echo '<div class="form-group">';
                                echo Form::label('日付データ（YYYY-MM-DD HH:MM:SS）');
                                echo Form::input('datetime', date('Y/m/d H:i:s'), array('class' => 'form-control'));
                                echo '</div>';
                                echo '<div class="form-group">';
                                echo Form::label('日付データ（UnixTime）');
                                echo Form::input('unixtime', time(), array('class' => 'form-control'));
                                echo '</div>';
                                                                
                                echo Form::submit('submit', "送信", array('class' => 'btn btn-primary'));
                                echo Form::close();
                            ?>
                        </div><!-- /.col-lg-12 (nested) -->
                    </div><!-- /.row (nested) -->
                </div><!-- /.panel-body -->
            </div><!-- /.panel -->
        </div><!-- /.col-lg-6 -->
        
        <div class="col-lg-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    aip/pingbigtestdata.json
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <?php 
                                echo Form::open(array('role' => 'form', 'action' => 'api/pingbigtestdata.json'));
                                echo '<div class="form-group">';
                                echo Form::label('作成個数');
                                echo Form::input('count', '100', array('class' => 'form-control'));
                                echo '</div>';
                                
                                echo Form::submit('submit', "送信", array('class' => 'btn btn-primary'));
                                echo Form::close();
                            ?>
                        </div><!-- /.col-lg-12 (nested) -->
                    </div><!-- /.row (nested) -->
                </div><!-- /.panel-body -->
            </div><!-- /.panel -->
        </div><!-- /.col-lg-6 -->
        
        <div class="col-lg-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    aip/point.json
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <?php 
                                echo Form::open(array('role' => 'form', 'action' => 'api/point.json'));
                                echo '<div class="form-group">';
                                echo Form::label('端末番号');
                                echo Form::input('termid', '1', array('class' => 'form-control'));
                                echo '</div>';
                                echo '<div class="form-group">';
                                echo Form::label('タイプ');
                                echo Form::input('type', '1', array('class' => 'form-control'));
                                echo '</div>';
                                echo '<div class="form-group">';
                                echo Form::label('値');
                                echo Form::input('value', '1', array('class' => 'form-control'));
                                echo '</div>';
                                echo '<div class="form-group">';
                                echo Form::label('登録日データ（YYYY-MM-DD HH:MM:SS）（空の時は送信時の時間を使用）');
                                echo Form::input('created_at', date('Y/m/d H:i:s'), array('class' => 'form-control'));
                                echo '</div>';
                                                                
                                echo Form::submit('submit', "送信", array('class' => 'btn btn-primary'));
                                echo Form::close();
                            ?>
                        </div><!-- /.col-lg-12 (nested) -->
                    </div><!-- /.row (nested) -->
                </div><!-- /.panel-body -->
            </div><!-- /.panel -->
        </div><!-- /.col-lg-6 -->
    </div><!-- /.row -->

</div><!-- /#page-wrapper -->
