<module>
	<data>
		<module_id>share</module_id>
		<product_id>phpfox</product_id>
		<is_core>0</is_core>
		<is_active>1</is_active>
		<is_menu>1</is_menu>
		<menu></menu>
		<phrase_var_name>module_share</phrase_var_name>
		<writable />
	</data>
	<hooks>
		<hook module_id="share" hook_type="component" module="share" call_name="share.component_block_frame_clean" added="1240687633" version_id="2.0.0beta1" />
		<hook module_id="share" hook_type="component" module="share" call_name="share.component_block_link_clean" added="1240687633" version_id="2.0.0beta1" />
		<hook module_id="share" hook_type="service" module="share" call_name="share.service_site__call" added="1240687633" version_id="2.0.0beta1" />
		<hook module_id="share" hook_type="service" module="share" call_name="share.service_process__call" added="1240687633" version_id="2.0.0beta1" />
		<hook module_id="share" hook_type="service" module="share" call_name="share.service_bookmark__call" added="1240687633" version_id="2.0.0beta1" />
		<hook module_id="share" hook_type="service" module="share" call_name="share.service_callback__call" added="1240687633" version_id="2.0.0beta1" />
		<hook module_id="share" hook_type="service" module="share" call_name="share.service_share__call" added="1240687633" version_id="2.0.0beta1" />
		<hook module_id="share" hook_type="component" module="share" call_name="share.component_block_friend_clean" added="1258389334" version_id="2.0.0rc8" />
		<hook module_id="share" hook_type="service" module="share" call_name="share.service_process_sendemails_1" added="1339076699" version_id="3.3.0beta1" />
		<hook module_id="share" hook_type="service" module="share" call_name="share.service_process_sendemails_7" added="1339076699" version_id="3.3.0beta1" />
		<hook module_id="share" hook_type="service" module="share" call_name="share.service_process_sendemails_2" added="1339076699" version_id="3.3.0beta1" />
		<hook module_id="share" hook_type="service" module="share" call_name="share.service_process_sendemails_3" added="1339076699" version_id="3.3.0beta1" />
		<hook module_id="share" hook_type="service" module="share" call_name="share.service_process_sendemails_6" added="1339076699" version_id="3.3.0beta1" />
		<hook module_id="share" hook_type="service" module="share" call_name="share.service_process_sendemails_4" added="1339076699" version_id="3.3.0beta1" />
		<hook module_id="share" hook_type="service" module="share" call_name="share.service_process_sendemails_5" added="1339076699" version_id="3.3.0beta1" />
	</hooks>
	<phrases>
		<phrase module_id="share" version_id="2.0.0alpha1" var_name="module_share" added="1233837703">Share</phrase>
		<phrase module_id="share" version_id="2.0.0rc4" var_name="message_successfully_sent" added="1255334742">Message successfully sent.</phrase>
		<phrase module_id="share" version_id="2.0.0rc4" var_name="hi_check_this_out_url" added="1255334784"><![CDATA[Hi,

Check this out...

<a href="{url}">{url}</a>]]></phrase>
		<phrase module_id="share" version_id="2.0.0rc4" var_name="site_successfully_updated" added="1255334834">Site successfully updated.</phrase>
		<phrase module_id="share" version_id="2.0.0rc4" var_name="site_successfully_added" added="1255334843">Site successfully added.</phrase>
		<phrase module_id="share" version_id="2.0.0rc4" var_name="add_a_social_bookmarking_site" added="1255334855">Add a Social Bookmarking Site</phrase>
		<phrase module_id="share" version_id="2.0.0rc4" var_name="social_bookmarking" added="1255334862">Social Bookmarking</phrase>
		<phrase module_id="share" version_id="2.0.0rc4" var_name="add_a_site" added="1255334869">Add a Site</phrase>
		<phrase module_id="share" version_id="2.0.0rc4" var_name="site_successfully_deleted" added="1255334979">Site successfully deleted.</phrase>
		<phrase module_id="share" version_id="2.0.0rc4" var_name="manage_sites" added="1255334987">Manage Sites</phrase>
		<phrase module_id="share" version_id="2.0.0rc4" var_name="share" added="1255334996">Share</phrase>
		<phrase module_id="share" version_id="2.0.0rc4" var_name="select_what_type_of_a_site_this_is" added="1255335019">Select what type of a site this is.</phrase>
		<phrase module_id="share" version_id="2.0.0rc4" var_name="provide_a_name_for_the_site" added="1255335026">Provide a name for the site.</phrase>
		<phrase module_id="share" version_id="2.0.0rc4" var_name="provide_a_url_for_the_site" added="1255335034">Provide a URL for the site.</phrase>
		<phrase module_id="share" version_id="2.0.0rc4" var_name="this_site_already_exists" added="1255335043">This site already exists.</phrase>
		<phrase module_id="share" version_id="2.0.0rc4" var_name="the_site_cannot_be_found" added="1255335058">The site cannot be found.</phrase>
		<phrase module_id="share" version_id="2.0.0rc4" var_name="none_of_the_emails_entered_were_valid" added="1255335069">None of the emails entered were valid.</phrase>
		<phrase module_id="share" version_id="2.0.0rc4" var_name="provide_a_icon_for_this_site" added="1255335079">Provide a icon for this site.</phrase>
		<phrase module_id="share" version_id="2.0.0rc4" var_name="provide_an_e_mail_address" added="1255335242">Provide an e-mail address.</phrase>
		<phrase module_id="share" version_id="2.0.0rc4" var_name="email_s" added="1255335257">Email(s)</phrase>
		<phrase module_id="share" version_id="2.0.0rc4" var_name="separate_multiple_emails_with_a_comma" added="1255335274">Separate multiple emails with a comma.</phrase>
		<phrase module_id="share" version_id="2.0.0rc4" var_name="max_emails_limit" added="1255335723">Max emails: {limit}</phrase>
		<phrase module_id="share" version_id="2.0.0rc4" var_name="subject" added="1255335734">Subject</phrase>
		<phrase module_id="share" version_id="2.0.0rc4" var_name="message" added="1255335741">Message</phrase>
		<phrase module_id="share" version_id="2.0.0rc4" var_name="send" added="1255335748">Send</phrase>
		<phrase module_id="share" version_id="2.0.0rc4" var_name="you_are_unable_to_send_any_more_emails_we_have_a_limit_of_how_many_emails_can_be_sent_each_hour_br_current_limit_limit" added="1255335767"><![CDATA[You are unable to send any more emails. We have a limit of how many emails can be sent each hour. <br />
Current limit: {limit}]]></phrase>
		<phrase module_id="share" version_id="2.0.0rc4" var_name="social_bookmarks" added="1255335788">Social Bookmarks</phrase>
		<phrase module_id="share" version_id="2.0.0rc4" var_name="friends" added="1255335798">Friends</phrase>
		<phrase module_id="share" version_id="2.0.0rc4" var_name="e_mail" added="1255335807">E-Mail</phrase>
		<phrase module_id="share" version_id="2.0.0rc4" var_name="post" added="1255335814">Post</phrase>
		<phrase module_id="share" version_id="2.0.0rc4" var_name="need_to_select_some_friends_before_we_try_to_send_the_message" added="1255335828">Need to select some friends before we try to send the message.</phrase>
		<phrase module_id="share" version_id="2.0.0rc4" var_name="continue" added="1255335844">Continue</phrase>
		<phrase module_id="share" version_id="2.0.0rc4" var_name="site_info" added="1255335933">Site Info</phrase>
		<phrase module_id="share" version_id="2.0.0rc4" var_name="type" added="1255335939">Type</phrase>
		<phrase module_id="share" version_id="2.0.0rc4" var_name="select" added="1255335946">Select</phrase>
		<phrase module_id="share" version_id="2.0.0rc4" var_name="bookmark" added="1255335951">Bookmark</phrase>
		<phrase module_id="share" version_id="2.0.0rc4" var_name="title" added="1255335962">Title</phrase>
		<phrase module_id="share" version_id="2.0.0rc4" var_name="url" added="1255335969">URL</phrase>
		<phrase module_id="share" version_id="2.0.0rc4" var_name="you_can_pass_a_title_and_url_string_by_adding_the_following_replacements_br_url_url_of_the_item_br_title_title_of_the_item" added="1255336002"><![CDATA[You can pass a title and URL string by adding the following replacements...
<br />
{URL} = URL of the item.
<br />
{TITLE} = Title of the item.]]></phrase>
		<phrase module_id="share" version_id="2.0.0rc4" var_name="icon" added="1255336012">Icon</phrase>
		<phrase module_id="share" version_id="2.0.0rc4" var_name="click_here_to_change_this_icon" added="1255336032">Click here to change this icon.</phrase>
		<phrase module_id="share" version_id="2.0.0rc4" var_name="cancel" added="1255336041">cancel</phrase>
		<phrase module_id="share" version_id="2.0.0rc4" var_name="you_can_upload_a_jpg_gif_or_png_file_br_advised_size_is_16x16_pixels" added="1255336057"><![CDATA[You can upload a JPG, GIF or PNG file. <br />
Advised size is 16x16 pixels.]]></phrase>
		<phrase module_id="share" version_id="2.0.0rc4" var_name="is_active" added="1255336067">Is Active</phrase>
		<phrase module_id="share" version_id="2.0.0rc4" var_name="yes" added="1255336074">Yes</phrase>
		<phrase module_id="share" version_id="2.0.0rc4" var_name="no" added="1255336079">No</phrase>
		<phrase module_id="share" version_id="2.0.0rc4" var_name="submit" added="1255336086">Submit</phrase>
		<phrase module_id="share" version_id="2.0.0rc4" var_name="sites" added="1255336266">Sites</phrase>
		<phrase module_id="share" version_id="2.0.0rc4" var_name="name" added="1255336277">Name</phrase>
		<phrase module_id="share" version_id="2.0.0rc4" var_name="active" added="1255336283">Active</phrase>
		<phrase module_id="share" version_id="2.0.0rc4" var_name="manage" added="1255336290">Manage</phrase>
		<phrase module_id="share" version_id="2.0.0rc4" var_name="edit" added="1255336297">Edit</phrase>
		<phrase module_id="share" version_id="2.0.0rc4" var_name="delete" added="1255336303">Delete</phrase>
		<phrase module_id="share" version_id="2.0.0rc4" var_name="are_you_sure" added="1255336311">Are you sure?</phrase>
		<phrase module_id="share" version_id="2.0.0rc4" var_name="deactivate" added="1255336320">Deactivate</phrase>
		<phrase module_id="share" version_id="2.0.0rc4" var_name="activate" added="1255336326">Activate</phrase>
		<phrase module_id="share" version_id="2.0.0rc4" var_name="please_wait_limit_seconds_before_adding_a_new_shoutout" added="1255336870">Please wait {limit} seconds before adding a new shoutout.</phrase>
		<phrase module_id="share" version_id="2.0.0rc4" var_name="hi_check_this_out_bbcode" added="1256557298"><![CDATA[Hi,

Check this out...

[link={url}]{url}[/link]]]></phrase>
		<phrase module_id="share" version_id="2.0.4" var_name="check_out" added="1266509614">Check out:</phrase>
		<phrase module_id="share" version_id="3.0.0beta5" var_name="social_sharing" added="1319122174">Social Sharing</phrase>
		<phrase module_id="share" version_id="3.0.0rc1" var_name="before_using_this_feature_you_will_have_to_setup_up_a_connection_with_this_3rd_party_service" added="1320229448">Before using this feature you will have to setup up a connection with this 3rd party service.</phrase>
		<phrase module_id="share" version_id="3.0.0rc1" var_name="connect_now" added="1320229456">Connect Now</phrase>
		<phrase module_id="share" version_id="3.3.0beta1" var_name="on_your_wall" added="1336400616">On your wall</phrase>
		<phrase module_id="share" version_id="3.3.0beta1" var_name="on_a_friend_s_wall" added="1336400624"><![CDATA[On a friend&#039;s wall]]></phrase>
	</phrases>
	<user_group_settings>
	</user_group_settings>
</module>