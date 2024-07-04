<?php
    include 'pdo_connect.php';
?>
<?php
    if(isset($_GET['id'])){
        $id=$_GET['id'];
        $sql="DELETE FROM tb_pedido WHERE id = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$id]);
        
        header("Location: tabla_eliminar.php");
    }
?>