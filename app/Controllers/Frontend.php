<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\coreModule\SettingModel;
use App\Models\module\EnquiryModel;
use App\Models\module\PartnerModel;
use App\Models\module\CareerModel;
use App\Models\Cms\AddressModel;
use App\Models\Cms\AwardsModel;
use App\Models\Cms\JourneyModel;
use App\Models\FrontModel;
use App\Models\module\TestimonialModel;
use App\Models\Cms\ServiceModel;
use App\Models\Cms\IndustryModel;
use App\Models\Cms\ProductModel;
use App\Models\Cms\ProductCategoryModel;
use App\Models\module\BlogEnquiryModel;
use App\Models\module\DownloadEnquiryModel;


use App\Models\module\MediaModel;


class Frontend extends BaseController
{



  public function __construct()
  {

      $session = \Config\Services::session();
      // $session->get('userDetail');

         $settingModel = new SettingModel();
        $default_img = $settingModel->asObject()->where(array('key'=>'config_logo'))->first();
        $this->config_logo = $default_img->value; 
             
  }


    public function index()
    {
    
    $FrontModel = new FrontModel();  
    $MediaModel = new MediaModel();
    
    
    
    $meta = $this->AdminModel->fs('front_menu',array('link'=>'home'));
    $data['metaTitle'] = $meta->metaTitle;
    $data['metaDescription'] =  $meta->metaDescription;
    $data['metaKeyword'] =  $meta->metaKeyword;
    $data['meta'] =  $meta;
      
    
    $data['heading'] =  $this->AdminModel->fs('home_heading',null);
    $data['counterList'] =  $this->AdminModel->all_fetch('home_feature',array('home_id'=>$data['heading']->id),'sort_order','asc');
    
    // $data['withList'] =  $this->AdminModel->all_fetch('home_gallery',array('home_id'=>$data['heading']->id));
    
    $data['industryList'] =  $this->AdminModel->all_fetch('industries',array('status'=>1),'sortOrder','asc');
    
    $data['productList'] =  $this->AdminModel->all_fetch('products',array('status'=>1),'','',6);
    
     $data['servicesList'] =  $this->AdminModel->all_fetch('services',array('status'=>1,'feature'=>1),'sortOrder','asc');
    
    
    
    $data['recognitionList'] =  $this->AdminModel->all_fetch('awards',array('status'=>1,'type'=>'Recognitions'),'sortOrder','asc');
    
    
    
     $data['blogList'] = $MediaModel->asObject()->select('blogs.id,blogs.shortDescription,blogs.thumbnail,blogs.slug,blogs.title,blog_category.name as category_name')->join('blog_category','blog_category.id=blogs.category','left')->where(['blogs.status'=>1,'feature'=>1,'type'=>'BLOG'])->findAll();
   
    
     $data['caseStudyList'] = $MediaModel->asObject()->select('blogs.id,blogs.shortDescription,blogs.thumbnail,blogs.slug,blogs.title,blogs.whitepaper_download')->where(['blogs.status'=>1,'feature'=>1,'type'=>'CASE_STUDY'])->findAll();
     
     
    $data['successStoryList'] = $MediaModel->asObject()->select('blogs.id,blogs.shortDescription,blogs.thumbnail,blogs.slug,blogs.title')->where(['blogs.status'=>1,'type'=>'SUCCESS_STORY'])->findAll(10);
    
   
    $data['certificateList'] =  $this->AdminModel->all_fetch('awards',array('status'=>1,'type'=>'AWARD'),'sortOrder','asc');
    
    // $globleCategory = $this->AdminModel->all_fetch('presence_category',array('status'=>1),'sortOrder','asc');
    // $final = [];
    
    // if(!empty($globleCategory)){
    //     foreach($globleCategory as $value){
    //         $arr = [];
    //         $arr['id'] = $value->id;
    //         $arr['name'] = $value->name;
    //           $arr['color'] = $value->color;
    //         $arr['list'] = $FrontModel->get_global_presence_list($value->id);
    //         $final[]= $arr; 
    //     }
    // }

    //  $data['presenceList']  = $final;
          $data['config_logo']  = $this->config_logo;
    //  echo '<pre>';
    //  print_r($data['presenceList']); exit;
    $data['offset'] = 5;
     return view('frontend/home',$data);
    }
    
    
    
    
        
  function get_service_ajax(){
      
        $limit = 10;
        $offset = $this->request->getVar('offset'); 
        $arr = [];
        $ss ='';
 
             
       $service =  $this->AdminModel->all_fetch('services',array('status'=>1),'','',$limit,$offset);
                   
          if(!empty($service)){
                 foreach($service as $value){

                  $link = base_url('service/'.$value->slug);
                  $image = $value->thumbnail?base_url($value->thumbnail):base_url($this->config_logo);
                  
                 $ss .='
                   <div class="accordion-item">
                        <h2 class="accordion-header ">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne'.$value->id.'" aria-expanded="false" aria-controls="collapseOne'.$value->id.'">
                            <div class="icon"><img src="'.$image.'" alt="accordion image"></div>
                            <div class="h4 service-title">'.$value->name.'</div>
                            <a href="'.$link.'" class="service-link"><svg width="14" height="8" viewBox="0 0 14 8" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M1 3.5a.5.5 0 0 0 0 1zm12.354.854a.5.5 0 0 0 0-.708L10.172.464a.5.5 0 0 0-.708.708L12.293 4 9.464 6.828a.5.5 0 1 0 .708.708zM1 4.5h12v-1H1z" fill="#0083BF"/></svg></a>
                        </button>
                        </h2>
                        <div id="collapseOne'.$value->id.'" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <div class="service-desc-wrap">
                                    <div class="editor">
                                        '.$value->shortDescription.'
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>';

                 }
            
                      
 
          $arr['status'] = 1;
          $arr['data'] = $ss; 
          $arr['offset'] = $offset+$limit;
          echo json_encode($arr);
        }else{
          $arr['status'] = 0;
          $arr['msg'] = 'No More Available !'; 
          echo json_encode($arr);
        }              
  }


    
    
    
    
    
    
    
    
    
    
public function about($id=false)
  { 
           
      $AwardsModel = new AwardsModel();
      $JourneyModel = new JourneyModel(); 
      $FrontModel = new FrontModel(); 
 
    $MediaModel = new MediaModel();
    

     
    $meta = $this->AdminModel->fs('front_menu',array('link'=>$this->uri->getSegment(1),'status'=>1));
     if(empty($meta)){
        return redirect()->to('404');
    }
    
    $data['metaTitle'] = $meta->metaTitle;
    $data['metaDescription'] =  $meta->metaDescription;
    $data['metaKeyword'] =  $meta->metaKeyword;
    $data['meta'] =  $meta;
    
       $data['breadcrumbs'] = [];
  
      $data['breadcrumbs'][] = [
      'text' => 'Home',
      'href' => base_url(),
      'active' =>false
    ];

    $data['breadcrumbs'][] = [
      'text' => $meta->name,
      'href' => base_url($meta->link),
      'active' =>true
    ];
    


    $data['heading'] = $this->AdminModel->fs('about_heading',null);
  
    $data['visionsList'] = $this->AdminModel->all_fetch('visions',array('home_id'=>$data['heading']->id),'sort_order','asc');

    $data['valueList'] = $this->AdminModel->all_fetch('whyus',array('home_id'=>$data['heading']->id),'sort_order','asc');
    
    $data['teamList'] = $this->AdminModel->all_fetch('teams',array('status'=>1,'type'=>'TEAM'),'sort_order','asc');
    $data['ceoList'] = $this->AdminModel->all_fetch('teams',array('status'=>1,'type'=>'CEO'),'sort_order','asc');
    
    $data['partnerList'] = $this->AdminModel->all_fetch('partners',array('status'=>1),'sort_order','asc');
 
 $data['globalList'] = $this->AdminModel->all_fetch('global_presence',array('status'=>1),'sortOrder','asc');
 
 
  $data['successStoryList'] = $MediaModel->asObject()->select('blogs.id,blogs.shortDescription,blogs.thumbnail,blogs.slug,blogs.title')->where(['blogs.status'=>1,'type'=>'SUCCESS_STORY'])->findALL();
 
   $data['slider'] = $FrontModel->get_slider('about');



//   echo '<pre>';
//   print_r($data['visionsList']); exit;

       $data['config_logo'] = $this->config_logo;
     
        return view('frontend/about',$data);  
  }
  


