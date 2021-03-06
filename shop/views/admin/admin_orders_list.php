<table class="table table-hover">
    <thead>
    <tr>
        <th scope="col">ID</th>
        <th scope="col">Наименование</th>
        <th scope="col" class="text-center">кол.</th>
        <th scope="col" class="text-center">цена за ед.</th>
        <th scope="col" class="text-center">цена</th>
        <th scope="col" colspan="3" class="text-center">опции</th>
    </tr>
    </thead>
    <tbody>
    <? foreach ($basket as $item): ?>
        <tr>
            <th scope="row"><?= $item->id ?></th>
            <td><?= $item->title ?></td>
            <td class="text-center"><?= $item->count ?> <?= $item->units ?></td>
            <td class="text-center"><?= $item->price ?> ₽</td>
            <td class="text-center"><?= ($item->count * $item->price); ?> ₽</td>
            <td class="text-center">
                <a href="/basket/delete/?id=<?= $item->id ?>" class="btn btn-outline-success btn-sm">удалить</a>
            </td>
        </tr>
    <? endforeach; ?>
    </tbody>
</table>
<div class="d-flex justify-content-end px-5">
    <a class="btn btn-outline-secondary" href="/admin/orders">назад</a>
</div>
