<?php
/* 
 * 
 * @package checkout_reloaded
 * @copyright Copyright 2003-2015 ZenCart.Codes a Pro-Webs Company
 * @copyright Copyright 2003-2015 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @filename checkout_reloaded.php
 * @file created 2015-02-10 7:13:36 PM
 * 
 */

define('TEXT_RATHER_COWOA', 'For a faster checkout experience, we offer the option to checkout without creating an account.<br />');
define('COWOA_HEADING', 'Checkout Without An Account');
define('ORDER_STEPS_IMAGE', 'arrow_checkout.gif');
define('ORDER_STEPS_IMAGE_HEIGHT', '24');
define('ORDER_STEPS_IMAGE_WIDTH', '24');
define('ORDER_STEPS_IMAGE_ALT', 'Checkout Arrow');

define('TEXT_ORDER_STEPS_BILLING', 'Billing');
define('TEXT_ORDER_STEPS_1', 'Shipping');
define('TEXT_ORDER_STEPS_2', 'Payment');
define('TEXT_ORDER_STEPS_3', 'Review & Send Order');
define('TEXT_ORDER_STEPS_4', 'Order Complete');

define('ORDER_REVIEW', '<h4 class="confirm">PLEASE REVIEW &amp; CONFIRM YOUR ORDER!!</h4>');

define('NAVBAR_TITLE_1', 'Checkout - Step 1');
define('NAVBAR_TITLE_2', 'Payment Method - Step 2');


define('TABLE_HEADING_BILLING_ADDRESS', 'Billing Address');
define('TEXT_SELECTED_BILLING_DESTINATION', 'Your billing address is shown to the left. The billing address should match the address on your credit card statement. You can change the billing address by clicking the <em>Change Address</em> button.');
define('TITLE_BILLING_ADDRESS', 'Billing Address:');

define('TABLE_HEADING_PAYMENT_METHOD', 'Payment Method');
define('TEXT_SELECT_PAYMENT_METHOD', 'Please select a payment method for this order.');
define('TITLE_PLEASE_SELECT', 'Please Select');
define('TEXT_ENTER_PAYMENT_INFORMATION', '');
define('TABLE_HEADING_COMMENTS', 'Special Instructions or Order Comments');

define('TITLE_NO_PAYMENT_OPTIONS_AVAILABLE', 'Not Available At This Time');
define('TEXT_NO_PAYMENT_OPTIONS_AVAILABLE','<span class="alert">Sorry, we are not accepting payments from your region at this time.</span><br />Please contact us for alternate arrangements.');

if($COWOA)
define('TITLE_CONTINUE_CHECKOUT_PROCEDURE', '<strong>Continue to Step 4</strong>');
else
define('TITLE_CONTINUE_CHECKOUT_PROCEDURE', '<strong>Continue to Step 3</strong>');

define('TEXT_CONTINUE_CHECKOUT_PROCEDURE', '- to confirm your order.');

define('TABLE_HEADING_CONDITIONS', '<span class="termsconditions">Terms and Conditions</span>');
define('TEXT_CONDITIONS_DESCRIPTION', '<span class="termsdescription">Please acknowledge the terms and conditions bound to this order by ticking the following box. The terms and conditions can be read <a href="' . zen_href_link(FILENAME_CONDITIONS, '', 'SSL') . '"><span class="pseudolink">here</span></a>.');
define('TEXT_CONDITIONS_CONFIRM', '<span class="termsiagree">I have read and agreed to the terms and conditions bound to this order.</span>');

define('TEXT_CHECKOUT_AMOUNT_DUE', 'Total Amount Due: ');
define('TEXT_YOUR_TOTAL','Your Total');

define('ENTRY_EMAIL_ADDRESS_COWOA_ERROR_EXISTS','An account with this email address already exists');