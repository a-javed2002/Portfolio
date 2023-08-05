<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta charset="utf-8">
    <meta name="keywords" content="" />
	<meta name="author" content="" />
	<meta name="robots" content="" />
    <meta name="viewport" content="width=device-width,initial-scale=1">
	<meta name="description" content="Chrev - Crypto Codeigniter Admin Dashboard" />
	<meta property="og:title" content="Chrev - Crypto Codeigniter Admin Dashboard" />
	<meta property="og:description" content="Chrev - Crypto Codeigniter Admin Dashboard" />
	<meta property="og:image" content="../social-image.html" />
	<meta name="format-detection" content="telephone=no">
    <title>Chrev - Crypto Codeigniter Admin Dashboard </title>
    <!-- Favicon icon -->
	
	<link rel="icon" type="image/png" sizes="16x16" href="public/assets/images/favicon.png">	
	
		
		 <link href="public/assets/vendor/star-rating/star-rating-svg.css" rel="stylesheet" type="text/css"/>	
			
		 <link href="public/assets/vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet" type="text/css"/>	
		
		 <link href="public/assets/css/style.css" rel="stylesheet" type="text/css"/>	
		
</head>
<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->
	
	<!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">
		<!--**********************************
	Nav header start
***********************************-->
<div class="nav-header">
	<a href="index.html" class="brand-logo">
		<svg class="logo-abbr" width="52" height="52" fill="none" xmlns="http://www.w3.org/2000/svg"><path class="svg-logo-primary-path" fill="url(#paint0_linear)" d="M0 0h52v52H0z"/><path class="svg-icon-text" d="M14 24.708c0-1.536.288-3.06.864-4.572.576-1.536 1.416-2.904 2.52-4.104 1.104-1.2 2.448-2.172 4.032-2.916C23 12.372 24.8 12 26.816 12c2.4 0 4.476.516 6.228 1.548 1.776 1.032 3.096 2.376 3.96 4.032l-4.536 3.168c-.288-.672-.66-1.224-1.116-1.656-.432-.456-.912-.816-1.44-1.08-.528-.288-1.068-.48-1.62-.576-.552-.12-1.092-.18-1.62-.18-1.128 0-2.112.228-2.952.684-.84.456-1.536 1.044-2.088 1.764s-.96 1.536-1.224 2.448c-.264.912-.396 1.836-.396 2.772 0 1.008.156 1.98.468 2.916.312.936.756 1.764 1.332 2.484.6.72 1.308 1.296 2.124 1.728.84.408 1.776.612 2.808.612.528 0 1.068-.06 1.62-.18.576-.144 1.116-.348 1.62-.612.528-.288 1.008-.648 1.44-1.08.432-.456.78-1.008 1.044-1.656l4.824 2.844c-.384.936-.96 1.776-1.728 2.52-.744.744-1.608 1.368-2.592 1.872s-2.028.888-3.132 1.152c-1.104.264-2.184.396-3.24.396-1.848 0-3.552-.372-5.112-1.116-1.536-.768-2.868-1.776-3.996-3.024-1.104-1.248-1.968-2.664-2.592-4.248-.6-1.584-.9-3.192-.9-4.824z" fill="white"/><path  class="svg-icon-text" d="M11 12h15v3H11v-3zM6 24h19v2H6v-2zM15 34h19v2H15v-2z" fill="white"/><path d="M6 24h9v1H6v-1z" fill="white"/><defs><linearGradient id="paint0_linear" x1="26" y1="0" x2="44" y2="62.5" gradientUnits="userSpaceOnUse"><stop stop-color="#6418C3"/><stop offset="1" stop-color="#6418C3"/></linearGradient></defs></svg>
		
		<svg class="brand-title" width="80" height="22" fill="none" xmlns="http://www.w3.org/2000/svg"><path class="svg-logo-text" d="M.756 10.892c0-1.19467.224-2.38.672-3.556.448-1.176 1.10133-2.24 1.96-3.192s1.904-1.708 3.136-2.268c1.232-.57867 2.632-.868 4.2-.868 1.848 0 3.4627.40133 4.844 1.204 1.3813.80267 2.408 1.848 3.08 3.136L15.12 7.812c-.2987-.69067-.7-1.232-1.204-1.624-.504-.41067-1.0453-.69067-1.624-.84-.5787-.168-1.1387-.252-1.68-.252-1.176 0-2.14667.29867-2.912.896-.76533.59733-1.33467 1.35333-1.708 2.268-.37333.91467-.56 1.848-.56 2.8 0 1.0453.21467 2.0347.644 2.968.42933.9147 1.036 1.652 1.82 2.212.784.56 1.708.84 2.772.84.56 0 1.1293-.084 1.708-.252.5787-.1867 1.1107-.4853 1.596-.896.504-.4107.8867-.9427 1.148-1.596l3.752 2.212c-.392.9893-1.036 1.8293-1.932 2.52-.896.672-1.9133 1.1947-3.052 1.568-1.12.3547-2.2307.532-3.332.532-1.43733 0-2.75333-.2893-3.948-.868-1.19467-.5973-2.23067-1.3813-3.108-2.352-.87733-.9893-1.55867-2.0907-2.044-3.304-.466667-1.232-.7-2.4827-.7-3.752zM34.9853 21h-4.48v-8.26c0-.952-.196-1.652-.588-2.1-.3733-.448-.8773-.672-1.512-.672-.5226 0-1.1106.2427-1.764.728-.6346.4667-1.0826 1.092-1.344 1.876V21h-4.48V.559999h4.48V8.764c.5227-.87733 1.232-1.54933 2.128-2.016.896-.48533 1.876-.728 2.94-.728.9894 0 1.792.168 2.408.504.616.336 1.0827.784 1.4 1.344.3174.54133.532 1.13867.644 1.792.112.6533.168 1.2973.168 1.932V21zm12.3006-10.864c-1.0827.0187-2.0627.196-2.94.532-.8774.336-1.512.84-1.904 1.512V21h-4.48V6.3h4.116v2.968c.504-.98933 1.1573-1.764 1.96-2.324.8026-.56 1.6426-.84933 2.52-.868.3733 0 .616.00933.728.028v4.032zm8.8055 11.144c-1.6613 0-3.08-.3453-4.256-1.036-1.176-.6907-2.0813-1.6053-2.716-2.744-.616-1.1387-.924-2.3707-.924-3.696 0-1.4187.308-2.716.924-3.892.616-1.176 1.512-2.11867 2.688-2.828 1.176-.70933 2.604-1.064 4.284-1.064 1.6614 0 3.08.35467 4.256 1.064 1.176.70933 2.0627 1.64267 2.66 2.8.616 1.1573.924 2.3987.924 3.724 0 .5413-.0373 1.0173-.112 1.428h-10.864c.0747.9893.4294 1.7453 1.064 2.268.6534.504 1.3907.756 2.212.756.6534 0 1.2787-.1587 1.876-.476.5974-.3173 1.008-.7467 1.232-1.288l3.808 1.064c-.5786 1.1573-1.484 2.1-2.716 2.828-1.2133.728-2.66 1.092-4.34 1.092zm-3.248-8.988h6.384c-.0933-.9333-.4386-1.6707-1.036-2.212-.5786-.56-1.2973-.84-2.156-.84-.8586 0-1.5866.28-2.184.84-.5786.56-.9146 1.2973-1.008 2.212zM69.3324 21l-5.208-14.7h4.62l3.22 10.668 3.22-10.668h4.2l-5.18 14.7h-4.872z" fill="#3C4469"/></svg>

	</a>
	<div class="nav-control">
		<div class="hamburger">
			<span class="line"></span><span class="line"></span><span class="line"></span>
		</div>
	</div>
</div>
<!--**********************************
	Nav header end
***********************************-->		<!--**********************************
	Chat box start
