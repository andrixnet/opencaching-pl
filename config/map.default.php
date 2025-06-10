<?php

/**
 * Configuration of maps in the OC code
 *
 * This is a default configuration.
 * It may be customized in node-specific configuration file.
 */

$map = [];

/**
 * This array contains keys used by maps
 */
$map['keys'] = [];

/**
 * This variable should contain api_key created for https://openrouteservice.org
 * DO NOT add your key to this file - add it in your map.local.php file.
 *
 * OpenRouteService is used to search (geocode) on MainMap - without the key search is disabled.
 */
$map['keys']['OpenRouteService'] = '';

/**
 * $map['jsConfig'] contains JS code with configuration for openlayers
 * Full list of known services. 
 *
 * Basic sample with OpenStreetMap. For more examples see below.
 */
$map['jsConfig'] = "
    {
        OSM: new ol.layer.Tile ({
            source: new ol.source.OSM(),
        })    
    }
";

/**
 * Complete set of known services in use by various OC sites for reference.
 * Use relevant service(s) in the respective configuration map.XX.php 
 * or customized in the map.local.php

$map['jsConfig'] = "
    {
        OSM: new ol.layer.Tile ({
            source: new ol.source.OSM(),
        }),

        Osmapa: new ol.layer.Tile ({
            source: new ol.source.TileImage ({
                url: 'http://tile.openstreetmap.pl/osmapa.pl/{z}/{x}/{y}.png',
                attributions: \"&copy; <a href='https://www.openstreetmap.org/' target='_blank'>OpenStreetMap</a>\",
            })
        }),

        UMP: new ol.layer.Tile ({
            source: new ol.source.TileImage ({
                url: 'https://tiles.ump.waw.pl/ump_tiles/{z}/{x}/{y}.png',
                attributions: \"&copy; Mapa z <a href='http://ump.waw.pl/' target='_blank'>UMP-pcPL</a>\",
            })
        }), 

        Topo: new ol.layer.Tile ({
            source: new ol.source.TileWMS({
                url: 'http://mapy.geoportal.gov.pl:80/wss/service/img/guest/TOPO/MapServer/WmsServer',
                attributions: \"&copy; <a href='http://geoportal.gov.pl/' target='_blank'>geoportal.gov.pl</a>\",
                params: {
                    VERSION: '1.1.1',
                    LAYERS: 'Raster',
                    TILED: true,
                    FORMAT: 'image/jpeg',
                    BGCOLOR: '0xFFFFFF',
                    TRANSPARENT: false
                },
                projection: 'EPSG:4326',
                tileGrid: ol.tilegrid.createXYZ({
                    extent: ol.proj.get('EPSG:4326').getExtent(),
                    tileSize: [768, 768]
                }),
            }),
        }), 

        Orto: new ol.layer.Tile({
            source: new ol.source.TileWMS({
                url: 'https://mapy.geoportal.gov.pl/wss/service/PZGIK/ORTO/WMS/StandardResolution',
                attributions: \"&copy; <a href='http://geoportal.gov.pl/' target='_blank'>geoportal.gov.pl</a>\",
                params: {
                    VERSION: '1.1.1',
                    LAYERS: 'Raster',
                    TILED: true,
                    FORMAT: 'image/jpeg',
                    BGCOLOR: '0xFFFFFF',
                    TRANSPARENT: false
                },
                projection: 'EPSG:4326',
                tileGrid: ol.tilegrid.createXYZ({
                    extent: ol.proj.get('EPSG:4326').getExtent(),
                    tileSize: [768, 768]
                }),
            }),
        }),     
        
        BingMap: new ol.layer.Tile ({
            source: new ol.source.BingMaps({
                key: '{Key-BingMap}',
                imagerySet: 'Road',
                maxZoom: 19
            })
        }), 
        
        BingSatellite: new ol.layer.Tile ({
            source: new ol.source.BingMaps({
                key: '{Key-BingMap}',
                imagerySet: 'Aerial',
                maxZoom: 19
            })
        }), 

        ESRITopo: new ol.layer.Tile({
            source: new ol.source.XYZ({
                attributions: 'Tiles ┬⌐ <a href=\"https://services.arcgisonline.com/ArcGIS/' +
                    'rest/services/World_Topo_Map/MapServer\">ArcGIS</a>',
                url: 'https://server.arcgisonline.com/ArcGIS/rest/services/' +
                    'World_Topo_Map/MapServer/tile/{z}/{y}/{x}'
            })
        }),       

        ESRIStreet: new ol.layer.Tile({
            source: new ol.source.XYZ({
                attributions: 'Tiles ┬⌐ <a href=\"https://services.arcgisonline.com/ArcGIS/' +
                    'rest/services/World_Street_Map/MapServer\">ArcGIS</a>',
                url: 'https://server.arcgisonline.com/ArcGIS/rest/services/' +
                    'World_Street_Map/MapServer/tile/{z}/{y}/{x}'
            })
        }), 
    
    }
";
*/ 

