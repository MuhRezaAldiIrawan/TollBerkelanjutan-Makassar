<?php namespace App\Http\Controllers;

	use Session;
	use Request;
	use DB;
	use CRUDBooster;

	class AdminInfoTarif57Controller extends \crocodicstudio\crudbooster\controllers\CBController {

	    public function cbInit() {

			# START CONFIGURATION DO NOT REMOVE THIS LINE
			$this->title_field = "id";
			$this->limit = "20";
			$this->orderby = "id,desc";
			$this->global_privilege = false;
			$this->button_table_action = true;
			$this->button_bulk_action = true;
			$this->button_action_style = "button_icon";
			$this->button_add = true;
			$this->button_edit = true;
			$this->button_delete = true;
			$this->button_detail = true;
			$this->button_show = true;
			$this->button_filter = true;
			$this->button_import = false;
			$this->button_export = false;
			$this->table = "info_tarif";
			# END CONFIGURATION DO NOT REMOVE THIS LINE

			# START COLUMNS DO NOT REMOVE THIS LINE
			$this->col = [];
			$this->col[] = ["label"=>"Gerbang","name"=>"gerbang"];
			$this->col[] = ["label"=>"Arah","name"=>"arah"];
			$this->col[] = ["label"=>"Total1","name"=>"total1"];
			$this->col[] = ["label"=>"Total2","name"=>"total2"];
			$this->col[] = ["label"=>"Total3","name"=>"total3"];
			$this->col[] = ["label"=>"Total4","name"=>"total4"];
			$this->col[] = ["label"=>"Total5","name"=>"total5"];
			$this->col[] = ["label"=>"Image","name"=>"image","image"=>true];
			# END COLUMNS DO NOT REMOVE THIS LINE

			# START FORM DO NOT REMOVE THIS LINE
			$this->form = [];
			$this->form[] = ['label'=>'Gerbang','name'=>'gerbang','type'=>'text','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Image','name'=>'image','type'=>'upload','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Arah','name'=>'arah','type'=>'text','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Ruas','name'=>'ruas','type'=>'text','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Golongan1','name'=>'golongan1','type'=>'number','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Golongan2','name'=>'golongan2','type'=>'number','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Golongan3','name'=>'golongan3','type'=>'number','width'=>'col-sm-10','help'=>'File types support : JPG, JPEG, PNG, GIF, BMP'];
			$this->form[] = ['label'=>'Golongan4','name'=>'golongan4','type'=>'number','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Golongan5','name'=>'golongan5','type'=>'number','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Integrasi','name'=>'integrasi','type'=>'text','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Gol1 Int','name'=>'gol1_int','type'=>'number','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Gol2 Int','name'=>'gol2_int','type'=>'number','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Gol3 Int','name'=>'gol3_int','type'=>'number','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Gol4 Int','name'=>'gol4_int','type'=>'number','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Gol5 Int','name'=>'gol5_int','type'=>'number','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Total','name'=>'total','type'=>'text','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Total1','name'=>'total1','type'=>'number','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Total2','name'=>'total2','type'=>'number','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Total3','name'=>'total3','type'=>'number','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Total4','name'=>'total4','type'=>'number','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Total5','name'=>'total5','type'=>'number','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Location','name'=>'location','type'=>'text','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Maps','name'=>'maps','type'=>'text','width'=>'col-sm-10'];
			# END FORM DO NOT REMOVE THIS LINE

			# OLD START FORM
			//$this->form = [];
			//$this->form[] = ['label'=>'Gerbang','name'=>'gerbang','type'=>'text','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Image','name'=>'image','type'=>'upload','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Ruas','name'=>'ruas','type'=>'text','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Golongan1','name'=>'golongan1','type'=>'number','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Golongan2','name'=>'golongan2','type'=>'number','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Golongan3','name'=>'golongan3','type'=>'number','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Golongan4','name'=>'golongan4','type'=>'number','width'=>'col-sm-10','help'=>'File types support : JPG, JPEG, PNG, GIF, BMP'];
			//$this->form[] = ['label'=>'Golongan5','name'=>'golongan5','type'=>'number','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Integrasi','name'=>'integrasi','type'=>'text','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Gol1 Int','name'=>'gol1_int','type'=>'number','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Gol2 Int','name'=>'gol2_int','type'=>'number','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Gol3 Int','name'=>'gol3_int','type'=>'number','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Gol4 Int','name'=>'gol4_int','type'=>'number','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Gol5 Int','name'=>'gol5_int','type'=>'number','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Total','name'=>'total','type'=>'text','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Total1','name'=>'total1','type'=>'number','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Total2','name'=>'total2','type'=>'number','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Total3','name'=>'total3','type'=>'number','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Total4','name'=>'total4','type'=>'number','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Total5','name'=>'total5','type'=>'number','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Location','name'=>'location','type'=>'text','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Maps','name'=>'maps','type'=>'text','width'=>'col-sm-10'];
			# OLD END FORM

			/* 
	        | ---------------------------------------------------------------------- 
	        | Sub Module
	        | ----------------------------------------------------------------------     
			| @label          = Label of action 
			| @path           = Path of sub module
			| @foreign_key 	  = foreign key of sub table/module
			| @button_color   = Bootstrap Class (primary,success,warning,danger)
			| @button_icon    = Font Awesome Class  
			| @parent_columns = Sparate with comma, e.g : name,created_at
	        | 
	        */
	        $this->sub_module = array();


	        /* 
	        | ---------------------------------------------------------------------- 
	        | Add More Action Button / Menu
	        | ----------------------------------------------------------------------     
	        | @label       = Label of action 
	        | @url         = Target URL, you can use field alias. e.g : [id], [name], [title], etc
	        | @icon        = Font awesome class icon. e.g : fa fa-bars
	        | @color 	   = Default is primary. (primary, warning, succecss, info)     
	        | @showIf 	   = If condition when action show. Use field alias. e.g : [id] == 1
	        | 
	        */
	        $this->addaction = array();


	        /* 
	        | ---------------------------------------------------------------------- 
	        | Add More Button Selected
	        | ----------------------------------------------------------------------     
	        | @label       = Label of action 
	        | @icon 	   = Icon from fontawesome
	        | @name 	   = Name of button 
	        | Then about the action, you should code at actionButtonSelected method 
	        | 
	        */
	        $this->button_selected = array();

	                
	        /* 
	        | ---------------------------------------------------------------------- 
	        | Add alert message to this module at overheader
	        | ----------------------------------------------------------------------     
	        | @message = Text of message 
	        | @type    = warning,success,danger,info        
	        | 
	        */
	        $this->alert        = array();
	                

	        
	        /* 
	        | ---------------------------------------------------------------------- 
	        | Add more button to header button 
	        | ----------------------------------------------------------------------     
	        | @label = Name of button 
	        | @url   = URL Target
	        | @icon  = Icon from Awesome.
	        | 
	        */
	        $this->index_button = array();



	        /* 
	        | ---------------------------------------------------------------------- 
	        | Customize Table Row Color
	        | ----------------------------------------------------------------------     
	        | @condition = If condition. You may use field alias. E.g : [id] == 1
	        | @color = Default is none. You can use bootstrap success,info,warning,danger,primary.        
	        | 
	        */
	        $this->table_row_color = array();     	          

	        
	        /*
	        | ---------------------------------------------------------------------- 
	        | You may use this bellow array to add statistic at dashboard 
	        | ---------------------------------------------------------------------- 
	        | @label, @count, @icon, @color 
	        |
	        */
	        $this->index_statistic = array();



	        /*
	        | ---------------------------------------------------------------------- 
	        | Add javascript at body 
	        | ---------------------------------------------------------------------- 
	        | javascript code in the variable 
	        | $this->script_js = "function() { ... }";
	        |
	        */
	        $this->script_js = NULL;


            /*
	        | ---------------------------------------------------------------------- 
	        | Include HTML Code before index table 
	        | ---------------------------------------------------------------------- 
	        | html code to display it before index table
	        | $this->pre_index_html = "<p>test</p>";
	        |
	        */
	        $this->pre_index_html = null;
	        
	        
	        
	        /*
	        | ---------------------------------------------------------------------- 
	        | Include HTML Code after index table 
	        | ---------------------------------------------------------------------- 
	        | html code to display it after index table
	        | $this->post_index_html = "<p>test</p>";
	        |
	        */
	        $this->post_index_html = null;
	        
	        
	        
	        /*
	        | ---------------------------------------------------------------------- 
	        | Include Javascript File 
	        | ---------------------------------------------------------------------- 
	        | URL of your javascript each array 
	        | $this->load_js[] = asset("myfile.js");
	        |
	        */
	        $this->load_js = array();
	        
	        
	        
	        /*
	        | ---------------------------------------------------------------------- 
	        | Add css style at body 
	        | ---------------------------------------------------------------------- 
	        | css code in the variable 
	        | $this->style_css = ".style{....}";
	        |
	        */
	        $this->style_css = NULL;
	        
	        
	        
	        /*
	        | ---------------------------------------------------------------------- 
	        | Include css File 
	        | ---------------------------------------------------------------------- 
	        | URL of your css each array 
	        | $this->load_css[] = asset("myfile.css");
	        |
	        */
	        $this->load_css = array();
	        
	        
	    }


	    /*
	    | ---------------------------------------------------------------------- 
	    | Hook for button selected
	    | ---------------------------------------------------------------------- 
	    | @id_selected = the id selected
	    | @button_name = the name of button
	    |
	    */
	    public function actionButtonSelected($id_selected,$button_name) {
	        //Your code here
	            
	    }


	    /*
	    | ---------------------------------------------------------------------- 
	    | Hook for manipulate query of index result 
	    | ---------------------------------------------------------------------- 
	    | @query = current sql query 
	    |
	    */
	    public function hook_query_index(&$query) {
	        //Your code here
	            
	    }

	    /*
	    | ---------------------------------------------------------------------- 
	    | Hook for manipulate row of index table html 
	    | ---------------------------------------------------------------------- 
	    |
	    */    
	    public function hook_row_index($column_index,&$column_value) {	        
	    	//Your code here
	    }

	    /*
	    | ---------------------------------------------------------------------- 
	    | Hook for manipulate data input before add data is execute
	    | ---------------------------------------------------------------------- 
	    | @arr
	    |
	    */
	    public function hook_before_add(&$postdata) {        
	        //Your code here

	    }

	    /* 
	    | ---------------------------------------------------------------------- 
	    | Hook for execute command after add public static function called 
	    | ---------------------------------------------------------------------- 
	    | @id = last insert id
	    | 
	    */
	    public function hook_after_add($id) {        
	        //Your code here

	    }

	    /* 
	    | ---------------------------------------------------------------------- 
	    | Hook for manipulate data input before update data is execute
	    | ---------------------------------------------------------------------- 
	    | @postdata = input post data 
	    | @id       = current id 
	    | 
	    */
	    public function hook_before_edit(&$postdata,$id) {        
	        //Your code here

	    }

	    /* 
	    | ---------------------------------------------------------------------- 
	    | Hook for execute command after edit public static function called
	    | ----------------------------------------------------------------------     
	    | @id       = current id 
	    | 
	    */
	    public function hook_after_edit($id) {
	        //Your code here 

	    }

	    /* 
	    | ---------------------------------------------------------------------- 
	    | Hook for execute command before delete public static function called
	    | ----------------------------------------------------------------------     
	    | @id       = current id 
	    | 
	    */
	    public function hook_before_delete($id) {
	        //Your code here

	    }

	    /* 
	    | ---------------------------------------------------------------------- 
	    | Hook for execute command after delete public static function called
	    | ----------------------------------------------------------------------     
	    | @id       = current id 
	    | 
	    */
	    public function hook_after_delete($id) {
	        //Your code here

	    }



	    //By the way, you can still create your own method in here... :) 


	}