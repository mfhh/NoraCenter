<?php namespace App\Http\Controllers;

	use Session;
	use Illuminate\Http\Request;
	use DB;
	use CRUDBooster;
  use NoraCenter;
  use App\Http\Controllers\Notification;

	class AdminTrainersPaymentsController extends \crocodicstudio\crudbooster\controllers\CBController {

	    public function cbInit() {

			# START CONFIGURATION DO NOT REMOVE THIS LINE
			$this->title_field = "name";
			$this->limit = "20";
			$this->orderby = "id,desc";
			$this->global_privilege = true;
			$this->button_table_action = true;
			$this->button_bulk_action = true;
			$this->button_action_style = "button_icon";
			$this->button_add = false;
			$this->button_edit = false;
			$this->button_delete = false;
			$this->button_detail = false;
			$this->button_show = false;
			$this->button_filter = true;
			$this->button_import = false;
			$this->button_export = false;
			$this->table = "groups";
			# END CONFIGURATION DO NOT REMOVE THIS LINE

			# START COLUMNS DO NOT REMOVE THIS LINE
			$this->col = [];
			$this->col[] = ["label"=>"Group NO","name"=>"id"];
			$this->col[] = ["label"=>"Name","name"=>"name"];
			// $this->col[] = ["label"=>"Course","name"=>"courses_id","join"=>"courses,name"];
			$this->col[] = ["label"=>"Trainer","name"=>"trainers_id","join"=>"cms_users,name"];
			$this->col[] = ["label"=>"Pricer","name"=>"price_trainer"];
			$this->col[] = ["label"=>"Price Paid","name"=>"price_trainer_paid"];
			$this->col[] = ["label"=>"Price Remaining","name"=>"price_trainer_remaining"];
			# END COLUMNS DO NOT REMOVE THIS LINE

			# START FORM DO NOT REMOVE THIS LINE
			$this->form = [];

			# END FORM DO NOT REMOVE THIS LINE

			# OLD START FORM
			//$this->form = [];
			//$this->form[] = ["label"=>"Name","name"=>"name","type"=>"text","required"=>TRUE,"validation"=>"required|string|min:3|max:70","placeholder"=>"فضلا ادخل احرف فقط"];
			//$this->form[] = ["label"=>"Branches Id","name"=>"branches_id","type"=>"select2","required"=>TRUE,"validation"=>"required|integer|min:0","datatable"=>"branches,name"];
			//$this->form[] = ["label"=>"Courses Id","name"=>"courses_id","type"=>"select2","required"=>TRUE,"validation"=>"required|integer|min:0","datatable"=>"courses,name"];
			//$this->form[] = ["label"=>"Classroom Lectures Id","name"=>"classroom_lectures_id","type"=>"select2","required"=>TRUE,"validation"=>"required|integer|min:0","datatable"=>"classroom_lectures,id"];
			//$this->form[] = ["label"=>"Trainers Id","name"=>"trainers_id","type"=>"select2","required"=>TRUE,"validation"=>"required|integer|min:0","datatable"=>"trainers,id"];
			//$this->form[] = ["label"=>"Trainee Max","name"=>"trainee_max","type"=>"number","required"=>TRUE,"validation"=>"required|integer|min:0"];
			//$this->form[] = ["label"=>"Vacant Seats","name"=>"vacant_seats","type"=>"number","required"=>TRUE,"validation"=>"required|integer|min:0"];
			//$this->form[] = ["label"=>"Fees","name"=>"fees","type"=>"money","required"=>TRUE,"validation"=>"required|integer|min:0"];
			//$this->form[] = ["label"=>"Percentage Of Trainer","name"=>"percentage_of_trainer","type"=>"number","required"=>TRUE,"validation"=>"required|integer|min:0"];
			//$this->form[] = ["label"=>"Amount Paid","name"=>"amount_paid","type"=>"money","required"=>TRUE,"validation"=>"required|integer|min:0"];
			//$this->form[] = ["label"=>"Amount Remailing","name"=>"amount_remailing","type"=>"money","required"=>TRUE,"validation"=>"required|integer|min:0"];
			//$this->form[] = ["label"=>"Amount Subtotal","name"=>"amount_subtotal","type"=>"money","required"=>TRUE,"validation"=>"required|integer|min:0"];
			//$this->form[] = ["label"=>"Discount Amount","name"=>"discount_amount","type"=>"money","required"=>TRUE,"validation"=>"required|integer|min:0"];
			//$this->form[] = ["label"=>"Amount Total","name"=>"amount_total","type"=>"money","required"=>TRUE,"validation"=>"required|integer|min:0"];
			//$this->form[] = ["label"=>"Price Trainer","name"=>"price_trainer","type"=>"money","required"=>TRUE,"validation"=>"required|integer|min:0"];
			//$this->form[] = ["label"=>"Status","name"=>"status","type"=>"text","required"=>TRUE,"validation"=>"required|min:1|max:255"];
			//$this->form[] = ["label"=>"Price Trainer Paid","name"=>"price_trainer_paid","type"=>"money","required"=>TRUE,"validation"=>"required|integer|min:0"];
			//$this->form[] = ["label"=>"Price Trainer Remaining","name"=>"price_trainer_remaining","type"=>"money","required"=>TRUE,"validation"=>"required|integer|min:0"];
			//$this->form[] = ["label"=>"Marketing Value","name"=>"marketing_value","type"=>"money","required"=>TRUE,"validation"=>"required|integer|min:0"];
			//$this->form[] = ["label"=>"Type Booking","name"=>"type_booking","type"=>"text","required"=>TRUE,"validation"=>"required|min:1|max:255"];
			//$this->form[] = ["label"=>"Proposed Time","name"=>"proposed_time","type"=>"text","required"=>TRUE,"validation"=>"required|min:1|max:255"];
			//$this->form[] = ["label"=>"Register Fees","name"=>"register_fees","type"=>"text","required"=>TRUE,"validation"=>"required|min:1|max:255"];
			//$this->form[] = ["label"=>"Certificate Fees","name"=>"certificate_fees","type"=>"text","required"=>TRUE,"validation"=>"required|min:1|max:255"];
			//$this->form[] = ["label"=>"Certificate Status","name"=>"certificate_status","type"=>"text","required"=>TRUE,"validation"=>"required|min:1|max:255"];
			//$this->form[] = ["label"=>"Fees Paid","name"=>"fees_paid","type"=>"money","required"=>TRUE,"validation"=>"required|integer|min:0"];
			//$this->form[] = ["label"=>"Fees Remaining","name"=>"fees_remaining","type"=>"money","required"=>TRUE,"validation"=>"required|integer|min:0"];
			//$this->form[] = ["label"=>"Fees Total","name"=>"fees_total","type"=>"money","required"=>TRUE,"validation"=>"required|integer|min:0"];
			//$this->form[] = ["label"=>"Register Fees Paid","name"=>"register_fees_paid","type"=>"money","required"=>TRUE,"validation"=>"required|integer|min:0"];
			//$this->form[] = ["label"=>"Register Fees Remaining","name"=>"register_fees_remaining","type"=>"money","required"=>TRUE,"validation"=>"required|integer|min:0"];
			//$this->form[] = ["label"=>"Register Fees Total","name"=>"register_fees_total","type"=>"money","required"=>TRUE,"validation"=>"required|integer|min:0"];
			//$this->form[] = ["label"=>"Certificate Fees Paid","name"=>"certificate_fees_paid","type"=>"money","required"=>TRUE,"validation"=>"required|integer|min:0"];
			//$this->form[] = ["label"=>"Certificate Fees Remaining","name"=>"certificate_fees_remaining","type"=>"money","required"=>TRUE,"validation"=>"required|integer|min:0"];
			//$this->form[] = ["label"=>"Certificate Fees Total","name"=>"certificate_fees_total","type"=>"money","required"=>TRUE,"validation"=>"required|integer|min:0"];
			//$this->form[] = ["label"=>"Publication","name"=>"publication","type"=>"text","required"=>TRUE,"validation"=>"required|min:1|max:255"];
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
          $this->addaction[] = ['label'=>'Details','icon'=>'fa fa-arrows-alt','color'=>'primary','url'=>CRUDBooster::mainpath('getPay').'/[id]','showIf'=>"CRUDBooster::myPrivilegeId() == 1"];
          $this->addaction[] = ['label'=>'Details','icon'=>'fa fa-arrows-alt','color'=>'primary','url'=>CRUDBooster::mainpath('getPay').'/[id]','showIf'=>"CRUDBooster::myPrivilegeId() == 2"];
          $this->addaction[] = ['label'=>'Details','icon'=>'fa fa-arrows-alt','color'=>'primary','url'=>CRUDBooster::mainpath('getPay').'/[id]','showIf'=>"CRUDBooster::myPrivilegeId() == 4"];
          // $this->addaction[] = ['label'=>'Print Receipt','icon'=>'fa fa-print','color'=>'info','url'=>CRUDBooster::adminPath('receipt/trainers/').'/[id]', 'confirmation' => true ];


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

          $query->where('price_trainer_remaining','<>',0);

          if (CRUDBooster::myPrivilegeName() == 'Trainer') {
	           $query->where('trainers_id',CRUDBooster::myId());
          }

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


      public function getPay($id) {

        $this->cbLoader();
        $module = CRUDBooster::getCurrentModule();
        $row = DB::table($this->table)->where($this->primary_key, $id)->first();
        if (! CRUDBooster::isUpdate()) {
            CRUDBooster::insertLog(trans('crudbooster.log_try_view', ['name' => $row->{$this->title_field},'module' => $module->name]));
            CRUDBooster::redirect(CRUDBooster::adminPath(), trans('crudbooster.denied_access'));
        }

				$data['row'] = DB::table('groups')
				->where('id',$id)
				->first();
        $this->button_addmore = FALSE;
        $this->button_cancel  = TRUE;
        $this->button_show    = FALSE;
        $this->button_add     = FALSE;
        $this->button_delete  = FALSE;

				$this->cbView('account.trainer_accounts',$data);
	    }

      public function pay(Request $request){

        $this->cbLoader();
        $module = CRUDBooster::getCurrentModule();
        $row = DB::table($this->table)->where($this->primary_key, $request->groups_id)->first();
        if (! CRUDBooster::isUpdate()) {
            CRUDBooster::insertLog(trans('crudbooster.log_try_view', ['name' => $row->{$this->title_field},'module' => $module->name]));
            CRUDBooster::redirect(CRUDBooster::adminPath(), trans('crudbooster.denied_access'));
        }

        $result = NoraCenter::payFeesTrainer($request->groups_id, $request->pay);
        if (!$result) {
          CRUDBooster::redirect(CRUDBooster::adminPath('trainers_payments/getPay/'.$request->groups_id),'Wrong Bay','warning');
        }

        $group = DB::table('groups')->where('id',$request->groups_id)->first();
        $trainer_name = DB::table('cms_users')->where('id',$group->trainers_id)->value('name');

        // Notification
        if ($request->pay != 0) {
          $postdata = [];
          $postdata['id_cms_users'] = $group->trainers_id;
          $postdata['groups_name'] = $group->name;
          $postdata['amount'] = $request->pay;
          Notification::payGroupsFeesTrainers($postdata);
        }

        // add log user amount trainee_name groups_name
        CRUDBooster::insertLog(trans("notification.logPayGroupsFeesTrainers", ['trainer_name'=>$trainer_name,'groups_name'=>$group->name,'amount' => $request->pay]));

        CRUDBooster::redirect(CRUDBooster::adminPath('trainers_payments'),'Good work, Payment trainer  successfully','success');

    }
	    //By the way, you can still create your own method in here... :)


	}