/**
 * Bing map key is set in node-local config file
 */
//$map['keys']['BingMap'] = 'NEEDS-TO-BE-SET-IN-LOCAL-CONFIG-FILE'; 

/**
 * This function is called to inject keys from "local" config (map.local.php)
 * to node-specific map config (for example map.pl.php).
 *
 * Values below show generic example and how to implement for Bing.
 *
 * @param array Complete configuration merged from default + node + local configs
 * @return true on success
 */
$map['keyInjectionCallback'] = function (array &$mapConfig) {
    /**
     * Example:
     * $mapConfig['jsConfig'] = str_replace(
     *     '{NICE-MAP-KEY}',
     *     $mapConfig['keys']['NiceMap'],
     *     $mapConfig['jsConfig']
     * );
     */

    /**
    // *** Bing API key    
    $map['keyInjectionCallback'] = function (array &$mapConfig) {
    // change string {Key-BingMap} to proper key value
    $mapConfig['jsConfig'] = str_replace(
        '{Key-BingMap}',
        $mapConfig['keys']['BingMap'],
        $mapConfig['jsConfig']
    );
    */

    return true;
};

/**
 * Coordinates of the default map center - used by default by many maps in service
 * Format: float number
 */
$map['mapDefaultCenterLat'] = 52.13;
$map['mapDefaultCenterLon'] = 19.20;

/**
 * Zoom of the static map from startPage
 */
$map['startPageMapZoom'] = 5;

/**
 * Dimensions of the static map from startPage[width,height]
 */
$map['startPageMapDimensions'] = [250, 260];

/**
 * Links to external maps used at least at viewpage
 * (to disable map - just add key $map['external']['OSMapa']['enabled'] = false;)
 *
 * Url rules:
 *  The following parameters are available for replacement using
 * printf style syntax, in this order
 *
 *    1          2         3            4           5         6
 * latitude, longitude, cache_id, cache_code, cache_name, link_text
 *
 * coordinates are float numbers (%f), the rest are strings (%s)
 * cache_name is urlencoded
 * escape % using %% (printf syntax)
 *
 * The level 2 key is also used as link_text.
 */
$map['external']['Opencaching']['url'] = '/MainMap/fullscreen?lat=%1$f&lon=%2$f&openPopup';
$map['external']['OSM']['url'] = 'https://www.openstreetmap.org/index.html?mlat=%1$f&mlon=%2$f&zoom=16&layers=M';

$map['external']['OSMapa']['enabled'] = false;  // PL specific
$map['external']['OSMapa']['url'] = 'http://osmapa.pl?zoom=16&lat=%1$f&lon=%2$f&z=14&o=TFFT&map=1';

$map['external']['UMP']['enabled'] = false;     // PL specific
$map['external']['UMP']['url'] = 'https://mapa.ump.waw.pl/?zoom=14&lat=%1$f&lon=%2$f&layers=B00000T&mlat=%1$f&mlon=%2$f';

$map['external']['Google Maps']['url'] = 'https://maps.google.com/maps?hl=UTF-8&q=%1$f+%2$f+(%5$s)';

$map['external']['Szukacz']['enabled'] = false; // PL specific
$map['external']['Szukacz']['url'] = 'https://mapa.szukacz.pl/?n=%1$f&e=%2$f&z=4&t=Skrzynka%%20Geocache';

$map['external']["Flopp's Map"]['enabled'] = false;
$map['external']["Flopp's Map"]['url'] = 'https://flopp.net/?c=%1$f:%2$f&z=16&t=OSM&f=g&m=&d=&g=%4$s';

$map['external']['Topo BE']['enabled'] = false; // BeNeLux specific
$map['external']['Topo BE']['url'] = 'http://wms.ngi.be/cartoweb/service/?lat=%1$f&lon=%2$f&zoom=16'; 
