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
                                    'limit' => 10,
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
    </div><!-- /.row -->
    <?php } ?>
</div><!-- /#page-wrapper -->
