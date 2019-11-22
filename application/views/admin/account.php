
<nav class="navbar navbar-expand-lg navbar-dark primary-color">
    <a class="navbar-brand" href="#">Фильтр</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav"
            aria-controls="basicExampleNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="basicExampleNav">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item dropdown active">
                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false">По заявке</a>
                <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item"  href="/admin/account/1">Участник</a>
                    <a class="dropdown-item"  href="/admin/account/2">Организатор</a>
                </div>
            </li>
        </ul>
        <?php if($this->route['id']): ?>
        <div class="my-0">
            <a class="btn btn-secondary" href="/admin/account">Отмена</a>
        </div>
        <?php endif; ?>
    </div>
</nav>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div id="table" class="table-editable">
                        <table class="table table-bordered table-responsive-md table-striped text-center">
                            <thead>
                            <tr>
                                <th class="text-center">ФИО</th>
                                <th class="text-center">Адрес</th>
                                <th class="text-center">Телефон</th>
                                <th class="text-center">Email</th>
                                <th class="text-center">Заявлен</th>
                                <th class="text-center">Редатировать</th>
                                <th class="text-center">Удалить</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if(empty($list or $filter)): ?>
                                <h3>Список клиентов пуст</h3>
                            <?php elseif($this->route['id']): ?>
                                <?php foreach ($filter as $val): ?>
                                    <tr>
                                        <td><?php echo htmlspecialchars($val['name'],ENT_QUOTES); ?></td>
                                        <td><?php echo htmlspecialchars($val['address'],ENT_QUOTES); ?></td>
                                        <td><?php echo htmlspecialchars($val['phone'],ENT_QUOTES); ?></a></td>
                                        <td><?php echo htmlspecialchars($val['email'],ENT_QUOTES); ?></td>
                                        <td><?php
                                            if($val['person'] == 1) echo 'Участник';
                                            elseif ($val['person'] == 2) echo 'Организатор';?></td>
                                        <td><a href="/admin/edit/<?php echo $val['id'] ?>" type="button" class="btn btn-primary btn-block">Редактировать</a></td>
                                        <td><a href="/admin/delete/<?php echo $val['id'] ?>" type="button" class="btn btn-danger btn-block">Удалить</a></td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <?php foreach ($list as $val): ?>
                                    <tr>
                                        <td><?php echo htmlspecialchars($val['name'],ENT_QUOTES); ?></td>
                                        <td><?php echo htmlspecialchars($val['address'],ENT_QUOTES); ?></td>
                                        <td><?php echo htmlspecialchars($val['phone'],ENT_QUOTES); ?></a></td>
                                        <td><?php echo htmlspecialchars($val['email'],ENT_QUOTES); ?></td>
                                        <td><?php
                                            if($val['person'] == 1) echo 'Участник';
                                            elseif ($val['person'] == 2) echo 'Организатор';?></td>
                                        <td><a href="/admin/edit/<?php echo $val['id'] ?>" type="button" class="btn btn-primary btn-block">Редактировать</a></td>
                                        <td><a href="/admin/delete/<?php echo $val['id'] ?>" type="button" class="btn btn-danger btn-block">Удалить</a></td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>