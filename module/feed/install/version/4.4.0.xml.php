<upgrade>
    <phpfox_update_phrases>
        <phrase>
            <module_id>feed</module_id>
            <version_id>3.0.0beta1</version_id>
            <var_name>setting_refresh_activity_feed</var_name>
            <added>1309267841</added>
            <value><![CDATA[<title>Refresh Activity Feed (Seconds)</title><info>This setting controls if you want to find new updates in the activity feed without having the user to refresh the page. This will use AJAX and the value of this setting has to be a number in seconds. If you want this feature to be disabled set it to the number zero (0). <b>Warning: </b>Recommended value is about 30 ~ 60 seconds. If the value is too small, it can cause problems on site performance.</info>]]></value>
        </phrase>
    </phpfox_update_phrases>
    <phpfox_update_settings>
        <setting>
            <group />
            <module_id>feed</module_id>
            <is_hidden>0</is_hidden>
            <type>integer</type>
            <var_name>refresh_activity_feed</var_name>
            <phrase_var_name>setting_refresh_activity_feed</phrase_var_name>
            <ordering>1</ordering>
            <version_id>3.0.0beta1</version_id>
            <value>60</value>
        </setting>
        <setting>
            <group>time_stamps</group>
            <module_id>feed</module_id>
            <is_hidden>0</is_hidden>
            <type>string</type>
            <var_name>feed_display_time_stamp</var_name>
            <phrase_var_name>setting_feed_display_time_stamp</phrase_var_name>
            <ordering>1</ordering>
            <version_id>2.0.0alpha3</version_id>
            <value>F j, Y g:i a</value>
        </setting>
    </phpfox_update_settings>
    <settings>
        <setting>
            <group />
            <module_id>feed</module_id>
            <is_hidden>0</is_hidden>
            <type>boolean</type>
            <var_name>allow_choose_sort_on_feeds</var_name>
            <phrase_var_name>setting_allow_choose_sort_on_feeds</phrase_var_name>
            <ordering>1</ordering>
            <version_id>4.4.0</version_id>
            <value>1</value>
        </setting>
    </settings>
    <phrases>
        <phrase>
            <module_id>feed</module_id>
            <version_id>4.4.0</version_id>
            <var_name>setting_allow_choose_sort_on_feeds</var_name>
            <added>1460363518</added>
            <value><![CDATA[<title>Allow choose sort type on Main feeds</title><info>Set <b>true</b> to allow users can choose sort type of main feeds in home page.</info>]]></value>
        </phrase>
    </phrases>
</upgrade>