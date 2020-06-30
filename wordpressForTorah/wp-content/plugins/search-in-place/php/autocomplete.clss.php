<?php
/* Prevent direct access */
defined('ABSPATH') or die("You can't access this file directly.");

if(!class_exists( 'CPSPAutocomplete' ))
{
	class CPSPAutocomplete
	{
		private $_settings;
		private $_defaults;

		function __construct()
		{
			$lang = get_locale();
			$this->_defaults = array(
				'enabled'	=> true,
		        'count' 	=> 10,
		        'chars' 	=> 25,
		        'lang' 		=> substr($lang, 0, 2),
		        'url' 		=> 'http://suggestqueries.google.com/complete/search?output=toolbar&oe=utf-8&client=toolbar',
		        'start' 	=> false
	        );
		} // End __construct

		/**** PRIVATE METHODS ****/

		private function _getSettings()
		{
			if(empty($this->_settings))	$this->_settings = get_option('CPSPAutocomplete',array());
			return $this->_settings;
		} // End _getSettings

		private function _substrAtWord($text, $length)
		{
			if (strlen($text) <= $length) return $text;
			$blogCharset = get_bloginfo('charset');
			$charset = $blogCharset !== '' ? $blogCharset : 'UTF-8';
			$s = mb_substr($text, 0, $length, $charset);
			return mb_substr($s, 0, strrpos($s, ' '), $charset);
		} // End _substrAtWord

		/**** PUBLIC METHODS ****/

		public function clearSettings()
		{
			delete_option('CPSPAutocomplete');
		} // End clearSettings

		public function updateSettings()
		{
			$this->_getSettings();

			$this->setAttr('enabled', isset($_POST['autocomplete']) ? true : false);
			$this->setAttr('start', isset($_POST['autocomplete_start']) ? true : false);
			if(isset($_POST['autocomplete_chars'])) $this->setAttr('chars', @intval($_POST['autocomplete_chars']));
			if(isset($_POST['autocomplete_count'])) $this->setAttr('count', @intval($_POST['autocomplete_count']));

			update_option('CPSPAutocomplete', $this->_settings);
		} // updateSettings

		public function setAttr($attr, $val)
		{
			$this->_getSettings();
			$this->_settings[$attr] = $val;
		} // setAttr

		public function getSettings()
		{
			echo '
			<div style="width:100%; border: 1px solid #DADADA; padding: 20px; box-sizing: border-box;">
			<h3>'.__('Google Autocomplete', 'search-in-place').'</h3>
			<table class="form-table">
				<tbody>
					<tr valign="top">
						<th scope="row">
							<label for="autocomplete">'.__('Enabling autocomplete', 'search-in-place').'</label>
						</th>
						<td>
							<input type="checkbox" name="autocomplete" id="autocomplete" value="1" '.(($this->getAttr('enabled')) ? 'checked' : '').' />
						</td>
					</tr>
					<tr valign="top">
						<th scope="row">
							<label for="autocomplete_chars">'.__('Max keyword length', 'search-in-place').'</label>
						</th>
						<td>
							<input type="number" name="autocomplete_chars" id="autocomplete_chars" value="'.esc_attr($this->getAttr('chars')).'" />
						</td>
					</tr>
					<tr valign="top">
						<th scope="row">
							<label for="autocomplete_count">'.__('Max keywords count', 'search-in-place').'</label>
						</th>
						<td>
							<input type="number" name="autocomplete_count" id="autocomplete_count" value="'.esc_attr($this->getAttr('count')).'" />
						</td>
					</tr>
					<tr valign="top">
						<th scope="row">
							<label for="autocomplete_start">'.__('Suggest terms starting with the typed text', 'search-in-place').'</label>
						</th>
						<td>
							<input type="checkbox" name="autocomplete_start" id="autocomplete_start" value="1" '.($this->getAttr('start') ? 'CHECKED' : '').' />
						</td>
					</tr>
				</tbody>
			</table>
			</div>
			';
		} // getSettings

		public function getAttr($attr)
		{
			$this->_getSettings();
			if(isset($this->_settings[$attr])) return $this->_settings[$attr];
			if(isset($this->_defaults[$attr])) return $this->_defaults[$attr];
		} // getAttr

		public function autocomplete($terms='')
		{
			$result = array(); // Result

			if(!$this->getAttr('enabled')) return $result;

			$url = $this->getAttr('url').'&hl='.$this->getAttr('lang').'&q='.urlencode($terms);
			$response = wp_remote_get(
				$url,
				array(
					'sslverify' 	=> false,
					'user-agent'  	=> 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_8) AppleWebKit/535.6.2 (KHTML, like Gecko) Version/5.2 Safari/535.6.2'
				)
			);

			if(is_wp_error($response))
			{
				error_log($response->get_error_message(), 0);
				return $result;
			}

			$body = wp_remote_retrieve_body($response);
			if(empty($body)) return $result;

			if (function_exists('mb_convert_encoding')) $body = mb_convert_encoding($body, "UTF-8");
            try
			{
                $xml = simplexml_load_string($body);
                if(empty($xml)) return $result;

				$json = json_encode($xml);
                $array = json_decode($json, TRUE);

				$keywords = array();

                if (isset($array['CompleteSuggestion'])) {
                    foreach ($array['CompleteSuggestion'] as $k => $v) {
                        if (isset($v['suggestion']))
                            $keywords[] = $v['suggestion']['@attributes']['data'];
                        elseif (isset($v[0]))
                            $keywords[] = $v[0]['@attributes']['data'];
                    }
                }

				$m = $this->getAttr('count');
				$c = 0;
                foreach ($keywords as $k)
				{
                    $t = strtolower($k);
	                if (
		                $t != $terms &&
		                ('' != $str = $this->_substrAtWord($t, $this->getAttr('chars')))
	                )
					{
						$start = $this->getAttr('start');
		                if( !$start || ($start && strpos($t, $terms) === 0))
						{
			                $result[] = $str;
							$c++;
						}
		            }
					if($m<=$c) break;
                }
            }
			catch(Exception $e){}

			return $result;
		} // autocomplete
	} // End CPSPAutocomplete
}