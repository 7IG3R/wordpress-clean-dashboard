<?php
// Dash Page  
function help_output() {
    global $isActive,$supportPlan,$orderId,$call,$AMC,$supportLeft;
    
    $pluginList = get_option( 'active_plugins' );
    $nonce = wp_create_nonce( 'my-nonce' );
    $vendor = 'wc-multivendor-marketplace/wc-multivendor-marketplace.php'; 
    $cache = 'litespeed-cache/litespeed-cache.php'; 
    $courier = 'woo-advanced-shipment-tracking/woocommerce-advanced-shipment-tracking.php'; 
    $advDelivery = 'woo-extra-flat-rate/advanced-flat-rate-shipping-for-woocommerce.php'; 
    $payment = 'woo-razorpay/woo-razorpay.php'; 
    $deliverySlots = 'woo-delivery/coderockz-woo-delivery.php'; 
    $orderExport = 'woo-order-export-lite/woo-order-export-lite.php'; 
    $cancelRefund = 'cancel-order-request-woocommerce/cancel-order-request-woocommerce.php'; 
    $checkoutEditor = 'woo-checkout-field-editor-pro/checkout-form-designer.php'; 
    $whatsapp = 'click-to-chat-for-whatsapp/click-to-chat.php'; 
    $livechat = 'tawkto-live-chat/tawkto.php'; 
    $discount = 'woo-conditional-discount-rules-for-checkout/woo-conditional-discount-rules-for-checkout.php'; 
    $featureImage = 'quick-featured-images/quick-featured-images.php'; 
    $deliveryBoys = 'local-delivery-drivers-for-woocommerce/local-delivery-drivers-for-wooCommerce.php'; 
    $orderqty = 'woo-min-max-quantity-step-control-single/wcmmq.php'; 
    $ssl = 'really-simple-ssl/rlrsssl-really-simple-ssl.php'; 
    $sms = 'sms-alert/SMSAlert-wc-order-sms.php'; 
    $Store = 'woocommerce/woocommerce.php'; 
    $wallet = 'woo-wallet/woo-wallet.php'; 
    $invoice = 'woocommerce-pdf-invoices-packing-slips/woocommerce-pdf-invoices-packingslips.php';   
    $wholesaleDiscount = 'woo-wholesale-discount/woo-wholesale-discount.php'; 
    $couponReferral = 'coupon-referral-program/coupon-referral-program.php'; 
    $membership = 'woocommerce-memberships/woocommerce-memberships.php'; 
    $pageBuilder = 'js_composer/js_composer.php'; 

	
    if($isActive){
        ?>
        <div id="gmw-extensions-page" class="wrap gmw-admin-page">
            <h2>
                <i class="gmw-icon-params"></i>Dashboard
                <span class="gmw-helpful-links-wrapper">
                    <a class="button action" title="" href="#upgradesKG" style="color: green;"> <i class="gmw-icon-puzzle"></i>Upgrades </a>
                    <a class="button action" title="" href="#extensionsKG" > <i class="gmw-icon-star"></i>Extensions </a>
                    <a class="button action" title="" href="#videoTut" > <i class="gmw-icon-monitor"></i>Tutorials </a>
                    <a class="button action" title="" href="#helpSp" > <i class="gmw-icon-info-circled"></i>Help & Support </a>
                </span>
            </h2>
            <!-- //Store Setup -->
            <div class="notice notice-info is-dismissible" style="display:block;">
                <p><a href="/wp-admin/admin.php?page=wc-settings">Click Here</a> to Setup Store Address and currency, Ignore if already done.</p>
                <button type="button" class="notice-dismiss"><span class="screen-reader-text">Dismiss this notice.</span></button>
            </div>
            <!-- Products -->
            <div class="gmw-extension-wrapper top-list installed core free active" style="width:100%">
                <div class="extension-top">
                    <div class="name">
                        <h3>Product Management<img src="https://img.icons8.com/bubbles/2x/product.png" /></h3>
                        <p class="version">Add Products, categories, attributes(Product Variation like size, color, quantity).</p>
                    </div>
                    <div class="desc">
                    <a href="/wp-admin/edit.php?post_type=product" class="button action"><i class="gmw-icon-search"></i>View All Products</a>
                    <a href="/wp-admin/edit-tags.php?taxonomy=product_cat&post_type=product" class="button action"><i class="gmw-icon-search"></i>View All Category</a>
                    <a href="/wp-admin/edit.php?post_type=product&page=product_attributes" class="button action"><i class="gmw-icon-ok"></i>Attributes</a><br>
                    <a href="/wp-admin/post-new.php?post_type=product" class="button button-primary gmw-extension-action-button action"><i class="gmw-icon-pencil"></i>Add New Product</a>
                    <a href="/wp-admin/edit.php?post_type=konte_size_guide" class="button action"><i class="gmw-icon-target"></i>Add Size Guides</a>
                    <a href="/wp-admin/edit.php?post_type=shop_coupon" class="button action"><i class="gmw-icon-target"></i>Create Coupons</a>
                    <p></p>
                    </div>
                </div>
            </div>
            <!-- Design -->
            <div class="gmw-extension-wrapper top-list installed core free active" style="width:100%">
                <div class="extension-top">
                    <div class="name">
                        <h3>Design Management<img src="https://i.pinimg.com/originals/e6/d8/ab/e6d8ab6b59c0b25c5587f6df309f360a.png" /></h3>
                        <p class="version">Manage website & application design, layout, menus, footer, banners etc.</p>
                    </div>
                    <div class="desc">
                    <a href="/wp-admin/edit.php?post_type=page" class="button button-primary gmw-extension-action-button action"><i class="gmw-icon-pencil"></i>All Pages</a>
                    <a href="/wp-admin/upload.php" class="button action"><i class="gmw-icon-search"></i>Media Gallery</a>
                    <a href="/wp-admin/nav-menus.php" class="button action"><i class="gmw-icon-menu"></i>Menus</a>
                    <a href="/wp-admin/admin.php?page=smart-slider3" class="button action"><i class="gmw-icon-spin-2"></i>Slider</a>
                    <a href="/wp-admin/widgets.php" class="button action"><i class="gmw-icon-fax"></i>Footer Widgets</a><br>
                    <a href="/wp-admin/customize.php?autofocus[section]=maintenance" class="button action" target="_blank"><i class="gmw-icon-spin-3"></i>Construction Mode</a>
                    <a href="/wp-admin/customize.php?autofocus[panel]=header" class="button action" target="_blank"><i class="gmw-icon-cog-alt"></i>Header Design</a>
                    <a href="/wp-admin/customize.php?autofocus[panel]=mobile" class="button action" target="_blank"><i class="gmw-icon-mobile"></i>Mobile</a>
                    <a href="/wp-admin/customize.php?autofocus[section]=colors" class="button action" target="_blank"><i class="gmw-icon-tags"></i>Color Scheme</a>
                    <a href="/wp-admin/customize.php?autofocus[panel]=shop" class="button action" target="_blank"><i class="gmw-icon-params"></i>Shop</a>
                    <a href="/wp-admin/customize.php?autofocus[panel]=woocommerce" class="button action" target="_blank"><i class="gmw-icon-params"></i>Store</a>
                    <a href="/wp-admin/customize.php?autofocus[panel]=typography" class="button action" target="_blank"><i class="gmw-icon-pencil"></i>Fonts</a>
                    <p>** Live Customizer may be slow. Reload if its not working.</p>
                    </div>
                </div>
            </div>
            <!-- vendor -->
            <div class="gmw-extension-wrapper top-list installed core free active" style="width:100%">
                <div class="extension-top">
                    <div class="name">
                        <h3>Store Management<img src="data:image/png;base64,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" /></h3>
                        <p class="version">Manage Multivendor functions</p>
                    </div>
                    <?php      
                        if ( in_array( $vendor , $pluginList ) ) {
                        ?>
                        <div class="action-links">
                        <ul class="action-buttons">
                            <li class="activation-button">
                                <div class="">
                                    <a href="" class="button button-secondary gmw-extension-action-button disabled">ACTIVE</a>
                                </div>
                            </li>
                            <li class="details"><i class="gmw-icon-info-circled"></i><a href="#mvGuides"> Guides </a></li>
                        </ul>
                        </div>
                        <div class="desc">
                        <a href="/store-manager" class="button action">Dashboard</a>
                        <a href="/store-manager/vendors/" class="button action">All Stores</a>
                        <a href="/store-manager/reports-sales-by-date/" class="button action">Analytics</a>
                        <a href="/store-manager/settings/" class="button action">Settings</a>
                        <p>This module add functionality of multiple vendors/restaurants/shop owners. </p>
                        </div>
                        <?php
                        } else {
                        ?>
                        <div class="action-links">
                        <ul class="action-buttons">
                            <li class="activation-button">
                                <div class="">
                                    <a href="tel:918409258741" class="button button-primary gmw-extension-action-button">UPGRADE</a>
                                </div>
                            </li>
                        </ul>
                        </div>
                        <div class="desc">
                        <a href="" class="button action disabled">Dashboard</a>
                        <a href="" class="button action disabled">Vendors</a>
                        <a href="" class="button action disabled">Analytics</a>
                        <a href="" class="button action disabled">Settings</a>
                        <p>This module add functionality of multiple vendors/restaurants/shop owners. </p>
                        </div>
                        <?php
                        }
                    ?>
                </div>
            </div>
            <!-- cache -->
            <div class="gmw-extension-wrapper top-list installed core free active" style="width:100%">
                <div class="extension-top">
                    <div class="name">
                        <h3>
                            System Cache
                            <img src="data:image/jpeg;base64,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" />
                        </h3>
                        <p class="version">
                            Clear Website and Application cache
                        </p>
                    </div>
                    <?php      
                        if ( in_array( $cache , $pluginList ) ) {
                    ?>
                    <div class="action-links">
                        <ul class="action-buttons">
                            
                        </ul>
                    </div>
                    <div class="desc">
                    <a href="/wp-admin/admin.php?page=litespeed-toolbox" class="button action">Clear Cache Tools</a>
                    <p>Use this button to navigate to purge page and specific clear cache if anything doesnot load properly. Don't clean complete cache without any serious problem</p>
                    </div>
                    <?php } else {
                    ?>
                    <div class="action-links">
                        <ul class="action-buttons">
                            <li class="activation-button"><a href="tel:918409258741" class="button button-primary gmw-extension-action-button">UPGRADE</a></li>
                        </ul>
                    </div>
                    <div class="desc">
                    <a href="" class="button action disabled">Clear Front Page</a>
                    <a href="" class="button action disabled">Clear All Pages</a>
                    <a href="" class="button action disabled">Clear CSS/JS</a>
                    </div>
                    <?php } ?>
                </div>
            </div>
            <!-- Help -->
            <div class="gmw-extension-wrapper top-list installed core free active" style="width:100%" id="helpSp">
                <div class="extension-top">
                    <div class="name">
                        <h3><?php echo $supportPlan;?> Support Plan<div class="renew-msg"><?php foreach ($supportLeft as $key => $val) {echo $val . ' ' . $key . ' ';} echo'left to expire';?></div><img src="https://icon-library.com/images/it-help-icon/it-help-icon-9.jpg" /></h3>
                        <p class="version">Need any help? We are available!</p>
                    </div>

                    <div class="action-links">
                        <ul class="action-buttons">
                        <?php if($supportPlan == "Premium"){echo'<li class="activation-button"><a href="tel:918409258741" class="button button-primary gmw-extension-action-button disabled">PREMIUM ACTIVE</a></li>';}else{ echo'<li class="activation-button"><a href="tel:918409258741" class="button button-primary gmw-extension-action-button">UPGRADE</a></li>';}?>
                        </ul>
                    </div>
                    <div class="desc">
                    <a href="#docs" class="button action"><i class="gmw-icon-doc-text"></i>Docs</a>
                    <a href="#videoTut" class="button action"><i class="gmw-icon-monitor"></i>Video Tutorials</a>
                    <a href="javascript:void(Tawk_API.toggle())" class="button button-primary gmw-extension-action-button action" style="background: #03a84e;border: 1px solid #03a84e;"><i class="gmw-icon-star"></i>Instant Live Chat</a>
                    <a href="https://api.whatsapp.com/send?phone=_NUMBER_&text=Hey%20there!%20I%20need%20a%20help%20%20%20%3A)" class="button button-primary gmw-extension-action-button action"><i class="gmw-icon-phone-circled"></i>WhatsApp</a>
                    <a href="tel:_NUMBER_" class="button action"><i class="gmw-icon-phone"></i>Call</a>
                    <a href="mailto:support@admin.com" class="button action"><i class="gmw-icon-mail"></i>Ticket</a>
                    <p>WhatsApp : 24x7 <?php if($supportPlan == "Premium"){echo'<b>||</b> Call: '.$call.'';}else{ echo'<b>||</b> Call: '.$call.' <b>||</b> Available Upgrades: <b>Premium</b> Support Plan';}?></p>
                    </div>
                </div>
            </div>
            <!-- AMC -->
            <div class="gmw-extension-wrapper top-list installed core free active" style="width:100%" id="helpSp">
                <div class="extension-top">
                    <div class="name">
                        <h3>AMC : <?php echo $AMC;?> Plan<img src="https://www.farmaxindia.com/images/comprehensive-annual-maintenance-contract-1.jpg" /></h3>
                        <p class="version">Annual Maintenance Plans!</p>
                    </div>

                    <div class="action-links">
                        <ul class="action-buttons">
                            <li class="activation-button"><a href="tel:918409258741" class="button button-primary gmw-extension-action-button">SUBSCRIBE</a></li>
                        </ul>
                    </div>
                    <div class="desc">
                    <p>Subscribe to Annual Maintenance Plans. Get your website/store designed and all type of content works.</p>
                    </div>
                </div>
            </div>
            <!-- Packages -->
            <div class="extensions-wrapper" style="margin-top:40px;">
                <div class="extensions-title core" style="margin-top:40px;"><h3>UPGRADES</h3></div>
                <!-- Blank -->
                <div class="gmw-extension-wrapper not-installed premium has-license inactive" style="display: none;border: none;padding: 0px;margin: 0px;height: 0px;box-shadow: none;">
                    <div class="extension-top">
                    </div>
                </div>
                <!-- AMC -->
                <div class="gmw-extension-wrapper not-installed premium has-license inactive">
                    <div class="extension-top">
                        <div class="name">
                            <h3>AMC - Maintenance Plans<img src="https://www.farmaxindia.com/images/comprehensive-annual-maintenance-contract-1.jpg" /></h3>
                        </div>
                        <div class="action-links">
                            <ul class="action-buttons">
                                <li class="activation-button">
                                    <?php
                                    if ( in_array( $maintenanc , $pluginList ) ) {
                                    ?>
                                    <div class="not-installed"><a href="tel:+918409258741" class="button-secondary button get-extension disabled" target="_blank">Active</a></div>
                                    <?php } else { ?>
                                    <div class="not-installed"><a href="tel:+918409258741" class="button-secondary button get-extension" target="_blank">Purchase</a></div>
                                    <?php } ?>
                                </li>
                            </ul>
                        </div>
                        <div class="desc"><p>Pay monthly/quaterly/yearly for content management and different work. Pricing depends on work!</p></div>
                    </div>
                </div>
                <!-- SEO -->
                <div class="gmw-extension-wrapper not-installed premium has-license inactive">
                    <div class="extension-top">
                        <div class="name">
                            <h3>SEO - Search Engline Optimization<img src="data:image/png;base64,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" /></h3>
                        </div>
                        <div class="action-links">
                            <ul class="action-buttons">
                                <li class="activation-button">
                                    <?php
                                    if ( in_array( $seo , $pluginList ) ) {
                                    ?>
                                    <div class="not-installed"><a href="tel:+918409258741" class="button-secondary button get-extension disabled" target="_blank">Active</a></div>
                                    <?php } else { ?>
                                    <div class="not-installed"><a href="tel:+918409258741" class="button-secondary button get-extension" target="_blank">Purchase</a></div>
                                    <?php } ?>
                                </li>
                            </ul>
                        </div>
                        <div class="desc"><p>Get SEO done by Professionals. Affordable Pricing. Minimum SEO Package Time 6Months</p></div>
                    </div>
                </div>
                <!-- DIGITAL MARKETING -->
                <div class="gmw-extension-wrapper not-installed premium has-license inactive">
                    <div class="extension-top">
                        <div class="name">
                            <h3>Digital Marketing<img src="https://shahbajaj.com/wp-content/uploads/2020/10/digital-marketing.png" /></h3>
                        </div>
                        <div class="action-links">
                            <ul class="action-buttons">
                                <li class="activation-button">
                                    <?php
                                    if ( in_array( $digitalMarketing , $pluginList ) ) {
                                    ?>
                                    <div class="not-installed"><a href="tel:+918409258741" class="button-secondary button get-extension disabled" target="_blank">Active</a></div>
                                    <?php } else { ?>
                                    <div class="not-installed"><a href="tel:+918409258741" class="button-secondary button get-extension" target="_blank">Purchase</a></div>
                                    <?php } ?>
                                </li>
                            </ul>
                        </div>
                        <div class="desc"><p>Grow your business easily online! Get everything done by our Professionals. Affordable Pricing and efffective solutions</p></div>
                    </div>
                </div>
                <!-- SECURITY -->
                <div class="gmw-extension-wrapper not-installed premium has-license inactive">
                    <div class="extension-top">
                        <div class="name">
                            <h3>Security<img src="https://prophaze.com/wp-content/uploads/2021/03/cyber-security.png" /></h3>
                        </div>
                        <div class="action-links">
                            <ul class="action-buttons">
                                <li class="activation-button">
                                    <?php
                                    if ( in_array( $security , $pluginList ) ) {
                                    ?>
                                    <div class="not-installed"><a href="tel:+918409258741" class="button-secondary button get-extension disabled" target="_blank">Active</a></div>
                                    <?php } else { ?>
                                    <div class="not-installed"><a href="tel:+918409258741" class="button-secondary button get-extension" target="_blank">Purchase</a></div>
                                    <?php } ?>
                                </li>
                            </ul>
                        </div>
                        <div class="desc"><p>Though we have added Firewall & Security in Server for free. Still if you want you can get Security Audits from our Professionals !</p></div>
                    </div>
                </div>
            
            </div>
            <div id="upgradesKG"></div>
            <!-- Extensions -->
            <div class="extensions-wrapper" style="margin-top:40px;">
                <div class="extensions-title core" style="margin-top:40px;"><h3>EXTENSIONS UPGRADES</h3></div>
                <!-- Blank -->
                <div class="gmw-extension-wrapper not-installed premium has-license inactive" style="display: none;border: none;padding: 0px;margin: 0px;height: 0px;box-shadow: none;">
                    <div class="extension-top">
                    </div>
                </div>
                <!-- Cache -->
                <div class="gmw-extension-wrapper not-installed premium has-license inactive">
                    <div class="extension-top">
                        <div class="name">
                            <h3>System Cache<img src="https://geomywp.com/wp-content/uploads/extensions-images/gmw_ajax_forms.png" /></h3>
                        </div>
                        <div class="action-links">
                            <ul class="action-buttons">
                                <li class="activation-button">
                                    <?php
                                    if ( in_array( $cache , $pluginList ) ) {
                                    ?>
                                    <div class="not-installed"><a href="tel:+918409258741" class="button-secondary button get-extension disabled" target="_blank">Active</a></div>
                                    <?php } else { ?>
                                    <div class="not-installed"><a href="tel:+918409258741" class="button-secondary button get-extension" target="_blank">Upgrade</a></div>
                                    <?php } ?>
                                </li>
                            </ul>
                        </div>
                        <div class="desc"><p>Cache website & application for more speed and performance!</p></div>
                    </div>
                </div>
                <!-- Vendor -->
                <div class="gmw-extension-wrapper not-installed premium has-license inactive">
                    <div class="extension-top">
                        <div class="name">
                            <h3>Multivendor Module<img src="https://geomywp.com/wp-content/uploads/extensions-images/gmw_ajax_forms.png" /></h3>
                        </div>
                        <div class="action-links">
                            <ul class="action-buttons">
                                <li class="activation-button">
                                    <?php
                                    if ( in_array( $vendor , $pluginList ) ) {
                                    ?>
                                    <div class="not-installed"><a href="tel:+918409258741" class="button-secondary button get-extension disabled" target="_blank">Active</a></div>
                                    <?php } else { ?>
                                    <div class="not-installed"><a href="tel:+918409258741" class="button-secondary button get-extension" target="_blank">Upgrade</a></div>
                                    <?php } ?>
                                </li>
                            </ul>
                        </div>
                        <div class="desc"><p>Adds Multivendor Functionality into the application. Multiple users can sell their product giving you commisiion.</p></div>
                    </div>
                </div>
                <!-- Payment Integration -->
                <div class="gmw-extension-wrapper not-installed premium has-license inactive">
                    <div class="extension-top">
                        <div class="name">
                            <h3>Payment Gateway<img src="https://geomywp.com/wp-content/uploads/extensions-images/gmw_ajax_forms.png" /></h3>
                        </div>
                        <div class="action-links">
                            <ul class="action-buttons">
                                <li class="activation-button">
                                    <?php
                                    if ( in_array( $payment , $pluginList ) ) {
                                    ?>
                                    <div class="not-installed"><a href="tel:+918409258741" class="button-secondary button get-extension disabled" target="_blank">Active</a></div>
                                    <?php } else { ?>
                                    <div class="not-installed"><a href="tel:+918409258741" class="button-secondary button get-extension" target="_blank">Upgrade</a></div>
                                    <?php } ?>
                                </li>
                            </ul>
                        </div>
                        <div class="desc"><p>Accepts payments seamessly via Debit/Credit card, UPI, EMI etc</p></div>
                    </div>
                </div>
                <!-- Courier Partners -->
                <div class="gmw-extension-wrapper not-installed premium has-license inactive">
                    <div class="extension-top">
                        <div class="name">
                            <h3>Courier Partners<img src="https://geomywp.com/wp-content/uploads/extensions-images/gmw_ajax_forms.png" /></h3>
                        </div>
                        <div class="action-links">
                            <ul class="action-buttons">
                                <li class="activation-button">
                                    <?php
                                    if ( in_array( $courier , $pluginList ) ) {
                                    ?>
                                    <div class="not-installed"><a href="tel:+918409258741" class="button-secondary button get-extension disabled" target="_blank">Active</a></div>
                                    <?php } else { ?>
                                    <div class="not-installed"><a href="tel:+918409258741" class="button-secondary button get-extension" target="_blank">Upgrade</a></div>
                                    <?php } ?>
                                </li>
                            </ul>
                        </div>
                        <div class="desc"><p>Add tracking details to your orders for any courier company!</p></div>
                    </div>
                </div>
                <!-- Advance Delivery Settings -->
                <div class="gmw-extension-wrapper not-installed premium has-license inactive">
                    <div class="extension-top">
                        <div class="name">
                            <h3>Advance Delivery Settings<img src="https://geomywp.com/wp-content/uploads/extensions-images/gmw_ajax_forms.png" /></h3>
                        </div>
                        <div class="action-links">
                            <ul class="action-buttons">
                                <li class="activation-button">
                                    <?php
                                    if ( in_array( $advDelivery , $pluginList ) ) {
                                    ?>
                                    <div class="not-installed"><a href="tel:+918409258741" class="button-secondary button get-extension disabled" target="_blank">Active</a></div>
                                    <?php } else { ?>
                                    <div class="not-installed"><a href="tel:+918409258741" class="button-secondary button get-extension" target="_blank">Upgrade</a></div>
                                    <?php } ?>
                                </li>
                            </ul>
                        </div>
                        <div class="desc"><p>Manage delivery settings like free delivery on min order, and other various features!</p></div>
                    </div>
                </div>
                <!-- Delivery Slots -->
                <div class="gmw-extension-wrapper not-installed premium has-license inactive">
                    <div class="extension-top">
                        <div class="name">
                            <h3>Delivery Slots<img src="https://geomywp.com/wp-content/uploads/extensions-images/gmw_ajax_forms.png" /></h3>
                        </div>
                        <div class="action-links">
                            <ul class="action-buttons">
                                <li class="activation-button">
                                    <?php
                                    if ( in_array( $deliverySlots , $pluginList ) ) {
                                    ?>
                                    <div class="not-installed"><a href="tel:+918409258741" class="button-secondary button get-extension disabled" target="_blank">Active</a></div>
                                    <?php } else { ?>
                                    <div class="not-installed"><a href="tel:+918409258741" class="button-secondary button get-extension" target="_blank">Upgrade</a></div>
                                    <?php } ?>
                                </li>
                            </ul>
                        </div>
                        <div class="desc"><p>Manage various delivery slots with your delivery days and timing. Customer can choose date and time at the time of checkout!</p></div>
                    </div>
                </div>
                <!-- Order Exports -->
                <div class="gmw-extension-wrapper not-installed premium has-license inactive">
                    <div class="extension-top">
                        <div class="name">
                            <h3>Order Export<img src="https://geomywp.com/wp-content/uploads/extensions-images/gmw_ajax_forms.png" /></h3>
                        </div>
                        <div class="action-links">
                            <ul class="action-buttons">
                                <li class="activation-button">
                                    <?php
                                    if ( in_array( $orderExport , $pluginList ) ) {
                                    ?>
                                    <div class="not-installed"><a href="tel:+918409258741" class="button-secondary button get-extension disabled" target="_blank">Active</a></div>
                                    <?php } else { ?>
                                    <div class="not-installed"><a href="tel:+918409258741" class="button-secondary button get-extension" target="_blank">Upgrade</a></div>
                                    <?php } ?>
                                </li>
                            </ul>
                        </div>
                        <div class="desc"><p>Advance Order Export functionality which gives you power to export order with various settings!</p></div>
                    </div>
                </div>
                <!-- Cancel / Refund Module -->
                <div class="gmw-extension-wrapper not-installed premium has-license inactive">
                    <div class="extension-top">
                        <div class="name">
                            <h3>Cancel / Refund<img src="https://geomywp.com/wp-content/uploads/extensions-images/gmw_ajax_forms.png" /></h3>
                        </div>
                        <div class="action-links">
                            <ul class="action-buttons">
                                <li class="activation-button">
                                    <?php
                                    if ( in_array( $cancelRefund , $pluginList ) ) {
                                    ?>
                                    <div class="not-installed"><a href="tel:+918409258741" class="button-secondary button get-extension disabled" target="_blank">Active</a></div>
                                    <?php } else { ?>
                                    <div class="not-installed"><a href="tel:+918409258741" class="button-secondary button get-extension" target="_blank">Upgrade</a></div>
                                    <?php } ?>
                                </li>
                            </ul>
                        </div>
                        <div class="desc"><p>Add cancel and Refund functionality in your store!</p></div>
                    </div>
                </div>
                <!-- Checkout Page Editor -->
                <div class="gmw-extension-wrapper not-installed premium has-license inactive">
                    <div class="extension-top">
                        <div class="name">
                            <h3>Checkout Page Editor<img src="https://geomywp.com/wp-content/uploads/extensions-images/gmw_ajax_forms.png" /></h3>
                        </div>
                        <div class="action-links">
                            <ul class="action-buttons">
                                <li class="activation-button">
                                    <?php
                                    if ( in_array( $checkoutEditor , $pluginList ) ) {
                                    ?>
                                    <div class="not-installed"><a href="tel:+918409258741" class="button-secondary button get-extension disabled" target="_blank">Active</a></div>
                                    <?php } else { ?>
                                    <div class="not-installed"><a href="tel:+918409258741" class="button-secondary button get-extension" target="_blank">Upgrade</a></div>
                                    <?php } ?>
                                </li>
                            </ul>
                        </div>
                        <div class="desc"><p>Edit and add any custom form to the checkout page of your website & application!</p></div>
                    </div>
                </div>
                <!-- WhatsApp Integration -->
                <div class="gmw-extension-wrapper not-installed premium has-license inactive">
                    <div class="extension-top">
                        <div class="name">
                            <h3>WhatsApp Integration<img src="https://geomywp.com/wp-content/uploads/extensions-images/gmw_ajax_forms.png" /></h3>
                        </div>
                        <div class="action-links">
                            <ul class="action-buttons">
                                <li class="activation-button">
                                    <?php
                                    if ( in_array( $whatsapp , $pluginList ) ) {
                                    ?>
                                    <div class="not-installed"><a href="tel:+918409258741" class="button-secondary button get-extension disabled" target="_blank">Active</a></div>
                                    <?php } else { ?>
                                    <div class="not-installed"><a href="tel:+918409258741" class="button-secondary button get-extension" target="_blank">Upgrade</a></div>
                                    <?php } ?>
                                </li>
                            </ul>
                        </div>
                        <div class="desc"><p>Allow users to message you on WhatsApp!</p></div>
                    </div>
                </div>
                <!-- Live Chat Integration -->
                <div class="gmw-extension-wrapper not-installed premium has-license inactive">
                    <div class="extension-top">
                        <div class="name">
                            <h3>Live Chat<img src="https://geomywp.com/wp-content/uploads/extensions-images/gmw_ajax_forms.png" /></h3>
                        </div>
                        <div class="action-links">
                            <ul class="action-buttons">
                                <li class="activation-button">
                                    <?php
                                    if ( in_array( $livechat , $pluginList ) ) {
                                    ?>
                                    <div class="not-installed"><a href="tel:+918409258741" class="button-secondary button get-extension disabled" target="_blank">Active</a></div>
                                    <?php } else { ?>
                                    <div class="not-installed"><a href="tel:+918409258741" class="button-secondary button get-extension" target="_blank">Upgrade</a></div>
                                    <?php } ?>
                                </li>
                            </ul>
                        </div>
                        <div class="desc"><p>Allow users to chat with you via live chat in webite/application!</p></div>
                    </div>
                </div>
                <!-- Discount Settings -->
                <div class="gmw-extension-wrapper not-installed premium has-license inactive">
                    <div class="extension-top">
                        <div class="name">
                            <h3>Discount Settings<img src="https://geomywp.com/wp-content/uploads/extensions-images/gmw_ajax_forms.png" /></h3>
                        </div>
                        <div class="action-links">
                            <ul class="action-buttons">
                                <li class="activation-button">
                                    <?php
                                    if ( in_array( $discount , $pluginList ) ) {
                                    ?>
                                    <div class="not-installed"><a href="tel:+918409258741" class="button-secondary button get-extension disabled" target="_blank">Active</a></div>
                                    <?php } else { ?>
                                    <div class="not-installed"><a href="tel:+918409258741" class="button-secondary button get-extension" target="_blank">Upgrade</a></div>
                                    <?php } ?>
                                </li>
                            </ul>
                        </div>
                        <div class="desc"><p>Add various discount rules for your customers!</p></div>
                    </div>
                </div>
                <!-- Delivery Boys -->
                <div class="gmw-extension-wrapper not-installed premium has-license inactive">
                    <div class="extension-top">
                        <div class="name">
                            <h3>Delivery Boys<img src="https://geomywp.com/wp-content/uploads/extensions-images/gmw_ajax_forms.png" /></h3>
                        </div>
                        <div class="action-links">
                            <ul class="action-buttons">
                                <li class="activation-button">
                                    <?php
                                    if ( in_array( $deliveryBoys , $pluginList ) ) {
                                    ?>
                                    <div class="not-installed"><a href="tel:+918409258741" class="button-secondary button get-extension disabled" target="_blank">Active</a></div>
                                    <?php } else { ?>
                                    <div class="not-installed"><a href="tel:+918409258741" class="button-secondary button get-extension" target="_blank">Upgrade</a></div>
                                    <?php } ?>
                                </li>
                            </ul>
                        </div>
                        <div class="desc"><p>Add and manage your own delivery boys!</p></div>
                    </div>
                </div>
                <!-- Order Quantity Setup -->
                <div class="gmw-extension-wrapper not-installed premium has-license inactive">
                    <div class="extension-top">
                        <div class="name">
                            <h3>Order Quantity Setup<img src="https://geomywp.com/wp-content/uploads/extensions-images/gmw_ajax_forms.png" /></h3>
                        </div>
                        <div class="action-links">
                            <ul class="action-buttons">
                                <li class="activation-button">
                                    <?php
                                    if ( in_array( $orderqty , $pluginList ) ) {
                                    ?>
                                    <div class="not-installed"><a href="tel:+918409258741" class="button-secondary button get-extension disabled" target="_blank">Active</a></div>
                                    <?php } else { ?>
                                    <div class="not-installed"><a href="tel:+918409258741" class="button-secondary button get-extension" target="_blank">Upgrade</a></div>
                                    <?php } ?>
                                </li>
                            </ul>
                        </div>
                        <div class="desc"><p>Set minmum order quantity and step increase for Bulk and B2b store!</p></div>
                    </div>
                </div>
                <!-- Quick Feature Image -->
                <div class="gmw-extension-wrapper not-installed premium has-license inactive">
                    <div class="extension-top">
                        <div class="name">
                            <h3>Featured Images<img src="https://geomywp.com/wp-content/uploads/extensions-images/gmw_ajax_forms.png" /></h3>
                        </div>
                        <div class="action-links">
                            <ul class="action-buttons">
                                <li class="activation-button">
                                    <?php
                                    if ( in_array( $featureImage , $pluginList ) ) {
                                    ?>
                                    <div class="not-installed"><a href="tel:+918409258741" class="button-secondary button get-extension disabled" target="_blank">Active</a></div>
                                    <?php } else { ?>
                                    <div class="not-installed"><a href="tel:+918409258741" class="button-secondary button get-extension" target="_blank">Upgrade</a></div>
                                    <?php } ?>
                                </li>
                            </ul>
                        </div>
                        <div class="desc"><p>Quickly Change Featured Images of your products!</p></div>
                    </div>
                </div>
                <!-- SSL -->
                <div class="gmw-extension-wrapper not-installed premium has-license inactive">
                    <div class="extension-top">
                        <div class="name">
                            <h3>SSL<img src="https://geomywp.com/wp-content/uploads/extensions-images/gmw_ajax_forms.png" /></h3>
                        </div>
                        <div class="action-links">
                            <ul class="action-buttons">
                                <li class="activation-button">
                                    <?php
                                    if ( in_array( $ssl , $pluginList ) ) {
                                    ?>
                                    <div class="not-installed"><a href="tel:+918409258741" class="button-secondary button get-extension disabled" target="_blank">Active</a></div>
                                    <?php } else { ?>
                                    <div class="not-installed"><a href="tel:+918409258741" class="button-secondary button get-extension" target="_blank">Upgrade</a></div>
                                    <?php } ?>
                                </li>
                            </ul>
                        </div>
                        <div class="desc"><p>Secure your website with SSL Certificate. Load websites on https://</p></div>
                    </div>
                </div>
                <!-- SMS Integration -->
                <div class="gmw-extension-wrapper not-installed premium has-license inactive">
                    <div class="extension-top">
                        <div class="name">
                            <h3>SMS Integration<img src="https://geomywp.com/wp-content/uploads/extensions-images/gmw_ajax_forms.png" /></h3>
                        </div>
                        <div class="action-links">
                            <ul class="action-buttons">
                                <li class="activation-button">
                                    <?php
                                    if ( in_array( $sms , $pluginList ) ) {
                                    ?>
                                    <div class="not-installed"><a href="tel:+918409258741" class="button-secondary button get-extension disabled" target="_blank">Active</a></div>
                                    <?php } else { ?>
                                    <div class="not-installed"><a href="tel:+918409258741" class="button-secondary button get-extension" target="_blank">Upgrade</a></div>
                                    <?php } ?>
                                </li>
                            </ul>
                        </div>
                        <div class="desc"><p>Send SMS Notification, Login OTP etc to your customers!</p></div>
                    </div>
                </div>
                <!-- Wallet Integration -->
                <div class="gmw-extension-wrapper not-installed premium has-license inactive">
                    <div class="extension-top">
                        <div class="name">
                            <h3>Wallet<img src="https://geomywp.com/wp-content/uploads/extensions-images/gmw_ajax_forms.png" /></h3>
                        </div>
                        <div class="action-links">
                            <ul class="action-buttons">
                                <li class="activation-button">
                                    <?php
                                    if ( in_array( $wallet , $pluginList ) ) {
                                    ?>
                                    <div class="not-installed"><a href="tel:+918409258741" class="button-secondary button get-extension disabled" target="_blank">Active</a></div>
                                    <?php } else { ?>
                                    <div class="not-installed"><a href="tel:+918409258741" class="button-secondary button get-extension" target="_blank">Upgrade</a></div>
                                    <?php } ?>
                                </li>
                            </ul>
                        </div>
                        <div class="desc"><p>Add Wallet Functionality!</p></div>
                    </div>
                </div>
                <!-- Invoices -->
                <div class="gmw-extension-wrapper not-installed premium has-license inactive">
                    <div class="extension-top">
                        <div class="name">
                            <h3>Invoice Integration<img src="https://geomywp.com/wp-content/uploads/extensions-images/gmw_ajax_forms.png" /></h3>
                        </div>
                        <div class="action-links">
                            <ul class="action-buttons">
                                <li class="activation-button">
                                    <?php
                                    if ( in_array( $invoice , $pluginList ) ) {
                                    ?>
                                    <div class="not-installed"><a href="tel:+918409258741" class="button-secondary button get-extension disabled" target="_blank">Active</a></div>
                                    <?php } else { ?>
                                    <div class="not-installed"><a href="tel:+918409258741" class="button-secondary button get-extension" target="_blank">Upgrade</a></div>
                                    <?php } ?>
                                </li>
                            </ul>
                        </div>
                        <div class="desc"><p>Create & Send order Invoice to the customers!</p></div>
                    </div>
                </div>
                <!-- Wholesale Discounts -->
                <div class="gmw-extension-wrapper not-installed premium has-license inactive">
                    <div class="extension-top">
                        <div class="name">
                            <h3>Wholesale Discount<img src="https://geomywp.com/wp-content/uploads/extensions-images/gmw_ajax_forms.png" /></h3>
                        </div>
                        <div class="action-links">
                            <ul class="action-buttons">
                                <li class="activation-button">
                                    <?php
                                    if ( in_array( $wholesaleDiscount , $pluginList ) ) {
                                    ?>
                                    <div class="not-installed"><a href="tel:+918409258741" class="button-secondary button get-extension disabled" target="_blank">Active</a></div>
                                    <?php } else { ?>
                                    <div class="not-installed"><a href="tel:+918409258741" class="button-secondary button get-extension" target="_blank">Upgrade</a></div>
                                    <?php } ?>
                                </li>
                            </ul>
                        </div>
                        <div class="desc"><p>Wholesale discount settings in B2B!</p></div>
                    </div>
                </div>
                <!-- Coupon Referral Integration -->
                <div class="gmw-extension-wrapper not-installed premium has-license inactive">
                    <div class="extension-top">
                        <div class="name">
                            <h3>Coupon Referral<img src="https://geomywp.com/wp-content/uploads/extensions-images/gmw_ajax_forms.png" /></h3>
                        </div>
                        <div class="action-links">
                            <ul class="action-buttons">
                                <li class="activation-button">
                                    <?php
                                    if ( in_array( $couponReferral , $pluginList ) ) {
                                    ?>
                                    <div class="not-installed"><a href="tel:+918409258741" class="button-secondary button get-extension disabled" target="_blank">Active</a></div>
                                    <?php } else { ?>
                                    <div class="not-installed"><a href="tel:+918409258741" class="button-secondary button get-extension" target="_blank">Upgrade</a></div>
                                    <?php } ?>
                                </li>
                            </ul>
                        </div>
                        <div class="desc"><p>Provide Coupons to the customer on referrals!</p></div>
                    </div>
                </div>
                <!-- Membership Integration -->
                <div class="gmw-extension-wrapper not-installed premium has-license inactive">
                    <div class="extension-top">
                        <div class="name">
                            <h3>Membership<img src="https://geomywp.com/wp-content/uploads/extensions-images/gmw_ajax_forms.png" /></h3>
                        </div>
                        <div class="action-links">
                            <ul class="action-buttons">
                                <li class="activation-button">
                                    <?php
                                    if ( in_array( $membership , $pluginList ) ) {
                                    ?>
                                    <div class="not-installed"><a href="tel:+918409258741" class="button-secondary button get-extension disabled" target="_blank">Active</a></div>
                                    <?php } else { ?>
                                    <div class="not-installed"><a href="tel:+918409258741" class="button-secondary button get-extension" target="_blank">Upgrade</a></div>
                                    <?php } ?>
                                </li>
                            </ul>
                        </div>
                        <div class="desc"><p>Create & Manage Membership in your store!</p></div>
                    </div>
                </div>
                <!-- Woocommerce Integration -->
                <div class="gmw-extension-wrapper not-installed premium has-license inactive">
                    <div class="extension-top">
                        <div class="name">
                            <h3>Store Module<img src="https://geomywp.com/wp-content/uploads/extensions-images/gmw_ajax_forms.png" /></h3>
                        </div>
                        <div class="action-links">
                            <ul class="action-buttons">
                                <li class="activation-button">
                                    <?php
                                    if ( in_array( $Store , $pluginList ) ) {
                                    ?>
                                    <div class="not-installed"><a href="tel:+918409258741" class="button-secondary button get-extension disabled" target="_blank">Active</a></div>
                                    <?php } else { ?>
                                    <div class="not-installed"><a href="tel:+918409258741" class="button-secondary button get-extension" target="_blank">Upgrade</a></div>
                                    <?php } ?>
                                </li>
                            </ul>
                        </div>
                        <div class="desc"><p>List and Sell Products on your website & app!</p></div>
                    </div>
                </div>
                <!-- WP Bakery Integration -->
                <div class="gmw-extension-wrapper not-installed premium has-license inactive">
                    <div class="extension-top">
                        <div class="name">
                            <h3>Page Builder<img src="https://geomywp.com/wp-content/uploads/extensions-images/gmw_ajax_forms.png" /></h3>
                        </div>
                        <div class="action-links">
                            <ul class="action-buttons">
                                <li class="activation-button">
                                    <?php
                                    if ( in_array( $pageBuilder , $pluginList ) ) {
                                    ?>
                                    <div class="not-installed"><a href="tel:+918409258741" class="button-secondary button get-extension disabled" target="_blank">Active</a></div>
                                    <?php } else { ?>
                                    <div class="not-installed"><a href="tel:+918409258741" class="button-secondary button get-extension" target="_blank">Upgrade</a></div>
                                    <?php } ?>
                                </li>
                            </ul>
                        </div>
                        <div class="desc"><p>Easily edit and manage pages, design and layout of your website and application!</p></div>
                    </div>
                </div>
                <!-- Checkout Location Integration -->
                <div class="gmw-extension-wrapper not-installed premium has-license inactive">
                    <div class="extension-top">
                        <div class="name">
                            <h3>Checkout Locations<img src="https://geomywp.com/wp-content/uploads/extensions-images/gmw_ajax_forms.png" /></h3>
                        </div>
                        <div class="action-links">
                            <ul class="action-buttons">
                                <li class="activation-button">
                                    <?php
                                    if ( in_array( $pluginCheckout , $pluginList ) ) {
                                    ?>
                                    <div class="not-installed"><a href="tel:+918409258741" class="button-secondary button get-extension disabled" target="_blank">Active</a></div>
                                    <?php } else { ?>
                                    <div class="not-installed"><a href="tel:+918409258741" class="button-secondary button get-extension" target="_blank">Upgrade</a></div>
                                    <?php } ?>
                                </li>
                            </ul>
                        </div>
                        <div class="desc"><p>Show Map at the Checkout and get exact location of your order!</p></div>
                    </div>
                </div>
                <!-- Live Location Tracking -->
                <div class="gmw-extension-wrapper not-installed premium has-license inactive">
                    <div class="extension-top">
                        <div class="name">
                            <h3>Live Location Tracking<img src="https://geomywp.com/wp-content/uploads/extensions-images/gmw_ajax_forms.png" /></h3>
                        </div>
                        <div class="action-links">
                            <ul class="action-buttons">
                                <li class="activation-button">
                                    <?php
                                    if ( in_array( $locationTracking , $pluginList ) ) {
                                    ?>
                                    <div class="not-installed"><a href="tel:+918409258741" class="button-secondary button get-extension disabled" target="_blank">Active</a></div>
                                    <?php } else { ?>
                                    <div class="not-installed"><a href="tel:+918409258741" class="button-secondary button get-extension" target="_blank">Coming Soon</a></div>
                                    <?php } ?>
                                </li>
                            </ul>
                        </div>
                        <div class="desc"><p>Add Location Tracking to the delivery Module!</p></div>
                    </div>
                </div>
            
            </div>
            <div id="extensionsKG"></div>
            <!-- Videos tutorials -->
            <div class="extensions-wrapper" style="margin-top:40px;">
                <div class="extensions-title core" style="margin-top:40px;"><h3>VIDEO TUTORIALS</h3></div>
                <!-- Blank -->
                <div class="gmw-extension-wrapper not-installed premium has-license inactive" style="display: none;border: none;padding: 0px;margin: 0px;height: 0px;box-shadow: none;">
                    <div class="extension-top">
                    </div>
                </div>
                <!-- Add New Product -->
                <div class="gmw-extension-wrapper not-installed premium has-license inactive">
                    <div class="extension-top">
                        <div class="name" style="margin-left:5px;">
                            <h3>
                                Add a New Product
                            </h3>
                            <p class="version">
                                Dashboard >> Products >> Add New Product
                            </p>
                        </div>
                        <iframe src="https://www.youtube-nocookie.com/embed/sFtXa00Jf_o?controls=0&modestbranding=1&autohide=1&showinfo=0" title="" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                </div>
                <!-- Add Variable Product -->
                <div class="gmw-extension-wrapper not-installed premium has-license inactive">
                    <div class="extension-top">
                        <div class="name" style="margin-left:5px;">
                            <h3>
                                Add a Variable Product(Size,Color)
                            </h3>
                            <p class="version">
                                Dashboard >> Products >> Add New Product >> Meta Dropdown(Variable Product)
                            </p>
                        </div>
                        <video controls>
                        <source src="https://site.com/videos/ProductVariation.mp4" type="video/mp4">
                        Your browser does not support the video tag.
                        </video>
                    <!-- <iframe src="https://www.youtube-nocookie.com/embed/TaEbDsXuAc8?controls=0&modestbranding=1&autohide=1&showinfo=0" title="" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> -->
                    </div>
                </div>
                <!-- Creating Coupons -->
                <div class="gmw-extension-wrapper not-installed premium has-license inactive">
                    <div class="extension-top">
                        <div class="name" style="margin-left:5px;">
                            <h3>
                                Dashboard (MISC)
                            </h3>
                            <p class="version">
                                More videos will soon get published.
                            </p>
                        </div>
                        <video controls>
                        <source src="https://site.com/videos/Backend.mp4" type="video/mp4">
                        Your browser does not support the video tag.
                        </video>
                    </div>
                </div>
                <!-- Product Categories & Settings -->
                <div class="gmw-extension-wrapper not-installed premium has-license inactive">
                    <div class="extension-top">
                        <div class="name" style="margin-left:5px;">
                            <h3>
                                Products Categories
                            </h3>
                            <p class="version">
                                Dashboard >> Products >> Categories
                            </p>
                        </div>
                    <iframe src="https://www.youtube-nocookie.com/embed/PeFsOTrN1u8?controls=0&modestbranding=1&autohide=1&showinfo=0&start=23" title="" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                </div>
                
            </div>
            <div id="videoTut"></div>
            <!-- Docs tutorials -->
            <div class="extensions-wrapper" style="margin-top:40px;">
                <div class="extensions-title core" style="margin-top:40px;"><h3>DOCS</h3></div>
                <!-- Blank -->
                <div class="gmw-extension-wrapper not-installed premium has-license inactive" style="display: none;border: none;padding: 0px;margin: 0px;height: 0px;box-shadow: none;">
                    <div class="extension-top">
                    </div>
                </div>
                <!-- First Side -->
                <div class="gmw-extension-wrapper not-installed premium has-license inactive">
                    <div class="extension-top">
                        <div class="name" style="margin-left:5px;">
                            <h3>
                                Articles & Documentations
                            </h3>
                            <p class="version">
                                Answers coming for all your questions.
                            </p>
                        </div>
                    </div>
                </div>
                <!-- Second Side -->
                <div class="gmw-extension-wrapper not-installed premium has-license inactive">
                    <div class="extension-top">
                        <div class="name" style="margin-left:5px;">
                            <h3>
                                Articles & Documentations
                            </h3>
                            <p class="version">
                                Answers coming for all your questions.
                            </p>
                        </div>
                    </div>
                </div>
                
            </div>
            <div id="docs"></div>
            </div>
        </div>
        <?php
        echo'
        <script type="text/javascript">
            LIVE CHAT SCRIPT
        </script>
        ';
    } else {
        ?>  <br><br>
            <style>#wpadminbar, #adminmenuwrap{display:none!important;} #wpcontent{margin-left:0px;}</style>
            <div class="notice notice-info" style="display:block;border-left-color: red;">
                <p style="font-size:25px;">Hi, <?php echo bloginfo( 'name' ).'('.site_url().')';?> is not yet active or suspended or you are using a cracked version! <br>Kindly Contact our Admins to get everything fixed as soon as possible.</p>
                
                <a href="javascript:void(Tawk_API.toggle())" class="button button-primary gmw-extension-action-button action"style="background: #03a84e;border: 1px solid #03a84e;"><i class="gmw-icon-star"></i>Instant Live Chat</a>
                <a href="https://api.whatsapp.com/send?phone=_NUMBER_&text=Hey%20there!%20I%20need%20a%20help%20%20%20%3A)" class="button action"><i class="gmw-icon-phone-circled"></i>WhatsApp</a>
                <a href="tel:_NUMBER_" class="button action"><i class="gmw-icon-phone"></i>Call</a>
                <a href="mailto:support@admin.com" class="button action"><i class="gmw-icon-mail"></i>Ticket</a>
            </div>
        <?php
        echo'
        <script type="text/javascript">
            LIVE CHAT SCRIPT
        </script>
        ';
    }
}
    