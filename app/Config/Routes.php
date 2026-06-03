<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Frontend');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override(function () {
    $data['metaTitle'] = 'Page Not Found';
    $data['metaKeyword'] = 'Page Not Found';
    $data['metaDescription'] = 'Page Not Found';

    return view('errors/html/error_404', $data);
});

// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.


// Frontend Controller
$routes->get('/', 'Frontend::index');
$routes->get('home', 'Frontend::index');
$routes->get('about-us', 'Frontend::about');
$routes->get('contact-us', 'Frontend::contact');
$routes->get('products', 'Product::products');
$routes->post('subscribe', 'Frontend::subscribe');
$routes->post('send_enquiry', 'Frontend::send_enquiry');


$routes->post('get_service_ajax', 'Frontend::get_service_ajax');



$routes->post('save_blog_enquiry', 'Frontend::save_blog_enquiry');
$routes->post('save_downlaod_enquiry', 'Frontend::save_downlaod_enquiry');





$routes->post('get_job', 'Frontend::get_job');


$routes->get('search', 'Product::search');
$routes->get('thank-you', 'Frontend::thank_you');
$routes->get('forgot', 'Frontend::forgot');
$routes->get('reset-password/(:any)/(:any)', 'Frontend::reset_password/$1/$2');

$routes->get('login', 'Frontend::login');
$routes->get('sign-up', 'Frontend::sign_up');

$routes->get('faqs', 'Frontend::info');
$routes->get('terms-and-conditions', 'Frontend::info');
$routes->get('privacy-policy', 'Frontend::info');
$routes->get('disclaimer', 'Frontend::info');


$routes->get('account-verify/(:any)', 'Frontend::account_verify');
$routes->post('search_result', 'Frontend::search_result');
$routes->post('forget_send', 'Frontend::forget_send');
$routes->match(['get', 'post'], 'google_login', 'Frontend::google_login');
$routes->match(['get', 'post'], 'facebook_login', 'Frontend::facebook_login');
$routes->post('cancel_newsletter', 'Frontend::cancel_newsletter');
$routes->post('save_career_enquiry', 'Frontend::save_career_enquiry');

$routes->get('infrastructure', 'Frontend::infrastructure');
$routes->get('clients', 'Frontend::clients');
$routes->get('careers', 'Frontend::careers');
$routes->get('industries-we-serve', 'Frontend::industry');

$routes->get('industry/(:any)', 'Frontend::industry_detail/$1');
$routes->get('csr', 'Frontend::csr');
$routes->post('subscriber', 'Frontend::subscriber');
$routes->get('products', 'Frontend::products');

$routes->get('product/(:any)', 'Frontend::product_detail/$1');


$routes->get('careers', 'Frontend::careers');
$routes->post('subscribe', 'Frontend::subscribe');
$routes->post('send_enquiry', 'Frontend::send_enquiry');
$routes->get('blogs', 'Frontend::blogs');
$routes->get('blog/(:any)', 'Frontend::blog_detail/$1');

$routes->get('search', 'Product::search');
$routes->get('thank-you', 'Frontend::thank_you');
$routes->get('forgot', 'Frontend::forgot');
$routes->get('reset-password/(:any)/(:any)', 'Frontend::reset_password/$1/$2');

$routes->get('login', 'Frontend::login');
$routes->get('sign-up', 'Frontend::sign_up');

$routes->get('faqs', 'Frontend::info');
$routes->get('term-and-condition', 'Frontend::info');
$routes->get('privacy-policy', 'Frontend::info');

$routes->get('account-verify/(:any)', 'Frontend::account_verify');
$routes->post('search_result', 'Frontend::search_result');
$routes->post('forget_send', 'Frontend::forget_send');
$routes->match(['get', 'post'], 'google_login', 'Frontend::google_login');
$routes->match(['get', 'post'], 'facebook_login', 'Frontend::facebook_login');
$routes->post('cancel_newsletter', 'Frontend::cancel_newsletter');
$routes->post('save_career_enquiry', 'Frontend::save_career_enquiry');


$routes->get('infrastructure', 'Frontend::infrastructure');
$routes->get('clients', 'Frontend::clients');
$routes->get('whitepapers', 'Frontend::whitepapers');
$routes->get('apply', 'Frontend::apply');

