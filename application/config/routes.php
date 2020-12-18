<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/


//home
$route[''] = "front_home/Home/home/";
$route['not_found'] = "front_home/Home/not_found/";

//product
$route['product'] = "front_product/Product/product_list/";
$route['product/product_list'] = "front_product/Product/product_list/";
$route['product/detail/(:any)'] = "front_product/Product/detail/$1";

//search
$route['search/(:any)'] = "front_search/Search/result/$1";
$route['search/(:any)/(:any)'] = "front_search/Search/result/$1/$2";

//voucher
$route['voucher/use_voucher_code'] = "front_voucher/Voucher/use_voucher_code";

//cart
$route['cart'] = "front_cart/Cart/index";
$route['cart/list'] = "front_cart/Cart/index";
$route['cart/add_data_cart'] = "front_cart/Cart/add_data_cart";
$route['cart/update_data_cart'] = "front_cart/Cart/update_data_cart";
$route['cart/delete_data_cart'] = "front_cart/Cart/delete_data_cart";

//order
$route['checkout'] = "front_order/Checkout/checkout";
$route['checkout/set_checkout_data'] = "front_order/Checkout/set_checkout_data";
$route['payment'] = "front_order/Payment/payment";
$route['set_payment'] = "front_order/Payment/set_payment";
$route['confirmation'] = "front_order/Confirmation/confirmation";
$route['finish'] = "front_order/Finish/finish";
$route['finish_bank'] = "front_order/Finish/finish_bank";
$route['finish_paypal'] = "front_order/Finish/finish_paypal";

//ongkir
$route['ongkir/cek_ongkir_helper'] = "front_ongkir/Ongkir/cek_ongkir_helper";

########## Admin ##########
//index
$route['admin'] = "admin_home/Home/home/";
$route['admin/home'] = "admin_home/Home/home/";

//login
$route['admin/login'] = "admin_home/Home/login/";
$route['admin/login_action'] = "admin_home/Home/login_action/";

//logout
$route['admin/logout'] = "admin_home/Home/logout/";

//bank
$route['admin/bank'] = "admin_bank/Bank/index/";
$route['admin/bank/list'] = "admin_bank/Bank/index/";
$route['admin/bank/add_bank'] = "admin_bank/Bank/add_bank";
$route['admin/bank/add_bank_action'] = "admin_bank/Bank/add_bank_action";
$route['admin/bank/edit_bank/(:any)'] = "admin_bank/Bank/edit_bank/$1";
$route['admin/bank/edit_bank_action'] = "admin_bank/Bank/edit_bank_action";
$route['admin/bank/delete_bank/(:any)'] = "admin_bank/Bank/delete_bank/$1";
$route['admin/bank/delete_bank_action'] = "admin_bank/Bank/delete_bank_action";

//banner
$route['admin/banner'] = "admin_banner/Banner/index/";
$route['admin/banner/list'] = "admin_banner/Banner/index/";
$route['admin/banner/add_banner'] = "admin_banner/Banner/add_banner";
$route['admin/banner/add_banner_action'] = "admin_banner/Banner/add_banner_action";
$route['admin/banner/edit_banner/(:any)'] = "admin_banner/Banner/edit_banner/$1";
$route['admin/banner/edit_banner_action'] = "admin_banner/Banner/edit_banner_action";
$route['admin/banner/delete_banner/(:any)'] = "admin_banner/Banner/delete_banner/$1";
$route['admin/banner/delete_banner_action'] = "admin_banner/Banner/delete_banner_action";

//brand
$route['admin/brand'] = "admin_brand/Brand/index/";
$route['admin/brand/list'] = "admin_brand/Brand/index/";
$route['admin/brand/add_brand'] = "admin_brand/Brand/add_brand";
$route['admin/brand/add_brand_action'] = "admin_brand/Brand/add_brand_action";
$route['admin/brand/edit_brand/(:any)'] = "admin_brand/Brand/edit_brand/$1";
$route['admin/brand/edit_brand_action'] = "admin_brand/Brand/edit_brand_action";
$route['admin/brand/delete_brand/(:any)'] = "admin_brand/Brand/delete_brand/$1";
$route['admin/brand/delete_brand_action'] = "admin_brand/Brand/delete_brand_action";

