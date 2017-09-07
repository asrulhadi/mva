{extends file='page.tpl'}
{block name='utama'}
  {foreach $articles as $article}
    {$article_id = $article->get_id()}
    {$title = $article->get_title()}
    <div class="blog-post">
      <h2 class="blog-post-title bg-success">
        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
        <a href="article.php?id={$article_id}">{$title}</a>
      </h2>
      <p class="blog-post-meta">{$article->get_date_created()} by <a href="#">{$article->get_username()}</a></p>
      {$article->get_content()}
      <hr>
    </div><!-- /blog-post -->
  {/foreach}
  <!-- nav>
    <ul class="pager">
      <li><a href="#">Previous</a></li>
      <li><a href="#">Next</a></li>
    </ul>
  </nav -->
{/block}
{block name='run-script'}
$(".blog-nav-item").removeClass("active");
$("#Home").addClass("active");
{/block}
