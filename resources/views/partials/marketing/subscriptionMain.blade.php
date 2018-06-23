<article class="col-md-4 panel b box-shadow-lg wrapper-lg" id="newletter">
    <p class="h3 font-thin  m-b-lg">Новостная <span class="text-danger">Рассылка</span></p>
    <form role="form" data-mh="main-info-block" data-test="main-last-block" id="newletter-form"
          v-on:submit.prevent="send">
        <i class="icon-envelope-letter text-danger icon-title"></i>


        <div class="form-group form-group-default m-t-md">
            <label class="text-sm text-left">Адрес электронной почты</label>
            <input type="email" maxlength="200" required v-model="email" placeholder="Введите Email"
                   class="form-control">
        </div>

        <span class="m-t-md help-block m-b-none text-xs"> *Ваши личные данные не попадут в руки третьих лиц.</span>

    </form>

    <p class="text-center m-t-md">
        <button type="submit" form="newletter-form" class="btn btn-danger btn-rounded">Подписаться</button>
    </p>
</article>