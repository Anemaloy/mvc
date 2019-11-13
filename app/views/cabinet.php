<div class="table__wrap wrap">
  <table class="table">
    <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">
            Пользователь
          </th>
          <th scope="col">
            email
          </th>
          <th scope="col">
            Текст задачи
          </th>
          <th scope="col">
            Статус
          </th>
          <th scope="col">выполнено</th>
          <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        <?php
          foreach ($data['result'] as $key => $value) {
            echo "<tr>
                    <td>{$value['id']}</td>
                    <td>{$value['user_name']}</td>
                    <td>{$value['email']}</td>
                    <form method=\"post\" action=\"/Login/change\">
                    <td> 
                      <input type=\"text\" name=\"content\" value=\"{$value['content']}\"></td>
                    <td>$value['moderation']</td>
                    <td>
                      <input type=\"checkbox\" name=\"complete\">
                      <input type=\"hidden\" value=\"$value['id']\" name=\"id\">
                      <input type=\"hidden\" value=\"$_SESSION['admin']\" name=\"session\">
                    </td>
                    <td>
                      <input type=\"submit\" class=\"non__css\">
                      </form>
                    </td>
                  </tr>";
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
</div>

