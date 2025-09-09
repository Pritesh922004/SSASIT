<?php
require 'Services/Verify-User.php';
require 'Querys/ViewAll-Query.php';
// echo 'this view page';

$view_type = isset($_GET['type']) ? $_GET['type'] : '';

$data = viewAll($conn, $view_type);
$user = [];

while ($result = $data->fetch_assoc()) {
    $user[] = $result;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View All <?php echo $view_type; ?> - SSASIT Admin</title>
    <?php require 'config/Icon-Config.php'; ?>
    <link rel="stylesheet" href="index.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="Css/View.css?v=<?php echo time(); ?>">
</head>

<style>
    body {
        font-family: var(--primary-font);
        background: var(--bg-gradient);
        min-height: 100vh;
        /* padding: 2rem; */
    }

    /* Card Container */
    .card-container {
        max-width: 1200px;
        margin: 2rem auto;
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(400px, 1fr));
        gap: 1.5rem;
    }
</style>

<body>
    <?php require 'Components/Header.php'; ?>

    <div class="card-container">
        <?php foreach ($user as $key => $value) { ?>
        <?php require 'Components/View_Card.php'; ?>
        <?php } ?>
    </div>


    <script>
        // Three dot menu handlers
        document.querySelectorAll('.menu-btn').forEach(btn => {
            btn.addEventListener('click', function (e) {
                e.preventDefault();
                e.stopPropagation();

                const dropdown = this.nextElementSibling;
                const isOpen = dropdown.classList.contains('show');

                // Close all other dropdowns and remove menu-open class
                document.querySelectorAll('.dropdown-menu').forEach(menu => {
                    menu.classList.remove('show');
                });
                document.querySelectorAll('.user-card').forEach(card => {
                    card.classList.remove('menu-open');
                });

                // Toggle current dropdown
                if (!isOpen) {
                    dropdown.classList.add('show');
                    this.closest('.user-card').classList.add('menu-open');
                }

                // Button click animation
                this.style.transform = 'scale(0.9)';
                setTimeout(() => {
                    this.style.transform = '';
                }, 150);
            });
        });

        // Dropdown item handlers
        document.querySelectorAll('.dropdown-item').forEach(item => {
            item.addEventListener('click', function (e) {
                e.preventDefault();
                e.stopPropagation();

                const card = this.closest('.user-card');
                const userName = card.querySelector('.user-name').textContent;
                const enrollmentId = card.querySelector('.enrollment-number').textContent;

                // Determine action type
                let action = '';
                if (this.classList.contains('view-item')) {
                    action = 'View';
                } else if (this.classList.contains('edit-item')) {
                    action = 'Edit';
                } else if (this.classList.contains('delete-item')) {
                    action = 'Delete';
                    if (!confirm(`Are you sure you want to delete ${userName}?`)) {
                        return;
                    }
                }

                // Close dropdown
                this.closest('.dropdown-menu').classList.remove('show');
                this.closest('.user-card').classList.remove('menu-open');

                console.log(`${action} action for: ${userName} (${enrollmentId})`);
                alert(`${action} ${userName}\nID: ${enrollmentId}`);
            });
        });

        // Close dropdowns when clicking outside
        document.addEventListener('click', function (e) {
            if (!e.target.closest('.action-menu')) {
                document.querySelectorAll('.dropdown-menu').forEach(menu => {
                    menu.classList.remove('show');
                });
                document.querySelectorAll('.user-card').forEach(card => {
                    card.classList.remove('menu-open');
                });
            }
        });
    </script>
</body>

</html>