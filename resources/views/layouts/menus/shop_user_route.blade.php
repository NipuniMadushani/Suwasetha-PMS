@php
    $role_permissions = App\Models\Permission::where('role_id',Auth::user()->role_id)->first();
    $permissions = [];
        if(!empty($role_permissions)){
            $permissions = json_decode($role_permissions->permissions,true);
        }
@endphp
<ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
    <li class=" nav-item {{ active_if_full_match('dashboard') }}">
        <a class="d-flex align-items-center" href="{{ route('dashboard') }}">
            <i class="fa fa-tachometer" aria-hidden="true"></i>
            <span class="menu-title text-truncate"
                  data-i18n="Dashboards">{{ __('pages.dashboard') }}</span>
        </a>
    </li>
    @if(array_key_exists('customers_add',$permissions) || array_key_exists('customers_list',$permissions))
        <li class=" nav-item {{ active_if_match('customer/add') }} || {{ active_if_match('customer/list') }}"><a
                    class="d-flex align-items-center" href="#"><i
                        class="fas fa-users"></i><span class="menu-title text-truncate"
                                                       data-i18n="Invoice">{{ __('pages.customer') }}</span></a>
            <ul class="menu-content">
                @if(array_key_exists('customers_add',$permissions))
                    <li class="{{ active_if_full_match('customer/add') }}">
                        <a class="d-flex align-items-center" href="{{ route('customer.add') }}">
                            <i data-feather="circle"></i>
                            <span class="menu-item text-truncate"
                                  data-i18n="List">{{ __('pages.customer_add') }}</span>
                        </a>
                    </li>
                @endif
                @if(array_key_exists('customers_list',$permissions))
                    <li class="{{ active_if_full_match('customer/list') }} {{ active_if_full_match('customer/edit/*') }} {{ active_if_full_match('customer/view/*') }}">
                        <a class="d-flex align-items-center" href="{{ route('customer.list') }}"><i
                                    data-feather="circle"></i><span class="menu-item text-truncate"
                                                                    data-i18n="Preview">{{ __('pages.customer_list') }}</span></a>
                    </li>
                @endif
            </ul>
        </li>
    @endif
    @if(array_key_exists('in_stock',$permissions) || array_key_exists('emergency_stock',$permissions) || array_key_exists('stockout',$permissions) || array_key_exists('upcoming_expired',$permissions) ||array_key_exists('already_expired',$permissions))
        <li class=" nav-item {{ active_if_match('in_stock') }} || {{ active_if_match('emergency-stock') }} || {{ active_if_match('medicines/stockout') }} || {{ active_if_match('upcoming') }} || {{ active_if_match('medicines/expired') }}">
            <a class="d-flex align-items-center" href="#"><i class="fas fa-pills"></i><span
                        class="menu-title text-truncate"
                        data-i18n="Invoice">{{ translate('Medicine Stock') }}</span>
            </a>
            <ul class="menu-content">
                @if(array_key_exists('in_stock',$permissions))
                    <li class="{{ active_if_full_match('in_stock') }}">
                        <a class="d-flex align-items-center" href="{{ route('instock') }}"><i
                                    data-feather="circle"></i><span class="menu-item text-truncate"
                                                                    data-i18n="List">{{ translate('In Stock') }}</span></a>
                    </li>
                @endif
                @if(array_key_exists('emergency_stock' ,$permissions))
                    <li class="{{ active_if_full_match('emergency-stock') }}">
                        <a class="d-flex align-items-center" href="{{ route('emergency_stock') }}"><i
                                    data-feather="circle"></i><span class="menu-item text-truncate"
                                                                    data-i18n="List">{{ translate('Emergency Stock') }}</span></a>
                    </li>
                @endif
                @if(array_key_exists('stockout' ,$permissions))
                    <li class="{{ active_if_full_match('medicines/stockout') }}"><a
                                class="d-flex align-items-center"
                                href="{{ route('stockout') }}"><i
                                    data-feather="circle"></i><span class="menu-item text-truncate"
                                                                    data-i18n="List">{{ translate('Stockout') }}</span></a>
                    </li>
                @endif
                @if(array_key_exists('upcoming_expired' ,$permissions))
                    <li class="{{ active_if_full_match('upcoming') }}"><a class="d-flex align-items-center"
                                                                          href="{{ route('upcoming') }}"><i
                                    data-feather="circle"></i><span class="menu-item text-truncate"
                                                                    data-i18n="List">{{ translate('Upcoming Expired') }}</span></a>
                    </li>
                @endif
                @if(array_key_exists('already_expired' ,$permissions))
                    <li class="{{ active_if_full_match('medicines/expired') }}"><a class="d-flex align-items-center"
                                                                                   href="{{ route('expired') }}"><i
                                    data-feather="circle"></i><span class="menu-item text-truncate"
                                                                    data-i18n="List">{{ translate('Already Expired') }}</span></a>
                    </li>
                @endif
            </ul>
        </li>
    @endif
