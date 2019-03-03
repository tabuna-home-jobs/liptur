@extends('layouts.profile')

@section('title','Страница компании')

@section('accounts')


    <ul class="nav nav-tabs-simple nav-justified" id="myTabs" role="tablist">
        <li role="presentation" class="active"><a href="#post-editor" id="post-tab" role="tab" data-toggle="tab"
                                                  aria-controls="post-editor" aria-expanded="true">Описание</a></li>


        <li role="presentation"><a href="#post-body" role="tab" id="post-body-tab" data-toggle="tab"
                                   aria-controls="post-body">Материал</a></li>

        <li role="presentation"><a href="#profile" role="tab" id="profile-tab" data-toggle="tab"
                                   aria-controls="profile">Изображения</a></li>

        <li role="presentation"><a href="#post-image" role="tab" id="post-image-tab" data-toggle="tab"
                                   aria-controls="post-image">Детали</a></li>


    </ul>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade in active" role="tabpanel" id="post-editor" aria-labelledby="post-tab">


            <div class="wrapper-xl  bg-white">
                <div class="form-group">
                    <label for="field-name">Название</label>
                    <input type="text" class="form-control " id="field-name" name="content[ru][name]"
                           value="Юрт-отель «Ставка Тамерлана» в археологическом парке «Аргамач»" placeholder="">
                    <p class="help-block">Главный заголовок</p>
                </div>
                <div class="line line-dashed b-b line-lg"></div>
                <div class="form-group">
            <textarea class="form-control no-resize summernote" id="field-body" rows="10" name="content[ru][body]"
                      placeholder="" style="display: none;">&lt;p align="justify"&gt;&lt;b&gt;Транспортная инфраструктура:&lt;/b&gt;&lt;/p&gt;&lt;p align="justify"&gt;Парк обладает отличной транспортной доступностью - он находится всего в 2 км от федеральной автомагистрали М-4 «Дон», в селе Аргамач-Пальна Елецкого района Липецкой области, на расстоянии 140 км от Воронежа и 360 км от Москвы.&lt;/p&gt;&lt;p align="justify"&gt;&lt;b&gt;Ландшафт:&lt;/b&gt;&lt;/p&gt;&lt;p align="justify"&gt;На данной местности протекает река Пальна, которая включает выходы скальных пород, пещеры, ущелья, родники, реликтовые дубравы. Три географические зоны – степная, горная и лесная. Вода реки кристально чистая. Кемпинговые площадки огорожены, занимают около 4 гектаров.&lt;/p&gt;&lt;p align="justify"&gt;&lt;b&gt;Услуги для посетителей и местная инфраструктура:&lt;/b&gt;&lt;/p&gt;&lt;p align="justify"&gt;К услугам гостей - парковка для автомобилей, столовая, бани, душевые кабины (в том числе с подогревом), туалеты, электричество, площадки для пикника, беседки. В пределах кемпинга возможна установка личной палатки или аренда палатки со всем оборудованием на месте. Доступно проживание в оригинальных бурятских юртах (юрты электрифицированы с дровяным отоплением). Имеется пять четырех и шестиместных юрт, а также одна юрта на 11–13 мест. Трехразовое питание из продуктов, произведенных в ближайшем округе. Посетители могут принять участие в раскопках поселения эпохи бронзы (2 пол. II тыс. до н.э..) и времен Елецкого княжества (XIV – начало XV вв.), археологических экспериментах по изготовлению керамической посуды, плавке металла, строительству первобытных построек.&lt;/p&gt;&lt;p align="justify"&gt;&lt;u&gt;&lt;b&gt;Стоимость размещения (в рублях сутки/место, палатка, юрта)&lt;/b&gt;&lt;/u&gt;&lt;/p&gt;&lt;ul&gt;&lt;li&gt;своя палатка - 300 рублей.&lt;/li&gt;&lt;li&gt;прокат комплекта (палатка, коврик, спальник) - 400 рублей.&lt;/li&gt;&lt;li&gt;юрта 5-стенок (28 кв.м.) 4–6 чел. - 1500 рублей.&lt;/li&gt;&lt;li&gt;юрта 8-стенок (64 кв.м.) 11–15 чел. - 2500 рублей.&lt;/li&gt;&lt;/ul&gt;&lt;p align="justify"&gt;&lt;b&gt;В стоимость входит: &lt;/b&gt;проживание, стоянка для автомобилей, участие в археологических раскопках и археологическом экспериментальном моделировании, мастер-классах, экскурсия по экотропе «Горная страна в миниатюре».&lt;/p&gt;&lt;p align="justify"&gt;&lt;b&gt;Дополнительные услуги: &lt;/b&gt;прокат велосипедов и оборудования для пикника.&lt;/p&gt;&lt;p align="justify"&gt;&lt;b&gt;Примечание:&lt;/b&gt; Расчетный час – 12-00.&lt;/p&gt;&lt;p align="justify"&gt;&lt;u&gt;&lt;b&gt;Стоимость питания (в руб. с чел.)&lt;/b&gt;&lt;/u&gt;&lt;/p&gt;&lt;ul&gt;&lt;li&gt;завтрак - 150 рублей.&lt;/li&gt;&lt;li&gt;обед - 250 рублей.&lt;/li&gt;&lt;li&gt;ужин - 200 рублей.&lt;br&gt;&lt;/li&gt;&lt;/ul&gt;</textarea>
                </div>
                <div class="line line-dashed b-b line-lg"></div>
                <div class="form-group">
                    <label for="field-open">Дата открытия</label>
                    <div class="input-group date datetimepicker">
                        <input type="text" class="form-control " id="field-open" value="2017-04-25 10:12:21"
                               placeholder=""
                               name="content[ru][open]">
                        <span class="input-group-addon">
