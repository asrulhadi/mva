{extends file='page.tpl'}
{block name='utama'}
{if isset($error)}
    <p class="bg-warning">{$error}</p>  
{else}
  {if ($mode == 'file') }
    <pre>
{$content|escape:"htmlall"}
    </pre>
  {/if}
  {if ($mode == 'dir')}
    <table class="table table-hover">
      <thead>
        <tr><th width="20%">Thumbnail</th><th>Name</th></tr>
      </thead>
      <tbody>
        {foreach $dirs as $dir}
          <tr>
	    <!-- td><img src="avatar/folder.jpg" class="img-responsive" /></td-->
	    <td><img src="{$dir['src']|escape:'urlpathinfo'}" class="img-responsive img-thumbnail"/></td>
	    <td>{$dir['name']|escape}</td>
	  </tr>
	{/foreach}
      </tbody>
    </table>
  {/if}
{/if}
{/block}
