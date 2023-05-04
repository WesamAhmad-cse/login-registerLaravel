<div class="container">

    <div class="profile">

        <?php
        ($select = mysqli_query($conn, "SELECT * FROM `users` WHERE id = '$user_id'")) or die('query failed');
        if (mysqli_num_rows($select) > 0) {
            $fetch = mysqli_fetch_assoc($select);
        }
        
        if ($fetch['image'] == '') {
            echo '<img src="images/default-avatar.png">';
        } else {
            echo '<img src="uploaded_img/' . $fetch['image'] . '">';
        }
        ?>
        <h3><?php echo $fetch['first_name'] . ' ' . $fetch['last_name']; ?></h3>

        <h3><?php echo $fetch['email']; ?></h3>
        <a href="update_profile_h.php" class="btn">update profile</a>
        <a href="home.php?logout=<?php echo $user_id; ?>" class="delete-btn">logout</a>
        <p>new <a href="login">login</a> or <a href="registration">register</a></p>
    </div>

</div>

</body>



</html>
