<?php
/**
 * This view displays the list of users.
 * @copyright  Copyright (c) 2014-2018 Benjamin BALET
 * @license    http://opensource.org/licenses/AGPL-3.0 AGPL-3.0
 * @link       https://github.com/bbalet/skeleton
 * @since      1.0.0
 */
?>

<div id="container" class="container">
	<div class="row-fluid">
        <!-- <div class="col-2"></div> -->
        <div class="col-12">

            <h2><?php echo $title;?></h2>

            <?php echo $flashPartialView;?>

            <table id="users" cellpadding="0" cellspacing="0" class="table table-striped table-bordered" width="100%">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Category</th>

                    </tr>
                </thead>
                <tbody>

                    <?php 
                    // $id = 1;
                    foreach ($users as $user):
                        ?>
                        <tr>
                            <td data-order="<?php echo $user['id']; ?>" data-id="<?php echo $user['id'];?>"  class="text-right">
                                <a href="#" class="confirm-edit" title="edit user"><i class="mdi mdi-pencil"></i></a>
                                <a href="#" class="confirm-delete" title="Delete user"><i class="mdi mdi-delete"></i></a>
                                <?php echo $user['id'] ?>&nbsp;
                            </td>
                            <td><!-- <?php //echo $user['firstname']; ?> -->Garden</td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="row-fluid"><div class="col-12">&nbsp;</div></div>
    <!-- create new department -->
    <div class="row-fluid">
        <div class="col-12">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                <i class="mdi mdi-plus-circle"></i>&nbsp;Create category
            </button>

                </div>
            </div>
        </div>
    </div>
    <script>
        
        //Transform the HTML table in a fancy datatable
        $('#users').dataTable({
            stateSave: true,
        });
        $("#users tbody").on('click', '.confirm-delete',  function(){
            var id = $(this).parent().data('id');
            // var link = "<?php //echo base_url();?>users/delete/" + id;
            // $("#lnkDeleteUser").attr('href', link);
            $('#frmConfirmDelete').modal('show');
        });
         // edit category

            var id = $(this).parent().data('id');
            // var link = "<?php //echo base_url();?>users/delete/" + id;
            // $("#lnkDeleteUser").attr('href', link);
            $('#frmConfirmEdit').modal('show');
        });
    </script>

