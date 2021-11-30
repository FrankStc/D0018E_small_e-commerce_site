<?php
    require_once 'header.php';
    require_once 'admin_header.php';
?>
    <div class="center_div">
        <h1>
            Add product
        </h1>
        <form action="include/add_product.inc.php" method="POST">
            <input name="product_name" id="product_name" type="text" placeholder="Product name..." value="">
            <input name="product_price" id="product_price" type="text" placeholder="Product price..." value="">
            <input name="product_quantity" id="product_quantity" type="text" placeholder="Product quantity..." value="">
            <input type="file" id="img" name="img" accept="image/*">
            <textarea name="product_description" id="product_description" placeholder="Product description..." ></textarea><br>
            <button class="btn" type="submit" name="submit">Add product</button>
        </form>
    </div>
    
    <table class="center">
        <tr>
            <th style="padding-right: 20px;">Product name</th>
            <th style="padding-left: 40px;">Image</th>
            <th style="padding-left: 10px;">Price</th>
            <th></th>
            <th style="padding-left: 20px;">Quantity</th>
        </tr>
        <?php
            require_once 'include/admin_functions.inc.php';
            $product_array = get_all_products($conn);
            for($i = 0; $i < sizeof($product_array); $i++)
            {
                ?>
                    <tr>
                        <td class="user_column"><?php echo $product_array[$i][1] ?></td>
                        <td class="user_column"><img class="img_admin" src=<?php echo $product_array[$i][2] ?>></td>
                        <td class="user_column"><?php echo $product_array[$i][3] ?></td>

                        <td><button onclick="button_press_scroll('include/alter_quantity.inc.php?prodID=<?php echo $product_array[$i][0]; ?>&minus')" class="btn_product_settings_down">-</button></td>
                        
                        <td class="user_column"><?php echo $product_array[$i][4] ?></td>

                        <td> <button onclick="button_press_scroll('include/alter_quantity.inc.php?prodID=<?php echo $product_array[$i][0]; ?>&plus')" class="btn_product_settings_down">+</button></td>
                    
                        
                        <form action="include/delete_product.inc.php" method="post">
                            <input name="delete_product" id="delete_product" type="hidden" value="<?php echo $product_array[$i][0] ?>">
                            <td>
                                <button type="submit" class="settingsbtn">DELETE</button>
                            </td>
                        </form>

                    </tr>
                    
                <?php
            }
        ?>
    </table>
    <br>

<?php
    require_once 'footer.php';
?>