<div class="container padder-v comments">
    <div class="block-header comment-header padder-v-micro padder-b-v-xs">
        Комментарии
    </div>
    <div class="col-md-8">
        <div class="row">
            <div class="panel panel-default padder-v padder-b-v-md">
                <div class="col-xs-12">
                    @if (Auth::guest())
                        <a href="{{url('/login')}}" class="text-green text-bold">
                            <button class="btn btn-primary btn-circled  m-r-xs">
                                <i class="user-auth-icon"></i>
                            </button>
                            Войти
                        </a>
                    @else 
                      <div>
                        <a href="{{ url('/profile') }}">
                          <span class="thumb-sm avatar">
                            <img src="{{Auth::user()->getAvatar() }}" alt="{{Auth::user()->name}}">
                            &nbsp;<strong>{{Auth::user()->name}}</strong>
                          </span>
                        </a>
                      </div>
                      <div class="m-t-md">
                        <em class="text-sm text-grey">
                          Оцените данный товар:  
                        </em>
                        <span id="stars-existing" class="starrr text-warning-lt text-xl v-middle"
                            {{-- $rating->percent / $item->id --}}
                            data-rating='0' data-post-id='1'
                            style="cursor: pointer;"></span>
                      </div>
                    @endif
                    <div class="padder-v">
                      <div class="form-group">
                        <textarea rows="5" required
                                  v-model="commentText"
                                  class="form-control no-resize no-border form-control-grey"
                                  placeholder="Напишите ваш комментарий"
                        ></textarea>
                      </div>
                      <div>
                          <button v-on:click="addComment()" <?php if (Auth::guest()){ ?> disabled <?php } ?> class="btn btn-primary">ДОБАВИТЬ</button>
                          <a class="btn" v-on:click="clearComment()" <?php if (Auth::guest()){ ?> disabled <?php } ?>>Отменить</a>
                      </div>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
            <div>
              @forelse($comments as $comment)
                <div class="b-b">
                  <div class="wrapper-md">
                      <p class="pull-left thumb-sm">
                          <img src="{{$comment->author->avatar}}" class="img-circle">
                      </p>
                      <div class="m-l-xxl m-b">
                        <div>
                            <strong>{{$comment->author->name}}</strong>
                            <span class="text-muted text-sm block">
                                    @php
                                        Carbon\Carbon::setLocale('ru');
                                    @endphp
                                    {{$comment->created_at->diffForHumans()}}
                                </span>
                        </div>
                      </div>
                        <div class="m-l-sm m-t-sm">
                            {!! nl2br(e($comment->content)) !!}
                        </div>
                  </div>
                </div>
              @empty
                  <div class="alert alert-info text-center" role="alert">Пока нет комментариев</div>
              @endforelse
            </div>
        </div>
    </div>
    <div class="col-md-4 visible-lg">
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