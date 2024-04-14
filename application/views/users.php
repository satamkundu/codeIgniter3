    <div class="container">
        <div class="col-12">
            <a class="btn btn-primary" href="<?=base_url('user/add')?>">Add Users</a>
        </div>
        <div class="col-12">
            <?php if( gettype($users) == 'array' && !empty($users)){ ?>
                <table border="1" width="100%">
                <?php foreach($users as $user): ?>
                    <tr>
                        <td><?=$user['name']?></td>
                        <td><?=$user['email']?></td>
                        <td><?=date('d-m-Y', strtotime($user['created_at']))?></td>
                        <td><button class="btn btn-primary">Update</button></td>
                        <td><button class="btn btn-danger">Delete</button></td>
                    </tr>
                <?php endforeach; ?>
                </table>
            <?php }else{
                echo "No Users Found...";
            } ?>
        </div>
    </div>

</body>