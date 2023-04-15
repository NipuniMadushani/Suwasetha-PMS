<ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
    <li class=" nav-item <?php echo e(active_if_full_match('dashboard')); ?>">
        <a class="d-flex align-items-center" href="<?php echo e(route('dashboard')); ?>">
            <i class="fa fa-tachometer" aria-hidden="true"></i>
            <span class="menu-title text-truncate"
                  data-i18n="Dashboards"><?php echo e(__('pages.dashboard')); ?></span>
        </a>
    </li>
<li class=" nav-item <?php echo e(active_if_match('customer/add')); ?> || <?php echo e(active_if_match('customer/list')); ?>">
    <a class="d-flex align-items-center" href="#">
        <i class="fas fa-users"></i>
        <span class="menu-title text-truncate" data-i18n="Invoice">
            <?php echo e(__('pages.customer')); ?>

        </span>
    </a>
    <ul class="menu-content">
        <li class="<?php echo e(active_if_full_match('customer/add')); ?>">
            <a class="d-flex align-items-center" href="<?php echo e(route('customer.add')); ?>">
                <i data-feather="circle"></i>
                <span class="menu-item text-truncate" data-i18n="List">
                    <?php echo e(__('pages.customer_add')); ?>

                </span>
            </a>
        </li>
        <li
                class="<?php echo e(active_if_full_match('customer/list')); ?> <?php echo e(active_if_full_match('customer/edit/*')); ?> <?php echo e(active_if_full_match('customer/view/*')); ?>">
            <a class="d-flex align-items-center" href="<?php echo e(route('customer.list')); ?>">
                <i data-feather="circle"></i>
                <span class="menu-item text-truncate" data-i18n="Preview">
                    <?php echo e(__('pages.customer_list')); ?>

                </span>
            </a>
        </li>
    </ul>
</li>
<li class=" nav-item <?php echo e(active_if_match('in_stock')); ?> || <?php echo e(active_if_match('emergency-stock')); ?> || <?php echo e(active_if_match('medicines/stockout')); ?> || <?php echo e(active_if_match('upcoming')); ?> || <?php echo e(active_if_match('medicines/expired')); ?>">
    <a class="d-flex align-items-center" href="#">
        <i class="fas fa-pills"></i>
        <span class="menu-title text-truncate" data-i18n="Invoice">
            <?php echo e(translate('Medicine Stock')); ?>

        </span>
    </a>
    <ul class="menu-content">
        <li class="<?php echo e(active_if_full_match('in_stock')); ?>">
            <a class="d-flex align-items-center" href="<?php echo e(route('instock')); ?>">
                <i data-feather="circle"></i>
                <span class="menu-item text-truncate" data-i18n="List">
                    <?php echo e(translate('In Stock')); ?>

                </span>
            </a>
        </li>
        <li class="<?php echo e(active_if_full_match('emergency-stock')); ?>">
            <a class="d-flex align-items-center" href="<?php echo e(route('emergency_stock')); ?>">
                <i data-feather="circle"></i>
                <span class="menu-item text-truncate" data-i18n="List">
                    <?php echo e(translate('Emergency Stock')); ?>

                </span>
            </a>
        </li>
        <li class="<?php echo e(active_if_full_match('medicines/stockout')); ?>">
            <a class="d-flex align-items-center" href="<?php echo e(route('stockout')); ?>">
                <i data-feather="circle"></i>
                <span class="menu-item text-truncate" data-i18n="List">
                    <?php echo e(translate('Stockout')); ?>

                </span>
            </a>
        </li>


        <li class="<?php echo e(active_if_full_match('upcoming')); ?>">
            <a class="d-flex align-items-center" href="<?php echo e(route('upcoming')); ?>">
                <i data-feather="circle"></i>
                <span class="menu-item text-truncate" data-i18n="List">
                    <?php echo e(translate('Upcoming Expired')); ?>

                </span>
            </a>
        </li>

        <li class="<?php echo e(active_if_full_match('medicines/expired')); ?>">
            <a class="d-flex align-items-center" href="<?php echo e(route('expired')); ?>">
                <i data-feather="circle"></i>
                <span class="menu-item text-truncate" data-i18n="List">
                    <?php echo e(translate('Already Expired')); ?>

                </span>
            </a>
        </li>
    </ul>
</li>

