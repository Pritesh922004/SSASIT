<?php
require 'db/connection.php';
require 'Services/Verify-User.php';
require 'Querys/ViewAll-Query.php';
require 'Querys/Delete_Record_Query.php';

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

    /* No Data Found Styles */
    .no-data-container {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        min-height: 60vh;
        text-align: center;
        padding: 2rem;
        animation: fadeInUp 0.8s ease-out;
    }

    .no-data-icon {
        width: 120px;
        height: 120px;
        background: var(--primary-color);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 2rem;
        box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
        animation: bounce 2s infinite;
        position: relative;
        overflow: hidden;
    }

    .no-data-icon::before {
        content: '';
        position: absolute;
        top: -50%;
        left: -50%;
        width: 200%;
        height: 200%;
        background: linear-gradient(45deg, transparent, rgba(255, 255, 255, 0.1), transparent);
        animation: shimmer 3s infinite;
    }

    .no-data-icon i {
        font-size: 3rem;
        color: var(--secondary-color);
        z-index: 2;
    }

    .no-data-title {
        font-size: 2rem;
        font-weight: 700;
        color: var(--text-color);
        margin-bottom: 1rem;
        animation: slideInLeft 0.8s ease-out 0.2s both;
    }

    .no-data-message {
        font-size: 1.1rem;
        color: #666;
        margin-bottom: 2.5rem;
        max-width: 500px;
        line-height: 1.6;
        animation: slideInRight 0.8s ease-out 0.4s both;
    }

    .no-data-actions {
        display: flex;
        gap: 1rem;
        flex-wrap: wrap;
        justify-content: center;
        animation: slideInUp 0.8s ease-out 0.6s both;
    }

    .action-button {
        background: var(--button-gradient);
        color: var(--white);
        border: none;
        border-radius: 12px;
        padding: 1rem 2rem;
        font-size: 1rem;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        box-shadow: 0 4px 15px rgba(3, 108, 226, 0.3);
        position: relative;
        overflow: hidden;
    }

    .action-button::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
        transition: left 0.5s;
    }

    .action-button:hover::before {
        left: 100%;
    }

    .action-button:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 25px rgba(3, 108, 226, 0.4);
    }

    .action-button.secondary {
        background: var(--white);
        color: var(--secondary-color);
        border: 2px solid var(--secondary-color);
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    }

    .action-button.secondary:hover {
        background: var(--secondary-color);
        color: var(--white);
        box-shadow: 0 8px 25px rgba(3, 108, 226, 0.3);
    }

    /* Animations */
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes bounce {
        0%, 20%, 50%, 80%, 100% {
            transform: translateY(0);
        }
        40% {
            transform: translateY(-10px);
        }
        60% {
            transform: translateY(-5px);
        }
    }

    @keyframes shimmer {
        0% {
            transform: rotate(0deg);
        }
        100% {
            transform: rotate(360deg);
        }
    }

    @keyframes slideInLeft {
        from {
            opacity: 0;
            transform: translateX(-30px);
        }
        to {
            opacity: 1;
            transform: translateX(0);
        }
    }

    @keyframes slideInRight {
        from {
            opacity: 0;
            transform: translateX(30px);
        }
        to {
            opacity: 1;
            transform: translateX(0);
        }
    }

    @keyframes slideInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Responsive Design for No Data */
    @media (max-width: 768px) {
        .no-data-container {
            padding: 1.5rem;
            min-height: 50vh;
        }

        .no-data-icon {
            width: 100px;
            height: 100px;
            margin-bottom: 1.5rem;
        }

        .no-data-icon i {
            font-size: 2.5rem;
        }

        .no-data-title {
            font-size: 1.75rem;
            margin-bottom: 0.75rem;
        }

        .no-data-message {
            font-size: 1rem;
            margin-bottom: 2rem;
        }

        .no-data-actions {
            flex-direction: column;
            width: 100%;
            max-width: 300px;
        }

        .action-button {
            width: 100%;
            justify-content: center;
            padding: 0.875rem 1.5rem;
        }
    }

    @media (max-width: 480px) {
        .no-data-container {
            padding: 1rem;
            min-height: 45vh;
        }

        .no-data-icon {
            width: 80px;
            height: 80px;
            margin-bottom: 1rem;
        }

        .no-data-icon i {
            font-size: 2rem;
        }

        .no-data-title {
            font-size: 1.5rem;
            margin-bottom: 0.5rem;
        }

        .no-data-message {
            font-size: 0.9rem;
            margin-bottom: 1.5rem;
        }

        .action-button {
            padding: 0.75rem 1.25rem;
            font-size: 0.9rem;
        }
    }
</style>

<body>
    <?php require 'Components/Header.php'; ?>

    <?php if (empty($user)) { ?>
    <div class="no-data-container">
        <div class="no-data-icon">
            <i class="fas fa-inbox"></i>
        </div>
        <h1 class="no-data-title">No <?php echo ucfirst($view_type); ?> Found</h1>
        <p class="no-data-message">
            It looks like there are no <?php echo $view_type; ?> records in the system yet.
            Get started by adding your first <?php echo $view_type; ?> or return to the dashboard to explore other options.
        </p>
        <div class="no-data-actions">
            <a href="entities?type=<?php echo $view_type; ?>" class="action-button">
                <i class="fas fa-plus"></i>
                Add New <?php echo ucfirst($view_type); ?>
            </a>
            <a href="Dashboard" class="action-button secondary">
                <i class="fas fa-home"></i>
                Go to Dashboard
            </a>
        </div>
    </div>
    <?php } ?>

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
        // document.querySelectorAll('.dropdown-item').forEach(item => {
        //     item.addEventListener('click', function (e) {
        //         e.preventDefault();
        //         e.stopPropagation();

        //         const card = this.closest('.user-card');
        //         const userName = card.querySelector('.user-name').textContent;
        //         const enrollmentId = card.querySelector('.enrollment-number').textContent;

        //         // Determine action type
        //         let action = '';
        //         if (this.classList.contains('view-item')) {
        //             action = 'View';
        //         } else if (this.classList.contains('edit-item')) {
        //             action = 'Edit';
        //         } else if (this.classList.contains('delete-item')) {
        //             action = 'Delete';
        //         }

        //         // Close dropdown
        //         this.closest('.dropdown-menu').classList.remove('show');
        //         this.closest('.user-card').classList.remove('menu-open');

        //         console.log(`${action} action for: ${userName} (${enrollmentId})`);
        //         alert(`${action} ${userName}\nID: ${enrollmentId}`);
        //     });
        // });

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