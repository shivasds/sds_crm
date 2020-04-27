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

$route['default_controller'] = 'dashboard';
$route['callbacks'] = 'dashboard/callbacks';
$route['callbacks/(:num)'] = 'dashboard/callbacks';
$route['search_callback'] = 'dashboard/search_callback';
$route['generate_callback'] = 'dashboard/generate_callback';
$route['get_callback_details'] = 'dashboard/get_callback_details';
$route['reports'] = 'dashboard/reports';
$route['view_callbacks'] = 'dashboard/view_callbacks';
$route['view_callbacks/(:num)'] = 'dashboard/view_callbacks';
$route['view_callback_datas'] = 'dashboard/view_callback_datas';
$route['generate_dar'] = 'dashboard/generate_dar';
$route['report_bugs'] = 'dashboard/report_bugs';
$route['view_revenue/:num'] = 'dashboard/view_revenue/:num';
$route['get_previous_data/:id'] = 'dashboard/get_previous_data/:id';
$route['login/admin'] = 'login/admin';
$route['callback-details'] 			= 'dashboard/get_callback_details';
$route['site-visit-report-mail'] 	= 'dashboard/site_visit_report_mail';
$route['admin/view-site-visit-data'] 		= 'admin/view_site_visit_fixed_data';
$route['admin/download/(:num)']="admin/exceldownload";
$route['excel/download/(:num)']="admin/createXLS";
$route['excel/(:num)']="ExcelController";
$route['excel']="ExcelController";
$route['excel/view_callback']="ExcelController/view_callback";
$route['excel/view_callback/(:num)']="ExcelController/view_callback";
$route['ExcelReportController/(:num)']="ExcelReportController";
$route['chat']="ChatController";
$route['get-chat-history-vendor']="ChatController/get_chat_history_by_vendor";
$route['make_user_online']="ChatController/make_user_online";
$route['send-message']="ChatController/send_text_message";
$route['admin/chat']="admin/chat";
$route['admin/get-chat-history-vendor']="admin/get_chat_history_by_vendor";
$route['admin/send-message']="admin/send_text_message";
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['feedback'] = 'FeedbackController';
$route['logout'] = 'login/logout';
