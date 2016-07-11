@if(isset($sidebarItems))
    @foreach($sidebarItems as $name => $item)
        @if(is_null($item))
            <li class="header">{{ $sidebar->get($name)['title'] }}</li>
            @continue
        @endif
        @if(is_array($item))
            <?php
                $fullName = isset($prefix) ? $prefix . '.' . $name : $name;
                $itemData = $sidebar->get($fullName);
            ?>
            <li @if(isset($sub)) class="treeview" @endif>
                <a href="{{ isset($itemData['href']) ? $itemData['href'] : '#' }}">
                    <i class="{{ key_exists('icon', $itemData) ? $itemData['icon'] : 'fa fa-circle-o' }}"></i> <span>{{ $itemData['title'] }}</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
                </a>
                <ul class="treeview-menu">
                    @include('power-management.common.sidebar', ['sidebarItems' => $item, 'sidebar' => $sidebar, 'sub' => true, 'prefix' => $fullName])
                </ul>
            </li>
        @else
            <?php $itemData = $sidebar->get($item); ?>
            <li>
                <a href="{{ isset($itemData['href']) ? $itemData['href'] : '#' }}">
                    <i class="{{ key_exists('icon', $itemData) ? $itemData['icon'] : 'fa fa-circle-o' }}"></i> <span>{{ $itemData['title'] }}</span>
                <span class="pull-right-container">

                </span>
                </a>
            </li>
        @endif
    @endforeach
@endif