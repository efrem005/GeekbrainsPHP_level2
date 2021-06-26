<? foreach ($catalog as $item): ?>
    <div class="col-md-3 my-2 px-5">
        <div class="card h-100 d-flex">
            <img src="<?= $item->image ?>" class="card-img-top" alt="<?= $item->title ?>">
            <div class="card-body d-flex flex-column justify-content-end">
                <h5 class="card-title mb-3"><?= $item->title ?></h5>
                <p>цена: <?= $item->price ?> ₽</p>
                <div>
                    <a href="/product/card/?id=<?= $item->id ?>" class="btn btn-outline-info btn-sm">подробно</a>
                    <a href="/product/buy/?id=<?= $item->id ?>" class="btn btn-outline-success btn-sm">купить</a>
                </div>
            </div>
        </div>
    </div>
<? endforeach; ?>
<? if ($pagination != 1): ?>
    <div class="col-sm-12 mt-3">
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
                <? for ($i = 0; $i < $pagination; $i++): ?>
                    <li class="page-item"><a class="page-link" href="/product/page/?page=<?= $i ?>"><?= ($i + 1) ?></a></li>
                <? endfor; ?>
                <? if ($offSet < $count): ?>
                <li class="page-item"><a class="page-link" href="/product/limit/?offset=<?= $offSet ?>">ещё</a></li>
                <? endif; ?>
            </ul>
        </nav>
    </div>
<? endif; ?>
