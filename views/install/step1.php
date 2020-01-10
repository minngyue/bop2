<?php
$this->title = Yii::t('app','环境检测——安装步骤');
?>

<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <div class="install-panel panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title text-center">BOP V<?=Yii::$app->params['app_version']?> 安装步骤一</h3>
            </div>
            <div class="panel-body">
                <?= $this->render('/layouts/install/nav',['step'=>1]); ?>
                <form id="js_stepForm" role="form" action="<?php echo url('install/step1')?>" method="post">
                    <input type="hidden" name="csrf-phprap" value="<?php echo csrf_token()?>">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    系统环境检测
                                </div>
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table mb-0">
                                            <thead>
                                            <tr>
                                                <th>检查项目</th>
                                                <th>当前配置</th>
                                                <th>所需配置</th>
                                                <th>检测结果</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td>操作系统</td>
                                                <td><?=PHP_OS?></td>
                                                <td>Linux/Win</td>
                                                <td><i class="fa fa-check"></i></td>
                                            </tr>

                                            <tr>
                                                <td>PHP版本</td>
                                                <td><?=PHP_VERSION?></td>
                                                <td>>=5.6.0</td>
                                                <td>
                                                    <?php if(version_compare(PHP_VERSION, '5.6.0', '>=' )){?>
                                                    <i class="fa fa-check"></i>
                                                    <?php }else{?>
                                                    <i class="fa fa-times"></i>
                                                    <input type="hidden" name="step1['php_version']" value="当前PHP版本不符合要求" >
                                                    <?php }?>
                                                </td>
                                            </tr>

                                            </tbody>
                                        </table>
                                    </div>

                                </div>

                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    依赖性检测
                                </div>
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table mb-0">
                                            <thead>
                                            <tr>
                                                <th>检查项目</th>
                                                <th>当前配置</th>
                                                <th>所需配置</th>
                                                <th>检测结果</th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            <tr>
                                                <td>Reflection 扩展</td>
                                                <td><?php if(extension_loaded('reflection')){ echo Yii::t('app','支持');}else echo Yii::t('app','不支持')?></td>
                                                <td>支持</td>
                                                <td>
                                                    <?php
                                                    if (extension_loaded('reflection')) {
                                                    ?>
                                                    <i class="fa fa-check"></i>
                                                    <?php }else{?>
                                                    <i class="fa fa-times"></i>
                                                    <input type="hidden" datatype="*" nullmsg="必须安装reflection扩展" >
                                                    <?php }?>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>MBString 扩展</td>
                                                <td><?php if(extension_loaded('mbstring')){ echo Yii::t('app','支持');}else echo Yii::t('app','不支持')?></td>
                                                <td>支持</td>
                                                <td>
                                                    <?php    if (extension_loaded('mbstring')) {?>
                                                    <i class="fa fa-check"></i>
                                                    <?php }else{?>
                                                    <i class="fa fa-times"></i>
                                                    <input type="hidden" datatype="*" nullmsg="必须安装mbstring扩展">
                                                    <?php }?>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>SPL 扩展</td>
                                                <td><?php if(extension_loaded('spl')){ echo Yii::t('app','支持');}else echo Yii::t('app','不支持')?></td>
                                                <td>支持</td>
                                                <td>
                                                    <?php if (extension_loaded('spl')) {?>
                                                    <i class="fa fa-check"></i>
                                                    <?php }else{?>
                                                    <i class="fa fa-times"></i>
                                                    <input type="hidden" datatype="*" nullmsg="必须安装spl扩展">
                                                    <?php }?>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>PDO 扩展</td>
                                                <td><?php if(extension_loaded('pdo')){ echo Yii::t('app','支持');}else echo Yii::t('app','不支持')?></td>
                                                <td>支持</td>
                                                <td>
                                                    <?php if (extension_loaded('pdo')) {?>
                                                    <i class="fa fa-check"></i>
                                                    <?php }else{?>
                                                    <i class="fa fa-times"></i>
                                                    <input type="hidden" datatype="*" nullmsg="必须安装pdo扩展">
                                                    <?php }?>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>PDO MySQL 扩展</td>
                                                <td><?php if(extension_loaded('pdo_mysql')){ echo Yii::t('app','支持');}else echo Yii::t('app','不支持')?></td>
                                                <td>支持</td>
                                                <td>
                                                    <?php if (extension_loaded('pdo_mysql')) {?>
                                                    <i class="fa fa-check"></i>
                                                    <?php }else{?>
                                                    <i class="fa fa-times"></i>
                                                    <input type="hidden" datatype="*" nullmsg="必须安装pdo_mysql扩展">
                                                    <?php }?>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>GD 扩展</td>
                                                <td>
                                                    <?php if(extension_loaded('gd')){ echo Yii::t('app','支持');}else echo Yii::t('app','不支持')?>
                                                </td>
                                                <td>支持</td>
                                                <td>
                                                    <?php if (extension_loaded('gd')) {?>
                                                    <i class="fa fa-check"></i>
                                                    <?php }else{?>
                                                    <i class="fa fa-times"></i>
                                                    <input type="hidden" datatype="*" nullmsg="必须安装gd扩展" >
                                                    <?php }?>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>OpenSSL 扩展</td>
                                                <td>
                                                    <?php if(extension_loaded('openssl')){ echo Yii::t('app','支持');}else echo Yii::t('app','不支持')?>
                                                </td>
                                                <td>支持</td>
                                                <td>
                                                    <?php if (extension_loaded('openssl')) {?>
                                                    <i class="fa fa-check"></i>
                                                    <?php }else{?>
                                                    <i class="fa fa-times"></i>
                                                    <input type="hidden" datatype="*" nullmsg="必须安装openssl扩展" >
                                                    <?php }?>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>CURL 扩展</td>
                                                <td>
                                                    <?php if(extension_loaded('curl')){ echo Yii::t('app','支持');}else echo Yii::t('app','不支持')?>
                                                </td>
                                                <td>支持</td>
                                                <td>
                                                    <?php if (extension_loaded('curl')) {?>
                                                    <i class="fa fa-check"></i>
                                                    <?php }else{?>
                                                    <i class="fa fa-times"></i>
                                                    <input type="hidden" datatype="*" nullmsg="必须安装curl扩展" >
                                                    <?php }?>
                                                </td>
                                            </tr>

                                            </tbody>
                                        </table>
                                    </div>

                                </div>

                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    目录权限检测
                                </div>
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table mb-3">
                                            <thead>
                                            <tr>
                                                <th>检查项目</th>
                                                <th>当前权限</th>
                                                <th>所需权限</th>
                                                <th>检测结果</th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            <?php foreach ($step1 as $k => $v){?>
                                            <tr>
                                                <td><?=$k?></td>
                                                <td><?=$v['have_chmod']?></td>
                                                <td><?=$v['require_chmod']?></td>
                                                <td>
                                                    <?php if ($v['check_chmod']){?>
                                                    <i class="fa fa-check"></i>
                                                    <?php }else{?>
                                                    <i class="fa fa-times"></i>
                                                    <input type="hidden" datatype="*" nullmsg="{{$k}}必须可写" >
                                                    <?php }?>
                                                </td>
                                            </tr>
                                            <?php }?>

                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="panel-button form-group text-center">
                                        <button type="button" class="btn btn-info" id="js_submit">下一步</button>
                                    </div>

                                </div>

                            </div>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    $(function(){
        $("form").validateForm({
            'success':function (json) {
                window.location.href = json.callback;
            }
        })
    })

</script>