$routes->get('partners', 'Frontend::partners');
$routes->get('services', 'Frontend::services');
$routes->get('service/(:any)', 'Frontend::service_detail/$1');



$routes->get('stories', 'Frontend::stories');

$routes->get('awards', 'Frontend::awards');
$routes->get('current-opening', 'Frontend::current_opening');
$routes->get('news', 'Frontend::news');

$routes->get('news/(:any)', 'Frontend::news_detail/$1');




// Route to handle the Webinar Form submission and save data to DB
$routes->post('webinar-registration', 'Frontend::webinar_registration');

// NEWS


// $routes->get('industry','Frontend::industry');
$routes->get('industry/(:any)', 'Frontend::industry_detail/$1');

$routes->get('capabilities', 'Frontend::capabilities');
$routes->get('gallery', 'Frontend::gallery');

$routes->get('leadership', 'Frontend::leadership');
$routes->get('technical', 'Frontend::technical');

$routes->get('tag/(:any)', 'Frontend::tag_detail/$1');

$routes->get('industry/(:any)', 'Frontend::industry/$1');
$routes->get('csr', 'Frontend::csr');

$routes->POST('get_blog_ajax', 'Frontend::get_blog_ajax');
$routes->POST('get_news_ajax', 'Frontend::get_news_ajax');




// new



$routes->get('solutions', 'Frontend::solutions');
$routes->get('services', 'Frontend::services');

$routes->get('customers', 'Frontend::customers');

$routes->get('blogs', 'Frontend::blogs');

$routes->get('demand', 'Frontend::demand');

$routes->get('solution/(:any)/(:any)', 'Frontend::solution_detail/$1/$2');
$routes->get('solution/(:any)', 'Frontend::solution_detail/$1');

$routes->get('service/(:any)/(:any)', 'Frontend::service_detail/$1/$2');

$routes->get('service/(:any)', 'Frontend::service_detail/$1');

$routes->get('customer-success', 'Frontend::success_story');
$routes->get('customer-success/(:any)', 'Frontend::success_story_detail/$1');

$routes->get('case-study/(:any)', 'Frontend::case_study_detail/$1');




$routes->get('event/(:any)', 'Frontend::event_detail/$1');

$routes->get('job/(:any)', 'Frontend::job_detail/$1');




$routes->get('our-teams', 'Frontend::our_teams');

$routes->get('ebooks', 'Frontend::ebooks');
$routes->get('whitepapers', 'Frontend::whitepapers');
$routes->get('events-and-webinars', 'Frontend::events');
$routes->get('on-demand-contents', 'Frontend::demand');
$routes->get('recognition', 'Frontend::recognition');

$routes->get('partners', 'Frontend::partners');





$routes->get('whitepaper/(:any)', 'Frontend::whitepaper_detail/$1');
$routes->get('ebook/(:any)', 'Frontend::ebook_detail/$1');



$routes->get('blog/(:any)', 'Frontend::blog_detail/$1');

$routes->get('registration', 'Frontend::registration');


$routes->post('get_blog_ajax', 'Frontend::get_blog_ajax');

$routes->post('send_blog_enquiry', 'Frontend::save_blog_enquiry');

$routes->get('resource', 'Frontend::resource');
$routes->get('cx', 'Frontend::cx');





//AdminLogin Controller

$routes->get('admin_console', 'AdminLogin::index');
$routes->post('admin_console/verify_', 'AdminLogin::Login_verifY_');


// Backend Controller

$routes->get('admin', 'admin\Backend::index', ['filter' => 'adminlogin']);
$routes->match(['get', 'post'], 'admin/dashboard', 'admin\Backend::index');
$routes->get('admin/logout', 'admin\Backend::logout');
$routes->match(['get', 'post'], 'admin/profile', 'admin\Backend::profile');
$routes->get('admin/permission-denied', 'admin\Backend::permission_denied', ['filter' => 'adminlogin']);


$routes->get('admin/users', 'admin\Backend::users');
$routes->match(['get', 'post'], 'admin/add_user', 'admin\Backend::add_user');
$routes->match(['get', 'post'], 'admin/add_user/(:num)', 'admin\Backend::add_user/$1');
$routes->post('admin/delete_users', 'admin\Backend::delete_users');