***********************************-->
<div class="chatbox">
	<div class="chatbox-close"></div>
	<div class="custom-tab-1">
		<ul class="nav nav-tabs">
			<li class="nav-item">
				<a class="nav-link" data-bs-toggle="tab" href="#notes">Notes</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" data-bs-toggle="tab" href="#alerts">Alerts</a>
			</li>
			<li class="nav-item">
				<a class="nav-link active" data-bs-toggle="tab" href="#chat">Chat</a>
			</li>
		</ul>
		<div class="tab-content">
			<div class="tab-pane fade active show" id="chat" role="tabpanel">
				<div class="card mb-sm-3 mb-md-0 contacts_card dz-chat-user-box">
					<div class="card-header chat-list-header text-center">
						<a href="#"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect fill="#000000" x="4" y="11" width="16" height="2" rx="1"/><rect fill="#000000" opacity="0.3" transform="translate(12.000000, 12.000000) rotate(-270.000000) translate(-12.000000, -12.000000) " x="4" y="11" width="16" height="2" rx="1"/></g></svg></a>
						<div>
							<h6 class="mb-1">Chat List</h6>
							<p class="mb-0">Show All</p>
						</div>
						<a href="#"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><circle fill="#000000" cx="5" cy="12" r="2"/><circle fill="#000000" cx="12" cy="12" r="2"/><circle fill="#000000" cx="19" cy="12" r="2"/></g></svg></a>
					</div>
					<div class="card-body contacts_body p-0 dz-scroll  " id="DZ_W_Contacts_Body">
						<ul class="contacts">
							<li class="name-first-letter">A</li>
							<li class="active dz-chat-user">
								<div class="d-flex bd-highlight">
									<div class="img_cont">
										<img src="public/assets/images/avatar/1.jpg" class="rounded-circle user_img" alt=""/>
										<span class="online_icon"></span>
									</div>
									<div class="user_info">
										<span>Archie Parker</span>
										<p>Kalid is online</p>
									</div>
								</div>
							</li>
							<li class="dz-chat-user">
								<div class="d-flex bd-highlight">
									<div class="img_cont">
										<img src="public/assets/images/avatar/2.jpg" class="rounded-circle user_img" alt=""/>
										<span class="online_icon offline"></span>
									</div>
									<div class="user_info">
										<span>Alfie Mason</span>
										<p>Taherah left 7 mins ago</p>
									</div>
								</div>
							</li>
							<li class="dz-chat-user">
								<div class="d-flex bd-highlight">
									<div class="img_cont">
										<img src="public/assets/images/avatar/3.jpg" class="rounded-circle user_img" alt=""/>
										<span class="online_icon"></span>
									</div>
									<div class="user_info">
										<span>AharlieKane</span>
										<p>Sami is online</p>
									</div>
								</div>
							</li>
							<li class="dz-chat-user">
								<div class="d-flex bd-highlight">
									<div class="img_cont">
										<img src="public/assets/images/avatar/4.jpg" class="rounded-circle user_img" alt=""/>
										<span class="online_icon offline"></span>
									</div>
									<div class="user_info">
										<span>Athan Jacoby</span>
										<p>Nargis left 30 mins ago</p>
									</div>
								</div>
							</li>
							<li class="name-first-letter">B</li>
							<li class="dz-chat-user">
								<div class="d-flex bd-highlight">
									<div class="img_cont">
										<img src="public/assets/images/avatar/5.jpg" class="rounded-circle user_img" alt=""/>
										<span class="online_icon offline"></span>
									</div>
									<div class="user_info">
										<span>Bashid Samim</span>
										<p>Rashid left 50 mins ago</p>
									</div>
								</div>
							</li>
							<li class="dz-chat-user">
								<div class="d-flex bd-highlight">
									<div class="img_cont">
										<img src="public/assets/images/avatar/1.jpg" class="rounded-circle user_img" alt=""/>
										<span class="online_icon"></span>
									</div>
									<div class="user_info">
										<span>Breddie Ronan</span>
										<p>Kalid is online</p>
									</div>
								</div>
							</li>
							<li class="dz-chat-user">
								<div class="d-flex bd-highlight">
									<div class="img_cont">
										<img src="public/assets/images/avatar/2.jpg" class="rounded-circle user_img" alt=""/>
										<span class="online_icon offline"></span>
									</div>
									<div class="user_info">
										<span>Ceorge Carson</span>
										<p>Taherah left 7 mins ago</p>
									</div>
								</div>
							</li>
							<li class="name-first-letter">D</li>
							<li class="dz-chat-user">
								<div class="d-flex bd-highlight">
									<div class="img_cont">
										<img src="public/assets/images/avatar/3.jpg" class="rounded-circle user_img" alt=""/>
										<span class="online_icon"></span>
									</div>
									<div class="user_info">
										<span>Darry Parker</span>
										<p>Sami is online</p>
									</div>
								</div>
							</li>
							<li class="dz-chat-user">
								<div class="d-flex bd-highlight">
									<div class="img_cont">
										<img src="public/assets/images/avatar/4.jpg" class="rounded-circle user_img" alt=""/>
										<span class="online_icon offline"></span>
									</div>
									<div class="user_info">
										<span>Denry Hunter</span>
										<p>Nargis left 30 mins ago</p>
									</div>
								</div>
							</li>
							<li class="name-first-letter">J</li>
							<li class="dz-chat-user">
								<div class="d-flex bd-highlight">
									<div class="img_cont">
										<img src="public/assets/images/avatar/5.jpg" class="rounded-circle user_img" alt=""/>
										<span class="online_icon offline"></span>
									</div>
									<div class="user_info">
										<span>Jack Ronan</span>
										<p>Rashid left 50 mins ago</p>
									</div>
								</div>
							</li>
							<li class="dz-chat-user">
								<div class="d-flex bd-highlight">
									<div class="img_cont">
										<img src="public/assets/images/avatar/1.jpg" class="rounded-circle user_img" alt=""/>
										<span class="online_icon"></span>
									</div>
									<div class="user_info">
										<span>Jacob Tucker</span>
										<p>Kalid is online</p>
									</div>
								</div>
							</li>
							<li class="dz-chat-user">
								<div class="d-flex bd-highlight">
									<div class="img_cont">
										<img src="public/assets/images/avatar/2.jpg" class="rounded-circle user_img" alt=""/>
										<span class="online_icon offline"></span>
									</div>
									<div class="user_info">
										<span>James Logan</span>
										<p>Taherah left 7 mins ago</p>
									</div>
								</div>
							</li>
							<li class="dz-chat-user">
								<div class="d-flex bd-highlight">
									<div class="img_cont">
										<img src="public/assets/images/avatar/3.jpg" class="rounded-circle user_img" alt=""/>
										<span class="online_icon"></span>
									</div>
									<div class="user_info">
										<span>Joshua Weston</span>
										<p>Sami is online</p>
									</div>
								</div>
							</li>
							<li class="name-first-letter">O</li>
							<li class="dz-chat-user">
								<div class="d-flex bd-highlight">
									<div class="img_cont">
										<img src="public/assets/images/avatar/4.jpg" class="rounded-circle user_img" alt=""/>
										<span class="online_icon offline"></span>
									</div>
									<div class="user_info">
										<span>Oliver Acker</span>
										<p>Nargis left 30 mins ago</p>
									</div>
								</div>
							</li>
							<li class="dz-chat-user">
								<div class="d-flex bd-highlight">
									<div class="img_cont">
										<img src="public/assets/images/avatar/5.jpg" class="rounded-circle user_img" alt=""/>
										<span class="online_icon offline"></span>
									</div>
									<div class="user_info">
										<span>Oscar Weston</span>
										<p>Rashid left 50 mins ago</p>
									</div>
								</div>
							</li>
						</ul>
					</div>
				</div>
				<div class="card chat dz-chat-history-box d-none">
					<div class="card-header chat-list-header text-center">
						<a href="#" class="dz-chat-history-back">
							<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><polygon points="0 0 24 0 24 24 0 24"/><rect fill="#000000" opacity="0.3" transform="translate(15.000000, 12.000000) scale(-1, 1) rotate(-90.000000) translate(-15.000000, -12.000000) " x="14" y="7" width="2" height="10" rx="1"/><path d="M3.7071045,15.7071045 C3.3165802,16.0976288 2.68341522,16.0976288 2.29289093,15.7071045 C1.90236664,15.3165802 1.90236664,14.6834152 2.29289093,14.2928909 L8.29289093,8.29289093 C8.67146987,7.914312 9.28105631,7.90106637 9.67572234,8.26284357 L15.6757223,13.7628436 C16.0828413,14.136036 16.1103443,14.7686034 15.7371519,15.1757223 C15.3639594,15.5828413 14.7313921,15.6103443 14.3242731,15.2371519 L9.03007346,10.3841355 L3.7071045,15.7071045 Z" fill="#000000" fill-rule="nonzero" transform="translate(9.000001, 11.999997) scale(-1, -1) rotate(90.000000) translate(-9.000001, -11.999997) "/></g></svg>
						</a>
						<div>
							<h6 class="mb-1">Chat with Khelesh</h6>
							<p class="mb-0 text-success">Online</p>
						</div>							
						<div class="dropdown">
							<a href="#" data-bs-toggle="dropdown" aria-expanded="false"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><circle fill="#000000" cx="5" cy="12" r="2"/><circle fill="#000000" cx="12" cy="12" r="2"/><circle fill="#000000" cx="19" cy="12" r="2"/></g></svg></a>
							<ul class="dropdown-menu dropdown-menu-end">
								<li class="dropdown-item"><i class="fa fa-user-circle text-primary me-2"></i> View profile</li>
								<li class="dropdown-item"><i class="fa fa-users text-primary me-2"></i> Add to close friends</li>
								<li class="dropdown-item"><i class="fa fa-plus text-primary me-2"></i> Add to group</li>
								<li class="dropdown-item"><i class="fa fa-ban text-primary me-2"></i> Block</li>
							</ul>
						</div>
					</div>
					<div class="card-body msg_card_body dz-scroll" id="DZ_W_Contacts_Body3">
						<div class="d-flex justify-content-start mb-4">
							<div class="img_cont_msg">
								<img src="public/assets/images/avatar/1.jpg" class="rounded-circle user_img_msg" alt=""/>
							</div>
							<div class="msg_cotainer">
								Hi, how are you samim?
								<span class="msg_time">8:40 AM, Today</span>
							</div>
						</div>
						<div class="d-flex justify-content-end mb-4">
							<div class="msg_cotainer_send">
								Hi Khalid i am good tnx how about you?
								<span class="msg_time_send">8:55 AM, Today</span>
							</div>
							<div class="img_cont_msg">
						<img src="public/assets/images/avatar/2.jpg" class="rounded-circle user_img_msg" alt=""/>
							</div>
						</div>
						<div class="d-flex justify-content-start mb-4">
							<div class="img_cont_msg">
								<img src="public/assets/images/avatar/1.jpg" class="rounded-circle user_img_msg" alt=""/>
							</div>
							<div class="msg_cotainer">
								I am good too, thank you for your chat template
								<span class="msg_time">9:00 AM, Today</span>
							</div>
						</div>
						<div class="d-flex justify-content-end mb-4">
							<div class="msg_cotainer_send">
								You are welcome
								<span class="msg_time_send">9:05 AM, Today</span>
							</div>
							<div class="img_cont_msg">
						<img src="public/assets/images/avatar/2.jpg" class="rounded-circle user_img_msg" alt=""/>
							</div>
						</div>
						<div class="d-flex justify-content-start mb-4">
							<div class="img_cont_msg">
								<img src="public/assets/images/avatar/1.jpg" class="rounded-circle user_img_msg" alt=""/>
							</div>
							<div class="msg_cotainer">
								I am looking for your next templates
								<span class="msg_time">9:07 AM, Today</span>
							</div>
						</div>
						<div class="d-flex justify-content-end mb-4">
							<div class="msg_cotainer_send">
								Ok, thank you have a good day
								<span class="msg_time_send">9:10 AM, Today</span>
							</div>
							<div class="img_cont_msg">
								<img src="public/assets/images/avatar/2.jpg" class="rounded-circle user_img_msg" alt=""/>
							</div>
						</div>
						<div class="d-flex justify-content-start mb-4">
							<div class="img_cont_msg">
								<img src="public/assets/images/avatar/1.jpg" class="rounded-circle user_img_msg" alt=""/>
							</div>
							<div class="msg_cotainer">
								Bye, see you
								<span class="msg_time">9:12 AM, Today</span>
							</div>
						</div>
						<div class="d-flex justify-content-start mb-4">
							<div class="img_cont_msg">
								<img src="public/assets/images/avatar/1.jpg" class="rounded-circle user_img_msg" alt=""/>
							</div>
							<div class="msg_cotainer">
								Hi, how are you samim?
								<span class="msg_time">8:40 AM, Today</span>
							</div>
						</div>
						<div class="d-flex justify-content-end mb-4">
							<div class="msg_cotainer_send">
								Hi Khalid i am good tnx how about you?
								<span class="msg_time_send">8:55 AM, Today</span>
							</div>
							<div class="img_cont_msg">
						<img src="public/assets/images/avatar/2.jpg" class="rounded-circle user_img_msg" alt=""/>
							</div>
						</div>
						<div class="d-flex justify-content-start mb-4">
							<div class="img_cont_msg">
								<img src="public/assets/images/avatar/1.jpg" class="rounded-circle user_img_msg" alt=""/>
							</div>
							<div class="msg_cotainer">
								I am good too, thank you for your chat template
								<span class="msg_time">9:00 AM, Today</span>
							</div>
						</div>
						<div class="d-flex justify-content-end mb-4">
							<div class="msg_cotainer_send">
								You are welcome
								<span class="msg_time_send">9:05 AM, Today</span>
							</div>
							<div class="img_cont_msg">
						<img src="public/assets/images/avatar/2.jpg" class="rounded-circle user_img_msg" alt=""/>
							</div>
						</div>
						<div class="d-flex justify-content-start mb-4">
							<div class="img_cont_msg">
								<img src="public/assets/images/avatar/1.jpg" class="rounded-circle user_img_msg" alt=""/>
							</div>
							<div class="msg_cotainer">
								I am looking for your next templates
								<span class="msg_time">9:07 AM, Today</span>
							</div>
						</div>
						<div class="d-flex justify-content-end mb-4">
							<div class="msg_cotainer_send">
								Ok, thank you have a good day
								<span class="msg_time_send">9:10 AM, Today</span>
							</div>
							<div class="img_cont_msg">
								<img src="public/assets/images/avatar/2.jpg" class="rounded-circle user_img_msg" alt=""/>
							</div>
						</div>
						<div class="d-flex justify-content-start mb-4">
							<div class="img_cont_msg">
								<img src="public/assets/images/avatar/1.jpg" class="rounded-circle user_img_msg" alt=""/>
							</div>
							<div class="msg_cotainer">
								Bye, see you
								<span class="msg_time">9:12 AM, Today</span>
							</div>
						</div>
					</div>
					<div class="card-footer type_msg">
						<div class="input-group">
							<textarea class="form-control" placeholder="Type your message..."></textarea>
							<div class="input-group-append">
								<button type="button" class="btn btn-primary"><i class="fa fa-location-arrow"></i></button>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="tab-pane fade" id="alerts" role="tabpanel">
				<div class="card mb-sm-3 mb-md-0 contacts_card">
					<div class="card-header chat-list-header text-center">
						<a href="#"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><circle fill="#000000" cx="5" cy="12" r="2"/><circle fill="#000000" cx="12" cy="12" r="2"/><circle fill="#000000" cx="19" cy="12" r="2"/></g></svg></a>
						<div>
							<h6 class="mb-1">Notications</h6>
							<p class="mb-0">Show All</p>
						</div>
						<a href="#"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><path d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/><path d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z" fill="#000000" fill-rule="nonzero"/></g></svg></a>
					</div>
					<div class="card-body contacts_body p-0 dz-scroll" id="DZ_W_Contacts_Body1">
						<ul class="contacts">
							<li class="name-first-letter">SEVER STATUS</li>
							<li class="active">
								<div class="d-flex bd-highlight">
									<div class="img_cont primary">KK</div>
									<div class="user_info">
										<span>David Nester Birthday</span>
										<p class="text-primary">Today</p>
									</div>
								</div>
							</li>
							<li class="name-first-letter">SOCIAL</li>
							<li>
								<div class="d-flex bd-highlight">
									<div class="img_cont success">RU<i class="icon fa-birthday-cake"></i></div>
									<div class="user_info">
										<span>Perfection Simplified</span>
										<p>Jame Smith commented on your status</p>
									</div>
								</div>
							</li>
							<li class="name-first-letter">SEVER STATUS</li>
							<li>
								<div class="d-flex bd-highlight">
									<div class="img_cont primary">AU<i class="icon fa fa-user-plus"></i></div>
									<div class="user_info">
										<span>AharlieKane</span>
										<p>Sami is online</p>
									</div>
								</div>
							</li>
							<li>
								<div class="d-flex bd-highlight">
									<div class="img_cont info">MO<i class="icon fa fa-user-plus"></i></div>
									<div class="user_info">
										<span>Athan Jacoby</span>
										<p>Nargis left 30 mins ago</p>
									</div>
								</div>
							</li>
						</ul>
					</div>
					<div class="card-footer"></div>
				</div>
			</div>
			<div class="tab-pane fade" id="notes">
				<div class="card mb-sm-3 mb-md-0 note_card">
					<div class="card-header chat-list-header text-center">
						<a href="#"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect fill="#000000" x="4" y="11" width="16" height="2" rx="1"/><rect fill="#000000" opacity="0.3" transform="translate(12.000000, 12.000000) rotate(-270.000000) translate(-12.000000, -12.000000) " x="4" y="11" width="16" height="2" rx="1"/></g></svg></a>
						<div>
							<h6 class="mb-1">Notes</h6>
							<p class="mb-0">Add New Nots</p>
						</div>
						<a href="#"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><path d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/><path d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z" fill="#000000" fill-rule="nonzero"/></g></svg></a>
					</div>
					<div class="card-body contacts_body p-0 dz-scroll" id="DZ_W_Contacts_Body2">
						<ul class="contacts">
							<li class="active">
								<div class="d-flex bd-highlight">
									<div class="user_info">
										<span>New order placed..</span>
										<p>10 Aug 2020</p>
									</div>
									<div class="ms-auto">
										<a href="#" class="btn btn-primary btn-xs sharp me-1"><i class="fas fa-pencil-alt"></i></a>
										<a href="#" class="btn btn-danger btn-xs sharp"><i class="fas fa-trash"></i></a>
									</div>
								</div>
							</li>
							<li>
								<div class="d-flex bd-highlight">
									<div class="user_info">
										<span>Youtube, a video-sharing website..</span>
										<p>10 Aug 2020</p>
									</div>
									<div class="ms-auto">
										<a href="#" class="btn btn-primary btn-xs sharp me-1"><i class="fas fa-pencil-alt"></i></a>
										<a href="#" class="btn btn-danger btn-xs sharp"><i class="fas fa-trash"></i></a>
									</div>
								</div>
							</li>
							<li>
								<div class="d-flex bd-highlight">
									<div class="user_info">
										<span>john just buy your product..</span>
										<p>10 Aug 2020</p>
									</div>
									<div class="ms-auto">
										<a href="#" class="btn btn-primary btn-xs sharp me-1"><i class="fas fa-pencil-alt"></i></a>
										<a href="#" class="btn btn-danger btn-xs sharp"><i class="fas fa-trash"></i></a>
									</div>
								</div>
							</li>
							<li>
								<div class="d-flex bd-highlight">
									<div class="user_info">
										<span>Athan Jacoby</span>
										<p>10 Aug 2020</p>
									</div>
									<div class="ms-auto">
										<a href="#" class="btn btn-primary btn-xs sharp me-1"><i class="fas fa-pencil-alt"></i></a>
										<a href="#" class="btn btn-danger btn-xs sharp"><i class="fas fa-trash"></i></a>
									</div>
								</div>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!--**********************************
	Chat box End
