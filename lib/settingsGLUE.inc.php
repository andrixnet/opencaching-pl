<?php
    require __DIR__.'/settings.inc.php';

/* ************************************************************************
 * Settings glue file 
 * Take existing settings and map them to new configuration 
 * variables with defaults defined in settingsDefault.inc.php
 */

// FIXME
// Proper setup of $rootpath or redesign it's usage 
 
// *** Database ***********************************************************

if (isset($dbserver)) 
    $config['server']['db']['host'] = $dbserver;
//$config['server']['db']['port'] = '3306';
if (isset($dbname))
    $config['server']['db']['schema'] = $dbname;
if (isset($dbusername))
    $config['server']['db']['username'] = $dbusername;
if (isset($dbpasswd))
    $config['server']['db']['password'] = $dbpasswd;
if (isset($dbpconnect))
    $config['server']['db']['persistent'] = $dbpconnect;
if (isset($dberrormail))
    $config['server']['db']['error_report'] = $dberrormail;

// *** Paths **************************************************************

// Path to OC dynamic, outside the root path. REQUIRED
if (isset($dynbasepath))
        $config['server']['path']['ocdynamic'] = $dynbasepath;

// Safemode zip binary
if (isset($safemode_zip))
    $config['server']['zip']['bin'] = $safemode_zip;
if (isset($zip_basedir))
    $config['server']['zip']['basedir'] = $zip_basedir;
if (isset($zip_wwwdir))
    $config['server']['zip']['wwwdir'] = $zip_wwwdir;

// Image file uploads directory
if (isset($picdir))
    $config['server']['path']['images'] = $picdir;
// Audio file uploads directory
if (isset($mp3dir))
    $config['server']['path']['audio'] = $mp3dir;

// *** Debugging **********************************************************

// Maintenance mode
if (isset($site_in_service))
    $config['debug']['maintenance'] = ! $site_in_service;
//
if (isset($debug))
    $config['debug']['general'] = $debug;
if (isset($debug_page))
    $config['debug']['page'] = $debug_page;
// Debug level
$config['debug']['output_level'] = '';
// Under development warning message
if (isset($develwarning))
    $config['debug']['devel_warning'] = $develwarning;

/*
 * If set to true, all database queries will be reported in the page
 * output. (Note, that this will cause most of the AJAX actions to stop
 * functioning properly.)
 */
$config['debug']['db'] = false;
// enable detailed cache access logging
$config['debug']['cache_access_logs'] = false;

// FIXME 
// Do these variables get set somewhere, like taken from URL parameters?
// Then they should be moved elsewhere, after inclusion of config (?)
/* 
//Debug?
if (!isset($debug_page))
    $debug_page = false;
if (!isset($debug))
    $debug = false;
$develwarning = '';

//site in service? Set to false when doing bigger work on the database to prevent error's
// reverse this setting with value above
if (!isset($site_in_service))
    $site_in_service = true;
*/

// *** FIXME??? ***********************************************************
/*
$dbpconnect = false;

$tmpdbname = 'test';

// warnlevel for sql-execution
$sql_errormail = 'rt@localhost';
$sql_warntime = 1;

// replacements for sql()
$sql_replacements['db'] = $dbname;
$sql_replacements['tmpdb'] = 'test';

*/



/* ************************************************************************
 * Node configuration.
 */
 
if (isset($oc_nodeid))
    $config['node']['id'] = $oc_nodeid;
// Webside URL. With trailing "/". REQUIRED.
if (isset($absolute_server_URI))
    $config['node']['url'] = $absolute_server_URI;

// Website name. REQUIRED.
// Used to identify the creator of some content.
if (isset($site_name))
    $config['node']['name'] = $site_name;
if (isset($short_sitename))
    $config['node']['shortname'] = $short_sitename;
// Website pages title. REQUIRED
if (isset($pagetitle))
    $config['node']['title'] = $pagetitle;
if (isset($GLOBALS['oc_waypoint']))
    $config['node']['waypoint_prefix'] = $GLOBALS['oc_waypoint'];

// Uploads
// Must be aliased in webserver config
if (isset($picurl))
    $config['node']['upload']['images'] = $picurl;
