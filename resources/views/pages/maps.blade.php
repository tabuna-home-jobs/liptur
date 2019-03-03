@extends('layouts.app-new')
@section('top-advertising','')

@section('content')

@if (Auth::check())
    @push('scripts')
        <script>isLogged = true</script>
    @endpush
@else
    @push('scripts')
        <script>isLogged = false</script>
    @endpush
@endif



    <section id="global-map-wrapper" class="maps-style">

        <div id="route_window_toggler" v-on:click=" collapsed = !collapsed">
            <!--<i class="fa fa-plus-circle fa-inverse" style="font-size:48px;"></i>-->
            <div class="route_toggler_inner-wrapper">
                <div class="dashed-circle">
                    <div class="dashed-circle--border"></div>
                    <span class="dashed-circle--text">+</span>
                </div>
                <span class="create-route-text">Создать Маршрут</span>
            </div>

        </div>


        <div class="b box-shadow-lg bg-white">
            <div class="owl-carousel owl-theme poster global-maps-menu-carousel">

                @foreach($types as $item)

                    <a data-slug="{{$item->slug}}" class="text-center map-category" title="{{$item->name}}">
                        <div class="caption padder-v">
                            <i class="fa fa-3x {{$item->icon}} block m-b"></i>
                            <span class="text-ellipsis padder-md hidden-xs">{{$item->name}}</span>
                        </div>
                    </a>

                @endforeach

            </div>
        </div>


        <div id="map_pusher">

            <div v-bind:class="{'is-collapsed':collapsed }" id="collapsed_div">

                <div id="collapsed_div_header">
                    <span>Построй свой маршрут выходного дня</span>
                </div>

                <div id="dinamic_content_wrapper">
                    <div id="sortable" class="dinamic_routes_content">
                        <div id="add_route_instruction">
                            Здесь будут отображаться выбранные точки маршрута.
                            Нажмите на маркер на карте, чтобы создать маршрут.
                        </div>

                    </div>
                </div>

                <div id="add_route_wrapper">
                    <input type="text" id="find_route_input" placeholder="+ Добавить пункт маршрута">

                    <button id="find_route_btn" class="btn btn-success btn-rounded" type="button">
                            <i class="fa fa-search"></i> Найти
                    </button>
                </div>

                <div id="save_reset_buttons">
                    <button type="button" id="reset_route_btn" class="save_reset_btn">Сбросить</button>
                    <button type="button" id="save_route_btn" class="btn btn-info btn-lg save_reset_btn"
                            data-toggle="modal" data-target="#confirmModal">Сохранить</button>

                    <div id="confirmModal" class="modal fade" role="dialog">
                        <div class="modal-dialog">

                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Маршрут успешно сохранён.
                                                            Перейти к списку выбраных маршрутов или остаться?</h4>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" id="stay_here_btn" class="btn btn-default" data-dismiss="modal">Остаться</button>
                                    <button type="button" id="go_to_route_btn" class="btn btn-default">Перейти</button>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
           </div>


            <div id="search_res_window">
                <div id="search_res_window_header">Результаты поиска
                    <button type="button" id="close_search_btn"><i class="fa fa-times"></i></button>
                </div>
                <div id="search_result_wrapper"></div>
            </div>

        </div>



        <div id="global-map" class="global-maps">

        </div>

    </section>

@endsection

@section('ad-carousel','')
@section('footer','')

@push('scripts')
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB_9M5O7t88YovZa2mePQ9VX4f79c86cqg"
        type="text/javascript"></script>

