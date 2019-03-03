<div class="panel panel-default box-shadow-lg wrapper-md news-email" data-mh="main-news">
    <p class="h3 font-thin m-b-lg">
        {{__('Subscribe to the newsletter')}}
    </p>
    <form role="form" data-mh="main-last-block">
        <div class="form-group m-t-md">
            <label class="text-sm text-left">{{__('Enter your Email')}}:</label>
            <input type="email" placeholder="{{__('Enter Email')}}" class="form-control">
        </div>
        <em class="m-t-md help-block m-b-none text-sm">{{__('By clicking on the button below, you agree to the processing of your personal data.')}}</em>
    </form>

    <p class="text-center m-t-md">
        <button type="submit" class="btn btn-success btn-group-justified text-u-c">
            {{__('Subscribe')}}
        </button>
    </p>

</div>