<?php
//defined('SAFE_CALL') OR exit('No direct script access allowed');

//require_once __DIR__.'/../../setting/config.php';
require_once __DIR__.'/../../core/Controller.php';
require_once __DIR__.'/../../core/View.php';
require_once __DIR__.'/../../public/models/ActionModel.php';
require_once __DIR__.'/../../library/Simple_PDF.php';

use SimpleLibrary\Simple_PDF ; 

class ReportGenerate extends Controller{
    private function init_class(){
    }
    
    public function __construct() {
        parent::__construct();
        $this->init_class();
    }
    
    public function index(){
        
        // process data
        $temp = new ActionModel();
        $this->model = array(
          'temp1' => 'tests1',
          'temp2'=> array('test2'=>'value2',
              'test3'=>'value3'),
        );
        $temp->set_sql('SELECT NOW(), CURDATE(), CURTIME()' );
        $this->model['database_dt'] = $temp->extract_data() ; 
/*
        $temp->set_sql('SELECT USER(), CURRENT_USER(),DATABASE()' );
        $this->model['database_detail'] = $temp->extract_data() ; 
        
        $temp->set_sql('SELECT * FROM action_codes');
        $this->model['action'] = $temp->extract_data() ; 
*/       
        // generate view/ display
        $this->view = new View();
        $this->view->use_template(true);
        $this->view->set_page_title('just a testing page');
        
        //$this->view->skip_cert($certskip);
        //$url_show = 'http://localhost/agsap/view/welcome.php' ; 
        $url_show = '../public/view/welcome.php' ; 
        //$url_show = 'https://www.publicgold.com.my/cart1/view/welcome.php' ; 

        //echo $this->view->show_page(${'url_show'},$this->model );
        echo $this->view->show_page($url_show,$this->model );

        // push display into pdf file
//        $pdf_output = new Simple_PDF('a','a');
    }
    
    public function temp($parameter1='a'){
        echo "parameter 1 : $parameter1";
    }
    public function temp2($parameter1='a',$parameter2='b'){
        echo "parameter 1 : $parameter1";
        echo "parameter 2 : $parameter2";
    }

/*
    //Target our class
    $reflector = new ReflectionClass('View');

    //Get the parameters of a method
    $parameters1 = $reflector->getMethod('show_page')->getParameters();

    //Loop through each parameter and get the type
    foreach($parameters1 as $param)
    {
         //Before you call getClass() that class must be defined!
        echo $param->name;
        //echo var_dump($param);
    }
*/    
}
/*
$temp = new ReportGenerate();

$temp->index();
 
 */