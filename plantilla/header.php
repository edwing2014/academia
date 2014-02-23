<!DOCTYPE HTML>
<html lang="en">
<head>
<meta charset="utf-8">

<title>Sistema de gestión academia v.10</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="Admin Panel Template">
<meta name="author" content="Westilian: Kamrujaman Shohel">
<!-- styles -->
<link href="<?=base_url();?>plantilla/html/main-theme/css/bootstrap.css" rel="stylesheet">
<link href="<?=base_url();?>plantilla/html/main-theme/css/jquery.gritter.css" rel="stylesheet">
<link href="<?=base_url();?>plantilla/html/main-theme/css/bootstrap-responsive.css" rel="stylesheet">
<link rel="stylesheet" href="<?=base_url();?>plantilla/html/main-theme/css/font-awesome.css">

<!--[if IE 7]>
<link rel="stylesheet" href="css/font-awesome-ie7.min.css">
<![endif]-->
<link href="<?=base_url();?>plantilla/html/main-theme/css/tablecloth.css" rel="stylesheet">
<link href="<?=base_url();?>plantilla/html/main-theme/css/styles.css" rel="stylesheet">
 <link href="<?=base_url();?>plantilla/html/main-theme/css/wysiwyg/bootstrap-wysihtml5.css" rel="stylesheet">
 <link href="<?=base_url();?>plantilla/html/main-theme/css/wysiwyg/wysiwyg-color.css" rel="stylesheet">
 <link href="<?=base_url();?>plantilla/html/main-theme/css/fullcalendar.css" rel="stylesheet">
    <link href="<?=base_url();?>plantilla/html/main-theme/css/chosen.css" rel="stylesheet">
    <link href="<?=base_url();?>plantilla/extjs/resources/css/ext-all.css" rel="stylesheet">
    <link href="<?=base_url();?>plantilla/extjs/resources/css/extjs.css" rel="stylesheet">



<!--[if IE 7]>
<link rel="stylesheet" type="text/css" href="css/ie/ie7.css" />
<![endif]-->
<!--[if IE 8]>
<link rel="stylesheet" type="text/css" href="<?=base_url();?>plantilla/html/main-theme/css/ie/ie8.css" />
<![endif]-->
<!--[if IE 9]>
<link rel="stylesheet" type="text/css" href="<?=base_url();?>plantilla/html/main-theme/css/ie/ie9.css" />
<![endif]-->
<!--<link href='http://fonts.googleapis.com/css?family=Dosis' rel='stylesheet' type='text/css'>-->
<!--fav and touch icons -->
<link rel="shortcut icon" href="<?=base_url();?>plantilla/html/main-theme/ico/favicon.ico">
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?=base_url();?>plantilla/html/main-theme/ico/apple-touch-icon-144-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?=base_url();?>plantilla/html/main-theme/ico/apple-touch-icon-114-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?=base_url();?>plantilla/html/main-theme/ico/apple-touch-icon-72-precomposed.png">
<link rel="apple-touch-icon-precomposed" href="<?=base_url();?>plantilla/html/main-theme/ico/apple-touch-icon-57-precomposed.png">
<!--============ javascript ===========-->
<script src="<?=base_url();?>plantilla/html/main-theme/js/jquery.js"></script>
<script src="<?=base_url();?>plantilla/html/main-theme/js/jquery-ui-1.10.1.custom.min.js"></script>
<script src="<?=base_url();?>plantilla/html/main-theme/js/bootstrap.js"></script>
<script src="<?=base_url();?>plantilla/html/main-theme/js/jquery.sparkline.js"></script>
<script src="<?=base_url();?>plantilla/html/main-theme/js/bootstrap-fileupload.js"></script>
<script src="<?=base_url();?>plantilla/html/main-theme/js/jquery.metadata.js"></script>
<script src="<?=base_url();?>plantilla/html/main-theme/js/jquery.tablesorter.min.js"></script>
<script src="<?=base_url();?>plantilla/html/main-theme/js/jquery.tablecloth.js"></script>
<script src="<?=base_url();?>plantilla/html/main-theme/js/jquery.flot.js"></script>
<script src="<?=base_url();?>plantilla/html/main-theme/js/jquery.flot.selection.js"></script>
<script src="<?=base_url();?>plantilla/html/main-theme/js/excanvas.js"></script>
<script src="<?=base_url();?>plantilla/html/main-theme/js/jquery.flot.pie.js"></script>
<script src="<?=base_url();?>plantilla/html/main-theme/js/jquery.flot.stack.js"></script>
<script src="<?=base_url();?>plantilla/html/main-theme/js/jquery.flot.time.js"></script>
<script src="<?=base_url();?>plantilla/html/main-theme/js/jquery.flot.tooltip.js"></script>
<script src="<?=base_url();?>plantilla/html/main-theme/js/jquery.flot.resize.js"></script>
<script src="<?=base_url();?>plantilla/html/main-theme/js/jquery.collapsible.js"></script>
<script src="<?=base_url();?>plantilla/html/main-theme/js/accordion.nav.js"></script>
<script src="<?=base_url();?>plantilla/html/main-theme/js/jquery.gritter.js"></script>
<script src="<?=base_url();?>plantilla/html/main-theme/js/tiny_mce/jquery.tinymce.js"></script>
<script src="<?=base_url();?>plantilla/html/main-theme/js/custom.js"></script>
<script src="<?=base_url();?>plantilla/html/main-theme/js/respond.min.js"></script>
<script src="<?=base_url();?>plantilla/html/main-theme/js/ios-orientationchange-fix.js"></script>
<script src="<?=base_url();?>plantilla/html/main-theme/js/fullcalendar.min.js"></script>
<script src="<?=base_url();?>plantilla/html/main-theme/js/excanvas.js"></script>
<script src="<?=base_url();?>plantilla/html/main-theme/js/bootbox.js"></script>
<script src="<?=base_url();?>plantilla/html/main-theme/js/jquery.jCombo.min.js"></script>
    <script src="<?=base_url();?>plantilla/html/main-theme/js/chosen.jquery.js"></script>
    <script src="<?=base_url();?>plantilla/html/main-theme/js/date.js"></script>
    <script src="<?=base_url();?>plantilla/html/main-theme/js/jquery.tagsinput.js"></script>
    <script src="<?=base_url();?>plantilla/html/main-theme/js/ext-base.js"></script>
    <script src="<?=base_url();?>plantilla/html/main-theme/js/ext-all.js"></script>
    <script src="<?=base_url();?>plantilla/html/main-theme/js/SelectBox.js"></script>

    <script src="<?=base_url();?>plantilla/html/main-theme/js/MultiSelect.js"></script>


    <script>

        var base_url = '<?php echo base_url();?>';

    </script>

    <script src="<?=base_url();?>plantilla/html/main-theme/js/ItemSelector.js"></script>





    <script src="<?=base_url();?>plantilla/html/main-theme/js/bootstrap-datetimepicker.min.js"></script>

