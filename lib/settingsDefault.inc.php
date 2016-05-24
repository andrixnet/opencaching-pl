<?php

/*
 * This file contains default settings. All settings can be overriden in the
 * settings.inc.php file (e.g. $config['debugDB'] = true;).
 */

require_once __dir__ . '/cache.php';

/* ************************************************************************
 * Server configuration.
 * REQUIRED!!!
 * Each node must explicitely redefine the relevant configuration
 * values in this section.
 */

// *** Database ***********************************************************

// database server hostname. Defaults to localhost.
// Unless MySQL/MariaDB is deployed on a different server,
// this does not need to be changed.
$config['server']['db']['host'] = 'localhost';
// database server port. Defaults to 3306 (TCP/mysql)
// Unless MySQL/MariaDB runs on a custom port,
// this does not need to be changed.
$config['server']['db']['port'] = '3306';

// database name (schema).REQUIRED
$config['server']['db']['schema'] = 'ocpl';
// database username. REQUIRED
$config['server']['db']['username'] = 'my_username';
// database password. REQUIRED
$config['server']['db']['password'] = 'my_password';

// User persistent connection?
$config['server']['db']['persistent'] = false;

// Report database errors to this email
// FIXME
//$config['server']['db']['error_report'] = 'rt@localhost';

// *** Paths **************************************************************

// Document root for the PHP application. With trailing "/". REQUIRED.
// (same as DocumentRoot directive in Apache httpd config)
// Should be set explicitely as absolute path on hosting server.
// Example: /path/to/opencaching-pl/
$config['server']['path']['root'] = '/var/www/ocpl-root/';

// The following are outside the application root path and must be defined
// as aliased directories in Apache httpd config.

// Path to OC dynamic, outside the root path. REQUIRED
$config['server']['path']['ocdynamic'] = '/var/www/ocpl-data/';
// Path to OC admin, outside the root path. REQUIRED
// Administrative scripts and data
$config['server']['path']['ocadmin'] = '/var/www/ocpl-admin/';
// Path to OC themes, outside the root path. REQUIRED
$config['server']['path']['octheme'] = '/var/www/ocpl-themes/'; // not implemented yet

// Safemode zip binary
$config['server']['zip']['bin'] = '/var/www/ocpl/bin/phpzip.php';
$config['server']['zip']['basedir'] = $config['server']['path']['ocdynamic'] . 'download/zip/';
$config['server']['zip']['wwwdir'] = '/download/zip/';

// Image file upload directory
$config['server']['path']['images'] = $config['server']['path']['ocdynamic'] . 'images/uploads/';
// Audio file upload directory
$config['server']['path']['audio'] = $config['server']['path']['ocdynamic'] . 'mp3/';
// Attachment file upload directory
$config['server']['path']['attach'] = $config['server']['path']['ocdynamic'] . 'files/';

// *** Debugging **********************************************************

// Site in maintenance mode
$config['debug']['maintenance'] = false;

// Overall debug flag
$config['debug']['general'] = false;
// Debug individual page
$config['debug']['page'] = false;
// Debug level
$config['debug']['output_level'] = '';
// Under development warning message
$config['debug']['devel_warning'] = '';
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


// *** FIXME??? ***********************************************************
/*
$tmpdbname = 'test';

// warnlevel for sql-execution
$sql_errormail = 'rt@localhost';
$sql_warntime = 1;

// replacements for sql()
$sql_replacements['db'] = $dbname;
$sql_replacements['tmpdb'] = 'test';

// enable detailed cache access logging
//$enable_cache_access_logs = true;

*/



/* ************************************************************************
 * Node configuration.
 * REQUIRED!!!
 * Each node must explicitely redefine the relevant configuration
 * values in this section.
 */

