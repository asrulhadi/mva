{extends file='page.tpl'}
{block name='utama'}
<div class="well well-sm"><b>This is my awesome login page!</b></div>
{if isset($error)} <div class="alert alert-danger">{$error}</div> {/if}
<form name="login" method="post" action="login.php" class="form-horizontal">
  <div class="form-group">
    <label class="col-sm-2 control-label">Username</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="username">
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-2 control-label">Password</label>
    <div class="col-sm-10">
      <input type="TODO: type?" class="form-control" name="password">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" name="submit" value="submit">Submit</button>
    </div>
  </div>
</form>
{/block}
