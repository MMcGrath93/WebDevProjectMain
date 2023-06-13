<?php
include "dbconn.php";
session_start();

if (!isset($_SESSION['id'])) {
    header('Location: login.php');
}
$id = $_SESSION['id'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Moods</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js"></script>
</head>

<body>


    <!--import nav bar-->
    <?php include "./navbar.html"; ?>
    <br>
    <!--Filtering-->
    <div class="container has-text-centered is-size-5">
        <form method="GET" action="">
            <div class="field is-horizontal">
                <div class="field-body">
                    <div class="field">
                        <label class="label">Filter by Mood:</label>
                        <div class="control">
                            <div class="select">
                                <select name="mood_filter">
                                    <option value="">All</option>
                                    <option value="Happy">Happy</option>
                                    <option value="Sad">Sad</option>
                                    <option value="Nervous">Nervous</option>
                                    <option value="Angry">Angry</option>
                                    <option value="Anxious">Anxious</option>
                                    <option value="Depressed">Depressed</option>
                                    <option value="Tired">Tired</option>
                                    <option value="Sick">Sick</option>
                                    <option value="Productive">Productive</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="field">
                        <label class="label">Filter by Date Range:</label>
                        <div class="control">
                            <input type="datetime-local" name="start_datetime">
                            <span class="has-text-grey">to</span>
                            <input type="datetime-local" name="end_datetime">
                        </div>
                    </div>
                    <div class="field">
                        <button class="button is-primary" type="submit">Apply Filters</button>
                    </div>
                </div>
            </div>
        </form>

        <br>
        <div class="hero is-large">
            <div class="container has-text-centered is-size-5">
                <table class="table is-bordered is-striped is-narrow is-hoverable">
                    <tr>
                        <th class="has-background-white is-size-4">Mood</th>
                        <th class="has-background-white is-size-4">Notes</th>
                        <th class="has-background-white is-size-4">Date & Time Recorded</th>
                        <th class="has-background-white is-size-4"></th>
                    </tr>
                    <?php
                    // Get the filter values from the form submission
                    $moodFilter = $_GET['mood_filter'] ?? '';
                    $startDatetime = $_GET['start_datetime'] ?? '';
                    $endDatetime = $_GET['end_datetime'] ?? '';

                    // Construct the SQL query with the filters
                    $readSQL = "SELECT * FROM `moods` WHERE `user_id`='$id'";

                    if (!empty($moodFilter)) {
                        $readSQL .= " AND `value`='$moodFilter'";
                    }

                    if (!empty($startDatetime) && !empty($endDatetime)) {
                        $readSQL .= " AND `datetime` BETWEEN '$startDatetime' AND '$endDatetime'";
                    }

                    $result = $conn->query($readSQL);

                    while ($row = $result->fetch_assoc()) {
                        $mood = $row["context"];
                        $date = $row["datetime"];
                        $moodid = $row["id"];
                        $moodchoice = $row["value"];
                        echo "<tr>
            <td>$moodchoice</td>
            <td>$mood</td>
            <td>$date</td>";
                        echo "<td> <a href='editMood.php?mood_id=$moodid' class='button'>Edit</a> <a href='processDelete.php?moodid=$moodid' class='button is-danger'>Delete</a></td>
                    </tr>";
                    }
                    ?>
                </table>
                <a href='export.php' class='button is-primary'>Export My Mood Log</a>
            </div>
        </div>
        <div class="hero is-large">
            <div class="hero-body is-justify-content-center is-align-items-center pt-6 pb-6">
                <div class="columns is-flex is-flex-direction-column box">
                    <div class="column has-text-centered">

                        <!--Visualisation-->
                        <?php
                        //get data to populate chart
                        $moodFilter = $_GET['mood_filter'] ?? '';
                        $startDatetime = $_GET['start_datetime'] ?? '';
                        $endDatetime = $_GET['end_datetime'] ?? '';

                        // Construct the SQL query with the filters
                        $readSQL = "SELECT value, COUNT(value) as count FROM moods WHERE user_id = '$id'";

                        if (!empty($moodFilter)) {
                            $readSQL .= " AND value = '$moodFilter'";
                        }

                        if (!empty($startDatetime) && !empty($endDatetime)) {
                            $readSQL .= " AND datetime BETWEEN '$startDatetime' AND '$endDatetime'";
                        }

                        $readSQL .= " GROUP BY value";

                        $result = $conn->query($readSQL);

                        $moodLabels = array();
                        $moodData = array();

                        while ($row = $result->fetch_assoc()) {
                            $moodLabels[] = $row["value"];
                            $moodData[] = $row["count"];
                        }
                        ?>
                        <h3 class="title is-3">My Mood Chart</h3>
                        <canvas id="moodChart"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer">
            <?php include "./footer.html"; ?>
        </div>

        <!--Script to create mood Visualisation---->
        <script>
            var ctx = document.getElementById('moodChart').getContext('2d');
            var moodChart = new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: <?php echo json_encode($moodLabels); ?>,
                    datasets: [{
                        label: '# of Moods',
                        data: <?php echo json_encode($moodData); ?>,
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        </script>

</body>

</html>