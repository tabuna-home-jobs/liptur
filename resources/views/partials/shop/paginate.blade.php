@if($paginate->lastPage()>1) 
    <div class="row padder-v paginate">
        <div class="col-xs-2">
            <a href="{{$paginate->url($paginate->currentPage()-1)}}" class="btn btn-light btn-rounded" @if($paginate->currentPage()==1) disabled @endif ><i class="brand-icon-left"></i>НАЗАД</a>
        </div>
        <div class="col-xs-8 text-center">
            @php 
                $firstspace=true;
                $lastspace=true;
            @endphp
            @for ($i = 1; $i <= $paginate->lastPage(); $i++)
                @if ($i==$paginate->currentPage()) 
                        <a class="btn btn-circled btn-success m-h-xs">{{$i}}</a>
                @else
                    @if ($i<=5) 
                        <a href="{{$paginate->url($i)}}" class="btn btn-circled btn-light m-h-xs">{{$i}}</a>
                    @elseif ($i==$paginate->currentPage()-1)
                        <a href="{{$paginate->url($i)}}" class="btn btn-circled btn-light m-h-xs">{{$i}}</a>
                    @elseif ($i==$paginate->currentPage()+1)
                        <a href="{{$paginate->url($i)}}" class="btn btn-circled btn-light m-h-xs">{{$i}}</a>    
                    @elseif ($i==$paginate->lastPage())
                        <a href="{{$paginate->url($i)}}" class="btn btn-circled btn-light m-h-xs">{{$i}}</a>  
                    @elseif ($i==$paginate->lastPage()-1) 
                        <span class="text-green">...</span>
                    @endif   
                    
                    @if (($i>5) && ($paginate->currentPage()>7) && $firstspace)
                        <span class="text-green">...</span>
                        @php $firstspace=false; @endphp
                    @endif
             
                @endif
                
            @endfor
         </div>
        <div class="col-xs-2">
            <a href="{{$paginate->url($paginate->currentPage()+1)}}" class="btn btn-light btn-rounded" @if($paginate->currentPage()==$paginate->lastPage()) disabled @endif >ВПЕРЕД<i class="brand-icon-right"></i></a>
        </div>
    <div>
@endif 