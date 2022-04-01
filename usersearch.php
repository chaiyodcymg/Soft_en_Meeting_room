<!DOCTYPE html>
<html>

<head>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="css/body.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>ระบบจองห้องประชุม</title>
    <!-- Custom CSS -->
    <style>
        #calendar {
            max-width: 800px;
        }

        .col-centered {
            float: none;
            margin: 0 auto;
        }
    </style>
</head>





<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <!-- Just an image -->

            <a class="navbar-brand" href="userpage.php">
                <img src="img/logo.png" width="30" height="30" alt="">
            </a>

            <a class="navbar-brand" href="userpage.php">ระบบจองห้องประชุม</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>



            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">


                    <li class="nav-item ">
                        <a class="nav-link" href="usersearch.php">
                            ค้นหาห้องประชุม
                        </a>

                    </li>

                    <li class="nav-item ">
                        <a class="nav-link" href="useraddmeet.php">
                            จองห้องประชุม
                        </a>

                    </li>

                </ul>

                <div class="ml-md-2 my-lg-0">

                    <?php
                    session_start();
                    //check session 
                    if (isset($_SESSION['user'])) {
                        echo "<p style='color:white'>ยินดีต้อนรับ ";
                        echo $_SESSION['user'];
                        echo "</p>";
                    } else {
                        echo "<script>alert('คุณยังไม่ได้เข้าสู่ระบบ กลับไปยังหน้าเข้าสู่ระบบก่อน')</script>";
                        echo "<script>window.open('login.php','_self')</script>";
                    }
                    ?>

                    <a href="logout.php" class="btn btn-primary" role="button">ออกจากระบบ</a>
                </div>

            </div>
        </div>
    </nav>
    <div id="title">
        <img src="https://wallpaperaccess.com/full/4012588.jpg" class="center-block img-fluid" id="title_img" alt="Responsive image">
        <div id="title_title">ห้องประชุม</div>
    </div>
    <div style="height:5vw"></div>
    <!-- <title>ระบบจองห้องประชุม</title> -->
    <!-- FullCalendar -->

    <link href='css/fullcalendar.css' rel='stylesheet' />
    <?php
    require_once('bdd.php');


    if (isset($_POST['searchhead']) && isset($_POST['searchroom'])) {

        if (!empty($_POST['searchhead']) && empty($_POST['searchroom'])) {
            $searchhead = $_POST['searchhead'];
            $sql = "SELECT * FROM events where head = '$searchhead';";
        } else if (!empty($_POST['searchroom']) && empty($_POST['searchhead'])) {
            $searchroom = $_POST['searchroom'];
            $sql = "SELECT * FROM events where roomid = '$searchroom';";
        } else  if (!empty($_POST['searchroom']) && !empty($_POST['searchhead'])) {
            $searchhead = $_POST['searchhead'];
            $searchroom = $_POST['searchroom'];
            $sql = "SELECT * FROM events where head = '$searchhead' AND roomid = '$searchroom'";
        } else {
            $sql = "SELECT * FROM events";
        }
    } else {
        $sql = "SELECT * FROM events";
    }

    $req = $bdd->prepare($sql);
    $req->execute();

    $events = $req->fetchAll();


    ?>


    </table>
    <center>
        <table style="width:70%">
            <tr>
                <th>
                    <form method="POST" action="usersearch.php">
                        <span style="font-size:20px; color:black;">
                            <center><strong>เลือกผู้บริหาร </strong></center>
                        </span>
                        <select name="searchhead" class="form-control" id="searchhead">
                            <option value=""> ประธานทั้งหมด</option>
                            <option value="นายกเทศมนตรี"> นายกเทศมนตรี</option>
                            <option value="รองนายกเทศมนตรี1"> รองนายกเทศมนตรี1</option>
                            <option value="รองนายกเทศมนตรี2"> รองนายกเทศมนตรี2</option>
                            <option value="รองนายกเทศมนตรี3"> รองนายกเทศมนตรี3</option>
                        </select>
                </th>
                <th>
                    <span style="font-size:20px; color:black;">
                        <center><strong>เลือกห้อง </strong></center>
                    </span>
                    <select name="searchroom" class="form-control" id="searchroom">
                        <option value=""> ห้องทั้งหมด</option>
                        <?PHP
                        $sql1 = "SELECT * FROM room";
                        $req = $bdd->prepare($sql1);
                        $req->execute();
                        $room = $req->fetchAll();

                        foreach ($room as $row => $room) {
                            echo  '<option value=' . $room['roomid'] . '>' . $room['roomname'] . '</option>';
                        }
                        ?>
                    </select>
                </th>
                <th><span style="font-size:20px; color:white;">
                        <center><strong>คลิ๊ก </strong></center>
                    </span> <button type="submit" class="btn btn-primary">ค้นหา</button> </th>

            </tr>
        </table>
    </center>



    <!-- Page Content -->
    <div class="container">

        <div class="row">
            <div class="col-lg-12 text-center">
                <h1>ตารางการใช้งานห้องประชุม</h1>
                <p class="lead">
                    <?php
                    include("conn.php");
                    if (isset($_POST['searchhead']) || isset($_POST['searchroom'])) {
                        if (empty($_POST['searchhead']) &&  !empty($_POST['searchroom'])) {
                            $roomid = $_POST['searchroom'];
                            $room = mysqli_query($conn, "SELECT roomname FROM room WHERE roomid = '$roomid'");
                            $rowroom = mysqli_fetch_array($room);
                            echo "ประธานทั้งหมด  ห้องประชุม  | " . $rowroom['roomname'];
                        } else if (!empty($_POST['searchhead']) &&  empty($_POST['searchroom'])) {
                            echo "ประธานชื่อ " . $_POST['searchhead'] . " |  ห้องประชุมทั้งหมด  ";
                        } else if (empty($_POST['searchhead']) &&  empty($_POST['searchroom']))
                            echo "ประธานทั้งหมด | ห้องประชุมทั้งหมด  ";
                        else {
                            $roomid = $_POST['searchroom'];
                            $room = mysqli_query($conn, "SELECT roomname FROM room WHERE roomid = '$roomid'");
                            $rowroom = mysqli_fetch_array($room);
                            echo "ประธานชื่อ " . $_POST['searchhead'] . " |  ห้องประชุม  " . $rowroom['roomname'];
                        }
                    }

                    ?>

                </p>
                <div id="calendar" class="col-centered mb-5">
                </div>
            </div>

        </div>


        <!-- /.container -->

        <!-- jQuery Version 1.11.1 -->
        <script src="js/jquery.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>

        <!-- FullCalendar -->
        <script src='js/moment.min.js'></script>
        <script src='js/fullcalendar.min.js'></script>

        <script>
            $(document).ready(function() {

                $('#calendar').fullCalendar({
                    header: {
                        left: 'prev,next today',
                        center: 'title',
                        right: 'month,agendaWeek,agendaDay'
                    },

                    defaultDate: $('#calendar').fullCalendar('today'),
                    editable: false,
                    eventLimit: true, // allow "more" link when too many events
                    selectable: true,
                    selectHelper: true,
                    select: function(start, end) {

                        $('#ModalAdd #start').val(moment(start).format('YYYY-MM-DD HH:mm:ss'));
                        $('#ModalAdd #end').val(moment(end).format('YYYY-MM-DD HH:mm:ss'));
                        $('#ModalAdd').modal('show');
                    },
                    eventRender: function(event, element) {
                        element.bind('dblclick', function() {
                            $('#ModalEdit #id').val(event.id);
                            $('#ModalEdit #title').val(event.title);
                            $('#ModalEdit #color').val(event.color);
                            $('#ModalEdit #start').val(event.start);
                            $('#ModalEdit #end').val(event.end);
                            $('#ModalEdit').modal('show');
                        });
                    },
                    eventDrop: function(event, delta, revertFunc) { // si changement de position

                        edit(event);

                    },
                    eventResize: function(event, dayDelta, minuteDelta, revertFunc) { // si changement de longueur

                        edit(event);

                    },
                    events: [
                        <?php foreach ($events as $event) :

                            $start = explode(" ", $event['start']);
                            $end = explode(" ", $event['end']);

                            if ($start[1] == '00:00:00') {
                                $start = $start[0];
                            } else {
                                $start = $event['start'];
                            }
                            if ($end[1] == '00:00:00') {
                                $end = $end[0];
                            } else {
                                $end = $event['end'];
                            }
                        ?> {
                                id: '<?php echo $event['id']; ?>',
                                title: '<?php echo $event['title']; ?>',
                                start: '<?php echo $start; ?>',
                                end: '<?php echo $end; ?>',
                                color: '<?php echo $event['color']; ?>',

                            },
                        <?php endforeach; ?>
                    ]
                });

                function edit(event) {
                    start = event.start.format('YYYY-MM-DD HH:mm:ss');
                    if (event.end) {
                        end = event.end.format('YYYY-MM-DD HH:mm:ss');
                    } else {
                        end = start;
                    }

                    id = event.id;


                    Event = [];
                    Event[0] = id;
                    Event[1] = start;
                    Event[2] = end;

                    $.ajax({
                        url: '',
                        type: "POST",
                        data: {
                            Event: Event
                        },
                        success: function(rep) {
                            if (rep == 'OK') {
                                alert('test Saved');
                            } else {
                                alert('Could not be saved. try again.');
                            }
                        }
                    });
                }

            });
        </script>

</body>

</html>