$routes->get('admin/user_group', 'admin\Backend::user_group');
$routes->match(['get', 'post'], 'admin/add_user_group', 'admin\Backend::add_user_group');
$routes->match(['get', 'post'], 'admin/add_user_group/(:num)', 'admin\Backend::add_user_group/$1');
$routes->post('admin/delete_user_group', 'admin\Backend::delete_user_group');


$routes->get('admin/menu', 'admin\Backend::menu');
$routes->match(['get', 'post'], 'admin/add_menu', 'admin\Backend::add_menu');
$routes->match(['get', 'post'], 'admin/add_menu/(:num)', 'admin\Backend::add_menu/$1');
$routes->post('admin/delete_menu', 'admin\Backend::delete_menu');

$routes->get('admin/front_menu', 'admin\Backend::front_menu');
$routes->match(['get', 'post'], 'admin/add_front_menu', 'admin\Backend::add_front_menu');
$routes->match(['get', 'post'], 'admin/add_front_menu/(:num)', 'admin\Backend::add_front_menu/$1');
$routes->post('admin/delete_setting', 'admin\Backend::delete_setting');


$routes->get('admin/setting', 'admin\Backend::setting');
$routes->match(['get', 'post'], 'admin/edit_setting', 'admin\Backend::edit_setting');
$routes->match(['get', 'post'], 'admin/edit_setting/(:num)', 'admin\Backend::edit_setting/$1');
$routes->post('admin/delete_setting', 'admin\Backend::delete_setting');

$routes->post('admin/chartData', 'admin\Backend::chartData');



// Module Controller

$routes->get('admin/team', 'admin\Module::team');
$routes->match(['get', 'post'], 'admin/add_team', 'admin\Module::add_team');
$routes->match(['get', 'post'], 'admin/add_team/(:num)', 'admin\Module::add_team/$1');
$routes->post('admin/delete_team', 'admin\Module::delete_team');


$routes->get('admin/testimonial', 'admin\Module::testimonial');
$routes->match(['get', 'post'], 'admin/add_testimonial', 'admin\Module::add_testimonial');
$routes->match(['get', 'post'], 'admin/add_testimonial/(:num)', 'admin\Module::add_testimonial/$1');
$routes->post('admin/delete_testimonial', 'admin\Module::delete_testimonial');


$routes->get('admin/partners', 'admin\Module::partners');
$routes->match(['get', 'post'], 'admin/add_partner', 'admin\Module::add_partner');
$routes->match(['get', 'post'], 'admin/add_partner/(:num)', 'admin\Module::add_partner/$1');
$routes->post('admin/delete_partner', 'admin\Module::delete_partner');


$routes->get('admin/faqs', 'admin\Module::faqs');
$routes->match(['get', 'post'], 'admin/add_faq', 'admin\Module::add_faq');
$routes->match(['get', 'post'], 'admin/add_faq/(:num)', 'admin\Module::add_faq/$1');
$routes->post('admin/delete_faq', 'admin\Module::delete_faq');

$routes->get('admin/awards', 'admin\Module::awards');
$routes->match(['get', 'post'], 'admin/add_award', 'admin\Module::add_award');
$routes->match(['get', 'post'], 'admin/add_award/(:num)', 'admin\Module::add_award/$1');
$routes->post('admin/delete_awards', 'admin\Module::delete_awards');



$routes->get('admin/resources', 'admin\Module::resources');
$routes->match(['get', 'post'], 'admin/add_resource', 'admin\Module::add_resource');
$routes->match(['get', 'post'], 'admin/add_resource/(:num)', 'admin\Module::add_resource/$1');
$routes->post('admin/delete_resources', 'admin\Module::delete_resources');





$routes->get('admin/journey', 'admin\Module::journey');
$routes->match(['get', 'post'], 'admin/add_journey', 'admin\Module::add_journey');
$routes->match(['get', 'post'], 'admin/add_journey/(:num)', 'admin\Module::add_journey/$1');
$routes->post('admin/delete_journey', 'admin\Module::delete_journey');





$routes->group('admin', function ($routes) {
    $routes->add('pages', 'admin\Module::pages');
    $routes->add('add_pages', 'admin\Module::add_pages');
    $routes->add('add_pages/(:num)', 'admin\Module::add_pages/$1');
    $routes->post('delete_pages', 'admin\Module::delete_pages');

    $routes->add('sliders', 'admin\Module::sliders');
    $routes->add('add_slider', 'admin\Module::add_slider');
    $routes->add('add_slider/(:num)', 'admin\Module::add_slider/$1');
    $routes->post('delete_slider', 'admin\Module::delete_slider');

});