// Node ID. REQUIRED.
// Use 4 for local development.
// See /docs/oc_nodes.txt for existing node IDs and how to obtain an ID.
// FIXME with opencaching.eu Wiki
$config['node']['id'] = 4;
// Website host name. REQUIRED
$config['node']['hostname'] = 'localhost';
// Website domain name. REQUIRED
$config['node']['domainname'] = 'localdomain';
// Change if necessary. (ie. using https)
// FIXME: proper handling when switch over to https?
$config['node']['proto'] = 'http://';
// Webside URL. With trailing "/". REQUIRED.
$config['node']['url'] = $config['node']['proto'] . $config['node']['hostname'] . '.' . $config['node']['domainname'] . '/';
// Website name. REQUIRED.
// Used to identify the creator of some content.
$config['node']['name'] = 'Your website name';
// Short name for the website (international use)
$config['node']['shortname'] = 'OC XX';
// Website pages title. REQUIRED
$config['node']['title'] = 'Opencaching website';
// Waypoint prefix. REQUIRED
// Use 2 upper case letters only (from english 26 letter character set).
// Preferrably starting with "O"
$config['node']['waypoint_prefix'] = 'OX';

// Uploads
// Must be aliased in webserver config
$config['node']['upload']['images'] = $config['node']['url'] . 'images/uploads';
$config['node']['upload']['audio'] = $config['node']['url'] . 'mp3';
$config['node']['upload']['files'] = $config['node']['url'] . 'files';

// *** Contact information ************************************************

// contact_mail
$config['node']['contact']['general'] = 'cog (at) opencaching.pl';
// RR
$config['node']['contact']['org'] = 'rr@opencaching.pl';
// Admin / COG
$config['node']['contact']['admin'] = 'cog@opencaching.pl';
// mail_rt
$config['node']['contact']['technical'] = 'rt@opencaching.pl';
// mail_oc (OC Team)
$config['node']['contact']['oc_team'] = 'ocpl@opencaching.pl';

// Name of envelope sender for email notifications
$config['node']['mail']['from'] = 'opencaching.pl';
// No-reply email sender for server generated emails. 
// Must configure in email subsystem as sink to /dev/null
$config['node']['mail']['noreply'] = 'noreply@opencaching.pl';
// Signature for server generated emails
$config['node']['mail']['signiture'] = 'Pozdrawiamy, Zespół www.opencaching.pl';
// Watchlist email sender for server generated emails. 
$config['node']['mail']['watchlist'] = 'watch@opencaching.pl';



// *** Cookies ************************************************************
// Cookie settings (hostname dependent). Change only if necessary.
$config['node']['cookie']['name'] = 'oc';
$config['node']['cookie']['path'] = '/';
$config['node']['cookie']['domain'] = '.' . $config['node']['domainname'];

// *** Styling and personalization ****************************************
// Style
$config['node']['styles']['stylename'] = 'stdstyle';
// Template
$config['node']['styles']['template'] = $config['server']['path']['ocdynamic'] . 'tpl/' . $config['node']['styles']['stylename'] . '/html/'; // not implemented yet

// Header
$config['node']['styles']['header'] = '__standard_header_images_set'; // not implemented yet
// Page header logo filename 
$config['node']['styles']['header_logo'] = 'oc_logo.png'; 
// winter version, displayed during december and january.
$config['node']['styles']['header_logo']['winter'] = 'oc_logo_winter.png';
// april fools version, displayed only on april 1st. 
$config['node']['styles']['header_logo']['1april'] = 'oc_logo_1A.png'; 
// website icon filename
// Format: 16x16 pixels; PNG 8bit indexed or 24bit true color, transparency supported
// A file generic /favicon.ico (windows icon ICO format, 16x16) should also exist as 
// fallback mainly for MSIE
$config['node']['styles']['favicon'] = 'oc_icon.png';

// Icons
$config['node']['styles']['icons'] = '__standard_icons_set'; // not implemented yet
// Flags
$config['node']['styles']['flags'] = '__standard_flags_set'; // not implemented yet
// Caches
$config['node']['styles']['caches'] = '__standard_caches_set'; // not implemented yet
// Attributes
$config['node']['styles']['attributes'] = '__standard_attributes_set'; // not implemented yet



