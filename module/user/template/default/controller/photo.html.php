<?php 
/**
 * [PHPFOX_HEADER]
 * 
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author  		Raymond Benc
 * @package  		Module_User
 * @version 		$Id: photo.html.php 6772 2013-10-11 10:44:06Z Fern $
 */
 
defined('PHPFOX') or exit('NO DICE!'); 

?>
{if $bIsRegistration}
<div class="t_right p_top_10" style="font-size:10pt; font-weight:bold;">
	<a href="{$sNextUrl}">{phrase var='user.skip_this_step'}</a>
</div>	
{/if}
<div class="main_break">
	{plugin call='user.template_controller_photo_1'}
		{plugin call='user.template_controller_photo_2'}
		{if $bIsProcess}
		<div id="js_crop_tool" class="block dont-unbind-children">
			{if ($bIsProcess) || (!$bIsProcess && $iImageWidth > $iMinWidth && $iImageHeight > $iMinWidth)}
				<div class="title">{phrase var='user.profile_picture_cropping_tool'}</div>
				<div class="content">
				{if ($bIsProcess && ($iImageWidth <= $iMinWidth || $iImageHeight <= $iMinWidth))}
					<div class="extra_info">
            <span id="no_crop_user_avatar" data-id="1">
						{phrase var='user.the_image_you_uploaded_is_rather_small_so_we_are_unable_to_crop_it_however_you_can_still_save_this_image_if_you_want_to_use_it'}
            </span>
					</div>	
					<form method="post" action="{url link='current'}">
						{plugin call='user.template_controller_photo_3'}
                        <div><input type="hidden" name="val[crop-data]" value="" id="crop_it_form_image_data" /></div>
						<input type="submit" value="{phrase var='user.save_avatar'}" id="js_save_profile_photo" class="button btn-primary" /> <span id="js_photo_preview_ajax"></span>
					</form>
				{else}
					<div class="extra_info">
						{plugin call='user.template_controller_photo_4'}
						{phrase var='user.click_and_drag_a_box_on_the_original_image_to_create_your_cropped_image'}
					</div>
					<div class="p_4">
						<div id="js_main_photo" style="float:left; margin-right:10px;">
                            <div class="image-editor">
                                <div class="cropit-preview"></div>
                                <br/>
                                <input type="range" class="cropit-image-zoom-input">
                                <button class="rotate-ccw">
                                    <i class="fa fa-undo"></i>
                                </button>
                                <button class="rotate-cw">
                                    <i class="fa fa-repeat"></i>
                                </button>
                            </div>
						</div>
						<br style="clear:both;"/>
						<form method="post" action="{url link='current'}">
							{plugin call='user.template_controller_photo_5'}
							<div><input type="hidden" name="val[crop-data]" value="" id="crop_it_form_image_data" /></div>
							<div style="margin-top:10px;">
								<input type="submit" value="{phrase var='user.save_avatar'}" id="js_save_profile_photo" class="button btn-primary" /> <span id="js_photo_preview_ajax"></span>
							</div>
						</form>			
					</div>
				{/if}
				</div>
			{/if}
		</div>
		{/if}
		{plugin call='user.template_controller_photo_6'}
	
{if !$bIsProcess}
<div class="block">
	{plugin call='user.template_controller_photo_7'}
	{if !empty($sProfileImage)}
	<div class="title">Select an Image</div>
	{/if}
	<div class="block_content" id="js_upload_photo_form">
		{plugin call='user.template_controller_photo_8'}
		<div id="js_photo_form_holder">
			{plugin call='user.template_controller_photo_9'}
			<form method="post" action="{if $bIsRegistration}{url link='user.photo.register'}{else}{url link='user.photo'}{/if}" id="js_form" enctype="multipart/form-data" onsubmit="return startProcess(true, true);">		
				<div class="table form-group">
					{plugin call='user.template_controller_photo_10'}

					<div class="table_right">				
						<div id="js_progress_uploader"></div>
						<div class="extra_info">
							{phrase var='user.you_can_upload_a_jpg_gif_or_png_file'}
							{if $iMaxFileSize !== null}
							<br />
							{phrase var='user.the_file_size_limit_is_file_size_if_your_upload_does_not_work_try_uploading_a_smaller_picture' file_size=$iMaxFileSize|filesize}
							{/if}						
						</div>				
					</div>
					<div class="clear"></div>
				</div>		
				<div class="table_clear">
					<input type="submit" value="{phrase var='user.upload_picture'}" class="button btn-primary" name="val[uploaded]" />
				</div>		
			</form>
		</div>
		<div id="js_photo_form_holder_loading" class="t_center" style="display:none;">
			<span style="margin-left:4px; margin-right:4px; font-size:9pt; font-weight:normal;">
				{img theme='ajax/large.gif' alt='' class='v_middle'}
				{phrase var='core.uploading'}
			</span>
		</div>
	</div>
</div>
{/if}	
	
</div>
<script>
    {literal}
    $Behavior.crop_image_photo = function() {
        $('.image-editor').cropit({
            imageState: {
                src: '{/literal}{$sProfileImage}{literal}',
            },
        });

        $('.rotate-cw').click(function() {
            $('.image-editor').cropit('rotateCW');
        });
        $('.rotate-ccw').click(function() {
            $('.image-editor').cropit('rotateCCW');
        });

        $('.export').click(function() {
            var imageData = $('.image-editor').cropit('export');
            window.open(imageData);
        });
    };
    {/literal}
</script>
