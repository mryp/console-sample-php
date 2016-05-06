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
                                                                
                                echo Form::submit('submit', "送信", array('class' => 'btn btn-default'));
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
                                echo Form::label('識別番号');
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
                                                                
                                echo Form::submit('submit', "送信", array('class' => 'btn btn-default'));
                                echo Form::close();
                            ?>
                        </div><!-- /.col-lg-12 (nested) -->
                    </div><!-- /.row (nested) -->
                </div><!-- /.panel-body -->
            </div><!-- /.panel -->
        </div><!-- /.col-lg-6 -->
    </div><!-- /.row -->

</div><!-- /#page-wrapper -->
