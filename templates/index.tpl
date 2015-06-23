{extends file='page.tpl'}
{block name='utama'}
  {foreach $articles as $article}
    {$article_id = $article->get_id()}
    {$title = $article->get_title()}
    <div class="blog-post">
      <h2 class="blog-post-title"><a href="article.php?id={$article_id}">{$title}</a></h2>
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
