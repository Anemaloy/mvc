
<div class="table__wrap wrap">

        <table class="table">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">
                    <form method="post" action="/tasks">
                        <input type="hidden" name="sorting" value="user_name">
                        <input type="submit" class="non__css" value="Пользователь">
                    </form>
                </th>
                <th scope="col">
                    <form method="post" action="/tasks">
                        <input type="hidden" name="sorting" value="email">
                        <input type="submit" class="non__css" value="email">
                    </form>
                </th>
                <th scope="col">
                    <form method="post" action="/tasks">
                        <input type="hidden" name="sorting" value="content">
                        <input type="submit" class="non__css" value="Текст задачи">
                    </form>
                </th>
                <th scope="col">
                    <form method="post" action="/tasks">
                        <input type="hidden" name="sorting" value="moderation">
                        <input type="submit" class="non__css" value="Статус">
                    </form>
                </th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($data['result'] as $key => $value) {
                        if ($value['moderation'] == 1)
                        {
                            $moderation = 'отредактировано администратором';
                        } else {
                            $moderation = 'на проверке';
                        }
                        echo '<tr><td>'.$value['id'] .'</td>
                        <td>'.$value['user_name'].'</td>
                        <td>'.$value['email'].'</td>
                        <td>'.$value['content'].'</td>
                        <td>'. $moderation . '</td></tr>';
                }
                ?>
            </tbody>
        </table>

        <ul style="display:flex; list-style:none;">
            <?php
                for ($i=1;  $i <= $data['pages']; $i++) {
                    echo "<li><a href=\"?page=$i\">$i</a></li>";
                }
            ?>
        </ul>     

    <form method="post" action="/tasks/add">
  <div class="form-group">
    <label for="exampleInputEmail1">Email</label>
    <input type="email" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp" placeholder="Email">
  </div>
  <div class="form-group">
    <label for="exampleInput">Имя</label>
    <input type="text" class="form-control" name="name" id="exampleInput" placeholder="ИМЯ">
  </div>
  <div class="form-group">
    <label for="exampleInput">Текст задачи</label>
    <input type="text" class="form-control" name="comment" id="exampleInput" placeholder="Коммент">
  </div>
  <button type="submit" class="btn btn-primary">Добавить</button>
</form>
</div>
