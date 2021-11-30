<?php
    require_once 'header.php';
    require_once 'admin_header.php';

?>


<table class="center">
        <tr>
            <th style="padding-right: 20px;">First name</th>
            <th style="padding-right: 150px;">Last name</th>
            <th style="padding-left: 30px;">Inferior opinion</th>
        </tr>

        <?php
            require_once 'include/admin_functions.inc.php';
            $message_array = get_all_messages($conn);
            for($i = 0; $i < sizeof($message_array); $i++)
            {
                ?>
                    <tr>
                        <td class="user_column"><?php echo $message_array[$i][0] ?></td>
                        <td class="user_column"><?php echo $message_array[$i][1] ?></td>
                        
                        <?php $string_msg = read_message($message_array[$i][2]); ?>
                        <td class="user_column"><?php echo $string_msg ?></td>

                        <td><button class="btn" type="submit" name="submit">Show message</button></td>
                        <td><button class="btn" type="submit" name="submit">Download message</button></td>
                    </tr>
        <?php
            }
        ?>
        
</table>

<?php
    require_once 'footer.php';
?>