  public function contact(){
           
    $model = new AddressModel();
    $ProductModel = new ProductModel();
    
    $ProductCategoryModel = new ProductCategoryModel();
    
    
   
    $meta = $this->AdminModel->fs('front_menu',array('link'=>$this->uri->getSegment(1),'status'=>1));
     if(empty($meta)){
        return redirect()->to('404');
    }
    
    $data['metaTitle'] = $meta->metaTitle;
    $data['metaDescription'] =  $meta->metaDescription;
    $data['metaKeyword'] =  $meta->metaKeyword;
    $data['meta'] =  $meta;
    
    
     $data['breadcrumbs'] = [];

    $data['breadcrumbs'][] = [
    'text' => 'Home',
    'href' => base_url(),
    'active' =>false
  ];

  $data['breadcrumbs'][] = [
    'text' => $meta->name,
    'href' => base_url($meta->link),
    'active' =>true
  ];


    $data['addressList'] = $model->asObject()->where(['status'=>1,'type'=>'LOCATION'])->orderBy('sortOrder','asc')->findAll();
  $data['phoneList'] = $model->asObject()->where(['status'=>1,'type'=>'PHONE'])->orderBy('sortOrder','asc')->findAll();
 
  $data['serviceList'] =  $this->AdminModel->all_fetch('services',array('status'=>1));
 
  $data['countryList'] =  $this->AdminModel->all_fetch('country',array('status'=>1));
 
 $final = [];
      $category = $ProductCategoryModel->asObject()->select('id,name')->where(['status'=>1])->orderBy('sortOrder','asc')->findAll();
      if(!empty($category)){
          foreach($category as $key => $value){
              $arr = [];
              $arr['id'] = $value->id;
              $arr['name'] = $value->name;
              $arr['list'] = $ProductModel->asObject()->select('id,name')->where(['status'=>1,'category_id'=>$value->id])->orderBy('name','asc')->findAll();
              $final[] = $arr; 
          }
      }
      
      $data['categoryList'] = $final;
      
      
    $data['wconfig'] = websetting();
    $data['config_logo'] = $this->config_logo;
    return view('frontend/contact',$data);

  }
    
    
    
    

  public function careers(){
           
    $model = new CareerModel();
    $meta = $this->AdminModel->fs('front_menu',array('link'=>$this->uri->getSegment(1),'status'=>1));
     if(empty($meta)){
        return redirect()->to('404');
    }
    
    $data['metaTitle'] = $meta->metaTitle;
    $data['metaDescription'] =  $meta->metaDescription;
    $data['metaKeyword'] =  $meta->metaKeyword;
    $data['meta'] =  $meta;
    
    
     $data['breadcrumbs'] = [];

    $data['breadcrumbs'][] = [
    'text' => 'Home',
    'href' => base_url(),
    'active' =>false
  ];

  $data['breadcrumbs'][] = [
    'text' => $meta->name,
    'href' => base_url($meta->link),
    'active' =>true
  ];

    $data['heading'] =  $this->AdminModel->fs('service_heading',null);

    $data['benafitList'] =  $this->AdminModel->all_fetch('service_area',array('heading_id'=>$data['heading']->id),'id','asc');
    $data['cultureList'] =  $this->AdminModel->all_fetch('area_feature',array('heading_id'=>$data['heading']->id),'sort_order','asc');
   

   $data['jobList'] = $model->asObject()->where('status',1)->orderBy('sort_order','asc')->findAll();
   
 
    $data['wconfig'] = websetting();
    $data['config_logo'] = $this->config_logo;
    return view('frontend/career',$data);

  }
    
    
    public function current_opening(){
     $model = new PartnerModel();
     $CareerModel = new CareerModel();

    $meta = $this->AdminModel->fs('front_menu',array('link'=>$this->uri->getSegment(1),'status'=>1));
     if(empty($meta)){
        return redirect()->to('404');
    }
    
    $data['metaTitle'] = $meta->metaTitle;
    $data['metaDescription'] =  $meta->metaDescription;
    $data['metaKeyword'] =  $meta->metaKeyword;
    $data['meta'] =  $meta;
    
    
    $data['breadcrumbs'] = [];

    $data['breadcrumbs'][] = [
    'text' => 'Home',
    'href' => base_url(),
    'active' =>false
      ];
    
      $data['breadcrumbs'][] = [
        'text' => $meta->name,
        'href' => base_url($meta->link),
        'active' =>true
      ];
    

    $data['jobList'] = $CareerModel->asObject()->where('status',1)->orderBy('sort_order','asc')->findAll();
    
      $data['departmentList'] = $CareerModel->asObject()->distinct()->select('department')->where('status',1)->findAll();
      $data['locationList'] = $CareerModel->asObject()->distinct()->select('location')->where('status',1)->findAll();
    
    
   
    $data['wconfig'] = websetting();
    $data['config_logo'] = $this->config_logo;
    return view('frontend/current_opening',$data);

  }





    
 function get_job(){
    $model = new CareerModel();
    $likes = [];
    if(!empty($this->request->getVar('department')))
    {
        $likes['department'] = $this->request->getVar('department');
    }   
    
    if(!empty($this->request->getVar('location')))
    {
        $likes['location'] = $this->request->getVar('location');
    }   
    
    
     $list = $model->asObject()->where('status',1)->like($likes)->orderBy('id','desc')->findAll();
     $ss = '';
     if(!empty($list)){
         foreach ($list as $key => $value) {
             $role = $value->role?$value->role:'';
             $jobType = $value->jobType?$value->jobType:'';
             $location = $value->location?$value->location:'';
             $link = base_url('job/'.$value->slug);
             $ss .= '
                     <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne'.$value->id.'">
                        <button class="accordion-button  collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne'.$value->id.'" aria-expanded="true" aria-controls="collapseOne'.$value->id.'">
                          <div class="acc_btn">
                            <h4>'.strip_tags($value->title).'</h4>
                            <p>'.$role.'</p>
                            <p>'.$jobType.'</p>
                             <p>'.$location.'</p>
                            <span>+</span>
                            <span class="minus">-</span>
                          </div>
                        </button>
                    </h2>

                    <div id="collapseOne'.$value->id.'" class="accordion-collapse collapse" aria-labelledby="headingOne'.$value->id.'" data-bs-parent="#accordionExample">
                      <div class="accordion-body">
                        <div class="pb-4 text-[14px] sm:text-[16px] text-[#535353]">
                            <p>'.$value->description.'</p>
                            <a href="'.$link.'" class="btn btn-theme btn-icon mt-4">Apply Now <svg width="18" height="12" viewBox="0 0 25 12" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M24.581 6.827a.75.75 0 0 0 0-1.06L19.808.994a.75.75 0 0 0-1.06 1.06l4.242 4.243-4.242 4.243a.75.75 0 0 0 1.06 1.06zM.21 7.047h23.841v-1.5H.21z" fill="#fff"></path></svg></a>
                        </div>    
                     </div>
                    </div>
                  </div>';
         }

         $arr['status'] = 1;
         $arr['data'] = $ss;
         echo json_encode($arr);

     }else{
         $arr['status'] = 0;
         $arr['data'] = '';
         echo json_encode($arr);
     }
        
  
}
   
        
function job_detail(){
    $model = new CareerModel();
    
    $FrontModel = new FrontModel();
    
    $link = $this->uri->getSegment(2); 
    $meta = $model->asObject()->where(['slug'=>$link,'status'=>1])->first();

   if(empty($meta)){
        return redirect()->to('404');
    }
    
    $data['metaTitle'] = $meta->metaTitle;
    $data['metaDescription'] =  $meta->metaDescription;
    $data['metaKeyword'] =  $meta->metaKeyword;
    $data['meta'] =  $meta;
    $data['detail'] =  $meta;
    
   $data['wconfig'] = websetting();
   $data['config_logo'] = $this->config_logo;
  
  return view('frontend/apply',$data);
  
}


    
 
    
 public function whitepapers(){
    
    $MediaModel = new MediaModel();
         
    $meta = $this->AdminModel->fs('front_menu',array('link'=>$this->uri->getSegment(1),'status'=>1));
     if(empty($meta)){
        return redirect()->to('404');
    }
    
    $data['metaTitle'] = $meta->metaTitle;
    $data['metaDescription'] =  $meta->metaDescription;
    $data['metaKeyword'] =  $meta->metaKeyword;
    $data['meta'] =  $meta;
    
    
     $data['breadcrumbs'] = [];

    $data['breadcrumbs'][] = [
    'text' => 'Home',
    'href' => base_url(),
    'active' =>false
  ];

  $data['breadcrumbs'][] = [
    'text' => $meta->name,
    'href' => base_url($meta->link),
    'active' =>true
  ];
    

   
   
 
   $data['blogList'] = $MediaModel->asObject()->where(['status'=>1,'type'=>'WHITEPAPER'])->findAll();
   
    
   
   
   
    $data['wconfig'] = websetting();
    $data['config_logo'] = $this->config_logo;
    return view('frontend/whitepaper',$data);

  }
    
    
    
