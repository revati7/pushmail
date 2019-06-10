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
                            <label>Role</label>
                            <input type="string" class="form-control" name="rolr"/>
                        </div>
                        
                        <input type="submit" class="btn btn-primary" value="Add User" />
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->section("footer");?>