//category
$route['admin/category'] = "admin_category/Category/index/";
$route['admin/category/list'] = "admin_category/Category/index/";
$route['admin/category/add_category'] = "admin_category/Category/add_category";
$route['admin/category/add_category_action'] = "admin_category/Category/add_category_action";
$route['admin/category/edit_category/(:any)'] = "admin_category/Category/edit_category/$1";
$route['admin/category/edit_category_action'] = "admin_category/Category/edit_category_action";
$route['admin/category/delete_category/(:any)'] = "admin_category/Category/delete_category/$1";
$route['admin/category/delete_category_action'] = "admin_category/Category/delete_category_action";

$route['admin/category/list_subcategory/(:any)'] = "admin_category/Category/list_subcategory/$1";
$route['admin/category/add_subcategory/(:any)'] = "admin_category/Category/add_subcategory/$1";
$route['admin/category/add_subcategory_action'] = "admin_category/Category/add_subcategory_action";
$route['admin/category/edit_subcategory/(:any)/(:any)'] = "admin_category/Category/edit_subcategory/$1/$2";
$route['admin/category/edit_subcategory_action'] = "admin_category/Category/edit_subcategory_action";
$route['admin/category/delete_subcategory/(:any)/(:any)'] = "admin_category/Category/delete_subcategory/$1/$2";
$route['admin/category/delete_subcategory_action'] = "admin_category/Category/delete_subcategory_action";

//confirmation
$route['admin/confirmation'] = "admin_confirmation/Confirmation/index/";
$route['admin/confirmation/list'] = "admin_confirmation/Confirmation/index/";
$route['admin/confirmation/edit_confirmation/(:any)'] = "admin_confirmation/Confirmation/edit_confirmation/$1";
$route['admin/confirmation/edit_status_order_action'] = "admin_confirmation/Confirmation/edit_status_order_action";

//admin account
$route['admin/admin'] = "admin_admin/Admin/index/";
$route['admin/admin/list'] = "admin_admin/Admin/index/";
$route['admin/admin/add_admin'] = "admin_admin/Admin/add_admin";
$route['admin/admin/add_admin_action'] = "admin_admin/Admin/add_admin_action";
$route['admin/admin/edit_admin/(:any)'] = "admin_admin/Admin/edit_admin/$1";
$route['admin/admin/edit_admin_action'] = "admin_admin/Admin/edit_admin_action";
$route['admin/admin/delete_admin/(:any)'] = "admin_admin/Admin/delete_admin/$1";
$route['admin/admin/delete_admin_action'] = "admin_admin/Admin/delete_admin_action";

//Email
$route['admin/email'] = "admin_email/Email/index/";
$route['admin/email/list'] = "admin_email/Email/index/";
$route['admin/email/detail_email/(:any)'] = "admin_email/Email/detail_email/$1";

//inbox
$route['admin/inbox'] = "admin_inbox/Inbox/index/";
$route['admin/inbox/list'] = "admin_inbox/Inbox/index/";
$route['admin/inbox/detail_message/(:any)'] = "admin_inbox/Inbox/detail_message/$1";
$route['admin/inbox/delete_message/(:any)'] = "admin_inbox/Inbox/delete_message/$1";
$route['admin/inbox/delete_message_action'] = "admin_inbox/Inbox/delete_message_action";

//mailbox
$route['admin/mailbox'] = "admin_mailbox/Mailbox/index/";
$route['admin/mailbox/list'] = "admin_mailbox/Mailbox/index/";
$route['admin/mailbox/detail_message/(:any)'] = "admin_mailbox/Mailbox/detail_message/$1";
$route['admin/mailbox/delete_message/(:any)'] = "admin_mailbox/Mailbox/delete_message/$1";
$route['admin/mailbox/delete_message_action'] = "admin_mailbox/Mailbox/delete_message_action";
$route['admin/mailbox/list_sent_message'] = "admin_mailbox/Mailbox/list_sent_message/";
$route['admin/mailbox/detail_sent_message/(:any)'] = "admin_mailbox/Mailbox/detail_sent_message/$1";
$route['admin/mailbox/delete_sent_message/(:any)'] = "admin_mailbox/Mailbox/delete_sent_message/$1";
$route['admin/mailbox/delete_sent_message_action'] = "admin_mailbox/Mailbox/delete_sent_message_action";
$route['admin/mailbox/create_message'] = "admin_mailbox/Mailbox/create_message/";
$route['admin/mailbox/create_message_action'] = "admin_mailbox/Mailbox/create_message_action";

//order
$route['admin/order'] = "admin_order/Order/index/";
$route['admin/order/list'] = "admin_order/Order/index/";
$route['admin/order/edit_transaction/(:any)'] = "admin_order/Order/edit_transaction/$1";
$route['admin/order/print_transaction/(:any)'] = "admin_order/Order/print_transaction/$1";
$route['admin/order/edit_status_order_action'] = "admin_order/Order/edit_status_order_action";

