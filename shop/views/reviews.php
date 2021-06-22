<table class="table table-hover">
    <thead>
    <tr>
        <th scope="col">ID</th>
        <th scope="col">От кого</th>
        <th scope="col" class="text-center">отзыв</th>
        <th scope="col" class="text-center">продукт</th>
        <th scope="col" class="text-center">дата</th>
        <th scope="col" colspan="3" class="text-center">опции</th>
    </tr>
    </thead>
    <tbody>
    <? foreach ($reviews as $item): ?>
        <tr>
            <th scope="row"><?= $item->id ?></th>
            <td><?= $item->user ?></td>
            <td class="text-center"><?= $item->text ?></td>
            <td class="text-center"><?= $item->product ?></td>
            <td class="text-center"><?= $item->created_at ?></td>
            <td class="text-center">
                <a href="/?c=reviews&a=delete&id=<?= $item->id ?>" class="btn btn-outline-success btn-sm">удалить</a>
            </td>
        </tr>
    <? endforeach; ?>
    </tbody>
</table>