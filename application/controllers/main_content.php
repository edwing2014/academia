
    <div class="container-fluid">
      <div class="dashboard-container">
      	
        <?php 
        
        include('main_menu.php');?>
        <div class="dashboard-wrapper">
          
          <div class="left-sidebar">
            
            <div class="row-fluid">
              <div class="span12">
                <div class="widget">
                  <div class="widget-header">
                    <div class="title">
                      Inicio Rapido
                      <span class="mini-title">
                        Navegacion principal
                      </span>
                    </div>
                    <span class="tools">
                      <a class="fs1" aria-hidden="true" data-icon="&#xe090;"></a>
                    </span>
                  </div>
                  <div class="widget-body">
                    <div class="row-fluid">
                      <div class="metro-nav">
                        <div class="metro-nav-block nav-block-yellow current">
                          <a href="index.html" >
                            <div class="fs1" aria-hidden="true" data-icon="&#xe0a0;"></div>
                            <div class="brand">
                              Principal
                            </div>
                          </a>
                        </div>
                        <div class="metro-nav-block nav-block-orange">
                          <a href="ui-elements.html" >
                            <div class="fs1" aria-hidden="true" data-icon="&#xe0d2;"></div>
                            <div class="brand">
                              Agregar cuenta
                            </div>
                          </a>
                        </div>
                        <div class="metro-nav-block nav-block-blue double">
                          <a href="graphs.html" >
                            <div class="fs1" aria-hidden="true" data-icon="&#xe096;"></div>
                            <div class="brand">
                              Agregar cliente
                            </div>
                          </a>
                        </div>
                        <div class="metro-nav-block nav-block-green">
                          <a href="#myModalp" role="button" class="btn btn-large btn-warning2 btn-block" data-toggle="modal">
                 <div class="fs1" aria-hidden="true" data-icon="&#xe0b8;"></div>
                            <div class="brand">
                              Agregar pedido
                            </div>
              </a>
              
         
                         

                        </div>
                        <div class="metro-nav-block nav-block-red">
                          <a href="icons.html">
                            <div class="fs1" aria-hidden="true" data-icon="&#xe0a9;"></div>
                            <div class="brand">
                              Agregar orden
                            </div>
                          </a>
                        </div>
                     <!--   <div class="metro-nav-block nav-block-red double">
                          <a href="tables.html">
                            <div class="fs1" aria-hidden="true" data-icon="&#xe14a;"></div>
                            <div class="brand">
                              Tables
                            </div>
                          </a>
                        </div>
                        <div class="metro-nav-block nav-block-green">
                          <a href="media.html">
                            <div class="fs1" aria-hidden="true" data-icon="&#xe00d;"></div>
                            <div class="brand">
                              Media
                            </div>
                          </a>
                        </div>
                        <div class="metro-nav-block nav-block-orange">
                          <a href="calendar.html">
                            <div class="fs1" aria-hidden="true" data-icon="&#xe052;"></div>
                            <div class="brand">
                              Calendar
                            </div>
                          </a>
                        </div>
                        <div class="metro-nav-block nav-block-blue">
                          <a href="typography.html">
                            <div class="fs1" aria-hidden="true" data-icon="&#xe100;"></div>
                            <div class="brand">
                              Typography
                            </div>
                          </a>
                        </div>
                        <div class="metro-nav-block nav-block-yellow">
                          <a href="typography.html">
                            <div class="fs1" aria-hidden="true" data-icon="&#xe0aa;"></div>
                            <div class="brand">
                              Extras
                            </div>
                          </a>
                        </div>
