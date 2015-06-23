{extends file='page.tpl'}
{block name='utama'}
  Comment for article <h2>{$title}</h2>

  <form name="comment" method="post" action="comment.php">
    <div class="form-group">
      <label>Comment</label>
      <textarea class="form-control" name="comment" rows="5"></textarea>
    </div>
    <input type="hidden" name="article_id" value="{$article_id}">
    <button type="submit" name="submit" value="submit">Submit</button>
  </form>
{/block}