///////////////

// MEDIA Controller

$routes->get('admin/blogs', 'admin\Media::blogs');
$routes->match(['get', 'post'], 'admin/add_blog', 'admin\Media::add_blog');
$routes->match(['get', 'post'], 'admin/add_blog/(:num)', 'admin\Media::add_blog/$1');
$routes->post('admin/delete_blogs', 'admin\Media::delete_blogs');


$routes->get('admin/author', 'admin\Media::author');
$routes->match(['get', 'post'], 'admin/add_author', 'admin\Media::add_author');
$routes->match(['get', 'post'], 'admin/add_author/(:num)', 'admin\Media::add_author/$1');
$routes->post('admin/delete_author', 'admin\Media::delete_author');








$routes->get('admin/blog_category', 'admin\Media::blog_category');
$routes->match(['get', 'post'], 'admin/add_blog_category', 'admin\Media::add_blog_category');
$routes->match(['get', 'post'], 'admin/add_blog_category/(:num)', 'admin\Media::add_blog_category/$1');
$routes->post('admin/delete_blog_category', 'admin\Media::delete_blog_category');


// CAEERR CONTROLLER
$routes->get('admin/careers', 'admin\Career::careers');
$routes->match(['get', 'post'], 'admin/add_career', 'admin\Career::add_career');
$routes->match(['get', 'post'], 'admin/add_career/(:num)', 'admin\Career::add_career/$1');
$routes->post('admin/delete_careers', 'admin\Career::delete_careers');


$routes->match(['get', 'post'], 'admin/career_enquiry', 'admin\Career::career_enquiry');
$routes->post('admin/delete_career_enquiry', 'admin\Career::delete_career_enquiry');

// ENQUIRY CONTROLLER

$routes->match(['get', 'post'], 'admin/enquiry', 'admin\Enquiry::enquiry');
$routes->post('admin/delete_enquiry', 'admin\Enquiry::delete_enquiry');

$routes->match(['get', 'post'], 'admin/subscribers', 'admin\Enquiry::subscribers');
$routes->post('admin/delete_subscribers', 'admin\Enquiry::delete_subscribers');




$routes->match(['get', 'post'], 'admin/blog_enquiry', 'admin\Enquiry::blog_enquiry');
$routes->post('admin/delete_blog_enquiry', 'admin\Enquiry::delete_blog_enquiry');

$routes->match(['get', 'post'], 'admin/download_enquiry', 'admin\Enquiry::download_enquiry');
$routes->post('admin/delete_download_enquiry', 'admin\Enquiry::delete_download_enquiry');








/////////////////////


// Product


$routes->get('admin/category', 'admin\Product::category');
$routes->match(['get', 'post'], 'admin/add_category', 'admin\Product::add_category');
$routes->match(['get', 'post'], 'admin/add_category/(:num)', 'admin\Product::add_category/$1');
$routes->post('admin/delete_category', 'admin\Product::delete_category');



$routes->get('admin/products', 'admin\Product::products');
$routes->match(['get', 'post'], 'admin/add_product', 'admin\Product::add_product');
$routes->match(['get', 'post'], 'admin/add_product/(:num)', 'admin\Product::add_product/$1');
$routes->post('admin/delete_products', 'admin\Product::delete_products');


$routes->get('admin/solutions', 'admin\Product::solutions');
$routes->match(['get', 'post'], 'admin/add_solution', 'admin\Product::add_solution');
$routes->match(['get', 'post'], 'admin/add_solution/(:num)', 'admin\Product::add_solution/$1');
$routes->post('admin/delete_solutions', 'admin\Product::delete_solutions');



$routes->get('admin/sectors', 'admin\Product::sectors');
$routes->match(['get', 'post'], 'admin/add_sector', 'admin\Product::add_sector');
$routes->match(['get', 'post'], 'admin/add_sector/(:num)', 'admin\Product::add_sector/$1');
$routes->post('admin/delete_sectors', 'admin\Product::delete_sectors');




// CMS CONTROLLER


