
@php
    use App\Helpers\MenuHelper;
    $menuGroups = MenuHelper::getMenuGroups();
    $currentPath = request()->path();
@endphp

<aside id="sidebar"
    class="fixed flex flex-col top-0 left-0 px-5 bg-white dark:bg-gray-900 border-r border-gray-200 dark:border-gray-800 h-screen transition-all duration-300 ease-in-out z-99999"
    x-data="{
        openSubmenus: {},
        init() {
            this.initializeActiveMenus();
        },
        initializeActiveMenus() {
            const currentPath = '{{ $currentPath }}';
            @foreach ($menuGroups as $groupIndex => $menuGroup)
                @foreach ($menuGroup['items'] as $itemIndex => $item)
                    @if (isset($item['subItems']))
                        @foreach ($item['subItems'] as $subItem)
                            if (currentPath === '{{ ltrim($subItem['path'], '/') }}' || window.location.pathname === '{{ $subItem['path'] }}') {
                                this.openSubmenus['{{ $groupIndex }}-{{ $itemIndex }}'] = true;
                            }
                        @endforeach
                    @endif
                @endforeach
            @endforeach
        },
        toggleSubmenu(groupIndex, itemIndex) {
            const key = groupIndex + '-' + itemIndex;
            this.openSubmenus[key] = !this.openSubmenus[key];
        },
        isSubmenuOpen(groupIndex, itemIndex) {
            return this.openSubmenus[groupIndex + '-' + itemIndex] || false;
        },
        isActive(path) {
            return window.location.pathname === path || '{{ $currentPath }}' === path.replace(/^\//, '');
        }
    }"
    :class="{
        'w-[290px]': $store.sidebar.isExpanded || $store.sidebar.isMobileOpen,
        'w-20': !$store.sidebar.isExpanded,
        'translate-x-0': $store.sidebar.isMobileOpen,
        '-translate-x-full lg:translate-x-0': !$store.sidebar.isMobileOpen
    }">
    <!-- Logo -->
    <div class="py-4 flex items-center justify-center">
        <a href="/">
            <img x-show="$store.sidebar.isExpanded || $store.sidebar.isMobileOpen"
                class="dark:hidden" src="/images/logo/workforce-system_primary_dark.png" alt="Logo" width="150" />
            <img x-show="$store.sidebar.isExpanded || $store.sidebar.isMobileOpen"
                class="hidden dark:block" src="/images/logo/workforce-system_primary_light.png" alt="Logo" width="150" />
            <img x-show="!$store.sidebar.isExpanded && !$store.sidebar.isMobileOpen"
                src="/images/logo/workforce-system_icon.png" alt="Logo" width="32" />
        </a>
    </div>

    <!-- Navigation Menu -->
    <div class="flex-1 overflow-y-auto py-4">
        <nav>
            @foreach ($menuGroups as $groupIndex => $menuGroup)
                <div class="mb-6">
                    <!-- Menu Group Title -->
                    <h3 class="mb-3 text-xs font-semibold text-gray-400 uppercase px-3"
                        x-show="$store.sidebar.isExpanded || $store.sidebar.isMobileOpen">
                        {{ $menuGroup['title'] }}
                    </h3>

                    <!-- Menu Items -->
                    <ul class="space-y-1">
                        @foreach ($menuGroup['items'] as $itemIndex => $item)
                            <li>
                                @if (isset($item['subItems']))
                                    <!-- Menu Item with Submenu -->
                                    <button @click="toggleSubmenu({{ $groupIndex }}, {{ $itemIndex }})"
                                        class="menu-item group w-full"
                                        :class="isSubmenuOpen({{ $groupIndex }}, {{ $itemIndex }}) ? 'menu-item-active' : 'menu-item-inactive'">
                                        <i class="{{ $item['icon'] }} text-2xl"
                                            :class="isSubmenuOpen({{ $groupIndex }}, {{ $itemIndex }}) ? 'menu-item-icon-active' : 'menu-item-icon-inactive'"></i>
                                        <span x-show="$store.sidebar.isExpanded || $store.sidebar.isMobileOpen" class="menu-item-text">
                                            {{ $item['name'] }}
                                        </span>
                                        <svg x-show="$store.sidebar.isExpanded || $store.sidebar.isMobileOpen"
                                            class="ml-auto w-5 h-5 transition-transform"
                                            :class="{ 'rotate-180': isSubmenuOpen({{ $groupIndex }}, {{ $itemIndex }}) }"
                                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                        </svg>
                                    </button>

                                    <!-- Submenu -->
                                    <ul x-show="isSubmenuOpen({{ $groupIndex }}, {{ $itemIndex }}) && ($store.sidebar.isExpanded || $store.sidebar.isMobileOpen)"
                                        x-transition class="mt-2 ml-12 space-y-1">
                                        @foreach ($item['subItems'] as $subItem)
                                            <li>
                                                <a href="{{ $subItem['path'] }}" class="menu-dropdown-item"
                                                    :class="isActive('{{ $subItem['path'] }}') ? 'menu-dropdown-item-active' : 'menu-dropdown-item-inactive'">
                                                    {{ $subItem['name'] }}
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                @else
                                    <!-- Simple Menu Item -->
                                    <a href="{{ $item['path'] }}" class="menu-item group"
                                        :class="isActive('{{ $item['path'] }}') ? 'menu-item-active' : 'menu-item-inactive'">
                                        <i class="{{ $item['icon'] }} text-2xl"
                                            :class="isActive('{{ $item['path'] }}') ? 'menu-item-icon-active' : 'menu-item-icon-inactive'"></i>
                                        <span x-show="$store.sidebar.isExpanded || $store.sidebar.isMobileOpen" class="menu-item-text">
                                            {{ $item['name'] }}
                                        </span>
                                    </a>
                                @endif
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endforeach
        </nav>
    </div>

    <!-- Sidebar Footer -->
    <div x-show="$store.sidebar.isExpanded || $store.sidebar.isMobileOpen" class="p-4">
        @include('layouts.sidebar-widget')
    </div>
</aside>

<!-- Mobile Overlay -->
<div x-show="$store.sidebar.isMobileOpen" 
     @click="$store.sidebar.setMobileOpen(false)"
     x-transition:enter="transition-opacity ease-linear duration-300"
     x-transition:enter-start="opacity-0"
     x-transition:enter-end="opacity-100"
     x-transition:leave="transition-opacity ease-linear duration-300"
     x-transition:leave-start="opacity-100"
     x-transition:leave-end="opacity-0"
     class="fixed inset-0 z-50 bg-gray-900/50 lg:hidden">
</div>
