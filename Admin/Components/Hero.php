<style>
    .welcome-section {
        background: linear-gradient(135deg, var(--white), var(--tertiary-color));
        border-radius: var(--border-radius);
        padding: 2.5rem;
        margin-bottom: 2rem;
        box-shadow: var(--shadow);
        text-align: center;
        border: 2px solid rgba(3, 108, 226, 0.1);
        position: relative;
        overflow: hidden;
    }

    .welcome-title {
        color: var(--dark-gray);
        font-size: 2.5rem;
        font-weight: 700;
        margin-bottom: 0.5rem;
        text-transform: capitalize;
    }

    .welcome-subtitle {
        color: var(--secondary-color);
        font-size: 1.2rem;
        font-weight: 500;
        margin-bottom: 1rem;
    }

    .welcome-message {
        color: var(--dark-gray);
        font-size: 1rem;
        font-weight: 400;
        max-width: 600px;
        margin: 0 auto;
    }
</style>

<div class="welcome-section">
    <h2 class="welcome-title">Welcome Back, <?php echo htmlspecialchars($admin_username); ?>!</h2>
    <p class="welcome-subtitle">SSASIT Administration Portal</p>
    <p class="welcome-message">
        You have successfully accessed the Shree Swami Atmanand Saraswati Institute of Technology
        administration dashboard. From here you can manage all administrative functions and monitor
        system activities.
    </p>
</div>