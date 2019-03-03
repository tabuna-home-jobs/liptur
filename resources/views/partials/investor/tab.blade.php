<div>
    <div class="col-md-3 no-padder hidden-xs">

        <div class="list-group" >
                <a class="list-group-item list-group-item-action"

                   href="#{{$offer->slug}}"
                   role="tab"
                   data-toggle="tab"
                   aria-controls="{{$offer->slug}}"
                   id="{{$offer->slug}}-tab"
                   style="margin-left: {{$count + 30}}px"

                >
                    {{$offer->term->getContent('name')}}

                </a>
                @include('partials.investor.list',[
                'offer' => $offer,
                'count' => $count + 30,
                ])
        </div>

        <div class="panel b box-shadow-lg no-border panel-header no-padder col-md-10 hidden-xs" data-mh="main-info-block" style="
    overflow: hidden;
">

            <div class="block-header text-lighted  position-relative">
                {{(($locale=="en")?'Contacts':'Контакты')}}
            </div>

            <div class="wrapper-md">
                <div class="">
                    @if ($locale=="en")
                        <p class="">the regional government organization "Cluster development center of tourism in Lipetsk region".</p>
                    @else
                        <p class="">ОКУ "Центр кластерного развития туризма Липецкой области"</p>
                    @endif
                        <p class="text-justify text-roboto text-link text-brand-grey m-b-none">+7 4742 22-03-58<br/>+7 800 100-30-48</p>
                        <a href="mailto:Oby.crt48@gmail.com" class="text-green d-block text-roboto text-link">Oby.crt48@gmail.com</a>
                        <a href="www.liptur.ru" class="text-green d-block text-roboto text-link">www.liptur.ru</a>

                </div>
            </div>


        </div>

    </div>
    <div class="col-xs-12 no-padder visible-xs m-b-md">
        <div class="dropdown inline col-xs-12 no-padder">
            <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenuInvestorList" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                {{str_limit($offer->term->getContent('name'),35)}}
                <span class="caret"></span>
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuInvestorList" role="tablist">
                    <li class="active">
                        <a class="dropdown-item text-wrap"

                           href="#{{$offer->slug}}"
                           role="tab"
                           data-toggle="tab"
                           aria-controls="{{$offer->slug}}"
                           id="{{$offer->slug}}-tab"
                           style="margin-left: {{$count + 30}}px"

                        >
                            {{$offer->term->getContent('name')}}

                        </a>
                    </li>
                    @include('partials.investor.list-mb',[
                    'offer' => $offer,
                    'count' => $count + 30,
                    ])
            </ul>
        </div>
    </div>


    <div class="col-md-9 col-xs-12">
        <div  class="tab-content"  id="OffersContent">
            @include('partials.investor.post', ['offer' => $offer, 'active' => true,])
        </div>
        {{-- {!! $offer->term->getContent('body')!!} --}}
    </div>

    <div class="panel b box-shadow-lg no-border panel-header no-padder col-xs-12 visible-xs m-t-md" data-mh="main-info-block" style="
    overflow: hidden;
">

        <div class="block-header text-lighted  position-relative">
            {{(($locale=="en")?'Contacts':'Контакты')}}
        </div>

        <div class="wrapper-md">
            <div class="">
                @if ($locale=="en")
                    <p class="">the regional government organization "Cluster development center of tourism in Lipetsk region".</p>
                @else
                    <p class="">ОКУ "Центр кластерного развития туризма Липецкой области"</p>
                @endif
                <p class="text-justify text-roboto text-link text-brand-grey m-b-none">+7 4742 22-03-58<br/>+7 800 100-30-48</p>
                <a href="mailto:Oby.crt48@gmail.com" class="text-green d-block text-roboto text-link">Oby.crt48@gmail.com</a>
                <a href="www.liptur.ru" class="text-green d-block text-roboto text-link">www.liptur.ru</a>

            </div>
        </div>


    </div>
</div>
