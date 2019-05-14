<?php
    session_start();
	if(!isset($_SESSION['username'])) {
	        header("Location: login.php");
	}
	?>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, magicinitial-scale=1.0, magicshrink-to-fit=no">
	<title>Project Whiteboard</title>

	<link href="css/main-icons.css" rel="stylesheet">
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="css/simple-line-icons.css" rel="stylesheet">
	<link href="css/pace.min.css" rel="stylesheet">
	
	<link href="css/style.css" rel="stylesheet">
</head>

<body class="app header-fixed sidebar-fixed aside-menu-fixed sidebar-lg-show">
	<header class="app-header navbar">
		<button class="navbar-toggler sidebar-toggler d-lg-none mr-auto" type="button" data-toggle="sidebar-show">
			<span class="navbar-toggler-icon"></span>
		</button>
		<button class="navbar-toggler sidebar-toggler d-md-down-none" type="button" data-toggle="sidebar-lg-show">
			<span class="navbar-toggler-icon"></span>
		</button>
		<ul class="nav navbar-nav d-md-down-none">
			<li class="nav-item px-3">
				<a class="nav-link" href="#">Dashboard</a>
			</li>
			<li class="nav-item px-3">
				<a class="nav-link" href="#">Users</a>
			</li>
			<li class="nav-item px-3">
				<a class="nav-link" href="#">Settings</a>
			</li>
		</ul>
		<ul class="nav navbar-nav ml-auto">
			<li class="nav-item dropdown d-md-down-none">
				<li class="nav-item dropdown">
				<a class="nav-link nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
					<img class="img-avatar" src="img/avatars/6.jpg" alt="admin@whiteboard">
				</a>
				<div class="dropdown-menu dropdown-menu-right">
					<a class="dropdown-item" href="logout.php">
						<i class="fa fa-lock"></i> Logout</a>
				</div>
			</li>
		</ul>
	</header>
	<div class="app-body">
		<div class="sidebar">
			<nav class="sidebar-nav">
				<ul class="nav">
					<li class="nav-item">
						<a class="nav-link" href="main.html">
							<i class="nav-icon icon-speedometer"></i> Dashboard
						</a>
					</li>
					<li class="nav-title">Courses</li>
					<div id='menu'>
                    </div>
					<li class='dropdown-divider'></li>
					<li class="nav-item">
                        <a class="nav-link" href="register.php"> <i class="nav-icon icon-plus"></i>Register Class</a>
					</li>
				</ul>
			</nav>
		</div>
		<main class="main">

			<ol id="path" class="breadcrumb">
				<li class="breadcrumb-item">Whiteboard</li>
				<li class="breadcrumb-item">
					<a href="#"><?php echo $_SESSION['username']; ?></a>
				</li>
			</ol>
			<div class="container-fluid">
				<div id="ui-view"></div>
			</div>
		</main>
	</div>
	<footer class="app-footer">
		<div>
			<a href="http://github.com/redrye/Project-Whiteboard"></a>
			<span></span>
		</div>
	</footer>

	<script src="js/jquery.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/pace.min.js"></script>
<!--	<script src="js/perfect-scrollbar.min.js"></script> -->
	<script src="js/app.js"></script>
	<script>
$(document).ready(function(){
        var resp = [];
        $.ajax({
            url: 'menu.php',
            type: 'post',
            dataType: 'json',
            success:function(response){
                var len = response.length;
                for( var i = 0, j = 0; i<len; i++){
                    var crn = response[i]['crn'];
                    var name = response[i]['name'];
         			var html = [];
         			html[j++] = "<li class='nav-item nav-dropdown'>";
         			html[j++] = "<a class='nav-link nav-dropdown-toggle' href='#'>"+name+" - ("+crn+")</a>";
         			html[j++] = "<ul class='nav-dropdown-items'>";
         			html[j++] = "<li class='nav-item'>";
         			html[j++] = "<a class='nav-link' href='announcements.php?crn="+ crn +"'>Announcments</a>";
         			html[j++] = "</li>";
         			html[j++] = "<li class='nav-item'>";
         			html[j++] = "<a class='nav-link' href='assignments.php?crn="+ crn +"'>Assignments</a>";
         			html[j++] = "</li>";
         			html[j++] = "<li class='nav-item'>";
         			html[j++] = "<a class='nav-link' href='grades.php?crn="+crn+"'>Grades</a>";
         			html[j++] = "</li></ul></li>";
                    $("#menu").append(html.join(''));

                }
            }
        });
        var link = window.location.href;
        link.split('.html')[0];
        window.history.replaceState(null, null, link);
    });
		$('#ui-view').ajaxLoad();
		$(document).ajaxComplete(function() {
			Pace.restart()
		});		
	</script>
</body>

</html>
