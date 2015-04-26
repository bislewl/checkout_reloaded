<?php
/**
 * Page Template
 *
 * Loaded automatically by index.php?main_page=checkout_success.<br />
 * Displays confirmation details after order has been successfully processed.
 *
 * @package templateSystem
 * @copyright Copyright 2003-2013 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: tpl_checkout_success_default.php 16435 2010-05-28 09:34:32Z drbyte $
 * @version $Id: Integrated COWOA v2.2 - 2007 - 2012
 */
?>
<div class="centerColumn" id="checkoutSuccess">
<!--bof -gift certificate- send or spend box-->
<?php
// only show when there is a GV balance
  if ($customer_has_gv_balance ) {
?>
<div id="sendSpendWrapper">
<?php require($template->get_template_dir('tpl_modules_send_or_spend.php',DIR_WS_TEMPLATE, $current_page_base,'templates'). '/tpl_modules_send_or_spend.php'); ?>
</div>
<?php
  }
?>
<!--eof -gift certificate- send or spend box-->

<h1 id="checkoutSuccessHeading"><?php echo HEADING_TITLE; ?></h1>
<div id="checkoutSuccessOrderNumber"><?php echo TEXT_YOUR_ORDER_NUMBER . $zv_orders_id; ?></div>
<!-- bof Order Steps (tableless) -->
<?php if($_SESSION['COWOA']) $COWOA=TRUE; ?>
<?php if($COWOA) {?>
  <div id="order_steps">
    <div class="order_steps_text">
      <span class="order_steps_text1_COWOA"><?php echo TEXT_ORDER_STEPS_BILLING; ?></span><span class="order_steps_text2_COWOA"><?php echo TEXT_ORDER_STEPS_1; ?></span><span class="order_steps_text3_COWOA"><?php echo TEXT_ORDER_STEPS_2; ?></span><span class="order_steps_text4_COWOA"><?php echo TEXT_ORDER_STEPS_3; ?></span><span id="active_step_text_COWOA"><?php echo ORDER_STEPS_IMAGE; ?><br /><?php echo TEXT_ORDER_STEPS_4; ?></span>
    </div>
     <div class="order_steps_line_2">
       <span class="progressbar_active_COWOA">&nbsp;</span><span class="progressbar_active_COWOA">&nbsp;</span><span class="progressbar_active_COWOA">&nbsp;</span><span class="progressbar_active_COWOA">&nbsp;</span><span class="progressbar_active_COWOA">&nbsp;</span>
    </div>
  </div>
<?php } else {?>
  <div id="order_steps">
    <div class="order_steps_text">
      <span class="order_steps_text2"><?php echo TEXT_ORDER_STEPS_1; ?></span><span class="order_steps_text3"><?php echo TEXT_ORDER_STEPS_2; ?></span><span class="order_steps_text4"><?php echo TEXT_ORDER_STEPS_3; ?></span><span id="active_step_text"><?php echo ORDER_STEPS_IMAGE; ?><br /><?php echo TEXT_ORDER_STEPS_4; ?></span>
    </div>
   <div class="order_steps_line_2">
      <span class="progressbar_active">&nbsp;</span><span class="progressbar_active">&nbsp;</span><span class="progressbar_active">&nbsp;</span><span class="progressbar_active">&nbsp;</span>
    </div>
  </div>
<?php } ?>
<!-- eof Order Steps (tableless) -->
<?php if (DEFINE_CHECKOUT_SUCCESS_STATUS >= 1 and DEFINE_CHECKOUT_SUCCESS_STATUS <= 2) { ?>
<div id="checkoutSuccessMainContent" class="content">
<?php
/**
 * require the html_defined text for checkout success
 */
  require($define_page);
?>
</div>
<?php } ?>
<!-- bof payment-method-alerts -->
<?php
if (isset($additional_payment_messages) && $additional_payment_messages != '') {
?>
  <div class="content">
  <?php echo $additional_payment_messages; ?>
  </div>
<?php
}
?>
<!-- eof payment-method-alerts -->
<!--bof logoff-->
<!--Kill session if COWOA customer at checkout success-->
<div id="checkoutSuccessLogoff">
<?php
if ($_SESSION['COWOA'] and COWOA_FORCE_LOGOFF == 'true') {
  zen_session_destroy();
} else {
  if (isset($_SESSION['customer_guest_id'])) {
    echo TEXT_CHECKOUT_LOGOFF_GUEST;
  } elseif (isset($_SESSION['customer_id'])) {
    echo TEXT_CHECKOUT_LOGOFF_CUSTOMER;
  }
?>
<div class="buttonRow forward"><a href="<?php echo zen_href_link(FILENAME_LOGOFF, '', 'SSL'); ?>"><?php echo zen_image_button(BUTTON_IMAGE_LOG_OFF , BUTTON_LOG_OFF_ALT); ?></a></div>
<?php } ?>
</div>
<!--eof logoff-->
<br class="clearBoth" />
<!--bof -product notifications box-->
<?php
/**
 * The following creates a list of checkboxes for the customer to select if they wish to be included in product-notification
 * announcements related to products they've just purchased.
 **/
    if ($flag_show_products_notification == true && !($_SESSION['COWOA'])) {
?>
<fieldset id="csNotifications">
<legend><?php echo TEXT_NOTIFY_PRODUCTS; ?></legend>
<?php echo zen_draw_form('order', zen_href_link(FILENAME_CHECKOUT_SUCCESS, 'action=update', 'SSL')); ?>

<?php foreach ($notificationsArray as $notifications) { ?>
<?php echo zen_draw_checkbox_field('notify[]', $notifications['products_id'], true, 'id="notify-' . $notifications['counter'] . '"') ;?>
<label class="checkboxLabel" for="<?php echo 'notify-' . $notifications['counter']; ?>"><?php echo $notifications['products_name']; ?></label>
<br />
<?php } ?>
<div class="buttonRow forward"><?php echo zen_image_submit(BUTTON_IMAGE_UPDATE, BUTTON_UPDATE_ALT); ?></div>
</form>
</fieldset>
<?php
    }
