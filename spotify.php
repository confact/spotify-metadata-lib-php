<?php
	/**
     * @author confact
     * @copyright 2013
     * @project MMDb
     * @version 1.0
	 */
	class Spotify
	{

        /**
         * Search on different type to get json of metadata of results.
         *
         * @param str $query
         * @param str $type
         * @param bool $page
         * @return array|mixed
         */
        function search($query, $type = "album", $page = FALSE)
		{
			// Fetch the data from Metadata API
			$url = 'http://ws.spotify.com/search/1/'.$type.'.json?q='.urlencode($query);
			($page != FALSE ? $url .= "&page=".$page : '');
			$data = json_decode( @file_get_contents($url));
			//check if data is not set, they make it a empty array
			(!isset($data) ? $data=array() : '');
			
			return $data;
		}

        /**
         * Get metadata based on the Spotify key.
         *
         * @param str $key
         * @param str $type
         * @return array|mixed
         */
        function lookup($key, $type = "album")
		{
			// Fetch the data from Metadata API
			$url = 'http://ws.spotify.com/lookup/1/.json?uri=spotify:'.$type.':'.$key;
			$data = json_decode( @file_get_contents($url));
			//check if data is not set, they make it a empty array
			(!isset($data) ? $data=array() : '');
			
			return $data;
		}

	}