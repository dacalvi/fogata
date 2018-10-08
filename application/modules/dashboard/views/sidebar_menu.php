<!-- Sidebar Menu -->
<ul class="sidebar-menu" data-widget="tree">
    <?php //var_dump($sidebar);?>
    <?php foreach($sidebar as $sidebarmainitem):?>
    <li class="header"><?php echo $sidebarmainitem->title; ?></li>

    <?php if(isset($sidebarmainitem->items)): ?>
    <?php //var_dump($sidebarmainitem->items);?>
        <?php foreach($sidebarmainitem->items as $item): ?>
            
            <?php if(isset($item->items)): ?>
                
                <li class="treeview">
                    <a href="<?php if($item->urltype == 'internal') { echo base_url(); }?><?php echo $item->url; ?>"><i class="fa <?php echo $item->icon; ?>"></i> <span><?php echo $item->title; ?></span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <?php foreach($item->items as $item2):?>
                            <li><a href="<?php if($item2->urltype == 'internal') { echo base_url(); }?><?php echo $item2->url; ?>"><i class="fa <?php echo $item2->icon; ?>"></i><?php echo $item2->title; ?></a></li>
                        <?php endforeach;?>
                    </ul>
                </li>

            <?php else:?>

                <li class="active"><a href="<?php if($item->urltype == 'internal') { echo base_url(); }?><?php echo $item->url; ?>"><i class="fa <?php echo $item->icon; ?>"></i> <span><?php echo $item->title; ?></span></a></li>        

            <?php endif;?>

        <?php endforeach;?>
    <?php endif;?>

    <?php endforeach;?>



    <?php if ($this->ion_auth->is_admin()):?>
    <li class="header">ADMINISTRACION</li>    
    <li class="treeview">
        <a href="#"><i class="fa fa-users"></i> <span>Usuarios</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li class="active">
                <a href="<?php echo base_url();?>dashboard/users">
                    <i class="fa fa-users"></i> <span>Ver usuarios</span>
                </a>
            </li>
            <li>
                <a href="<?php echo base_url();?>dashboard/users/create_user">
                    <i class="fa fa-user-plus"></i> <span>Crear usuario</span>
                </a>
            </li>
            <li>
                <a href="<?php echo base_url();?>dashboard/users/create_group">
                    <i class="fa fa-users"></i> <span>Crear grupo</span>
                </a>
            </li>
        </ul>
    </li>
    <li class="treeview">
        <a href="#"><i class="fa fa-reorder"></i> <span>Admin Menu</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li><a href="<?php echo base_url();?>dashboard/menus/items"><i class="fa fa-list"></i> <span>Items</span></a></li>
            <li><a href="<?php echo base_url();?>dashboard/menus/categories"><i class="fa fa-list"></i> <span>Categorias</span></a></li>
        </ul>
    </li>
    
    <?php endif;?>

</ul>
<!-- /.sidebar-menu -->