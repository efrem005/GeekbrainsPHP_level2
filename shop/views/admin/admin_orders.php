<table class="table table-hover">
    <thead class="thead-dark text-center">
        <tr class="text-center">
            <th scope="col">ID</th>
            <th scope="col">ОТ</th>
            <th scope="col">телефон</th>
            <th scope="col">сумма</th>
            <th scope="col">статус</th>
            <th scope="col">дата</th>
            <th scope="col" colspan="2">опции</th>
        </tr>
    </thead>
    <tbody>
    <? foreach ($orders as $order): ?>
        <tr class="text-center">
            <th scope="row"><?= $order->id ?></th>
            <td><?= $order->name ?></td>
            <td><?= $order->phone ?></td>
            <td><?= $order->price ?> ₽</td>
            <td><?= $order->status ?></td>
            <td><?= $order->created_at ?></td>
            <td>
                <button type="button" class="btn btn-outline-info btn-sm" data-bs-toggle="modal"
                        data-bs-target="#exampleOrders<?= $order->id ?>">изменить статус
                </button>
                <a href="/admin/orderList/?id=<?= $order->id ?>" class="btn btn-outline-success btn-sm">к заказу</a>
                <a href="/admin/orderDelete/?id=<?= $order->id ?>" class="btn btn-outline-danger btn-sm">удалить</a>
            </td>
        </tr>
    <? endforeach; ?>
    </tbody>
</table>

<? foreach ($orders as $order): ?>
<div class="modal fade" id="exampleOrders<?= $order->id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">изменить статус</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post" action="/orders/status">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="message-text" class="col-form-label">Статус:</label>
                        <input type="text" name="id" value="<?= $order->id ?>" hidden>
                        <select class="form-select" name="status" aria-label="Default select example">
                            <? if ($order->status): ?>
                                <option value="<?= $order->status ?>" selected><?= $order->status ?></option>
                            <? endif; ?>
                            <option value="в обработке">в обработке</option>
                            <option value="собирается">собирается</option>
                            <option value="ждет курьера">ждет курьера</option>
                            <option value="в пути">в пути</option>
                            <option value="заказ не доставлени">заказ не доставлени</option>
                            <option value="заказ выполнен">заказ выполнен</option>
                        </select>
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
<? endforeach; ?>