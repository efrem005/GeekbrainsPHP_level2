<table class="table table-hover">
    <thead>
    <tr>
        <th scope="col">ID</th>
        <th scope="col">Наименование</th>
        <th scope="col" class="text-center">кол.</th>
        <th scope="col" class="text-center">цена</th>
        <th scope="col" class="text-center">дата поступления</th>
        <th colspan="2" class="text-center">управление</th>
    </tr>
    </thead>
    <tbody>
    <? foreach ($catalog as $item): ?>
        <tr class="class='table-success" ?>
            <th scope="row"><?= $item->id ?></th>
            <td><?= $item->title ?></td>
            <td class="text-center"><?= $item->count ?> <?= $item->units ?></td>
            <td class="text-center"><?= $item->price ?> ₽</td>
            <td class="text-center"><?= $item->created_at ?></td>
            <td class="text-end">
                <button type="button" class="btn btn-outline-success mx-2 btn-sm" data-bs-toggle="modal"
                        data-bs-target="#exampleProduct<?= $item->id ?>">Изменить
                </button>
            </td>
            <td class="text-start">
                <a class="btn btn-outline-danger btn-sm" data-id="<?= $item->id ?>">Удалить</a>
            </td>
        </tr>
    <? endforeach; ?>
    </tbody>
</table>

<? foreach ($catalog as $item): ?>
    <div class="modal fade" id="exampleProduct<?= $item->id ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><?= $item->title ?></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="/admin/updateProduct" method="post">
                    <label>
                        <input type="number" name="id" value="<?= $item->id ?>" hidden>
                    </label>
                    <div class="modal-body">
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Наименование</span>
                            <input type="text" name="title" class="form-control" value="<?= $item->title ?>" placeholder="Наименование" aria-label="Username" aria-describedby="basic-addon1" required>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Цена</span>
                            <input type="number" name="price" class="form-control" value="<?= $item->price ?>" placeholder="Цена" aria-label="Username" aria-describedby="basic-addon1" required>
                            <span class="input-group-text">₽</span>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">кол.</span>
                            <input type="number" name="count" class="form-control" value="<?= $item->count ?>" placeholder="Количества" aria-label="Username" aria-describedby="basic-addon1" required>
                            <span class="input-group-text"><?= $item->units ?></span>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Описание</span>
                            <textarea type="number" name="description" class="form-control" placeholder="Описание" aria-label="Username" aria-describedby="basic-addon1" rows="10" required><?= $item->description ?></textarea>
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