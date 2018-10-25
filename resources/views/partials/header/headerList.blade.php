<div id="post-header" class="catalog-item">
    <div style="background:url({{$image}}) center center; background-size:cover">
        <div class="bg-black-opacity bg-dark">
            <div class="container pos-rlt min-h-h">

                <div class="row m-t-xxl m-b-md padder-v">
                    <div class="pull-bottom text-white padder-v m-l-xl">
                        <h1 class="text-white brand-header" itemprop="headline">{{$title}}</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="container-lg hidden-xs">
        <div class="row">
            <nav>
                <div class="container">
                    @include('partials.breadcrumb',$breadcrumb)
                </div>
            </nav>
        </div>
    </section>
</div>