if (isset($mp3url))
    $config['node']['upload']['audio'] = $mp3url;

// *** Contact information ************************************************

// contact_mail
if (isset($contact_mail))
    $config['node']['contact']['general'] = $contact_mail;
// RR
if (isset($mail_rr))
    $config['node']['contact']['org'] = $mail_rr;
// Admin / COG
if (isset($mail_cog))
    $config['node']['contact']['admin'] = $mail_cog;
// mail_rt
if (isset($mail_rt))
    $config['node']['contact']['technical'] = $mail_rt;
// mail_oc (OC Team)
if (isset($mail_oc))
    $config['node']['contact']['oc_team'] = $mail_oc;
//FIXME: resolve duplicate $octeam_email 

// Name of envelope sender for email notifications
if (isset($mailfrom))
    $config['node']['mail']['from'] = $mailfrom;
// No-reply email sender for server generated emails. 
// Must configure in email subsystem as sink to /dev/null
if (isset($mailfrom_noreply))
    $config['node']['mail']['noreply'] = $mailfrom_noreply;
// Signature for server generated emails
if (isset($octeamEmailsSignature))
    $config['node']['mail']['signiture'] = $octeamEmailsSignature;
// Watchlist email sender for server generated emails. 
if (isset($watchlistMailfrom))
    $config['node']['mail']['watchlist'] = $watchlistMailfrom;

$emailaddr

// *** Cookies ************************************************************
// Cookie settings (hostname dependent). Change only if necessary.
if (isset($opt['cookie']['name']))
    $config['node']['cookie']['name'] = $opt['cookie']['name'];
if (isset($opt['cookie']['path']))
    $config['node']['cookie']['path'] = $opt['cookie']['path'];
if (isset($opt['cookie']['domain']))
    $config['node']['cookie']['domain'] = $opt['cookie']['domain'];
// Duplicate usage of $cookiename, $cookiepath, $cookiedomain should be resovled

// *** Styling and personalization ****************************************
// Style
if (isset($style))
    $config['node']['styles']['stylename'] = $style;
// Template
if (isset($dynstylepath))
    $config['node']['styles']['template'] = $dynstylepath;

/* ************************************************************************
 * Language and regional settings
 * Change to your country specifics.
 */
 
