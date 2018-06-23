<div class="panel wrapper-xl b box-shadow-lg padder-lg" id="newletter">
    <p class="h3 font-thin  m-b-lg">Новостная <span class="text-danger">Рассылка</span></p>
    <form role="form" id="newletter-form" v-on:submit.prevent="send">

        <div class="form-group form-group-default m-t-md">
            <label class="text-sm text-left">Адрес электронной почты</label>
            <input type="email" maxlength="200" required v-model="email" placeholder="Введите Email"
                   class="form-control">
        </div>

        <span class="m-t-md help-block m-b-none text-xs"> *Ваши личные данные не попадут в руки третьих лиц.</span>

    </form>

    <p class="text-center">
        <button type="submit" form="newletter-form" class="btn btn-danger btn-rounded">Подписаться</button>
    </p>
</div>