// *** Feature personalization ********************************************

// search box on top of page
$config['node']['quick_search']['byowner'] = false;
$config['node']['quick_search']['byfinder'] = false;
$config['node']['quick_search']['byuser'] = true;  

/* ************************************************************************
 * Language and regional settings
 * Change to your country specifics.
 */
 
// Default language for the website. (2 letter language code)
$config['node']['lang']['language'] = 'pl'; 
// Default country. (2 letter country codee)
$config['node']['lang']['country'] = 'PL'; 
// Default locale setting
$config['node']['lang']['locale'] = 'pl-PL'; 
// Date format (PHP definition)
// FIXME ??? shouldn't this be taken from locale?
$config['node']['lang']['date_format'] = 'Y-m-d';
// Time format (PHP definition)
// FIXME ??? shouldn't this be taken from locale?
$config['node']['lang']['time_format'] = 'H:i';
// Date and Time format (PHP definition)
// FIXME ??? shouldn't this be taken from locale?
$config['node']['lang']['datetime_format'] = 'Y-m-d H:i';

// Default country list (for country selectors)
$config['node']['lang']['countries'] = array('AT', 'BE', 'BY', 'BG', 'HR', 'CZ', 'DK', 'EE', 'FI', 'FR', 'GR', 'ES', 'NL', 'IE', 'LT', 'MD', 'DE', 'NO', 'PL', 'PT', 'SU', 'RO', 'SK', 'SI', 'CH', 'SE', 'TR', 'UA', 'IT', 'HU', 'GB',);
// Default language list (for cache description selector)
$config['node']['lang']['content_languages'] = array ('EN', 'PL', 'FR', 'DE', 'NL', 'RO',);

 

 /* ************************************************************************
 * OKAPI settings
 */

$config['okapi']['data_license_url'] = 'http://wiki.opencaching.pl/index.php/OC_PL_Conditions_of_Use';
$config['okapi']['admin_emails'] = false;
// Replace with this to set actual emails: (for debugging purposes)
// $config['okapi']['admin_emails'] = array('rygielski@mimuw.edu.pl', 'following@online.de');  
 


 /* ************************************************************************
 * External API.
 * Change with your own API keys.
 */

// *** Google API *********************************************************

// Google map API key. 
// How to get an API key: https://developers.google.com/maps/documentation/javascript/get-api-key
$config['node']['api']['google']['key'] = ''; // <-- insert your API key here
// Google map type
// G_MAP_TYPE or _HYBRID_TYPE
$config['node']['api']['google']['map_type'] = 'G_MAP_TYPE';
// Set this to true to enable automatic translation of cache descriptions
// Google translation service became a paid service.
$config['node']['api']['google']['translation'] = false;

// *** Garmin API *********************************************************

// Garmin API key.
// How to get an API key: http://www.garmindeveloper.com/web-device/garmin-communicator-plugin/get-your-site-key/
// Garmin keys are tied to your website URL
// Make sure you generate your API key using your website URL with trailing "/"
$config['node']['api']['garmin']['key'] = ''; // <-- insert your API key here
// Enter your node URL as registered with Garmin
$config['node']['api']['garmin']['url'] = 'http://node_url_as_registered';

// *** GeoKrety API *******************************************************

// email of GeoKrety developer (used in GeoKretyApi.php for error notifications)
$config['node']['api']['geokrety']['devel_email'] = 'stefaniak@gmail.com';



/* ************************************************************************
 * Opencaching game
 * Change only if your node's rules differ from the defaults.
 */

// *** Opencaching game rules *********************************************