     public function partners(){
      
    $meta = $this->AdminModel->fs('front_menu',array('link'=>$this->uri->getSegment(1),'status'=>1));
     if(empty($meta)){
        return redirect()->to('404');
    }
    
    $data['metaTitle'] = $meta->metaTitle;
    $data['metaDescription'] =  $meta->metaDescription;
    $data['metaKeyword'] =  $meta->metaKeyword;
    $data['meta'] =  $meta;
    
    
     $data['breadcrumbs'] = [];

    $data['breadcrumbs'][] = [
    'text' => 'Home',
    'href' => base_url(),
    'active' =>false
  ];

  $data['breadcrumbs'][] = [
    'text' => $meta->name,
    'href' => base_url($meta->link),
    'active' =>true
  ];
    
$final = [];
    $category = $this->AdminModel->all_fetch('partertags',array('status'=>1),'sortOrder','asc');
    if(!empty($category)){
        foreach($category as $key => $value){
            $arr = [];
            $arr['id'] = $value->id;
            $arr['name'] = $value->name;
            $arr['description'] = $value->description;
             $arr['list'] = $this->AdminModel->all_fetch('partners',array('status'=>1,'tag_id'=>$value->id),'sort_order','asc');
             $final[] = $arr;
        }
    }

 
 $data['gallery'] = $final;
 
    $data['wconfig'] = websetting();
    $data['config_logo'] = $this->config_logo;
    return view('frontend/partner',$data);

  }
    
    
    
    
    
   public function products(){
      
    $meta = $this->AdminModel->fs('front_menu',array('link'=>$this->uri->getSegment(1),'status'=>1));
     if(empty($meta)){
        return redirect()->to('404');
    }
    
    $data['metaTitle'] = $meta->metaTitle;
    $data['metaDescription'] =  $meta->metaDescription;
    $data['metaKeyword'] =  $meta->metaKeyword;
    $data['meta'] =  $meta;
    
    
     $data['breadcrumbs'] = [];

    $data['breadcrumbs'][] = [
    'text' => 'Home',
    'href' => base_url(),
    'active' =>false
  ];

  $data['breadcrumbs'][] = [
    'text' => $meta->name,
    'href' => base_url($meta->link),
    'active' =>true
  ];
    


    $data['corporateList'] = $this->AdminModel->all_fetch('infrastructure',array('status'=>1,'type'=>'corporate'),'sortOrder','asc');
    
    $data['innovationList'] = $this->AdminModel->all_fetch('infrastructure',array('status'=>1,'type'=>'innovation'),'sortOrder','asc');
    
    
    $data['productionList'] = $this->AdminModel->all_fetch('infrastructure',array('status'=>1,'type'=>'production'),'sortOrder','asc');
 
    $data['wconfig'] = websetting();
    $data['config_logo'] = $this->config_logo;
    return view('frontend/product',$data);

  }
      
    
    
    
    
function product_detail(){
    $model = new ProductModel();
    $MediaModel = new MediaModel();
    $FrontModel = new FrontModel();
    
    $link = $this->uri->getSegment(2); 
    $meta = $model->asObject()->where(['slug'=>$link,'status'=>1])->first();
//   echo '<pre>';
//   print_r($meta); exit;
   if(empty($meta)){
        return redirect()->to('404');
    }
    
    $data['metaTitle'] = $meta->metaTitle;
    $data['metaDescription'] =  $meta->metaDescription;
    $data['metaKeyword'] =  $meta->metaKeyword;
    $data['meta'] =  $meta;
    $data['detail'] =  $meta;
    
    
    $data['industryList'] = $FrontModel->get_industry_list(json_decode($meta->industries)); 
    
    
    $data['usecasesList'] = $this->AdminModel->all_fetch('product_feature',array('product_id'=>$meta->id)); 
    $data['keyFeatureList'] = $this->AdminModel->all_fetch('product_capabilities',array('product_id'=>$meta->id)); 
    $data['imagesList'] = $this->AdminModel->all_fetch('product_images',array('product_id'=>$meta->id)); 
    
    
    
   $data['config_logo'] = $this->config_logo;
   $data['caseStudyList'] = $MediaModel->asObject()->select('id,shortDescription,thumbnail,slug,title')->where(['status'=>1,'type'=>'CASE_STUDY'])->findALL();
   $data['config_logo'] = $this->config_logo;
  
  return view('frontend/product_detail',$data);
  
}

    
    
public function services(){
      
    $meta = $this->AdminModel->fs('front_menu',array('link'=>$this->uri->getSegment(1),'status'=>1));
     if(empty($meta)){
        return redirect()->to('404');
    }
    
    $data['metaTitle'] = $meta->metaTitle;
    $data['metaDescription'] =  $meta->metaDescription;
    $data['metaKeyword'] =  $meta->metaKeyword;
    $data['meta'] =  $meta;
    
    
     $data['breadcrumbs'] = [];

    $data['breadcrumbs'][] = [
    'text' => 'Home',
    'href' => base_url(),
    'active' =>false
  ];

  $data['breadcrumbs'][] = [
    'text' => $meta->name,
    'href' => base_url($meta->link),
    'active' =>true
  ];
    

    $data['corporateList'] = $this->AdminModel->all_fetch('infrastructure',array('status'=>1,'type'=>'corporate'),'sortOrder','asc');
    
    $data['innovationList'] = $this->AdminModel->all_fetch('infrastructure',array('status'=>1,'type'=>'innovation'),'sortOrder','asc');
    
    
    $data['productionList'] = $this->AdminModel->all_fetch('infrastructure',array('status'=>1,'type'=>'production'),'sortOrder','asc');
 
    $data['wconfig'] = websetting();
    $data['config_logo'] = $this->config_logo;
    return view('frontend/service',$data);

  }
      
    
 
 
 
