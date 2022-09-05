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
$route['default_controller'] = 'home/HomeController';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['Home'] = 'home/HomeController';
$route['Dashboard'] = 'admin/AdminController';
// HOME / LOGIN

//Checkout
$route['(\w{2})?/?checkout/successcash'] = 'checkout/successPaymentCashOnD';
$route['(\w{2})?/?checkout/successbank'] = 'checkout/successPaymentBank';
$route['(\w{2})?/?checkout/paypalpayment'] = 'checkout/paypalPayment';
$route['(\w{2})?/?checkout/order-error'] = 'checkout/orderError';

// Ajax called. Functions for managing shopping cart
$route['(\w{2})?/?manageShoppingCart'] = 'home/manageShoppingCart';
$route['(\w{2})?/?clearShoppingCart'] = 'home/clearShoppingCart';
$route['(\w{2})?/?discountCodeChecker'] = 'home/discountCodeChecker';

// home page pagination
$route[rawurlencode('home') . '/(:num)'] = "home/index/$1";
// load javascript language file
$route['loadlanguage/(:any)'] = "Loader/jsFile/$1";
// load default-gradient css
// $route['cssloader/(:any)'] = "Loader/cssStyle";

// Template Routes
// $route['template/imgs/(:any)'] = "Loader/templateCssImage/$1";
// $route['templatecss/imgs/(:any)'] = "Loader/templateCssImage/$1";
// $route['templatecss/(:any)'] = "Loader/templateCss/$1";
// $route['templatejs/(:any)'] = "Loader/templateJs/$1";

// Products urls style
//$route['(:any)_(:num)'] = "home/viewProduct/$2";
//$route['(\w{2})/(:any)_(:num)'] = "home/viewProduct/$3";
//$route['shop-product_(:num)'] = "home/viewProduct/$3";

// blog urls style and pagination
$route['blog/(:num)'] = "blog/index/$1";
$route['blog/(:any)_(:num)'] = "blog/viewPost/$2";
$route['(\w{2})/blog/(:any)_(:num)'] = "blog/viewPost/$3";

// Reset password page
$route['(:any)_(:num)'] = "home/HomeController/ResetPassword/$2";
$route['(\w{2})/(:any)_(:num)'] = "home/HomeController/ResetPassword/$3";
$route['resetpassword/(:num)'] = "home/HomeController/ResetPassword/$3";

// cart page
$route['cart'] = "home/ShoppingCartPage";
$route['(\w{2})/cart'] = "home/ShoppingCartPage";

// Shop page 
$route['shop'] = "home/HomeController/Shop";
$route['(\w{2})/shop'] = "home/HomeController/Shop";

// Shop page 
$route['usercreate'] = "home/HomeController/UserCreate";
$route['(\w{2})/usercreate'] = "home/HomeController/UserCreate";



// Blog page 
$route['blog'] = "home/HomeController/Blog";
$route['(\w{2})/blog'] = "home/HomeController/Blog";

// signle Blog Page 
$route['blog-details'] = "home/HomeController/BlogDetail";
$route['(\w{2})/blog-details'] = "home/HomeController/BlogDetail";

// About Page 
$route['aboutus'] = "home/HomeController/Aboutus";
$route['(\w{2})/aboutus'] = "home/HomeController/Aboutus";

// Whysugacci Page 
$route['why-sugacci'] = "home/HomeController/Whysugacci";
$route['(\w{2})/why-sugacci'] = "home/HomeController/Whysugacci";

// Contact Page 
$route['contact'] = "home/HomeController/Contact";
$route['(\w{2})/contact'] = "home/HomeController/Contact";

// TermofUse Page 
$route['term-of-use'] = "home/HomeController/TermofUse";
$route['(\w{2})/term-of-use'] = "home/HomeController/TermofUse";

// PrivacyPolicy Page 
$route['privacy-policy'] = "home/HomeController/PrivacyPolicy";
$route['(\w{2})/privacy-policy'] = "home/HomeController/PrivacyPolicy";

// Returns Page 
$route['returns'] = "home/HomeController/Returns";
$route['(\w{2})/returns'] = "home/HomeController/Returns";

// ShippingPolicy Page 
$route['shipping-policy'] = "home/HomeController/ShippingPolicy";
$route['(\w{2})/shipping-policy'] = "home/HomeController/ShippingPolicy";

// Account Page 
$route['account'] = "home/HomeController/Account";
$route['(\w{2})/account'] = "home/HomeController/Account";

// Login Page 
$route['login'] = "home/HomeController/Login";
$route['(\w{2})/login'] = "home/HomeController/Login";

// Register Page 
$route['register'] = "home/HomeController/Register";
$route['(\w{2})/register'] = "home/HomeController/Register";

// Checkout Page 
$route['checkout'] = "home/HomeController/Checkout";
$route['(\w{2})/checkout'] = "home/HomeController/Checkout";

