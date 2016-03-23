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

// *** Paths **************************************************************

// Document root for the PHP application. With trailing "/". REQUIRED.
// (same as DocumentRoot directive in Apache httpd config)
// Should be set explicitely as absolute path on hosting server.
// Example: /path/to/opencaching-pl/
$config['server']['path']['root'] = '/var/www//ocpl-root';

// The following are outside the application root path and must be defined
// as aliased directories in Apache httpd config.

// Path to OC dynamic, outside the root path. REQUIRED
$config['server']['path']['ocdynamic'] = '/var/www/ocpl-data/';
// Path to OC admin, outside the root path. REQUIRED
$config['server']['path']['ocadmin'] = '/var/www/ocpl-admin/';

// *** Debugging **********************************************************

// FIXME 
// Do these variables get set somewhere, like taken from URL parameters?
/* 
//Debug?
if (!isset($debug_page))
    $debug_page = false;
if (!isset($debug))
    $debug = false;
$develwarning = '';

//site in service? Set to false when doing bigger work on the database to prevent error's
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

// safemode_zip-binary
$config['server']
$safemode_zip = '/var/www/ocpl/bin/phpzip.php';
$zip_basedir = $dynbasepath . 'download/zip/';
$zip_wwwdir = '/download/zip/';
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
$config['node']['id'] = 4;
// Website host name. REQUIRED
$config['node']['hostname'] = 'localhost';
// Website domain name. REQUIRED
$config['node']['domainname'] = 'localdomain';
// Webside URL. With trailing "/". REQUIRED.
// Change it only if necessary. (ie. using https)
$config['node']['url'] = 'http://' . $config['node']['hostname'] . '.' . $config['node']['domainname'] . '/';
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

// *** Cookies ************************************************************
// Cookie settings (hostname dependent). Change only if necessary.
$config['node']['cookie']['name'] = 'oc';
$config['node']['cookie']['path'] = '/';
$config['node']['cookie']['domain'] = '.' . $config['node']['domainname'];

// *** Styling and personalization ****************************************
// Style
$config['node']['styles']['stylename'] = 'stdstyle';
// Template
$config['node']['styles']['template'] = $config['server']['path']['ocdynamic'] . 'tpl/' . $config['node']['styles']['stylename'] . '/html/';
// Header
$config['node']['styles']['header'] = '__standard_header_images_set'; // not implemented yet
// Icons
$config['node']['styles']['icons'] = '__standard_icons_set'; // not implemented yet
// Flags
$config['node']['styles']['flags'] = '__standard_flags_set'; // not implemented yet
// Caches
$config['node']['styles']['caches'] = '__standard_caches_set'; // not implemented yet
// Attributes
$config['node']['styles']['attributes'] = '__standard_attributes_set'; // not implemented yet

// *** Administration *****************************************************

// In your database, table `user`, set column `admin` to 1 for all users
// that must have administrative privileges granted to OC Team (access to ADMIN MENU)

// Super admin 
// Super admin, in addition to OC Team privileges, can remove all logs and more
// see admin_users.php. Super admin user must already be an admin.
// set the value of `user_id` from table `user` here
$config['node']['admin']['superadmin'] = '';

// News settings
// News requires approval?
$config['node']['news']['approve'] = true;
// Email to be notified about a news approval request
$config['node']['news']['approve_email'] = 'rt@localhost';

// *** Administration *****************************************************

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
// Set this to true to disable automatic translation of cache descriptions
// Google translation service became a paid service.
$config['node']['api']['google']['translation'] = true;

// *** Garmin API *********************************************************

// Garmin API key.
// How to get an API key: http://www.garmindeveloper.com/web-device/garmin-communicator-plugin/get-your-site-key/
// Garmin keys are tied to your website URL
// Make sure you generate your API key using your website URL with trailing "/"
$config['node']['api']['garmin']['key'] = ''; // <-- insert your API key here
$config['node']['api']['garmin']['url'] = $config['node']['url'];

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

// *** Rewards ************************************************************

// Titled caches
$config['oc']['titled_cache']['nr_found'] = 10;
$config['oc']['titled_cache']['prefix'] = 'week';





















$config = array(
    /**
     *Add button to a shop. Set true otherwise false
     *Add link to the shop of choise.
     */
    'showShopButton' => false,
    'showShopButtonUrl' => 'http://www.shop of choise',
    /** url where xml witch most recent blog enterie are placed */
    'blogMostRecentRecordsUrl' => 'http://blog.opencaching.pl/feed/',
    /** to switch cache map v2 on set true otherwise false */
    'map2SwithedOn' => true,
    /** to switch flopp's map on set true otherwise false */
    'FloppSwithedOn' => false,
    /* === Node personalizations === */

    /** main logo picture (to be placed in /images/) */
    'headerLogo' => 'oc_logo.png',
    /** main logo; winter version, displayed during december and january. */
    'headerLogoWinter' => 'oc_logo_winter.png',
    /** main logo; prima aprilis version (april fools), displayed only on april 1st. */
    'headerLogo1stApril' => 'oc_logo_1A.png',
    /** qrcode logo: show qrcode image and link the prefered way.  */
    'qrCodeLogo' => 'qrcode_bg.jpg',
    'qrCodeUrl' => 'http://opencaching.pl/viewcache.php?wp=OP3C90',
    /**
     * website icon (favicon); (to be placed in /images/)
     * Format: 16x16 pixels; PNG 8bit indexed or 24bit true color, transparency supported
     * A file /favicon.ico (windows icon ICO format, 16x16) should also exist as fallback
     * mainly for MSIE
     */
    'headerFavicon' => 'oc_icon.png',
    /** Language list for new caches */
    'defaultLanguageList' => array(
        'PL', 'EN', 'FR', 'DE', 'NL', 'RO'
    ),
    /** default country in user registration form */
    'defaultCountry' => 'PL',
    /* Enable referencing waypoints from other sites */
    'otherSites_geocaching_com' => 1,
    'otherSites_terracaching_com' => 1,
    'otherSites_navicache_com' => 1,
    'otherSites_gpsgames_org' => 1,
    'otherSites_qualitycaching_com' => 0, // BeNeLux only

    /**
     * Minimum number of finds a user must have to see a cache's waypoint on
     * another site.
     */
    'otherSites_minfinds' => 100,
    /**
     * not allowed cache types (user cannot create caches of this types).
     *
     * Cachetypes must be lib/cache.php constant TYPE_*
     */
    'forbidenCacheTypes' => array(
        cache::TYPE_VIRTUAL,
        cache::TYPE_WEBCAM,
        cache::TYPE_GEOPATHFINAL
    ),
    /**
     * cache limits for user. If user is allowed to place limited nomber of specified cache type,
     * place cachetype and limit here.
     *
     * Cachetypes must be lib/cache.php constant TYPE_*
     */
    'cacheLimitByTypePerUser' => array(
        cache::TYPE_OWNCACHE => 1,
    ),
    /**
     * not allowed cache sizes (user cannot create caches of this sizes).
     *
     * Cachesizes must be lib/cache.php constant SIZE_*
     */
    'forbiddenCacheSizes' => array(
        //cache::SIZE_MICRO
    ),
    /**
     * If set to true, all database queries will be reported in the page
     * output. (Note, that this will cause most of the AJAX actions to stop
     * functioning properly.)
     */
    'debugDB' => true,
    /** The filter fragment selecting provinces from nuts_codes table. */
    'provinceNutsCondition' => '`code` like \'PL__\'',
    /**/
    'medalsModuleSwitchedOn' => true,
    /** Nature2000 link - used in viewcache.php */
    'nature2000link' => '<a style="color:blue;" target="_blank" href="http://obszary.natura2000.org.pl/index.php?s=obszar&amp;id={linkid}">{sitename}&nbsp;&nbsp;-&nbsp;&nbsp;{sitecode}</a>',
    /** See settings-example.inc.php for explanation */
    'mapsConfig' => array(
        'OSM' => array(
            'name' => 'OSM',
            'attribution' => '&copy; <a href="http://www.openstreetmap.org/" target="_blank">OpenStreetMap</a> contributors <a href="http://creativecommons.org/licenses/by-sa/2.0/" target="_blank">CC BY-SA</a>',
            'tileUrl' => 'http://tile.openstreetmap.org/{z}/{x}/{y}.png',
            'maxZoom' => 18,
            'tileSize' => '256x256'
        ),
    ),
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

  /** Limit for uplading pictures per node. */

// Image file size limit in MB
$config['limits']['image']['filesize'] = 3.5;
// Resize large images ? (1=yes; 0=no)
$config['limits']['image']['resize'] = 1;
// Image maximum width in pixels (aspect ratio preserved)
$config['limits']['image']['width'] = 640;
// Image maximum height in pixels (aspect ratio preserved)
$config['limits']['image']['height'] = 640;
// Image recommended size in pixels (for translations)
$config['limits']['image']['pixels_text'] = '640 x 480';
// Allowed extensions (image formats)
$config['limits']['image']['extension'] = ';jpg;jpeg;gif;png;';
$config['limits']['image']['extension_text'] = 'JPG, PNG, GIF';