***********************************-->        <!--**********************************
	Header start
***********************************-->
<div class="header">
	<div class="header-content">
		<nav class="navbar navbar-expand">
			<div class="collapse navbar-collapse justify-content-between">
				<div class="header-left">
					<div class="dashboard_bar">
						Product List					</div>
				</div>

				<ul class="navbar-nav header-right">
					<li class="nav-item dropdown notification_dropdown">
						<a class="nav-link  ai-icon" href="#" role="button" data-bs-toggle="dropdown">
							<svg width="26" height="26" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M21.75 14.8385V12.0463C21.7471 9.88552 20.9385 7.80353 19.4821 6.20735C18.0258 4.61116 16.0264 3.61555 13.875 3.41516V1.625C13.875 1.39294 13.7828 1.17038 13.6187 1.00628C13.4546 0.842187 13.2321 0.75 13 0.75C12.7679 0.75 12.5454 0.842187 12.3813 1.00628C12.2172 1.17038 12.125 1.39294 12.125 1.625V3.41534C9.97361 3.61572 7.97429 4.61131 6.51794 6.20746C5.06159 7.80361 4.25291 9.88555 4.25 12.0463V14.8383C3.26257 15.0412 2.37529 15.5784 1.73774 16.3593C1.10019 17.1401 0.751339 18.1169 0.75 19.125C0.750764 19.821 1.02757 20.4882 1.51969 20.9803C2.01181 21.4724 2.67904 21.7492 3.375 21.75H8.71346C8.91521 22.738 9.45205 23.6259 10.2331 24.2636C11.0142 24.9013 11.9916 25.2497 13 25.2497C14.0084 25.2497 14.9858 24.9013 15.7669 24.2636C16.548 23.6259 17.0848 22.738 17.2865 21.75H22.625C23.321 21.7492 23.9882 21.4724 24.4803 20.9803C24.9724 20.4882 25.2492 19.821 25.25 19.125C25.2486 18.117 24.8998 17.1402 24.2622 16.3594C23.6247 15.5786 22.7374 15.0414 21.75 14.8385ZM6 12.0463C6.00232 10.2113 6.73226 8.45223 8.02974 7.15474C9.32723 5.85726 11.0863 5.12732 12.9212 5.125H13.0788C14.9137 5.12732 16.6728 5.85726 17.9703 7.15474C19.2677 8.45223 19.9977 10.2113 20 12.0463V14.75H6V12.0463ZM13 23.5C12.4589 23.4983 11.9316 23.3292 11.4905 23.0159C11.0493 22.7026 10.716 22.2604 10.5363 21.75H15.4637C15.284 22.2604 14.9507 22.7026 14.5095 23.0159C14.0684 23.3292 13.5411 23.4983 13 23.5ZM22.625 20H3.375C3.14298 19.9999 2.9205 19.9076 2.75644 19.7436C2.59237 19.5795 2.50014 19.357 2.5 19.125C2.50076 18.429 2.77757 17.7618 3.26969 17.2697C3.76181 16.7776 4.42904 16.5008 5.125 16.5H20.875C21.571 16.5008 22.2382 16.7776 22.7303 17.2697C23.2224 17.7618 23.4992 18.429 23.5 19.125C23.4999 19.357 23.4076 19.5795 23.2436 19.7436C23.0795 19.9076 22.857 19.9999 22.625 20Z" fill="#6418C3"/>
							</svg>
							<span class="badge light text-white bg-primary">12</span>
						</a>
						<div class="dropdown-menu dropdown-menu-end">
							<div id="DZ_W_Notification1" class="widget-media dz-scroll p-3 height380">
								<ul class="timeline">
									<li>
										<div class="timeline-panel">
											<div class="media me-2">
												<img alt="image" width="50" src="public/assets/images/avatar/1.jpg">
											</div>
											<div class="media-body">
												<h6 class="mb-1">Dr sultads Send you Photo</h6>
												<small class="d-block">29 July 2020 - 02:26 PM</small>
											</div>
										</div>
									</li>
									<li>
										<div class="timeline-panel">
											<div class="media me-2 media-info">
												KG
											</div>
											<div class="media-body">
												<h6 class="mb-1">Resport created successfully</h6>
												<small class="d-block">29 July 2020 - 02:26 PM</small>
											</div>
										</div>
									</li>
									<li>
										<div class="timeline-panel">
											<div class="media me-2 media-success">
												<i class="fa fa-home"></i>
											</div>
											<div class="media-body">
												<h6 class="mb-1">Reminder : Treatment Time!</h6>
												<small class="d-block">29 July 2020 - 02:26 PM</small>
											</div>
										</div>
									</li>
									 <li>
										<div class="timeline-panel">
											<div class="media me-2">
												<img alt="image" width="50" src="public/assets/images/avatar/1.jpg">
											</div>
											<div class="media-body">
												<h6 class="mb-1">Dr sultads Send you Photo</h6>
												<small class="d-block">29 July 2020 - 02:26 PM</small>
											</div>
										</div>
									</li>
									<li>
										<div class="timeline-panel">
											<div class="media me-2 media-danger">
												KG
											</div>
											<div class="media-body">
												<h6 class="mb-1">Resport created successfully</h6>
												<small class="d-block">29 July 2020 - 02:26 PM</small>
											</div>
										</div>
									</li>
									<li>
										<div class="timeline-panel">
											<div class="media me-2 media-primary">
												<i class="fa fa-home"></i>
											</div>
											<div class="media-body">
												<h6 class="mb-1">Reminder : Treatment Time!</h6>
												<small class="d-block">29 July 2020 - 02:26 PM</small>
											</div>
										</div>
									</li>
								</ul>
							</div>
							<a class="all-notification" href="#">See all notifications <i class="ti-arrow-right"></i></a>
						</div>
					</li>
					<li class="nav-item dropdown notification_dropdown">
						<a class="nav-link bell bell-link" href="#">
							<svg width="23" height="22" viewBox="0 0 23 22" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M20.4604 0.848877H3.31682C2.64742 0.849612 2.00565 1.11586 1.53231 1.58919C1.05897 2.06253 0.792727 2.7043 0.791992 3.3737V15.1562C0.792727 15.8256 1.05897 16.4674 1.53231 16.9407C2.00565 17.4141 2.64742 17.6803 3.31682 17.6811C3.53999 17.6812 3.75398 17.7699 3.91178 17.9277C4.06958 18.0855 4.15829 18.2995 4.15843 18.5227V20.3168C4.15843 20.6215 4.24112 20.9204 4.39768 21.1818C4.55423 21.4431 4.77879 21.6571 5.04741 21.8009C5.31602 21.9446 5.61861 22.0128 5.92292 21.9981C6.22723 21.9834 6.52183 21.8863 6.77533 21.7173L12.6173 17.8224C12.7554 17.7299 12.9179 17.6807 13.0841 17.6811H17.187C17.7383 17.68 18.2742 17.4994 18.7136 17.1664C19.1531 16.8335 19.472 16.3664 19.6222 15.8359L22.8965 4.05011C22.9998 3.67481 23.0152 3.28074 22.9413 2.89856C22.8674 2.51637 22.7064 2.15639 22.4707 1.84663C22.2349 1.53687 21.9309 1.28568 21.5822 1.11263C21.2336 0.939571 20.8497 0.849312 20.4604 0.848877ZM21.2732 3.60304L18.0005 15.3847C17.9499 15.5614 17.8432 15.7168 17.6964 15.8275C17.5496 15.9381 17.3708 15.9979 17.187 15.9978H13.0841C12.5855 15.9972 12.098 16.1448 11.6836 16.4219L5.84165 20.3168V18.5227C5.84091 17.8533 5.57467 17.2115 5.10133 16.7382C4.62799 16.2648 3.98622 15.9986 3.31682 15.9978C3.09365 15.9977 2.87966 15.909 2.72186 15.7512C2.56406 15.5934 2.47534 15.3794 2.47521 15.1562V3.3737C2.47534 3.15054 2.56406 2.93655 2.72186 2.77874C2.87966 2.62094 3.09365 2.53223 3.31682 2.5321H20.4604C20.5905 2.53243 20.7187 2.56277 20.8352 2.62076C20.9516 2.67875 21.0531 2.76283 21.1318 2.86646C21.2104 2.97008 21.2641 3.09045 21.2886 3.21821C21.3132 3.34597 21.3079 3.47766 21.2732 3.60304Z" fill="#6418C3"/>
								<path d="M5.84161 8.42333H10.0497C10.2729 8.42333 10.4869 8.33466 10.6448 8.17683C10.8026 8.019 10.8913 7.80493 10.8913 7.58172C10.8913 7.35851 10.8026 7.14445 10.6448 6.98661C10.4869 6.82878 10.2729 6.74011 10.0497 6.74011H5.84161C5.6184 6.74011 5.40433 6.82878 5.2465 6.98661C5.08867 7.14445 5 7.35851 5 7.58172C5 7.80493 5.08867 8.019 5.2465 8.17683C5.40433 8.33466 5.6184 8.42333 5.84161 8.42333Z" fill="#6418C3"/>
								<path d="M13.4161 10.1066H5.84161C5.6184 10.1066 5.40433 10.1952 5.2465 10.3531C5.08867 10.5109 5 10.725 5 10.9482C5 11.1714 5.08867 11.3855 5.2465 11.5433C5.40433 11.7011 5.6184 11.7898 5.84161 11.7898H13.4161C13.6393 11.7898 13.8534 11.7011 14.0112 11.5433C14.169 11.3855 14.2577 11.1714 14.2577 10.9482C14.2577 10.725 14.169 10.5109 14.0112 10.3531C13.8534 10.1952 13.6393 10.1066 13.4161 10.1066Z" fill="#6418C3"/>
							</svg>
							<span class="badge light text-white bg-primary">5</span>
						</a>
					</li>
					<li class="nav-item dropdown notification_dropdown">
						<a class="nav-link" href="#" data-bs-toggle="dropdown">
							<svg width="26" height="26" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M22.625 5.12506H21.75V1.62506C21.75 1.47268 21.7102 1.32295 21.6345 1.19068C21.5589 1.05841 21.45 0.948189 21.3186 0.870929C21.1873 0.79367 21.0381 0.75205 20.8857 0.750187C20.7333 0.748325 20.5831 0.786285 20.4499 0.860311L13 4.99915L5.55007 0.860311C5.41688 0.786285 5.26667 0.748325 5.11431 0.750187C4.96194 0.75205 4.8127 0.79367 4.68136 0.870929C4.55002 0.948189 4.44113 1.05841 4.36547 1.19068C4.28981 1.32295 4.25001 1.47268 4.25 1.62506V5.12506H3.375C2.67904 5.12582 2.01181 5.40263 1.51969 5.89475C1.02757 6.38687 0.750764 7.0541 0.75 7.75006V10.3751C0.750764 11.071 1.02757 11.7383 1.51969 12.2304C2.01181 12.7225 2.67904 12.9993 3.375 13.0001H4.25V22.6251C4.25076 23.321 4.52757 23.9882 5.01969 24.4804C5.51181 24.9725 6.17904 25.2493 6.875 25.2501H19.125C19.821 25.2493 20.4882 24.9725 20.9803 24.4804C21.4724 23.9882 21.7492 23.321 21.75 22.6251V13.0001H22.625C23.321 12.9993 23.9882 12.7225 24.4803 12.2304C24.9724 11.7383 25.2492 11.071 25.25 10.3751V7.75006C25.2492 7.0541 24.9724 6.38687 24.4803 5.89475C23.9882 5.40263 23.321 5.12582 22.625 5.12506ZM20 5.12506H16.3769L20 3.11256V5.12506ZM6 3.11256L9.62311 5.12506H6V3.11256ZM6 22.6251V13.0001H12.125V23.5001H6.875C6.64303 23.4998 6.42064 23.4075 6.25661 23.2434C6.09258 23.0794 6.0003 22.857 6 22.6251ZM20 22.6251C19.9997 22.857 19.9074 23.0794 19.7434 23.2434C19.5794 23.4075 19.357 23.4998 19.125 23.5001H13.875V13.0001H20V22.6251ZM23.5 10.3751C23.4997 10.607 23.4074 10.8294 23.2434 10.9934C23.0794 11.1575 22.857 11.2498 22.625 11.2501H3.375C3.14303 11.2498 2.92064 11.1575 2.75661 10.9934C2.59258 10.8294 2.5003 10.607 2.5 10.3751V7.75006C2.5003 7.51809 2.59258 7.2957 2.75661 7.13167C2.92064 6.96764 3.14303 6.87536 3.375 6.87506H22.625C22.857 6.87536 23.0794 6.96764 23.2434 7.13167C23.4074 7.2957 23.4997 7.51809 23.5 7.75006V10.3751Z" fill="#3E4954"/>
							</svg>
							<span class="badge light text-white bg-primary">2</span>
						</a>
						<div class="dropdown-menu dropdown-menu-end">
							<div id="DZ_W_TimeLine02" class="widget-timeline dz-scroll style-1 ps ps--active-y p-3 height370">
							<ul class="timeline">
								<li>
									<div class="timeline-badge primary"></div>
									<a class="timeline-panel text-muted" href="#">
										<span>10 minutes ago</span>
										<h6 class="mb-0">Youtube, a video-sharing website, goes live <strong class="text-primary">$500</strong>.</h6>
									</a>
								</li>
								<li>
									<div class="timeline-badge info">
									</div>
									<a class="timeline-panel text-muted" href="#">
										<span>20 minutes ago</span>
										<h6 class="mb-0">New order placed <strong class="text-info">#XF-2356.</strong></h6>
										<p class="mb-0">Quisque a consequat ante Sit amet magna at volutapt...</p>
									</a>
								</li>
								<li>
									<div class="timeline-badge danger">
									</div>
									<a class="timeline-panel text-muted" href="#">
										<span>30 minutes ago</span>
										<h6 class="mb-0">john just buy your product <strong class="text-warning">Sell $250</strong></h6>
									</a>
								</li>
								<li>
									<div class="timeline-badge success">
									</div>
									<a class="timeline-panel text-muted" href="#">
										<span>15 minutes ago</span>
										<h6 class="mb-0">StumbleUpon is acquired by eBay. </h6>
									</a>
								</li>
								<li>
									<div class="timeline-badge warning">
									</div>
									<a class="timeline-panel text-muted" href="#">
										<span>20 minutes ago</span>
										<h6 class="mb-0">Mashable, a news website and blog, goes live.</h6>
									</a>
								</li>
								<li>
									<div class="timeline-badge dark">
									</div>
									<a class="timeline-panel text-muted" href="#">
										<span>20 minutes ago</span>
										<h6 class="mb-0">Mashable, a news website and blog, goes live.</h6>
									</a>
								</li>
							</ul>
						</div>
						</div>
					</li>
					<li class="nav-item dropdown header-profile">
						<a class="nav-link" href="#" role="button" data-bs-toggle="dropdown">
							<div class="header-info">
								<span class="text-black">Hello, <strong>Thomas</strong></span>
								<p class="fs-12 mb-0">Super Admin</p>
							</div>
							<img src="public/assets/images/profile/pic1.jpg" width="20" alt=""/>
						</a>
						<div class="dropdown-menu dropdown-menu-end">
							<a href="app_profile.html" class="dropdown-item ai-icon">
								<svg id="icon-user1" xmlns="http://www.w3.org/2000/svg" class="text-primary" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
								<span class="ms-2">Profile </span>
							</a>
							<a href="email_inbox.html" class="dropdown-item ai-icon">
								<svg id="icon-inbox" xmlns="http://www.w3.org/2000/svg" class="text-success" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
								<span class="ms-2">Inbox </span>
							</a>
							<a href="page_login.html" class="dropdown-item ai-icon">
								<svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" class="text-danger" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
								<span class="ms-2">Logout </span>
							</a>
						</div>
					</li>
				</ul>
			</div>
		</nav>
	</div>
