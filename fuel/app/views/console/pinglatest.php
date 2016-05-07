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
                    最新データ
                </div><!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>端末番号</th>
                                    <th>日時（DateTime）</th>
                                    <th>日時（UnixTime）</th>
                                    <th>作成日</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $lastedList = Model_Ping::find(array(
                                    'order_by' => array(
                                        'created_at' => 'desc',
                                    ),
                                    'limit' => $limit,
                                ));
                                if ($lastedList != null)
                                {
                                    foreach ($lastedList as $ping)
                                    {
                                        echo '<tr>';
                                        echo '<td>'.$ping['id'].'</td>';
                                        echo '<td>'.$ping['termid'].'</td>';
                                        echo '<td>'.$ping['param_datetime'].'</td>';
                                        echo '<td>'.$ping['param_unixtime'].'</td>';
                                        echo '<td>'.$ping['created_at'].'</td>';
                                        echo '</tr>';
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div><!-- /.table-responsive -->
                </div><!-- /.panel-body -->
            </div><!-- /.panel -->
        </div><!-- /.col-lg-12 -->
        
        <div class="col-lg-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    表示オプション
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <?php 
                                echo Form::open(array('role' => 'form'));
                                echo '<div class="form-group">';
                                echo Form::label('表示個数');
                                echo Form::select('limit', $limit, array(
                                    10 => '10',
                                    50 => '50',
                                    100 => '100',
                                ), array('class' => 'form-control'));
                                echo '</div>';
                                                                
                                echo Form::submit('submit', "更新", array('class' => 'btn btn-default'));
                                echo Form::close();
                            ?>
                        </div><!-- /.col-lg-12 (nested) -->
                    </div><!-- /.row (nested) -->
                </div><!-- /.panel-body -->
            </div><!-- /.panel -->
        </div><!-- /.col-lg-6 -->
    </div><!-- /.row -->
</div><!-- /#page-wrapper -->