// Thankyou Page 
$route['thankyou'] = "home/HomeController/Thankyou";
$route['(\w{2})/thankyou'] = "home/HomeController/Thankyou";

// Wishlist Page 
$route['wishlist'] = "home/HomeController/Wishlist";
$route['(\w{2})/wishlist'] = "home/HomeController/Wishlist";

// Users Profiles Public Users Page
$route['myaccount'] = "Users/myaccount";
$route['myaccount/(:num)'] = "Users/myaccount/$1";
$route['(\w{2})/myaccount'] = "Users/myaccount";
$route['(\w{2})/myaccount/(:num)'] = "Users/myaccount/$2";

// Logout Profiles Public Users Page
$route['logout'] = "Users/logout";
$route['(\w{2})/logout'] = "Users/logout";

$route['sitemap.xml'] = "home/sitemap";

// Confirm link
$route['confirm/(:any)'] = "home/confirmLink/$1";

// Site Multilanguage
$route['^(\w{2})/(.*)$'] = '$2';


$route['admin'] = "admin/home/login";
$route['Dashboard'] = "admin/home/home";

// ECOMMERCE GROUP

$route['admin/product'] = "admin/ecommerce/product";
$route['admin/products'] = "admin/ecommerce/products";
$route['admin/product/(:num)'] = "admin/ecommerce/product/index/$1";
$route['admin/products/(:num)'] = "admin/ecommerce/products/index/$1";


$route['admin/fineart'] = "admin/ecommerce/fineart";
$route['admin/fineart/(:num)'] = "admin/ecommerce/fineart/index/$1";
$route['admin/designer'] = "admin/ecommerce/designer";
$route['admin/designer/(:num)'] = "admin/ecommerce/designer/index/$1";
$route['admin/designer'] = "admin/ecommerce/designer";
$route['admin/designer/(:num)'] = "admin/ecommerce/designer/index/$1";
$route['admin/material'] = "admin/ecommerce/material";
$route['admin/material/(:num)'] = "admin/ecommerce/material/index/$1";

$route['admin/relatedproducts'] = "admin/ecommerce/RelatedProducts";
$route['admin/defaultrelatedproducts'] = "admin/ecommerce/DefaultRelatedProducts";

$route['admin/furniture_publish'] = "admin/ecommerce/Furniture_Publish";
$route['admin/furniture_publish/(:num)'] = "admin/ecommerce/Furniture_Publish/index/$1";

$route['admin/furniture_products'] = "admin/ecommerce/Furniture_Products";
$route['admin/furniture_products/(:num)'] = "admin/ecommerce/Furniture_Products/index/$1";

$route['admin/lighting_publish'] = "admin/ecommerce/lighting_publish";
$route['admin/lighting_publish/(:num)'] = "admin/ecommerce/lighting_publish/index/$1";
$route['admin/lighting_products'] = "admin/ecommerce/lighting_products";
$route['admin/lighting_products/(:num)'] = "admin/ecommerce/lighting_products/index/$1";
$route['admin/removeSecondaryImage'] = "admin/ecommerce/publish/removeSecondaryImage";
$route['admin/row_delete'] = "admin/ecommerce/publish/row_delete";
$route['admin/products'] = "admin/ecommerce/products";
$route['admin/entries'] = "admin/ecommerce/entries";  
$route['admin/entries/contacts'] = "admin/ecommerce/entries/contact_entries";  
$route['admin/entries/priceQuotes'] = "admin/ecommerce/entries/priceQuotes";
$route['admin/entries/requestMoreContacts'] = "admin/ecommerce/entries/requestMoreContacts";  
$route['admin/entries/tradeContacts'] = "admin/ecommerce/entries/tradeContacts"; 
$route['admin/entries/materialContacts'] = "admin/ecommerce/entries/materialContacts";  
$route['admin/materials'] = "admin/ecommerce/materials";
$route['admin/finearts'] = "admin/ecommerce/finearts";
$route['admin/designers'] = "admin/ecommerce/designers";
$route['admin/products/(:num)'] = "admin/ecommerce/products/index/$1";
$route['admin/materials/(:num)'] = "admin/ecommerce/materials/index/$1";
$route['admin/finearts/(:num)'] = "admin/ecommerce/finearts/index/$1";
$route['admin/designers/(:num)'] = "admin/ecommerce/designers/index/$1";
$route['admin/productStatusChange'] = "admin/ecommerce/products/productStatusChange";
$route['admin/shopcategories'] = "admin/ecommerce/ShopCategories";
$route['admin/shopcategories/(:num)'] = "admin/ecommerce/ShopCategories/index/$1";
$route['admin/shopcategories/edit'] = "admin/ecommerce/ShopCategories/edit";
$route['admin/shopcategories/edit/(:num)'] = "admin/ecommerce/ShopCategories/edit/$1";
$route['admin/editshopcategorie'] = "admin/ecommerce/ShopCategories/editShopCategorie";
$route['admin/orders'] = "admin/ecommerce/orders";
$route['admin/orders/furniture'] = "admin/ecommerce/orders/furniture";
$route['admin/orders/(:num)'] = "admin/ecommerce/orders/index/$1";
$route['admin/changeOrdersOrderStatus'] = "admin/ecommerce/orders/changeOrdersOrderStatus";
$route['admin/brands'] = "admin/ecommerce/brands";
$route['admin/brands/edit'] = "admin/ecommerce/edit";
$route['admin/brands/edit/(:num)'] = "admin/ecommerce/brands/edit/$1";
$route['admin/mtc'] = "admin/ecommerce/materials/mtc";
$route['admin/changePosition'] = "admin/ecommerce/ShopCategories/changePosition";
$route['admin/discounts'] = "admin/ecommerce/discounts";
$route['admin/discounts/(:num)'] = "admin/ecommerce/discounts/index/$1";
// BLOG GROUP
$route['admin/blogpublish'] = "admin/blog/BlogPublish";
$route['admin/blogpublish/(:num)'] = "admin/blog/BlogPublish/index/$1";
$route['admin/blogs'] = "admin/blog/blogs";
$route['admin/blogs/(:num)'] = "admin/blog/blogs/index/$1";

