<?php
defined('PHPFOX') or exit('NO DICE!');
?>
<div class="collection-item-stage">
    <div class="pages_item user_item">
        {img user=$aUser suffix='_120_square'}
        <div class="pages_info">
            <div>
                {$aUser|user}
                <div style="margin-top:10px">
                    {module name='user.friendship' user_id=$aUser.user_id}
                </div>
            </div>
        </div>
    </div>
</div>