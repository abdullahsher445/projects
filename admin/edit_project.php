<?php
require_once __DIR__ . '/includes/auth.php';
require_admin();
$id=(int)($_GET['id']??0);
$stmt=$pdo->prepare('SELECT * FROM projects WHERE id=?');$stmt->execute([$id]);$project=$stmt->fetch();
if(!$project){die('Project not found');}
$error='';
if($_SERVER['REQUEST_METHOD']==='POST'){
    try{
        $title=trim($_POST['title']??'');
        $description=trim($_POST['description']??'');
        $category=trim($_POST['category']??'');
        $image=$project['image_path'];$before=$project['before_image'];$after=$project['after_image'];
        if(!empty($_FILES['image']['name']))$image=uploadImage($_FILES['image'],'projects');
        if(!empty($_FILES['before_image']['name']))$before=uploadImage($_FILES['before_image'],'projects');
        if(!empty($_FILES['after_image']['name']))$after=uploadImage($_FILES['after_image'],'projects');
        $pdo->prepare('UPDATE projects SET title=?,description=?,category=?,image_path=?,before_image=?,after_image=? WHERE id=?')
            ->execute([$title,$description,$category,$image,$before,$after,$id]);
        header('Location: /admin/projects.php');exit;
    }catch(Throwable $t){$error=$t->getMessage();}
}
$pageHeading='Edit Project';
?>
<!doctype html><html><head><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1"><link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"><link href="/assets/css/style.css" rel="stylesheet"></head><body class="admin-bg"><div class="container-fluid"><div class="row"><div class="col-md-2 p-0"><?php include __DIR__ . '/includes/sidebar.php'; ?></div><div class="col-md-10 p-4"><?php include __DIR__ . '/includes/topbar.php'; ?>
<?php if($error):?><div class="alert alert-danger"><?=e($error)?></div><?php endif;?>
<form method="post" enctype="multipart/form-data" class="premium-card p-4">
<div class="mb-3"><label>Title</label><input class="form-control" name="title" value="<?=e($project['title'])?>" required></div>
<div class="mb-3"><label>Description</label><textarea class="form-control" name="description" required><?=e($project['description'])?></textarea></div>
<div class="mb-3"><label>Category</label><input class="form-control" name="category" value="<?=e($project['category'])?>" required></div>
<div class="mb-3"><label>Main Image</label><input type="file" class="form-control" name="image" accept="image/*"></div>
<div class="mb-3"><label>Before Image</label><input type="file" class="form-control" name="before_image" accept="image/*"></div>
<div class="mb-3"><label>After Image</label><input type="file" class="form-control" name="after_image" accept="image/*"></div>
<button class="btn btn-accent">Update</button></form>
</div></div></div></body></html>
