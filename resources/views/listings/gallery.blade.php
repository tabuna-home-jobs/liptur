@extends('layouts.app')


@section('title','Галерея')
@section('description','Изображения Липецкой области')
@section('keywords','Липецк фото, липецкая область фото')

@section('content')

    <section class="container-fluid">
        <div class="row">
            <div style="background:url({{$mostPopular->first()->original_url}}) center center; background-size:cover">
                <div class="wrapper-xl bg-black-opacity bg-dark min-h-h pos-rlt text-ellipsis">
                    <div class="row m-t">

                        <div class="container m-t-md top-desc-block">
                            <div class="col-md-6  pull-bottom text-white">
                                <h1 class="text-white text-ellipsis padder-v xs-x-scroll">Галерея</h1>
                            </div>
                        </div>

                    </div>
                </div>
            </div>


            <nav class="bg-danger box-shadow-lg">
                <div class="container">

                    @include('partials.breadcrumb',[
                        'breadcrumb' => [],
                        'current' => 'Галерея'
                    ])

                </div>
            </nav>


        </div>
    </section>

    <section class="bg-white b-t box-shadow-lg" id="photo-albums">
        <div class="container padder-v">
            <div class="wrapper m-b-md">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="page-header">
                            <h2 class="font-thin">Альбомы
                                <small><span class="text-danger">{{$countGallery}}</span></small>
                            </h2>
                        </div>
                    </div>
                </div>

                <div class="row row-sm">
                    @foreach($gallery as $album )
                        @if($album->attachment->count() > 0)
                            <div class="col-xs-6 col-sm-4 col-md-3">
                                <div class="item padder-v">
                                    <div class="pos-rlt">
                                        <div class="bottom">
                                            <div class="v-center">
                                                <span class="text-white small wrapper w-sm">{{$album->getContent('name')}}</span>
                                                <span class="pull-right text-white m-l-xxl">{{$album->attachment->count()}}
                                                    фото</span>
                                            </div>
                                        </div>
                                        <div class="item-overlay bg-black-opacity r r-2x r r-2x">
                                            <div class="center text-center m-t-n w-full">
                                                <a v-on:click="loadAlbom({{$album->id}})">
                                                    <i class="fa fa-2x icon-eye text-white"></i>
                                                </a>
                                            </div>
                                        </div>
                                        <a v-on:click="loadAlbom({{$album->id}})"
                                           class="block b box-shadow r r-2x">
                                            <img src="{{$album->attachment->first()->url('medium')}}" alt=""
                                                 class="img-responsive img-full r r-2x">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>

                <div class="row padder-v text-center">
                    <div class="col-xs-12">
                        {{ $gallery->appends(Request::except('page'))->links() }}
                    </div>
                </div>
{{--
                <div class="row">
                    <div class="col-xs-12">
                        <div class="page-header">
                            <h2 class="font-thin">Лучшие <span class="text-danger">Фото</span></h2>
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="vbox">
                        <div class="padder-lg">

                            <div class="row row-sm">

                                <div class="mansory2">

                                    <div class="row">
                                        @foreach($mostPopular as $image)
                                            <div class="item">
                                                <div class="pos-rlt">
                                                    <a class="fancybox2"
                                                       v-on:click="loadAlbomPhoto({{$image->post_id}},{{$image->likable_id}})"
                                                       rel="gallery">
                                                        <img src="{{$image->url}}"
                                                             alt="" class="r img-responsive r-2x img-full"/>
                                                    </a>

                                                </div>
                                            </div>

                                            <div class="clearfix visible-xs"></div>
                                        @endforeach
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
--}}

            </div>
        </div>


        <div class="modal fade slide-up disable-scroll" id="photoShowGallery" tabindex="-1" role="dialog"
             aria-hidden="false">
            <div class="modal-dialog modal-lg modal-xl" id="view-photo">
                <div class="modal-content-wrapper">
                    <div class="modal-content no-border" v-if="photos.length > 0">
                        <div class="row bg-white scroll-h">
                            <div class="col-sm-8 bg-black">
                                <div class="pos-rlt image-wrapper">
                                    <div class="photo-next left" v-on:click="next()">
                                        <i class="icon-arrow-left"></i>
                                    </div>
                                    <img v-bind:src="photos[active].url"
                                         :key="photos[active].url"
                                         class="img-responsive center" style="height: inherit;">
                                    <div class="photo-next right" v-on:click="prev()">
                                        <i class="icon-arrow-right"></i>
                                    </div>
                                </div>
                                <p class="small m-t-xs">
                                    <span>@{{active +1}} / @{{photos.length}}</span>
                                    <a v-bind:href="photos[active].original_url" target="_blank"
                                       class="pull-right down-load-link">Скачать оригинал</a>
                                </p>
                            </div>
                            <div class="col-sm-4 bg-white m-t-xl no-padder">
                                <div class="padder">
                                    <p class="font-bold text-md">@{{photos[active].original_name}}</p>
                                    <p class="small text-dark text-ellipsis" v-bind:alt="photos[active].description">
                                        @{{photos[active].description}}
                                    </p>
                                </div>
                                <div class="padder-v bg-light">
                                    <div class="padder">
                                        <span><i class="icon-clock m-r-xs"></i> @{{ dateFormat() }}</span>


                                        <div class="pull-right">
                                            @if(Auth::check())
                                                <div>
                                                    <a v-on:click="like(photos[active].id)" class="">
                                                        <i class="icon-heart m-r-xs"></i> <span
                                                                class="m-r-xs">Нравится</span> <span
                                                                v-bind:class="{ 'bg-danger': getStatus() }"
                                                                class="badge">
                                                        <span v-if="photos[active].like_counter">@{{ photos[active].like_counter.count || '' }}</span>
                                                    </span>
                                                    </a>
                                                </div>

                                            @else

                                                <span class="" data-container="body" data-toggle="popover"
                                                      data-placement="top" data-content="Необходимо авторизоваться">
        <i class="icon-heart m-r-xs"></i> <span class="m-r-xs">Нравится</span>
        <span class="badge">  <span
                    v-if="photos[active].like_counter">@{{ photos[active].like_counter.count || '' }}</span></span>
    </span>

                                            @endif
                                        </div>
                                    </div>
                                </div>


                                <!-- BEGIN Alerts View !-->
                                <div class="view bg-white">


                                    <!-- BEGIN Alert List !-->
                                    <div class="list-view-wrapper list-view b-t" style="height: 100vh;
    max-height: 480px;">


                                        <!-- Chat -->

                                        <div class="panel chat">
                                            <div class="panel-body">


                                                <div class="m-b" v-for="message in photos[active].comments">


                                                <span class="pull-left thumb-sm avatar"
                                                      v-bind:title="message.author.name"><img
                                                            v-bind:src="message.author.avatar" class="img-responsive"
                                                            style="height: inherit;">
                                                    <small class="text-muted m-b pull-left text-ellipsis w-full">@{{message.author.name}}</small>
                                                </span>


                                                    <div class="m-l-xxl">
                                                        <div class="pos-rlt wrapper-sm b b-light r r-2x">
                                                            <span class="arrow left pull-up"></span>

                                                            <p class="m-b-none  text-break">@{{message.content}}</p>
                                                        </div>
                                                        <small class="text-muted">
                                                            @{{dataFormatLolization(message.created_at)}}
                                                        </small>
                                                    </div>

                                                </div>

                                                <div class="m-t-xxl m-b-xxl text-center"
                                                     v-if="photos[active].comments.length < 1">
                                                    <small class="text-center">
                                                        Будьте первым, кто прокомментирует эту фотографию.
                                                    </small>
                                                </div>


                                            </div>
                                            <footer class="panel-footer w-full">


                                            @if(Auth::check())
                                                <!-- chat form -->
                                                    <div class="m-t-md">
                                                        <div class="m-b-none">
                                                            <div class="input-group">
                                                                <input type="text"
                                                                       class="form-control form-control-grey" required
                                                                       v-model="newMessage"
                                                                       v-on:keyup.enter="sendMessage"
                                                                       placeholder="Написать комментарий"
                                                                       maxlength="100">
                                                                <span class="input-group-btn">
                  <button class="btn btn-default" type="button" v-on:click="sendMessage"><i class="fa fa-paper-plane-o"
                                                                                            aria-hidden="true"></i>
                  </button>
                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @else
                                                    <div>
                                                        <div class="m-b-none">
                                                            <p class="text-center">
                                                                <small>Требуется авторизация</small>
                                                            </p>
                                                        </div>
                                                    </div>

                                                @endif

                                            </footer>
                                        </div>

                                        <!-- Chat -->


                                    </div>
                                    <!-- END Alert List !-->
                                </div>
                                <!-- EEND Alerts View !-->
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>


    </section>