   function service_detail(){
    $model = new ServiceModel();
    $MediaModel = new MediaModel();
    $FrontModel = new FrontModel();
    
    $link = $this->uri->getSegment(2); 
    $meta = $model->asObject()->where(['slug'=>$link,'status'=>1])->first();
//   echo '<pre>';
//   print_r($meta); exit;
   if(empty($meta)){
        return redirect()->to('404');
    }
    
    $data['metaTitle'] = $meta->metaTitle;
    $data['metaDescription'] =  $meta->metaDescription;
    $data['metaKeyword'] =  $meta->metaKeyword;
    $data['meta'] =  $meta;
    $data['detail'] =  $meta;
    
    
    $data['featureList'] = $this->AdminModel->all_fetch('service_feature',array('service_id'=>$meta->id),'sort_order','asc');
    
    
    $data['industryList'] = $FrontModel->get_industry_list(json_decode($meta->industries)); 
    
   $data['config_logo'] = $this->config_logo;
   
   $data['caseStudyList'] = $MediaModel->asObject()->select('id,shortDescription,thumbnail,slug,title')->where(['status'=>1,'type'=>'CASE_STUDY'])->findALL();


   $data['config_logo'] = $this->config_logo;
  
  return view('frontend/service_detail',$data);
  
}


 

 

    
    
    
  public function clients(){
    $model = new PartnerModel();
    $meta = $this->AdminModel->fs('front_menu',array('link'=>$this->uri->getSegment(1),'status'=>1));
     if(empty($meta)){
        return redirect()->to('404');
    }
    
    $data['metaTitle'] = $meta->metaTitle;
    $data['metaDescription'] =  $meta->metaDescription;
    $data['metaKeyword'] =  $meta->metaKeyword;
    $data['meta'] =  $meta;
    
    
     $data['breadcrumbs'] = [];

    $data['breadcrumbs'][] = [
    'text' => 'Home',
    'href' => base_url(),
    'active' =>false
  ];

  $data['breadcrumbs'][] = [
    'text' => $meta->name,
    'href' => base_url($meta->link),
    'active' =>true
  ];
    
    $data['details'] = $model->asObject()->where('status',1)->findAll();

    $data['wconfig'] = websetting();
    $data['config_logo'] = $this->config_logo;
    return view('frontend/clients',$data);

  }
    




    
  public function awards(){
    $model = new AwardsModel();
    $meta = $this->AdminModel->fs('front_menu',array('link'=>$this->uri->getSegment(1),'status'=>1));
     if(empty($meta)){
        return redirect()->to('404');
    }
    
    $data['metaTitle'] = $meta->metaTitle;
    $data['metaDescription'] =  $meta->metaDescription;
    $data['metaKeyword'] =  $meta->metaKeyword;
    $data['meta'] =  $meta;
    
    
     $data['breadcrumbs'] = [];

    $data['breadcrumbs'][] = [
    'text' => 'Home',
    'href' => base_url(),
    'active' =>false
  ];

  $data['breadcrumbs'][] = [
    'text' => $meta->name,
    'href' => base_url($meta->link),
    'active' =>true
  ];
    
    $data['awardList'] = $model->asObject()->where(['status'=>1,'type'=>'Award'])->findAll();
     $data['accreditationsList'] = $model->asObject()->where(['status'=>1,'type'=>'Accreditations'])->findAll();

    $data['wconfig'] = websetting();
    $data['config_logo'] = $this->config_logo;
    return view('frontend/awards',$data);

  }

    






  public function news(){
    $MediaModel = new MediaModel();
    
    $meta = $this->AdminModel->fs('front_menu',array('link'=>$this->uri->getSegment(1),'status'=>1));
     if(empty($meta)){
        return redirect()->to('404');
    }
    
    $data['metaTitle'] = $meta->metaTitle;
    $data['metaDescription'] =  $meta->metaDescription;
    $data['metaKeyword'] =  $meta->metaKeyword;
    $data['meta'] =  $meta;
    
    
     $data['breadcrumbs'] = [];

    $data['breadcrumbs'][] = [
    'text' => 'Home',
    'href' => base_url(),
    'active' =>false
  ];

  $data['breadcrumbs'][] = [
    'text' => $meta->name,
    'href' => base_url($meta->link),
    'active' =>true
  ];
    
    $data['featureList'] = $MediaModel->asObject()->select('blogs.id,blogs.link,blogs.shortDescription,blogs.thumbnail,blogs.slug,blogs.title,blog_category.name as category_name')->join('blog_category','blog_category.id=blogs.category','left')->where(['blogs.status'=>1,'feature'=>1,'type'=>'NEWS'])->findAll(2);
    

    $data['blogList'] = $MediaModel->asObject()->select('blogs.id,blogs.link,blogs.shortDescription,blogs.thumbnail,blogs.slug,blogs.title,blog_category.name as category_name')->join('blog_category','blog_category.id=blogs.category','left')->where(['blogs.status'=>1,'feature'=>NULL,'type'=>'NEWS'])->orderBy('blogs.id','desc')->findAll(10);

     $data['offset'] = 10;
    $data['wconfig'] = websetting();
    $data['config_logo'] = $this->config_logo;
    return view('frontend/news',$data);

  }




  function news_detail(){
    $model = new MediaModel();
    $link = $this->uri->getSegment(2); 
    $meta = $model->asObject()->where(['slug'=>$link,'status'=>1])->first();
//   echo '<pre>';
//   print_r($meta); exit;
   if(empty($meta)){
        return redirect()->to('404');
    }
    
   $data['metaTitle'] = $meta->metaTitle;
    $data['metaDescription'] =  $meta->metaDescription;
    $data['metaKeyword'] =  $meta->metaKeyword;
    $data['meta'] =  $meta;
    $data['detail'] =  $meta;
    
   $data['config_logo'] = $this->config_logo;
  
  $data['relatedPost'] = $model->asObject()->where(['status'=>1,'id <>'=>$meta->id,'type'=>'NEWS'])->orderBy('id','desc')->findAll(3);

  return view('frontend/news_detail',$data);
  
}





  function get_news_ajax(){
      
        $MediaModel = new MediaModel();
        $limit = 2;
        $offset = $this->request->getVar('offset'); 
        $arr = [];
        $ss ='';

 
      
        $blog = $MediaModel->asObject()->select('blogs.id,blogs.link,blogs.shortDescription,blogs.thumbnail,blogs.slug,blogs.title,blog_category.name as category_name')->join('blog_category','blog_category.id=blogs.category','left')->where(['blogs.status'=>1,'feature'=>NULL,'type'=>'NEWS'])->orderBy('blogs.id','desc')->findAll($limit,$offset);
             

             if(!empty($blog)){
                 foreach($blog as $value){
                  $link = $value->link?$value->link:base_url('news/'.$value->slug);
                  $image = $value->thumbnail?base_url($value->thumbnail):base_url($this->config_logo);
                  
                  $ss .='<a href="'.$link.'" class="col-lg-4 blog_item">
                        <div class="blog_img">
                         <img src="'.$image.'" alt="blog image" />
                       
                        <div class="blog_content">
                            <h4>'.$value->title.'</h4>
                            <span>'.$value->category_name.'</span>
                        </div>
                         </div>
                      </a>';
                 }
            
                      
 
          $arr['status'] = 1;
          $arr['data'] = $ss; 
          $arr['offset'] = $offset+$limit;
          echo json_encode($arr);
        }else{
          $arr['status'] = 0;
          $arr['msg'] = 'No More Available !'; 
          echo json_encode($arr);
        }              
  }
        
   
  
    
  function get_blog_ajax(){
      
        $MediaModel = new MediaModel();
        $limit = 2;
        $offset = $this->request->getVar('offset'); 
        $arr = [];
        $ss ='';

 
        $blog = $MediaModel->asObject()->where(['status'=>1,'feature <>'=>1])->orderBy('id','desc')->findAll($limit,$offset); 
             
             if(!empty($blog)){
                 foreach($blog as $value){
                  $link = base_url('blog/'.$value->slug);
                  $image = $value->thumbnail?base_url($value->thumbnail):base_url($this->config_logo);
                    $ss .='<div class="col-lg-4 col-md-6">
                        <div class="blog-card">
                            <div class="img-wrap">
                                <a href="'.$link.'"><img src="'.$image.'" loading="lazy" width="350" height="220" alt="blog"></a>
                            </div>
                            <div class="info-wrap">
                                <div class="date">'.$value->publish.'</div>
                                <h3><a href="#">'.$value->title.'</a></h3>
                                <a href="'.$link.'" class="read-btn">Read More</a>
                            </div>
                        </div></div>';
                 }
            
                      
 
          $arr['status'] = 1;
          $arr['data'] = $ss; 
          $arr['offset'] = $offset+$limit;
          echo json_encode($arr);
        }else{
          $arr['status'] = 0;
          $arr['msg'] = 'No More Available !'; 
          echo json_encode($arr);
        }              
  }
        
        
        
        
        
       
public function info(){
   $MediaModel = new MediaModel(); 
    $meta = $this->AdminModel->fs('front_menu',array('link'=>$this->uri->getSegment(1)));
    
    $data['metaTitle'] = $meta->metaTitle;
    $data['metaDescription'] =  $meta->metaDescription;
    $data['metaKeyword'] =  $meta->metaKeyword;
    $data['meta'] =  $meta;
     $data['detail'] =  $meta;
    
     $data['breadcrumbs'] = [];

    $data['breadcrumbs'][] = [
    'text' => 'Home',
    'href' => base_url(),
    'active' =>false
  ];

  $data['breadcrumbs'][] = [
    'text' => $meta->title,
    'href' => base_url($meta->link),
    'active' =>true
  ];
    


    $data['wconfig'] = websetting();
    $data['config_logo'] = $this->config_logo;
    return view('frontend/info',$data);

  }    
    
    
public function blogs(){
   $MediaModel = new MediaModel(); 
    $meta = $this->AdminModel->fs('front_menu',array('link'=>$this->uri->getSegment(1),'status'=>1));
     if(empty($meta)){
        return redirect()->to('404');
    }
    
    $data['metaTitle'] = $meta->metaTitle;
    $data['metaDescription'] =  $meta->metaDescription;
    $data['metaKeyword'] =  $meta->metaKeyword;
    $data['meta'] =  $meta;
    
    
     $data['breadcrumbs'] = [];

    $data['breadcrumbs'][] = [
    'text' => 'Home',
    'href' => base_url(),
    'active' =>false
  ];

  $data['breadcrumbs'][] = [
    'text' => $meta->name,
    'href' => base_url($meta->link),
    'active' =>true
  ];
    


    $data['featureList'] = $MediaModel->asObject()->where(['status'=>1,'feature'=>1,'type'=>'BLOG'])->findAll();

   $data['blogList'] = $MediaModel->asObject()->where(['status'=>1,'feature !='=>NULL,'type'=>'BLOG'])->orderBy('id','desc')->findAll(2);


    $data['wconfig'] = websetting();
    $data['config_logo'] = $this->config_logo;
    return view('frontend/blogs',$data);

  }
  
  
  
  
    
