<?php 
/**
 * [PHPFOX_HEADER]
 * 
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author  		Raymond Benc
 * @package  		Module_Forum
 * @version 		$Id: forum.html.php 5844 2013-05-09 08:00:59Z Raymond_Benc $
 */
 
defined('PHPFOX') or exit('NO DICE!'); 

?>
{item name='Thing'}
		<div class="block row1">
			<div class="clearfix">
				<div class="pull-left">
					<header>
						<h1 itemprop="name"><a href="{permalink module='forum' id=$aForum.forum_id title=$aForum.name}"{if !empty($aForum.description)} title="{softPhrase var=$aForum.description}" {/if} class="forum_title_link" itemprop="url">
                            {softPhrase var=$aForum.name}
                            </a></h1>
						{if !empty($aForum.description)}
						<p>
                            {softPhrase var=$aForum.description}
                        </p>
						{/if}
					</header>
				</div>
				<div class="pull-right">
					<ul class="_forum_info">
						<li><strong>{$aForum.total_thread|number_format}</strong><span>{phrase var='forum.threads'}</span></li>
						<li><strong>{$aForum.total_post|number_format}</strong><span>{phrase var='forum.posts'}</span></li>
					</ul>
				</div>
			</div>
		</div>
{/item}