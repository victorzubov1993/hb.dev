<nav id="sidebar" role="navigation" data-step="2" data-intro="Template has <b>many navigation styles</b>" data-position="right" class="navbar-default navbar-static-side" style="min-height: 100%;">
      <div class="sidebar-collapse menu-scroll">
         <ul id="side-menu" class="nav">
            <div class="clearfix"></div>
            <li class="active">
               <a href="<?=base_url()."main";?>">
                  <i class="fa fa-tachometer fa-fw">
                     <div class="icon-bg bg-orange"></div>
                  </i>
                  <span class="menu-title">Итоги отчетного периода</span>
               </a>
            </li>
            <li class="dropdown-submenu">
               <a href="<?php echo site_url('main/income');?>">
                  <i class="fa fa-folder-o fa-fw">
                     <div class="icon-bg bg-red"></div>
                  </i>
                  <span class="menu-title">Доходы</span>
               </a>
               <ul class="dropdown-menu">
                     <li></li>
                     <li><a href="#">Second level</a></li>
                     <li><a href="#">Second level</a></li>
               </ul>
            </li>
            <li>
               <a href="<?php echo site_url('main/expense');?>">
                  <i class="fa fa-folder-o fa-fw">
                     <div class="icon-bg bg-red"></div>
                  </i>
                  <span class="menu-title">Расходы</span>
               </a>
            </li>
            <li>
               <a href="DataGrid.html">
                  <i class="fa fa-folder-o fa-fw">
                     <div class="icon-bg bg-red"></div>
                  </i>
                  <span class="menu-title">Бюджет</span>
               </a>
            </li>
         </ul>
      </div>
   </nav>