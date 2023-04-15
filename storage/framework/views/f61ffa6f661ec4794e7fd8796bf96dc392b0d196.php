<!-- BEGIN: Header-->
    <nav class="header-navbar navbar navbar-expand-lg align-items-center floating-nav navbar-light  container-xxl navBar" id="desktopmenu">
        <div class="navbar-container d-flex content">
            <div class="bookmark-wrapper d-flex align-items-center">
                <ul class="nav navbar-nav d-xl-none">
                    <li class="nav-item"><a class="nav-link menu-toggle" href="#"><i class="ficon" data-feather="menu"></i></a></li>
                </ul>
            </div>
           
            <ul class="nav navbar-nav align-items-center ms-auto">
                <li class="nav-item dropdown dropdown-language">
                    
                    
                    <?php
                    $langact = \App\Models\Language::where('iso', session()->get('locale'))->first();
                    
                    
                    $languages = \App\Models\Language::where('iso', '!=', session()->get('locale'))->get();
                    
                     $date = date('Y-m-d', time());
                    
                    $expire_medicine = \App\Models\Batch::where('shop_id', Auth::user()->shop_id)->where('expire', '<=', $date)->count();
  
                    $stockout_medicine = \App\Models\Medicine::where('shop_id', Auth::user()->shop_id)->whereHas('batch', function ($query) {
                    $query->where('qty', '<', 1);
                    })->count();
                    
                    
                    ?>
                    
                    
                    <?php if($langact != null): ?>
                    <a class="nav-link dropdown-toggle" id="dropdown-flag" href="<?php echo e(route('language.change', $langact->iso)); ?>" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="flag-icon flag-icon-<?php echo e($langact->iso); ?>"></i><span class="selected-language"><?php echo e($langact->name); ?></span></a>
                    <?php endif; ?>
                
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdown-flag">
                        <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <a class="dropdown-item" href="<?php echo e(route('language.change', $lang->iso)); ?>" data-language="en"><i class="flag-icon flag-icon-<?php echo e($lang->iso); ?>"></i> <?php echo e($lang->name); ?></a>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                     </div>
                </li>
                
                <li class="nav-item dropdown dropdown-cart me-25"><a class="nav-link" href="<?php echo e(route('pos.index')); ?>">(POS) &nbsp;<i class="fas fa-print"></i></a>
                </li>
                
               <?php if($expire_medicine>0): ?>
                <li class="nav-item dropdown dropdown-cart me-25"><a class="nav-link" href="<?php echo e(route('expired')); ?>"><i class="fas fa-exclamation-triangle"></i><span class="badge rounded-pill bg-danger badge-up cart-item-count"><?php echo e($expire_medicine); ?></span></a>
                </li>
                <?php endif; ?>
                
                
                 <?php if($stockout_medicine>0): ?>
                <li class="nav-item dropdown dropdown-notification me-25"><a class="nav-link" href="<?php echo e(route('stockout')); ?>"><i class="ficon" data-feather="bell"></i><span class="badge rounded-pill bg-danger badge-up"><?php echo e($stockout_medicine); ?></span></a>
                   
                </li>
                <?php endif; ?>
                <li class="nav-item dropdown dropdown-user"><a class="nav-link dropdown-toggle dropdown-user-link" id="dropdown-user" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="user-nav d-sm-flex d-none"><span class="user-name fw-bolder"><?php echo e(Auth::user()->name); ?></span><span class="user-status"><?php echo e(Auth::user()->role ? Auth::user()->role->name: 'Admin'); ?></span></div><span class="avatar"><img class="round" <?php if(!empty(Auth::user()->image)): ?> src="<?php echo e(asset('storage/images/profile/'.Auth::user()->image.'')); ?>" <?php else: ?> src="<?php echo e(asset('dashboard/app-assets/images/f2.jpg')); ?>" <?php endif; ?> alt="avatar" height="40" width="40"><span class="avatar-status-online"></span></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end dropDown shadow-lg border-0" aria-labelledby="dropdown-user">
                       
                         <a class="dropdown-item" href="<?php echo e(route('profile.setting')); ?>"><i class="me-50 fas fa-th" ></i> <?php echo e(__('Dashboard')); ?></a>
                         <a class="dropdown-item py-1" href="<?php echo e(route('profile.setting')); ?>"><i class="me-50" data-feather="lock"></i> <?php echo e(__('Change Password')); ?></a>
                       
                        <a class="dropdown-item py-1" href="<?php echo e(route('profile.info.setting')); ?>"><i class="me-50" data-feather="eye"></i> <?php echo e(__('Change Info')); ?></a>
                        <a class="dropdown-item py-1" href="<?php echo e(route('settings')); ?>"><i class="me-50" data-feather="settings"></i> <?php echo e(__('Settings')); ?></a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item py-1" href="<?php echo e(route('logout')); ?>"><i class="me-50" data-feather="power"></i> <?php echo e(__('Logout')); ?></a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
    
    <!-- END: Header-->
    
    
    
    <!--Mobile Menu-->
    <nav class="header-navbar navbar navbar-expand-lg align-items-center floating-nav navbar-light  container-xxl navBar" id="mobilemenu" style="bottom:0">
        <div class="navbar-container d-flex content">
            <div class="bookmark-wrapper d-flex align-items-center">
                <ul class="nav navbar-nav d-xl-none">
                    <li id="mm" class="nav-item"><a class="nav-link menu-toggle" href="#"><i class="fa fa-bars"></i></a></li>
                </ul>
            </div>
            <?php
            $my_pack = \App\Models\Package::where('id', Auth::user()->shop->package_id)->first();
            ?>
            
            <!------------------
            <?php if(Auth::user()->shop->email != env('SUPERUSER')): ?>
            <ul class="nav navbar-nav planbtn">
                <li><span>My Plan : <?php echo e($my_pack->name); ?></span>
                </li>
                <li><span>Expired In : <?php echo e(date('d F, Y', strtotime(Auth::user()->shop->next_pay))); ?></span>
                </li>
                <?php if(Auth::user()->shop->package_id != 5): ?>
                <li><a class="nav-link" target="_blank" rel="noopener noreferrer" href="https://<?php echo e(Auth::user()->shop->username); ?>.pharmacyss.com"><span>My Website</span></a>
                </li>
                <?php endif; ?>
            </ul>
            <?php endif; ?>
            --------------------->
            
            <ul id="mul" class="nav navbar-nav align-items-center">
                
                <li id="mm" class="nav-item dropdown dropdown-cart me-25"><a class="nav-link" href="<?php echo e(route('profit')); ?>"><i class="fas fa-file-text"></i></a></li>
                
                <li id="mm" class="nav-item dropdown dropdown-cart me-25"><a class="nav-link" href="<?php echo e(route('pos.index')); ?>"><i class="fas fa-print"></i></a></li>
                
                <li id="mm" class="nav-item dropdown dropdown-cart me-25"><a class="nav-link" href="<?php echo e(route('profile.info.setting')); ?>"><i class="fas fa-cog"></i></a></li>
                
                <li id="mm" class="nav-item dropdown dropdown-cart me-25"><a class="nav-link" href="<?php echo e(route('logout')); ?>"><i class="fa fa-power-off"></i></a></li>
                
                <!--<li class="nav-item dropdown dropdown-user"><a class="nav-link dropdown-toggle dropdown-user-link" id="dropdown-user" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="user-nav d-sm-flex d-none"><span class="user-name fw-bolder"><?php echo e(Auth::user()->name); ?></span><span class="user-status">Admin</span></div><span class="avatar"><img class="round" src="<?php echo e(asset('dashboard/app-assets/images/f2.jpg')); ?>" alt="avatar" height="40" width="40"><span class="avatar-status-online"></span></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end dropDown" aria-labelledby="dropdown-user">
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="<?php echo e(route('profile.setting')); ?>"><i class="me-50" data-feather="settings"></i> <?php echo e(__('Change Password')); ?></a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="<?php echo e(route('profile.info.setting')); ?>"><i class="me-50" data-feather="settings"></i> <?php echo e(__('Change Info')); ?></a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"><i class="me-50" data-feather="power"></i> <?php echo e(__('Logout')); ?></a>
                    </div>
                </li> -->
            </ul>
        </div>
    </nav>
    
    <!-- END: Header-->
    
<?php /**PATH C:\xampp\htdocs\pharmacyapp\resources\views/layouts/elements/header.blade.php ENDPATH**/ ?>