//page
$route['admin/page'] = "admin_page/Page/index/";
$route['admin/page/list'] = "admin_page/Page/index/";
$route['admin/page/edit_page/(:any)'] = "admin_page/Page/edit_page/$1";
$route['admin/page/edit_page_action'] = "admin_page/Page/edit_page_action";
$route['admin/page/delete_page/(:any)'] = "admin_page/Page/delete_page/$1";
$route['admin/page/delete_page_action'] = "admin_page/Page/delete_page_action";
$route['admin/page/create_page'] = "admin_page/Page/create_page/";
$route['admin/page/create_page_action'] = "admin_page/Page/create_page_action";

//product
$route['admin/product'] = "admin_product/Product/index/";
$route['admin/product/list'] = "admin_product/Product/index/";
$route['admin/product/list_recommended_product'] = "admin_product/Product/list_recommended_product/";
$route['admin/product/add_product'] = "admin_product/Product/add_product";
$route['admin/product/add_product_action'] = "admin_product/Product/add_product_action";
$route['admin/product/edit_product/(:any)'] = "admin_product/Product/edit_product/$1";
$route['admin/product/edit_product_action'] = "admin_product/Product/edit_product_action";
$route['admin/product/delete_product/(:any)'] = "admin_product/Product/delete_product/$1";
$route['admin/product/delete_product_action'] = "admin_product/Product/delete_product_action";
$route['admin/product/edit_image_produk/(:any)/(:any)'] = "admin_product/Product/edit_image_produk/$1/$2";
$route['admin/product/edit_image_produk_action'] = "admin_product/Product/edit_image_produk_action";
$route['admin/product/add_image_produk/(:any)'] = "admin_product/Product/add_image_produk/$1";
$route['admin/product/add_image_produk_action'] = "admin_product/Product/add_image_produk_action";
$route['admin/product/delete_image_produk/(:any)/(:any)'] = "admin_product/Product/delete_image_produk/$1/$2";
$route['admin/product/delete_image_produk_action'] = "admin_product/Product/delete_image_produk_action";

//report
$route['admin/report/monthly'] = "admin_report/Report/monthly/";
$route['admin/report/yearly'] = "admin_report/Report/yearly/";
$route['admin/report/detail_monthly_report/(:any)'] = "admin_report/Report/detail_monthly_report/$1";
$route['admin/report/detail_yearly_report/(:any)'] = "admin_report/Report/detail_yearly_report/$1";

//review
$route['admin/review'] = "admin_review/Review/index/";
$route['admin/review/list'] = "admin_review/Review/index/";
$route['admin/review/reply_review/(:any)'] = "admin_review/Review/reply_review/$1";
$route['admin/review/reply_review_action'] = "admin_review/Review/reply_review_action";

//settings
$route['admin/settings/upload_settings'] = "admin_setting/Settings/upload_settings/";
$route['admin/settings/upload_settings_action'] = "admin_setting/Settings/upload_settings_action/";
$route['admin/settings/general_settings'] = "admin_setting/Settings/general_settings/";
$route['admin/settings/general_settings_action'] = "admin_setting/Settings/general_settings_action/";
$route['admin/settings/shipping_settings'] = "admin_setting/Settings/shipping_settings/";
$route['admin/settings/shipping_settings_action'] = "admin_setting/Settings/shipping_settings_action/";

$route['admin/settings/courier_settings'] = "admin_setting/Courier/courier_settings/";
$route['admin/settings/edit_courier/(:any)'] = "admin_setting/Courier/edit_courier/$1";
$route['admin/settings/edit_courier_action'] = "admin_setting/Courier/edit_courier_action";

$route['admin/settings/payment_settings'] = "admin_setting/Payment/payment_settings/";
$route['admin/settings/edit_payment/(:any)'] = "admin_setting/Payment/edit_payment/$1";
$route['admin/settings/edit_payment_action'] = "admin_setting/Payment/edit_payment_action";

//slider
$route['admin/slider'] = "admin_slider/Slider/index/";
$route['admin/slider/list'] = "admin_slider/Slider/index/";
$route['admin/slider/add_slider'] = "admin_slider/Slider/add_slider/";
$route['admin/slider/add_slider_action'] = "admin_slider/Slider/add_slider_action/";
$route['admin/slider/edit_slider/(:any)'] = "admin_slider/Slider/edit_slider/$1";
$route['admin/slider/edit_slider_action'] = "admin_slider/Slider/edit_slider_action/";
$route['admin/slider/delete_slider/(:any)'] = "admin_slider/Slider/delete_slider/$1";
$route['admin/slider/delete_slider_action'] = "admin_slider/Slider/delete_slider_action/";

