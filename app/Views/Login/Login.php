<form class="form" action="<?= DIR ?>admin/login" method="post" >
    <input type="text" placeholder="Username" name="username" />
    <input type="password" placeholder="Password" name="password" />
    <button type="submit" class='btn-submit'>Login</button>
    <span class="error"><?php echo $err ?></span>
    <!-- <a href="#"> <p> Don't have an account? Register </p></a> -->
</form>