// Hide coordinates from not logged-in users. Set to "true" to hide.
$config['oc']['rules']['hide_coords'] = false;
// Users are required to find XX caches before being allowed to publish one
// Disable by setting to -1
$config['oc']['rules']['required_finds'] = 10;
// First XX caches published by user must be approved by OC Team
// Disable by setting to 0
// Force all caches to require approval by setting to 999999999
$config['oc']['rules']['required_approval'] = 3;
// Each user should have at most XX Own/personal caches
$config['oc']['rules']['own_caches'] = 1;
// Cache scoring (recommendation)
// Minimum score
$config['oc']['rules']['min_score'] = 0;
// Maximum score
$config['oc']['rules']['max_score'] = 4;
// Minimum distance between caches (physical containers) in meters
$config['oc']['rules']['proximity'] = 150; 
// Minimum number of finds a user must have to see a cache's waypoint on another site
$config['oc']['rules']['other_sites'] = 100;

// Enable refering waypoints from other sites
$config['oc']['other']['geocaching_com'] = 1;
$config['oc']['other']['terracaching_com'] = 1;
$config['oc']['other']['navicache_com'] = 1;
$config['oc']['other']['gpsgames_com'] = 1;
$config['oc']['other']['qualitycaching_com'] = 0; // BeNeLux only

// Cache types that are not allowed to be publised
// Cachetypes must be in lib/cache.php constant TYPE_*
$config['oc']['rules']['forbidden_cache_types'] = array(
        cache::TYPE_VIRTUAL,
        cache::TYPE_WEBCAM,
        cache::TYPE_GEOPATHFINAL
    );
// How many caches of these types can be published by one user  
// Cachetypes must be in lib/cache.php constant TYPE_*
// Place cachetype and limit here.  
$config['oc']['rules']['cache_type_limits'] = array(
        cache::TYPE_OWNCACHE => $config['oc']['rules']['own_caches'],
    );
// Cache sizes that are not allowed to be published    
// Cachesizes must be in lib/cache.php constant SIZE_*
$config['oc']['rules']['forbidden_cache_sizes'] = array(
        //cache::SIZE_MICRO
    );
// Attributes that are not allowed to be published    
// Attributes must be inb lib/attribute.php constant ATTR_*
$config['oc']['rules']['forbidden_attributes'] = array(
        //attrib::ATTR_HORSES
    );
    
// Warn owner of disabled caches every X months
$config['oc']['rules']['warn_disable'] = 1;
// Archive caches if disabled for more then X months
$config['oc']['rules']['archive_disable'] = 6;
   
// *** Rewards ************************************************************

// Titled caches
$config['oc']['titled_cache']['nr_found'] = 10;
$config['oc']['titled_cache']['prefix'] = 'week';



/* ************************************************************************
 * Modules
 * Activate and configure modules.
 */

// *** OpenChecker ********************************************************
$config['module']['openchecker']['enabled'] = true;
// Limit number of checks
$config['module']['openchecker']['limit'] = 10;
// Time period for checks limit (minutes)
$config['module']['openchecker']['time'] = 60;
// Pagination - how many caches per page
$config['module']['openchecker']['page'] = 25;

// *** QR code generator **************************************************
$config['module']['qr_code']['enabled'] = true;
// Sample URL for QR code generation
$config['module']['qr_code']['sample'] = 'http://opencaching.pl/OP3C90';
// Display basic QR code (without template)?
$config['module']['qr_code']['basic'] = true;
// Directory with template files for QR code labels
$config['module']['qr_code']['templates'] = 'path/to/templates';

// ^^^ the above removes 'qrCodeLogo' and 'qrCodeUrl' settings and assumes
// an improvement of QR module according to
// https://github.com/opencaching/opencaching-pl/issues/41

// *** Shop ***************************************************************
$config['module']['shop']['enabled'] = false;
$config['module']['shop']['url'] = 'http://www.shop_of_your_choice/';

// *** Online users *******************************************************
$config['module']['online_users']['enabled'] = true;

// *** Blog ***************************************************************
$config['module']['blog']['enabled'] = true;
// Blog site URL
$config['module']['blog']['url'] = 'http://blog.opencaching.pl/';
// url of RSS feed with most recent blog entries
$config['module']['blog']['feed'] = 'http://blog.opencaching.pl/feed/'

