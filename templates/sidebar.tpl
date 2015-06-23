{if isset($smarty.session.user_id)}
<div class="sidebar-module">
  <h4>Welcome {$smarty.session.username}</h4>
  <ol class="list-unstyled">
    <li><a href="post.php">Post Article</a></li>
  </ol>
</div>
{else}
<div class="sidebar-module sidebar-module-inset">
  <h4>About</h4>
  <p>Vulnerable Web Application. <em>Do not host publicly</em>You have been warned!!!</p>
</div>
{/if}
<div class="sidebar-module">
  <h4>Archives</h4>
  <ol class="list-unstyled">
    <li><a href="#">March 2014</a></li>
    <li><a href="#">February 2014</a></li>
    <li><a href="#">January 2014</a></li>
    <li><a href="#">December 2013</a></li>
  </ol>
</div>
<div class="sidebar-module">
  <h4>Elsewhere</h4>
  <ol class="list-unstyled">
    <li><a href="#">GitHub</a></li>
    <li><a href="#">Twitter</a></li>
    <li><a href="#">Facebook</a></li>
  </ol>
</div>
