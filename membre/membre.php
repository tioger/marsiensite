<?php
    session_start();
    if (!isset($_SESSION['login'])) {
    header ('Location: index.php');
    exit();
    }
    ?>
    

<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Marsien Dashboard</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	
    <!-- AddThisEvent -->
	<script type="text/javascript" src="https://addthisevent.com/libs/1.5.8/ate.min.js"></script> 
    
    <!-- AddThisEvent Settings -->
	<script type="text/javascript">
		addthisevent.settings({
		    license   : "aao8iuet5zp9iqw5sm9z",
		    mouse     : false,
		    css       : true,
		    outlook   : {show:false, text:"Outlook Calendar"},
		    google    : {show:true, text:"Google Calendar"},
		    yahoo     : {show:false, text:"Yahoo Calendar"},
		    hotmail   : {show:false, text:"Hotmail Calendar"},
		    ical      : {show:false, text:"iCal Calendar"},
		    facebook  : {show:false, text:"Facebook Event"},
		    dropdown  : {order:"google,outlook,ical"},
		    callback  : ""
		});
	</script>
</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <?php include 'nav.php'; ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            SimplonMars <small>calendrier</small>
                        </h1>
			<a href="http://example.com/link-to-your-event" title="Add to Calendar" class="addthisevent">
			    Add to Calendar
			    <span class="_start">10-05-2015 11:38:46</span>
			    <span class="_end">11-05-2015 11:38:46</span>
			    <span class="_zonecode">40</span>
			    <span class="_summary">Summary of the event</span>
			    <span class="_description">Description of the event</span>
			    <span class="_location">Location of the event</span>
			    <span class="_organizer">Organizer</span>
			    <span class="_organizer_email">Organizer e-mail</span>
			    <span class="_facebook_event">http://www.facebook.com/events/160427380695693</span>
			    <span class="_all_day_event">true</span>
			    <span class="_date_format">DD/MM/YYYY</span>
			</a> 
                    </div>
                </div>
               
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <iframe src="https://www.google.com/calendar/embed?showTitle=0&amp;showCalendars=0&amp;showTz=0&amp;height=600&amp;wkst=2&amp;bgcolor=%23ffffff&amp;src=simplonmarscalendar%40gmail.com&amp;color=%231B887A&amp;ctz=Europe%2FParis" style=" border-width:0 " width="100%" height="800" frameborder="0" scrolling="no"></iframe>
                                </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->

                
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="js/plugins/morris/raphael.min.js"></script>
    <script src="js/plugins/morris/morris.min.js"></script>
    <script src="js/plugins/morris/morris-data.js"></script>

</body>

</html>
