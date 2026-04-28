<?php
$pageTitle = 'Contact Us';
require_once __DIR__ . '/config/db.php';

$errors = [];
$success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $phone = trim($_POST['phone'] ?? '');
    $serviceType = trim($_POST['service_type'] ?? '');
    $message = trim($_POST['message'] ?? '');

    if ($name === '' || strlen($name) < 2) $errors[] = 'Please provide a valid name.';
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = 'Please provide a valid email.';
    if (!preg_match('/^[0-9+\-()\s]{8,20}$/', $phone)) $errors[] = 'Please provide a valid phone number.';
    if ($serviceType === '') $errors[] = 'Please choose a service type.';
    if ($message === '' || strlen($message) < 10) $errors[] = 'Message must be at least 10 characters.';

    if (!$errors) {
        $stmt = $pdo->prepare('INSERT INTO contact_messages (name, email, phone, service_type, message) VALUES (?, ?, ?, ?, ?)');
        $stmt->execute([$name, $email, $phone, $serviceType, $message]);

        $mailSent = false;
        if (file_exists(__DIR__ . '/vendor/autoload.php')) {
            require_once __DIR__ . '/vendor/autoload.php';
            try {
                $mail = new PHPMailer\PHPMailer\PHPMailer(true);
                $mail->isSMTP();
                $mail->Host = setting('smtp_host', '');
                $mail->SMTPAuth = true;
                $mail->Username = setting('smtp_user', '');
                $mail->Password = setting('smtp_pass', '');
                $mail->SMTPSecure = PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_STARTTLS;
                $mail->Port = (int) setting('smtp_port', '587');
                $mail->setFrom(setting('business_email', 'noreply@example.com'), setting('business_name', 'Handyman'));
                $mail->addAddress(setting('business_email', 'owner@example.com'));
                $mail->Subject = 'New Website Enquiry';
                $mail->Body = "Name: {$name}\nEmail: {$email}\nPhone: {$phone}\nService: {$serviceType}\n\nMessage:\n{$message}";
                $mail->send();
                $mailSent = true;
            } catch (Exception $e) {
                $mailSent = false;
            }
        }

        $success = $mailSent
            ? 'Thank you! Your message has been sent successfully.'
            : 'Thank you! Your message was saved. Email notification is not configured yet.';
    }
}

$services = $pdo->query('SELECT title FROM services ORDER BY title ASC')->fetchAll();
include __DIR__ . '/includes/header.php';
?>
<section class="py-5">
    <div class="container reveal">
        <h1 class="section-title">Contact Our Team</h1>
        <?php if ($errors): ?><div class="alert alert-danger"><?php foreach ($errors as $error): ?><div><?= e($error) ?></div><?php endforeach; ?></div><?php endif; ?>
        <?php if ($success): ?><div class="alert alert-success"><?= e($success) ?></div><?php endif; ?>
        <form method="post" class="premium-card p-4">
            <div class="row g-3">
                <div class="col-md-6"><label class="form-label">Name</label><input type="text" name="name" class="form-control" required></div>
                <div class="col-md-6"><label class="form-label">Email</label><input type="email" name="email" class="form-control" required></div>
                <div class="col-md-6"><label class="form-label">Phone</label><input type="text" name="phone" class="form-control" required></div>
                <div class="col-md-6">
                    <label class="form-label">Service Type</label>
                    <select name="service_type" class="form-select" required>
                        <option value="">Select Service</option>
                        <?php foreach ($services as $service): ?><option value="<?= e($service['title']) ?>"><?= e($service['title']) ?></option><?php endforeach; ?>
                    </select>
                </div>
                <div class="col-12"><label class="form-label">Message</label><textarea name="message" class="form-control" rows="6" required></textarea></div>
                <div class="col-12"><button class="btn btn-accent">Send Message</button></div>
            </div>
        </form>
    </div>
</section>
<?php include __DIR__ . '/includes/footer.php'; ?>
