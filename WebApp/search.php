<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
    </svg>
    <link rel="icon" href="slack-logo.ico">
    <title>DATA FORM</title>
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card mt-4">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-7">

                                <form action="" method="GET">
                                    <div>
                                        <div class="input-group mb-3">
                                            <input type="text" name="search" required value="<?php if (isset($_GET['search'])) {
                                                                                                    echo $_GET['search'];
                                                                                                } ?>" class="form-control" placeholder="Search data">
                                            <button type="submit" class="btn btn-primary"><i class="bi bi-search"></i></button>
                                        </div>
                                        <a href="registration.html" class="Homepage">Create New Entry</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="card mt-4">
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Phone Number</th>
                                    <th>Email</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                // Step 1: Connect to the SQLite database
                                $databaseFile = 'database.db';
                                $pdo = new PDO('sqlite:' . $databaseFile);

                                // Step 2: Define the query to fetch data
                                $query = "SELECT * FROM test"; // Replace 'your_table_name' with the actual table name

                                // Step 3: Prepare and execute the query
                                $stmt = $pdo->prepare($query);
                                $stmt->execute();

                                // Step 4: Fetch data and display results
                                $resultSet = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                if (count($resultSet) > 0) {
                                    echo "<table>";
                                    

                                    foreach ($resultSet as $row) {
                                        echo "<tr>";
                                        echo "<td>" . $row['First_Name'] . "</td>"; // Replace 'column1', 'column2', etc., with actual column names
                                        echo "<td>" . $row['Last_name'] . "</td>";
                                        echo "<td>" . $row['Phone_Number'] . "</td>";
                                        echo "<td>" . $row['Email'] . "</td>";
                                        // Add more columns as needed
                                        echo "</tr>";
                                    }

                                    echo "</table>";
                                } else {
                                    echo "No data found.";
                                }

                                // Step 5: Close the database connection
                                $pdo = null;
                                ?>

                              
                            
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>