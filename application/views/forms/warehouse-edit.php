<html>
<head>
<link rel="stylesheet" href="<?php echo site_url("assets/bootstrap/css/bootstrap.min.css") ?>">
<script src="<?php echo site_url("assets/jquery-3.2.1.min.js") ?>"></script>
<script src="<?php echo site_url("assets/bootstrap/js/bootstrap.min.js") ?>"></script>


</head>
<form class="" action="<?php echo site_url('warehouses/save'); ?>" method="post">
   <table border='1'>
       <tbody>
           <tr>
               <td>Warehouse Name:</td>
               <td><input type="text" name="warehouse_name" value="<?php echo $warehouse[0]['warehouse_name']; ?>" placeholder="warehouse_name"></td>
           </tr>
           <tr>
               <td>Short Name:</td>
               <td><input type="text" name="short_name" value="<?php echo $warehouse[0]['short_name']; ?>" placeholder="short_name"></td>
           </tr>
           <tr>
               <td>Address:</td>
               <td><input type="text" name="address" value="<?php echo $warehouse[0]['address']; ?>" placeholder="address"></td>
           </tr>
           <tr>
               <td>&nbsp;</td>
               <td><button type="submit">SUBMIT</button></td>
           </tr>
       </tbody>
   </table>

   <input type="hidden" name="mode" value="edit">
   <input type="hidden" name="warehouse_id" value="<?php echo $warehouse_id; ?>">
</form>