<span class="fa fa-calendar" aria-hidden="true"></span>
</span>
                    </div>
                    <p class="help-block">Открытие мероприятия состоиться</p>
                </div>
                <div class="line line-dashed b-b line-lg"></div>
                <div class="form-group">
                    <label for="field-close">Дата закрытия</label>
                    <div class="input-group date datetimepicker">
                        <input type="text" class="form-control " id="field-close" value="2017-04-25 10:12:21"
                               placeholder=""
                               name="content[ru][close]">
                        <span class="input-group-addon">
<span class="fa fa-calendar" aria-hidden="true"></span>
</span>
                    </div>
                </div>
                <div class="line line-dashed b-b line-lg"></div>
                <div class="map-place-[place]-ru">
                    <div class="form-group">
                        <label for="field-place">Место положение</label>
                        <div class="input-group">
                            <input class="form-control " id="place-place-ru" name="content[ru][place][name]"
                                   value="село Аргамач-Пальна, Елецкий район, Липецкая область, Россия" placeholder=""
                                   autocomplete="off">
                            <input type="hidden" id="lat-place-ru" name="content[ru][place][lat]" value="52.6834202">
                            <input type="hidden" id="lng-place-ru" name="content[ru][place][lng]"
                                   value="38.59338790000004">
                            <span class="input-group-btn">
<button class="btn btn-default" type="button" data-toggle="modal" data-target="#map-place-place-ru"><i
            class="fa fa-map-marker"></i></button>