   function blog_detail(){
    $model = new MediaModel();
    $link = $this->uri->getSegment(2); 
    $meta = $model->asObject()->where(['slug'=>$link,'status'=>1])->first();
//   echo '<pre>';
//   print_r($meta); exit;
   if(empty($meta)){
        return redirect()->to('404');
    }
    
   $data['metaTitle'] = $meta->metaTitle;
    $data['metaDescription'] =  $meta->metaDescription;
    $data['metaKeyword'] =  $meta->metaKeyword;
    $data['meta'] =  $meta;
    $data['detail'] =  $meta;
    
   $data['config_logo'] = $this->config_logo;
  
  $data['relatedPost'] = $model->asObject()->where(['status'=>1,'id <>'=>$meta->id,'type'=>'BLOG'])->orderBy('id','desc')->findAll(3);

  return view('frontend/blog_detail',$data);
  
}


///////////////////
    
    
    
    
  public function events(){
   $MediaModel = new MediaModel(); 
    $meta = $this->AdminModel->fs('front_menu',array('link'=>$this->uri->getSegment(1),'status'=>1));
     if(empty($meta)){
        return redirect()->to('404');
    }
    
    $data['metaTitle'] = $meta->metaTitle;
    $data['metaDescription'] =  $meta->metaDescription;
    $data['metaKeyword'] =  $meta->metaKeyword;
    $data['meta'] =  $meta;
    
    
     $data['breadcrumbs'] = [];

    $data['breadcrumbs'][] = [
    'text' => 'Home',
    'href' => base_url(),
    'active' =>false
  ];

  $data['breadcrumbs'][] = [
    'text' => $meta->name,
    'href' => base_url($meta->link),
    'active' =>true
  ];
    


    $data['upcoming'] = $MediaModel->asObject()->where(['status'=>1,'upcoming'=>1,'type'=>'EVENT'])->findAll();

    $data['blogList'] = $MediaModel->asObject()->where(['status'=>1,'upcoming ='=>NULL,'type'=>'EVENT'])->orderBy('id','desc')->findAll();


    $data['wconfig'] = websetting();
    $data['config_logo'] = $this->config_logo;
    return view('frontend/events',$data);

  }
  
  
  
    
   function event_detail(){
    $model = new MediaModel();
    $link = $this->uri->getSegment(2); 
    $meta = $model->asObject()->where(['slug'=>$link,'status'=>1])->first();
//   echo '<pre>';
//   print_r($meta); exit;
   if(empty($meta)){
        return redirect()->to('404');
    }
    
   $data['metaTitle'] = $meta->metaTitle;
    $data['metaDescription'] =  $meta->metaDescription;
    $data['metaKeyword'] =  $meta->metaKeyword;
    $data['meta'] =  $meta;
    $data['detail'] =  $meta;
    
   $data['config_logo'] = $this->config_logo;
  
  $data['relatedPost'] = $model->asObject()->where(['status'=>1,'id <>'=>$meta->id,'type'=>'EVENT','upcoming ='=>NULL])->orderBy('id','desc')->findAll(3);

  return view('frontend/event_detail',$data);
  
}


    
    
    
public function registration(){
    $model = new PartnerModel();
    
     $MediaModel = new MediaModel(); 
    
    
    $meta = $this->AdminModel->fs('front_menu',array('link'=>$this->uri->getSegment(1)));
    $data['metaTitle'] = $meta->metaTitle;
    $data['metaDescription'] =  $meta->metaDescription;
    $data['metaKeyword'] =  $meta->metaKeyword;
    $data['meta'] =  $meta;
    
    $data['detail'] =  $MediaModel->asObject()->select('*')->where(['slug'=>$this->uri->getSegment(2),'type'=>'EVENTS','status'=>1])->first();
    if(!empty($data['detail'])){
       return redirect()->to('404'); 
    }
    
    
   $data['breadcrumbs'] = [];

    $data['breadcrumbs'][] = [
    'text' => 'Home',
    'href' => base_url(),
    'active' =>false
  ];

  $data['breadcrumbs'][] = [
    'text' => $meta->name,
    'href' => base_url($meta->link),
    'active' =>true
  ];



    $data['wconfig'] = websetting();
    $data['config_logo'] = $this->config_logo;
    return view('frontend/registration',$data);

  } 
    
    
    
    
    
    
    
    
    
    
   public function success_story(){
    $MediaModel = new MediaModel(); 
   
    $ServiceModel = new ServiceModel(); 
    $IndustryModel = new IndustryModel(); 
    $ProductModel = new ProductModel(); 
   

    $meta = $this->AdminModel->fs('front_menu',array('link'=>$this->uri->getSegment(1),'status'=>1));
     if(empty($meta)){
        return redirect()->to('404');
    }
    
    $data['metaTitle'] = $meta->metaTitle;
    $data['metaDescription'] =  $meta->metaDescription;
    $data['metaKeyword'] =  $meta->metaKeyword;
    $data['meta'] =  $meta;
    
    
     $data['breadcrumbs'] = [];
    
        $data['breadcrumbs'][] = [
        'text' => 'Home',
        'href' => base_url(),
        'active' =>false
      ];
    
      $data['breadcrumbs'][] = [
        'text' => $meta->name,
        'href' => base_url($meta->link),
        'active' =>true
      ];
        

    
    $where = [];
    
    $where['status'] = 1;
    $where['type'] = 'SUCCESS_STORY';
     
    
    if($this->request->getVar('product')){
        $where['product'] = $this->request->getVar('product');
    }
    if($this->request->getVar('service')){
          $where['service'] = $this->request->getVar('service');
    }

   if($this->request->getVar('industry')){
          $where['industry'] = $this->request->getVar('industry');
    }


   $data['blogList'] = $MediaModel->asObject()->where($where)->orderBy('id','desc')->findAll();
   
   
    $data['serviceList'] = $ServiceModel->asObject()->select('id,name')->where(['status'=>1])->orderBy('name','desc')->findAll();

      $data['industryList'] = $IndustryModel->asObject()->select('id,name')->where(['status'=>1])->orderBy('name','desc')->findAll();

    $data['productList'] = $ProductModel->asObject()->select('id,name')->where(['status'=>1])->orderBy('name','desc')->findAll();


    $data['wconfig'] = websetting();
    $data['config_logo'] = $this->config_logo;
    return view('frontend/success_story',$data);

  }
  
  
    
