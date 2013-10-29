<?php
/**
 * A PHP wrapper for Spotify Metadata API
 * 
 * @author    confact <hakan@dun.se>
 * @copyright 2013 confact
 * @project MMDb
 * @release <0.1>
 */
class Spotify
{

    /**
     * Search on different type to get json of metadata of results.
     *
     * @param str  $query
     * @param str  $type
     * @param bool $page
     * 
     * @return array|mixed
     */

    public function search($query, $type = "album", $page = false)
    {
        // Fetch the data from Metadata API
        $url = 'http://ws.spotify.com/search/1/' . $type . '.json?q=' . urlencode($query);
        ($page != false ? $url .= "&page=" . $page : '');
        $data = json_decode(@file_get_contents($url));
        //check if data is not set, they make it a empty array
        (!isset($data) ? $data = array() : '');

        return $data;
    }

    /**
     * Get metadata based on the Spotify key.
     *
     * @param str $key
     * @param str $type
     * 
     * @return array|mixed
     */

    public function lookup($key, $type = "album")
    {
        // Fetch the data from Metadata API
        $url = 'http://ws.spotify.com/lookup/1/.json?uri=' . $key;
        $data = json_decode(@file_get_contents($url));
        //check if data is not set, they make it a empty array
        (!isset($data) ? $data = array() : '');

        return $data;
    }

}
