<?php
/**
 * 友情链接
 * @copyright (c) Emlog All Rights Reserved
 */

class Link_Model {

	private $db;

	function __construct() {
		$this->db = Database::getInstance();
	}

	function getLinks() {
		$res = $this->db->query("SELECT * FROM ".DB_PREFIX."link ORDER BY taxis ASC");
		$links = array();
		while($row = $this->db->fetch_array($res)) {
			$row['sitename'] = htmlspecialchars($row['sitename']);
			$row['description'] = subString(htmlClean($row['description'], false),0,80);
			$row['siteurl'] = $row['siteurl'];
			$row['sitepic'] = $row['sitepic'];
		       $row['linksortid'] = $row['linksortid'];
			$links[] = $row;
		}
		return $links;
	}

	function updateLink($linkData, $linkId) {
		$Item = array();
		foreach ($linkData as $key => $data) {
			$Item[] = "$key='$data'";
		}
		$upStr = implode(',', $Item);
		$this->db->query("update ".DB_PREFIX."link set $upStr where id=$linkId");
	}

	function addLink($name, $url, $sitepic,$linksortid, $des,$taxis) {
		if ($taxis > 30000 || $taxis < 0) {
			$taxis = 0;
		}
			$sql="insert into ".DB_PREFIX."link (sitename,siteurl,sitepic,linksortid,description,taxis) values('$name','$url','$sitepic','$linksortid','$des', $taxis)";
		$this->db->query($sql);
	}

	function getOneLink($linkId) {
		$sql = "select * from ".DB_PREFIX."link where id=$linkId ";
		$res = $this->db->query($sql);
		$row = $this->db->fetch_array($res);
		$linkData = array();
		if ($row) {
			$linkData = array(
			'sitename' => htmlspecialchars(trim($row['sitename'])),
			'siteurl' => htmlspecialchars(trim($row['siteurl'])),
			'sitepic' => htmlspecialchars(trim($row['sitepic'])),
		       'linksortid' => htmlspecialchars(trim($row['linksortid'])),
			'description' => htmlspecialchars(trim($row['description']))
			);
		}
		return $linkData;
	}

	
	/**
	 * 删除链接
	 *
	 * @param string $condition
	 * @return int
	 */	
	function deleteLink($linkId) {
		$this->db->query("DELETE FROM ".DB_PREFIX."link where id=$linkId");
	}

	/**
	 * 隐藏/显示链接
	 *
	 * @param int $linkId
	 * @param string $state
	 */
	function hideSwitch($linkId, $state) {
		$this->db->query("UPDATE " . DB_PREFIX . "link SET hide='$state' WHERE id=$linkId");
	}

	/**
	 * 后台获取链接列表
	 *
	 * @param string $condition
	 * @param int $page
	 * @return array
	 */
	function getLinksForAdmin($condition = '', $page = 1) {
		$timezone = Option::get('timezone');
		$perpage_num = Option::get('admin_perpage_num');
		$start_limit = !empty($page) ? ($page - 1) * $perpage_num : 0;
		$limit = "LIMIT $start_limit, " . $perpage_num;
		$sql = "SELECT * FROM " . DB_PREFIX . "link $condition order by taxis ASC,id DESC $limit";
		$res = $this->db->query($sql);
		$links = array();
		while ($row = $this->db->fetch_array($res)) {
			$row['sitename'] = htmlspecialchars($row['sitename']);
			$row['description'] = subString(htmlClean($row['description'], false),0,80);
			$row['siteurl'] = $row['siteurl'];
			$row['sitepic'] = $row['sitepic'];
			$links[] = $row;
		}
		return $links;
	}

	/**
	 * 获取指定条件的链接条数
	 *
	 * @param string $condition
	 * @return int
	 */
	function getLinkNum($condition = '') {
        $data = $this->db->once_fetch_array("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "link $condition");
		return $data['total'];
	}

}