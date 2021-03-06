<?php

namespace src\Models\ChunkModels\ListOfCaches;

/**
 * This is column which displays cache country & region.
 * $cache arg has to contain GeoCache object
 *
 */
class Column_CacheFullRegionObject extends AbstractColumn
{

    /**
     * @return string
     */
    protected function getChunkName()
    {
        return "listOfCaches/cacheFullRegionObjectColumn";
    }

    /**
     * @return string
     */
    public function getCssClass()
    {
        return 'left';
    }
}
