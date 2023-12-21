<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Urlmodel extends CI_Model {

	public function url($url)
	{
		$res = $this->db->where('hash', $url)
						->get('url');

		if ($res->num_rows() > 0) {
            $result = $res->row_array();
            $go = $result['client_links'];
            $title = $result['title'];
            $id = $result['id'];

            $array = array(
                'text' => $title,
                'type' => "WEB"
            );

            $this->_logvisit($id);
            $qry_ins = $this->db->insert('user_logs', $array);
            header("Location: $go");
        }
        else{
        	$this->_logerror($url);
			show_404();
        }
	}

	private function detect_type($agent)
	{
		preg_match("/iPhone|Android|iPad|iPod|webOS|Windows|Macintosh/", $_SERVER['HTTP_USER_AGENT'], $matches);
		$os	=	current($matches);
		switch ($os) {
			case 'iPad':
			case 'iPod':
			case 'iPhone':
				return 'iOS';
			case 'Android':
			case 'Windows':
			case 'Macintosh':
			case 'webOS':
				return $os;
			default: return 'other';
		}
	}

	private function _logerror($url)
	{
		$data	=	array(
			'url'	=>	$url,
			'agent'	=>	(isset($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : 'not set'),
			'ip'	=>	(isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : 'not set'),
			'type'	=>	$this->detect_type(isset($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : 'not set')
		);
		$this->db->insert('url_error', $data);
	}

	private function _logvisit($url)
	{
		$data	=	array(
			'url_id'	=>	$url,
			'agent'	=>	(isset($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : 'not set'),
			'ip'	=>	(isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : 'not set'),
			'type'	=>	$this->detect_type(isset($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : 'not set')
		);
		$this->db->insert('url_success', $data);
	}

}