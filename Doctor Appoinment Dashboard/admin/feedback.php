<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/animations.css">  
    <link rel="stylesheet" href="../css/main.css">  
    <link rel="stylesheet" href="../css/admin.css">
    <style>
        /* Reset default margin and padding */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            color: #333;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        .dash-body {
            background-color: #fff;
            padding: 20px;
            margin-top: 15px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .dash-body h1 {
            font-size: 24px;
            margin-bottom: 20px;
            color: #333;
        }

        /* Styling for the feedback table */
        .dashbord-tables {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .dashbord-tables th, .dashbord-tables td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        .dashbord-tables th {
            background-color: #f2f2f2;
            color: #333;
            font-weight: bold;
        }

        .dashbord-tables td {
            background-color: #fff;
        }

        .dashbord-tables tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .dashbord-tables tbody tr:hover {
            background-color: #f2f2f2;
        }

        /* Responsive adjustments */
        @media screen and (max-width: 600px) {
            .menu a {
                float: none;
                display: block;
                text-align: left;
            }
        }
    </style>
    <title>Feedback</title>
</head>
<body>
    <div class="container">
        <div class="dash-body">
            <h1>All Feedback</h1>
            <table class="dashbord-tables">
                <thead>
                    <tr>
                        <th>Username</th>
                        <th>Doctor Name</th>
                        <th>Feedback</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- PHP code to dynamically generate table rows -->
                    <?php
                    session_start();
                    include("../connection.php");

                    $sql = "SELECT username, doctorname, feedback FROM feedback"; // Replace with your actual table name

                    $result = $database->query($sql);

                    if ($result === false) {
                        echo "Error executing query: " . $database->error;
                    } else {
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . htmlspecialchars($row["username"]) . "</td>";
                                echo "<td>" . htmlspecialchars($row["doctorname"]) . "</td>";
                                echo "<td>" . htmlspecialchars($row["feedback"]) . "</td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='3'>No feedback found.</td></tr>";
                        }
                    }

                    $database->close();
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
