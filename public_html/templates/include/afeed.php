<section id="project_details" class="p-t-100 p-b-100">
<div class = "container">
    <div class="row p-b-30">
            <div class="col-md-9">
                <div class="heading">
                    <header><h2>Лог событий</h2></header><br>
                </div>
            </div>
        </div>               
       <div class="row">
           <div class="col-md-9 col-sm-9 col-xs-12 m-b-40">
                <div class="details_text_article">
<?php

 $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
$conn->query( "SET CHARSET utf8" );
    $tableName= "update_text";
    $targetpage =  "index.php";
    $limit = 6; 
    
    
    $result = $conn->prepare("SELECT COUNT(*) as num FROM $tableName ");
    $result->execute();

     $total_pages = $result->fetch(PDO::FETCH_ASSOC);
     $total_pages = $total_pages[num];

    $stages = 2;
       $page = mysql_escape_string($_GET['page']);
        
    
    if($page){
        $start = ($page - 1) * $limit;
    }else{
        $start = 0;
        }   


    $result1 = $conn->prepare("SELECT * FROM $tableName ORDER BY `id` DESC LIMIT $start, $limit");
    $res1 = $result1->fetch();

    if ($page == 0){$page = 1;}
    $prev = $page - 1;
    $next = $page + 1;
    $lastpage = ceil($total_pages/$limit);
    $LastPagem1 = $lastpage - 1;                    

    $paginate = '';
    if($lastpage  > 1)
    {   

        $paginate .=  " <div class='paginate' > ";
        if ($page  > 1){
            $paginate.=  " <a href='page$prev' >назад </a > ";
        }else{
            $paginate.=  " <span class='disabled' >назад </span > "; }

        if ($lastpage  < 7 + ($stages * 2))   
        {
            for ($counter = 1; $counter  <= $lastpage; $counter++)
            {
                if ($counter == $page){
                    $paginate.=  " <span class='current' >$counter </span > ";
                }else{
                    $paginate.=  " <a href='page$counter' >$counter </a > ";}
            }
        }
        elseif($lastpage  > 5 + ($stages * 2))    
        {
            if($page  < 1 + ($stages * 2))
            {
                for ($counter = 1; $counter  < 4 + ($stages * 2); $counter++)
                {
                    if ($counter == $page){
                        $paginate.=  " <span class='current' >$counter </span > ";
                    }else{
                        $paginate.=  " <a href='page$counter' >$counter </a > ";}
                }
                $paginate.=  "... ";
                $paginate.=  " <a href='page$LastPagem1' >$LastPagem1 </a > ";
                $paginate.=  " <a href='page$lastpage' >$lastpage </a > ";
            }
            elseif($lastpage - ($stages * 2)  > $page  && $page  > ($stages * 2))
            {
                $paginate.=  " <a href='page1' >1 </a > ";
                $paginate.=  " <a href='page2' >2 </a > ";
                $paginate.=  "... ";
                for ($counter = $page - $stages; $counter  <= $page + $stages; $counter++)
                {
                    if ($counter == $page){
                        $paginate.=  " <span class='current' >$counter </span > ";
                    }else{
                        $paginate.=  " <a href='page$counter' >$counter </a > ";}
                }
                $paginate.=  "... ";
                $paginate.=  " <a href='page$LastPagem1' >$LastPagem1 </a > ";
                $paginate.=  " <a href='$targetpage?page=$lastpage' >$lastpage </a > ";
            }
            else
            {
                $paginate.=  " <a href='page1' >1 </a > ";
                $paginate.=  " <a href='page2' >2 </a > ";
                $paginate.=  "... ";
                for ($counter = $lastpage - (2 + ($stages * 2)); $counter  <= $lastpage; $counter++)
                {
                    if ($counter == $page){
                        $paginate.=  " <span class='current' >$counter </span > ";
                    }else{
                        $paginate.=  " <a href='page$counter' >$counter </a > ";}
                }
            }
        }

        if ($page  < $counter - 1){
            $paginate.=  " <a href='page$next' >еще </a > ";
        }else{
            $paginate.=  " <span class='disabled' >еще </span > ";
            }

        $paginate.=  " </div > ";       

}
// echo ' Всего событий: ' .$total_pages;


$result1->execute();
while ($res1 = $result1->fetch(PDO::FETCH_ASSOC))

 echo'</br> </br> <span style="color: green; font-size: 16.8px;" >',$res1['data_today'], '</span>',  '<span style="color: red; font-size: 14.8px;" >', $res1['fio_work'], '</span>',  'пришел в ', '<span style="color: red; font-size: 14.8px;" >', $res1['public'] ,'</span>', 'ушел в', '<span style="color: red; font-size: 14.8px;" >', $res1['went_work'] ,'</span>';


/**
 $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
$conn->query( "SET CHARSET utf8" );
$result = $conn->prepare("SELECT `id`, `text_new`, `public`  FROM update_text order BY id DESC");
$result->execute();

while ($res = $result->fetch(PDO::FETCH_ASSOC))


 echo $res['text_new'] , '</br> </br> <span style="color: #9c9c9c; font-size: 10px;" > Опубликовано: ', $res ['public'], '</span>';

**/
?>

</br>

<?php echo $paginate; ?>

</div>
            </div>

     </div>

</div>

</section>
</br>

