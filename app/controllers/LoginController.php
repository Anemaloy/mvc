<?

include 'app/models/Tasks.php';

class LoginController extends Controller
{

    function __construct()
	{
		$this->model = new Login();
		$this->view = new View();
    }
    
    
	function index()
	{	
		$this->view->generate('login.php', 'template.php', $data);
    }
    
    function cabinet()
	{	
        if(isset($_POST['name']) && isset($_POST['pass']))
            {
                $data = $this->model->authorization($_POST['name'], $_POST['pass']);
            }
      
            if ($data == 1) {
                $this->model = new Tasks();
                $data = $this->model->get_data();
                $_SESSION['admin'] = 1;
                $this->view->generate('cabinet.php', 'template.php', $data);
            } else {
                $this->view->generate('login.php', 'template.php', $data);
            }
    }
    
    function change() 
    {
        if(isset($_POST['id']) && $_POST['session'] == 1)
            {
                $this->model = new Tasks();
                $data = $this->model->store($_POST['id'], $_POST['content'], $_POST['complete']);
                $data = $this->model->get_data();
                $_SESSION['admin'] = 1;
                $this->view->generate('cabinet.php', 'template.php', $data);
            } else {
                $this->model = new Tasks();
                $this->view->generate('tasks.php', 'template.php', $data);
            }
    }
}

?>