<div id="mapCanvasFullScreen"></div>

<div style="display:none">

    <div id="mainMapControls" class="ol-control">
      <!--
        // search temporary disabled
      <input id="searchControlInput" type="text" size="10">
      <input id="searchControlButton" value="<?=tr('search')?>" type="button">
       -->
      <img id="fullscreenToggle" src="/images/icons/embeded.svg"
           title="<?=tr('map_disableFullscreen')?>" alt="<?=tr('map_disableFullscreen')?>">

      <img id="refreshButton" src="/images/icons/refresh.svg"
           title="<?=tr('map_refresh')?>" alt="<?=tr('map_refresh')?>">

      <img id="filtersToggle" src="/images/icons/marker.svg"
           title="<?=tr('map_toggleFilters')?>" alt="<?=tr('map_toggleFilters')?>">
    </div>

    <div id="mapFilters" class="ol-control mapFiltersFullScreen">
      <?=$view->callSubTpl("/mainMap/mainMapFilters")?>
    </div>
</div>

<!-- map-chunk start -->
  <?php $view->callChunk('dynamicMap/dynamicMap', $view->mapModel, "mapCanvasFullScreen");?>
<!-- map-chunk end -->

<script id="mainMapPopupTpl" type="text/x-handlebars-template">
  <?=$view->callSubTpl("/mainMap/mainMapPopup")?>
</script>

<script>
var params = {
  mapId: "mapCanvasFullScreen",
  isFullScreenMap: true,
  userId: "<?=$view->mapUserId?>",
  openPopupAtCenter: <?=isset($view->openPopup)?"true":"false"?>,
  circle150m: <?=isset($view->circle150m)?"true":"false"?>,
  userName: "<?=$view->mapUserName?>",
  searchData: <?=isset($view->searchData)?'"'.$view->searchData.'"':"null"?>,
  cacheSetId: <?=isset($view->cacheSet)?$view->cacheSet->getId():"null"?>,
  initUserPrefs: <?=$view->savedUserPrefs?>,
};

$(function() {
  mainMapEntryPoint(params);
});

</script>
