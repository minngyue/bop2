<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <div class="install-panel panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title text-center">BOP V<?=Yii::$app->params['app_version']?> 安装步骤二</h3>
            </div>
            <div class="panel-body">

                <?= $this->render('/layouts/install/nav',['step'=>2]); ?>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">数据库信息</div>

                            <div class="panel-body">
                                <form class="form-horizontal" id="js_step2Form" role="form" action="<?php echo url('home/install/step2')?>" method="post">
                                    <input type="hidden" name="csrf-phprap" value="<?php echo csrf_token()?>" />

                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">数据库类型</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="Step2[type]" class="form-control disabled" disabled value="MySQL">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">数据库服务器</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="Step2[host]" class="form-control" placeholder="数据库服务器地址，一般为localhost" datatype="*" value="localhost">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">数据库端口号</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="Step2[port]" class="form-control" datatype="n" value="3306">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">数据库名</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="Step2[dbname]" class="form-control" datatype="*" value="phprap1" placeholder="不存在会自动创建">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">数据库用户名</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="Step2[username]" class="form-control" datatype="*" value="root">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">数据库密码</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="Step2[password]" class="form-control" datatype="*">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">数据库表前缀</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="Step2[prefix]" class="form-control" datatype="*" placeholder="同一个数据库安装多个程序请修改" value="doc1_">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="panel-button text-center">
                                            <a href="javascript:history.go(-1);" class="btn btn-info">上一步</a>
                                            <button type="button" class="btn btn-info" id="js_submit">下一步</button>
                                        </div>
                                    </div>
                                </form>

                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>
</div>

<script>
    $(function () {
        $("form").validateForm({
            'before':function () {
                $("#js_submit").text('提交中').attr('disabled',true);
            },
            'success':function (json) {
                window.location.href = json.callback;
            },
            'error':function () {
                $("#js_submit").text('下一步').attr('disabled',false);
            }
        })
    })
</script>