// *** Forum **************************************************************
$config['module']['forum']['enabled'] = true;
// Forum site URL
$config['module']['forum']['url'] = 'http://forum.opencaching.pl';

// *** Wiki ***************************************************************
$config['module']['wiki']['enabled'] = true;
// Wiki site URL
$config['module']['wiki']['url'] = 'http://wiki.opencaching.pl/';
// Wiki links specifically needed to be referenced
// 
$config['module']['wiki']['links']['main'] = 'index.php/Strona_główna';
$config['module']['wiki']['links']['rules'] = 'index.php/Regulamin_OC_PL';
$config['module']['wiki']['links']['rules_en'] = 'index.php/OC_PL_Conditions_of_Use';
$config['module']['wiki']['links']['cacheParams'] = 'index.php/Parametry_skrzynki';
$config['module']['wiki']['links']['cacheParams_en'] = 'index.php/Cache_parameters';
$config['module']['wiki']['links']['ratingDesc'] = 'index.php/Oceny_skrzynek';
$config['module']['wiki']['links']['ratingDesc_en'] = 'index.php/Cache_rating';
$config['module']['wiki']['links']['forBeginers'] = 'index.php/Dla_początkujących';
$config['module']['wiki']['links']['placingCache'] = 'index.php/Zakładanie_skrzynki';
// duplicate 'makingCaches' should be resolved
$config['module']['wiki']['links']['cacheQuality'] = 'index.php/Jakość_skrzynki';
// duplicate 'makingRoutes' should be resolved
$config['module']['wiki']['links']['myRoutes'] = 'index.php/Moje_trasy';
$config['module']['wiki']['links']['cacheNotes'] = 'index.php/Notatki_skrzynki';
// duplicate 'extraWaypoints' should be resolved
$config['module']['wiki']['links']['additionalWaypoints'] = 'index.php/Dodatkowe_waypointy_w_skrzynce';
$config['module']['wiki']['links']['cachingCode'] = 'index.php/Kodeks_geocachera';
$config['module']['wiki']['links']['usefulFiles'] = 'index.php/U%C5%BCyteczne_pliki_zwi%C4%85zane_z_OC_PL';
$config['module']['wiki']['links']['ocSiteRules'] = 'index.php/Zasady_funkcjonowania_Serwisu_OC_PL';
$config['module']['wiki']['links']['cacheTypes'] = 'index.php/Typ_skrzynki';
$config['module']['wiki']['links']['cacheAttrib'] = 'index.php/Parametry_skrzynki#Atrybuty_skrzynki';
$config['module']['wiki']['links']['cacheAttrib_en'] = 'index.php/Cache_parameters#Attributes';
$config['module']['wiki']['links']['cacheLogPass'] = 'index.php/Parametry_skrzynki#Has.C5.82o_do_wpisu_do_Logu';
$config['module']['wiki']['links']['downloads'] = 'index.php/U%C5%BCyteczne_pliki_zwi%C4%85zane_z_OC_PL';
$config['module']['wiki']['links']['extraWaypoints'] = 'index.php/Dodatkowe_waypointy_w_skrzynce';

// *** Medals *************************************************************
$config['module']['medals']['enabled'] = true;

// *** GeoPaths ***********************************************************
$config['module']['GeoPath']['enabled'] = true;
// User must have at least X finds to create a GeoPath
$config['module']['GeoPath']['create_min_finds'] = 500;
$config['module']['GeoPath']['min_caches']['current'] = 25;
$config['module']['GeoPath']['min_caches']['old'][1] = array(
    'dateFrom' => '1970-01-01 01:00',
    'dateTo' => '2013-10-29 23:59:59',
    'limit' => 5,
);
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
$config['module']['GeoPath']['docs'] = 'http://info.opencaching.pl/node/13';



