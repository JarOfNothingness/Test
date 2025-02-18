<?php
    session_start();
    if (!isset($_SESSION['username'])) {
        header("Location: login.php");
        exit();
    }
    ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Dashboard</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
        <style>
            body {
                display: flex;
                height: 100vh;
                background-color: #f4f4f4;
            }
            .sidebar {
                width: 250px;
                background: #343a40;
                color: white;
                padding-top: 20px;
            }
            .sidebar a {
                padding: 10px 20px;
                display: block;
                color: white;
                text-decoration: none;
            }
            .sidebar a:hover {
                background: #495057;
            }
            .content {
                flex: 1;
                padding: 20px;
            }
            .logout-btn {
                position: absolute;
                bottom: 20px;
                left: 50%;
                transform: translateX(-50%);
                width: 80%;
            }
        </style>
    </head>
    <body>
        <div class="sidebar">
            <h4 class="text-center">Dashboard</h4>
            <a href="#">🏠 Home</a>
          
            <button class="btn text-white px-3 w-100 shadow-none text-start d-flex align-items-center justify-content-between" 
                    type="button" 
                    data-bs-toggle="collapse" 
                    data-bs-target="#bookingLink" 
                    aria-expanded="false" 
                    aria-controls="bookingLinks" 
                    id="bookingToggle">
                    <span><i class="bi bi-book-fill"></i>  📑 Template</span>
                    <span id="bookingIcon"><i class="bi bi-caret-down-fill"></i></span>
                </button>
                <div class="collapse px-3 small mb-1" id="bookingLink">
                    <ul class="nav nav-pills flex-column rounded border border-secondary">
                    <li class="nav-item mb-2">
                    <a class="nav-link text-white" href="purchase_request.php" class="booking-link">Purchase Request</a>
                    </li>
                    <li class="nav-item mb-2">
                    <a class="nav-link text-white" href="canva_form.php" class="booking-link">Canvas Form</a>
                    </li>
                
                    </ul>
                </div>
            <button class="btn text-white px-3 w-100 shadow-none text-start d-flex align-items-center justify-content-between" 
                    type="button" 
                    data-bs-toggle="collapse" 
                    data-bs-target="#bookingLinks" 
                    aria-expanded="false" 
                    aria-controls="bookingLinks" 
                    id="bookingToggle">
                    <span><i class="bi bi-book-fill"></i>  📑 History</span>
                    <span id="bookingIcon"><i class="bi bi-caret-down-fill"></i></span>
                </button>
                <div class="collapse px-3 small mb-1" id="bookingLinks">
                    <ul class="nav nav-pills flex-column rounded border border-secondary">
                    <li class="nav-item mb-2">
                    <a class="nav-link text-white" href="pr_history.php" class="booking-link">PR History</a>
                    </li>
                    <li class="nav-item mb-2">
                    <a class="nav-link text-white" href="canva_form.php" class="booking-link">Canvas History</a>
                    </li>
                
                    </ul>
                </div>
          
            <a href="logout.php"><i class="bi bi-box-arrow-left"></i>Logout</a>
        </div>
        <div class="content">
            <h2>Welcome, <?php echo $_SESSION['username']; ?>!</h2>
            <p>Select an option from the sidebar to get started.</p>
        </div>
    </body>
    </html>