<!--Systems menus -->
<li class=" nav-item <?php echo e(active_if_match('admin/admin')); ?> || <?php echo e(active_if_match('admin/role')); ?>">
    <a class="d-flex align-items-center" href="#">
        <i class="fas fa-cogs"></i>
        <span class="menu-title text-truncate" data-i18n="Invoice">
            <?php echo e(translate('Systems')); ?>

        </span>
    </a>
    <ul class="menu-content">
        <li class="<?php echo e(active_if_full_match('admin/admin')); ?>">
            <a class="d-flex align-items-center" href="<?php echo e(route('admin.index')); ?>">
                <i class="fas fa-user"></i>
                <span class="menu-item text-truncate" data-i18n="List">
                    <?php echo e(translate('Admin User')); ?>

                </span>
            </a>
        </li>
        <li class="<?php echo e(active_if_full_match('admin/role')); ?>">
            <a class="d-flex align-items-center" href="<?php echo e(route('role.index')); ?>">
                <i class="fas fa-lock"></i>
                <span class="menu-item text-truncate" data-i18n="List">
                    <?php echo e(translate('Roles')); ?>

                </span>
            </a>
        </li>
    </ul>
</li>

<li class=" nav-item <?php echo e(active_if_match('supplier/*')); ?>"><a class="d-flex align-items-center" href="#"><i
                class="fa-solid fa-people-carry-box"></i><span class="menu-title text-truncate" data-i18n="Invoice"><?php echo e(__('pages.supplier')); ?></span></a>
    <ul class="menu-content">
        <li class="<?php echo e(active_if_full_match('supplier/add')); ?>"><a class="d-flex align-items-center"
                                                                  href="<?php echo e(route('supplier.add')); ?>"><i
                        data-feather="circle"></i><span class="menu-item text-truncate"
                                                        data-i18n="List"><?php echo e(__('pages.supplier_add')); ?></span></a>
        </li>
        <li
                class="<?php echo e(active_if_full_match('supplier/list*')); ?> <?php echo e(active_if_full_match('supplier/edit/*')); ?> <?php echo e(active_if_full_match('supplier/view/*')); ?>">
            <a class="d-flex align-items-center" href="<?php echo e(route('supplier.list')); ?>"><i data-feather="circle"></i><span
                        class="menu-item text-truncate" data-i18n="Preview"><?php echo e(__('pages.supplier_list')); ?></span></a>
        </li>
    </ul>
</li>

<!-- Vendors Routes -->
<li class=" nav-item <?php echo e(active_if_match('vendor/*')); ?>">
    <a class="d-flex align-items-center" href="#">
        <i class="fa-solid fa-store"></i>
        <span class="menu-title text-truncate" data-i18n="Invoice"><?php echo e(__('pages.vendors')); ?></span>
    </a>
    <ul class="menu-content">
        <li class="<?php echo e(active_if_full_match('vendor/create')); ?>">
            <a class="d-flex align-items-center" href="<?php echo e(route('vendor.create')); ?>">
                <i data-feather="circle"></i>
                <span class="menu-item text-truncate" data-i18n="List"><?php echo e(__('pages.vendor_add')); ?></span>
            </a>
        </li>
        <li class="<?php echo e(active_if_full_match('vendor/list')); ?> <?php echo e(active_if_full_match('vendor/*/view')); ?>">
            <a class="d-flex align-items-center" href="<?php echo e(route('vendor.index')); ?>"><i data-feather="circle"></i><span
                        class="menu-item text-truncate" data-i18n="Preview"><?php echo e(__('pages.vendor_list')); ?></span></a>
        </li>
    </ul>
</li>