/* ************************************************************************
 * Limits
 * Change only if your node's limits differ from the defaults.
 */

// *** Thumbnails *********************************************************

// Large thumbnails, default 175x175
$config['limits']['thumb']['large'] = 175;
// Small thumbnails, default 64x64
$config['limits']['thumb']['small'] = 64;

// *** Image uploads ******************************************************

// Image file size limit in MB
$config['limits']['image']['filesize'] = 3.5;
// Resize large images ? (1=yes; 0=no)
$config['limits']['image']['resize'] = 1;
// If resize large images = 1
// only resize files larger then this, in MB
$config['limits']['image']['resize_larger'] = 0.1;
// Image maximum width in pixels (aspect ratio preserved)
$config['limits']['image']['width'] = 640;
// Image maximum height in pixels (aspect ratio preserved)
$config['limits']['image']['height'] = 640;
// Image recommended size in pixels (for translations)
$config['limits']['image']['pixels_text'] = '640 x 480';
// Allowed extensions (image formats)
$config['limits']['image']['extension'] = ';jpg;jpeg;gif;png;';
$config['limits']['image']['extension_text'] = 'JPG, PNG, GIF'; 

// *** Audio uploads ******************************************************

// Audio file size limit in MB
$config['limits']['audio']['filesize'] = 5;
// Allowed extensions (audio formats)
$config['limits']['audio']['extension'] = ';mp3;ogg;';
$config['limits']['audio']['extension_text'] = 'MP3, OGG'; 

// *** Attachment uploads *************************************************

// Attachment file size limit in MB
$config['limits']['attach']['filesize'] = 10;
// Allowed extensions (audio formats)
$config['limits']['attach']['extension'] = ';pdf;gwc;gpx;kml;';
$config['limits']['attach']['extension_text'] = 'PDF, GWC, GPX, KML'; 
/* For future development
 Allow attaching of the following file formats:
- PDF documents (for information)
- GWC Wherigo cartridge
- GPX and KML with tracks or routes or waypoints
*/

/* ************************************************************************
 * Maps
 * Change according to your geographical coverage.
 */

// mapper module for cache maps
$config['maps']['mapper'] = 'lib/mapper_okapi.php';  

// cache map v2
$config['maps']['mapv2'] = true;
// cache map v3
$config['maps']['mapv3'] = true;
// Flopp's map
$config['maps']['flopp'] = true;

// default coordinates for cachemap, set to your country's center of gravity
$config['maps']['country']['coords'] = '52.5,19.2';
// zoom level at which your whole country/region is shown on map
$config['maps']['country']['zoom'] = 6;

// Main page map
$config['maps']['main_page']['lat'] = 52.13;
$config['maps']['main_page']['lon'] = 19.20;
$config['maps']['main_page']['zoom'] = 5;
$config['maps']['main_page']['width'] = 250;
$config['maps']['main_page']['height'] = 260;

// Filter fragment for selecting region / province / state from nuts_codes table
$config['maps']['nuts']['filter'] = '`code` like \'PL__\'';

// Nature2000 link
$config['maps']['natura2000'] = '<a style="color:blue;" target="_blank" href="http://obszary.natura2000.org.pl/index.php?s=obszar&amp;id={linkid}">{sitename}&nbsp;&nbsp;-&nbsp;&nbsp;{sitecode}</a>';
    
