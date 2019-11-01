<?

class TasksController extends Controller
{

    function __construct()
	{
		$this->model = new Tasks();
		$this->view = new View();
    }
    
    
	function index()
	{	
        $sorting = $_POST['sorting'];
        if(isset($sorting)) {
            $data = $this->model->get_data($sorting);
        } else {
            $data = $this->model->get_data();
        }
		$this->view->generate('tasks.php', 'template.php', $data);
    }
    
    function add()
	{	
        if(isset($_POST['email']) && isset($_POST['name']) && isset($_POST['comment']))
            {
                $data = $this->model->add_data($_POST['name'], $_POST['email'], $_POST['comment']);
            }
        $data = $this->model->get_data();
        $this->view->generate('tasks.php', 'template.php', $data);
	}
}

?>