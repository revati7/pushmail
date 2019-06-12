<?php $this->section("header");?>
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <?php $this->section("menuuser");?>
        </div>
        <div class="col-md-9">
            <?php 
                //print_r($this->data);
                if (count($this->data) >= 1){
                    ?>
                    <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th style="width:10%">#Id</th>
                            <th>Course Name</th>
                            <th style="width:45%">Course Description</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <!-- <th>Created On</th> -->
                            <th>Apply</th>
                        </tr>
                    <?php 
                    foreach($this->data as $d){
                        ?>
                            <tr>
                                <td><?php echo $d['id'];?></td>
                                <td><?php echo $d['course_name'];?></td>
                                <td><?php echo substr(strip_tags($d['course_desc']),0,255);?></td>
                                <td><?php echo date("d-M-Y",$d['start_date']);?></td>
                                <td><?php echo date("d-M-Y",$d['end_date']);?></td>
                                <!-- <td><?php echo date("d-M-Y",$d['mod_timestamp']);?></td> -->
                                <td><a href='<?php echo _PATH_;?>/mail.php' class='btn btn-primary'>Apply</a></td>
                            </tr>
                            </thead>
                        <?php
                    }
                    ?>
                    </table>
                    <?php
                }else{
                    echo "<div class='alert alert-info'>No Courses found</div>";
                }
            ?>
        </div>
    </div>
</div>
<?php $this->section("footer");?>