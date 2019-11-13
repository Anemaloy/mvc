<?php

class Tasks extends Model
{
	public function get_data($sorting = null)
	{	
        if ($sorting != null) {
			$direction = 'ASC';
			$result = $this->execute("SELECT * FROM tasks order by $sorting");
			$limit = 3;
			$total_result = count($result);
			$total_pages = ceil($total_result / $limit);
				if (!isset($_GET['page'])) {
					$page = 1;
				} else {
					$page = $_GET['page'];
				}
			$starting_limit = ($page-1) * $limit;
			$sql  = "SELECT * FROM tasks order by $sorting $direction LIMIT $starting_limit, $limit";
			$result = $this->execute($sql);
        } else {
			$result = $this->execute("SELECT * FROM tasks");
			$limit = 3;
			$sorting = 'email';
			$total_result = count($result);
			$total_pages = ceil($total_result / $limit);
				if (!isset($_GET['page'])) {
					$page = 1;
				} else {
					$page = $_GET['page'];
				}
				$starting_limit = ($page-1) * $limit;
				$sql  = "SELECT * FROM tasks LIMIT $starting_limit, $limit";
				$result = $this->execute($sql);
		}
		$response = ['result' => $result, 'pages'=>$total_pages];
        return $response;
	}


	public function add_data($user_name, $email, $content)
	{	
		$params = [
			'user_name'  => self::validation($user_name),
			'email' 	 => self::validation($email),
			'content' 	 => self::validation($content),
			'moderation' => 0
		];
		$sql = "INSERT INTO tasks (user_name, email, content, moderation) VALUES (:user_name, :email, :content, :moderation)";
		$result = $this->execute($sql, $params);
        return $result;
	}

	
	public static function validation($string) {
		$string=str_replace('<', '', $string);
		$string=str_replace('>', '', $string);
		return $string;
	}


	public function store($id, $content, $moderation)
	{	
		if($moderation == 'on') {
			$moderation = 1;
		} else {
			$moderation = 0;
		}
		$params = [
			'content'    => $content,
			'moderation' => $moderation,
			'id'		 => $id
		];
		$sql = "UPDATE tasks SET content=:content, moderation=:moderation WHERE id=:id";
		$result = $this->execute($sql, $params);
        return $result;
	}
	
}
