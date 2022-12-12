<?php
	if(empty($_title)) 			$_title ='';
	if(empty($_keywords)) 		$_keywords ='';
	if(empty($_description)) 	$_description ='';
?>
    <title>restaurantfrench</title>
    <meta name="keywords" content="<?php echo $_keywords;?>" />
    <meta name="description" content="<?php echo $_description;?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robot" content="index, follow" />
    <meta name="generator" content="Brackets">
    <meta name='copyright' content='Orange Technology Solution co.,ltd.'>
    <meta name='designer' content='Chayanee W.'>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/css/bootstrap.css')}}">
    <link type="text/css" rel="stylesheet" href="{{asset('frontend/css/Frenchlayout.css')}}" media="screen,projection" />
    <link type="image/ico" rel="shortcut icon" href="{{asset('frontend/images/favicon.ico')}}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.9.0/css/all.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.9.0/css/v4-shims.css">   
    
    <script src="{{asset('frontend/js/jquery-3.3.1.slim.min.js')}}"></script>
    <script src="{{asset('frontend/js/jquery.min.js')}}"></script>
    <script src="{{asset('frontend/js/jquery-ui.js')}}"></script>
    <script src="{{asset('frontend/js/popper.min.js')}}"></script>
    <script src="{{asset('frontend/js/bootstrap.min.js')}}"></script>

    <!-- FLEXSLIDER -->
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/flexslider/flexslider.css')}}">
    <script src="{{asset('frontend/flexslider/jquery.flexslider.js')}}"></script>
    
    <!-- WOW -->
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/wow-master/css/animate.css')}}">
    <script src="{{asset('frontend/wow-master/dist/wow.min.js')}}"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>