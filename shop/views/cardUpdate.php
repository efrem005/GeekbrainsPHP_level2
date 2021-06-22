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
                    <form action="?c=product&a=update&id=<?= $item->id ?>" method="post">
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">title</span>
                            <input type="text" name="title" class="form-control" value="<?= $item->title ?>" aria-label="Username" aria-describedby="basic-addon1">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">price</span>
                            <input type="number" name="price" class="form-control" value="<?= $item->price ?>" aria-label="Username" aria-describedby="basic-addon1">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">count</span>
                            <input type="number" name="count" class="form-control" value="<?= $item->count ?>" aria-label="Username" aria-describedby="basic-addon1">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">text</span>
                            <textarea type="number" name="description" class="form-control" aria-label="Username" aria-describedby="basic-addon1"><?= $item->description ?></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">изменить</button>
                    </form>
                </div>
            </div>
        </div>


        <div class="card-footer text-muted">
            Поступление на склад: <?= $item->created_at ?>
        </div>

    </div>

</div>