<!--Systems menus -->
    @if(array_key_exists('admin_user',$permissions) || array_key_exists('roles',$permissions))
        <li class=" nav-item {{ active_if_match('admin/admin') }} || {{ active_if_match('admin/role')}}">
            <a class="d-flex align-items-center" href="#">
                <i class="fas fa-cogs"></i>
                <span class="menu-title text-truncate" data-i18n="Invoice">
                            {{ translate('Systems') }}
                        </span>
            </a>
            <ul class="menu-content">
                @if(array_key_exists('admin_user' ,$permissions))
                    <li class="{{ active_if_full_match('admin/admin') }}">
                        <a class="d-flex align-items-center" href="{{ route('admin.index') }}">
                            <i class="fas fa-user"></i>
                            <span class="menu-item text-truncate" data-i18n="List">
                                    {{ translate('Admin User') }}
                                </span>
                        </a>
                    </li>
                @endif
                @if(array_key_exists('roles' ,$permissions))
                    <li class="{{ active_if_full_match('admin/role') }}">
                        <a class="d-flex align-items-center" href="{{ route('role.index') }}">
                            <i class="fas fa-lock"></i>
                            <span class="menu-item text-truncate" data-i18n="List">
                                    {{ translate('Roles') }}
                                </span>
                        </a>
                    </li>
                @endif
            </ul>
        </li>
    @endif
    @if(array_key_exists('manufacturers_add',$permissions) || array_key_exists('manufacturers_list',$permissions))
        <li class=" nav-item {{ active_if_match('supplier/*') }}"><a class="d-flex align-items-center" href="#"><i
                        class="fa-solid fa-people-carry-box"></i><span class="menu-title text-truncate"
                                                                       data-i18n="Invoice">{{ __('pages.supplier') }}</span></a>
            <ul class="menu-content">
                @if(array_key_exists('manufacturers_add',$permissions))
                    <li class="{{ active_if_full_match('supplier/add') }}">
                        <a class="d-flex align-items-center"
                                                                              href="{{ route('supplier.add') }}"><i
                                    data-feather="circle"></i><span class="menu-item text-truncate"
                                                                      data-i18n="List">{{ __('pages.supplier_add') }}</span></a>
                    </li>
                @endif
                @if(array_key_exists('manufacturers_list',$permissions))
                    <li class="{{ active_if_full_match('supplier/list*') }} {{ active_if_full_match('supplier/edit/*') }} {{ active_if_full_match('supplier/view/*') }}">
                        <a class="d-flex align-items-center" href="{{ route('supplier.list') }}"><i
                                    data-feather="circle"></i><span class="menu-item text-truncate"
                                                                    data-i18n="Preview">{{ __('pages.supplier_list') }}</span></a>
                    </li>
                @endif
            </ul>
        </li>
    @endif
