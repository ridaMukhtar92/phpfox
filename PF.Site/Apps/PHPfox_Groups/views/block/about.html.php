<?php
defined('PHPFOX') or exit('NO DICE!');
?>
<div class="block">
    <div class="title">
        {_p('Group Info')}
    </div>
    <div class="content">
        {$about}

        <div class="info {if $about}group_info{/if}">
            <div class="info_left">
                {_p('Founder')}
            </div>
            <div class="info_right clearfix">
                <div class="user_rows">
                    <div class="user_rows_image">
                        {img user=$aUser suffix='_120_square'}
                    </div>
                    {$aUser|user}
                </div>
            </div>
        </div>
    </div>
</div>