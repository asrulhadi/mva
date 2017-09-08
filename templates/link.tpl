{extends file='page.tpl'}
{block name='utama'}
{if isset($error)}
    <p class="bg-warning">{$error}</p>  
{else}
  {if ($mode == 'file') }
  <pre>
{$content|escape:"htmlall"}
  </pre>
  {/if}
  {if ($mode == 'dir')}
    {if isset($dirs)}
    <table class="table table-hover">
      <thead>
        <tr><th width="20%"></th><th>Name</th></tr>
      </thead>
      <tbody>
        {foreach $dirs as $dir}
        <tr>
          <td><img src="{$dir['src']|escape:'urlpathinfo'}" /></td>
          <td>{TODO: name of directory}</td>
        </tr>
        {/foreach}
      </tbody>
    </table>
    {/if}
    {if isset($imgs)}
    <div id="carousel-generic" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
      {foreach $imgs as $i => $img}
        {if ($i == 0)}
        <li data-target="#carousel-generic" data-slide-to="0" class="active"></li>
        {else}
        <li data-target="#carousel-generic" data-slide-to="{$i}"></li>
        {/if}
      {/foreach}
      </ol>

      <!-- Wrapper for slides -->
      <div class="carousel-inner" role="listbox">
      {foreach $imgs as $i => $img}
        {if ($i == 0)}
        <div class="item active">
	{else}
        <div class="item">
	{/if}
          <img src="{TODO: src of img}" alt="{$img['name']}" class="img-responsive center-block img-thumbnail" />
          <div class="carousel-caption">
            {$img['name']|escape}
          </div>
        </div>
      {/foreach}
      </div>

      <!-- Controls -->
      <a class="left carousel-control" href="#carousel-generic" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#carousel-generic" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
    {/if}
  {/if} <!-- end of dir mode -->
{/if} <!-- end of content -->
{/block}
{block name='run-script'}
$(".blog-nav-item").removeClass("active");
{if ($mode == "file")} $("#Owasp").addClass("active"); {/if}
{if ($mode == "dir")} $("#Gallery").addClass("active"); {/if}
{/block}