<!-- Vendors Routes -->
    @if(array_key_exists('vendor_add',$permissions) || array_key_exists('vendor_list',$permissions))
        <li class=" nav-item {{ active_if_match('vendor/*') }}">
            <a class="d-flex align-items-center" href="#">
                <i class="fa-solid fa-store"></i>
                <span class="menu-title text-truncate" data-i18n="Invoice">{{ __('pages.vendors') }}</span>
            </a>
            <ul class="menu-content">
                @if(array_key_exists('vendor_add',$permissions))
                    <li class="{{ active_if_full_match('vendor/create') }}">
                        <a class="d-flex align-items-center" href="{{ route('vendor.create') }}">
                            <i data-feather="circle"></i>
                            <span class="menu-item text-truncate"
                                  data-i18n="List">{{ __('pages.vendor_add') }}</span>
                        </a>
                    </li>
                @endif
                @if(array_key_exists('vendor_list', $permissions))
                    <li class="{{ active_if_full_match('vendor/list') }} {{ active_if_full_match('vendor/*/view') }}">
                        <a class="d-flex align-items-center" href="{{ route('vendor.index') }}"><i
                                    data-feather="circle"></i><span
                                    class="menu-item text-truncate"
                                    data-i18n="Preview">{{ __('pages.vendor_list') }}</span></a>
                    </li>
                @endif
            </ul>
        </li>
    @endif

    @if(array_key_exists('medicine_add',$permissions) || array_key_exists('medicine_list',$permissions) || array_key_exists('categories',$permissions) || array_key_exists('units',$permissions) || array_key_exists('leaf',$permissions) ||array_key_exists('types',$permissions))
        <li class=" nav-item {{ active_if_match('medicines/add') }} || {{ active_if_match('medicines/list') }} || {{ active_if_match('medicines/categories') }} || {{ active_if_match('medicines/unit') }} || {{ active_if_match('medicines/leaf') }} || {{ active_if_match('medicines/types') }}">
            <a class="d-flex align-items-center" href="#"><i class="fas fa-pills"></i><span
                        class="menu-title text-truncate"
                        data-i18n="Invoice">{{ __('pages.medicine') }}</span></a>
            <ul class="menu-content">
                @if(array_key_exists('medicine_add' ,$permissions))
                    <li class="{{ active_if_full_match('medicines/add') }}"><a class="d-flex align-items-center"
                                                                               href="{{ route('medicine.add') }}"><i
                                    data-feather="circle"></i><span class="menu-item text-truncate"
                                                                    data-i18n="List">{{ __('pages.medicine_add') }}</span></a>
                    </li>
                @endif
                @if(array_key_exists('medicine_list' ,$permissions))
                    <li class="{{ active_if_full_match('medicines/list') }} {{ active_if_match('medicines/edit/*') }}">
                        <a class="d-flex align-items-center" href="{{ route('medicine.list') }}"><i
                                    data-feather="circle"></i><span
                                    class="menu-item text-truncate"
                                    data-i18n="Preview">{{ __('pages.medicine_list') }}</span></a>
                    </li>
                @endif
                @if(array_key_exists('categories' ,$permissions))
                    <li class="{{ active_if_full_match('medicines/categories') }}">
                        <a class="d-flex align-items-center" href="{{ route('category') }}">
                            <i data-feather="circle"></i>
                            <span class="menu-item text-truncate" data-i18n="Add">
                                    {{ __('pages.categories') }}
                                </span>
                        </a>
                    </li>
                @endif
                @if(array_key_exists('units' ,$permissions))
                    <li class="{{ active_if_full_match('medicines/unit') }}"><a class="d-flex align-items-center"
                                                                                href="{{ route('units') }}"><i
                                    data-feather="circle"></i><span class="menu-item text-truncate"
                                                                    data-i18n="Add">{{ __('pages.units') }}</span></a>
                    </li>
                @endif
                @if(array_key_exists('leaf' ,$permissions))
                    <li class="{{ active_if_full_match('medicines/leaf') }}"><a class="d-flex align-items-center"
                                                                                href="{{ route('leaf') }}"><i
                                    data-feather="circle"></i><span class="menu-item text-truncate"
                                                                    data-i18n="Add">{{ __('pages.leaf') }}</span></a>
                    </li>
                @endif
                @if(array_key_exists('types' ,$permissions))
                    <li class="{{ active_if_full_match('medicines/type*') }}">
                        <a class="d-flex align-items-center" href="{{ route('types') }}">
                            <i data-feather="circle"></i>
                            <span class="menu-item text-truncate" data-i18n="Add">
                            {{ __('pages.types') }}
                        </span>
                        </a>
                    </li>
                @endif
            </ul>
        </li>
    @endif
    @if(array_key_exists('new_purchase',$permissions) || array_key_exists('purchase_history',$permissions)|| array_key_exists('new_invoice',$permissions))
        <li class=" nav-item {{ active_if_match('purchase/*') }} "><a class="d-flex align-items-center" href="#"><i
                        class="fas fa-cart-shopping"></i><span class="menu-title text-truncate" data-i18n="Invoice">{{
            __('pages.purchase') }}</span></a>
            <ul class="menu-content">
                @if(array_key_exists('new_purchase' ,$permissions))
                    <li class="{{ active_if_full_match('sell') }} {{ active_if_match('sell')}}"><a
                                class="d-flex align-items-center"
                                href="{{ route('sell.index') }}"><i data-feather="circle"></i><span
                                    class="menu-item text-truncate"
                                    data-i18n="List">{{ __('pages.new_purchase') }}</span></a>
                    </li>
                @endif
                @if(array_key_exists('purchase_history' ,$permissions))
                    <li class="active_if_full_match('purchase/reports') }} {{ active_if_match('purchase/reports')}}">
                        <a
                                class="d-flex align-items-center" href="{{ route('purchase.reports') }}"><i
                                    data-feather="circle"></i><span class="menu-item text-truncate"
                                                                    data-i18n="Preview">{{
                    __('pages.purchase_history') }}</span></a>
                    </li>
                @endif
            </ul>
        </li>
    @endif
    @if(array_key_exists('new_invoice',$permissions) || array_key_exists('invoice_history',$permissions))
        <li class=" nav-item {{ active_if_match('invoice*') }} || {{ active_if_match('returned_history') }}"><a
                    class="d-flex align-items-center" href="#"><i class="fa-solid fa-file-invoice"></i><span
                        class="menu-title text-truncate" data-i18n="Invoice">{{translate('Sales')}}</span></a>
            <ul class="menu-content">
                @if(array_key_exists('new_invoice' ,$permissions))
                    <li class="{{ active_if_full_match('invoice/new*') }}"><a class="d-flex align-items-center"
                                                                              href="{{ route('pos.index') }}"><i
                                    data-feather="circle"></i><span class="menu-item text-truncate"
                                                                    data-i18n="List">{{translate('New Invoice')}}</span></a>
                    </li>
                @endif
                @if(array_key_exists('invoice_history' ,$permissions))
                    <li class="active_if_full_match('invoice/reports*') }} {{ active_if_match('invoice/reports')}}">
                        <a
                                class="d-flex align-items-center" href="{{ route('invoice.reports') }}"><i
                                    data-feather="circle"></i><span class="menu-item text-truncate"
                                                                    data-i18n="Preview">{{translate('Invoice History')}}</span></a>
                    </li>
                @endif
                @if(array_key_exists('return_history' ,$permissions))
                    <li class="active_if_full_match('returned_history') }} {{ active_if_match('returned_history')}}">
                        <a
                                class="d-flex align-items-center" href="{{route('return.history') }}"><i
                                    data-feather="circle"></i><span
                                    class="menu-item text-truncate"
                                    data-i18n="Preview">{{translate('Return History')}}</span></a>
                    </li>
                @endif
            </ul>
        </li>
    @endif
    @if(array_key_exists('due_customer',$permissions) || array_key_exists('payable_manufacturer',$permissions)|| array_key_exists('sells_&_purchase_report',$permissions)|| array_key_exists('top_sell_medicine',$permissions)|| array_key_exists('profit_&_loss',$permissions))
        <li class=" nav-item {{ active_if_match('report/medicine/topsell') }} || {{ active_if_match('report/customer-due') }} || {{ active_if_match('report/supplier/due') }} || {{ active_if_match('reports') }} || {{ active_if_match('profit') }}">
            <a class="d-flex align-items-center" href="#">
                <i class="fa-solid fa-chart-line"></i>
                <span class="menu-title text-truncate" data-i18n="Invoice">
                    {{translate('Reports')}}
                </span>
            </a>
            <ul class="menu-content">
                @if(array_key_exists('due_customer' , $permissions))
                    <li class="{{ active_if_full_match('report/customer/due') }}"><a
                                class="d-flex align-items-center"
                                href="{{ route('report.customer_due') }}"><i
                                    data-feather="circle"></i><span
                                    class="menu-item text-truncate"
                                    data-i18n="List">{{ __('pages.customer_due') }}</span></a>
                    </li>
                @endif
                @if(array_key_exists('payable_manufacturer' ,$permissions))
                    <li class="{{ active_if_full_match('report/supplier/due') }} {{ active_if_match('report/supplier/due')}}">
                        <a class="d-flex align-items-center" href="{{ route('report.supplier_due') }}">
                            <i data-feather="circle"></i>
                            <span class="menu-item text-truncate" data-i18n="Add">{{
                    translate('Payable Manufacturer') }}
                </span>
                        </a>
                    </li>
                @endif
                @if(array_key_exists('sells_&_purchase_report' ,$permissions))
                    <li class="active_if_full_match('reports') }} {{ active_if_match('reports')}}">
                        <a class="d-flex align-items-center" href="{{route('reports') }}">
                            <i data-feather="circle"></i>
                            <span class="menu-item text-truncate" data-i18n="Preview">
                    {{translate('Sells & Purchase Reports')}}
                </span>
                        </a>
                    </li>
                @endif
                @if(array_key_exists('top_sell_medicine' ,$permissions))
                    <li class="active_if_full_match('report/medicine/topsell') }} {{ active_if_match('report/medicine/topsell')}}">
                        <a class="d-flex align-items-center" href="{{route('report.topsell_medicine') }}">
                            <i data-feather="circle"></i>
                            <span class="menu-item text-truncate" data-i18n="Preview">
                    Top Sell Medicine
                </span>
                        </a>
                    </li>
                @endif
                @if(array_key_exists('profit_&_loss' ,$permissions))
                    <li class="active_if_full_match('profit') }} {{ active_if_match('profit')}}">
                        <a class="d-flex align-items-center" href="{{route('profit') }}">
                            <i data-feather="circle"></i>
                            <span class="menu-item text-truncate" data-i18n="Preview">
                                    {{translate('Profit & Loss')}}
                                </span>
                        </a>
                    </li>
                @endif
            </ul>
        </li>
    @endif
    @if(array_key_exists('doctor_add',$permissions) ||array_key_exists('doctor_list',$permissions) || array_key_exists('prescription',$permissions)|| array_key_exists('diagnosis_&_tests',$permissions))
        <li class=" nav-item {{ active_if_match('doctor/*') }}">
            <a class="d-flex align-items-center" href="#">
                <i class="fas fa-users"></i>
                <span class="menu-title text-truncate" data-i18n="Invoice">
            {{ translate('Doctor') }}
            </span>
            </a>
            <ul class="menu-content">
                @if(array_key_exists('doctor_add' ,$permissions))
                    <li class="{{ active_if_full_match('doctor/add') }}">
                        <a class="d-flex align-items-center" href="{{ route('doctor.add') }}">
                            <i data-feather="circle"></i>
                            <span class="menu-item text-truncate" data-i18n="List">
                                    {{ __('Add Doctor') }}
                                </span>
                        </a>
                    </li>
                @endif
                @if(array_key_exists('doctor_list' ,$permissions))
                    <li
                            class="{{ active_if_full_match('doctor/list*') }} {{ active_if_full_match('doctor/edit/*') }} {{ active_if_full_match('doctor/view/*') }}">
                        <a class="d-flex align-items-center" href="{{ route('doctor.list') }}">
                            <i data-feather="circle"></i>
                            <span class="menu-item text-truncate" data-i18n="Preview">
                                {{ __('Doctor List') }}
                            </span>
                        </a>
                    </li>
                @endif
                @if(array_key_exists('prescription' ,$permissions))
                    <li class=" nav-item {{ active_if_full_match('prescrive/list') }}">
                        <a class="d-flex align-items-center" href="{{route('prescrive.list') }}">
                            <i class="fas fa-prescription"></i>
                            <span class="menu-title text-truncate" data-i18n="Dashboards">
                                {{ translate('Prescription') }}
                            </span>
                        </a>
                    </li>
                @endif
                @if(array_key_exists('diagnosis_&_tests' ,$permissions))
                    <li class=" nav-item {{ active_if_full_match('tests/list') }}">
                        <a class="d-flex align-items-center" href="{{route('test.list') }}">
                            <i class="fas fa-diagnoses"></i>
                            <span class="menu-title text-truncate" data-i18n="Dashboards">
                                    {{ translate('Diagnosis & Tests') }}
                                </span>
                        </a>
                    </li>
                @endif
            </ul>
        </li>
    @endif
    @if(array_key_exists('my_plan',$permissions) || array_key_exists('renew_subscription',$permissions))
        <li class=" nav-item {{ active_if_match('plan/*') }}">
            <a class="d-flex align-items-center" href="#">
                <i class="fas fa-clipboard-list"></i>
                <span class="menu-title text-truncate" data-i18n="Invoice">
                    {{translate('My Subscription')}}
                </span>
            </a>
            <ul class="menu-content">
                @if(array_key_exists('my_plan' ,$permissions))
                    <li class="{{ active_if_full_match('plan') }}">
                        <a class="d-flex align-items-center" href="{{ route('plan') }}">
                            <i data-feather="circle"></i>
                            <span class="menu-item text-truncate" data-i18n="List">
                    {{translate('My Plan')}}
                </span>
                        </a>
                    </li>
                @endif
                @if(array_key_exists('renew_subscription' ,$permissions))
                    <li class="{{ active_if_full_match('plan/renew') }}">
                        <a class="d-flex align-items-center" href="{{ route('renew.plan') }}">
                            <i data-feather="circle"></i>
                            <span class="menu-item text-truncate" data-i18n="Add">
                                    {{ translate('Renew Subscription') }}
                                </span>
                        </a>
                    </li>
                @endif
            </ul>
        </li>
    @endif

    @if(array_key_exists('payment_method' ,$permissions))
        <li class=" nav-item {{ active_if_full_match('payment_methdod') }}">
            <a class="d-flex align-items-center" href="{{route('payment.method') }}">
                <i class="fa-solid fa-money-bill-wave"></i>
                <span class="menu-title text-truncate" data-i18n="Dashboards">
                    {{ __('pages.payment_method') }}
                </span>
            </a>
        </li>
    @endif
    @if(array_key_exists('site_setting' ,$permissions))
        <li class=" nav-item {{ active_if_full_match('settings') }}">
            <a class="d-flex align-items-center" href="{{route('settings') }}">
                <i class="fa-solid fa-cog"></i>
                <span class="menu-title text-truncate" data-i18n="Dashboards">
                    {{ __('pages.site_setting') }}
                </span>
            </a>
        </li>
    @endif
    
</ul>