<script type="text/javascript">
/*===============================================
FLOT PIE CHART
==================================================*/

    $(function () {
        var data = [{
            label: "Page View",
            data: 70
        }, {
            label: "Online User",
            data: 30
        }];
        var options = {
            series: {
                pie: {
                    show: true,
					innerRadius: 0.5,
            show: true
                }
            },
            legend: {
                show: true
            },
            grid: {
                hoverable: true,
                clickable: true
            },
			 colors: ["#b086c3", "#ea701b"],
            tooltip: true,
            tooltipOpts: {
				shifts: { 
					  x: -100                     //10
				  },
                defaultTheme: false
            }
        };
       // $.plot($("#pie-chart-donut #pie-donutContainer"), data, options);
    });
</script>
<script type='text/javascript'>
            $(document).ready(function () {
                var date = new Date();
                var d = date.getDate();
                var m = date.getMonth();
                var y = date.getFullYear();
                $('#calendar').fullCalendar({
                    header: {
                        left: 'prev,next today',
                        center: 'title',
                        right: 'month,agendaWeek,agendaDay'
                    },
                    buttonText: {
                        prev: 'Prev',
                        next: 'Next',
                        today: 'Today',
                        month: 'Month',
                        week: 'Week',
                        day: 'Day'
                    },
                    editable: true,
                    events: [{
                        title: 'All Day Event',
                        start: new Date(y, m, 1)
                    }, {
                        title: 'Long Event',
                        start: new Date(y, m, d - 5),
                        end: new Date(y, m, d - 2)
                    }, {
                        id: 999,
                        title: 'Repeating Event',
                        start: new Date(y, m, d - 3, 16, 0),
                        allDay: false
                    }, {
                        id: 999,
                        title: 'Repeating Event',
                        start: new Date(y, m, d + 4, 16, 0),
                        allDay: false
                    }, {
                        title: 'Meeting',
                        start: new Date(y, m, d, 10, 30),
                        allDay: false
                    }, {
                        title: 'Lunch',
                        start: new Date(y, m, d, 12, 0),
                        end: new Date(y, m, d, 14, 0),
                        allDay: false
                    }, {
                        title: 'Birthday Party',
                        start: new Date(y, m, d + 1, 19, 0),
                        end: new Date(y, m, d + 1, 22, 30),
                        allDay: false
                    }, {
                        title: 'Click for Google',
                        start: new Date(y, m, 28),
                        end: new Date(y, m, 29),
                        url: 'http://google.com/'
                    }]
                });
            });
        </script>
</head>
<body>