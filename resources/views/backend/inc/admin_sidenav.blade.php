<div class="aiz-sidebar-wrap">
    <div class="aiz-sidebar left c-scrollbar">
        <div class="aiz-side-nav-logo-wrap">
            <a href="{{ route('admin.dashboard') }}" class="d-block text-left">
                @if(get_setting('system_logo_white') != null)
                <img class="mw-100" src="{{ uploaded_asset(get_setting('system_logo_white')) }}" class="brand-icon" alt="{{ get_setting('site_name') }}">
                @else
                <img class="mw-100" src="{{ static_asset('assets/img/logo.png') }}" class="brand-icon" alt="{{ get_setting('site_name') }}">
                @endif
            </a>
        </div>
        <div class="aiz-side-nav-wrap">
            <div class="px-20px mb-3">
                <input class="form-control bg-soft-secondary border-0 form-control-sm text-white" type="text" name="" placeholder="{{ translate('Search in menu') }}" id="menu-search" onkeyup="menuSearch()">
            </div>
            <ul class="aiz-side-nav-list" id="search-menu">
            </ul>
            <ul class="aiz-side-nav-list" id="main-menu" data-toggle="aiz-side-menu">
                <li class="aiz-side-nav-item">
                    <a href="{{route('admin.dashboard')}}" class="aiz-side-nav-link">
                        <i class="las la-home aiz-side-nav-icon"></i>
                        <span class="aiz-side-nav-text">{{translate('Dashboard')}}</span>
                    </a>
                </li>

                <!-- Product -->
                @if(Auth::user()->user_type == 'admin' || in_array('2', json_decode(Auth::user()->staff->role->permissions)))
                <li class="aiz-side-nav-item">
                    <a href="#" class="aiz-side-nav-link">
                        <i class="las la-shopping-cart aiz-side-nav-icon"></i>
                        <span class="aiz-side-nav-text">{{translate('Products')}}</span>
                        <span class="aiz-side-nav-arrow"></span>
                    </a>
                    <!--Submenu-->
                    <ul class="aiz-side-nav-list level-2">
                        <li class="aiz-side-nav-item">
                            <a class="aiz-side-nav-link" href="{{route('products.create')}}">
                                <span class="aiz-side-nav-text">{{translate('Add New product')}}</span>
                            </a>
                        </li>
                        <li class="aiz-side-nav-item">
                            <a href="{{route('products.all')}}" class="aiz-side-nav-link">
                                <span class="aiz-side-nav-text">{{ translate('All Products') }}</span>
                            </a>
                        </li>
                        <li class="aiz-side-nav-item">
                            <a href="{{route('products.admin')}}" class="aiz-side-nav-link {{ areActiveRoutes(['products.admin', 'products.create', 'products.admin.edit']) }}">
                                <span class="aiz-side-nav-text">{{ translate('In House Products') }}</span>
                            </a>
                        </li>
                        <li class="aiz-side-nav-item">
                            <a href="{{route('digitalproducts.index')}}" class="aiz-side-nav-link {{ areActiveRoutes(['digitalproducts.index', 'digitalproducts.create', 'digitalproducts.edit']) }}">
                                <span class="aiz-side-nav-text">{{ translate('Digital Products') }}</span>
                            </a>
                        </li>
                        <li class="aiz-side-nav-item">
                            <a href="{{ route('product_bulk_upload.index') }}" class="aiz-side-nav-link">
                                <span class="aiz-side-nav-text">{{ translate('Bulk Import') }}</span>
                            </a>
                        </li>
                        <li class="aiz-side-nav-item">
                            <a href="{{route('product_bulk_export.index')}}" class="aiz-side-nav-link">
                                <span class="aiz-side-nav-text">{{translate('Bulk Export')}}</span>
                            </a>
                        </li>
                        <li class="aiz-side-nav-item">
                            <a href="{{route('categories.index')}}" class="aiz-side-nav-link {{ areActiveRoutes(['categories.index', 'categories.create', 'categories.edit'])}}">
                                <span class="aiz-side-nav-text">{{translate('Category')}}</span>
                            </a>
                        </li>
                        <li class="aiz-side-nav-item">
                            <a href="{{route('brands.index')}}" class="aiz-side-nav-link {{ areActiveRoutes(['brands.index', 'brands.create', 'brands.edit'])}}">
                                <span class="aiz-side-nav-text">{{translate('Brand')}}</span>
                            </a>
                        </li>
                        <li class="aiz-side-nav-item">
                            <a href="{{route('attributes.index')}}" class="aiz-side-nav-link {{ areActiveRoutes(['attributes.index','attributes.create','attributes.edit'])}}">
                                <span class="aiz-side-nav-text">{{translate('Attribute')}}</span>
                            </a>
                        </li>
                        <li class="aiz-side-nav-item">
                            <a href="{{route('colors')}}" class="aiz-side-nav-link {{ areActiveRoutes(['attributes.index','attributes.create','attributes.edit'])}}">
                                <span class="aiz-side-nav-text">{{translate('Colors')}}</span>
                            </a>
                        </li>
                        <li class="aiz-side-nav-item">
                            <a href="{{route('reviews.index')}}" class="aiz-side-nav-link">
                                <span class="aiz-side-nav-text">{{translate('Product Reviews')}}</span>
                            </a>
                        </li>
                    </ul>
                </li>
                @endif

                <!-- Auction Product -->
                @if(addon_is_activated('auction'))
                <li class="aiz-side-nav-item">
                    <a href="#" class="aiz-side-nav-link">
                        <i class="las la-gavel aiz-side-nav-icon"></i>
                        <span class="aiz-side-nav-text">{{translate('Auction Products')}}</span>
                        @if (env("DEMO_MODE") == "On")
                        <span class="badge badge-inline badge-danger">Addon</span>
                        @endif
                        <span class="aiz-side-nav-arrow"></span>
                    </a>
                    <!--Submenu-->
                    <ul class="aiz-side-nav-list level-2">
                        <li class="aiz-side-nav-item">
                            <a class="aiz-side-nav-link" href="{{route('auction_products.create')}}">
                                <span class="aiz-side-nav-text">{{translate('Add New auction product')}}</span>
                            </a>
                        </li>
                        <li class="aiz-side-nav-item">
                            <a href="{{route('auction_products.index')}}" class="aiz-side-nav-link {{ areActiveRoutes(['auction_products.admin.edit','product_bids.show']) }}">
                                <span class="aiz-side-nav-text">{{ translate('All Auction Products') }}</span>
                            </a>
                        </li>
                        <li class="aiz-side-nav-item">
                            <a href="{{route('auction_products_orders')}}" class="aiz-side-nav-link {{ areActiveRoutes(['auction_products_orders.index','auction_orders.show']) }}">
                                <span class="aiz-side-nav-text">{{ translate('Auction Products Orders') }}</span>
                            </a>
                        </li>
                    </ul>
                </li>
                @endif

                <!-- Sale -->
                <li class="aiz-side-nav-item">
                    <a href="#" class="aiz-side-nav-link">
                        <i class="las la-money-bill aiz-side-nav-icon"></i>
                        <span class="aiz-side-nav-text">{{translate('Sales')}}</span>
                        <span class="aiz-side-nav-arrow"></span>
                    </a>
                    <!--Submenu-->
                    <ul class="aiz-side-nav-list level-2">
                        @if(Auth::user()->user_type == 'admin' || in_array('3', json_decode(Auth::user()->staff->role->permissions)))
                        <li class="aiz-side-nav-item">
                            <a href="{{ route('all_orders.index') }}" class="aiz-side-nav-link {{ areActiveRoutes(['all_orders.index', 'all_orders.show'])}}">
                                <span class="aiz-side-nav-text">{{translate('All Orders')}}</span>
                            </a>
                        </li>
                        @endif

                        @if(Auth::user()->user_type == 'admin' || in_array('4', json_decode(Auth::user()->staff->role->permissions)))
                        <li class="aiz-side-nav-item">
                            <a href="{{ route('inhouse_orders.index') }}" class="aiz-side-nav-link {{ areActiveRoutes(['inhouse_orders.index', 'inhouse_orders.show'])}}">
                                <span class="aiz-side-nav-text">{{translate('Inhouse orders')}}</span>
                            </a>
                        </li>
                        @endif
                        @if(Auth::user()->user_type == 'admin' || in_array('6', json_decode(Auth::user()->staff->role->permissions)))
                        <li class="aiz-side-nav-item">
                            <a href="{{ route('pick_up_point.order_index') }}" class="aiz-side-nav-link {{ areActiveRoutes(['pick_up_point.order_index','pick_up_point.order_show'])}}">
                                <span class="aiz-side-nav-text">{{translate('Pick-up Point Order')}}</span>
                            </a>
                        </li>
                        @endif
                    </ul>
                </li>

                <!-- Deliver Boy Addon-->
                @if (addon_is_activated('delivery_boy'))
                @if(Auth::user()->user_type == 'admin' || in_array('1', json_decode(Auth::user()->staff->role->permissions)))
                <li class="aiz-side-nav-item">
                    <a href="#" class="aiz-side-nav-link">
                        <i class="las la-truck aiz-side-nav-icon"></i>
                        <span class="aiz-side-nav-text">{{translate('Delivery Boy')}}</span>
                        @if (env("DEMO_MODE") == "On")
                        <span class="badge badge-inline badge-danger">Addon</span>
                        @endif
                        <span class="aiz-side-nav-arrow"></span>
                    </a>
                    <ul class="aiz-side-nav-list level-2">
                        <li class="aiz-side-nav-item">
                            <a href="{{route('delivery-boys.index')}}" class="aiz-side-nav-link {{ areActiveRoutes(['delivery-boys.index'])}}">
                                <span class="aiz-side-nav-text">{{translate('All Delivery Boy')}}</span>
                            </a>
                        </li>
                        <li class="aiz-side-nav-item">
                            <a href="{{route('delivery-boys.create')}}" class="aiz-side-nav-link {{ areActiveRoutes(['delivery-boys.create'])}}">
                                <span class="aiz-side-nav-text">{{translate('Add Delivery Boy')}}</span>
                            </a>
                        </li>
                        {{-- <li class="aiz-side-nav-item">
                                    <a href="{{route('delivery-boys-payment-histories')}}" class="aiz-side-nav-link {{ areActiveRoutes(['delivery-boys.index'])}}">
                        <span class="aiz-side-nav-text">{{translate('Payment Histories')}}</span>
                        </a>
                </li>
                <li class="aiz-side-nav-item">
                    <a href="{{route('delivery-boys-collection-histories')}}" class="aiz-side-nav-link {{ areActiveRoutes(['delivery-boys.create'])}}">
                        <span class="aiz-side-nav-text">{{translate('Collected Histories')}}</span>
                    </a>
                </li> --}}
                <li class="aiz-side-nav-item">
                    <a href="{{route('delivery-boy.cancel-request')}}" class="aiz-side-nav-link {{ areActiveRoutes(['delivery-boy.cancel-request'])}}">
                        <span class="aiz-side-nav-text">{{translate('Cancel Request')}}</span>
                    </a>
                </li>
                <li class="aiz-side-nav-item">
                    <a href="{{route('delivery-boy-configuration')}}" class="aiz-side-nav-link">
                        <span class="aiz-side-nav-text">{{translate('Configuration')}}</span>
                    </a>
                </li>
            </ul>
            </li>
            @endif
            @endif

            <!-- Refund addon -->
            @if (addon_is_activated('refund_request'))
            @if(Auth::user()->user_type == 'admin' || in_array('7', json_decode(Auth::user()->staff->role->permissions)))
            <li class="aiz-side-nav-item">
                <a href="#" class="aiz-side-nav-link">
                    <i class="las la-backward aiz-side-nav-icon"></i>
                    <span class="aiz-side-nav-text">{{ translate('Refunds') }}</span>
                    @if (env("DEMO_MODE") == "On")
                    <span class="badge badge-inline badge-danger">Addon</span>
                    @endif
                    <span class="aiz-side-nav-arrow"></span>
                </a>
                <ul class="aiz-side-nav-list level-2">
                    <li class="aiz-side-nav-item">
                        <a href="{{route('refund_requests_all')}}" class="aiz-side-nav-link {{ areActiveRoutes(['refund_requests_all', 'reason_show'])}}">
                            <span class="aiz-side-nav-text">{{translate('Refund Requests')}}</span>
                        </a>
                    </li>
                    <li class="aiz-side-nav-item">
                        <a href="{{route('paid_refund')}}" class="aiz-side-nav-link">
                            <span class="aiz-side-nav-text">{{translate('Approved Refunds')}}</span>
                        </a>
                    </li>
                    <li class="aiz-side-nav-item">
                        <a href="{{route('rejected_refund')}}" class="aiz-side-nav-link">
                            <span class="aiz-side-nav-text">{{translate('rejected Refunds')}}</span>
                        </a>
                    </li>
                    <li class="aiz-side-nav-item">
                        <a href="{{route('refund_time_config')}}" class="aiz-side-nav-link">
                            <span class="aiz-side-nav-text">{{translate('Refund Configuration')}}</span>
                        </a>
                    </li>
                </ul>
            </li>
            @endif
            @endif


            <!-- Customers -->
            @if(Auth::user()->user_type == 'admin' || in_array('8', json_decode(Auth::user()->staff->role->permissions)))
            <li class="aiz-side-nav-item">
                <a href="#" class="aiz-side-nav-link">
                    <i class="las la-user-friends aiz-side-nav-icon"></i>
                    <span class="aiz-side-nav-text">{{ translate('Customers') }}</span>
                    <span class="aiz-side-nav-arrow"></span>
                </a>
                <ul class="aiz-side-nav-list level-2">
                    <li class="aiz-side-nav-item">
                        <a href="{{ route('customers.index') }}" class="aiz-side-nav-link">
                            <span class="aiz-side-nav-text">{{ translate('Customer list') }}</span>
                        </a>
                    </li>
                </ul>
            </li>
            @endif

            @if(Auth::user()->user_type == 'admin' || in_array('22', json_decode(Auth::user()->staff->role->permissions)))
            <li class="aiz-side-nav-item">
                <a href="{{ route('uploaded-files.index') }}" class="aiz-side-nav-link {{ areActiveRoutes(['uploaded-files.create'])}}">
                    <i class="las la-folder-open aiz-side-nav-icon"></i>
                    <span class="aiz-side-nav-text">{{ translate('Uploaded Files') }}</span>
                </a>
            </li>
            @endif
            <!-- Reports -->
            @if(Auth::user()->user_type == 'admin' || in_array('10', json_decode(Auth::user()->staff->role->permissions)))
            <li class="aiz-side-nav-item">
                <a href="#" class="aiz-side-nav-link">
                    <i class="las la-file-alt aiz-side-nav-icon"></i>
                    <span class="aiz-side-nav-text">{{ translate('Reports') }}</span>
                    <span class="aiz-side-nav-arrow"></span>
                </a>
                <ul class="aiz-side-nav-list level-2">
                    <li class="aiz-side-nav-item">
                        <a href="{{ route('in_house_sale_report.index') }}" class="aiz-side-nav-link {{ areActiveRoutes(['in_house_sale_report.index'])}}">
                            <span class="aiz-side-nav-text">{{ translate('In House Product Sale') }}</span>
                        </a>
                    </li>
                    <li class="aiz-side-nav-item">
                        <a href="{{ route('seller_sale_report.index') }}" class="aiz-side-nav-link {{ areActiveRoutes(['seller_sale_report.index'])}}">
                            <span class="aiz-side-nav-text">{{ translate('Seller Products Sale') }}</span>
                        </a>
                    </li>
                    <li class="aiz-side-nav-item">
                        <a href="{{ route('stock_report.index') }}" class="aiz-side-nav-link {{ areActiveRoutes(['stock_report.index'])}}">
                            <span class="aiz-side-nav-text">{{ translate('Products Stock') }}</span>
                        </a>
                    </li>
                    <li class="aiz-side-nav-item">
                        <a href="{{ route('wish_report.index') }}" class="aiz-side-nav-link {{ areActiveRoutes(['wish_report.index'])}}">
                            <span class="aiz-side-nav-text">{{ translate('Products wishlist') }}</span>
                        </a>
                    </li>
                    <li class="aiz-side-nav-item">
                        <a href="{{ route('user_search_report.index') }}" class="aiz-side-nav-link {{ areActiveRoutes(['user_search_report.index'])}}">
                            <span class="aiz-side-nav-text">{{ translate('User Searches') }}</span>
                        </a>
                    </li>
                    <li class="aiz-side-nav-item">
                        <a href="{{ route('commission-log.index') }}" class="aiz-side-nav-link">
                            <span class="aiz-side-nav-text">{{ translate('Commission History') }}</span>
                        </a>
                    </li>
                    <li class="aiz-side-nav-item">
                        <a href="{{ route('wallet-history.index') }}" class="aiz-side-nav-link">
                            <span class="aiz-side-nav-text">{{ translate('Wallet Recharge History') }}</span>
                        </a>
                    </li>
                </ul>
            </li>
            @endif
            @if(Auth::user()->user_type == 'admin' || in_array('23', json_decode(Auth::user()->staff->role->permissions)))
            <!--Blog System-->
            <li class="aiz-side-nav-item">
                <a href="#" class="aiz-side-nav-link">
                    <i class="las la-bullhorn aiz-side-nav-icon"></i>
                    <span class="aiz-side-nav-text">{{ translate('Blog System') }}</span>
                    <span class="aiz-side-nav-arrow"></span>
                </a>
                <ul class="aiz-side-nav-list level-2">
                    <li class="aiz-side-nav-item">
                        <a href="{{ route('blog.index') }}" class="aiz-side-nav-link {{ areActiveRoutes(['blog.create', 'blog.edit'])}}">
                            <span class="aiz-side-nav-text">{{ translate('All Posts') }}</span>
                        </a>
                    </li>
                    <li class="aiz-side-nav-item">
                        <a href="{{ route('blog-category.index') }}" class="aiz-side-nav-link {{ areActiveRoutes(['blog-category.create', 'blog-category.edit'])}}">
                            <span class="aiz-side-nav-text">{{ translate('Categories') }}</span>
                        </a>
                    </li>
                </ul>
            </li>
            @endif

            <!-- marketing -->
            @if(Auth::user()->user_type == 'admin' || in_array('11', json_decode(Auth::user()->staff->role->permissions)))
            <li class="aiz-side-nav-item">
                <a href="#" class="aiz-side-nav-link">
                    <i class="las la-bullhorn aiz-side-nav-icon"></i>
                    <span class="aiz-side-nav-text">{{ translate('Marketing') }}</span>
                    <span class="aiz-side-nav-arrow"></span>
                </a>
                <ul class="aiz-side-nav-list level-2">
                    @if(Auth::user()->user_type == 'admin' || in_array('2', json_decode(Auth::user()->staff->role->permissions)))
                    <li class="aiz-side-nav-item">
                        <a href="{{ route('flash_deals.index') }}" class="aiz-side-nav-link {{ areActiveRoutes(['flash_deals.index', 'flash_deals.create', 'flash_deals.edit'])}}">
                            <span class="aiz-side-nav-text">{{ translate('Flash deals') }}</span>
                        </a>
                    </li>
                    @endif
                    @if(Auth::user()->user_type == 'admin' || in_array('7', json_decode(Auth::user()->staff->role->permissions)))
                    <li class="aiz-side-nav-item">
                        <a href="{{route('newsletters.index')}}" class="aiz-side-nav-link">
                            <span class="aiz-side-nav-text">{{ translate('Newsletters') }}</span>
                        </a>
                    </li>
                    @endif
                    <li class="aiz-side-nav-item">
                        <a href="{{ route('subscribers.index') }}" class="aiz-side-nav-link">
                            <span class="aiz-side-nav-text">{{ translate('Subscribers') }}</span>
                        </a>
                    </li>
                    <li class="aiz-side-nav-item">
                        <a href="{{route('coupon.index')}}" class="aiz-side-nav-link {{ areActiveRoutes(['coupon.index','coupon.create','coupon.edit'])}}">
                            <span class="aiz-side-nav-text">{{ translate('Coupon') }}</span>
                        </a>
                    </li>
                </ul>
            </li>
            @endif

            <!-- Affiliate Addon -->
            @if (addon_is_activated('affiliate_system'))
            @if(Auth::user()->user_type == 'admin' || in_array('15', json_decode(Auth::user()->staff->role->permissions)))
            <li class="aiz-side-nav-item">
                <a href="#" class="aiz-side-nav-link">
                    <i class="las la-link aiz-side-nav-icon"></i>
                    <span class="aiz-side-nav-text">{{translate('Affiliate System')}}</span>
                    <span class="aiz-side-nav-arrow"></span>
                </a>
                <ul class="aiz-side-nav-list level-2">
                    <li class="aiz-side-nav-item">
                        <a href="{{route('affiliate.configs')}}" class="aiz-side-nav-link">
                            <span class="aiz-side-nav-text">{{translate('Affiliate Registration Form')}}</span>
                        </a>
                    </li>
                    <li class="aiz-side-nav-item">
                        <a href="{{route('affiliate.index')}}" class="aiz-side-nav-link">
                            <span class="aiz-side-nav-text">{{translate('Affiliate Configurations')}}</span>
                        </a>
                    </li>
                    <li class="aiz-side-nav-item">
                        <a href="{{route('affiliate.users')}}" class="aiz-side-nav-link {{ areActiveRoutes(['affiliate.users', 'affiliate_users.show_verification_request', 'affiliate_user.payment_history'])}}">
                            <span class="aiz-side-nav-text">{{translate('Affiliate Users')}}</span>
                        </a>
                    </li>
                    <li class="aiz-side-nav-item">
                        <a href="{{route('refferals.users')}}" class="aiz-side-nav-link">
                            <span class="aiz-side-nav-text">{{translate('Referral Users')}}</span>
                        </a>
                    </li>
                    <li class="aiz-side-nav-item">
                        <a href="{{route('affiliate.withdraw_requests')}}" class="aiz-side-nav-link">
                            <span class="aiz-side-nav-text">{{translate('Affiliate Withdraw Requests')}}</span>
                        </a>
                    </li>
                    <li class="aiz-side-nav-item">
                        <a href="{{route('affiliate.logs.admin')}}" class="aiz-side-nav-link">
                            <span class="aiz-side-nav-text">{{translate('Affiliate Logs')}}</span>
                        </a>
                    </li>
                </ul>
            </li>
            @endif
            @endif

            <!--OTP addon -->
            @if (addon_is_activated('otp_system'))
            @if(Auth::user()->user_type == 'admin' || in_array('19', json_decode(Auth::user()->staff->role->permissions)))
            <li class="aiz-side-nav-item">
                <a href="#" class="aiz-side-nav-link">
                    <i class="las la-phone aiz-side-nav-icon"></i>
                    <span class="aiz-side-nav-text">{{translate('OTP System')}}</span>
                    @if (env("DEMO_MODE") == "On")
                    <span class="badge badge-inline badge-danger">Addon</span>
                    @endif
                    <span class="aiz-side-nav-arrow"></span>
                </a>
                <ul class="aiz-side-nav-list level-2">
                    <li class="aiz-side-nav-item">
                        <a href="{{ route('otp.configconfiguration') }}" class="aiz-side-nav-link">
                            <span class="aiz-side-nav-text">{{translate('OTP Configurations')}}</span>
                        </a>
                    </li>
                    <li class="aiz-side-nav-item">
                        <a href="{{route('sms-templates.index')}}" class="aiz-side-nav-link">
                            <span class="aiz-side-nav-text">{{translate('SMS Templates')}}</span>
                        </a>
                    </li>
                    <li class="aiz-side-nav-item">
                        <a href="{{route('otp_credentials.index')}}" class="aiz-side-nav-link">
                            <span class="aiz-side-nav-text">{{translate('Set OTP Credentials')}}</span>
                        </a>
                    </li>
                </ul>
            </li>
            @endif
            @endif

            @if(addon_is_activated('african_pg'))
            @if(Auth::user()->user_type == 'admin' || in_array('19', json_decode(Auth::user()->staff->role->permissions)))
            <li class="aiz-side-nav-item">
                <a href="#" class="aiz-side-nav-link">
                    <i class="las la-phone aiz-side-nav-icon"></i>
                    <span class="aiz-side-nav-text">{{translate('African Payment Gateway Addon')}}</span>
                    @if (env("DEMO_MODE") == "On")
                    <span class="badge badge-inline badge-danger">Addon</span>
                    @endif
                    <span class="aiz-side-nav-arrow"></span>
                </a>
                <ul class="aiz-side-nav-list level-2">
                    <li class="aiz-side-nav-item">
                        <a href="{{ route('african.configuration') }}" class="aiz-side-nav-link">
                            <span class="aiz-side-nav-text">{{translate('African PG Configurations')}}</span>
                        </a>
                    </li>
                    <li class="aiz-side-nav-item">
                        <a href="{{route('african_credentials.index')}}" class="aiz-side-nav-link">
                            <span class="aiz-side-nav-text">{{translate('Set African PG Credentials')}}</span>
                        </a>
                    </li>
                </ul>
            </li>
            @endif
            @endif

            <!-- Website Setup -->
            @if(Auth::user()->user_type == 'admin' || in_array('13', json_decode(Auth::user()->staff->role->permissions)))
            <li class="aiz-side-nav-item">
                <a href="#" class="aiz-side-nav-link {{ areActiveRoutes(['website.footer', 'website.header'])}}">
                    <i class="las la-desktop aiz-side-nav-icon"></i>
                    <span class="aiz-side-nav-text">{{translate('Website Setup')}}</span>
                    <span class="aiz-side-nav-arrow"></span>
                </a>
                <ul class="aiz-side-nav-list level-2">
                    <li class="aiz-side-nav-item">
                        <a href="{{ route('website.header') }}" class="aiz-side-nav-link">
                            <span class="aiz-side-nav-text">{{translate('Header')}}</span>
                        </a>
                    </li>
                    <li class="aiz-side-nav-item">
                        <a href="{{ route('website.footer', ['lang'=>  App::getLocale()] ) }}" class="aiz-side-nav-link {{ areActiveRoutes(['website.footer'])}}">
                            <span class="aiz-side-nav-text">{{translate('Footer')}}</span>
                        </a>
                    </li>
                    <li class="aiz-side-nav-item">
                        <a href="{{ route('website.pages') }}" class="aiz-side-nav-link {{ areActiveRoutes(['website.pages', 'custom-pages.create' ,'custom-pages.edit'])}}">
                            <span class="aiz-side-nav-text">{{translate('Pages')}}</span>
                        </a>
                    </li>
                    <li class="aiz-side-nav-item">
                        <a href="{{ route('website.appearance') }}" class="aiz-side-nav-link">
                            <span class="aiz-side-nav-text">{{translate('Appearance')}}</span>
                        </a>
                    </li>
                </ul>
            </li>
            @endif

            <!-- Setup & Configurations -->
            @if(Auth::user()->user_type == 'admin' || in_array('14', json_decode(Auth::user()->staff->role->permissions)))
            <li class="aiz-side-nav-item">
                <a href="#" class="aiz-side-nav-link">
                    <i class="las la-dharmachakra aiz-side-nav-icon"></i>
                    <span class="aiz-side-nav-text">{{translate('Setup & Configurations')}}</span>
                    <span class="aiz-side-nav-arrow"></span>
                </a>
                <ul class="aiz-side-nav-list level-2">
                    <li class="aiz-side-nav-item">
                        <a href="{{route('general_setting.index')}}" class="aiz-side-nav-link">
                            <span class="aiz-side-nav-text">{{translate('General Settings')}}</span>
                        </a>
                    </li>
                    <li class="aiz-side-nav-item">
                        <a href="{{ route('smtp_settings.index') }}" class="aiz-side-nav-link">
                            <span class="aiz-side-nav-text">{{translate('SMTP Settings')}}</span>
                        </a>
                    </li>
                </ul>
            </li>
            @endif

            <!-- Staffs -->
            @if(Auth::user()->user_type == 'admin' || in_array('20', json_decode(Auth::user()->staff->role->permissions)))
            <li class="aiz-side-nav-item">
                <a href="#" class="aiz-side-nav-link">
                    <i class="las la-user-tie aiz-side-nav-icon"></i>
                    <span class="aiz-side-nav-text">{{translate('Staffs')}}</span>
                    <span class="aiz-side-nav-arrow"></span>
                </a>
                <ul class="aiz-side-nav-list level-2">
                    <li class="aiz-side-nav-item">
                        <a href="{{ route('staffs.index') }}" class="aiz-side-nav-link {{ areActiveRoutes(['staffs.index', 'staffs.create', 'staffs.edit'])}}">
                            <span class="aiz-side-nav-text">{{translate('All staffs')}}</span>
                        </a>
                    </li>
                    <li class="aiz-side-nav-item">
                        <a href="{{route('roles.index')}}" class="aiz-side-nav-link {{ areActiveRoutes(['roles.index', 'roles.create', 'roles.edit'])}}">
                            <span class="aiz-side-nav-text">{{translate('Staff permissions')}}</span>
                        </a>
                    </li>
                </ul>
            </li>
            @endif
            @if(Auth::user()->user_type == 'admin' || in_array('24', json_decode(Auth::user()->staff->role->permissions)))
            <li class="aiz-side-nav-item">
                <a href="#" class="aiz-side-nav-link">
                    <i class="las la-user-tie aiz-side-nav-icon"></i>
                    <span class="aiz-side-nav-text">{{translate('System')}}</span>
                    <span class="aiz-side-nav-arrow"></span>
                </a>
                <ul class="aiz-side-nav-list level-2">
                    <li class="aiz-side-nav-item">
                        <a href="{{ route('system_update') }}" class="aiz-side-nav-link">
                            <span class="aiz-side-nav-text">{{translate('Update')}}</span>
                        </a>
                    </li>
                    <li class="aiz-side-nav-item">
                        <a href="{{route('system_server')}}" class="aiz-side-nav-link">
                            <span class="aiz-side-nav-text">{{translate('Server status')}}</span>
                        </a>
                    </li>
                </ul>
            </li>
            @endif

            </ul><!-- .aiz-side-nav -->
        </div><!-- .aiz-side-nav-wrap -->
    </div><!-- .aiz-sidebar -->
    <div class="aiz-sidebar-overlay"></div>
</div><!-- .aiz-sidebar -->