<li
        class=" nav-item <?php echo e(active_if_match('medicines/add')); ?> || <?php echo e(active_if_match('medicines/list')); ?> || <?php echo e(active_if_match('medicines/categories')); ?> || <?php echo e(active_if_match('medicines/unit')); ?> || <?php echo e(active_if_match('medicines/leaf')); ?> || <?php echo e(active_if_match('medicines/types')); ?>">
    <a class="d-flex align-items-center" href="#"><i class="fas fa-pills"></i><span class="menu-title text-truncate"
                                                                                    data-i18n="Invoice"><?php echo e(__('pages.medicine')); ?></span></a>
    <ul class="menu-content">
        <li class="<?php echo e(active_if_full_match('medicines/add')); ?>"><a class="d-flex align-items-center"
                                                                   href="<?php echo e(route('medicine.add')); ?>"><i
                        data-feather="circle"></i><span class="menu-item text-truncate"
                                                        data-i18n="List"><?php echo e(__('pages.medicine_add')); ?></span></a>
        </li>
        <li class="<?php echo e(active_if_full_match('medicines/list')); ?> <?php echo e(active_if_match('medicines/edit/*')); ?>">
            <a class="d-flex align-items-center" href="<?php echo e(route('medicine.list')); ?>"><i data-feather="circle"></i><span
                        class="menu-item text-truncate" data-i18n="Preview"><?php echo e(__('pages.medicine_list')); ?></span></a>
        </li>

        <li class="<?php echo e(active_if_full_match('medicines/categories')); ?>"><a class="d-flex align-items-center"
                                                                          href="<?php echo e(route('category')); ?>"><i
                        data-feather="circle"></i><span class="menu-item text-truncate"
                                                        data-i18n="Add"><?php echo e(__('pages.categories')); ?></span></a>
        </li>
        <li class="<?php echo e(active_if_full_match('medicines/unit')); ?>"><a class="d-flex align-items-center"
                                                                    href="<?php echo e(route('units')); ?>"><i
                        data-feather="circle"></i><span class="menu-item text-truncate"
                                                        data-i18n="Add"><?php echo e(__('pages.units')); ?></span></a>
        </li>
        <li class="<?php echo e(active_if_full_match('medicines/leaf')); ?>"><a class="d-flex align-items-center"
                                                                    href="<?php echo e(route('leaf')); ?>"><i
                        data-feather="circle"></i><span class="menu-item text-truncate"
                                                        data-i18n="Add"><?php echo e(__('pages.leaf')); ?></span></a>
        </li>
        <li class="<?php echo e(active_if_full_match('medicines/type*')); ?>"><a class="d-flex align-items-center"
                                                                     href="<?php echo e(route('types')); ?>"><i
                        data-feather="circle"></i><span class="menu-item text-truncate"
                                                        data-i18n="Add"><?php echo e(__('pages.types')); ?></span></a>
        </li>
    </ul>
</li>


<li class=" nav-item <?php echo e(active_if_match('purchase/*')); ?> "><a class="d-flex align-items-center" href="#"><i
                class="fas fa-cart-shopping"></i><span class="menu-title text-truncate" data-i18n="Invoice"><?php echo e(__('pages.purchase')); ?></span></a>
    <ul class="menu-content">
        <li class="<?php echo e(active_if_full_match('sell')); ?> <?php echo e(active_if_match('sell')); ?>"><a class="d-flex align-items-center"
                                                                                       href="<?php echo e(route('sell.index')); ?>"><i
                        data-feather="circle"></i><span class="menu-item text-truncate"
                                                        data-i18n="List"><?php echo e(__('pages.new_purchase')); ?></span></a>
        </li>
        <li class="active_if_full_match('purchase/reports') }} <?php echo e(active_if_match('purchase/reports')); ?>"><a
                    class="d-flex align-items-center" href="<?php echo e(route('purchase.reports')); ?>"><i
                        data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Preview"><?php echo e(__('pages.purchase_history')); ?></span></a>
        </li>
        <li class="active_if_full_match('purchase/purchase_returned_history') }} <?php echo e(active_if_match('purchase/purchase_returned_history')); ?>"><a
                    class="d-flex align-items-center" href="<?php echo e(route('purchase.return.history')); ?>"><i
                        data-feather="circle"></i><span
                        class="menu-item text-truncate" data-i18n="Preview"><?php echo e(translate('Return History')); ?></span></a>
        </li>
    </ul>
</li>

