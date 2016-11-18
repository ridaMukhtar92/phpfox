<upgrade>
    <settings>
        <setting>
            <group>cdn</group>
            <module_id>core</module_id>
            <is_hidden>0</is_hidden>
            <type>boolean</type>
            <var_name>phpfox_cdn_js_css_enable</var_name>
            <phrase_var_name>setting_phpfox_cdn_js_css_enable</phrase_var_name>
            <ordering>1</ordering>
            <version_id>4.3.0</version_id>
            <value>0</value>
        </setting>
        <setting>
            <group>cdn</group>
            <module_id>core</module_id>
            <is_hidden>0</is_hidden>
            <type>string</type>
            <var_name>phpfox_cdn_js_css_url</var_name>
            <phrase_var_name>setting_phpfox_cdn_js_css_url</phrase_var_name>
            <ordering>2</ordering>
            <version_id>4.3.0</version_id>
            <value></value>
        </setting>
        <setting>
            <group>general</group>
            <module_id>core</module_id>
            <is_hidden>0</is_hidden>
            <type>integer</type>
            <var_name>number_of_items_on_main_menu</var_name>
            <phrase_var_name>setting_number_of_items_on_main_menu</phrase_var_name>
            <ordering>3</ordering>
            <version_id>4.3.0</version_id>
            <value>13</value>
        </setting>
        <setting>
            <group>registration</group>
            <module_id>core</module_id>
            <is_hidden>0</is_hidden>
            <type>boolean</type>
            <var_name>registration_sms_enable</var_name>
            <phrase_var_name>setting_registration_sms_enable</phrase_var_name>
            <ordering>18</ordering>
            <version_id>4.3.0</version_id>
            <value>0</value>
        </setting>
        <setting>
            <group>registration</group>
            <module_id>core</module_id>
            <is_hidden>0</is_hidden>
            <type>drop</type>
            <var_name>registration_sms_service</var_name>
            <phrase_var_name>setting_registration_sms_service</phrase_var_name>
            <ordering>19</ordering>
            <version_id>4.3.0</version_id>
            <value><![CDATA[a:2:{s:7:"default";s:5:"nexmo";s:6:"values";a:3:{i:0;s:5:"nexmo";i:1;s:6:"twilio";i:2;s:10:"clickatell";}}]]></value>
        </setting>
        <setting>
            <group>registration</group>
            <module_id>core</module_id>
            <is_hidden>0</is_hidden>
            <type>string</type>
            <var_name>nexmo_api_key</var_name>
            <phrase_var_name>setting_nexmo_api_key</phrase_var_name>
            <ordering>20</ordering>
            <version_id>4.3.0</version_id>
            <value></value>
        </setting>
        <setting>
            <group>registration</group>
            <module_id>core</module_id>
            <is_hidden>0</is_hidden>
            <type>string</type>
            <var_name>nexmo_api_secret</var_name>
            <phrase_var_name>setting_nexmo_api_secret</phrase_var_name>
            <ordering>21</ordering>
            <version_id>4.3.0</version_id>
            <value></value>
        </setting>
        <setting group="registration" module_id="core" is_hidden="0" type="string" var_name="twilio_account_id" phrase_var_name="setting_twilio_account_id" ordering="22" version_id="4.3.0" />
        <setting group="registration" module_id="core" is_hidden="0" type="string" var_name="twilio_auth_token" phrase_var_name="setting_twilio_auth_token" ordering="23" version_id="4.3.0" />
        <setting group="registration" module_id="core" is_hidden="0" type="string" var_name="twilio_phone_number" phrase_var_name="setting_twilio_phone_number" ordering="24" version_id="4.3.0" />
        <setting group="registration" module_id="core" is_hidden="0" type="string" var_name="clickatell_username" phrase_var_name="setting_clickatell_username" ordering="25" version_id="4.3.0" />
        <setting group="registration" module_id="core" is_hidden="0" type="string" var_name="clickatell_password" phrase_var_name="setting_clickatell_password" ordering="26" version_id="4.3.0" />
        <setting group="registration" module_id="core" is_hidden="0" type="string" var_name="clickatell_app_id" phrase_var_name="setting_clickatell_app_id" ordering="27" version_id="4.3.0" />
        <setting group="registration" module_id="core" is_hidden="0" type="string" var_name="nexmo_phone_number" phrase_var_name="setting_nexmo_phone_number" ordering="28" version_id="4.3.0" />
    </settings>
    <phrases>
        <phrase>
            <module_id>core</module_id>
            <version_id>4.3.0</version_id>
            <var_name>setting_group_cdn</var_name>
            <added>1455853244</added>
            <value><![CDATA[<title>CDN</title><info>Manage CDN settings for your site.</info>]]></value>
        </phrase>
        <phrase>
            <module_id>core</module_id>
            <version_id>4.3.0</version_id>
            <var_name>setting_phpfox_cdn_js_css_enable</var_name>
            <added>1455853244</added>
            <value><![CDATA[<title>Enable load CSS/JS using CDN</title><info>Enable feature to support load CSS/JS file using CDN</info>]]></value>
        </phrase>
        <phrase>
            <module_id>core</module_id>
            <version_id>4.3.0</version_id>
            <var_name>setting_phpfox_cdn_js_css_url</var_name>
            <added>1455853244</added>
            <value><![CDATA[<title>CDN Url</title><info>Enter CDN Url</info>]]></value>
        </phrase>
        <phrase>
            <module_id>core</module_id>
            <version_id>4.3.0</version_id>
            <var_name>setting_number_of_items_on_main_menu</var_name>
            <added>1456210611</added>
            <value><![CDATA[<title>Number items of main menu</title><info>Number items of main menu</info>]]></value>
        </phrase>
        <phrase module_id="core" version_id="4.3.0" var_name="nexmo" added="1455781491">Nexmo</phrase>
        <phrase module_id="core" version_id="4.3.0" var_name="twilio" added="1455781523">Twilio</phrase>
        <phrase module_id="core" version_id="4.3.0" var_name="clickatell" added="1455781532">Clickatell</phrase>
        <phrase module_id="core" version_id="4.3.0" var_name="setting_registration_sms_enable" added="1455781979"><![CDATA[<title>Enable Registration using SMS Service</title><info>Enable Registration using SMS Service</info>]]></phrase>
        <phrase module_id="core" version_id="4.3.0" var_name="setting_registration_sms_service" added="1455782041"><![CDATA[<title>SMS Service</title><info>SMS Service</info>]]></phrase>
        <phrase module_id="core" version_id="4.3.0" var_name="setting_nexmo_api_key" added="1455782295"><![CDATA[<title>Nexmo API KEY</title><info>Nexmo API KEY</info>]]></phrase>
        <phrase module_id="core" version_id="4.3.0" var_name="setting_nexmo_api_secret" added="1455782332"><![CDATA[<title>Nexmo API Secret</title><info>Nexmo API Secret</info>]]></phrase>
        <phrase module_id="core" version_id="4.3.0" var_name="setting_twilio_account_id" added="1455782414"><![CDATA[<title>Twilio Account ID</title><info>Twilio Account ID</info>]]></phrase>
        <phrase module_id="core" version_id="4.3.0" var_name="setting_twilio_auth_token" added="1455782445"><![CDATA[<title>Twilio Auth Token</title><info>Twilio Auth Token</info>]]></phrase>
        <phrase module_id="core" version_id="4.3.0" var_name="setting_twilio_phone_number" added="1455782490"><![CDATA[<title>Twilio Phone Number</title><info>Twilio Phone Number</info>]]></phrase>
        <phrase module_id="core" version_id="4.3.0" var_name="setting_clickatell_username" added="1455782532"><![CDATA[<title>Clickatell Username</title><info>Clickatell Username</info>]]></phrase>
        <phrase module_id="core" version_id="4.3.0" var_name="setting_clickatell_password" added="1455782558"><![CDATA[<title>Clickatell Password</title><info>Clickatell Password</info>]]></phrase>
        <phrase module_id="core" version_id="4.3.0" var_name="setting_clickatell_app_id" added="1455782589"><![CDATA[<title>Clickatell App ID</title><info>Clickatell App ID</info>]]></phrase>
        <phrase module_id="core" version_id="4.3.0" var_name="setting_nexmo_phone_number" added="1455782728"><![CDATA[<title>Nexmo Phone Number</title><info>Nexmo Phone Number</info>]]></phrase>
        <phrase module_id="core" version_id="4.3.0" var_name="sms_registration_verification_message" added="1455789952">Your verification code
            {token}</phrase>
        <phrase module_id="core" version_id="4.3.0" var_name="invalid_verification_token" added="1455790534">Invalid Verification Token</phrase>
        <phrase module_id="core" version_id="4.3.0" var_name="invalid_phone_number_or_contact_admin" added="1455791156">Please contact administrator if you have correct phone number {phone}.</phrase>
        <phrase module_id="core" version_id="4.3.0" var_name="text_message_was_sent_to_to_phone" added="1455791485">A text message with a verification code was just sent to your phone</phrase>
        <phrase module_id="core" version_id="4.3.0" var_name="get_token" added="1455791522">Get Token</phrase>
        <phrase module_id="core" version_id="4.3.0" var_name="dont_receive_token_yet_resend_token" added="1455791572"><![CDATA[Haven&#039;t received the token yet, Resend token]]></phrase>
        <phrase module_id="core" version_id="4.3.0" var_name="enter_your_phone" added="1455851384">Enter Your Phone Number</phrase>
        <phrase module_id="core" version_id="4.3.0" var_name="enter_your_email" added="1455851403">Enter Your Email</phrase>
        <phrase module_id="core" version_id="4.3.0" var_name="enter_your_registered_email" added="1455851511">Enter the email was used to register your account</phrase>
        <phrase module_id="core" version_id="4.3.0" var_name="done" added="1455853233">Done</phrase>
        <phrase module_id="core" version_id="4.3.0" var_name="resend_passcode" added="1455853244">Resend Passcode</phrase>
    </phrases>
</upgrade>