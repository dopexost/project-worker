 <script src="https://yandex.st/jquery/1.8.3/jquery.min.js"></script>

 
 <?php include "templates/include/aheader.php" ?>
      <div id="adminHeader">
        <h2>Панель управления сотрудниками</h2>
        <p>Вы вошли как <b><?php echo htmlspecialchars( $_SESSION['username']) ?></b>. <a href="admin.php?action=logout"?>Выйти из ПУ</a></p>
      </div>
 
      <h1>Все сотрудники</h1>
 
<?php if ( isset( $results['errorMessage'] ) ) { ?>
        <div class="errorMessage"><?php echo $results['errorMessage'] ?></div>
<?php } ?>
 
 
<?php if ( isset( $results['statusMessage'] ) ) { ?>
        <div class="statusMessage"><?php echo $results['statusMessage'] ?></div>
<?php } ?>
 
      <table>
        <tr>
          <th>Дата трудоустройства</th>
          <th>ФИО сотрудника</th>
        </tr>
 
<?php foreach ( $results['articles'] as $article ) { ?>
 
        <tr onclick="location='admin.php?action=editArticle&amp;articleId=<?php echo $article->id?>'">
          <td><?php echo date('j M Y', $article->publicationDate)?></td>
          <td>
            <?php echo $article->title?>
          </td>
        </tr>
 
<?php } ?>
 
      </table>
     
      <p><?php echo $results['totalRows']?> сотрудник<?php echo ( $results['totalRows'] != 1 ) ? 'ов' : '' ?> всего.</p>
 
      <p><a href="admin.php?action=newArticle">Добавить нового сотрудника</a></p>
      
                 <h1>Добавление и редактирование событий сотрудников </h1>
      <!-- news -->
      
            <table>
        <tr>

        </tr>
 <form class="login-form" id= "contactform" name="form" action=" " method="post">
     
     
 
 <!-- ajax -->
<script type="text/javascript">
$(document).ready(function() {
    $("#contactform").submit(function() {
        $.ajax({
            type: "POST",
            url: '/ajax/insert_ivent.php',
            data:$("#contactform").serialize(),
            success: function (data) {
                // Inserting html into the result div on success
               // $('#result_form').html(data);
            //document.getElementById('contactform').reset();
           $('.result_form').html('событие добавлено'); 
           document.location.reload();
          /*  yaCounter23976193.reachGoal('order_call'); */ // metrick
            //$('.popup, .overlay').css({'opacity':'0','visibility':'hidden'});
            },
            error: function(jqXHR, text, error){
            // Displaying if there are any errors
                $('#result_form').html(error);
        }
    });
        return false;
    });
});
</script>
<!-- ajax -->
 
 <!-- новое событие --> 
       </td>
        <table>
          <td>
         <div class ="admin-edit" style="padding-right: 100px;padding-left: 100px; padding-bottom: 3100px; border-right: 3px solid red;">
             <div id="res" style="color: red;"> </div>
         <hr>
       <p><select id="select_fun" onchange=" VerifySelect(); SelectID();" name="Fio" size="1" required>
           <option selected disabled>Укажите сотрудника </option>
     <?php
    $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
    $conn->query( "SET CHARSET utf8" );
    $result = $conn->prepare("SELECT `id`, `title`, `start_work`, `end_work` FROM articles order BY id DESC");
    $result->execute();
    while ($res = $result->fetch(PDO::FETCH_BOTH)) {
    
    
     echo '<option value ="'.$res['title'].'">'.$res['id'].''.$res['title'].'</option>';
    
    
    }
    

    ?>
   </select></p>
   
    <div id="res" style="color: red;"> </div>
   <div class="result_form" style="color: red;"> </div>
     <input id="update1"  type="" name="WinUpdate1" value=""></br>
<!-- ajax -->
<script type="text/javascript">
 $(function(){
        $('#select_fun').change(function(){
            var val = $(this).val(); //значение option
            $.ajax({
                type:'post',
                url:'/ajax/update_fio.php',//обработчик php
                data:'value='+val,//передаем значение option. на сервере будет доступно $_POST['value'}
                success:function(result){// получаем ответ с сервера
                    $('#res').html(result);//выводим на стнанице
                }
                
            })
            console.log($(this).val());
        })
    })
</script>
<!-- ajax -->

<script>
 function SelectID(){
    var sel1 = document.getElementById("select_fun");
    var text1 = sel1.options[sel1.selectedIndex].text;
    var inputLose = document.getElementById('update1');
inputLose.value = text1.replace(/[^\d\.]/g, '');
 }
</script>


<script>

