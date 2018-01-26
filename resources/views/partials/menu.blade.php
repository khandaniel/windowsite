<ul>
    @foreach ($items as $item)
        @php
            $originalItem = $item;
            $listItemClass = null;
            $styles = null;
            $caret = null;
            // Background Color or Color
            if (isset($options->color) && $options->color == true) {
                $styles = 'color:'.$item->color;
            }
            if (isset($options->background) && $options->background == true) {
                $styles = 'background-color:'.$item->color;
            }

            if(url($item->link()) == url()->current()){
                $listItemClass = 'active';
            }
            // With Children Attributes
            if(!$originalItem->children->isEmpty()) {
                if(url($item->link()) == url()->current()){
                    $listItemClass = 'has-sub active';
                }else{
                    $listItemClass = 'has-sub';
                }
            }
        @endphp

        <li class="{{ $listItemClass }}">
            @if(!$originalItem->children->isEmpty())
                <div class="drop-down-menu">
                    @endif
                    <a href="{{ url($item->link()) }}" style="{{ $styles }}">{{ $item->title }}</a>
                    @if(!$originalItem->children->isEmpty())
                        <div class="dropdown-menu-wrap">
                            @include('partials.menu', ['items' => $originalItem->children, 'options' => $options, 'innerLoop' => true])
                        </div>
                </div>
            @endif
        </li>
    @endforeach
    @if(!isset($innerLoop))
        <li class="cta"><a href="/contact">Обратный звонок</a></li>
    @endif
</ul>