//user
$route['admin/user'] = "admin_user/User/index/";
$route['admin/user/list'] = "admin_user/User/index/";
$route['admin/user/add_user'] = "admin_user/User/add_user/";
$route['admin/user/add_user_action'] = "admin_user/User/add_user_action/";
$route['admin/user/edit_user/(:any)'] = "admin_user/User/edit_user/$1";
$route['admin/user/edit_user_action'] = "admin_user/User/edit_user_action/";
$route['admin/user/delete_user/(:any)'] = "admin_user/User/delete_user/$1";
$route['admin/user/delete_user_action'] = "admin_user/User/delete_user_action/";
$route['admin/user/get_city_district'] = "admin_user/User/get_city_district/";
$route['admin/user/get_district'] = "admin_user/User/get_district/";

//voucher
$route['admin/voucher'] = "admin_voucher/Voucher/index/";
$route['admin/voucher/list'] = "admin_voucher/Voucher/index/";
$route['admin/voucher/add_voucher'] = "admin_voucher/Voucher/add_voucher/";
$route['admin/voucher/add_voucher_action'] = "admin_voucher/Voucher/add_voucher_action/";
$route['admin/voucher/edit_voucher/(:any)'] = "admin_voucher/Voucher/edit_voucher/$1";
$route['admin/voucher/edit_voucher_action'] = "admin_voucher/Voucher/edit_voucher_action/";
$route['admin/voucher/delete_voucher/(:any)'] = "admin_voucher/Voucher/delete_voucher/$1";
$route['admin/voucher/delete_voucher_action'] = "admin_voucher/Voucher/delete_voucher_action/";


########## User ##########

//account
$route['login'] = "user_profile/Account/login/";
$route['login_action'] = "user_profile/Account/login_action/";
$route['login_checkout'] = "user_profile/Account/login_checkout/";
$route['login_checkout_action'] = "user_profile/Account/login_checkout_action/";
$route['forgot_password'] = "user_profile/Account/forgot_password/";
$route['forgot_password_action'] = "user_profile/Account/forgot_password_action/";
$route['signup_action'] = "user_profile/Account/signup_action/";

//index
$route['profile'] = "user_profile/Profile/index/";
$route['profile/edit_profile'] = "user_profile/Profile/index/";
$route['profile/edit_profile_action'] = "user_profile/Profile/edit_profile_action/";
$route['profile/get_district'] = "user_profile/Profile/get_district/";
$route['profile/get_city_district'] = "user_profile/Profile/get_city_district/";

$route['profile/security_settings'] = "user_security/Security/index/";
$route['profile/security_settings_action'] = "user_security/Security/security_settings_action/";

$route['profile/shipping_settings'] = "user_shipping/Shipping/index/";
$route['profile/shipping_settings_action'] = "user_shipping/Shipping/shipping_settings_action/";

$route['profile/orders'] = "user_order/Order/index/";
$route['profile/orders/(:any)'] = "user_order/Order/index/$1";
$route['profile/order_detail/(:any)'] = "user_order/Order/order_detail/$1";

$route['profile/confirmation/(:any)'] = "user_order/Order/confirmation/$1";
$route['profile/confirmation_action'] = "user_order/Order/confirmation_action";

$route['profile/give_review/(:any)'] = "user_order/Order/give_review/$1";
$route['profile/give_review_action'] = "user_order/Order/give_review_action";

$route['profile/wishlist'] = "user_wishlist/Wishlist/index";
$route['profile/wishlist/(:any)'] = "user_wishlist/Wishlist/index/$1";
$route['profile/update_wishlist'] = "user_wishlist/Wishlist/update_wishlist";

$route['profile/mailbox'] = "user_mailbox/Mailbox/index";
$route['profile/mailbox_sent'] = "user_mailbox/Mailbox/mailbox_sent";
$route['profile/detail_message/(:any)'] = "user_mailbox/Mailbox/detail_message/$1";
$route['profile/detail_message_sent/(:any)'] = "user_mailbox/Mailbox/detail_message_sent/$1";
$route['profile/send_message'] = "user_mailbox/Mailbox/send_message";
$route['profile/send_message_action'] = "user_mailbox/Mailbox/send_message_action";

$route['logout'] = "user_profile/Profile/logout/";

$route['default_controller'] = 'front_home/Home/home/';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
