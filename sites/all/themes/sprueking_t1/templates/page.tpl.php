<header id="navbar" role="banner" class="navbar navbar-fixed-top">
  <div class="navbar-inner">
    <div class="container">
      <!-- .btn-navbar is used as the toggle for collapsed navbar content -->
      <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <?php if (!empty($logo)): ?>
        <a class="logo pull-left" href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>">
          <img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" />
        </a>
      <?php endif; ?>

      <?php if (!empty($site_name)): ?>
        <h1 id="site-name">
          <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" class="brand"><?php print $site_name; ?></a>
        </h1>
      <?php endif; ?>

      <?php if (!empty($primary_nav) || !empty($secondary_nav) || !empty($page['navigation'])): ?>
        <div class="nav-collapse collapse">
          <nav role="navigation">
            <?php if (!empty($primary_nav)): ?>
              <?php print render($primary_nav); ?>
            <?php endif; ?>
            <?php if (!empty($secondary_nav)): ?>
              <?php print render($secondary_nav); ?>
            <?php endif; ?>
            <?php if (!empty($page['navigation'])): ?>
              <?php print render($page['navigation']); ?>
            <?php endif; ?>
          </nav>
        </div>
      <?php endif; ?>
    </div>
  </div>
</header>

<div class="main-container container">

  <header role="banner" id="page-header">
    <?php if (!empty($site_slogan)): ?>
      <p class="lead"><?php print $site_slogan; ?></p>
    <?php endif; ?>

    <?php print render($page['header']); ?>
  </header> <!-- /#header -->

  <div class="row-fluid">

    <?php if (!empty($page['sidebar_first'])): ?>
      <aside class="span3" role="complementary">
        <?php print render($page['sidebar_first']); ?>
      </aside>  <!-- /#sidebar-first -->
    <?php endif; ?>  

    <section class="span8">  
      <?php
    //<section class="<?php print _bootstrap_content_span($columns); ? >">  
      	if (!empty($page['highlighted']))
      	{
      ?>
        <div class="highlighted hero-unit"><?php print render($page['highlighted']); ?></div>
      <?php 
      	} 
      	if (!empty($xxbreadcrumb)) print $xxbreadcrumb;
      ?>
      <a id="main-content"></a>
      <?php
      	print render($title_prefix);
      	if (!empty($title))
      	{
      ?>
        <h1 class="page-header"><?php print $title; ?></h1>
      <?php 
      	}
      	print render($title_suffix);
      	print $messages;
      	if (!empty($tabs))
      	{
        	print render($tabs);
      	}
      	if (!empty($page['help']))
      	{
      ?>
        <div class="well"><?php print render($page['help']); ?></div>
      <?php 
      	}
        if (!empty($action_links))
        {
      ?>
        <ul class="action-links"><?php print render($action_links); ?></ul>
      <?php
      	}
      	print render($page['content']);
      ?>
    </section>

    <?php
    	if (!empty($page['sidebar_second']))
    	{
    ?>
      <aside class="span4" role="complementary">
        <?php print render($page['sidebar_second']); ?>
      </aside>  <!-- /#sidebar-second -->
    <?php
    	}
    ?>

  </div>
</div>
<footer class="footer container">
  <?php print render($page['footer']); ?>
</footer>
