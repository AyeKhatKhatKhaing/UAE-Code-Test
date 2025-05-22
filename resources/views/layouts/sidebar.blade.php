<div id="kt_aside" class="aside aside-dark aside-hoverable" data-kt-drawer="true" data-kt-drawer-name="aside"
    data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true"
    data-kt-drawer-width="{default:'200px', '300px': '250px'}" data-kt-drawer-direction="start"
    data-kt-drawer-toggle="#kt_aside_mobile_toggle">
    <div class="aside-logo flex-column-auto" id="kt_aside_logo">
        <a href="#">
            <img alt="Logo" src="{{ asset('backend/media/laravel/images/laravel-sidebar-logo.svg') }}"
                class="logo" style="width: 100%; height: 50px;" />
        </a>
        <div id="kt_aside_toggle" class="btn btn-icon w-auto px-0 btn-active-color-primary aside-toggle"
            data-kt-toggle="true" data-kt-toggle-state="active" data-kt-toggle-target="body"
            data-kt-toggle-name="aside-minimize">
            <span class="svg-icon svg-icon-1 rotate-180">
                <svg xmlns="{{ asset('bootstrap-icons') }}" width="24" height="24" viewBox="0 0 24 24"
                    fill="none">
                    <path opacity="0.5"
                        d="M 14.3 11.4 L 18.4 7.3 C 18.9 6.8 18.9 6.2 18.4 5.8 C 18 5.3 17.4 5.3 16.9 5.8 L 11.4 11.3 C 11 11.7 11 12.3 11.4 12.7 L 16.9 18.3 C 17.4 18.7 18 18.7 18.4 18.3 C 18.9 17.8 18.9 17.2 18.4 16.8 L 14.3 12.6 C 14 12.3 14 11.7 14.3 11.4 Z"
                        fill="currentColor" />
                    <path
                        d="M 8.3 11.4 L 12.4 7.3 C 12.9 6.8 12.9 6.2 12.4 5.8 C 12 5.3 11.4 5.3 10.9 5.8 L 5.4 11.3 C 5 11.7 5 12.3 5.4 12.7 L 10.9 18.3 C 11.4 18.7 12 18.7 12.4 18.3 C 12.9 17.8 12.9 17.2 12.4 16.8 L 8.3 12.6 C 8 12.3 8 11.7 8.3 11.4 Z"
                        fill="currentColor" />
                </svg>
            </span>
        </div>
    </div>
    <div class="aside-menu flex-column-fluid">
        <div class="hover-scroll-overlay-y my-5 my-lg-5" id="kt_aside_menu_wrapper" data-kt-scroll="true"
            data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-height="auto"
            data-kt-scroll-dependencies="#kt_aside_logo, #kt_aside_footer" data-kt-scroll-wrappers="#kt_aside_menu"
            data-kt-scroll-offset="0">
            <div class="menu menu-column menu-title-gray-800 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-500"
                id="#kt_aside_menu" data-kt-menu="true" data-kt-menu-expand="false">
                
                <x-side-bar.menu-accordion :title="'Blog'" :active="['posts*','comments*']">
                    @slot('icon')
                        <svg xmlns="{{ asset('bootstrap-icons') }}" width="16" height="16" fill="#009EF7"
                            class="bi bi-journals" viewBox="0 0 16 16">
                            <path
                                d="M5 0h8a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2 2 2 0 0 1-2 2H3a2 2 0 0 1-2-2h1a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1H1a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v9a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H5a1 1 0 0 0-1 1H3a2 2 0 0 1 2-2z" />
                            <path
                                d="M1 6v-.5a.5.5 0 0 1 1 0V6h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0V9h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 2.5v.5H.5a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1H2v-.5a.5.5 0 0 0-1 0z" />
                        </svg>
                    @endslot
                    @slot('menu')
                        <x-side-bar.menu-item :title="'Post'" :active="['posts.*']" :route="route('posts.index')" />
                    @endslot
                </x-side-bar.menu-accordion>
            </div>
        </div>
    </div>
</div>
