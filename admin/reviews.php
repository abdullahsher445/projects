<?php
require_once __DIR__ . '/includes/auth.php';
require_admin();
$error='';
if(isset($_GET['delete'])){
    $pdo->prepare('DELETE FROM reviews WHERE id=?')->execute([(int)$_GET['delete']]);
    header('Location: /admin/reviews.php');exit;
}
if($_SERVER['REQUEST_METHOD']==='POST'){
    try{
        $id=(int)($_POST['id']??0);
        $name=trim($_POST['customer_name']??'');
        $text=trim($_POST['review_text']??'');
        $rating=max(1,min(5,(int)($_POST['rating']??5)));
        $active=isset($_POST['is_active'])?1:0;
        if($name===''||$text==='') throw new RuntimeException('Name and review are required.');
        if($id>0){
            $pdo->prepare('UPDATE reviews SET customer_name=?, review_text=?, rating=?, is_active=? WHERE id=?')->execute([$name,$text,$rating,$active,$id]);
        }else{
            $pdo->prepare('INSERT INTO reviews (customer_name, review_text, rating, is_active) VALUES (?,?,?,?)')->execute([$name,$text,$rating,$active]);
        }
        header('Location: /admin/reviews.php');exit;
    } catch(Throwable $t){$error=$t->getMessage();}
}
$edit=null;if(isset($_GET['edit'])){$st=$pdo->prepare('SELECT * FROM reviews WHERE id=?');$st->execute([(int)$_GET['edit']]);$edit=$st->fetch();}
$reviews=$pdo->query('SELECT * FROM reviews ORDER BY id DESC')->fetchAll();
$pageHeading='Manage Reviews';
?>
<!doctype html><html><head><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1"><link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"><link href="/assets/css/style.css" rel="stylesheet"></head><body class="admin-bg"><div class="container-fluid"><div class="row"><div class="col-md-2 p-0"><?php include __DIR__.'/includes/sidebar.php'; ?></div><div class="col-md-10 p-4"><?php include __DIR__.'/includes/topbar.php'; ?>
<?php if($error):?><div class="alert alert-danger"><?=e($error)?></div><?php endif;?>
<form method="post" class="premium-card p-4 mb-4">
<input type="hidden" name="id" value="<?= (int)($edit['id']??0) ?>">
<div class="row g-3">
<div class="col-md-3"><input class="form-control" name="customer_name" placeholder="Customer Name" value="<?=e($edit['customer_name']??'')?>" required></div>
<div class="col-md-5"><input class="form-control" name="review_text" placeholder="Review" value="<?=e($edit['review_text']??'')?>" required></div>
<div class="col-md-2"><select class="form-select" name="rating"><?php for($i=1;$i<=5;$i++):?><option value="<?=$i?>" <?=((int)($edit['rating']??5)===$i)?'selected':''?>><?=$i?> Star</option><?php endfor;?></select></div>
<div class="col-md-1"><input type="checkbox" class="form-check-input mt-2" name="is_active" <?= !isset($edit['is_active']) || $edit['is_active'] ? 'checked':'' ?>></div>
<div class="col-md-1"><button class="btn btn-accent w-100">Save</button></div>
</div></form>
<table class="table table-striped bg-white"><tr><th>Name</th><th>Review</th><th>Rating</th><th>Status</th><th>Actions</th></tr>
<?php foreach($reviews as $r):?><tr><td><?=e($r['customer_name'])?></td><td><?=e($r['review_text'])?></td><td><?= (int)$r['rating'] ?></td><td><?= $r['is_active']?'Active':'Hidden' ?></td><td><a class="btn btn-sm btn-dark" href="?edit=<?=(int)$r['id']?>">Edit</a> <a class="btn btn-sm btn-danger" href="?delete=<?=(int)$r['id']?>" onclick="return confirm('Delete review?')">Delete</a></td></tr><?php endforeach;?>
</table></div></div></div></body></html>
