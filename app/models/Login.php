<?php

class Login extends Model
{
	public function authorization($email, $pass)
	{	
		$admin = 0;
		$result = $this->execute("SELECT * FROM users");
		foreach ($result as $key => $value) {
			if ($value['user_name'] == $email && $value['pass'] == $pass) {
				$admin = 1;
				session_start();
			}
		}
        return $admin;
	}

}
