<?php include "templates/include/header.php" ?>
  <h2>Вход в панель управления сотрудниками</h2> 
  <div class="call_box">
      <form action="admin.php?action=login" method="post" style="width: 50%;">
        <input type="hidden" name="login" value="true" />
 
<?php if ( isset( $results['errorMessage'] ) ) { ?>
        <div class="errorMessage"><?php echo $results['errorMessage'] ?></div>
<?php } ?>
 
       
          <div class="col-md-12">
            <label for="username">Логин</label>
            <input type="text" name="username" id="username" placeholder="Имя пользователя" required autofocus maxlength="20" />
          </div>
          
          <div class="col-md-12">
            <label for="password">Пароль</label>
            <input type="password" name="password" id="password" placeholder="Пароль пользователя" required maxlength="20" />
         </div>
         
 <div class="col-md-6">
          <input type="submit" class="btn-light" name="login" value="Войти"/>
 </div>

      </form>
   </div>
   
<p></p>
   
<?php include "templates/include/footer.php" ?>
