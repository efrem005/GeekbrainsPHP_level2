<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">PHP_2</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="/">Главная</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/product">Каталог</a>
                </li>
                <? if($isAdmin): ?>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Управление
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="/admin/product">Каталог</a></li>
                        <li><a class="dropdown-item" href="/admin/reviews">Отзывы</a></li>
                        <li><a class="dropdown-item" href="/admin/users">Пользователи</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="/admin/orders">Заказы</a></li>
                    </ul>
                </li>
                <? endif; ?>
                <li class="nav-item">
                    <a class="nav-link" href="/basket" >Корзина<span class="badge bg-secondary" id="countBasket"><?=$count?></span></a>
                </li>
            </ul>
            <? if($isAuth): ?>
                <div>Добро пожаловать! <b><?=$fast_name?></b> <a href="/auth/Logout" class="btn btn-primary ms-2 btn-sm">Выход</a>
                </div>
            <? else: ?>
                <div class="d-flex align-items-center">Добро пожаловать! <b class="mx-2"><b><?=$fast_name?></b></b>
                    <button type="button" class="btn btn-outline-success mx-2 btn-sm" data-bs-toggle="modal"
                            data-bs-target="#exampleModal">Вход
                    </button>
                    <button type="button" class="btn btn-outline-success btn-sm" data-bs-toggle="modal"
                            data-bs-target="#exampleModal1">Рег
                    </button>
                </div>
            <? endif; ?>
        </div>
    </div>
</nav>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Вход</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post" action="/auth/login">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">логин:</label>
                        <input type="text" name="login" class="form-control" id="recipient-name">
                    </div>
                    <div class="mb-3">
                        <label for="message-text" class="col-form-label">пароль:</label>
                        <input type="text" name="pass" class="form-control" id="message-text">
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" name="save" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Запомнить меня</label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">закрыть</button>
                    <button type="submit" class="btn btn-primary">войти</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Регистрация</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post" action="/auth/add">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Имя:</label>
                        <input type="text" name="fastName" class="form-control" id="recipient-name">
                    </div>
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">логин:</label>
                        <input type="text" name="login" class="form-control" id="recipient-name">
                    </div>
                    <div class="mb-3">
                        <label for="message-text" class="col-form-label">пароль:</label>
                        <input type="text" name="pass" class="form-control" id="message-text">
                    </div>
                </div>
                <div class="modal-footer"><div>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">закрыть</button>
                    <button type="submit" class="btn btn-primary">зарегистрироваться</button>
                </div>
            </form>
        </div>
    </div>
</div>