// Default language for the website. (2 letter language code)
if (isset($lang)
    $config['node']['lang']['language'] = $lang; 
// Default country. (2 letter country codee)
if (isset($countryParamNewcacherestPhp))
    $config['node']['lang']['country'] = $countryParamNewcacherestPhp; 
// Date format (PHP definition)
// FIXME ??? shouldn't this be taken from locale?
if (isset($dateFormat))
    $config['node']['lang']['date_format'] = $dateFormat;
// Time format (PHP definition)
// FIXME ??? shouldn't this be taken from locale?
if (isset($datetimeFormat))
        $config['node']['lang']['time_format'] = $datetimeFormat;
// Date and Time format (PHP definition)
// FIXME ??? shouldn't this be taken from locale?

// Default country list (for country selectors)
if (isset($defaultCountryList))
    $config['node']['lang']['countries'] = $defaultCountryList;
// Default language list (for cache description selector)
$config['node']['lang']['content_languages'] = array ('EN', 'PL', 'FR', 'DE', 'NL', 'RO',);

 


 /* ************************************************************************
 * External API.
 * Change with your own API keys.
 */

// *** Google API *********************************************************

// Google map API key. 
// How to get an API key: https://developers.google.com/maps/documentation/javascript/get-api-key
if (isset($googlemap_key))
    $config['node']['api']['google']['key'] = $googlemap_key;

// Google map type
// G_MAP_TYPE or _HYBRID_TYPE
if (isset($googlemap_type))
        $config['node']['api']['google']['map_type'] = $googlemap_type;
// Set this to true to enable automatic translation of cache descriptions
// Google translation service became a paid service.
if (isset($disable_google_translation))
$config['node']['api']['google']['translation'] = ! $disable_google_translation;

// *** Garmin API *********************************************************

// Garmin API key.
// How to get an API key: http://www.garmindeveloper.com/web-device/garmin-communicator-plugin/get-your-site-key/
// Garmin keys are tied to your website URL
// Make sure you generate your API key using your website URL with trailing "/"
$config['node']['api']['garmin']['key'] = ''; // <-- insert your API key here
// Enter your node URL as registered with Garmin
$config['node']['api']['garmin']['url'] = 'http://node_url_as_registered';

//FIXME: port garmin key to local structure
/*
// map of garmin keys,
// key: domain name, value: garmin key value
// the map may contain only one entry
$config['garmin-key'] = array(
        'http://opencaching.pl' => '0fe1300131fcc0e417bb04de798c5acf',
        'http://www.opencaching.nl' => 'b01f02cba1c000fe034471d2b08044c6'
);
*/

// *** GeoKrety API *******************************************************

// email of GeoKrety developer (used in GeoKretyApi.php for error notifications)
if (isset($geoKretyDeveloperEmailAddress))
    $config['node']['api']['geokrety']['devel_email'] = $geoKretyDeveloperEmailAddress;



/* ************************************************************************
 * Opencaching game
 * Change only if your node's rules differ from the defaults.
 */

// *** Opencaching game rules *********************************************

// Hide coordinates from not logged-in users. Set to "true" to hide.
if (isset($hide_coords))
    $config['oc']['rules']['hide_coords'] = $hide_coords;
// Users are required to find XX caches before being allowed to publish one
// Disable by setting to -1
if (isset($NEED_FIND_LIMIT))
    $config['oc']['rules']['required_finds'] = $NEED_FIND_LIMIT;
if (isset($NEED_APPROVE_LIMIT))
    $config['oc']['rules']['required_approval'] = $NEED_APPROVE_LIMIT;

// Each user should have at most XX Own/personal caches
if (isset($GLOBALS['owncache_limit']))
    $config['oc']['rules']['own_caches'] = $GLOBALS['owncache_limit'];
// Cache scoring (recommendation)
if (isset($MIN_SCORE))
    $config['oc']['rules']['min_score'] = $MIN_SCORE;
if (isset($MAX_SCORE))
    $config['oc']['rules']['max_score'] = $MAX_SCORE;
// Minimum distance between caches (physical containers) in meters

$config['oc']['rules']['cache_type_limits'] = array(
        cache::TYPE_OWNCACHE => $config['oc']['rules']['own_caches'],
    );
    
   
// *** Rewards ************************************************************

// Titled caches
if (isset($titled_cache_nr_found))
    $config['oc']['titled_cache']['nr_found'] = $titled_cache_nr_found;
if (isset($titled_cache_period_prefix))
    $config['oc']['titled_cache']['prefix'] = $titled_cache_period_prefix;



/* ************************************************************************
 * Modules
 * Activate and configure modules.
 */

// *** Online users *******************************************************
if (isset($onlineusers))
    $config['module']['online_users']['enabled'] = ($onlineusers=1?true:false);

// *** Blog ***************************************************************
if (isset($BlogSwitchOn))
    $config['module']['blog']['enabled'] = $BlogSwitchOn;
if (isset($blogsite_url))
    $config['module']['blog']['url'] = $blogsite_url;
//$config['module']['blog']['feed'] = 'http://blog.opencaching.pl/feed/'

// *** Forum **************************************************************
//$config['module']['forum']['enabled'] = true;
if (isset($forum_url))
    $config['module']['forum']['url'] = $forum_url;

// *** Medals *************************************************************
$config['module']['medals']['enabled'] = true;

// *** GeoPaths ***********************************************************
if (isset($powerTrailModuleSwitchOn))
    $config['module']['GeoPath']['enabled'] = $powerTrailModuleSwitchOn;
// User must have at least X finds to create a GeoPath
if (isset($powerTrailUserMinimumCacheFoundToSetNewPowerTrail))
    $config['module']['GeoPath']['create_min_finds'] = $powerTrailUserMinimumCacheFoundToSetNewPowerTrail;
if (isset($powerTrailMinimumCacheCount['current']))
    $config['module']['GeoPath']['min_caches']['current'] = $powerTrailMinimumCacheCount['current'];
if (isset($powerTrailMinimumCacheCount['old']))
    $config['module']['GeoPath']['min_caches']['old'] = $powerTrailMinimumCacheCount['old'];

// To change the limit in the future, uncomment this:
/*
$config['module']['GeoPath']['min_caches']['old'][2] = array(
    'dateFrom' => '2013-10-30 00:00:00',
    'dateTo' => '20??-??-?? 23:59:59',
    'limit' => 25,
);
*/
// User documentation
// FIXME: should be moved to Wiki
if (isset($powerTrailFaqLink))
    $config['module']['GeoPath']['docs'] = $powerTrailFaqLink;



/* ************************************************************************
 * Limits
 * Change only if your node's limits differ from the defaults.
 */

// *** Thumbnails *********************************************************

// Large thumbnails, default 175x175
if (isset($thumb_max_width))
    $config['limits']['thumb']['large'] = $thumb_max_width;
// Small thumbnails, default 64x64
if (isset($thumb2_max_width))
    $config['limits']['thumb']['small'] = $thumb2_max_width;

// *** Image uploads ******************************************************

// Image file size limit in MB
if (isset($maxpicsize))
    $config['limits']['image']['filesize'] = $maxpicsize / 1024 / 1024;
// Resize large images ? (1=yes; 0=no)
// Allowed extensions (image formats)
if (isset($picextensions))
    $config['limits']['image']['extension'] = $picextensions;

// *** Audio uploads ******************************************************

// Audio file size limit in MB
if (isset($maxmp3size))
    $config['limits']['audio']['filesize'] = $maxmp3size / 1024 / 1024;
// Allowed extensions (audio formats)
if (isset($mp3extensions))
    $config['limits']['audio']['extension'] = $mp3extensions;
$config['limits']['audio']['extension_text'] = 'MP3, OGG'; 


/* ************************************************************************
 * Maps
 * Change according to your geographical coverage.
 */

// mapper module for cache maps
if (isset($cachemap_mapper))
    $config['maps']['mapper'] = $cachemap_mapper;  


// default coordinates for cachemap, set to your country's center of gravity
if (isset($country_coordinates))
    $config['maps']['country']['coords'] = $country_coordinates;
if (isset($default_country_zoom))
    $config['maps']['country']['zoom'] = $default_country_zoom;


// Main page map
if (isset($main_page_map_center_lat))
        $config['maps']['main_page']['lat'] = $main_page_map_center_lat;
if (isset($main_page_map_center_lon))
        $config['maps']['main_page']['lon'] = $main_page_map_center_lon;
if (isset($main_page_map_zoom))
        $config['maps']['main_page']['zoom'] = $main_page_map_zoom;
if (isset($main_page_map_width))
        $config['maps']['main_page']['width'] = $main_page_map_width;
if (isset($main_page_map_height))
        $config['maps']['main_page']['height'] = $main_page_map_height;

    
/* ************************************************************************
 * Configuration for map v3 maps
 */
if (isset($mapsConfig))
    $config['maps']['mapsConfig'] = $mapsConfig;




// ????????????????????????????????????????????????????????????????????????
// FIXME
// This should be moved to UI according to 
// https://github.com/opencaching/opencaching-pl/issues/299

// $contactDataXX 




// ????????????????????????????????????????????????????????????????????????
// FIXME
// this should be moved to attributes definition

$config = array(
    /**
        *customization of cache-attribute icons
    */
    'search-attr-icons' => array(
        'password' => array (
            // has attribute
            'images/attributes/password.png',
            // does not have attribute
            'images/attributes/password-no.png',
            // does not care
            'images/attributes/password-undef.png'
        )
    )
);


// ????????????????????????????????????????????????????????????????????????
// FIXME
// This should be removed according to
// https://github.com/opencaching/opencaching-pl/issues/167
// $use_news_approving = true;
// $news_approver_email = 'rr@localhost';



// ????????????????????????????????????????????????????????????????????????
// FIXME
// Should be redesigned to become unnecessary. (dynamically build from other strings)
//$SiteOutsideCountryString


// ????????????????????????????????????????????????????????????????????????
// FIXME
//$wikiLinks array should be clarified, apparently is redefined(?)









 
 
    
    
    
    
    
    
    
?>
