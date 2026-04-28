<?php
require_once __DIR__ . '/includes/auth.php';
require_admin();
$notice='';
if($_SERVER['REQUEST_METHOD']==='POST'){
    $allowed=['business_name','business_email','business_phone','business_address','smtp_host','smtp_port','smtp_user','smtp_pass'];
    foreach($allowed as $key){
        $value=trim($_POST[$key]??'');
        $stmt=$pdo->prepare('INSERT INTO settings (setting_key,setting_value) VALUES (?,?) ON DUPLICATE KEY UPDATE setting_value=VALUES(setting_value)');
        $stmt->execute([$key,$value]);
    }
    $notice='Settings updated.';
}
$pageHeading='Website Settings';
?>
<!doctype html><html><head><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1"><link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"><link href="/assets/css/style.css" rel="stylesheet"></head><body class="admin-bg"><div class="container-fluid"><div class="row"><div class="col-md-2 p-0"><?php include __DIR__.'/includes/sidebar.php'; ?></div><div class="col-md-10 p-4"><?php include __DIR__.'/includes/topbar.php'; ?>
<?php if($notice):?><div class="alert alert-success"><?=e($notice)?></div><?php endif;?>
<form method="post" class="premium-card p-4"><div class="row g-3">
<?php
$fields=['business_name'=>'Business Name','business_email'=>'Email','business_phone'=>'Phone','business_address'=>'Address','smtp_host'=>'SMTP Host','smtp_port'=>'SMTP Port','smtp_user'=>'SMTP User','smtp_pass'=>'SMTP Password'];
foreach($fields as $k=>$label): ?>
<div class="col-md-6"><label class="form-label"><?=e($label)?></label><input class="form-control" name="<?=$k?>" value="<?=e(setting($k))?>"></div>
<?php endforeach; ?>
</div><button class="btn btn-accent mt-3">Save Settings</button></form>
</div></div></div></body></html>
