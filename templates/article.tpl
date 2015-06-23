{extends file='page.tpl'}
{block name='utama'}
  <div class="blog-post">
    <h2 class="blog-post-title">{$title}</h2>
    <p class="blog-post-meta">{$date_created} by <a href="#">{$username}</a></p>
    {$content}
    <hr>
    <div class="list-group">
    <div class="list-group-item-heading">Comments</div>
    {foreach $comments as $comment}
      <div class="list-group-item">
        <div>{$comment->get_comment()}
        <div class="blog-comment">{$comment->get_date_created()}</div></div>
      </div>
    {/foreach}
    </div>
    <a href="comment.php?article_id={$id}" class="btn btn-info">Make a Comment</a>
  </div><!-- /blog-post -->
{/block}
