<?php
if(isset($_POST['page'])){
    //Include pagination class file
    include('Pagination.php');
    
    //Include database configuration file
    include('../bd.php');
    
    
    $start = !empty($_POST['page'])?$_POST['page']:0;
    $limit = 12;
    
    //set conditions for search
    $whereSQL = $orderSQL = '';
    $keywords = $_POST['keywords'];
    $sortBy = $_POST['sortBy'];
    if(!empty($keywords)){
        $whereSQL = "WHERE titre LIKE '%".$keywords."%' OR contenu LIKE '%".$keywords."%'";
        
    } 
    if(!empty($sortBy) && $sortBy != "tous"){
        $orderSQL = "WHERE type = '".$sortBy."'";
    }
    

    //get number of rows
    $queryNum = $db->query("SELECT COUNT(*) as postNum FROM actu ".$whereSQL.$orderSQL." ORDER BY id DESC");
    $resultNum = $queryNum->fetch_assoc();
    $rowCount = $resultNum['postNum'];

    //initialize pagination class
    $pagConfig = array(
        'currentPage' => $start,
        'totalRows' => $rowCount,
        'perPage' => $limit,
        'link_func' => 'searchFilter'
    );
    $pagination =  new Pagination($pagConfig);
    
    echo $pagination->createLinks();
    
    
    //get rows
    $query = $db->query("SELECT * FROM actu $whereSQL $orderSQL LIMIT $start,$limit");
    
    if($query->num_rows > 0){ ?>
        <div class="posts_list">
        <?php
        $num ='';
            while($row = $query->fetch_assoc()){ 
                $postID = $row['id'];
                $num++;

include '../scripts/contenuactu.php';
       
        } ?>
        </div>
<?php } } ?>