<?php
require 'Services/Verify-User.php';
require 'Querys/ViewAll-Query.php';
// echo 'this view page';

$view_type = isset($_GET['type']) ? $_GET['type'] : '';

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

    /* Simple Rectangular Card */
    .user-card {
        position: relative;
        background: var(--white);
        border-radius: 12px;
        padding: 1.5rem;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        transition: all 0.3s ease;
        border: 1px solid #f0f0f0;
        display: flex;
        align-items: center;
        gap: 1rem;
        height: 100px;
        z-index: 1;
        overflow: visible;
    }

    .user-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 30px rgba(0, 0, 0, 0.12);
        border-color: var(--secondary-color);
        z-index: 2;
    }

    /* Profile Image */
    .profile-img {
        width: 60px;
        height: 60px;
        border-radius: 50%;
        object-fit: cover;
        border: 3px solid var(--primary-color);
        transition: transform 0.3s ease;
        flex-shrink: 0;
    }

    .profile-placeholder {
        width: 60px;
        height: 60px;
        border-radius: 50%;
        background: var(--primary-color);
        display: flex;
        align-items: center;
        justify-content: center;
        border: 3px solid var(--secondary-color);
        transition: transform 0.3s ease;
        flex-shrink: 0;
    }

    .profile-placeholder i {
        color: var(--secondary-color);
        font-size: 1.5rem;
    }

    .user-card:hover .profile-img,
    .user-card:hover .profile-placeholder {
        transform: scale(1.1);
    }

    /* User Info */
    .user-info {
        flex: 1;
        min-width: 0;
    }

    .user-name {
        font-size: 1.1rem;
        font-weight: 600;
        color: var(--text-color);
        margin: 0 0 0.25rem 0;
        transition: color 0.3s ease;
    }

    .user-card:hover .user-name {
        color: var(--secondary-color);
    }

    .enrollment-number {
        font-size: 0.9rem;
        color: #666;
        margin: 0;
        font-weight: 500;
    }

    /* Three Dot Menu */
    .action-menu {
        position: relative;
        flex-shrink: 0;
        /* z-index: 10; */
        /* border:2px solid black; */
    }

    .menu-btn {
        position: relative;
        background: var(--white);
        border: 2px solid #e0e0e0;
        border-radius: 8px;
        width: 40px;
        height: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: all 0.3s ease;
        color: #666;
    }

    .menu-btn:hover {
        transform: scale(1.1);
        border-color: var(--secondary-color);
        color: var(--secondary-color);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
    }

    .menu-btn i {
        font-size: 1rem;
    }

    /* Dropdown Menu */
    .dropdown-menu {
        position: absolute;
        top: 100%;
        right: 0;
        background: var(--white);
        border-radius: 8px;
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
        min-width: 140px;
        opacity: 0;
        visibility: hidden;
        transform: translateY(-10px);
        transition: all 0.3s ease;
        border: 1px solid #f0f0f0;
        overflow: hidden;
        z-index: 10;

    }

    .dropdown-menu.show {
        opacity: 1;
        visibility: visible;
        transform: translateY(0);
        z-index: 1000;
    }

    /* Ensure card with open dropdown is on top */
    .user-card.menu-open {
        z-index: 999;
    }

    .dropdown-item {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        padding: 0.75rem 1rem;
        text-decoration: none;
        color: var(--text-color);
        transition: all 0.2s ease;
        border-bottom: 1px solid #f5f5f5;
        cursor: pointer;
        font-size: 0.9rem;
    }

    .dropdown-item:last-child {
        border-bottom: none;
    }

    .dropdown-item:hover {
        background: #f8f9fa;
        color: var(--secondary-color);
    }

    .dropdown-item.view-item:hover {
        background: #e3f2fd;
        color: #2196f3;
    }

    .dropdown-item.edit-item:hover {
        background: #e8f5e8;
        color: #4caf50;
    }

    .dropdown-item.delete-item:hover {
        background: #ffebee;
        color: #f44336;
    }

    .dropdown-item i {
        font-size: 0.85rem;
        width: 16px;
        text-align: center;
    }

    /* Enhanced Responsive Design */
    @media (max-width: 1024px) {
        .card-container {
            grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
        }
    }

    @media (max-width: 768px) {
        .card-container {
            grid-template-columns: 1fr;
            gap: 1rem;
            margin: 1rem auto;
        }

        .user-card {
            height: 85px;
            padding: 1.25rem;
        }

        .profile-img,
        .profile-placeholder {
            width: 50px;
            height: 50px;
        }

        .profile-placeholder i {
            font-size: 1.3rem;
        }

        .menu-btn {
            width: 36px;
            height: 36px;
        }

        body {
            padding: 1rem;
        }
    }

    @media (max-width: 480px) {
        .user-card {
            height: 75px;
            padding: 1rem;
            gap: 0.75rem;
        }

        .profile-img,
        .profile-placeholder {
            width: 45px;
            height: 45px;
        }

        .profile-placeholder i {
            font-size: 1.2rem;
        }

        .user-name {
            font-size: 1rem;
        }

        .enrollment-number {
            font-size: 0.85rem;
        }

        .menu-btn {
            width: 32px;
            height: 32px;
        }

        .menu-btn i {
            font-size: 0.9rem;
        }

        .dropdown-menu {
            min-width: 120px;
        }

        .dropdown-item {
            padding: 0.6rem 0.8rem;
            font-size: 0.85rem;
        }

        body {
            padding: 0.75rem;
        }
    }

    @media (max-width: 360px) {
        .user-card {
            height: 70px;
            padding: 0.75rem;
            gap: 0.5rem;
        }

        .profile-img,
        .profile-placeholder {
            width: 40px;
            height: 40px;
        }

        .profile-placeholder i {
            font-size: 1rem;
        }

        .user-name {
            font-size: 0.95rem;
        }

        .enrollment-number {
            font-size: 0.8rem;
        }

        .menu-btn {
            width: 30px;
            height: 30px;
        }

        .menu-btn i {
            font-size: 0.8rem;
        }
    }

    /* Animation */
    .user-card {
        opacity: 0;
        transform: translateX(-20px);
        animation: slideInLeft 0.5s ease-out forwards;
    }

    @keyframes slideInLeft {
        to {
            opacity: 1;
            transform: translateX(0);
        }
    }

    /* Stagger animation */
    .user-card:nth-child(1) {
        animation-delay: 0.1s;
    }

    .user-card:nth-child(2) {
        animation-delay: 0.2s;
    }

    .user-card:nth-child(3) {
        animation-delay: 0.3s;
    }

    .user-card:nth-child(4) {
        animation-delay: 0.4s;
    }
