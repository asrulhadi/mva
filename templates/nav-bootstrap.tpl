<div class="blog-masthead">
  <div class="container">
    <nav class="blog-nav">
      <a class="blog-nav-item active" href="/">Home</a>
      <a class="blog-nav-item" href="#">New features</a>
      <a class="blog-nav-item" href="#">Press</a>
      <a class="blog-nav-item" href="#">New hires</a>
      <a class="blog-nav-item" href="#">About</a>
      {block name='login'}
      {if isset($smarty.session.username)}
        <a class="blog-nav-item blog-nav-item-right" href="logout.php">Logout</a>
      {else}
        <a class="blog-nav-item blog-nav-item-right" href="login.php">Login</a>
      {/if}
      {/block}
    </nav>
  </div>
</div>
