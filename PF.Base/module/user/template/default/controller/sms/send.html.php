<?php
defined('PHPFOX') or exit('NO DICE!');
?>
{if $iStep==1}
<form method="post">
    <div class="table form-group">
        <div class="table_left">
            <label for="verify_phone">
                {phrase var='core.enter_your_phone'}</label>
        </div>
        <div class="table_right">
            <div class="extra_info">e.g +1 999 33 4455</div>
            <input id="verify_phone" class="form-control" type="tel" name="val[phone]" value="" required/>
        </div>
    </div>
    {if $sEmail==''}
    <div class="table form-group">
        <div class="table_left">
            <label for="verify_email">
                {phrase var='core.enter_your_email'}</label>
        </div>
        <div class="table_right">
            <div class="extra_info">{phrase var='core.enter_your_registered_email'}</div>
            <input id="verify_email" class="form-control" type="email" name="val[email]" value="" required/>
        </div>
    </div>
    {/if}
    <div class="table_clear">
        <input type="submit" name="val[publish]" value="{phrase var='core.get_token'}" class="button btn-primary">
    </div>
</form>
{literal}
<script>
    $Behavior.buildPhoneNumber = function(){
        if($("#mobile-phone").length){
            $("#mobile-phone").intlTelInput({
                allowDropdown: true,
                autoPlaceholder: true,
                autoHideDialCode: false,
            });
        }
    }
</script>
{/literal}
{/if}

{if $iStep==2 || $iStep==3}
<form method="post">
    <input type="hidden" name="val[phone]" value="{$sPhone}">
    <div class="table form-group">
        <div class="">
            <label>Enter a verification code</label>
        </div>
        <div class="table_right">
            <div class="extra_info">{phrase var='core.text_message_was_sent_to_to_phone'}</div>
            <input type="text" class="form-control" name="val[verify_sms_token]" value="" />
        </div>
    </div>
    <div class="table_clear">
        <ul class="table_clear_button">
            <li><input type="submit" name="val[publish]" value="{phrase var='core.done'}" class="button btn-primary"></li>
            <li><input type="submit" name="val[resend_passcode]" value="{phrase var='core.resend_passcode'}" class="button"></li>
        </ul>
        <div class="clear"></div>
    </div>
</form>
{/if}