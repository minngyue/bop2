<?php
$this->title = Yii::t('app','四');
?>
<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <div class="install-panel panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title text-center">PHPRAP V<?php echo Yii::$app->params['app_version']?> 安装步骤四</h3>
            </div>
            <div class="panel-body">
                <?= $this->render('/layouts/install/nav', ['step' => 4]); ?>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div style="margin-bottom: 20px;">
                                    <?php foreach ($tables as $table){
                                        echo '<p>创建数据表 <code>' . $table .'</code>  --- --- 成功</p>';
                                    }?>

                                </div>

                                <div class="progress">
                                    <div id="processbar" class="progress-bar progress-bar-info progress-bar-striped" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
                                        20%
                                    </div>
                                </div>

                                <div class="alert alert-warning fade in hidden js_success">
                                    <strong>恭喜您，PHPRAP V<?= Yii::$app->params['app_version']?>已经安装成功，如果您要重新安装，请先删除runtime/install/install.lock文件。</strong>
                                </div>

                                <div class="panel-button text-center">

                                    <a href="" class="btn btn-success js_process disabled">程序安装中</a>

                                </div>

                            </div>

                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>
<script>
    function setProcess(){
        var processbar = document.getElementById("processbar");
        processbar.style.width = parseInt(processbar.style.width) + 10 + "%";
        processbar.innerHTML = processbar.style.width;
        if(processbar.style.width == "100%"){

            $('.js_delete').removeClass('disabled');
            $('.js_success').removeClass('hidden');

            $('.js_process').attr('href', "<?= url('admin/home/index')?>").text('管理接口文档').removeClass('disabled');

            window.clearInterval(bartimer);
        }
    }

    var bartimer = window.setInterval(function () {setProcess();},100);
    //该事件按，是当文档内容完全加载完成会触发该事件。避免获取不到对象的情况。
    window.onload = function () {
        bartimer;
    }
</script>