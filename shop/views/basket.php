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
        <tr id="<?=$item->id?>">
            <th scope="row"><?= $item->id ?></th>
            <td><?= $item->title ?></td>
            <td class="text-center"><?= $item->count ?> <?= $item->units ?></td>
            <td class="text-center"><?= $item->price ?> ₽</td>
            <td class="text-center"><?= ($item->count * $item->price); ?> ₽</td>
            <td class="text-center">
                <a href="/basket/countUp/?id=<?= $item->product_id ?>" class="btn btn-outline-success btn-sm">+</a>
                <button class="btn btn-outline-success btn-sm delete" data-id="<?= $item->id ?>">удалить</button>
                <a href="/basket/countDown/?id=<?= $item->product_id ?>" class="btn btn-outline-success btn-sm">-</a>
            </td>
        </tr>
    <? endforeach; ?>
    <? if ($summ > 0): ?>
        <tr>
            <th>Всего: </th>
            <th colspan="4"><?= $summ ?> Руб.</th>
            <td class="text-center">
                <button type="button" class="btn btn-outline-info btn-sm" data-bs-toggle="modal"
                        data-bs-target="#exampleOrders">оформить заказ
                </button>
            </td>
        </tr>
    <? endif; ?>
    </tbody>
</table>

<div class="modal fade" id="exampleOrders" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">оформить заказ</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post" action="/orders/buy">
                <div class="modal-body">
                    <div class="mb-3">
                        <input type="text" name="summ" value="<?=$summ?>" hidden>
                    </div>
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Ваше имя:</label>
                        <input type="text" name="name" class="form-control" id="recipient-name">
                    </div>
                    <div class="mb-3">
                        <label for="message-text" class="col-form-label">Номер телефона:</label>
                        <input type="tel" name="phone" class="form-control" id="message-text">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">закрыть</button>
                    <button type="submit" class="btn btn-primary">заказать</button>
                </div>
            </form>
        </div>
    </div>
</div>