$routes->get('admin/global_presence', 'admin\Cms::global_presence');
$routes->match(['get', 'post'], 'admin/add_global_presence', 'admin\Cms::add_global_presence');
$routes->match(['get', 'post'], 'admin/add_global_presence/(:num)', 'admin\Cms::add_global_presence/$1');
$routes->post('admin/delete_global_presence', 'admin\Cms::delete_global_presence');



$routes->get('admin/home_heading', 'admin\Cms::home_heading');
$routes->match(['get', 'post'], 'admin/add_home_heading', 'admin\Cms::add_home_heading');
$routes->match(['get', 'post'], 'admin/add_home_heading/(:num)', 'admin\Cms::add_home_heading/$1');
$routes->post('admin/delete_home_heading', 'admin\Cms::delete_home_heading');


$routes->get('admin/about_heading', 'admin\Cms::about_heading');
$routes->match(['get', 'post'], 'admin/add_about_heading', 'admin\Cms::add_about_heading');
$routes->match(['get', 'post'], 'admin/add_about_heading/(:num)', 'admin\Cms::add_about_heading/$1');
$routes->post('admin/delete_about_heading', 'admin\Cms::delete_about_heading');


$routes->get('admin/service_heading', 'admin\Cms::service_heading');
$routes->match(['get', 'post'], 'admin/add_service_heading', 'admin\Cms::add_service_heading');
$routes->match(['get', 'post'], 'admin/add_service_heading/(:num)', 'admin\Cms::add_service_heading/$1');
$routes->post('admin/delete_service_heading', 'admin\Cms::delete_service_heading');


$routes->get('admin/our_technology', 'admin\Cms::our_technology');
$routes->match(['get', 'post'], 'admin/add_our_technology', 'admin\Cms::add_our_technology');
$routes->match(['get', 'post'], 'admin/add_our_technology/(:num)', 'admin\Cms::add_our_technology/$1');
$routes->post('admin/delete_our_technology', 'admin\Cms::delete_our_technology');


$routes->get('admin/collection', 'admin\Cms::collection');
$routes->match(['get', 'post'], 'admin/add_collection', 'admin\Cms::add_collection');
$routes->match(['get', 'post'], 'admin/add_collection/(:num)', 'admin\Cms::add_collection/$1');
$routes->post('admin/delete_collection', 'admin\Cms::delete_collection');

$routes->get('admin/infrastructure', 'admin\Infrastructure::infrastructure');
$routes->match(['get', 'post'], 'admin/add_infrastructure', 'admin\Infrastructure::add_infrastructure');
$routes->match(['get', 'post'], 'admin/add_infrastructure/(:num)', 'admin\Infrastructure::add_infrastructure/$1');
$routes->post('admin/delete_infrastructure', 'admin\Infrastructure::delete_infrastructure');




$routes->get('admin/engineering-process', 'admin\Infrastructure::engineering_process');
$routes->match(['get', 'post'], 'admin/add_engineering_process', 'admin\Infrastructure::add_engineering_process');
$routes->match(['get', 'post'], 'admin/add_engineering_process/(:num)', 'admin\Infrastructure::add_engineering_process/$1');
$routes->post('admin/delete_engineering_process', 'admin\Infrastructure::delete_engineering_process');









$routes->get('admin/industry', 'admin\Industry::industry');
$routes->match(['get', 'post'], 'admin/add_industry', 'admin\Industry::add_industry');
$routes->match(['get', 'post'], 'admin/add_industry/(:num)', 'admin\Industry::add_industry/$1');
$routes->post('admin/delete_industry', 'admin\Industry::delete_industry');




$routes->get('admin/gallery_category', 'admin\Cms::gallery_category');
$routes->match(['get', 'post'], 'admin/add_gallery_category', 'admin\Cms::add_gallery_category');
$routes->match(['get', 'post'], 'admin/add_gallery_category/(:num)', 'admin\Cms::add_gallery_category/$1');
$routes->post('admin/delete_gallery_category', 'admin\Cms::delete_gallery_category');


$routes->get('admin/gallery', 'admin\Cms::gallery');
$routes->match(['get', 'post'], 'admin/add_gallery', 'admin\Cms::add_gallery');
$routes->match(['get', 'post'], 'admin/add_gallery/(:num)', 'admin\Cms::add_gallery/$1');
$routes->post('admin/delete_gallery', 'admin\Cms::delete_gallery');


