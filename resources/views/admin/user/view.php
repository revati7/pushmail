<?php $this->section("header");?>
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <?php $this->section("menu");?>
        </div>
        <div class="col-md-9">
            <?php 
                //print_r($this->data);
                if (count($this->data) >= 1){
                    ?>
                    <table class="table">
                        <tr>
                            <th style="width:10%">#Id</th>
                            <th>User Name</th>
                            <th style="width:20%%">Password</th>
                            <th>Role</th>
                            <th>Created On</th>

                        </tr>
                    <?php 
                    foreach($this->data as $d){
                        ?>
                            <tr>
                                <td><?php echo $d['id'];?></td>
                                <td><?php echo $d['username'];?></td>
                                <td><?php echo (sha1($d['password']));?></td>
                                <td><?php echo $d['role'];?></td>
                                <td><?php echo date("d-M-Y",$d['mod_timestamp']);?></td>
                            </tr>
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