<li class=" nav-item <?php echo e(active_if_match('invoice*')); ?> || <?php echo e(active_if_match('returned_history')); ?>"><a
            class="d-flex align-items-center" href="#"><i class="fa-solid fa-file-invoice"></i><span
                class="menu-title text-truncate" data-i18n="Invoice"><?php echo e(translate('Sales')); ?></span></a>
    <ul class="menu-content">
        <li class="<?php echo e(active_if_full_match('invoice/new*')); ?>"><a class="d-flex align-items-center"
                                                                  href="<?php echo e(route('pos.index')); ?>"><i
                        data-feather="circle"></i><span class="menu-item text-truncate"
                                                        data-i18n="List"><?php echo e(translate('New Invoice')); ?></span></a>
        </li>
        <li class="active_if_full_match('invoice/reports*') }} <?php echo e(active_if_match('invoice/reports')); ?>"><a
                    class="d-flex align-items-center" href="<?php echo e(route('invoice.reports')); ?>"><i
                        data-feather="circle"></i><span class="menu-item text-truncate"
                                                        data-i18n="Preview"><?php echo e(translate('Invoice History')); ?></span></a>
        </li>
        <li class="active_if_full_match('returned_history') }} <?php echo e(active_if_match('returned_history')); ?>"><a
                    class="d-flex align-items-center" href="<?php echo e(route('return.history')); ?>"><i
                        data-feather="circle"></i><span
                        class="menu-item text-truncate" data-i18n="Preview"><?php echo e(translate('Return History')); ?></span></a>
        </li>
    </ul>
</li>
<li
        class=" nav-item <?php echo e(active_if_match('report/medicine/topsell')); ?> || <?php echo e(active_if_match('report/customer-due')); ?> || <?php echo e(active_if_match('report/supplier/due')); ?> || <?php echo e(active_if_match('reports')); ?> || <?php echo e(active_if_match('profit')); ?>">
    <a class="d-flex align-items-center" href="#">
        <i class="fa-solid fa-chart-line"></i>
        <span class="menu-title text-truncate" data-i18n="Invoice">
            <?php echo e(translate('Reports')); ?>

        </span>
    </a>
    <ul class="menu-content">
        <li class="<?php echo e(active_if_full_match('report/customer/due')); ?>"><a class="d-flex align-items-center"
                                                                         href="<?php echo e(route('report.customer_due')); ?>"><i
                        data-feather="circle"></i><span
                        class="menu-item text-truncate" data-i18n="List"><?php echo e(__('pages.customer_due')); ?></span></a>
        </li>
        <li class="<?php echo e(active_if_full_match('report/supplier/due')); ?> <?php echo e(active_if_match('report/supplier/due')); ?>">
            <a class="d-flex align-items-center" href="<?php echo e(route('report.supplier_due')); ?>">
                <i data-feather="circle"></i>
                <span class="menu-item text-truncate" data-i18n="Add"><?php echo e(translate('Payable Manufacturer')); ?>

                </span>
            </a>
        </li>
        <li class="active_if_full_match('reports') }} <?php echo e(active_if_match('reports')); ?>">
            <a class="d-flex align-items-center" href="<?php echo e(route('reports')); ?>">
                <i data-feather="circle"></i>
                <span class="menu-item text-truncate" data-i18n="Preview">
                    <?php echo e(translate('Sells & Purchase Reports')); ?>

                </span>
            </a>
        </li>
        <li class="active_if_full_match('report/medicine/topsell') }} <?php echo e(active_if_match('report/medicine/topsell')); ?>">
            <a class="d-flex align-items-center" href="<?php echo e(route('report.topsell_medicine')); ?>">
                <i data-feather="circle"></i>
                <span class="menu-item text-truncate" data-i18n="Preview">
                    Top Sell Medicine
                </span>
            </a>
        </li>
        <li class="active_if_full_match('profit') }} <?php echo e(active_if_match('profit')); ?>">
            <a class="d-flex align-items-center" href="<?php echo e(route('profit')); ?>">
                <i data-feather="circle"></i>
                <span class="menu-item text-truncate" data-i18n="Preview">
                    <?php echo e(translate('Profit & Loss')); ?>

                </span>
            </a>
        </li>

    </ul>
</li>