-->

                        
                      </div>
                      
                    </div>
                  </div>
                </div>
              </div>
            </div>
            
            
            
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
                    <div id="area_chart">
                    </div>
                  </div>
                </div>
              </div>
            </div>
            
            <div class="row-fluid">
              <div class="span12">
                <div class="widget">
                  <div class="widget-header">
                    <div class="title">
                      Mailbox 
                      <span class="mini-title"><a id="mailbox">Inspired by gmail</a></span>
                    </div>
                    <div class="tools pull-right">
                      <div class="btn-group">
                        <a class="btn btn-small">
                          <i class="icon-share-alt" data-original-title="Share" >
                          </i>
                        </a>
                        <a class="btn btn-small">
                          <i class="icon-exclamation-sign" data-original-title="Report">
                          </i>
                        </a>
                        <a class="btn btn-small">
                          <i class="icon-trash" data-original-title="Delete">
                          </i>
                        </a>
                      </div>
                      <div class="btn-group">
                        <a class="btn btn-small">
                          <i class="icon-folder-close"  data-original-title="Move to">
                          </i>
                        </a>
                        <a class="btn btn-small">
                          <i class="icon-tag" data-original-title="Tag">
                          </i>
                        </a>
                      </div>
                      <div class="btn-group">
                        <a class="btn btn-small">
                          <i class="icon-chevron-left" data-original-title="Prev">
                          </i>
                        </a>
                        <a class="btn btn-small btn-info" >
                          <i class="icon-chevron-right icon-white" data-original-title="Next">
                          </i>
                        </a>
                      </div>
                    </div>
                  </div>
                  <div class="widget-body">
                    <div class="mail">
                      <table class="table table-condensed table-striped table-hover no-margin">
                        <thead>
                          <tr>
                            <th style="width:3%">
                              <input type="checkbox" class="no-margin">
                            </th>
                            <th style="width:17%">
                              Sent by
                            </th>
                            <th style="width:55%" class="hidden-phone">
                              Subject
                            </th>
                            <th style="width:12%" class="right-align-text hidden-phone">
                              Labels
                            </th>
                            <th style="width:12%" class="right-align-text hidden-phone">
                              Date
                            </th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>
                              <input type="checkbox" class="no-margin">
                            </td>
                            <td>
                              Mahendra Dhoni
                            </td>
                            <td class="hidden-phone">
                              <strong>
                                Compass, Sass
                              </strong>
                              <small class="info-fade">
                                Methodologies eyeball
                              </small>
                            </td>
                            <td class="right-align-text hidden-phone">
                              <span class="label label label-info">
                                Read
                              </span>
                            </td>
                            <td class="right-align-text hidden-phone">
                              Valentine
                            </td>
                          </tr>
                          <tr>
                            <td>
                              <input type="checkbox" class="no-margin">
                            </td>
                            <td>
                              Michel Clar
                            </td>
                            <td class="hidden-phone">
                              <strong>
                                Senior Developer
                              </strong>
                              <small class="info-fade">
                                Platforms web-enabled cultivat
                              </small>
                            </td>
                            <td class="right-align-text hidden-phone">
                              <span class="label label label-success">
                                New
                              </span>
                            </td>
                            <td class="right-align-text hidden-phone">
                              Valentine
                            </td>
                          </tr>
                          <tr>
                            <td>
                              <input type="checkbox" class="no-margin">
                            </td>
                            <td>
                              Rahul Dravid
                            </td>
                            <td class="hidden-phone">
                              <strong>
                                Bitbucket
                              </strong>
                              
                              <small class="info-fade">
                                Technologies content deploy ROI
                              </small>
                            </td>
                            <td class="right-align-text hidden-phone">
                              <span class="label label">
                                Imp
                              </span>
                            </td>
                            <td class="right-align-text hidden-phone">
                              Yesterday
                            </td>
                          </tr>
                          <tr>
                            <td>
                              <input type="checkbox" class="no-margin">
                            </td>
                            <td>
                              Anthony Michell
                            </td>
                            <td class="hidden-phone">
                              <strong>
                                Verify your email
                              </strong>
                              
                              <small class="info-fade">
                                Less schemas seamless band
                              </small>
                            </td>
                            <td class="right-align-text hidden-phone">
                              <span class="label label label-info">
                                Read
                              </span>
                            </td>
                            <td class="right-align-text hidden-phone">
                              15-02-2013
                            </td>
                          </tr>
                          <tr>
                            <td>
                              <input type="checkbox" class="no-margin">
                            </td>
                            <td>
                              Srinu Baswa
                            </td>
                            <td class="hidden-phone">
                              <strong>
                                Statement for December 2012
                              </strong>
                              <small class="info-fade">
                                Models seize 
                              </small>
                            </td>
                            <td class="right-align-text hidden-phone">
                              <span class="label label label-success">
                                New
                              </span>
                            </td>
                            <td class="right-align-text hidden-phone">
                              10-02-2013
                            </td>
                          </tr>
                          <tr>
                            <td>
                              <input type="checkbox" class="no-margin">
                            </td>
                            <td>
                              Crazy Singh
                            </td>
                            <td class="hidden-phone">
                              <strong>
                                You're In!
                              </strong>
                              <small class="info-fade">
                                Tagclouds endwidth; morph; distr
                              </small>
                            </td>
                            <td class="right-align-text hidden-phone">
                              <span class="label label">
                                Imp
                              </span>
                            </td>
                            <td class="right-align-text hidden-phone">
                              21-01-2013
                            </td>
                          </tr>
                          <tr>
                            <td>
                              <input type="checkbox" class="no-margin">
                            </td>
                            <td>
                              Sri Ram Raju
                            </td>
                            <td class="hidden-phone">
                              <strong>
                                Support
                              </strong>
                              <small class="info-fade">
                                Distributed incentivize enabl
                              </small>
                            </td>
                            <td class="right-align-text hidden-phone">
                              <span class="label label label-info">
                                New
                              </span>
                            </td>
                            <td class="right-align-text hidden-phone">
                              19-01-2013
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
              
              
            </div>
            
            
            
            <div class="row-fluid">
              
              <div class="span6">
                <div class="widget">
                  <div class="widget-header">
                    <div class="title">
                      To Do Lis<a id="todo">t</a>
                    </div>
                    <span class="tools">
                      <a class="fs1" aria-hidden="true" data-icon="&#xe090;"></a>
                    </span>
                  </div>
                  <div class="widget-body">
                    <div class="todo-container">
                      <ul class="todo-list">
                        <li class="new">
                          <input type="checkbox" id="1" />
                          
                          <label for="1">
                            Send flowers to Sandy 
                            <span class="date">
                              Due Feb 14
                            </span>
                          </label>
                        </li>
                        <li class="process">
                          <input type="checkbox" id="2" checked/>
                          
                          <label for="2">
                            Have tea with the Queen
                            <span class="date">
                              Completed Jan 28
                            </span>
                          </label>
                        </li>
                        <li class="completed">
                          <input type="checkbox" id="3" checked />
                          
                          <label for="3">
                            Be creative
                            <span class="date">
                              Due Feb 2
                            </span>
                          </label>
                        </li>
                        <li class="completed">
                          <input type="checkbox" id="4" />
                          
                          <label for="4">
                            Buy new iPad
                            <span class="date">
                              Due Feb 7
                            </span>
                          </label>
                        </li>
                        <li class="process">
                          <input type="checkbox" id="5" checked/>
                          
                          <label for="5">
                            Pay credit card bill
                            <span class="date">
                              Completed Jan 29
                            </span>
                          </label>
                        </li>
                        <li class="new">
                          <input type="checkbox" id="6" />
                          
                          <label for="6">
                            Take a photograph 
                            <span class="date">
                              Due Jan 30
                            </span>
                            
                          </label>
                        </li>
                        <li class="completed">
                          <input type="checkbox" id="7" />
                          
                          <label for="3">
                            Be creative
                            <span class="date">
                              Due Jan 22
                            </span>
                          </label>
                        </li>
                        <li class="process">
                          <input type="checkbox" id="8">
                          
                          <label for="2">
                            Have tea with the Queen
                            <span class="date">
                              Completed Jan 18
                            </span>
                          </label>
                        </li>
                      </ul>
                      <form class="no-margin">
                        <div class="input-append">
                          <input  id="add-new-task" class="input-block-level" type="text" placeholder="Add new task">
                          <span class="btn btn-info">
                            <strong>
                              +
                            </strong>
                          </span>
                        </div>
                      </form>
                    </div>
                    
                  </div>
                </div>
              </div>
              
              
              <div class="span6">
                <div class="widget">
                  <div class="widget-header">
                    <div class="title">
                      Tweets
                    </div>
                    <span class="tools">
                      <a class="fs1" aria-hidden="true" data-icon="&#xe090;"></a>
                    </span>
                  </div>
                  <div class="widget-body">
                    
                    <div class="message-container">
                      <div class="message">
                        <div class="img-container">
                          <img src="img/profile.jpg" alt="">
                        </div>
                        
                        <article>
                          <h6 class="no-margin">
                            <a href="#" target="_blank" >
                              @srinubasava
                            </a>
                            mentioned you
                          </h6>
                          <p class="no-margin">
                            <a href="#" target="_blank">
                              @hohoo
                            </a>
                            Cultivate dynamic synergies: technologies content?
                          </p>
                        </article>
                        <div class="icons-nav">
                          <ul>
                            <li class="time">
                              2mins
                            </li>
                            <li>
                              <a class="fs1" aria-hidden="true" data-icon="&#xe0a7;"></a>
                            
                              <a class="fs1" aria-hidden="true" data-icon="&#xe0d1;"></a>
                            </li>
                          </ul>
                        </div>
                      </div>
                      
                      <div class="message">
                        <div class="img-container">
                          <img src="img/profile.jpg" alt="">
                        </div>
                        
                        <article>
                          <h6 class="no-margin">
                            <a href="#" target="_blank" >
                              @srinubasava
                            </a>
                            mentioned you
                          </h6>
                          <p class="no-margin">
                            <a href="#" target="_blank">
                              @hehee
                            </a>
                            Methodologies latforms web-enabled cultivate?
                          </p>
                        </article>
                        <div class="icons-nav">
                          <ul>
                            <li class="time">
                              10mins
                            </li>
                            <li>
                              <a class="fs1" aria-hidden="true" data-icon="&#xe0a7;"></a>
                            
                              <a class="fs1" aria-hidden="true" data-icon="&#xe0d1;"></a>
                            </li>
                          </ul>
                        </div>
                      </div>
                      
                      <div class="message">
                        <div class="img-container">
                          <img src="img/profile.jpg" alt="">
                        </div>
                        
                        <article>
                          <h6 class="no-margin">
                            <a href="#" target="_blank" >
                              @srinubasava
                            </a>
                            mentioned you
                          </h6>
                          <p class="no-margin">
                            <a href="#" target="_blank">
                              @hahaa
                            </a>
                            Eyeballs methodologies latforms web-enabled cultivate?
                          </p>
                        </article>
                        <div class="icons-nav">
                          <ul>
                            <li class="time">
                              22mins
                            </li>
                            <li>
                              <a class="fs1" aria-hidden="true" data-icon="&#xe0a7;"></a>
                            
                              <a class="fs1" aria-hidden="true" data-icon="&#xe0d1;"></a>
                            </li>
                          </ul>
                        </div>
                      </div>
                      
                    </div>
                    
                  </div>
                </div>
              </div>
              
            </div>
            
            
            <div class="row-fluid">
              <div class="span12">
                <div class="widget">
                  <div class="widget-header">
                    <div class="title">
                      Chat<a id="chats">s</a>
                    </div>
                    <span class="tools">
                      <a class="fs1" aria-hidden="true" data-icon="&#xe090;"></a>
                    </span>
                  </div>
                  <div class="widget-body">
                    <div id="scrollbar-three">
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
                          <ul class="chats">
                            <li class="in">
                              <img class="avatar" alt="" src="img/profile.jpg">
                              <div class="message">
                                <span class="arrow">
                                </span>
                                <a href="#" class="name">
                                  Srinu Baswa
                                </a>
                                <span class="date-time">
                                  at Feb 14, 2013 12:20
                                </span>
                                <span class="body">
                                  Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Reprehenderit butcher retro keffiyeh dreamcatcher synth terry richardsoAustin. Nesciunt tofu stumptown aliqua, retro synth master cleanse.
                                </span>
                              </div>
                            </li>
                            <li class="out">
                              <img class="avatar" alt="" src="img/profile.jpg">
                              <div class="message">
                                <span class="arrow">
                                </span>
                                <a href="#" class="name">
                                  Naani
                                </a>
                                <span class="date-time">
                                  at Feb 10, 2013 09:32
                                </span>
                                <span class="body">
                                  Next level keffiyeh you probably haven't heard of fixie sustainable quinoa 8-bit american apparel have a terry richardson vinyl chambray. Beard stumptown, cardigans banh mi lomo thundercats.
                                </span>
                              </div>
                            </li>
                            <li class="in">
                              <img class="avatar" alt="" src="img/profile.jpg">
                              <div class="message">
                                <span class="arrow">
                                </span>
                                <a href="#" class="name">
                                  Kelly
                                </a>
                                <span class="date-time">
                                  at Feb 8, 2013 04:21
                                </span>
                                <span class="body">
                                  Beard stumptown, cardigans banh mi lomo thundercats. whatever keytar, scenester farm-to-table banksy Austin twitter handle freegan cred raw denim single-origin coffee viral.
                                </span>
                              </div>
                            </li>
                            <li class="out">
                              <img class="avatar" alt="" src="img/profile.jpg">
                              <div class="message">
                                <span class="arrow">
                                </span>
                                <a href="#" class="name">
                                  Hehe
                                </a>
                                <span class="date-time">
                                  at Jan 29, 2013 08:10
                                </span>
                                <span class="body">
                                  Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Reprehenderit butcher retro keffiyeh dreamcatcher synth terry richardsoAustin. Nesciunt tofu stumptown aliqua, retro synth master cleanse.
                                </span>
                              </div>
                            </li>
                            <li class="in">
                              <img class="avatar" alt="" src="img/profile.jpg">
                              <div class="message">
                                <span class="arrow">
                                </span>
                                <a href="#" class="name">
                                  Bulley
                                </a>
                                <span class="date-time">
                                  at jan 14, 2013 06:43
                                </span>
                                <span class="body">
                                  Tight pants next level keffiyeh you probably haven't heard of fixie sustainable quinoa 8-bit american apparel have a terry richardson vinyl chambray. Beard stumptown, cardigans banh mi lomo thundercats.
                                </span>
                              </div>
                            </li>
                            <li class="out">
                              <img class="avatar" alt="" src="img/profile.jpg">
                              <div class="message">
                                <span class="arrow">
                                </span>
                                <a href="#" class="name">
                                  Batman
                                </a>
                                <span class="date-time">
                                  at Jan 09, 2013 01:19
                                </span>
                                <span class="body">
                                  Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. 
                                </span>
                              </div>
                            </li>
                            <li class="in">
                              <img class="avatar" alt="" src="img/profile.jpg">
                              <div class="message">
                                <span class="arrow">
                                </span>
                                <a href="#" class="name">
                                  Ganggyy
                                </a>
                                <span class="date-time">
                                  at Jan 03, 2013 09:09
                                </span>
                                <span class="body">
                                  Enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. 
                                </span>
                              </div>
                            </li>
                            <li class="out">
                              <img class="avatar" alt="" src="img/profile.jpg">
                              <div class="message">
                                <span class="arrow">
                                </span>
                                <a href="#" class="name">
                                  Cowboy
                                </a>
                                <span class="date-time">
                                  at Jan 01, 2013 07:49
                                </span>
                                <span class="body">
                                  Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. 
                                </span>
                              </div>
                            </li>
                            <li class="in">
                              <img class="avatar" alt="" src="img/profile.jpg">
                              <div class="message">
                                <span class="arrow">
                                </span>
                                <a href="#" class="name">
                                  Cockoo
                                </a>
                                <span class="date-time">
                                  at Dec 28, 2012 02:39
                                </span>
                                <span class="body">
                                  Dnim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch.Enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Anim pariatur cliche reprehenderit,  
                                </span>
                              </div>
                            </li>
                            <li class="out">
                              <img class="avatar" alt="" src="img/profile.jpg">
                              <div class="message">
                                <span class="arrow">
                                </span>
                                <a href="#" class="name">
                                  Batman
                                </a>
                                <span class="date-time">
                                  at Jan 09, 2013 01:19
                                </span>
                                <span class="body">
                                  Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. 
                                </span>
                              </div>
                            </li>
                            <li class="in">
                              <img class="avatar" alt="" src="img/profile.jpg">
                              <div class="message">
                                <span class="arrow">
                                </span>
                                <a href="#" class="name">
                                  Ganggyy
                                </a>
                                <span class="date-time">
                                  at Jan 03, 2013 09:09
                                </span>
                                <span class="body">
                                  Enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. 
                                </span>
                              </div>
                            </li>
                            <li class="out">
                              <img class="avatar" alt="" src="img/profile.jpg">
                              <div class="message">
                                <span class="arrow">
                                </span>
                                <a href="#" class="name">
                                  Cowboy
                                </a>
                                <span class="date-time">
                                  at Jan 01, 2013 07:49
                                </span>
                                <span class="body">
                                  Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. 
                                </span>
                              </div>
                            </li>
                            <li class="in">
                              <img class="avatar" alt="" src="img/profile.jpg">
                              <div class="message">
                                <span class="arrow">
                                </span>
                                <a href="#" class="name">
                                  Cockoo
                                </a>
                                <span class="date-time">
                                  at Dec 28, 2012 02:39
                                </span>
                                <span class="body">
                                  Dnim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch.Enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Anim pariatur cliche reprehenderit,  
                                </span>
                              </div>
                            </li>
                          </ul>
                          
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            
            
            <div class="row-fluid">
              <div class="span12">
                <div class="widget no-margin">
                  <div class="widget-header">
                    <div class="title">
                      Notification<a id="notifications">s</a>
                    </div>
                    <span class="tools">
                      <a class="fs1" aria-hidden="true" data-icon="&#xe090;"></a>
                    </span>
                  </div>
                  <div class="widget-body">
                    
                    <div class="alert alert-block alert-error fade in">
                      <button data-dismiss="alert" class="close" type="button">
                        ×
                      </button>
                      <h4 class="alert-heading">
                        Error!
                      </h4>
                      <p>
                        Methodologies eyeballs incentivize models. Platforms web-enabled cultivate dynamic synergies: technologies content
                      </p>
                      <p>
                        <a href="#" class="btn btn-danger">
                          Submit
                        </a>
                        
                        <a href="#" class="btn">
                          Cancel
                        </a>
                      </p>
                    </div>
                    <div class="alert alert-block alert-warning fade in">
                      <button data-dismiss="alert" class="close" type="button">
                        ×
                      </button>
                      <h4 class="alert-heading">
                        Warning!
                      </h4>
                      <p>
                        Methodologies eyeballs incentivize models. Platforms web-enabled cultivate dynamic synergies: technologies content deploy ROI communities
                      </p>
                      <p>
                        <a href="#" class="btn btn-warning">
                          Submit
                        </a>
                        
                        <a href="#" class="btn">
                          Cancel
                        </a>
                      </p>
                    </div>
                    <div class="alert alert-block alert-success fade in">
                      <button data-dismiss="alert" class="close" type="button">
                        ×
                      </button>
                      <h4 class="alert-heading">
                        Success!
                      </h4>
                      <p>
                        Methodologies eyeballs incentivize models. Platforms web-enabled cultivate dynamic synergies: technologies deploy communities methodologies sticky
                      </p>
                      <p>
                        <a href="#" class="btn btn-success">
                          Submit
                        </a>
                        
                        <a href="#" class="btn">
                          Cancel
                        </a>
                      </p>
                    </div>
                    
                    <div class="alert alert-block alert-info fade in no-margin">
                      <button data-dismiss="alert" class="close" type="button">
                        ×
                      </button>
                      <h4 class="alert-heading">
                        Info!
                      </h4>
                      <p>
                        Eyeballs incentivize models. Platforms web-enabled cultivate dynamic synergies: technologies content deploy ROI communities methodologies sticky
                      </p>
                      <p>
                        <a href="#" class="btn btn-info">
                          Submit
                        </a>
                        
                        <a href="#" class="btn">
                          Cancel
                        </a>
                      </p>
                    </div>
                    
                    
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
      <!--/.fluid-container-->
    </div>
   
    
    