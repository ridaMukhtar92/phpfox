<?php
defined('PHPFOX') or exit('NO DICE!');
?>
<div class="photos_view_loader">
	<i class="fa fa-spin fa-circle-o-notch"></i>
</div>
<div class="photos_view" data-photo-id="{$aForms.photo_id}">
	<div class="image_load_holder" data-image-src="{img id='js_photo_view_image' server_id=$aForms.server_id path='photo.url_photo' file=$aForms.destination suffix='_1024' time_stamp=true title=$aForms.title return_url=true}"></div>

	{literal}
	<script>
		var preLoadImages = false;
		$Ready(function() {
			if ($('.image_load_holder').length && !preLoadImages) {
				preLoadImages = true;
				var images = '';
				if (cacheCurrentBody !== null && typeof(cacheCurrentBody.contentObject) == 'string' && !$('.photos_stream').length) {
					$(cacheCurrentBody.contentObject).find('.photos_row').each(function() {
						var t = $(this),
							src = t.find('> a'),
							isActive = '';
						t.addClass('pre_load');

						images += '<a href="' + src.attr('href') + '" data-photo-id="' + t.data('photo-id') + '">' + src.html() + '</a>';
					});
				}
				if (aFeedPhotos.length > 0) {
					$.each(aFeedPhotos, function(index, value){
						images += '<a href="' + value.link + '" data-photo-id="' + value.photo_id + '">' + value.html + '</a>';
					});
				}

				if (images) {
					$('#content').prepend('<div class="photos_stream"><div class="photos">' + images + '</div></div>');
					var photos = $('.photos_stream .photos', '#content').first();
					if (photos && photos.width() > $(window).width()) {
						photos.parent().prepend('<a id="prev_photos" class="button btn-primary" href="javascript:void(0)" onclick="$Core.Photo.slidePhotoStream(this)"><i class="fa fa-angle-left"></i></a><a id="next_photos" class="button btn-primary" href="javascript:void(0)" onclick="$Core.Photo.slidePhotoStream(this)"><i class="fa fa-angle-right"></i></a>');
					}
				}


				
				var img = new Image(), src = $('.image_load_holder').data('image-src');
				img.onload = function() {
					$('.image_load_holder').html('<img src="' + src + '" id="js_photo_view_image">');
					$('body').addClass('photo_is_active');
					$Core.loadInit();
				};
				img.src = src;
			}

			if (!$('.image_load_holder').length) {
				$('.photos_stream').remove();
			}

			if ($('.photos_stream').length && $('.image_load_holder').length) {
				$('.photos_stream a.active').removeClass('active');
				if ($('.photos_view').data('photo-id')) {
					$('.photos_stream a[data-photo-id="' + $('.photos_view').data('photo-id') + '"]').addClass('active');
				}
			}
		});
	</script>
	{/literal}
	{if PHPFOX_IS_AJAX_PAGE}
	<span class="_a_back"><i class="fa fa-close"></i></span>
	{/if}
	<div class="photos_actions">
		<span class="photo_tag_in_photo">
		{phrase var='photo.in_this_photo'}: <span id="js_photo_in_this_photo"></span>
		</span>
		<ul>
			{if (Phpfox::getUserParam('photo.can_edit_own_photo') && $aForms.user_id == Phpfox::getUserId()) || Phpfox::getUserParam('photo.can_edit_other_photo')}
			<li>
				<a href="#" class="js_hover_title" onclick="$('#photo_view_ajax_loader').show(); $('#menu').remove(); $('#noteform').hide(); $('#js_photo_view_image').imgAreaSelect({left_curly} hide: true {right_curly}); $('#js_photo_view_holder').hide(); $.ajaxCall('photo.rotate', 'photo_id={$aForms.photo_id}&amp;photo_cmd=left&amp;currenturl=' + $('#js_current_page_url').html()); return false;">
					<span class="js_hover_info">{phrase var='photo.rotate_left'}</span>
					<i class="fa fa-rotate-left"></i>
				</a>
			</li>
			<li>
				<a href="#" class="js_hover_title" onclick="$('#photo_view_ajax_loader').show(); $('#menu').remove(); $('#noteform').hide(); $('#js_photo_view_image').imgAreaSelect({left_curly} hide: true {right_curly}); $('#js_photo_view_holder').hide(); $.ajaxCall('photo.rotate', 'photo_id={$aForms.photo_id}&amp;photo_cmd=right&amp;currenturl=' + $('#js_current_page_url').html()); return false;">
					<span class="js_hover_info">{phrase var='photo.rotate_right'}</span>
					<i class="fa fa-rotate-right"></i>
				</a>
			</li>
			{/if}
			<li class="photos_tag">
				<a href="#" id="js_tag_photo" class="js_hover_title">
					<span class="js_hover_info">{phrase var='photo.tag_this_photo'}</span>
					<i class="fa fa-tag"></i>
				</a
            </li>
            {if $aForms.user_id == Phpfox::getUserId() || (Phpfox::getUserParam('photo.can_download_user_photos') && $aForms.allow_download)}
            <li class="photos_download">
				<a href="{permalink module='photo' id=$aForms.photo_id title=$aForms.title action=download}" id="js_download_photo" class="js_hover_title no_ajax">
					<span class="js_hover_info">{phrase var='photo.download_this_image'}</span>
					<i class="fa fa-download"></i>
				</a>
			</li>
            {/if}
		</ul>
	</div>
</div>