?>
<!--eof -product notifications box-->

<div id="gts-order" style="display:none;" translate="no">
    <?php
    $gts_discount_total_query = "select value
			from " . TABLE_ORDERS_TOTAL . "
			where orders_id = '" . $orders->fields['orders_id'] . "'
			AND class = 'ot_coupon'";

    $gts_discount_total = $db->Execute($gts_discount_total_query);

    if ($gts_discount_total->fields['value'] != 0) {
        $gts_discount_tax = number_format($gts_discount_total->fields['value'], 2, '.', ' ');
    } else {
        $gts_discount_tax = 0;
    }

    $gts_shipping_total_query = "select value
			from " . TABLE_ORDERS_TOTAL . "
			where orders_id = '" . $orders->fields['orders_id'] . "'
			AND class = 'ot_shipping'";

    $gts_shipping_total = $db->Execute($gts_shipping_total_query);
    
    $gts_tax_total_query = "select value
			from " . TABLE_ORDERS_TOTAL . "
			where orders_id = '" . $orders->fields['orders_id'] . "'
			AND class = 'ot_tax'";

    $gts_tax_total = $db->Execute($gts_tax_total_query);

    if ($gts_shipping_total->fields['value'] != 0) {
        $gts_shipping_tax = number_format($gts_shipping_total->fields['value'], 2, '.', ' ');
    } else {
        $gts_shipping_tax = 0;
    }

    if ($order->fields['order_tax'] != 0) {
        $gts_order_tax = number_format($order->fields['order_tax'], 2, '.', ' ');
    } else {
        $gts_order_tax = 0;
    }

    $leadtime = (int) get_cart_ship_lead_success($orders->fields['orders_id']) + 1;
    $gts_est_ship_date = date('Y-m-d', strtotime($order->fields['date_purchased'] . ' + ' . $leadtime . ' day'));
    $days_to_delv = (int) get_cart_ship_lead_success($orders->fields['orders_id']) + 4;
    $gts_est_del_date =  date('Y-m-d', strtotime($order->fields['date_purchased'] . ' + ' . $days_to_delv . ' day'));
    $gts_product_list = '';
    $gts_backorder_status = 'N'; // Defaults to N (not backordered)
    
    $gts_products_query = "SELECT *
                     FROM " . TABLE_ORDERS_PRODUCTS . "
                     WHERE orders_id = ".$orders->fields['orders_id']."
                     ORDER BY products_name";
  $gts_products = $db->Execute($gts_products_query);
  
    while (!$gts_products->EOF) {
        if (GTS_BACKORDER == 'true') { // If Backorder Check enabled
            $backorder_check_query = "SELECT products_quantity, products_date_available
				FROM " . TABLE_PRODUCTS . "
				WHERE products_id = '" . $gts_products->fields['products_id'] . "'";

            $backorder_check = $db->Execute($backorder_check_query);

            if (($backorder_check->fields['products_quantity'] < 0) || ($backorder_check->fields['products_date_available'] != NULL)) {
                $gts_backorder_status = 'Y'; // Change status to Y, this will remain on once any product changes it to Y per Google requirements. Y if 1 or more items on the order is known to be on backorder or preorder.
            }
        }

        $gts_product_list = $gts_product_list . '
		<span class="gts-item">
		<span class="gts-i-name">' . $gts_products->fields["products_name"] . '</span>
		<span class="gts-i-price">' . number_format($gts_products->fields["products_price"], 2, ".", " ") . '</span>
		<span class="gts-i-quantity">' . $gts_products->fields["products_quantity"] . '</span>
		<span class="gts-i-prodsearch-id">' . $gts_products->fields['products_id'] . '</span>
		<span class="gts-i-prodsearch-store-id">2215154</span>
		<span class="gts-i-prodsearch-country">US</span>
		<span class="gts-i-prodsearch-language">en</span>
		</span>
		';

        $gts_products->MoveNext();
    }
    ?>
    <!-- start order and merchant information -->
    <span id="gts-o-id"><?php echo $orders->fields['orders_id']; ?></span>
    <span id="gts-o-domain">www.marysminiatures.net</span>
    <span id="gts-o-email"><?php echo $orders->fields['customers_email_address']; ?></span>
