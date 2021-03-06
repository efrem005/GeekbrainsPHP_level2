<div class="col-12">
    <div class="card text-center mt-3">
        <div class="card-header">
            <h5 class="card-title"><?= $item->title ?></h5>
        </div>
        <div class="row">
            <div class="col-md-6">
                <img src="<?= $item->image ?>" class="card-img" style="width: 500px; margin: 0 auto"
                     alt="<?= $item->title ?>">
            </div>
            <div class="col-md-6">
                <div class="card-body h-100 d-flex flex-column justify-content-between align-items-center">
                    <div class="card-body">
                        <p class="card-text"><?= $item->description ?></p>
                    </div>
                    <p class="card-text"><b>цена: </b><?= $item->price ?> ₽</p>
                    <p class="card-text"><b>остаток: </b><?= $item->count ?> <?= $item->units ?></p>
                    <div class="container">
                        <button type="button" class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#exampleModal3">оставить отзыв</button>
                        <button class="btn btn-outline-success buy" data-id="<?= $item->id ?>">купить</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer text-muted">
            Поступление на склад: <?= $item->created_at ?>
        </div>
    </div>
    <div class="card text-center mt-3 mb-3">
        <h5 class="card-header">Отзывы</h5>
        <div class="container mt-3">
            <div class="row">
                <? if (sizeof($review) != 0): ?>
                    <? foreach ($review as $otz): ?>
                        <div class="col-md-3">
                            <div class="card text-dark bg-gradient border-Secondary mb-3">
                                <div class="card-header"><?= $otz->user ?></div>
                                <div class="card-body">
                                    <p class="card-text"><?= $otz->text ?></p>
                                </div>
                                <div class="card-footer"><?= $otz->created_at ?></div>
                            </div>
                        </div>
                    <? endforeach; ?>
                <? endif; ?>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="exampleModal3" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Оставить отзыв</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post" action="/reviews/add/?id=<?= $item->id ?>">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="exampleInputUser" class="form-label">Ваше имя</label>
                        <input type="text" name="user" class="form-control" id="exampleInputUser">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputText" class="form-label">Отзыв</label>
                        <textarea type="text" name="text" class="form-control" id="exampleInputText"></textarea>
                    </div>
                </div>
                <div class="modal-footer"><div>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">закрыть</button>
                        <button type="submit" class="btn btn-primary">отправить</button>
                    </div>
            </form>
        </div>
    </div>
</div>
