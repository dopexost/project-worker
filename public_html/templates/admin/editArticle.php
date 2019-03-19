<?php include "templates/include/aheader.php" ?>
      <div id="adminHeader">
       <center> <h1>Добавление/редактирование сотрудника</h1> </center>
        <p>Вы вошли как <b><?php echo htmlspecialchars( $_SESSION['username']) ?></b>. <a href="admin.php?action=logout"?>Выйти</a></p>
      </div>
 
   <!--   <h1><?php echo $results['pageTitle']?></h1> -->
      <div class="call_box">
                    
    
 
      <form action="admin.php?action=<?php echo $results['formAction']?>" method="post">
        <input type="hidden" name="articleId" value="<?php echo $results['article']->id ?>"/>
 
<?php if ( isset( $results['errorMessage'] ) ) { ?>
        <div class="errorMessage"><?php echo $results['errorMessage'] ?></div>
<?php } ?>
 
       
     <div class="col-md-12">
         
            <label for="title">ФИО сотрудника: </label>
            <input type="text" name="title" id="title" placeholder="Name of the article" required autofocus maxlength="255" style="width: 50em; color: #000;" value="<?php echo htmlspecialchars( $results['article']->title )?>"/> <br>
        
      </div>
     <div class="col-md-12">
    
            <label for="summary">Должность: </label>
            <textarea name="summary" id="summary" placeholder="Должность сотрудника" required maxlength="1000" style="color: #000;" ><?php echo htmlspecialchars( $results['article']->summary )?></textarea><br><br>
    
       </div>
  <div class="col-md-12">
         
            <label for="content">Личное дело: </label>
            <textarea name="content" id="content" placeholder="Подробная характеристика сотрудника" required maxlength="100000" style="height: 30em; width: 84em; color: #000;"><?php echo htmlspecialchars( $results['article']->content )?></textarea><br><br>
         
  </div>
  
  
  
  <div class="col-md-12">
         
            <label for="mails">Email сотрудника: </label>
            <textarea name="mails" id="mails" placeholder="Почтовый ящик сотрудника" required maxlength="100000" style="height: 4em; width: 24em; color: #000;"><?php echo htmlspecialchars( $results['article']->mails )?></textarea><br><br>
         
  </div>
  
  
    <div class="col-md-12">
         
            <label for="start_work">Начало рабочего дня сотрудника: </label>
            <textarea name="start_work" id="start_work" placeholder="Начало рабочего дня сотрудника" required maxlength="100000" style="height: 4em; width: 24em; color: #000;"><?php echo htmlspecialchars( $results['article']->start_work )?></textarea><br><br>
         
  </div>
  
  
      <div class="col-md-12">
         
            <label for="end_work">Конец рабочего дня сотрудника: </label>
            <textarea name="end_work" id="end_work" placeholder="Конец рабочего дня сотрудника" required maxlength="100000" style="height: 4em; width: 24em; color: #000;"><?php echo htmlspecialchars( $results['article']->end_work )?></textarea><br><br>
         
  </div>
  
  
  <div class="col-md-12">
         
            <label for="publicationDate">Дата редактирования анкеты сотрудника : </label>
            <input type="text" name="publicationDate" id="publicationDate" placeholder="YYYY-MM-DD" required maxlength="10" value="<?php echo $results['article']->publicationDate ? date( "Y-m-d", $results['article']->publicationDate ) : "" ?>" /><br><br>
         
  </div>
       
    </div>
         
          <input type="submit" class="btn-light" name="saveChanges" value="Сохранить" />
          <input type="submit"  class="btn-light" formnovalidate name="cancel" value="Отменить" />
    
      </form>
  
  <?php if ( $results['article']->id ) { ?>
      <p><a href="admin.php?action=deleteArticle&amp;articleId=<?php echo $results['article']->id ?>" onclick="return confirm('Удалить дело сотрудника ?')">Удалить личное дело сотрудника</a></p>
<?php } ?>

<?php include "templates/include/footer.php" ?>