<?php
$iso_country_code = $db->Execute("SELECT countries_iso_code_2 FROM countries WHERE countries_name = '" . $orders->fields['billing_country'] . "' LIMIT 1");

if ($iso_country_code->RecordCount() == 1) {
    // Show 2 digit ISO code
    echo '<span id="gts-o-country">' . $iso_country_code->fields['countries_iso_code_2'] . '</span>';
} else {
    // Else default to US
    echo '<span id="gts-o-country">' . "US" . '</span>';
}
?>
    <span id="gts-o-currency"><?php echo $orders->fields['currency']; ?></span>
    <span id="gts-o-total"><?php echo $order_summary['order_subtotal'];?></span>
    <span id="gts-o-discounts"><?php echo $gts_discount_tax; ?></span>
    <span id="gts-o-shipping-total"><?php echo $gts_shipping_tax; ?></span>
    <span id="gts-o-tax-total"><?php echo number_format($gts_tax_total->fields['value'], 2, '.', ' '); ?></span>
    <span id="gts-o-est-ship-date"><?php echo $gts_est_ship_date; ?></span>
    <span id="gts-o-est-delivery-date"><?php echo $gts_est_del_date; ?></span>
    <span id="gts-o-has-preorder">N</span>
    <span id="gts-o-has-digital">N</span>
    <!-- end order and merchant information -->
    
        
    <!-- start repeated item specific information -->
<?php echo $gts_product_list; ?>
    <!-- end repeated item specific information -->
</div>
<div id="GTS_CONTAINER"></div>
<!-- END: Trusted Stores -->

<!--bof -product downloads module-->
<?php
  if (DOWNLOAD_ENABLED == 'true' and !($_SESSION['COWOA'])) require($template->get_template_dir('tpl_modules_downloads.php',DIR_WS_TEMPLATE, $current_page_base,'templates'). '/tpl_modules_downloads.php');
?>
<!--eof -product downloads module-->

<?php if(!($_SESSION['COWOA'])) { ?> <div id="checkoutSuccessOrderLink"><?php echo TEXT_SEE_ORDERS;?></div> <?php } ?>

<div id="checkoutSuccessContactLink"><?php echo TEXT_CONTACT_STORE_OWNER;?></div>

<h3 id="checkoutSuccessThanks" class="centeredContent"><?php echo TEXT_THANKS_FOR_SHOPPING; ?></h3>
</div>
<!---all conversion tracking-->
<!--bof Pinterest conversion-->
<img height="1" width="1" alt="" src="https://ct.pinterest.com/?tid=UbKZontuZQk"/>
<!--eof Pinterest conversion-->
<!--Facebook Conversions-->
<script type="text/javascript">
    var fb_param = {};
    fb_param.pixel_id = '6008552393420';
    fb_param.value = '<?php echo $order_summary['order_subtotal']; ?>';
    fb_param.currency = 'USD';
    (function () {
        var fpw = document.createElement('script');
        fpw.async = true;
        fpw.src = '//connect.facebook.net/en_US/fp.js';
        var ref = document.getElementsByTagName('script')[0];
        ref.parentNode.insertBefore(fpw, ref);
    })();
</script>
<noscript><img height="1" width="1" alt="" style="display:none" src="https://www.facebook.com/offsite_event.php?id=6008552393420&amp;value=0&amp;currency=USD" /></noscript>
<!-- Google mprough@gm Code for Purchase Conversion Page -->
<script type="text/javascript">
/* <![CDATA[ */
var google_conversion_id = 995747980;
var google_conversion_language = "en";
var google_conversion_format = "3";
var google_conversion_color = "ffffff";
var google_conversion_label = "w8AiCNTytgkQjNHn2gM";
var google_conversion_value = "<?php echo $order_summary['order_subtotal']; ?>";
var google_conversion_currency = "USD";
var google_remarketing_only = false;
/* ]]> */
</script>
<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
</script>
<noscript>
<div style="display:inline;">
<img height="1" width="1" style="border-style:none;" alt="" src="//www.googleadservices.com/pagead/conversion/995747980/?value=1.00&amp;currency_code=USD&amp;label=w8AiCNTytgkQjNHn2gM&amp;guid=ON&amp;script=0"/>
</div>
</noscript>
<!-- Google jack@pro Code for Purchase Conversion Page -->
<script type="text/javascript">
/* <![CDATA[ */
var google_conversion_id = 988227327;
var google_conversion_language = "en";
var google_conversion_format = "2";
var google_conversion_color = "ffffff";
var google_conversion_label = "fCUwCJmApwYQ_82c1wM";
var google_conversion_value = "<?php echo $order_summary['order_subtotal']; ?>";
var google_conversion_currency = "USD";
var google_remarketing_only = false;
/* ]]> */
</script>
<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
</script>
<noscript>
<div style="display:inline;">
<img height="1" width="1" style="border-style:none;" alt="" src="//www.googleadservices.com/pagead/conversion/988227327/?value=1.00&amp;currency_code=USD&amp;label=fCUwCJmApwYQ_82c1wM&amp;guid=ON&amp;script=0"/>
</div>
</noscript>