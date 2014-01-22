
<?php 
foreach($css_files as $file): ?>
	<link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
<?php endforeach; ?>
<?php foreach($js_files as $file): ?>
	<script src="<?php echo $file; ?>"></script>
<?php endforeach; ?>
<style type='text/css'>
body
{
	font-family: Arial;
	font-size: 14px;
}
a {
    color: blue;
    text-decoration: none;
    font-size: 14px;
}
a:hover
{
	text-decoration: underline;
}

</style>
 <div class="container-fluid">
      <div class="dashboard-container">
        <?php include('plantillas/main_menu.php');?>
        <div class="dashboard-wrapper">
          
          <div class="left-sidebar">
            
            <div class="row-fluid">
              <div class="span12">
              <div class="widget">
                  <div class="widget-header">
                    <div class="title">
                      Line Chart
                      <span class="mini-title">
                        Social Statistics 
                      </span>
                    </div>
                    <span class="tools">
                      <a class="fs1" aria-hidden="true" data-icon="&#xe090;"></a>
                    </span>
                  </div>
                  <div class="widget-body">
                    <?=$output?>
                  </div>
                </div>
              
              
              
              </div>
              
             </div> 
           </div>
           <div class="right-sidebar">
            
            <div class="wrapper">
              <ul class="stats">
                <li>
                  <div class="left">
                    <h4>
                      15,859
                    </h4>
                    <p>
                      Unique Visitors
                    </p>
                  </div>
                  <div class="chart">
                    <span id="unique-visitors">
                      2, 4, 1, 7, 9, 8, 2, 3, 5, 6
                    </span>
                  </div>
                </li>
                <li>
                  <div class="left">
                    <h4>
                      $47,830
                    </h4>
                    <p>
                      Monthly Sales
                    </p>
                  </div>
                  <div class="chart">
                    <span id="monthly-sales">
                      3, 9, 8, 5, 3, 5, 2, 3, 4, 7
                    </span>
                  </div>
                </li>
                <li>
                  <div class="left">
                    <h4>
                      $98,846
                    </h4>
                    <p>
                      Current balance
                    </p>
                  </div>
                  <div class="chart">
                    <span id="current-balance">
                      3, 5, 8, 5, 3, 5, 2, 9, 6, 8
                    </span>
                  </div>
                </li>
                <li>
                  <div class="left">
                    <h4>
                      18,846
                    </h4>
                    <p>
                      Registrations
                    </p>
                  </div>
                  <div class="chart">
                    <span id="registrations">
                      3, 9, -8, 5, -3, 5, -2, 9, 6, 8
                    </span>
                  </div>
                </li>
                <li>
                  <div class="left">
                    <h4>
                      22,571
                    </h4>
                    <p>
                      Site Visits
                    </p>
                  </div>
                  <div class="chart">
                    <span id="site-visits">
                      2, 5, -4, 6, -3, 5, -2, 7, 9, 5
                    </span>
                  </div>
                </li>
              </ul>
            </div>
            
            <hr class="hr-stylish-1">
            
            
            <div class="wrapper">
              <div id="scrollbar">
                <div class="scrollbar">
                  <div class="track">
                    <div class="thumb">
                      <div class="end">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="viewport">
                  <div class="overview">
                    <div class="featured-articles-container">
                      <h5 class="heading">
                        Recent Articles
                      </h5>
                      <div class="articles">
                        <a href="#">
                          <span class="label-bullet">
                            &nbsp;
                          </span>
                          Hosting Made For WordPress
                        </a>
                        <a href="#">
                          <span class="label-bullet">
                            &nbsp;
                          </span>
                          Reinvent cutting-edge
                        </a>
                        <a href="#">
                          <span class="label-bullet">
                            &nbsp;
                          </span>
                          partnerships models 24/7
                        </a>
                        <a href="#">
                          <span class="label-bullet">
                            &nbsp;
                          </span>
                          Eyeballs frictionless
                        </a>
                        <a href="#">
                          <span class="label-bullet">
                            &nbsp;
                          </span>
                          Empower deliver innovate
                        </a>
                        <a href="#">
                          <span class="label-bullet">
                            &nbsp;
                          </span>
                          Portals technologies
                        </a>
                        <a href="#">
                          <span class="label-bullet">
                            &nbsp;
                          </span>
                          Collaborative innovate
                        </a>
                        <a href="#">
                          <span class="label-bullet">
                            &nbsp;
                          </span>
                          Mashups experiences plug
                        </a>
                        <a href="#">
                          <span class="label-bullet">
                            &nbsp;
                          </span>
                          Portals technologies
                        </a>
                        <a href="#">
                          <span class="label-bullet">
                            &nbsp;
                          </span>
                          Collaborative innovate
                        </a>
                        <a href="#">
                          <span class="label-bullet">
                            &nbsp;
                          </span>
                          Mashups experiences plug
                        </a>
                        <a href="#">
                          <span class="label-bullet">
                            &nbsp;
                          </span>
                          B2B plug and play
                        </a>
                        <a href="#">
                          <span class="label-bullet">
                            &nbsp;
                          </span>
                          Need some interesting
                        </a>
                        <a href="#">
                          <span class="label-bullet">
                            &nbsp;
                          </span>
                          Portals technologies
                        </a>
                        <a href="#">
                          <span class="label-bullet">
                            &nbsp;
                          </span>
                          Collaborative innovate
                        </a>
                        <a href="#">
                          <span class="label-bullet">
                            &nbsp;
                          </span>
                          Portals technologies
                        </a>
                        <a href="#">
                          <span class="label-bullet">
                            &nbsp;
                          </span>
                          Collaborative innovate
                        </a>
                        <a href="#">
                          <span class="label-bullet">
                            &nbsp;
                          </span>
                          Mashups experiences plug
                        </a>
                        <a href="#">
                          <span class="label-bullet">
                            &nbsp;
                          </span>
                          B2B plug and play
                        </a>
                        <a href="#">
                          <span class="label-bullet">
                            &nbsp;
                          </span>
                          Need some interesting
                        </a>
                        <a href="#">
                          <span class="label-bullet">
                            &nbsp;
                          </span>
                          Portals technologies
                        </a>
                        <a href="#">
                          <span class="label-bullet">
                            &nbsp;
                          </span>
                          Collaborative innovate
                        </a>
                        <a href="#">
                          <span class="label-bullet">
                            &nbsp;
                          </span>
                          Mashups experiences plug
                        </a>
                        <a href="#">
                          <span class="label-bullet">
                            &nbsp;
                          </span>
                          Need some interesting
                        </a>
                        <a href="#">
                          <span class="label-bullet">
                            &nbsp;
                          </span>
                          Portals technologies
                        </a>
                        <a href="#">
                          <span class="label-bullet">
                            &nbsp;
                          </span>
                          Collaborative innovate
                        </a>
                        <a href="#">
                          <span class="label-bullet">
                            &nbsp;
                          </span>
                          Mashups experiences plug
                        </a>
                        <a href="#">
                          <span class="label-bullet">
                            &nbsp;
                          </span>
                          B2B plug and play
                        </a>
                        <a href="#">
                          <span class="label-bullet">
                            &nbsp;
                          </span>
                          Need some interesting
                        </a>
                        <a href="#">
                          <span class="label-bullet">
                            &nbsp;
                          </span>
                          Portals technologies
                        </a>
                        <a href="#">
                          <span class="label-bullet">
                            &nbsp;
                          </span>
                          Collaborative innovate
                        </a>
                        <a href="#">
                          <span class="label-bullet">
                            &nbsp;
                          </span>
                          Portals technologies
                        </a>
                        <a href="#">
                          <span class="label-bullet">
                            &nbsp;
                          </span>
                          Collaborative innovate
                        </a>
                        <a href="#">
                          <span class="label-bullet">
                            &nbsp;
                          </span>
                          Mashups experiences plug
                        </a>
                        <a href="#">
                          <span class="label-bullet">
                            &nbsp;
                          </span>
                          B2B plug and play
                        </a>
                        <a href="#">
                          <span class="label-bullet">
                            &nbsp;
                          </span>
                          Need some interesting
                        </a>
                        <a href="#">
                          <span class="label-bullet">
                            &nbsp;
                          </span>
                          Portals technologies
                        </a>
                        <a href="#">
                          <span class="label-bullet">
                            &nbsp;
                          </span>
                          Collaborative innovate
                        </a>
                        <a href="#">
                          <span class="label-bullet">
                            &nbsp;
                          </span>
                          Mashups experiences plug
                        </a>
                      </div>
                      
                    </div>
                    
                  </div>
                </div>
              </div>
            </div>
            
            <hr class="hr-stylish-1">
            
            <div class="wrapper">
              <div id="scrollbar-two">
                <div class="scrollbar">
                  <div class="track">
                    <div class="thumb">
                      <div class="end">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="viewport">
                  <div class="overview">
                    <div class="featured-articles-container">
                      <h5 class="heading-blue">
                        Featured posts
                      </h5>
                      <div class="articles">
                        <a href="#">
                          <span class="label-bullet-blue">
                            &nbsp;
                          </span>
                          Hosting Made For WordPress
                        </a>
                        <a href="#">
                          <span class="label-bullet-blue">
                            &nbsp;
                          </span>
                          Reinvent cutting-edge
                        </a>
                        <a href="#">
                          <span class="label-bullet-blue">
                            &nbsp;
                          </span>
                          partnerships models 24/7
                        </a>
                        <a href="#">
                          <span class="label-bullet-blue">
                            &nbsp;
                          </span>
                          Eyeballs frictionless
                        </a>
                        <a href="#">
                          <span class="label-bullet-blue">
                            &nbsp;
                          </span>
                          Empower deliver innovate
                        </a>
                        <a href="#">
                          <span class="label-bullet-blue">
                            &nbsp;
                          </span>
                          Portals technologies
                        </a>
                        <a href="#">
                          <span class="label-bullet-blue">
                            &nbsp;
                          </span>
                          Collaborative innovate
                        </a>
                        <a href="#">
                          <span class="label-bullet-blue">
                            &nbsp;
                          </span>
                          Mashups experiences plug
                        </a>
                        <a href="#">
                          <span class="label-bullet-blue">
                            &nbsp;
                          </span>
                          Need some interesting
                        </a>
                        <a href="#">
                          <span class="label-bullet-blue">
                            &nbsp;
                          </span>
                          Portals technologies
                        </a>
                        <a href="#">
                          <span class="label-bullet-blue">
                            &nbsp;
                          </span>
                          Collaborative innovate
                        </a>
                        <a href="#">
                          <span class="label-bullet-blue">
                            &nbsp;
                          </span>
                          Mashups experiences plug
                        </a>
                        <a href="#">
                          <span class="label-bullet-blue">
                            &nbsp;
                          </span>
                          B2B plug and play
                        </a>
                        <a href="#">
                          <span class="label-bullet-blue">
                            &nbsp;
                          </span>
                          Need some interesting
                        </a>
                        <a href="#">
                          <span class="label-bullet-blue">
                            &nbsp;
                          </span>
                          Portals technologies
                        </a>
                        <a href="#">
                          <span class="label-bullet-blue">
                            &nbsp;
                          </span>
                          Collaborative innovate
                        </a>
                        <a href="#">
                          <span class="label-bullet-blue">
                            &nbsp;
                          </span>
                          Portals technologies
                        </a>
                        <a href="#">
                          <span class="label-bullet-blue">
                            &nbsp;
                          </span>
                          Collaborative innovate
                        </a>
                        <a href="#">
                          <span class="label-bullet-blue">
                            &nbsp;
                          </span>
                          Mashups experiences plug
                        </a>
                        <a href="#">
                          <span class="label-bullet-blue">
                            &nbsp;
                          </span>
                          B2B plug and play
                        </a>
                        <a href="#">
                          <span class="label-bullet-blue">
                            &nbsp;
                          </span>
                          Need some interesting
                        </a>
                        <a href="#">
                          <span class="label-bullet-blue">
                            &nbsp;
                          </span>
                          Portals technologies
                        </a>
                        <a href="#">
                          <span class="label-bullet-blue">
                            &nbsp;
                          </span>
                          Collaborative innovate
                        </a>
                        <a href="#">
                          <span class="label-bullet-blue">
                            &nbsp;
                          </span>
                          Mashups experiences plug
                        </a>
                      </div>
                      
                    </div>
                    
                  </div>
                </div>
              </div>
            </div>
            
            
          </div>
           
           
           
          </div>   
  </div> 
  </div>           
              
	

	  
