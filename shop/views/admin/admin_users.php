<table class="table table-hover">
    <thead>
    <tr>
        <th scope="col">ID</th>
        <th scope="col" class="text-center">Имя</th>
        <th scope="col" class="text-center">Логин</th>
        <th scope="col" class="text-center">Админ</th>
        <th scope="col" colspan="2" class="text-center">опции</th>
    </tr>
    </thead>
    <tbody>
    <? foreach ($users as $user): ?>
        <tr>
            <th scope="row"><?= $user->id ?></th>
            <td class="text-center"><?= $user->fast_name ?></td>
            <td class="text-center"><?= $user->login ?></td>
            <td class="text-center"><?= ($user->role == 1) ? 'да' : 'нет' ?></td>
            <td class="text-end">
                <button type="button" class="btn btn-outline-success mx-2 btn-sm" data-bs-toggle="modal"
                        data-bs-target="#exampleUser<?= $user->id ?>">изменить
                </button>
            </td>
            <td class="text-start">
                <form method="post" action="/admin/deleteUser">
                    <input type="text" name="id" value="<?= $user->id ?>" hidden>
                    <button type="submit" class="btn btn-outline-danger btn-sm">удалить</button>
                </form>
            </td>
        </tr>
    <? endforeach; ?>
    </tbody>
</table>

<? foreach ($users as $user): ?>
    <div class="modal fade" id="exampleUser<?= $user->id ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><?= $user->login ?></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="post" action="/admin/updateUser">
                    <div class="modal-body">
                        <input type="number" name="id" value="<?= $user->id ?>" hidden>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Имя:</label>
                            <input type="text" name="fastName" value="<?= $user->fast_name ?>" class="form-control"
                                   id="recipient-name">
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">логин:</label>
                            <input type="text" name="login" value="<?= $user->login ?>" class="form-control" id="recipient-name">
                        </div>
                        <div class="mb-3">
                            <label for="message-text" class="col-form-label">Роль:</label>
                            <select class="form-select" name="role" aria-label="Default select example">
                                <? if ($user->role == 1): ?>
                                <option value="1" selected>Да</option>
                                <? else: ?>
                                <option value="0" selected>Нет</option>
                                <? endif; ?>
                                <option value="1">Да</option>
                                <option value="0">Нет</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">закрыть</button>
                            <button type="submit" class="btn btn-primary">изменить</button>
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>
<? endforeach; ?>