</span>
                        </div>
                    </div>
                    <p class="help-block">Адрес на карте</p>
                </div>

                <div class="modal fade" id="map-place-place-ru" tabindex="-1" role="dialog"
                     aria-labelledby="map-place-place-ru">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                            aria-hidden="true">×</span>
                                </button>
                                <h4 class="modal-title">Google Maps</h4>
                            </div>
                            <div class="modal-body">
                                <div id="map-place-place-ru-canvas" class="google-maps-canvas"
                                     style="width: 100%; height: 300px"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="line line-dashed b-b line-lg"></div>
                <div class="form-group">
                    <label for="field-phone">Номер телефона</label>
                    <input type="text" class="form-control " id="field-phone" name="content[ru][phone]"
                           value="8-920-501-26-62"
                           placeholder="">
                    <p class="help-block">Записывается в свободной форме</p>
                </div>
                <div class="line line-dashed b-b line-lg"></div>
                <div class="form-group">
                    <label for="field-site">Официальный сайт</label>
                    <input type="url" class="form-control " id="field-site" name="content[ru][site]" value=""
                           placeholder="">
                </div>
                <div class="line line-dashed b-b line-lg"></div>
                <div class="form-group">
                    <label for="field-email">Электронная почта</label>
                    <input type="email" class="form-control " id="field-email" name="content[ru][email]"
                           value="golotwinaov@mail.ru" placeholder="">
                </div>
                <div class="line line-dashed b-b line-lg"></div>
                <div class="form-group">
                    <label for="field-price">Стоимость</label>
                    <input type="text" class="form-control " id="field-price" name="content[ru][price]"
                           value="от 300 до 2500 руб." placeholder="">
                    <p class="help-block">Записывается в свободной форме</p>
                </div>
                <div class="line line-dashed b-b line-lg"></div>
                <div class="form-group">
                    <label for="field-number-of-seats">Число мест</label>
                    <input type="numeric" class="form-control " id="field-number-of-seats"
                           name="content[ru][number-of-seats]"
                           value="" placeholder="">
                    <p class="help-block">Записывается в свободной форме</p>
                </div>
                <div class="line line-dashed b-b line-lg"></div>
                <div class="form-group">
                    <label for="field-[region]">Регион</label>
                    <select class="form-control " name="content[ru][region]">
                        <option value="volovskiy">Воловский район</option>
                        <option value="gryazi">Грязинский район</option>
                        <option value="dankovsky">Данковский район</option>
                        <option value="bobrinskii">Добринский район</option>
                        <option value="bobrovskij">Добровский район</option>
                        <option value="bolgorukovsky">Долгоруковский район</option>
                        <option value="eletskii" selected="">Елец</option>
                        <option value="zadonsk">Задонск</option>
                        <option value="izmalkovsky">Измалковский район</option>
                        <option value="krasninskoe">Краснинский район</option>
                        <option value="lebedyansky">Лебедянский район</option>
                        <option value="levTolstoy">Лев-Толстовский район</option>
                        <option value="lipetsk">Липецк</option>
                        <option value="stanovlyansky">Становлянский район</option>
                        <option value="terbunsky">Тербунский район</option>
                        <option value="usman">Усманский район</option>
                        <option value="khlevensky">Хлевенский район</option>
                        <option value="chaplyginsky">Чаплыгинский район</option>
                        <option value="tambov">Тамбовский район</option>
                    </select>
                </div>
                <div class="line line-dashed b-b line-lg"></div>
                <div class="form-group">
                    <label for="field-distance">Удалённость от Липецка</label>
                    <input type="number" class="form-control " id="field-distance" name="content[ru][distance]" value=""
                           placeholder="0">
                    <p class="help-block">Отсчёт с центра города (Почтамп)</p>
                </div>

            </div>


        </div>

        <div class="tab-pane fade" role="tabpanel" id="post-body" aria-labelledby="post-body-tab"><p>2Food truck fixie
                locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1 labore
                velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft
                beer twee. Qui photo booth letterpress, commodo enim craft beer mlkshk aliquip jean shorts ullamco
                ad vinyl cillum PBR. Homo nostrud organic, assumenda labore aesthetic magna delectus mollit. Keytar
                helvetica VHS salvia yr, vero magna velit sapiente labore stumptown. Vegan fanny pack odio cillum
                wes anderson 8-bit, sustainable jean shorts beard ut DIY ethical culpa terry richardson biodiesel.
                Art party scenester stumptown, tumblr butcher vero sint qui sapiente accusamus tattooed echo
                park.</p></div>

        <div class="tab-pane fade" role="tabpanel" id="profile" aria-labelledby="profile-tab"><p>Food truck fixie
                locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1 labore
                velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft
                beer twee. Qui photo booth letterpress, commodo enim craft beer mlkshk aliquip jean shorts ullamco
                ad vinyl cillum PBR. Homo nostrud organic, assumenda labore aesthetic magna delectus mollit. Keytar
                helvetica VHS salvia yr, vero magna velit sapiente labore stumptown. Vegan fanny pack odio cillum
                wes anderson 8-bit, sustainable jean shorts beard ut DIY ethical culpa terry richardson biodiesel.
                Art party scenester stumptown, tumblr butcher vero sint qui sapiente accusamus tattooed echo
                park.</p></div>


        <div class="tab-pane fade" role="tabpanel" id="post-image" aria-labelledby="post-image-tab">

            <div class="tab-pane active" id="module-optsii">
                <div class="form-group">
                    <div class="col-sm-12">
                        <div class="checkbox">
                            <label class="i-checks">
                                <input type="checkbox" name="options[option][icon-lip-wifi]" value="1">
                                <i></i>
                                Wi-Fi
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <div class="checkbox">
                            <label class="i-checks">
                                <input type="checkbox" name="options[option][icon-lip-bus]" value="1">
                                <i></i>
                                Автобус
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <div class="checkbox">
                            <label class="i-checks">
                                <input type="checkbox" name="options[option][icon-lip-administration]" value="1">
                                <i></i>
                                Администрация
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <div class="checkbox">
                            <label class="i-checks">
                                <input type="checkbox" name="options[option][icon-lip-aqualung]" value="1">
                                <i></i>
                                Акваланг
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <div class="checkbox">
                            <label class="i-checks">
                                <input type="checkbox" name="options[option][icon-lip-american-football]" value="1">
                                <i></i>
                                Американский футбол
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <div class="checkbox">
                            <label class="i-checks">
                                <input type="checkbox" name="options[option][icon-lip-baggage]" value="1">
                                <i></i>
                                Багаж
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <div class="checkbox">
                            <label class="i-checks">
                                <input type="checkbox" name="options[option][icon-lip-kayak]" value="1">
                                <i></i>
                                Байдарка
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <div class="checkbox">
                            <label class="i-checks">
                                <input type="checkbox" name="options[option][icon-lip-pool]" value="1">
                                <i></i>
                                Бассеин
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <div class="checkbox">
                            <label class="i-checks">
                                <input type="checkbox" name="options[option][icon-lip-credit-card]" value="1">
                                <i></i>
                                Безналичный расчёт
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <div class="checkbox">
                            <label class="i-checks">
                                <input type="checkbox" name="options[option][icon-lip-tickets]" value="1">
                                <i></i>
                                Билеты
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <div class="checkbox">
                            <label class="i-checks">
                                <input type="checkbox" name="options[option][icon-lip-billiards]" value="1">
                                <i></i>
                                Бильярд
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <div class="checkbox">
                            <label class="i-checks">
                                <input type="checkbox" name="options[option][icon-lip-boxing]" value="1">
                                <i></i>
                                Бокс
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <div class="checkbox">
                            <label class="i-checks">
                                <input type="checkbox" name="options[option][icon-lip-bowling]" value="1">
                                <i></i>
                                Боулинг
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <div class="checkbox">
                            <label class="i-checks">
                                <input type="checkbox" name="options[option][icon-lip-burger]" value="1">
                                <i></i>
                                Бургер
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <div class="checkbox">
                            <label class="i-checks">
                                <input type="checkbox" name="options[option][icon-lip-cooking]" value="1">
                                <i></i>
                                Варка
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <div class="checkbox">
                            <label class="i-checks">
                                <input type="checkbox" name="options[option][icon-lip-bike]" value="1">
                                <i></i>
                                Велосипед
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <div class="checkbox">
                            <label class="i-checks">
                                <input type="checkbox" name="options[option][icon-lip-abike]" value="1">
                                <i></i>
                                Велосипед
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <div class="checkbox">
                            <label class="i-checks">
                                <input type="checkbox" name="options[option][icon-lip-helicopter]" value="1">
                                <i></i>
                                Вертолёт
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <div class="checkbox">
                            <label class="i-checks">
                                <input type="checkbox" name="options[option][icon-lip-towels]" value="1">
                                <i></i>
                                Вешалка
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <div class="checkbox">
                            <label class="i-checks">
                                <input type="checkbox" name="options[option][icon-lip-wigwam]" value="1">
                                <i></i>
                                Виг-вам
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <div class="checkbox">
                            <label class="i-checks">
                                <input type="checkbox" name="options[option][icon-lip-videography]" value="1">
                                <i></i>
                                Видеосъемка
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <div class="checkbox">
                            <label class="i-checks">
                                <input type="checkbox" name="options[option][icon-lip-boat-trip]" value="1">
                                <i></i>
                                Водная прогулка
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <div class="checkbox">
                            <label class="i-checks">
                                <input type="checkbox" name="options[option][icon-lip-scuba-suit]" value="1">
                                <i></i>
                                Водный костюм
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <div class="checkbox">
                            <label class="i-checks">
                                <input type="checkbox" name="options[option][icon-lip-balloon]" value="1">
                                <i></i>
                                Воздушный шар
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <div class="checkbox">
                            <label class="i-checks">
                                <input type="checkbox" name="options[option][icon-lip-volleyball]" value="1">
                                <i></i>
                                Волейбол
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <div class="checkbox">
                            <label class="i-checks">
                                <input type="checkbox" name="options[option][icon-lip-time]" value="1">
                                <i></i>
                                Время
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <div class="checkbox">
                            <label class="i-checks">
                                <input type="checkbox" name="options[option][icon-lip-embroidery]" value="1">
                                <i></i>
                                Вышивка
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <div class="checkbox">
                            <label class="i-checks">
                                <input type="checkbox" name="options[option][icon-lip-guide]" value="1">
                                <i></i>
                                Гид
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <div class="checkbox">
                            <label class="i-checks">
                                <input type="checkbox" name="options[option][icon-lip-mountains]" value="1">
                                <i></i>
                                Горы
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <div class="checkbox">
                            <label class="i-checks">
                                <input type="checkbox" name="options[option][icon-lip-double-bed]" value="1">
                                <i></i>
                                Двухспальная кровать
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <div class="checkbox">
                            <label class="i-checks">
                                <input type="checkbox" name="options[option][icon-lip-dolphinarium]" value="1">
                                <i></i>
                                Дильфинарий
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <div class="checkbox">
                            <label class="i-checks">
                                <input type="checkbox" name="options[option][icon-lip-extra-bed]" value="1">
                                <i></i>
                                Дополнительная кровать
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <div class="checkbox">
                            <label class="i-checks">
                                <input type="checkbox" name="options[option][icon-lip-disabled]" value="1">
                                <i></i>
                                Доступная среда
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <div class="checkbox">
                            <label class="i-checks">
                                <input type="checkbox" name="options[option][icon-lip-shower]" value="1">
                                <i></i>
                                Душ
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <div class="checkbox">
                            <label class="i-checks">
                                <input type="checkbox" name="options[option][icon-lip-live-music]" value="1">
                                <i></i>
                                Живая музыка
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <div class="checkbox">
                            <label class="i-checks">
                                <input type="checkbox" name="options[option][icon-lip-refill]" value="1">
                                <i></i>
                                Заправка
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <div class="checkbox">
                            <label class="i-checks">
                                <input type="checkbox" name="options[option][icon-lip-cableway]" value="1">
                                <i></i>
                                Канатная дорого
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <div class="checkbox">
                            <label class="i-checks">
                                <input type="checkbox" name="options[option][icon-lip-map]" value="1">
                                <i></i>
                                Карта
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <div class="checkbox">
                            <label class="i-checks">
                                <input type="checkbox" name="options[option][icon-lip-quad-bike]" value="1">
                                <i></i>
                                Квадроцикл
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <div class="checkbox">
                            <label class="i-checks">
                                <input type="checkbox" name="options[option][icon-lip-key]" value="1">
                                <i></i>
                                Ключ
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <div class="checkbox">
                            <label class="i-checks">
                                <input type="checkbox" name="options[option][icon-lip-cocktail]" value="1">
                                <i></i>
                                Коктель
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <div class="checkbox">
                            <label class="i-checks">
                                <input type="checkbox" name="options[option][icon-lip-ferris-wheel]" value="1">
                                <i></i>
                                Колесо обозрения
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <div class="checkbox">
                            <label class="i-checks">
                                <input type="checkbox" name="options[option][icon-lip-Coffee]" value="1">
                                <i></i>
                                Кофе
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <div class="checkbox">
                            <label class="i-checks">
                                <input type="checkbox" name="options[option][icon-lip-summer-cafe]" value="1">
                                <i></i>
                                Летнее кафе
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <div class="checkbox">
                            <label class="i-checks">
                                <input type="checkbox" name="options[option][icon-lip-skiing]" value="1">
                                <i></i>
                                Лыжы
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <div class="checkbox">
                            <label class="i-checks">
                                <input type="checkbox" name="options[option][icon-lip-shops]" value="1">
                                <i></i>
                                Магазин
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <div class="checkbox">
                            <label class="i-checks">
                                <input type="checkbox" name="options[option][icon-lip-masquerade]" value="1">
                                <i></i>
                                Маскарад
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <div class="checkbox">
                            <label class="i-checks">
                                <input type="checkbox" name="options[option][icon-lip-meeting]" value="1">
                                <i></i>
                                Митинг
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <div class="checkbox">
                            <label class="i-checks">
                                <input type="checkbox" name="options[option][icon-lip-music]" value="1">
                                <i></i>
                                Музыка
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <div class="checkbox">
                            <label class="i-checks">
                                <input type="checkbox" name="options[option][icon-lip-inflatable-boat]" value="1">
                                <i></i>
                                Надувная лодка
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <div class="checkbox">
                            <label class="i-checks">
                                <input type="checkbox" name="options[option][icon-lip-table-tennis]" value="1">
                                <i></i>
                                Настольный тенис
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <div class="checkbox">
                            <label class="i-checks">
                                <input type="checkbox" name="options[option][icon-lip-no-smoking]" value="1">
                                <i></i>
                                Не курить
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <div class="checkbox">
                            <label class="i-checks">
                                <input type="checkbox" name="options[option][icon-lip-frankfurters]" value="1">
                                <i></i>
                                Немецкие сосиськи
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <div class="checkbox">
                            <label class="i-checks">
                                <input type="checkbox" name="options[option][icon-lip-dinner]" value="1">
                                <i></i>
                                Обед
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <div class="checkbox">
                            <label class="i-checks">
                                <input type="checkbox" name="options[option][icon-lip-lunch-room]" value="1">
                                <i></i>
                                Обеды в номер
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <div class="checkbox">
                            <label class="i-checks">
                                <input type="checkbox" name="options[option][icon-lip-currency-exchange]" value="1">
                                <i></i>
                                Обмен валюты
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <div class="checkbox">
                            <label class="i-checks">
                                <input type="checkbox" name="options[option][icon-lip-hotel]" value="1">
                                <i></i>
                                Отель
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <div class="checkbox">
                            <label class="i-checks">
                                <input type="checkbox" name="options[option][icon-lip-tent]" value="1">
                                <i></i>
                                Палатка
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <div class="checkbox">
                            <label class="i-checks">
                                <input type="checkbox" name="options[option][icon-lip-palm]" value="1">
                                <i></i>
                                Пальмы
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <div class="checkbox">
                            <label class="i-checks">
                                <input type="checkbox" name="options[option][icon-lip-park]" value="1">
                                <i></i>
                                Парк
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <div class="checkbox">
                            <label class="i-checks">
                                <input type="checkbox" name="options[option][icon-lip-parking]" value="1">
                                <i></i>
                                Парковка
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <div class="checkbox">
                            <label class="i-checks">
                                <input type="checkbox" name="options[option][icon-lip-sailing-ship]" value="1">
                                <i></i>
                                Парусная лодка
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <div class="checkbox">
                            <label class="i-checks">
                                <input type="checkbox" name="options[option][icon-lip-passport]" value="1">
                                <i></i>
                                Паспорт
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <div class="checkbox">
                            <label class="i-checks">
                                <input type="checkbox" name="options[option][icon-lip-afoot]" value="1">
                                <i></i>
                                Пешком
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <div class="checkbox">
                            <label class="i-checks">
                                <input type="checkbox" name="options[option][icon-lip-pizza]" value="1">
                                <i></i>
                                Пицца
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <div class="checkbox">
                            <label class="i-checks">
                                <input type="checkbox" name="options[option][icon-lip-swim]" value="1">
                                <i></i>
                                Плавать
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <div class="checkbox">
                            <label class="i-checks">
                                <input type="checkbox" name="options[option][icon-lip-beach-cocktail]" value="1">
                                <i></i>
                                Пляжный коктель
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <div class="checkbox">
                            <label class="i-checks">
                                <input type="checkbox" name="options[option][icon-lip-list]" value="1">
                                <i></i>
                                По списку
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <div class="checkbox">
                            <label class="i-checks">
                                <input type="checkbox" name="options[option][icon-lip-train]" value="1">
                                <i></i>
                                Поезд
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <div class="checkbox">
                            <label class="i-checks">
                                <input type="checkbox" name="options[option][icon-lip-support]" value="1">
                                <i></i>
                                Помощь
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <div class="checkbox">
                            <label class="i-checks">
                                <input type="checkbox" name="options[option][icon-lip-twin-beds]" value="1">
                                <i></i>
                                Раздельные кровати
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <div class="checkbox">
                            <label class="i-checks">
                                <input type="checkbox" name="options[option][icon-lip-rapier]" value="1">
                                <i></i>
                                Рапиры
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <div class="checkbox">
                            <label class="i-checks">
                                <input type="checkbox" name="options[option][icon-lip-rice]" value="1">
                                <i></i>
                                Рис
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <div class="checkbox">
                            <label class="i-checks">
                                <input type="checkbox" name="options[option][icon-lip-rolls]" value="1">
                                <i></i>
                                Ролы
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <div class="checkbox">
                            <label class="i-checks">
                                <input type="checkbox" name="options[option][icon-lip-fish]" value="1">
                                <i></i>
                                Рыба
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <div class="checkbox">
                            <label class="i-checks">
                                <input type="checkbox" name="options[option][icon-lip-backpack]" value="1">
                                <i></i>
                                Рюкзак
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <div class="checkbox">
                            <label class="i-checks">
                                <input type="checkbox" name="options[option][icon-lip-dog]" value="1">
                                <i></i>
                                С животными
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <div class="checkbox">
                            <label class="i-checks">
                                <input type="checkbox" name="options[option][icon-lip-aircraft]" value="1">
                                <i></i>
                                Самолёт
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <div class="checkbox">
                            <label class="i-checks">
                                <input type="checkbox" name="options[option][icon-lip-sandals]" value="1">
                                <i></i>
                                Сандали
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <div class="checkbox">
                            <label class="i-checks">
                                <input type="checkbox" name="options[option][icon-lip-safe]" value="1">
                                <i></i>
                                Сейф
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <div class="checkbox">
                            <label class="i-checks">
                                <input type="checkbox" name="options[option][icon-lip-scooter]" value="1">
                                <i></i>
                                Скутер
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <div class="checkbox">
                            <label class="i-checks">
                                <input type="checkbox" name="options[option][icon-lip-snowmobile]" value="1">
                                <i></i>
                                Снегоход
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <div class="checkbox">
                            <label class="i-checks">
                                <input type="checkbox" name="options[option][icon-lip-snowboard]" value="1">
                                <i></i>
                                Сноуборд
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <div class="checkbox">
                            <label class="i-checks">
                                <input type="checkbox" name="options[option][icon-lip-gym]" value="1">
                                <i></i>
                                Спортзал
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <div class="checkbox">
                            <label class="i-checks">
                                <input type="checkbox" name="options[option][icon-lip-stadium]" value="1">
                                <i></i>
                                Стадион
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <div class="checkbox">
                            <label class="i-checks">
                                <input type="checkbox" name="options[option][icon-lip-building]" value="1">
                                <i></i>
                                Строение
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <div class="checkbox">
                            <label class="i-checks">
                                <input type="checkbox" name="options[option][icon-lip-soup]" value="1">
                                <i></i>
                                Супы
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <div class="checkbox">
                            <label class="i-checks">
                                <input type="checkbox" name="options[option][icon-lip-taxi]" value="1">
                                <i></i>
                                Такси
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <div class="checkbox">
                            <label class="i-checks">
                                <input type="checkbox" name="options[option][icon-lip-tv]" value="1">
                                <i></i>
                                Телевизор
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <div class="checkbox">
                            <label class="i-checks">
                                <input type="checkbox" name="options[option][icon-lip-run-baggage]" value="1">
                                <i></i>
                                Тележка для багажа
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <div class="checkbox">
                            <label class="i-checks">
                                <input type="checkbox" name="options[option][icon-lip-tennis]" value="1">
                                <i></i>
                                Тенис
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <div class="checkbox">
                            <label class="i-checks">
                                <input type="checkbox" name="options[option][icon-lip-pass]" value="1">
                                <i></i>
                                Требуется подтверждение личности
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <div class="checkbox">
                            <label class="i-checks">
                                <input type="checkbox" name="options[option][icon-lip-no-photo]" value="1">
                                <i></i>
                                Фото запрещёно
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <div class="checkbox">
                            <label class="i-checks">
                                <input type="checkbox" name="options[option][icon-lip-photo]" value="1">
                                <i></i>
                                Фотограифя
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <div class="checkbox">
                            <label class="i-checks">
                                <input type="checkbox" name="options[option][icon-lip-hostel]" value="1">
                                <i></i>
                                Хостел
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <div class="checkbox">
                            <label class="i-checks">
                                <input type="checkbox" name="options[option][icon-lip-temple]" value="1">
                                <i></i>
                                Храм
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <div class="checkbox">
                            <label class="i-checks">
                                <input type="checkbox" name="options[option][icon-lip-church]" value="1">
                                <i></i>
                                Церковь
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <div class="checkbox">
                            <label class="i-checks">
                                <input type="checkbox" name="options[option][icon-lip-tea]" value="1">
                                <i></i>
                                Чай
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <div class="checkbox">
                            <label class="i-checks">
                                <input type="checkbox" name="options[option][icon-lip-champagne]" value="1">
                                <i></i>
                                Шампанское
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <div class="checkbox">
                            <label class="i-checks">
                                <input type="checkbox" name="options[option][icon-lip-chess]" value="1">
                                <i></i>
                                Шахматы
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <div class="checkbox">
                            <label class="i-checks">
                                <input type="checkbox" name="options[option][icon-lip-recliner]" value="1">
                                <i></i>
                                Шезлонг
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <div class="checkbox">
                            <label class="i-checks">
                                <input type="checkbox" name="options[option][icon-lip-hat]" value="1">
                                <i></i>
                                Шляпа
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <div class="checkbox">
                            <label class="i-checks">
                                <input type="checkbox" name="options[option][icon-lip-purchases]" value="1">
                                <i></i>
                                Шопинг
                            </label>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>

@endsection
