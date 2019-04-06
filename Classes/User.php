<?php

require_once('config/database.php');


class User {
	
	private $db;
	
	public function __construct(){
		
		$this->db = new Connection();
		$this->db = $this->db->dbConnect();
		
	}
	
	public function Login($email, $password){
		
		if(isset($_COOKIE['login_attempt']) && $_COOKIE['login_attempt'] < 3 || !isset($_COOKIE['login_attempt'])){

			if(!isset($_SESSION['user_id'])){
				
				if(isset($_POST['email']) && isset($_POST['password'])){
					
					$query = $this->db->prepare('SELECT id, email, password_id FROM sys_users WHERE email=:email');
					$query -> bindValue (':email', $email, PDO::PARAM_STR);
					$query -> execute();
					
					$user = $query -> rowCount();
					
					if($user == 1){
						
						$user = $query -> fetch();
						
						$query = $this->db->prepare('SELECT password, pass_date, expire_date, expired FROM sys_passwords WHERE user_id=:user_id');
						$query -> bindValue (':user_id', $user['id'], PDO::PARAM_STR);
						$query -> execute();
						
						$user_pass = $query -> fetch();
						
						if($user && password_verify($password, $user_pass['password'])){
						
							unset($_COOKIE['login_attempt']);
							
							$pass_expire = $user_pass['expire_date'];
		
							$current_date = new DateTime();
							$current_date->format('Y-m-d H:i:s');
							
							$end = DateTime::createFromFormat('Y-m-d H:i:s', $pass_expire);
							
							$diff = $current_date->diff($end);
							
							if($current_date>$end){
								
								echo'<script>
								
								al.label({
									type : "error",
									message: "Your password has expired. Change password or contact with Administrator"
								});
								
								</script>';

								exit();
								
							} else{
								
								$_SESSION['user_id'] = $user['id'];
								
								if($diff->format('%a')<7){

									$_SESSION['pass_expire_date'] = 'Your password will expire in '.$diff->format('%a').' days, update your password!';

								}
								
								echo "<script>window.location.replace('App/');</script>";

								exit();
							
							}
						
						} else {
							
							if(isset($_COOKIE['login_attempt'])){

								$cookie = $_COOKIE['login_attempt']+1;
								setcookie('login_attempt', $cookie, time()+60*5);
								echo'<script>
								
								al.label({
									type : "error",
									message: "Email or password is incorrect"
								});
								
								</script>';

								exit();

							}else{
								setcookie('login_attempt', 1, time()+60*5);
								echo'<script>
								
								al.label({
									type : "error",
									message: "Email or password is incorrect"
								});
								
								</script>';
								exit();
							}
						}
						
					}else{

						if(isset($_COOKIE['login_attempt'])){

							$cookie = $_COOKIE['login_attempt']+1;
							setcookie('login_attempt', $cookie, time()+60*5);
							echo'<script>
								
								al.label({
									type : "error",
									message: "Email or password is incorrect"
								});
								
								</script>';

							exit();

						}else{

							setcookie('login_attempt', 1, time()+60*5);
							echo'<script>
								
							al.label({
								type : "error",
								message: "Email or password is incorrect"
							});
							
							</script>';

							exit();

						}

					}
					
				}	
				
			} else{
				echo "<script>window.location.replace('App/');</script>";
			}
		}else{

			echo'<script>
								
					al.label({
						type : "error",
						message: "You had '.$_COOKIE['login_attempt'].' login attempts, wait 5 mins and try again"
					});
								
					</script>';

			

			exit();

		}		
		
	}
	
};