@endsection


@push('scripts')

    <script>
        $(function () {
            const photoAlbums = new Vue({
                el: '#photo-albums',
                data: {
                    newMessage: '',
                    album: null,
                    photos: [],
                    active: 0,
                    status: false,
                    submit: false,
                },
                methods: {
                    loadData: function (id) {
                        if (this.album !== id) {

                            this.album = id;
                            this.photos = [];
                            this.active = 0;

                            this.$http.post('/' + $('html').attr('lang') + '/gallery/' + id, {
                                headers: {
                                    'Content-Type': 'multipart/form-data'
                                }
                            }).then(function (response) {
                                this.photos = response.data;

                            });
                        }
                    },
                    loadAlbom: function (id) {

                        new Promise(function (resolve) {

                            photoAlbums.loadData(id);

                            setTimeout(function () {
                                resolve(1);
                            }, 500)


                        }).then(function (value) {

                            $('#photoShowGallery').modal('toggle');
                        });

                    },
                    loadAlbomPhoto: function (albom, photo) {
                        photo = Number(photo);

                        new Promise(function (resolve) {

                            photoAlbums.loadData(albom);

                            setTimeout(function () {
                                resolve(1);
                            }, 500)

                        }).then(function (value) {

                            photoAlbums.photos.forEach(function (item, i, arr) {
                                if (item.id === photo) {
                                    photoAlbums.active = i;
                                    return;
                                }
                            });

                            $('#photoShowGallery').modal('toggle');

                        });


                    },
                    next: function () {
                        if (this.active === 0) {
                            this.active = this.photos.length - 1;
                        } else {
                            this.active--;
                        }
                    },
                    prev: function () {
                        if (this.photos.length > this.active + 1) {
                            this.active++;
                        } else {
                            this.active = 0;
                        }
                    },
                    dateFormat: function () {
                        return moment(this.photos[this.active].created_at).format("DD.MM.YYYY");
                    },
                    dataFormatLolization: function (data) {
                        return moment(data).fromNow();
                    },
                    like: function (id) {
                        if (!this.submit) {
                            this.submit = true;

                            this.$http.put('/' + $('html').attr('lang') + '/gallery/like/' + id).then(function (response) {
                            });

                            (this.photos[this.active].count) ? this.photos[this.active].count-- : this.photos[this.active].count++;
                            this.status = !this.status;
                            this.submit = false;

                            this.$http.post('/' + $('html').attr('lang') + '/gallery/' + this.album, {
                                headers: {
                                    'Content-Type': 'multipart/form-data'
                                }
                            }).then(function (response) {
                                this.photos = response.data;
                            });


                        }
                    },
                    getStatus: function () {
                        var auth = new Boolean($('meta[name="user_id"]').attr('auth'));
                        var user = $('meta[name="user_id"]').attr('content');

                        if (!auth) {
                            console.log('пользователь не авторизован');
                            return false;
                        }

                        var active = false;
                        this.photos[this.active].likes.forEach(function (item, i, arr) {
                            if (item.user_id == user) {
                                active = true;
                                return;
                            }
                        });

                        console.log(active);

                        return active;
                    },
                    sendMessage: function () {
                        var message = this.newMessage.trim();

                        if (message) {
                            //Показывыем клиенту

                            this.$http.put('/' + $('html').attr('lang') + '/gallery/comment/' + this.photos[this.active].id, {
                                content: message,
                                headers: {
                                    'Content-Type': 'multipart/form-data'
                                }
                            }).then(function (response) {
                                photoAlbums.newMessage = '';

                                photoAlbums.photos[photoAlbums.active] = response.data;

                                //photoAlbums.loadAlbom()
                            });

                            //$('#dialog-container').animate({scrollTop: $('#dialog-container')[0].scrollHeight}, 700);
                        }


                    },

                }
            });



            document.onkeydown = checkKey;

            function checkKey(e) {

                e = e || window.event;

                if (e.keyCode == '38') {
                    // up arrow
                }
                else if (e.keyCode == '40') {
                    // down arrow
                }
                else if (e.keyCode == '37') {
                    // left arrow
                    photoAlbums.prev();
                }
                else if (e.keyCode == '39') {
                    // right arrow
                    photoAlbums.next();
                }

            }

        });

    </script>

@endpush
