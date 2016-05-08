<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"><?php echo $title; ?></h1>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <?php 
                                $targetMonth = "2016-02";//date('Y-m');
                                $firstDate = date("Y-m-01", strtotime($targetMonth));
                                $lastDate = date("Y-m-t", strtotime($targetMonth));
                                echo $firstDate . "<br />";
                                echo $lastDate;
                                
                                for ($date = $firstDate; strtotime($date) < strtotime($lastDate); $date = date('Y-m-d', strtotime($date . ' +1 day')))
                                {
                                }
                            ?>
                        </div><!-- /.col-lg-12 (nested) -->
                    </div><!-- /.row (nested) -->
                </div><!-- /.panel-body -->
            </div>
        </div>
    </div>
</div>
