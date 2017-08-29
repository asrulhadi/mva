{if isset($smarty.session.user_id)}
<div class="sidebar-module">
  <h4>Welcome {$smarty.session.username|escape:'htmlall'}</h4>
  <img src="avatar/{$smarty.session.avatar}" height='75' width='75' />
  <ol class="list-unstyled">
    <li><a href="post.php">Post Article</a></li>
  </ol>
</div>
{else}
<div class="sidebar-module sidebar-module-inset">
  <h4>About</h4>
  <p>
    <div>Vulnerable Web Application</div>
    <em>Do not host publicly</em>
    <div class="warning">You have been warned!!!</div>
  </p>
</div>
{/if}
{if ($smarty.session.admin)}
<div class="sidebar-module">
  <h4>Admin Modules</h4>
  <ol class="list-unstyled">
    <li><a href="install.php?install=yes">Reset Database</a></li>
    <li><a href="admin.php">Manage Users</a></li>
    <li><a href="admin.php">Manage Articles</a></li>
  </ol>
</div>
{/if}
<div class="sidebar-module">
  <h4>Elsewhere</h4>
  <ol class="list-unstyled">
    <li><a href="https://github.com/asrulhadi/mva">GitHub</a></li>
    <li><a href="http://php.net/manual/en/security.php">PHP Security</a></li>
    <li><a href="http://htmlpurifier.org/">HTML Purifier</a></li>
  </ol>
</div>
