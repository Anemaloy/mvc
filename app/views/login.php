<div class="table__wrap wrap">
  <?php 
    if (isset($data)) {
      echo 'неверные данные';
    } 
  ?>
  <form method="post" action="/Login/cabinet">
    <div class="form-group">
      <label for="exampleInput">Логин</label>
      <input type="text" class="form-control" name="name" id="exampleInput" placeholder="ИМЯ">
    </div>
    <div class="form-group">
      <label for="exampleInput">Пароль</label>
      <input type="password" class="form-control" name="pass" id="exampleInput" placeholder="Коммент">
    </div>
    <button type="submit" class="btn btn-primary">Войти</button>
  </form>
</div>