function VerifySelect(){
    var sel1 = document.getElementById("select_fun");
    var text1 = sel1.options[sel1.selectedIndex].text;
  /*  var sel2 = document.getElementById("sel2");
    var text2= sel2.options[sel2.selectedIndex].text; 

 var ScoreWin = document.getElementById("ScoreWin");
 var textWin = ScoreWin.options[ScoreWin.selectedIndex].text;
 var ScoreLose = document.getElementById("ScoreLose");
 var textLose = ScoreLose.options[ScoreLose.selectedIndex].text;

 val1 = Number.parseInt(textWin);
 val2 = Number.parseInt(textLose);


  if (val1 <= val2 || text1 == text2)
 submitButton.disabled  = true;
 else
 submitButton.disabled  = false;
*/
}
</script>




   </br>
   <lable> Пришел </lable>
   <input  class="without_ampm" type = "time" name="time_enter" required>
      </br></br>
        </br>
        
             <lable> Ушел </lable>
   <input  class="without_ampm" type = "time" name="time_exit" required>
      </br></br>
        </br>
      
              <lable> Опоздание </lable>
   <input  class="without_ampm" type = "time" name="time_exit" >
      </br></br>
        </br>
      
      
      <textarea class="input username" style="height: 90px; width: 540px; background-color: #fc525833;  color: #000000; border: none; border-radius: 10px; " title ="Заметка" name="NewType" id ="list" placeholder="Заметка" ></textarea> </br> </br>
      <input name="btnsend11" type="submit" class="btn-light" value="Добавить событие"> 
       </div>
        </td>
    </form>
 <td>
      </hr>
  <!-- новое событие -->     
     
 <div id ="anews" class = "admin-news">
     
 <?php
 
 
$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
$conn->query( "SET CHARSET utf8" );
$result = $conn->prepare("SELECT `id`,`fio_work`,`public`, `text_new`, `went_work`, `data_today` FROM update_text order BY id DESC limit 6");
$result->execute();
while ($res = $result->fetch(PDO::FETCH_BOTH))

{
 echo  '<hr> <form action="admin.php" method="post">';
 echo  'Дата <input type="text" name="work_name" value ="'.$res['data_today'].'" disabled> </br></br>';
 echo  'ФИО <input type="text" name="work_name" value ="'.$res['fio_work'].'" disabled> </br></br>';
 echo  '</br><lable> Пришел </lable><input type="time" name="time_exit" value = "'.$res['public'].'" disabled> </br></br>';
 echo  '</br><lable> Ушел </lable><input type="time" name="time_exit1" value = "'.$res['went_work'].'" required> </br></br>';
 echo  '<textarea class="input username" style="height: 170px; width: 545px; background-color: #fc525833;  color: #000000; border: none; border-radius: 10px;" title ="Добавить новую новость" name="NewType1" id ="list" value = "'.$res['text_new']. '"> '.$res['text_new']. '  </textarea> </br>'  ;
 echo '<input type="hidden" name="id" value='.$res['id'].' > ';
 echo '<input class="btn-light" type="submit" name="submit" value="Обновить информацию"> </br> </br>';
 echo '</form>  </hr>';
}


$statName = $_POST['NewType1'];
$statId = $_POST ['id'];
$time_exit1 =  $_POST ['time_exit1'];

 
if ( isset ( $_POST['submit'] ) ) 
    {
/**        echo '<form action="admin.php" method="post">';
    echo '<input type="text" name="idup" value='.$statId.'>';
    echo '<input type="text" name="textup" value='.$statName.'>';
    }
    echo '<input type="submit" name="news_up" class="btn-light" value="UPDATE">';
     echo '</form>';    
   
    if ( isset ( $_POST['news_up'] ) ) 
    {
    
**/

 
$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
$conn->query( "SET CHARSET utf8" );
$result = $conn->prepare("SELECT `id`,`fio_work`,`public`, `text_new`, `went_work`, `data_today` FROM update_text order BY id DESC");
$result->execute();
while ($res = $result->fetch(PDO::FETCH_BOTH))





    
   $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
$conn->query( "SET CHARSET utf8" );
//$set5 = $conn->quote($statName);
 $sql = "UPDATE update_text SET text_new = '$statName' , went_work = '$time_exit1' WHERE id='$statId' ";
    $st = $conn->prepare( $sql );
  //  $st->bindValue( ":id", $id, PDO::PARAM_INT );
    $st->execute();
    $row = $st->fetch();
    $conn = null;
    echo 'Новость отредактирована и опубликована';
    }
    


 ?>
 </br>
 

 </div>
  </td>
  </table>
<?php include "templates/include/footer.php" ?>