</style>

<body>
    <?php require 'Components/Header.php'; ?>

    <div class="card-container">
        <!-- Sample Card with Placeholder -->
        <div class="user-card">
            <div class="profile-placeholder">
                <i class="fas fa-user"></i>
            </div>
            <div class="user-info">
                <h3 class="user-name">Alex Johnson</h3>
                <p class="enrollment-number">ENR-2024-001</p>
            </div>
            <div class="action-menu">
                <button class="menu-btn">
                    <i class="fas fa-ellipsis-vertical"></i>
                </button>
                <div class="dropdown-menu">
                    <div class="dropdown-item view-item">
                        <i class="fas fa-eye"></i>
                        View Details
                    </div>
                    <div class="dropdown-item edit-item">
                        <i class="fas fa-edit"></i>
                        Edit
                    </div>
                    <div class="dropdown-item delete-item">
                        <i class="fas fa-trash"></i>
                        Delete
                    </div>
                </div>
            </div>
        </div>
        <div class="user-card">
            <div class="profile-placeholder">
                <i class="fas fa-user"></i>
            </div>
            <div class="user-info">
                <h3 class="user-name">Alex Johnson</h3>
                <p class="enrollment-number">ENR-2024-001</p>
            </div>
            <div class="action-menu">
                <button class="menu-btn">
                    <i class="fas fa-ellipsis-vertical"></i>
                </button>
                <div class="dropdown-menu">
                    <div class="dropdown-item view-item">
                        <i class="fas fa-eye"></i>
                        View Details
                    </div>
                    <div class="dropdown-item edit-item">
                        <i class="fas fa-edit"></i>
                        Edit
                    </div>
                    <div class="dropdown-item delete-item">
                        <i class="fas fa-trash"></i>
                        Delete
                    </div>
                </div>
            </div>
        </div>
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