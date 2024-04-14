<div class="container">
    <div class="col-12">
        <a class="btn btn-primary" href="<?=base_url('users')?>">All Users</a>
    </div>
    <div class="col-12">
        
        <?php 
            if($this->session->flashdata('success')){
                print_r($this->session->flashdata('success'));
            }
            else if($this->session->flashdata('error')){
                print_r($this->session->flashdata('error'));
            }
        ?>

        <form method="post" action="<?=base_url('user/set')?>">   

            <div class="mb-3">
                <label for="exampleInputName" class="form-label">Name</label>
                <input type="text" name="name" class="form-control" id="exampleInputName" aria-describedby="nameHelp" placeholder="Enter your name" value="<?=set_value('name')?>">
                <?= form_error('name') ?>
            </div>         

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter your emailId" value="<?=set_value('email')?>">
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                <?=form_error('email')?>
            </div>  

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>

</body>