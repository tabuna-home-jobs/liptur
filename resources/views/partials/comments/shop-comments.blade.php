<div class="container padder-v">
    <div class="block-header comment-header">
        Комментарии
    </div>
    <div class="col-md-8">
        <div class="row">
            <div class="panel panel-default padder-v">
                <div class="col-xs-12">
                    @if (Auth::guest())
                        <a class="text-green text-bold">
                            <button class="btn btn-success btn-circled  m-r-xs">
                                <i class="user-auth-icon"></i>
                            </button>
                            Войти
                        </a>
                    @endif
                    <div class="padder-v">
                        <div class="form-group">
                            <textarea class="form-control no-resize no-border form-control-grey"
                                      placeholder="Напишите ваш комментарий" rows="5"
                                      id="comment" ></textarea>
                        </div>
                    </div>
                    <div>
                        <button class="btn btn-success" disabled>ДОБАВИТЬ</button>
                        <button class="btn" disabled>ОТМЕНИТЬ</button>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div>
            Модераторы и администрация портала оставляют за собой право принимать те или иные решения по
            блокировке учетных записей и по удалению любого сообщения, размещенного на сайте без
            согласования с пользователями и без последующих комментариев своих действий.
        </div>
        <div class="padder-v-micro font-bold">
            Основные причины блокировки аккаунта
        </div>
        <ol class="padder-l">
            <li>Оскорбления и переход на личности.</li>
            <li>Неоднократные комментарии, не относящиеся к теме</li>
            новостного материала, относятся к флуду.
            <li>Массовые ссылки (спам) на различные интернет-сайты.</li>
            <li>Использование нецензурной лексики.</li>
            <li>Реклама.</li>
            <li>Разжигание межэтнической и межконфессиональной розни.</li>
            <li>Неоднократный и настойчивый флуд и оффтоп-сообщения.</li>
            <li>Комментарии пользователей на любых языках, кроме русского.запрещены.</li>
        </ol>
        </p>
    </div>
</div>