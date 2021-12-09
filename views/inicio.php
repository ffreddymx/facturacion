<?php 
    session_start();
    if(isset($_SESSION['usuario'])){
        
 ?>


    <?php require_once "dependencias.php"; ?>

    <div class="container">

    


    
        
    </div>
    </div>
  </div>
</div>

</div>



   <?php require_once 'footer.php'; ?>

</body  >
</html>
<?php 
    }else{
        header("location:../index.php");
    }
 ?>