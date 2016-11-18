<upgrade>
	<settings>
		<setting group="" module_id="captcha" is_hidden="0" type="drop" var_name="captcha_type" phrase_var_name="setting_captcha_type" ordering="1" version_id="4.3.0"><![CDATA[a:2:{s:7:"default";s:7:"default";s:6:"values";a:3:{i:0;s:7:"default";i:1;s:9:"recaptcha";i:2;s:6:"qrcode";}}]]></setting>
	</settings>
	<phpfox_update_settings>
		<setting group="" module_id="captcha" is_hidden="0" type="boolean" var_name="captcha_use_font" phrase_var_name="setting_captcha_use_font" ordering="4" version_id="2.0.0alpha1">0</setting>
		<setting group="" module_id="captcha" is_hidden="0" type="string" var_name="recaptcha_public_key" phrase_var_name="setting_recaptcha_public_key" ordering="2" version_id="2.0.0rc12" />
		<setting group="" module_id="captcha" is_hidden="0" type="string" var_name="recaptcha_private_key" phrase_var_name="setting_recaptcha_private_key" ordering="3" version_id="2.0.0rc12" />
	</phpfox_update_settings>
	<phrases>
		<phrase module_id="captcha" version_id="4.3.0" var_name="setting_captcha_type" added="1456112519"><![CDATA[<title>Captcha Type</title><info>Select captcha type
If you choose Recaptcha, visit google.com/recaptcha and get free key</info>]]></phrase>
		<phrase module_id="captcha" version_id="4.3.0" var_name="default" added="1456112718">Default</phrase>
		<phrase module_id="captcha" version_id="4.3.0" var_name="qrcode" added="1456112728">QR Code</phrase>
		<phrase module_id="captcha" version_id="4.3.0" var_name="recaptcha" added="1456112738">ReCaptcha</phrase>
		<phrase module_id="captcha" version_id="4.3.0" var_name="captcha_qrcode_challenge" added="1456115146">Scan QR Code to get verification code</phrase>
	</phrases>
</upgrade>