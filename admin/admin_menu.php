<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="">ITVertex</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="/admin/admin.php">Кабинет администратора <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Партнерство</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Поддержка</a>
            </li>

        </ul>
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0">Поиск</button>
        </form>

        <a class="nav-link btn btn-danger" href="../exit.php">Выход</a>

    </div>
</nav>
<div class="container">


    <div class="row">
        <div style="background: rgba(239,243,246,.3);
    border-right: 1px solid rgba(198,208,215,.3);
    border-left: 1px solid rgba(198,208,215,.3);" class="col-sm-4">
            <div><h2>Общая информация</h2></div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">Логин <?php echo $_SESSION["login"] ?></li>
                <li class="list-group-item"><label>Выбор организации</label>
                    <form method="POST">
                        <div class="row">
                            <div class="col-sm-6"><select name="select_project_user" class="form-control ">

                                </select></div>
                            <div class="col-sm-6"><input class="btn btn-primary " name="submit" type="submit"
                                                         value="Применить"></div>
                        </div>
                    </form>
                </li>
                <li class="list-group-item">
                    Персональные данные:<a href="settings.php?items=info">Изменить</a></li>
            </ul>
            <div><h3>Техническая информация</h3></div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item "><a href="add_task_admin.php">Добавить задание</a></li>
                <li class="list-group-item">Заданий в работе: <a href="#"><span class="badge badge-primary badge-pill">14</span></a>
                </li>
                <li class="list-group-item"><a href="../admin/view_task.php">Просмотр всех заданий</a></li>

            </ul>

        </div>

