<?php
$admin_username = isset($_SESSION['admin_username']) ? $_SESSION['admin_username'] : 'Admin';
?>

<style>
    /* Header Styles */
    .dashboard-header {
        position: sticky;
        top: 0;
        z-index: 100;
        /* padding: .4rem 0; */
    }

    .header-content {
        display: flex;
        align-items: center;
        justify-content: space-evenly;
        width: 100%;
        height: 100%;
        margin: 0 auto;
        padding: 0 2rem;
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 1rem;

    }

    .header-left {
        display: flex;
        align-items: center;
        gap: 1rem;
    }

    .header-logo {
        width: 4.4rem;
        height: 4rem;
        border-radius: 50%;
        /* border: 2px solid var(--secondary-color); */
        padding: 2px;
    }

    .header-title {
        color: var(--dark-gray);
        font-size: 1.7rem;
        font-weight: 700;
        text-transform: capitalize;
    }

    .header-right {
        display: flex;
        align-items: center;
    }

    .logout-btn {
        background: var(--secondary-color);
        color: var(--white);
        border: none;
        padding: 0.8rem 1.5rem;
        border-radius: 0.6rem;
        cursor: pointer;
        text-decoration: none;
        font-size: 1rem;
        font-weight: 600;
        font-family: var(--primary-font);
        transition: var(--transition);
        box-shadow: 0 2px 5px rgba(3, 108, 226, 0.3);
    }

    .logout-btn:hover {
        background: #0077ff;
        transform: scale(1.02);
        box-shadow: 0 4px 10px rgba(3, 108, 226, 0.4);
    }

    .login-form>.error-msg {
        position: relative;
        /* left:-3rem; */
        width: 80%;
        text-align: left;
        color: red;
        /* display: none; */
        background-color: rgba(255, 0, 0, 0.184);
        padding: 5px 15px;
        border-left: 3px solid red;
        font-size: 1rem;
        font-weight: 600;
        text-transform: capitalize;
        /* border: 2px solid black; */
        margin: .5rem 0 .5rem 0;
    }

    .login-form>.success-msg {
        position: relative;
        width: 80%;
        text-align: left;
        color: #27ae60;
        background-color: rgba(39, 174, 96, 0.184);
        padding: 5px 15px;
        border-left: 3px solid #27ae60;
        font-size: 1rem;
        font-weight: 600;
        text-transform: capitalize;
        margin: .5rem 0 .5rem 0;
        animation: slideIn 0.3s ease;
    }
</style>


<div class="dashboard-header">
    <div class="header-content">
        <div class="header-left">
            <a href="Dashboard"><img src="Public/Images/SSASIT.png" alt="SSASIT Logo" class="header-logo"
                    onerror="this.src='https://via.placeholder.com/50x50/036ce2/ffffff?text=SSASIT'"></a>
            <h1 class="header-title">SSASIT</h1>
        </div>
        <div class="header-right">
            <a href="Dashboard?logout=1" class="logout-btn" onclick="return confirmLogout()">
                <span>Logout</span>
            </a>
        </div>
    </div>
</div>

<script>
    window.addEventListener('scroll', function () {
        const header = document.querySelector('.dashboard-header');
        header.style.transition = 'var(--transition)';
        if (window.scrollY > 25) {
            // header.style.boxShadow = '0 4px 10px rgba(3, 108, 226, 0.3)';
            header.style.backgroundColor = 'var(--white)';
            header.style.height = '70px';
        }
        else if (window.scrollY < 30) {
            header.style.backgroundColor = 'transparent';
            header.style.height = '80px';
        }
    });
    // Add loading animation to cards on hover
    // Logout confirmation function
    function confirmLogout() {
        return confirm('Are you sure you want to logout? You will be redirected to the login page.');
    }

    const logoutBtn = document.querySelector('.logout-btn');
    if (logoutBtn) {
        logoutBtn.addEventListener('mousedown', function () {
            this.style.transform = 'scale(0.98)';
        });

        logoutBtn.addEventListener('mouseup', function () {
            this.style.transform = 'scale(1.02)';
        });

        logoutBtn.addEventListener('mouseleave', function () {
            this.style.transform = 'scale(1)';
        });
    }
</script>