<?php

$config = [
	'register' => [
		[	'field' => 'u_name' ,
		 	'label' => 'Name' ,
		 	'rules' => 'required|min_length[2]'
		],
		[	'field' => 'u_email' ,
		 	'label' => 'Email-Id' ,
		 	'rules' => 'required|valid_email|is_unique[registration.u_email]'
		],
		[	'field' => 'u_password' ,
		 	'label' => 'Password' ,
		 	'rules' => 'required|min_length[6]|max_length[16]'
		],
		[	'field' => 'u_phone' ,
		 	'label' => 'Phone No.' ,
		 	'rules' => 'required|numeric|exact_length[10]'
		],
		[	'field' => 'u_address' ,
		 	'label' => 'Address' ,
		 	'rules' => 'required|min_length[30]|max_length[300]'
		],
		[	'field' => 'u_pincode' ,
		 	'label' => 'Pincode' ,
		 	'rules' => 'required|min_length[6]|max_length[9]'
		]
	],

	'u_login' => [
		[	'field' => 'u_email',
			'label' => 'Email OR Mobile',
			'rules' => 'required'	
		],
		[	'field' => 'u_password',
			'label' => 'Password',
			'rules' => 'required'	
		]
	],

	'a_login' => [
		[	'field' => 'admin_user',
			'label' => 'admin_user',
			'rules' => 'required'	
		],
		[	'field' => 'admin_password',
			'label' => 'Password',
			'rules' => 'required'	
		]
	],

	// ADD BRAND PAGE FORM VALIDATION
	'brand' => [
		[	'field' => 'brand_name',
			'label' => 'Brand-Name',
			'rules' => 'required|alpha|is_unique[brand.brand_name]'	
		],
		[	'field' => 'brand_description',
			'label' => 'Description',
			'rules' => 'required|min_length[20]'	
		],
		[	'field' => 'status',
			'label' => 'Status',
			'rules' => 'required'	
		]
	],

	'add_model' => [
		[	'field' => 'model_name',
			'label' => 'Model Name',
			'rules' => 'required'	
		],
		[	'field' => 'model_description',
			'label' => 'Model Description',
			'rules' => 'required'//min length add 	
		],
		[	'field' => 'status',
			'label' => 'Status',
			'rules' => 'required'	
		],
		[	'field' => 'meta_title',
			'label' => 'Meta Title',
			'rules' => 'required'	
		],
		[	'field' => 'meta_description',
			'label' => 'Meta Description',
			'rules' => 'required'//min length add 	
		],
		[	'field' => 'meta_keywords',
			'label' => 'Meta Meywords',
			'rules' => 'required'	
		],
	],

	'add_access' => [
		[	'field' => 'model_id[]',
			'label' => 'Select Model',
			'rules' => 'required'	
		],
		[	'field' => 'a_name',
			'label' => 'Accessories Name',
			'rules' => 'required|min_length[2]'//min length add 	
		],
		[	'field' => 'a_original',
			'label' => 'Status',
			'rules' => 'required|numeric'	
		],
		[	'field' => 'a_price',
			'label' => 'Meta Title',
			'rules' => 'required|numeric'	
		],
		[	'field' => 'a_discount',
			'label' => 'Meta Description',
			'rules' => 'required|numeric'//min length add 	
		],
		[	'field' => 'a_description',
			'label' => 'Meta Description',
			'rules' => 'required'//min length add 	
		],
		[	'field' => 'a_kit',
			'label' => 'Meta Meywords',
			'rules' => 'required'	
		],
		[	'field' => 'status',
			'label' => 'Status',
			'rules' => 'required'	
		],
		[	'field' => 'meta_title',
			'label' => 'Meta Title',
			'rules' => 'required|min_length[4]'	
		],
		[	'field' => 'meta_description',
			'label' => 'Meta Description',
			'rules' => 'required'//min length add 	
		],
		[	'field' => 'meta_keywords',
			'label' => 'Meta Meywords',
			'rules' => 'required'	
		]

	],

	'add_user' => [
		['field' => 'u_name' , 'label' => 'Name' , 'rules' => 'required|min_length[2]' ],
		['field' => 'u_email' , 'label' => 'Email' , 'rules' => 'required|is_unique[user_details.u_email]'],
		['field' => 'u_password' , 'label' => 'Password' , 'rules' => 'required|min_length[6]|max_length[16]'],
		['field' => 'u_phone' , 'label' => 'Phone' , 'rules' => 'required|numeric|exact_length[10]'],
		['field' => 'u_city' , 'label' => 'City' , 'rules' => 'required'],
		['field' => 'u_state' , 'label' => 'State' , 'rules' => 'required'],
		['field' => 'status' , 'label' => 'Status' , 'rules' => 'required'],
		['field' => 'u_address' , 'label' => 'Address' , 'rules' => 'required']
	],

	'edit_user' => [
		['field' => 'u_name' , 'label' => 'Name' , 'rules' => 'required|min_length[2]' ],
		['field' => 'u_email' , 'label' => 'Email' , 'rules' => 'required'],
		['field' => 'u_password' , 'label' => 'Password' , 'rules' => 'required|min_length[6]|max_length[16]'],
		['field' => 'u_phone' , 'label' => 'Phone' , 'rules' => 'required|numeric|exact_length[10]'],
		['field' => 'u_city' , 'label' => 'City' , 'rules' => 'required'],
		['field' => 'u_state' , 'label' => 'State' , 'rules' => 'required'],
		['field' => 'status' , 'label' => 'Status' , 'rules' => 'required'],
		['field' => 'u_address' , 'label' => 'Address' , 'rules' => 'required']
	],

	'contact_us' => [
		['field' => 'c_name' , 'label' => 'Name' , 'rules' => 'required|min_length[2]'],
		['field' => 'cc_name' , 'label' => 'Compny Name' , 'rules' => 'required|min_length[4]'],
		['field' => 'c_email' , 'label' => 'Email' , 'rules' => 'required|valid_email'],
		['field' => 'c_mobile' , 'label' => 'Mobile' , 'rules' => 'required|numeric|exact_length[10]'],
		['field' => 'c_phone' , 'label' => 'Phone' , 'rules' => 'required|numeric|exact_length[11]'],
		['field' => 'c_subject' , 'label' => 'Subject' , 'rules' => 'required'],
		['field' => 'country' , 'label' => 'Country' , 'rules' => 'required'],
		['field' => 'state' , 'label' => 'State' , 'rules' => 'required'],
		['field' => 'city' , 'label' => 'City' , 'rules' => 'required|min_length[2]'],
		['field' => 'zip_pincode' , 'label' => 'Zip-Pincode' , 'rules' => 'required|numeric|exact_length[6]'],
		['field' => 'message' , 'label' => 'Message' , 'rules' => 'required|min_length[10]']
	],

	'profile_detail' => [
		['field' => 'u_name', 'label' => 'Name', 'rules' => 'required|min_length[2]'],
		['field' => 'u_phone', 'label' => 'Phone', 'rules' => 'required|exact_length[10]'],
		['field' => 'u_email', 'label' => 'Email', 'rules' => 'required|valid_email'],
		['field' => 'u_address', 'label' => 'Address', 'rules' => 'required|min_length[10]'],
		['field' => 'u_pincode', 'label' => 'Pincode', 'rules' => 'required|numeric|exact_length[6]'],
		['field' => 'country', 'label' => 'Country', 'rules' => 'required'],
		['field' => 'state', 'label' => 'State', 'rules' => 'required'],
		['field' => 'city', 'label' => 'City', 'rules' => 'required|min_length[2]']
	],

	'profile_password' => [
		['field' => 'c_pass', 'label' => 'Current Password', 'rules' => 'required'],
		['field' => 'n_pass', 'label' => 'New Password', 'rules' => 'required'],
		['field' => 'r_pass', 'label' => 'Re-type Password', 'rules' => 'required|matches[n_pass]']
	],

	'shipping_details' => [
		['field' => 'billing_name' 		, 'label' => 'Billing Name' 		, 'rules' => 'required|min_length[2]' ],
		['field' => 'billing_email' 	, 'label' => 'Billing Email' 		, 'rules' => 'required|valid_email' ],
		['field' => 'billing_tel' 		, 'label' => 'Billing Phone' 		, 'rules' => 'required|numeric|exact_length[10]' ],
		['field' => 'billing_address' 	, 'label' => 'Billing Address' 		, 'rules' => 'required|min_length[10]' ],
		['field' => 'billing_city' 		, 'label' => 'Billing City' 		, 'rules' => 'required' ],
		['field' => 'billing_state' 	, 'label' => 'Billing State' 		, 'rules' => 'required' ],
		['field' => 'billing_zip' 		, 'label' => 'Billing Pincode/Zip' 	, 'rules' => 'required|numeric|exact_length[6]' ],
		['field' => 'billing_country' 	, 'label' => 'Billing Country' 		, 'rules' => 'required' ],
	]
];



?>