<li class=" nav-item <?php echo e(active_if_match('Prescription/*')); ?>">
    <a class="d-flex align-items-center" href="#">
        <i class="fas fa-users"></i>
        <span class="menu-title text-truncate" data-i18n="Invoice">
            <?php echo e(translate('Prescription')); ?>

        </span>
    </a>
    <ul class="menu-content">
        <li class="<?php echo e(active_if_full_match('doctor/add')); ?>">
            <a class="d-flex align-items-center" href="<?php echo e(route('doctor.add')); ?>">
                <i data-feather="circle"></i>
                <span class="menu-item text-truncate" data-i18n="List">
                    <?php echo e(__('Add Doctor')); ?>

                </span>
            </a>
        </li>
        <li
                class="<?php echo e(active_if_full_match('doctor/list*')); ?> <?php echo e(active_if_full_match('doctor/edit/*')); ?> <?php echo e(active_if_full_match('doctor/view/*')); ?>">
            <a class="d-flex align-items-center" href="<?php echo e(route('doctor.list')); ?>">
                <i data-feather="circle"></i>
                <span class="menu-item text-truncate" data-i18n="Preview"><?php echo e(__('Doctor List')); ?>

                </span>
            </a>
        </li>
        <li class=" nav-item <?php echo e(active_if_full_match('prescrive/list')); ?>">
            <a class="d-flex align-items-center" href="<?php echo e(route('prescrive.list')); ?>">
                <i class="fas fa-prescription"></i>
                <span class="menu-title text-truncate" data-i18n="Dashboards">
                    <?php echo e(translate('Prescription')); ?>

                </span>
            </a>
        </li>

        <li class=" nav-item <?php echo e(active_if_full_match('tests/list')); ?>">
            <a class="d-flex align-items-center" href="<?php echo e(route('test.list')); ?>">
                <i class="fas fa-diagnoses"></i>
                <span class="menu-title text-truncate" data-i18n="Dashboards">
                    <?php echo e(translate('Diagnosis & Tests')); ?>

                </span>
            </a>
        </li>
    </ul>
</li>
<!--<li class=" nav-item <?php echo e(active_if_match('plan/*')); ?>">-->
<!--    <a class="d-flex align-items-center" href="#">-->
<!--        <i class="fas fa-clipboard-list"></i>-->
<!--        <span class="menu-title text-truncate" data-i18n="Invoice">-->
<!--            <?php echo e(translate('My Subscription')); ?>-->
<!--        </span>-->
<!--    </a>-->
<!--    <ul class="menu-content">-->
<!--        <li class="<?php echo e(active_if_full_match('plan')); ?>">-->
<!--            <a class="d-flex align-items-center" href="<?php echo e(route('plan')); ?>">-->
<!--                <i data-feather="circle"></i>-->
<!--                <span class="menu-item text-truncate" data-i18n="List">-->
<!--                    <?php echo e(translate('My Plan')); ?>-->
<!--                </span>-->
<!--            </a>-->
<!--        </li>-->
<!--        <li class="<?php echo e(active_if_full_match('plan/renew')); ?>">-->
<!--            <a class="d-flex align-items-center" href="<?php echo e(route('renew.plan')); ?>">-->
<!--                <i data-feather="circle"></i>-->
<!--                <span class="menu-item text-truncate" data-i18n="Add">-->
<!--                    <?php echo e(translate('Renew Subscription')); ?>-->
<!--                </span>-->
<!--            </a>-->
<!--        </li>-->
<!--    </ul>-->
<!--</li>-->

<li class=" nav-item <?php echo e(active_if_full_match('settings')); ?>">
    <a class="d-flex align-items-center" href="http://127.0.0.1:5000/">
        <i class="fa-solid fa-cog"></i>
        <span class="menu-title text-truncate" data-i18n="Dashboards">
            <?php echo e(__('prediction')); ?>

        </span>
    </a>
</li>
<li class=" nav-item <?php echo e(active_if_full_match('payment_methdod')); ?>">
    <a class="d-flex align-items-center" href="<?php echo e(route('payment.method')); ?>">
        <i class="fa-solid fa-money-bill-wave"></i>
        <span class="menu-title text-truncate" data-i18n="Dashboards">
            <?php echo e(__('pages.payment_method')); ?>

        </span>
    </a>
</li>

<li class=" nav-item <?php echo e(active_if_full_match('settings')); ?>">
    <a class="d-flex align-items-center" href="<?php echo e(route('settings')); ?>">
        <i class="fa-solid fa-cog"></i>
        <span class="menu-title text-truncate" data-i18n="Dashboards">
            <?php echo e(__('pages.site_setting')); ?>

        </span>
    </a>
</li>
</ul><?php /**PATH C:\xampp\htdocs\pharmacyapp\resources\views/layouts/menus/shop_admin_route.blade.php ENDPATH**/ ?>