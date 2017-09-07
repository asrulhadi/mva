<!DOCTYPE html>
<html lang="en">
  <head>
    {include file='header-bootstrap.tpl'}
    <title>Vulnerable Web Application</title>
  </head>

  <body>
    {include file='nav-bootstrap.tpl'}

    <div class="container">
      {include file='blog-header.tpl'}

      <div class="row">
        <div class="col-sm-8 blog-main">
        {block name='utama'} {/block}
        </div><!-- /blog-main -->

        <div class="col-sm-3 col-sm-offset-1 blog-sidebar">
        {include file='sidebar.tpl'} {block name='tepi'} {/block}
        </div><!-- /blog-sidebar -->
      </div><!-- /row -->
    </div><!-- /container -->
    {include file='footer-bootstrap.tpl'}
    <script lang='script/javascript'>
    {block name='run-script'}{/block}
    </script>
  </body>
</html>
