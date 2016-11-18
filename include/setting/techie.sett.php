<?php
defined('PHPFOX') or exit('NO DICE!');

//Here define settings do not allow Admin edit. If these settings set wrong value, site may break. Only developer can edit here, but check careful before edit.

//Module ad

//Ad Cache Limit (Minutes)	=> Define in minutes how long we should cache ads.
$_CONF['ad.ad_cache_limit'] = 60;

// Refresh Ads (AJAX) => Enable this feature to refresh ads via AJAX.
$_CONF['ad.ad_ajax_refresh'] = false;

//Ad Refresh Time (Minutes) => Define how many minutes to way before the ads refresh.
$_CONF['ad.ad_ajax_refresh_time'] = 2;

/**
 * How Many Ads Per Location
 * "This setting tells how many ads will be shown per location.
 * If you set this to a numerical zero (0) it will load every ad available for that location.
 * The default is 1"
*/
$_CONF['ad.how_many_ads_per_location'] = 1;

/**
 * Ads in Multi-Ad Location
 * "How many ads should be shown in the Multi-Ad Location?
 * Default is 5"
 */
$_CONF['ad.multi_ad'] = 5;

//Module adminCP

/**
 * Admin CP Location
 * "Location of the Admin CP. Change this to secure your Admin CP.
 * By default the setting is admincp so the final URL will be: http://www.yoursite.com/admincp/
 * Note the above example is when short URL's is enabled."
 */
$_CONF['admincp.admin_cp'] = "admincp";

/**
 * Cache Time Stamp	=> Cache Time Stamp
 * THIS SETTING WE BE REMOVED IN 4.4. PLEASE REMOVE IN YOUR PLUGIN
 */
$_CONF['admincp.cache_time_stamp'] = "F j, Y, g:i a";

//Module Blog
/**
 * THIS SETTING WE BE REMOVED IN 4.4. PLEASE REMOVE IN YOUR PLUGIN
 * How Long is the Preview =>
blog.length_in_index
How much of the blog to show on the main blog section?
Value is in characters, i.e.:
15 would show something like:
"Lorem ipsum dol..."
0 = No limit
 */
$_CONF['blog.length_in_index'] = "200";

//Module Comment
/**
 * Config how many nested levels for comment?
 */

$_CONF['comment.total_child_comments'] = "1";

//Module Feed
/**
 * Config how many nested levels for comment?
 */

$_CONF['comment.total_child_comments'] = "1";