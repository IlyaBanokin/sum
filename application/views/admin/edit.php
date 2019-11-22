<div class="container">
    <div class="contact-message">
        <fieldset>
            <form method="post" action="<?php $data['id'] ?>">
                <legend><?php echo $title ?></legend>
                <div class="form-group form-horizontal">
                    <div class="alert alert-info"><sup>*</sup> - Поля обязательные к заполнению!</div>
                    <div class="row">
                        <label class="col-sm-2 control-label"><sup>*</sup>ФИО</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" value="<?php echo htmlspecialchars($data['name'],ENT_QUOTES); ?>" name="name"/>
                        </div>
                    </div>
                </div>

                <div class="form-group form-horizontal">
                    <div class="row">
                        <label class="col-sm-2 control-label"><sup>*</sup>Адресс</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" value="<?php echo htmlspecialchars($data['address'],ENT_QUOTES); ?>" name="address"/>
                        </div>
                    </div>
                </div>

                <div class="form-group form-horizontal">
                    <div class="row">
                        <label class="col-sm-2 control-label"><sup>*</sup>Телефон:</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" value="<?php echo htmlspecialchars($data['phone'],ENT_QUOTES); ?>" name="phone"/>
                        </div>
                    </div>
                </div>

                <div class="form-group form-horizontal">
                    <div class="row">
                        <label class="col-sm-2 control-label"><sup>*</sup>E-mail:</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" value="<?php echo htmlspecialchars($data['email'],ENT_QUOTES); ?>" name="email"/>
                        </div>
                    </div>
                </div>


                <div class="buttons float-right">
                    <button type="submit" class="btn btn-primary">Сохранить</button>
                </div>
            </form>
        </fieldset>
    </div>
</div>
<style>
    .example-2 .btn-tertiary{color:#555;padding:0;line-height:40px;width:300px;margin:auto;display:block;border:2px solid #555}
    .example-2 .btn-tertiary:hover,.example-2 .btn-tertiary:focus{color:#888;border-color:#888}
    .example-2 .input-file{width:.1px;height:.1px;opacity:0;overflow:hidden;position:absolute;z-index:-1}
    .example-2 .input-file + .js-labelFile{overflow:hidden;text-overflow:ellipsis;white-space:nowrap;padding:0 10px;cursor:pointer}
    .example-2 .input-file + .js-labelFile .icon:before{content:"\f093"}
    .example-2 .input-file + .js-labelFile.has-file .icon:before{content:"\f00c";color:#5AAC7B}
</style>