  function success_story_detail(){
    
    $model = new MediaModel();
       $IndustryModel = new IndustryModel(); 
    $link = $this->uri->getSegment(2); 
    $meta = $model->asObject()->where(['slug'=>$link,'status'=>1])->first();

    if(empty($meta)){
        return redirect()->to('404');
    }
    
    $data['metaTitle'] = $meta->metaTitle;
    $data['metaDescription'] =  $meta->metaDescription;
    $data['metaKeyword'] =  $meta->metaKeyword;
    $data['meta'] =  $meta;
    $data['detail'] =  $meta;
    
   $data['config_logo'] = $this->config_logo;
  
  $data['heading'] = $this->AdminModel->fs('front_menu',array('link'=>'customer-success'));

  $data['industryList'] = $IndustryModel->asObject()->select('id,name')->where(['status'=>1])->orderBy('name','desc')->findAll();


  return view('frontend/stories_detail',$data);
  
}

     
    
    
    function case_study_detail(){
    
    $model = new MediaModel();
    $link = $this->uri->getSegment(2); 
    $meta = $model->asObject()->where(['slug'=>$link,'status'=>1])->first();
//   echo '<pre>';
//   print_r($meta); exit;
   if(empty($meta)){
        return redirect()->to('404');
    }
    
   $data['metaTitle'] = $meta->metaTitle;
    $data['metaDescription'] =  $meta->metaDescription;
    $data['metaKeyword'] =  $meta->metaKeyword;
    $data['meta'] =  $meta;
    $data['detail'] =  $meta;
    
   $data['config_logo'] = $this->config_logo;
  
  $data['relatedPost'] = $model->asObject()->where(['status'=>1,'id <>'=>$meta->id,'type'=>'CASE_STUDY'])->orderBy('id','desc')->findAll(3);

  return view('frontend/case_study_detail',$data);
  
}

    
    
    
   public function industry(){
   error_reporting(0);
    $FrontModel = new FrontModel(); 
    $meta = $this->AdminModel->fs('industries',array('slug'=>$this->uri->getSegment(2)));
    $data['metaTitle'] = $meta->metaTitle;
    $data['metaDescription'] =  $meta->metaDescription;
    $data['metaKeyword'] =  $meta->metaKeyword;
    $data['meta'] =  $meta;
    $data['detail'] =  $meta;
    
     $data['breadcrumbs'] = [];

    $data['breadcrumbs'][] = [
    'text' => 'Home',
    'href' => base_url(),
    'active' =>false
  ];

  $data['breadcrumbs'][] = [
    'text' => $meta->name,
    'href' => base_url($meta->slug),
    'active' =>true
  ];
    
    // $data['heading'] = $this->AdminModel->fs('industry_heading',null);
    $final = [];
    $tagCategory = $this->AdminModel->all_fetch('tag_category',array('status'=>1),'sortOrder','asc');
    if(!empty($tagCategory)){
        foreach($tagCategory as $key => $value){
            $arr = [];
            $arr['id'] = $value->id;
             $arr['name'] = $value->name;
             $arr['list'] = $FrontModel->get_tag_by_category($value->id,$meta->id);
            $final[] = $arr;
        }
    }
    $data['tagList'] = $final;
    
    // echo '<pre>';
    // print_r($data); exit;
    
    $data['wconfig'] = websetting();
    $data['config_logo'] = $this->config_logo;
    return view('frontend/industry',$data);

  }
    
    