<script>

    $(document).ready(function () {

        $.ajaxSetup({
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
        });

        var dinamic_routes_content = $('.dinamic_routes_content');
        var collapsed_div = $('#collapsed_div');
        var search_result_wrapper = $('#search_result_wrapper');
        var sortable = $( "#sortable" );

        //Counter for storing not more then 10 routs in window
        var routeCounter = 1;

        $(function() {
            sortable.sortable();
            sortable.disableSelection();
        });

        $('.route_toggler_inner-wrapper').click(function (e) {
            //e.stopImmediatePropagation();

            var create_route_text = $('.create-route-text');

            var dashed_circle_text = $('.dashed-circle--text');

            create_route_text.fadeOut(function () {
                create_route_text.text((create_route_text.text() == 'Создать Маршрут') ? 'Свернуть' : 'Создать Маршрут').fadeIn();
            });

            dashed_circle_text.fadeOut(function () {
                dashed_circle_text.text((dashed_circle_text.text() == '+') ? '-' : '+').fadeIn();
            });

        });

        if(!isLogged) {
            $('#save_route_btn').attr('disabled', 'disabled');
            $('#add_route_instruction').text('Для сохранения маршрута необходимо авторизоваться')
        } else {
            console.log("Yes");
        }

        //------------Delete route in the window--------------------//
        dinamic_routes_content.on('click', '.route_delete_btn_container', function () {
            var id = $(this).parent().find('.hidden_id').text();
            //console.log(id);

            for (i = 0; i < window.idObject.length; i++) {
                if(window.idObject[i] = id) {
                    window.idObject.splice(i, 1);
                }
            }
            routeCounter--;

            $(this).parent().remove();
        });

        //----------Empty window------------//
        $('#reset_route_btn').click(function () {
            dinamic_routes_content.empty();
            window.idObject = [];
        });

        //-------- Save route from window--------//

        $('#save_route_btn').click(function () {
            if ($.trim(dinamic_routes_content.html()).length) {

                var idResultObject = {};

                for (i = 0; i < window.idObject.length; i++) {
                    idResultObject[i] = window.idObject[i];
                }

                var jsonData = JSON.stringify(idResultObject);

                $.post("profile/places/store", {data: jsonData})
                    .done(function () {
                        routeCounter = 1;
                        dinamic_routes_content.empty();

                        $('#confirmModal').modal('show');
                        //window.location.href = 'profile/route';
                        /* var success_response_div = '<div id="success_response_div">Ваш маршрут сохранен</div>';
                         dinamic_routes_content.empty().html(success_response_div);*/
                    })
                    .fail(function () {
                        var error_response_div = '<div id="error_response_div">Пожалуйста, повторите попытку снова</div>';
                        dinamic_routes_content.empty().html(error_response_div);
                    });
                window.idObject = [];
            } //endif
        }); //end click

        //--------Redirect to user's route---------//

        $('#go_to_route_btn').click(function () {
            window.location.href = 'profile/route';
        });

        //--------Find route button handler-----------//

        $('#find_route_btn').click(function(event) {
            event.preventDefault();

            var search_res_window = $('#search_res_window');

            search_result_wrapper.empty();

            var query = $('#find_route_input').val();

            $.post("search/places", {query: query}, function (data) {
                 //console.log("Search data", data);

                if(data.length == 0) {
                    var noSearchData = '<div id="error_response_div">По вашему запросу ничего не найдено</div>';
                    search_result_wrapper.empty().html(noSearchData);
                }

                for (key in data) {
                    var id = data[key].id;
                    var image = data[key].image;
                    var name = data[key].name;
                    var address = data[key].place.name;

                    var searchResults = '<div class="search_result"><span class="hidden_id" style="display:none;">'+ id +'</span>' +
                                        '<span class="hidden_image" style="display:none;">'+ image +'</span>' +
                                        '<span class="search_name"><b>' + name + '</b></span><span class="search_address">' + address + '</span></div>';
                    search_result_wrapper.append(searchResults);
                }
                search_res_window.show();
            });
        });

        //---------- Search result handler ------------//

        search_result_wrapper.on('click', '.search_result', function (e) {
            e.stopImmediatePropagation();

            if(routeCounter <= 10) {

                $('#add_route_instruction').hide();

                var id = $(this).find('.hidden_id').text();
                var image = $(this).find('.hidden_image').text();
                var name = $(this).find('.search_name').text();
                var address = $(this).find('.search_address').text();

                if (window.idObject.indexOf(id) == -1) {
                    window.idObject.push(id);
                    if(!image){
                        image='/img/no-image.jpg';
                    }
                    console.log(image);

                    var dynamicDiv = '<div class="user_route ui-state-default"><p class="id_marker" style="display:none;">' + id + '</p><div class="route_img"><img class="dynamic_image" src="' + image + '" alt="">' +
                        '</div><div class="route_name"><span><b>' + name + '</b></span><span>' + address + '</span></div><div class="route_delete_btn_container"><button id="delete_route_btn">' +
                        '<span><i class="fa fa-trash-o"></i></span></button></div></div></div>';

                    dinamic_routes_content.append(dynamicDiv);
                    routeCounter++;
                }
            }
            sortable.sortable("refresh");
        });

        //--------Add marker to the custom routes on click button in infoWindow--------//

        $('body').on('click', '.save_infowindow_btn', function (e) {
            $('#add_route_instruction').hide();

            collapsed_div.show(
                {done: function() {
                    var create_route_text = $('.create-route-text');

                    var dashed_circle_text = $('.dashed-circle--text');

                    create_route_text.fadeOut(function () {
                        create_route_text.text((create_route_text.text() == 'Создать Маршрут') ? 'Свернуть' : 'Создать Маршрут').fadeIn();
                    });
                    dashed_circle_text.fadeOut(function () {
                        dashed_circle_text.text((dashed_circle_text.text() == '+') ? '-' : '+').fadeIn();
                    });
                }
            });

            $('.route_toggler_inner-wrapper').click(function () {
                collapsed_div.toggle();
            });

            if(routeCounter <= 10) {

                var idDiv = $(this).attr('id');

                for (markers in window.markersArray) {
                    if ('save_infowindow_btn' + window.markersArray[markers].infoWindow.id == idDiv) {
                        var dinamic_routes_content = $('.dinamic_routes_content');
                        var marker = window.markersArray[markers];
                        var id = marker.infoWindow.id;
                        var image = marker.infoWindow.image;
                        var name = marker.infoWindow.name;
                        var address = marker.infoWindow.address;

                        if (window.idObject.indexOf(id) == -1) {
                            window.idObject.push(id);
                            if(!image){
                                image='/img/no-image.jpg';
                            }
                            console.log(image);

                            var dynamicDiv = '<div class="user_route ui-state-default"><p class="id_marker" style="display:none;">' + id + '</p><div class="route_img"><img class="dynamic_image" src="' + image + '" alt="">' +
                                '</div><div class="route_name"><span><b>' + name + '</b></span><span>' + address + '</span></div><div class="route_delete_btn_container"><button id="delete_route_btn">' +
                                '<span><i class="fa fa-trash-o"></i></span></button></div></div></div>';

                            dinamic_routes_content.append(dynamicDiv);
                        }
                    }
                }
            }
            sortable.sortable("refresh");
        });

        $("#close_search_btn").click(function (e) {
            e.stopPropagation();
            $("#search_res_window").hide();
        });

        $('.map-category').click(function(e) {
          globalMaps.load($(this).attr('data-slug'))
        });

    });
</script>

@endpush
