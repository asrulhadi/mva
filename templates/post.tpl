{extends file='page.tpl'}
{block name='utama'}
  <h2>Post new article</h2>

  <form name="article" method="post" action="post.php">
    <div class="form-group">
      <label class="col-sm-2 control-label">Title</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="title" placeholder="Title">
      </div>
    </div>
    <div class="form-group">
      <label>Content</label>
      <textarea class="form-control" name="content" rows="5"></textarea>
    </div>
    <input type="hidden" name="user_id" value="{$user_id}">
    <div class="form-group">
      <div class="col-sm-10">
        <button type="submit" name="submit" value="submit">Submit</button>
      </div>
    </div>
  </form>
{/block}