  function industry_detail(){
    $model = new IndustryModel();
    $MediaModel = new MediaModel();
     $FrontModel = new FrontModel();
       
       
       
    $link = $this->uri->getSegment(2); 
    $meta = $model->asObject()->where(['slug'=>$link,'status'=>1])->first();
//   echo '<pre>';
//   print_r($meta); exit;
   if(empty($meta)){
        return redirect()->to('404');
    }
    
   $data['metaTitle'] = $meta->metaTitle;
    $data['metaDescription'] =  $meta->metaDescription;
    $data['metaKeyword'] =  $meta->metaKeyword;
    $data['meta'] =  $meta;
    $data['detail'] =  $meta;
    
    
    
    $data['solutionList'] = $FrontModel->get_serviceList1(json_decode($meta->services));

    
    $data['featureList'] = $this->AdminModel->all_fetch('industry_feature',array('industry_id'=>$meta->id)); 
    $data['processList'] = $this->AdminModel->all_fetch('industry_process',array('industry_id'=>$meta->id)); 
  
    
   $data['config_logo'] = $this->config_logo;
   $data['caseStudyList'] = $MediaModel->asObject()->select('blogs.id,blogs.shortDescription,blogs.thumbnail,blogs.slug,blogs.title')->where(['blogs.status'=>1,'feature'=>1,'type'=>'CASE_STUDY'])->findALL();
     

  return view('frontend/industry_detail',$data);
  
}


    
    


    
   
    
 function search_result(){
        $FrontModel = new FrontModel();
        $keyword = $this->request->getVar('keyword'); 
        $arr = [];
        $ss ='';

        if(!empty($keyword)){
       
             $service = $FrontModel->get_serviceList($keyword);
             if(!empty($service)){
                 foreach($service as $value){
                
                  $link = base_url('service/'.$value->slug);
                    $ss .='<li><a href="'.$link.'"> Service - '.$value->name.'</a></li>';
                 }
             } 
             
             
            $industry = $FrontModel->get_industryList($keyword);
             if(!empty($industry)){
                 foreach($industry as $value){
               
                  $link = base_url('industry/'.$value->slug);
                    $ss .='<li><a href="'.$link.'"> Industry - '.$value->name.'</a></li>';
                 }
             }  
             
          $career = $FrontModel->get_careerList($keyword);
             if(!empty($career)){
                 foreach($career as $value){
               
                  $link = base_url('job/'.$value->slug);
                    $ss .='<li><a href="'.$link.'"> Career - '.$value->title.'</a></li>';
                 }
             }  
          
             
             $blog = $FrontModel->get_blogList($keyword,'BLOG');
             if(!empty($blog)){
                 foreach($blog as $value){
               
                  $link = base_url('blog/'.$value->slug);
                    $ss .='<li><a href="'.$link.'"> Blog - '.$value->title.'</a></li>';
                 }
             }  
             
             
      
             
           $page = $FrontModel->get_pageList($keyword);
             if(!empty($page)){
                 foreach($page as $value){
               
                  $link = base_url($value->link);
                    $ss .='<li><a href="'.$link.'"> '.$value->name.'</a></li>';
                 }
             }  
             
             
           $CASE_STUDY = $FrontModel->get_blogList($keyword,'CASE_STUDY');
             if(!empty($CASE_STUDY)){
                 foreach($CASE_STUDY as $value){
               
                  $link = base_url('customer-success/'.$value->slug);
                    $ss .='<li><a href="'.$link.'"> Customer Success - '.$value->title.'</a></li>';
                 }
             }  
             
             
           $EBOOK = $FrontModel->get_blogList($keyword,'SUCCESS_STORY');
             if(!empty($EBOOK)){
                 foreach($EBOOK as $value){
               
                  $link = base_url('customer-success/'.$value->slug);
                    $ss .='<li><a href="'.$link.'"> Customer Success - '.$value->title.'</a></li>';
                 }
             }  
             
             
            $WHITEPAPER = $FrontModel->get_blogList($keyword,'WHITEPAPER');
             if(!empty($WHITEPAPER)){
                 foreach($WHITEPAPER as $value){
               
                  $link = base_url('whitepapers');
                    $ss .='<li><a href="'.$link.'"> Whitepaper - '.$value->title.'</a></li>';
                 }
             }  
             
     
             
             
          $arr['status'] = 1;
          $arr['data'] = $ss; 
          echo json_encode($arr);
        }else{
          $arr['status'] = 0;
          $arr['data'] = ''; 
          echo json_encode($arr);
        }              
        
    }
        
     
        
         

    
    
      
  
    
    
    
    
// subscriber
 function subscribe(){
     $wconfig = websetting();
   $array = array();
   $rules = [
    'email' =>['label'=>'Email','rules'=>'required|valid_email'],
   ];

    if ($this->validate($rules)==FALSE) {
        $array['status'] = 0;
        $array['msg'] = $this->validation->getError('email');
        echo json_encode($array);
      }else{
        $save = array();
        $save['email'] = $this->request->getVar('email');
        $save['create_date'] = date('Y-m-d H:i:s');
        $check_already = $this->AdminModel->fs('subscribers',array('email'=>$save['email']));
        if(@$check_already){
         //$this->AdminModel->updateData('subscriber',array('email'=>$save['email']),$save);   
          $array['status']=1;
          $array['msg'] = 'You have already subscribe';
          echo json_encode($array);
         
        }else{
         $result =  $this->AdminModel->insertData('subscribers',$save);
         if($result){
             
            //  mail
             
             
    $mail = array();
  
    $mail['email'] = $this->request->getVar('email');
  
    $mail['create_date'] = date('Y-m-d H:i:s');
    $mail['subject'] = 'New Subscription From Newslater';
    $mail['wconfig'] = $wconfig;
    $to = strtolower($wconfig['config_name']);
       
       // email send
     $email = \Config\Services::email();
    $config['mailType'] = 'html';
    $config['wordWrap'] = true;
    $email->initialize($config);
    $email->setFrom($wconfig['sending_email'], $wconfig['config_name']);
    $email->setTo($to);
    $email->setSubject($mail['subject']);
    $message = view('frontend/enquiry_template',$mail);
    $email->setMessage($message);
    $email->send();
    
    
            //  to customer
           unset($mail['subject']);
            $mail['message'] = 'Thanks for subscribe proactive newsletter !';
            
            $email->setFrom($wconfig['sending_email'], $wconfig['config_name']);
            $email->setTo($save['email']);
            $email->setSubject('Proactive Subscribe Newsletter');
            $message = view('frontend/enquiry_template',$mail);
            $email->setMessage($message);
            $email->send();
             
             
            //  end
             $array['status']=1;
             $array['msg'] = 'Thanks for subscribing';
             echo json_encode($array);
         }else{
              $array['status']=0;
              $array['msg'] = 'Something went wrong please retry';
              echo json_encode($array);
         }
         
        }
      } 
  }

    
    
    
    
    
    
    
    
    
    
    
    function save_career_enquiry(){
  $array = array();
    $model = new CareerModel(); 
    if ($this->request->getMethod()=='post') {

      $rules = [
        'name' =>['label'=>' Name','rules'=>'required|min_length[3]'],
        'phone' =>['label'=>'Mobile','rules'=>'required|min_length[10]|max_length[11]'],
        'email' =>['label'=>'Email','rules'=>'required|valid_email'],
        'resume' => ['label' =>'Resume','rules'=>'uploaded[resume]|mime_in[resume,application/msword,application/pdf,text/plain,application/vnd.openxmlformats-officedocument.wordprocessingml.document]|max_size[resume,4096]','errors' => [
                'uploaded' => 'Please upload resume file','mime_in'=>'Upload file is not a valid type accept only text,word,pdf,PDF file !'
            ],]
      ];

      if ($this->validate($rules)==false) {
        $array['status']=0;
        $array['name'] = $this->validation->getError('name');
        $array['email'] = $this->validation->getError('email');
        $array['phone'] = $this->validation->getError('phone');
     $array['resume'] = $this->validation->getError('resume');
         echo json_encode($array);
     
      }else{
      date_default_timezone_set('Asia/Kolkata');
      $save = array();
      $save['name'] = $this->request->getVar('name');
      $save['email'] = $this->request->getVar('email');
      $save['phone'] = $this->request->getVar('phone');
            $save['position'] = $this->request->getVar('position');
      $save['job_id'] = $this->request->getVar('job_id');
      $save['create_date'] = date('Y-m-d H:i:s');

      $file = $this->request->getFile('resume');
      if(!empty($_FILES['resume']['name'])){
       if($file->isValid() && !$file->hasMoved()){
         $file_name = $file->getRandomName();
         if($file->move('uploads/images/', $file_name)){
           $save['resume'] = 'uploads/images/'.$file_name;
         }
      }else{
        
       }
      }
      

      $result = $this->AdminModel->insertData('career_enquiry',$save);
      if ($result) {
    
    $wconfig = websetting(); 
    $info = $model->get_enquiry_detail($result);   
    $mail = array();
    $mail['name'] = $info->name;
    $mail['email'] = $info->email;
    $mail['phone'] = $info->phone;
    $mail['career_name'] = $info->career_name;
     $mail['position'] = $info->position;
    
    $mail['resume'] = base_url($info->resume);
    $mail['create_date'] = $info->create_date;
    $mail['subject'] = 'New Enquiry From '.$wconfig['config_name'].' career page';
    $mail['wconfig'] = $wconfig ;
    $to = strtolower($wconfig['config_email']);
  
       // email send
     $email = \Config\Services::email();
    $config['mailType'] = 'html';
    $config['wordWrap'] = true;
    $email->initialize($config);

    $email->setFrom($wconfig['sending_email'], $wconfig['config_name']);
    $email->setTo($to);
    $email->setSubject($mail['subject']);
    $message = view('frontend/enquiry_template',$mail);
    $email->setMessage($message);
    $email->send();


        $array['status'] = 1;
        $array['msg']= 'Request send successfully';
        echo json_encode($array);
      }else{
        $array['status'] = 0;
        $array['msg']= 'Something went wrong please retry';
        echo json_encode($array);
      }

    }
    }
}

    
    
    
    
    
    
    
    function send_enquiry(){
        date_default_timezone_set('Asia/Kolkata');
    //     header("Access-Control-Allow-Origin: *");
    // header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
    $model = new EnquiryModel();
    $array = array();
    $rules =[
 
    'name'=>['label'=>'Name','rules'=>'trim|required'],
    'email'=>['label'=>'Email','rules'=>'trim|required|valid_email'],
    'message'=>['label'=>'message','rules'=>'trim'],
    'phone'=>['label'=>'Phone','rules'=>'trim|numeric|max_length[11]|min_length[10]'],
    ];

   if ($this->validate($rules)==FALSE) {
      $array['status'] = 0;
   
      $array['name'] = $this->validation->getError('name');
      $array['email'] = $this->validation->getError('email');
      $array['phone'] = $this->validation->getError('phone');
      echo json_encode($array);
    }else
    {
    
    $wconfig = websetting();

    $save = array();
    $save['name'] = $this->request->getVar('name');
    $save['lastName'] = $this->request->getVar('lastName');
    $save['email'] = $this->request->getVar('email');
    $save['phone'] = $this->request->getVar('phone');
    $save['message'] = $this->request->getVar('message');
    $save['service'] = $this->request->getVar('service');
        $save['product'] = $this->request->getVar('product');
    // $save['job'] = $this->request->getVar('job');
      $save['country'] = $this->request->getVar('country');
    

    $save['create_date'] = date('Y-m-d H:i:s'); // for email date
    $result = $model->insert($save);
    $lastId = $this->db->insertID();
    if(!empty($lastId)){
    
    $info = $model->get_enquiry_detail($lastId);   
    $mail = array();
    $mail['name'] = $info->name;
    $mail['email'] = $info->email;
    $mail['phone'] = $info->phone;
    $mail['message'] = $info->message;
    $mail['service'] = $info->service_name;
    $mail['product'] = $info->product_name;
    $mail['country'] = $info->country_name;
    
    
    $mail['create_date'] = $info->create_date;
    $mail['subject'] = 'New Enquiry From '.$wconfig['config_name'].' contact page';
    $mail['wconfig'] = $wconfig;
    $to = strtolower($wconfig['config_email']);
   
       // email send
     $email = \Config\Services::email();
    $config['mailType'] = 'html';
    $config['wordWrap'] = true;
    
    // if($wconfig['config_mail_engine']=='smtp'){
        
    //     $config['SMTPHost'] = $wconfig['smtp_hostname'];
    //     $config['SMTPUser'] = $wconfig['smtp_username'];;
    //     $config['SMTPPass'] = $wconfig['smtp_password'];;
    //     $config['SMTPPort'] = $wconfig['smtp_port'];;
    // }
    
    
    $email->initialize($config);

    $email->setFrom($wconfig['sending_email'], $wconfig['config_name']);
    $email->setTo($to);
    $email->setSubject($mail['subject']);
    $message = view('frontend/enquiry_template',$mail);
    $email->setMessage($message);
    $email->send();

    // end
      $array['status'] = 1;
      $array['msg'] ='Enquiry Sent Successfully';
      echo json_encode($array);
      }else{
          $array['status'] = 0;
      $array['msg'] ='Something getting wrong please retry';
      echo json_encode($array); 
      }

   }
}