</div>
<!--**********************************
	Header end ti-comment-alt
***********************************-->        <!--**********************************
	Sidebar start
***********************************-->
<div class="deznav">
	<div class="deznav-scroll">
		<ul class="metismenu" id="menu">
			<li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
					<i class="flaticon-dashboard-1"></i>
					<span class="nav-text">Dashboard</span>
				</a>
				<ul aria-expanded="false">
					<li><a href="index.html">Dashboard Light</a></li>
					<li><a href="index_2.html">Dashboard Dark</a></li>
					<li><a href="wallet.html">Wallet</a></li>
					<li><a href="coin.html">Coin Details</a></li>
					<li><a href="portfolio.html">Portofolio</a></li>
					<li><a href="transaction.html">Transactions</a></li>
					<li><a href="marketcapital.html">Market Capital</a></li>
				</ul>
			</li>
			<li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
					<i class="flaticon-app-store"></i>
					<span class="nav-text">Apps</span>
				</a>
				<ul aria-expanded="false">
					<li><a href="app_profile.html">Profile</a></li>
					<li><a class="has-arrow" href="javascript:void()" aria-expanded="false">Email</a>
						<ul aria-expanded="false">
							<li><a href="email_compose.html">Compose</a></li>
							<li><a href="email_inbox.html">Inbox</a></li>
							<li><a href="email_read.html">Read</a></li>
						</ul>
					</li>
					<li><a href="app_calendar.html">Calendar</a></li>
					<li><a class="has-arrow" href="javascript:void()" aria-expanded="false">Shop</a>
						<ul aria-expanded="false">
							<li><a href="ecom_product_grid.html">Product Grid</a></li>
							<li><a href="ecom_product_list.html">Product List</a></li>
							<li><a href="ecom_product_details.html">Product Details</a></li>
							<li><a href="ecom_product_order.html">Order</a></li>
							<li><a href="ecom_checkout.html">Checkout</a></li>
							<li><a href="ecom_invoice.html">Invoice</a></li>
							<li><a href="ecom_customers.html">Customers</a></li>
						</ul>
					</li>
				</ul>
			</li>
			<li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
					<i class="flaticon-statistics"></i>
					<span class="nav-text">Charts</span>
				</a>
				<ul aria-expanded="false">
					<li><a href="flot.html">Flot</a></li>
					<li><a href="morris.html">Morris</a></li>
					<li><a href="chartjs.html">Chartjs</a></li>
					<li><a href="chartist.html">Chartist</a></li>
					<li><a href="sparkline.html">Sparkline</a></li>
					<li><a href="peity.html">Peity</a></li>
				</ul>
			</li>
			<li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
					<i class="flaticon-exchange"></i>
					<span class="nav-text">Bootstrap</span>
				</a>
				<ul aria-expanded="false">
					<li><a href="accordion.html">Accordion</a></li>
					<li><a href="alert.html">Alert</a></li>
					<li><a href="badge.html">Badge</a></li>
					<li><a href="button.html">Button</a></li>
					<li><a href="modal.html">Modal</a></li>
					<li><a href="button_group.html">Button Group</a></li>
					<li><a href="list_group.html">List Group</a></li>
					<li><a href="media_object.html">Media Object</a></li>
					<li><a href="card.html">Cards</a></li>
					<li><a href="carousel.html">Carousel</a></li>
					<li><a href="dropdown.html">Dropdown</a></li>
					<li><a href="popover.html">Popover</a></li>
					<li><a href="progressbar.html">Progressbar</a></li>
					<li><a href="tab.html">Tab</a></li>
					<li><a href="typography.html">Typography</a></li>
					<li><a href="pagination.html">Pagination</a></li>
					<li><a href="grid.html">Grid</a></li>

				</ul>
			</li>
			<li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
					<i class="flaticon-plugin"></i>
					<span class="nav-text">Plugins</span>
				</a>
				<ul aria-expanded="false">
					<li><a href="select2.html">Select 2</a></li>
					<li><a href="nestable.html">Nestable</a></li>
					<li><a href="noui_slider.html">Noui Slider</a></li>
					<li><a href="sweetalert.html">Sweet Alert</a></li>
					<li><a href="toastr.html">Toastr</a></li>
					<li><a href="map_jqvmap.html">Jqv Map</a></li>
					<li><a href="lightgallery.html">Light Gallery</a></li>
				</ul>
			</li>
			<li><a href="widget_basic.html" class="ai-icon" aria-expanded="false">
					<i class="flaticon-badge"></i>
					<span class="nav-text">Widget</span>
				</a>
			</li>
			<li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
					<i class="flaticon-form"></i>
					<span class="nav-text">Forms</span>
				</a>
				<ul aria-expanded="false">
					<li><a href="form_element.html">Form Elements</a></li>
					<li><a href="form_wizard.html">Wizard</a></li>
					<li><a href="form_ckeditor.html">CkEditor</a></li>
					<li><a href="form_pickers.html">Pickers</a></li>
					<li><a href="form_validation_jquery.html">Jquery Validate</a></li>
				</ul>
			</li>
			<li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
					<i class="flaticon-form-1"></i>
					<span class="nav-text">Table</span>
				</a>
				<ul aria-expanded="false">
					<li><a href="table_bootstrap.html">Bootstrap</a></li>
					<li><a href="table_datatable.html">Datatable</a></li>
				</ul>
			</li>
			<li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
					<i class="flaticon-contract"></i>
					<span class="nav-text">Pages</span>
				</a>
				<ul aria-expanded="false">
					<li><a href="page_register.html">Register</a></li>
					<li><a href="page_login.html">Login</a></li>
					<li><a class="has-arrow" href="javascript:void()" aria-expanded="false">Error</a>
						<ul aria-expanded="false">
							<li><a href="page_error_400.html">Error 400</a></li>
							<li><a href="page_error_403.html">Error 403</a></li>
							<li><a href="page_error_404.html">Error 404</a></li>
							<li><a href="page_error_500.html">Error 500</a></li>
							<li><a href="page_error_503.html">Error 503</a></li>
						</ul>
					</li>
					<li><a href="page_lock_screen.html">Lock Screen</a></li>
				</ul>
			</li>
		</ul>
	
		<div class="add-menu-sidebar">
			<p>Generate Monthly Credit Report</p>
			<a href="javascript:void(0);">
			<svg width="24" height="12" viewBox="0 0 24 12" fill="none" xmlns="http://www.w3.org/2000/svg">
				<path d="M23.725 5.14889C23.7248 5.14861 23.7245 5.14828 23.7242 5.148L18.8256 0.272997C18.4586 -0.0922062 17.865 -0.0908471 17.4997 0.276184C17.1345 0.643169 17.1359 1.23675 17.5028 1.602L20.7918 4.875H0.9375C0.419719 4.875 0 5.29472 0 5.8125C0 6.33028 0.419719 6.75 0.9375 6.75H20.7917L17.5029 10.023C17.1359 10.3882 17.1345 10.9818 17.4998 11.3488C17.865 11.7159 18.4587 11.7172 18.8256 11.352L23.7242 6.477C23.7245 6.47672 23.7248 6.47639 23.7251 6.47611C24.0923 6.10964 24.0911 5.51414 23.725 5.14889Z" fill="white"/>
			</svg>
			</a>
		</div>
		<div class="copyright">
			<p><strong>Chrev - Crypto Codeigniter Admin Dashboard</strong> © 2022 All Rights Reserved</p>
			<p>Made with <i class="fa fa-heart"></i> by DexignZone</p>
		</div>
	</div>
