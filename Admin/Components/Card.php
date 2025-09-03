<style>
    .dashboard-grid {
        display: flex;
        flex-wrap: wrap;
        gap: 1rem;
        margin-bottom: 2rem;
        padding: 1rem;
        justify-content: center;
        align-items: stretch;
        /* border:2px solid black; */
    }

    .dashboard-card {
        background: var(--white);
        border-radius: var(--border-radius);
        padding: 2rem;
        flex: 1 1 calc(33.333% - 1.5rem);
        min-width: 300px;
        max-width: 400px;
        min-height: 420px;
        /* height: fit-content; */
        box-shadow: var(--shadow);
        transition: var(--transition);
        border: 2px solid rgba(3, 108, 226, 0.1);
        position: relative;
        overflow: hidden;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    .dashboard-card:hover {
        transform: translateY(-8px) scale(1.02);
        box-shadow:
            0 15px 35px rgba(3, 108, 226, 0.15),
            0 5px 15px rgba(0, 0, 0, 0.1);
    }

    .card-header {
        display: flex;
        align-items: center;
        gap: 1rem;
        margin-bottom: 1rem;
        /* border: 2px solid black; */
    }

    .card-icon {
        width: 4rem;
        height: 4rem;
        background: linear-gradient(135deg, var(--secondary-color), #0077ff);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.7rem;
        color: var(--white);
        box-shadow:
            0 6px 15px rgba(3, 108, 226, 0.3),
            0 0 0 3px rgba(3, 108, 226, 0.1);
        transition: var(--transition);
        position: relative;
        overflow: hidden;
    }

    .card-icon::before {
        content: '';
        position: absolute;
        top: -50%;
        left: -50%;
        width: 200%;
        height: 200%;
        background: linear-gradient(45deg, transparent, rgba(255, 255, 255, 0.2), transparent);
        transform: rotate(45deg);
        transition: var(--transition);
        opacity: 0;
    }

    .dashboard-card:hover .card-icon {
        transform: scale(1.1) rotate(5deg);
        box-shadow:
            0 8px 20px rgba(3, 108, 226, 0.4),
            0 0 0 4px rgba(3, 108, 226, 0.15);
    }

    .dashboard-card:hover .card-icon::before {
        opacity: 1;
        animation: shimmer 0.6s ease-in-out;
    }

    @keyframes shimmer {
        0% {
            transform: translateX(-100%) translateY(-100%) rotate(45deg);
        }

        100% {
            transform: translateX(100%) translateY(100%) rotate(45deg);
        }
    }


    .card-title {
        color: var(--dark-gray);
        font-size: 1.3rem;
        /* font-weight: 600; */
        text-transform: capitalize;
    }

    .card-content {
        color: var(--dark-gray);
        font-size: 1rem;
        line-height: 1.6;
        flex: 1;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    .card-content p {
        margin-bottom: 1.5rem;
        flex-shrink: 0;
    }

    .card-stats {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 1rem;
        margin-bottom: 1rem;
        flex-grow: 1;
    }

    .stat-item {
        background: linear-gradient(135deg, var(--light-gray), rgba(3, 108, 226, 0.05));
        padding: 1rem 0.8rem;
        border-radius: 0.8rem;
        text-align: center;
        border: 1px solid rgba(3, 108, 226, 0.1);
        transition: var(--transition);
        min-height: 50px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        /* border: 2px solid black; */
    }

    .stat-item:hover {
        background: linear-gradient(135deg, rgba(3, 108, 226, 0.1), rgba(3, 108, 226, 0.15));
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(3, 108, 226, 0.2);
    }

    .stat-value {
        font-size: 1.5rem;
        font-weight: 700;
        color: var(--secondary-color);
    }

    .stat-label {
        font-size: 0.9rem;
        color: var(--dark-gray);
        margin-top: 0.25rem;
        font-weight: 500;
    }

    /* Card Actions */
    .card-actions {
        display: flex;
        gap: 0.8rem;
        margin-top: auto;
        padding-top: 1.5rem;
        border-top: 2px solid rgba(3, 108, 226, 0.1);
        flex-shrink: 0;
    }

    .action-btn {
        flex: 1;
        padding: 0.7rem 1rem;
        border: none;
        border-radius: 0.6rem;
        font-family: var(--primary-font);
        font-size: 0.9rem;
        font-weight: 600;
        cursor: pointer;
        transition: var(--transition);
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
        text-transform: capitalize;
    }

    .view-btn {
        background: linear-gradient(135deg, var(--tertiary-color), rgba(3, 108, 226, 0.1));
        color: var(--secondary-color);
        border: 1px solid rgba(3, 108, 226, 0.2);
    }

    .view-btn:hover {
        background: linear-gradient(135deg, var(--secondary-color), #0077ff);
        color: var(--white);
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(3, 108, 226, 0.3);
    }

    .add-btn {
        background: linear-gradient(135deg, var(--secondary-color), #0077ff);
        color: var(--white);
        border: 1px solid var(--secondary-color);
    }

    .add-btn:hover {
        background: linear-gradient(135deg, #0077ff, #005bb5);
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(3, 108, 226, 0.4);
    }

    .action-btn:active {
        transform: translateY(0);
    }

    .action-btn i {
        font-size: 0.9rem;
    }
</style>

<div class="dashboard-grid">
    <div class="dashboard-card">
        <div class="card-header">

            <div class="card-icon"><i class="fa-light fa-user-graduate fa-sm"></i></div>
            <h3 class="card-title">total student</h3>
        </div>
        <div class="card-content">
            <p>The dashboard provides insights into the total number of students and student related all operation for
                admin</p>
            <div class="card-stats">
                <div class="stat-item">
                    <div class="stat-value">0</div>
                    <div class="stat-label">Total Student</div>
                </div>
                <div class="stat-item">
                    <div class="stat-value">1</div>
                    <div class="stat-label">Active</div>
                </div>
                <div class="stat-item">
                    <div class="stat-value">1</div>
                    <div class="stat-label">Graduate</div>
                </div>
                <div class="stat-item">
                    <div class="stat-value">1</div>
                    <div class="stat-label">Terminated</div>
                </div>
            </div>
            <div class="card-actions">
                <button class="action-btn view-btn" onclick="viewAllStudents()">
                    View Students
                </button>
                <button class="action-btn add-btn" onclick="addNewStudent()">
                    Add Student
                </button>
            </div>
        </div>
    </div>

    <div class="dashboard-card">
        <div class="card-header">
            <div class="card-icon"><i class="fa-light fa-chalkboard-user fa-sm"></i></div>
            <h3 class="card-title">total facultys</h3>
        </div>
        <div class="card-content">
            <p>Manage faculty members, their profiles, assignments, and academic responsibilities across all
                departments.</p>
            <div class="card-stats">
                <div class="stat-item">
                    <div class="stat-value">45</div>
                    <div class="stat-label">Total Faculty</div>
                </div>
                <div class="stat-item">
                    <div class="stat-value">42</div>
                    <div class="stat-label">Active Faculty</div>
                </div>
                <div class="stat-item">
                    <div class="stat-value">15</div>
                    <div class="stat-label">Professors</div>
                </div>
                <div class="stat-item">
                    <div class="stat-value">30</div>
                    <div class="stat-label">Assistant Prof.</div>
                </div>
            </div>
            <div class="card-actions">
                <button class="action-btn view-btn" onclick="viewAllFaculty()">
                    View Faculty
                </button>
                <button class="action-btn add-btn" onclick="addNewFaculty()">
                    Add Faculty
                </button>
            </div>
        </div>
    </div>

    <div class="dashboard-card">
        <div class="card-header">
            <div class="card-icon"><i class="fa-regular fa-buildings"></i></div>
            <h3 class="card-title">Total Departments</h3>
        </div>
        <div class="card-content">
            <p>The dashboard provides insights into the total number of Departments and Departments related all
                operation for admin</p>
            <div class="card-stats">
                <div class="stat-item">
                    <div class="stat-value">6</div>
                    <div class="stat-label">Total Departments</div>
                </div>
                <div class="stat-item">
                    <div class="stat-value">5</div>
                    <div class="stat-label">Active Departments</div>
                </div>
                <div class="stat-item">
                    <div class="stat-value">5</div>
                    <div class="stat-label">Total HOD's</div>
                </div>
                <div class="stat-item">
                    <div class="stat-value">1</div>
                    <div class="stat-label">Active buildings</div>
                </div>
            </div>
            <div class="card-actions">
                <button class="action-btn view-btn" onclick="viewAllDepartments()">
                    View Departments
                </button>
                <button class="action-btn add-btn" onclick="addNewDepartment()">
                    Add Department
                </button>
            </div>
        </div>
    </div>

    <div class="dashboard-card">
        <div class="card-header">
            <div class="card-icon">🔒</div>
            <h3 class="card-title">overall result</h3>
        </div>
        <div class="card-content">
            <p>View comprehensive academic results, performance analytics, and student achievement statistics across all
                programs.</p>
            <div class="card-stats">
                <div class="stat-item">
                    <div class="stat-value">85%</div>
                    <div class="stat-label">Pass Rate</div>
                </div>
                <div class="stat-item">
                    <div class="stat-value">7.2</div>
                    <div class="stat-label">Avg CGPA</div>
                </div>
                <div class="stat-item">
                    <div class="stat-value">92%</div>
                    <div class="stat-label">Attendance</div>
                </div>
                <div class="stat-item">
                    <div class="stat-value">15</div>
                    <div class="stat-label">Toppers</div>
                </div>
            </div>
            <div class="card-actions">
                <button class="action-btn view-btn" onclick="viewAllResults()">
                    View All Results
                </button>
                <button class="action-btn add-btn" onclick="addNewResult()">
                    Add New Result
                </button>
            </div>
        </div>
    </div>

    <div class="dashboard-card">
        <div class="card-header">
            <div class="card-icon"><i class="fa-regular fa-newspaper"></i></div>
            <h3 class="card-title">total recent news</h3>
        </div>
        <div class="card-content">
            <p>Stay updated with latest institutional news, announcements, events, and important notifications for
                students and faculty.</p>
            <div class="card-stats">
                <div class="stat-item">
                    <div class="stat-value">12</div>
                    <div class="stat-label">Recent News</div>
                </div>
                <div class="stat-item">
                    <div class="stat-value">5</div>
                    <div class="stat-label">Announcements</div>
                </div>
                <div class="stat-item">
                    <div class="stat-value">8</div>
                    <div class="stat-label">Events</div>
                </div>
                <div class="stat-item">
                    <div class="stat-value">3</div>
                    <div class="stat-label">Urgent Notices</div>
                </div>
            </div>
            <div class="card-actions">
                <button class="action-btn view-btn" onclick="viewAllNews()">
                    View All News
                </button>
                <button class="action-btn add-btn" onclick="addNewNews()">
                    Add New News
                </button>
            </div>
        </div>
    </div>

    <div class="dashboard-card">
        <div class="card-header">
            <div class="card-icon"><i class="fa-regular fa-file-lines"></i></div>
            <h3 class="card-title">exam related</h3>
        </div>
        <div class="card-content">
            <p>Manage examination schedules, results, hall tickets, and all exam-related administrative tasks and
                student queries.</p>
            <div class="card-stats">
                <div class="stat-item">
                    <div class="stat-value">6</div>
                    <div class="stat-label">Upcoming Exams</div>
                </div>
                <div class="stat-item">
                    <div class="stat-value">4</div>
                    <div class="stat-label">Results Pending</div>
                </div>
                <div class="stat-item">
                    <div class="stat-value">150</div>
                    <div class="stat-label">Hall Tickets</div>
                </div>
                <div class="stat-item">
                    <div class="stat-value">2</div>
                    <div class="stat-label">Exam Halls</div>
                </div>
            </div>
            <div class="card-actions">
                <button class="action-btn view-btn" onclick="viewAllExams()">
                    View All Exams
                </button>
                <button class="action-btn add-btn" onclick="addNewExam()">
                    Add New Exam
                </button>
            </div>
        </div>
    </div>
</div>

<script>

    const dashboardCards = document.querySelectorAll('.dashboard-card');
    dashboardCards.forEach(card => {
        card.addEventListener('mouseenter', function () {
            this.style.transform = 'translateY(-5px) scale(1.02)';
        });

        card.addEventListener('mouseleave', function () {
            this.style.transform = 'translateY(0) scale(1)';
        });
    });

    // Student Functions
    function viewAllStudents() {
        showSuccessMessage('View All Students functionality will be implemented soon!');
    }

    function addNewStudent() {
        window.location.href = 'entities?type=student';
        // showSuccessMessage('Add New Student functionality will be implemented soon!');
    }

    // Faculty Functions
    function viewAllFaculty() {
        showSuccessMessage('View All Faculty functionality will be implemented soon!');
        console.log('View All Faculty clicked');
    }

    function addNewFaculty() {
        window.location.href = 'entities?type=faculty';
        // showSuccessMessage('Add New Faculty functionality will be implemented soon!');
        console.log('Add New Faculty clicked');
    }

    // Department Functions
    function viewAllDepartments() {
        showSuccessMessage('View All Departments functionality will be implemented soon!');
        console.log('View All Departments clicked');
    }

    function addNewDepartment() {
        showSuccessMessage('Add New Department functionality will be implemented soon!');
        console.log('Add New Department clicked');
    }

    // Result Functions
    function viewAllResults() {
        showSuccessMessage('View All Results functionality will be implemented soon!');
        console.log('View All Results clicked');
    }

    function addNewResult() {
        showSuccessMessage('Add New Result functionality will be implemented soon!');
        console.log('Add New Result clicked');
    }

    // News Functions
    function viewAllNews() {
        showSuccessMessage('View All News functionality will be implemented soon!');
        console.log('View All News clicked');
    }

    function addNewNews() {
        showSuccessMessage('Add New News functionality will be implemented soon!');
        console.log('Add New News clicked');
    }

    // Exam Functions
    function viewAllExams() {
        showSuccessMessage('View All Exams functionality will be implemented soon!');
        console.log('View All Exams clicked');
    }

    function addNewExam() {
        showSuccessMessage('Add New Exam functionality will be implemented soon!');
        console.log('Add New Exam clicked');
    }

</script>