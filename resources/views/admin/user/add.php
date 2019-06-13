<?php $this->section("header");?>
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <?php $this->section("menu");?>
        </div>
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">
                    Create User 
                </div>
                <div class="card-body">
                    <?php 
                        if ($this->message){
                            echo "<div class='alert alert-info'>".$this->message."</div>";
                        }
                    ?>
                    <form action="" method="post">
                        <div class="form-group">
                            <label>User Name</label>
                            <input type="string" required name="username" placeholder="User name" class="form-control" />
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="string" required name="password" placeholder="Password" class="form-control" />
                        </div>
                        <div class="form-group">
                            <label>Role :</label>
                            <select style="width:100px">  
                            <option value="Select">Select</option>}  
                            <option value="EMPLOYEE">EMPLOYEE</option>
                            <option value="ADMIN">ADMIN</option> 
                            </select>
                            <!-- <input type="string" class="form-control" name="role"/> -->
                        </div>
                        <div class="form-group">
                            <label>Parent ID  : </label>
                            <td><select name="parent_id" style="width:100px">
                                <option value="">Select</option>
                                <option value="0">All</option>
                                </select>
                                <?php

                                $res = mysqli_query($conn, "SELECT DISTINCT parent_id FROM users;" );
                                while($row = mysqli_fetch_array($res))    
                                {
                                    echo "<option value='" . $row['parent_id']. "'>" . $row['parent_id'] . "</option>";
                                }
                                ?>
                            </td>
                            <!-- <input type="string" class="form-control" name="parent_id"/> -->
                        </div>
                        <input type="submit" class="btn btn-primary" value="Add User" />                      
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->section("footer");?>