</div>
<!--**********************************
	Sidebar end
***********************************-->        <!--**********************************
	Content body start
***********************************-->
<div class="content-body">
	<div class="container-fluid">
		<div class="page-titles">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="javascript:void(0)">Shop</a></li>
				<li class="breadcrumb-item active"><a href="javascript:void(0)">Product List</a></li>
			</ol>
		</div>
		<div class="row">
			<div class="col-lg-12 col-xl-6">
				<div class="card">
					<div class="card-body">
						<div class="row m-b-30">
							<div class="col-md-5">
								<div class="new-arrival-product mb-4 mb-xxl-4 mb-md-0 h-100">
									<div class="new-arrivals-img-contnent h-100">
										<img class="img-fluid" src="public/assets/images/product/2.jpg" alt="">
									</div>
								</div>
							</div>
							<div class="col-md-7">
								<div class="new-arrival-content position-relative">
									<h4><a href="ecom_product_details.html">Solid Women's V-neck Dark T-Shirt</a></h4>
									<div class="comment-review star-rating">
										<ul>
											<li><i class="fa fa-star"></i></li>
											<li><i class="fa fa-star"></i></li>
											<li><i class="fa fa-star"></i></li>
											<li><i class="fa fa-star-half-empty"></i></li>
											<li><i class="fa fa-star-half-empty"></i></li>
										</ul>
										<span class="review-text">(34 reviews) / </span><a class="product-review" href="#"  data-bs-toggle="modal" data-bs-target="#reviewModal">Write a review?</a>
										<p class="price mt-2">$320.00</p>
									</div>
									<p>Availability: <span class="item"> In stock <i class="fa fa-check-circle text-success"></i></span></p>
									<p>Product code: <span class="item">0405689</span> </p>
									<p>Brand: <span class="item">Lee</span></p>
									<p class="text-content">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words.</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-12 col-xl-6">
				<div class="card">
					<div class="card-body">
						<div class="row m-b-30">
							<div class="col-md-5">
								<div class="new-arrival-product mb-4 mb-xxl-4 mb-md-0 h-100">
									<div class="new-arrivals-img-contnent h-100">
										<img class="img-fluid" src="public/assets/images/product/3.jpg" alt="">
									</div>
								</div>
							</div>
							<div class="col-md-7">
								<div class="new-arrival-content position-relative">
									<h4><a href="ecom_product_details.html">Solid Women's V-neck Dark T-Shirt</a></h4>
									<div class="comment-review star-rating">
										<ul>
											<li><i class="fa fa-star"></i></li>
											<li><i class="fa fa-star"></i></li>
											<li><i class="fa fa-star"></i></li>
											<li><i class="fa fa-star-half-empty"></i></li>
											<li><i class="fa fa-star-half-empty"></i></li>
										</ul>
										<span class="review-text">(34 reviews) / </span><a class="product-review" href="#"  data-bs-toggle="modal" data-bs-target="#reviewModal">Write a review?</a>
										<p class="price mt-2">$325.00</p>
									</div>
									<p>Availability: <span class="item"> In stock <i class="fa fa-check-circle text-success"></i></span></p>
									<p>Product code: <span class="item">0405689</span> </p>
									<p>Brand: <span class="item">Lee</span></p>
									<p class="text-content">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words.</p>                                           
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-12 col-xl-6">
				<div class="card">
					<div class="card-body">
						<div class="row m-b-30">
							<div class="col-md-5">
								<div class="new-arrival-product mb-4 mb-xxl-4 mb-md-0 h-100">
									<div class="new-arrivals-img-contnent h-100">
										<img class="img-fluid" src="public/assets/images/product/4.jpg" alt="">
									</div>
								</div>
							</div>
							<div class="col-md-7">
								<div class="new-arrival-content position-relative">
									<h4><a href="ecom_product_details.html">Solid Women's V-neck Dark T-Shirt</a></h4>
									<div class="comment-review star-rating">
										<ul>
											<li><i class="fa fa-star"></i></li>
											<li><i class="fa fa-star"></i></li>
											<li><i class="fa fa-star"></i></li>
											<li><i class="fa fa-star"></i></li>
											<li><i class="fa fa-star"></i></li>
										</ul>
										<span class="review-text">(34 reviews) / </span><a class="product-review" href="#"  data-bs-toggle="modal" data-bs-target="#reviewModal">Write a review?</a>
										<p class="price mt-2">$480.00</p>
									</div>
									<p>Availability: <span class="item"> In stock <i class="fa fa-check-circle text-success"></i></span></p>
									<p>Product code: <span class="item">0405689</span> </p>
									<p>Brand: <span class="item">Lee</span></p>
									<p class="text-content">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words.</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-12 col-xl-6">
				<div class="card">
					<div class="card-body">
						<div class="row m-b-30">
							<div class="col-md-5">
								<div class="new-arrival-product mb-4 mb-xxl-4 mb-md-0 h-100">
									<div class="new-arrivals-img-contnent h-100">
										<img class="img-fluid" src="public/assets/images/product/5.jpg" alt="">
									</div>
								</div>
							</div>
							<div class="col-md-7">
								<div class="new-arrival-content position-relative">
									<h4><a href="ecom_product_details.html">Solid Women's V-neck Dark T-Shirt</a></h4>
									<div class="comment-review star-rating">
										<ul>
											<li><i class="fa fa-star"></i></li>
											<li><i class="fa fa-star"></i></li>
											<li><i class="fa fa-star"></i></li>
											<li><i class="fa fa-star"></i></li>
											<li><i class="fa fa-star"></i></li>
										</ul>
										<span class="review-text">(34 reviews) / </span><a class="product-review" href="#"  data-bs-toggle="modal" data-bs-target="#reviewModal">Write a review?</a>
										<p class="price mt-2">$658.00</p>
									</div>
									<p>Availability: <span class="item"> In stock <i class="fa fa-check-circle text-success"></i></span></p>
									<p>Product code: <span class="item">0405689</span> </p>
									<p>Brand: <span class="item">Lee</span></p>
									<p class="text-content">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words.</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-12 col-xl-6">
				<div class="card">
					<div class="card-body">
						<div class="row m-b-30">
							<div class="col-md-5">
								<div class="new-arrival-product mb-4 mb-xxl-4 mb-md-0 h-100">
									<div class="new-arrivals-img-contnent h-100">
										<img class="img-fluid" src="public/assets/images/product/6.jpg" alt="">
									</div>
								</div>
							</div>
							<div class="col-md-7">
								<div class="new-arrival-content position-relative">
									<h4><a href="ecom_product_details.html">Solid Women's V-neck Dark T-Shirt</a></h4>
									<div class="comment-review star-rating">
										<ul>
											<li><i class="fa fa-star"></i></li>
											<li><i class="fa fa-star"></i></li>
											<li><i class="fa fa-star"></i></li>
											<li><i class="fa fa-star"></i></li>
											<li><i class="fa fa-star"></i></li>
										</ul>
										<span class="review-text">(34 reviews) / </span><a class="product-review" href="#"  data-bs-toggle="modal" data-bs-target="#reviewModal">Write a review?</a>
										<p class="price mt-2">$280.00</p>
									</div>
									<p>Availability: <span class="item"> In stock <i class="fa fa-check-circle text-success"></i></span></p>
									<p>Product code: <span class="item">0405689</span> </p>
									<p>Brand: <span class="item">Lee</span></p>
									<p class="text-content">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words.</p>                                            
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-12 col-xl-6">
				<div class="card">
					<div class="card-body">
						<div class="row m-b-30">
							<div class="col-md-5">
								<div class="new-arrival-product mb-4 mb-xxl-4 mb-md-0 h-100">
									<div class="new-arrivals-img-contnent h-100">
										<img class="img-fluid" src="public/assets/images/product/7.jpg" alt="">
									</div>
								</div>
							</div>
							<div class="col-md-7">
								<div class="new-arrival-content position-relative">
									<h4><a href="ecom_product_details.html">Solid Women's V-neck Dark T-Shirt</a></h4>
									<div class="comment-review star-rating">
										<ul>
											<li><i class="fa fa-star"></i></li>
											<li><i class="fa fa-star"></i></li>
											<li><i class="fa fa-star"></i></li>
											<li><i class="fa fa-star"></i></li>
											<li><i class="fa fa-star"></i></li>
										</ul>
										<span class="review-text">(34 reviews) / </span><a class="product-review" href="#"  data-bs-toggle="modal" data-bs-target="#reviewModal">Write a review?</a>
										<p class="price mt-2">$600.00</p>
									</div>
									<p>Availability: <span class="item"> In stock <i class="fa fa-check-circle text-success"></i></span></p>
									<p>Product code: <span class="item">0405689</span> </p>
									<p>Brand: <span class="item">Lee</span></p>
									<p class="text-content">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words.</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- review -->
			<div class="modal fade" id="reviewModal">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title">Review</h5>
							<button type="button" class="btn-close" data-bs-dismiss="modal">
							</button>
						</div>
						<div class="modal-body">
							<form>
								<div class="text-center mb-4">
									<img class="img-fluid rounded" width="78" src="public/assets/images/avatar/1.jpg" alt="DexignZone">
								</div>
								<div class="form-group">
									<div class="rating-widget mb-4 text-center">
										<!-- Rating Stars Box -->
										<div class="rating-stars">
											<ul id="stars">
												<li class="star" title="Poor" data-value="1">
													<i class="fa fa-star fa-fw"></i>
												</li>
												<li class="star" title="Fair" data-value="2">
													<i class="fa fa-star fa-fw"></i>
												</li>
												<li class="star" title="Good" data-value="3">
													<i class="fa fa-star fa-fw"></i>
												</li>
												<li class="star" title="Excellent" data-value="4">
													<i class="fa fa-star fa-fw"></i>
												</li>
												<li class="star" title="WOW!!!" data-value="5">
													<i class="fa fa-star fa-fw"></i>
												</li>
											</ul>
										</div>
									</div>
								</div>
								<div class="form-group">
									<textarea class="form-control" placeholder="Comment" rows="5"></textarea>
								</div>
								<button class="btn btn-success btn-block">RATE</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!--**********************************
	Content body end
***********************************-->
        <!--**********************************
    Footer start
***********************************-->
<div class="footer">
    <div class="copyright">
        <p>Copyright © Designed &amp; Developed by <a href="http://dexignzone.com/" target="_blank">DexignZone</a> 2022</p>
    </div>
</div>
<!--**********************************
    Footer end
***********************************-->	</div>
	
			<script src="public/assets/vendor/global/global.min.js"></script>
			<script src="public/assets/vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
		
			<script src="public/assets/vendor/star-rating/jquery.star-rating-svg.js"></script>
		
			<script src="public/assets/js/custom.js"></script>
			<script src="public/assets/js/deznav-init.js"></script>
			<script src="public/assets/js/demo.js"></script>
			<script src="public/assets/js/styleSwitcher.js"></script>
			
    <!--**********************************
        Main wrapper end
    ***********************************-->
</body>

</html>