/* ************************************************************************
 * Configuration for map v3 maps
 *
 * Two dimensional array:
 *
 * * first dimension
 * KEYS - internal names
 *
 * * second dimension
 * KEYS:
 *  - hidden: boolean attribute to hide the map entirerly, without removing it from config
 *  - showOnlyIfMore: show this map item only in large views (like full screen)
 *  - attribution: the HTML snippet that will be shown in bottom-right part of the map
 *  - imageMapTypeJS: the complete JS expression returning instance of google.maps.ImageMapType,
 *      if set, not other properties below will work
 *  - name: the name of the map
 *  - tileUrl: URL to the tile, may contain following substitutions
 *      - {z} - zoom, may include shifts, in form of i.e. {z+1}, {z-3}
 *      - {x}, {y} - point coordinates
 *  - tileUrlJS: the complete JS expression returning function for tileUrl retrieval,
 *      if set, tileUrl property will not work
 *  - tileSize: the tile size, either in form of WIDTHxHEIGHT, i.e. 256x128, or complete
 *      JS expression returning instance of google.maps.Size
 *  - maxZoom: maximum zoom available
 *  - minZoom: minimum zoom available
 *  - enabled: enable this tile source
 *
 * Other keys, will be passed as is, given that
 *  - numerical and boolean values are passed as is to JS
 *  - other types are passed as strings, unless they start with raw: prefix. In that case,
 *      they are passed as JS expressions
 */

// OSMapa tiles
$config['maps']['mapsConfig']['OSMapa'] = array(
        'attribution' => '&copy; <a href="http://www.openstreetmap.org/" target="_blank">OpenStreetMap</a> contributors <a href="http://creativecommons.org/licenses/by-sa/2.0/" target="_blank">CC BY-SA</a> | Hosting:<a href="http://trail.pl/" target="_blank">trail.pl</a> i <a href="http://centuria.pl/" target="_blank">centuria.pl</a>',
        'name' => 'OSMapa',
        'tileUrl' => 'http://tile.openstreetmap.pl/osmapa.pl/{z}/{x}/{y}.png',
        'maxZoom' => 18,
        'tileSize' => '256x256',
        'enabled' => true,
    );
// OpenStreetMap tiles    
$config['maps']['mapsConfig']['OSM'] = array(
        'name' => 'OSM',
        'attribution' => '&copy; <a href="http://www.openstreetmap.org/" target="_blank">OpenStreetMap</a> contributors <a href="http://creativecommons.org/licenses/by-sa/2.0/" target="_blank">CC BY-SA</a>',
        'tileUrl' => 'http://tile.openstreetmap.org/{z}/{x}/{y}.png',
        'maxZoom' => 18,
        'tileSize' => '256x256',
        'showOnlyIfMore' => true
        'enabled' => true,
    );
// UMP tiles    
$config['maps']['mapsConfig']['UMP'] = array(
        'name' => 'UMP',
        'attribution' => '&copy; Mapa z <a href="http://ump.waw.pl/" target="_blank">UMP-pcPL</a>',
        'tileUrl' => 'http://tiles.ump.waw.pl/ump_tiles/{z}/{x}/{y}.png',
        'maxZoom' => 18,
        'tileSize' => '256x256',
        'enabled' => true,
    );
// Topographical tiles
$config['maps']['mapsConfig']['Topo'] = array(
        'attribution' => '&copy; <a href="http://geoportal.gov.pl/" target="_blank">geoportal.gov.pl</a>',
        'showOnlyIfMore' => true,
        'imageMapTypeJS' => 'new google.maps.ImageMapType(new WMSImageMapTypeOptions(
                                        "Topo",
                                        "http://mapy.geoportal.gov.pl:80/wss/service/img/guest/TOPO/MapServer/WmsServer",
                                        "Raster",
                                        "",
                                        "image/jpeg"))',
        'enabled' => true,
    );
// Orto    
$config['maps']['mapsConfig']['Orto'] = array(
        'attribution' => '&copy; <a href="http://geoportal.gov.pl/" target="_blank">geoportal.gov.pl</a>',
        'showOnlyIfMore' => true,
        'imageMapTypeJS' => 'new google.maps.ImageMapType(new WMSImageMapTypeOptions(
                                        "Orto",
                                        "http://mapy.geoportal.gov.pl:80/wss/service/img/guest/ORTO/MapServer/WmsServer",
                                        "Raster",
                                        "",
                                        "image/jpeg"))',
        'enabled' => true,
    );

/* ************************************************************************
 * Cache page mini map
 * ************************************************************************ */

