{extends file='page.tpl'}
{block name='utama'}
<div class="well well-sm"><b>Thank you for your interest for becoming user</b></div>
{if isset($error)} <div class="alert alert-danger">{$error}</div> {/if}
<form name="signup" method="post" action="signup.php" class="form-horizontal" enctype="multipart/form-data">
  <div class="form-group">
    <label class="col-sm-2 control-label">Username</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="username">
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-2 control-label">Password</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="password">
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-2 control-label">Avatar</label>
    <div class="col-sm-10">
      <input type="file" name="avatar">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" name="register" value="register">Register</button>
    </div>
  </div>
</form>
{/block}