// DEAL GROUP
$route['admin/dealpublish'] = "admin/blog/DealPublish";
$route['admin/dealpublish/(:num)'] = "admin/blog/DealPublish/index/$1";
$route['admin/deals'] = "admin/blog/deals";
$route['admin/deals/(:num)'] = "admin/blog/deals/index/$1";

// Tesimonials GROUP
$route['admin/testpublish'] = "admin/blog/TestPublish";
$route['admin/testpublish/(:num)'] = "admin/blog/TestPublish/index/$1";
$route['admin/testimonials'] = "admin/blog/testimonials";
$route['admin/testimonials/(:num)'] = "admin/blog/testimonials/index/$1";

// Instagram GROUP
$route['admin/instapublish'] = "admin/blog/InstaPublish";
$route['admin/InstaPublish/(:num)'] = "admin/blog/InstaPublish/index/$1";
$route['admin/instagram'] = "admin/blog/instagram";
$route['admin/instagram/(:num)'] = "admin/blog/instagram/index/$1";

// Youtube GROUP
$route['admin/youtubepublish'] = "admin/blog/YoutubePublish";
$route['admin/YoutubePublish/(:num)'] = "admin/blog/YoutubePublish/index/$1";
$route['admin/youtube'] = "admin/blog/youtube";
$route['admin/youtube/(:num)'] = "admin/blog/youtube/index/$1";

// SETTINGS GROUP
$route['admin/settings'] = "admin/settings/settings";
$route['admin/styling'] = "admin/settings/styling";
$route['admin/templates'] = "admin/settings/templates";
$route['admin/titles'] = "admin/settings/titles";
$route['admin/pages'] = "admin/settings/pages";
$route['admin/emails'] = "admin/settings/emails";
$route['admin/emails/(:num)'] = "admin/settings/emails/index/$1";
$route['admin/history'] = "admin/settings/history";
$route['admin/history/(:num)'] = "admin/settings/history/index/$1";
// ADVANCED SETTINGS
$route['admin/languages'] = "admin/advanced_settings/languages";
$route['admin/filemanager'] = "admin/advanced_settings/filemanager";
$route['admin/adminusers'] = "admin/advanced_settings/adminusers";
// TEXTUAL PAGES
$route['admin/pageedit/(:any)'] = "admin/textual_pages/TextualPages/pageEdit/$1";
$route['admin/changePageStatus'] = "admin/textual_pages/TextualPages/changePageStatus";
// LOGOUT
$route['admin/logout'] = "admin/home/home/logout";
// Admin pass change ajax
$route['admin/changePass'] = "admin/home/home/changePass";
$route['admin/uploadOthersImages'] = "admin/ecommerce/publish/do_upload_others_images";
$route['admin/loadOthersImages'] = "admin/ecommerce/publish/loadOthersImages";

/*
  | -------------------------------------------------------------------------
  | Sample REST API Routes
  | -------------------------------------------------------------------------
 */
$route['api/products/(\w{2})/get'] = 'Api/Products/all/$1';
$route['api/product/(\w{2})/(:num)/get'] = 'Api/Products/one/$1/$2';
$route['api/product/set'] = 'Api/Products/set';
$route['api/product/(\w{2})/delete'] = 'Api/Products/productDel/$1';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['my-stripe'] = "StripeController";
$route['stripePost']['post'] = "StripeController/stripePost";