/* Cache page small map, fixed, clickable to open minimap.                  */ 
// available options are roadmap, terrain, map, satellite, hybrid
$config['maps']['cache_page_map']['layer'] = 'terrain';
$config['maps']['cache_page_map']['zoom'] = 8;
// choose color according to https://developers.google.com/maps/documentation/static-maps/intro#Markers
$config['maps']['cache_page_map']['marker_color'] = 'blue';

/* Cache page minimap                                                       */
$config['maps']['cache_mini_map']['zoom'] = 14;
$config['maps']['cache_mini_map']['width'] = '480';
$config['maps']['cache_mini_map']['height'] = '385'; 

/* ************************************************************************
 * External maps on which to view a cache 
 * 
 * The following parameters are available for replacement using 
 * printf style syntax, in this order
 *    1          2         3            4           5         6
 * latitude, longitude, cache_id, cache_code, cache_name, link_text
 *
 * coordinates are float numbers (%f), the rest are strings (%s)
 * cache_name is urlencoded
 * escape % using %% (printf syntax)
 * The level 3 key is also used as link_text.
 *
 * Use this to define URLs to external mapping sites to display a cache
 * ************************************************************************ */

/* Example:
 * $config['maps']['external']['MyMap'] = 1; // 1 = enabled; 0 = disabled
 * $config['maps']['external']['MyMap_URL'] = '<a href="http://site/file?lat=%1$f&lon=%2$f&id=%3$s&name=%5$s">%6$s</a>';
 */
$config['maps']['external']['Opencaching'] = 1;
$config['maps']['external']['Opencaching_URL'] = '<a target="_blank" href="cachemap3.php?lat=%1$f&lon=%2$f&cacheid=%3$s&inputZoom=14">%6$s</a>';
$config['maps']['external']['OSMapa'] = 1;
$config['maps']['external']['OSMapa_URL'] = '<a target="_blank" href="http://osmapa.pl?zoom=16&lat=%1$f&lon=%2$f&z=14&o=TFFT&map=1">%6$s</a>';
$config['maps']['external']['UMP'] = 1;
$config['maps']['external']['UMP_URL'] = '<a target="_blank" href="http://mapa.ump.waw.pl/ump-www/?zoom=14&lat=%1$f&lon=%2$f&layers=B00000T&mlat=%1$f&mlon=%2$f">%6$s</a>';
$config['maps']['external']['Google Maps'] = 1;
$config['maps']['external']['Google Maps_URL'] = '<a target="_blank" href="//maps.google.com/maps?hl=UTF-8&q=%1$f+%2$f+(%5$s)" >%6$s</a>';
$config['maps']['external']['Szukacz'] = 1;
$config['maps']['external']['Szukacz_URL'] = '<a target="_blank" href="http://mapa.szukacz.pl/?n=%1$f&e=%2$f&z=4&t=Skrzynka%%20Geocache">%6$s</a>';
$config['maps']['external']['Flopp\'s Map'] = 0;
$config['maps']['external']['Flopp\'s Map_URL'] = '<a target="_blank" href="http://flopp.net/?c=%1$f:%2$f&z=16&t=OSM&f=g&m=&d=&g=%4$s">%6$s</a>'; 







// ????????????????????????????????????????????????????????????????????????
// FIXME
// This should be moved to UI according to 
// https://github.com/opencaching/opencaching-pl/issues/299

// $contactDataXX 

// ????????????????????????????????????????????????????????????????????????
// FIXME
// This should be removed according to
// https://github.com/opencaching/opencaching-pl/issues/167
// $use_news_approving = true;
// $news_approver_email = 'rr@localhost';

// ????????????????????????????????????????????????????????????????????????
// FIXME
// This should be removed according to
// https://github.com/opencaching/opencaching-pl/issues/167
// user_id of admin who have more options than COG users to remove all logs or other more options in admin_users.php
//$super_admin_id = '';


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

?>
