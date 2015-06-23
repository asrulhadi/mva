{extends file='page.tpl'}
{block name='utama'}
{if !isset($page)}
  {$page = "."}
  {$title = "Home Page"}
{/if}
{if isset($info)}
  <div class="bg-primary">{$info}</div>
{/if}
{if isset($msg)}
  <div class="alert alert-success">{$msg}</div>
{/if}
<div class="alert alert-info">
  You will be redirected to {$title} in <span id='countdown'>5</span>s
</div>
<script type="text/javascript">
<!--
countdown = 5;
function redirect() {
  if ( countdown === 0 ) {
    window.location = "{$page}";
  } else {
    countdown = countdown - 1;
    document.getElementById('countdown').innerHTML = countdown;
    setTimeout('redirect()',1000);
  }
}
setTimeout('redirect()',1000);
//-->
</script> 
{/block}