$routes->get('admin/address', 'admin\Cms::address');
$routes->match(['get', 'post'], 'admin/add_address', 'admin\Cms::add_address');
$routes->match(['get', 'post'], 'admin/add_address/(:num)', 'admin\Cms::add_address/$1');
$routes->post('admin/delete_address', 'admin\Cms::delete_address');


$routes->get('admin/parter_tag', 'admin\Cms::parter_tag');
$routes->match(['get', 'post'], 'admin/add_parter_tag', 'admin\Cms::add_parter_tag');
$routes->match(['get', 'post'], 'admin/add_parter_tag/(:num)', 'admin\Cms::add_parter_tag/$1');
$routes->post('admin/delete_parter_tag', 'admin\Cms::delete_parter_tag');


$routes->get('admin/sustainability', 'admin\Cms::sustainability');
$routes->match(['get', 'post'], 'admin/add_sustainability', 'admin\Cms::add_sustainability');
$routes->match(['get', 'post'], 'admin/add_sustainability/(:num)', 'admin\Cms::add_sustainability/$1');
$routes->post('admin/delete_sustainability', 'admin\Cms::delete_sustainability');



$routes->get('admin/cx_heading', 'admin\Cms::cx_heading');
$routes->match(['get', 'post'], 'admin/add_cx_heading', 'admin\Cms::add_cx_heading');
$routes->match(['get', 'post'], 'admin/add_cx_heading/(:num)', 'admin\Cms::add_cx_heading/$1');
$routes->post('admin/delete_cx_heading', 'admin\Cms::delete_cx_heading');


$routes->get('admin/cx_feature', 'admin\Cms::cx_feature');
$routes->match(['get', 'post'], 'admin/add_cx_feature', 'admin\Cms::add_cx_feature');
$routes->match(['get', 'post'], 'admin/add_cx_feature/(:num)', 'admin\Cms::add_cx_feature/$1');
$routes->post('admin/delete_cx_feature', 'admin\Cms::delete_cx_feature');




$routes->get('admin/financial_year', 'admin\Cms::financial_year');
$routes->match(['get', 'post'], 'admin/add_financial_year', 'admin\Cms::add_financial_year');
$routes->match(['get', 'post'], 'admin/add_financial_year/(:num)', 'admin\Cms::add_financial_year/$1');
$routes->post('admin/delete_financial_year', 'admin\Cms::delete_financial_year');




$routes->get('admin/csr', 'admin\Cms::csr');
$routes->match(['get', 'post'], 'admin/add_csr', 'admin\Cms::add_csr');
$routes->match(['get', 'post'], 'admin/add_csr/(:num)', 'admin\Cms::add_csr/$1');
$routes->post('admin/delete_csr', 'admin\Cms::delete_csr');


$routes->get('admin/event_category', 'admin\Cms::event_category');
$routes->match(['get', 'post'], 'admin/add_event_category', 'admin\Cms::add_event_category');
$routes->match(['get', 'post'], 'admin/add_event_category/(:num)', 'admin\Cms::add_event_category/$1');
$routes->post('admin/delete_event_category', 'admin\Cms::delete_event_category');



$routes->get('admin/events', 'admin\Cms::events');
$routes->match(['get', 'post'], 'admin/add_event', 'admin\Cms::add_event');
$routes->match(['get', 'post'], 'admin/add_event/(:num)', 'admin\Cms::add_event/$1');
$routes->post('admin/delete_events', 'admin\Cms::delete_events');
$routes->get('admin/webinar_registrations', 'admin\WebinarController::registrations');
// Edit page-ah load panna (GET request with Webinar ID)
$routes->get('admin/edit_webinar/(:num)', 'admin\WebinarController::edit_webinar/$1');

// Form-ah submit panni data-vah save panna (POST request with Webinar ID)
$routes->post('admin/update_webinar/(:num)', 'admin\WebinarController::update_webinar/$1');

$routes->get('admin/projects', 'admin\Project::projects');
$routes->match(['get', 'post'], 'admin/add_project', 'admin\Project::add_project');
$routes->match(['get', 'post'], 'admin/add_project/(:num)', 'admin\Project::add_project/$1');
$routes->post('admin/delete_projects', 'admin\Project::delete_projects');