   function save_blog_enquiry(){
       
    header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
    $model = new BlogEnquiryModel();
    $array = array();
    $rules =[
 
    'name'=>['label'=>'Name','rules'=>'trim|htmlspecialchars|required'],
    'email'=>['label'=>'Email','rules'=>'trim|htmlspecialchars|required|valid_email'],
    'message'=>['label'=>'message','rules'=>'trim|htmlspecialchars'],
    'phone'=>['label'=>'Phone','rules'=>'trim|htmlspecialchars|numeric|max_length[11]|min_length[10]'],
    ];

   if ($this->validate($rules)==FALSE) {
      $array['status'] = 0;
   
      $array['name'] = $this->validation->getError('name');
      $array['email'] = $this->validation->getError('email');
      $array['phone'] = $this->validation->getError('phone');
      echo json_encode($array);
    }else
    {
    
        // check captcha
        // $secretKey = SECRET_KEY;
        // $responseKey = $_POST['g-recaptcha-response'];
        // $userIP = $_SERVER['REMOTE_ADDR'];
        // $url = "https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$responseKey&remoteip=$userIP";
        // $response = file_get_contents($url);
        // $response = json_decode($response);
        // if (!$response->success){
        //       $array['status'] = 0;
        //       $array['msg'] ='Please fill captcha!';
        //       echo json_encode($array);
        //       die();
        //   }
  
    
    $wconfig = websetting();

    $save = array();
    $save['name'] = $this->request->getVar('name');
    $save['industry'] = $this->request->getVar('industry');
    $save['email'] = $this->request->getVar('email');
    $save['phone'] = $this->request->getVar('phone');
    $save['message'] = $this->request->getVar('message');
   
    $save['create_date'] = date('Y-m-d H:i:s'); // for email date
    $result = $model->insert($save);
    $lastId = $this->db->insertID();
    if(!empty($lastId)){
    
    $info = $model->asObject()->select('blog_enquiry.*,sol.name as solution_name')->join('industries as sol','blog_enquiry.industry=sol.id','left')->where('blog_enquiry.id',$lastId)->first();   
    $mail = array();
    $mail['name'] = $info->name;
    $mail['email'] = $info->email;
    $mail['phone'] = $info->phone;
    $mail['message'] = $info->message;
    $mail['industry'] = $info->solution_name;

    // $mail['whitepaper_download'] = @$info->whitepaper_download?base_url($info->whitepaper_download):'';
    
    // if(@$info->type=='GETPAPER'){
    //     $info->type = 'WHITEPAPER';
    // }else if(@$info->type=='EBOOK'){
    //      $info->type = 'EBOOK';
    // }
    
    
    $mail['create_date'] = $info->create_date;
    $mail['subject'] = 'New Enquiry From '.$wconfig['config_name'].' '.$info->type.' page';
    $mail['wconfig'] = $wconfig;
    $to = strtolower($wconfig['config_email']);
       
       // email send
     $email = \Config\Services::email();
    $config['mailType'] = 'html';
    $config['wordWrap'] = true;
    $email->initialize($config);
    $email->setFrom($wconfig['sending_email'], $wconfig['config_name']);
    $email->setTo($to);
    $email->setSubject($mail['subject']);
    $message = view('frontend/enquiry_template',$mail);
    $email->setMessage($message);
    $email->send();

    // end
    // send mail to customer
    
    
      $array['status'] = 1;
      $array['msg'] = 'Enquiry Send Successfully';
      echo json_encode($array);
      }else{
          $array['status'] = 0;
      $array['msg'] ='Something getting wrong please retry';
      echo json_encode($array); 
      }

   }
}




   function save_downlaod_enquiry(){
       
    header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
    $model = new DownloadEnquiryModel();
    $array = array();
    $rules =[
 
    'name'=>['label'=>'Name','rules'=>'trim|htmlspecialchars|required'],
    'email'=>['label'=>'Email','rules'=>'trim|htmlspecialchars|required|valid_email'],
    'phone'=>['label'=>'Phone','rules'=>'trim|htmlspecialchars|numeric|max_length[11]|min_length[10]'],
    ];

   if ($this->validate($rules)==FALSE) {
      $array['status'] = 0;
   
      $array['name'] = $this->validation->getError('name');
      $array['email'] = $this->validation->getError('email');
      $array['phone'] = $this->validation->getError('phone');
      echo json_encode($array);
    }else
    {
    
    
    $wconfig = websetting();

    $save = array();
    $save['name'] = $this->request->getVar('name');
    $save['blog'] = $this->request->getVar('blog');
    $save['email'] = $this->request->getVar('email');
    $save['phone'] = $this->request->getVar('phone');
    $save['company'] = $this->request->getVar('company');
    $save['designation'] = $this->request->getVar('designation');
       
       
    $save['create_date'] = date('Y-m-d H:i:s'); // for email date
    $result = $model->insert($save);
    $lastId = $this->db->insertID();
    if(!empty($lastId)){
    
    $info = $model->asObject()->select('download_enquiry.*,sol.title as blog_name,sol.whitepaper_download')->join('blogs as sol','download_enquiry.blog=sol.id','left')->where('download_enquiry.id',$lastId)->first();   
    $mail = array();
    $mail['name'] = $info->name;
    $mail['email'] = $info->email;
    $mail['phone'] = $info->phone;
    $mail['company'] = $info->company;
    $mail['blog'] = $info->blog_name;
    $mail['designation'] = $info->designation;
    
    $mail['link'] = $info->whitepaper_download; 

    
    $mail['create_date'] = $info->create_date;
    $mail['subject'] = 'New whitepaper download From '.$wconfig['config_name'];
    $mail['wconfig'] = $wconfig;
    $to = strtolower($wconfig['config_email']);
       
       // email send
     $email = \Config\Services::email();
    $config['mailType'] = 'html';
    $config['wordWrap'] = true;
    $email->initialize($config);
    $email->setFrom($wconfig['sending_email'], $wconfig['config_name']);
    $email->setTo('rakesh.cyberworx@gmail.com');
    $email->setSubject($mail['subject']);
    $message = view('frontend/enquiry_template',$mail);
    $email->setMessage($message);
    $email->send();

    // end
    // send mail to customer
    
    
      $array['status'] = 1;
      $array['link'] = base_url($mail['link']); 
      $array['msg'] = 'Thanks for downloding we have sent a download link to given email address!';
      echo json_encode($array);
      }else{
      $array['status'] = 0;
      $array['msg'] ='Something getting wrong please retry';
      echo json_encode($array); 
      }

   }
}
public function webinar_registration()
{
    if ($this->request->getMethod() !== 'post') {
        return redirect()->to(base_url());
    }

    date_default_timezone_set('Asia/Kolkata');
    
    // Capture our hidden tracking destination URL (fallback to home if empty)
    $redirectUrl = $this->request->getPost('redirect_url') ?? base_url();

    try {
        $save = [
            'name'         => $this->request->getPost('name'),
            'company_name' => $this->request->getPost('lastName'), 
            'title'        => $this->request->getPost('title'),
            'email'        => $this->request->getPost('email'),
            'phone'        => $this->request->getPost('phone'),
            'expectation'  => $this->request->getPost('expectation'),
            'erp_system'   => $this->request->getPost('erp_system'),
            'create_date'  => date('Y-m-d H:i:s')
        ];

        if (empty($save['name']) || empty($save['email']) || empty($save['phone'])) {
            return redirect()->to($redirectUrl)->withInput()->with('webinar_error', 'Please fill out all mandatory registration fields.');
        }

        // Write to your dedicated webinar table database log
        $result = $this->AdminModel->insertData('webinar_registration', $save);

        if ($result) {
            // CRUCIAL: Forces the browser to route straight back to the event detail page layout
            return redirect()->to($redirectUrl)->with('webinar_success', 'Thanks for submitting!');
        } else {
            return redirect()->to($redirectUrl)->withInput()->with('webinar_error', 'Database write error. Please try again.');
        }

    } catch (\Throwable $e) {
        log_message('critical', 'Webinar Absolute Redirection Failure Exception: ' . $e->getMessage());
        return redirect()->to($redirectUrl)->withInput()->with('webinar_error', 'An internal processing error occurred. Please retry.');
    }
}


    
}