$routes->get('admin/project_category', 'admin\Project::project_category');
$routes->match(['get', 'post'], 'admin/add_project_category', 'admin\Project::add_project_category');
$routes->match(['get', 'post'], 'admin/add_project_category/(:num)', 'admin\Project::add_project_category/$1');
$routes->post('admin/delete_project_category', 'admin\Project::delete_project_category');


$routes->get('admin/equipments', 'admin\Project::equipments');
$routes->match(['get', 'post'], 'admin/add_equipment', 'admin\Project::add_equipment');
$routes->match(['get', 'post'], 'admin/add_equipment/(:num)', 'admin\Project::add_equipment/$1');
$routes->post('admin/delete_equipments', 'admin\Project::delete_equipments');


$routes->post('admin/get_project_category', 'admin\Project::get_project_category');
$routes->post('admin/get_project_equipment', 'admin\Project::get_project_equipment');



$routes->post('admin/remove_report', 'admin\Investor::remove_report');

$routes->get('admin/investor_category', 'admin\Investor::investor_category');
$routes->match(['get', 'post'], 'admin/add_investor_category', 'admin\Investor::add_investor_category');
$routes->match(['get', 'post'], 'admin/add_investor_category/(:num)', 'admin\Investor::add_investor_category/$1');
$routes->post('admin/delete_investor_category', 'admin\Investor::delete_investor_category');

$routes->get('admin/investor_reports', 'admin\Investor::investor_reports');
$routes->match(['get', 'post'], 'admin/add_investor_report', 'admin\Investor::add_investor_report');
$routes->match(['get', 'post'], 'admin/add_investor_report/(:num)', 'admin\Investor::add_investor_report/$1');
$routes->post('admin/delete_investor_reports', 'admin\Investor::delete_investor_reports');




$routes->get('admin/csr_reports', 'admin\Investor::csr_reports');
$routes->match(['get', 'post'], 'admin/add_csr_report', 'admin\Investor::add_csr_report');
$routes->match(['get', 'post'], 'admin/add_csr_report/(:num)', 'admin\Investor::add_csr_report/$1');
$routes->post('admin/delete_csr_reports', 'admin\Investor::delete_csr_reports');



$routes->get('admin/csr_category', 'admin\Investor::csr_category');
$routes->match(['get', 'post'], 'admin/add_csr_category', 'admin\Investor::add_csr_category');
$routes->match(['get', 'post'], 'admin/add_csr_category/(:num)', 'admin\Investor::add_csr_category/$1');
$routes->post('admin/delete_csr_category', 'admin\Investor::delete_csr_category');



$routes->get('admin/financial_years', 'admin\Investor::financial_years');
$routes->match(['get', 'post'], 'admin/add_financial_year', 'admin\Investor::add_financial_year');
$routes->match(['get', 'post'], 'admin/add_financial_year/(:num)', 'admin\Investor::add_financial_year/$1');
$routes->post('admin/delete_financial_years', 'admin\Investor::delete_financial_years');




$routes->get('admin/notice_category', 'admin\Investor::notice_category');
$routes->match(['get', 'post'], 'admin/add_notice_category', 'admin\Investor::add_notice_category');
$routes->match(['get', 'post'], 'admin/add_notice_category/(:num)', 'admin\Investor::add_notice_category/$1');
$routes->post('admin/delete_notice_category', 'admin\Investor::delete_notice_category');

$routes->get('admin/services', 'admin\Product::services');
$routes->match(['get', 'post'], 'admin/add_service', 'admin\Product::add_service');
$routes->match(['get', 'post'], 'admin/add_service/(:num)', 'admin\Product::add_service/$1');
$routes->post('admin/delete_services', 'admin\Product::delete_services');



// 1. FRONTEND: Update this line to point to your new standalone Events controller
$routes->get('event/(:any)', 'Events::detail/$1');

$routes->get('admin/webinar_registrations', 'admin\WebinarController::registrations');
$routes->get('admin/edit_webinar/(:num)', 'admin\WebinarController::edit_webinar/$1');
$routes->post('admin/update_webinar/(:num)', 'admin\WebinarController::update_webinar/$1');

// ADD THIS EXACT LINE TO FIX THE 404 ERROR:
$routes->post('admin/export_webinar_registration', 'admin\WebinarController::export');


if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
